@extends('layouts.app')
     @section('content')
    <h1>Order Details</h1>
   <div class="text-right mb-3">
    <form class="d-inline" method="POST" action="{{route('orders.store')}}">
        @csrf
        <button class="btn btn-success btn-sm" type="submit">Confirm Order</button>
       </form>
   </div>

   <div  class=" table table-responsive">
   <table class=" table table-striped">
   <thead class="thead-light">
       <th>Product</th>
       <th>Price</th>
       <th>Description</th>
       <th>Quantity</th>
       <th>total</th>
   </thead>
   <tbody>
       @foreach ($cart->products as $product)        
       <tr>
       <td><img src="{{asset($product->images->first()->path)}}" width="100"><a  class="btn btn-link" href="{{route('products.show', ['product'=>$product->id])}}">{{$product->title}}</a></td>
       {{-- <td>{{$product->id}}</td> --}}
       <td><a  class="btn btn-link" href="{{route('products.show', ['product'=>$product->id])}}"> £{{$product->price}}</a></td>
           {{-- <td>{{$product->title}}</td> --}}
           <td><a  class="btn btn-link" href="{{route('products.show', ['product'=>$product->id])}}">{{$product->description}}</a></td>
           {{-- <td>{{$product->description}}</td> --}}
           <td>{{$product->pivot->quantity}}</td>
           <td>£{{$product->total}}</td>
       </tr>
       @endforeach
   </tbody>
   <tfoot class="thead-light">
    <th>Product</th>
    <th>Price</th>
    <th>Description</th>
    <th>Quantity</th>
    <th>total</th>
</tfoot>
   </table>
</div>
<h4 class="text-right"><strong>Grand Total: </strong>£{{$cart->total}}</h4>

@endsection