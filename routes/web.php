<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CategoryPostsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\IntroduceController;
use App\Http\Controllers\MailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class,'index']);
Route::get('/trang-chu',[HomeController::class,'index']);
Route::get('/san-pham',[HomeController::class,'product']);
Route::get('/danh-muc/{slug}',[HomeController::class,'danhmuc']);
Route::get('/thuong-hieu/{slug}',[HomeController::class,'thuonghieu']);
Route::get('/chi-tiet/{slug}',[HomeController::class,'chitiet']);
Route::get('/san-pham',[HomeController::class,'product']);
Route::get('/tim-kiem',[HomeController::class,'timkiem']);
//đăng nhập
Route::get('/dang-nhap',[CustomerController::class,'dangnhap']);
Route::get('/dang-ki',[CustomerController::class,'dangki']);
Route::post('/add-customer',[CustomerController::class,'add_customer']);
Route::post('/login-customer',[CustomerController::class,'login_customer']);
Route::get('/dang-xuat',[CustomerController::class,'logout']);
// đăng nhập Facebook
Route::get('/login-facebook',[CustomerController::class,'login_facebook']);
Route::get('/dang-nhap/callback',[CustomerController::class,'callback_facebook']);
// đăng nhập Google
Route::get('/login-google',[CustomerController::class,'login_google']);
Route::get('/google/callback',[CustomerController::class,'callback_google']);
// gio hang
Route::get('/gio-hang',[CartController::class,'gio_hang']);
Route::post('/add-cart-ajax',[CartController::class,'add_cart_ajax']);
Route::post('/update-cart-ajax',[CartController::class,'update_cart_ajax']);
Route::get('/delete-cart-ajax/{session_id}',[CartController::class,'delete_cart_ajax']);
Route::get('/delete-all',[CartController::class,'delete_all']);
Route::post('/giam-gia',[CartController::class,'check_coupon']);
Route::get('/xoa-ma',[CartController::class,'unset_coupon']);

// Checkout
Route::get('/thanh-toan',[CheckoutController::class,'checkout']);
Route::post('/select-delivery',[CheckoutController::class,'select_delivery']);
Route::post('/xac-nhan-don-hang',[CheckoutController::class,'confirm_order']);

// manager user
Route::get('/ho-so-khach-hang/{id}',[ManageUserController::class,'profile_user']);
Route::get('/lich-su-don-hang/{order_code}',[ManageUserController::class,'order_history']);


// BACK-END
Route::get('/admin',[AdminController::class,'index']);
Route::get('/dashboard',[AdminController::class,'show_dashboard']);
Route::get('/logout',[AdminController::class,'logout']);
Route::post('/admin-dashboard',[AdminController::class,'dashboard']);
Route::post('/export-csv',[AdminController::class,'export_csv']);
Route::post('/import-csv',[AdminController::class,'import_csv']);
// Category
Route::resource('/category',CategoryController::class);
//Brand
Route::resource('/brand',BrandController::class);
//Product
Route::resource('/product',ProductController::class);
//Slider
Route::resource('/slider',SliderController::class);
//CategoryPost
Route::resource('/categoryposts',CategoryPostsController::class);
//Posts
Route::resource('/posts',PostsController::class);
//Coupon
Route::resource('/coupon',CouponController::class);
//Order
Route::get('/manage-order',[OrderController::class,'manage_order']);
Route::get('/view-order/{order_code}',[OrderController::class,'view_order']);
Route::get('/print-order/{order_code}',[OrderController::class,'print_order']);
Route::post('/update-product-qty',[OrderController::class,'update_product_qty']);


//Blog

Route::get('/blog',[BlogController::class,'view_blog']);
Route::get('/blog-chi-tiet/{posts_slug}',[BlogController::class,'blog_details']);
Route::get('/danh-muc-blog/{category_posts_slug}',[BlogController::class,'category_posts']);

//Contact
Route::get('/lien-he',[ContactController::class,'contact']);
Route::post('/confirm-contact',[ContactController::class,'confirm_contact']);
Route::get('/list-contact',[ContactController::class,'list_contact']);

//Introduct
Route::get('/gioi-thieu',[IntroduceController::class,'introduce']);

//Send mail
// Route::get('/send-mail',[MailController::class,'send_mail']);
// Route::get('/show-mail',[MailController::class,'show_mail']);