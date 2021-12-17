@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                THÊM DANH MỤC SẢN PHẨM
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
                    <form action="{{route('category.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" onkeyup="ChangeToSlug();" id="slug" name="category_name" class="form-control" placeholder="Tên danh mục" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Từ khoá</label>
                            <input type="text" name="meta_keywords" class="form-control" placeholder="Từ khoá" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug danh mục</label>
                            <input type="text" id="convert_slug" name="slug_category" class="form-control" placeholder="Slug danh mục" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục</label>
                            <textarea style="resize: none;" rows="5" class="form-control" name="category_desc" id="category" placeholder="Mô tả danh mục" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Trạng thái</label>
                            <select name="category_status" class="form-control input-sm m-bot15">
                                <option value="1">ẨN</option>
                                <option value="0">HIỆN</option>
                                
                            </select>
                        </div>
                        <button type="submit" name="add_category" class="btn btn-info">Submit</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
    @endsection
