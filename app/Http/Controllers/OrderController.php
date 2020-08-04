<?php

namespace App\Http\Controllers;

use App\Order;
use App\Cart;
use Illuminate\Http\Request;
use App\Services\CartService;

class OrderController extends Controller
{
    public $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
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
        //
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
