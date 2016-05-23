@extends('admin')
@section('title', 'Quản lý thể loại')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <h1>Danh sách thể loại</h1>
      <hr/>
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
              <a href="categories/{{$cate['id']}}/edit" class="btn btn-default btn-sm">Sửa</a>
              <a href="categories/{{$cate['id']}}/delete" class="btn btn-default btn-sm">Xóa</a>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
