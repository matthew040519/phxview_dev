<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\client;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    //
    public function index()
    {
        $params = [];

        $params['client'] = client::all();
        return view('admin.client')->with('params', $params);
    }

    public function addclient(Request $request)
    {
        $validated = $request->validate([
            'client_name' => 'required|unique:clients|max:255',
            'client_address' => 'required',
            'date_join' => 'required',
        ]);

        client::create($validated);

        User::create([
            'name' => $request->client_name,
            'email' => $request->client_name."@phx.com",
            'role' => 2,
            'password' => Hash::make('password'),
        ]);

        $user = User::select('id')->where('name', $request->client_name)->first();

        client::where('client_name', $request->client_name)->update(['user_id' => $user->id]);

        return redirect()->back()->with('status', 'Client Add Successfully');
    }
}
