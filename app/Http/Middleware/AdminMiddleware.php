<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(session()->has('admin') && session()->get('admin')['role'] == 1)
        {

        }
        if(!session()->get('admin')['role'] == 1)
        {
            return redirect(Route('admin.login.view'))->with('error' , 'You are not an admin please Loggin with your admin account');
        }
        if(!session()->has('admin'))
        {
            return redirect(Route("admin.login.view"))->with('error' , 'You are not logged in login before accessing dashboard');

        }
        return $next($request);
    }
}
