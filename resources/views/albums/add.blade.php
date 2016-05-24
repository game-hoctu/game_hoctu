@extends('admin')
@secsion('title','Trang Quản lý Albums')
@section('content')
<div class="container-fluid" ng-app="game_hoctu">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@if(isset($insertSuccess))
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Thông báo!</strong> Đã thêm Albums mới thành công.
			</div>
			@endif
			<div class="panel panel-default">
				<div class="panel-heading">Thêm Albums</div>
				</hr>
				<div class="panel-body">
					<!-- @if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Thông báo!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
						@endif -->

						<form name="form_AbAdd" class="form-horizontal" role="form" method="POST" action="{{ route('albums_postadd') }}">
							<input type="hidden" name="_token" value="{!! csrf_token() !!}" novalidate>

							<div class="form-group">
								<label class="col-md-4 control-label">Tên Albums</label>
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
									<input type="text" class="form-control" name="mota" required="" ng-model="mota">
									<div ng-show="form_AbAdd.mota.$touched" ng-messages="form_AbAdd.mota.$error">
										<div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Người dùng</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="user" required="" ng-model="user">
									<div ng-show="form_AbAdd.user.$touched" ng-messages="form_AbAdd.user.$error">
										<div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Tên thể loại</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="theloai" required="" ng-model="theloai">
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
	</div>
</div>
@endsection
