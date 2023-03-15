<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Vérifier si l'utilisateur connecté est adminnistrateur (admin = 1)
        if(auth()->user()->admin == 1){
            // Si oui, continuer jusqu'a la prochaine requete
            return $next($request);
        }
        else {
            //Sinon renvoyer une 403
            abort(403);
        }
    }
}
