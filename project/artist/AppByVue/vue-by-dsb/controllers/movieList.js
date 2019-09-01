//影视列表
var mvvm=new Vue({
	el:'#app_wap',
	data:{
		navTitle:"影视",
		nav_Title:"视频详情",
		navLeftImage:"img/search_min.png",
		navRightUrl:'',
		navLeftUrl:"search.html",
		itemList:[],//列表的值
		categoryName:'',
		detailPath:'',
		imagePrefix:imgUrl,
		movieListUrl:dataUrl,
	},
methods:{
	//用户登录状态检测
	url_data:function()
	{
	if(localStorage.isLogin == "1")
	{
		this.navRightUrl = "userMain.html";
	}
	else{
		this.navRightUrl = "login.html";
	}
	},
	//视频列表
	movieList:function()
	{	
		 this.$http({
				url:this.movieListUrl,
			data:{
				m:'movie',
				a:'list'
			}
			}).then(function(response){	
				var response = response.data;
				for(var i=0; i<response.data.length; i++)
			{
			var item = response.data[i];
			switch(item.category){
				case "5": item.categoryName = "影视"; 
				break;
				default: item.categoryName = "";
			}
			item.detailPath = "movieDetail.html";
		}
		this.itemList = response.data;
			});	
			
	}
//视频列表函数结束
	},
	ready:function(){
		this.url_data();
		this.movieList();
	}
});