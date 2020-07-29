<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


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

    public function store(ProductRequest $request)
    {
        $product = Product::create($request->validated()); //This is a simplified format to create in the database
        return redirect()->route('products.index')->withSuccess("New Product with id {$product->id} was created"); // redirect is a new helper from laravel;
        // OR ->with(['success'=> "New Product with id {$product->id} was created"]); works with errors as well
    }

    public function show(Product $product) //Implicit model binging(Product $products)
    {

        //returing a view from a folder called products
        //$product = Product::findOrFail($product); // No needed due to model binding

        return view('products.show')->with([

            'product' => $product,
        ]);
    }


    public function edit(Product $product)
    {

        return view('products.edit')->with([
            'product' => $product,
        ]);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        return redirect()->route('products.index')->withSuccess("New Product with id {$product->id} was updated");; // redirect is a new helper from laravel
    }

    public function destroy(Product $product)
    {

        $product->delete();
        return redirect('products')->withSuccess("The product with id {$product->id} was deleted");;
    }
}
