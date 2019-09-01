<?php

	include_once("../database/connect.php");
	$connect = connect_database();
	

	function music_list($p)
	{		
		//$file = "../testdata/read.json";
		//$content = file_get_contents($file);
		
		global $connect;
		
		
		$start = isset($p['start'])?$p['start']:"0";
		$count = isset($p['count'])?$p['count']:"10";
		
	
		$sql = "select * from music limit $start,$count";
		$result = $connect->query($sql);
		$rows = get_fetch_all($result);	
		for($i=0; $i<count($rows); $i++)
		{
			$row = $rows[$i];
			$row["story"] = "";
			
			$rows[$i] = $row;
		}
		
		$content = json_response("0","ok 111",$rows);
		
		return $content;

	}
	function music_detail($p)
	{		
		//$file = "../testdata/readDetail.json";
		//$content = file_get_contents($file);
		
		global $connect;
		
		
		if(!isset($p["id"]) || $p["id"]<0)
		{
			return json_response("1","ok 222",array());
		}
		
		$detailId = $p["id"];
		$sql = "select * from music where id=$detailId";
		$result = $connect->query($sql);
		$row = $result->fetch_assoc();
		
		$row['story'] = base64_encode($row['story']);
		
		$reponse = json_response("0","ok 222",$row);
		return $reponse;
	}

?>