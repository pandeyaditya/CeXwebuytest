<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* User Routes */

Route::get('/', 'UserController@index');
Route::get('/user','UserController@index');
Route::get('/user/test','UserController@test');
Route::get('/user/signup','UserController@signup');
Route::post('/user/checksignup','UserController@checksignup');
Route::get('/user/dashboard','UserController@dashboard');
Route::get('/logout','UserController@logout');
Route::post('/user/checklogin','UserController@checkuser');
Route::get('/checksession','UserController@checksession');



/* Routes for products */
Route::get('/allproducts','UserController@allproducts');
Route::get('/getproducts','ProductController@getproducts');
Route::get('/product/addtocart/{id}','ProductController@addtocart');
Route::get('/flushcart','ProductController@flushcart');
Route::get('/cart','ProductController@getcart');
Route::get('/emptycart','ProductController@emptycart');
Route::get('/removecart/{id}','ProductController@removecart');
Route::get('/checkout','ProductController@checkout');
Route::post('/confirmorder','ProductController@confirmorder');


/*
    Routes for Admin
*/
Route::get('/admin','AdminController@login');
Route::post('/admin/checklogin','AdminController@checkuser');
Route::get('/admin/addcategory','AdminController@addcategory');
Route::get('/admin/showcategories','AdminController@showcategories');
Route::get('/admin/addproduct','AdminController@addproduct');
Route::post('/admin/saveproduct','AdminController@saveproduct');
Route::get('/admin/showproducts','AdminController@showproducts');
Route::post('/admin/savecategory','AdminController@savecategory');
Route::get('/admin/showorders','AdminController@showorders');


/* Order API route */
Route::get('/orders',function(){
    return new App\Http\Resources\Order(App\Order::all());
});