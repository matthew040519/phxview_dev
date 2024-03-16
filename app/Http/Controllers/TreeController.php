<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TreeController extends Controller
{
    //
    public function genealogy()
    {
        return view('member.genealogy');
    }
}
