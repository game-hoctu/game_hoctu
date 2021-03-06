@extends('app')
@section('title','Thêm những đứa trẻ mới')
@section('content')
<div class="container" ng-app="game_hoctu" >
	<div class="row">
		<div class="col-sm-12">
			<h1 class="title-bar"><span class="glyphicon glyphicon-plus"></span> Thêm một đứa trẻ</h1>
			@include('message')

			<form enctype="multipart/form-data" name="form_AbAdd" class="form-horizontal" role="form" method="POST" action="{{ route('childsPostAdd') }}" novalidate="">
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
						<input type="date" placeholder="Ngày sinh..." class="form-control" name="date_of_birth" required="" ng-model="date_of_birth" min="2002-01-01" max="2016-01-01">
						<div ng-show="form_AbAdd.date_of_birth.$touched" ng-messages="form_childAdd.date_of_birth.$error">
							<div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Hình ảnh:</label>
					<div class="col-md-6">
						<input type="file" class="form-control" name="fImage" accept="image*" ng-model="fImage">
						<div ng-show="form_AbAdd.fImage.$touched" ng-messages="form_childAdd.fImage.$error">
							<div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Giới tính: </label>
					<div class="col-md-6">
						<select name="sex" class="form-control">
							<option value="0" ng-selected="data.sex == 0">Nam</option>
							<option value="1" ng-selected="data.sex == 1">Nữ</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<button type="submit" class="btn btn-primary" ng-disabled="form_AbAdd.$invalid">
							Thêm mới
						</button>
						<a class="btn btn-default" href="{{url('childs/myChild')}}">Trở về</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
