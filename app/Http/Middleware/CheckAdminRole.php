<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userRole = Auth::user()->role?->name;

        if (!in_array($userRole, ['Super Admin', 'Admin'])) {
            abort(403, 'Unauthorized access. Only Admin and Super Admin can access User Management.');
        }

        return $next($request);
    }
}
