@extends('app')
@section('title','Thêm những đứa trẻ mới')
@section('content')
<div class="container-fluid" ng-app="game_hoctu">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@include('message')
			<div class="panel panel-default">
				<div class="panel-heading">Thêm những đứa trẻ mới</div>
			</hr>
			<div class="panel-body">
				<form enctype="multipart/form-data" name="form_AbAdd" class="form-horizontal" role="form" method="POST" action="{{ route('childsPostAdd') }}">
					<input type="hidden" name="_token" value="{!! csrf_token() !!}" >
					<div class="form-group">
						<label class="col-md-4 control-label">Tên đứa trẻ:</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="name"  ng-model="name" required="" minlength="6">
							<div ng-show="form_AbAdd.name.$touched" ng-messages="form_AbAdd.name.$error">
								<div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Ngày sinh:</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="date_of_birth" required="" ng-model="date_of_birth">
							<div ng-show="form_childAdd.date_of_birth.$touched" ng-messages="form_childAdd.date_of_birth.$error">
								<div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Hình ảnh:</label>
						<div class="col-md-6">
							<input type="file" class="form-control" name="fImage" ng-model="fImage">
							<div ng-show="form_childAdd.fImage.$touched" ng-messages="form_childAdd.fImage.$error">
								<div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6 col-md-offset-4">
							<button type="submit" class="btn btn-primary" ng-disabled="!form_AbAdd.$valid">
								Thêm
							</button>
							<a class="btn btn-default" href="{{url('childs/')}}">Trở về</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
