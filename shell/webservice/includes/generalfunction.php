<?php
	class generalfunction {
	
	var $productdata=array();
	var $image="";
	var $tmp_name="";
	var $error="";
	var $image_type="";
	var $fashion_images_dest="projectimages";
	var $fashion_images_thumb="projectimages_thumb";
    
		
	function __construct() 
	{
		
	}
	
	function ws_brogaard_user_login()
	{
		global $row,$_POST,$username,$password;
		$row=new DB;
		$data = $_POST;
		
		//$username = filter_var($data['username'], FILTER_SANITIZE_STRING);
		//$password = filter_var($data['password'], FILTER_SANITIZE_STRING);
		
		
		$sql = "SELECT * FROM authorize_new WHERE (username='".$row->clean_mysql($username)."' or email='".$row->clean_mysql($username)."') and password=PASSWORD('".$row->clean_mysql($password)."') LIMIT 1";
			
		$db_query=$row->query($sql);
		$num_count = mysql_num_rows($db_query);
		$result = mysql_fetch_array($db_query);
		
		//var_dump($result);
		
	 	if (mysql_num_rows($db_query) > 0)
		{
			$flag ="1";
		} else {
			$flag ="0";
		}	
		$id1= $result['id'];	
		$username1= $result['firstname']." ".$result['lastname'];
		$dirpath1= $result['redirect'];
		
		$json = $json . "\"status\" :\"$flag\",";
		$json = $json . "\"id\" :\"$id1\",";
		$json = $json . "\"username\" :\"$username1\",";
		$json = $json . "\"dirpath\" :\"$dirpath1\"";
				
		return $json;
	}
	 

/////////////////////////////////////////////////////////////////////////////////////
	
}
?>