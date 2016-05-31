@extends('admin')
@section('title','Sửa Album')
@section('content')
<div class="container-fluid" ng-app="game_hoctu" ng-init="data = {{json_encode($getalbumById)}}">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			@include('message')
			<h1>Sửa Album</h1>
			<hr/>
			<form name="form" class="form-horizontal" role="form" method="POST" action="{{ route('albumsAdPostEdit') }}" novalidate="">
				<input type="hidden" name="_token" value="{!! csrf_token() !!}">
				<div class="form-group">
					<label class="col-md-4 control-label">Mã số: </label>
					<div class="col-md-6">
						<input type="text" class="form-control" disabled="" value="{{ old('id', $getalbumById['id'])}}">
						<input type="hidden" class="form-control" name="id" value="{{ old('id', $getalbumById['id'])}}">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Tên Album: </label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="name" ng-model="data.name" required="" minlength="6">
						<div ng-show="form.name.$touched" ng-messages="form.name.$error">
							<div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Mô tả: </label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="description" ng-model="data.description" required="" minlength="6">
						<div ng-show="form.description.$touched" ng-messages="form.description.$error">
							<div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Người dùng: </label>
					<div class="col-md-6">
						<select name="users_id" class="form-control" ng-init="users = {{json_encode($users)}}">
							<option ng-repeat="user in users" value="<%user.id%>" ng-selected="users.id == data.users_id"><%user.name%></option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Thể loại: </label>
					<div class="col-md-6">
						<select name="categories_id" class="form-control" ng-init="categories = {{json_encode($cates)}}">
							<option ng-repeat="cate in categories" value="<%cate.id%>" ng-selected="cate.id == data.categories_id"><%cate.name%></option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<button type="submit" class="btn btn-primary">
							Sửa
						</button>
						<a class="btn btn-default" href="{{url('admin/albums/')}}">Trở về</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
