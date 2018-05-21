<?php 
	ob_start();
	$current_server = $_SERVER['HTTP_HOST'];
	if($current_server == "localhost"){
		$basehref = "http://localhost/a";
	}
	else{
		$basehref = "http://".$_SERVER['HTTP_HOST'];
	}
?>