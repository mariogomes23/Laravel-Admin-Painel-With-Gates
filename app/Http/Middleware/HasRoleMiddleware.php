<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HasRoleMiddleware
{

    public function handle(Request $request, Closure $next,string $role): Response
    {
        if(!auth()->user() || !auth()->user()->hasRole($role))
        {
            abort(403);

        }

        return $next($request);
    }
}
