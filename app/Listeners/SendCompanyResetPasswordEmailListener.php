<?php

namespace App\Listeners;

use App\Events\CompanyPasswordResetEvent;
use App\Notifications\PasswordResetMailNotification;
use App\Notifications\RsaPasswordResetMailNotification;
use App\Services\CompanyUsersPasswordResetTokenService;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendCompanyResetPasswordEmailListener
{
    /**
     * Create the event listener.
     */
    public function __construct(public CompanyUsersPasswordResetTokenService $tokenService)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CompanyPasswordResetEvent $event): void
    {

        try
        {
            $userToken = $this->tokenService->createTokenWithEmail($event->companyUser->email);

            if ($event->companyUser->companyName === 'rsa')
            {
                $event->companyUser->notify(new RsaPasswordResetMailNotification($userToken->token));
            }
            else if ($event->companyUser->companyName !== 'rsa')
            {
                $event->companyUser->notify(new PasswordResetMailNotification($userToken->token));
            }

        }
        catch (Exception $exception)
        {
            dd($exception->getMessage());
        }


    }
}
