@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                EDIT BÀI VIẾT
            </header>
            <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>
            <div class="panel-body">
                <div class="position-center">
                    <form action="{{route('posts.update',[$post->id])}}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tiêu đề bài viết</label>
                            <input type="text" onkeyup="ChangeToSlug();" id="slug" name="posts_title" class="form-control" value="{{$post->posts_title}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Từ khoá</label>
                            <input type="text" name="meta_keywords" class="form-control" value="{{$post->meta_keywords}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">HÌnh ảnh bài viết</label>
                            <input type="file" name="posts_image" class="form-control">
                            <img src="{{asset('./uploads/posts/'.$post->posts_image)}}" height="100" width="100">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug bài viết</label>
                            <input type="text" id="convert_slug" name="posts_slug" class="form-control" value="{{$post->posts_slug}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả bài viết</label>
                            <textarea style="resize: none;" rows="5" class="form-control" name="posts_desc" id="posts_desc" >{{$post->posts_desc}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung bài viết</label>
                            <textarea style="resize: none;" rows="5" class="form-control" name="posts_content" id="posts_content" >{{$post->posts_content}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Danh mục bài viết</label>
                            <select name="cate_posts_id" class="form-control input-sm m-bot15">
                                @foreach($categoryposts as $key => $cate)
                                    @if($cate->category_posts_id == $post->cate_posts_id)
                                        <option selected value="{{$cate->category_posts_id}}">{{$cate->category_posts_name}}</option>
                                    @else
                                        <option value="{{$cate->category_posts_id}}">{{$cate->category_posts_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Trạng thái</label>
                            <select name="posts_status" class="form-control input-sm m-bot15">
                                @if($post->posts_status==1)
                                    <option selected value="1">ẨN</option>
                                    <option value="0">HIỆN</option>
                                @else
                                    <option selected value="1">ẨN</option>
                                    <option selected="" value="0">HIỆN</option>
                                @endif
                            </select>
                        </div>
                        <button type="submit" name="update_posts" class="btn btn-info">Submit</button>
                    </form>
                </div>
            </div>
        </section>

    </div>
    @endsection
