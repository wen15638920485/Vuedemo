<?php
	
	//关闭错误输出
	// error_reporting(0);
	
    //设置文档类型 编码是utf-8, 解决乱码问题
	header("Content-type: text/html; charset=utf-8"); 


	//设置访问控制
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
	header('Access-Control-Allow-Headers: X-Requested-With');
	header('Access-Control-Allow-Credentials: true');
	
	
	
	
	//数据库

	
	include_once("../lib/tool.php");
	
	
	
	include_once("main.php");
	include_once("read.php");
	include_once("music.php");
	include_once("movie.php");
	include_once("user.php");
	include_once("favorite.php");
	include_once("rating.php");
	include_once("search.php");
	
	
	
	//返回的结果
	$r = json_response(1,"没有这个接口",array());
	
	
	if(isset($_GET['m']) == false || isset($_GET['a']) == false)
	{
		$r = json_response(1,"need a and m",array());
		die($r);
	}
	$m = $_GET['m'];
	$a = $_GET['a'];
	
	
	if($m == "main")
	{
		switch($a)
		{
			case "list": $r = main_list($_GET);break;
			case "ads": $r = main_ads($_GET);break;
		}

	}
	else if($m == "read")
	{
		//根据a的不同选择不同的方法处理结果
		switch($a)
		{
			case "list": $r = read_list($_GET);break;
			case "detail": $r = read_detail($_GET);break;
		}
	}
	else if($m == "music")
	{
		switch($a)
		{
			case "list": $r = music_list($_GET);break;
			case "detail": $r = music_detail($_GET);break;
		}
	}
	else if($m == "movie")
	{
		switch($a)
		{
			case "list": $r = movie_list($_GET);break;
			case "detail": $r = movie_detail($_GET);break;
		}
	}
	else if($m == "user")
	{
		switch($a)
		{
			case "register": $r = user_register($_GET);break;
			case "login": $r = user_login($_GET);break;
			case "logout": $r = user_logout($_GET);break;
			case "changePassword": $r = user_changePassword($_GET);break;
			case "userInfo": $r = user_userInfo($_GET);break;
			default: $r = response_error();
		}
	}
	else if($m == "favorite")
	{
		//根据a的不同选择不同的方法处理结果
		switch($a)
		{
			case "saveFavorite": $r = favorite_saveFavorite($_GET);break;
			case "cancelFavorite": $r = favorite_cancelFavorite($_GET);break;
			case "getFavorite": $r = favorite_getFavorite($_GET);break;
			case "isFavorite": $r = favorite_isFavorite($_GET);break;
			default: $r = response_error();
		}
	}
	else if($m == "rating")
	{
		//根据a的不同选择不同的方法处理结果
		switch($a)
		{
			case "rating": $r = rating_rating($_GET);break;
			default: $r = response_error();
		}
	}
	else if($m == "search")
	{
		//根据a的不同选择不同的方法处理结果
		switch($a)
		{
			case "search": $r = search_search($_GET);break;
			default: $r = response_error();
		}
	}
	else
	{
		$r = response_error();
	}
	
	function response_error()
	{
		return json_response(1,"请求错误Last",array());
	}

	echo $r;

?>