@extends('layouts.master')
     @section('content')
    <h1>Products</h1>

    {{-- this link takes us to the create page --}}
    <a  class="btn btn-link" href="{{route('products.create')}}">Create</a> 

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
       <th>Actions</th>
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
           <td>
              <a  class="btn btn-link" href="{{route('product.show', ['product'=>$product->id])}}">Show</a>{{-- this link takes us to a page showing single --}}
              <a  class="btn btn-link" href="{{route('product.edit', ['product'=>$product->id])}}">Edit</a> {{-- this link takes us to the edit page --}}  
           </td>
       </tr>
       @endforeach
   </tbody>
   <tfoot class="thead-light">
    <th>Id</th>
    <th>Title</th>
    <th>description</th>
    <th>Price</th>
    <th>Stock</th>
    <th>Actions</th>
</tfoot>
   </table>
</div>
@endif
@endsection