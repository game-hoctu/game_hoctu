@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Phòng Trưng Bày
				<small>Albums của tôi!</small>
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
			<a href="portfolio-item.html">
				<img class="img-responsive img-hover" src="http://placehold.it/700x400" alt="">
			</a>
		</div>
		@foreach($data as $item)
		<div class="col-md-4 img-portfolio">
			<a href="portfolio-item.html">
				<img class="img-responsive img-hover" src="http://placehold.it/700x400" alt="">
			</a>
			<h3>
				<a href="#">{{$item['name']}}</a>
			</h3>
			<p>{{$item['description']}}</p>
		</div>
		<div class="col-md-4 img-portfolio">
			<a href="portfolio-item.html">
				<img class="img-responsive img-hover" src="http://placehold.it/700x400" alt="">
			</a>
			<h3>
				<a href="#">{{$item['name']}}</a>
			</h3>
			<p>{{$item['description']}}</p>
		</div>
		<div class="col-md-4 img-portfolio">
			<a href="portfolio-item.html">
				<img class="img-responsive img-hover" src="http://placehold.it/700x400" alt="">
			</a>
			<h3>
				<a href="#">{{$item['name']}}</a>
			</h3>
			<p>{{$item['description']}}</p>
		</div>
		@endforeach
	</div>
</div>
@endsection
