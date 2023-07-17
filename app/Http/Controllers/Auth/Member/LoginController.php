<?php

namespace App\Http\Controllers\Auth\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Member\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class LoginController extends Controller
{
    public function showLogin():View
    {
        return view('auth.member.login');
    }
    public function login(LoginRequest $request): RedirectResponse|View
    {
        $remember = $request->remember ? 1 : 0;

        $credentials = $request->only('email', 'password');

        if (Auth::guard('member')->attempt($credentials, $remember))
        {
            return view('front.index');
        }

        return redirect()
            ->route("auth.member.login")
            ->withErrors(
                [
                    "email" => "Verdiğiniz bilgiler eşleşmemiştir."
                ])
            ->onlyInput("email", "remember");
    }
    public function logout(Request $request)
    {
        if (Auth::guard('member')->check())
        {
            Auth::guard('member')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }
        return redirect()->route('front.index');
    }

}
