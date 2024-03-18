<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\conversion;
use App\Models\memberincome;
use App\Models\member;
use App\Models\member_package;
use App\Models\unilevel;
use App\Models\directinvite;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    //\
    public function convert()
    {
        $params = [];
        $params['convert'] = conversion::where(['member_id' => Auth::user()->id])->where('withdraw', ">", 0)->whereIn('type', array('PHX TOKEN', 'E-Wallet', 'AZNT TOKEN'))->orderBy('date', 'ASC')->get();

        return view('member.convertreport')->with('params', $params);
    }

    public function claimreport()
    {
        $params = [];
        $params['convert'] = memberincome::where(['member_id' => Auth::user()->id])->orderBy('tdate', 'DESC')->get();

        return view('member.claimreport')->with('params', $params);
    }

    public function directSponsor()
    {
        $params = [];
        $params['sponsor'] = directinvite::where(['sponsor' => Auth::user()->member->username])->get();

        return view('member.directsponsor')->with('params', $params);
    }

    public function unilevel()
    {
        $username = Auth::user()->member->username;
        $member = member::where('username', $username)->first();
        // dd($member);
        $this->uplineCommission($member->upline, $member->username, 6);

        return response()->json([
            'success' => true,
        ], 200);
    }

    public function uplineCommission($upline, $username, $count)
    {

        $uplinedetails = member::where('username', $upline)->first();
        $uplinecount = member::where('username', $upline)->count();

        

        if($uplinecount > 0 && $count != 0)
        {
            $member_package = member_package::join('packages', 'packages.id', 'member_packages.package_id')->where(['username' => $uplinedetails->username, 'active' => 1])->first();

            $count = $count - 1;

            $amount = floor($member_package->dc_token) * ($count / 100);

            unilevel::create([
                'member_id' => Auth::user()->id,
                'username' => $uplinedetails->username,
                'amount' => $amount
            ]);

            $this->uplineCommission($uplinedetails->upline, $uplinedetails->username, $count);
        }
    }
}