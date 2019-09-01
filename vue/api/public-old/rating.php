<?php
	
	include_once("tool.php");
	
	function rating_rating($p)
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
			return json_response(2,"评分失败",array());
		}
		return json_response(0,"评分成功",array());
	}





?>