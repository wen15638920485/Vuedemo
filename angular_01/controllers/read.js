﻿//阅读列表控制器
app.controller('readListController', function($scope, $rootScope, $routeParams, $http) {
	$rootScope.navTitle = "阅读列表";
	$rootScope.navLeftImage = "img/search_min.png";
	$rootScope.navLeftUrl = "#/search/1";
	$http({
		method: 'get',
		url: readListUrl
	}).success(function(response) {
		//alert(response.data[0].title);
		$scope.itemList=response.data;
	}).error(function() {
		alert('读取阅读列表失败');
	})
})
//阅读详情控制器
app.controller('readDetailController', function($scope, $rootScope, $routeParams, $http,$sce) {
	//alert($routeParams.id);//获取文章的id
	$rootScope.navTitle = "阅读详情";
	$rootScope.navLeftImage = "img/aliwx_common_back_btn_normal.png";
	$rootScope.navLeftUrl = "javascript:history.go(-1)";
	$http({
		method:'get',
		url:readDetailUrl,
		params:{
			id:$routeParams.id
		}
	}).success(function(response){
		//alert(response.data.title)
		$scope.data=response.data;
		var str=response.data.hp_content;
		$scope.content=$sce.trustAsHtml(new Base64().decode(str));
		
	}).error(function(){
		alert('读取阅读详情失败');
	})
})