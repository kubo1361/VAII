<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicUser
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $isSameUser = $request->user == Auth::user();
        $isPublic = !$request->user->private;
        $isAdmin = boolval(Auth::user()->is_admin);

        if ($isSameUser || $isPublic || $isAdmin) {
            return $next($request);
        }

        return abort(403, 'Unauthorized action.');
    }
}
