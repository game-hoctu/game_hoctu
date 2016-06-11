@extends('admin')
@section('title', 'Quản lý thể loại')
@section('content')
<div class="container-fluid" ng-app="game_hoctu" ng-controller="CategoriesController">
  <div class="row">
    <div class="col-md-12">
      <h1><span class="glyphicon glyphicon-th-list"></span> Quản lý thể loại</h1>
      <hr/>
      @include('message')
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">Danh sách thể loại</a></li>
        <li><a data-toggle="tab" href="#insert"><span class="glyphicon glyphicon-plus"></span>Thêm</a></li>
      </ul>
      <hr/>
      <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
          <div class="table-responsive">
            <input type="hidden" ng-model="data" ng-init="data = {{json_encode($data)}}">
            @include('admin.search')
            <div id="exportable">
              <table class="table table-hover table-bordered table-striped">
                <thead>
                  <tr class="active">
                    <th>Mã số</th>
                    <th>Tên album</th>
                    <th>Tạo lúc</th>
                    <th>Cập nhật lúc</th>
                    <th>Hành động</th>
                  </tr>
                </thead>
                <tbody>
                  <tr ng-repeat="item in data | filter:search">
                    <td><%item.id%></td>
                    <td><%item.name%></td>
                    <td><%item.created_at | asDate | date:'dd/MM/yyyy hh:mm'%></td>
                    <td><%item.updated_at | asDate | date:'dd/MM/yyyy hh:mm'%></td>
                    <td>
                      <a href="categories/<%item.id%>/adEdit" class="btn btn-default btn-sm"><span class="glyphicon glyphicon glyphicon-edit"></span> Sửa</a>
                      <a href="categories/<%item.id%>/adDelete" class="btn btn-default btn-sm" onclick="return confirm('Bạn có chắc chắc muốn xóa?')"><span class="glyphicon glyphicon glyphicon-trash"></span>Xóa</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
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
