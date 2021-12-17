@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      THÔNG TIN KHÁCH HÀNG
    </div>
    <div class="table-responsive">
      <?php
      $message = Session::get('message');
      if($message){
        echo '<span class="text-alert">'.$message.'</span>';
        Session::put('message',null);
      }
      ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>ID</th> 
            <th>Tên</th>
            <th>Email</th>
            <th>SĐT</th>
            <!-- <th>Date</th> -->
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($customer as $key => $cus)
          <tr>
            <td>{{$cus->customer_id}}</td>
            <td>{{$cus->customer_name}}</td>
            <td>{{$cus->customer_email}}</td>
            <td>{{$cus->customer_phone}}</td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<br><br>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      THÔNG TIN NGƯỜI MUA
    </div>
    <div class="table-responsive">
      <?php
      $message = Session::get('message');
      if($message){
        echo '<span class="text-alert">'.$message.'</span>';
        Session::put('message',null);
      }
      ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên</th>
            <th>Email</th>
            <th>SĐT</th>
            <th>Địa chỉ</th>
            <th>Hình thức thanh toán</th>
            <th>Ghi chú</th>
            <!-- <th>Date</th> -->
            <th style="width:30px;"></th>
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
              @elseif($ship->shipping_method==2)
                ATM
              @endif
            </td>
            <td>{{$ship->shipping_notes}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<br><br>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      CHI TIẾT ĐƠN HÀNG
    </div>
    <div class="table-responsive">
      <?php
      $message = Session::get('message');
      if($message){
        echo '<span class="text-alert">'.$message.'</span>';
        Session::put('message',null);
      }
      ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <!-- <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th> -->
            <th>STT</th>
            <!-- <th>ID Product</th>  -->
            <th>Tên sản phẩm</th>
            <th>Size</th>
            <th>Sản phẩm trong kho</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <!-- <th>Product Coupon</th> -->
            <th>Tạm tính</th>
            <!-- <th>Date</th> -->
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i=1;
          $total = 0;
          ?>
          @foreach($order_details_product as $key => $order_d)
          @php
            $subtotal = $order_d->product_price * $order_d->product_sales_quantity;
            $total+=$subtotal;
          @endphp
          <tr class="">
            <td>{{$i++}}</td>
            <!-- <td>{{$order_d->product_id}}</td> -->
            <td>{{$order_d->product_name}}</td>
            <td>{{$order_d->product_size}}</td>
            <td>{{$order_d->product->product_quantity}}</td>
            <td>{{number_format($order_d->product_price).' '.'₫'}}</td>
            <td>

              <input type="number" disabled="" class="" name="product_sales_quantity" value="{{$order_d->product_sales_quantity}}" min="1" style="width: 60px;">
              <input type="hidden" name="order_product_id" class="order_product_id" value="{{$order_d->product_id}}">

            </td>

            @if($order_d->product_coupon != 'no')
              @php
                $order_c = $order_d->product_coupon
              @endphp
            @else
              @php
                $order_c = 'No'
              @endphp
            @endif

            <td>{{number_format($subtotal).' '.'₫'}}</td>
          </tr>
          @endforeach
          
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
            <td></td>
            <th>Mã giảm giá: </th>
            <td></td>
            <td></td>
            <td></td>
            <td>
              @if($coupon_condition==1)
                @php echo '('.$order_c.')' @endphp
              @else
                @php echo '('.$order_c.')' @endphp
              @endif
            </td>
            <td>
              @if($coupon_condition==1)
                {{$coupon_number}}%
              @else
                {{number_format($coupon_number ).' '.'₫'}}
              @endif
            </td>
          </tr>
          <tr>
            <td></td>
            <th>Ship: </th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <!-- <td></td> -->
            <td>FREE</td>
          </tr>
          <tr>
          <tr>
            <td></td>
            <th>Tổng: </th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <!-- <td></td> -->
            <td>{{number_format($total_after).' '.'₫'}}</td>
          </tr>
          <tr>
            <td colspan="7">
              @foreach($order as $key => $or)
              @if($or->order_status==1)
                <form>
                  @csrf
                  <div class="form-group">
                    <select name="order_details" class="form-control input-sm m-bot15 order_details" style="width: 200px;">
                      <option value="0">---Select order status---</option>
                      <option id="{{$or->order_id}}" value="1" selected>Chưa xử lý</option>
                      <option id="{{$or->order_id}}" value="2">Đã xử lý</option>
                      <option id="{{$or->order_id}}" value="3">Huỷ đơn hàng</option>
                    </select>
                  </div>
                </form>
              @elseif($or->order_status==2)
                <form>
                  @csrf
                  <div class="form-group">
                    <select name="order_details" class="form-control input-sm m-bot15 order_details" style="width: 200px;">
                      <option value="0">---Select order status---</option>
                      <option id="{{$or->order_id}}" value="1">Chưa xử lý</option>
                      <option id="{{$or->order_id}}" value="2" selected>Đã xử lý</option>
                      <option id="{{$or->order_id}}" value="3">Huỷ đơn hàng</option>
                    </select>
                  </div>
                </form>
              @elseif($or->order_status==3)
                <form>
                  @csrf
                    <div class="form-group">
                      <select name="order_details" class="form-control input-sm m-bot15 order_details" style="width: 200px;">
                        <option value="0">---Select order status---</option>
                        <option id="{{$or->order_id}}" value="1">Chưa xử lý</option>
                        <option id="{{$or->order_id}}" value="2">Đã xử lý</option>
                        <option id="{{$or->order_id}}" value="3" selected>Huỷ đơn hàng</option>
                      </select>
                    </div>
                  </form>
              @endif
              @endforeach
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="panel-heading">
        <a target="_blank" href="{{url('/print-order/'.$order_d->order_code)}}" style="text-align: center;font-size: 28px;">PRINT ORDER</a>
      </div>

    </div>
  </div>

  @endsection
