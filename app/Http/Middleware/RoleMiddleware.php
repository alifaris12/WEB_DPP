<?php

// app/Http/Middleware/RoleMiddleware.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if ($request->user()->role !== $role) {
            // Arahkan ke halaman yang tidak diizinkan
            return redirect('/dashboard');
        }

        return $next($request);
    }
}
