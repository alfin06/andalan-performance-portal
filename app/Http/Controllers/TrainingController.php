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
use App\Models\Head_training;

class TrainingController extends Controller
{
    public function home(Request $request)
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
                                 'trainings.reps5', 'trainings.reps6', 'trainings.date', 'trainings.movement_id', 'trainings.id', 'trainings.head_training_id',
                                 'subs.tab_id AS sub_tab_id', 'subs.movement_name AS sub_mov_name', 'subs.status AS sub_status', 'subs.sets AS sub_sets', 'subs.t AS sub_t', 'subs.wt AS sub_wt', 'subs.rest AS sub_rest',
                                 'subs.reps1 AS sub_reps1', 'subs.reps2 AS sub_reps2', 'subs.reps3 AS sub_reps3', 'subs.reps4 AS sub_reps4',
                                 'subs.reps5 AS sub_reps5', 'subs.reps6 AS sub_reps6')
                    ->leftJoin('subs', 'trainings.id', '=', 'subs.training_id')
                    ->where('trainings.client_id', '=', $client_id)
                    ->get();
        $movement = Movement::all();
        $mCategory = DB::table('master_category')->orderBy('category_name')->get();
        $head_training = DB::table('head_trainings')->where('client_id', $client_id)->orderBy('head_date')->get();

        $history = Training::select('movement_id', 'movement_name', DB::raw('SUM(sets) AS total_sets'), DB::raw('COUNT(id) AS count'))
                            ->where('client_id', $client_id)
                            ->orderBy('movement_name')
                            ->groupBy('movement_id', 'movement_name')
                            ->get();

        $history_detail = Training::select('trainings.movement_id', 'tabs.tab_name', DB::raw('DATE_FORMAT(trainings.date, "%d/%m/%Y") AS training_date'),
                                            'trainings.status', 'trainings.sets', 'trainings.t', 'trainings.wt', 'trainings.rest',
                                            'trainings.reps1', 'trainings.reps2', 'trainings.reps3', 'trainings.reps4',
                                            'trainings.reps5', 'trainings.reps6')
                                ->join('tabs', 'trainings.tab_id', 'tabs.id')
                                ->where('trainings.client_id', $client_id)
                                ->orderBy('trainings.movement_id')
                                ->get();
        
        return Inertia::render(
            'Dashboard/Index',
            [
                'client' => $client,
                'tabs' => $tabs,
                'data' => $data,
                'movement' => $movement,
                'mcategory' => $mCategory,
                'head_training' => $head_training,
                'history' => $history,
                'history_detail' => $history_detail
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
        ]);

        $tab = new Tab();
        $tab->tab_name = $request->name;
        $tab->client_id = $request->client_id;
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

        $head = Head_training::where('id', $request->head_id)
                ->where('tab_id', $request->tab_id)
                ->first();
        $head->head_notes = $request->tab_notes;
        $head->updated_by = Auth::id();
        $head->updated_at = now();
        $head->save();
        sleep(1);
    }

    public function addHead(Request $request)
    {
        $head_training = Head_training::where('head_date', $request->date)
                                     ->where('tab_id', $request->tab_id)
                                     ->where('client_id', $request->tab_client_id)
                                     ->first();
        
        if($head_training == null)
        {
            $head_training = new Head_training();
            $head_training->head_date = $request->date;
            $head_training->tab_id = $request->tab_id;
            $head_training->client_id = $request->tab_client_id;
            $head_training->created_by = Auth::id();
            $head_training->save();
        }

        sleep(1);
    }

    public function addMovement(Request $request)
    {
        $movement_plan = explode("-", $request->mov_plan);
        $movement_id = $movement_plan[0];
        $movement_name = $movement_plan[1];

        $head_training = Head_training::where('head_date', $request->date)
                                     ->where('tab_id', $request->tab_id)
                                     ->where('client_id', $request->tab_client_id)
                                     ->first();
        
        if($head_training == null)
        {
            $head_training = new Head_training();
            $head_training->head_date = $request->date;
            $head_training->tab_id = $request->tab_id;
            $head_training->client_id = $request->tab_client_id;
            $head_training->created_by = Auth::id();
            $head_training->save();
        }

        $training = new Training();
        $training->date = $request->date;
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
        $training->head_training_id = $head_training->id;
        $training->created_by = Auth::id();
        $training->save();
        sleep(1);
    }

    public function updateMovement(Request $request)
    {
        $movement_plan = explode("-", $request->mov_plan);
        $movement_id = $movement_plan[0];
        $movement_name = $movement_plan[1];
        
        $training = Training::where('id', $request->id)->first();
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
        $training->updated_by = Auth::id();
        $training->updated_at = now();
        $training->save();
        sleep(1);
    }

    public function subsMovement(Request $request)
    {
        $movement_plan = explode("-", $request->mov_plan);
        $movement_id = $movement_plan[0];
        $movement_name = $movement_plan[1];
        
        $training = Training::where('id', $request->id)->first();
        
        // Move previous training to subs
        $sub = new Sub();
        $sub->training_id = $training->id;
        $sub->client_id = $training->client_id;
        $sub->tab_id = $training->tab_id;
        $sub->movement_id = $training->movement_id;
        $sub->movement_name = $training->movement_name;
        $sub->status = $request->status;
        $sub->sets = $training->sets;
        $sub->t = $training->t;
        $sub->wt = $training->wt;
        $sub->rest = $training->rest;
        $sub->reps1 = $training->reps1;
        $sub->reps2 = $training->reps2;
        $sub->reps3 = $training->reps3;
        $sub->reps4 = $training->reps4;
        $sub->reps5 = $training->reps5;
        $sub->reps6 = $training->reps6;
        $sub->head_training_id = $training->head_training_id;
        $sub->created_by = Auth::id();
        $sub->save();

        // Replace old training to the new training
        $training->movement_id = $movement_id;
        $training->movement_name = $movement_name;
        $training->status = "";
        $training->sets = $request->sets;
        $training->t = $request->t;
        $training->wt = $request->wt;
        $training->rest = $request->rest;
        $training->subs = "Y";
        $training->reps1 = $request->reps1;
        $training->reps2 = $request->reps2;
        $training->reps3 = $request->reps3;
        $training->reps4 = $request->reps4;
        $training->reps5 = $request->reps5;
        $training->reps6 = $request->reps6;
        $training->updated_by = Auth::id();
        $training->updated_at = now();
        $training->save();
        sleep(1);
    }

    public function deleteMovement(Request $request)
    {
        Training::where('id', $request->id)->delete();
        sleep(1);
    }
}
