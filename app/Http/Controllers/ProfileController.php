<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\citiesmunicipalities;
use App\Models\member_package;
use App\Models\User;
use App\Models\member;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ProfileController extends Controller
{
    //
    public function profile()
    {
        $params = [];

        $params['province'] = Province::orderBy('name','asc')->get();
        // 

        if(Auth::user()->member->city_code != NULL)
        {
            $city_id = Auth::user()->member->city_code;
            $params['citiesmunicipalities'] = citiesmunicipalities::where('provinceCode', Auth::user()->member->province_code)->get();
            $params['brgy'] = Http::get("https://psgc.gitlab.io/api/cities-municipalities/$city_id/barangays/");
        } else 
        {
            $params['citiesmunicipalities'] = citiesmunicipalities::all();
        }        

        $params['member_package'] = member_package::selectRaw('*, DATEDIFF(DATE_ADD(tdate, INTERVAL 5 MONTH),  NOW()) as date_expire')->where(['username' => Auth::user()->member->username, 'active' => 1])->first();


        return view('member.profile')->with('params', $params);
    }

    public function updatepassword(Request $request)
    {
        if($request->password != "")
        {
            User::where('id', Auth::user()->id)->update(['password' => Hash::make($request->password)]);

            return redirect()->back()->with('status', 'Change Password Successfully');
        }
    }

    public function updateacc(Request $request)
    {
       
            member::where('id', Auth::user()->member->id)
            ->update([
                'tron_wallet_id' => $request->thron_id, 
                'gcash' => $request->gcash,
                'province_code' => $request->province_id,
                'city_code' => $request->city_id,
                'brgy_code' => $request->brgy_id,
            ]);

            return redirect()->back()->with('status', 'Change Contacts Successfully');
        
    }

    public function updateinfo(Request $request)
    {
        member::where('id', Auth::user()->member->id)
            ->update([
                'birthday' => $request->bday, 
                'gender' => $request->gender,
                'email' => $request->email, 
                'contact_number' => $request->contact_number,
            ]);

            return redirect()->back()->with('status', 'Updated Information Successfully');
    }
}
