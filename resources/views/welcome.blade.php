<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="{{ $meta_desc }}">
  <meta name="keywords" content="{{$meta_keywords}}"/>
  <meta name="robots" content="INDEX,FOLLOW"/>
  <link  rel="canonical" href="{{$url_canonical}}" />
  <meta name="author" content="">
  <link  rel="icon" type="image/x-icon" href="" />

  <meta property="og:description" content="{{$meta_desc}}" />
  <meta property="og:title" content="{{$meta_title}}" />
  <meta property="og:url" content="{{$url_canonical}}" />
  <meta property="og:type" content="website" />


  <link rel="shortcut icon" href="{{asset('./frontend/images/logo3.jpg')}}" type="image/x-icon" />
  <link rel="stylesheet" href="{{asset('./frontend/plugins/bootstrap/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('./frontend/plugins/animate/animate.min.css')}}">
  <link rel="stylesheet" href="{{asset('./frontend/plugins/fontawesome/all.css')}}">
  <link rel="stylesheet" href="{{asset('./frontend/plugins/webfonts/font.css')}}">
  <link rel="stylesheet" href="{{asset('./frontend/css/owl.carousel.min.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('./frontend/css/owl.theme.default.min.css')}}" type="text/css">
  <link rel="stylesheet" type="text/css" href="{{asset('./frontend/css/style.css')}}">

  <!-- UIkit CSS -->
  <link rel="stylesheet" href="{{asset('./frontend/plugins/uikit/uikit.min.css')}}" />
  <link rel="stylesheet" href="{{asset('./frontend/css/sign.css')}}">
  <link href="{{asset('./frontend/css/sweetalert.css')}}" rel="stylesheet">
  <title>Runner</title>

</head>

<body>
  <!--Navbar-->

  <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">

    <div class="container">
      <a class="navbar-brand" href="{{url('/trang-chu')}}">
        <img src="{{asset('./frontend/images/logo3.jpg')}}" class="logo-top" alt="">
      </a>
      <div class="desk-menu collapse navbar-collapse justify-content-md-center" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="{{url('/trang-chu')}}">TRANG CHỦ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/san-pham')}}">BỘ SƯU TẬP</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/gioi-thieu')}}">GIỚI THIỆU</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/blog')}}">BLOG</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/lien-he')}}">LIÊN HỆ</a>
          </li>
        </ul>
      </div>
      <div id="offcanvas-flip1" uk-offcanvas="flip: true; overlay: true">
        <div class="uk-offcanvas-bar" style="background: white;
        width: 100%;">

        <button class="uk-offcanvas-close" style="color:#272727" type="button" uk-close></button>
        <h3 style="font-size: 14px;
        color: #272727;
        text-transform: uppercase;
        margin: 3px 0 30px 0;
        font-weight: 500; letter-spacing: 2px;">MENU</h3>
        <div class="justify-content-md-center">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{url('/trang-chu')}}">TRANG CHỦ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/san-pham')}}">BỘ SƯU TẬP</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/gioi-thieu')}}">GIỚI THIỆU</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/blog')}}">BLOG</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/lien-he')}}">LIÊN HỆ</a>
            </li>
            <?php
            $name = Session::get('customer_name');
            $id = Session::get('customer_id');
            if($name && $id){
              ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle aaaa"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" >
                <p><?php echo $name ?></p>
                <i class="fa fa-angle-double-right"></i>

              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="border:0;">
                <a class="dropdown-item" href="{{url('/ho-so-khach-hang/'.$id)}}" title="Sản phẩm - Style 1">Thông tin khách hàng</a>
                <a class="dropdown-item" href="{{url('dang-xuat')}}" title="Sản phẩm - Style 2">Đăng xuất</a>
              </div>
            </li>
            <?php
          }
          ?>
        </ul>
      </div>
    </div>
  </div>
  <div id="offcanvas-flip" uk-offcanvas="flip: true; overlay: true">
    <div class="uk-offcanvas-bar" style="    background: white;
    width: 350px;">

    <button class="uk-offcanvas-close" style="color:#272727" type="button" uk-close></button>

    <h3 style="font-size: 14px;
    color: #272727;
    text-transform: uppercase;
    margin: 3px 0 30px 0;
    font-weight: 500; letter-spacing: 2px;">Tìm kiếm</h3>
    <div class="search-box wpo-wrapper-search">
      <form action="{{url('tim-kiem')}}" method="GET" class="searchform searchform-categoris ultimate-search">
        <div class="wpo-search-inner" style="display:inline">
          <input type="hidden" name="type" value="product">
          <input required="" id="keywords" name="tukhoa" maxlength="40" autocomplete="off"
          class="searchinput input-search search-input" type="text" size="20"
          placeholder="Tìm kiếm sản phẩm...">
        </div>
        <button type="submit" class="btn-search btn" id="search-header-btn">
          <i style="font-weight:bold" class="fas fa-search"></i>
        </button>
      </form>
      <div id="ajaxSearchResults" class="smart-search-wrapper ajaxSearchResults" style="display: none">
        <div class="resultsContent"></div>
      </div>
    </div>
  </div>
