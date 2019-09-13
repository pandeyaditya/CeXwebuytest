@extends('layout.adminpage')
@section('content')
<div class="container text-center">
  <h3>List of Categories in our Shop</h3>
  <a href="{{ url('/admin/addcategory') }}" class="btn btn-success btn-default pull-right">Add Category</a>
  <table width="100%" class="table-striped">
        <tr>
            <th>Id</th>
            <th>Category Name</th>
            <th>Created At</th>
        </tr>
        
        @foreach($categories as $category)
        <tr>
        <td>{{ $category->id }}</td>
          <td>{{ $category->category }}</td>
          <td>{{ $category->created_at }}</td>
        </tr>
       @endforeach

        </table>
</div>
@endsection