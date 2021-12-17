@extends('welcome')
@section('slide')
  @include('pages.slide')
@endsection

@section('cart_home')
  @include('pages.cart_home')
@endsection

@section('content')

  <div class="breadcrumb-shop">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5">
          <ol class="breadcrumb breadcrumb-arrows">
            <li>
              <a href="{{url('/')}}">
                <span>Trang chủ</span>
              </a>
            </li>
            <li>
              <span><span style="color: #777777">Giới thiệu</span></span>
            </li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!--List Prodct-->

  <div class="container">

    <div class="row">
      <div class="col-md-3 d-none d-sm-block d-sm-none d-md-block">
        <div class="sidebar-page">
            <div class="group-menu">
                <div class="page_menu_title title_block">
                  <h2>Danh mục giày</span></h2>
                </div>
                <div class="layered layered-category">
                    <div class="layered-content">
                        <ul class="menuList-links">
                          @foreach($category as $key => $cate)
                          <li class=""><a href="{{url('/danh-muc/'.$cate->slug_category)}}"><span>{{$cate->category_name}}</span></a></li>       
                          @endforeach
                        </ul>
                      </div>
                </div>
              </div>
        </div>

      </div>
      <div class="col-md-9 col-sm-12 col-xs-12">
        <div class="page-wrapper">
          <div class="heading-page">
            <h1>Giới thiệu</h1>
          </div>
          <div class="wrapbox-content-page">
            <div class="content-page ">
              <p>Sports trang mua sắm trực tuyến của thương hiệu giày bóng đá chính hàng giúp bạn
                  tiếp cận xu hướng bóng đá và lựa chọn cho mình đôi giày ưng ý.</p>
              <div>
                <ul>
                  <li><span>Luôn cập nhật Những mẫu mã mới nhất và những chính sách khuyến mãi – ưu đãi giảm giá hấp dẫn.</span><br></li>
                  <li><span>Chính sách bảo hành tuyệt đối với sản phẩm và đổi hàng trong vòng 7 ngày, thanh toán tiện lợi thông qua dịch vụ COD ( nhận hàng – thanh toán ) </span><br></li>
                  <li><span>Đội ngũ CSKH tư vấn nhiệt tình, kỹ càng sẽ giúp khách hàng có thể lựa chọn cho mình một đôi giày phù hợp và hài lòng nhất.</span><br></li>
                  <li><span>KHÁCH HÀNG ĐƯỢC BỒI THƯỜNG GẤP 10 LẦN NẾU SẢN PHẨM KHÔNG PHẢI CHÍNH HÃNG.</span><br></li>
                  <li><span>Chúng tôi luôn tự tin sẽ mang lại sự hài lòng tuyệt đối cho khách hàng từ CHẤT LƯỢNG SẢN PHẨM đến DỊCH VỤ CHĂM SÓC KHÁCHHÀNG.</span><br></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection