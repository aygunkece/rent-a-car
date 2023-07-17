<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Traits\SweetAlert;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateRequest as MemberUpdateRequest;

class HomeController extends Controller
{
    use SweetAlert;
    public function index()
    {
        return view('front.index');
    }

    public function edit(Member $member)
    {
        return view("front.profile-edit",compact("member"));

    }

    public function update(MemberUpdateRequest $request, Member $member)
    {
        $data = $request->except("_token");

        if (!is_null($data["password"])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }
        $member->update($data);
        $this->rsAlert("success", "Başarılı", "Sayın" . $member->fullname . ", Profil bilgileriniz başarıyla güncellendi.");
        return redirect()->back();
    }

}
