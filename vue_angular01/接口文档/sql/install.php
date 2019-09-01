<?php

	//作用:	执行后, 直接创建好了数据库, 不用用户手动创建
	//不是接口, 返回不是json,返回创建信息
	
    //设置文档类型 编码是utf-8, 解决乱码问题
    header("Content-type:text/html;charset=utf-8");
	
	//包含数据库配置文件
	include_once("../config/DataConfig.php");
	
	//A.连接数据库
	$connect = new mysqli($db_host,$db_user,$db_password);
	if($connect->connect_error)
	{
		//停止脚本
		die("连接数据库错误");
	}
	echo "连接数据库OK<br/>";

	
	//B. 创建数据库
	//删除以前的数据库
	$sql = "drop database if exists BankQueue;";
	$connect->query($sql);
	
	$sql = "create database BankQueue;";
	$r = $connect->query($sql);
	if($r == false)
	{
		die("创建数据库错误<br/>");
	}
	echo "创建数据库OK<br/>";
	
	//选择要操作的数据库
	$connect->select_db($db_name);
	
	//C. 创建表
	
	//C1. 业务类型
	//	NOT NULL 不为空
	//	AUTO_INCREMENT 自动增长
	//	DEFAULT NULL  默认为空
	//	PRIMARY KEY		主键, 每行数据唯一序号
	//	DEFAULT CHARSET=utf8;  默认编码是utf8
	$sql = "CREATE TABLE `ntype` (`tid` int(11) unsigned NOT NULL AUTO_INCREMENT,`tname` varchar(128) DEFAULT NULL,`ttime` int DEFAULT NULL,PRIMARY KEY (`tid`)) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
	$r = $connect->query($sql);
	if($r == false)
	{
		die("创建ntype错误<br/>");
	}
	echo "创建ntype OK<br/>";
	
	
	
	//C2. 排队序列
	$sql = "CREATE TABLE `queue` (`id` int(11) unsigned NOT NULL AUTO_INCREMENT,`number` int(11) DEFAULT NULL,`createtime` datetime DEFAULT NULL,`ntype` int(11) DEFAULT NULL,`isdelayed` int(11) DEFAULT NULL,`delayedtime` int(11) DEFAULT NULL,`nstatus` int(11) DEFAULT NULL,`isvip` int(11) DEFAULT NULL,`worktime` int(11) DEFAULT NULL,PRIMARY KEY (`id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
	$r = $connect->query($sql);
	if($r == false)
	{
		die("创建queue错误<br/>");
	}
	echo "创建queue OK<br/>";
	
	
	

?>