@extends('admin')
@section('title', 'Quản lý các album')
@section('content')
<div class="container-fluid" ng-app="game_hoctu" ng-controller="AlbumsController">
  <div class="row">
    <div class="col-md-12">
      <h1>Danh sách album</h1>
      <hr/>
      @include('message')
      <div class="btn-group">
        <button type="button" class="btn btn-primary" ng-click="loadAllAlbums()">Tất cả</button>
        <button type="button" class="btn btn-primary" ng-click="viewByCate()">Albums theo thể loại</button>
        <button type="button" class="btn btn-primary" ng-click="viewByUsers()">Albums của người dùng</button>
        <a class="btn btn-primary" href="{{url('admin/albums/ad_add')}}"><span class="glyphicon glyphicon-plus"></span>Thêm</a>
      </div>
      <hr/>
      <form class="form-inline" role="form" >
        <div class="form-group" ng-show="viewbyCate == true">
          <label for="cate_id">Chọn thể loại:</label>
          <select name="cate_id" ng-model="cate_id" class="form-control" ng-change="loadAlbumByCate()">
            <option ng-repeat="cate in cates" value="<%cate.id%>"><%cate.id%> - <%cate.name%></option>
          </select>
        </div>
        <div class="form-group" ng-show="viewbyCate != true">
          <label for="users_id">Chọn người dùng:</label>
          <select name="users_id" ng-model="users_id" class="form-control" ng-change="loadAlbumByUsers()">
            <option ng-repeat="user in users" value="<%user.id%>"><%user.id%> - <%user.name%></option>
          </select>
        </div>
      </form>
      <span ng-show="count != undefined">Có tất cả <%count%> album.</span>
      <span ng-show="count == undefined">Không có album nào.</span>

      <div class="table-responsive" ng-show="albums != undefined">
        <hr/>
        <table class="table table-hover">
          <tr class="active">
            <th>Mã số</th>
            <th>Tên album</th>
            <th>Mô tả</th>
            <th>Hành động</th>
          </tr>
          <tr ng-repeat="album in albums">
            <td><%album.id%></td>
            <td><%album.name%></td>
            <td><%album.description%></td>
            <td>
              <a href="albums/<%album.id%>/ad_edit" class="btn btn-default btn-sm">Sửa</a>
              <a href="albums/<%album.id%>/ad_delete" class="btn btn-default btn-sm" onclick="return confirm('Bạn có chắc chắc muốn xóa?')">Xóa</a>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
