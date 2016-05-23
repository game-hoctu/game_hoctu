@extends('admin')
@section('content')
<div class="container-fluid">
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
						<form class="form-horizontal" role="form" method="POST" action="{{ route('postedit2') }}">
							<input type="hidden" name="_token" value="{!! csrf_token() !!}">
							<div class="form-group">
								<label class="col-md-4 control-label">Mã thể loại</label>
								<div class="col-md-6">
									<input type="text" class="form-control" disabled="" value="{{ old('id', $getcateById['id'])}}">
									<input type="hidden" class="form-control" name="id" value="{{ old('id', $getcateById['id'])}}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Name</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="name" value="{{ old('name', $getcateById['name'])}}">
									<!--<label class="label label-danger">{!! $errors->first('txttenalbum') !!}</label>-->

								</div>
							</div>
							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<button type="submit" class="btn btn-primary">
										Sửa
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection
