var SERVER_PATH = "http://localhost/thuctap/game_hoctu/"

var app = angular.module('game_hoctu', ['ngMessages'], function($interpolateProvider) {
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});
app.controller('LoginController',function($scope){

});

app.controller('RegisterController',function($scope){

});

app.controller("ImagesController", function($scope, $http){
	$scope.loadAlbum = function(){
		$http({
			method  : 'GET',
			url     : SERVER_PATH + "ajax/albums/list",
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
		var albums_id = $scope.albums_id;
		$http({
			method  : 'GET',
			url     : SERVER_PATH + "ajax/images/" + albums_id + "/list",
			headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).success(function(response) {
			console.log(response);
			if(response.status == 'SUCCESS')
			{
				$scope.images = response.info;
			}
		});
	};
});


app.controller('AlbumsController', function($scope, $http){
	$scope.albums = undefined;
	$scope.viewbyCate = true;

	$scope.loadAllAlbums = function(){
		$scope.albums = undefined;
		$scope.count = undefined;
		$http({
			method  : 'GET',
			url     : SERVER_PATH + "ajax/albums/ajaxGetList",
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

	$scope.loadAllAlbums();

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
	$scope.loadCate();

	$scope.viewByCate = function(){
		$scope.viewbyCate = true;
		$scope.loadCate();
	};
	$scope.viewByUsers = function(){
		$scope.viewbyCate = false;
		$scope.loadUsers();
	};

	$scope.loadAlbumByCate = function(){
		$scope.albums = undefined;
		$scope.count = undefined;
		var cate_id = $scope.cate_id;
		$http({
			method  : 'GET',
			url     : SERVER_PATH + "ajax/albums/categories/"+cate_id+"/list",
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
			url     : SERVER_PATH + "ajax/albums/users/"+users_id+"/list",
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