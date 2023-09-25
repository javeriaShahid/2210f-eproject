<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(session()->has('user') && session()->get('user')['role'] == 0)
        {

        }
        if(!session()->get('user')['role'] == 0)
        {
            return redirect(Route('admin.login.view'))->with('error' , 'You are not an admin please Loggin with your admin account');
        }
        if(!session()->has('user'))
        {
            return redirect(Route("admin.login.view"))->with('error' , 'You are not logged in login before accessing dashboard');

        }
        return $next($request);
    }
}
