<?php

namespace App\Observers;

use App\Models\Member;
use App\Notifications\Members\VerifyNotification;
use App\Services\Member\MemberVerifyService;

class MemberRegisteredObserver
{
    public function __construct(public MemberVerifyService $memberVerifyService) { }

    /**
     * Handle the Member "created" event.
     */
    public function created(Member $member): void
    {
        $memberVerify = $this->memberVerifyService->createTokenById($member->id);
        $member->notify(new VerifyNotification($memberVerify->token, $member->fullname));
    }

    /**
     * Handle the Member "updated" event.
     */
    public function updated(Member $standardMember): void
    {
        //
    }

    /**
     * Handle the Member "deleted" event.
     */
    public function deleted(Member $standardMember): void
    {
        //
    }

    /**
     * Handle the Member "restored" event.
     */
    public function restored(Member $standardMember): void
    {
        //
    }

    /**
     * Handle the Member "force deleted" event.
     */
    public function forceDeleted(Member $standardMember): void
    {
        //
    }
}
