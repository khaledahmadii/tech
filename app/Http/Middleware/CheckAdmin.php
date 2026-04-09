<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
                // Vérifier si le rôle est admin
        if (Session('user_role') !== 'Administrateur') {
            // Rediriger vers une page d'accès refusé ou la page d'accueil
            return redirect('/')->with('erreur', 'Accès non autorisé. Zone réservée aux administrateurs.');
        }

        return $next($request);
    }
}
