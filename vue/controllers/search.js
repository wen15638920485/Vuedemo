//首页
var mvvm=new Vue({
	el:'#app_wap',
	data:{
		navTitle:"搜索结果",
		navLeftImage:"img/search_min.png",
		navRightUrl:'',
		navLeftUrl:"search.html",
		itemList:[],//列表的值
		music_list:[],
		video_list:[],
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
	main:function(){
		 this.$http({
				url:this.mainListUrl,
			data:{
				m:'search',
				a:'search',
				keyword:GetQueryString('key')
			}
			}).then(function(response){
				//console.log(decodeURI(GetQueryString('key')));
				var response = response.data;
				this.itemList=response.data.read;
				this.music_list=response.data.music;
				this.video_list=response.data.movie;
			});
		}
	},
	ready:function(){
		this.url_data();
		this.main();
	}
});