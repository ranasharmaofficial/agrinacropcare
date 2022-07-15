<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DashboardAuthCheck
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
        if(!session()->has('LoggedDash') && ($request->path() !='dashboard/auth/login')){
            return redirect()->route('dashboard.auth.login')->with(session()->flash('alert-warning', 'You must be logged in.'));
        }

        if(session()->has('LoggedDash') && ($request->path() == 'dashboard/auth/login')){
            return redirect('dashboard/home');
        }
        return $next($request)->header('Cache-Control','no-cache, no-store, max-age=0, must-revalidate')
                              ->header('Pragma','no-cache')
                              ->header('Expires','Sat 01 Jan 1990 00:00:00 GMT');
        return $next($request);
    }
}
