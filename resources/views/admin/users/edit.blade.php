@extends('admin')
@section('title', 'Sửa đổi người dùng')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h1>Sửa đổi người dùng</h1>
			<hr/>
			<form class="form-horizontal" role="form" method="POST" action="{{ route('usersAdPostEdit') }}">
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
						<input type="text" class="form-control" disabled="" name="email" value="{{ old('email', $getuserById['email'])}}" required="">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Họ tên</label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="name" value="{{ old('name', $getuserById['name'])}}" required="">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Quyền</label>
					<div class="col-md-6">
						<select name="role" class="form-control">
							<option value="1" @if(old('role', $getuserById['role'])==1) selected="" @endif>Người dùng thường</option>
							<option value="3" @if(old('role', $getuserById['role'])==3) selected="" @endif>Quản trị viên</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<button type="submit" class="btn btn-primary">
							Sửa
						</button>
						<a class="btn btn-default" href="{{url('admin/users/')}}">Trở về</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
