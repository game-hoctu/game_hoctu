@extends('admin')
@section('title', 'Quản lý thể loại')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <h1>Quản lý thể loại</h1>
      <hr/>
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">Danh sách thể loại</a></li>
        <li><a data-toggle="tab" href="#insert"><span class="glyphicon glyphicon-plus"></span>Thêm</a></li>
      </ul>
      <hr/>
      <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
          <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped">
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
                  <a href="categories/{{$cate['id']}}/adEdit" class="btn btn-default btn-sm"><span class="glyphicon glyphicon glyphicon-edit"></span> Sửa</a>
                  <a href="categories/{{$cate['id']}}/adDelete" class="btn btn-default btn-sm" onclick="return confirm('Bạn có chắc chắc muốn xóa?')"><span class="glyphicon glyphicon glyphicon-trash"></span>Xóa</a>
                </td>
              </tr>
              @endforeach
            </table>
          </div>
        </div>
        <div id="insert" class="tab-pane fade">

          <form name="formAdd" class="form-horizontal" role="form" method="POST" action="{{ route('cateAdPostAdd') }}">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}" novalidate>

            <div class="form-group">
              <label class="col-md-4 control-label">Tên thể loại: </label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="name" required="" ng-model="name">
                <div ng-show="formAdd.name.$touched" ng-messages="formAdd.name.$error">
                  <div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                  Thêm
                </button>
                <a class="btn btn-default" href="{{url('admin/categories/')}}">Trở về</a>
              </div>
            </div>
          </form>
        </div>

      </div>

    </div>
  </div>
</div>
@endsection
