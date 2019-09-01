<?php

	
	//index.php?m=user&a=register&username=zz&password=21212&phone=1361111222
	function user_register($p)
	{
		
		//检查参数是否存在
		if(isset($p['username'])==false
			||isset($p['password'])==false
			||isset($p['phone'])==false)
		{
			return json_response(2,"参数缺失",array());
		}
		
		//获取参数
		$username = $p['username'];
		$password = $p['password'];
		$phone = $p['phone'];
		
		global $connect;
		
		//检测是否注册
		$sql = "select * from dou_user where username='$username'";
		$db_result = $connect->query($sql);
		if($db_result->num_rows > 0)
		{
			return json_response(2,"用户名已存在",array());
		}
		
		//执行注册
		//字符串两边要加''表示字符串, 数字不用加
		$sql = "insert into dou_user(username,password,phone) values('$username','$password','$phone')";
		//echo $sql;
		$r = $connect->query($sql);
		
		return json_response(0,"注册成功",array());
		
	}
	function user_login($p)
	{
		//检查参数是否存在
		if(isset($p['username'])==false
			||isset($p['password'])==false)
		{
			return json_response(2,"参数缺失",array());
		}
		
		//获取参数
		$username = $p['username'];
		$password = $p['password'];
		
		global $connect;
		
		//登录检测
		$sql = "select * from dou_user where username='$username' 
			and password='$password'";
		$db_result = $connect->query($sql);
		if($db_result->num_rows == 0)
		{
			return json_response(2,"登录失败,用户名或密码错误",array());
		}
		
		$row = $db_result->fetch_assoc();
		return json_response(0,"登录成功",$row);
	}
	function user_logout($p)
	{
		
	}
	//index.php?m=user&a=changePassword&username=zz&password=21212&newPassword=3333
	function user_changePassword($p)
	{
		//检查参数是否存在
		if(isset($p['userId'])==false
			||isset($p['password'])==false
			||isset($p['newPassword'])==false)
		{
			return json_response(2,"参数缺失",array());
		}
		
		//获取参数
		$userId = $p['userId'];
		$password = $p['password'];
		$newPassword = $p['newPassword'];
		
		global $connect;
		
		//判断是否存在用户
		
		//判断登录状态
		
		//主要判断, 原来的密码是否正确
		$sql = "select * from dou_user where id=$userId and password='$password'";
		//echo "sql = $sql";
		$db_result = $connect->query($sql);
		if($db_result->num_rows == 0)
		{
			return json_response(2,"原用户名或密码错误, 修改失败",array());
		}
		
		//修改密码
		$sql = "update dou_user set password='$newPassword'
			 where id='$userId'";
		$r = $connect->query($sql);
		if($r == false)
		{
			return json_response(2,"修改失败",array());
		}
		return json_response(0,"密码修改成功",array());
	}
	//index.php?m=user&a=userinfo&username=zz
	function user_userInfo($p)
	{
		//检查参数是否存在
		if(isset($p['userId'])==false)
		{
			return json_response(2,"参数缺失",array());
		}
		
		//获取参数
		$userId = $p['userId'];		
		global $connect;
		
		//获取信息
		$sql = "select * from dou_user where id='$userId'";
		$db_result = $connect->query($sql);
		if($db_result->num_rows == 0)
		{
			return json_response(2,"没有这个用户",array());
		}
		$row = $db_result->fetch_assoc();
		//$row['password'] = null;
		unset($row['password']);
		return json_response(0,"用户个人信息",$row);
		
	}
	//index.php?m=user&a=getFavorite&username=zz&type=1
	//type=0 全部收藏, 1返回书籍, 2返回音乐,3返回电影
	function user_getFavorite($p)
	{
		
		
		//检查参数是否存在
		if(isset($p['userId'])==false
			||isset($p['type'])==false)
		{
			return json_response(2,"参数缺失",array());
		}
		
		//获取参数
		$userId = $p['userId'];	
		// type=0 全部收藏, 1返回书籍, 2返回音乐,3返回电影
		$type = $p['type'];	
		
		global $connect;
		
		
		if($type==1||$type==2||$type==3)
		{
			$sql = "select * from dou_favorite where userId='$userId' 
				and type=$type";
			$db_result = $connect->query($sql);
			$array = array();
			while($row = $db_result->fetch_assoc())
			{
				//再查一次, 获取id对应的数据
				$media = media_info($row['mediaId'],$row['type']);
				$array[] = $media;
				
			}

			return json_response(0,"获取收藏成功",$array);
		}
		
	}
	
	//辅助函数
	function media_info($id,$type)
	{
		//如果type=1, 在dou_book中查
		//type=2, music
		//type=3, film
		$tableName = "";
		if($type==1) $tableName = "dou_book";
		if($type==2) $tableName = "dou_music";
		if($type==3) $tableName = "dou_film";
		
		global $connect;
		$sql = "select * from $tableName 
			where id=$id";
		$db_result = $connect->query($sql);
		if($db_result == false)
		{
			//查询失败
		}
		$row = $db_result->fetch_assoc();
		return $row;
	}





?>