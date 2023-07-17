<?php

namespace App\Http\Controllers\Rsa\Company;

use App\Http\Controllers\Controller;
use App\Mail\CompanyCreatePasswordMail;
use App\Models\Company;
use App\Models\CompanyUser;
use App\Models\CompanyUsersPasswordResetToken;
use App\Observers\CompanyObserver;
use App\Services\CompanyService;
use App\Services\CompanyUserService;
use App\Services\CompanyUsersPasswordResetTokenService;
use App\Services\RoleService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class CompanyController extends Controller
{
    public function __construct(
        public CompanyService $companyService,
        public CompanyUserService $companyUserService,
        public CompanyUsersPasswordResetTokenService $companyTokenService,
        public RoleService $roleService,
        public CompanyUsersPasswordResetTokenService $resetTokenService
    )
    {
    }

    /**
     * @return View
     */
    public function preConfirmList(): View
    {

        $list = $this->companyService->getPreConfirmList();

        return view('rsa.company.pre-confirm-list', compact('list'));
    }
    public function preConfirm(Request $request)
    {
        $companyID = $request->companyID;

        $companyUpdate = $this->companyService->updatePreConfirm($companyID);
        if ($companyUpdate)
        {
            $company = $companyUpdate->getCompany();


            $companyUser= $this->companyUserService->prepareCreateDataWithCompany($company)->create();

            try {
                $this->roleService->roleAssignmentProcess($companyUser,"company", "admin");
            }
            catch (Exception $exception)
            {
                return response()
                    ->json(['pre_confirm' => "error", "message" => "Bir hata oluştu."])
                    ->setStatusCode(500);
            }
            return response()
                ->json(['pre_confirm' => "success", "message" => "Başarılı", "company_pre_confirm" => $company->pre_confirm])
                ->setStatusCode(200);
        }
        return response()
            ->json(['pre_confirm' => "error", "message" => "Kayıt bulunamadı"])
            ->setStatusCode(404);

    }

}
