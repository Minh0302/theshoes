@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                EDIT DANH MỤC SẢN PHẨM
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
                    <form action="{{route('category.update',[$category->id])}}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" onkeyup="ChangeToSlug();" id="slug" value="{{$category->category_name}}" name="category_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Từ khoá</label>
                            <input type="text" value="{{$category->meta_keywords}}" name="meta_keywords" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug danh mục</label>
                            <input type="text" value="{{$category->slug_category}}" name="slug_category" class="form-control" id="convert_slug">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục</label>
                            <textarea style="resize: none;" rows="5" class="form-control" name="category_desc" id="category1">{{$category->category_desc}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Trạng thái</label>
                            <select name="category_status" class="form-control input-sm m-bot15">
                                @if($category->category_status==1)
                                    <option selected value="1">ẨN</option>
                                    <option value="0">HIỆN</option>
                                @else
                                    <option selected value="1">ẨN</option>
                                    <option selected="" value="0">HIỆN</option>
                                @endif
                            </select>
                        </div>
                        <button type="submit" name="update_category" class="btn btn-info">Submit</button>
                    </form>
                </div>
            </div>
        </section>

    </div>
    @endsection
