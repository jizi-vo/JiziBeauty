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
Route::get('/show-cart-ajax','App\Http\controllers\CartController@show_cart_ajax');
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

Route::get('/managee-order','App\Http\controllers\OrderController@managee_order');
Route::get('/view-order/{order_code}','App\Http\controllers\CheckoutController@view_order');


Route::get('/manage-order','App\Http\controllers\CheckoutController@manage_order');
Route::get('/view-order/{orderId}','App\Http\controllers\CheckoutController@view_order');

//sendmail
Route::get('/send-mail','App\Http\controllers\HomeController@send_mail');

//coupon
Route::get('/unset-coupon','App\Http\controllers\CouponController@unset_coupon');
Route::get('/check-coupon','App\Http\controllers\CartController@check_coupon');
Route::get('/insert-coupon','App\Http\controllers\CouponController@insert_coupon');
Route::get('/list-coupon','App\Http\controllers\CouponController@list_coupon');
Route::post('/insert-coupon-code','App\Http\controllers\CouponController@insert_coupon_code');
Route::get('/delete-coupon/{coupon_id}','App\Http\controllers\CouponController@delete_coupon');


//Delivery
Route::get('/delivery','App\Http\controllers\DeliveryController@delivery');
Route::post('/select-delivery','App\Http\controllers\DeliveryController@select_delivery');
Route::post('/insert-delivery','App\Http\controllers\DeliveryController@insert_delivery');
Route::post('/select-feeship','App\Http\controllers\DeliveryController@select_feeship');



//Banner
Route::get('/manage-banner','App\Http\controllers\sliderController@manage_banner');
Route::get('/add-slider','App\Http\controllers\sliderController@add_slider');
Route::post('/insert-slider','App\Http\controllers\sliderController@insert_slider');


//Post
Route::get('/add-category-post','App\Http\controllers\CategoryPost@add_category_post');
Route::get('/all-category-post','App\Http\controllers\CategoryPost@all_category_post');
Route::post('/save-category-post','App\Http\controllers\CategoryPost@save_category_post');
Route::get('/danh-muc-bai-viet','App\Http\controllers\CategoryPost@danh_muc_bai_viet');
Route::get('/edit-category-post/{category_post_id}','App\Http\controllers\CategoryPost@edit_category_post');
Route::post('/update-category-post/{cate_id}','App\Http\controllers\CategoryPost@update_category_post');
Route::get('/delete-category-post/{cate_id}','App\Http\controllers\CategoryPost@delete_category_post');

//post1
Route::get('/add-post','App\Http\controllers\PostController@add_post');
Route::post('/save-post','App\Http\controllers\PostController@save_post');
Route::get('/all-post','App\Http\controllers\PostController@all_post');
Route::get('/delete-post/{post_id}','App\Http\controllers\PostController@delete_post');

//danhmucbaiviet
Route::get('/danh-muc-bai-viet','App\Http\controllers\PostController@danh_muc_bai_viet');

//comment
Route::post('/load-comment','App\Http\controllers\ProductController@load_comment');
Route::get('/comment','App\Http\controllers\ProductController@list_comment');
Route::post('/send-comment','App\Http\controllers\ProductController@send_comment');
Route::post('/allow-comment','App\Http\controllers\ProductController@allow_comment');
Route::post('/reply-comment','App\Http\controllers\ProductController@reply_comment');


//lienhe
Route::get('/lien-he','App\Http\controllers\ContactController@lien_he');