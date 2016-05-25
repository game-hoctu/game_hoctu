@extends('admin')
@section('title','Thêm hình ảnh mới')
@section('content')
<div class="container-fluid" ng-app="game_hoctu">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@include('message')
			<div class="panel panel-default">
				<div class="panel-heading">Sửa hình ảnh</div>
			</hr>
			<div class="panel-body">
				<form name="form_imgEdit" class="form-horizontal" role="form" method="POST" action="{{ route('images_postedit') }}">
					<input type="hidden" name="_token" value="{!! csrf_token() !!}" novalidate>
					<div class="form-group">
							<label class="col-md-4 control-label">Mã số</label>
							<div class="col-md-6">
								<input type="text" class="form-control" disabled="" value="{{ old('id', $getimageById['id'])}}">
								<input type="hidden" class="form-control" name="id_image" value="{{ old('id', $getimageById['id'])}}">
							</div>
						</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Hình ảnh</label>
						<div class="col-md-6">
							<input type="file" class="form-control" name="fImage" required="" ng-model="fImage" value="{{ old('url', $getimageById[url])}}">
							<div ng-show="form_imgEdit.fImage.$touched" ng-messages="form_imgEdit.fImage.$error">
								<div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Từ ngữ</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="word" required="" ng-model="word" value="{{ word('word', $getimageById['word'])}}">
							<div ng-show="form_imgEdit.word.$touched" ng-messages="form_imgEdit.word.$error">
								<div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Album</label>
						<div class="col-md-6">
							<select name="albums_id" class="form-control" value="{{ albums_id('albums_id', $getimageById['albums_id'])}} >
								@foreach($albums as $album )
								<option value="{{$album['id']}}">{{$album['name']}}</option>
								@endforeach
							</select>
							<div ng-show="form_imgEdit.albums_id.$touched" ng-messages="form_imgEdit.albums_id.$error">
								<div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6 col-md-offset-4">
							<button type="submit" class="btn btn-primary">
								Thêm
							</button>
							<a class="btn btn-default" href="{{url('admin/images/')}}">Trở về</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
