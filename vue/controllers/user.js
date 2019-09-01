//用户界面
var mvvm=new Vue({
	el:'#app_wap',
	data:{
		navTitle:"个人中心",
		nav_Title:"登录",
		navLeftImage:"img/aliwx_common_back_btn_normal.png",
		navRightUrl:'',
		navLeftUrl:"search.html",
		imagePrefix:imgUrl,
		musicListUrl:dataUrl,
		username:"zz",//默认用户名
		password:"5555",//默认密码
		itemList:''
	},
methods:{
	//用户登录状态检测
	url_data:function()
	{
	if(localStorage.isLogin == "1")
	{
		this.navRightUrl = "userMain.html";
		//alert(1);
	}
	else{
		this.navRightUrl = "login.html";
		//alert(2);
	}
	},
	//用户登录页面
	dealLogin:function()
	{
		this.$http({
			url:this.musicListUrl,
		data:{
			m:'user',
			a:'login',
			username:this.username,
			password:this.password
		}
		}).then(function(response){	
			var response = response.data;
			if(response.code == "0")
			{
				localStorage.isLogin = "1";
				localStorage.userId = response.data.id;
				localStorage.userInfo = JSON.stringify(response.data);
				//alert('登录成功');
				location.href='userMain.html';
			}
			else
			{
				alert('登录失败');
			}
		});	
	},
	//用户登录结束
	dealExit:function()
	{
		alert("已退出登录")
		localStorage.isLogin = "0";
		localStorage.userId='';
		localStorage.userInfo='';
		location.href='index.html';
	},
	//退出登录结束
	//收藏列表
	favoriteList:function()
	{
		this.$http({
			url:this.musicListUrl,
		data:{
			m:'favorite',
			a:'getFavorite',
			type:GetQueryString('id'),
			userId:localStorage.userId
		}
		}).then(function(response){	
			var response = response.data;
			for(var k in response.data)
		{
			var v = response.data[k];
			if(GetQueryString('id')==1)
			{
				v.detailPageUrl = "readDetail.html";
				this.nav_Title='阅读收藏';
			}
			if(GetQueryString('id')==4)
			{
				v.detailPageUrl = "musicDetail.html";
				this.nav_Title='音乐收藏';
			}
			if(GetQueryString('id')==5)
			{
				v.detailPageUrl = "movieDetail.html";
				this.nav_Title='影视收藏';
			}
			
		}
			this.itemList = response.data;			
		});
	}
	},
	ready:function(){
		this.url_data();
		if(GetQueryString('id')>0)
		{
		this.favoriteList();
		}
	}
});