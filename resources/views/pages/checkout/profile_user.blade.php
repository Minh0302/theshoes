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
            <div class="profile-usertitle-name"> {{$customer->customer_name}} </div>
            <div class="profile-usertitle-job"> Thành Viên </div>
          </div>
          <div class="profile-userbuttons">
            <a href="{{url('/')}}" class="btn btn-success btn-sm" style="color:white;">Trang chủ</a>
            <a href="{{url('/dang-xuat')}}" class="btn btn-danger btn-sm" style="color:white;">Đăng xuất</a>
          </div>
          <div class="profile-usermenu">
            <ul class="nav">
              <div class="menu-icon"></div>
              <li class="active"> <a href="{{url('/ho-so-khach-hang/'.$customer_id)}}" style="text-decoration: none;"> <i class="fas fa-info-circle"></i>
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
        <h4><u> Thông tin cá nhân : </u></h4>
        <thead>
          <tr>
            <th>Họ - Tên</th>
            <th>Email</th>
            <th>Điện thoại</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$customer->customer_name}}</td>
            <td>{{$customer->customer_email}}</td>
            <td>{{$customer->customer_phone}}</td>
          </tr>
        </tbody>
      </table>

      <table class="table table-striped table-bordered table-list">
        <h4><u> Lịch sử mua hàng : </u></h4>
        <thead>
          <tr>
            <th>Mã đơn hàng</th>
            <th>Ngày mua</th>
            <th>Xem chi tiết</th>
          </tr>
        </thead>
        <tbody>
          @foreach($order as $key => $ord)
          <tr>
            <td>{{$ord->order_code}}</td>
            <td>{{$ord->created_at}}</td>
            <td><a href="{{url('/lich-su-don-hang/'.$ord->order_code)}}" class="his_ord" style="text-decoration: none;color: red;font-size: 18px;"><i class="fas fa-eye"></i></a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
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
