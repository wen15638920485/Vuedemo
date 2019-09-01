//阅读列表
var mvvm=new Vue({
	el:'#app_wap',
	data:{
		navTitle:"阅读",
		navLeftImage:"img/search_min.png",
		navRightUrl:'',
		navLeftUrl:"search.html",
		itemList:[],//列表的值
		categoryName:'',
		detailPath:'',
		imagePrefix:imgUrl,
		readListUrl:dataUrl,
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
	//阅读数据
	readList:function()
	{	
		 this.$http({
				url:this.readListUrl,
			data:{
				m:'read',
				a:'list'
			}
			}).then(function(response){	
				var response = response.data;
				for(var i=0; i<response.data.length; i++)
			{
			var item = response.data[i];
			switch(item.category){
				case "1": item.categoryName = "阅读"; 
				break;
				default: item.categoryName = "";
			}
			item.detailPath = "readDetail.html";
		}
		this.itemList = response.data;
			});	
			
	}//函数结束
	},
	ready:function(){
		this.url_data();
		this.readList();
	}
});