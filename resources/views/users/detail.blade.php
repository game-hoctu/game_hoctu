@extends('app')
@section('title', 'Thông tin người dùng')
@section('content')
<div class="container" ng-init="childs = {{json_encode($data['child'])}}">
	<div class="row">
		<div class="col-sm-12">
			<h1 class="title-bar"><span class="glyphicon glyphicon-user"></span> Thông tin người dùng</h1>
		</div>
		<div class="col-md-6">
			<h3><span class="glyphicon glyphicon-list"></span> Thông tin</h3>
			<hr/>
			<div class="row">
				<div class="col-sm-3 text-center">
					<button class="circle circle-100">
						{{$data['user']['name']}}
					</button>
				</div>
				<div class="col-sm-9">
					<h4>{{$data['user']['name']}}</h4>
					<h4>{{$data['user']['email']}}</h4>
					<h4>{{$data['user']['address']}}</h4>
					@if(!Auth::guest() && Auth::user()->id == $data['user']['id'])
					<a href="{{url('users/'.$data['user']['id'].'/edit')}}" class="btn btn-success btn-sm"><span class="glyphicon glyphicon glyphicon-edit"></span> Cập nhật</a>
					@endif
				</div>
			</div>		
		</div>
		<div class="col-md-6">
			<h3><span class="glyphicon glyphicon-leaf"></span> Những đứa trẻ</h3>
			<hr/>
			<div class="list-group">
				<a ng-repeat="child in childs | filter:search" href="{{ url('/childs/<%child.id%>/detail') }}" class="list-group-item">
					<div class="row">
						<div class="col-sm-4">
							<img src="<%child.image%>" class="img-thumbnail img-responsive img-hover" width="100%">
						</div>
						<div class="col-sm-8">
							<h4><%child.name%></h4>
							<p><%child.date_of_birth | asDate | date:'dd/MM/yyyy' %></p>
							<p>
								<span ng-show="child.sex == 0">Nam</span>
								<span ng-show="child.sex == 1">Nữ</span>
							</p>
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-md-12">
			<h3><span class="glyphicon glyphicon-picture"></span> Những album của {{$data['user']['name']}}</h3>
			<hr/>
			<div class="row">
				@foreach($data['album'] as $item)
				<div class="col-md-4 img-portfolio album-item">
					<a href="{{url('/albums/'.$item['id'].'/detail')}}">
						<img class="album-image img-responsive img-hover img-thumbnail" src="{{$item['image']}}" alt="{{$item['name']}}">
					</a>
					<div class="album-info">
						<h2>
							<a href="{{url('/albums/'.$item['id'].'/detail')}}">{{$item['name']}}</a>
						</h2>
						<p>{{$item['description']}}</p>
						<p>Số lượng ảnh: {{$item['count']}}</p>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection