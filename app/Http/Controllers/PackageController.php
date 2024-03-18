<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\package;
use App\Models\member;
use App\Models\member_package;
use App\Models\directinvite;
use Illuminate\Support\Facades\Auth;

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

    public function package()
    {
        $params = [];

        $params['package'] = package::all();
        $params['member_package'] = member_package::selectRaw('*, DATEDIFF(DATE_ADD(tdate, INTERVAL 5 MONTH),  NOW()) as date_expire')->where(['username' => Auth::user()->member->username, 'active' => 1])->first();

        return view('member.package')->with('params', $params);
    }

    public function memberpackage()
    {
        $package_id = request()->package_id;

        member_package::create([
            'username' => Auth::user()->member->username,
            'package_id' => $package_id
        ]);

        $package = package::where('id', $package_id)->first();

        $total = (($package->dc_token * 10) * 150) * 0.1;

        directinvite::create([
            'sponsor' => Auth::user()->member->sponsor,
            'username' => Auth::user()->member->username,
            'amount' => number_format($total, 2),
        ]);

        member::where('username', Auth::user()->member->username)->update(['package' => $package->package_name]);

        return redirect()->back()->with('status', 'Package Add Successfully');
    }
}
