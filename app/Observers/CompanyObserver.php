<?php

namespace App\Observers;

use App\Models\Company;
use App\Notifications\PasswordCreateEmailNotification;
use App\Notifications\WelcomeEmailNotification;
use App\Services\CompanyUsersPasswordResetTokenService;

class CompanyObserver
{
    public function __construct(public CompanyUsersPasswordResetTokenService $companyTokenService)
    {

    }

    /**
     * Handle the Company"created" event.
     */
    public function created(Company $company): void
    {

    }

    /**
     * Handle the Company"updated" event.
     * @param Company $company
     */
    public function updated(Company $company): void
    {
        if ($company->wasChanged('pre_confirm') && $company->pre_confirm)
        {
            $companyUserToken = $this->companyTokenService->createTokenWithEmail($company->auth_email);
            $company->notify(new WelcomeEmailNotification());
            $company->notify(new PasswordCreateEmailNotification($companyUserToken->token));
        }
    }

    /**
     * Handle the Company"deleted" event.
     */
    public function deleted(Company $company): void
    {
        //
    }

    /**
     * Handle the Company"restored" event.
     */
    public function restored(Company $company): void
    {
        //
    }

    /**
     * Handle the Company"force deleted" event.
     */
    public function forceDeleted(Company $company): void
    {
        //
    }
}
