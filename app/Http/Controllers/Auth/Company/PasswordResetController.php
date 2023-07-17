<?php

namespace App\Http\Controllers\Auth\Company;

use App\Events\CompanyPasswordResetEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordResetRequest;
use App\Models\CompanyUsersPasswordResetToken;
use App\Services\CompanyUserService;
use App\Services\CompanyUsersPasswordResetTokenService;
use App\Traits\SweetAlert;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class PasswordResetController extends Controller
{
    use SweetAlert;

    public function __construct
    (
        public CompanyUsersPasswordResetTokenService $companyUsersPasswordResetTokenService,
        public CompanyUserService                    $companyUserService
    )
    {

    }

    public function showPasswordUpdate(Request $request)
    {
        $token = $request->token;
        $result = $this->companyUsersPasswordResetTokenService->getByToken($token);

        if (is_null($result)) {
            abort(400, "Email geçerlilik süresi dolmuştur. Lütfen tekrar deneyin.");
        }

        return view("auth.company.update-password", compact('token'));
    }

    public function passwordUpdate(PasswordResetRequest $request)
    {
        $email = $request->email;
        $password = $request->password;
        $token = $request->token;

        try {
            $result = $this->companyUserService->updateProcess($email, $password, $token);
            if ($result) {

                $this->rsAlert("success", "Başarılı", "Parolanız değiştirilmiştir.");

                return redirect()->route('auth.company.login');//Firma login olmuş olacak, firma bilgileri girme ekranı gelecek.
            }
        } catch (\Exception $exception) {
            abort(404, $exception->getMessage());
        }

        $this->rsAlert("info", "Uyarı", "Parolanız değiştirilemedi. Lütfen destek talebi oluşturun.");

        return redirect()->back();

    }

    public function showResetPassword()
    {
        return view("auth.company.reset-password");
    }

    public function sendResetPassword(Request $request)
    {
        $email = $request->email;
        $companyUser = $this->companyUserService->checkCompanyUserJoinWithCompanyByEmail($email);

        if (is_null($companyUser)) {
            $this->rsAlert("info", "Uyarı", "Böyle bir kayıt bulunamadı. Lütfen Kayıtlı email adresinizi giriniz.");
            return redirect()->back();
        }

        event(new CompanyPasswordResetEvent($companyUser));
        $this->rsAlert("success", "Uyarı", "Parola sıfırlama mailiniz gönderildi. Lütfen epostanızı kontrol edin.");
        return redirect()->route('auth.company.login');

    }

    public function showResetPasswordAssign(Request $request)
    {
        $token = $request->token;
        $isResetPasswordPage = true;
        return view("auth.company.update-password", compact('isResetPasswordPage', 'token'));
    }

    public function resetPasswordAssign(PasswordResetRequest $request)
    {
        try
        {
            return $this->passwordUpdate($request);
        }
        catch (\Throwable $exception)
        {
            abort('405', $exception->getMessage());
        }
    }


}
