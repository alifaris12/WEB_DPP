<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    protected function redirectTo(Request $request): ?string
    {
        // Untuk request web biasa, arahkan ke route 'login' jika belum auth
        if (! $request->expectsJson()) {
            return route('login'); // atau '/login'
        }
        return null; // biar API dapat 401 JSON
    }
}