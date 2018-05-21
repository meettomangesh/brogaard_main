<?php
class search_functions 
{

	function WS_GET_SEARCH_RESULT($keywords, $limit='5')
	{
		global $row,$_POST; 
		$data = $_POST;
		$confirmed_clients = array();
        $row=new DB;
		
		$sql="SELECT * FROM home_slider WHERE H_IMAGE_NAME like '%".addslashes(addslashes($keywords))."%' OR H_TITLE like '%".addslashes(addslashes($keywords))."%' OR H_IMG_DESC like '%".addslashes(addslashes($keywords))."%' LIMIT $limit";
		
         $db_query=$row->query($sql);
		 
        	 while($client_result=$row->next_record())
			  {	
					$record = array();
					foreach(array_keys($client_result) as $key){
 				   	//echo gettype($key)."\n";
							if(gettype($key)=="string")
							{
								//array_push($record,$key,$client_result[$key]);
								$record[$key] = strip_tags(stripslashes(stripslashes(stripslashes(stripslashes($client_result[$key])))));
							}
					}
						
						$record['module']="home_slider";
						//$record['link_to_page']="fashion/column/id/";
						$confirmed_clients[]=$record;
			   }
		
		
		$sql="SELECT * FROM portfolio_galleries WHERE GAL_NAME like '%".addslashes(addslashes($keywords))."%' OR GAL_SUB_TITLE like '%".addslashes(addslashes($keywords))."%' LIMIT $limit" ;
		
			 
			 $db_query=$row->query($sql);
			 
        	 while($client_result=$row->next_record())
			  {	
					$record = array();
					foreach(array_keys($client_result) as $key){
 				   	//echo gettype($key)."\n";
							if(gettype($key)=="string")
							{
								//array_push($record,$key,$client_result[$key]);
								$record[$key] = strip_tags(stripslashes(stripslashes(stripslashes(stripslashes($client_result[$key])))));
							}
					}
						
						$record['module']="portfolio_galleries";
						//$record['link_to_page']="fashion/column/id/";
						$confirmed_clients[]=$record;
			   }
			 
			   
		    /*print_r($confirmed_clients);
			exit;*/
			return $confirmed_clients;	
	}
	
	function WS_GET_SEARCH_COUNT_RESULT($keywords)
	{
		global $row,$_POST; 
		$data = $_POST;
		$search_count = array();
        $row=new DB;
		
		
		$sql="SELECT COUNT(*) AS count FROM home_slider WHERE H_IMAGE_NAME like '%".$keywords."%' OR H_IMG_DESC like '%".$keywords."%'" ;
		
		
         $db_query=$row->query($sql);
        	 while($client_result=$row->next_record())
			  {	
					$record = array();
					foreach(array_keys($client_result) as $key){
 				   	//echo gettype($key)."\n";
							if(gettype($key)=="string")
							{
								//array_push($record,$key,$client_result[$key]);
								$record[$key] = strip_tags(stripslashes(stripslashes(stripslashes(stripslashes($client_result[$key])))));
							}
					}
						
						$record['module']="home_slider";
						//$record['link_to_page']="fashion/column/id/";
						$search_count[]=$record;
			   }
		
		$sql="SELECT COUNT(*) AS count FROM portfolio_galleries WHERE GAL_NAME like '%".$keywords."%' OR GAL_SUB_TITLE like '%".$keywords."%'" ;
		
			 $db_query=$row->query($sql);
        	 while($client_result=$row->next_record())
			  {	
					$record = array();
					foreach(array_keys($client_result) as $key){
 				   	//echo gettype($key)."\n";
							if(gettype($key)=="string")
							{
								//array_push($record,$key,$client_result[$key]);
								$record[$key] = strip_tags(stripslashes(stripslashes(stripslashes(stripslashes($client_result[$key])))));
							}
					}
						
						$record['module']="portfolio_galleries";
						//$record['link_to_page']="fashion/column/id/";
						$search_count[]=$record;
			   }
			   
		    //print_r($confirmed_clients);
			return $search_count;	
	}
	
