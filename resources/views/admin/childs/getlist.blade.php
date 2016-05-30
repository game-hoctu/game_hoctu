@extends('admin')
@section('title', 'Danh sách những đứa trẻ')
@section('content')
<div class="container-fluid" ng-app="game_hoctu" ng-controller="ChildsController">
  <div class="row">
    <div class="col-md-12">
      <h1>Danh sách những đứa trẻ</h1>
      <hr/>
      @include('message')
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home" ng-click="loadAllChild()">Tất cả những đứa trẻ</a></li>
        <li><a data-toggle="tab" href="#user" ng-click="loadUsers()">Theo người dùng</a></li>
        <li><a data-toggle="tab" href="#insert"><span class="glyphicon glyphicon-plus"></span>Thêm</a></li>
      </ul>
      <hr/>

      <div class="tab-content">
        <div id="home" class="tab-pane fade in active"></div>
        <div id="user" class="tab-pane fade">
          <form class="form-inline" role="form" >
            <div class="form-group">
              <label for="users_id">Chọn người dùng:</label>
              <select name="users_id" ng-model="users_id" class="form-control" ng-change="loadChildByUser()">
                <option ng-repeat="user in users" value="<%user.id%>"><%user.id%> - <%user.name%></option>
              </select>
            </div>
          </form>
        </div>
        <div id="insert" class="tab-pane fade">

          <form  enctype="multipart/form-data" name="form_childAdd" class="form-horizontal" role="form" method="POST" action="{{ route('childsAdPostAdd') }}">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}" novalidate>

            <div class="form-group">
              <label class="col-md-4 control-label">Tên đứa trẻ:</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="name" required="" ng-model="name">
                <div ng-show="form_childAdd.name.$touched" ng-messages="form_childAdd.name.$error">
                  <div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label">Cha mẹ:</label>
              <div class="col-md-6">
                <select name="users_id" class="form-control">
                  @foreach($users as $user )
                  <option value="{{$user['id']}}">{{$user['name']}}</option>
                  @endforeach
                </select>
                <div ng-show="form_childAdd.user.$touched" ng-messages="form_childAdd.user.$error">
                  <div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label">Ngày sinh:</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="date_of_birth" required="" ng-model="date_of_birth">
                <div ng-show="form_childAdd.date_of_birth.$touched" ng-messages="form_childAdd.date_of_birth.$error">
                  <div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label">Hình ảnh:</label>
              <div class="col-md-6">
                <input type="file" class="form-control" name="fImage" ng-model="fImage">
                <div ng-show="form_childAdd.fImage.$touched" ng-messages="form_childAdd.fImage.$error">
                  <div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                  Thêm
                </button>
                <a class="btn btn-default" href="{{url('admin/childs/')}}">Trở về</a>
              </div>
            </div>
          </form>

        </div>
      </div>
      <span ng-show="count != undefined">Có tất cả <%count%> đứa trẻ.</span>
      <span ng-show="count == undefined">Không có đứa trẻ nào.</span>
      <div class="table-responsive" ng-show="childs != undefined">
        @include('admin.search')
        <table class="table table-hover table-bordered table-striped">
          <tr class="active">
            <th>Mã số</th>
            <th>Tên trẻ</th>
            <th>Ngày sinh</th>
            <th>Hành động</th>
          </tr>
          <tr ng-repeat="child in childs | filter:search">
            <td><%child.id%></td>
            <td><%child.name%></td>
            <td><%child.date_of_birth%></td>
            <td>
              <a href="childs/<%child.id%>/adEdit" class="btn btn-default btn-sm"><span class="glyphicon glyphicon glyphicon-edit"></span> Sửa</a>
              <a href="childs/<%child.id%>/adDelete" class="btn btn-default btn-sm" onclick="return confirm('Bạn có chắc chắc muốn xóa?')"><span class="glyphicon glyphicon glyphicon-trash"></span>Xóa</a>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
