@extends('app')

@section('title', 'Danh sách những đứa trẻ')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><span class="glyphicon glyphicon-leaf"></span> Những đứa trẻ
				<small>Những đứa trẻ của tôi!</small>
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
				<img class="img-responsive img-hover" src="{{SERVER_PATH.'public/images/new-album.png'}}" alt="">
			</a>
		</div>
		@foreach($data as $item)
		<div class="col-md-4 img-portfolio album-item">
			<div class="album-item">

				<a href="{{url('/childs/'.$item['id'].'/detail')}}">
					<img class="album-image img-responsive img-hover" src="{{SERVER_PATH.'public/images/new-album.png'}}" alt="{{$item['name']}}">
				</a>

				<div class="album-info">
					<h2>
						<a href="{{url('/childs/'.$item['id'].'/detail')}}">{{$item['name']}}</a>
					</h2>
				</div>
			</div>
			<hr/>
			<div class="text-center">
				<a href="{{url('childs/'.$item['id'].'/edit')}}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon glyphicon-edit"></span> Sửa</a>
				<a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="{{url('childs/'.$item['id'].'/delete')}}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon glyphicon-trash"></span> Xóa</a>
			</div>
		</div>
		@endforeach
	</div>
</div>
@endsection
