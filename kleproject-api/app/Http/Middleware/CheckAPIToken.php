<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAPIToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {

        $token = $request->header('Authorization');
//dd(çalıştı);
        if (!$token || $token== null ) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Token doğrulama işlemleri burada yapılabilir

        return $next($request);
    }
}
