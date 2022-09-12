@extends('layout')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
				  <li class="active">Giỏ hàng của bạn</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<?php
				$content = Cart::content();
				?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description">Mô tả</td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Tổng tiền</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					   @foreach($content as $v_content) 
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" width="50" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$v_content->name}}</a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p>{{number_format($v_content->price).' '.'vnd'}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									 <form action="{{URL::to('/update-cart-quantity')}}" method="POST">
									 {{csrf_field()}}
									<input class="cart_quantity_input" type="text" name="cart_quantity" value="{{$v_content->qty}}">
									<input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
									<input type="submit" value="cập nhật" name="update_qty" class="btn btn-default btn-sm">
                               </form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">
									<?php
									$subtotal = $v_content->price * $v_content->qty;
									echo number_format($subtotal).' '.'vnd';
									?>
								</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
					   @endforeach 
					</tbody>
				</table>
			</div>
		</div>
	</section> 
	<section id="do_action">
		<div class="container">
			<div class="heading">
			
			
			</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							
							<li>Tổng<span>{{Cart::pricetotal(0).' '.'vnđ'}}</span></li>
							@if(Session::get('coupon'))
							<li>
								@foreach(Session::get('coupon') as $key => $cou)
								@if($cou['coupon_condition']==1)
									Mã giảm : {{$cou['coupon_number']}} %
									<p>
										@php 
										$total_coupon = ($total*$cou['coupon_number'])/100;
										echo '<p><li>Tổng giảm:'.number_format($total_coupon,0,',','.').'đ</li></p>';
										@endphp
									</p>
									<p><li>Tổng đã giảm :{{number_format($total-$total_coupon,0,',','.')}}đ</li></p>
								@elseif($cou['coupon_condition']==2)
									Mã giảm : {{number_format($cou['coupon_number'],0,',','.')}} k
									<p>
										@php 
										$total_coupon = $total - $cou['coupon_number'];
						
										@endphp
									</p>
									<p><li>Tổng đã giảm :{{number_format($total_coupon,0,',','.')}}đ</li></p>
								@endif
							@endforeach
						
                            </li>
							@endif 
							<li>Thuế <span>{{Cart::tax(0).' '.'vnđ'}}</span></li>
							<li>Phí vận chuyển <span>Free</span></li>
							<li>Thành tiền <span>{{Cart::total(0).' '.'vnđ'}}</span></li>
							<br>
						</form>
						@if(Session::get('cart'))
						<tr><td>
							<form method="GET" action="{{URL::to('/check-coupon')}}">
								@csrf
								<input type="text" class="form-control" name="coupon" placeholder="Nhập mã giảm giá"/><br>
								<input type="submit" class="btn btn-default check_coupon" name="check_coupon" value="Tính mã giảm giá">
								@if(Session::get('coupon'))
								<a class="btn btn-default check_out" href="{{url('/unset-coupon')}}">xóa mã</a>
								@endif
							</form>
						</td>
					</tr>
					    @endif
						</ul>
						
						<?php
								   $customer_id = Session::get('customer_id');
								   if($customer_id!=NULL){
								?>
							<a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">thanh toán</a>
								<?php
								   }else{
								?>
								<a class="btn btn-default check_out" href="{{URL::to('/login-checkout')}}">thanh toán</a>
								<?php
								   }
								   ?>
							
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
@endsection