@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
                        @foreach($category_name as $key => $name)
						<h2 class="title text-center">{{$name->category_name}}</h2>
						@endforeach

                         <div class="row">
							<div class="col-md-4">
                              <label for="amount">sắp xếp theo</label>
                                  <form>
                                     @csrf
									 <select name="sort" id="sort" class="form-control">
										<option value="{{Request::url()}}?sort_by=none">  Lọc  </option>
										<option value="{{Request::url()}}?sort_by=tang_dan">  Gía Tăng Dần  </option>
										<option value="{{Request::url()}}?sort_by=giam_dan">  Gía Giảm Dần  </option>
										<option value="{{Request::url()}}?sort_by=kytu_az"> Lọc Theo Tên A Đến Z  </option>
										<option value="{{Request::url()}}?sort_by=kytu_za"> Lọc Theo Tên Z Đến A  </option>
									 </select>
									</form>
							</div>
						 </div>
						 <br>

	                    @foreach($category_by_id as $key => $product)
						<a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{URL::to('public/upload/product/'.$product->product_image)}}" alt="" />
											<h2>{{number_format($product->product_price).' '.'VNĐ'}}</h2>
											<p>{{$product->product_name}}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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
@endsection