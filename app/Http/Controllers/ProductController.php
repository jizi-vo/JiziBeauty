<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Product;
use App\Models\Comment;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class ProductController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
          return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function allow_comment(Request $request){
        $data = $request->all();
        $comment = Comment::find($data['comment_id']);
        $comment->comment_status = $data['comment_status'];
        $comment->save();
    }
    public function reply_comment(Request $request){
         $data = $request->all();
         $comment = new Comment();
         $comment->comment = $data['comment'];
         $comment->comment_product_id = $data['comment_product_id'];
         $comment->coment_parent_coment = $data['comment_id'];
         $comment->comment_status=0;
         $comment->comment_name='JiziStore';
         $comment->save();
    }
    public function list_comment(){
        $comment = Comment::with('product')->where('coment_parent_coment','=',0)->orderBy('comment_status','DESC')->orderBy('comment_date','DESC')->get();
        $comment_rep = Comment::with('product')->where('coment_parent_coment','>',0)->get();
        return view('admin.comment.list_comment')->with(compact('comment','comment_rep'));
    }
    public function send_comment(Request $request){
        $product_id = $request->product_id;
        $comment_name = $request->comment_name;
        $comment_content = $request->comment_content;
        $comment = new Comment();
        $comment->comment = $comment_content;
        $comment->comment_name = $comment_name;
        $comment->comment_product_id = $product_id;
        $comment->comment_status = 1;
        $comment->coment_parent_coment = 0;
        $comment->save();
    }
    public function load_comment(Request $request){
        $product_id = $request->product_id;
        $comment = Comment::where('comment_product_id',$product_id)->where('coment_parent_coment','=',0)->where('comment_status',0)->get();
        $comment_rep = Comment::with('product')->where('coment_parent_coment','>',0)->get();
        $output='';
        foreach($comment as $key => $comm){
            $output.= '
            
            <div class="row style_comment">
                                     <div class="col-md-3">
										
										<img width="55%" src="'.url('public/frontend/images/53176.png').'" class="img img-responsive img-thumbail">
									 </div>
									 <div class="col-md-9">
										<p style="color:aquamarine;">@'.$comm->comment_name.'</p>
                                        <p style="color:#000;">@'.$comm->comment_date.'</p>
										<p>'.$comm->comment.'</p>
									</div>
									</div><p></p>
                                    ';
                                    foreach($comment_rep as $key => $rep_comment){
                                       if($rep_comment->coment_parent_coment==$comm->comment_id){
                                    $output.='<div class="row style_comment" style="margin:5px 40px">
                                    <div class="col-md-3">
                                       
                                       <img width="30%" src="'.url('public/frontend/images/147137.png').'" class="img img-responsive img-thumbail">
                                    </div>
                                    <div class="col-md-9">
                                       <p style="color:aquamarine;">@Jizi</p>
                                       <p style="color:#000;">'.$rep_comment->comment.'</p>
                                       <p></p>
                                   </div>
                                   </div>';
        }
    }
        }
        echo $output;
    }

    public function add_product(){
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
        return view('admin.add_product')->with('cate_product',$cate_product)->with('brand_product',$brand_product);
    }
    public function all_product(){
        $this->AuthLogin();
        $all_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->orderby('tbl_product.product_id','desc')->get();
        $manager_product = view('admin.all_product')->with('all_product',$all_product);
        return view('admin_layout')->with('admin.all_product',$manager_product);
    }
    public function save_product(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/product',$new_image);
            $data['product_image'] = $new_image;
          DB::table('tbl_product')->insert($data);
          Session::put('message','thêm  sản phẩm thành công');
          return Redirect::to('all-product');
        }
        $data['product_image'] = '';
        DB::table('tbl_product')->insert($data);
        Session::put('message','thêm  sản phẩm thành công');
        return Redirect::to('add-product');
      }
      public function unactive_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
        Session::put('message',' kích hoạt sản phẩm thành công');
          return Redirect::to('all-product');
      }
      public function active_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
        Session::put('message','không kích hoạt  sản phẩm thành công');
        return Redirect::to('all-product');
    }
    public function edit_product($product_id){
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
        $edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();
        $manager_product = view('admin.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product)->with('brand_product',$brand_product);
        return view('admin_layout')->with('admin.edit_brand_product',$manager_product);
    }
    public function update_product(Request $request,$product_id){
        $this->AuthLogin();
        $data = array();

        $data['product_name'] = $request->product_name;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/product',$new_image);
            $data['product_image'] = $new_image;
          DB::table('tbl_product')->where('product_id',$product_id)->update($data);
          Session::put('message','Cập nhật sản phẩm thành công');
          return Redirect::to('add-product');
        }
        DB::table('tbl_product')->where('product_id',$product_id)->update($data);
        Session::put('message','Cập nhật sản phẩm không thành công');
        return Redirect::to('all-product');
    }
    public function delete_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->delete();
        Session::put('message','xóa  sản phẩm thành công');
        return Redirect::to('all-product');
    }
    public function details_product($product_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $details_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_product.product_id',$product_id)->get();
    return view('pages.sanpham.show_details')->with('category',$cate_product)->with('brand',$brand_product)->with('product_details',$details_product);
    }
    public function quickview(Request $request){
        $product_id = $request->product_id;
        $product = Product::find($product_id);
       // $gallery = Gallery::where('product_id',$product_id)->get();
     //  $output['product_gallery'] = '';
      //  foreach($gallery as $key => $gal){
       //         $output['product_gallery'].= '<p><img width="100%" src="public/uploads/gallery'.$gal->gallery_image.'"></p>';
     //  }
        $output['product_name'] = $product->product_name;
        $output['product_id'] = $product->product_id;
        $output['product_desc'] = $product->product_desc;
        $output['product_content'] = $product->product_content;
        $output['product_price'] = number_format($product->product_price,0,',','.').'VNĐ';
        $output['product_image'] = '<p><img width="100%" src="public/upload/product'.$product->product_image.'"></p>';

        $output['product_quickview_value'] = '
        <input type="hidden" value="'.$product->product_id.'" class="cart_product_id_'.$product->product_id.'">
        <input type="hidden" value="'.$product->product_name.'" class="cart_product_name_'.$product->product_id.'">
        <input type="hidden" value="'.$product->product_quantity.'" class="cart_product_quantity_'.$product->product_id.'">
        <input type="hidden" value="'.$product->product_image.'" class="cart_product_image_'.$product->product_id.'">
        <input type="hidden" value="'.$product->product_price.'" class="cart_product_price_'.$product->product_id.'">
        <input type="hidden" value="1" class="cart_product_qty_'.$product->product_id.'">';
      echo json_encode($output);    
      }
    }
