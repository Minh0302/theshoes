@extends('welcome')
@section('slide')
  @include('pages.slide')
@endsection

@section('cart_home')
  @include('pages.cart_home')
@endsection

@section('content')
<!--Banner-->
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
              <span><span style="color: #777777">Tin tức</span></span>
            </li>
          </ol>
        </div>
      </div>
    </div>
  </div>

 <div class="container">

    <div class="row">
      <div class="col-md-3 d-none d-sm-block d-sm-none d-md-block">
        <div class="sidebar-blog">
          <div class="news-latest">
            <div class="sidebarblog-title title_block">
              <h2>Bài viết mới nhất</h2>
            </div>
            <div class="list-news-latest layered">
              @foreach($posts_new as $key => $post_new)
              <div class="item-article clearfix">
                <div class="post-image">
                  <a href="{{url('blog-chi-tiet/'.$post_new->posts_slug)}}">
                    <img src="{{asset('./uploads/posts/'.$post_new->posts_image)}}" alt="{{$post_new->posts_title}}"></a>
                </div>
                <div class="post-content">
                  <h3>
                    <a href="{{url('blog-chi-tiet/'.$post_new->posts_slug)}}">{{$post_new->posts_title}}</a>
                  </h3>
                  <span class="author">
                    <a href="{{url('blog-chi-tiet/'.$post_new->posts_slug)}}">Admin</a>
                  </span>
                  <span class="date">
                    {{$post_new->created_at}}
                  </span>
                </div>
              </div>
              @endforeach
            </div>
          </div>
          <div class="menu-blog">
            <div class="group-menu">
              <div class="sidebarblog-title title_block">
                <h2>Danh mục blog<span class="fa fa-angle-down"></span></h2>
              </div>
              <div class="layered-category">
                <ul class="menuList-links">
                  @foreach($categoryposts as $key => $cate_post)
                  <li class=""><a href="{{url('/danh-muc-blog/'.$cate_post->category_posts_slug)}}" title="Trang chủ"><span>{{$cate_post->category_posts_name}}</span></a></li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-9 col-sm-12 col-xs-12 article-area">
        <div class="content-page">
          <div class="article-content">
            <div class="box-article-heading clearfix">
              <div class="background-img">
                <img
                  src="{{asset('./uploads/posts/'.$posts->posts_image)}}"
                  alt="{{$posts->posts_title}}">
              </div>
              <h1 class="sb-title-article">{{$posts->posts_title}}</h1>
              <ul class="article-info-more" style="padding-left: 0">
                <li> Người viết: Admin <time pubdate="" datetime="2019-06-11">{{$posts->created_at}}</time></li>
                <li><i class="far fa-file-alt"></i><a style="color:black;text-decoration: none;" href="#"> Tin tức</a> </li>
              </ul>
            </div>
            <div class="article-pages">
              <p>{!! $posts->posts_content !!}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection