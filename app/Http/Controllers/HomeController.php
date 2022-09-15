<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;
use Session;
use App\Models\Slider;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function send_mail(){
        $to_name = "JiziBeauty";
        $to_email = "votranhuyentranb961998@gmail.com";
        $data = array("name"=>"Mail từ tài khoản khách hàng","body"=>'Mail gửi về vấn đề khiếu nại khách hàng');
        Mail::send('pages.send_mail',$data,function($message) use ($to_name,$to_email){
        $message->to($to_email)->subject('Quên mật khẩu Admin JiziBeauty');
        $message->from($to_email,$to_name);
    });
    return redirect('/')->with('message','');
}
    public function index(){
    
        $slider = Slider::orderBy('slider_id','DESC')->take(4)->get();


        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->limit(6)->get();
        return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('slider',$slider);
    }
    public function search(Request $request){
        $keywords = $request->keywords_submit;
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get();
        return view('pages.sanpham.search')->with('category',$cate_product)->with('brand',$brand_product)->with('search_product',$search_product); 

    }
}
