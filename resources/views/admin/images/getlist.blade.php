@extends('admin')
@section('title', 'Quản lý hình ảnh')
@section('content')
<div class="container-fluid" ng-app="game_hoctu" ng-controller="ImagesController">
  <div class="row">
    <div class="col-md-12">
      <h1>Quản lý hình ảnh</h1>
      <hr/>
      @include('message')
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">Tất cả hình ảnh</a></li>
        <li><a data-toggle="tab" href="#insert"><span class="glyphicon glyphicon-plus"></span>Thêm</a></li>
      </ul>
      <hr/>
      <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
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
            <table class="table table-hover table-bordered table-striped">
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
        <div id="insert" class="tab-pane fade">
          <div class="panel panel-default">
            <div class="panel-heading">Thêm hình ảnh</div>
            <div class="panel-body">
              <form enctype="multipart/form-data" name="form_imgAdd" class="form-horizontal" role="form" method="POST" action="{{ route('images_postadd') }}">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}" novalidate>

                <div class="form-group">
                  <label class="col-md-4 control-label">Hình ảnh</label>
                  <div class="col-md-6">
                    <input type="file" class="form-control" name="fImage" required="" ng-model="fImage">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">Từ ngữ</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="word" required="" ng-model="word">
                    <div ng-show="form_imgAdd.word.$touched" ng-messages="form_imgAdd.word.$error">
                      <div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">Album</label>
                  <div class="col-md-6">
                    <select name="albums_id" class="form-control">
                      @foreach($albums as $album )
                      <option value="{{$album['id']}}">{{$album['name']}}</option>
                      @endforeach
                    </select>
                    <div ng-show="form_imgAdd.user.$touched" ng-messages="form_imgAdd.user.$error">
                      <div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                      Thêm
                    </button>
                    <a class="btn btn-default" href="{{url('admin/images/')}}">Trở về</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
