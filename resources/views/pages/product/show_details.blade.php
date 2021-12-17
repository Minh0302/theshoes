@extends('welcome')

@section('cart_home')
  @include('pages.cart_home')
@endsection

@section('content')
<style type="text/css">
  .tagcloud05 ul {
  margin: 0;
  padding: 10px 0 0 0;
  list-style: none;
  }
  .tagcloud05 ul li {
    display: inline-block;
    margin: 0 0.5rem .3em 1em;
    padding: 0;
  }
  .tagcloud05 ul li a {
    position: relative;
    display: inline-block;
    height: 30px;
    line-height: 30px;
    padding: 0 1em;
    background-color: #3498db;
    border-radius: 0 3px 3px 0;
    color: #fff;
    font-size: 13px;
    text-decoration: none;
    -webkit-transition: .2s;
    transition: .2s;
  }
  .tagcloud05 ul li a::before {
    position: absolute;
    top: 0;
    left: -15px;
    content: '';
    width: 0;
    height: 0;
    border-color: transparent #3498db transparent transparent;
    border-style: solid;
    border-width: 15px 15px 15px 0;
    -webkit-transition: .2s;
    transition: .2s;
  }
  .tagcloud05 ul li a::after {
    position: absolute;
    top: 50%;
    left: 0;
    z-index: 2;
    display: block;
    content: '';
    width: 6px;
    height: 6px;
    margin-top: -3px;
    background-color: #fff;
    border-radius: 100%;
  }
  .tagcloud05 ul li span {
    display: block;
    max-width: 100px;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
  }
  .tagcloud05 ul li a:hover {
    background-color: #555;
    color: #fff;
  }
  .tagcloud05 ul li a:hover::before {
    border-right-color: #555;
  }
