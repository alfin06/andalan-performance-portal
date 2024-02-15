<?php

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
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
    
    /* Client List */
    Route::resource('client', ClientController::class)->names([
        'index'   => 'client.index',
        'store'   => 'client.store',
        'update'  => 'client.update',
        'create'  => 'client.create',
        'edit'    => 'client.edit',
        'destroy' => 'client.destroy',
    ]);

    Route::resource('movement', MovementController::class)->names([
        'index'   => 'movement.index',
        'store'   => 'movement.store',
        'update'  => 'movement.update',
        'create'  => 'movement.create',
        'edit'    => 'movement.edit',
        'destroy' => 'movement.destroy',
    ]);


    /**********************/
    /* SUPERADMIN ACCESS  */
    /**********************/
    Route::resource('users', UserController::class)->names([
        'index'   => 'users.index',
        'store'   => 'users.store',
        'update'  => 'users.update',
        'create'  => 'users.create',
        'edit'    => 'users.edit',
        'destroy' => 'users.destroy',
    ]);
    Route::put('users/changePassword/{id}', [UserController::class, 'changePassword'])->name('users.password');
});

Route::middleware('auth')->group(function() {
    Route::get('/client/profile', function() {
        return Inertia::render('Profile');
    })->name('client.profile');
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
