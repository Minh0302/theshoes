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
              <a href="{{url('/san-pham')}}">
                <span>Sản phẩm</span>
              </a>
            </li>
            <li>
              <span><span style="color: #777777">{{$category_name}}</span></span>
            </li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!--List Prodct-->
  <div class="container" style="margin-top: 50px;">
    <div class="row">
      <div class="col-md-3 col-sm-12 col-xs-12 sidebar-fix">
        <div class="wrap-filter">
          <div class="box_sidebar">
            <div class="block left-module">
              <div class=" filter_xs">
                <div class="layered">
                  <p class="title_block d-block d-sm-none d-none d-sm-block d-md-none" data-toggle="collapse"
                  href="#collapseExample2" role="button" aria-expanded="false"
                  aria-controls="collapseExample2">
                    Bộ lọc sản phẩm
                    <span><i class="fa fa-angle-down" data-toggle="collapse"
                      href="#collapseExample2" role="button" aria-expanded="false"
                      aria-controls="collapseExample2"></i></span>
                  </p>
                  <div class="block_content collapse" id="collapseExample2">
                    <div class="group-filter card card-body" style="border:0;padding:0" aria-expanded="true">
                      <div class="layered_subtitle dropdown-filter"><span>Danh mục</span><span
                          class="icon-control"><i class="fa fa-minus"></i></span></div>
                      <div class="layered-content bl-filter filter-brand">
                        <style type="text/css">
                          a:hover {
                            text-decoration: none;
                          }
                          .text-link{
                            font-size: 14px;
                            color: #313131;
                          }
                        </style>
                        <ul class="check-box-list">
                          @foreach($category as $key => $cate)
                          <li>
                            <a href="{{url('danh-muc/'.$cate->slug_category)}}"><span class="pull-right text-link">{{$cate->category_name}}</span></a>
                          </li>
                          @endforeach
                        </ul>
                      </div>
                    </div>
                    <div class="group-filter card card-body" style="border:0;padding:0" aria-expanded="true">
                      <div class="layered_subtitle dropdown-filter"><span>Thương hiệu</span><span
                          class="icon-control"><i class="fa fa-minus"></i></span></div>
                      <div class="layered-content bl-filter filter-brand">
                        <ul class="check-box-list">
                          @foreach($brand as $key => $bra)
                          <li>
                            <a href="{{url('thuong-hieu/'.$bra->slug_brand)}}"><span class="pull-right text-link">{{$bra->brand_name}}</span></a>
                          </li>
                          @endforeach
                        </ul>
                      </div>
                    </div>
                    

                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-9 col-sm-12 col-xs-12">
        <div class="wrap-collection-title row">
          <div class="col-md-8 col-sm-12 col-xs-12">
            <h1 class="title" >
              {{$category_name}}
            </h1>
            <div class="alert-no-filter"></div>
          </div>
          <div class="col-md-4 d-sm-none d-md-block d-none d-sm-block" style="float: left">
            <div class="option browse-tags">
              <form>
              @csrf
                  <span class="custom-dropdown custom-dropdown--grey">
                    <select class="sort-by custom-dropdown__select" name="sort" id="sort">
                      <option value="{{Request::url()}}?sort_by=none">---Lọc---</option>
                      <option value="{{Request::url()}}?sort_by=tang-dan">Giá: Tăng dần</option>
                      <option value="{{Request::url()}}?sort_by=giam-dan">Giá: Giảm dần
                      </option>
                      <option value="{{Request::url()}}?sort_by=ten-az">Tên: A-Z</option>
                      <option value="{{Request::url()}}?sort_by=ten-za">Tên: Z-A</option>
                      <option value="{{Request::url()}}?sort_by=ban-chay-nhat">Bán chạy nhất
                      </option>
                      <option value="{{Request::url()}}?sort_by=ton-kho">Tồn kho: Giảm dần</option>
                    </select>
                  </span>
              </form>
            </div>
          </div>
        </div>
        <br>
        <div class="row">
        @foreach($product as $key => $pro)
        <div class="col-md-3 col-sm-6 col-xs-6 col-6">
          <div class="product-block">
            <div class="product-img fade-box">
              <a href="{{url('chi-tiet/'.$pro->slug_product)}}" title="{{$pro->product_name}}" class="img-resize">
                <img src="{{asset('./uploads/'.$pro->product_image)}}"
                  alt="{{$pro->product_name}}" class="lazyloaded">
                <img src="{{asset('./uploads/'.$pro->product_image1)}}" alt="{{$pro->product_name}}" class="lazyloaded">
              </a>
             
            </div>
            <div class="product-detail clearfix">
              <div class="pro-text">
                <a href="{{url('chi-tiet/'.$pro->slug_product)}}" style=" color: black;
                    font-size: 14px;text-decoration: none;" href="#"
                  title="Adidas EQT Cushion ADV" inspiration pack>
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
    </div>
  </div>
@endsection