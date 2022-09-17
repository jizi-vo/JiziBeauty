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
}
