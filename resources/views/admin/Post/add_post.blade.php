@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm Bài Viết
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
                                <form role="form" action="{{URL::to('/save-post')}}" method="post" enctype="multipart/form-data">
                                  {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên bài viết</label>
                                    <input type="text" name="post_title" value="{{old('post_title')}}" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tóm tắt Bài Viết</label>
                                    <textarea class="form-control" name="post_desc" id="ckeditor1" placeholder="Mô tả danh mục"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội Dung Bài Viết</label>
                                    <textarea class="form-control" name="post_content" id="ckeditor" placeholder="Mô tả danh mục"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Meta Từ Khóa</label>
                                    <textarea class="form-control" name="post_meta_keywords" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Meta Nội Dung</label>
                                    <textarea class="form-control" name="post_meta_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh bài viết</label>
                                    <input type="file" row="8"  name="post_image" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Danh mục bài viết</label>
                                      <select name="cate_post_id" class="form-control input-sm m-bot15">
                                        @foreach($cate_post as $key => $cate)
                                          <option value="{{$cate->cate_post_id}}">{{$cate->cate_post_name}}</option>
                                        @endforeach
                                     </select>
                                    </div>
                                <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                                  <select name="post_status" class="form-control input-sm m-bot15">
                                      <option value="0">Ẩn</option>
                                      <option value="1">Hiển thị</option>
                                 </select>
                                </div>
                                <button type="submit" name="add_category_product" class="btn btn-info">Thêm Bài Viết</button>
                            </form>
                            </div>

                        </div>
                    </section>
</div>
@endsection