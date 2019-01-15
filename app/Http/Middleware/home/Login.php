<?php

namespace App\Http\Middleware\home;

use Closure;

class Login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->session()->exists('login_users')) {
            return $next($request);
        } else {
            return redirect('home/login/login')->with('error','请登录');
        }
    }
}
