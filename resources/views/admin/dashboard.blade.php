@extends('admin_layout')
@section('admin_content')
<h3>Welcome to admin</h3>

<!-- //market-->
<div class="market-updates">
		<div class="col-md-3 market-update-gd">
			<div class="market-update-block clr-block-1">
				<div class="col-md-4 market-update-right">
					<i class="fa fa-users" ></i>
				</div>
				<div class="col-md-8 market-update-left">
					<h4>Người dùng</h4>
					<h3>{{$count_customer}}</h3>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="col-md-3 market-update-gd">
			<div class="market-update-block clr-block-2">
				<div class="col-md-4 market-update-right">
					<i class="fa fa-eye"> </i>
				</div>
				<div class="col-md-8 market-update-left">
					<h4>Sản phẩm trong kho</h4>
					<h3>{{$count_product_quantity}}</h3>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="col-md-3 market-update-gd">
			<div class="market-update-block clr-block-3">
				<div class="col-md-4 market-update-right">
					<i class="fa fa-usd"></i>
				</div>
				<div class="col-md-8 market-update-left">
					<h4>Sản phẩm đã bán</h4>
					<h3>{{$count_product_sold}}</h3>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="col-md-3 market-update-gd">
			<div class="market-update-block clr-block-4">
				<div class="col-md-4 market-update-right">
					<i class="fa fa-shopping-cart" aria-hidden="true"></i>
				</div>
				<div class="col-md-8 market-update-left">
					<h4>Orders</h4>
					<h3>{{$count_order}}</h3>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	<div class="clearfix"> </div>
</div>	

<div class="market-updates">
		<div class="col-md-4 market-update-gd">
			<div class="market-update-block clr-block-5">
				<div class="col-md-4 market-update-right">
					<i class="fa fa-users" ></i>
				</div>
				<div class="col-md-8 market-update-left">
					<h4>Đơn hàng chưa xử lý</h4>
					<h3>{{$count_order_not_processed}}</h3>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="col-md-4 market-update-gd">
			<div class="market-update-block clr-block-6">
				<div class="col-md-4 market-update-right">
					<i class="fa fa-eye"> </i>
				</div>
				<div class="col-md-8 market-update-left">
					<h4>Đơn hàng đã xử lý</h4>
					<h3>{{$count_order_processed}}</h3>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="col-md-4 market-update-gd">
			<div class="market-update-block clr-block-7">
				<div class="col-md-4 market-update-right">
					<i class="fa fa-usd"></i>
				</div>
				<div class="col-md-8 market-update-left">
					<h4>Đơn hàng đã huỷ</h4>
					<h3>{{$count_order_cancellation}}</h3>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	<div class="clearfix"> </div>
</div>	
@endsection