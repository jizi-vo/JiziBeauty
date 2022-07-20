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
                        <div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tshirt" data-toggle="tab">Dưỡng da</a></li>
								
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="tshirt" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{asset('public/frontend/images/56.jfif')}}" alt=""  style="width:150px;height:200px;"  />
												<h2>800,000 VNĐ</h2>
												<p>Tẩy tế bào chết innisfree</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{asset('public/frontend/images/75.jpg')}}" alt="" style="width:150px;height:200px;" />
													<h2>650,000 VNĐ</h2>
													<p>Sữa rửa mặt innisfree</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{asset('public/frontend/images/79.jpg')}}" alt=""  style="width:150px;height:200px;"  />
													<h2>700,000 VNĐ</h2>
													<p>Kem dưỡng ẩm innisfree</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div><!--/category-tab-->
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Sản phẩm liên quan</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{asset('public/frontend/images/56.jfif')}}" style="width:150px;height:200px;"  alt="" />
													<h2>800,000 VNĐ</h2>
													<p>Tẩy tế bào chết innisfree</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{asset('public/frontend/images/75.jpg')}}" style="width:150px;height:200px;" alt="" />
													<h2>650,000 VNĐ</h2>
													<p>Sữa rửa mặt innisfree</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{asset('public/frontend/images/79.jpg')}}" style="width:150px;height:200px;"   alt="" />
													<h2>700,000 VNĐ</h2>
													<p>Kem dưỡng ẩm innisfree</p>
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
												<img src="{{asset('public/frontend/images/69.png')}}" style="width:150px;height:200px;"   alt="" />
													<h2>900,000 VNĐ</h2>
													<p>dưỡng ẩm innisfree</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
												<img src="{{asset('public/frontend/images/79.jpg')}}" style="width:150px;height:200px;"   alt="" />
													<h2>700,000 VNĐ</h2>
													<p>rửa mặt innisfree</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
												<img src="{{asset('public/frontend/images/79.jpg')}}" style="width:150px;height:200px;"   alt="" />
													<h2>400,000 VNĐ</h2>
													<p>dưỡng da</p>
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