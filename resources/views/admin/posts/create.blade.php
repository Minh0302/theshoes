@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                THÊM BÀI VIẾT
            </header>
            <div class="panel-body">
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>
                <div class="position-center">
                    <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tiêu đề bài viết</label>
                            <input type="text" onkeyup="ChangeToSlug();" id="slug" name="posts_title" class="form-control" placeholder="Tiêu đề bài viết" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Từ khoá</label>
                            <input type="text" name="meta_keywords" class="form-control" placeholder="Từ khoá" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">HÌnh ảnh bài viết</label>
                            <input type="file" name="posts_image" class="form-control" placeholder="HÌnh ảnh bài viết" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug bài viết</label>
                            <input type="text" id="convert_slug" name="posts_slug" class="form-control" placeholder="Slug bài viết" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả bài viết</label>
                            <textarea style="resize: none;" rows="5" class="form-control" name="posts_desc" id="posts_desc" placeholder="Mô tả bài viết" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung bài viết</label>
                            <textarea style="resize: none;" rows="5" class="form-control" name="posts_content" id="posts_content" placeholder="Nội dung bài viết" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Danh mục bài viết</label>
                            <select name="cate_posts_id" class="form-control input-sm m-bot15">
                                @foreach($categoryposts as $key => $cate)
                                    <option value="{{$cate->category_posts_id}}">{{$cate->category_posts_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Trạng thái</label>
                            <select name="posts_status" class="form-control input-sm m-bot15">
                                <option value="1">ẨN</option>
                                <option value="0">HIỆN</option>
                                
                            </select>
                        </div>
                        <button type="submit" name="add_posts" class="btn btn-info">Submit</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
    @endsection
