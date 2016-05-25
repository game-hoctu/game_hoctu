@extends('admin')
@section('title','Sửa hình ảnh')
@section('content')
<div class="container-fluid" ng-app="game_hoctu">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@include('message')
			<div class="panel panel-default">
				<div class="panel-heading">Sửa hình ảnh</div>
				<div class="panel-body">
					<form name="form_cateEdit" class="form-horizontal" role="form" method="POST" action="{{ route('images_postEdit') }}">
						<input type="hidden" name="_token" value="{!! csrf_token() !!}">
						<div class="form-group">
							<label class="col-md-4 control-label">Mã số</label>
							<div class="col-md-6">
								<input type="text" class="form-control" disabled="" value="{{ old('id', $getimageById['id'])}}">
								<input type="hidden" class="form-control" name="id" value="{{ old('id', $getimageById['id'])}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Hình ảnh</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="url" value="{{ old('url', $getimageById['url'])}}" required="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Từ ngữ</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="word" value="{{ old('word', $getimageById['word'])}}" required="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Album</label>
							<div class="col-md-6">
								<select name="albums_id" class="form-control">
									@foreach($albums as $album )
									<option value="{{$album['id']}}">{{$album['name']}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Sửa
								</button>
								<a class="btn btn-default" href="{{url('admin/images')}}">Trở về</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
