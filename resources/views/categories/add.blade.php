@extends('app')
@section('content')
<div class="container-fluid" ng-app="game_hoctu">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@include('message')
			<div class="panel panel-default">
				<div class="panel-heading">Thêm Thể Loại</div>
				</hr>
				<div class="panel-body">
						<form name="form_Add" class="form-horizontal" role="form" method="POST" action="{{ route('cate_postadd') }}">
							<input type="hidden" name="_token" value="{!! csrf_token() !!}" novalidate>

							<div class="form-group">
								<label class="col-md-4 control-label">Tên thể loại: </label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="name" required="" ng-model="name">
									<div ng-show="formAdd.name.$touched" ng-messages="form_Add.name.$error">
										<div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<button type="submit" class="btn btn-primary">
										Thêm
									</button>
									<a class="btn btn-default" href="{{url('categories/all')}}">Trở về</a>
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