</div>
@yield('cart_home')

<?php
$name = Session::get('customer_name');
if($name){
  ?>
  <div class="desk-menu collapse navbar-collapse justify-content-md-center" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item lisanpham">
        <a class="nav-link" href=""><i class="fas fa-user-alt"></i>
          <?php echo $name ?>
          <i class="fa fa-chevron-down" aria-hidden="true"></i>
        </a>
        <ul class="sub_menu">
          <li class="">
            <a href="{{url('/ho-so-khach-hang/'.$id)}}"> 
              Thông tin khách hàng
            </a>
          </li>
          <li class="">
            <a href="{{url('dang-xuat')}}"> 
              Đăng xuất
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
  <?php
}
?>
<div class="icon-ol">
  <?php
  $customer_id = Session::get('customer_id');
  if($customer_id!=NULL){
    ?>
    <a style="color: #272727" href="{{url('dang-nhap')}}">
      <!-- <i class="fas fa-user-alt"></i> -->
    </a>
    <?php
  }else{ 
    ?>
    <a style="color: #272727" href="{{url('dang-nhap')}}">
      <i class="fas fa-user-alt"></i>
    </a>
    <?php 
  }
  ?>

  <a href="#" class="" uk-toggle="target: #offcanvas-flip">
    <i class="fas fa-search" style="color: black"></i>
  </a>

  <a style="color: #272727" href="#" uk-toggle="target: #offcanvas-flip2">
    <i class="fas fa-shopping-cart"></i>
  </a>
  <button class="navbar-toggler" type="button" uk-toggle="target: #offcanvas-flip1" data-target="#navbarNav"
  aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
</div>
</div>
</div>

</nav>
@yield('slide')

<!--Content-->
<div class="content">

  @yield('content')


  <footer class="main-footer">
    <div class="container">
      <div class="">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="footer-col footer-block">
              <h4 class="footer-title">
                Giới thiệu
              </h4>
              <div class="footer-content">
                <p>Sports trang mua sắm trực tuyến của thương hiệu giày bóng đá chính hàng giúp bạn
                  tiếp cận xu hướng bóng đá và lựa chọn cho mình đôi giày ưng ý.</p>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="footer-col footer-block">
              <h4 class="footer-title">
                Thông tin liên hệ
              </h4>
              <div class="footer-content toggle-footer">
                <ul>
                  <li><span>Địa chỉ:</span> Shop Thể Thao 24h, Số 372 Đường 30 Tháng 4, P.Xuân Khánh, Q.Ninh Kiều, TP.Cần Thơ, Việt Nam</li>
                  <li><span>Điện thoại:</span> +84 (070) 3893956</li>
                  <li><span>Fax:</span> +84 (097) 1850845</li>
                  <li><span>Mail:</span> sport@gmail.com</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="footer-col footer-block">
              <div class="footer-content">
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d868.0528036034843!2d105.77196323072616!3d10.03009971324801!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3bd5a82d4bd21612!2sShop%20Th%E1%BB%83%20Thao%2024h!5e0!3m2!1svi!2s!4v1631594357616!5m2!1svi!2s" width="100%" height="200" frameborder="0" style="border:0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </footer>
</div>


<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0" nonce="xp2551kz"></script>
<script async defer crossorigin="anonymous" src="{{asset('./frontend/plugins/sdk.js')}}"></script>
<script src="{{asset('./frontend/plugins/jquery-3.4.1/jquery-3.4.1.min.js')}}"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<script src="{{asset('./frontend/plugins/bootstrap/popper.min.js')}}"></script>
<script src="{{asset('./frontend/plugins/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{asset('./frontend/plugins/owl.carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('./frontend/js/home.js')}}"></script>
<script src="{{asset('./frontend/js/script.js')}}"></script>
<script src="{{asset('./frontend/plugins/uikit/uikit.min.js')}}"></script>
<script src="{{asset('./frontend/plugins/uikit/uikit-icons.min.js')}}"></script>
<script src="{{asset('./frontend/js/sign.js')}}"></script>
<script src="{{asset('./frontend/js/sweetalert.js')}}"></script>

