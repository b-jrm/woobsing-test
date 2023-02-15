<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Moreday
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return ( date('Y-m-d H:i:s', strtotime(Auth::user()->last_auth.' + 1 Days')) < date('Y-m-d H:i:s') ? redirect('sesiones') : $next($request) );
    }
}
