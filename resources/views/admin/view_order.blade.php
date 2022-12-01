@extends('admin_layout')
@section('admin_content')
<div class="row">
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
       Thông Tin Vận Chuyển
    </div>
   
    <div class="table-responsive">
    <?php
	                    $message = Session::get('message');
	                    if($message){
		                 echo $message;
		                  Session::put('message',null);
	                    }
	                     ?>
      <table class="table table-striped b-t b-light">
        <th>Tên người Vận Chuyển</th>
        <th>Số điện thoại</th>
        <th>Email</th>
        
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody> 
          <tr>
            <td>Nguyễn Minh Anh</td>
            <td>09653425443</td>
            <td>minhanhnguyen@gmail.com</td>
          </tr>
         
        </tbody>
      </table>
    </div>
   
  </div>
</div>
</div>

<br><br>
<div class="row">
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
       Thông Tin Khách hàng
    </div>
   
    <div class="table-responsive">
    <?php
	                    $message = Session::get('message');
	                    if($message){
		                 echo $message;
		                  Session::put('message',null);
	                    }
	                     ?>
      <table class="table table-striped b-t b-light">
        <th>Tên Khách hàng</th>
        <th>Địa chỉ</th>
        <th>Số điện thoại</th>
        <th>Email</th>
        <th>Ghi chú</th>
        <th>Hình thức thanh toán</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody> 
          <tr>
            <td>{{$shipping->shipping_name}}</td>
            <td>{{$shipping->shipping_address}}</td>
             <td>{{$shipping->shipping_phone}}</td>
             <td>{{$shipping->shipping_email}}</td>
             <td>{{$shipping->shipping_notes}}</td>
             <td>@if($shipping->shipping_method==0) Chuyển khoản @else Tiền mặt @endif</td>
          </tr>
         
        </tbody>
      </table>
    </div>
   
  </div>
</div>
</div>

<br><br>
<div class="row">
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
       Liệt kê chi tiết đơn hàng
    </div>
    <div class="table-responsive">
    <?php
	                    $message = Session::get('message');
	                    if($message){
		                 echo $message;
		                  Session::put('message',null);
	                    }
	                     ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên sản phẩm</th>
            <th>số lượng</th>
            <th>Gía sản phẩm</th>
            <th>Tổng tiền</th>
           
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @php
              $i = 0;
              $total = 0;
          @endphp
        @foreach($order_details as $key => $details)
          @php
             $i++;
             $subtotal = $details->product_price*$details->product_sales_quantity;
             $total+=$subtotal;
          @endphp
          <tr>
            <td><i>{{$i}}</i></td>
            <td>{{$details->product_name}}</td>
            <td><input type="number" min="1" value="{{$details->product_sales_quantity}}" name="product_sales_quantity"></td>
            <td>{{number_format($details->product_price,0,',','.')}}VNĐ</td>
            <td>{{number_format($subtotal,0,',','.')}}VNĐ</td>
          </tr>
          @endforeach
           <tr>
            <td>Thanh Toán: {{number_format($total,0,',','.')}}VNĐ</td>
           </tr>
           <tr>
            <td colspan="6">
              <form>
              <select class="form-control order_details">
               <option value="2">Đã xử lý-Đã giao hàng</option>
               <option value="3">Hủy Đơn Hàng</option>
              </select>
              </form>
            </td>
           </tr>
        </tbody>
      </table>
      <a target="_blank" href="{{url('/print-order/'.$details->order_code)}}">In Đơn Hàng</a>
    </div>
   
  </div>
</div>
</div>
@endsection