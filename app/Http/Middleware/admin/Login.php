<?php

namespace App\Http\Middleware\admin;

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
        if ($request->session()->exists('users')) {
            return $next($request);
        } else {
            return redirect('admin/login')->with('error','请登录');
        }
       
    }
}
