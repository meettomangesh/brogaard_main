<?php
class brogaard_portfolio 
{

	function WS_GET_BROGAARD_GAL()
	{
		global $row,$_POST; 
		$data = $_POST;
		$row=new DB;
		$evt_name=array();
		$sql="SELECT GAL_ID,GAL_NAME,GAL_SUB_TITLE FROM portfolio_galleries";
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
	
	function WS_GET_BROGAARD_GAL_IMG($gal_id)
	{
		global $row,$_POST; 
		$data = $_POST;
		$row=new DB;
		$evt_name=array();
		$sql="SELECT H_TITLE FROM home_slider where HS_ID=2 and GAL_ID='".$gal_id."' limit 0,1";
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
	
	function WS_GET_BROGAARD_GAL_IMAGES($gal_id)
	{
		global $row,$_POST; 
		$data = $_POST;
		$row=new DB;
		$evt_name=array();
		$sql="SELECT H_TITLE,H_IMAGE_NAME,H_IMG_DESC,GAL_NAME FROM home_slider,portfolio_galleries where HS_ID=2 and home_slider.GAL_ID='".$gal_id."' and home_slider.GAL_ID=portfolio_galleries.GAL_ID";
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
	
	function GAL_NAME_EXIST($gal_name)
	{
		global $row,$_POST; 
		$data = $_POST;
		$row=new DB;
		$gal_name=array();
		$sql="SELECT GAL_ID from portfolio_galleries where GAL_NAME='".$gal_name."'";
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
			$gal_name[]=$record;
		}
		return $gal_name;	
	}
	
}
?>