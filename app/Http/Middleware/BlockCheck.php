<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BlockCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->user()->blocked) {
            auth()->logout(); // Logout the user
            return redirect()->route('login')->with('error', 'Uw account is geblokkeerd. Neem contact op met de beheerder.');
        }

        return $next($request);
    }
}
