@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                EDIT SẢN PHẨM
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
                    <form action="{{route('product.update',[$product->id])}}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" onkeyup="ChangeToSlug();" id="slug" name="product_name" class="form-control" value="{{$product->product_name}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Từ khoá</label>
                            <input type="text" name="meta_keywords" class="form-control" value="{{$product->meta_keywords}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh</label>
                            <input type="file" name="product_image" class="form-control">
                            <img src="{{asset('./uploads/'.$product->product_image)}}" height="100" width="100">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh 1</label>
                            <input type="file" name="product_image1" class="form-control">
                            <img src="{{asset('./uploads/'.$product->product_image1)}}" height="100" width="100">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh 2</label>
                            <input type="file" name="product_image2" class="form-control">
                            <img src="{{asset('./uploads/'.$product->product_image2)}}" height="100" width="100">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug sản phẩm</label>
                            <input type="text" id="convert_slug" name="slug_product" class="form-control" value="{{$product->slug_product}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng sản phẩm</label>
                            <input type="text" name="product_quantity" class="form-control" value="{{$product->product_quantity}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng đã bán</label>
                            <input type="text" name="product_sold" class="form-control" value="{{$product->product_sold}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá</label>
                            <input type="text" name="product_price" class="form-control" value="{{$product->product_price}}" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                            <textarea style="resize: none;" rows="5" class="form-control" name="product_desc" id="product_desc1" >{{$product->product_desc}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                            <textarea style="resize: none;" rows="5" class="form-control" name="product_content" id="product_content1" >{{$product->product_content}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                            <select name="category_id" class="form-control input-sm m-bot15">
                                @foreach($category as $key => $ca)
                                    @if($ca->id == $product->category_id)
                                        <option selected value="{{$ca->id}}">{{$ca->category_name}}</option>
                                    @else
                                        <option value="{{$ca->id}}">{{$ca->category_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Thương hiệu</label>
                            <select name="brand_id" class="form-control input-sm m-bot15">
                                @foreach($brand as $key => $br)
                                    @if($br->id == $product->brand_id)
                                        <option selected value="{{$br->id}}">{{$br->brand_name}}</option>
                                    @else
                                         <option value="{{$br->id}}">{{$br->brand_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Trạng thái</label>
                            <select name="product_status" class="form-control input-sm m-bot15">
                                @if($product->product_status==1)
                                    <option selected value="1">Hidden</option>
                                    <option value="0">Show</option>
                                @else
                                    <option selected value="1">ẨN</option>
                                    <option selected="" value="0">HIỆN</option>
                                @endif
                            </select>
                        </div>
                        <button type="submit" name="update_product" class="btn btn-info">Submit</button>
                    </form>
                </div>
            </div>
        </section>

    </div>
    @endsection
