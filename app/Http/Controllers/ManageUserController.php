<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\City;
use App\Models\Province;
use App\Models\Ward;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Customer;
use App\Models\Coupon;
use DB;
use Session;
session_start();

class ManageUserController extends Controller
{
    public function profile_user(Request $request,$id){
        // seo
        $meta_desc = "Chuyên bán giày đá bóng. Nhiều mẫu giày đá bóng sân cỏ tự nhiên chính hãng, giá rẻ.";
        $meta_keywords = "giay bong da, giày bóng đá, shop giày chính hãng";
        $meta_title = "Giày Đá Bóng Chính Hãng | Giày Đá Banh | Thế Giới Bóng Đá";
        $url_canonical = $request->url();
        // end-seo
        $customer = Customer::where('customer_id',$id)->first();
        $customer_id = $customer->customer_id;
        $order = Order::where('customer_id',$id)->orderby('created_at','DESC')->get();
        return view('pages.checkout.profile_user')->with(compact('customer','customer_id','order','meta_title','meta_desc','meta_keywords','url_canonical'));
    }
    public function order_history(Request $request,$order_code){
        // seo
        $meta_desc = "Chuyên bán giày đá bóng. Nhiều mẫu giày đá bóng sân cỏ tự nhiên chính hãng, giá rẻ.";
        $meta_keywords = "giay bong da, giày bóng đá, shop giày chính hãng";
        $meta_title = "Giày Đá Bóng Chính Hãng | Giày Đá Banh | Thế Giới Bóng Đá";
        $url_canonical = $request->url();
        // end-seo

        $order_details = OrderDetails::with('product')->where('order_code',$order_code)->get();
        $order = Order::where('order_code',$order_code)->get();
        foreach($order as $key => $ord){
            $customer_id = $ord->customer_id;
            $shipping_id = $ord->shipping_id;
        }
        $customer = Customer::where('customer_id',$customer_id)->first();
        $shipping = Shipping::with('city','province','ward')->where('shipping_id',$shipping_id)->get();
        $order_details_product = OrderDetails::with('product')->where('order_code',$order_code)->get();
        foreach($order_details_product as $key => $ord_pro){
            $product_coupon = $ord_pro->product_coupon;
        }
        if($product_coupon != 'no'){
            $coupon = Coupon::where('coupon_code',$product_coupon)->first();
            $coupon_condition = $coupon->coupon_condition;
            $coupon_number = $coupon->coupon_number;
        }else{
            $coupon_condition = 2;
            $coupon_number = 0;
        }
        return view('pages.checkout.order_history')->with(compact('shipping','customer','order_details','coupon_number','coupon_condition','product_coupon','meta_title','meta_desc','meta_keywords','url_canonical'));
    }
}
