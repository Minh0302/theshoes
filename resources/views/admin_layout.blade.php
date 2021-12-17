<!DOCTYPE html>
<head>
    <title>ADMIN HOME</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="{{asset('./backend/css/bootstrap.min.css')}}" >
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="{{asset('./backend/css/style.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('./backend/css/style-responsive.css')}}" rel="stylesheet"/>
    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="{{asset('./backend/css/font.css')}}" type="text/css"/>
    <link href="{{asset('./backend/css/font-awesome.css')}}" rel="stylesheet"> 
    <link rel="stylesheet" href="{{asset('./backend/css/morris.css')}}" type="text/css"/>
    <!-- calendar -->
    <link rel="stylesheet" href="{{asset('./backend/css/monthly.css')}}">
    <!-- //calendar -->
    <!-- //font-awesome icons -->
    <script src="{{asset('./backend/js/jquery2.0.3.min.js')}}"></script>
    <script src="{{asset('./backend/js/raphael-min.js')}}"></script>
    <script src="{{asset('./backend/js/morris.js')}}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/formvalidation/0.6.2-dev/js/formValidation.min.js"></script>
</head>
<body>
    <section id="container">
        <!--header start-->
        <header class="header fixed-top clearfix">
            <!--logo start-->
            <div class="brand">
                <a href="{{url('/dashboard')}}" class="logo">
                    ADMIN
                </a>
                <div class="sidebar-toggle-box">
                    <div class="fa fa-bars"></div>
                </div>
            </div>
            <!--logo end-->
            
            <div class="top-nav clearfix">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <li>
                        <input type="text" class="form-control search" placeholder=" Search">
                    </li>
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="{{('./backend/images/user.jpg')}}">
                            <span class="username">
                                <?php
                                $name = Session::get('admin_name');
                                if($name){
                                    echo $name;
                                }
                                ?>
                            </span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <li><a href="{{url('/logout')}}"><i class="fa fa-key"></i> Log Out</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->

                </ul>
                <!--search & user info end-->
            </div>
        </header>
        <!--header end-->
        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse">
                <!-- sidebar menu start-->
                <div class="leftside-navigation">
                    <ul class="sidebar-menu" id="nav-accordion">
                        <li>
                            <a class="active" href="{{url('/dashboard')}}">
                                <i class="fa fa-dashboard"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-tasks"></i>
                                <span>Liên hệ</span>
                            </a>
                            <ul class="sub">
                              <li><a href="{{url('/list-contact')}}">Liên hệ</a></li>
                          </ul>
                      </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-tasks"></i>
                                <span>Danh mục bài viết</span>
                            </a>
                            <ul class="sub">
                              <li><a href="{{route('categoryposts.create')}}">Thêm danh mục</a></li>
                              <li><a href="{{route('categoryposts.index')}}">Danh sách danh mục</a></li>
                          </ul>
                      </li>
                      <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-tasks"></i>
                                <span>Bài viết</span>
                            </a>
                            <ul class="sub">
                              <li><a href="{{route('posts.create')}}">Thêm bài viết</a></li>
                              <li><a href="{{route('posts.index')}}">Danh sách bài viết</a></li>
                          </ul>
                      </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-tasks"></i>
                                <span>Slider</span>
                            </a>
                            <ul class="sub">
                              <li><a href="{{route('slider.create')}}">Thêm Slider</a></li>
                              <li><a href="{{route('slider.index')}}">Danh sách Slider</a></li>
                          </ul>
                      </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-tasks"></i>
                                <span>Order</span>
                            </a>
                            <ul class="sub">
                              <li><a href="{{url('/manage-order')}}">Quản lý Order</a></li>
                          </ul>
                      </li>
                      <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-tasks"></i>
                                <span>Giám giá</span>
                            </a>
                            <ul class="sub">
                              <li><a href="{{route('coupon.create')}}">Thêm mã</a></li>
                              <li><a href="{{route('coupon.index')}}">Danh sách mã</a></li>
                          </ul>
                      </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Danh mục sản phẩm</span>
                            </a>
                            <ul class="sub">
                              <li><a href="{{route('category.create')}}">Thêm danh mục</a></li>
                              <li><a href="{{route('category.index')}}">Danh sách danh mục</a></li>
                          </ul>
                      </li>
                      <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Thương hiệu sản phẩm</span>
                            </a>
                            <ul class="sub">
                              <li><a href="{{route('brand.create')}}">Thêm thương hiệu</a></li>
                              <li><a href="{{route('brand.index')}}">Danh sách thương hiệu</a></li>
                          </ul>
                      </li>
                      <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Sản phẩm</span>
                            </a>
                            <ul class="sub">
                              <li><a href="{{route('product.create')}}">Thêm sản phẩm</a></li>
                              <li><a href="{{route('product.index')}}">Danh sách sản phẩm   </a></li>
                          </ul>
                      </li>
                  </ul>            </div>
                  <!-- sidebar menu end-->
              </div>
          </aside>
          <!--sidebar end-->
          <!--main content start-->
          <section id="main-content">
           <section class="wrapper">
            @yield('admin_content')
        </section>
    </section>
    <!--main content end-->
