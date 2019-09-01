﻿//影视详情
var mvvm=new Vue({
	el:'#app_wap',
	data:{
		navTitle:"影视",
		nav_Title:"视频详情",
		navLeftImage:"img/search_min.png",
		navRightUrl:'',
		navLeftUrl:"search.html",
		imagePrefix:imgUrl,
		movieListUrl:dataUrl,
		officialstory:'',//剧情简介
		video_title:'',//视频标题
		video_imgurl:'',//视频图片
		video_url:'',//视频地址
		info_vue:''//视频描述
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
/*
.................................
*/
	//视频详情
	video:function(){
		this.$http({
			url:this.movieListUrl,
		data:{
			m:'movie',
			a:'detail',
			id:GetQueryString('id')
		}
		}).then(function(response){
			
			var response = response.data;
			this.info_vue=response.data.info;
			this.video_url=this.imagePrefix+response.data.media_url;
			this.video_imgurl=imgUrl+response.data.poster;
			this.video_title=response.data.title;
			this.officialstory=response.data.officialstory;
			//alert(this.video_url);
		});	
	},
//视频详情函数结束
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
				type:5,
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
			this.video();
		}
	}
});