@extends('app')
@section('title','Tìm kiếm thông tin')
@section('content')
<div class="container" ng-controller="SearchController">
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
				<h4>Các album</h4>
				<hr/>
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
				<h4>Những đứa trẻ</h4>
				<hr/>
				<div class="list-group">
					<a ng-repeat="child in childs | filter:search" href="{{ url('/childs/<%child.id%>/detail') }}" class="list-group-item">
						<div class="row">
							<div class="col-sm-4">
								<img src="{{CHILD_IMAGE}}<%child.image%>" class="img-responsive img-hover" width="100%">
							</div>
							<div class="col-sm-8">
								<h4><%child.name%></h4>
								<p><%child.date_of_birth%></p>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="table-responsive" ng-hide="search == undefined || search == ''">
				<h4>Những người dùng</h4>
				<hr/>
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
