<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class CheckUserActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && !Auth::user()->is_active) {
            // Cierra la sesión del usuario si está inactivo
            Auth::logout();

            // Redirige al usuario a una página específica con un mensaje
            return redirect()->route('login')->with('error', 'Tu cuenta ha sido desactivada. Contacta al administrador.');
        }

        return $next($request);
    }
}
