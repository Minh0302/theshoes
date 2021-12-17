@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      DANH SÁCH MÃ GIẢM GIÁ
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
        <th>Tên mã</th>
        <th>Mã giảm giá</th>
        <th>Số lượng</th>
        <th>Giảm giá theo</th>
        <th>Số % hoặc số tiền giảm</th>
        <!-- <th>Date</th> -->
        <th style="width:30px;"></th>
      </tr>
</thead>
<tbody>
    @php 
      $i=1;
    @endphp
    @foreach($coupon as $key => $cou)
  <tr>
    <td>{{$i++}}</td>
    <td>{{ $cou->coupon_name }}</td>
    <td>{{ $cou->coupon_code }}</td>
    <td>{{ $cou->coupon_times }}</td>
    
      @if($cou->coupon_condition==1)
        <td>Giảm theo %</td>
      @else
        <td>Giảm theo tiền</td>
      @endif
    @if($cou->coupon_condition==1)
        <td>{{$cou->coupon_number}}%</td>
      @else
        <td>{{number_format($cou->coupon_number).' '.'₫'}}</td>
      @endif
    <td>
      <form action="{{route('coupon.destroy',[$cou->id])}}" method="POST">
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
