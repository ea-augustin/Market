<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $rules = [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'price' => ['required', 'min:1'],
            'stock' => ['required', 'min:0'],
            'status' => ['required', 'in:available,unavailable'],
        ];
        request()->validate($rules);

        if (request()->stock == 0 && request()->status == 'available') {
            // session()->flash('error', 'If available must have stock');
            return redirect()->back()->withInput(request()->all())->withErrors('If available must have stock'); //with errors formula
        } //this if is to ensure that stock cannot be available and 0

        $product = Product::create(request()->all()); //This is a simplified format to create in the database
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

    public function update(Product $product)
    {
        $rules = [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'price' => ['required', 'min:1'],
            'stock' => ['required', 'min:0'],
            'status' => ['required', 'in:available,unavailable'],
        ];
        request()->validate($rules);



        $product->update(request()->all());
        return redirect()->route('products.index')->withSuccess("New Product with id {$product->id} was updated");; // redirect is a new helper from laravel
    }

    public function destroy(Product $product)
    {

        $product->delete();
        return redirect('products')->withSuccess("The product with id {$product->id} was deleted");;
    }
}
