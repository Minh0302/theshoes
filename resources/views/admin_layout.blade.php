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
                                <span>Li??n h???</span>
                            </a>
                            <ul class="sub">
                              <li><a href="{{url('/list-contact')}}">Li??n h???</a></li>
                          </ul>
                      </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-tasks"></i>
                                <span>Danh m???c b??i vi???t</span>
                            </a>
                            <ul class="sub">
                              <li><a href="{{route('categoryposts.create')}}">Th??m danh m???c</a></li>
                              <li><a href="{{route('categoryposts.index')}}">Danh s??ch danh m???c</a></li>
                          </ul>
                      </li>
                      <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-tasks"></i>
                                <span>B??i vi???t</span>
                            </a>
                            <ul class="sub">
                              <li><a href="{{route('posts.create')}}">Th??m b??i vi???t</a></li>
                              <li><a href="{{route('posts.index')}}">Danh s??ch b??i vi???t</a></li>
                          </ul>
                      </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-tasks"></i>
                                <span>Slider</span>
                            </a>
                            <ul class="sub">
                              <li><a href="{{route('slider.create')}}">Th??m Slider</a></li>
                              <li><a href="{{route('slider.index')}}">Danh s??ch Slider</a></li>
                          </ul>
                      </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-tasks"></i>
                                <span>Order</span>
                            </a>
                            <ul class="sub">
                              <li><a href="{{url('/manage-order')}}">Qu???n l?? Order</a></li>
                          </ul>
                      </li>
                      <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-tasks"></i>
                                <span>Gi??m gi??</span>
                            </a>
                            <ul class="sub">
                              <li><a href="{{route('coupon.create')}}">Th??m m??</a></li>
                              <li><a href="{{route('coupon.index')}}">Danh s??ch m??</a></li>
                          </ul>
                      </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Danh m???c s???n ph???m</span>
                            </a>
                            <ul class="sub">
                              <li><a href="{{route('category.create')}}">Th??m danh m???c</a></li>
                              <li><a href="{{route('category.index')}}">Danh s??ch danh m???c</a></li>
                          </ul>
                      </li>
                      <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Th????ng hi???u s???n ph???m</span>
                            </a>
                            <ul class="sub">
                              <li><a href="{{route('brand.create')}}">Th??m th????ng hi???u</a></li>
                              <li><a href="{{route('brand.index')}}">Danh s??ch th????ng hi???u</a></li>
                          </ul>
                      </li>
                      <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>S???n ph???m</span>
                            </a>
                            <ul class="sub">
                              <li><a href="{{route('product.create')}}">Th??m s???n ph???m</a></li>
                              <li><a href="{{route('product.index')}}">Danh s??ch s???n ph???m   </a></li>
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
        //l???y ra s??? l?????ng
        quantity = [];
        $('input[name="product_sales_quantity"]').each(function(){
            quantity.push($(this).val());
        });
        //l???y ra id s???n ph???m
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
         
            //L???y text t??? th??? input title 
            slug = document.getElementById("slug").value;
            slug = slug.toLowerCase();
            //?????i k?? t??? c?? d???u th??nh kh??ng d???u
                slug = slug.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'a');
                slug = slug.replace(/??|??|???|???|???|??|???|???|???|???|???/gi, 'e');
                slug = slug.replace(/i|??|??|???|??|???/gi, 'i');
                slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'o');
                slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???/gi, 'u');
                slug = slug.replace(/??|???|???|???|???/gi, 'y');
                slug = slug.replace(/??/gi, 'd');
                //X??a c??c k?? t??? ?????t bi???t
                slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                //?????i kho???ng tr???ng th??nh k?? t??? g???ch ngang
                slug = slug.replace(/ /gi, "-");
                //?????i nhi???u k?? t??? g???ch ngang li??n ti???p th??nh 1 k?? t??? g???ch ngang
                //Ph??ng tr?????ng h???p ng?????i nh???p v??o qu?? nhi???u k?? t??? tr???ng
                slug = slug.replace(/\-\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-/gi, '-');
                slug = slug.replace(/\-\-/gi, '-');
                //X??a c??c k?? t??? g???ch ngang ??? ?????u v?? cu???i
                slug = '@' + slug + '@';
                slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                //In slug ra textbox c?? id ???slug???
            document.getElementById('convert_slug').value = slug;
        }
</script>

<!-- //calendar -->
</body>
</html>
