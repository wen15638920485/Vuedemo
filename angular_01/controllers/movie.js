//视频列表控制器
app.controller('movieListController',function($scope,$rootScope,$routeParams,$http){
	$rootScope.navTitle="影视列表";
	$rootScope.navLeftImage="img/search_min.png";
	$rootScope.navLeftUrl="#/search/1";
	$http({
		method: 'get',
		url: movieListUrl,
	}).success(function(response) {
		//alert(response.data[0].title);
		$scope.itemList=response.data;
	}).error(function() {
		alert('读取阅读列表失败');
	})
})
//视频详情控制器
app.controller('movieDetailController',function($scope,$rootScope,$routeParams,$http,$sce){
	$rootScope.navTitle="视频详情";
	$rootScope.navLeftImage="img/aliwx_common_back_btn_normal.png";
	$rootScope.navLeftUrl="javascript:history.go(-1)";
	$http({
		method:'get',
		url:movieDetailUrl,
		params:{
			id:$routeParams.id
		}
	}).success(function(response){
		$scope.data=response.data;
		var str=response.data.poster;
		/*$scope.content=$sce.trustAsHtml(new Base64().decode(str));*/
		$scope.media_url =$sce.trustAsResourceUrl(imagePrefix+response.data.media_url);
	}).error(function(){
		alert('读取阅读详情失败');
	})
})