<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Client;
use App\Models\Tab;
use App\Models\Movement;
use App\Models\User;
use App\Models\Sub;
use App\Models\Training;

class AdminController extends Controller
{
    public function showMovement(Request $request, int $id)
    {
        $categories = $request->categories;
        $qry = DB::table('movements')->select('id', 'name');

        foreach($categories as $category)
        {
            $qry->where('categories', 'LIKE', '%'.$category.'%');
        }

        $results = $qry->groupBy('id', 'name')->get();
        $data = [];

        foreach($results as $result)
        {
            $data[] = [
                'id' => $result->id,
                'name' => $result->name
            ];
        }

        return response()->json($data);
    }

    public function showMovementInfo(Request $request, int $id)
    {
        $client = $request->client;
        $mov_plan = $request->mov_plan;
        $trainings = Training::select('movement_id', 'movement_name', DB::raw('SUM(sets) AS total_sets'), DB::raw('COUNT(id) AS count'))
                            ->where('client_id', $client)
                            ->where('movement_id', $mov_plan)
                            ->groupBy('movement_id', 'movement_name')
                            ->get();
        $data = [];

        foreach($trainings as $training)
        {
            $data[] = [
                'movement_id' => $training->movement_id,
                'movement_name' => $training->movement_name,
                'total_sets' => $training->total_sets,
                'count' => $training->count
            ];
        }

        return response()->json($data);
    }
}
