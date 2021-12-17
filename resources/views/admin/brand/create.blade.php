@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                THÊM THƯƠNG HIỆU
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
                    <form action="{{route('brand.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên thương hiệu</label>
                            <input type="text" onkeyup="ChangeToSlug();" id="slug" name="brand_name" class="form-control" placeholder="Tên thương hiệu" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Từ khoá</label>
                            <input type="text" name="meta_keywords" class="form-control" placeholder="Từ khoá" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug thương hiệu</label>
                            <input type="text" id="convert_slug" name="slug_brand" class="form-control" placeholder="Slug thương hiệu" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                            <textarea style="resize: none;" rows="5" class="form-control" name="brand_desc" id="brand" placeholder="Mô tả thương hiệu" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Trạng thái</label>
                            <select name="brand_status" class="form-control input-sm m-bot15">
                                <option value="1">ẨN</option>
                                <option value="0">HIỆN</option>
                                
                            </select>
                        </div>
                        <button type="submit" name="add_brand" class="btn btn-info">Submit</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
    @endsection
