<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    /**
     * Block every authenticated user who has not explicitly been granted
     * administrative access or whose account has been deactivated.
     *
     * @param  Closure(Request): Response  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        // L'utilisateur doit être connecté.
        abort_unless($user, 403);

        // Le compte doit être actif.
        if (! $user->is_active) {
            auth()->logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()
                ->route('login')
                ->with('error', 'Votre compte a été désactivé.');
        }

        // L'utilisateur doit être administrateur.
        abort_unless($user->is_admin, 403);

        return $next($request);
    }
}