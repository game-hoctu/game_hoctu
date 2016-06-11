<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<title>@yield('title') - Game Học Từ</title>
	<link href="{{ asset('/public/css/bootstrap.min.css') }}" rel="stylesheet"/>
	<!-- Custom CSS -->
	<link href="{{ asset('/public/css/modern-business.css') }}" rel="stylesheet"/>
	<link href="{{ asset('/public/css/site.css') }}" rel="stylesheet">

	<link href="{{ asset('/public/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'/>
</head>
<body ng-app="game_hoctu">
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="{{ url('/') }}">
					<img src="{{IMAGE_FOLDER}}kidleen-small.png" class="img-responsive img-hover" alt="Trang chủ" />
				</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" ng-controller="SearchController" ng-init="load()">
				<ul class="nav navbar-nav">
					<li>
						<div class="form-group search">
							<form method="GET" action="{{route('search')}}">

								<div class="input-group">
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-search"></span>
									</span>
									<input type="text" class="form-control search-input" placeholder="Nhập dữ liệu cần tìm..." name="key" ng-model="search" required="">
									<span class="input-group-btn">
										<button type="submit" class="btn btn-primary">Tìm kiếm</button>
									</span>
								</div>
							</form>
						</div>
						<ul class="dropdown-menu search-result" role="menu" ng-hide="search == undefined || search == ''">
							<li class="search-result-header">Kết quả cho các album:</li>
							<li ng-repeat="album in albums | filter:search"><a href="{{ url('/albums/<%album.id%>/detail') }}"><span class="glyphicon glyphicon-picture"></span> <%album.name%></a></li>
							<li class="search-result-header">Kết quả cho những đứa trẻ:</li>
							<li ng-repeat="child in childs | filter:search"><a href="{{ url('/childs/<%child.id%>/detail') }}"><span class="glyphicon glyphicon-leaf"></span> <%child.name%></a></li>
							<li class="search-result-header">Kết quả cho những người dùng:</li>
							<li ng-repeat="user in users | filter:search"><a href="{{ url('/users/<%user.id%>/detail') }}"><span class="glyphicon glyphicon-user"></span> <%user.name%></a></li>
						</ul>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					@if (!Auth::guest())
					@endif
					@if (Auth::guest())
					<li><a href="{{ url('/auth/login') }}"><span class="glyphicon glyphicon-log-in"></span> Đăng nhập</a></li>
					<li><a href="{{ url('/auth/register') }}"><span class="glyphicon glyphicon-user"></span> Đăng ký</a></li>
					@else
					<li><a href="{{ url('/users/all') }}"><span class="glyphicon glyphicon-user"></span> Những người dùng</a></li>
					<li><a href="{{ url('/albums/all') }}"><span class="glyphicon glyphicon-picture"></span> Album ảnh</a></li>
					<li><a href="{{ url('/childs/all') }}"><span class="glyphicon glyphicon-leaf"></span> Những đứa trẻ</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->name }} <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ url('/users/myProfile') }}"><span class="glyphicon glyphicon-eye-open"></span> Thông tin cá nhân</a></li>
							<li class="divider"></li>
							<li><a href="{{ url('/albums/myAlbum') }}"><span class="glyphicon glyphicon-picture"></span> Album của tôi</a></li>
							<li class="divider"></li>
							<li><a href="{{ url('/childs/myChild') }}"><span class="glyphicon glyphicon-leaf"></span> Những đứa trẻ của tôi</a></li>
							<li class="divider"></li>
							@if(Auth::user()->role>=3)
							<li><a href="{{ url('/admin/index') }}"><span class="glyphicon glyphicon-list-alt"></span> Trang quản trị</a></li>
							<li class="divider"></li>
							@endif
							<li><a href="{{ url('/auth/logout') }}"><span class="glyphicon glyphicon-log-out"></span> Đăng xuất</a></li>
						</ul>
					</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	@yield('content')

	<div class="container-fluid footer">
		<!-- Footer -->
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="row">
					<div class="col-md-7">
						<p>- Copyright &copy; KidLeen 2016</p>
						<p>- KidLeen - Website ứng dụng game học tiếng Anh bằng hình ảnh cho trẻ em 3 - 5 tuổi.</p>
						<p>- Đề tài thực tập tôt nghiệp sinh viên Đại học Nha Trang - Khoa Công Nghệ Thông Tin.</p>
						<p>- Giáo viên hướng dẫn: Phạm Thị Kim Ngoan.</p>
						<p>- Phát triển bởi Nguyễn Châu Phong, Nguyễn Thị Minh Thủy.</p>
					</div>
					<div class="col-md-5">
						<p>- Khuyến nghị sử dụng trên trình duyệt Chrome, Firefox, Cốc Cốc...</p>
						<p>- Độ phân giải: 1024x768 - Yêu cầu trình duyệt bật JavaScript.</p>
						<p>- Email liên hệ: namduong.kh94@gmail.com | minhthuy.nguyen256@gmail.com</p>
						<?php $load = Share::load(url('/'), 'Website học tiếng Anh bằng hình ảnh KidLeen')->services();?>
						<h5>
							<a target="_blank" href="{{$load['facebook']}}"><img width="30px" src="{{SERVER_PATH}}public/images/fb-icon.png" alt="Share Facebook"></a>
							<a target="_blank" href="{{$load['twitter']}}"><img width="30px" src="{{SERVER_PATH}}public/images/tt-icon.png" alt="Share Twitter"></a>
							<a target="_blank" href="{{$load['gplus']}}"><img width="30px" src="{{SERVER_PATH}}public/images/gg-icon.png" alt="Share Google Plus"></a>
							<button class="btn btn-sm btn-success top"><span class="glyphicon glyphicon-arrow-up"></span> Về đầu trang</button>
						</h5>
					</div>
				</div>
			</div>
		</div>

		<!-- /.container -->
	</div>
	<!-- jQuery -->
	<script src="{{ asset('/public/js/angular.min.js') }}"></script>
	<script src="{{ asset('/public/js/angular-messages.min.js') }}"></script>
	<script src="{{ asset('/public/js/app.js') }}"></script>
	<script src="{{ asset('/public/js/config.js') }}"></script>

	<script src="{{ asset('/public/js/jquery-1.12.3.min.js') }}"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="{{ asset('/public/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/public/js/myscript.js') }}"></script>
	<script src="{{ asset('/public/js/jquery.dataTables.min.js') }}"></script>

	<!-- Script to Activate the Carousel -->
	<script>
		$('.carousel').carousel({
			interval: 5000
		});
	</script>
</body>
</html>
