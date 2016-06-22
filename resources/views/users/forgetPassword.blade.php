@extends('app')

@section('title', 'Khôi phục mật khẩu')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h1 class="title-bar">Quên mật khẩu</h1>
			<hr/>
			@include('message')
			<form class="form-horizontal" role="form" method="POST" action="{{ route('usersPostForgetPass') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="form-group">
					<label class="col-md-4 control-label">Địa chỉ email:</label>
					<div class="col-md-6">
						<input type="email" class="form-control" name="email" value="{{ old('email') }}" required="">
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<button type="submit" class="btn btn-primary">
							Gửi đường dẫn lấy mật khẩu <span class="glyphicon glyphicon-arrow-right"></span>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
