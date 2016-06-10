@extends('app')
@section('title','Tìm kiếm thông tin')
@section('content')
<div class="container" ng-controller="SearchController" ng-init="load()">
	<div class="row">
		<div class="col-md-12">
			<h1><span class="glyphicon glyphicon-search"></span> Tìm kiếm</h1>
			<hr/>
		</div>
		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-sm-offset-2">
			<div class="input-group form-group search-page">
				<span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
				<input class="form-control" style="height:38px;z-index:0" ng-model="search" placeholder="Những gì bạn muốn tìm, album ảnh, những đứa trẻ, người dùng..." type="text">
				<span class="input-group-btn">
					<button class="btn btn-primary" style="height:38px;" value=""><span id="text_link">Tìm kiếm</span></button>
				</span>
			</div>
		</div>

		<div class="col-md-4">
			<div class="table-responsive" ng-hide="search == undefined || search == ''">
				<h4 class="title-bar"><span class="glyphicon glyphicon-picture"></span> Các album</h4>
				<div class="list-group">
					<a ng-repeat="album in albums | filter:search" href="{{ url('/albums/<%album.id%>/detail') }}" class="list-group-item">
						<div class="row">
							<div class="col-sm-4">
								<img src="<%album.image%>" class="img-responsive img-hover" width="100%">
							</div>
							<div class="col-sm-8">
								<h4><%album.name%></h4>
								<p><%album.description%></p>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="table-responsive" ng-hide="search == undefined || search == ''">
				<h4 class="title-bar"><span class="glyphicon glyphicon-leaf"></span> Những đứa trẻ</h4>
				<div class="list-group">
					<a ng-repeat="child in childs | filter:search" href="{{ url('/childs/<%child.id%>/detail') }}" class="list-group-item">
						<div class="row">
							<div class="col-sm-4">
								<img src="<%child.image%>" class="img-responsive img-hover" width="100%">
							</div>
							<div class="col-sm-8">
								<h4><%child.name%></h4>
								<p><%child.date_of_birth | asDate | date:'dd/MM/yyyy'%></p>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="table-responsive" ng-hide="search == undefined || search == ''">
				<h4 class="title-bar"><span class="glyphicon glyphicon-user"></span> Những người dùng</h4>
				<div class="list-group">
					<a ng-repeat="item in users | filter:search" href="{{ url('/users/<%user.id%>/detail') }}" class="list-group-item">
						<div class="row">
							<div class="col-sm-8">
								<h4><%item.name%></h4>
								<p><%item.email%></p>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>

	</div>
</div>
@endsection
