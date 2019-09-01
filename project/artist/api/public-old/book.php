<?php
	
	include_once("tool.php");
	
	function book_bookGroupList($p)
	{		
		$json_result = array();
		
		global $connect;
		
		//获取 dou_book中的数据
		$sql = "select * from dou_book";
		$db_result = $connect->query($sql);
		while($row = $db_result->fetch_assoc())
		{
			//$row是一个字典,对应着一本书
			//echo $row['name'];
			$json_result[] = $row;
		}
		
		return json_response(0,"请求成功",$json_result);
		
	}
	function book_bookDetail($p)
	{
		
		$json_result = array();
		
		global $connect;
		
		$id = isset($p['id'])?$p['id']:"1";
		
		//php  '' "",区别, ""的$var替换为对应的值, ''不替换
		$sql = "select * from dou_book where id=$id";
		$db_result = $connect->query($sql);
		
		if($db_result->num_rows == 0)
		{
			//0 成功
			//1 数据库连接失败
			//2 请求失败
			return json_response(2,"请求失败,没有数据",array());
		}
		
		//如果有数据,拿出一行
		$row = $db_result->fetch_assoc();
		
		//返回数据
		return json_response(0,"请求成功",$row);
		
	}
	function book_saveFavorite($p)
	{
		if(isset($p['bookId']) == false 
			|| isset($p['userId']) == false)
		{
			return json_response(2,"缺少参数",$row);
		}
		$userId = $p['userId'];
		$bookId = $p['bookId'];
		
		//检查书的id存在不存在
		//检查用户的id存在不存在
		//检查以前是否收藏过
		
		//插入收藏表
		//book-1, music-2,film-3
		$sql = "insert into dou_favorite(userId,mediaId,type) values($userId,$bookId,1)";
		global $connect;
		$r = $connect->query($sql);
		if(!$r)
		{
			return json_response(2,"插入失败",array());
		}
		return json_response(0,"插入成功",array());
		
	}
	function book_cancelFavorite($p)
	{
		if(isset($p['bookId']) == false 
			|| isset($p['userId']) == false)
		{
			return json_response(2,"缺少参数",$row);
		}
		$userId = $p['userId'];
		$bookId = $p['bookId'];
		
		//检查书的id存在不存在
		//检查用户的id存在不存在
		
		//删除收藏表中记录
		//book-1, music-2,film-3
		$sql = "delete from dou_favorite where userId=$userId and mediaId=$bookId";
		global $connect;
		$r = $connect->query($sql);
		if(!$r)
		{
			return json_response(2,"删除失败",array());
		}
		return json_response(0,"删除成功",array());
	}
	function book_rating($p)
	{
		if(isset($p['bookId']) == false 
			|| isset($p['userId']) == false
			|| isset($p['rating']) == false)
		{
			return json_response(2,"缺少参数",$row);
		}
		$userId = $p['userId'];
		$bookId = $p['bookId'];
		$rating = $p['rating'];
		
		//检查书的id存在不存在
		//检查用户的id存在不存在
		//检查以前是否收藏过
		
		global $connect;
		
		//删除以前的打分
		$sql = "delete from dou_rating where userId=$userId and mediaId=$bookId";
		$r = $connect->query($sql);
		
		
		//插入打分表
		//book-1, music-2,film-3
		$sql = "insert into dou_rating(userId,mediaId,rating) values($userId,$bookId,$rating)";
		
		$r = $connect->query($sql);
		if(!$r)
		{
			return json_response(2,"插入失败",array());
		}
		return json_response(0,"插入成功",array());
	}





?>