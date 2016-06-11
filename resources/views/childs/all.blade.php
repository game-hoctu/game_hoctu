@extends('app')

@section('title', 'Danh sách những đứa trẻ')
@section('content')
<div class="container" ng-controller="ChildsController">
	<div class="row">
		<div class="col-sm-12">
			<h1 class="page-header title-bar"><span class="glyphicon glyphicon-picture"></span> Danh sách những đứa trẻ
			</h1>
			<ol class="breadcrumb">
				<li><a href="{{url('/')}}">Trang chủ</a>
				</li>
				<li class="active">Danh sách những đứa trẻ</li>
			</ol>
			@include('message')
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<form class="form-inline" role="form">
				<div class="form-group">
					<label>Theo người dùng:</label>
					<select class="form-control" ng-init="loadUsers()" ng-model="users_id">
						<option ng-repeat="user in users" value="<%user.id%>"><%user.id%> - <%user.name%></option>
					</select>
					<a href="{{url('childs/all')}}?page={{$paging['page']}}&where=users_id&compare==&value=<%users_id%>" class="btn btn-default">Xem</a>
				</div>
			</form>
			<hr/>
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
					<p><span class="glyphicon glyphicon-tag"></span> Tổng điểm: <span class="label label-success">{{$item['score']}}</span></p>
				</div>
			</div>
		</div>
		@endforeach
	</div>
	<div class="row">
		<div class="col-md-12 text-center">
			<ul class="pagination">
				<li><a href="{{SERVER_PATH}}childs/all?page=1&order={{$paging['order']}}&sort={{$paging['sort']}}&where={{$paging['where']}}&compare={{$paging['compare']}}&value={{$paging['value']}}"><span class="glyphicon glyphicon-chevron-left"></span> Đầu</a></li>
				@if($paging['page'] != 1)
				<li><a href="{{SERVER_PATH}}childs/all?page={{$paging['page'] - 1}}&order={{$paging['order']}}&sort={{$paging['sort']}}&where={{$paging['where']}}&compare={{$paging['compare']}}&value={{$paging['value']}}"><span class="glyphicon glyphicon-arrow-left"></span> Trước</a></li>
				@endif
				@if($paging['page'] > 1)
				<li><a href="{{SERVER_PATH}}childs/all?page={{$paging['page'] - 1}}&order={{$paging['order']}}&sort={{$paging['sort']}}&where={{$paging['where']}}&compare={{$paging['compare']}}&value={{$paging['value']}}">{{$paging['page'] - 1}}</a></li>
				@endif
				<li class="active"><a href="#">{{$paging['page']}}</a></li>
				@if($paging['page'] < $paging['all'])
				<li><a href="{{SERVER_PATH}}childs/all?page={{$paging['page'] + 1}}&order={{$paging['order']}}&sort={{$paging['sort']}}&where={{$paging['where']}}&compare={{$paging['compare']}}&value={{$paging['value']}}">{{$paging['page'] + 1}}</a></li>
				@endif
				@if($paging['page'] != $paging['all'])
				<li><a href="{{SERVER_PATH}}childs/all?page={{$paging['page'] + 1}}&order={{$paging['order']}}&sort={{$paging['sort']}}&where={{$paging['where']}}&compare={{$paging['compare']}}&value={{$paging['value']}}">Sau <span class="glyphicon glyphicon-arrow-right"></span></a></li>
				@endif
				<li><a href="{{SERVER_PATH}}childs/all?page={{$paging['all']}}&order={{$paging['order']}}&sort={{$paging['sort']}}&where={{$paging['where']}}&compare={{$paging['compare']}}&value={{$paging['value']}}">Cuối <span class="glyphicon glyphicon-chevron-right"></span></a></li>
			</ul>
			<p>Tổng số trang: {{$paging['all']}} - Đang hiển thị trang: {{$paging['page']}}</p>
		</div>
	</div>
</div>
@endsection
