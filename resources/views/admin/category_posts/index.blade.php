@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      DANH SÁCH DANH MỤC BÀI VIẾT
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
        <th>Tên danh mục bài viết/th>
        <th>Slug danh mục bài viết</th>
        <th>Mô tả danh mục bài viết</th>
        <th>Trạng thái</th>
        <!-- <th>Date</th> -->
        <th style="width:30px;"></th>
      </tr>
</thead>
<tbody>
    @php 
      $i=1;
    @endphp
    @foreach($categoryposts as $key => $cate)
  <tr>
    <td>{{$i++}}</td>
    <td>{{ $cate->category_posts_name }}</td>
    <td>{{ $cate->category_posts_slug }}</td>
    <td>{!! $cate->category_posts_desc !!}</td>
    <td>
      @if($cate->category_posts_status==0)
      <span class="fa fa-thumbs-up"></span>
      @else
      <span class="fa fa-thumbs-down"></span>
      @endif
    </td>
    <!-- <td><span class="text-ellipsis">09-02-2020</span></td> -->
    <td>
      <a href="{{route('categoryposts.edit',[$cate->category_posts_id])}}" class="active styling_edit" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
      <form action="{{route('categoryposts.destroy',[$cate->category_posts_id])}}" method="POST">
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
