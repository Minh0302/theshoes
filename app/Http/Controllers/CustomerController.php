<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Social; //sử dụng model Social
use Socialite; //sử dụng Socialite
use App\Models\Login; //sử dụng model Login
use DB;
use Session;
session_start();

class CustomerController extends Controller
{
    public function dangnhap(Request $request){
        // seo
        $meta_desc = "Chuyên bán giày đá bóng. Nhiều mẫu giày đá bóng sân cỏ tự nhiên chính hãng, giá rẻ.";
        $meta_keywords = "giay bong da, giày bóng đá, shop giày chính hãng";
        $meta_title = "Giày Đá Bóng Chính Hãng | Giày Đá Banh | Thế Giới Bóng Đá";
        $url_canonical = $request->url();
        // end-seo
        return view('pages.checkout.login')->with(compact('meta_desc','meta_keywords','meta_title','url_canonical'));
    }
    public function dangki(Request $request){
        // seo
        $meta_desc = "Chuyên bán giày đá bóng. Nhiều mẫu giày đá bóng sân cỏ tự nhiên chính hãng, giá rẻ.";
        $meta_keywords = "giay bong da, giày bóng đá, shop giày chính hãng";
        $meta_title = "Giày Đá Bóng Chính Hãng | Giày Đá Banh | Thế Giới Bóng Đá";
        $url_canonical = $request->url();
        // end-seo
        return view('pages.checkout.register')->with(compact('meta_desc','meta_keywords','meta_title','url_canonical'));
    }
    public function add_customer(Request $request){
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_password'] = md5($request->customer_password);

        $customer_id = DB::table('customers')->insertGetId($data);
        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_name);

        return Redirect('/trang-chu');
    }
    public function login_customer(Request $request){
        $data = $request->all();
        $email = $data['email_account'];
        $password = md5($request->password_account);
        $login = Login::where('customer_email',$email)->where('customer_password',$password)->first();
        if($login){
            $login_count = $login->count();
            if($login_count>0){
                Session::put('customer_id',$login->customer_id);
                Session::put('customer_name',$login->customer_name);
                return Redirect('/thanh-toan');
            }
        }else{
            return Redirect('/dang-nhap')->with('message','Email hoặc mật khẩu sai!');
        }

    }
    public function logout(){
        Session::flush();
        return Redirect('/trang-chu');
    }
    public function login_facebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function callback_facebook(){
        $provider = Socialite::driver('facebook')->user();
        $account = Social::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
        if($account){
              
            $account_name = Login::where('customer_id',$account->user)->first();
            Session::put('customer_name',$account_name->customer_name);
            Session::put('customer_id',$account_name->customer_id);
            return redirect('/trang-chu')->with('message', 'Đăng nhập thành công');
        }else{

            $customer_login = new Social([
                'provider_user_id' => $provider->getId(),
                'provider' => 'facebook'
            ]);

            $orang = Login::where('customer_email',$provider->getEmail())->first();

            if(!$orang){
                $orang = Login::create([
                    'customer_name' => $provider->getName(),
                    'customer_email' => $provider->getEmail(),
                    'customer_password' => '',
                    'customer_phone' => ''

                ]);
            }
            $customer_login->login()->associate($orang);
            $customer_login->save();

            $account_name = Login::where('customer_id',$account->user)->first();

            Session::put('customer_name',$account_name->customer_name);
             Session::put('customer_id',$account_name->customer_id);
            return redirect('/trang-chu')->with('message', 'Đăng nhập thành công');
        } 
    }

    public function login_google(){
        return Socialite::driver('google')->redirect();
    }
    public function callback_google(){
        $users = Socialite::driver('google')->stateless()->user(); 
        $authUser = $this->findOrCreateUser($users,'google');
        if($authUser){
            $account_name = Login::where('customer_id',$authUser->user)->first();
            Session::put('customer_name',$account_name->customer_name);
            Session::put('customer_id',$account_name->customer_id);
        }elseif($login_gg){
            $account_name = Login::where('customer_id',$authUser->user)->first();
            Session::put('customer_name',$account_name->customer_name);
            Session::put('customer_id',$account_name->customer_id);
        }
        
        return redirect('/trang-chu')->with('message', 'Đăng nhập thành công');


    }
    public function findOrCreateUser($users,$provider){
        $authUser = Social::where('provider_user_id', $users->id)->first();
        if($authUser){
            return $authUser;
        }else{
            $login_gg = new Social([
            'provider_user_id' => $users->id,
            'provider' => strtoupper($provider)
            ]);

            $orang = Login::where('customer_email',$users->email)->first();

            if(!$orang){
                $orang = Login::create([
                    'customer_name' => $users->name,
                    'customer_email' => $users->email,
                    'customer_password' => '',
                    'customer_phone' => ''
                ]);
            }
            $login_gg->login()->associate($orang);
            $login_gg->save();
            return $login_gg;
        }
    }

}
