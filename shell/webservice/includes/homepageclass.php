<?php
class hompageclass extends mainclass{
	var $productdata=array();
	var $image="";
	var $tmp_name="";
	var $fashion_images_dest="projectimages";
	var $error="";
	var $image_type="";
	 
	 
    
	function __construct() {
		
	}
	  





function get_homepage()
	{
		global $row,$_POST; 
		$data = $_POST;
        $row=new DB;
		 
  	   $sql="SELECT * FROM homepage where hp_srno ='1' limit 0,1 ";
		 
		 $db_query=$row->query($sql);
        	 while($client_result=$row->next_record())
			  {	
					$record = array();
					foreach(array_keys($client_result) as $key){
 				   	//echo gettype($key)."\n";
							if(gettype($key)=="string")
							{
								//array_push($record,$key,$client_result[$key]);
								$record[$key] = stripslashes(stripslashes($client_result[$key]));
							}
					}
						$confirmed_clients[]=$record;
			   }
				
				//print_r($confirmed_clients);
			return $confirmed_clients;
	}




function  updatehomepage(){
            global $row,$_POST,$_FILES,$err_msg;
			 $err_msg="";
			 $data = $_POST;

				
				
				$row=new DB;
		  	 	
			 //$prd_sr_no = trim(filter_var($data['prd_sr_no'], FILTER_SANITIZE_NUMBER_INT)) ;	
			 
			 $what_is_desc=trim(filter_var($data['what_is_desc'], FILTER_SANITIZE_STRING));
			 $what_istext1=trim(filter_var($data['what_istext1'], FILTER_SANITIZE_STRING));
			 $what_istext2=trim(filter_var($data['what_istext2'], FILTER_SANITIZE_STRING));
			 $what_istext3=trim(filter_var($data['what_istext3'], FILTER_SANITIZE_STRING));
			 $whatisreadmore=trim(filter_var($data['whatisreadmore'], FILTER_SANITIZE_STRING));

			 $our_desc=trim(filter_var($data['our_desc'], FILTER_SANITIZE_STRING));
			 $our_text1=trim(filter_var($data['our_text1'], FILTER_SANITIZE_STRING));
			 $our_text2=trim(filter_var($data['our_text2'], FILTER_SANITIZE_STRING));
			 $our_text3=trim(filter_var($data['our_text3'], FILTER_SANITIZE_STRING));
			 $ourreadmore=trim(filter_var($data['ourreadmore'], FILTER_SANITIZE_STRING));
			 
			 $get_desc=trim(filter_var($data['get_desc'], FILTER_SANITIZE_STRING));
			 $get_text1=trim(filter_var($data['get_text1'], FILTER_SANITIZE_STRING));
			 $get_text2=trim(filter_var($data['get_text2'], FILTER_SANITIZE_STRING));
			 $get_text3=trim(filter_var($data['get_text3'], FILTER_SANITIZE_STRING));
			 $get_readmore=trim(filter_var($data['get_readmore'], FILTER_SANITIZE_STRING));
			 
			
			
			 			
				
			
				
			$row->query("update homepage set 
						what_is_desc = '".$this->no_injection(addslashes($what_is_desc))."',
						what_istext1 = '".$this->no_injection(addslashes($what_istext1))."',
						what_istext2 = '".$this->no_injection(addslashes($what_istext2))."',
						what_istext3 = '".$this->no_injection(addslashes($what_istext3))."',
						whatisreadmore = '".$this->no_injection(addslashes($whatisreadmore))."',
						our_desc = '".$this->no_injection(addslashes($our_desc))."',
						our_text1 = '".$this->no_injection(addslashes($our_text1))."',
						our_text2 = '".$this->no_injection(addslashes($our_text2))."',
						our_text3 = '".$this->no_injection(addslashes($our_text3))."',
						ourreadmore = '".$this->no_injection(addslashes($ourreadmore))."',
						get_desc = '".$this->no_injection(addslashes($get_desc))."',
						get_text1 = '".$this->no_injection(addslashes($get_text1))."',
						get_text2 = '".$this->no_injection(addslashes($get_text2))."',
						get_text3 = '".$this->no_injection(addslashes($get_text3))."',
						get_readmore = '".$this->no_injection(addslashes($get_readmore))."'
						where hp_srno='1' ");

			
			//	header('location: edit_products.php?prd_sr_no='.$prd_sr_no.'&msg=Product Content Updated Sucessfully.');
				
			return "Home Page Updated Sucessfully.";
								
								
			
		}
	






}
?>