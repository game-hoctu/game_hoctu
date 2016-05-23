@extends('admin')
@section('title', 'Quản lý các album')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <h1>Danh sách album</h1>
      <hr/>
      <div class="table-responsive">
        <table class="table table-hover">
          <tr class="active">
            <th>Mã số</th>
            <th>Tên album</th>
            <th>Mô tả</th>
            <th>Hành động</th>
          </tr>
          @foreach($data as $item)
          <tr>
            <td>{{$item['id']}}</td>
            <td>{{$item['name']}}</td>
            <td>{{$item['description']}}</td>
            <td>
              <a href="categories/{{$item['id']}}/edit" class="btn btn-default btn-sm">Sửa</a>
              <a href="categories/{{$item['id']}}/delete" class="btn btn-default btn-sm">Xóa</a>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
