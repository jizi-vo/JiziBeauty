@extends('admin_layout')
@section('admin_content')
<div class="row">
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
       Liệt kê Banner
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
                      
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          
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
            <th>Tên Slide</th>
            <th>Hình ảnh</th>
            <th>Mô Tả</th>
            <th>Tình Trạng</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        @foreach($all_slide as $key => $slide)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $slide->slider_name}}</td>
            <td><img src="public/upload/slider/{{ $slide->slider_image }}" height="120" width="200"></td>
            <td>{{ $slide->slider_desc}}</td>
            <td><span class="text-ellipsis">
            <?php
             if($slide->slider_status==1){
                ?>
               <a href="{{URL::to('/unactive-slide/'.$slide->slider_id)}}"><span class="fa fa-eye"></span></a>
              <?php
              }else{
                ?>
                 <a href="{{URL::to('/active-slide/'.$slide->slider_id)}}"><span class="fa fa-eye-slash"></span></a>
              <?php
              }
              ?>
            </span></td>
            
            <td>
              <a onclick="return confirm('are you sure to delete?')" href="{{URL::to('/delete-slide/'.$slide->slider_id)}}" class="active" ui-toggle-class="">
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