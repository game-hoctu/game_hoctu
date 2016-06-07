@extends('app')

@section('title', 'Trang chủ')
@section('content')
<header id="myCarousel" class="carousel slide">
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
	</ol>

	<div class="carousel-inner">
		<div class="item active">
			<div class="fill" style="background-image:url('public/images/bg2.jpg');"></div>
			<div class="carousel-caption">
				<h2>Nơi tình yêu bắt đầu</h2>
			</div>
		</div>
		<div class="item">
			<div class="fill" style="background-image:url('public/images/bg6.jpg');"></div>
			<div class="carousel-caption">
				<h2>Tôi thấy hoa vàng trên cỏ xanh</h2>
			</div>
		</div>
		<div class="item">
			<div class="fill" style="background-image:url('public/images/bg7.jpg');"></div>
			<div class="carousel-caption">
				<h2>Anh còn nợ em</h2>
			</div>
		</div>
	</div>

	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
		<span class="icon-prev"></span>
	</a>
	<a class="right carousel-control" href="#myCarousel" data-slide="next">
		<span class="icon-next"></span>
	</a>
</header>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			@include('message')
			<h2 class="title-bar"><span class="glyphicon glyphicon-home"></span> Trang chủ</h2>
		</div>
	</div>
</div>
@endsection
