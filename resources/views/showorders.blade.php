@extends('layout.adminpage')
@section('content')
<div class="container text-center">
  <h3>Order List</h3>
  <div class="row">
    <div class="col-md-10">   
   <table width="100%" class="table-striped">
        <tr>
            <th>Order Id</th>
            <th>Customer Id</th>
            <th>Customer Email</th>
            <th>Order Status</th>
            <th>Payment Mode</th>
            <th>Total Price</th>
        </tr>   
       @foreach($orders as $order)
        <tr>
          <td>{{ $order->id }}</td>
          <td>{{ $order->customer_id }}</td>
          <td>{{ $order->customer_email }}</td>
          <td>{{ $order->status }}</td>          
          <td>{{ $order->payment_method }}</td>
          <td>{{ $order->total_price }}</td>
        </tr>
       @endforeach
    </table>
</div>
  </div>
</div>
@endsection