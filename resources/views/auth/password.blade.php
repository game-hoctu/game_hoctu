@extends('app')

@section('title', 'Khôi phục mật khẩu')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12">
		<h1 class="title-bar">Khôi phục mật khẩu</h1>
			<hr/>
			@include('message')
			<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="form-group">
					<label class="col-md-4 control-label">Email của bạn:</label>
					<div class="col-md-6">
						<input type="email" class="form-control" name="email" value="{{ old('email') }}">
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<button type="submit" class="btn btn-primary">
							Gửi xác nhận khôi phục mật khẩu <span class="glyphicon glyphicon-arrow-right"></span>
						</button>
					</div>
				</div>
			</form>

		</div>
	</div>
</div>
@endsection
<!-- 			<div class="panel panel-default">
				<div class="panel-heading">Reset Password</div>
				<div class="panel-body">
					@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
						</div>
					@endif

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