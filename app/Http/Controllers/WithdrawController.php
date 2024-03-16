<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\conversion;
use Illuminate\Support\Facades\Auth;

class WithdrawController extends Controller
{
    //
    public function index()
    {
        $params = [];

        $params['aznt'] = conversion::where(['member_id' => Auth::user()->id, 'type' => 'WITHDRAW AZNT'])->get();

        return view('member.withdraw')->with('params', $params);
    }

    public function addwithdrawal(Request $request)
    {
        $validated = $request->validate([
            'withdraw' => 'required|max:255',
        ]);

        $aznt_bal = conversion::select('withdraw')->where(['member_id' => Auth::user()->id, 'type' => 'AZNT TOKEN'])->sum('withdraw');

        if($aznt_bal >= $request->withdraw)
        {
            conversion::create([
                'member_id' => Auth::user()->id,
                'withdraw' => $request->withdraw,
                'conversion' => $request->withdraw,
                'type' => 'WITHDRAW AZNT'
            ]);
    
            conversion::create([
                'member_id' => Auth::user()->id,
                'withdraw' => -$request->withdraw,
                'conversion' => -$request->withdraw,
                'type' => 'AZNT TOKEN'
            ]);
            return redirect()->back()->with('status', 'Withdraw Successfully')->with('color', 'success');
        }
        else
        {
            return redirect()->back()->with('status', 'Insufficient Balance!')->with('color', 'danger');
        }
        

        

    }
}
