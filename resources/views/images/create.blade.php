@extends('app')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"><h2>Thêm Hình ảnh</h2></div>
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

					<form class="form-horizontal" role="form" method="POST" action="{{ route('createimage-form') }}">
						<input type="hidden" name="_token" value="{!! csrf_token() !!}">

						<div class="form-group">
							<label class="col-md-4 control-label">Link Images</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="txtusername" required="">
								<label class="label label-danger">{!! $errors->first('txtusername') !!}</label>
								
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Word</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="txtpassword">
								{!! $errors->first('txtpassword') !!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label"></label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="txtfullname">
								{!! $errors->first('txtfullname') !!}
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Register
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
