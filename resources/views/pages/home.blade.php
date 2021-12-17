@extends('welcome')
@section('slide')
@include('pages.slide')
@endsection

@section('cart_home')
@include('pages.cart_home')
@endsection

@section('content')
<div class="container">
  <div class="hot_sp" style="padding-bottom: 10px;">
    <h2 style="text-align:center;padding-top: 10px">
      <a style="font-size: 28px;color: black;text-decoration: none" href="">Sản phẩm bán chạy</a>
    </h2>
  </div>
</div>
<!--Product-->
<div class="container" style="padding-bottom: 50px;">
  <div class="row">
    @foreach($product_bestseller as $key => $pro)
    <div class="col-md-3 col-sm-6 col-xs-6 col-6">
      <div class="product-block">
        <div class="product-img fade-box">
          <a href="{{url('chi-tiet/'.$pro->slug_product)}}" title="{{$pro->product_name}}" class="img-resize">
            <img src="{{asset('./uploads/'.$pro->product_image)}}" alt="{{$pro->product_name}}" class="lazyloaded">
            <img src="{{asset('./uploads/'.$pro->product_image1)}}" alt="{{$pro->product_name}}" class="lazyloaded">
          </a>

        </div>
        <div class="product-detail clearfix">
          <div class="pro-text">
            <a href="{{url('chi-tiet/'.$pro->slug_product)}}" style="color: black;
                    font-size: 14px;text-decoration: none;" href="#" title="Adidas EQT Cushion ADV" inspiration pack>
              {{$pro->product_name}}
            </a>
          </div>
          <div class="pro-price">
            <p class="">{{number_format($pro->product_price).' '.'₫'}}</p>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <br>
  <div style="text-align:center;margin-left: 46%;">
    {{$product_bestseller->links('pagination::bootstrap-4')}}
  </div>
</div>
<section class="section wrapper-home-banner">
  <div class="container-fluid" style="padding-bottom: 50px;">
    <div class="row">
      <div class="col-xs-12 col-sm-4 home-banner-pd">
        <div class="block-banner-category">
          <a href="{{url('/san-pham')}}" class="link-banner wrap-flex-align flex-column">
            <div class="fg-image fade-box">
              <img class="lazyloaded" src="{{asset('./frontend/images/1.jpg')}}" alt="Shoes">
            </div>
            <figcaption class="caption_banner site-animation">
              <p>Bộ sưu tập</p>
              <h2>
                Đại sứ thương hiệu
              </h2>
            </figcaption>
          </a>
        </div>
      </div>
      <div class="col-xs-12 col-sm-4 home-banner-pd">
        <div class="block-banner-category">
          <a href="{{url('/san-pham')}}" class="link-banner wrap-flex-align flex-column">
            <div class="fg-image fade-box">
              <img class="lazyloaded" src="{{asset('./frontend/images/2.jpg')}}" alt="Shoes">
            </div>
            <figcaption class="caption_banner site-animation">
              <p>Bộ sưu tập</p>
              <h2>
                Thương hiệu
              </h2>
            </figcaption>
          </a>
        </div>
      </div>
      <div class="col-xs-12 col-sm-4 home-banner-pd">
        <div class="block-banner-category">
          <a href="{{url('/blog')}}" class="link-banner wrap-flex-align flex-column">
            <div class="fg-image">
              <img class="lazyloaded" src="{{asset('./frontend/images/3.jpg')}}" alt="Shoes">
            </div>
            <figcaption class="caption_banner site-animation">
              <p></p>
              <h2>
                Blog
              </h2>
            </figcaption>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="container">
    <div class="hot_sp" style="padding-bottom: 10px;">
      <h2 style="text-align:center;padding-top: 10px">
        <a style="font-size: 28px;color: black;text-decoration: none" href="">Sản phẩm mới nhất</a>
      </h2>
    </div>
  </div>
  <!--Product-->
  <div class="container" style="padding-bottom: 50px;">
    <div class="row">
      @foreach($product as $key => $pro)
      <div class="col-md-3 col-sm-6 col-xs-6 col-6">
        <div class="product-block">
          <div class="product-img fade-box">
            <a href="{{url('chi-tiet/'.$pro->slug_product)}}" title="{{$pro->product_name}}" class="img-resize">
              <img src="{{asset('./uploads/'.$pro->product_image)}}" alt="{{$pro->product_name}}" class="lazyloaded">
              <img src="{{asset('./uploads/'.$pro->product_image1)}}" alt="{{$pro->product_name}}" class="lazyloaded">
            </a>

          </div>
          <div class="product-detail clearfix">
            <div class="pro-text">
              <a href="{{url('chi-tiet/'.$pro->slug_product)}}" style=" color: black;
                    font-size: 14px;text-decoration: none;" href="#" title="Adidas EQT Cushion ADV" inspiration pack>
                {{$pro->product_name}}
              </a>
            </div>
            <div class="pro-price">
              <p class="">{{number_format($pro->product_price).' '.'₫'}}</p>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <br>
    <div style="text-align:center;margin-left: 46%;">
      {{$product->links('pagination::bootstrap-4')}}
    </div>
  </div>
</section>
<section class="">
  <div class="content">
    <div class="container">
      <div class="hot_sp">
        <h2 style="text-align:center;padding-top: 10px">
          <a style="font-size: 28px;color: black;text-decoration: none" href="">Bài viết mới nhất</a>
        </h2>
        <br />
      </div>
    </div>
  </div>
  <!--New-->
  <div>

    <div class="container">
      <div class="row">
        @foreach($posts as $key => $post)
        <div class="col-md-4">
          <div class="post_item">
            <div class="post_featured">
              <a href="{{url('/blog-chi-tiet/'.$post->posts_slug)}}" title="Adidas EQT Cushion ADV">
                <img class="img-resize" style="padding-bottom:15px;" src="{{asset('./uploads/posts/'.$post->posts_image)}}" alt="{{$post->posts_title}}">
              </a>
            </div>
            <div class="pro-text">
              <span class="post_info_item">

                {{$post->created_at}}

              </span>
            </div>
            <div class="pro-text">
              <h3 class="post_title">
                <a style=" color: black; font-size: 18px;text-decoration: none;" href="{{url('/blog-chi-tiet/'.$post->posts_slug)}}" inspiration pack>
                  {{$post->posts_title}}
                </a>
              </h3>
            </div>
            <div style="text-align:center; padding-bottom: 30px;">
              <span>{!! $post->posts_desc !!}...</span>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

@endsection