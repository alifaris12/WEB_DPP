<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminMiddleware
{
    /**
     * Menangani permintaan yang masuk.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Memeriksa apakah pengguna sudah terautentikasi dan memiliki role 'admin'
        if (Auth::check() && Auth::user()->role === 'admin') {
            // Jika admin, lanjutkan ke permintaan berikutnya
            return $next($request);
        }

        // Memeriksa jika pengguna memiliki akses ke kategori 'nasional' atau 'internasional'
        if (Auth::check() && (Auth::user()->role === 'nasional' || Auth::user()->role === 'internasional')) {
            // Jika role adalah 'nasional' atau 'internasional', lanjutkan ke permintaan berikutnya
            return $next($request);
        }

        // Jika bukan admin atau role 'nasional' atau 'internasional', log kejadian akses
        Log::warning('User attempted to access an admin-only or restricted page.', [
            'user_id' => Auth::id(), 
            'user_role' => Auth::check() ? Auth::user()->role : 'guest',
            'url' => $request->url()
        ]);

        // Redirect ke halaman dashboard user
        return redirect('/dashboard')->with('error', 'You do not have the required access.');
    }
}
