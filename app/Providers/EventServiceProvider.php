<?php

namespace App\Providers;

use App\Models\Member;
use App\Observers\MemberRegisteredObserver;
use App\Events\CompanyPasswordResetEvent;
use App\Listeners\SendCompanyResetPasswordEmailListener;
use App\Listeners\SendRsaResetPasswordEmailListener;
use App\Models\Company;
use App\Observers\CompanyObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        CompanyPasswordResetEvent::class => [
            SendCompanyResetPasswordEmailListener::class,
        ],
    ];
    protected $observers = [
        Company::class => [
            CompanyObserver::class,
        ],
        Member::class => [
            MemberRegisteredObserver::class
        ]

    ];
    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
