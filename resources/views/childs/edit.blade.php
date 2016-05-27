@extends('app')
@section('title','Sửa thông tin những đứa trẻ')
@section('content')
<div class="container" ng-app="game_hoctu">
	<div class="row">
		<div class="col-md-12">
			<h1>Sửa thông tin những đứa trẻ</h1>
			<hr/>
			@include('message')
			<form name="form_cateEdit" class="form-horizontal" role="form" method="POST" action="{{ route('childsPostEdit') }}">
				<input type="hidden" name="_token" value="{!! csrf_token() !!}">
				<div class="form-group">
					<label class="col-md-4 control-label">Mã số: </label>
					<div class="col-md-6">
						<input type="text" class="form-control" disabled="" value="{{ old('id', $getchildById['id'])}}">
						<input type="hidden" class="form-control" name="id" value="{{ old('id', $getchildById['id'])}}">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Tên đứa trẻ: </label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="name" value="{{ old('name', $getchildById['name'])}}" required="">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<button type="submit" class="btn btn-primary">
							Sửa
						</button>
						<a class="btn btn-default" href="{{url('childs/myChild')}}">Trở về</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
