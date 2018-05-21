<?php
class royal_home
{

	function WS_GET_BROGAARD_ROYAL_ALL_IMG()
	{
		global $row,$_POST; 
		$data = $_POST;
		$row=new DB;
		$evt_name=array();
		
		$sql="SELECT H_TITLE, H_IMAGE_NAME, GAL_NAME, H_IMG_H, H_IMG_W
				FROM home_slider,royal_galleries 
				WHERE home_slider.HS_ID='4'
				AND home_slider.GAL_ID=royal_galleries.GAL_ID
				AND royal_galleries.GAL_NAME='default'";
		
		//$sql="SELECT H_TITLE,H_IMAGE_NAME FROM home_slider where HS_ID = 4 order by rand()";
		$db_query=$row->query($sql);
		while($client_result=$row->next_record())
		{
			$record = array();
			foreach(array_keys($client_result) as $key)
			{
			if(gettype($key)=="string")
				{
					$record[$key] = stripslashes(stripslashes($client_result[$key]));
				}
			}
			$evt_name[]=$record;
		}
		return $evt_name;	
	}
	
	function WS_ROYAL_GALLERIES()
	{
		global $row,$_POST; 
		$data = $_POST;
		$row=new DB;
		$evt_name=array();
			$sql="SELECT GAL_ID,GAL_NAME
				FROM royal_galleries
				WHERE GAL_NAME !='default'
				ORDER BY order_seq asc";
			
		//$sql="SELECT H_TITLE,H_IMAGE_NAME FROM home_slider where HS_ID = 4 order by rand()";
		$db_query=$row->query($sql);
		while($client_result=$row->next_record())
		{
			$record = array();
			foreach(array_keys($client_result) as $key)
			{
			if(gettype($key)=="string")
				{
					$record[$key] = stripslashes(stripslashes($client_result[$key]));
				}
			}
			$evt_name[]=$record;
		}
		return $evt_name;	
	}
	
	
	function WS_ROYAL_GALLERIES_IMAGES($GAL_ID)
	{
		global $row,$_POST; 
		$data = $_POST;
		$row=new DB;
		$evt_name=array();
		
		$sql="SELECT GAL_ID,H_TITLE
				FROM home_slider
				WHERE GAL_ID ='".$GAL_ID."'
				AND HS_ID='4'";
		
		//$sql="SELECT H_TITLE,H_IMAGE_NAME FROM home_slider where HS_ID = 4 order by rand()";
		$db_query=$row->query($sql);
		while($client_result=$row->next_record())
		{
			$record = array();
			foreach(array_keys($client_result) as $key)
			{
			if(gettype($key)=="string")
				{
					$record[$key] = stripslashes(stripslashes($client_result[$key]));
				}
			}
			$evt_name[]=$record;
		}
		return $evt_name;	
	}
	
}
?>