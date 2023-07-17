<?php

namespace App\Builders;


use Illuminate\Database\Eloquent\Builder;

class CompanyUserBuilder extends Builder
{
    public function joinCompany(): CompanyUserBuilder
    {
        return $this->join("companies", "companies.id", "=", "company_users.company_id");
    }

    public function whereEmail(string $email): CompanyUserBuilder
    {
        return $this->where("company_users.email", $email);
    }

}
