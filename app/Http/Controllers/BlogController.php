<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\CategoryPosts;
use App\Models\Posts;

class BlogController extends Controller
{
    public function view_blog(Request $request){
        $slider = Slider::orderby('slider_id','ASC')->get();
        $meta_desc = "Chuyên bán giày đá bóng. Nhiều mẫu giày đá bóng sân cỏ tự nhiên chính hãng, giá rẻ.";
        $meta_keywords = "giay bong da, giày bóng đá, shop giày chính hãng";
        $meta_title = "Giày Đá Bóng Chính Hãng | Giày Đá Banh | Thế Giới Bóng Đá";
        $url_canonical = $request->url();

        $categoryposts = CategoryPosts::orderby('category_posts_id','ASC')->where('category_posts_status','0')->get();
        $posts_new = Posts::with('categoryposts')->orderby('id','DESC')->where('posts_status','0')->limit(4)->get();
        $posts = Posts::with('categoryposts')->orderby('id','ASC')->where('posts_status','0')->paginate(4);
        return view('pages.blogs.blog')->with(compact('slider','meta_keywords','meta_title','meta_desc','url_canonical','posts_new','posts','categoryposts'));
    }
    public function blog_details(Request $request, $posts_slug){
        $slider = Slider::orderby('slider_id','ASC')->get();
        $meta_desc = "Chuyên bán giày đá bóng. Nhiều mẫu giày đá bóng sân cỏ tự nhiên chính hãng, giá rẻ.";
        $meta_keywords = "giay bong da, giày bóng đá, shop giày chính hãng";
        $meta_title = "Giày Đá Bóng Chính Hãng | Giày Đá Banh | Thế Giới Bóng Đá";
        $url_canonical = $request->url();
        
        $categoryposts = CategoryPosts::orderby('category_posts_id','ASC')->where('category_posts_status','0')->get();
        $posts_new = Posts::with('categoryposts')->orderby('id','DESC')->where('posts_status','0')->limit(4)->get();
        $posts = Posts::with('categoryposts')->where('posts_slug',$posts_slug)->first();
        return view('pages.blogs.blog_details')->with(compact('slider','meta_keywords','meta_title','meta_desc','url_canonical','posts_new','categoryposts','posts'));
    }
    public function category_posts(Request $request,$category_posts_slug){
        $slider = Slider::orderby('slider_id','ASC')->get();
        $meta_desc = "Chuyên bán giày đá bóng. Nhiều mẫu giày đá bóng sân cỏ tự nhiên chính hãng, giá rẻ.";
        $meta_keywords = "giay bong da, giày bóng đá, shop giày chính hãng";
        $meta_title = "Giày Đá Bóng Chính Hãng | Giày Đá Banh | Thế Giới Bóng Đá";
        $url_canonical = $request->url();

        $categoryposts = CategoryPosts::orderby('category_posts_id','ASC')->where('category_posts_status','0')->get();
        $category_posts_id = CategoryPosts::where('category_posts_slug',$category_posts_slug)->first();
        $category_posts_name = $category_posts_id->category_posts_name;
        $posts_new = Posts::with('categoryposts')->orderby('id','DESC')->where('cate_posts_id',$category_posts_id->category_posts_id)->where('posts_status','0')->limit(4)->get();
        $posts = Posts::with('categoryposts')->orderby('id','ASC')->where('cate_posts_id',$category_posts_id->category_posts_id)->where('posts_status','0')->paginate(4);
        return view('pages.blogs.category_blog')->with(compact('slider','meta_keywords','meta_title','meta_desc','url_canonical','posts_new','categoryposts','posts','category_posts_name'));
    }
}
