<?php
	
	//关闭错误输出
	error_reporting(0);
	
    //设置文档类型 编码是utf-8, 解决乱码问题
	header("Content-type: text/json; charset=utf-8"); 


	//设置访问控制
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
	header('Access-Control-Allow-Headers: X-Requested-With');
	header('Access-Control-Allow-Credentials: true');
	
	
	//包含配置文件
	include_once("../lib/database.php");
	include_once("../lib/tool.php");
	
	
	include_once("book.php");
	include_once("user.php");
	include_once("favorite.php");
	include_once("rating.php");
	

		
	
	
	//index.php?m=book&a=bookGroupList
	if(isset($_GET['m']) == false || isset($_GET['a']) == false)
	{
		return json_response(2,"模块参数m或动作参数a缺失");
	}
	$m = $_GET['m'];
	$a = $_GET['a'];
	
	
	//返回的结果
	$r = json_response(2,"没有这个接口",array());
	
	if($m == "main")
	{

	}
	else if($m == "book")
	{
		//根据a的不同选择不同的方法处理结果
		switch($a)
		{
			case "bookGroupList": $r = book_bookGroupList($_GET);break;
			case "bookDetail": $r = book_bookDetail($_GET);break;
			case "saveFavorite": $r = book_saveFavorite($_GET);break;
			case "cancelFavorite": $r = book_cancelFavorite($_GET);break;
			case "rating": $r = book_rating($_GET);break;
			default: $r = response_error();
		}
	}
	else if($m == "music")
	{
		
	}
	else if($m == "film")
	{
		
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
			case "getFavorite": $r = user_getFavorite($_GET);break;
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
	else
	{
		$r = response_error();
	}
	
	function response_error()
	{
		return json_response(2,"请求错误Last",array());
	}
	
	
	echo $r;

?>