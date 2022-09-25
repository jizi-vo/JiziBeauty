<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Jizi-Beauty</title>
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/sweetalert.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/lightgallery.min.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/lightslider.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/prettify.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('publuc/frontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('public/frontend/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('public/frontend/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('public/frontend/images/ico/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> 0826483963</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> hannabeauty@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.html"><img src="{{asset('public/frontend/images/e47e.png')}}" alt="" style="width:100px;height:70px;" /></a>
						</div>
						<div class="btn-group pull-right">
							<h1 style="font-size:25px"> HANNA BEAUTY</h1>
							<p>Women are always beautiful.</p>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-user"></i>tài khoản</a></li>
								
								<?php
								   $customer_id = Session::get('customer_id');
								   $shipping_id = Session::get('shipping_id');
								   if($customer_id!=NULL && $shipping_id==NULL){
								?>
								<li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i>Thanh toán</a></li>
								<?php
								   }elseif($customer_id!=NULL && $shipping_id==NULL){
									?>
									<li><a href="{{URL::to('/payment')}}"><i class="fa fa-crosshairs"></i>Thanh toán</a></li>
								<?php
								   
								   }else{
								?>
								<li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-crosshairs"></i>Thanh toán</a></li>
								<?php
								   }
								   ?>
								<li><a href="{{URL::to('/show-cart')}}"><i class="fa fa-shopping-cart"></i>giỏ hàng</a></li>
								<?php
								   $customer_id = Session::get('customer_id');
								   if($customer_id!=NULL){
								?>
								<li><a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-lock"></i>Đăng xuất</a></li>
								<?php
								   }else{
								?>
								<li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-lock"></i>Đăng nhập</a></li>
								<?php
								   }
								   ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{URL::to('trang-chu')}}" class="active">Trang chủ</a></li>
								<li class="dropdown"><a href="#">Sản phẩm<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Products</a></li>
										 
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
									<ul role="menu" class="sub-menu">
										
                                    </ul>
								
								</li> 
								<li><a href="{{URL::to('/show-cart')}}">Giỏ hàng</a></li>
								<li><a href="{{URL::to('/lien-he')}}">Liên hệ</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-4">
						<form action="{{URL::to('/tim-kiem')}}" method="POST">
							{{csrf_field()}}
						<div class="search_box pull-right">
							<input type="text" name="keywords_submit"  placeholder="Tìm kiếm sản phẩm"/>
							<input type="submit" style="margin-top:0;color:#666" name="search_items" class="btn btn-primary bn-sm" value="Tìm kiếm">
						</div>
								</form>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>Hanna</span>Beauty</h1>
									<h2>Innisfree</h2>
									<p>nnisfree được thành lập vào tháng 1 năm 2000, là thương hiệu mỹ phẩm thừa hưởng những tinh túy của thiên nhiên từ đảo Jeju, hòn đảo tràn ngập trong không khí trong lành và tươi mát. Jeju được UNESCO công nhận là di sản thiên nhiên thế giới đầu tiên của Hàn Quốc.</p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="{{asset('public/frontend/images/63.jpg')}}" class="girl img-responsive" alt="" />
									<img src="{{asset('public/frontend/images/')}}"  class="pricing" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>Hanna</span>BEAUTY</h1>
									<h2>Shiseido</h2>
									<p>Shiseido là dòng mỹ phẩm cao cấp đến từ Nhật Bản có tác dụng chống lão hóa,trị mụn, trị nám, dưỡng ẩm và dưỡng trắng da rất hiệu quả. Mỹ phẩm Shiseido sẽ cho bạn một làn da căng bóng, mềm mịn và trắng sáng rạng ngời.</p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="{{asset('public/frontend/images/67.jpg')}}" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>Hanna</span>BEAUTY</h1>
									<h2>Phấn mắt CLIO</h2>
									<p>Bảng Phấn Mắt 10 Màu Clio Pro Eye Palette là bảng phấn mắt thuộc thương hiệu Clio 10 màu Clio Pro Eye Palette là bảng mắt được thiết kế độc đáo mang nhiều phong cách khác nhau kết hợp lại, tạo hiệu ứng đôi mắt long lanh đáng mơ ước mà không cần nhiều thời gian và công sức </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="{{asset('public/frontend/images/47.jpg')}}" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png" class="pricing" alt="" />
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Danh mục sản phẩm</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
						  @foreach($category as $key => $cate)
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="{{URL::to('/danh-muc-san-pham',$cate->category_id)}}">{{$cate->category_name}}</a></h4>
								</div>
							</div>
							@endforeach
						</div><!--/category-products-->
						<div class="brands_products"><!--brands_products-->
							<h2>Thương hiệu sản phẩm</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									@foreach($brand as $key => $brand)
									<li><a href="{{URL::to('/thuong-hieu-san-pham',$brand->brand_id)}}"> <span class="pull-right">(50)</span>{{$brand->brand_name}}</a></li>
									@endforeach
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="{{asset('public/frontend/images/159.jpg')}}" height="600" width="255" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					@yield('content')
					
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>Hanna</span>Beauty</h2>
							<p>You are imperfect, permanently and inevitably flawed. And you are beautiful.</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{asset('public/frontend/images/e47e.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Hanna beauty 1</p>
								<h2>Địa Chỉ</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{asset('public/frontend/images/e47e.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Hanna beauty2</p>
								<h2>Địa Chỉ</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{asset('public/frontend/images/e47e.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Hanna beauty3</p>
								<h2>Địa Chi</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{asset('public/frontend/images/e47e.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Hanna beauty4</p>
								<h2>Địa Chỉ</h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Hỗ Trợ</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Giải đáp thắc mắc</a></li>
								<li><a href="#">Hướng dẫn mua hàng</a></li>
								<li><a href="#">Thanh toán và vận chuyển</a></li>
								<li><a href="#">chính sách đổi trả</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Hanna Beauty</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Neutrogena</a></li>
								<li><a href="#">Innisfree</a></li>
								<li><a href="#">Dior</a></li>
								<li><a href="#">Dove</a></li>
								<li><a href="#">Ohui</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Hệ thống cửa hàng</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">hannabeauty</a></li>
								<li><a href="#">hannabeauty</a></li>
								<li><a href="#">hannabeauty</a></li>
								<li><a href="#">hannabeauty</a></li>
								<li><a href="#">hannabeauty</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Beauty</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Hệ Thống cửa hàng</a></li>
								<li><a href="#">Giới thiệu shop</a></li>
								<li><a href="#">Liên Kết</a></li>
								<li><a href="#">Bảo Mật Thông Tin</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Email:Votranhuyentranb1999@gmail.com</a></li>
								<li><a href="#">Tel:09567843</a></li>
								<li><a href="#">Website:www.beauty.com</a></li>
							</ul>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left"></p>
					<p class="pull-right"></a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="{{asset('public/frontend/js/jquery.js')}}"></script>
	<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
	<script src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/lightgallery-all.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/lightslider.js')}}"></script>
	<script src="{{asset('public/frontend/js/prettify.js')}}"></script>


	<script type="text/javascript">
	$(document).ready(function(){
          load_comment();
		   function load_comment(){
		   var product_id = $('.comment_product_id').val();
		   var _token = $('input[name="_token"]').val();
			$.ajax({
                     url:"{{url('/load-comment')}}",
					 method:'POST',
					 data:{product_id:product_id,_token:_token},
					 success:function(data){
						$('#comment_show').html(data);
					 }
						});
		 }
		 $('.send-comment').click(function(){
			var product_id = $('.comment_product_id').val();
             var comment_name = $('.comment_name').val();
			 var comment_content = $('.comment_content').val();
			 var _token = $('input[name="_token"]').val();
			 $.ajax({
                     url:"{{url('/send-comment')}}",
					 method:'POST',
					 data:{product_id:product_id,comment_name:comment_name,comment_content:comment_content,_token:_token},
					 success:function(data){
						$('notify_comment').html('<span class="text text-success">bình luận đang chờ duyệt</span>');
						load_comment();
						$('.comment_name').val('');
						$('.comment_content').val('');

					 }
						});
		 });
       
	});
	</script>

	<script type="text/javascript">
 $(document).ready(function() {
    $('#imageGallery').lightSlider({
        gallery:true,
        item:1,
        loop:true,
        thumbItem:9,
        slideMargin:0,
        enableDrag: false,
        currentPagerPosition:'left',
        onSliderLoad: function(el) {
            el.lightGallery({
                selector: '#imageGallery .lslide'
            });
        }   
    });  
  });
	</script>
	
	<script type="text/javascript">
		$(document).ready(function(){
			$('.add-to-cart').click(function(){
                 var id= $(this).data('id_product');
				 var cart_product_id = $('.cart_product_id_'+ id).val();
				 var cart_product_name = $('.cart_product_name_'+ id).val();
				 var cart_product_image = $('.cart_product_image_'+ id).val();
				 var cart_product_price = $('.cart_product_price_'+ id).val();
				 var cart_product_qty = $('.cart_product_qty_'+ id).val();
				 var_token = $('input[name="_token"]').val();
				
				 $.ajax({
                     url:'{{url('/add-cart-ajax')}}',
					 method:'POST',
					 data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token},
					 success:function(data){
						swal({
							title:"Đã thêm sản phẩm vào giỏ hàng",
							text:"Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
							showCancelButton:true,
							cancelButtonText:"Xem tiếp",
							confirmButtonClass:"btn-success",
							confirmButtonText:"Đi đến giỏ hàng",
							closeOnConfirm:false
						},
						function(){
                          window.location.href ="{{url('/show-cart-ajax')}}";
						
						});
					 }
				 });
				
			});
		});
		</script>
</body>
</html>