@extends('admin')
@section('title', 'Quản lý người dùng')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <h1>Danh sách người dùng</h1>
      <hr/>
      @include('message')
      <a href="{{url('admin/users/ad_add')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>Thêm</a>
      <hr/>
      <div class="table-responsive">
        <table class="table table-hover">
          <tr class="active">
            <th>Mã số</th>
            <th>Email</th>
            <th>Họ tên</th>
            <th>Hành động</th>
          </tr>
          @foreach($data as $item)
          <tr>
            <td>{{$item['id']}}</td>
            <td>{{$item['email']}}</td>
            <td>{{$item['name']}}</td>
            <td>
              <a href="users/{{$item['id']}}/ad_edit" class="btn btn-default btn-sm">Sửa</a>
              <a href="users/{{$item['id']}}/ad_delete" class="btn btn-default btn-sm" onclick="return confirm('Bạn có chắc chắc muốn xóa?')">Xóa</a>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
