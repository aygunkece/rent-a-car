<?php

namespace App\Http\Controllers\Auth\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\CompanyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function show()
    {
        return view("auth.company.login");
    }

    public function login(LoginRequest $request)
    {

        $remember = $request->remember ? true : false;

        if (Auth::guard('company')->attempt(['email' => $request->email, 'password' => $request->password, 'is_rsa' => 0], $remember))
        {
            return redirect()
                ->route("company.index");
        }

        return redirect()
            ->route("auth.company.login")
            ->withErrors(
                [
                    "email" => "Verdiğiniz bilgiler eşleşmemiştir."
                ])
            ->onlyInput("email", "remember");
    }

    public function logout(Request $request)
    {
        if (Auth::guard('company')->check())
        {
            Auth::guard('company')->logout();
        }

        return redirect()->route("auth.company.login");
    }
}
