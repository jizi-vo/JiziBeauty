<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, inital-scale=1.0">
<title>Xác nhận đơn hàng</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="
sha384-BVYiiSIFeK1dGmJRAkycuHAHRg320mUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="background: #222;border-radius:12px;padding:15px;">
        <div class="col-md-12">
            <p style="text-align:center; color:#fff">Đây là email tự động .Qúy khách vui lòng không trả lời mail này.</p>
        <div class="row" style="cadetblue; padding:15px">
    <div class="col-md-6" style="text-align:center;color:#fff;font-weight:bold;font-size:30px">
        <h4 style="margin:0">HANNA BEAUTY SHOP</h4>
        <h6 style="margin:0">DỊCH VỤ BÁN HÀNG - VẬN CHUYỂN</h5>
    </div>
    <div class="col-md-6 logo" style="color:#fff">
        <p> Chào bạn <strong style="color:#000;text-decoration:underline;">{{$shipping_array['customer_name']}}</strong></p>
    </div>
    <div class="col-md-12">
        <p style="color:#fff;font-size:17px;">Bạn hoặc một ai đó đã đăng ký dịch vụ tại shop với thông tin như sau:</p>
        <h4 style="color:#000;text-transform:uppercase;">Thông Tin Đơn Hàng</h4>
        <p>Mã đơn hàng:<strong style="text-transform: uppercase;color:#fff">{{$code['order_code']}}</strong></p>
        <p>Mã Khuyến Mãi áp dụng:<strong style="text-transform:uppercase;color:#fff">{{$code['coupon_code']}}</strong></p>
        <p>Dịch vụ: <strong style="text-transform:uppercase;color:#fff">Đặt hàng trực tuyến</strong></p>
        <h4 style="color:#000;text-transform:uppercase;">Thông Tin người nhận</h4>
        <p>Email:
            @if($shipping_array['shipping_email']=='')
            không có
            @else
             <span style="color:#fff">{{$shipping_array['shipping_email']}}</span>
            @endif
        </p>
        <p>Họ và tên người gửi:
            @if($shipping_array['shipping_name']=='')
            không có
            @else
            <span style="color:#fff">{{$shipping_array['shipping_name']}}</span>
            @endif
        </p>
        <p>Địa chỉ mua hàng:
            @if($shipping_array['shipping_address']=='')
            không có
            @else
            <span style="color:#fff">{{$shipping_array['shipping_address']}}</span>
            @endif
        </p>
        <p>Số điện thoại:
            @if($shipping_array['shipping_phone']=='')
            không có
            @else
            <span style="color:#fff">{{$shipping_array['shipping_phone']}}</span>
            @endif
        </p>
        <p>Ghi chú đơn hàng:
            @if($shipping_array['shipping_notes']=='')
            không có
            @else
            <span style="color:#fff">{{$shipping_array['shipping_notes']}}</span>
            @endif
        </p>
        <p>Hình thức thanh toán:<strong style="text-transform:uppercase;color:#fff">
            @if($shipping_array['shipping_method']==0)
               Chuyển khoản ATM
               @else
               Tiền mặt
            @endif
            </strong></p>
            <p style="color:#fff">Nếu thông tin người nhận hàng không có chúng tôi sẽ liên hệ với người đặt hàng để trao đổi thông 
                tin về đơn đặt hàng đã đặt </p>
            <h4 style="color:#000;text-transform:uppercase;">Sản phẩm đã đặt</h4>
            <table class="table table-striped" style="border:1px">
                <thead>
                    <tr>
                        <th>Sản Phẩm</th>
                        <th>Gía tiền</th>
                        <th>Số lượng đặt</th>
                        <th>thành tiền</th>
                    </tr>
                </thead>
            <tbody>
                @php
                   $sub_total = 0;
                   $total = 0; 
                @endphp
                @foreach($cart_array as $cart)
                   @php
                   $sub_total = $cart['product_qty']*$cart['product_price'];
                   $total+=$sub_total;
                   @endphp
                <tr>
                    <td>{{$cart['product_name']}}</td>
                    <td>{{number_format($cart['product_price'],0,',','.')}}VNĐ</td>
                </tr>
                   
                @endforeach
                <tr>
                    <td colspan="4">Tổng tiền thanh toán:{{number_format($total,0,',','.')}}VNĐ</td>
                </tr>
            </tbody>
            </table>
    </div>
    <p style="color:#fff">Mọi chi tiết xin liên hệ website<a target="_blank" href="http://shop.com">hoặc liên hệ số hotline:0976665655</a></p>
        </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</html>