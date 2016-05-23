@extends('admin')
@section('title', 'Quản lý thể loại')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <h1>Danh sách thể loại</h1>
      <hr/>
      <a href="{{url('admin/categories/ad_add')}}" class="btn btn-default">Thêm</a>
      <div class="table-responsive">
        <table class="table table-hover">
          <tr class="active">
            <th>Mã số</th>
            <th>Tên album</th>
            <th>Hành động</th>
          </tr>
          @foreach($data as $cate)
          <tr>
            <td>{{$cate['id']}}</td>
            <td>{{$cate['name']}}</td>
            <td>
            <a href="categories/{{$cate['id']}}/ad_edit" class="btn btn-default btn-sm">Sửa</a>
              <a href="categories/{{$cate['id']}}/ad_delete" class="btn btn-default btn-sm" onclick="return confirm('Bạn có chắc chắc muốn xóa?')">Xóa</a>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
