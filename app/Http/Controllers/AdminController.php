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

class AdminController extends Controller
{
    public function showMovement(Request $request, int $id)
    {
        $categories = $request->categories;
        $qry = DB::table('movements')->select('id', 'name');

        foreach($categories as $category)
        {
            $qry->orWhere('categories', 'LIKE', '%'.$category.'%');
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
}
