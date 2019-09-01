<?php

	function search_search($p)
	{		
		//$file = "../testdata/favorite_read.json";
		//$content = file_get_contents($file);
		
		
		global $connect;
		
		$keyword = $p['keyword'];
		
		$data = array();
		
		$array = array();
		{
			$sql = "select * from article where title like '%$keyword%'";
			$result = $connect->query($sql);
			$rows = get_fetch_all($result);
			for($i=0; $i<count($rows); $i++)
			{
				$row = $rows[$i];
				$row['hp_content'] = "";
				$rows[$i] = $row;
			}
			$data['read'] = $rows;
		}
		{
			$sql = "select * from music where title like '%$keyword%'";
			$result = $connect->query($sql);
			$rows = get_fetch_all($result);
			for($i=0; $i<count($rows); $i++)
			{
				$row = $rows[$i];
				$row['story'] = "";
				$rows[$i] = $row;
			}
			$data['music'] = $rows;
		}
		{
			$sql = "select * from movie where title like '%$keyword%'";
			$result = $connect->query($sql);
			$rows = get_fetch_all($result);
			
			$data['movie'] = $rows;
		}
		
	
		return json_response("0","ok", $data);
	}
?>