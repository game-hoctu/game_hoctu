<!DOCTYPE html>
<html lang="en">
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

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" ng-controller="SearchController">
				<ul class="nav navbar-nav">
					<li>
						<div class="form-group search">
							<div class="input-group">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-search"></span>
								</span>
								<input type="text" class="form-control search-input" placeholder="Bạn muốn tìm kiếm điều gì?" ng-model="search">
							</div>
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
					<li><a href="{{ url('/albums/myAlbum') }}"><span class="glyphicon glyphicon-picture"></span> Album của tôi</a></li>
					<li><a href="{{ url('/childs/myChild') }}"><span class="glyphicon glyphicon-leaf"></span> Những đứa trẻ của tôi</a></li>
					@endif
					@if (Auth::guest())
					<li><a href="{{ url('/auth/login') }}"><span class="glyphicon glyphicon-log-in"></span> Đăng nhập</a></li>
					<li><a href="{{ url('/auth/register') }}"><span class="glyphicon glyphicon-user"></span> Đăng ký</a></li>
					@else
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->name }} <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ url('/users/myProfile') }}"><span class="glyphicon glyphicon-eye-open"></span> Thông tin cá nhân</a></li>
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

	<div class="container">
		<hr>
		<!-- Footer -->
		<footer>
			<div class="row">
				<div class="col-lg-12">
					<p>Copyright &copy; Your Website 2016</p>
				</div>
			</div>
		</footer>

		<!-- /.container -->
	</div>
	<!-- jQuery -->
	<script src="{{ asset('/public/js/angular.min.js') }}"></script>
	<script src="{{ asset('/public/js/angular-messages.min.js') }}"></script>
	<script src="{{ asset('/public/js/app.js') }}"></script>
	<script src="{{ asset('/public/js/config.js') }}"></script>

	<script src="{{ asset('/public/js/jquery.js') }}"></script>

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
