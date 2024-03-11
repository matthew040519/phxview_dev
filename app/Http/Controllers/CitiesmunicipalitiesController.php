<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\citiesmunicipalities;

class CitiesmunicipalitiesController extends Controller
{
    //
    public function city()
    {
        $province_id = Request()->province_id;
        $cities = citiesmunicipalities::where('provinceCode', $province_id)->get();

        $citiesmuni['data'] = $cities;

        return json_encode($citiesmuni);
    }
}
