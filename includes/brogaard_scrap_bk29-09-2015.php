<?php
class brogaard_scrap
{

	function WS_GET_BROGAARD_SCRAPBOOK_IMG()
	{
		global $row,$_POST; 
		$data = $_POST;
		$row=new DB;
		$evt_name=array();
		$sql="SELECT H_TITLE,H_IMAGE_NAME FROM home_slider where HS_ID=3 order by HID desc";
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