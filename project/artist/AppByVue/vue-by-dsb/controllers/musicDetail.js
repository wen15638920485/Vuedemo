//音乐详细
var mvvm=new Vue({
	el:'#app_wap',
	data:{
		navTitle:"音乐",
		nav_Title:"音乐详情",
		navLeftImage:"img/search_min.png",
		navRightUrl:'',
		navLeftUrl:"search.html",
		imagePrefix:imgUrl,
		musicListUrl:dataUrl,
		music_url:'',//音乐地址
		music_cover:'',//音乐图片
		music_album:'',//音乐名称
		story_title:'',//音乐描述
		story_author:'',//音乐作者
		music_title:'',//音乐标题
		music_desc:''//音乐描述简介
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
	//音乐详情
	music_cont:function()
	{
		this.$http({
			url:this.musicListUrl,
		data:{
			m:'music',
			a:'detail',
			id:GetQueryString('id')
		}
		}).then(function(response){	
			var response = response.data;
			this.music_cover=this.imagePrefix+response.data.cover;
			//转圈的图片地址
			this.music_url=this.imagePrefix+response.data.media_url;
			//视频播放的地址
			this.music_album=response.data.album;
			//音乐名称
			this.story_title=response.data.story_title;
			this.story_author=response.data.story_author;
			//音乐描述
			this.music_title=response.data.title;
			//音乐标题
			//base转普通
		var str=response.data.story;
		var base = new Base64();
		this.music_desc=base.decode(str);
			
			//this.music_desc=response.data.story;
			//音乐简介
			//alert(response.data.story);
		});	
	},
	//音乐详细结束
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
				type:4,
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
			this.music_cont();
		}
	}
});