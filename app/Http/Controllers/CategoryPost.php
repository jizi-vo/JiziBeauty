<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Slider;
use Session;
use App\Models\CatePost;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class CategoryPost extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
          return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_category_post(){
        $this->AuthLogin();
     return view('admin.CategoryPost.add_category');
    }
    public function save_category_post(Request $request){
        $this->AuthLogin();
        $data = $request->all();
        $category_post = new CatePost();
        $category_post->cate_post_name = $data['cate_post_name'];
        $category_post->cate_post_desc = $data['cate_post_desc'];
        $category_post->cate_post_status = $data['cate_post_status'];
        $category_post->save();
        Session::put('message','Thêm danh mục sản phẩm thành công');
        return Redirect()->back();
    }

    public function all_category_post(){
        $this->AuthLogin();
        $category_post = CatePost::orderBy('cate_post_id','DESC')->paginate(5);
        return view('admin.CategoryPost.list_category')->with(compact('category_post')); 
    }

    public function edit_category_post($category_post_id){
        $this->AuthLogin();
        $category_post = CatePost::find($category_post_id);
       
        return view('admin.CategoryPost.edit_category')->with(compact('category_post'));
    }

    public function update_category_post(Request $request, $cate_id){
        $this->AuthLogin();
        $data = $request->all();
        $category_post = CatePost::find($cate_id);
        $category_post = new CatePost();
        $category_post->cate_post_name = $data['cate_post_name'];
        $category_post->cate_post_desc = $data['cate_post_desc'];
        $category_post->cate_post_status = $data['cate_post_status'];
        $category_post->save();
        Session::put('message','Cập nhật danh mục sản phẩm thành công');
        return Redirect('/all-category-post');
    }
    public function delete_category_post($cate_id){
        $category_post = CatePost::find($cate_id);
        $category_post->delete();
        Session::put('message','Xóa danh mục sản phẩm thành công');
        return Redirect()->back();

    }
    public function danh_muc_bai_viet(){

    }
}