<script>
  $('.btn-coupon-percent').click(function(e){
    e.preventDefault();
    var code = $(this).data('code');
    alert(code);
  });
  $('.btn-coupon-money').click(function(e){
    e.preventDefault();
    var code = $(this).data('code');
    alert(code);
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#sort').on('change',function(){
      var url = $(this).val();
      if(url){
        window.location = url;
      }
      return false;
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.add-to-cart').click(function(){
      var id = $(this).data('id_product');
      var cart_product_id = $('.cart_product_id_' + id).val();
      var cart_product_name = $('.cart_product_name_' + id).val();
      var cart_slug_product = $('.cart_slug_product_' + id).val();
      var cart_product_image = $('.cart_product_image_' + id).val();
      var cart_product_price = $('.cart_product_price_' + id).val();
      var cart_product_size = $('.cart_product_size_' + id).val();
      var cart_product_qty = $('.cart_product_qty_' + id).val();
      var cart_product_quantity = $('.cart_product_quantity_' + id).val();
      var _token = $('input[name="_token"]').val();
      
      // alert(cart_product_id);
      // alert(cart_product_name);
      // alert(cart_product_image);
      // alert(cart_product_price);
      // alert(cart_product_size);
      // alert(cart_product_qty);
      // alert(cart_product_quantity);

      if(parseInt(cart_product_qty)>parseInt(cart_product_quantity)){
        alert('Please order less than '+cart_product_quantity);
      }else{
        $.ajax({
          url: '{{url('/add-cart-ajax')}}',
          method: 'POST',
          data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_slug_product:cart_slug_product,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_size:cart_product_size,cart_product_qty:cart_product_qty,cart_product_quantity:cart_product_quantity,_token:_token},
          success:function(){

            swal({
              title: "Đã thêm sản phẩm vào giỏ hàng",
              text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
              showCancelButton: true,
              cancelButtonText: "Xem tiếp",
              confirmButtonClass: "btn-success",
              confirmButtonText: "Đi đến giỏ hàng",
              closeOnConfirm: false
            },
            function() {
              window.location.href = "{{url('/gio-hang')}}";
            });

          }

        });
      }

    })
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.choose').on('change',function(){
      var action = $(this).attr('id');
      var ma_id = $(this).val();
      var _token = $('input[name="_token"]').val();
      var result = '';
      if(action=='city'){
        result = 'province';
      }else{
        result = 'wards';
      }
      $.ajax({ 
        url : '{{url('/select-delivery')}}',
        method: 'POST',
        data:{action:action,ma_id:ma_id,_token:_token},
        success:function(data){
          $('#'+result).html(data);
        }
      });
    });
  })
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.send_order').click(function(){
      swal({
        title: "Xác nhận đơn hàng!",
        text: "Đơn hàng sẽ không được hoàn trả, bạn có chắc chắn không?",
        type:"warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Chắc chắn",
        cancelButtonText: "Đóng",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm){
        if(isConfirm){
          var shipping_name = $('.shipping_name').val();
          var shipping_email = $('.shipping_email').val();
          var shipping_address_city = $('.shipping_address_city').val();
          var shipping_address_province = $('.shipping_address_province').val();
          var shipping_address_wards = $('.shipping_address_wards').val();
          var shipping_address = $('.shipping_address').val();
          var shipping_phone = $('.shipping_phone').val();
          var shipping_notes = $('.shipping_notes').val();
          var shipping_method = $('.shipping_method').val();
          var order_coupon = $('.order_coupon').val();
          var _token = $('input[name="_token"]').val();
          // alert(shipping_name);
          // alert(shipping_email);
          // alert(shipping_address);
          // alert(shipping_phone);
          // alert(shipping_notes);
          // alert(shipping_method);
          // alert(order_coupon);
          // alert(_token);
          $.ajax({
            url: '{{url("/xac-nhan-don-hang")}}',
            method: 'POST',
            data:{shipping_name:shipping_name,shipping_email:shipping_email,shipping_address_city:shipping_address_city,shipping_address_province:shipping_address_province,shipping_address_wards:shipping_address_wards,shipping_address:shipping_address,shipping_phone:shipping_phone,shipping_notes:shipping_notes,shipping_method:shipping_method,order_coupon:order_coupon,_token:_token},
            success:function(){

              swal("Đơn hàng","Đơn hàng gửi thành công","success");

            }

          });
          window.setTimeout(function(){
            location.reload();
          }, 3000);

        }else{
          swal("Đóng","Đơn hàng chưa được gửi, hãy hoàn tất đơn hàng","error");
        }   

      });

    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.send_contact').click(function(){
      swal({
        title: "Xác nhận!",
        text: "Thắc mắc của bạn sẽ được gửi, bạn có chắc chắn không?",
        type:"warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Chắc chắn",
        cancelButtonText: "Đóng",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm){
        if(isConfirm){
          var contact_name = $('.contact_name').val();
          var contact_email = $('.contact_email').val();
          var contact_phone = $('.contact_phone').val();
          var contact_notes = $('.contact_notes').val();
          var _token = $('input[name="_token"]').val();

          $.ajax({
            url: '{{url("/confirm-contact")}}',
            method: 'POST',
            data:{contact_name:contact_name,contact_email:contact_email,contact_phone:contact_phone,contact_notes:contact_notes,_token:_token},
            success:function(){

              swal("Gửi thắc mắc","Gửi thành công","success");

            }

          });
          window.setTimeout(function(){
            location.reload();
          }, 3000);

        }else{
          swal("Đóng","Thắc mắc chưa được gửi","error");
        }   

      });

    });
  });
</script>
</body>
</html>
