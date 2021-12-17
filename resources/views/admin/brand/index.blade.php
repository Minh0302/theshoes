@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      DANH SÁCH THƯƠNG HIỆU
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
        <th>Tên thương hiệu</th>
        <th>Slug thương hiệu</th>
        <th>Mô tả</th>
        <th>Trạng thái</th>
        <!-- <th>Date</th> -->
        <th style="width:30px;"></th>
      </tr>
</thead>
<tbody>
    @php 
      $i=1;
    @endphp
    @foreach($brand as $key => $bra)
  <tr>
    <td>{{$i++}}</td>
    <td>{{ $bra->brand_name}}</td>
    <td>{{ $bra->slug_brand }}</td>
    <td>{!! $bra->brand_desc !!}</td>
    <td>
      @if($bra->brand_status==0)
      <span class="fa fa-thumbs-up"></span>
      @else
      <span class="fa fa-thumbs-down"></span>
      @endif
    </td>
    <!-- <td><span class="text-ellipsis">09-02-2020</span></td> -->
    <td>
      <a href="{{route('brand.edit',[$bra->id])}}" class="active styling_edit" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
      <form action="{{route('brand.destroy',[$bra->id])}}" method="POST">
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
