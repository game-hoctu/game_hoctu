@extends('admin')
@section('title', 'Sửa thể loại')
@section('content')
<div class="container-fluid" ng-app="game_hoctu" ng-init="data = {{json_encode($getcateById)}}">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<h1>Sửa thể loại</h1>
			<hr/>
			@include('message')
			<form name="form_cateEdit" class="form-horizontal" role="form" method="POST" action="{{ route('cateAdPostEdit') }}" novalidate="">
				<input type="hidden" name="_token" value="{!! csrf_token() !!}">
				<div class="form-group">
					<label class="col-md-4 control-label">Mã số: </label>
					<div class="col-md-6">
						<input type="text" class="form-control" disabled="" value="{{ old('id', $getcateById['id'])}}">
						<input type="hidden" class="form-control" name="id" value="{{ old('id', $getcateById['id'])}}">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Tên thể loại: </label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="name" ng-model="data.name" minlength="3" required="">
						<div ng-show="form_cateEdit.name.$touched" ng-messages="form_cateEdit.name.$error">
							<div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<button type="submit" class="btn btn-primary">
							Sửa
						</button>
						<a class="btn btn-default" href="{{url('admin/categories/')}}">Trở về</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
