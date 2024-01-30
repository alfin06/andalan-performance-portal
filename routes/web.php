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

// Route::get('/', function () {
//     return Inertia::render('Home');
// });

Route::middleware('auth')->group(function() {
    Route::get('/', function() {
        return Inertia::render('Home');
    })->name('home');
    Route::get('user/logout', [AuthController::class, 'logout'])->name('logout');
    
});

Route::middleware('guest')->group(function() {
    Route::get('user/register', [AuthController::class, 'register'])->name('register');
    
    Route::post('user/register', [AuthController::class, 'store'])->name('register');
    
    Route::get('user/login', [AuthController::class, 'login'])->name('login');
    
    Route::post('user/login', [AuthController::class, 'auth'])->name('login');
});
