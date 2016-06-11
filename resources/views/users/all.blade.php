@extends('app')

@section('title', 'Danh sách người dùng')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h1 class="page-header title-bar"><span class="glyphicon glyphicon-picture"></span> Danh sách người dùng
			</h1>
			<ol class="breadcrumb">
				<li><a href="{{url('/')}}">Trang chủ</a>
				</li>
				<li class="active">Danh sách người dùng</li>
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
			</div>
		</div>
		@endforeach
	</div>
	<div class="row">
		<div class="col-md-12 text-center">
			<ul class="pagination">
				<li><a href="{{SERVER_PATH}}users/all?page=1&order={{$paging['order']}}&sort={{$paging['sort']}}&where={{$paging['where']}}&compare={{$paging['compare']}}&value={{$paging['value']}}"><span class="glyphicon glyphicon-chevron-left"></span> Đầu</a></li>
				@if($paging['page'] != 1)
				<li><a href="{{SERVER_PATH}}users/all?page={{$paging['page'] - 1}}&order={{$paging['order']}}&sort={{$paging['sort']}}&where={{$paging['where']}}&compare={{$paging['compare']}}&value={{$paging['value']}}"><span class="glyphicon glyphicon-arrow-left"></span> Trước</a></li>
				@endif
				@if($paging['page'] > 1)
				<li><a href="{{SERVER_PATH}}users/all?page={{$paging['page'] - 1}}&order={{$paging['order']}}&sort={{$paging['sort']}}&where={{$paging['where']}}&compare={{$paging['compare']}}&value={{$paging['value']}}">{{$paging['page'] - 1}}</a></li>
				@endif
				<li class="active"><a href="#">{{$paging['page']}}</a></li>
				@if($paging['page'] < $paging['all'])
				<li><a href="{{SERVER_PATH}}users/all?page={{$paging['page'] + 1}}&order={{$paging['order']}}&sort={{$paging['sort']}}&where={{$paging['where']}}&compare={{$paging['compare']}}&value={{$paging['value']}}">{{$paging['page'] + 1}}</a></li>
				@endif
				@if($paging['page'] != $paging['all'])
				<li><a href="{{SERVER_PATH}}users/all?page={{$paging['page'] + 1}}&order={{$paging['order']}}&sort={{$paging['sort']}}&where={{$paging['where']}}&compare={{$paging['compare']}}&value={{$paging['value']}}">Sau <span class="glyphicon glyphicon-arrow-right"></span></a></li>
				@endif
				<li><a href="{{SERVER_PATH}}users/all?page={{$paging['all']}}&order={{$paging['order']}}&sort={{$paging['sort']}}&where={{$paging['where']}}&compare={{$paging['compare']}}&value={{$paging['value']}}">Cuối <span class="glyphicon glyphicon-chevron-right"></span></a></li>
			</ul>
			<p>Tổng số trang: {{$paging['all']}} - Đang hiển thị trang: {{$paging['page']}}</p>
		</div>
	</div>
</div>
@endsection
