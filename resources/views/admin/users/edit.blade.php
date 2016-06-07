@extends('admin')
@section('title', 'Cập nhật người dùng')
@section('content')
<div class="container-fluid" ng-app="game_hoctu" ng-init="data = {{json_encode($getuserById)}}">
	<div class="row">
		<div class="col-md-12">
			<h1>Cập nhật người dùng</h1>
			<hr/>
			<form name="form" class="form-horizontal" role="form" method="POST" action="{{ route('usersAdPostEdit') }}" novalidate="">
				<input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
				<div class="form-group">
					<label class="col-md-4 control-label">Mã số: </label>
					<div class="col-md-6">
						<input type="text" class="form-control" disabled="" value="{{ old('id', $getuserById['id'])}}">
						<input type="hidden" class="form-control" name="id" value="{{ old('id', $getuserById['id'])}}">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Email: </label>
					<div class="col-md-6">
						<input type="text" class="form-control" disabled="" name="email" value="{{ old('email', $getuserById['email'])}}" required="">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Họ tên: </label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="name" value="{{ old('name', $getuserById['name'])}}" ng-model="data.name" required="" minlength="6" maxlength="30">
						<div ng-show="form.name.$touched" ng-messages="form.name.$error">
							<div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Quyền: </label>
					<div class="col-md-6">
						<select name="role" class="form-control">
							<option value="1" ng-selected="data.role == 1">Người dùng thường</option>
							<option value="3" ng-selected="data.role == 3">Quản trị viên</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Địa chỉ: </label>
					<div class="col-md-6">
						<input type="text" class="form-control" disabled="" name="address" value="{{ old('address', $getuserById['address'])}}" required="">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<button type="submit" class="btn btn-primary">
							Sửa
						</button>
						<a class="btn btn-default" href="{{url('admin/users/')}}">Trở về</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
