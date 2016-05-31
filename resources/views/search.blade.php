@extends('app')
@section('title','Tìm kiếm thông tin')
@section('content')
<div class="container" ng-app="game_hoctu" ng-controller="SearchController">
	<div class="row">
		<div class="col-md-12">
			<h1><span class="glyphicon glyphicon-search"></span> Tìm kiếm thông tin</h1>
			<hr/>
			<div class="form-group form-inline text-center">
				<label class="form-label">Tìm kiếm:</label>
				<input class="form-control" type="text" name="search" ng-model="search">	
			</div>
		</div>

		<div class="col-md-4">
			
			<div class="table-responsive" ng-hide="search == undefined || search == ''">
				<h2>Albums</h2>
				<hr/>
				<div class="list-group">
					<a ng-repeat="album in albums | filter:search" href="#" class="list-group-item">
						<div class="row">
							<div class="col-sm-4">
								<img src="<%album.image%>" class="img-responsive img-hover" width="100%">
							</div>
							<div class="col-sm-8">
								<h3><%album.name%></h3>
								<p><%album.description%></p>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
		<div class="col-md-4">

			<div class="table-responsive" ng-hide="search == undefined || search == ''">
				<h2>Childs</h2>
				<hr/>
				<div class="list-group">
					<a ng-repeat="child in childs | filter:search" href="#" class="list-group-item">
						<div class="row">
							<div class="col-sm-4">
								<img src="{{CHILD_IMAGE}}<%child.image%>" class="img-responsive img-hover" width="100%">
							</div>
							<div class="col-sm-8">
								<h3><%child.name%></h3>
								<p><%child.date_of_birth%></p>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			
			<div class="table-responsive" ng-hide="search == undefined || search == ''">
				<h2>Users</h2>
				<hr/>
				<div class="list-group">
					<a ng-repeat="item in users | filter:search" href="#" class="list-group-item">
						<div class="row">
							<div class="col-sm-8">
								<h3><%item.name%></h3>
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
