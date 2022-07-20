<?php
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
//frontend
Route::get('/',[HomeController::class,'index']);

Route::get('/trang-chu','App\Http\controllers\HomeController@index');
Route::post('/tim-kiem','App\Http\controllers\HomeController@search');


//danh muc san pham trang chu
Route::get('/danh-muc-san-pham/{category_id}','App\Http\controllers\CategoryProduct@show_category_home');
Route::get('/thuong-hieu-san-pham/{brand_id}','App\Http\controllers\BrandProduct@show_brand_home');
Route::get('/chi-tiet-san-pham/{product_id}','App\Http\controllers\ProductController@details_product');

//backend

Route::get('/admin','App\Http\controllers\AdminController@index');
Route::get('/dashboard','App\Http\controllers\AdminController@show_dashboard');
Route::get('/logout','App\Http\controllers\AdminController@logout');
Route::post('/admin-dashboard','App\Http\controllers\AdminController@dashboard');

//Category Product
Route::get('/add-category-product','App\Http\controllers\CategoryProduct@add_category_product');
Route::get('/edit-category-product/{category_product_id}','App\Http\controllers\CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{category_product_id}','App\Http\controllers\CategoryProduct@delete_category_product');
Route::get('/all-category-product','App\Http\controllers\CategoryProduct@all_category_product');
Route::get('/unactive-category-product/{category_product_id}','App\Http\controllers\CategoryProduct@unactive_category_product');
Route::get('/active-category-product/{category_product_id}','App\Http\controllers\CategoryProduct@active_category_product');
Route::post('/save-category-product','App\Http\controllers\CategoryProduct@save_category_product');
Route::post('/update-category-product/{category_product_id}','App\Http\controllers\CategoryProduct@update_category_product');


//brand
Route::get('/add-brand-product','App\Http\controllers\BrandProduct@add_brand_product');
Route::get('/edit-brand-product/{brand_product_id}','App\Http\controllers\BrandProduct@edit_brand_product');
Route::get('/delete-brand-product/{brand_product_id}','App\Http\controllers\BrandProduct@delete_brand_product');
Route::get('/all-brand-product','App\Http\controllers\BrandProduct@all_brand_product');
Route::get('/unactive-brand-product/{brand_product_id}','App\Http\controllers\BrandProduct@unactive_brand_product');
Route::get('/active-brand-product/{brand_product_id}','App\Http\controllers\BrandProduct@active_brand_product');
Route::post('/save-brand-product','App\Http\controllers\BrandProduct@save_brand_product');
Route::post('/update-brand-product/{brand_product_id}','App\Http\controllers\BrandProduct@update_brand_product');


//Product
Route::get('/add-product','App\Http\controllers\ProductController@add_product');
Route::get('/edit-product/{product_id}','App\Http\controllers\ProductController@edit_product');
Route::get('/delete-product/{product_id}','App\Http\controllers\ProductController@delete_product');
Route::get('/all-product','App\Http\controllers\ProductController@all_product');
Route::get('/unactive-product/{product_id}','App\Http\controllers\ProductController@unactive_product');
Route::get('/active-product/{product_id}','App\Http\controllers\ProductController@active_product');
Route::post('/save-product','App\Http\controllers\ProductController@save_product');
Route::post('/update-product/{product_id}','App\Http\controllers\ProductController@update_product');


//cart
Route::post('/save-cart','App\Http\controllers\CartController@save_cart');
Route::post('/add-cart-ajax','App\Http\controllers\CartController@add_cart_ajax');
Route::get('/show-cart','App\Http\controllers\CartController@show_cart');
Route::get('/delete-to-cart/{rowId}','App\Http\controllers\CartController@delete_to_cart');
Route::post('/update-cart-quantity','App\Http\controllers\CartController@update_cart_quantity');

//Checkout
Route::get('/login-checkout','App\Http\controllers\CheckoutController@login_checkout');
Route::post('/add-customer','App\Http\controllers\CheckoutController@add_customer');
Route::get('/checkout','App\Http\controllers\CheckoutController@checkout');
Route::post('/save-checkout-customer','App\Http\controllers\CheckoutController@save_checkout_customer');
Route::get('/logout-checkout','App\Http\controllers\CheckoutController@logout_checkout');
Route::post('/login-customer','App\Http\controllers\CheckoutController@login_customer');

Route::get('/payment','App\Http\controllers\CheckoutController@payment');
Route::post('/order-place','App\Http\controllers\CheckoutController@order_place');

//order
Route::get('/manage-order','App\Http\controllers\CheckoutController@manage_order');
Route::get('/view-order/{orderId}','App\Http\controllers\CheckoutController@view_order');

//sendmail
Route::get('/send-mail','App\Http\controllers\HomeController@send_mail');