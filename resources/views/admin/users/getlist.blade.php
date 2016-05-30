@extends('admin')
@section('title', 'Quản lý người dùng')
@section('content')
<div class="container-fluid" ng-app="game_hoctu">
  <div class="row">
    <div class="col-md-12">
      <h1>Quản lý người dùng</h1>
      <hr/>
      @include('message')
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">Danh sách người dùng</a></li>
        <li><a data-toggle="tab" href="#insert"><span class="glyphicon glyphicon-plus"></span>Thêm</a></li>
      </ul>
      <hr/>
      <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
          <div class="table-responsive">
            <input type="hidden" name="data" ng-model="data" ng-init="data = {{json_encode($data)}}">
            @include('admin.search')
            <table class="table table-hover table-bordered table-striped">
              <thead>
                <tr>
                  <th>Mã số</th>
                  <th>Email</th>
                  <th>Họ tên</th>
                  <th>Hành động</th>
                </tr>
              </thead>
              <tbody>
                <tr ng-repeat="item in data | filter:search">
                  <td><%item.id%></td>
                  <td><%item.email%></td>
                  <td><%item.name%></td>
                  <td>
                    <a href="users/<%item.id%>/adEdit" class="btn btn-default btn-sm"><span class="glyphicon glyphicon glyphicon-edit"></span> Sửa</a>
                    <a href="users/<%item.id%>/adDelete" class="btn btn-default btn-sm" onclick="return confirm('Bạn có chắc chắc muốn xóa?')"><span class="glyphicon glyphicon glyphicon-trash"></span>Xóa</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div id="insert" class="tab-pane fade">
          <form name=formadduser class="form-horizontal" role="form" method="POST" action="{{ route('usersAdPostAdd') }}">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}" novalidate>

            <div class="form-group">
              <label class="col-md-4 control-label">Họ tên: </label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="name" required="" ng-model="name">
                <div ng-show="formadduser.name.$touched" ng-messages="formadduser.name.$error">
                  <div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
                </div>

              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label">Email: </label>
              <div class="col-md-6">
                <input type="email" class="form-control" name="email" required="" ng-model="email">
                <label class="label label-danger">{!! $errors->first('email') !!}</label>
                <div ng-show="formadduser.email.$touched" ng-messages="formadduser.email.$error">
                  <div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
                </div>

              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label">Mật khẩu: </label>
              <div class="col-md-6">
                <input type="password" class="form-control" name="password" required="" ng-model="password">
                <div ng-show="formadduser.password.$touched" ng-messages="formadduser.password.$error">
                  <div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
                </div>

              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label">Quyền: </label>
              <div class="col-md-6">
                <select name="role" class="form-control">
                  <option value="1">Người dùng thường</option>
                  <option value="3">Quản trị viên</option>
                </select>

              </div>
            </div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                  Thêm
                </button>
                <a class="btn btn-default" href="{{url('admin/users/')}}">Trở về</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
