<?php

	//设置文档类型 编码是utf-8, 解决乱码问题
	header("Content-type: text/html; charset=utf-8");

	$userName = $_GET['userName'];
	$password= $_GET['password'];
	
	//$userName = $_POST['userName'];
	//$password= $_POST['password'];

	if($userName == 'zhangsan' && $password == '123456'){
		
		echo '登录成功';
	}else{
		echo '登录失败！';
	}

?>