@extends('admin_layout')
@section('admin_content')
<div class="row">
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
       Liệt kê đơn hàng
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        
                      
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          
          <span class="input-group-btn">
            
          </span>
        </div>
      </div>
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
            <th>Tên người đặt</th>
            <th>Tổng giá tiền</th>
            <th>Tình trạng</th>
            <th>Xóa</th>
           
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($all_order as $key => $order)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $order->customer_name}}</td>
            <td>{{ $order->order_total}}</td>
            <td>{{ $order->order_status}}</td>
            
            <td>
              <a onclick="return confirm('are you sure to delete?')" href="{{URL::to('/delete-order/'.$order->order_id)}}" class="active" ui-toggle-class="">
              <i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
         
        </div>
      </div>
    </footer>
  </div>
</div>
</div>
@endsection