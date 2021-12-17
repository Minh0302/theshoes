@extends('welcome')

@section('cart_home')
  @include('pages.cart_home')
@endsection

@section('content')
<section class="signin ">
        <div class="container">
            <div class="signin-left">
                <div class="sign-title">
                    <h1>Đăng nhập</h1>
                </div>
            </div>
            <div class="signin-right " id="a-sign">
                
                <div>
                    @if(session()->has('message'))
                    <div class="alert alert-danger" style="font-size: 18px;font-weight: bold;">
                        {!! session()->get('message') !!}
                    </div>
                    @endif
                    <form action="{{url('login-customer')}}" method="POST">
                        @csrf
                        <div class="username form-control1 ">
                            <input type="email" name="email_account" placeholder="Email">
                        </div>
                        <div class="password form-control1">
                            <input type="password" name="password_account" placeholder="Mật khẩu">
                        </div>
                     
                        <div class="recaptcha form-control1">This site is protected by reCAPTCHA and the Google <a href="">Privacy Policy</a> and <a href="">Terms of Service</a> apply.</div>

                        <br>
                        <button type="submit" class="button btn-addtocart addtocart-modal"> 
                            Đăng nhập
                        </button>
                    </form>
                        <span><center><a href="{{url('/login-facebook')}}" class="btn" style="border: 1px solid;background-color: #4545F5;color: white;"><i class="fab fa-facebook-square" style="font-size: 16px;padding-right: 5px;"></i>Đăng nhập với Facebook</a><a href="{{url('/login-google')}}" class="btn" style="margin-left: 10px;border: 1px solid;background-color: #F51D2F;color: white;"><i class="fab fa-google-plus-square" style="font-size: 16px;padding-right: 5px;"></i>Đăng nhập với Google</a></center></span>
                        <br>
                        <center><div class="submit"> 
                        <div class="forgetpassword">
                                <p id="quenmk">Quên mật khẩu?</p> hoặc <a href="{{url('dang-ki')}}">Đăng kí</a>
                          </div>
                           
                        </div>
                        
                        </center>

                </div>
            </div>

            <div class="signin-right " id="b-sign">
                <form action="">
                    <div class="username form-control1 ">
                       <h2>Phục hồi mật khẩu</h2>
                    </div>
                    <div class="password form-control1">
                        <input type="text" id="password" placeholder="Mật khẩu">
                    </div>
                 
                    <div class="recaptcha form-control1">This site is protected by reCAPTCHA and the Google <a href="">Privacy Policy</a> and <a href="">Terms of Service</a> apply.</div>
                    <div class="submit">
                      <input class="btn" type="submit" value="Gửi">
                      <div class="forgetpassword">
                            <a href="" id="huy">Hủy</a>
                      </div>
                       
                    </div>
                    
                </form>
            </div>
        </div>
    </section>
@endsection