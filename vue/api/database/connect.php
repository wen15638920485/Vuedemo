<?php

	//作用: 其他接口只要连接数据库, 都包含这个文件
	//连接数据库
	
	//包含配置文件
	include_once("config.php");
	
	function connect_database()
	{
		global $db_host;
		global $db_user;
		global $db_password;
		global $db_name;
		global $db_port;
		
		//连接数据库
		$connect = new mysqli($db_host,$db_user,$db_password,$db_name,$db_port);
		if($connect->connect_error)
		{
			$dict = array("code"=>"1","desc"=>"connect fail");
			$json = json_encode($dict);
			die($json);
		}
	    //设置编码
	    $connect->query("set character set 'utf8'");//读库
	    $connect->query("set names 'utf8'");//写库
	
		return $connect;
	}
	
	function get_fetch_all($result){
		$array = array();
		while ($row = $result -> fetch_assoc()) {
			$array[] = $row;
		
		}
		return $array;
	}
	
	
	

?>