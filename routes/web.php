<?php

/**
 * Routes cho ứng dụng
 * Họ tên: [Nhập họ tên của bạn]
 * Mã sinh viên: [Nhập mã sinh viên của bạn]
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Trang chủ (Login page)
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return view('welcome');
})->name('welcome');

// OAuth Routes
Route::prefix('auth')->group(function () {
    // Redirect đến provider
    Route::get('/{provider}', [SocialAuthController::class, 'redirectToProvider'])
        ->name('auth.redirect');
    
    // Callback từ provider
    Route::get('/{provider}/callback', [SocialAuthController::class, 'handleProviderCallback'])
        ->name('auth.callback');
});

// Dashboard (Protected route)
Route::get('/dashboard', function () {
    if (!auth()->check()) {
        return redirect()->route('welcome');
    }
    return view('dashboard');
})->name('dashboard');

// Logout
Route::post('/logout', [SocialAuthController::class, 'logout'])
    ->name('logout');
