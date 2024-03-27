<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\conversion;
use Illuminate\Support\Facades\Auth;

class ConversionController extends Controller
{
    //
    public function conversion(Request $request)
    {
        $validated = $request->validate([
            'balance' => 'required',
            'convert' => 'required',
        ]);

        if($request->convert <= $request->balance)
        {
            // if($request->convert % 15 == 0)
            // {
                $phxToken = $request->convert / 15;

                conversion::create([
                    'member_id' => Auth::user()->id,
                    'withdraw' => $request->convert,
                    'conversion' => $phxToken, 
                    'type' => 'PHX TOKEN'
                ]);

                return redirect()->back()->with('status', 'Transfer Successfully!')->with('color', 'success');
            // }
            // else
            // {
            //     return redirect()->back()->with('status', 'Not Divisible by 15!')->with('color', 'danger');
            // }
            
        } else {
            return redirect()->back()->with('status', 'Insufficient Balance!')->with('color', 'danger');
        }

    }

    public function convertToAznt(Request $request)
    {
        $validated = $request->validate([
            'balance' => 'required',
            'convert' => 'required',
        ]);

        if($request->convert <= $request->balance)
        {
            // if($request->convert % 20 == 0)
            // {
                // if($request->convert_to == 1)
                // {
                    $azntToken = ($request->convert * 0.5) / 10;

                    conversion::create([
                        'member_id' => Auth::user()->id,
                        'withdraw' => ($request->convert / 2),
                        'conversion' => $azntToken, 
                        'type' => 'AZNT TOKEN'
                    ]);
                // }
                // else {
                    conversion::create([
                        'member_id' => Auth::user()->id,
                        'withdraw' => ($request->convert / 2),
                        'conversion' => ($request->convert * 0.5), 
                        'type' => 'E-Wallet'
                    ]);
                // }
               

                return redirect()->back()->with('status_aznt', 'Transfer Successfully!')->with('color', 'success');
            // }
            // else
            // {
            //     return redirect()->back()->with('status_aznt', 'Not Divisible by 20!')->with('color', 'danger');
            // }
            
        } 
        else {
            return redirect()->back()->with('status', 'Insufficient Balance!')->with('color', 'danger');
        }
    }
}
