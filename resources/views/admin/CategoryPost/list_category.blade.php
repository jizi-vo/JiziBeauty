@extends('admin_layout')
@section('admin_content')
<div class="row">
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
       Liệt kê danh mục bài viết
    </div>
    <div class="row w3-res-tb">
      
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
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
            <th>Tên danh mục bài viết</th>
            <th>Trạng Thái</th>
           
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        @foreach($category_post as $key => $cate_post)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $cate_post->cate_post_name}}</td>
            <td>
                @if($cate_post->cate_post_status==0)
                   Hiển thị    
                @else
                   Ẩn 
                @endif
            <a href="{{URL::to('/edit-category-post/'.$cate_post->cate_post_id)}}" class="active" ui-toggle-class="">
              <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('are you sure to delete?')" href="{{URL::to('/delete-category-post/'.$cate_post->cate_post_id)}}" class="active" ui-toggle-class="">
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
          <ul class="pagination pagination-sm m-t-none m-b-none">
           {!!$category_post->links()!!}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
</div>
@endsection