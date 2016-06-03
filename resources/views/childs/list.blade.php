@extends('app')

@section('title', 'Danh sách những đứa trẻ')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><span class="glyphicon glyphicon-leaf"></span> Những đứa trẻ
				<small>Danh sách</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="/">Trang chủ</a>
				</li>
				<li class="active">Những đứa trẻ</li>
			</ol>
			@include('message')
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 img-portfolio">
			<a href="{{url('childs/add')}}">
				<img class="img-responsive img-thumbnail img-hover" src="{{SERVER_PATH.'public/images/new-child.png'}}" alt="">
			</a>
		</div>
		@foreach($data as $item)
		<div class="col-md-4 img-portfolio album-item">
			<div class="album-item">

				<a href="{{url('/childs/'.$item['id'].'/detail')}}">
					<img class="album-image img-responsive img-hover img-thumbnail" src="{{$item['image']}}" alt="{{$item['name']}}">
				</a>

				<div class="album-info">
					<h2>
						<a href="{{url('/childs/'.$item['id'].'/detail')}}"><span class="glyphicon glyphicon-leaf"></span> {{$item['name']}}</a>
					</h2>
					<p>
						<span class="glyphicon glyphicon-calendar"></span> {{Carbon\Carbon::parse($item['date_of_birth'])->format('d/m/Y')}}
					</p>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>
@endsection
