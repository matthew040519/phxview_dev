<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    //
    public function market()
    {
        return view('member.market');
    }
}
