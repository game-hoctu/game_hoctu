<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<title>@yield('title') - Trang Quản Trị</title>
	<link href="{{ asset('/public/css/bootstrap.min.css') }}" rel="stylesheet"/>
	<link href="{{ asset('/public/css/sb-admin.css') }}" rel="stylesheet">
	<link href="{{ asset('/public/css/site.css') }}" rel="stylesheet">
	<!-- Custom Fonts -->
	<link href="{{ asset('/public/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'/>
</head>
<body style="padding-top: 0px">
	
	@if(!Auth::guest() && !Session::has('authadmin'))
	@include('admin.auth')
	@else
	<div id="wrapper">

		<!-- Navigation -->
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index">KidLeen - Trang quản trị</a>
			</div>
			<!-- Top Menu Items -->
			<ul class="nav navbar-right top-nav">
				@if(!Auth::guest())
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{Auth::user()->name}} <b class="caret"></b></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="{{ url('/') }}"><i class="fa fa-arrow-circle-o-left"></i> Trang chủ</a></li>
						<li><a href="{{ url('/auth/logout') }}"><i class="fa fa-sign-out"></i> Đăng xuất</a></li>
					</ul>
				</li>
				@endif
			</ul>
			<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav side-nav">
					<li>
						<a href="{{ url('/admin/index') }}"><i class="fa fa-fw fa-dashboard"></i> Trang tổng quan</a>
					</li>
					<li>
						<a href="{{ url('/admin/users') }}"><i class="fa fa-fw fa-user"></i> Quản lý người dùng</a>
					</li>
					<li>
						<a href="{{ url('/admin/childs') }}"><i class="fa fa-fw fa-user"></i> Quản lý những đứa trẻ</a>
					</li>
					<li>
						<a href="{{ url('/admin/categories') }}"><i class="fa fa-fw fa-table"></i> Quản lý thể loại</a>
					</li>
					<li>
						<a href="{{ url('/admin/albums') }}"><i class="fa fa-fw fa-edit"></i> Quản lý các album</a>
					</li>
					<li>
						<a href="{{ url('/admin/images') }}"><i class="fa fa-fw fa-desktop"></i> Quản lý hình ảnh</a>
					</li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</nav>

		<div id="page-wrapper">

			@yield('content')

		</div>
		<!-- /#page-wrapper -->
	</div>
	@endif
	<!-- /#wrapper -->
	<script src="{{ asset('/public/js/angular.min.js') }}"></script>
	<script src="{{ asset('/public/js/angular-messages.min.js') }}"></script>
	<script src="{{ asset('/public/js/app.js') }}"></script>
	<script src="{{ asset('/public/js/config.js') }}"></script>

	<!-- jQuery -->
	<script src="{{ asset('/public/js/jquery-1.12.3.min.js') }}"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="{{ asset('/public/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/public/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('/public/js/dataTables.bootstrap.min.js') }}"></script>
	<script src="{{ asset('/public/js/myscript.js') }}"></script>
	<script src="{{ asset('/public/js/FileSaver.js') }}"></script>
	<script>
		$('.carousel').carousel({
			interval: 5000
		});
	</script>
</body>
</html>
