<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('stats') && session()->has('id'))  {
            if (session()->get('stats')== 'Admin')  {
            return $next($request);
        }else{
                return redirect('/403');
            }
            
         }else{
             return redirect('/login');
         } 
       
    }
}
