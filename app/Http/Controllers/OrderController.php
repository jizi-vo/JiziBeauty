<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Feeship;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Shipping;
use App\Models\Customer;
use App\Models\Coupon;
use App\Models\Product;
use PDF;
class OrderController extends Controller
{
   
    public function view_order($order_code){
		$order_details = OrderDetails::with('product')->where('order_code',$order_code)->get();
		$order = Order::where('order_code',$order_code)->get();
		foreach($order as $key => $ord){
			$customer_id = $ord->customer_id;
			$shipping_id = $ord->shipping_id;
			$order_status = $ord->order_status;
		}
		$customer = Customer::where('customer_id',$customer_id)->first();
		$shipping = Shipping::where('shipping_id',$shipping_id)->first();

		$order_details_product = OrderDetails::with('product')->where('order_code', $order_code)->get();

		foreach($order_details_product as $key => $order_d){

			$product_coupon = $order_d->product_coupon;
		}
		if($product_coupon != 'no'){
			$coupon = Coupon::where('coupon_code',$product_coupon)->first();
			$coupon_condition = $coupon->coupon_condition;
			$coupon_number = $coupon->coupon_number;
		}else{
			$coupon_condition = 2;
			$coupon_number = 0;
		}
		
		return view('admin.view_order')->with(compact('order_details','customer','shipping','order_details','coupon_condition','coupon_number','order','order_status'));

	}

    public function managee_order(){
    	$order = Order::orderby('created_at','DESC')->paginate(5);
    	return view('admin.managee_order')->with(compact('order'));
    }

	public function history(){
		if(!Session::get('customer_id')){
             return redirect('dang-nhap')->with('error','vui lòng đăng nhap để xem lịch sử đơn hàng');
		}
	}

	public function update_order_qty(Request $request){
		$data = $request->all();
        $order = Order::find($data['order_id']);
		$order->order_status = $data['order_status'];
		$order->save();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
		$title_mail = "Đơn hàng đã được xác nhận".' '.$now;
		$customer = Customer::where('customer_id',$order->customer_id)->first();
		$data['email'][] = $customer->customer_email;

		//foreach($data)


		if($order->order_status==2){
			foreach($data['order_product_id'] as $key => $product_id){
                 $product = Product::find($product_id);
				 $product_quantity = $product->product_quantity;
				 $product_sold = $product->product_sold;
				foreach($data['quantity'] as $key1 => $pty){

					if($key==$key1){
                       $pro_remain = $product_quantity - $qty;
					   $product->product_quantity = $pro_remain;
                       $product->product_sold = $product_sold + $qty;
					   $product->save();
					}
				
				}
			}
		}
	}
	public function update_qty(Request $request){
            $data = $request->all();
			$order_details = OrderDetails::where('product_id',$data['order_product_id'])->where('order_code',$data['order_code'])->first();
			$order_details->product_sales_quantity = $data['order_qty'];
			$order_details->save();
	}
}
