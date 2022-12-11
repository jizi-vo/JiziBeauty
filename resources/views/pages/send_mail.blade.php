<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body{
             font-family: Arial;
            }
            .coupon{
                border: 5px dotted #bbb;
                width:80%;
                border-radius: 15px;
                margin: 0 auto;
                max-width: 600px;
            }
            .container{
                padding: 2px 16px;
                background-color: #f1f1f1;
            }
            .promo{
                background: #ccc;
                padding: 3px;
            }
            .expire{
                color:red;
            }
            p.code{
                text-align: center;
                font-size: 20px;
            }
            p.expire{
                text-align: center;
            }
            h2.note{
                text-align: center;
                font-size: large;
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <div class="coupon">
            <div class="container">
                <h3>Mã khuyến mãi từ shop<a target="_blank" href="https://jizibeauty.com">https://jizibeauty.com</a></h3>
            </div>
            <div class="container" style="background-color:white">
                <h2 class="note"><b><i>Giảm 20% cho tổng đơn hàng trên 2 triệu</b></i></h2>
                <p>Qúy khách đã từng mua hàng tại shop<a target="_blank" style="color:red" href="https://jizibeauty">jizibeauty.com</a>Nếu đã có tài khoản xin vui lòng<a target="_blank" style="color:red" href="http://Jizibeauty">đăng nhập</a>
                vào tài khoản để mua hàng và nhập mã code phía dưới để được giảm giá mua hàng, xin cảm ơn quý khách.Chúc quý khách thật nhiều sức khỏe và bình an trong cuộc sống</p>
            </div>
            <div class="container">
                <p class="code">Sử dụng code sau:<span class="promo">GFB10</span></p>
                <p class="expire">ngày hết hạn code 4-2-2023</p>
                <p style="color:aqua;text-align:center;font-size:15px;">Xem lại lịch sử đơn hàng đã đặt tại:<a href="{{url('/history')}}">lịch sử đơn hàng của bạn</a></p>
            </div>
        </div>
    </body>
</html>