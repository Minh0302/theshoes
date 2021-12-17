<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::with('category','brand')->orderby('id','DESC')->paginate(8);
        return view('admin.product.index')->with(compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::orderby('id','ASC')->get();
        $brand = Brand::orderby('id','ASC')->get();
        return view('admin.product.create')->with(compact('category','brand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required|max:255',
            'brand_id' => 'required|max:255',
            'product_name' => 'required|unique:product|max:255',
            'meta_keywords' => 'required',
            'slug_product' => 'required',
            'product_quantity' => 'required',
            'product_sold' => 'required',
            'product_price' => 'required',
            'product_desc' => 'required',
            'product_content' => 'required',
            'product_status' => 'required',
            'product_image'=> 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width:100,min_height:100,max_width:1000,max_height:1000',
            'product_image1'=> 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width:100,min_height:100,max_width:1000,max_height:1000',
            'product_image2'=> 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width:100,min_height:100,max_width:1000,max_height:1000'
        ]);

        $product = new Product();
        $product->category_id = $data['category_id'];
        $product->brand_id = $data['brand_id'];
        $product->product_name = $data['product_name'];
        $product->meta_keywords = $data['meta_keywords'];
        $product->slug_product = $data['slug_product'];
        $product->product_quantity = $data['product_quantity'];
        $product->product_sold = $data['product_sold'];
        $product->product_price = $data['product_price'];
        $product->product_desc = $data['product_desc'];
        $product->product_content = $data['product_content'];
        $product->product_status = $data['product_status'];
        
        // image
        $get_image = $request->file('product_image');
        $path = 'uploads/';
        $get_image_name = $get_image->getClientOriginalName();
        $name_image = current(explode('.',$get_image_name));
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image -> move($path,$new_image);

        $product->product_image = $new_image;   

        // image1
        $get_image1 = $request->file('product_image1');
        $path1 = 'uploads/';
        $get_image_name1 = $get_image1->getClientOriginalName();
        $name_image1 = current(explode('.',$get_image_name1));
        $new_image1 = $name_image1.rand(0,99).'.'.$get_image1->getClientOriginalExtension();
        $get_image1 -> move($path1,$new_image1);

        $product->product_image1 = $new_image1;

        // image2
        $get_image2 = $request->file('product_image2');
        $path2 = 'uploads/';
        $get_image_name2 = $get_image2->getClientOriginalName();
        $name_image2 = current(explode('.',$get_image_name2));
        $new_image2 = $name_image2.rand(0,99).'.'.$get_image2->getClientOriginalExtension();
        $get_image2 -> move($path2,$new_image2);

        $product->product_image2 = $new_image2;    

        $product->save();
        return redirect()->back()->with('message','Thêm sản phẩm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::orderby('id','ASC')->get();
        $brand = Brand::orderby('id','ASC')->get();
        $product = Product::find($id);
        return view('admin.product.edit')->with(compact('category','brand','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'category_id' => 'required|max:255',
            'brand_id' => 'required|max:255',
            'product_name' => 'required|max:255',
            'meta_keywords' => 'required',
            'slug_product' => 'required',
            'product_quantity' => 'required',
            'product_sold' => 'required',
            'product_price' => 'required',
            'product_desc' => 'required',
            'product_content' => 'required',
            'product_status' => 'required'
        ]);

        $product = Product::find($id);
        $product->category_id = $data['category_id'];
        $product->brand_id = $data['brand_id'];
        $product->product_name = $data['product_name'];
        $product->meta_keywords = $data['meta_keywords'];
        $product->slug_product = $data['slug_product'];
        $product->product_quantity = $data['product_quantity'];
        $product->product_sold = $data['product_sold'];
        $product->product_price = $data['product_price'];
        $product->product_desc = $data['product_desc'];
        $product->product_content = $data['product_content'];
        $product->product_status = $data['product_status'];

        // image
        $get_image = $request->file('product_image');
        if($get_image){
            $path = 'uploads/'.$product->product_image;
            if(file_exists($path)){
                unlink($path);
            }
            $path = 'uploads/';
            $get_image_name = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_image_name));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image -> move($path,$new_image);

            $product->product_image = $new_image;    
        }

        // image1
        $get_image1 = $request->file('product_image1');
        if($get_image1){
            $path1 = 'uploads/'.$product->product_image1;
            if(file_exists($path1)){
                unlink($path1);
            }
            $path1 = 'uploads/';
            $get_image_name1 = $get_image1->getClientOriginalName();
            $name_image1 = current(explode('.',$get_image_name1));
            $new_image1 = $name_image1.rand(0,99).'.'.$get_image1->getClientOriginalExtension();
            $get_image1 -> move($path1,$new_image1);

            $product->product_image1 = $new_image1;
        }

        // image2
        $get_image2 = $request->file('product_image2');
        if($get_image2){
            $path2 = 'uploads/'.$product->product_image2;
            if(file_exists($path2)){
                unlink($path2);
            }
            $path2 = 'uploads/';
            $get_image_name2 = $get_image2->getClientOriginalName();
            $name_image2 = current(explode('.',$get_image_name2));
            $new_image2 = $name_image2.rand(0,99).'.'.$get_image2->getClientOriginalExtension();
            $get_image2 -> move($path2,$new_image2);

            $product->product_image2 = $new_image2;
        }  

        $product->save();
        return redirect()->route('product.index')->with('message','Cập nhật sản phẩm thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->back()->with('status','Xoá sản phẩm thành công!');
    }
}
