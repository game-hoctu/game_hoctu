@extends('app')
@section('title','Thêm album mới')
@section('content')
<div class="container-fluid" ng-app="game_hoctu">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@include('message')
			<div class="panel panel-default">
				<div class="panel-heading">Thêm Album</div>
			</hr>
			<div class="panel-body">
				<form name="form_AbAdd" class="form-horizontal" role="form" method="POST" action="{{ route('albumsPostAdd') }}" enctype="multipart/form-data" novalidate>
					<input type="hidden" name="_token" value="{!! csrf_token() !!}" >
					<div class="form-group">
						<label class="col-md-4 control-label">Tên album:</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="name"  ng-model="name" required="" minlength="6">
							<div ng-show="form_AbAdd.name.$touched" ng-messages="form_AbAdd.name.$error">
								<div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Mô tả:</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="description" ng-model="description" required="" minlength="6">
							<div ng-show="form_AbAdd.description.$touched" ng-messages="form_AbAdd.description.$error">
								<div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Thể loại:</label>
						<div class="col-md-6">
							<select name="categories_id" class="form-control">
								@foreach($cates as $cate )
								<option value="{{$cate['id']}}">{{$cate['name']}}</option>
								@endforeach
							</select>
						</div>
					</div>
					@for($i=1; $i <= 2; $i++)
					<div class="form-group">
						<label class="col-md-4 control-label">Hình ảnh {{$i}}:</label>
						<div class="col-md-6">
							<input type="file" accept="image/*" class="form-control" name="fImage[]" ng-model="fImage{{$i}}">
							<div ng-show="form_AbAdd.fImage{{$i}}.$touched" ng-messages="form_AbAdd.fImage{{$i}}.$error">
								<div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Từ ngữ {{$i}}:</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="words[]" ng-model="word{{$i}}" required="">
							<div ng-show="form_AbAdd.word{{$i}}.$touched" ng-messages="form_AbAdd.word{{$i}}.$error">
								<div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
							</div>
						</div>
					</div>
					@endfor
					<div class="form-group">
						<div class="col-md-6 col-md-offset-4">
							<button type="submit" class="btn btn-primary" ng-disabled="!form_AbAdd.$valid">
								Thêm
							</button>
							<a class="btn btn-default" href="{{url('albums/')}}">Trở về</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
