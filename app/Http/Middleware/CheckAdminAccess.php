<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //si l'utilisateur n'a pas ?role=admin dans l'url
        if  ($request->query("role") !== 'admin') {
            abort(403, 'Accès non autorisé. Réservé aux administrateurs.');
        }
        return $next($request);
    }
}
