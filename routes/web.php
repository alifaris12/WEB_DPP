<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ProgramKerjasamaController;

/*
|---------------------------------------------------------------------- 
| Web Routes
|---------------------------------------------------------------------- 
*/

// Root: arahkan sesuai role login
Route::get('/', function () {
    if (Auth::check()) {
        return Auth::user()->role === 'admin'
            ? redirect()->route('admin.dashboard')
            : redirect()->route('user.dashboard');
    }
    return redirect()->route('login');
});

/* ================================
| Auth (guest)
================================ */
Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);
    Route::get('password/reset', fn () => view('auth.passwords.email'))->name('password.request');

    // Login khusus admin
    Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
});

/* ================================
| Logout (auth)
================================ */
Route::post('logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/* ================================
| User (auth + role:user)
================================ */
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('user.profile');
    
    Route::get('/user/program-daftar', [ProgramController::class, 'index'])->name('user.daftar.program');
    Route::get('/user/program-kerjasama', [ProgramController::class, 'daftarKerjasama'])->name('user.daftar.kerjasama');
});

/* ================================
| Public Routes (Template Downloads)
| Bisa diakses tanpa login untuk download template
================================ */
Route::get('/programs/template', [ProgramController::class, 'template'])->name('programs.template');
Route::get('/program-kerjasama/template', [ProgramController::class, 'templateKerjasama'])->name('template.kerjasama');

/* ================================
| Admin (auth + role:admin)
================================ */
Route::middleware(['auth', 'admin'])->group(function () {

    // Dashboard & menu admin
    Route::get('/admin/dashboard', fn () => view('admin.dashboard'))->name('admin.dashboard');
    Route::get('/admin/pilih-program', fn () => view('admin.pilih-program'))->name('admin.pilih-program');

    // Halaman statis kategori program
    Route::get('/program-penelitian', [ProgramController::class, 'indexPenelitian'])->name('program-penelitian');
    Route::view('/program-pengabdian', 'admin.program-pengabdian')->name('program-pengabdian');

    // ================================
    // 🧩 PROGRAM PENELITIAN / PENGABDIAN
    // ================================
    Route::prefix('program-penelitian')->group(function () {
        Route::get('/', [ProgramController::class, 'indexPenelitian'])->name('program-penelitian.index');
        Route::get('/create', [ProgramController::class, 'createPenelitian'])->name('program-penelitian.create');
        Route::post('/', [ProgramController::class, 'storePenelitian'])->name('program-penelitian.store');
        Route::get('/{program}/edit', [ProgramController::class, 'editPenelitian'])->name('program-penelitian.edit');
        Route::put('/{program}', [ProgramController::class, 'updatePenelitian'])->name('program-penelitian.update');
        Route::delete('/{program}', [ProgramController::class, 'destroyPenelitian'])->name('program-penelitian.destroy');
        Route::view('/program/input', 'admin.program-input')->name('input.program');
        Route::get('/program-daftar', [ProgramController::class, 'index'])->name('daftar.program');
    });
    Route::post('/programs', [ProgramController::class, 'store'])->name('programs.store');
    Route::get('/programs/{id}/edit', [ProgramController::class, 'edit'])->name('programs.edit');
    Route::put('/programs/{id}', [ProgramController::class, 'updateProgram'])->name('programs.update');
    Route::delete('/programs/{id}', [ProgramController::class, 'destroy'])->name('programs.destroy');

    Route::prefix('program-pengabdian')->group(function () {
        Route::get('/', [ProgramController::class, 'indexPengabdian'])->name('program-pengabdian.index');
        Route::get('/create', [ProgramController::class, 'createPengabdian'])->name('program-pengabdian.create');
        Route::post('/', [ProgramController::class, 'storePengabdian'])->name('program-pengabdian.store');
        Route::get('/{program}/edit', [ProgramController::class, 'editPengabdian'])->name('program-pengabdian.edit');
        Route::put('/{program}', [ProgramController::class, 'updatePengabdian'])->name('program-pengabdian.update');
        Route::delete('/{program}', [ProgramController::class, 'destroyPengabdian'])->name('program-pengabdian.destroy');
    });

    // ================================
    // 🌍 PROGRAM KERJASAMA
    // ================================
    Route::get('/program-kerjasama', [ProgramController::class, 'daftarKerjasama'])->name('program.kerjasama');
    Route::view('/program-kerjasama/input', 'admin.input-kerjasama')->name('input.kerjasama');
    Route::get('/daftar-program-kerjasama-nasional-dan-internasional', [ProgramController::class, 'daftarNasional'])->name('daftar.kerjasama.nasional');
    Route::get('/program-kerjasama/internasional', [ProgramController::class, 'daftarInternasional'])->name('daftar.kerjasama.internasional');
        Route::get('/program-kerjasama/upload', [ProgramController::class, 'uploadKerjasamaForm'])->name('upload.excel.kerjasama');
        Route::post('/program-kerjasama/upload', [ProgramController::class, 'uploadKerjasama'])->name('upload.kerjasama');
        // Route template kerjasama dipindahkan ke luar middleware admin (line ~60)
    Route::get('/program-kerjasama/{program}', [ProgramKerjasamaController::class, 'show'])->name('program-kerjasama.show.json');
    Route::get('/program-kerjasama/{program}/edit', [ProgramKerjasamaController::class, 'edit'])->name('program-kerjasama.edit.json');
    Route::get('/daftar-program-kerjasama-nasional-dan-internasional', [ProgramController::class, 'daftarKerjasama'])->name('daftar.kerjasama.nasional');
    Route::get('/program-kerjasama/{program}/edit', [ProgramController::class, 'editKerjasama'])->name('program-kerjasama.edit');

    Route::put('/program-kerjasama/{program}', [ProgramKerjasamaController::class, 'update'])->name('program-kerjasama.update');
    
    // CRUD PROGRAM KERJASAMA
    Route::prefix('program-kerjasama')->group(function () {
        Route::put('/{program}', [ProgramKerjasamaController::class, 'update'])->name('program-kerjasama.update');
        
        Route::delete('/{program}', [ProgramKerjasamaController::class, 'destroy'])->name('program-kerjasama.destroy');
    });



    // ================================
    // 🔧 CRUD PROGRAMS (Penelitian & Pengabdian)
    // ================================
    Route::prefix('programs')->name('programs.')->group(function () {
        Route::get('/', [ProgramController::class, 'index'])->name('index');
        Route::post('/', [ProgramController::class, 'store'])->name('store');
        Route::get('/{program}', [ProgramController::class, 'show'])->name('show');
        Route::get('/{program}/edit', [ProgramController::class, 'edit'])->name('edit');
        Route::put('/{program}', [ProgramController::class, 'update'])->name('update'); // Route PUT untuk update
        Route::delete('/{program}', [ProgramController::class, 'destroy'])->name('destroy');
        
        // Import/Export
        Route::post('/upload', [ProgramController::class, 'upload'])->name('upload');
        // Route template dipindahkan ke luar middleware admin (line ~59)
    });

    // ✅ Halaman Upload Excel program penelitian dan pengabdian
    Route::get('/program-upload', [ProgramController::class, 'uploadForm'])->name('upload.excel');
});


/* ================================
| Fallback setelah login
================================ */
Route::get('/home', function () {
    return Auth::user()->role === 'admin'
        ? redirect()->route('admin.dashboard')
        : redirect()->route('user.dashboard');
})->middleware('auth')->name('home');