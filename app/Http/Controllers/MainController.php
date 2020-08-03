<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;

class MainController extends Controller
{
    //

    public function index(){

        //returing a view from a folder called products
        $products = Product::available()->get();
        return view('welcome')->with([
            'products'=>$products,
        ]);
    }
}
