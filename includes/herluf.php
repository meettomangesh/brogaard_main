<?php
class herluf
{

	function get_herluf_derectory_data($directory_name)
	{
		global $row;
        $row=new DB;
		$sql="SELECT image_id,album_Id,image_path,(SELECT COUNT(album_Id) FROM image_data WHERE album_Id = 0 and image_album='".$directory_name."') as ulb_cnt FROM image_data WHERE image_album='".$directory_name."'";
					   
        $db_query=$row->query($sql);
		
		while($client_result=$row->next_record())
		{	
			$record = array();
			foreach(array_keys($client_result) as $key){
				if(gettype($key)=="string"){
					$record[$key] = stripslashes(stripslashes($client_result[$key]));
				}
			}
			$confirmed_clients[]=$record;
		}
		return $confirmed_clients;
	}
	
	// FINCTION RETURN THE PATH OF GALLARY IMAGES
	function get_gallery_directory($directory_name)
	{
		global $row;
        $row=new DB;
		$sql="SELECT image_directory,image_album,image_path FROM image_data 
					   WHERE image_album='".$directory_name."'
					   GROUP BY image_directory asc limit 0,2"; 
					   
        $db_query=$row->query($sql);
		
		while($client_result=$row->next_record())
		{	
			$record = array();
			foreach(array_keys($client_result) as $key){
				if(gettype($key)=="string"){
					$record[$key] = stripslashes(stripslashes($client_result[$key]));
				}
			}
			$confirmed_clients[]=$record;
		}
		return $confirmed_clients;
	}
	
	
	// function for sort data in gallery wise from table image_data 
	function GET_IMAGE_ALBUM($P_FILEDXY,$P_FILED4)
	{	//PUSH_NOTIFICATION_DEVICE_ID
		$img_query = mysql_query("SELECT distinct *  FROM `image_data` WHERE album_Id =0 and image_album='".$P_FILEDXY."' and image_directory='".$P_FILED4."' and `image_path` LIKE '%clientarea/".$P_FILEDXY."/".$P_FILED4."/%'");
	
		$str_l = strlen($P_FILEDXY);
		if($P_FILED4=='HD'){
			
			
		$str_l1 = 15+$str_l;
		$album_names = array();
		
		while($result = mysql_fetch_array($img_query)) {
			
			extract($result);
			$al_name = substr($image_path,$str_l1,10);
			if(in_array($al_name, $album_names)) {
				
			}
			else {
				array_push($album_names,$al_name);
			}
		}
		
		}// if statement
		else
		{
			$str_l1 = 22+$str_l;
		$album_names = array();
		
		while($result = mysql_fetch_array($img_query)) 
		{
			
			extract($result);
			$al_name = substr($image_path,$str_l1,10);
			if(in_array($al_name, $album_names)) 
			{
				
			}
			else 
			{
				array_push($album_names,$al_name);
			}
		}
		}
		
		return $album_names;
	}
	
	//COUNT NUMBERS OF RECORDS CREATED BY CHANDRAKANT BHAMARE on date 05/12/2014
	function COUNT_NUM_RECORD_COUNT($USR_ALB,$img_path_store)
	{
		global $row,$_POST; 
		$data = $_POST;
		$row=new DB;
		$sql="SELECT count(*) 
			  FROM 	user_album_master 
			  WHERE	album_name='".$USR_ALB."'
			  AND album_path ='".$img_path_store."'";
		$db_query=$row->query($sql);
		$total = mysql_fetch_array($db_query);
		return $total[0]; 
		
	}
	
	function F_GET_DATA_FOR_ALBUM($P_FILEDXY,$P_FILED4)
	{
		global $row;
        $row=new DB;
		$sql="SELECT album_id,image_path FROM image_data
			WHERE 	image_album='".$P_FILEDXY."'
			AND		image_directory='".$P_FILED4."' 
			AND		album_Id = 0"; 
		
        $db_query=$row->query($sql);
		
        while($client_result=$row->next_record())
		{	
			$record = array();
			foreach(array_keys($client_result) as $key){
				if(gettype($key)=="string"){
					$record[$key] = stripslashes(stripslashes($client_result[$key]));
				}
			}
			$confirmed_clients[]=$record;
		}
		return $confirmed_clients;
	}
	
	function F_REURUN_DATA_FROM_ALBUM($UL_GAL,$img_path_store)
	{
		global $row;
        $row=new DB;
		$sql="SELECT album_id FROM user_album_master
			WHERE 	album_name='".$UL_GAL."'
			AND		album_path='".$img_path_store."'
			AND		album_flag='1'"; 
        $db_query=$row->query($sql);
		
        while($client_result=$row->next_record())
		{	
			$record = array();
			foreach(array_keys($client_result) as $key){
				if(gettype($key)=="string"){
					$record[$key] = stripslashes(stripslashes($client_result[$key]));
				}
			}
			$confirmed_clients[]=$record;
		}
		return $confirmed_clients;
	}
	
	function F_GET_DATA($P_FILEDXY)
	{
		global $row;
        $row=new DB;
		$sql="SELECT * FROM user_album_master
		where album_path like '%".$P_FILEDXY."%'"; 
		
        $db_query=$row->query($sql);
		
        while($client_result=$row->next_record())
		{	
			$record = array();
			foreach(array_keys($client_result) as $key){
				if(gettype($key)=="string"){
					$record[$key] = stripslashes(stripslashes($client_result[$key]));
				}
			}
			$confirmed_clients[]=$record;
		}
		return $confirmed_clients;
	}
	
	//COUNT NUMBERS OF RECORDS CREATED BY CHANDRAKANT BHAMARE on date 05/12/2014
	function COUNT_USER_COUNT($USR_ID,$ALB_ID)
	{
		global $row,$_POST; 
		$data = $_POST;
		$row=new DB;
		$sql="SELECT count(*) 
			  FROM 	user_image_albums 
			  WHERE	userid='".$USR_ID."'
			  AND album_id='".$ALB_ID."'";
		$db_query=$row->query($sql);
		$total = mysql_fetch_array($db_query);
		return $total[0]; 
		
	}
	
	
}
?>