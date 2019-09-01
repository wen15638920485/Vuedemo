<?php
	
	//工具函数
	//作用:输入code,desc,数据, 返回json
	function json_response($code,$desc,$data)
	{
		$array = array("code"=>$code,"desc"=>$desc,"data"=>$data);
		return json_encode($array);
	}

?>