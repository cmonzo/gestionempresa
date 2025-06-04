<?php

namespace App\Http\Middleware;

use App;
use Closure;

use Illuminate\Http\Request;


class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('idioma')){
            App::setLocale(session()->get('idioma'));
        }
        return $next($request);
    }
}
