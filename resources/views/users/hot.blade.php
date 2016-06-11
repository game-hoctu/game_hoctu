@extends('app')

@section('title', 'Top người dùng tích cực')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h1 class="page-header title-bar"><span class="glyphicon glyphicon-picture"></span> Top người dùng tích cực
			</h1>
			<ol class="breadcrumb">
				<li><a href="{{url('/')}}">Trang chủ</a>
				</li>
				<li class="active">Top người dùng tích cực</li>
			</ol>
			@include('message')
		</div>
	</div>
	<div class="row">
		@foreach($data as $item)
		<div class="col-md-4 img-portfolio album-item">
			<a href="{{url('/users/'.$item['id'].'/detail')}}">
				<img class="album-image img-responsive img-thumbnail img-hover" src="{{SERVER_PATH.'public/images/bg-user-'}}{{$item['id'] % 4}}.png" alt="{{$item['name']}}" width="100%">
			</a>
			<div class="album-info">
				<h3>
					<a href="{{url('/users/'.$item['id'].'/detail')}}"><span class="glyphicon glyphicon-user"></span> {{$item['name']}}</a>
				</h3>
				<p><span class="glyphicon glyphicon-tag"></span> Email: {{$item['email']}}</p>
				<p><span class="glyphicon glyphicon-tag"></span> Số album: <span class="label label-success">{{$item['albumlength']}}</span></p>
			</div>
		</div>
		@endforeach
	</div>
</div>
@endsection
