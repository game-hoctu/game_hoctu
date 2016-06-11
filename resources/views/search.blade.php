@extends('app')
@section('title','Tìm kiếm thông tin')
@section('content')
<div class="container" ng-init="childs = {{json_encode($childs)}};  users = {{json_encode($users)}}; albums = {{json_encode($albums)}}">
	<div class="row">
		<div class="col-md-12">
			<h1 class="title-bar"><span class="glyphicon glyphicon-search"></span> Tìm kiếm</h1>
		</div>
		<div class="col-sm-8 col-sm-offset-2">
			<form method="GET" action="{{route('search')}}">
				<div class="input-group form-group search-page">
					<span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
					<input class="form-control" style="height:38px;z-index:0" name="key" value="{{$key}}" placeholder="Những gì bạn muốn tìm, album ảnh, những đứa trẻ, người dùng..." type="text" required="">
					<span class="input-group-btn">
						<button class="btn btn-primary" style="height:38px;" value=""><span id="text_link">Tìm kiếm</span></button>
					</span>
				</div>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#albums">Albums</a></li>
				<li><a data-toggle="tab" href="#childs">Những đứa trẻ</a></li>
				<li><a data-toggle="tab" href="#users">Cha mẹ</a></li>
			</ul>
			<div class="tab-content">
				<div id="albums" class="tab-pane fade in active">
					<h4 class="title-bar"><span class="glyphicon glyphicon-picture"></span> Các album</h4>
					<span ng-show="albums.length == 0">Không có kết quả tìm kiếm.</span>
					<div class="list-group">
						<a ng-repeat="album in albums | filter:search" href="{{ url('/albums/<%album.id%>/detail') }}" class="list-group-item">
							<div class="row">
								<div class="col-sm-4">
									<img src="<%album.image%>" class="img-responsive img-hover" width="100%">
								</div>
								<div class="col-sm-8">
									<h4><span class="glyphicon glyphicon-picture"></span> <%album.name%></h4>
									<p><span class="glyphicon glyphicon-tag"></span> Mô tả: <%album.description%></p>
								</div>
							</div>
						</a>
					</div>
				</div>
				<div id="childs" class="tab-pane fade">
					<h4 class="title-bar"><span class="glyphicon glyphicon-leaf"></span> Những đứa trẻ</h4>
					<span ng-show="childs.length == 0">Không có kết quả tìm kiếm.</span>
					<div class="list-group">
						<a ng-repeat="child in childs | filter:search" href="{{ url('/childs/<%child.id%>/detail') }}" class="list-group-item">
							<div class="row">
								<div class="col-sm-4">
									<img src="<%child.image%>" class="img-responsive img-hover" width="100%">
								</div>
								<div class="col-sm-8">
									<h4><span class="glyphicon glyphicon-leaf"></span> <%child.name%></h4>
									<p><span class="glyphicon glyphicon-tag"></span> Ngày sinh: <%child.date_of_birth | asDate | date:'dd/MM/yyyy'%></p>
								</div>
							</div>
						</a>
					</div>
				</div>
				<div id="users" class="tab-pane fade">
					<h4 class="title-bar"><span class="glyphicon glyphicon-user"></span> Cha mẹ</h4>
					<span ng-show="users.length == 0">Không có kết quả tìm kiếm.</span>
					<div class="list-group">
						<a ng-repeat="item in users | filter:search" href="{{ url('/users/<%user.id%>/detail') }}" class="list-group-item">
							<div class="row">
								<div class="col-sm-8">
									<h4><span class="glyphicon glyphicon-user"></span> <%item.name%></h4>
									<p><span class="glyphicon glyphicon-tag"></span> Email: <%item.email%></p>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
