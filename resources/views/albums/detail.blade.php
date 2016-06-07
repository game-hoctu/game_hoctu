@extends('app')
@section('title','Chi tiết album')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h1 class="page-header title-bar "><span class="glyphicon glyphicon-list-alt"></span> {{$data['name']}}
			</h1>
			@include('message')
			<ol class="breadcrumb">
				<li><a href="/">Trang chủ</a>
				</li>
				<li class="active">Chi tiết album</li>
			</ol>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<div id="listImage" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<?php $i = 0; $active="active";?>
					@foreach($data['images'] as $image)
					<li data-target="#{{$image['id']}}" data-slide-to="{{$i}}" class="{{$active}}"></li>
					<?php $i++; $active="";?>
					@endforeach
				</ol>

				<div class="carousel-inner">
					<?php $active="active";?>
					@foreach($data['images'] as $image)
					<?php $url = $image['url'];?>
					<div class="item {{$active}}">
						<img src="{{UPLOAD_FOLDER.$url}}" class="img-thumbnail img-responsive" alt="{{$image['word']}}">
						<div class="carousel-caption">
							<h2>{{strtoupper($image['word'])}}</h2>
						</div>
					</div>
					<?php $active="";?>
					@endforeach
				</div>

				<a class="left carousel-control" href="#listImage" data-slide="prev">
					<span class="icon-prev"></span>
				</a>
				<a class="right carousel-control" href="#listImage" data-slide="next">
					<span class="icon-next"></span>
				</a>
			</div>
		</div>
		<div class="col-md-6">
			<h2>{{$data['name']}}</h2>
			<h5><span class="glyphicon glyphicon-tag"></span> Mô tả: {{$data['description']}}</h5>
			<h5><span class="glyphicon glyphicon-tag"></span> Người tạo: {{$data['users']['name']}}</h5>
			<h5><span class="glyphicon glyphicon-tag"></span> Số lượng ảnh: {{count($data['images'])}}</h5>
			<h5><span class="glyphicon glyphicon-tag"></span> Thể loại: {{$data['categories']['name']}}</h5>
			@if(!Auth::guest() && Auth::user()->id == $data['users']['id'])
			<a href="{{url('images/'.$data['id'].'/addByAlbums')}}" class="btn btn-info btn-sm"><span class="glyphicon glyphicon glyphicon-picture"></span> Thêm ảnh</a>
			<a href="{{url('albums/'.$data['id'].'/edit')}}" class="btn btn-success btn-sm"><span class="glyphicon glyphicon glyphicon-edit"></span> Sửa</a>
			<a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="{{url('albums/'.$data['id'].'/delete')}}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon glyphicon-trash"></span> Xóa</a>
			@endif
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<h2 class="title-bar"><span class="glyphicon glyphicon-list"></span> Danh sách hình ảnh</h2>
			<div class="table-responsive">
				<table class="table table-hover table-bordered table-striped">
					<thead>
						<tr>
							<th>Mã số</th>
							<th>Hình ảnh</th>
							<th>Từ ngữ</th>
							<th>Hành động</th>
						</tr>
					</thead>
					<tbody>
						@foreach($data['images'] as $image)
						<?php $url = $image['url']; ?>
						<tr>
							<td>{{$image['id']}}</td>
							<td>
								<button data-toggle="collapse" data-target="#image{{$image['id']}}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon glyphicon-eye-open"></span> Xem hình ảnh</button>
								<div id="image{{$image['id']}}" class="collapse">
									<img src="{{UPLOAD_FOLDER}}{{$image['url']}}" class="img-thumbnail" width="150"/>
								</div>
							</td>
							<td>{{strtoupper($image['word'])}}</td>
							<td>
								@if(!Auth::guest() && Auth::user()->id == $data['users']['id'])
								<a href="{{url('/images/'.$image['id'].'/edit')}}" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon glyphicon-edit"></span> Sửa</a>
								<a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="{{url('/images/'.$image['id'].'/delete')}}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon glyphicon-trash"></span> Xóa</a>
								@endif
							</td>
						</tr>
						@endforeach	
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
