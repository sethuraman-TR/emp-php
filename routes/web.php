
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Welcome page
Route::get('/', function () {
    return redirect()->route('login');
});

// Guest routes
Route::middleware('guest')->group(function () {

    Route::get('/register', [AuthController::class, 'register'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'registerStore'])
        ->name('register.store');

    Route::get('/login', [AuthController::class, 'login'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'loginStore'])
        ->name('login.store');

});

// Authenticated user routes
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [AuthController::class, 'dashboard'])
        ->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

});

// Admin routes
Route::middleware(['auth', 'is_admin'])->group(function () {

    Route::get('/admin/dashboard', [AuthController::class, 'adminDashboard'])
        ->name('admin.dashboard');

});
