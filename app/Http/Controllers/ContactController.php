<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Contact;
use App\Models\Slider;
use App\Models\CatePost;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class ContactController extends Controller
{
    public function lien_he(Request $request){

        $category_post = CatePost::orderBy('cate_post_id','DESC')->get();
    
        $slider = Slider::orderBy('slider_id','DESC')->take(4)->get();


        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        return view('pages.lienhe.Contact')->with('category',$cate_product)->with('brand',$brand_product)->with('slider',$slider)->with('category_post',$category_post);;
    }
}
