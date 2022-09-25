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
                                            <button type="button" class="btn btn-default add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart">Thêm giỏ hàng</button>
                                              </form>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach
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