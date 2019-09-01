//首页
var mvvm=new Vue({
	el:'#app_wap',
	data:{
		navTitle:"首页",
		navLeftImage:"img/search_min.png",
		navRightUrl:'',
		navLeftUrl:"search.html",
		itemList:[],//列表的值
		categoryName:'',
		detailPath:'',
		imagePrefix:imgUrl,
		mainListUrl:dataUrl,
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
	//首页数据
	main:function()
	{
		//alert(this.mainListUrl);
		 this.$http({
				url:this.mainListUrl,
			data:{
				m:'main',
				a:'list'
			}
			}).then(function(response){	
				var response = response.data;
				//console.log("r=" +JSON.stringify(response));
				for(var i=0; i<response.data.length; i++)
		{
			var item = response.data[i];
			
			//console.log("title=",item.title);
			
			//alert(item.category);
			switch(item.category){
				case "1":{
					item.categoryName = "阅读";
					item.detailPath = "readDetail.html";
				}break;
				case "2":{ 
					item.categoryName = "连载";
				}break;
				case "3": item.categoryName = "问答"; 
				break;
				case "4":{ 
					item.categoryName = "音乐";
					item.detailPath = "musicDetail.html";
				}break;
				case "5": {
					item.categoryName = "影视";
					item.detailPath = "movieDetail.html";
				}break;
			}
		}
		this.itemList = response.data;
			});	
	}
	},
	ready:function(){
		this.url_data();
		this.main();
	}
});