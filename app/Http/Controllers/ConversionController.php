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

        if(floor($request->convert) < floor($request->balance))
        {
            if($request->convert % 5 == 0)
            {
                $phxToken = $request->convert / 5;

                conversion::create([
                    'member_id' => Auth::user()->id,
                    'withdraw' => $request->convert,
                    'conversion' => $phxToken, 
                    'type' => 'PHX TOKEN'
                ]);

                return redirect()->back()->with('status', 'Transfer Successfully!')->with('color', 'success');
            }
            else
            {
                return redirect()->back()->with('status', 'Not Divisible by 5!')->with('color', 'danger');
            }
            
        } else {
            return redirect()->back()->with('status', 'Insufficient Balance!')->with('color', 'danger');
        }

        
        
    }
}
