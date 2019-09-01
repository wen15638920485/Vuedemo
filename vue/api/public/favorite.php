<?php
	
	
	//http://127.0.0.1/api/artist/public/index.php?m=favorite&a=saveFavorite&userId=6&itemId=1&type=1
	function favorite_saveFavorite($p)
	{
		global $connect;
		
		$userId = $p['userId'];
		$itemId = $p['itemId'];
		$type = $p['type'];
		
		
		//如果没有收藏, 则收藏
		$sql = "select * from favorite where itemId='$itemId' and userId='$userId'";
		$result = $connect->query($sql);
		if($result->num_rows>0)
		{
			return json_response(1,"already collect fail",array());
		}
		
		//插入收藏
		$sql = "insert favorite(itemId,userId,type) values('$itemId','$userId','$type')";
		$result = $connect->query($sql);
		
		if($result == false)
		{
			return json_response(1,"collect fail",array());
		}
		
		return json_response(0,"collect ok",array());
		
	}
	
	//http://127.0.0.1/api/artist/public/index.php?m=favorite&a=cancelFavorite&userId=6&itemId=1
	function favorite_cancelFavorite($p)
	{
		global $connect;
		
		
		$userId = $p['userId'];
		$itemId = $p['itemId'];
		
		
		$sql = "delete from favorite where itemId='$itemId' and userId='$userId'";
		//echo "sql=".$sql;
		$result = $connect->query($sql);
		
		if($result == false)
		{
			return json_response(1,"cancel fail",array());
		}
		
		return json_response(0,"cancel ok",array());
	}
	
	//http://127.0.0.1/api/artist/public/index.php?m=favorite&a=getFavorite&userId=1&type=1
	function favorite_getFavorite($p){
		
		global $connect;
		
		$userId = $p['userId'];
		$type = $p['type'];
		
		$sql = "select * from favorite where userId = '$userId' and type=$type";
		$result = $connect->query($sql);
		
		$rows = get_fetch_all($result);
		
		$array = array();
		for($i=0; $i<count($rows); $i++)
		{
			$row = $rows[$i];
			
			$tableName = "";
			if($type == "1")
			{
				$subSql = "select * from article where id=$row[itemId]";
				//echo "sub=".$subSql;
				$subResult = $connect->query($subSql);
				$subItem = $subResult->fetch_assoc();
				$subItem['hp_content'] = "";
				$array[] = $subItem;
			}
			if($type == "4")
			{
				$subSql = "select * from music where id=$row[itemId]";
				//echo "sub=".$subSql;
				$subResult = $connect->query($subSql);
				$subItem = $subResult->fetch_assoc();
				$subItem['story'] = "";
				$array[] = $subItem;
			}
			if($type == "5")
			{
				$subSql = "select * from movie where id=$row[itemId]";
				//echo "sub=".$subSql;
				$subResult = $connect->query($subSql);
				$subItem = $subResult->fetch_assoc();
				//var_dump($subItem);
				$array[] = $subItem;
			}
		}
		
		return json_response(0,"get ok",$array);
	}

	//http://127.0.0.1/api/artist/public/index.php?m=favorite&a=isFavorite&userId=1&itemId=10787
	function favorite_isFavorite($p)
	{
		global $connect;
		
		$userId = $p['userId'];
		$itemId = $p['itemId'];
		
		//判断是否收藏
		$sql = "select * from favorite where itemId='$itemId' and userId='$userId'";
		$result = $connect->query($sql);
		
		$isFavorite = "false";
		if($result->num_rows>0)
		{
			$isFavorite = "true";
		}
		
		$data = array("isFavorite"=>$isFavorite);
		
		return json_response(0,"collect",$data);
	}
?>