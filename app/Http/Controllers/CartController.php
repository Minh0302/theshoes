<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Coupon;
use App\Models\Slider;
use DB;
use Session;
session_start();

class CartController extends Controller
{
    public function gio_hang(Request $request){
        $slider = Slider::orderby('slider_id','ASC')->get();
        // seo
        $meta_desc = "Chuyên bán giày đá bóng. Nhiều mẫu giày đá bóng sân cỏ tự nhiên chính hãng, giá rẻ.";
        $meta_keywords = "giay bong da, giày bóng đá, shop giày chính hãng";
        $meta_title = "Giày Đá Bóng Chính Hãng | Giày Đá Banh | Thế Giới Bóng Đá";
        $url_canonical = $request->url();
        // end-seo
        return view('pages.cart.add_cart')->with(compact('meta_desc','meta_keywords','meta_title','url_canonical','slider'));
    }
    public function add_cart_ajax(Request $request){
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');
        if($cart==true){
            $is_avaiable = 0;
            foreach($cart as $key => $val){
                if($val['product_id']==$data['cart_product_id']){
                    $is_avaiable++;
                }
            }
            if($is_avaiable == 0){
                $cart[] = array(
                    'session_id' => $session_id,
                    'product_name' => $data['cart_product_name'],
                    'product_id' => $data['cart_product_id'],
                    'slug_product' => $data['cart_slug_product'],
                    'product_image' => $data['cart_product_image'],
                    'product_qty' => $data['cart_product_qty'],
                    'product_price' => $data['cart_product_price'],
                    'product_size' => $data['cart_product_size'],
                    'product_quantity' => $data['cart_product_quantity'],
                );
                Session::put('cart',$cart);
            }
        }else{
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'slug_product' => $data['cart_slug_product'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],
                'product_size' => $data['cart_product_size'],
                'product_quantity' => $data['cart_product_quantity'],
            );
            Session::put('cart',$cart);
        }

        Session::save();
    }
    public function update_cart_ajax(Request $request){
        $data = $request->all();
        $cart = Session::get('cart');
        if($cart==true){
            $message = '';
            foreach($data['cart_qty'] as $key => $qty){
                $i=0;
                foreach($cart as $session => $val){
                    $i++;
                    if($val['session_id']==$key && $qty < $cart[$session]['product_quantity']){
                        $cart[$session]['product_qty']=$qty;
                        $message.='<p style="color:blue;">'.$i.') Cập nhật :'.$cart[$session]['product_name'].' thành công!</p>';
                    }elseif($val['session_id']==$key && $qty > $cart[$session]['product_quantity']){
                        $message.='<p style="color:red;">'.$i.') Cập nhật :'.$cart[$session]['product_name'].' thất bại!</p>';
                    }
                }

            }
            Session::put('cart',$cart);
            return redirect()->back()->with('message',$message);
        }else{
            Session::put('cart',$cart);
            return redirect()->back()->with('message','Cập nhật thất bại!');
        }

    }
    public function delete_cart_ajax($session_id){
        $cart = Session::get('cart');
        if($cart==true){
            foreach($cart as $key => $val){
                if($val['session_id']==$session_id){
                    unset($cart[$key]);
                }
            }
            Session::put('cart',$cart);
            return redirect()->back()->with('message','Xoá sản phẩm thành công!');
        }
        else{
            return redirect()->back()->with('message','Xoá sản phẩm thất bại!');
        }
    }
    public function delete_all(){
        $cart = Session::get('cart');
        if($cart==true){
            Session::forget('cart');
            Session::forget('coupon');
            return redirect()->back()->with('message','Xoá sản phẩm thành công!');
        }else{
            return redirect()->back()->with('message','Xoá sản phẩm thất bại!');
        }
    }
    public function check_coupon(Request $request){
        $data = $request->all();
        $coupon = Coupon::where('coupon_code',$data['coupon'])->first();
        if(!$coupon){
            return redirect()->back()->with('error','Thêm mã giảm giá không thành công!');
        }
        $cou[] = array(
            'coupon_code' => $coupon->coupon_code,
            'coupon_condition' => $coupon->coupon_condition,
            'coupon_number' => $coupon->coupon_number,
        );
        Session::put('coupon',$cou);

        Session::save();
        return redirect()->back()->with('error','Thêm mã giảm giá thành công!');

    }
    public function unset_coupon(){
        $coupon = Session::get('coupon');
        if($coupon==true){
            Session::forget('coupon');
            return redirect()->back()->with('message','Xoá mã giảm giá thành công!');
        }else{
            return redirect()->back()->with('error','Xoá mã giảm giá không thành công!');
        }
    }
}
