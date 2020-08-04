<?php

namespace App\Http\Controllers;

use App\Order;
use App\product;
use App\User;
use App\Cart;
use Illuminate\Http\Request;
use App\Services\CartService;

class OrderController extends Controller
{
    public $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;

        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $cart = $this->cartService->getFromCookie();
        
        if (!isset($cart) || $cart->products->isEmpty()) {
            return redirect()->back()->withErrors('Your Cart is empty!');
        }
        return view('orders.create')->with([
            'cart'=>$cart,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $user= $request->user();

       $order= $user->orders()->create([
           'status'=>'pending',
       ]);
       
       $cart = $this->cartService->getFromCookie();
       $cartProductsWithQuantity=$cart->products->mapWithKeys(function($product){

           $elements[$product->id] = ['quantity'=>$product->pivot->quantity];
           return $elements;
       });

       $order->products()->attach($cartProductsWithQuantity->toArray());
        
       return redirect()->route('orders.payments.create',['order'=>$order->id]);
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
