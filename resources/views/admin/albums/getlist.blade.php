@extends('admin')
@section('title', 'Quản lý các album')
@section('content')
<div class="container-fluid" ng-app="game_hoctu" ng-controller="AlbumsController" ng-init="loadAllAlbums()">
  <div class="row">
    <div class="col-md-12">
      <h1><span class="glyphicon glyphicon-list-alt"></span> Quản lý album</h1>
      <hr/>
      @include('message')
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home" ng-click="loadAllAlbums()">Tất cả album</a></li>
        <li><a data-toggle="tab" href="#cate" ng-click="viewByCate()">Theo thể loại</a></li>
        <li><a data-toggle="tab" href="#user" ng-click="viewByUsers()">Theo người dùng</a></li>
        <li><a data-toggle="tab" href="#insert" ng-click="insert()"><span class="glyphicon glyphicon-plus"></span>Thêm</a></li>
      </ul>
      <hr/>

      <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
        </div>
        <div id="cate" class="tab-pane fade">
          <form class="form-inline" role="form" >
            <div class="form-group">
              <label for="cate_id">Chọn thể loại:</label>
              <select name="cate_id" ng-model="cate_id" class="form-control" ng-change="loadAlbumByCate()">
                <option ng-repeat="cate in cates" value="<%cate.id%>"><%cate.id%> - <%cate.name%></option>
              </select>
            </div>
          </form>
        </div>
        <div id="user" class="tab-pane fade">
          <form class="form-inline" role="form" >
            <div class="form-group">
              <label for="users_id">Chọn người dùng:</label>
              <select name="users_id" ng-model="users_id" class="form-control" ng-change="loadAlbumByUsers()">
                <option ng-repeat="user in users" value="<%user.id%>"><%user.id%> - <%user.name%></option>
              </select>
            </div>
          </form>
        </div>
        <div id="insert" class="tab-pane fade">
          <form name="form_AbAdd" class="form-horizontal" role="form" method="POST" action="{{ route('albumsAdPostAdd') }}">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}" novalidate>

            <div class="form-group">
              <label class="col-md-4 control-label">Tên album: </label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="name" required="" ng-model="name">
                <div ng-show="form_AbAdd.name.$touched" ng-messages="form_AbAdd.name.$error">
                  <div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label">Mô tả: </label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="description" required="" ng-model="description">
                <div ng-show="form_AbAdd.description.$touched" ng-messages="form_AbAdd.description.$error">
                  <div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label">Người dùng: </label>
              <div class="col-md-6">
                <select name="users_id" class="form-control">
                  @foreach($users as $user )
                  <option value="{{$user['id']}}">{{$user['name']}}</option>
                  @endforeach
                </select>
                <div ng-show="form_AbAdd.user.$touched" ng-messages="form_AbAdd.user.$error">
                  <div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label">Thể loại: </label>
              <div class="col-md-6">
                <select name="categories_id" class="form-control">
                  @foreach($cates as $cate )
                  <option value="{{$cate['id']}}">{{$cate['name']}}</option>
                  @endforeach
                </select>
                <div ng-show="form_AbAdd.theloai.$touched" ng-messages="form_AbAdd.theloai.$error">
                  <div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                  Thêm
                </button>
                <a class="btn btn-default" href="{{url('admin/albums/')}}">Trở về</a>
              </div>
            </div>
          </form>

        </div>
        <span ng-show="count != undefined">Có tất cả <%count%> album.</span>
        <span ng-show="count == undefined">Không có album nào.</span>

        <div class="table-responsive" ng-show="albums != undefined" id="table">
          <hr/>
          @include('admin.search')
          <div id="exportable">
            <table class="table table-hover table-bordered table-striped">
              <thead>
                <tr>
                  <th>Mã số</th>
                  <th>Tên album</th>
                  <th>Mô tả</th>
                  <th>Tạo lúc</th>
                  <th>Cập nhật lúc</th>
                  <th>Hành động</th>
                </tr>
              </thead>
              <tbody>
                <tr ng-repeat="album in albums | filter:search">
                  <td><%album.id%></td>
                  <td><%album.name%></td>
                  <td><%album.description%></td>
                  <td><%album.created_at | asDate | date:'dd/MM/yyyy hh:mm'%></td>
                  <td><%album.updated_at | asDate | date:'dd/MM/yyyy hh:mm'%></td>
                  <td>
                    <a href="albums/<%album.id%>/adEdit" class="btn btn-default btn-sm"><span class="glyphicon glyphicon glyphicon-edit"></span> Sửa</a>
                    <a href="albums/<%album.id%>/adDelete" class="btn btn-default btn-sm" onclick="return confirm('Bạn có chắc chắc muốn xóa?')"><span class="glyphicon glyphicon glyphicon-trash"></span>Xóa</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
