@extends('admin_layout')
@section('admin_content')
<div class="row">
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
       Liệt kê  sản phẩm
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
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Hình sản phẩm</th>
            <th>Danh mục</th>
            <th>thương hiệu</th>
            <th>Hiển thị</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        @foreach($all_product as $key => $pro)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $pro->product_name}}</td>
            <td>{{ $pro->product_quantity}}</td>
            <td>{{ $pro->product_price}}</td>
            <td><img src="public/upload/product/{{ $pro->product_image}}" height="100" width="100"></td>
            <td>{{ $pro->category_name}}</td>
            <td>{{ $pro->brand_name}}</td>
            <td><span class="text-ellipsis">
            <?php
            if($pro->product_status==0){
                ?>
               <a href="{{URL::to('/unactive-product/'.$pro->product_id)}}"><span class="fa fa-eye"></span></a>
              <?php
              }else{
                ?>
                <a href="{{URL::to('/active-product/'.$pro->product_id)}}"><span class="fa fa-eye-slash"></span></a>
              <?php
              }
              ?>
            </span></td>
            
            <td>
            <a href="{{URL::to('/edit-product/'.$pro->product_id)}}" class="active" ui-toggle-class="">
              <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('are you sure to delete?')" href="{{URL::to('/delete-product/'.$pro->brand_id)}}" class="active" ui-toggle-class="">
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