
<!DOCTYPE html>
<head>
<title>Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('public/backend/css/bootstrap.min.css')}}" >
<meta name="csrf-token" content="{{csrf_token()}}">
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('public/backend/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('public/backend/css/font.css')}}" type="text/css"/>
<link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet"> 
<link rel="stylesheet" href="{{asset('public/backend/css/morris.css')}}" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="{{asset('public/backend/css/monthly.css')}}">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="{{asset('public/backend/js/jquery2.0.3.min.js')}}"></script>
<script src="{{asset('public/backend/js/raphael-min.js')}}"></script>
<script src="{{asset('public/backend/js/morris.js')}}"></script>
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="index.html" class="logo">
       ADMIN
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="{{asset('public/backend/images/e47e.png')}}">
                <span class="username">
                <?php
	         $name = Session::get('admin_name');
	         if($name){
		      echo $name;
	        }
	        ?>
                </span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                <li><a href="{{URL::to('/logout')}}"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="{{URL::to('/managee-order')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Banner</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/manage-banner')}}">Quản lý Slide</a></li>
						<li><a href="{{URL::to('/add-slider')}}">Thêm Slide</a></li>
                       
                    </ul>
                </li>

                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Đơn hàng</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/manage-order')}}">Quản lý đơn hàng</a></li>
                        <li><a href="{{URL::to('/managee-order')}}">Liệt Kê đơn hàng</a></li>
						
                       
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Mã giảm giá</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/insert-coupon')}}">Quản lý giảm giá</a></li>
						<li><a href="{{URL::to('/list-coupon')}}">Liệt kê mã giảm giá</a></li>
                       
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Vận Chuyển</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/delivery')}}">Quản lý Vận Chuyển</a></li>
                       
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Danh mục sản phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-category-product')}}">Thêm danh mục sản phẩm</a></li>
						<li><a href="{{URL::to('/all-category-product')}}">Liệt kê danh mục sản phẩm</a></li>
                       
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Danh Mục Bài Viết</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-category-post')}}">Thêm danh mục bài viết</a></li>
						<li><a href="{{URL::to('/all-category-post')}}">Liệt kê danh mục bài viết</a></li>
                       
                    </ul>
                </li>

				<li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Thương hiệu sản phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-brand-product')}}">Thêm thương hiệu sản phẩm</a></li>
						<li><a href="{{URL::to('/all-brand-product')}}">Liệt kê thương hiệu sản phẩm</a></li>
                       
                    </ul>
                </li>
				<li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span> sản phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-product')}}">Thêm sản phẩm</a></li>
						<li><a href="{{URL::to('/all-product')}}">Liệt kê sản phẩm</a></li>
                       
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span> Bình Luận</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/comment')}}">Liệt kê Bình Luận</a></li>
                       
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Bài Viết</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-post')}}">Thêm Bài Viết</a></li>
						<li><a href="{{URL::to('/all-post')}}">Liệt kê Bài Viết</a></li>
                       
                    </ul>
                </li>
            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
        @yield('admin_content')
</section>
 <!-- footer -->
		  <div class="footer">
			<div class="wthree-copyright">
			</div>
		  </div>
  <!-- / footer -->
</section>
<!--main content end-->
</section>
<script src="{{asset('public/backend/js/bootstrap.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/backend/js/scripts.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('public/backend/ckeditor/ckeditor.js')}}"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script type="text/javascript">
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>

<script type="text/javascript">
    $(function(){
        $("#start_coupon").datepicker({
            preText:"Tháng trước",
            nextText:"Tháng sau",
            dateFormat:"dd/mm/yy",
            dayNamesMin:[ "Thứ 2","Thứ 3","Thứ 4","Thứ 5","Thứ 6","Thứ 7","Chủ Nhật"],
            duration:"slow"
        });
        $("#end_coupon").datepicker({
            preText:"Tháng trước",
            nextText:"Tháng sau",
            dateFormat:"dd/mm/yy",
            dayNamesMin:[ "Thứ 2","Thứ 3","Thứ 4","Thứ 5","Thứ 6","Thứ 7","Chủ Nhật"],
            duration:"slow"
        });
    });
</script>

<script type="text/javascript">
$(document).ready(function(){
       chart30daysorder();
       var chart = new Morris.Bar({
            element:'chart',
            lineColors:['#819C79','#fc8710','#FF6541','#A4ADD3','#766B56']
            pointFillColors:['#ffffff'],
            pointStrokeColors:['black'],
              fillOpacity:0.6,
              hideHover:'auto',
              parseTime:false,
              xkey:'period',
              ykeys:['order','sales','profit','quantity'],
              behaveLikeLine:true;
              labels:['đơn hàng','doanh số','lợi nhuận','số lượng']
         });
         
         function chart30daysorder(){
            var _token = $('input[name="_token"]').val();
             $.ajax({
                url:"{{url('/days-order')}}",
                method:"POST",
                dataType:"JSON",
                data:{_token:_token},
                success:function(data)
                {
                  chart.setData(data);
                }
             });
            }
             $('.$dashboard-filter').change(function(){
            var dashboard_value = $(this).val();
            var _token = $('input[name="_token"]').val();
             $.ajax({
                url:"{{url('/dashboard-filter')}}",
                method:"POST",
                dataType:"JSON",
                data:{dashboard_value:dashboard_value,_token:_token},
                success:function(data)
                {
                    chart.setData(data);
                }
             });
            });
        $('#btn-dashboard-filter').click(function(){
            var _token = $('input[name="_token"]').val();
           var from_date = $('#datepicker').val();
           var to_date = $('#datepicker2').val();
               $.ajax({
                url:"{{url('/filter-by-date')}}",
                method:"POST",
                dataType:"JSON",
                data:{from_date:from_date,to_date:to_date,_token:_token},
               success:function(data)
                {
                    chart.setData(data);
                }
           });
        });
    });
</script>
<script type="text/javascript">
    $(function(){
        $("#datepicker").datepicker({
            preText:"Tháng trước",
            nextText:"Tháng sau",
            dateFormat:"yy-mm-dd",
            dayNamesMin:[ "Thứ 2","Thứ 3","Thứ 4","Thứ 5","Thứ 6","Thứ 7","Chủ Nhật"],
            duration:"slow"
        });
        $("#datepicker2").datepicker({
            preText:"Tháng trước",
            nextText:"Tháng sau",
            dateFormat:"yy-mm-dd",
            dayNamesMin:[ "Thứ 2","Thứ 3","Thứ 4","Thứ 5","Thứ 6","Thứ 7","Chủ Nhật"],
            duration:"slow"
        });
    });
</script>

<script type="text/javascript">
    $('.comment_duyet_btn').click(function(){
        var comment_status = $(this).data('comment_status');
        var comment_id = $(this).data('comment_id');
        var comment_product_id = $(this).attr('id');
        if(comment_status==0){
            var alert = 'Duyệt thành công';
        }else{
            var alert = 'Duyệt không thành công';
        }
        $.ajax({
          url:"{{url('/allow-comment')}}",
          method:'POST',
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{comment_status:comment_status,comment_id:comment_id,comment_product_id:comment_product_id},
           success:function(data){
            $('#notify_comment').html('<span class="text text-alert">'+alert+'</span>');
          }
          });
    });
   
    $('.btn-reply-comment').click(function(){
        var comment_id = $(this).data('comment_id');
        var comment = $('.reply_comment_'+comment_id).val();
        var comment_product_id = $(this).data('product_id');
        $.ajax({
          url:"{{url('/reply-comment')}}",
          method:'POST',
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{comment:comment,comment_id:comment_id,comment_product_id:comment_product_id},
           success:function(data){
            $('.reply_comment_'+comment_id).val('');
            $('#notify_comment').html('<span class="text text-alert">Trả lời bình luận thành công</span>');
          }
          });
    });
</script>

<script type="text/javascript">
$(document).ready(function(){

    fetch_delivery();

function fetch_delivery(){
    var _token = $('input[name="_token"]').val();
     $.ajax({
        url : '{{url('/select-feeship')}}',
        method: 'POST',
        data:{_token:_token},
        success:function(data){
           $('#load_delivery').html(data);
        }
    });
}
    $('.add_delivery').click(function(){
        var city = $('.city').val();
        var province = $('.province').val();
        var wards = $('.wards').val();
        var fee_ship = $('.fee_ship').val();
        var _token = $('input[name="_token"]').val();
      //  alert(city);
      //  alert(province);
      //  alert(wards);
      //  alert(fee_ship);

        $.ajax({
          url : '{{url('/insert-delivery')}}',
          method: 'POST',
            data:{city:city,province:province,_token:_token,wards:wards,fee_ship:fee_ship},
           success:function(data){
            fetch_delivery();
          }
          });
    });

       $('.choose').on('change',function(){
           var action = $(this).attr('id');
           var ma_id = $(this).val();
           var _token = $('input[name="_token"]').val();
           var $result = '';
          // alert(action);
          // alert(matp);
          // alert(_token);
           if(action=='city'){
               result='province';
           }else{
           result='wards';
           }
           $.ajax({
          url : '{{url('/select-delivery')}}',
          method: 'POST',
            data:{action:action,ma_id:ma_id,_token:_token},
           success:function(data){
          $('#'+result).html(data);
          }
          });
       });
    
    })

</script>
<script type="text/javascript">
    $.validate({

    });
    </script>
<script>
    CKEDITOR.replace('ckeditor');
    CKEDITOR.replace('ckeditor1');
 </script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('public/backend/js/jquery.scrollTo.js')}}"></script>
