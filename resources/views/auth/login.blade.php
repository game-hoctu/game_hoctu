@extends('app')

@section('title', 'Đăng nhập')
@section('content')

<div class="container" ng-app="game_hoctu" ng-controller="LoginController">
	<div class="row">
		<div class="col-sm-12">
			<h1 class="title-bar"><span class="glyphicon glyphicon-log-in"></span> Đăng nhập</h1>
			@include('message')
			<form name="formLogin" class="form-horizontal" role="form" method="POST" action="{{ url('auth/login') }}" novalidate>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="form-group">
					<label class="col-md-4 control-label">Email:</label>
					<div class="col-md-6">
						<input type="email" class="form-control" name="email" value="{{ old('email') }}" ng-model="login.email" required="" autocomplete="off">
						<div ng-show="formLogin.email.$touched" ng-messages="formLogin.email.$error">
							<div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
						</div>
					</div>

				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Mật khẩu:</label>
					<div class="col-md-6">
						<input type="password" class="form-control" name="password" required="" ng-model="login.password">
						<div ng-show="formLogin.password.$touched" ng-messages="formLogin.password.$error">
							<div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<div class="checkbox">
							<label>
								<input type="checkbox" name="remember"> Ghi nhớ
							</label>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<button ng-disabled="formLogin.$invalid" type="submit" class="btn btn-primary">Đăng nhập</button>

						<a class="btn btn-link" href="{{ url('/password/email') }}">Quên mật khẩu?</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
