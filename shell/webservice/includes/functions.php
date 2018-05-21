<?php
  	//session_save_path("tmp");
	@session_start();
	@setcookie();
	
	
	function startsession($name,$value) {
	   $_SESSION[$name]=$value;
	}
	
    function Adminlogout() {
	  session_destroy();
	  header('location:login.php');
	}
	
	function AdminLogin() {
	  if($_SESSION['admin_id']) 
	     return true;
	   else
	    return false;	   
	}
    
	function redirect($url) {
      header('location:'.$url);
    }
	
	
	function dateformat($date)
	{
		$formatdate = explode("-",$date);
		$newformat = mktime(0,0,0,$formatdate[1],$formatdate[2],$formatdate[0]);
		return date("j F, Y", $newformat);
	}

	function admin_page($page_id = ''){
		global $row;
		if($page_id != ''){
			$page_query = $row->query("select * from pages where page_id ='".$page_id."'");
			$page_data = $row->next_record($page_query);
			$all_pages[] = array('page_id' => $page_data['page_id'],
							     'page_title' => stripslashes($page_data['page_title']),
							     'page_content' => stripslashes($page_data['page_content']),
							     'page_status' => $page_data['page_status']
							     );
		}else{
			$page_query = $row->query("select * from pages");
			while($page_data = $row->next_record($page_query)){
				$all_pages[] = array('page_id' => $page_data['page_id'],
								     'page_title' => stripslashes($page_data['page_title']),
								     'page_content' => stripslashes($page_data['page_content']),
								     'page_status' => $page_data['page_status']
								     );
			}
		}
		return $all_pages;
	}	
	
?>