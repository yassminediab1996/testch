<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request,  Closure $next = null,$guard = null)
    {
        if(!Auth::guard('admin')->check()){

            session()->flash('error_message','يجب تسجيل الدخول ');
            return redirect('/17$es12/');
        }
        return $next($request);
    }
}
