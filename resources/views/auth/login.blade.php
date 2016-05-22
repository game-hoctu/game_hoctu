@extends('app')

@section('content')

<div class="container-fluid" ng-app="game_hoctu" ng-controller="LoginController">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Đăng nhập</h1>
			<hr/>
			@if(isset($requestLogin))
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Thông báo!</strong> Bạn cần phải đăng nhập.
			</div>
			@endif
			<div class="panel panel-default">
				<div class="panel-heading">Đăng nhập</div>
				<div class="panel-body">
<!-- 					@if (count($errors) > 0)
					<div class="alert alert-danger">
						<strong>Whoops!</strong> There were some problems with your input.<br><br>
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif -->

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
	</div>
</div>

@endsection
