@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm Mã giảm giá
                        </header>
                        <div class="panel-body">
                        <?php
	                    $message = Session::get('message');
	                    if($message){
		                 echo $message;
		                  Session::put('message',null);
	                    }
	                     ?>
                            <div class="position-center">
                            <form role="form" action="{{URL::to('/insert-coupon-code')}}" method="post" enctype="multipart/form-data">
                                  @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên mã giảm giá</label>
                                    <input type="text"  name="coupon_name" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mã giảm giá</label>
                                    <input type="text"   name="coupon_code" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng mã giảm giá</label>
                                    <input type="text"   name="coupon_time" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tính năng mã</label>
                                    <select name="coupon_condition" class="form-control input-sm m-bot15">
                                        <option value="0">-----chọn----</option>
                                        <option value="1">giảm theo phần trăm</option>
                                        <option value="2">giảm theo tiền</option>
                                   </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nhập số % hoặc tiền giảm</label>
                                    <input type="text"   name="coupon_number" class="form-control" id="exampleInputEmail1">
                                </div>
                        
                                     
                                 </select>
                                </div>
                                <div class="form-group">
                                
                                </div>
                                <button type="submit" name="add_coupon" class="btn btn-info">Thêm mã giảm giá</button>
                            </form>
                            </div>

                        </div>
                    </section>
</div>
@endsection