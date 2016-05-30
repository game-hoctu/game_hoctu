@extends('admin')
@section('title','Sửa Album')
@section('content')
<div class="container-fluid" ng-app="game_hoctu">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			@include('message')
			<h1>Sửa Album</h1>
			<hr/>
			<form name="form_cateEdit" class="form-horizontal" role="form" method="POST" action="{{ route('albumsAdPostEdit') }}">
				<input type="hidden" name="_token" value="{!! csrf_token() !!}">
				<div class="form-group">
					<label class="col-md-4 control-label">Mã số: </label>
					<div class="col-md-6">
						<input type="text" class="form-control" disabled="" value="{{ old('id', $getalbumById['id'])}}">
						<input type="hidden" class="form-control" name="id" value="{{ old('id', $getalbumById['id'])}}">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Tên Album: </label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="name" value="{{ old('name', $getalbumById['name'])}}" required="">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Mô tả: </label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="description" value="{{ old('description', $getalbumById['description'])}}" required="">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Người dùng: </label>
					<div class="col-md-6">
						<select name="users_id" class="form-control">
							@foreach($users as $user )
							<option value="{{$user['id']}}">{{$user['name']}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Thể loại: </label>
					<div class="col-md-6">
						<select name="categories_id" class="form-control">
							@foreach($cates as $cate )
							<option value="{{$cate['id']}}">{{$cate['name']}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<button type="submit" class="btn btn-primary">
							Sửa
						</button>
						<a class="btn btn-default" href="{{url('admin/albums/')}}">Trở về</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
