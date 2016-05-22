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
  @foreach($data as $cate)
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <ol class="breadcrumb">
        <li class="active">{{$cate['name']}}</li>
      </ol>
    </div>
    @foreach($cate['albums'] as $album)
    <div class="col-md-4 img-portfolio">
      <a href="portfolio-item.html">
        <img class="img-responsive img-hover" src="http://placehold.it/700x400" alt="">
      </a>
      <h3>
        <a href="#">{{$album['name']}}</a>
      </h3>
    </div>
    @endforeach

  </div>
  @endforeach
</div>
@endsection
