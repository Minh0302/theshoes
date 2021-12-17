<div id="offcanvas-flip2" uk-offcanvas="flip: true; overlay: true">
  <div class="uk-offcanvas-bar" style="background: white;
  width: 350px;">

    <button class="uk-offcanvas-close" style="color:#272727" type="button" uk-close></button>

    <h3 style="font-size: 14px;
  color: #272727;
  text-transform: uppercase;
  margin: 3px 0 30px 0;
  font-weight: 500; letter-spacing: 2px;">Giỏ hàng</h3>
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
              <td class="img"><a href="" title="{{$cart['product_name']}}"><img src="{{asset('./uploads/'.$cart['product_image'])}}" alt="{{$cart['product_name']}}"></a></td>
              <td>
                <a class="pro-title-view" style="color: #272727" href="" title="Nike Air Max 90 Essential &quot;Grape&quot;">{{$cart['product_name']}}</a>
                <span class="variant">Size: {{$cart['product_size']}}</span>
                <span class="pro-quantity-view">{{$cart['product_qty']}}</span>
                <span class="pro-price-view">{{number_format($cart['product_price']).' '.'₫'}}</span>
                <span class="remove_link remove-cart"><a href="{{url('/delete-cart-ajax/'.$cart['session_id'])}}"><i style="color: #272727;" class="fas fa-times"></i></a></span>
              </td>
            </tr>
            @endforeach
            @endif
          </tbody>
        </table>
        <span class="line"></span>
        <table class="table-total">
          <tbody>
            @if(Session::get('cart')==true)
            <tr>
              <td class="text-left">TỔNG TIỀN:</td>
              <td class="text-right" id="total-view-cart">{{number_format($total).' '.'₫'}}</td>
            </tr>
            @endif
            <tr>
              <td class="distance-td"><a href="{{url('gio-hang')}}" class="linktocart button dark">Xem giỏ hàng</a></td>
              <td><a href="{{url('thanh-toan')}}" class="linktocheckout button dark">Thanh toán</a></td>
            </tr>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>