<!-- morris JavaScript -->	
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
	   
	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
			
			],
			lineColors:['#eb6f6f','#926383','#eb6f6f'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
		
	   
	});
	</script>
<!-- calendar -->
	<script type="text/javascript" src="{{asset('public/backend/js/monthly.js')}}"></script>
	<script type="text/javascript">
		$(window).load( function() {

			$('#mycalendar').monthly({
				mode: 'event',
				
			});

			$('#mycalendar2').monthly({
				mode: 'picker',
				target: '#mytarget',
				setWidth: '250px',
				startHidden: true,
				showTrigger: '#mytarget',
				stylePast: true,
				disablePast: true
			});

		switch(window.location.protocol) {
		case 'http:':
		case 'https:':
		// running on a server, should be good.
		break;
		case 'file:':
		alert('Just a heads-up, events will not work when run locally.');
		}

		});
	</script>

    <script type="text/javascript">
         $('.order_details').change(function(){
              var order_status = $(this).val();
              var order_id = $(this).children(":selected").attr("id");
              var _token = $('input[name="_token"]').val();
              
              //lay ra so luong
              quantity = [];
              $("input[name='product_sales_quantity']").each(function(){
                     quantity.push($(this).val());
              });
              //lay ra product id
              order_product_id = [];
              $("input[name='order_product_id']").each(function(){
                     order_product_id.push($(this).val());
              });
              k = 0;

              for(i=0;i<order_product_id.length;i++){
                 var order_qty = $('.order_qty_' + order_product_id[i]).val();
                 var order_qty_storage = $('.order_qty_storage_' + order_product_id[i]).val();
                 if(parseInt(order_qty)>parseInt(order_qty_storage)){
                      k = k + 1;
                      if(k==1){
                   alert('so luong ban trong kho k đủ');
                      }
                    $('.color_qty_'+order_product_id[i]).css('background','#000');
                 }
              }
              if(k==0){
              $.ajax({
                     url: '{{url('/update-order-qty')}}',
                     method: 'POST',
                     data:{_token:_token,order_status:order_status,order_id:order_id,quantity:quantity,order_product_id:order_product_id},
                     success:function(data){
                        alert('Thay đổi đơn hàng thành công');
                     }
              });
            }
         });
        </script>
        <script type="text/javascript">
        $('.update_quantity_order').click(function(){
            var order_product_id = $(this).data('product_id');
            var order_qty = $('.order_qty_'+order_product_id).val();
            var order_code = $('.order_code').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                     url: '{{url('/update-qty')}}',
                     method: 'POST',
                     data:{_token:_token,order_product_id:order_product_id,order_qty:order_qty,order_code:order_code},
                     success:function(data){
                        alert('cập nhật số lượng thành công');
                        location.reload();
                     }
              });
        });
        </script>
	<!-- //calendar -->
</body>
</html>
