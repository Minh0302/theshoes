<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryPosts;

class CategoryPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryposts = CategoryPosts::orderby('category_posts_id','ASC')->get();
        return view('admin.category_posts.index')->with(compact('categoryposts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category_posts.create');
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
            'category_posts_name' => 'required|unique:category_posts|max:255',
            'category_posts_desc' => 'required',
            'category_posts_status' => 'required',
            'category_posts_slug' => 'required',
            'meta_keywords' => 'required'
        ]);
        $categoryposts = new CategoryPosts();
        $categoryposts->category_posts_name = $data['category_posts_name'];
        $categoryposts->category_posts_desc = $data['category_posts_desc'];
        $categoryposts->category_posts_status = $data['category_posts_status'];
        $categoryposts->category_posts_slug = $data['category_posts_slug'];
        $categoryposts->meta_keywords = $data['meta_keywords'];
        
        $categoryposts->save();
        return redirect()->back()->with('message','Thêm Danh mục bài viết thành công!');
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
        $categorypost = CategoryPosts::find($id);
        return view('admin.category_posts.edit')->with(compact('categorypost'));
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
            'category_posts_name' => 'required|max:255',
            'category_posts_desc' => 'required',
            'category_posts_status' => 'required',
            'category_posts_slug' => 'required',
            'meta_keywords' => 'required'
        ]);
        $categoryposts = CategoryPosts::find($id);
        $categoryposts->category_posts_name = $data['category_posts_name'];
        $categoryposts->category_posts_desc = $data['category_posts_desc'];
        $categoryposts->category_posts_status = $data['category_posts_status'];
        $categoryposts->category_posts_slug = $data['category_posts_slug'];
        $categoryposts->meta_keywords = $data['meta_keywords'];
        
        $categoryposts->save();
        return redirect()->back()->with('message','Update Danh mục bài viết thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoryposts = CategoryPosts::find($id);
        $categoryposts->delete();
        return redirect()->back()->with('message','Xoá danh mục bài viết thành công!');
    }
}
