@extends('admin_layout')
@section('admin_content')
<div class="container-fluid">
    <style type="text/css">
       p.title_thongke{
          text-align: center;
          font-size:20px;
          font-weight: bold;
       }
    </style>
            <!-- //market-->
            <div class="row">
                <div class="panel-body">
                    <div class="col-md-12 w3ls-graph">
                        <!--agileinfo-grap-->
                            <div class="agileinfo-grap">
                                <div class="agileits-box">
                                    <header class="agileits-box-header clearfix">
                                        <h3>Visitor Statistics</h3>
                                            <div class="toolbar">
                                                
                                                
                                            </div>
                                    </header>
                                    <div class="agileits-box-body clearfix">
                                        <div id="hero-area"></div>
                                    </div>
                                </div>
                            </div>
        <!--//agileinfo-grap-->
    
                    </div>
                </div>
            </div>
            <div class="agil-info-calendar">

            <!-- //calendar -->
{{--<div class="row">
    <p class="title_thongke">Thống kê đơn hàng doanh số</p>
    <form autocomplete="off">
        @csrf
        <div class="col-md-2">
            <p>Từ ngày:<input type="text" id="datepicker" class="form-control"></p>
             <input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc kết quả"></p>
        </div>
        <div class="col-md-2">
            <p>Đến ngày:<input type="text" id="datepicker2" class="form-control"></p>
        </div>

       <div class="col-md-2">
            <p>
                Lọc theo:
            <select class="dasboard-filter form-control">
                <option>--------Chọn-----------</option>
                <option value="7ngay">7 ngày qua</option>
                <option value="thangtruoc">tháng trước</option>
                <option value="thangnay">tháng này</option>
                <option value="365ngayqua">365 ngày qua</option>
            </select>
        </p>
    </div>--}}
</form>
<div class="col-md-12">
    <div id="chart" style="height: 250px;"></div>
</div>
</div>
@endsection

