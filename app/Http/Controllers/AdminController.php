<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Order;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function login(){
        return view('adminlogin');
    }

    public function checkuser(Request $request){

		if($request->session()->has('email')){
			$products = Product::all();
			return redirect('/admin/showproducts')->with('products',$products);
		}
		else{
			
			$email = $request->input('email');
			$password = md5($request->input('password'));
		
			$request->validate([
				'email'=>'required',
				'password'=>'required'
			]);
			
			// if($request->session()->has('email')){
				//After validation 
				$result = \DB::table('users')
						->select('id','email','password')
						->where('email', '=', $email)
						->where('password', '=', $password)
						->get();
						
				if(count($result)>0){			
					// session(['email' => $email]);
					$request->session()->put('email',$email);
					$products = Product::all();
					return redirect('/admin/showproducts')->with('products',$products);
					// return view('products')->with('products',$products);
				}
				else{
					return redirect('admin/')->with('invalid_login', 'Invalid Credentials !');
				}
		}
    }
    

    	/*
		To load category addition page
	*/
	public function addcategory(){
		return view('addcategory');
    }
    
    public function showcategories(){
        $categories = Category::all();
		return view('showcategories')->with('categories',$categories);
	}


	/*
		To load product addition page
	*/
	public function addproduct(){
		$categories = Category::all();
		return view('addproduct')->with('categories',$categories);
    }

    public function saveproduct(Request $request){
        
        $request->validate([
            'product_name'       =>'required',
            'product_category'   =>'required',
            'product_description'=>'required',
            'product_price'      =>'required',
            'product_image'     => 'required|image|mimes:jpeg,png,jpg,gif|max:12048'

        ]);
        
        $product_image = $request->file('product_image');
        $extension = $product_image->getClientOriginalExtension();
        Storage::disk('public')->put($product_image->getFilename().'.'.$extension,  File::get($product_image));

        $product = new Product();
        
        $product->title = $request->product_name;
        $product->category = $request->product_category;
        $product->description = $request->product_description;
        $product->image = $product_image->getFilename().'.'.$extension;
        $product->price = $request->product_price;

        $product->save();

        return redirect('admin/addproduct')->with('productstatus','Product Added Successfully');
    }
    
        
    public function showproducts(){
        $products = Product::all();
		return view('showproducts')->with('products', $products);
	}


	/**
	 * To save category 
	 */
	public function savecategory(Request $request){
        $request->validate([
            'categoryname'=>'required'
        ]);

		$category     = new Category();
		$category->category = $request->input('categoryname');
		$category->save();
		return redirect('/admin/addcategory')->with('categorystatus','Category Added Successfully');
	}

	/* To show order */
	public function showorders(Request $request){
		$orders = Order::all();
		return view('showorders')->with('orders',$orders);
	}
}
