var app = angular.module('game_hoctu', ['ngMessages'], function($interpolateProvider) {
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});
app.filter("asDate", function () {
	return function (input) {
		return new Date(input);
	}
});
app.controller('LoginController',function($scope){

});

app.controller('UsersController',function($scope){
	$scope.exportData = function () {
		var blob = new Blob([document.getElementById('exportable').innerHTML], {
			type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;charset=utf-8"
		});
		saveAs(blob, "users.xls");
	};
});

app.controller('CategoriesController',function($scope){
	$scope.exportData = function () {
		var blob = new Blob([document.getElementById('exportable').innerHTML], {
			type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;charset=utf-8"
		});
		saveAs(blob, "categories.xls");
	};
});

app.controller("ImagesController", function($scope, $http){
	$scope.exportData = function () {
		var blob = new Blob([document.getElementById('exportable').innerHTML], {
			type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;charset=utf-8"
		});
		saveAs(blob, "images.xls");
	};
	$scope.loadAlbum = function(){
		$http({
			method  : 'GET',
			url     : SERVER_PATH + "ajax/albums/getList",
			headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).success(function(response) {
			console.log(response);
			if(response.status == 'SUCCESS')
			{
				$scope.albums = response.info;
			}
		});
	};
	$scope.loadAlbum();

	$scope.loadImages = function(){
		$scope.images = undefined;
		$scope.count = undefined;
		var albums_id = $scope.albums_id;
		$http({
			method  : 'GET',
			url     : SERVER_PATH + "ajax/images/" + albums_id + "/getListByAlbums",
			headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).success(function(response) {
			console.log(response);
			if(response.status == 'SUCCESS')
			{
				$scope.images = response.info;
			}
			$scope.count = response.info.length;
		});
	};

	$scope.loadAllImage = function(){
		$scope.images = undefined;
		$scope.count = undefined;
		$http({
			method  : 'GET',
			url     : SERVER_PATH + "ajax/images/getList",
			headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).success(function(response) {
			console.log(response);
			if(response.status == 'SUCCESS')
			{
				$scope.images = response.info;
			}
			$scope.count = response.info.length;
		});
	};

	$scope.loadAllImage();
});


app.controller('AlbumsController', function($scope, $http){
	$scope.exportData = function () {
		var blob = new Blob([document.getElementById('exportable').innerHTML], {
			type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;charset=utf-8"
		});
		saveAs(blob, "albums.xls");
	};
	$scope.albums = undefined;
	
	$scope.loadAllAlbums = function(){
		$scope.albums = undefined;
		$scope.count = undefined;
		console.log($scope.insert);
		$http({
			method  : 'GET',
			url     : SERVER_PATH + "ajax/albums/getList",
			headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).success(function(response) {
			console.log(response);
			if(response.status == 'SUCCESS')
			{
				$scope.albums = response.info;
			}
			$scope.count = response.info.length;
		});
	};

	//$scope.loadAllAlbums();

	$scope.loadCate = function(){
		$scope.albums = undefined;
		$scope.count = undefined;

		$http({
			method  : 'GET',
			url     : SERVER_PATH + "ajax/categories/getList",
			headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).success(function(response) {
			console.log(response);
			if(response.status == 'SUCCESS')
			{
				$scope.cates = response.info;
			}
		});
	};

	$scope.loadUsers = function(){
		$scope.albums = undefined;
		$scope.count = undefined;

		$http({
			method  : 'GET',
			url     : SERVER_PATH + "ajax/users/getList",
			headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).success(function(response) {
			console.log(response);
			if(response.status == 'SUCCESS')
			{
				$scope.users = response.info;
			}
		});
	};

	$scope.viewByUsers = function(){
		$scope.loadUsers();
	};
	$scope.viewByCate = function(){
		$scope.loadCate();
	};

	$scope.loadAlbumByCate = function(){
		$scope.albums = undefined;
		$scope.count = undefined;
		var cate_id = $scope.cate_id;
		$http({
			method  : 'GET',
			url     : SERVER_PATH + "ajax/albums/"+cate_id+"/getListByCates",
			headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).success(function(response) {
			console.log(response);
			if(response.status == 'SUCCESS')
			{
				$scope.albums = response.info;
			}
			$scope.count = response.info.length;

		});
	};

	$scope.loadAlbumByUsers = function(){
		$scope.albums = undefined;
		$scope.count = undefined;
		var users_id = $scope.users_id;
		$http({
			method  : 'GET',
			url     : SERVER_PATH + "ajax/albums/"+users_id+"/getListByUsers",
			headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).success(function(response) {
			console.log(response);
			if(response.status == 'SUCCESS')
			{
				$scope.albums = response.info;
			}
			$scope.count = response.info.length;
		});
	};
});

app.controller('ChildsController', function($scope, $http){
	$scope.exportData = function () {
		var blob = new Blob([document.getElementById('exportable').innerHTML], {
			type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;charset=utf-8"
		});
		saveAs(blob, "childs.xls");
	};
	$scope.childs = undefined;
	$scope.count = undefined;

	$scope.loadAllChild = function(){
		$scope.childs = undefined;  
		$scope.count = undefined;

		$http({
			method  : 'GET',
			url     : SERVER_PATH + "ajax/childs/getList",
			headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).success(function(response) {
			console.log(response);
			if(response.status == 'SUCCESS')
			{
				$scope.childs = response.info;
			}
			$scope.count = response.info.length;
		});
	};
	$scope.loadAllChild();

	$scope.loadUsers = function(){
		$scope.albums = undefined;
		$scope.count = undefined;

		$http({
			method  : 'GET',
			url     : SERVER_PATH + "ajax/users/getList",
			headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).success(function(response) {
			console.log(response);
			if(response.status == 'SUCCESS')
			{
				$scope.users = response.info;
			}
		});
	};

	$scope.loadChildByUser = function(){
		$scope.childs = undefined;
		$scope.count = undefined;
		var users_id = $scope.users_id;
		console.log(users_id);
		$http({
			method  : 'GET',
			url     : SERVER_PATH + "ajax/childs/" + users_id +"/getListByUser",
			headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).success(function(response) {
			console.log(response);
			if(response.status == 'SUCCESS')
			{
				$scope.childs = response.info;
			}
			$scope.count = response.info.length;
		});
	};

});

app.controller('SearchController', function($scope, $http){
	$scope.albums = undefined;

	$scope.loadAllAlbums = function(){
		$scope.albums = undefined;
		$scope.count = undefined;
		console.log($scope.insert);
		$http({
			method  : 'GET',
			url     : SERVER_PATH + "ajax/albums/getList",
			headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).success(function(response) {
			console.log(response);
			if(response.status == 'SUCCESS')
			{
				$scope.albums = response.info;
			}
			$scope.count = response.info.length;
		});
	};


	$scope.loadAllChild = function(){
		$scope.childs = undefined;  
		$scope.count = undefined;

		$http({
			method  : 'GET',
			url     : SERVER_PATH + "ajax/childs/getList",
			headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).success(function(response) {
			console.log(response);
			if(response.status == 'SUCCESS')
			{
				$scope.childs = response.info;
			}
			$scope.count = response.info.length;
		});
	};

	$scope.loadUsers = function(){
		$scope.albums = undefined;
		$scope.count = undefined;

		$http({
			method  : 'GET',
			url     : SERVER_PATH + "ajax/users/getList",
			headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).success(function(response) {
			console.log(response);
			if(response.status == 'SUCCESS')
			{
				$scope.users = response.info;
			}
		});
	};

	$scope.load = function(){
		$scope.loadUsers();
		$scope.loadAllChild();
		$scope.loadAllAlbums();
	}
});