<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckUserSession
{
    public function handle(Request $request, Closure $next)
    {
        // Vérifier si la session 'user_id' n'existe pas
        if (!Session::has('user_id')) {
            // Rediriger vers /login
            return redirect('/login');
        }

        return $next($request);
    }
}