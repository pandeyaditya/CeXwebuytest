@extends('layout.sitepage')
@section('content')
<div class="container">
<div class="card shopping-cart">
            <div class="card-header bg-dark text-light">
            <?php $total_price = 0; ?>
            @if(session('cart'))
            @foreach(session('cart') as $id => $details)

                 <!-- PRODUCT -->
                 <div class="row">
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
                                    <h6><strong><span class="text-muted">x</span> {{ $details['quantity'] }} </strong></h6>                                   
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
            @endif
            </div>
            <div class="card-body">

            <br/><hr>
            <p style="float:left;"><h4>Enter Shipping Details</h4></p>
            <form method="post" action="{{ url('/confirmorder') }}">
            <div>
                <label> Address : </label><input type="text" class="form-control" name="address" id="address">
                <div class="error">{{ $errors->first('address') }}</div>
            </div><br/>            
            <div>
                <label> City : </label>
                <select class="form-control" name="city">
                    <option value="Mumbai">Mumbai</option>
                </select>
                <div class="error">{{ $errors->first('city') }}</div>
            </div><br/>            
            <div>
                <label> State : </label>
                <select  class="form-control" name="state">
                    <option value="Maharashtra">Maharashtra</option>
                </select>
                <div class="error">{{ $errors->first('state') }}</div>
            </div><br/>            
            <div>
                <label> Mobile : </label> <input type="number"  class="form-control" name="mobile" id="mobile" maxlength="10">
                <div class="error">{{ $errors->first('mobile') }}</div>
            </div><br/>
            
            <div class="">
                <label> Payment Method : </label>
            </div><br/>
            <!-- <input type="radio" name="cash_on_delivery" value="1">Cash On Delivery -->
                <select class="form-control" name="payment_method">
                    <option value="cash">Cash On Delivery</option>
                </select><br/>

                <label>Total price:  </label> 
                <input type="text" class="form-control" readonly name="total_price" id="total_price" value="{{ $total_price }}">
                {{ csrf_field() }}
                <br/>
                <input type="submit" class="btn btn-success btn-lg" value="Confirm Order">
            </form>

            </div>            
        </div>
   
</div>
@endsection