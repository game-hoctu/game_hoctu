@extends('app')
@section('title', 'Thông tin người dùng')
@section('content')
<div class="container" ng-init="childs = {{json_encode($data['child'])}}">
	<div class="row">
		<div class="col-sm-12">
			<h1 class="title-bar"><span class="glyphicon glyphicon-user"></span> Thông tin người dùng</h1>
		</div>
		<div class="col-md-6">
			<h3 class="title-bar"><span class="glyphicon glyphicon-list"></span> Thông tin</h3>
			<div class="row">
				<div class="col-sm-12 text-center">
					<button class="circle circle-300 circle-{{$data['user']['id'] % 4}}">
						{{$data['user']['name']}}
					</button>
				</div>
				<div class="col-sm-12 text-center">
					<h4>Họ tên: {{$data['user']['name']}}</h4>
					<h4>Giới tính: {{$data['user']['sex'] == 0 ? 'Nam' : 'Nữ'}}</h4>
					<h4>Email: {{$data['user']['email']}}</h4>
					<h4>Địa chỉ: {{$data['user']['address']}}</h4>
					@if(!Auth::guest() && Auth::user()->id == $data['user']['id'])
					<a href="{{url('users/'.$data['user']['id'].'/edit')}}" class="btn btn-success btn-sm"><span class="glyphicon glyphicon glyphicon-edit"></span> Cập nhật</a>
					<a href="{{url('users/'.$data['user']['id'].'/changePass')}}" class="btn btn-success btn-sm"><span class="glyphicon glyphicon glyphicon-edit"></span> Đổi mật khẩu</a>
					@endif
				</div>
			</div>		
		</div>
		<div class="col-md-6">
			<h3 class="title-bar"><span class="glyphicon glyphicon-leaf"></span> Những đứa trẻ</h3>
			<div class="list-group">
				<a ng-repeat="child in childs | filter:search" href="{{ url('/childs/<%child.id%>/detail') }}" class="list-group-item">
					<div class="row">
						<div class="col-sm-4">
							<img src="<%child.image%>" class="img-thumbnail img-responsive img-hover" width="100%">
						</div>
						<div class="col-sm-8">
							<h4><%child.name%></h4>
							<p>Ngày sinh: <%child.date_of_birth | asDate | date:'dd/MM/yyyy' %></p>
							<p>Giới tính:
								<span ng-show="child.sex == 0">Nam</span>
								<span ng-show="child.sex == 1">Nữ</span>
							</p>
						</div>
					</div>
				</a>
			</div>
			<a class="btn btn-info" href="{{url('childs/'.$data['user']['id'].'/getListByUser')}}">Xem tất cả những đứa trẻ <span class="glyphicon glyphicon-arrow-right"></span></a>
		</div>
		<div class="col-md-12">
			<h3 class="title-bar"><span class="glyphicon glyphicon-picture"></span> Những album của {{$data['user']['name']}}</h3>
			<div class="row">
				@foreach($data['album'] as $item)
				<div class="col-md-4 img-portfolio album-item">
					<a href="{{url('/albums/'.$item['id'].'/detail')}}">
						<img class="album-image img-responsive img-hover img-thumbnail" src="{{$item['image']}}" alt="{{$item['name']}}">
					</a>
					<div class="album-info">
						<h2>
							<a href="{{url('/albums/'.$item['id'].'/detail')}}"><span class="glyphicon glyphicon-picture"></span> {{$item['name']}}</a>
						</h2>
						<p><span class="glyphicon glyphicon-tag"></span> {{$item['description']}}</p>
						<p><span class="glyphicon glyphicon-tag"></span> Số lượng ảnh: {{$item['count']}}</p>
					</div>
				</div>
				@endforeach
			</div>
			<div class="row">
				<div class="col-sm-12">
					<a class="btn btn-info" href="{{url('albums/'.$data['user']['id'].'/getListByUser')}}">Xem tất cả album <span class="glyphicon glyphicon-arrow-right"></span></a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection