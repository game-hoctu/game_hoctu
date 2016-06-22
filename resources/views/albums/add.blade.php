@extends('app')
@section('title','Thêm album mới')
@section('content')
<div class="container" ng-controller="AlbumsController">
	<div class="row">
		<div class="col-md-12">
			@include('message')
			<h1 class="title-bar"><span class="glyphicon glyphicon-picture"></span> Thêm mới album</h1>
			<form enctype="multipart/form-data" name="form_AbAdd" method="POST" action="{{ route('albumsPostAdd') }}">
				<input type="hidden" name="_token" value="{!! csrf_token() !!}" >	
				<div class="row">
					<div class="col-sm-4">
						<div class="form-horizontal" role="form" >
							<div class="form-group">
								<label class="control-label col-sm-4">Tên album:</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="name"  ng-model="name" required="" minlength="6" placeholder="Nhập tên album...">
									<div ng-show="form_AbAdd.name.$touched" ng-messages="form_AbAdd.name.$error">
										<div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4">Mô tả:</label>
								<div class="col-sm-8">
									
									<input type="text" class="form-control" name="description" ng-model="description" required="" minlength="6" placeholder="Nhập mô tả album...">
									<div ng-show="form_AbAdd.description.$touched" ng-messages="form_AbAdd.description.$error">
										<div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4">Thể loại:</label>
								<div class="col-sm-8">
									<select name="categories_id" class="form-control">
										@foreach($cates as $cate )
										<option value="{{$cate['id']}}">{{$cate['name']}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
					</div>

					<div class="col-sm-8">
						<div class="row">
							<div class="col-sm-12">
								<button type="submit" class="btn btn-primary" ng-disabled="!form_AbAdd.$valid">
									<span class="glyphicon glyphicon-save"></span> Tạo album
								</button>
								<a class="btn btn-default" href="{{url('albums/myAlbum')}}"><span class="glyphicon glyphicon-arrow-left"></span> Trở về</a>
								<a class="btn btn-default addImage">
									<span class="glyphicon glyphicon-plus"></span> Upload thêm ảnh
								</a>
								<span>Dự kiến upload <span class="imageNum">0</span> hình ảnh.</span>
							</div>

							<div class="col-sm-12">
								<hr/>
								<div class="panel-image"></div>
							</div>
						</div>
					</div>
					
				</div>
			</form>
				<!-- @for($i=1; $i <= 2; $i++)
				<div class="form-group">
					<label class="col-md-4 control-label">Hình ảnh {{$i}}:</label>
					<div class="col-md-6">
						<input type="file" accept="image/*" class="form-control" name="fImage[]" ng-model="fImage{{$i}}">
						<div ng-show="form_AbAdd.fImage{{$i}}.$touched" ng-messages="form_AbAdd.fImage{{$i}}.$error">
							<div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Từ ngữ {{$i}}:</label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="words[]" ng-model="word{{$i}}" required="">
						<div ng-show="form_AbAdd.word{{$i}}.$touched" ng-messages="form_AbAdd.word{{$i}}.$error">
							<div ng-messages-include="{{ asset('/resources/views/error.html') }}"></div>
						</div>
					</div>
				</div>
				@endfor -->
				

			</div>
		</div>
	</div>
	@endsection
