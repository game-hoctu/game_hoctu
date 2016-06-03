@extends('app')

@section('title', 'Danh sách album')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><span class="glyphicon glyphicon-picture"></span> Phòng Trưng Bày
				<small>Danh sách album!</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="/">Trang chủ</a>
				</li>
				<li class="active">Album của tôi</li>
			</ol>
			@include('message')
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 img-portfolio">
			<a href="{{url('albums/add')}}">
				<img class="img-responsive img-thumbnail img-hover" src="{{SERVER_PATH.'public/images/new-album.png'}}" alt="">
			</a>
		</div>
		@foreach($data as $item)
		<div class="col-md-4 img-portfolio album-item">
			<a href="{{url('/albums/'.$item['id'].'/detail')}}">
				<img class="album-image img-responsive img-thumbnail img-hover" src="{{$item['image']}}" alt="{{$item['name']}}">
			</a>
			<div class="album-info">
				<h2>
					<a href="{{url('/albums/'.$item['id'].'/detail')}}"><span class="glyphicon glyphicon-picture"></span> {{$item['name']}}</a>
				</h2>
				<p><span class="glyphicon glyphicon-list"></span> {{$item['description']}}</p>
				<p><span class="glyphicon glyphicon-list"></span> Số lượng ảnh: {{$item['count']}}</p>
			</div>
		</div>
		@endforeach
	</div>
</div>
@endsection
