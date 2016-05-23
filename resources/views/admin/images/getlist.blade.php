@extends('admin')
@section('title', 'Quản lý hình ảnh')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <h1>Quản lý thể loại</h1>
      <hr/>
      <div class="table-responsive">
        <table class="table table-hover">
          <tr class="active">
            <th>Mã số</th>
            <th>Hình ảnh</th>
            <th>Từ ngữ</th>
            <th>Hành động</th>
          </tr>
          @foreach($data as $item)
          <tr>
            <td>{{$item['id']}}</td>
            <td>{{$item['url']}}</td>
            <td>{{$item['word']}}</td>
            <td>
              <a href="images/{{$item['id']}}/edit" class="btn btn-default btn-sm">Sửa</a>
              <a href="images/{{$item['id']}}/delete" class="btn btn-default btn-sm" onclick="return confirm('Bạn có chắc chắc muốn xóa?')">Xóa</a>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
