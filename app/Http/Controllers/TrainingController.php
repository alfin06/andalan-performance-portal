<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Client;
use App\Models\Tab;
use App\Models\Movement;
use App\Models\User;
use App\Models\Sub;

class TrainingController extends Controller
{
    public function home()
    {
        $clients = Client::where('is_active', 1)->orderBy('name', 'asc')->get();

        return Inertia::render('Dashboard/Home', [
            'clients' => $clients
        ]);
    }

    public function index(int $client_id)
    {
        $client = Client::where('id', $client_id)->first();
        $tabs = Tab::where('client_id', $client_id)->get();
        $data = Training::leftJoin('Subs', 'trainings.id', '=', 'subs.training_id')
                    ->where('trainings.client_id', '=', $client_id)
                    ->get();
        
        return Inertia::render(
            'Dashboard/Index',
            [
                'client' => $client,
                'tabs' => $tabs,
                'data' => $data
            ]
        );
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Training $training)
    {
        //
    }

    public function edit(Training $training)
    {
        //
    }

    public function update(Request $request, Training $training)
    {
        //
    }

    public function destroy(Training $training)
    {
        //
    }
}
