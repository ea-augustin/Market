@extends('layouts.app')
     @section('content')
    <h1>Payments Details</h1>

   <div class="text-right mb-3">
    <form class="d-inline" method="POST" action="{{route('orders.payments.store',['order'=>$order->id])}}">
        @csrf
        <button class="btn btn-success btn-sm" type="submit">Pay</button>
       </form>
   </div>

<h4 class="text-right"><strong>Grand Total: </strong>£{{$order->total}}</h4>

@endsection