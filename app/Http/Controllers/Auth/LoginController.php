<?php
// ========================================
// 4. app/Http/Controllers/Auth/LoginController.php
// ========================================

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard'; // Default redirect untuk user biasa

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validasi form data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->only('email', 'remember'));
        }

        // Mencoba login dengan kredensial yang diberikan
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            // Authentication passed, regenerate session ID
            $request->session()->regenerate();

            // Mendapatkan user yang sedang login
            $user = Auth::user();

            // Mengecek role dan mengarahkan ke dashboard yang sesuai
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');  // Pastikan ini mengarah ke admin dashboard
            }

            // Pengguna biasa diarahkan ke dashboard biasa
            return redirect()->intended('/dashboard');
        }

        // Authentication failed
        return redirect()->back()
            ->withInput($request->only('email', 'remember'))
            ->with('error', 'These credentials do not match our records.');
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')
            ->with('success', 'You have been successfully logged out.');
    }
}
