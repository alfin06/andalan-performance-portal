<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request) {
        if(!auth()->check()) {
            return Inertia::render('User/Login');
        }
        else {
            return redirect()->route('home');
        }
    }

    public function auth(Request $request) {
        $validator = Validator::make($request->all(), [
                        'email' => 'required',
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
            $user = User::where('email', $request->email)->first();
            $user->last_login = now();
            $user->save();

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

    public function profile(Request $request) {
        return Inertia::render('User/Profile');
    }

    public function updateProfile(Request $request) {
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:6',
        ]);

        if($validator->fails()) {
            return Inertia::render('User/Profile', [
                'failed' => "Your password must be at least 6 characters."
            ]);
        }
        
        $user = User::where('id', Auth::id())->first();
        
        if($request->password == $request->confirmpassword) {
            $user->name = $request->name;
            $user->password = Hash::make($request->password);
            $user->updated_at = now();
            $user->save();

            return Inertia::render('User/Profile', [
                'succeed' => "Saved."
            ]);
        }
        else {
            return Inertia::render('User/Profile', [
                'failed' => "ERROR! Password does not match."
            ]);
        }
    }
}