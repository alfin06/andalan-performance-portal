<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login() {
        if(!auth()->check()) {
            return Inertia::render('User/Login');
        }
        else {
            return redirect()->route('home');
        }
    }

    public function auth(Request $request) {
        $validator = Validator::make($request->all(), [
                        'email' => 'required|email',
                        'password' => 'required|min:6',
                    ]);

        if($validator->fails()) {
            return Inertia::render('User/Login', [
                'failed' => "Please input correct email and password!"
            ]);
        }

        if(auth()->attempt([
            'password' => $request->password,
            'email' => $request->email,
        ])) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }else {
            return Inertia::render('User/Login', [
                'failed' => "These credentials do not match any of our records!"
            ]);
        }
    }

    public function logout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

}