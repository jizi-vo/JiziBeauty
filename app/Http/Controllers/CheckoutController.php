<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;
use Session;
use Str;
use App\Models\Feeship;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Customer;
use App\Models\Product;
use App\Http\Requests;
use PDF;
use Illuminate\Support\Facades\Redirect;
session_start();

class CheckoutController extends Controller
{
  public function AuthLogin(){
    $admin_id = Session::get('admin_id');
    if($admin_id){
      return Redirect::to('dashboard');
    }else{
        return Redirect::to('admin')->send();
    }
}

public function view_order($order_code){
       $order_details = OrderDetails::with('product')->where('order_code',$order_code)->get();
       $order = Order::where('order_code',$order_code)->get();
       foreach($order as $key => $ord){
        $customer_id = $ord->customer_id;
        $shipping_id = $ord->shipping_id;
       }
       $customer = Customer::where('customer_id',$customer_id)->first();
       $shipping = Shipping::where('shipping_id',$shipping_id)->first();
       //$order_details_product = OrderDetails::with('product')->where('order_code',$order_code)->get();
       return view('admin.view_order')->with(compact('order_details','customer','shipping','order'));
}

public function print_order($checkout_code){
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($this->print_order_convert($checkout_code));
    return $pdf->stream();
}
public function print_order_convert($checkout_code){
      $order_details = OrderDetails::where('order_code',$checkout_code)->get();
      $order = Order::where('order_code',$checkout_code)->get();
      foreach($order as $key => $ord){
        $customer_id = $ord->customer_id;
        $shipping_id = $ord->shipping_id;
      }
      $customer = Customer::where('customer_id',$customer_id)->first();
      $shipping = Shipping::where('shipping_id',$shipping_id)->first();
      $order_details_product = OrderDetails::with('Product')->where('order_code',$checkout_code)->get();
      $output = '';
      $output.='<style>body{
        font-family: DejaVu Sans;
      }
      .table-styling{
        border:1px solid #000;
      }
      .table-styling tbody tr td{
        border:1px solid #000;
      }
      </style>
      <h1><center>SHOP CHARM BEAUTY</center></h1>
      <h4><center>Độc Lập - Tự Do - Hạnh Phúc</center></h4>
      <p>Người đặt hàng</p>
      <table class="table-styling">
            <thead>
            <tr>
                <th>Tên Khách Hàng</th>
                <th>Số Điện Thoại Khách</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>';
        $output.='
            <tr>
                <td>'.$customer->customer_name.'</td>
                <td>'.$customer->customer_phone.'</td>
                <td>'.$customer->customer_email.'</td>
            </tr>';
          
        $output.='
            </tbody>
      </table>
      <p>Ship hàng tới</p>
      <table class="table-styling">
            <thead>
            <tr>
                <th>Tên người ship hàng</th>
                <th>Địa Chỉ Ship</th>
                <th>Số Điện Thoại shiper</th>
                <th>Ghi Chú </th>
            </tr>
            </thead>
            <tbody>';
        $output.='
            <tr>
                <td>Nguyễn Minh Anh</td>
                <td>'.$shipping->shipping_address.'</td>
                <td>09653425443</td>
                <td>'.$shipping->shipping_notes.'</td>
            </tr>';
          
