@extends('admin')
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
				<form name="form_AbAdd" class="form-horizontal" role="form" method="POST" action="{{ route('albums_postadd') }}">
					<input type="hidden" name="_token" value="{!! csrf_token() !!}" novalidate>

					<div class="form-group">
						<label class="col-md-4 control-label">Tên album</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="name" required="" ng-model="name">
							<div ng-show="form_AbAdd.name.$touched" ng-messages="form_AbAdd.name.$error">
								<div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Mô tả</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="description" required="" ng-model="description">
							<div ng-show="form_AbAdd.description.$touched" ng-messages="form_AbAdd.description.$error">
								<div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Người dùng</label>
						<div class="col-md-6">
							<select name="users_id" class="form-control">
								@foreach($users as $user )
								<option value="{{$user['id']}}">{{$user['name']}}</option>
								@endforeach
							</select>
							<div ng-show="form_AbAdd.user.$touched" ng-messages="form_AbAdd.user.$error">
								<div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Thể loại</label>
						<div class="col-md-6">
							<select name="categories_id" class="form-control">
								@foreach($cates as $cate )
								<option value="{{$cate['id']}}">{{$cate['name']}}</option>
								@endforeach
							</select>
							<div ng-show="form_AbAdd.theloai.$touched" ng-messages="form_AbAdd.theloai.$error">
								<div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6 col-md-offset-4">
							<button type="submit" class="btn btn-primary">
								Thêm
							</button>
							<a class="btn btn-default" href="{{url('admin/Albums/')}}">Trở về</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
