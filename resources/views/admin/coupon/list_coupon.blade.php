@extends('admin_layout')
@section('admin_content')
<div class="row">
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
       Liệt kê mã giảm giá
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <p><a href="{{url('/send-coupon')}}" class="btn btn-default">Gửi mã giảm giá khách hàng</a></p>           
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
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
            <th>Tên mã giảm giá</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày kết thúc</th>
            <th>Mã giảm giá</th>
            <th>Số lượng giảm giá</th>
            <th>Điều kiện giảm giá</th>
            <th>số giảm</th>
            <th>Tình Trạng</th>
            <th>Hết hạn</th>
          </tr>
        </thead>
        <tbody>
        @foreach($coupon as $key => $cou)
          <tr>
            
            <td>{{$cou->coupon_name}}</td>
            <td>{{$cou->coupon_date_start}}</td>
            <td>{{$cou->coupon_date_end}}</td>
            <td>{{$cou->coupon_code}}</td>
            <td>{{$cou->coupon_time}}</td>
            <td><span class="text-ellipsis">
            <?php
             if($cou->coupon_condition==1){
                ?>
                giảm theo %
              <?php
              }else{
                ?>
                giảm theo tiền
              <?php
              }
              ?>
            </span>
          </td>
          <td><span class="text-ellipsis">
            <?php
            if($cou->coupon_condition==1){
               ?>
               giảm {{$cou->coupon_number}} %
             <?php
             }else{
               ?>
               giảm {{$cou->coupon_number}} VNĐ
             <?php
             }
             ?>
             </span></td>
             <td><span class="text-ellipsis">
              <?php
               if($cou->coupon_status==1){
                  ?>
                  <span style="color:green">Đang kích hoạt</span>
                <?php
                }else{
                  ?>
                  <span style="color:red">Đã khóa</span>
                <?php
                }
                ?>
              </span>
            </td>
            <td>
                @if($cou->coupon_date_end>=$today)
                <span style="color:green">còn hạn</span>
                @else 
                <span style="color:green">Đã hết hạn</span>
                @endif
            </td>
            <td>
              <a onclick="return confirm('are you sure to delete?')" href="{{URL::to('/delete-coupon/'.$cou->coupon_id)}}" class="active" ui-toggle-class="">
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
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
</div>
@endsection