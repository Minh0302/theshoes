@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      DANH SÁCH SLIDER
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
        <th>Tên slider</th>
        <th>Hình ảnh</th>
        <!-- <th>Date</th> -->
        <th style="width:30px;"></th>
      </tr>
</thead>
<tbody>
    @php 
      $i=1;
    @endphp
    @foreach($slider as $key => $sli)
  <tr>
    <td>{{$i++}}</td>
    <td>{{ $sli->slider_name }}</td>
    <td><img src="{{asset('./uploads/slider/'.$sli->slider_image)}}" width="400" height="100"></td>
    <td>
      <form action="{{route('slider.destroy',[$sli->slider_id])}}" method="POST">
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

@endsection

