@extends('admin')
@section('title', 'Thêm người dùng mới')
@section('content')
<div class="container-fluid" ng-app="game_hoctu">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@if(isset($insertSuccess))
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Thông báo!</strong> Đã thêm user thành công.
			</div>
			@endif
			
		</div>
	</div>
</div>
@endsection