	function WS_GET_SEARCH_RESULT1($limit='5')
	{
		global $row,$_POST; 
		$data = $_POST;
		$confirmed_clients = array();
        $row=new DB;
		
		$sql="SELECT * FROM home_slider LIMIT $limit" ;
		
         $db_query=$row->query($sql);
        	 while($client_result=$row->next_record())
			  {	
					$record = array();
					foreach(array_keys($client_result) as $key){
 				   	//echo gettype($key)."\n";
							if(gettype($key)=="string")
							{
								//array_push($record,$key,$client_result[$key]);
								$record[$key] = strip_tags(stripslashes(stripslashes(stripslashes(stripslashes($client_result[$key])))));
							}
					}
						
						$record['module']="home_slider";
						//$record['link_to_page']="fashion/column/id/";
						$confirmed_clients[]=$record;
			   }
		
		$sql="SELECT * FROM portfolio_galleries LIMIT $limit" ;
		
			 
			 $db_query=$row->query($sql);
        	 while($client_result=$row->next_record())
			  {	
					$record = array();
					foreach(array_keys($client_result) as $key){
 				   	//echo gettype($key)."\n";
							if(gettype($key)=="string")
							{
								//array_push($record,$key,$client_result[$key]);
								$record[$key] = strip_tags(stripslashes(stripslashes(stripslashes(stripslashes($client_result[$key])))));
							}
					}
						
						$record['module']="portfolio_galleries";
						//$record['link_to_page']="fashion/column/id/";
						$confirmed_clients[]=$record;
			   }
			   
		    //print_r($confirmed_clients);
			return $confirmed_clients;	
	}
	
	function WS_GET_SEARCH_COUNT_RESULT1()
	{
		global $row,$_POST; 
		$data = $_POST;
		$search_count = array();
        $row=new DB;
		
		
		$sql="SELECT COUNT(*) AS count FROM home_slider" ;
		
		
         $db_query=$row->query($sql);
        	 while($client_result=$row->next_record())
			  {	
					$record = array();
					foreach(array_keys($client_result) as $key){
 				   	//echo gettype($key)."\n";
							if(gettype($key)=="string")
							{
								//array_push($record,$key,$client_result[$key]);
								$record[$key] = strip_tags(stripslashes(stripslashes(stripslashes(stripslashes($client_result[$key])))));
							}
					}
						
						$record['module']="home_slider";
						//$record['link_to_page']="fashion/column/id/";
						$search_count[]=$record;
			   }
		
		$sql="SELECT COUNT(*) AS count FROM portfolio_galleries" ;
		
			 $db_query=$row->query($sql);
        	 while($client_result=$row->next_record())
			  {	
					$record = array();
					foreach(array_keys($client_result) as $key){
 				   	//echo gettype($key)."\n";
							if(gettype($key)=="string")
							{
								//array_push($record,$key,$client_result[$key]);
								$record[$key] = strip_tags(stripslashes(stripslashes(stripslashes(stripslashes($client_result[$key])))));
							}
					}
						
						$record['module']="portfolio_galleries";
						//$record['link_to_page']="fashion/column/id/";
						$search_count[]=$record;
			   }
			   
		    //print_r($confirmed_clients);
			return $search_count;	
	}
	
	function WS_GET_GAL_NAME($gal_id)
	{
		global $row,$_POST; 
		$data = $_POST;
		$row=new DB;
		$gal_name=array();
		$sql="SELECT GAL_NAME FROM portfolio_galleries where GAL_ID='".$gal_id."'";
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
	
	function WS_GET_IMAGE_NAME($gal_id)
	{
		global $row,$_POST; 
		$data = $_POST;
		$row=new DB;
		$image_name=array();
		$sql="SELECT H_TITLE FROM home_slider where GAL_ID='".$gal_id."' and HS_ID=2 order by rand() LIMIT 1,1";
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
			$image_name[]=$record;
		}
		return $image_name;
	}
}
?>