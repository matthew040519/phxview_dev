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
        $params['convert'] = memberincome::where(['member_id' => Auth::user()->id, 'type' => 0])->orderBy('tdate', 'DESC')->get();

        return view('member.claimreport')->with('params', $params);
    }

    public function directSponsor()
    {
        $params = [];
        $params['sponsor'] = directinvite::where(['sponsor' => Auth::user()->member->username, 'type' => 0])->get();

        return view('member.directsponsor')->with('params', $params);
    }

    public function unilevel()
    {
        $username = Auth::user()->member->username;
        $member = member::where('username', $username)->first();
        // dd($member);
        $this->uplineCommission($member->sponsor, $member->username, 4);

        return response()->json([
            'success' => true,
        ], 200);
    }

    public function uplineCommission($sponsor, $username, $count)
    {

        $uplinedetails = member::where('username', $sponsor)->first();
        $uplinecount = member::where('username', $sponsor)->count();

        if($uplinecount > 0 && $count != 0)
        {
            $amount = 0;
            $member_package = member_package::join('packages', 'packages.id', 'member_packages.package_id')->where(['username' => $uplinedetails->username, 'active' => 1])->first();
            $count = $count - 1;

            if($count == 3)
            {
                $amount = floor($member_package->dc_token) * (2 / 100);
            }
            else
            {
                $amount = floor($member_package->dc_token) * (1 / 100);
            }

            unilevel::create([
                'member_id' => Auth::user()->id,
                'username' => $uplinedetails->username,
                'amount' => $amount
            ]);

            $this->uplineCommission($uplinedetails->sponsor, $uplinedetails->username, $count);
        }
    }
}
