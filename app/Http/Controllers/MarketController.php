<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\products;
use App\Models\conversion;
use App\Models\producttransaction;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MarketController extends Controller
{
    //
    public $convert;
    public $pt;
    public $user_id;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            // dd(Auth::user()->id);
            
            $conversion = conversion::where(['type' => 'E-Wallet', 'member_id' => Auth::user()->id])->sum('conversion');
            $count_cart = producttransaction::where('user_id', Auth::user()->id)->groupBy('product_id', 'category_id')->count('user_id');

            $this->convert = $conversion;
            $this->pt = $count_cart;
            $this->user_id = Auth::user()->id;

            return $next($request);
        });
    }

    public function cart()
    {
        $params = [];
        $action = request()->action;
        $id = request()->id;
        if($action != "" && $id != "")
        {
            producttransaction::where('id', $id)->delete();
        }
        $params['convert'] = $this->convert;
        $params['count_cart'] = $this->pt;
        $params['cart'] = producttransaction::select(DB::raw('sum(qty) as qty, size, max(price) as price, product_id, category_id'))->where('user_id', $this->user_id)->groupBy('size', 'product_id', 'category_id')->get();
        $params['sum'] = 0;
        return view('member.cart')->with('params', $params);
    }

    public function market()
    {
        $params = [];

        $params['convert'] = $this->convert;
        $params['count_cart'] = $this->pt;
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
            $params['convert'] = $this->convert;
            $params['count_cart'] = $this->pt;

            return view('member.products')->with('params', $params);
        }
        
        if($product_id != "")
        {
            $params = [];
            $params['convert'] = $this->convert;
            $params['count_cart'] = $this->pt;

            $params['products'] = products::where(['active' => 1, 'id' => $product_id])->first();

            return view('member.productdetails')->with('params', $params);
        }

        
    }

    public function addtocart(Request $request)
    {
        $code = Str::random(8);

        producttransaction::create([
            'transaction_id' => $code,
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id,
            'category_id' => $request->category_id,
            'qty' => $request->qty,
            'price' => $request->price,
            'size' => $request->size,
        ]);

        return redirect()->back()->with('status', 'Add to Cart Success!');
    }
}
