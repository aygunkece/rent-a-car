<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CompanyAuthMiddleware
{

    /**
     * @comment Kullanıcıların company kullanıcısı olup olmadığı kontrol edildi.
     * @param Request $request
     * @param Closure $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (\Auth::guard('company')->check() && \Auth::guard('company')->user()->is_rsa == 0)
        {
            return $next($request);
        }
        else if(\Auth::guard('rsa')->check())
        {
            return redirect()->route('rsa.index');
        }
        else
        {
            abort(403);
        }
    }
}
