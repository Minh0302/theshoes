<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Slider;
use App\Models\CategoryPosts;
use App\Models\Posts;
use App\Models\Coupon;
use DB;
use Session;
session_start();

class HomeController extends Controller
{

    public function index(Request $request){
        $meta_desc = "Chuyên bán giày đá bóng. Nhiều mẫu giày đá bóng sân cỏ tự nhiên chính hãng, giá rẻ.";
        $meta_keywords = "giay bong da, giày bóng đá, shop giày chính hãng";
        $meta_title = "Giày Đá Bóng Chính Hãng | Giày Đá Banh | Thế Giới Bóng Đá";
        $url_canonical = $request->url();
        $category = Category::orderby('id','DESC')->where('category_status','0')->get();
        $brand = Brand::orderby('id','DESC')->where('brand_status','0')->get();
        $product = Product::orderby('id','DESC')->where('product_status','0')->paginate(8);
        $product_bestseller = Product::orderby('product_sold','DESC')->where('product_status','0')->paginate(8);
        $slider = Slider::orderby('slider_id','ASC')->get();

        $posts = Posts::with('categoryposts')->orderby('id','DESC')->where('posts_status','0')->limit(3)->get();

        return view('pages.home')->with(compact('category','brand','product','meta_desc','meta_keywords','meta_title','url_canonical','slider','product_bestseller','posts'));
    }
    public function product(Request $request){
        $slider = Slider::orderby('slider_id','ASC')->get();
        // seo
        $meta_desc = "Chuyên bán giày đá bóng. Nhiều mẫu giày đá bóng sân cỏ tự nhiên chính hãng, giá rẻ.";
        $meta_keywords = "giay bong da, giày bóng đá, shop giày chính hãng";
        $meta_title = "Giày Đá Bóng Chính Hãng | Giày Đá Banh | Thế Giới Bóng Đá";
        $url_canonical = $request->url();
        // end-seo
        $category = Category::orderby('id','ASC')->where('category_status','0')->get();
        $brand = Brand::orderby('id','ASC')->where('brand_status','0')->get();
        // $product = Product::orderby('id','ASC')->where('product_status','0')->paginate(12);
        
        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by == 'tang-dan'){
                $product = Product::with('category','brand')->where('product_status','0')->orderby('product_price','ASC')->paginate(12);
            }elseif($sort_by == 'giam-dan'){
                $product = Product::with('category','brand')->where('product_status','0')->orderby('product_price','DESC')->paginate(12);
            }elseif($sort_by == 'ten-az'){
                $product = Product::with('category','brand')->where('product_status','0')->orderby('product_name','ASC')->paginate(12);
            }elseif($sort_by == 'ten-za'){
                $product = Product::with('category','brand')->where('product_status','0')->orderby('product_name','DESC')->paginate(12);
            }elseif($sort_by == 'ban-chay-nhat'){
                $product = Product::with('category','brand')->where('product_status','0')->orderby('product_sold','DESC')->paginate(12);
            }elseif($sort_by == 'ton-kho'){
                $product = Product::with('category','brand')->where('product_status','0')->orderby('product_sold','ASC')->paginate(12);
            }
        }else{
            $product = Product::orderby('id','ASC')->where('product_status','0')->paginate(12);
        }

        return view('pages.product')->with(compact('category','brand','product','meta_desc','meta_keywords','meta_title','url_canonical','slider'));
    }
    public function danhmuc(Request $request,$slug){
        $category = Category::orderby('id','ASC')->where('category_status','0')->get();
        $category_id = Category::where('slug_category',$slug)->first();
        $category_name = $category_id->category_name;
        $brand = Brand::orderby('id','ASC')->where('brand_status','0')->get();
        // $product = Product::with('category','brand')->where('product_status','0')->where('category_id',$category_id->id)->paginate(12);
        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by == 'tang-dan'){
                $product = Product::with('category','brand')->where('product_status','0')->where('category_id',$category_id->id)->orderby('product_price','ASC')->paginate(12);
            }elseif($sort_by == 'giam-dan'){
                $product = Product::with('category','brand')->where('product_status','0')->where('category_id',$category_id->id)->orderby('product_price','DESC')->paginate(12);
            }elseif($sort_by == 'ten-az'){
                $product = Product::with('category','brand')->where('product_status','0')->where('category_id',$category_id->id)->orderby('product_name','ASC')->paginate(12);
            }elseif($sort_by == 'ten-za'){
                $product = Product::with('category','brand')->where('product_status','0')->where('category_id',$category_id->id)->orderby('product_name','DESC')->paginate(12);
            }elseif($sort_by == 'ban-chay-nhat'){
                $product = Product::with('category','brand')->where('product_status','0')->where('category_id',$category_id->id)->orderby('product_sold','DESC')->paginate(12);
            }elseif($sort_by == 'ton-kho'){
                $product = Product::with('category','brand')->where('product_status','0')->where('category_id',$category_id->id)->orderby('product_sold','ASC')->paginate(12);
            }
        }else{
            $product = Product::with('category','brand')->where('product_status','0')->where('category_id',$category_id->id)->paginate(12);
        }
        
        $slider = Slider::orderby('slider_id','ASC')->get();
        $category_id = Category::where('slug_category',$slug)->get();
        foreach ($category_id as $key => $value) {
                // seo
            $meta_desc = $value->category_desc;
            $meta_keywords = $value->meta_keywords;
            $meta_title = $value->category_name;
            $url_canonical = $request->url();
            // end-seo
        }


        return view('pages.category.show_category')->with(compact('category','category_name','brand','product','meta_desc','meta_keywords','meta_title','url_canonical','slider'));
    }
    public function thuonghieu(Request $request,$slug){
        $category = Category::orderby('id','ASC')->where('category_status','0')->get();
        $brand = Brand::orderby('id','ASC')->where('brand_status','0')->get();
        $brand_id = Brand::where('slug_brand',$slug)->first();
        $brand_name = $brand_id->brand_name;
        // $product = Product::orderby('id','ASC')->where('product_status','0')->where('brand_id',$brand_id->id)->paginate(12);
        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by == 'tang-dan'){
                $product = Product::with('category','brand')->where('product_status','0')->where('brand_id',$brand_id->id)->orderby('product_price','ASC')->paginate(12);
            }elseif($sort_by == 'giam-dan'){
                $product = Product::with('category','brand')->where('product_status','0')->where('brand_id',$brand_id->id)->orderby('product_price','DESC')->paginate(12);
            }elseif($sort_by == 'ten-az'){
                $product = Product::with('category','brand')->where('product_status','0')->where('brand_id',$brand_id->id)->orderby('product_name','ASC')->paginate(12);
            }elseif($sort_by == 'ten-za'){
                $product = Product::with('category','brand')->where('product_status','0')->where('brand_id',$brand_id->id)->orderby('product_name','DESC')->paginate(12);
            }elseif($sort_by == 'ban-chay-nhat'){
                $product = Product::with('category','brand')->where('product_status','0')->where('brand_id',$brand_id->id)->orderby('product_sold','DESC')->paginate(12);
            }elseif($sort_by == 'ton-kho'){
                $product = Product::with('category','brand')->where('product_status','0')->where('brand_id',$brand_id->id)->orderby('product_sold','ASC')->paginate(12);
            }
        }else{
            $product = Product::with('category','brand')->where('product_status','0')->where('brand_id',$brand_id->id)->paginate(12);
        }
        $slider = Slider::orderby('slider_id','ASC')->get();
        $brand_id = Brand::where('slug_brand',$slug)->get();  
        foreach ($brand_id as $key => $value) {
                // seo
            $meta_desc = $value->brand_desc;
            $meta_keywords = $value->meta_keywords;
            $meta_title = $value->brand_name;
            $url_canonical = $request->url();
            // end-seo
        }

        return view('pages.brand.show_brand')->with(compact('category','brand','brand_name','product','meta_desc','meta_keywords','meta_title','url_canonical','slider'));
    }
    public function chitiet(Request $request,$slug){
        $category = Category::orderby('id','ASC')->get();
        $brand = Brand::orderby('id','ASC')->get();
        $product = Product::with('category','brand')->where('product_status','0')->where('slug_product',$slug)->first();
        $product_related = Product::with('category','brand')->where('product_status','0')->where('category_id',$product->category->id)->whereNotin('id',[$product->id])->get();
        $product_meta = Product::with('category','brand')->where('product_status','0')->where('slug_product',$slug)->get();
        $coupon = Coupon::orderby('id','ASC')->get();
        foreach($coupon as $key => $cou){
            if($cou->coupon_condition==1){
                $coupon_code = $cou->coupon_code;
            }elseif($cou->coupon_condition==2){
                $coupon_code = $cou->coupon_code;
            }
        }
        foreach ($product_meta as $key => $value) {
                // seo
            $meta_desc = $value->product_desc;
            $meta_keywords = $value->meta_keywords;
            $meta_title = $value->product_name;
            $url_canonical = $request->url();
            // end-seo
        }
        return view('pages.product.show_details')->with(compact('category','brand','product','product_related','meta_desc','meta_keywords','meta_title','url_canonical','coupon'))->with('messages',$coupon_code);
    }
    public function timkiem(Request $request){
        $meta_desc = "Chuyên bán giày đá bóng. Nhiều mẫu giày đá bóng sân cỏ tự nhiên chính hãng, giá rẻ.";
        $meta_keywords = "giay bong da, giày bóng đá, shop giày chính hãng";
        $meta_title = "Giày Đá Bóng Chính Hãng | Giày Đá Banh | Thế Giới Bóng Đá";
        $url_canonical = $request->url();
        $slider = Slider::orderby('slider_id','ASC')->get();

        // $data = $request->all();
        // $tukhoa = $data['tukhoa'];
        $tukhoa = $_GET['tukhoa'];
        $category = Category::orderby('id','ASC')->get();
        $brand = Brand::orderby('id','ASC')->get();
        $product = Product::with('category','brand')->where('product_name','LIKE','%'.$tukhoa.'%')->paginate(8);

        return view('pages.search')->with(compact('category','brand','product','tukhoa','slider','meta_keywords','meta_title','meta_desc','url_canonical','slider'));
    }
}
