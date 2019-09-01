//阅读详情
var mvvm=new Vue({
el:'#app_wap',
data:{
	navTitle:"阅读",
	nav_Title:"阅读详情",
	navLeftImage:"img/search_min.png",
	navRightUrl:'',
	navLeftUrl:"search.html",
	imagePrefix:imgUrl,
	movieListUrl:dataUrl,
	hp_title:'',
	author_name:'',
	rea_content:'',
	content_id:''
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
	//阅读详情
	readDetail:function(){
		this.$http({
			url:this.movieListUrl,
		data:{
			m:'read',
			a:'detail',
			id:GetQueryString('id')
		}
		}).then(function(response){	
			var response = response.data;
			this.hp_title=response.data.hp_title;
			this.author_name=response.data.author_name;
			var str=response.data.hp_content;
			var base = new Base64();
			this.rea_content = base.decode(str);

		});	
	},
	//阅读详细结束
	//收藏函数
	dealCollect:function()
	{
		if(localStorage.isLogin == "1")
		{
			this.$http({
				url:this.movieListUrl,
			data:{
				m:'favorite',
				a:'saveFavorite',
				userId:localStorage.userId,
				type:1,
				itemId:GetQueryString('id')
			}
			}).then(function(response){	
				alert('收藏成功');
			});
		}
		else
		{
			alert('请先登录');
			location.href='login.html';
		}
	}
},
	ready:function(){
		this.url_data();
		if(GetQueryString('id')>0)
		{
			this.readDetail();
		}
	}
})