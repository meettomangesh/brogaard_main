<?php 
	ob_start();
	$current_server = $_SERVER['HTTP_HOST'];
	if($current_server == "ocsr122.no-ip.biz:5060/")
	{
	$basehref = "http://ocsr122.no-ip.biz:5060/brogaard/webservice";
	}
	else
	{
	$basehref = "http://".$_SERVER['HTTP_HOST'];
	}
	include ("database/connection.php");
	include("includes/generalfunction.php");
	include("includes/morefunctions.php");
	
	$morefunctions = new morefunctions;
	
	$username = filter_var($_REQUEST['username'], FILTER_SANITIZE_STRING);
	$password = filter_var($_REQUEST['password'], FILTER_SANITIZE_STRING);
		
	$status = $morefunctions->ws_brogaard_user_login();
		$json = $json . "{";
		$json = $json .$status;				
		$json = $json . "}";
				
	echo $json;

?>