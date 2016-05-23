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
	<link href="{{ asset('/public/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'/>
	<script src="{{ asset('/public/js/angular.min.js') }}"></script>
	<script src="{{ asset('/public/js/angular-messages.min.js') }}"></script>
	<script src="{{ asset('/public/js/app.js') }}"></script>

</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Website Game Học Từ</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/') }}">Trang chủ</a></li>
					@if (!Auth::guest())
					<li><a href="{{ url('/albums/myAlbum') }}">Album của tôi</a></li>
					@endif
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
					<li><a href="{{ url('/auth/login') }}">Đăng nhập</a></li>
					<li><a href="{{ url('/auth/register') }}">Đăng ký</a></li>
					@else
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ url('/users/edit') }}">Thông tin cá nhân</a></li>
							@if(Auth::user()->role>=3)
							<li><a href="{{ url('/admin/index') }}">Trang quản trị</a></li>
							@endif
							<li><a href="{{ url('/auth/logout') }}">Đăng xuất</a></li>
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
					<p>Copyright &copy; Your Website 2014</p>
				</div>
			</div>
		</footer>

		<!-- /.container -->
	</div>
	<!-- jQuery -->
	<script src="{{ asset('/public/js/jquery.js') }}"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="{{ asset('/public/js/bootstrap.min.js') }}"></script>
	
	<!-- Script to Activate the Carousel -->
	<script>
		$('.carousel').carousel({
        interval: 5000 //changes the speed
    })
</script>
</body>
</html>