</style>
<main class="">

    <div id="product" class="productDetail-page">

      <!--  menu header seo -->
      <div class="breadcrumb-shop">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5">
              <ol class="breadcrumb breadcrumb-arrows">
                <li>
                  <a href="{{url('/')}}">
                    <span">Trang chủ</span>
                  </a>
                </li>
                <li>
                  <a href="{{url('/san-pham')}}">
                    <span>Sản phẩm</span>
                  </a>
                </li>
                <li class="active">
                  <span>
                    <span itemprop="name">{{$product->product_name}}</span>
                  </span>
                  <meta itemprop="position" content="3">
                </li>

              </ol>
            </div>
          </div>
        </div>
      </div>
      <!-- detail product chính -->
      <div class="container">
        <div class="row product-detail-wrapper">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="row product-detail-main pr_style_01">
              <div class="col-md-7 col-sm-12 col-xs-12">
                <div class="product-gallery">
                  <div class="product-gallery__thumbs-container hidden-sm
                    hidden-xs">
                    <div class="product-gallery__thumbs thumb-fix">

                      <div class="product-gallery__thumb  active" id="imgg1">
                        <a class="product-gallery__thumb-placeholder" href="javascript:void(0);"
                          data-image="{{asset('./uploads/'.$product->product_image)}}" data-zoom-image="{{asset('./uploads/'.$product->product_image)}}">
                          <img src="{{asset('./uploads/'.$product->product_image)}}" data-image="{{asset('./uploads/'.$product->product_image)}}"
                            alt="{{$product->product_name}}" grape="">
                        </a>
                      </div>

                      <div class="product-gallery__thumb " id="imgg2">
                        <a class="product-gallery__thumb-placeholder" href="javascript:void(0);"
                          data-image="{{asset('./uploads/'.$product->product_image1)}}" data-zoom-image="{{asset('./uploads/'.$product->product_image1)}}">
                          <img src="{{asset('./uploads/'.$product->product_image1)}}" data-image="{{asset('./uploads/'.$product->product_image1)}}"
                            alt="{{$product->product_name}}" grape="">
                        </a>
                      </div>

                      <div class="product-gallery__thumb " id="imgg3">
                        <a class="product-gallery__thumb-placeholder" href="javascript:void(0);"
                          data-image="{{asset('./uploads/'.$product->product_image2)}}" data-zoom-image="{{asset('./uploads/'.$product->product_image2)}}">
                          <img src="{{asset('./uploads/'.$product->product_image2)}}" data-image="{{asset('./uploads/'.$product->product_image2)}}"
                            alt="{{$product->product_name}}" grape="">
                        </a>
                      </div>


                    </div>
                  </div>
                  <div class="product-image-detail box__product-gallery
                    scroll hidden-xs">
                    <ul id="sliderproduct" class="site-box-content
                      slide_product">

                      <li class="product-gallery-item gallery-item
                        current " id="imgg1a">
                        <img class="product-image-feature " src="{{asset('./uploads/'.$product->product_image)}}"
                          alt="Nike Air Max 90 Essential" grape="">
                      </li>

                      <li class="product-gallery-item gallery-item " id="imgg2a">
                        <img class="product-image-feature" src="{{asset('./uploads/'.$product->product_image1)}}"
                          alt="Nike Air Max 90 Essential" grape="">
                      </li>

                      <li class="product-gallery-item gallery-item " id="imgg3a">
                        <img class="product-image-feature" src="{{asset('./uploads/'.$product->product_image2)}}"
                          alt="Nike Air Max 90 Essential" grape="">
                      </li>

                    </ul>
                    <div class="product-image__button">
                      <div id="product-zoom-in" class="product-zoom
                        icon-pr-fix" aria-label="Zoom in" title="Zoom in">
                        <span class="zoom-in" aria-hidden="true">
                          <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 36 36" style="enable-background:new 0 0 36 36; width:
                            30px; height: 30px;" xml:space="preserve">
                            <polyline points="6,14 9,11 14,16 16,14 11,9
                              14,6 6,6">
                            </polyline>
                            <polyline points="22,6 25,9 20,14 22,16 27,11
                              30,14 30,6">
                            </polyline>
                            <polyline points="30,22 27,25 22,20 20,22
                              25,27 22,30 30,30">
                            </polyline>
                            <polyline points="14,30 11,27 16,22 14,20 9,25
                              6,22 6,30">
                            </polyline>
                          </svg>
                        </span>
                      </div>
                      <div class="gallery-index icon-pr-fix"><span class="current">1</span>
                        / <span class="total">3</span></div>
                    </div>
                  </div>
                </div>
                <div class="product-gallery-slide">
                  <div class="owl-carousel owl-theme owl-product-gallery-slide">
                    <div class=" item">
                      <div class="product-gallery__thumb">
                        <a class=" product-gallery__thumb-placeholder" href="javascript:void(0);"
                        data-image="{{asset('./uploads/'.$product->product_image)}}" data-zoom-image="{{asset('./uploads/'.$product->product_image)}}">
                        <img src="{{asset('./uploads/'.$product->product_image)}}" data-image="{{asset('./uploads/'.$product->product_image)}}"
                          alt="{{$product->product_name}}" grape="">
                        </a>
                      </div>
                    </div>
                    <div class="item">
                      <div class="product-gallery__thumb">
                        <a class="product-gallery__thumb-placeholder" href="javascript:void(0);"
                        data-image="{{asset('./uploads/'.$product->product_image1)}}" data-zoom-image="{{asset('./uploads/'.$product->product_image1)}}">
                        <img src="{{asset('./uploads/'.$product->product_image1)}}" data-image="{{asset('./uploads/'.$product->product_image1)}}"
                          alt="{{$product->product_name}}" grape="">
                        </a>
                      </div>
                    </div>
                    <div class="item">
                      <div class="product-gallery__thumb">
                        <a class="product-gallery__thumb-placeholder" href="javascript:void(0);"
                        data-image="{{asset('./uploads/'.$product->product_image2)}}" data-zoom-image="{{asset('./uploads/'.$product->product_image2)}}">
                        <img src="{{asset('./uploads/'.$product->product_image2)}}" data-image="{{asset('./uploads/'.$product->product_image2)}}"
                          alt="{{$product->product_name}}" grape="">
                        </a>
                      </div>
                    </div>

                </div>
              </div>
            </div>
            <div class="col-md-5 col-sm-12 col-xs-12 product-content-desc" id="detail-product">
              <div class="product-content-desc-1">
                <div class="product-title">
                  <h1>{{$product->product_name}}</h1>

                  <br>
                  <div class="fb-like" data-href="{{$url_canonical}}" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="true"></div>
                  <br>

                  <span id="pro_sku">Mã: {{$product->id}}</span>
                  <div class="product-price" id="price-preview"><span class="pro-price">Click nhận mã giảm giá</span></div>
                      <div class="tagcloud05">
                        <ul>
                          <!-- @foreach($coupon as $key => $cou)
                            @if($cou->coupon_condition==1)
                              <li><a onclick="return alert('ABC30/4')" style="color:white;"><span>Giảm {{$cou->coupon_number}}%</span></a></li>
                            @elseif($cou->coupon_condition==2)
                              <li><a onclick="return alert('ABC1/5')" style="color:white;"><span>Giảm {{number_format($cou->coupon_number).' '.'₫'}}</span></a></li>
                            @endif
                          @endforeach -->
                          @foreach($coupon as $key => $cou)
                            @if($cou->coupon_condition==1)
                              <li><a data-code="{{$cou->coupon_code}}" class="btn-coupon-percent" style="color:white;"><span>Giảm {{$cou->coupon_number}}%</span></a></li>
                            @elseif($cou->coupon_condition==2)
                              <li><a data-code="{{$cou->coupon_code}}" class="btn-coupon-money" style="color:white;"><span>Giảm {{number_format($cou->coupon_number).' '.'₫'}}</span></a></li>
                            @endif
                          @endforeach
                        </ul>
                      </div>
                </div>
                <div class="product-price" id="price-preview"><span class="pro-price">Giá: {{number_format($product->product_price).' '. '₫'}}</span></div>
                <div class="product-price" id="price-preview"><span class="pro-price">Danh mục: {{$product->category->category_name}}</span></div>
                <div class="product-price" id="price-preview"><span class="pro-price">Thương hiệu: {{$product->brand->brand_name}}</span></div>

                <form id="add-item-form" action="" method="post" class="variants clearfix">
                  @csrf
                  <input type="hidden" value="{{$product->id}}" class="cart_product_id_{{$product->id}}">

                  <input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->id}}">

                  <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->id}}">
                                    
                  <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->id}}">

                  <input type="hidden" value="{{$product->slug_product}}" class="cart_slug_product_{{$product->id}}">

                  <input type="hidden" value="{{$product->product_quantity}}" class="cart_product_quantity_{{$product->id}}">

                  <div class="product-price" id="price-preview"><span class="pro-price">Size</span></div>
                    <div class="form-group">
                      <select name="product_status" class="form-control input-sm m-bot15 cart_product_size_{{$product->id}} quantity-selector">
                        <option value="35">35</option>
                        <option value="36">36</option>
                        <option value="37">37</option>
                        <option value="38">38</option>
                        <option value="39">39</option>
                        <option value="40">40</option>
                        <option value="41">41</option>

                      </select>
                    </div>

                  <div class="selector-actions">
                    <div class="product-price"><span class="pro-price">Số lượng: </span></div>
                    <div class="quantity-area clearfix">
                      <div class="quantity-area clearfix">
                      <input type="number" id="quantity" name="quantity" value="1" min="1" class="cart_product_qty_{{$product->id}} quantity-selector" style="border: 2px solid Gray;">
                    </div>
                    </div>
                    <div class="wrap-addcart clearfix">
                      <div class="row-flex">
                        <button type="button" class="button btn-addtocart addtocart-modal add-to-cart" name="add-to-cart" data-id_product="{{$product->id}}">Thêm
                          vào</button>
                        @if(Session::get('customer_id'))
                        <button type="button" class="buy-now button" style="display: block;">Mua ngay</button>
                        @else
                            <button type="button" class="buy-now button" style="display: block;">Mua ngay</button>
                        @endif
                      </div>

                    </div>
                  </div>
                </form>
                <div class="product-description">
                  <div class="title-bl">
                    <h2>Mô tả</h2>
                  </div>
                  <div class="description-content">
                    <div class="description-productdetail">
                      {!!$product->product_content!!}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="list-productRelated clearfix">
            <div class="heading-title text-center">
              <h2>Sản phẩm liên quan</h2>
            </div>
            <div class="container">
              <div class="row">
                @foreach($product_related as $key => $related)
                <div class="col-md-3 col-sm-6 col-xs-6 col-6">
                  <div class="product-block">
                    <div class="product-img fade-box">
                      <a href="{{url('chi-tiet/'.$related->slug_product)}}" title="" class="img-resize">
                        <img src="{{asset('./uploads/'.$related->product_image)}}"
                        alt="{{$related->product_name}}" class="lazyloaded">
                        <img src="{{asset('./uploads/'.$related->product_image1)}}"
                        alt="{{$related->product_name}}" class="lazyloaded">
                      </a>

                    </div>
                    <div class="product-detail clearfix">
                      <div class="pro-text">
                        <a style="color: black;
                            font-size: 14px;text-decoration: none;" href="#" title="Adidas EQT Cushion ADV" inspiration
                          pack>
                          {{$related->product_name}}
                        </a>
                      </div>
                      <div class="pro-price">
                        <p class="">{{number_format($related->product_price)}}₫</p>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>  
        </div>
      </div>
    </div>
    </div>
    
    <div class="container">
      <div class="row">
        <div class="fb-comments" data-href="{{$url_canonical}}" data-width="" data-numposts="5"></div>
      </div>
    </div>
    


    <!-- show zoom detail product -->
    <!-- zoom -->
    <div class="product-zoom11">
     <div class="product-zom">
      <div class="divclose">
        <i class="fa fa-times-circle"></i>
      </div>
      <div class="owl-carousel owl-theme owl-product1">

        <div class="item"><img src="{{asset('./uploads/'.$product->product_image)}}" alt="{{$product->product_name}}">
        </div>
        <div class="item"><img src="{{asset('./uploads/'.$product->product_image1)}}" alt="{{$product->product_name}}">
        </div>
        <div class="item"><img src="{{asset('./uploads/'.$product->product_image2)}}" alt="{{$product->product_name}}">
        </div>
      </div>
     </div>
    </div>

  </main>
@endsection