@extends('admin')
@section('title','Thêm hình ảnh mới')
@section('content')
<div class="container-fluid" ng-app="game_hoctu">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@include('message')
			<div class="panel panel-default">
				<div class="panel-heading">Thêm hình ảnh</div>
			</hr>
			<div class="panel-body">
				<form name="form_imgAdd" class="form-horizontal" role="form" method="POST" action="{{ route('images_postadd') }}">
					<input type="hidden" name="_token" value="{!! csrf_token() !!}" novalidate>

					<div class="form-group">
						<label class="col-md-4 control-label">Hình ảnh</label>
						<div class="col-md-6">
							<input type="file" class="form-control" name="fImage" required="" ng-model="fImage">
							<div ng-show="form_imgAdd.fImage.$touched" ng-messages="form_imgAdd.fImage.$error">
								<div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Từ ngữ</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="word" required="" ng-model="word">
							<div ng-show="form_imgAdd.word.$touched" ng-messages="form_imgAdd.word.$error">
								<div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
							</div>
						</div>
					</div>form_imgAdd
					<div class="form-group">
						<label class="col-md-4 control-label">Album</label>
						<div class="col-md-6">
							<select name="albums_id" class="form-control">
								@foreach($albums as $album )
								<option value="{{$album['id']}}">{{$album['name']}}</option>
								@endforeach
							</select>
							<div ng-show="form_imgAdd.user.$touched" ng-messages="form_imgAdd.user.$error">
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
