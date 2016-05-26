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
			url     : SERVER_PATH + "ajax/images/" + albums_id + "/list",
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

	$scope.viewByCate = function(){
		$scope.loadCate();
	};
	$scope.viewByUsers = function(){
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

app.controller('ChildsController', function($scope, $http){
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
			url     : SERVER_PATH + "ajax/childs/getListByUser/" + users_id,
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