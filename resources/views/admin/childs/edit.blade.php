@extends('admin')
@section('title','Sửa thông tin đứa trẻ')
@section('content')
<div class="container-fluid" ng-app="game_hoctu" ng-init="data = {{json_encode($getchildById)}}">
	<div class="row">
		<div class="col-md-12">
			<h1>Sửa thông tin đứa trẻ</h1>
			<hr/>
			@include('message')
			<form enctype="multipart/form-data" name="form" class="form-horizontal" role="form" method="POST" action="{{ route('childsAdPostEdit') }}" novalidate="">
				<input type="hidden" name="_token" value="{!! csrf_token() !!}">
				<div class="form-group">
					<label class="col-md-4 control-label">Mã số: </label>
					<div class="col-md-6">
						<input type="text" class="form-control" disabled="" value="{{ old('id', $getchildById['id'])}}">
						<input type="hidden" class="form-control" name="id" value="{{ old('id', $getchildById['id'])}}">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Họ tên: </label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="name" ng-model="data.name" required="" minlength="6" maxlength="30">
						<div ng-show="form.name.$touched" ng-messages="form.name.$error">
							<div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Người dùng: </label>
					<div class="col-md-6">
						<select name="users_id" class="form-control" ng-init="users = {{json_encode($users)}}">
							<option ng-repeat="user in users" value="<%user.id%>" ng-selected="user.id == data.users_id"><%user.name%></option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Ngày sinh: </label>
					<div class="col-md-6">
						<input type="date" class="form-control" name="date_of_birth" required="" ng-model="data.date_of_birth">
						<div ng-show="form.date_of_birth.$touched" ng-messages="form.date_of_birth.$error">
							<div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label"></label>
					<div class="col-md-6">
						<img src="{{ CHILD_IMAGE }}<%data.image%> " width="200px">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Hình ảnh: </label>
					<div class="col-md-6">
						<input type="file" class="form-control" name="fImage">
						<input type="hidden" class="form-control" name="image" value="data.image" >
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<button type="submit" class="btn btn-primary">
							Sửa
						</button>
						<a class="btn btn-default" href="{{url('admin/childs/')}}">Trở về</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
