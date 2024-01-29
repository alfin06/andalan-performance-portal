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
    })->middleware('verified')->name('home');

    Route::post('user/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::get('/email/verify', [AuthController::class, 'emailVerification'])->middleware('auth')->name('verification.notice');
   
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
     
        return redirect()->route('home')->with([
            'message' => 'Email verified successfully',
            'class' => 'alert alert-success'
        ]);
    })->middleware('signed')->name('verification.verify');
    
    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
     
        return redirect()->back()->with([
            'message' => 'Verification link sent!',
            'class' => 'alert alert-success'
        ]);
    })->middleware('throttle:6,1')->name('verification.send');
});

Route::middleware('guest')->group(function() {
    Route::get('user/register', [AuthController::class, 'register'])->name('register');
    
    Route::post('user/register', [AuthController::class, 'store'])->name('register');
    
    Route::get('user/login', [AuthController::class, 'login'])->name('login');
    
    Route::post('user/login', [AuthController::class, 'auth'])->name('login');
});
