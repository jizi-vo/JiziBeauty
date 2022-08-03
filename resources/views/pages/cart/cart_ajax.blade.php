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
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description">Tên sản phẩm</td>
							<td class="price">Giá sản phẩm</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Thành tiền</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
                    @foreach(Session::get('cart') as $key) => $cart)
						<tr>
							<td class="cart_product">
								<img src="" width="50" alt="">
							</td>
							<td class="cart_description">
								<h4><a href=""></a></h4>
								<p>{{$cart->cart_product_name}}</p>
							</td>
							<td class="cart_price">
								<p></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									 <form action="" method="POST">
									<input class="cart_quantity_input" type="text"  name="cart_quantity" value="">
									<input type="hidden" value="" name="rowId_cart" class="form-control">
									<input type="submit" value="cập nhật" name="update_qty" class="btn btn-default btn-sm">
                               </form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">
								
								</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
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
			<div class="row">
			</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Tổng <span></span></li>
							<li>Thuế <span></span></li>
							<li>Phí vận chuyển <span>Free</span></li>
							<li>Tiền sau giảm <span></span></li>
						</ul>
						
							<a class="btn btn-default check_out" href="">thanh toán</a>
							<a class="btn btn-default check_out" href="">Tính mã giảm giá</a>
								
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
@endsection