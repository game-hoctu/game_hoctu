@extends('admin')
@section('title', 'Thêm người dùng mới')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@if(isset($insertSuccess))
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Thông báo!</strong> Đã thêm user thành công.
			</div>
			@endif
			<div class="panel panel-default">
				<div class="panel-heading">Thêm người dùng mới</div>
				<div class="panel-body">
					<!-- @if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Thông báo!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
						@endif -->

						<form class="form-horizontal" role="form" method="POST" action="{{ route('ad_postadd') }}">
							<input type="hidden" name="_token" value="{!! csrf_token() !!}">

							<div class="form-group">
								<label class="col-md-4 control-label">Họ tên</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="name" required="">
									<!--<label class="label label-danger">{!! $errors->first('txttenalbum') !!}</label>-->

								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Email</label>
								<div class="col-md-6">
									<input type="email" class="form-control" name="email" required="">
									<!--<label class="label label-danger">{!! $errors->first('txttenalbum') !!}</label>-->

								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Mật khẩu</label>
								<div class="col-md-6">
									<input type="password" class="form-control" name="password" required="">
									<!--<label class="label label-danger">{!! $errors->first('txttenalbum') !!}</label>-->

								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Quyền</label>
								<div class="col-md-6">
									<select name="role" class="form-control">
										<option value="1">Người dung thường</option>
										<option value="3">Quản trị viên</option>
									</select>

								</div>
							</div>
							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<button type="submit" class="btn btn-primary">
										Thêm
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
