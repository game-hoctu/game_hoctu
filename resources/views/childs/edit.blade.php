@extends('app')
@section('title','Cập nhật thông tin đứa trẻ')
@section('content')
<div class="container" ng-app="game_hoctu"  ng-init="data = {{json_encode($getchildById)}}">
	<div class="row">
		<div class="col-md-12">
			<h1><span class="glyphicon glyphicon-pencil"></span> Cập nhật thông tin đứa trẻ</h1>
			<hr/>
			@include('message')
			<form enctype="multipart/form-data" name="form_cateEdit" class="form-horizontal" role="form" method="POST" action="{{ route('childsPostEdit') }}" novalidate="">
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
						<input type="text" class="form-control" name="name" value="{{ old('name', $getchildById['name'])}}" required="" ng-model="data.name">
						<div ng-show="form_cateEdit.name.$touched" ng-messages="form_cateEdit.name.$error">
							<div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Ngày sinh: </label>
					<div class="col-md-6">
						<input type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth', $getchildById['date_of_birth'])}}" required="" ng-model="data.date_of_birth">
					</div>
					<div ng-show="form_cateEdit.date_of_birth.$touched" ng-messages="form_cateEdit.date_of_birth.$error">
						<div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label"></label>
					<div class="col-md-6">
						<img src="{{ old('image', $getchildById['image'])}}" width="200px" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Hình ảnh: </label>
					<div class="col-md-6">
						<input type="file" class="form-control" name="fImage">
						<input type="hidden" class="form-control" name="image" value="{{ old('url', $getchildById['image'])}}">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Giới tính: </label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="sex" value="{{ old('sex', $getchildById['sex'])}}" required="" ng-model="data.sex">
						<div ng-show="form_cateEdit.sex.$touched" ng-messages="form_cateEdit.sex.$error">
							<div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<button type="submit" class="btn btn-primary">
							Sửa
						</button>
						<a class="btn btn-default" href="{{url('childs/myChild')}}">Trở về</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
