@extends('app')
@section('title','Thêm hình ảnh')
@section('content')
<div class="container" ng-app="game_hoctu">
	<div class="row">
		<div class="col-md-12">
			<h1><span class="glyphicon glyphicon-picture"></span> Thêm hình ảnh vào album</h1>
			<hr/>
			@include('message')
			<div class="row">
				<form enctype="multipart/form-data" name="form" class="form-horizontal" role="form" method="POST" action="{{ route('imagesPostAddByAlbums') }}" novalidate="">
					<input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
					<input type="hidden" name="albums_id" value="{{old('albums_id', $albums['id'])}}"/>
					<div class="col-md-4">
						<div class="form-horizontal" role="form" >
							<div class="form-group">
								<label class="control-label col-sm-4">Tên album:</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="name" value="{{$albums['name']}}" required="" minlength="6" placeholder="Nhập tên album..." disabled="">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4">Mô tả:</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="description" value="{{$albums['description']}}" required="" minlength="6" placeholder="Nhập mô tả album..." disabled="">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4">Thể loại:</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="description" value="{{$albums['cates']['name']}}" required="" minlength="6" placeholder="Nhập mô tả album..." disabled="">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-8">

						<div class="row">
							<div class="col-sm-12">
								<button type="submit" class="btn btn-primary">
									<span class="glyphicon glyphicon-edit"></span> Cập nhật
								</button>
								<a class="btn btn-info" href="{{url('albums/')}}"><span class="glyphicon glyphicon-arrow-left"></span> Trở về</a>
								<a class="btn btn-info addImage">
									<span class="glyphicon glyphicon-plus"></span> Upload thêm ảnh
								</a>
								<span>Dự kiến thêm <span class="numImg">0</span> hình ảnh</span>
							</div>

							<div class="col-sm-12">
								<hr/>
								<div class="panel-image"></div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
