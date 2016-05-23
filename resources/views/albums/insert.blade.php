@extends('app')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@if(isset($insertSuccess))
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Thông báo!</strong> Đã tạo album mới.
			</div>
			@endif
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

						<form class="form-horizontal" role="form" method="POST" action="{{ route('postInsert') }}">
							<input type="hidden" name="_token" value="{!! csrf_token() !!}">

							<div class="form-group">
								<label class="col-md-4 control-label">Tên Albums</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="name" required="">
									<!--<label class="label label-danger">{!! $errors->first('txttenalbum') !!}</label>-->

								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Mô tả</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="description" required="">
								<!-- <label class="label label-danger">{!! $errors->first('txtmota') !!}
							</label>-->
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Thể loại</label>
						<div class="col-md-6">
							<select class="form-control" name="categories">
								<?php cate_parent($album); ?>
							</select>

						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6 col-md-offset-4">
							<button type="submit" class="btn btn-primary">
								Tạo Album
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
