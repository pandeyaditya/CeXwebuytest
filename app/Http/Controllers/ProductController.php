<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Order;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

class ProductController extends Controller
{

    /* To load products page */
	public function getproducts(Request $request){
        if($request->session()->has('email')){
            $products = Product::all();
		    return view('products')->with('products',$products);
        }
        else{
            return redirect('/user');
        }        
	}
	
	/* To list all products in json */
	public function allproducts(){
		$products = Product::all();
    }
    
    /* Add to Cart */
    public function addtocart(Request $request){        
        $id = $request->id;
        //Find product 
        $product = Product::find($id);
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                    $id => [
                        "id"=>$product->id,
                        "title" => $product->title,
                        "quantity" => 1,
                        "description" => $product->description,
                        "price" => $product->price,
                        "image" => $product->image
                    ]
            ];

            session()->put('cart', $cart);

            return redirect('/getproducts')->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect('/getproducts')->with('success', 'Product added to cart successfully!');
        }
      
        // Add to cart array
        $cart[$id] = [
            "id"=>$product->id,
            "title" => $product->title,
            "category" => $product->category,
            "description" => $product->description,
            "image" => $product->image,
            "quantity"=>1,
            "price" => $product->price
        ];
        $request->session()->put('cart',$cart);       
        return redirect('/getproducts')->with('success', 'Product added to cart successfully!');
    }

    
    // Cart display
    public function getcart(Request $request){
        if($request->session()->has('email')){
            return view('cart');
        }
        else{
            return redirect('/user');
        }
    }

    /* To empty cart */
    public function emptycart(Request $request){
        if($request->session()->has('cart')){
            $request->session()->forget(['cart']);
            return redirect('/cart');
        }
    }

    /* To empty cart */
    public function removecart(Request $request){
        if($request->session()->has('cart')){
            $cart = $request->session()->get('cart');
            unset($cart[$request->id]);
            $request->session()->put('cart',$cart);
            return redirect('/cart');
        }
    }

    /* To load checkout page */
    public function checkout(Request $request){        
        if($request->session()->has('email')){
            return view('checkout');
        }
        else{
            return redirect('/user');
        }
    }


    /* To load confirm page */
    public function confirmorder(Request $request){
        $request->validate([
            'address'=>'required',
            'city'=>'required',
            'state'=>'required',
            'mobile'=>'required'
        ]);

        $cart = $request->session()->get('cart');
        
        if(!empty($cart)){
            $ids = array_keys($cart);
        }
        else{
            return redirect('/getproducts');
        }
        
        $order = new Order();
        $order->customer_id = $request->session()->get('id');
        $order->customer_email = $request->session()->get('email');
        $order->product_ids = json_encode($ids);
        $order->status = 'confirm';
        $order->address = $request->input('address');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->mobile = $request->input('mobile');
        $order->payment_method = $request->input('payment_method');
        $order->total_price = $request->input('total_price');

        $order->save();

        $request->session()->forget('cart');

        // Send EMail
        $email = $order->customer_email;
        $order_id = $order->id;
        Mail::to($order->customer_email)->send(new SendMailable($email));

        // Load confirm page, based on status
        return view('/confirmorder')->with(['order_id' => $order->id,'status' => 'Confirmed','total_price' => $order->total_price]);
        
    }



}
