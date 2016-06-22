@extends('app')
@section('title','Sửa Album')
@section('content')
<div class="container" ng-app="game_hoctu" ng-init="data = {{json_encode($getalbumById)}}">
	<div class="row">
		<div class="col-sm-12">
			@include('message')
			<h1 class="title-bar"><span class="glyphicon glyphicon-pencil"></span> Sửa Album</h1>
			<form name="form_cateEdit" class="form-horizontal" role="form" method="POST" action="{{ route('albumsPostEdit') }}" novalidate="">
				<input type="hidden" name="_token" value="{!! csrf_token() !!}">
				<div class="form-group">
					<label class="col-md-4 control-label">Mã số: </label>
					<div class="col-md-8">
						<input type="text" class="form-control" disabled="" value="{{ old('id', $getalbumById['id'])}}">
						<input type="hidden" class="form-control" name="id" value="{{ old('id', $getalbumById['id'])}}">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Tên Album: </label>
					<div class="col-md-8">
						<input type="text" class="form-control" name="name" value="{{ old('name', $getalbumById['name'])}}" ng-model="data.name" required="" minlength="6">
						<div ng-show="form_cateEdit.name.$touched" ng-messages="form_cateEdit.name.$error">
							<div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Mô tả: </label>
					<div class="col-md-8">
						<input type="text" class="form-control" name="description" value="{{ old('description', $getalbumById['description'])}}" ng-model='data.description' required="">
						<div ng-show="form_cateEdit.description.$touched" ng-messages="form_cateEdit.description.$error">
							<div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
						</div>
					</div>
				</div>
				<input type="hidden" class="form-control" name=users_id value="{{ old('users_id', $getalbumById['users_id'])}}">
				<div class="form-group">
					<label class="col-md-4 control-label">Thể loại: </label>
					<div class="col-md-8" ng-init="cates = {{json_encode($cates)}}">
						<select name="categories_id" class="form-control">
							<option value="<%cate.id%>" ng-repeat="cate in cates" ng-selected="cate.id == data.categories_id"><%cate.name%></option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-8 col-md-offset-4">
						<button type="submit" class="btn btn-primary">
							<span class="glyphicon glyphicon-save"></span>Cập nhật
						</button>
						<a class="btn btn-default" href="{{url('albums/'.$getalbumById['id'].'/detail')}}">Trở về</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
