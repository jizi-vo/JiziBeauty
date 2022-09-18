<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Models\Post;
use App\Models\CatePost;
session_start();
class PostController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
          return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_post(){
        $this->AuthLogin();
        $cate_post = CatePost::orderBy('cate_post_id','DESC')->get();
       
        return view('admin.Post.add_post')->with(compact('cate_post'));
    }

    public function save_post(Request $request){
        $this->AuthLogin();
        $data = $request->all();
        $post = new Post();
        $post->post_title = $data['post_title'];
        $post->post_content = $data['post_content'];
        $post->post_meta_desc = $data['post_meta_desc'];
        $post->post_meta_keywords = $data['post_meta_keywords'];
        $post->cate_post_id = $data['cate_post_id'];
        $post->post_desc = $data['post_desc'];
        $post->post_status = $data['post_status'];
        $get_image = $request->file('post_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();

            $get_image->move('public/upload/post',$new_image);

            $post->post_image = $new_image;
            $post->save();
          Session::put('message','thêm bài viết thành công');
          return redirect()->back();
        }else{
            Session::put('message','vui lòng thêm hình ảnh');
          return redirect()->back(); 
        }

       
      }

      public function all_post(){
        $this->AuthLogin();
        $all_post = Post::orderBy('post_id')->paginate(10);
        return view('admin.Post.list_post')->with(compact('all_post',$all_post));
    }

    public function delete_post($post_id){
        $this->AuthLogin();
        $post = Post::find($post_id);
        $post_image = $post->post_image;
        unlink('public/upload/post/'.$post_image);
        $post->delete();
        Session::put('message','xóa  bài viết thành công');
        return redirect()->back();
    }
    
}
