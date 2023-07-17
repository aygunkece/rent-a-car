<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\Response;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $langs = Config::get('app.active_languages');
        $requestLang = $request->segment('1');
        $defaultLang = Config::get('app.default_language');


        if (in_array($requestLang, $langs))
        {
            app()->setLocale($requestLang);
        }
        else
        {
            app()->setLocale($defaultLang);
            $url = $request->fullUrl();
            $url = str_replace($requestLang, $defaultLang, $url);

            return redirect($url);
        }
        return $next($request);
    }
}
