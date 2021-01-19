<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class CheckSignIn
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
        $role = Session::get('UROLE');
        $uid = Session::get('UID');
        if ($role == '' && $uid == '') {
            return redirect('signUp');
        }
        return $next($request);
    }
}