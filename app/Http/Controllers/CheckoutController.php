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
use App\Models\Slider;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Coupon;
use Carbon\Carbon;
use Mail;
use DB;
use Session;
session_start();

class CheckoutController extends Controller
{
   public function checkout(Request $request){
      $slider = Slider::orderby('slider_id','ASC')->get();
      // seo
        $meta_desc = "Chuyên bán giày đá bóng. Nhiều mẫu giày đá bóng sân cỏ tự nhiên chính hãng, giá rẻ.";
        $meta_keywords = "giay bong da, giày bóng đá, shop giày chính hãng";
        $meta_title = "Giày Đá Bóng Chính Hãng | Giày Đá Banh | Thế Giới Bóng Đá";
        $url_canonical = $request->url();
        // end-seo

        $product = Product::with('category','brand')->orderby('id','DESC')->get();
        foreach($product as $key => $pro){
         $slug_product = $pro->slug_product;
        }
      $city = City::orderby('matp','ASC')->get();
      return view('pages.checkout.show_checkout')->with(compact('city','meta_keywords','meta_title','meta_desc','url_canonical','slider','product','slug_product'));
   }
   public function select_delivery(Request $request){
      $data = $request->all();
      if($data['action']){
         $output = '';
         if($data['action']=='city'){
           $select_province = Province::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
           $output.='<option>---Chọn Quận Huyện---</option>';
           foreach($select_province as $key => $province){
               $output.='<option value="'.$province->maqh.'">'.$province->name_quanhuyen.'</option>'; 
            }
          }else{
           $select_wards = Ward::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
           $output.='<option>---Chọn Xã Phường---</option>';
           foreach($select_wards as $key => $ward){
             $output.='<option value="'.$ward->xaid.'">'.$ward->name_xaphuong.'</option>';
            }
          }   
       }
      echo $output;
   }
   public function confirm_order(Request $request){
      $data = $request->all();
      if($data['order_coupon'] != 'no'){
         $coupon = Coupon::where('coupon_code',$data['order_coupon'])->first();
         $coupon->coupon_times = $coupon->coupon_times - 1;
         $coupon_mail = $coupon->coupon_code;
         $coupon->save();
      }else{
         $coupon_mail = "Không sử dụng mã giảm giá";
      }
      $shipping = new Shipping();
      $shipping->shipping_name = $data['shipping_name'];
      $shipping->shipping_email = $data['shipping_email'];
      $shipping->shipping_phone = $data['shipping_phone'];
      $shipping->shipping_address_city = $data['shipping_address_city'];
      $shipping->shipping_address_province = $data['shipping_address_province'];
      $shipping->shipping_address_wards = $data['shipping_address_wards'];
      $shipping->shipping_address = $data['shipping_address'];
      $shipping->shipping_method = $data['shipping_method'];
      $shipping->shipping_notes = $data['shipping_notes'];
      $shipping->save();

      $shipping_id = $shipping->shipping_id;
      $checkout_code = substr(md5(microtime()), rand(0,26),5);
      $order = new Order();
      $order->customer_id = Session::get('customer_id');
      $order->shipping_id = $shipping_id;
      $order->order_status = 1;
      $order->order_code = $checkout_code;
      date_default_timezone_set('Asia/Ho_Chi_Minh');
      $order->created_at = now();
      $order->save();

      if(Session::get('cart')==true){
         foreach(Session::get('cart') as $key => $cart){
           $order_details = new OrderDetails();
           $order_details->order_code = $checkout_code;
           $order_details->product_id = $cart['product_id'];
           $order_details->product_name = $cart['product_name'];
           $order_details->product_size = $cart['product_size'];
           $order_details->product_price = $cart['product_price'];
           $order_details->product_sales_quantity = $cart['product_qty'];
           $order_details->product_coupon = $data['order_coupon'];
           $order_details->save();
        }
     }

      $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');

      $title_mail = "Đơn hàng xác nhận ngày".' '.$now;

      $customer = Customer::find(Session::get('customer_id'));
      $data['email'][] = $customer->customer_email;
      if(Session::get('cart')==true){
         foreach(Session::get('cart') as $key => $cart_email){
            $cart_mail[] = array(
               'product_name' => $cart_email['product_name'],
               'product_size' => $cart_email['product_size'],
               'product_price' => $cart_email['product_price'],
               'product_sales_quantity' => $cart_email['product_qty']
            );
         }
      }
      $shipping_mail = array(
         'customer_name' => $customer->customer_name,
         'shipping_name' => $data['shipping_name'],
         'shipping_email' => $data['shipping_email'],
         'shipping_phone' => $data['shipping_phone'],
         'shipping_address_city' => $data['shipping_address_city'],
         'shipping_address_province' => $data['shipping_address_province'],
         'shipping_address_wards' => $data['shipping_address_wards'],
         'shipping_address' => $data['shipping_address'],
         'shipping_method' => $data['shipping_method'],
         'shipping_notes' => $data['shipping_notes']
      );

      $order_mail = array(
         'coupon_code' => $coupon_mail,
         'order_code' => $checkout_code
      );
      Mail::send('pages.mail.send_mail', ['cart_mail'=>$cart_mail, 'shipping_mail'=>$shipping_mail, 'order_mail'=>$order_mail], function($message) use ($title_mail,$data){
         $message->to($data['email'])->subject($title_mail);
         $message->from($data['email'], $title_mail);
      });

      Session::forget('coupon');
      Session::forget('cart');
   }
}
