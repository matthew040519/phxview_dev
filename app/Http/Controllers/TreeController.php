<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tree;

class TreeController extends Controller
{
    //
    public function genealogy()
    {
        $params = [];

        $head = request()->username;

            $params['head'] = tree::where('upline', $head)->first();

            $params['first_slot'] = tree::where('upline', $params['head']->first)->first();

            $params['second_slot'] = tree::where('upline', $params['head']->second)->first();

            $params['third_slot'] = tree::where('upline', $params['head']->third)->first();

            $params['fourth_slot'] = tree::where('upline', $params['head']->fourth)->first();

        return view('member.genealogy')->with('params', $params);
    }
}
