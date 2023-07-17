<?php

namespace App\Services\Member;

use App\Models\CompanyUsersPasswordResetToken;
use App\Models\MemberVerify;
use Illuminate\Support\Str;

class MemberVerifyService
{
    public function __construct(public MemberVerify $memberVerify) { }

    public function createTokenById(int $id): MemberVerify
    {
        $checkDuplicateControl = $this->checkDuplicateControl($id);
        if ($checkDuplicateControl)
        {
            return $checkDuplicateControl;
        }
        $token = $this->createRandomToken();

        return $this->memberVerify::create([
            'token' => $token,
            'member_id' => $id
        ]);
    }

    public function createRandomToken(int $length = 60): string
    {
        return Str::random($length);
    }

    public function checkDuplicateControl(int $id): MemberVerify|false
    {
        $result = $this->getById($id);
        if ($result && $this->checkTokenTime($result))
        {
            return $result;
        }
        else if ($result)
        {
            $this->deleteTokenById($id);
        }
        return false;
    }

    public function deleteTokenById(int $id): MemberVerifyService
    {
        $tokenQuery = $this->memberVerify::query()
            ->where('member_id', $id);

        $token = $tokenQuery->first();
        if ($token)
        {
            $tokenQuery->delete();
        }
        return $this;
    }

    public function getById(int $id): MemberVerify|null
    {
        return $this->memberVerify::query()
            ->where("member_id", $id)
            ->first();
    }

    public function checkTokenTime(MemberVerify $memberVerify): bool
    {
        if (now()->subHours(12) > $memberVerify->created_at)
        {
            return false;
        }
        return true;
    }


}
