@extends('layout')
@section('content')
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
                    Đang chờ xử lý
                @endif
            </td>
            <td>
                <!-- Trigger the modal with a button -->
        <p><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#huydon">Hủy đơn hàng</button></p>

      <!-- Modal -->
      <div id="huydon" class="modal fade" role="dialog">
    <div class="modal-dialog">
     <form>
      @csrf
    <!-- Modal content-->
     <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Lý do hủy đơn hàng</h4>
        </div>
        <div class="modal-body">
        <p><textarea rows="5" class="lydohuydon" required placeholder="Lý do hủy đơn hàng.....(bắt buộc)"></textarea></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" id="{{$ord->order_code}}" onclick="Huydonhang(this.id)" class="btn btn-success">Gửi</button>
        </div>
      </div>
     </form>
      </div>
      </div>
                <p><a href="{{URL::to('/view-history-order/'.$ord->order_code)}}" class="active styling-edit" ui-toggle-class="">
                  Xem đơn hàng</a></p>
  
                {{--<a onclick="return confirm('Bạn có chắc là muốn xóa đơn hàng này ko?')" href="{{URL::to('/delete-order/'.$ord->order_code)}}" class="active styling-edit" ui-toggle-class="">
                  <i class="fa fa-times text-danger text"></i>
                </a>--}}
  
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