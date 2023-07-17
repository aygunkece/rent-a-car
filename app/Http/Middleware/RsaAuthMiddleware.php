<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RsaAuthMiddleware
{

    /**
     * @comment Kullanıcının rsa kullanıcısı olup olmadığı kontrol edildi.
     * @param Request $request
     * @param Closure $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (\Auth::guard('rsa')->check() && \Auth::guard('rsa')->user()->is_rsa)
        {
            return $next($request);
        }
        else if(\Auth::guard('rsa')->check())
        {
            \Auth::guard('rsa')->logout();
            return redirect()->route('rsa.login');
        }
        else
        {
            abort(403);
        }


    }
}
