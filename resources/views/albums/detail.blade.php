@extends('app')
@section('title','Chi tiết album')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">{{$data['name']}}
				<small>Chi tiết album</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="/">Trang chủ</a>
				</li>
				<li class="active">Chi tiết album</li>
			</ol>
		</div>
	</div>

	<div class="row">
		<div class="col-md-7">
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
						<img src="{{UPLOAD_FOLDER.$url}}" class="img-responsive" alt="{{$image['word']}}" width="768" height="1024">
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
		<div class="col-md-5">
			<h2>{{$data['name']}}</h2>
			<p>Mô tả: {{$data['description']}}</p>
			<p>Người tạo: {{$data['users']['name']}}</p>
			<p>Số lượng ảnh: {{count($data['images'])}}</p>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<h2 class="page-header">Our Team</h2>
		</div>
		<div class="col-md-4 text-center">
			<div class="thumbnail">
				<img class="img-responsive" src="http://placehold.it/750x450" alt="">
				<div class="caption">
					<h3>John Smith<br>
						<small>Job Title</small>
					</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste saepe et quisquam nesciunt maxime.</p>
					<ul class="list-inline">
						<li><a href="#"><i class="fa fa-2x fa-facebook-square"></i></a>
						</li>
						<li><a href="#"><i class="fa fa-2x fa-linkedin-square"></i></a>
						</li>
						<li><a href="#"><i class="fa fa-2x fa-twitter-square"></i></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-4 text-center">
			<div class="thumbnail">
				<img class="img-responsive" src="http://placehold.it/750x450" alt="">
				<div class="caption">
					<h3>John Smith<br>
						<small>Job Title</small>
					</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste saepe et quisquam nesciunt maxime.</p>
					<ul class="list-inline">
						<li><a href="#"><i class="fa fa-2x fa-facebook-square"></i></a>
						</li>
						<li><a href="#"><i class="fa fa-2x fa-linkedin-square"></i></a>
						</li>
						<li><a href="#"><i class="fa fa-2x fa-twitter-square"></i></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-4 text-center">
			<div class="thumbnail">
				<img class="img-responsive" src="http://placehold.it/750x450" alt="">
				<div class="caption">
					<h3>John Smith<br>
						<small>Job Title</small>
					</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste saepe et quisquam nesciunt maxime.</p>
					<ul class="list-inline">
						<li><a href="#"><i class="fa fa-2x fa-facebook-square"></i></a>
						</li>
						<li><a href="#"><i class="fa fa-2x fa-linkedin-square"></i></a>
						</li>
						<li><a href="#"><i class="fa fa-2x fa-twitter-square"></i></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-4 text-center">
			<div class="thumbnail">
				<img class="img-responsive" src="http://placehold.it/750x450" alt="">
				<div class="caption">
					<h3>John Smith<br>
						<small>Job Title</small>
					</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste saepe et quisquam nesciunt maxime.</p>
					<ul class="list-inline">
						<li><a href="#"><i class="fa fa-2x fa-facebook-square"></i></a>
						</li>
						<li><a href="#"><i class="fa fa-2x fa-linkedin-square"></i></a>
						</li>
						<li><a href="#"><i class="fa fa-2x fa-twitter-square"></i></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-4 text-center">
			<div class="thumbnail">
				<img class="img-responsive" src="http://placehold.it/750x450" alt="">
				<div class="caption">
					<h3>John Smith<br>
						<small>Job Title</small>
					</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste saepe et quisquam nesciunt maxime.</p>
					<ul class="list-inline">
						<li><a href="#"><i class="fa fa-2x fa-facebook-square"></i></a>
						</li>
						<li><a href="#"><i class="fa fa-2x fa-linkedin-square"></i></a>
						</li>
						<li><a href="#"><i class="fa fa-2x fa-twitter-square"></i></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-4 text-center">
			<div class="thumbnail">
				<img class="img-responsive" src="http://placehold.it/750x450" alt="">
				<div class="caption">
					<h3>John Smith<br>
						<small>Job Title</small>
					</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste saepe et quisquam nesciunt maxime.</p>
					<ul class="list-inline">
						<li><a href="#"><i class="fa fa-2x fa-facebook-square"></i></a>
						</li>
						<li><a href="#"><i class="fa fa-2x fa-linkedin-square"></i></a>
						</li>
						<li><a href="#"><i class="fa fa-2x fa-twitter-square"></i></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
