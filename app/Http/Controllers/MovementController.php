<?php

namespace App\Http\Controllers;

use App\Models\Movement;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class MovementController extends Controller
{
    public function index()
    {
        $movements = Movement::all();

        return Inertia::render('Movement/Index', [
            'movements' => $movements
        ]);
    }

    public function create()
    {
        return Inertia::render(
            'Movement/Create'
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $movement = new Movement();
        $movement->name = $request->name;
        $movement->categories = implode(" ", $request->categories);
     
        $movement->save();
        sleep(1);

        return redirect()->route('movement.index')->with('message', 'Movement created successfully');
    }

    public function show(Movement $movement)
    {
        //
    }


    public function edit(Movement $movement)
    {
        return Inertia::render(
            'Movement/Edit',
            [
                'movement' => $movement
            ]
        );
    }

    public function update(Request $request, Movement $movement)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $movement->name = $request->name;
        $movement->categories = implode(" ", $request->categories);
        $movement->updated_at = now();
        $movement->save();
        sleep(1);

        return redirect()->route('movement.index')->with('message', 'Movement updated successfully');
    }

    public function destroy(Movement $movement)
    {
        $movement->delete();
        sleep(1);

        return redirect()->route('movement.index')->with('message', 'Movement deleted successfully');
    }
}
