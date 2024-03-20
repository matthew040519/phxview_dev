<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\conversion;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    //
    public function p2ptransaction()
    {
        return view('member.p2ptransaction');
    }

    public function transfer(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|exists:members,username|exists:users,email|max:255',
            'transfer' => 'required|numeric',
        ]);

        $emarket_bal = conversion::select('withdraw')->where(['member_id' => Auth::user()->id, 'type' => 'E-Wallet'])->sum('withdraw');

        $user = User::where('email', $request->username)->first();

        if($emarket_bal < $request->transfer)
        {
            return redirect()->back()->with('status', 'Insufficient Balance!')->with('color', 'danger');
        }

        conversion::create([
            'member_id' => Auth::user()->id,
            'withdraw' => -$request->transfer,
            'conversion' => -$request->transfer, 
            'type' => 'E-Wallet',
            'transfer' => 1
        ]);

        conversion::create([
            'member_id' => $user->id,
            'withdraw' => $request->transfer,
            'conversion' => $request->transfer, 
            'type' => 'E-Wallet',
            'transfer' => 1
        ]);

        return redirect()->back()->with('status', 'Transfer Successfully')->with('color', 'success');

    }
}
