<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class SuperadminController extends Controller
{
    public function employees() {
        $users = User::where('role', 'ADMIN')->get();

        return Inertia::render('Superadmin/Employees', [
            'users' => $users
        ]);
    }

    public function addEmployee(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'password' => 'required|min:6',
        ]);

        if($validator->fails()) {
            return Inertia::render('Superadmin/Employees', [
                'failed' => "Please input correct name, email, phone, and password!"
            ]);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->save();

        return back(); // Back to index page. All this happens without refreshing
    }
}
