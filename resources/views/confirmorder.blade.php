@extends('layout.sitepage')
@section('content')
<style>
    b{
        text-decoration: underline;
    }
</style>
<div class="container">
<div class="card shopping-cart">
    <div class="alert alert-success">
        <h2> Thank You for your Order :) </h2>
    </div>
    <div class="card-body" style="font-weight:15px;">            
        
        <h3> Your order is {{ $status }}  </h3>
        <h3>Here is your order summary </h3>
        <p>
            <b>Order Id : </b>{{ $order_id }} <br>
            <b>Your Payment Amount : </b>{{ $total_price }}<br>
        </p>

    </div>

</div>
   
</div>
@endsection