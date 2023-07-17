<?php

namespace App\Http\Controllers\Auth\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Member\RegisterRequest;
use App\Models\Member;
use App\Models\MemberVerify;
use App\Models\User;
use App\Services\Member\MemberService;
use App\Services\Member\MemberVerifyService;
use App\Services\Member\SocialService;
use App\Traits\SweetAlert;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class RegisterController extends Controller
{
    use SweetAlert;

    public function __construct(public MemberService $memberService,public MemberVerifyService $memberVerifyService, public SocialService $socialService)
    {
    }

    public function showRegister(): View
    {
        return view('auth.member.register');
    }

    /**
     * @param RegisterRequest $request
     * @return RedirectResponse
     */
    public function register(RegisterRequest $request): RedirectResponse
    {

        $data = $request->only("fullname", "email", "password");
        $data['password'] = bcrypt($data['password']);
        try
        {
            $this->memberService->create($data);

            $this->rsAlert("success",'Başarılı',
                'E-posta adresinize onay maili gönderilmiştir. Lütfen mail kutunuzu kontrol ediniz.');

            return redirect()->back();
        }
        catch (Exception $exception)
        {
            dd($exception->getMessage());
        }
    }

    public function verify(Request $request, $token)
    {
        $verify = $this->memberVerifyService->getByToken($token);

        if (!is_null($verify)) {
            $member = $verify->member;

            if (is_null($member->email_verify_at)) {
                $member->email_verify_at = now();
                $member->status = 1;
                $member->save();
                $this->memberVerifyService->deleteTokenById($member->id);
                $message = 'Emailiniz Doğrulandı';
            } else {
                $message = 'Emailiniz Daha Önce Doğrulanmıştır. Giriş Yapabilirsiniz';
            }
            $this->rsAlert("success", 'Başarılı', $message);

            return redirect()->route('auth.member.login');
        } else {
            abort(404);
        }
    }

    public function socialLogin($driver)
    {
        return Socialite::driver($driver)->redirect();
    }
    public function socialVerify($driver)
    {
        $data = $this->socialService->prepareCreateData($driver);

        $memberCheck = $this->socialService->checkIfMemberExists($data['email']);

        if ($memberCheck) {
            Auth::login($memberCheck);
            return redirect()->route("front.index");
        }

        return $this->socialService->createMember($data);
    }

}
