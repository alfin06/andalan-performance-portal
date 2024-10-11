<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Client;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::where('is_active', 1)->orderBy('name', 'asc')->get();

        return Inertia::render('Client/Index', [
            'clients' => $clients
        ]);
    }

    public function create()
    {
        return Inertia::render(
            'Client/Create'
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'program' => 'required',
            'goal' => 'required',
            'start_date' => 'required',
        ]);
 
        $client = new Client();
        $client->name = $request->name;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->birth_date = $request->birth_date;
        $client->program = $request->program;
        $client->goal = $request->goal;
        $client->start_date = $request->start_date;
        $client->save();
        sleep(1);

        return redirect()->route('client.index')->with('message', 'Client created successfully');
    }

    public function show(Client $client)
    {
        //
    }


    public function edit(Client $client)
    {
        return Inertia::render(
            'Client/Edit',
            [
                'client' => $client
            ]
        );
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $client->name = $request->name;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->birth_date = $request->birth_date;
        $client->is_active = $request->is_active;
        $client->updated_at = now();
        $client->save();
        sleep(1);

        return redirect()->route('client.index')->with('message', 'Client updated successfully');
    }

    public function updateProgram(Request $request)
    {
        $request->validate([
            'program' => 'required',
        ]);

        $client = Client::where('id', $request->id)
        ->first();
        $client->program = $request->program;
        $client->updated_at = now();
        $client->save();
        sleep(1);

        DB::insert('insert into program_history (client_id, program, updated_at, updated_by) values (?, ?, ?, ?)', [$request->id, $request->program,now(), Auth::id()]);

        return redirect()->route('client.index')->with('message', 'Client updated successfully');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        sleep(1);

        return redirect()->route('client.index')->with('message', 'Client deleted successfully');
    }
}
