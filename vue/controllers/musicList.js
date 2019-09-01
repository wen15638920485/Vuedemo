//音乐列表
var mvvm=new Vue({
	el:'#app_wap',
	data:{
		navTitle:"音乐",
		nav_Title:"音乐详情",
		navLeftImage:"img/search_min.png",
		navRightUrl:'',
		navLeftUrl:"search.html",
		itemList:[],//列表的值
		categoryName:'',
		detailPath:'',
		imagePrefix:imgUrl,
		musicListUrl:dataUrl,
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
	//音乐列表
	musicList:function()
	{	
		 this.$http({
				url:this.musicListUrl,
			data:{
				m:'music',
				a:'list'
			}
			}).then(function(response){	
				var response = response.data;
				for(var i=0; i<response.data.length; i++)
			{
			var item = response.data[i];
			switch(item.category){
				case "4": item.categoryName = "音乐"; 
				break;
				default: item.categoryName = "";
			}
			item.detailPath = "musicDetail.html";
		}
		this.itemList = response.data;
			});	
			
	}
	},
	ready:function(){
		this.url_data();
		this.musicList();
	}
});