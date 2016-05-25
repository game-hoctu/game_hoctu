@extends('admin')
@section('title', 'Quản lý hình ảnh')
@section('content')
<div class="container-fluid" ng-app="game_hoctu" ng-controller="ImagesController">
  <div class="row">
    <div class="col-md-12">
      <h1>Danh sách hình ảnh</h1>
      <hr/>
      @include('message')
      <div class="btn-group">
        <button class="btn btn-primary" ng-click="loadAllImage()">Tất cả</button>
        <a href="{{url('admin/images/ad_add')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Thêm</a>
      </div>
      <hr/>

      <form class="form-inline" role="form">
        <div class="form-group">
          <label for="albums_id">Chọn album:</label>
          <select name="albums_id" ng-model="albums_id" class="form-control" ng-change="loadImages()">
            <option ng-repeat="album in albums" value="<%album.id%>"><%album.id%> - <%album.name%></option>
          </select>
        </div>
      </form>
      <span ng-show="count != undefined">Có tất cả <%count%> hình ảnh.</span>
      <span ng-show="count == undefined">Không có hình ảnh nào.</span>
      <div class="table-responsive" ng-show="images != undefined">
        <hr/>
        <table class="table table-hover">
          <tr class="active">
            <th>Mã số</th>
            <th>Hình ảnh</th>
            <th>Từ ngữ</th>
            <th>Hành động</th>
          </tr>
          <tr ng-repeat="image in images">
            <td><%image.id%></td>
            <td><%image.url%></td>
            <td><%image.word%></td>
            <td>
              <a href="images/<%image.id%>/ad_edit" class="btn btn-default btn-sm">Sửa</a>
              <a href="images/<%image.id%>/ad_delete" class="btn btn-default btn-sm" onclick="return confirm('Bạn có chắc chắc muốn xóa?')">Xóa</a>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
