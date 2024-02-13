<?php

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\UserController;
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
    Route::get('/', function() {
        return Inertia::render('Home');
    })->name('home');
    Route::get('/home', function() {
        return Inertia::render('Home');
    })->name('home');
    Route::get('user/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('user/profile', [AuthController::class, 'profile'])->name('profile');
    Route::post('user/profile', [AuthController::class, 'updateProfile'])->name('profile');
    
    Route::resource('users', UserController::class)->names([
        'index' => 'users.index',
        'store' => 'users.store',
        'update' => 'users.update',
    ]);
    Route::put('users/changePassword/{id}', [UserController::class, 'changePassword'])->name('users.password');
});

Route::middleware('auth')->group(function() {
    Route::get('/profile', function() {
        return Inertia::render('Profile');
    })->name('profile');
    Route::get('user/logout', [AuthController::class, 'logout'])->name('logout');
    
});


Route::middleware('auth')->group(function() {
    Route::get('/client', function() {
        return Inertia::render('Client');
    })->name('client');
    Route::get('user/logout', [AuthController::class, 'logout'])->name('logout');
    
});

Route::middleware('auth')->group(function() {
    Route::get('/movement', function() {
        return Inertia::render('Movement');
    })->name('movement');
    Route::get('user/logout', [AuthController::class, 'logout'])->name('logout');
    
});



Route::middleware('guest')->group(function() {
    Route::get('user/login', [AuthController::class, 'login'])->name('login');
    Route::post('user/login', [AuthController::class, 'auth'])->name('login');
});
