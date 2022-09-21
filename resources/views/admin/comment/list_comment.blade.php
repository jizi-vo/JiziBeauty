@extends('admin_layout')
@section('admin_content')
<div class="row">
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
       Liệt kê  Comment
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
            <th>Duyệt</th>
            <th>Tên Người gửi</th>
            <th>Bình luận</th>
            <th>Ngày Gửi</th>
            <th>Sản Phẩm</th>
            <th>Quản lý</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        @foreach($comment as $key => $comm)
          <tr>
            <td>
                @if($comm->comment_status==1)
                   <input type="button" data-comment_id="{{$comm->comment_id}}" id="{{$comm->comment_product_id}}" class="btn btn-primary comment_duyet_btn" value="Duyệt">
                @else
                <input type="button" data-comment_id="{{$comm->comment_id}}" id="{{$comm->comment_product_id}}" class="btn btn-danger comment_boduyet_btn" value="Bỏ Duyệt">
                @endif
            </td>
            <td>{{ $comm->comment_name}}</td>
            <td>{{ $comm->comment}}
             <textarea rows="3"></textarea>
             <br><button>Trả lời bình luận</button>
            </td>
            <td>{{ $comm->comment_date}}</td>
            <td><a href="{{url('/chi-tiet/'.$comm->product->product_name)}}" target="_blank">{{ $comm->product->product_name}}</a></td>
            <td>
            <a href="" class="active" ui-toggle-class="">
              <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('are you sure to delete?')" href="" class="active" ui-toggle-class="">
              <i class="fa fa-times text-danger text"></i></a>
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