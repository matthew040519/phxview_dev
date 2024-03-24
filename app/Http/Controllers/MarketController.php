<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\products;

class MarketController extends Controller
{
    //
    public function market()
    {
        $params = [];

        $params['category'] = category::where(['active' => 1])->get();
        return view('member.market2')->with('params', $params);
    }

    public function products()
    {
        $id = Request()->category;
        $product_id = Request()->product_id;

        if($id != "")
        {
            $params = [];

            $params['products'] = products::where(['active' => 1, 'category_id' => $id])->get();
            $params['category'] = category::where(['active' => 1, 'id' => $id])->first();

            return view('member.products')->with('params', $params);
        }
        
        if($product_id != "")
        {
            $params = [];

            $params['products'] = products::where(['active' => 1, 'id' => $product_id])->first();

            return view('member.productdetails')->with('params', $params);
        }

        
    }
}
