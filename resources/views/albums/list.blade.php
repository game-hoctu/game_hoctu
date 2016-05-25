@extends('app')

@section('title', 'Danh sách album')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Phòng Trưng Bày
				<small>Danh sách album!</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="index.html">Home</a>
				</li>
				<li class="active">Three Column Portfolio</li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 img-portfolio">
			<a href="{{url('albums/insert')}}">
				<img class="img-responsive img-hover" src="http://placehold.it/700x400" alt="">
			</a>
		</div>
		@foreach($data as $item)
		<div class="col-md-4 img-portfolio album-item">
			<a href="portfolio-item.html">
				<img class="album-image img-responsive img-hover" src="{{$item['image']}}" alt="{{$item['name']}}">
			</a>
			<div class="album-info">
				<h2>
					<a href="#">{{$item['name']}}</a>
				</h2>
				<p>{{$item['description']}}</p>
			</div>
		</div>
		@endforeach
	</div>
</div>
@endsection
