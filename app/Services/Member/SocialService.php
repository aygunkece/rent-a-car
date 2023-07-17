<?php

namespace App\Services\Member;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Member;

class SocialService
{
public function __construct(public Member $member)
{
}
    public function memberGetByEmail($driver)
    {
        $member = Socialite::driver($driver)->user();
        return $member;
    }

    public function checkIfMemberExists($email)
    {
        return $this->member::where("email", $email)->first();
    }

    public function prepareCreateData($driver)
    {
        $member = $this->memberGetByEmail($driver);

        $data = [
            'fullname' => $member->getName(),
            'email' => $member->getEmail(),
            "password" => bcrypt(""),
            'email_verify_at' => now(),
            "status" => 1,
            $driver . "_id" => $member->getId()
        ];

        return $data;
    }

    public function createMember($data)
    {
        $member = $this->member::create($data);
        $member->email_verify_at = now();
        $member->save();

        Auth::guard('member')->login($member);
        return redirect()->route("front.index");
    }
}
