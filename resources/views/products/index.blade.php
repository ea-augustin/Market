@extends('layouts.master')
     @section('content')
    <h1>Products</h1>
    @empty($products)
    <div class="alert alert-warning">
        This list is empty!
    </div> 
    @else
   <div  class=" table table-responsive">
   <table class=" table table-striped">
   <thead class="thead-light">
       <th>Id</th>
       <th>Title</th>
       <th>description</th>
       <th>Price</th>
       <th>Stock</th>
       <th>Status</th>
   </thead>
   <tbody>
       @foreach ($products as $product)        
       <tr>
       <td>{{$product->id}}</td>
           <td>{{$product->title}}</td>
           <td>{{$product->description}}</td>
           <td>{{$product->price}}</td>
           <td>{{$product->stock}}</td>
           <td>{{$product->status}}</td>
       </tr>
       @endforeach
   </tbody>
   <tfoot class="thead-light">
    <th>Id</th>
    <th>Title</th>
    <th>description</th>
    <th>Price</th>
    <th>Stock</th>
    <th>Status</th>
</tfoot>
   </table>
</div>
@endif
@endsection