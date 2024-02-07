<?php

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(function() {
    Route::get('/home', function() {
        return Inertia::render('Home');
    })->name('home');
    Route::get('user/logout', [AuthController::class, 'logout'])->name('logout');
    
});

Route::middleware('auth')->group(function() {
    Route::get('/profile', function() {
        return Inertia::render('Profile');
    })->name('profile');
    Route::get('user/logout', [AuthController::class, 'logout'])->name('logout');
    
});


Route::middleware('guest')->group(function() {
    Route::get('user/login', [AuthController::class, 'login'])->name('login');
    Route::post('user/login', [AuthController::class, 'auth'])->name('login');
});
