<div class="row" ng-app="game_hoctu">
	<div class="col-md-6 col-md-offset-3">
		
		<div class="panel panel-default">
			<div class="panel-heading">
				Xác thực quản trị viên
			</div>
			<div class="panel-body">
				@include("message")
				<form name="formLogin" class="form-horizontal" role="form" method="POST" action="{{ route('authadmin') }}" novalidate>
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group">
						<label class="col-md-4 control-label">Email:</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="password" required="" value="{{Auth::user()->email}}" disabled="">
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
							<button ng-disabled="formLogin.$invalid" type="submit" class="btn btn-primary">Đăng nhập</button>

						</div>
					</div>
				</form>
			</div>
		</div>

	</div>
</div>