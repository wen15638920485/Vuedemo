<?php
	
	include_once("tool.php");
	
	function favorite_saveFavorite($p)
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
	function favorite_cancelFavorite($p)
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

?>