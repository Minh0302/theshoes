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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="font-size: 22px;font-weight: bold;">Giỏ hàng</div>

                <div class="card-body">
                    @if(session()->has('message'))
                    <div class="alert alert-success" style="font-size: 18px;font-weight: bold;">
                      {!! session()->get('message') !!}
                    </div>
                    @elseif(session()->has('error'))
                    <div class="alert alert-danger" style="font-size: 18px;font-weight: bold;">
                      {!! session()->get('error') !!}
                    </div>
                    @endif
                  <form action="{{url('/update-cart-ajax')}}" method="POST">
                    @csrf
                    <table class="table table-striped">
                      <thead>
                        <tr class="table-primary" style="font-size:18px">
                          <th scope="col">Sản phẩm</th>
                          <th scope="col">Mô tả</th>
                          <th scope="col">Giá</th>
                          <th scope="col">Số lượng</th>
                          <th scope="col">Tổng</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
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
                          <tr>
                            <th scope="row"><img src="{{asset('./uploads/'.$cart['product_image'])}}" alt="{{$cart['product_name']}}" width="100"></th>
                            <th>
                              <p>ID: {{$cart['product_id']}}</p>
                              <p>Name: {{$cart['product_name']}}</p>
                              <p>Size: {{$cart['product_size']}}</p>
                            </th>
                            <th>{{number_format($cart['product_price']).' '.'₫'}}</th>
                            <th>
                                <div class="quantity-area clearfix">
                                  <div class="quantity-area clearfix">
                                    <input type="number" id="quantity" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}" min="1" class="cart_product_qty_[{{$cart['session_id']}}] quantity-selector" style="border: 2px solid Gray;">
                                  </div>
                                </div>
                            </th>
                            <th>{{number_format($subtotal).' '.'₫'}}</th>
                            <th style="font-size: 18px;color:red"><a href="{{url('/delete-cart-ajax/'.$cart['session_id'])}}"><i class="far fa-calendar-times"></i></a></th>
                          </tr>
                        @endforeach
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td>
                              <button type="submit" class="button" name="update_qty"> 
                                  Cập nhật
                              </button>
                          </td>
                          <td><a class="button" href="{{url('/delete-all')}}" style="color:white;text-decoration: none;">Xoá tất cả</a></td>
                          <td></td>
                        </tr>
                        
                        @else
                          <tr>
                            <th>
                              @php
                              echo "Thêm sản phẩm vào giỏ hàng";
                              @endphp
                            </th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                          </tr>
                        @endif
                          </form>
                          @if(Session::get('cart')==true)
                          <tr>
                              <td></td>
                              <td></td>
                            <form action="{{url('/giam-gia')}}" method="POST">
                              @csrf
                              <td style="margin: auto;"><input class="form-control" type="text"  placeholder="Nhập mã giảm giá" name="coupon" size="10"></td>
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
                              <td></td>
                              <td></td>
                            </form>
                          </tr>
                          @endif

                          @if(Session::get('cart')==true)
                          <tr>
                            <th></th>
                            <th></th>
                            <th colspan="2" style="text-align: center;font-size: 18px;font-weight: bold;">Tạm tính</th>
                            <th style="text-align: center;font-size: 18px;font-weight: bold;">{{number_format($total).' '.'₫'}}</th>
                            <th></th>
                          </tr>
                          <tr>
                            <th></th>
                            <th></th>
                            <th colspan="2" style="text-align: center;font-size: 18px;font-weight: bold;">Ship</th>
                            <th style="text-align: center;font-size: 18px;font-weight: bold;">FREE</th>
                            <th></th>
                          </tr>
                          <tr>
                            <th></th>
                            <th></th>
                            
                            @if(Session::get('coupon'))
                                @foreach(Session::get('coupon') as $key => $cou)
                                    @if($cou['coupon_condition']==1)
                                        <th colspan="2" style="text-align: center;font-size: 18px;font-weight: bold;">Giảm giá</th>
                                        <th style="text-align: center;font-size: 18px;font-weight: bold;">
                                          {{$cou['coupon_number']}}%

                                            @php
                                            $total_coupon = ($total*$cou['coupon_number'])/100;
                                            $total_after_coupon = $total-$total_coupon;
                                            @endphp
                                        </th>
                                    @elseif($cou['coupon_condition']==2)
                                        <th colspan="2" style="text-align: center;font-size: 18px;font-weight: bold;">Giảm giá</th>
                                        <th style="text-align: center;font-size: 18px;font-weight: bold;">
                                          {{number_format($cou['coupon_number']).' '.'₫'}}

                                            @php
                                            $total_coupon = $total-$cou['coupon_number'];
                                            $total_after_coupon = $total_coupon;
                                            @endphp
                                        </th>
                                    @endif
                                @endforeach
                            @else
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            @endif
                            <th></th>
                          </tr>
                          <tr>
                            <th></th>
                            <th></th>
                            <th colspan="2" style="text-align: center;font-size: 18px;font-weight: bold;">Tổng cộng</th>
                            @if(Session::get('coupon'))
                                <th style="text-align: center;font-size: 18px;font-weight: bold;">{{number_format($total_after_coupon).' '.'₫'}}</th>
                            @else
                                <th style="text-align: center;font-size: 18px;font-weight: bold;">{{number_format($total).' '.'₫'}}</th>
                            @endif
                            <th></th>
                          </tr>
                          <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="text-align: center;font-size: 18px;">
                              @if(Session::get('customer_id'))
                              <a class="button btn-check" href="{{url('thanh-toan')}}" style="color:white;text-decoration: none;">Thanh toán</a>
                              @else
                              <a class="button btn-check" href="{{url('dang-nhap')}}" style="color:white;text-decoration: none;">Thanh toán</a>
                              @endif
                            </td>
                            <td></td>
                        </tr>
                          @endif
                      </tbody>
                    

                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

