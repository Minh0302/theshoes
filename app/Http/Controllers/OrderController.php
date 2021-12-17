<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Customer;
use App\Models\Coupon;
use App\Models\City;
use App\Models\Province;
use App\Models\Ward;
use App\Models\Product;
use PDF;
use DB;
use Session;
session_start();

class OrderController extends Controller
{
    public function print_order($order_code){
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($order_code));
        return $pdf->stream();
    }
    public function print_order_convert($order_code){
        $order_details = OrderDetails::where('order_code',$order_code)->get();
        $order = Order::where('order_code',$order_code)->get();
        foreach ($order as $key => $ord) {
            $customer_id = $ord->customer_id;
            $shipping_id = $ord->shipping_id;

        }
        $customer = Customer::where('customer_id',$customer_id)->get();
        $shipping = Shipping::with('city','province','ward')->where('shipping_id',$shipping_id)->get();
        $order_details_product = OrderDetails::with('product')->where('order_code',$order_code)->get();
        foreach($order_details_product as $key => $order_d){
            $product_coupon = $order_d->product_coupon;

        }
        if($product_coupon != 'no'){
            $coupon = Coupon::where('coupon_code',$product_coupon)->first();
            $coupon_condition = $coupon->coupon_condition;
            $coupon_number = $coupon->coupon_number;
        }else{
            $coupon_condition = 2;
            $coupon_number = 0;
        }

        $output ='';

        $output.='
        <style>
        body{
            font-family: DejaVu sans;
        }
        .table-styling{
            border: 1px solid #000;
            text-align: center;
        }
        .table-styling tr td{
            border: 1px solid #000;
        }
        .table-styling tr th{
            border: 1px solid #000;
        }
        .order_code{
            padding: 0 0 0 40%;
        }
        .date_order{
            padding: 0 5% 0 0;
        }
        </style>

        <h1><center>Công ty TNHHMTV The Sports</center></h1>
        <h3><center>Số 372 Đường 30 Tháng 4, P.Xuân Khánh, Q.Ninh Kiều, TP.Cần Thơ, Việt Nam<center></h3>
        <h3><center><span>Điện thoại: 0971850845</span><span style="margin-left:30px">Email:theshoes@gmail.com</span></center></h3>
        <p>
        <div class="order_code">
        <span class="date_order">Ngày...tháng...năm 20..</span> 
        Mã đơn hàng: '.$order_code.'
        </div>
        </p>
        <h4>Thông tin tài khoản</h4>
        ';
        foreach($customer as $key => $cus){
            $output.='
            <p>Chủ tài khoản: '.$cus->customer_name.'</p>
            <p>Email: '.$cus->customer_email.'</p>
            <p>Số điện thoại: '.$cus->customer_phone.'</p>';
        }
        $output.='

        <h4>Thông tin người nhận</h4>
        ';
        foreach($shipping as $key => $ship){
            if($ship->shipping_method ==1 ){
                $method = 'Tiền mặt';
            }elseif($ship->shipping_method ==2){
                $method = 'ATM';
            }
            $output.='
            <p>Tên người nhận: '.$ship->shipping_name.'</p>
            <p>Email người nhận: '.$ship->shipping_email.'</p>
            <p>Số điện thoại người nhận: '.$ship->shipping_phone.'</p>
            <p>Địa chỉ người nhận: '.$ship->shipping_address.', '.$ship->ward->name_xaphuong.', '.$ship->province->name_quanhuyen.', '.$ship->city->name_city.'</p>
            <p>Hình thức thanh toán: '.$method.'</p>
            <p>Ghi chú: '.$ship->shipping_notes.'</p>';
        }
        $output.='
        <h4>Chi tiết đơn hàng</h4>
        <table class="table-styling">
        <thead>
        <tr>
        <th>Tên sản phẩm</th>
        <th>Size</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Tổng</th>
        </tr>
        </thead>
        <tbody>';
        $total = 0;
        $total_coupon = 0;

        foreach($order_details_product as $key => $ord_dt){
            $subtotal = $ord_dt->product_price*$ord_dt->product_sales_quantity;
            $total += $subtotal;
            if($ord_dt->product_coupon != 'no'){
                $product_coupon = $ord_dt->product_coupon;
            }
            else{
              $product_coupon = "No";
          }
          $output.='
          <tr>
          <td>'.$ord_dt->product_name.'</td>
          <td>'.$ord_dt->product_size.'</td>
          <td>'.number_format($ord_dt->product_price).' '.'₫'.'</td>
          <td>'.$ord_dt->product_sales_quantity.'</td>
          <td>'.number_format($subtotal ).' '.'₫'.'</td>
          </tr>';
      }
      if($coupon_condition==1){

        $total_after_coupon = ($total*$coupon_number)/100;
        $total_coupon = $total - $total_after_coupon;
        $coupon_num = "$coupon_number%";
        } 
        elseif($coupon_condition==2){

            $total_coupon = $total-$coupon_number;
            $coupon_num = number_format($coupon_number ).' '.'₫';
        }
        $output.='
        <tr>
        <th colspan="3">Giảm giá</th>
        <th>Mã: '.$product_coupon.'</th>
        <th>'.$coupon_num.'</th>
        </tr>
        <tr>
        <th colspan="4">Ship</th>
        <th>FREE</th>
        </tr>
        <tr>
        <th colspan="4">Tổng cộng</th>
        <th>'.number_format($total_coupon).' '.'₫'.'</th>

        </tr>';

        $output.='
        </tbody>
        </table>
        <h4>Ký tên người nhận</h4>
        <table>
        <thead>
        <tr>
        <th width="200px">Người lập phiếu</th>
        <th width="800px">Người nhận</th>
        </tr>
        </thead>
        <tbody>';
        $output.='
        </tbody>
        </table>'; 

        return $output;
    }
    public function manage_order(){
        $order = Order::orderby('created_at','DESC')->get();
        return view('admin.order.manage_order')->with(compact('order'));
    }
    public function view_order(Request $request, $order_code){
        $order_details = OrderDetails::with('product')->where('order_code',$order_code)->get();
        $order = Order::where('order_code',$order_code)->get();
        foreach($order as $key => $ord){
            $customer_id = $ord->customer_id;
            $shipping_id = $ord->shipping_id;
            $order_status = $ord->order_status;
        }
        $customer = Customer::where('customer_id',$customer_id)->get();
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
        return view('admin.order.view_order')->with(compact('order','order_details','customer','shipping','order_details_product','coupon_condition','coupon_number'));
    }
    public function update_product_qty(Request $request){
        $data = $request->all();
        $order = Order::find($data['order_id']);
        $order->order_status = $data['order_status'];
        $order->save();
        if($order->order_status==2){
            foreach($data['order_product_id'] as $key => $product_id){
                $product = Product::find($product_id);
                $product_quantity = $product->product_quantity;
                $product_sold = $product->product_sold;
                foreach($data['quantity'] as $key2 => $qty){

                    if($key==$key2){
                        $pro_remain = $product_quantity - $qty;
                        $product->product_quantity = $pro_remain;
                        $product->product_sold = $product_sold + $qty;
                        $product->save();
                    }
                }
            }
        }
        elseif($order->order_status!=2){
            foreach($data['order_product_id'] as $key => $product_id){
                $product = Product::find($product_id);
                $product_quantity = $product->product_quantity;
                $product_sold = $product->product_sold;
                foreach($data['quantity'] as $key2 => $qty){

                    if($key==$key2){
                        $pro_remain = $product_quantity + $qty;
                        $product->product_quantity = $pro_remain;
                        $product->product_sold = $product_sold - $qty;
                        $product->save();
                    }
                }
            }
        }
    }
}
