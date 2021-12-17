@extends('welcome')
@section('slide')
@include('pages.slide')
@endsection

@section('cart_home')
@include('pages.cart_home')
@endsection

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-7">
      <div class="cart">
        <div class="cart-header header-checkout">Địa chỉ nhận hàng</div>
        <div class="cart-body">
          <!-- <section> -->
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12  wrapbox-content-page-contact">
                  <div class="box-send-contact">
                    <div id="col-left contactFormWrapper menuList-links">
                      <form class="contact-form" method="POST">
                        @csrf
                        <div class="contact-form">
                          <div class="row">
                            <div class="col-sm-12 col-xs-12">
                              <div class="input-group">
                                <input type="text" class="form-control shipping_name"
                                placeholder="Tên của bạn" name="shipping_name">
                              </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">  
                              <div class="input-group">
                                <input type="text" class="form-control shipping_email"
                                placeholder="Email của bạn" name="shipping_email">
                              </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                              <div class="input-group">
                                <input type="text" class="form-control shipping_phone"
                                placeholder="Số điện thoại của bạn" name="shipping_phone">
                              </div>
                            </div>
                          
                            <div class="col-sm-6 col-xs-12">  
                              <div class="input-group">
                                <select name="city" id="city" class="form-control input-sm m-bot15 choose city shipping_address_city">
                                  <option value="">---Tỉnh/Thành phố---</option>
                                  @foreach($city as $key => $ct)
                                  <option value="{{$ct->matp}}">{{$ct->name_city}}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                              <div class="input-group">
                                <select name="province" id="province" class="form-control input-sm m-bot15 province choose shipping_address_province">
                                  <option value="0">---Quận/Huyện---</option>             
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">  
                              <div class="input-group">
                                <select name="wards" id="wards" class="form-control input-sm m-bot15 wards shipping_address_wards">
                                  <option value="0">---Xã/Phường/Thị trấn---</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                              <div class="input-group">
                                <input type="text" class="form-control shipping_address"
                                placeholder="Địa chỉ chi tiết" name="shipping_address">
                              </div>
                            </div>
                            <div class="col-sm-12 col-xs-12">  
                              <div class="input-group">
                                <select class="form-control input-sm m-bot15 shipping_method" name="shipping_method">
                                  <option value="0">---Hình thức thanh toán---</option>
                                  <option value="1">Tiền mặt</option>
                                  <option value="2">ATM</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-12 col-xs-12">
                              <div class="input-group">
                                <textarea placeholder="Ghi chú đơn hàng" name="shipping_notes" class="shipping_notes"></textarea>
                              </div>
                            </div>
                            @if(Session::get('coupon'))
                              @foreach(Session::get('coupon') as $key => $cou)
                              <input type="hidden" name="order_coupon" class="order_coupon" value="{{$cou['coupon_code']}}">
                              @endforeach
                            @else
                              <input type="hidden" name="order_coupon" class="order_coupon" value="no">
                            @endif
                            <input type = "hidden" name = "_ token" value = "{{Session :: token ()}}">
                            <div class="col-sm-12">
                              <button class="button dark send_order" type="button" id="send_order" name="send_order">Xác nhận đặt hàng</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            

          <!-- </section> -->
        </div>
      </div>
    </div>
    <div class="col-md-5">
      <div class="card">
        <div class="cart-header header-checkout">Đơn hàng</div>
        <div class="cart-body">
          <div class="site-nav-container-last" style="color:#272727">
            <div class="cart-view clearfix">
              <table id="cart-view">
                <tbody>
                  @if(Session::get('cart')==true)

                  @php
                  $total = 0;
                  @endphp
                  @foreach(Session::get('cart') as $key => $cart)
                  @php
                  $subtotal = $cart['product_price']*$cart['product_qty'];
                  $total+=$subtotal;
                  @endphp
                  <tr class="item_1">
                    <td class="img"><a href="{{url('chi-tiet/'.$cart['slug_product'])}}" title="{{$cart['product_name']}}"><img
                      src="{{asset('./uploads/'.$cart['product_image'])}}" alt="{{$cart['product_name']}}"></a></td>
                      <td>
                        <a class="pro-title-view" style="color: #272727" href="{{url('chi-tiet/'.$cart['slug_product'])}}"
                        title="Nike Air Max 90 Essential &quot;Grape&quot;">{{$cart['product_name']}}</a>
                        <span class="variant">Size: {{$cart['product_size']}}</span>
                        <span class="pro-quantity-view">{{$cart['product_qty']}}</span>
                        <span class="pro-price-view">{{number_format($cart['product_price']).' '.'₫'}}</span>
                        <span class="remove_link remove-cart" style="color: #272727; font-weight: bold;" >{{number_format($subtotal).' '.'₫'}}</span>
                        </td>
                      </tr>
                      @endforeach
                      <tr>
                        <form action="{{url('/giam-gia')}}" method="POST">
                          @csrf
                          @if(Session::get('coupon'))
                          <td>                            
                            <a class="button" href="{{url('/xoa-ma')}}" style="color:white;text-decoration: none;">Xoá mã</a>
                          </td>
                          @else
                            <td>
                              <button type="submit" class="button" name="check_coupon"> 
                                Áp dụng
                              </button>
                            </td>
                          @endif 
                          <td style="margin: auto;"><input class="form-control" type="text"  placeholder="Nhập mã giảm giá" name="coupon" size="10"></td>
                        </form>
                      </tr>
                      @else
                      <tr style="font-size: 18px;font-weight:bold;">
                        <td colspan="2">
                          @php 
                            echo "Thêm sản phẩm vào giỏ hàng";
                          @endphp
                        </td>
                      </tr>
                      @endif
                    </tbody>
                  </table>

                  <div class="backto" style="color:red ;text-decoration: none;font-size: 18px;font-weight: bold;">
                    <a href="{{url('/gio-hang')}}"><i class="fa fa-long-arrow-alt-left"></i> Quay lại giỏ hàng</a>
                  </div>
                  <span class="line"></span>

                  <table class="table-total">
                    <tbody>
                      @if(Session::get('cart')==true)
                      <tr style="font-size: 18px;font-weight: bold;">
                        <td class="text-left">TẠM TÍNH:</td>
                        <td class="text-right" id="total-view-cart">{{number_format($total).' '.'₫'}}</td>
                      </tr>
                      <tr style="font-size: 18px;font-weight: bold; padding-top: 20px;">
                        <td class="text-left">SHIP:</td>
                        <td class="text-right" id="total-view-cart">FREE</td>
                      </tr>
                      <tr style="font-size: 18px;font-weight: bold; padding-top: 20px;">
                      @if(Session::get('coupon'))
                          @foreach(Session::get('coupon') as $key => $cou)
                              @if($cou['coupon_condition']==1)
                                  <td class="text-left">GIẢM GIÁ:</td>
                                  <td class="text-right" id="total-view-cart">{{$cou['coupon_number']}}%</td>
                                  
                                  @php
                                      $total_coupon = ($total*$cou['coupon_number'])/100;
                                      $total_after_coupon = $total - $total_coupon;
                                  @endphp
                              @elseif($cou['coupon_condition']==2)
                                  <td class="text-left">GIẢM GIÁ:</td>
                                  <td class="text-right" id="total-view-cart">{{number_format($cou['coupon_number']).' '.'₫'}}</td>
                                  
                                  @php
                                      $total_coupon = $total - $cou['coupon_number'];
                                      $total_after_coupon = $total_coupon;
                                  @endphp
                              @endif
                          @endforeach

                      @endif
                      </tr>
                      
                      <tr style="font-size: 18px;font-weight: bold; padding-top: 20px;">
                        @if(Session::get('coupon'))
                            <td class="text-left">TỔNG TIỀN:</td>
                            <td class="text-right" id="total-view-cart">{{number_format($total_after_coupon).' '.'₫'}}</td>
                        @else
                            <td class="text-left">TỔNG TIỀN:</td>
                            <td class="text-right" id="total-view-cart">{{number_format($total).' '.'₫'}}</td>
                        @endif
                      </tr>

                      @endif

                    </tbody>
                  </table>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>


    @endsection