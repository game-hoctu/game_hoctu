@extends('app')

@section('title', 'Khôi phục mật khẩu')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h1 class="title-bar">Khôi phục mật khẩu</h1>
			<hr/>
			@include('message')
			<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="token" value="{{ $token }}">

				<div class="form-group">
				<label class="col-md-4 control-label">Email của bạn:</label>
					<div class="col-md-6">
						<input type="email" class="form-control" name="email" value="{{ old('email') }}">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Mật khẩu:</label>
					<div class="col-md-6">
						<input type="password" class="form-control" name="password">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Xác nhận mật khẩu:</label>
					<div class="col-md-6">
						<input type="password" class="form-control" name="password_confirmation">
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<button type="submit" class="btn btn-primary">
							Khôi phục
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
