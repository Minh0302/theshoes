<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category= Category::orderby('id','DESC')->get();
        return view('admin.category.index')->with(compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'category_name' => 'required|unique:category|max:255',
            'meta_keywords' => 'required',
            'slug_category' => 'required|max:255',
            'category_desc' => 'required',
            'category_status' => 'required'
        ]);
        $category = new Category();
        $category->category_name = $data['category_name'];
        $category->meta_keywords = $data['meta_keywords'];
        $category->slug_category = $data['slug_category'];
        $category->category_desc = $data['category_desc'];
        $category->category_status = $data['category_status'];
        $category->save();
        return redirect()->back()->with('message','Thêm danh mục thành công!');
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
        $category= Category::find($id);
        return view('admin.category.edit')->with(compact('category'));
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
            'category_name' => 'required|max:255',
            'meta_keywords' => 'required',
            'slug_category' => 'required|max:255',
            'category_desc' => 'required',
            'category_status' => 'required'
        ]);
        $category = Category::find($id);
        $category->category_name = $data['category_name'];
        $category->meta_keywords = $data['meta_keywords'];
        $category->slug_category = $data['slug_category'];
        $category->category_desc = $data['category_desc'];
        $category->category_status = $data['category_status'];
        $category->save();
        return redirect()->route('category.index')->with('message','Cập nhật danh mục thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->back()->with('status','Xoá danh mục thành công!');
    }
}
