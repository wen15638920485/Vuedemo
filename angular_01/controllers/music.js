//音乐列表控制器
app.controller('musicListController',function($scope,$rootScope,$routeParams,$http){
	$rootScope.navTitle="音乐列表";
	$rootScope.navLeftImage="img/search_min.png";
	$rootScope.navLeftUrl="#/search/1";
	$http({
		method:'get',
		url:musicListUrl,
	}).success(function(response){
		$scope.itemList=response.data;
	}).error(function() {
		alert('读取阅读列表失败');
	})
})
//音乐详情控制器
app.controller('musicDetailController',function($scope,$rootScope,$routeParams,$http,$sce){
	$rootScope.navTitle="音乐详情";
	$rootScope.navLeftImage="img/aliwx_common_back_btn_normal.png";
	$rootScope.navLeftUrl="javascript:history.go(-1)";
	$http({
		method:'get',
		url:musicDetailUrl,
		params:{
			id:$routeParams.id
		}
	}).success(function(response){
		$scope.data=response.data;
		var str=response.data.story;
		$scope.content=$sce.trustAsHtml(new Base64().decode(str));
		$scope.media_url =$sce.trustAsResourceUrl(imagePrefix+response.data.media_url);
	}).error(function(){
			alert('读取阅读详情失败');
	})
	
})