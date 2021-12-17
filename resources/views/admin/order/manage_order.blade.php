@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      DANH SÁCH ORDER
    </div>
    <div class="row w3-res-tb">

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
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>STT</th>
            <th>ID Order</th>
            <th>Trạng tháiOrder</th>
            <th>Ngày Order</th>
            <!-- <th>Date</th> -->
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          <?php
            $i=1;
          ?>
          @foreach($order as $key => $ord)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$i++}}</td>
            <td>{{ $ord->order_code }}</td>
            <td>
                @if($ord->order_status==1)
                  Đơn hàng mới
                @elseif($ord->order_status==2)
                  Đã xử lý
                @elseif($ord->order_status==3)
                  Đã huỷ
                @endif

            </td>
            <td><span class="text-ellipsis">{{ $ord->created_at }}</span></td>
            <td>
              <a href="{{URL::to('view-order/'.$ord->order_code)}}" class="active styling_edit" ui-toggle-class=""><i class="fa fa-eye text-success text-active"></i></a>
              <a href="{{URL::to('delete-order/'.$ord->order_code)}}" class="active" ui-toggle-class="" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-times text-danger text"></i>
              </a>
            </td>
            @endforeach
          </tr>
        </tbody>
      </table>
    </div>
    
  </div>
</div>

@endsection
