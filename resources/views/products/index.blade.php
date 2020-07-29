@extends('layouts.app')
     @section('content')
    <h1>Products</h1>

    {{-- this link takes us to the create page --}}
    <a  class="btn btn-primary mb-3" href="{{route('products.create')}}">Create</a> 

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
       <th>Description</th>
       <th>Price</th>
       <th>Stock</th>
       <th>Status</th>
       <th>Actions</th>
   </thead>
   <tbody>
       @foreach ($products as $product)        
       <tr>
       <td>{{$product->id}}</td>
       <td><a  class="btn btn-link" href="{{route('product.show', ['product'=>$product->id])}}">{{$product->title}}</a></td>
           {{-- <td>{{$product->title}}</td> --}}
           <td><a  class="btn btn-link" href="{{route('product.show', ['product'=>$product->id])}}">{{$product->description}}</a></td>
           {{-- <td>{{$product->description}}</td> --}}
           <td>{{$product->price}}</td>
           <td>{{$product->stock}}</td>
           <td>{{$product->status}}</td>
           <td>
              <a  class="btn btn-primary btn-sm" href="{{route('product.show', ['product'=>$product->id])}}">Show</a>{{-- this link takes us to a page showing single --}}
              <a  class="btn btn-warning btn-sm" href="{{route('product.edit', ['product'=>$product->id])}}">Edit</a> {{-- this link takes us to the edit page --}} 
           <form class="d-inline" method="POST" action="{{route('product.destroy', ['product'=>$product->id])}}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
           </form> 
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