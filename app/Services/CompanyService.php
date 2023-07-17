<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\ValidationException;

class CompanyService
{
    public function __construct(public Company $company)
    {

    }

    public function create(array $data): Company
    {
        return $this->company::create($data);
    }

    public function getPreConfirmList(): Collection
    {
        return $this->company::query()
            ->where('pre_confirm', 0)
            ->get();
    }

    public function getById(int $id): null|Company
    {
        return $this->company::find($id);
    }

    public function updatePreConfirm(int $id): bool|CompanyService
    {
        $company = $this->getById($id);

        if (is_null($company))
        {
            return false;
        }

        $company->update(['pre_confirm' => 1]);
        $this->setCompany($company);
        return $this;
    }

    public function setCompany(Company $company): CompanyService
    {
        $this->company = $company;
        return $this;
    }

    public function getCompany(): Company
    {
        return $this->company;
    }

}
