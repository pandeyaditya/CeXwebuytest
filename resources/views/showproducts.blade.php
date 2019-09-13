@extends('layout.adminpage')
@section('content')
<div class="container text-center">
  <a class="pull-right btn btn-success pull-right" href="{{ url('admin/addproduct') }}">Add Product</a>  
  <h3>List of Products in our Shop</h3>
  <div class="row">
    <div class="col-md-10">   
   <table width="100%" class="table-striped">
        <tr>
            <th>Product</th>
            <th>Product Image</th>
            <th>Product Category</th>
            <th>Product Description</th>
            <th>Product Price</th>
        </tr>   
       @foreach($products as $product)
        <tr>
          <td>{{ $product->title }}</td>
          <td><img class="image_backend" src="{{ asset('storage/'.$product->image) }}"></td>
          <td>{{ $product->category }}</td>
          <td>{{ $product->description }}</td>
          <td>{{ $product->price }}</td>          
        </tr>
       @endforeach
    </table>
</div>
  </div>
</div>
@endsection