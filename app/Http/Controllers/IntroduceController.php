<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;

class IntroduceController extends Controller
{
    public function introduce(Request $request){
        $meta_desc = "Chuyên bán giày đá bóng. Nhiều mẫu giày đá bóng sân cỏ tự nhiên chính hãng, giá rẻ.";
        $meta_keywords = "giay bong da, giày bóng đá, shop giày chính hãng";
        $meta_title = "Giày Đá Bóng Chính Hãng | Giày Đá Banh | Thế Giới Bóng Đá";
        $url_canonical = $request->url();
        $slider = Slider::orderby('slider_id','ASC')->get();

        $category = Category::orderby('id','DESC')->where('category_status','0')->get();
        return view('pages.introduce.view_introduce')->with(compact('meta_desc','meta_keywords','meta_title','url_canonical','slider','category'));
    }
}
