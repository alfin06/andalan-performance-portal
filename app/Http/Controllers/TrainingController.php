<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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
        $data = Training::select('trainings.tab_id', 'trainings.movement_name', 'trainings.status', 'trainings.sets', 'trainings.t', 'trainings.wt', 'trainings.rest',
                                 'trainings.subs', 'trainings.reps1', 'trainings.reps2', 'trainings.reps3', 'trainings.reps4',
                                 'trainings.reps5', 'trainings.reps6',
                                 'subs.tab_id AS sub_tab_id', 'subs.movement_name AS sub_mov_name', 'subs.status AS sub_status', 'subs.sets AS sub_sets', 'subs.t AS sub_t', 'subs.wt AS sub_wt', 'subs.rest AS sub_rest',
                                 'subs.reps1 AS sub_reps1', 'subs.reps2 AS sub_reps2', 'subs.reps3 AS sub_reps3', 'subs.reps4 AS sub_reps4',
                                 'subs.reps5 AS sub_reps5', 'subs.reps6 AS sub_reps6')
                    ->leftJoin('Subs', 'trainings.id', '=', 'subs.training_id')
                    ->where('trainings.client_id', '=', $client_id)
                    ->get();
        $movement = Movement::all();
        $mCategory = DB::table('master_category')->orderBy('category_name')->get();
        
        return Inertia::render(
            'Dashboard/Index',
            [
                'client' => $client,
                'tabs' => $tabs,
                'data' => $data,
                'movement' => $movement,
                'mcategory' => $mCategory
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

    public function addMovement(Request $request)
    {
        $movement_plan = explode("-", $request->movement);
        $movement_id = $movement_plan[0];
        $movement_name = $movement_plan[1];

        $training = new Training();
        $training->client_id = $request->tab_client_id;
        $training->tab_id = $request->tab_id;
        $training->movement_id = $movement_id;
        $training->movement_name = $movement_name;
        $training->status = $request->status;
        $training->sets = $request->sets;
        $training->t = $request->t;
        $training->wt = $request->wt;
        $training->rest = $request->rest;
        $training->reps1 = $request->reps1;
        $training->reps2 = $request->reps2;
        $training->reps3 = $request->reps3;
        $training->reps4 = $request->reps4;
        $training->reps5 = $request->reps5;
        $training->reps6 = $request->reps6;
        $training->created_by = Auth::id();
        $training->save();
        sleep(1);
    }
}
