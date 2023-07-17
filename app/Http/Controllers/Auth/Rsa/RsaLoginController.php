<?php

namespace App\Http\Controllers\Auth\Rsa;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\CompanyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RsaLoginController extends Controller
{
    public function show()
    {
        return view('auth.rsa.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $credentials['is_rsa'] = 1;

        $remember = !is_null($request->remember) ? 1 : 0;

        if (Auth::guard('rsa')->attempt($credentials, $remember))
        {
            return redirect()->route('rsa.index');
        }
        return redirect()
            ->back()
           ->withErrors
           ([
            'email' => 'Verdiğiniz bilgiler eşleşmemiştir'
            ])
            ->onlyInput('email', 'remember');
    }

    public function logout(Request $request)
    {
        if (Auth::guard('rsa')->check())
        {
            Auth::guard('rsa')->logout();
        }
        return redirect()->route("auth.rsa.login");
    }

}
