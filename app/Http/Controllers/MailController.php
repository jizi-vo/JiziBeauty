<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Carbon\Carbon;
use App\Models\Coupon;
use App\Models\Customer;

class MailController extends Controller
{
     public function send_coupon(){
        $customer_vip = Customer::where('customer_vip',1)->get();
        echo $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        $title_mail = "Mã Khuyến mãi".''.$now;

        $data = [];
        foreach($customer_vip as $vip){
            $data['email'][] = $vip->customer_email;
        }
        Mail::send('pages.send_mail',$data,function($message) use ($title_mail,$data){
           $message->to($data['email'])->subject($title_mail);
           $message->from($data['email'],$title_mail);
        });
        return redirect()->back()->with('massage','gửi mã khuyến mãi cho khách hàng thành công');
     }
    public function mail_example(){
        return view('pages.send_mail');
    }
}
