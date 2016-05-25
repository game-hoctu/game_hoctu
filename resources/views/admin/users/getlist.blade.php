@extends('admin')
@section('title', 'Quản lý người dùng')
@section('content')
<div class="container-fluid">
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
            <table class="table table-hover table-bordered table-striped">
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
        <div id="insert" class="tab-pane fade">
          <div class="panel panel-default">
            <div class="panel-heading">Thêm người dùng mới</div>
            <div class="panel-body">
              <form name=formadduser class="form-horizontal" role="form" method="POST" action="{{ route('users_postAdd') }}">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}" novalidate>

                <div class="form-group">
                  <label class="col-md-4 control-label">Họ tên</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="name" required="" ng-model="name">
                    <div ng-show="formadduser.name.$touched" ng-messages="formadduser.name.$error">
                      <div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
                    </div>

                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">Email</label>
                  <div class="col-md-6">
                    <input type="email" class="form-control" name="email" required="" ng-model="email">
                    <label class="label label-danger">{!! $errors->first('email') !!}</label>
                    <div ng-show="formadduser.email.$touched" ng-messages="formadduser.email.$error">
                      <div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
                    </div>

                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">Mật khẩu</label>
                  <div class="col-md-6">
                    <input type="password" class="form-control" name="password" required="" ng-model="password">
                    <div ng-show="formadduser.password.$touched" ng-messages="formadduser.password.$error">
                      <div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
                    </div>

                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">Quyền</label>
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
  </div>
</div>
@endsection
