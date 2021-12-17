<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = Brand::orderby('id','DESC')->get();
        return view('admin.brand.index')->with(compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
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
            'brand_name' => 'required|unique:brand|max:255',
            'meta_keywords' => 'required',
            'slug_brand' => 'required|max:255',
            'brand_desc' => 'required',
            'brand_status' => 'required'
        ]);

        $brand = new Brand();
        $brand->brand_name = $data['brand_name'];
        $brand->meta_keywords = $data['meta_keywords'];
        $brand->slug_brand = $data['slug_brand'];
        $brand->brand_desc = $data['brand_desc'];
        $brand->brand_status = $data['brand_status'];
        $brand->save();
        return redirect()->back()->with('message', 'Thêm thương hiệu thành công!');
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
        $brand = Brand::find($id);
        return view('admin.brand.edit')->with(compact('brand'));
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
            'brand_name' => 'required|max:255',
            'meta_keywords' => 'required',
            'slug_brand' => 'required|max:255',
            'brand_desc' => 'required',
            'brand_status' => 'required'
        ]);

        $brand = Brand::find($id);
        $brand->brand_name = $data['brand_name'];
        $brand->meta_keywords = $data['meta_keywords'];
        $brand->slug_brand = $data['slug_brand'];
        $brand->brand_desc = $data['brand_desc'];
        $brand->brand_status = $data['brand_status'];
        $brand->save();
        return redirect()->route('brand.index')->with('message', 'Cập nhật thương hiệu thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Brand::find($id)->delete();
        return redirect()->back()->with('status','Xoá thương hiệu thành công!');
    }
}
