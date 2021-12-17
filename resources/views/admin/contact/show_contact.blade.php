@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      LIÊN HỆ
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
        <th>Tên</th>
        <th>Email</th>
        <th>SĐT</th>
        <th>Ý kiến</th>
        <!-- <th>Date</th> -->
        <th style="width:30px;"></th>
      </tr>
</thead>
<tbody>
    @php 
      $i=1;
    @endphp
    @foreach($contact as $key => $con)
  <tr>
    <td>{{$i++}}</td>
    <td>{{ $con->contact_name }}</td>
    <td>{{ $con->contact_email }}</td>
    <td>{{ $con->contact_phone }}</td>
    <td>{{ $con->contact_notes }}</td>
  @endforeach
</tr>
</tbody>
</table>
</div>


</div>
</div>


@endsection
