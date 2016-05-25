@extends('admin')
@section('content')
<div class="container-fluid" ng-app="game_hoctu">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@if(isset($insertSuccess))
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Thông báo!</strong> Đã thêm thể loại mới thành công.
			</div>
			@endif
			<div class="panel panel-default">
				<div class="panel-heading">Thêm Thể Loại</div>
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

						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
