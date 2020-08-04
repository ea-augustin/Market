@extends('layouts.app')
@section( 'content')
<h1>Your Cart</h1>
@if(!isset($cart) || $cart->products->isEmpty())
    <div class="alert alert-warning">
        Your Cart Is Empty!
    </div>
    @else
<a class="btn btn-success mb-3" href="{{route('orders.create')}}">Order Now</a>
    <div class="row">
    @foreach($cart->products as $product)
    <div class="col-3">
    @include('components.product-card')
    
</div>
    @endforeach
</div>
@endif
@endsection