<?php

namespace App\Services\Member;

use App\Models\Member;
use Illuminate\Database\Eloquent\Collection;

class MemberService
{

    public function __construct(public Member $member)
    {
    }

    /**
     * @return Collection
     */
    public function getAllMembers():Collection
    {
        return $this->member::all();
    }

    /**
     * @param array $data
     * @return Member
     */
    public function create(array $data): Member
    {
        return $this->member::create($data);
    }

}
