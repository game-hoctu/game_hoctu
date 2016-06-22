@extends('app')

@section('title', 'Thay đổi mật khẩu')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h1 class="title-bar">Thay đổi mật khẩu</h1>
			<hr/>
			@include('message')
			<form class="form-horizontal" role="form" method="POST" action="{{ route('usersPostChangePass') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="email" value="{{$user['email']}}">	
				<div class="form-group">
				<label class="col-md-4 control-label">Mật khẩu cũ:</label>
					<div class="col-md-6">
						<input type="password" class="form-control" name="password" required="">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Mật khẩu mới:</label>
					<div class="col-md-6">
						<input type="password" class="form-control" name="new_password" required="" minlength="6" maxlength="30">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Xác nhận mật khẩu mới:</label>
					<div class="col-md-6">
						<input type="password" class="form-control" name="new_password_confirm" required="" minlength="6" maxlength="30">
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<button type="submit" class="btn btn-primary">
							Thay đổi mật khẩu
						</button>
					</div>
				</div>
			</form>
<!-- 			<div class="panel panel-default">
				<div class="panel-heading">Reset Password</div>
				<div class="panel-body">
					@if (count($errors) > 0)
					<div class="alert alert-danger">
						<strong>Whoops!</strong> There were some problems with your input.<br><br>
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif


				</div>
			</div> -->
		</div>
	</div>
</div>
@endsection
