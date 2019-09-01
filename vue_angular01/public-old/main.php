<?php

	//作用: 其他接口只要连接数据库, 都包含这个文件
	//连接数据库
	
	//关闭错误输出
	error_reporting(0);
	
	//包含配置文件
	include_once("../config/DataConfig.php");
	
	//连接数据库
	$connect = new mysqli($db_host,$db_user,$db_password,$db_name);
	if($connect->connect_error)
	{
		$json = json_encode("code"=>"1","desc"=>"数据库连接失败");
		die($json);
	}

?>