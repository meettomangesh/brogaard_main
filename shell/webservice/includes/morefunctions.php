<?php
class  morefunctions extends generalfunction  {
	var $productdata=array();
	var $image="";
	var $photo_name = "";
	var $tmp_name="";
	var $error="";
	var $image_type="";
	var $modelimages="..\shell\modelimages";
/*	var $fashion_images_thumb="projectimages_thumb";*/
    
	function __construct() 
	{
		
	}
	
	function ws_brogaard_registration(){
		
		global $row, $_POST, $username, $password, $firstname, $lastname, $email, $username, $password, $phone, $usertype, $activationkey, $date_created, $group1, $usertype_default, $redirect, $insertid, $companyname, $companytype, $companycomments,$modelgender, $modelbirth, $modelskincolor, $modeleyecolor, $modelhaircolor, $modelheight, $modeltype, $modeladdress, $modelcity, $modelavailability, $modelcomments;
		
		$row=new DB;
		$data = $_GET;
		
		$firstname = filter_var($_REQUEST['firstname'], FILTER_SANITIZE_STRING);
		$lastname = filter_var($_REQUEST['lastname'], FILTER_SANITIZE_STRING);
		$email = filter_var($_REQUEST['email'], FILTER_SANITIZE_EMAIL);
		$username = filter_var($_REQUEST['username'], FILTER_SANITIZE_STRING);
		$password = filter_var($_REQUEST['password'], FILTER_SANITIZE_STRING);
		$phone = filter_var($_REQUEST['phone'], FILTER_SANITIZE_NUMBER_INT);
		$usertype = filter_var($_REQUEST['usertype'], FILTER_SANITIZE_STRING);
		$date_created = date('Y-m-d');
		$group1 = 'Users';
		$usertype_default = 'private';
		$redirect = '';
				
		$activationkey =  $row->generateCode();
		
		if(isset($_REQUEST['firstname']) && isset($_REQUEST['lastname']) && isset($_REQUEST['email']) && isset($_REQUEST['username']) && isset($_REQUEST['password']) && isset($_REQUEST['phone'])){
			
			if(!empty($_REQUEST['firstname']) && !empty($_REQUEST['lastname']) && !empty($_REQUEST['email']) && !empty($_REQUEST['username']) && !empty($_REQUEST['password']) && !empty($_REQUEST['phone'])){
			
			//Email part start's here
			
			$adminemail = 'steen@brogaard.com';
			$Nameedit = "brogaard.com";
			$frommailedit = "noreply@brogaard.com";
			$subjectedit = "New user registration";
			$bodyedit = "Hello admin,\r\nYou have new user:\r\n\r\n";
			$bodyedit .= "First Name: $firstname\r\n";
			$bodyedit .= "Last Name: $lastname\r\n";
			$bodyedit .= "Email: $email\r\n";
			$bodyedit .= "Phone: $phone\r\n";
			$bodyedit .= "Royal Access: $royalaccess\r\n";
			$bodyedit .= "Newsletter: $newsletter\r\n";
			$bodyedit .= "Username: $username\r\n";
			$bodyedit .= "Password: $password\r\n";
			
			echo "default body:\r\n".$bodyedit;
			//Ends here
				
			echo "<br>".$sql="INSERT INTO authorize_new(firstname,lastname,email,username,group1,usertype,redirect,date_created,phone,activationkey) 
				   VALUES ('".($this->no_injection(addslashes($firstname)))."',
				   		   '".($this->no_injection(addslashes($lastname)))."',
						   '".($this->no_injection(addslashes($email)))."',
						   '".($this->no_injection(addslashes($username)))."',
				   		   '".($this->no_injection(addslashes($group1)))."',
						   '".($this->no_injection(addslashes($usertype_default)))."',
						   '".($this->no_injection(addslashes($redirect)))."',
						   '".($this->no_injection(addslashes($date_created)))."',
						   '".($this->no_injection(addslashes($phone)))."',
						   '".($this->no_injection(addslashes($activationkey)))."'
						   ))";
						   
				//$db_query=$row->query($sql);		
				
				$insertid = $row->get_last_id();
		
				echo "<br>".$sql2 = "UPDATE authorize_new 
						 SET password=password('$password') 
						 WHERE id='".(int)$insertid."'";
				//$db_query2 = $row->query($sql2);
								
			}
		}
		
						
		if($usertype == 'company'){
		
			$companyname = filter_var($_REQUEST['companyname'], FILTER_SANITIZE_STRING);
			$companytype = filter_var($_REQUEST['companytype'], FILTER_SANITIZE_STRING);
			$companycomments = filter_var($_REQUEST['companycomments'], FILTER_SANITIZE_STRING);
			
			
			echo "<br>".$sql3 = "UPDATE authorize_new 
					 SET usertype='company' 
					 WHERE id='".(int)$insertid."'";
			//$db_query3 = $row->query($sql3);
			
			
			echo "<br>".$sql4 = "INSERT INTO authorize_details(authorize_id,companyname,companytype,companycomments) 
			         VALUES ('".($this->no_injection(addslashes($insertid)))."',
				   		     '".($this->no_injection(addslashes($companyname)))."',
						     '".($this->no_injection(addslashes($companytype)))."',
						     '".($this->no_injection(addslashes($companycomments)))."'
					)";
			//$db_query4 = $row->query($sql4);
						
			//email copamy details start
			$bodyedit .= "Company name: $companyname\r\n";
			$bodyedit .= "Company Type: $companytypes\r\n";
			$bodyedit .= "Comments: $companycomments\r\n";
			
			echo "Company boby".$bodyedit;
			//email company body end
		}
		else if ($usertype == 'model'){
			
			$modelgender = filter_var($_REQUEST['modelgender'], FILTER_SANITIZE_STRING);
			$modelbirth = filter_var($_REQUEST['modelbirth'], FILTER_SANITIZE_STRING);
			$modelskincolor = filter_var($_REQUEST['modelskincolor'], FILTER_SANITIZE_STRING);			
			$modeleyecolor = filter_var($_REQUEST['modeleyecolor'], FILTER_SANITIZE_STRING);			
			$modelhaircolor = filter_var($_REQUEST['modelhaircolor'], FILTER_SANITIZE_STRING);
			$modelheight = filter_var($_REQUEST['modelheight'], FILTER_SANITIZE_STRING);
			$modeltype = filter_var($_REQUEST['modeltype'], FILTER_SANITIZE_STRING);
			$modeladdress = filter_var($_REQUEST['modeladdress'], FILTER_SANITIZE_STRING);
			$modelcity = filter_var($_REQUEST['modelcity'], FILTER_SANITIZE_STRING);
			$modelavailability = filter_var($_REQUEST['modelavailability'], FILTER_SANITIZE_STRING);
			$modelcomments = filter_var($_REQUEST['modelcomments'], FILTER_SANITIZE_STRING);
			//$modelimages = filter_var($_REQUEST['modelimages'], FILTER_SANITIZE_STRING);
			
			if(isset($_REQUEST['modelcity'])){
				if(!empty($modelcity)){
					
					$bodyedit .= "Gender: $modelgender\r\n";
					$bodyedit .= "Birth: $modelbirth\r\n";
					$bodyedit .= "Skin: $modelskincolor\r\n";
					$bodyedit .= "Eye: $modeleyecolor\r\n";
					$bodyedit .= "Hair: $modelhaircolor\r\n";
					$bodyedit .= "Height: $modelheight\r\n";
					$bodyedit .= "Type: $modeltype\r\n";
					$bodyedit .= "Address: $modeladdress\r\n";
					$bodyedit .= "City: $modelcity\r\n";
					$bodyedit .= "Availability: $modelavailability\r\n";
					$bodyedit .= "Comment: $modelcomments\r\n";					
					
					echo "model details:".$bodyedit;
					
					for($mi=1;$mi<=100;$mi++) {
				
						if($mi==0)
						{
							$mi_name = "filename";
							$modelimages = filter_var($data['modelimages'], FILTER_SANITIZE_STRING);
						}	
						else 
						{
							$mi_name = "filename_".$mi;
							$modelimages = filter_var($data['modelimages_'.$mi], FILTER_SANITIZE_STRING);
						}
						
						if($_FILES[$mi_name]['name'])
						{				 	
							$extention = explode(".",$_FILES[$mi_name]['name']);
							if(($extention[1]!="jpg") && ($extention[1]!="gif") && ($extention[1]!="png"))
							{
								return "Please upload only Image Format ".$_FILES[$mi_name]['name']."";
							}
							
							$this->photo_name=$_FILES[$mi_name]['name'];
							$filename = $_FILES[$mi_name]['name'];
							
							if (file_exists("../".$this->modelimages."/".$filename)) {
								$this->photo_name=time()."".rand(1, 1000000).".".$extention[1];
								$filename = $this->photo_name;
							}
										
							$this->tmp_name=$_FILES[$mi_name]['tmp_name'];
							$this->upload_image($mi_name,$this->modelimages.'/',$this->photo_name,'','');
						}			
					}
					
						echo "<br>".$sql3 = "UPDATE authorize_new 
								 SET usertype='model' 
								 WHERE id='".(int)$insertid."'";
						//$db_query3 = $row->query($sql3);
						
						
						echo "<br>".$sql4 = "INSERT INTO authorize_details(authorize_id, modelgender, modelbirth, modelskincolor, modeleyecolor, modelhaircolor, modelheight, modeltype, modeladdress, modelcity, modelavailability, modelcomments, modelimages) 
								 VALUES ('".($this->no_injection(addslashes($insertid)))."',
										 '".($this->no_injection(addslashes($modelgender)))."',
										 '".($this->no_injection(addslashes($modelbirth)))."',
										 '".($this->no_injection(addslashes($modelskincolor)))."',
										 '".($this->no_injection(addslashes($modeleyecolor)))."',
										 '".($this->no_injection(addslashes($modelhaircolor)))."',
										 '".($this->no_injection(addslashes($modelheight)))."',
										 '".($this->no_injection(addslashes($modeltype)))."',
										 '".($this->no_injection(addslashes($modeladdress)))."',
										 '".($this->no_injection(addslashes($modelcity)))."',
										 '".($this->no_injection(addslashes($modelavailability)))."',
										 '".($this->no_injection(addslashes($modelcomments)))."',
										 '".($this->no_injection(addslashes($modelimages)))."'							 
								)";
						//$db_query4 = $row->query($sql4);									
				}
			}
		}	
		
		$Name = "brogaard.com";
		$email2 = "<noreply@brogaard.com>";
		$subject = "Account activation on brogaard.com";
		$body = "Hello $firstname,\r\nWelcome to our website!\r\n\r\nYou, or someone using your email address, has completed registration at brogaard.com. Your activation code : $activationkey\r\nhttp://www.brogaard.com/shell/activate.html\r\n\r\nIf this is an error, ignore this email.\r\n\r\nRegards";
		$header = "From: ". $Name .' '.htmlspecialchars($email2)."\r\n";
		mail($email, $subject, $body, $header);
				
	}
	
	
	######### Check Injection ################
	function no_injection($string){
	
		//$string = htmlspecialchars($string);
		//$string = trim($string);
		//$string = stripslashes($string);
		$string = mysql_real_escape_string($string);
		return $string;
	}
	######### End of Check Injection ################
	
}
?>