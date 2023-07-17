<?php

namespace App\Services;

use App\Models\Company;
use App\Models\CompanyUser;
use Illuminate\Validation\ValidationException;

class CompanyUserService
{
    private array $createData = [];

    public function __construct
    (
        public CompanyUser $companyUser,
        public CompanyUsersPasswordResetTokenService $passwordResetTokenService
    )
    {
    }

    public function create(): CompanyUser
    {
        return $this->companyUser::create($this->createData);
    }

    public function prepareCreateDataWithCompany(Company $company): CompanyUserService
    {
        $this->createData = [
            "name" => $company->auth_name,
            "email" => $company->auth_email,
            "phone" => $company->auth_phone,
            "company_id" => $company->id
        ];
        return $this;
    }

    public function updatePassword(string $email, string $password): bool
    {
        return $this->companyUser::query()
            ->where('email', $email)
            ->update([
                'password' => bcrypt($password)
            ]);
    }

    public function updateProcess(string $email, string $password, string $token): bool
    {
        $this->passwordResetTokenService->checkToken($token, $email);

        $updateResult = $this->updatePassword($email, $password);
        if ($updateResult) {
            $this->passwordResetTokenService->deleteTokenByEmail($email);
        }
        return $updateResult;
    }

    public function checkCompanyUserJoinWithCompanyByEmail(string $email)
    {
        return $this->companyUser::query()
            ->whereEmail($email)
            ->joinCompany()
            ->select('company_users.email', 'companies.name as companyName')
            ->first();
    }


}
