@extends('admin')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@if(isset($insertSuccess))
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Thông báo!</strong> Đã thêm thể loại mới thành công.
			</div>
			@endif
			<div class="panel panel-default">
				<div class="panel-heading">Thêm mới người dùng</div>
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
						<form class="form-horizontal" role="form" method="POST" action="{{ route('ad_postedit') }}">
							<input type="hidden" name="_token" value="{!! csrf_token() !!}">
							<div class="form-group">
								<label class="col-md-4 control-label">Mã số</label>
								<div class="col-md-6">
									<input type="text" class="form-control" disabled="" value="{{ old('id', $getuserById['id'])}}">
									<input type="hidden" class="form-control" name="id" value="{{ old('id', $getuserById['id'])}}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Email</label>
								<div class="col-md-6">
									<input type="text" class="form-control" disabled="" name="email" value="{{ old('email', $getuserById['email'])}}">
									<!--<label class="label label-danger">{!! $errors->first('txttenalbum') !!}</label>-->

								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Họ tên</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="name" value="{{ old('name', $getuserById['name'])}}">
									<!--<label class="label label-danger">{!! $errors->first('txttenalbum') !!}</label>-->

								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Quyền</label>
								<div class="col-md-6">
									<select name="role" class="form-control">
										<option value="1" @if(old('role', $getuserById['role'])==1) selected="" @endif>Người dung thường</option>
										<option value="3" @if(old('role', $getuserById['role'])==3) selected="" @endif>Quản trị viên</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<button type="submit" class="btn btn-primary">
										Sửa
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection