@extends('admin_layout')
@section('admin_content')
<div class="row">
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
       Liệt kê đơn hàng
    </div>
    <div class="row w3-res-tb">
      
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
            <th>Thứ Tự</th>
            <th>Mã đơn hàng</th>
            <th>Ngày tháng đặt hàng</th>
            <th>Tình Trạng đơn hàng </th>
            <th>Hiển Thị</th>
           
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @php 
            $i = 0;
            @endphp
            @foreach($order as $key => $ord)
              @php 
              $i++;
              @endphp
            <tr>
          <tr>
            <td><i>{{$i}}</i></label></td>
            <td>{{ $ord->order_code }}</td>
            <td>{{ $ord->created_at }}</td>
            <td>@if($ord->order_status==1)
                   Đơn hàng mới
                @else
                    Đã xử lý
                @endif
            </td>
            <td>
                <a href="{{URL::to('/view-order/'.$ord->order_code)}}" class="active styling-edit" ui-toggle-class="">
                  <i class="fa fa-eye text-success text-active"></i></a>
  
                <a onclick="return confirm('Bạn có chắc là muốn xóa đơn hàng này ko?')" href="{{URL::to('/delete-order/'.$ord->order_code)}}" class="active styling-edit" ui-toggle-class="">
                  <i class="fa fa-times text-danger text"></i>
                </a>
  
              </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    
  </div>
</div>
</div>
@endsection