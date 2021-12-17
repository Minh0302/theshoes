<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Mail</title>
	  <link rel="stylesheet" href="{{asset('./frontend/plugins/bootstrap/bootstrap.min.css')}}">
</head>
<body>
	<div class="container" style="background:#222;border-radius: 12px;padding: 15px;">
		<div class="col-md-12">
			<p style="text-align: center;color: #fff;">Đây là email tự động. Quý khách vui lòng không trả lời email này</p>
			<div class="row" style="background-color: #6BDBDB;padding: 15px;">
				<div class="col-md-12" style="text-align: center;color: #fff;font-weight: bold;font-size: 30px;">
					<h4 style="margin:0">Công ty TNHHMTV The Sports</h4>
					<h6 style="margin:0">Số 372 Đường 30 Tháng 4, P.Xuân Khánh, Q.Ninh Kiều, TP.Cần Thơ, Việt Nam</h6>
				</div>
				<div class="col-md-12">
					<p>Chào bạn <strong style="color:#FFF;text-decoration: underline;">{{$shipping_mail['customer_name']}}</strong></p>
				</div>
				<div class="col-md-12">
					<h4 style="color: #000;text-transform: uppercase;">Thông tin đơn hàng</h4>
					<p>Mã đơn hàng: <strong style="text-transform: uppercase;color: #fff;">{{$order_mail['order_code']}}</strong></p>
					<p>Mã khuyến mãi áp dụng: <strong style="text-transform: uppercase;color: #fff;">{{$order_mail['coupon_code']}}</strong></p>
					<p>Dịch vụ: <strong style="text-transform: uppercase;color: #fff;">Đặt hàng trực tuyến</strong></p>
					<h4 style="color: #000;text-transform: uppercase;">Thông tin người nhận</h4>
					<p>Họ tên người nhận: <span style="color: #FFF;">{{$shipping_mail['shipping_name']}}</span></p>
					<p>Email: <span style="color: #FFF;">{{$shipping_mail['shipping_email']}}</span></p>
					<p>Địa chỉ người nhận: <span style="color: #FFF;">{{$shipping_mail['shipping_address']}}</span></p>
					<p>Số điện thoại: <span style="color: #FFF;">{{$shipping_mail['shipping_phone']}}</span></p>
					<p>Phương thức thanh toán: <span style="color: #FFF;">
					@if($shipping_mail['shipping_method']==1)
						Tiền mặt
					@elseif($shipping_mail['shipping_method']==2)
						ATM
					@endif
					</span></p>
					<p>Ghi chú đơn hàng: <span style="color: #FFF;">{{$shipping_mail['shipping_notes']}}</span></p>
					<h4 style="color: #000;text-transform: uppercase;">Thông tin đơn hàng</h4>
					<table class="table table-striped" style="border: 1px">
						<thead>
							<tr>
								<th>Sản phẩm</th>
								<th>Size</th>
								<th>Giá tiền</th>
								<th>Số lượng</th>
								<th>Thành tiền</th>
							</tr>
						</thead>
						<tbody>
							@php 
							$total = 0;
							@endphp
							@foreach($cart_mail as $cart)
							@php
							$subtotal = $cart['product_price']*$cart['product_sales_quantity'];
							$total+=$subtotal;
							@endphp
							<tr>
								<td>{{$cart['product_name']}}</td>
								<td>{{$cart['product_size']}}</td>
								<td>{{number_format($cart['product_price']).' '.'₫'}}</td>
								<td>{{$cart['product_sales_quantity']}}</td>
								<td>{{number_format($subtotal).' '.'₫'}}</td>
							</tr>
							@endforeach
							<tr>
								<td colspan="4" style="text-align: center;font-weight: bold;font-size: 18px;">Tổng tiền</td>
								<td>{{number_format($total).' '.'₫'}}</td>
							</tr>
						</tbody>
					</table>
				</div>
				<p style="color:#fff">Mọi chi tiết xin liên hệ website tại : <a href="http://leminh.com:8080/laravel_8/theshoes/" target="_blank">Shop Giày bóng đá chính hãng</a></p>
			</div>
		</div>
	</div>

	<script src="{{asset('./frontend/plugins/jquery-3.4.1/jquery-3.4.1.min.js')}}"></script>
	<script src="{{asset('./frontend/plugins/bootstrap/popper.min.js')}}"></script>
	<script src="{{asset('./frontend/plugins/bootstrap/bootstrap.min.js')}}"></script>
</body>
</html>