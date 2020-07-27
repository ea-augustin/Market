<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //

    public function index()
    {

        //returing a view from a folder called products

        $products = Product::all();

        return view('products.index')->with([
            'products' => $products,
        ]);
    }

    public function create()
    {
        return 'This is a form to create products from controller';
    }

    public function store()
    {

        //
    }

    public function show($product)
    {

        //returing a view from a folder called products
        $product = Product::findOrFail($product);

        return view('products.show')->with([

            'product' => $product,
        ]);
    }


    public function edit($product)
    {
        return "Showing the form to edit {$product} from controller";
    }

    public function update($product)
    {

        //
    }

    public function destroy($product)
    {

        //
    }
}