</section>
<script src="{{asset('./backend/js/bootstrap.js')}}"></script>
<script src="{{asset('./backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('./backend/js/scripts.js')}}"></script>
<script src="{{asset('./backend/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('./backend/js/jquery.nicescroll.js')}}"></script>
<script type="text/javascript" src="{{asset('./backend/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
    $('.order_details').change(function(){
        var order_status = $(this).val();
        var order_id = $(this).children(':selected').attr('id');
        var _token = $('input[name="_token"]').val();
        //lấy ra số lượng
        quantity = [];
        $('input[name="product_sales_quantity"]').each(function(){
            quantity.push($(this).val());
        });
        //lấy ra id sản phẩm
        order_product_id = [];
        $('input[name="order_product_id"]').each(function(){
            order_product_id.push($(this).val());
        });
        // alert(quantity);
        // alert(order_product_id);
        $.ajax({ 
            url : '{{url('/update-product-qty')}}',
            method: 'POST',
            data:{order_status:order_status,order_id:order_id,quantity:quantity,order_product_id:order_product_id,_token:_token},
            success:function(data){
              alert("Success!");
              location.reload();
            }
        });
    });
</script>
<script type="text/javascript">
    CKEDITOR.replace('category');
    CKEDITOR.replace('category1');
    CKEDITOR.replace('brand');
    CKEDITOR.replace('brand1');
    CKEDITOR.replace('product_desc');
    CKEDITOR.replace('product_content');
    CKEDITOR.replace('product_desc1');
    CKEDITOR.replace('product_content1');
    CKEDITOR.replace('category_posts');
    CKEDITOR.replace('posts_desc');
    CKEDITOR.replace('posts_content');
</script>
<script type="text/javascript">
 
    function ChangeToSlug()
        {
            var slug;
         
            //Lấy text từ thẻ input title 
            slug = document.getElementById("slug").value;
            slug = slug.toLowerCase();
            //Đổi ký tự có dấu thành không dấu
                slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                slug = slug.replace(/đ/gi, 'd');
                //Xóa các ký tự đặt biệt
                slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                //Đổi khoảng trắng thành ký tự gạch ngang
                slug = slug.replace(/ /gi, "-");
                //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                slug = slug.replace(/\-\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-/gi, '-');
                slug = slug.replace(/\-\-/gi, '-');
                //Xóa các ký tự gạch ngang ở đầu và cuối
                slug = '@' + slug + '@';
                slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                //In slug ra textbox có id “slug”
            document.getElementById('convert_slug').value = slug;
        }
</script>

<!-- //calendar -->
</body>
</html>
