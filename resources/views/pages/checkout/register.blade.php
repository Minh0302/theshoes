@extends('welcome')

@section('cart_home')
  @include('pages.cart_home')
@endsection

@section('content')
<section class="signup">
        <div class="container">
            <div class="signin-left">
                <div class="sign-title">
                    <h1>Tạo tài khoản</h1>
                </div>
            </div>
            <div class="signin-right ">
                <div>
                    <form action="{{url('add-customer')}}" method="POST">
                        @csrf
                        <div class="firstname form-control1 ">
                            <input type="text" name="customer_name" placeholder="Họ-Tên">
                        </div>
                        <div class="email form-control1">
                            <input type="email"  name="customer_email" placeholder="Email">
                        </div>
                        <div class="firstname form-control1 ">
                            <input type="text" name="customer_phone" placeholder="Điện thoại">
                        </div>
                        <div class="password form-control1">
                            <input type="password" name="customer_password" placeholder="Password">
                        </div>
                        <div class="recaptcha form-control1">This site is protected by reCAPTCHA and the Google <a href="">Privacy Policy</a> and <a href="">Terms of Service</a> apply.</div>
                        <button type="submit" class="button btn-addtocart addtocart-modal"> 
                            Đăng kí
                        </button>
                        <div class="backto">
                          <a href="{{url('/')}}"><i class="fa fa-long-arrow-alt-left"></i> Quay lại trang chủ</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection