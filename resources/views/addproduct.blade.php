@extends('layout.adminpage')
@section('content')
<div class="row">
	  <div class="col-md-3"></div>
	  <div class="col-md-6">
		@if (session('invalid_login'))
			<div class="alert alert-danger">
				{{ session('invalid_login') }}
			</div>
        @endif        
        <br>
		@if (session('productstatus'))
            <div class="alert alert-success">
                {{ session('productstatus') }}
            </div>
        @endif
	    <form class="form-signup" name="frmsignup" action="{{ url('/admin/saveproduct') }}" method="post" enctype="multipart/form-data">
        <h2 class="form-signup-heading">Add Product</h2>
        
        <div>
            <label>Product Name : </label>
            <input type="text" class="form-control" name="product_name" id="product_name">            
            <div class="error">{{ $errors->first('product_name') }}</div>       
        </div> 
        <br/>

        <div>
            <label>Product Category : </label>
            <!-- <input type="text" class="form-control" name="product_category" id="product_category">             -->
            <select name ="product_category" class="form-control">
            <option value="">Select Category</option>
            @foreach($categories as $category)
            <option value="{{ $category->category }}">{{ $category->category }}</option>
            @endforeach
            </select>
            <div class="error">{{ $errors->first('product_category') }}</div> 
        </div> 
        <br/>

        <div>
            <label>Product Description : </label>
            <input type="text" class="form-control" name="product_description" id="product_description">            
            <div class="error">{{ $errors->first('product_description') }}</div> 
        </div>             
        <br/>

        <div>
            <label>Product Image : </label>
            <input type="file" class="form-control" name="product_image" id="product_image">
        </div>       
        <br/>

        <div>
            <label>Product Price : </label>
            <input type="text" class="form-control" name="product_price" id="product_price">
            <div class="error">{{ $errors->first('product_price') }}</div>
        </div> 
        <br/>
        
		
		<br/>
		 {{ csrf_field() }}
        <input type="submit" name="submit" id="submit" class="btn btn-lg btn-primary btn-block" value="Add Product">
       
      </form>

    </div>
	<div class="col-md-3"></div>	
    </div>
    </div>
@endsection