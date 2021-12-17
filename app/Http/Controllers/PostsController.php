<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryPosts;
use App\Models\Posts;
use Carbon\Carbon;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryposts = CategoryPosts::orderby('category_posts_id','ASC')->get();
        $posts = Posts::with('categoryposts')->orderby('id','ASC')->paginate(4);
        return view('admin.posts.index')->with(compact('categoryposts','posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryposts = CategoryPosts::orderby('category_posts_id','ASC')->get();
        return view('admin.posts.create')->with(compact('categoryposts'));   
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
            'cate_posts_id' => 'required',
            'posts_title' => 'required',
            'posts_slug'  => 'required|max:255',
            'posts_desc' => 'required',
            'posts_content' => 'required',
            'meta_keywords' => 'required|max:255',
            'posts_status' => 'required',
            'posts_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width:100,min_height:100,max_width:1000,max_height:1000',
        ]);

        $posts = new Posts();
        $posts->cate_posts_id = $data['cate_posts_id'];
        $posts->posts_title = $data['posts_title'];
        $posts->posts_slug = $data['posts_slug'];
        $posts->posts_desc = $data['posts_desc'];
        $posts->posts_content = $data['posts_content'];
        $posts->meta_keywords = $data['meta_keywords'];
        $posts->posts_status = $data['posts_status'];
        $posts->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        
        // image
        $get_image = $request->file('posts_image');
        $path = 'uploads/posts';
        $get_image_name = $get_image->getClientOriginalName();
        $name_image = current(explode('.',$get_image_name));
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image -> move($path,$new_image);

        $posts->posts_image = $new_image;   


        $posts->save();
        return redirect()->back()->with('message','Thêm bài viết thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoryposts = CategoryPosts::orderby('category_posts_id','ASC')->get();
        $post = Posts::find($id);
        return view('admin.posts.edit')->with(compact('categoryposts','post'));
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
            'cate_posts_id' => 'required',
            'posts_title' => 'required',
            'posts_slug'  => 'required|max:255',
            'posts_desc' => 'required',
            'posts_content' => 'required',
            'meta_keywords' => 'required|max:255',
            'posts_status' => 'required'
        ]);

        $posts = Posts::find($id);
        $posts->cate_posts_id = $data['cate_posts_id'];
        $posts->posts_title = $data['posts_title'];
        $posts->posts_slug = $data['posts_slug'];
        $posts->posts_desc = $data['posts_desc'];
        $posts->posts_content = $data['posts_content'];
        $posts->meta_keywords = $data['meta_keywords'];
        $posts->posts_status = $data['posts_status'];
        $posts->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        
        // image
        $get_image = $request->file('posts_image');
        if($get_image){
            $path = 'uploads/posts'.$posts->posts_image;
            if(file_exists($path)){
                unlink($path);
            }
            $path = 'uploads/posts';
            $get_image_name = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_image_name));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image -> move($path,$new_image);

            $posts->posts_image = $new_image;    
        }


        $posts->save();
        return redirect()->back()->with('message','Cập nhật bài viết thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Posts::find($id)->delete();
        return redirect()->back()->with('message','Xoá bài viết thành công!');
    }
}
