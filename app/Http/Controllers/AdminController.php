<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Model;
use Session;
use App\Http\Requests;
use App\Models\Admin;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;
use DB;
use App\Imports\ExcelImport;
use App\Exports\ExcelExport;
use Excel;

session_start();

class AdminController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function index(){

        return view('admin_login');
    }
    public function show_dashboard(){
        $this->AuthLogin();

        $customer = Customer::orderby('customer_id','DESC')->get();
        $count_customer = count($customer);
        $order = Order::orderby('order_id','DESC')->get();
        $count_order = count($order);
        $order_not_processed = Order::orderby('order_id','DESC')->where('order_status','1')->get();
        $count_order_not_processed = count($order_not_processed);
        $order_processed = Order::orderby('order_id','DESC')->where('order_status','2')->get();
        $count_order_processed = count($order_processed);
        $order_cancellation = Order::orderby('order_id','DESC')->where('order_status','3')->get();
        $count_order_cancellation = count($order_cancellation);
        $product = Product::orderby('id','DESC')->get();
        $sold = 0;
        $tock = 0;
        foreach($product as $key => $pro){
            $product_sold = $pro->product_sold;
            $sold+=$product_sold;
            $product_quantity = $pro->product_quantity;
            $tock+=$product_quantity;
        }
        $count_product_sold = $sold;
        $count_product_quantity = $tock;
        return view('admin.dashboard')->with(compact('count_customer','count_order','count_product_sold','count_product_quantity','count_order_not_processed','count_order_processed','count_order_cancellation'));
    }
    public function dashboard(Request $request){
        $data = $request->all();
        $admin_email = $data['admin_email'];
        $admin_password  = md5($request->admin_password);
        $login = Admin::where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();

        if($login){
            $login_count = $login->count();
             if($login_count>0){
                Session::put('admin_name',$login->admin_name);
                Session::put('admin_id',$login->admin_id);
                return Redirect::to('/dashboard');
                }
            }
            else{
                     Session::put('message','Email or Password Incorrect');
                     return Redirect::to('/admin');
        }
    }
    public function logout(){
        $this->AuthLogin();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/admin');
    }
    public function export_csv(){
        return Excel::download(new ExcelExport , 'product.xlsx');
    }
    public function import_csv(Request $request){
        $path = $request->file('file')->getRealPath();
        Excel::import(new ExcelImport, $path);
        return back();
    }


}
