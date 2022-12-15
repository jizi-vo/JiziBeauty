@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Sản phẩm mới nhất</h2>
						@foreach($all_product as $key => $product)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<form>
												@csrf
												<input type="hidden"  value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
												<input type="hidden"  value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
												<input type="hidden"  value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
												<input type="hidden"  value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
												<input type="hidden"  value="1" class="cart_product_qty_{{$product->product_id}}">
												
											<img src="{{URL::to('public/upload/product/'.$product->product_image)}}" alt="" />
											<h2>{{number_format($product->product_price).' '.'VNĐ'}}</h2>
											<p>{{$product->product_name}}</p>
                                        </a>
											<button style="margin-bottom: 0;" type="button" class="btn btn-default add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart">Thêm giỏ hàng</button>
											<button type="button" data-toggle="modal" data-toggle="modal" data-target="#xemnhanh" value="Xem nhanh" class="btn btn-default xemnhanh" data-id_product="{{$product->product_id}}" name="add-to-cart">Xem Nhanh</button>

                                              </form>
										</div>
								</div>
								<div class="choose">
									
								</div>
							</div>
						</div>
						@endforeach
                         </div>
                        
						 <!-- Modal -->
                   <div class="modal fade" id="xemnhanh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title product_quickview_title" id="">

		  </h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
		<div class="row">
			<div class="col-md-5" >
				<span id="product_quickview_image"></span>
				<span id="product_quickview_gallery"></span>
		</div>
		<form>
			@csrf
			<div id="product_quickview_value"></div>
		<div class="col-md-7">
			<style type="text/css">
			h5.modal-title.product_quickview_title{
				text-align: center;
				font-size: 25px;
				color: pink;
			}
			p.quickview{
				font-size: 14px;
				color: azure;
			}
			span#product_quickview_content img{
				width: 100%;
			}
			<style>
                @media screen and (min-width:768px){
					.modal-dialog{
						width:700px;
					}
					.modal-sm{
						width:350px;
					}
				}
				@media screen and (min-width:992px){
					.modal-lg{
						width: 120px;
					}
				}
				</style>
		<h2 class="quickview"><span id="product_quickview_title"></span></h2>
		<p>Mã ID:<span id="product_quickview_id"></span></p>
          <span>
			<h2 style="color:orange">Price:<span id="product_quickview_price"></span></h2><br/>
		<label>Số lượng:</label>
		<input name="qty" type="number" min="1" class="cart_product_qty_" value="1"/>
		<input name="productid_hidden" type="hidden" value=""/>
		  </span><br/>
		  <p class="quickview">Mô Tả Sản Phẩm</p>
		  <fieldset>
			<span style="width:100%" id="product_quickview_desc"></span>
			<span style="width:100%" id="product_quickview_content"></span>
		  </fieldset>
		{{--<input type="button" value="Mua ngay" class="btn btn-primary btn-sm add-to-cart-quickview" data-id_product="{{$product->product_id}}"  name="add-to-cart">
		  <div id="beforesend_quickview"></div>--}}
		</form>
	</div>
</div>
		</div>
		{{--<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		  <button type="button" class="btn btn-primary">Đi đến sản phẩm</button>
		</div>--}}
	  </div>
	</div>
  </div>


					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Sản phẩm liên quan</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{asset('public/frontend/images/89.jpg')}}" style="width:150px;height:200px;"  alt="" />
													<h2>75,000 VNĐ</h2>
													<p>Mặt nạ giấy nước ép thiên nhiên Jeju</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												<img src="{{asset('public/frontend/images/sale.png')}}" class="new" alt="" />
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{asset('public/frontend/images/4zPcG.jpg')}}" style="width:150px;height:200px;" alt="" />
													<h2>600,000 VNĐ</h2>
													<p>Laneige Light Sun Fluid SPF50+ PA+++</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												<img src="{{asset('public/frontend/images/new.png')}}" class="new" alt="" />
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{asset('public/frontend/images/042c.jpg')}}" style="width:150px;height:200px;"   alt="" />
													<h2>245,000 VNĐ</h2>
													<p>Klairs Gentle Black Deep Cleansing Oil</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
								</div>
								<div class="item">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
												<img src="{{asset('public/frontend/images/5125.jpg')}}" style="width:150px;height:200px;"   alt="" />
													<h2>149,000 VNĐ</h2>
													<p>L'Oreal Paris UV Perfect SPF50+ PA+++</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												<img src="{{asset('public/frontend/images/sale.png')}}" class="new" alt="" />
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
												<img src="{{asset('public/frontend/images/400ml.png')}}" style="width:150px;height:200px;"   alt="" />
													<h2>199,000 VNĐ</h2>
													<p>Neutrogena Deep Clean Micellar</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
												<img src="{{asset('public/frontend/images/loreal-1.jpeg')}}" style="width:150px;height:200px;"   alt="" />
													<h2>159,000 VNĐ</h2>
													<p>L'Oreal Paris 3-in-1 Micellar Water</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												<img src="{{asset('public/frontend/images/new.png')}}" class="new" alt="" />
											</div>
										</div>
									</div>
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
@endsection