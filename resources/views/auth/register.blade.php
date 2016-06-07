@extends('app')

@section('title', 'Đăng ký tài khoản')
@section('content')

<div class="container" ng-app="game_hoctu" ng-controller="RegisterController">
	<div class="row">
		<div class="col-sm-12">
			<h1 class="title-bar">Đăng ký</h1>
			<hr/>
			<form name="formRegister" class="form-horizontal" role="form" method="POST" action="{{ url('auth/register') }}" novalidate>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="form-group">
					<label class="col-md-4 control-label">Email:</label>
					<div class="col-md-6">
						<input type="email" class="form-control" name="email" value="{{ old('email') }}" required="" ng-model="register.email">
						<div ng-show="formRegister.email.$touched" ng-messages="formRegister.email.$error">
							<div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Mật khẩu:</label>
					<div class="col-md-6">
						<input type="password" class="form-control" name="password" required ng-model="register.password">
						<div ng-show="formRegister.password.$touched" ng-messages="formRegister.password.$error">
							<div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Xác nhận mật khẩu:</label>
					<div class="col-md-6">
						<input type="password" class="form-control" name="password_confirmation" required ng-model="register.password_confirmation">
						<div ng-show="formRegister.password_confirmation.$touched" ng-messages="formRegister.password_confirmation.$error">
							<div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
						</div>
						<p class="label label-danger" ng-show="register.password != register.password_confirmation">Mật khẩu lặp lại không khớp</p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Họ tên:</label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="name" value="{{ old('name') }}" required="" minlength="6" maxlength="30" ng-model="register.name">
						<div ng-show="formRegister.name.$touched" ng-messages="formRegister.name.$error">
							<div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Giới tính: </label>
					<div class="col-md-6">
						<select name="sex" class="form-control">
							<option value="0" ng-selected="data.sex == 0">Nam</option>
							<option value="1" ng-selected="data.sex == 1">Nữ</option>
						</select>
					</div>
				</div>
				 <div class="form-group">
              <label class="col-md-4 control-label">Địa chỉ: </label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="address" required="" ng-model="address">
                <div ng-show="formadduser.address.$touched" ng-messages="formadduser.address.$error">
                  <div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
                </div>
              </div>
            </div>
				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<button ng-disabled="formRegister.$invalid || register.password != register.password_confirmation" type="submit" class="btn btn-primary">
							Đăng ký
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection
