@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                THÊM SẢN PHẨM
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
                    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" onkeyup="ChangeToSlug();" id="slug" name="product_name" class="form-control" placeholder="Product Name" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Từ khoá</label>
                            <input type="text" name="meta_keywords" class="form-control" placeholder="Product Keywords" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh</label>
                            <input type="file" name="product_image" class="form-control" placeholder="Product Image" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh 1</label>
                            <input type="file" name="product_image1" class="form-control" placeholder="Product Image1" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh 2</label>
                            <input type="file" name="product_image2" class="form-control" placeholder="Product Image2" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug sản phẩm</label>
                            <input type="text" id="convert_slug" name="slug_product" class="form-control" placeholder="Product Slug" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng sản phẩm</label>
                            <input type="text" name="product_quantity" class="form-control" placeholder="Product Quantity" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng đã bán</label>
                            <input type="text" name="product_sold" class="form-control" placeholder="Product Quantity" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá</label>
                            <input type="text" name="product_price" class="form-control" placeholder="Product Price" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                            <textarea style="resize: none;" rows="5" class="form-control" name="product_desc" id="product_desc" placeholder="Product Description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dụng sản phẩm</label>
                            <textarea style="resize: none;" rows="5" class="form-control" name="product_content" id="product_content" placeholder="Product Content" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Danh mục</label>
                            <select name="category_id" class="form-control input-sm m-bot15">
                                @foreach($category as $key => $ca)
                                    <option value="{{$ca->id}}">{{$ca->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Thương hiệu</label>
                            <select name="brand_id" class="form-control input-sm m-bot15">
                                @foreach($brand as $key => $br)
                                    <option value="{{$br->id}}">{{$br->brand_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Trạng thái</label>
                            <select name="product_status" class="form-control input-sm m-bot15">
                                <option value="1">ẨN</option>
                                <option value="0">HIỆN</option>
                                
                            </select>
                        </div>
                        <button type="submit" name="add_product" class="btn btn-info">Submit</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
    @endsection
