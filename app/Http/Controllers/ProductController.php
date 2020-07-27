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
        return view('products.create');
    }

    public function store()
    {   
        //The following format can be used:
        // $product = Product::create([
        //     'title' => request()->title,
        //     'description' => request()->description,
        //     'price' => request()->price,
        //     'stock' => request()->stock,
        //     'status' => request()->status,
        // ]);
        $product = Product::create(request()->all());//This is a simplified format to create in the database
        
        return redirect('products');
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
    {   $product = Product::findOrFail($product);
        return view('products.edit')->with([
            'product'=>$product,
        ]);
    }

    public function update($product)
    {

       $product=Product::findOrFail($product);
       $product->update(request()->all());
       return redirect('products');

    }

    public function destroy($product)
    {

        //
    }
}
