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
			
	$status = $morefunctions->ws_brogaard_registration();
				$json = $json . "{";
				$json = $json . "\"Registration\": [";				
				$json = $json . "{";
				$json = $json . "\"Status\": \"$status\"";
				$json = $json . "}";				
				$json = $json . "]";
				$json = $json . "}";
				
				echo $json;

?>