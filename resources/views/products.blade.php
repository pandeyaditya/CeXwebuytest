@extends('layout.sitepage')
@section('content')
<div class="container text-center">
  @if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
  <!-- Cart List -->
  <br>
  @if(session('cart'))
  <div class="row">
  <h3 class="heading">Added to cart </h3>
  @foreach(session('cart') as $id => $details)
<!-- PRODUCT -->

<div class="row" style="border:1px dotted #eee">
    <?php $total_price = 0; ?>
       <div class="col-12 col-sm-12 col-md-2 text-center">
               <img class="img-responsive" src="{{ asset('storage/'.$details['image']) }}" alt="prewiew" width="120" height="80">
       </div>
       <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
           <h4 class="product-name"><strong>{{ $details['title'] }} </strong></h4>
           <h4>
               <small>{{ $details['description'] }}</small>
           </h4>
       </div>
       <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
           <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
               <h6><strong>{{ $details['price'] }}</strong></h6>
               <?php $total_price += $details['price']; ?>
           </div>
           <div class="col-4 col-sm-4 col-md-4">
               <div class="quantity">
                       <h6><strong> <span class="text-muted">x</span>{{ $details['quantity'] }}</strong></h6>                                   
               </div>
           </div>
           <div class="col-2 col-sm-2 col-md-2 text-right">
               <a href="{{ url('/removecart/'.$details['id']) }}" type="button" class="btn btn-outline-danger btn-xs">
                   <i class="fa fa-trash" aria-hidden="true"></i>
               </a>
           </div>
       </div>
      
   </div>   
@endforeach
<a class="btn btn-success" href="{{ url('/checkout/') }}" id="">Go to Checkout</a>
  </div>
 
  <hr>
  @endif
  <h3 class="heading"> Products </h3>
  <hr>
  <div class="row">   
    @foreach ($products as $product)
		<div class="col-sm-4">
      <p><strong>{{ $product->title }}</strong></p><br>
      <img src="{{ asset('storage/'.$product->image) }}" alt="Random Name" class="image_frontend" width="255" height="255">
      <p>{{ $product->price }}</p>
      <a class="btn btn-primary btn-small" href="{{ url('/product/addtocart/'.$product->id) }}" id="">Add to Cart</a>
    </div>
	@endforeach

     
  </div>
</div>
@endsection