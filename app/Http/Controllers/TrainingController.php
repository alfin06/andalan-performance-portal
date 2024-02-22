<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $data = Training::Join('movements', 'trainings.movement_id', '=', 'movements.id')
                    ->leftJoin('Subs', 'trainings.id', '=', 'subs.training_id')
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

    /* TAB */
    public function addTab(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required',
        ]);

        $tab = new Tab();
        $tab->tab_name = $request->name;
        $tab->client_id = $request->client_id;
        $tab->tab_date = $request->date;
        $tab->created_by = Auth::id();
        $tab->save();
        sleep(1);

        return redirect()->route('training.index', ['id' => $request->client_id]);
    }

    public function notes(int $tab_id)
    {
        $tab = Tab::where('id', $tab_id)->first();

        return Inertia::render(
            'Dashboard/Notes',
            [
                'tab' => $tab,
            ]
        );
    }

    public function updateNotes(Request $request)
    {
        $request->validate([
            'tab_notes' => 'required',
        ]);

        $tab = Tab::where('client_id', $request->tab_client_id)
                ->where('id', $request->tab_id)
                ->first();
        $tab->tab_notes = $request->tab_notes;
        $tab->updated_by = Auth::id();
        $tab->updated_at = now();
        $tab->save();
        sleep(1);
    }
}
