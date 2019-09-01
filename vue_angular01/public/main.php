<?php

	function main_ads($p)
	{
		/*	
		$file = "../testdata/ads.json";
		$content = file_get_contents($file);
		
		return $content;
		*/
		global $connect;
		
		$array = array();
		
		$sql = "select * from article where is_hot=1";
		$result = $connect->query($sql);
		$rows = get_fetch_all($result);	
		for($i=0; $i<count($rows); $i++)
		{
			$row = $rows[$i];
			$row['hp_content'] = "";
			$rows[$i] = $row;
			
			$array[] = $row;
		}
		
		
		$sql = "select * from music where is_hot=1";
		$result = $connect->query($sql);
		$rows = get_fetch_all($result);	
		for($i=0; $i<count($rows); $i++)
		{
			$row = $rows[$i];
			$row['story'] = "";
			$rows[$i] = $row;
			
			$array[] = $row;
		}
		
		$sql = "select * from movie where is_hot=1";
		$result = $connect->query($sql);
		$rows = get_fetch_all($result);	
		for($i=0; $i<count($rows); $i++)
		{
			$row = $rows[$i];
			$rows[$i] = $row;
			
			$array[] = $row;
		}
		
		$data = json_response("0","ok 111",$array);
		
		return $data;
		 
	}
	
	function main_list($p)
	{		
//		$file = "../testdata/main.json";
//		$content = file_get_contents($file);
//		
//		return $content;

global $connect;
		
		$array = array();
		
		$sql = "select * from article where is_main_show=1";
		$result = $connect->query($sql);
		$rows = get_fetch_all($result);	
		for($i=0; $i<count($rows); $i++)
		{
			$row = $rows[$i];
			$row['hp_content'] = "";
			$rows[$i] = $row;
			
			$array[] = $row;
		}
		
		
		$sql = "select * from music where is_main_show=1";
		$result = $connect->query($sql);
		$rows = get_fetch_all($result);	
		for($i=0; $i<count($rows); $i++)
		{
			$row = $rows[$i];
			$row['story'] = "";
			$rows[$i] = $row;
			
			$array[] = $row;
		}
		
		$sql = "select * from movie where is_main_show=1";
		$result = $connect->query($sql);
		$rows = get_fetch_all($result);	
		for($i=0; $i<count($rows); $i++)
		{
			$row = $rows[$i];
			$rows[$i] = $row;
			
			$array[] = $row;
		}
		
		$data = json_response("0","ok 111",$array);
		
		return $data;
	}

?>