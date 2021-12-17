@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      DANH SÁCH BÀI VIẾT
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
        <th>Tiêu đề bài viết</th>
        <th>Hình ảnh bài viết</th>
        <th>Mô tả bài viết</th>
        <th>Nội dung bài viết</th>
        <th>Danh mục bài viết</th>
        <th>Trạng thái</th>
        <!-- <th>Date</th> -->
        <th style="width:30px;"></th>
      </tr>
</thead>
<tbody>
    @php 
      $i=1;
    @endphp
    @foreach($posts as $key => $post)
  <tr>
    <td>{{$i++}}</td>
    <td>{{ $post->posts_title }}</td>
    <td><img src="{{asset('./uploads/posts/'.$post->posts_image)}}" width="100" height="100"></td>
    <td>{!! $post->posts_desc !!}</td>
    <td>{!! $post->posts_content !!}</td>
    <td>{{ $post->categoryposts->category_posts_name }}</td>
    <td>
      @if($post->posts_status==0)
      <span class="fa fa-thumbs-up"></span>
      @else
      <span class="fa fa-thumbs-down"></span>
      @endif
    </td>
    <!-- <td><span class="text-ellipsis">09-02-2020</span></td> -->
    <td>
      <a href="{{route('posts.edit',[$post->id])}}" class="active styling_edit" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
      <form action="{{route('posts.destroy',[$post->id])}}" method="POST">
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
  {{$posts->links('pagination::bootstrap-4')}}
</div>



@endsection
