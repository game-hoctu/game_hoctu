@extends('app')

@section('title', 'Danh sách những đứa trẻ')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h1 class="page-header title-bar"><span class="glyphicon glyphicon-leaf"></span> Những đứa trẻ
			</h1>
			<ol class="breadcrumb">
				<li><a href="/">Trang chủ</a>
				</li>
				<li class="active">Những đứa trẻ của {{$user['name']}}</li>
			</ol>
			@include('message')
		</div>
	</div>
	<div class="row">
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
