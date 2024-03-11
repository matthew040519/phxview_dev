<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    //
    public function index()
    {
        return view('admin.index');
    }

    public function province()
    {
        $city_id = Request()->city_id;

        $brgy = Http::get("https://psgc.gitlab.io/api/cities-municipalities/$city_id/barangays/");

        // $brgyData['data'] = $brgy;

        return $brgy;
        
    }
}
