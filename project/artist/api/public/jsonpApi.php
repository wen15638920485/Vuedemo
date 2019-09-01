<?php
	
	header('Content-type:application/json');
	
	$jsoncallback = $_GET['callback'];
	
	$json_data = '"大家好"';
	
	//json_response
	echo $jsoncallback ."(".$json_data.")";
?>