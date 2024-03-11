<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\package;

class PackageController extends Controller
{
    //
    public function index()
    {
        $params = [];

        $params['package'] = package::all();
        return view('admin.package')->with('params', $params);
    }

    public function addpackage(Request $request)
    {
        $validated = $request->validate([
            'package_name' => 'required|max:255',
            'dc_token' => 'required',
            'click' => 'required',
            'dr' => 'required',
        ]);

        package::create($validated);

        return redirect()->back()->with('status', 'Package Add Successfully');
    }
}
