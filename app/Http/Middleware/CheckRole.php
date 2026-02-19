<?php
// ========================================
// 6. app/Http/Middleware/CheckRole.php
// ========================================

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect('login')->with('error', 'Please login to access this page.');
        }

        $user = Auth::user();

        if ($user->role !== $role) {
            // Redirect based on user role
            if ($user->role === 'admin') {
                return redirect('/admin/dashboard')->with('error', 'You do not have permission to access this page.');
            } else {
                return redirect('/dashboard')->with('error', 'You do not have permission to access this page.');
            }
        }

        return $next($request);
    }
}