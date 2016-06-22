@extends('app')

@section('title', 'Danh sách album')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h1 class="page-header title-bar"><span class="glyphicon glyphicon-picture"></span> Phòng Trưng Bày
			</h1>
			<ol class="breadcrumb">
				<li><a href="{{url('/')}}">Trang chủ</a>
				</li>
				<li class="active">Danh sách album của {{$user['name']}}</li>
			</ol>
			@include('message')
		</div>
	</div>
	<div class="row">
		@foreach($data as $item)
		<div class="col-md-4 img-portfolio album-item">
			<a href="{{url('/albums/'.$item['id'].'/detail')}}">
				<img class="album-image img-responsive img-thumbnail img-hover" src="{{$item['image']}}" alt="{{$item['name']}}">
			</a>
			<div class="album-info">
				<h2>
					<a href="{{url('/albums/'.$item['id'].'/detail')}}"><span class="glyphicon glyphicon-picture"></span> {{$item['name']}}</a>
				</h2>
				<p><span class="glyphicon glyphicon-list"></span> Mô tả: {{substr($item['description'], 0, 100)}}...</p>
				<p><span class="glyphicon glyphicon-list"></span> Số lượng ảnh: {{$item['count']}}</p>
			</div>
		</div>
		@endforeach
	</div>
</div>
@endsection
