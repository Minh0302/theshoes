@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      DANH SÁCH SẢN PHẨM
  </div>
  
<div class="table-responsive">
    <?php
    $message = Session::get('message');
    if($message){
        echo '<span class="text-alert">'.$message.'</span>';
        Session::put('message',null);
    }
    ?>
  <table class="table table-striped b-t b-light">
    <thead>
      <tr>
        <th>STT</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Số lượng sản phẩm</th>
        <th>Giá</th>
        <th>Nội dung</th>
        <th>Danh mục</th>
        <th>Thương hiệu</th>
        <th>Trạng thái</th>
        <!-- <th>Date</th> -->
        <th style="width:30px;"></th>
      </tr>
</thead>
<tbody>
    @php 
      $i=1;
    @endphp
    @foreach($product as $key => $pro)
  <tr>
    <td>{{$i++}}</td>
    <td>{{ $pro->product_name }}</td>
    <td><img src="{{asset('./uploads/'.$pro->product_image)}}" width="100" height="100">
      <br><br><img src="{{asset('./uploads/'.$pro->product_image1)}}" width="100" height="100"></td>
    <td>{{ $pro->product_quantity }}</td>
    <td>{{number_format($pro->product_price).' '.'₫'}}</td>
    <td>{!! $pro->product_content !!}</td>
    <td>{{ $pro->category->category_name }}</td>
    <td>{{ $pro->brand->brand_name }}</td>
    <td>
      @if($pro->product_status==0)
      <span class="fa fa-thumbs-up"></span>
      @else
      <span class="fa fa-thumbs-down"></span>
      @endif
    </td>
    <!-- <td><span class="text-ellipsis">09-02-2020</span></td> -->
    <td>
      <a href="{{route('product.edit',[$pro->id])}}" class="active styling_edit" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
      <form action="{{route('product.destroy',[$pro->id])}}" method="POST">
        @method('DELETE')
        @csrf
        <button onclick="return confirm('Are you sure to delete?')" class="active"><i class="fa fa-times text-danger text"></i></button>
      </form>
  </td>
  @endforeach
</tr>
</tbody>
</table>
</div>
<br>
<div style="text-align:center;">
  {{$product->links('pagination::bootstrap-4')}}
</div>


</div>
      <form action="{{url('/import-csv')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="file" name="file" accept=".xlsx"><br>
          <input type="submit" value="Import CSV" name="import_csv" class="btn btn-warning">
      </form>
      <form action="{{url('/export-csv')}}" method="POST">
            @csrf
         <input type="submit" value="Export CSV" name="export_csv" class="btn btn-success">
      </form>

</div>


@endsection
