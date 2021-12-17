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
                      <img src="{{asset('./uploads/posts/'.$post_new->posts_image)}}" alt=""></a>
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
      <div class="col-md-9 col-sm-12 col-xs-12">
          <div class="heading-page clearfix">
            <h1>Tin tức</h1>
          </div>
          <div class="blog-content">    
            <div class="list-article-content blog-posts">
              @foreach($posts as $key => $post)      
              <article class="blog-loop">
                <div class="blog-post row">  
                  <div class="col-md-4 col-xs-12 col-sm-12">
                    <a href="{{url('blog-chi-tiet/'.$post->posts_slug)}}" class="blog-post-thumbnail" title="{{$post->posts_title}}" rel="nofollow">
                      <img src="{{asset('./uploads/posts/'.$post->posts_image)}}" alt="{{$post->posts_title}}">
                    </a>
                  </div>
                  <div class="col-md-8 col-xs-12 col-sm-12">
                    <h3 class="blog-post-title">
                      <a href="{{url('blog-chi-tiet/'.$post->posts_slug)}}" title="{{$post->posts_title}}">{{$post->posts_title}}</a>
                    </h3>
                    <div class="blog-post-meta">   
                      <span class="author vcard">Người viết: Admin</span>
                      <span class="date">                
                        <time pubdate="" datetime="2019-06-11">{{$post->created_at}}</time>
                      </span>
                    </div>
                    <p class="entry-content">{!! $post->posts_desc !!}</p>
                  </div>
                </div>            
              </article>         
            @endforeach 
            </div>        
            <div style="text-align:center;margin-left: 46%;">
                {{$posts->links('pagination::bootstrap-4')}}
            </div>    
          </div>
        </div>
    </div>
  </div>
@endsection