        $output.='
            </tbody>
      </table>
      <p>Đơn hàng đặt</p>
      <table class="table-styling">
            <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Gía sản phẩm</th>
                <th>Thành tiền</th>
            </tr>
            </thead>
            <tbody>';
            $total = 0;
            foreach($order_details_product as $key => $product){
            $subtotal = $product->product_price*$product->product_sales_quantity;
            $total+=$subtotal;
        $output.='
            <tr>
                <td>'.$product->product_name.'</td>
                <td>'.$product->product_sales_quantity.'</td>
                <td>'.number_format($product->product_price,0,',','.').'VNĐ'.'</td>
                <td>'.number_format($subtotal,0,',','.').'VNĐ'.'</td>
            </tr>';
    }
    $output.='<tr>
        <td colspan="2">
        <p>Thanh Toán:'.number_format($total,0,',','.').'VNĐ'.'</p>
        </td>
    </tr>';
        $output.='
            </tbody>
      </table>
      <p>Ký tên</p>
      <table>
      <thead>
           <tr>
              <th width="200px">Người lập phiếu</th>
              <th width="800px">Người nhận</th>
           </tr>
      </thead>
      <tbody>';
          $output.='
      </tbody>
      </table>
      ';
      return $output;
}


  public function login_checkout(){
      $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
      $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
      return view('pages.checkout.login_checkout')->with('category',$cate_product)->with('brand',$brand_product);
  }
  public function add_customer(Request $request){
               $data = array();
               $data['customer_name'] = $request->customer_name;
               $data['customer_phone'] = $request->customer_phone;
               $data['customer_email'] = $request->customer_email;
               $data['customer_password'] = $request->customer_password;

               $customer_id = DB::table('tbl_customers')->insertGetId($data);
               Session::put('customer_id',$customer_id);
               Session::put('customer_name',$request->customer_name);
               return Redirect::to('/checkout');

  }
  public function checkout(){
      $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
      $brand_product =DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
      return view('pages.checkout.show_checkout')->with('category',$cate_product)->with('brand',$brand_product);
  }
  public function save_checkout_customer(Request $request){
    $data = array();
    $data['shipping_name'] = $request->shipping_name;
    $data['shipping_phone'] = $request->shipping_phone;
    $data['shipping_email'] = $request->shipping_email;
    $data['shipping_notes'] = $request->shipping_notes;
    $data['shipping_address'] = $request->shipping_address;

    $shipping_id = DB::table('tbl_shipping')->insertGetId($data);
    Session::put('shipping_id',$shipping_id);
    return Redirect::to('/payment');

  }
  public function payment(){
    $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
    $brand_product =DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
    return view('pages.checkout.payment')->with('category',$cate_product)->with('brand',$brand_product);
  }
  public function order_place(Request $request){
    
   $data = array();
   $data['payment_method'] = $request->payment_option;
   $data['payment_status'] = 'Dang cho xu ly';
   $payment_id = DB::table('tbl_payment')->insertGetId($data);
   $new_order_code = Str::uuid();   

   $order_data = array();
   $order_data['customer_id'] = Session::get('customer_id');
   $order_data['shipping_id'] = Session::get('shipping_id');
   $order_data['payment_id']  = $payment_id;
   $order_data['order_total'] = cart::total();
   $order_data['order_status'] = 'Dang cho xu ly';
   $order_data['order_code'] = $new_order_code;
 

   $order_id = DB::table('tbl_order')->insertGetId($order_data); 
  

   $content = Cart::content();
   foreach($content as $v_content){
   $order_d_data['order_id'] = $order_id;
   $order_d_data['product_id'] = $v_content->id;
   $order_d_data['product_name'] = $v_content->name;
   $order_d_data['product_price'] = $v_content->price;
   $order_d_data['product_sales_quantity'] = $v_content->qty;
   $order_d_data['order_code'] = $new_order_code;
   DB::table('tbl_order_details')->insert($order_d_data);
   }
   if($data['payment_method']==1){
    echo 'Thanh toán thẻ ATM';
   }elseif($data['payment_method']==2){
    Cart::destroy();
    $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
    $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
    return view('pages.checkout.handcash')->with('category',$cate_product)->with('brand',$brand_product);
   }else{
    echo 'thẻ ghi nợ';
   }
  
   // return Redirect::to('/payment'); 
  }
  public function logout_checkout(){
    Session::flush();
    return Redirect::to('/login-checkout');
  }
  public function login_customer(Request $request){
      $email = $request ->email_account;
      $password = $request ->password_account;
      $result = DB::table('tbl_customers')->where('customer_email',$email)->where('customer_password',$password)->first();
      if($result){
        Session::put('customer_id',$result->customer_id);
        return Redirect::to('/checkout');
      }else{
        return Redirect::to('/login-checkout');
      }
     

  }
  public function manage_order(){
     $this->AuthLogin();
     $all_order = DB::table('tbl_order')
     ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
     ->select('tbl_order.*','tbl_customers.customer_name')
     ->orderby('tbl_order.order_id','desc')->get();
     $manager_order = view('admin.manage_order')->with('all_order',$all_order);
    return view('admin_layout')->with('admin.manage_order',$manager_order);
  }

  public function history(){
    if(!Session::get('customer_id')){
         return redirect('dang-nhap')->with('error','vui lòng đăng nhập để xem lịch sử đơn hàng');
    }else{
      $order = Order::orderby('created_at','DESC')->paginate(5);
    	return view('admin.managee_order')->with(compact('order'));

    }
  }
}
