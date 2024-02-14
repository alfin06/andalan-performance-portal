<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $users = User::where('role', 'ADMIN')->get();

        return Inertia::render('Users/Index', [
            'users' => $users
        ]);
    }

    public function create() {
        return Inertia::render(
            'Users/Create'
        );
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'password' => 'required|min:6',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->save();
        sleep(1);

        return redirect()->route('users.index')->with('message', 'User created successfully');
    }

    public function show(User $user) {
        //
    }

    public function edit(User $user) {
        return Inertia::render(
            'Users/Edit',
            [
                'user' => $user
            ]
        );
    }

    public function update(Request $request, User $user) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $user = User::where('id', $request->id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->updated_at = now();
        $user->save();
        sleep(1);

        return Inertia::render(
            'Users/Edit',
            [
                'user' => $user
            ]
        );
    }

    public function changePassword(Request $request, User $user) {
        $request->validate([
            'password' => 'required|min:6',
        ]);

        $user = User::where('id', $request->id)->first();
        $user->password = Hash::make($request->password);
        $user->updated_at = now();
        $user->save();
        sleep(1);

        return Inertia::render(
            'Users/Edit',
            [
                'user' => $user
            ]
        );
    }

    public function destroy(User $user)
    {
        $user->delete();
        sleep(1);

        return redirect()->route('users.index')->with('message', 'User deleted successfully');
    }
}
