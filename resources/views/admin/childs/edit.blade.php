@extends('admin')
@section('title','Sửa thông tin những đứa trẻ')
@section('content')
<div class="container-fluid" ng-app="game_hoctu">
	<div class="row">
		<div class="col-md-12">
			<h1>Sửa thông tin những đứa trẻ</h1>
			<hr/>
			@include('message')
			<form enctype="multipart/form-data" name="form_cateEdit" class="form-horizontal" role="form" method="POST" action="{{ route('childsAdPostEdit') }}">
				<input type="hidden" name="_token" value="{!! csrf_token() !!}">
				<div class="form-group">
					<label class="col-md-4 control-label">Mã số: </label>
					<div class="col-md-6">
						<input type="text" class="form-control" disabled="" value="{{ old('id', $getchildById['id'])}}">
						<input type="hidden" class="form-control" name="id" value="{{ old('id', $getchildById['id'])}}">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Tên đứa trẻ: </label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="name" value="{{ old('name', $getchildById['name'])}}" required="">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Người dùng: </label>
					<div class="col-md-6">
						<select name="users_id" class="form-control">
							@foreach($users as $user )
							<option value="{{$user['id']}}"  @if($getchildById['users_id'] == $user['id']){{"selected"}}@endif>{{$user['name']}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Ngày sinh: </label>
					<div class="col-md-6">
						<input type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth', $getchildById['date_of_birth'])}}" required="">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label"></label>
					<div class="col-md-6">
						<img src="{{ UPLOAD_FOLDER.old('image', $getchildById['image'])}}" width="200px" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Hình ảnh: </label>
					<div class="col-md-6">
						<input type="file" class="form-control" name="fImage" required="">
						<input type="hidden" class="form-control" name="image" value="{{ old('url', $getchildById['image'])}}" required="">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<button type="submit" class="btn btn-primary">
							Sửa
						</button>
						<a class="btn btn-default" href="{{url('admin/childs/')}}">Trở về</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
