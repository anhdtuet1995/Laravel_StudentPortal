<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;

use App\Http\Requests;
use Closure;
use Auth;

class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'admin')
    {
        if (!Auth::guard($guard)->check()) {
            return redirect('admin/login');
        }

        return $next($request);
    }
}