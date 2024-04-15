<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckTokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $token = $request->cookie('token');
 
        if($token == null)
        {
            return redirect()->route('login')->with('message', 'Lütfen giriş yapınız.');
        }
      
        return $next($request);
    }
}
