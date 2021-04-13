@extends('admin_layout')
@section('admin_content')
      <div class ="page-header">
        <ol class="breadcrumb">
          <li><a href="#">Trang chủ</a></li>
          <li><a href="#">Đơn hàng</a></li>
          <li class="active">Danh sách</li>
        </ol>
      </div>
      <div class ="table-responsive">
      <h2>Quản lý đơn hàng</h2>
      <table class="table table-striped">
        <thead>
          
          <tr>
            <th>mã</th>
             <th>mã chi tiết</th>
              <th>mã sản phẩm</th>
               <th>tên sản phẩm</th>
                <th>giá</th>
                 <th>số lượng</th>
                  <th>mã đơn hàng</th>
                  <th>trạng thái</th>
          </tr>

        </thead>
        <tbody>
          <tr>
            @foreach($details_product as $key=>$value)
            <td><span class="text-ellipsis">{{$value->ma}}</span></td>
          
            <td><span class="text-ellipsis">{{$value->mact}}</span></td>
            <td><span class="text-ellipsis">{{$value->masp}}</span></td>
            <td><span class="text-ellipsis">{{$value->tensp}}</span></td>
            <td><span class="text-ellipsis">{{$value->gia}}</span></td>
            <td><span class="text-ellipsis">{{$value->soluong}}</span></td>
            <td><span class="text-ellipsis">{{$value->madonhang}}</span></td>
            <td><span class="text-ellipsis">{{$value->tentt}}</span></td>
            
          </tr>
            @endforeach
        </tbody>
      </table>
    </div>
            @endsection