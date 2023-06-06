<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckStats
{
   
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('stats') && session()->has('id')  )  {
            return $next($request);
            
         }else{
             return redirect('/login');
         } 
    }
}

?>
