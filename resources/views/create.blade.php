@extends('app')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Tạo Albums</div>
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

					<form enctype="multipart/form-data" class="form-horizontal" role="form" method="POST" action="{{ route('create_album-form') }}">
						<input type="hidden" name="_token" value="{!! csrf_token() !!}">

						<div class="form-group">
							<label class="col-md-4 control-label">Tên Albums</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="txttenalbum" required="">
								<label class="label label-danger">{!! $errors->first('txttenalbum') !!}</label>
								
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Mô tả</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="txtmota" required="">
								<label class="label label-danger">{!! $errors->first('txtmota') !!}
								</label>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Họ tên người tạo</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="txthoten" required="">
								<label class="label label-danger">{!! $errors->first('txthoten') !!}
								</label>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Thể loại</label>
							<div class="col-md-6">
								<select name=txttheloai>
									<option>Thể loại 1</option>
									<option>Thể loại 2</option>
									<option>Thể loại 3</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
								Tạo Albums
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
