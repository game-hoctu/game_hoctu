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
				<h2>Khởi đầu học tiếng Anh cho bé</h2>
			</div>
		</div>
		<div class="item">
			<div class="fill" style="background-image:url('public/images/bg6.jpg');"></div>
			<div class="carousel-caption">
				<h2>Giúp bé làm quen với tiếng Anh</h2>
			</div>
		</div>
		<div class="item">
			<div class="fill" style="background-image:url('public/images/bg7.jpg');"></div>
			<div class="carousel-caption">
				<h2>Học tiếng anh bằng hình ảnh</h2>
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
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-12">
					<h3 class="title-bar">
						<div class="row">
							<div class="col-md-7">
								<span class="glyphicon glyphicon-picture"></span> Album mới
							</div>
							<div class="col-md-5 text-right">
								<a href="{{url('albums/all')}}" class="btn btn-sm btn-success">Xem tất cả <span class="glyphicon glyphicon-arrow-right"></span></a>
							</div>
						</div>
					</h3>
				</div>
			</div>
			<div class="row" ng-init="albums = {{json_encode($albums)}}">
				<div class="col-md-6 img-portfolio album-item" ng-repeat="album in albums">
					<a href="{{url('/albums/<%album.id%>/detail')}}">
						<img class="album-image img-responsive img-thumbnail img-hover" src="<%album.image%>" alt="<%album.name%>" width="100%">
					</a>
					<div class="album-info">
						<h3>
							<a href="{{url('/albums/<%album.id%>/detail')}}"><span class="glyphicon glyphicon-picture"></span> <%album.name%></a>
						</h3>
						<p><span class="glyphicon glyphicon-list"></span> Mô tả: <%album.description.substr(0, 100)%>...</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-12">
					<h3 class="title-bar">
						<div class="row">
							<div class="col-md-7">
								<span class="glyphicon glyphicon-picture"></span> Album nổi bật nhất
							</div>
							<div class="col-md-5 text-right">
								<a href="{{url('albums/all')}}?order=downloads" class="btn btn-sm btn-success">Xem tất cả <span class="glyphicon glyphicon-arrow-right"></span></a>
							</div>
						</div>
					</h3>
				</div>
			</div>
			<div class="row" ng-init="albums_hot = {{json_encode($albums_hot)}}">
				<div class="col-md-6 img-portfolio album-item" ng-repeat="album in albums_hot">
					<a href="{{url('/albums/<%album.id%>/detail')}}">
						<img class="album-image img-responsive img-thumbnail img-hover" src="<%album.image%>" alt="<%album.name%>" width="100%">
					</a>
					<div class="album-info">
						<h3>
							<a href="{{url('/albums/<%album.id%>/detail')}}"><span class="glyphicon glyphicon-picture"></span> <%album.name%></a>
						</h3>
						<p><span class="glyphicon glyphicon-list"></span> Mô tả: <%album.description.substr(0, 100)%>...</p>
						<p><span class="glyphicon glyphicon-list"></span> Lượt tải: <%album.downloads%></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-12">
					<h3 class="title-bar">
						<div class="row">
							<div class="col-md-7">
								<span class="glyphicon glyphicon-leaf"></span> Những đứa trẻ mới
							</div>
							<div class="col-md-5 text-right">
								<a href="{{url('childs/all')}}" class="btn btn-sm btn-success">Xem tất cả <span class="glyphicon glyphicon-arrow-right"></span></a>
							</div>
						</div>
					</h3>
				</div>
			</div>
			<div class="row" ng-init="childs = {{json_encode($childs)}}">
				<div class="col-md-6 img-portfolio album-item" ng-repeat="child in childs">
					<a href="{{url('/childs/<%child.id%>/detail')}}">
						<img class="album-image img-responsive img-thumbnail img-hover" src="<%child.image%>" alt="<%child.name%>" width="100%">
					</a>
					<div class="album-info">
						<h3>
							<a href="{{url('/childs/<%child.id%>/detail')}}"><span class="glyphicon glyphicon-picture"></span> <%child.name%></a>
						</h3>
						<p><span class="glyphicon glyphicon-calendar"></span> <%child.date_of_birth | asDate | date:'dd/MM/yyyy'%></p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-12">
					<h3 class="title-bar">
						<div class="row">
							<div class="col-md-7">
								<span class="glyphicon glyphicon-leaf"></span> Những đứa trẻ dẫn đầu
							</div>
							<div class="col-md-5 text-right">
								<a href="{{url('childs/hot')}}" class="btn btn-sm btn-success">Xem tất cả <span class="glyphicon glyphicon-arrow-right"></span></a>
							</div>
						</div>
					</h3>
				</div>
			</div>
			<div class="row" ng-init="childs_hot = {{json_encode($childs_hot)}}">
				<div class="col-md-6 img-portfolio album-item" ng-repeat="child in childs_hot">
					<a href="{{url('/childs/<%child.id%>/detail')}}">
						<img class="album-image img-responsive img-thumbnail img-hover" src="<%child.image%>" alt="<%child.name%>" width="100%">
					</a>
					<div class="album-info">
						<h3>
							<a href="{{url('/childs/<%child.id%>/detail')}}"><span class="glyphicon glyphicon-leaf"></span> <%child.name%></a>
						</h3>
						<p><span class="glyphicon glyphicon-calendar"></span> <%child.date_of_birth | asDate | date:'dd/MM/yyyy'%></p>
						<p><span class="glyphicon glyphicon-tag"></span> Số điểm: <span class="label label-success"><%child.score%></span></p>

					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-12">
					<h3 class="title-bar">
						<div class="row">
							<div class="col-md-7">
								<span class="glyphicon glyphicon-user"></span> Người dùng mới
							</div>
							<div class="col-md-5 text-right">
								<a href="{{url('users/all')}}" class="btn btn-sm btn-success">Xem tất cả <span class="glyphicon glyphicon-arrow-right"></span></a>
							</div>
						</div>
					</h3>
				</div>
			</div>
			<div class="row" ng-init="users = {{json_encode($users)}}">
				<div class="col-md-6 img-portfolio album-item" ng-repeat="user in users">
					<a href="{{url('/users/<%user.id%>/detail')}}">
						<img class="album-image img-responsive img-thumbnail img-hover" src="{{SERVER_PATH.'public/images/bg-user-'}}<%user.id % 4%>.png" alt="<%user.name%>" width="100%">
					</a>
					<div class="album-info">
						<h3>
							<a href="{{url('/users/<%user.id%>/detail')}}"><span class="glyphicon glyphicon-user"></span> <%user.name%></a>
						</h3>
						<p><span class="glyphicon glyphicon-tag"></span> Email: <%user.email%></p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-12">
					<h3 class="title-bar">
						<div class="row">
							<div class="col-md-7">
								<span class="glyphicon glyphicon-user"></span> Người dùng tích cực
							</div>
							<div class="col-md-5 text-right">
								<a href="{{url('users/hot')}}" class="btn btn-sm btn-success">Xem tất cả <span class="glyphicon glyphicon-arrow-right"></span></a>
							</div>
						</div>
					</h3>
				</div>
			</div>
			<div class="row" ng-init="users_hot = {{json_encode($users_hot)}}">
				<div class="col-md-6 img-portfolio album-item" ng-repeat="user in users_hot">
					<a href="{{url('/users/<%user.id%>/detail')}}">
						<img class="album-image img-responsive img-thumbnail img-hover" src="{{SERVER_PATH.'public/images/bg-user-'}}<%user.id % 4%>.png" alt="<%user.name%>" width="100%">
					</a>
					<div class="album-info">
						<h3>
							<a href="{{url('/users/<%user.id%>/detail')}}"><span class="glyphicon glyphicon-user"></span> <%user.name%></a>
						</h3>
						<p><span class="glyphicon glyphicon-tag"></span> Email: <%user.email%></p>
						<p><span class="glyphicon glyphicon-tag"></span> Số lượng album: <span class="label label-info"><%user.albumlength%></span></p>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
@endsection
