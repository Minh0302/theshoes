@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                EDIT THƯƠNG HIỆU
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
                    <form action="{{route('brand.update',[$brand->id])}}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên thương hiệu</label>
                            <input type="text" onkeyup="ChangeToSlug();" id="slug" value="{{$brand->brand_name}}" name="brand_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Từ khoá</label>
                            <input type="text" value="{{$brand->meta_keywords}}" name="meta_keywords" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug thương hiệu</label>
                            <input type="text" value="{{$brand->slug_brand}}" name="slug_brand" class="form-control" id="convert_slug">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                            <textarea style="resize: none;" rows="5" class="form-control" name="brand_desc" id="brand1">{{$brand->brand_desc}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Trạng thái</label>
                            <select name="brand_status" class="form-control input-sm m-bot15">
                                @if($brand->brand_status==1)
                                    <option selected value="1">ẨN</option>
                                    <option value="0">HIỆN</option>
                                @else
                                    <option selected value="1">ẨN</option>
                                    <option selected="" value="0">HIỆN</option>
                                @endif
                            </select>
                        </div>
                        <button type="submit" name="update_brand" class="btn btn-info">Submit</button>
                    </form>
                </div>
            </div>
        </section>

    </div>
    @endsection
