@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      DANH SÁCH DANH MỤC
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
        <th>Tên danh mục</th>
        <th>Slug danh mục</th>
        <th>Mô tả danh mục</th>
        <th>Trạng thái</th>
        <!-- <th>Date</th> -->
        <th style="width:30px;"></th>
      </tr>
</thead>
<tbody>
    @php 
      $i=1;
    @endphp
    @foreach($category as $key => $cate)
  <tr>
    <td>{{$i++}}</td>
    <td>{{ $cate->category_name }}</td>
    <td>{{ $cate->slug_category }}</td>
    <td>{!! $cate->category_desc !!}</td>
    <td>
      @if($cate->category_status==0)
      <span class="fa fa-thumbs-up"></span>
      @else
      <span class="fa fa-thumbs-down"></span>
      @endif
    </td>
    <!-- <td><span class="text-ellipsis">09-02-2020</span></td> -->
    <td>
      <a href="{{route('category.edit',[$cate->id])}}" class="active styling_edit" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
      <form action="{{route('category.destroy',[$cate->id])}}" method="POST">
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


</div>
</div>


@endsection
