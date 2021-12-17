@extends('welcome')

@section('cart_home')
@include('pages.cart_home')
@endsection

@section('content')

<div class="container">
  <h1 class="text-center">Xin chào {{$customer->customer_name}}!</h1>
  <div class="container">
    <div class="row profile">
      <div class="col-md-3">
        <div class="profile-sidebar">

          <div class="profile-userpic"> <img src="{{asset('./frontend/images/user-profile.jpg')}}" class="img-responsive"
            alt="Thông tin cá nhân">
          </div>
          <div class="profile-usertitle">
            <div class="profile-usertitle-name">  </div>
            <div class="profile-usertitle-job"> Member </div>
          </div>
          <div class="profile-userbuttons">
            <a href="{{url('/')}}" class="btn btn-success btn-sm" style="color:white;">Trang chủ</a>
            <a href="{{url('/dang-xuat')}}" class="btn btn-danger btn-sm" style="color:white;">Đăng xuất</a>
          </div>
          <div class="profile-usermenu">
            <ul class="nav">
              <div class="menu-icon"></div>
              <li class="active"> <a href="{{url('/ho-so-khach-hang/'.$customer->customer_id)}}" style="text-decoration: none;"> <i class="fas fa-info-circle"></i>
              Thông tin đăng nhập </a>
            </li>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-md-9">
    <div class="profile-content">

      <table class="table table-striped table-bordered table-list">
        <h4><u> Mã đơn hàng : </u></h4>
        <thead>

          <tr>
            <th>Họ - Tên</th>
            <th>Email</th>
            <th>Điện thoại</th>
            <th>Địa chỉ</th>
            <th>Phương thức thanh toán</th>
            <th>Ghi chú</th>
          </tr>

        </thead>
        <tbody>
          @foreach($shipping as $key => $ship)
          <tr>
            <td>{{$ship->shipping_name}}</td>
            <td>{{$ship->shipping_email}}</td>
            <td>{{$ship->shipping_phone}}</td>
            <td>{{$ship->shipping_address}}, {{$ship->ward->name_xaphuong}}, {{$ship->province->name_quanhuyen}}, {{$ship->city->name_city}}</td>
            <td>
              @if($ship->shipping_method==1)
              Tiền mặt
              @else
              ATM
              @endif
            </td>
            <td>{{$ship->shipping_notes}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <table class="table table-striped table-bordered table-list">
        <h4><u> Lịch sử đơn hàng : </u></h4>
        <thead>

          <tr>
            <th>STT</th>
            <th>Tên Sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Size</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng</th>
          </tr>

        </thead>
        <tbody>
          @php
          $i=1;
          $total = 0;
          @endphp
          @foreach($order_details as $key => $order_d)
          @php
          $subtotal = $order_d->product_price*$order_d->product_sales_quantity;
          $total+=$subtotal;
          @endphp
          <tr>
            <td>{{$i++}}</td>
            <td>{{$order_d->product_name}}</td>
            <td><img src="{{asset('./uploads/'.$order_d->product->product_image)}}" width="50px" height="50px"></td>
            <td>{{$order_d->product_size}}</td>
            <td>{{number_format($order_d->product_price).' '.'₫'}}</td>
            <td>{{$order_d->product_sales_quantity}}</td>
            <td>{{number_format($subtotal).' '.'₫'}}</td>
          </tr>
          @endforeach

          @if($order_d->product_coupon != 'no')
          @php
          $order_c = $order_d->product_coupon
          @endphp
          @else
          @php
          $order_c = 'No'
          @endphp
          @endif

          @if($coupon_condition==1)
          @php
          $total_coupon = ($total*$coupon_number)/100;
          $total_after = $total-$total_coupon;
          @endphp
          @else
          @php
          $total_coupon = $total-$coupon_number;
          $total_after = $total_coupon;
          @endphp
          @endif
          <tr>
            <td colspan="5">Giảm giá</td>
            <td>@if($coupon_condition==1)
              @php echo '('.$order_c.')' @endphp
              @else
              @php echo '('.$order_c.')' @endphp
            @endif</td>
            <td>@if($coupon_condition==1)
              {{$coupon_number}}%
              @else
              {{number_format($coupon_number ).' '.'₫'}}
            @endif</td>
          </tr>
          <tr>
            <td colspan="6">Tổng cộng</td>
            <td>{{number_format($total_after).' '.'₫'}}</td>
          </tr>
        </tbody>
      </table>
      <div class="backto" style="color:red ;text-decoration: none;font-size: 18px;font-weight: bold;">
        <a href="{{url('/ho-so-khach-hang/'.$customer->customer_id)}}"><i class="fa fa-long-arrow-alt-left"></i> Quay lại</a>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<style>
body {
  background: #F1F3FA;
}


.profile {
  margin: 20px 0;
}

.profile-sidebar {
  padding: 20px 0 10px 0;
  background: #fff;
}


.profile-userpic img {
  float: none;
  margin: 0 25%;
  width: 50%;
  height: 50%;
  -webkit-border-radius: 50% !important;
  -moz-border-radius: 50% !important;
  border-radius: 50% !important;
}


.profile-usertitle {
  text-align: center;
  margin-top: 20px;
}


.profile-usertitle-name {
  color: #5a7391;
  font-size: 16px;
  font-weight: 600;
  margin-bottom: 7px;
}


.profile-usertitle-job {
  text-transform: uppercase;
  color: #5b9bd1;
  font-size: 12px;
  font-weight: 600;
  margin-bottom: 15px;
}


.profile-userbuttons {
  text-align: center;
  margin-top: 10px;
}


.profile-userbuttons .btn {
  text-transform: uppercase;
  font-size: 11px;
  font-weight: 600;
  padding: 6px 15px;
  margin-right: 5px;
}

.profile-userbuttons .btn a {
  text-decoration: none;
  color: white;
}

.profile-userbuttons .btn:last-child {
  margin-right: 0px;
}

.profile-usermenu {
  margin-top: 30px;
}

.profile-usermenu ul li {
  border-bottom: 1px solid #f0f4f7;
}


.profile-usermenu ul li:last-child {
  border-bottom: none;
}

.profile-usermenu ul li a {
  color: #93a3b5;
  font-size: 14px;
  font-weight: 400;
}


.profile-usermenu ul li a i {
  margin-right: 8px;
  font-size: 14px;
}

.profile-usermenu ul li a:hover {
  background-color: #fafcfd;
  color: #5b9bd1;
}


.profile-usermenu ul li.active {
  border-bottom: none;
}


.profile-usermenu ul li.active a {
  color: #5b9bd1;
  background-color: #f6f9fb;
  border-left: 2px solid #5b9bd1;
  margin-left: -2px;
}


.profile-content {
  padding: 20px;
  background: #fff;
  min-height: 460px;
}
</style>

@endsection
