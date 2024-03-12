<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\task;
use App\Models\client;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    //
    public function index()
    {
        $params = [];

        $params['client'] = client::all();
        $params['task'] = task::all();

        return view('admin.task')->with('params', $params);
    }

    public function addtask(Request $request)
    {
        $validated = $request->validate([
            'task_name' => 'required|max:255',
            'client_id' => 'required',
            'task_rate' => 'required',
        ]);

        $file = $request->file('url');

        task::create([
            'task_name' => $request->task_name,
            'client_id' => $request->client_id,
            'url' => $file->getClientOriginalName(),
            'user_id' => Auth::user()->id,
            // 'date_created' => $request->date_created,
            'task_rate' => number_format($request->task_rate, 2)
        ]);

        $destinationPath = 'videos';
        $file->move($destinationPath,$file->getClientOriginalName());

        return redirect()->back()->with('status', 'Task Add Successfully');

    }
}
