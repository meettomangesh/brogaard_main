<?php
 class login {
     
	 var $userdata=array();
	 var $userdetails=array();
	 var $message;
	 var $error=0;
	 var $row=NULL;
	 
	 function __login() {
	  $this->row=new DB;
	 }
	
	
	
	
	
	
	 function resource_user_login() {
  	    $row=new DB2;
		
		$row2=new DB2;
		
		//$password = md5($_POST['password']);
		$password = $_POST['password'];
		
		$siteid = $_POST['siteid'];
      
	    $sql="select * from resource_users where username='".$this->no_injection($_POST['username'])."' and password='".$this->no_injection($password)."' and siteid='".$siteid."' and block_user='0' " ;
        $db_query=$row->query($sql);
	    $result = mysql_fetch_array($db_query);
	
	 if (mysql_num_rows($db_query) > 0){
	    
		startsession('resource_user',$result['resource_user']);
		startsession('siteid',$result['siteid']);
	
		startsession('lastlogin',$result['lastlogin']);



	    $sql="update resource_users set lastlogin ='".date('l jS \of F Y h:i:s A')."' where username='".$this->no_injection($_POST['username'])."' and password='".$this->no_injection($password)."' and siteid='".$siteid."' " ;
        $db_query=$row2->query($sql);

		
		
		redirect("safari-resources.php");
	 } else {
		$errormessage="Invalid username or password";
		return  $errormessage;
     }
  	
   }
	
	
	
	
	
	
	 

   function admin_login() {
  	    $row=new DB;
		
		$password = md5($_POST['admin_password']);
      
	    $sql="select * from admin where username='".$this->no_injection($_POST['admin_name'])."' and password='".$this->no_injection($password)."'" ;
        $db_query=$row->query($sql);
	    $result = mysql_fetch_array($db_query);
	
	 if (mysql_num_rows($db_query) > 0){
	    startsession('id',$result['id']);
		redirect("manage_home_page.php");
	 } else {
		$errormessage="Invalid username or password";
		return  $errormessage;
     }
  	
   }
   
   function  updateprofile(){

	 $row=new DB;
	
	$password = md5($_POST['admin_password_new']);
	if(trim($_POST['admin_password_new'])=="")
	{
		 $row->query("update admin set emailid='".$this->no_injection($_POST['resource_email'])."' where id='".$this->no_injection($_SESSION['id'])."'"); 
	}
	else
	{
		 $row->query("update admin set password='".$this->no_injection($password)."' 
	 ,emailid='".$this->no_injection($_POST['resource_email'])."' where id='".$this->no_injection($_SESSION['id'])."'"); 
	}
	
	$error_msg = "Your profile successfully Updated";
	 return $error_msg;
   }
   
   
   function  getadmindetails(){
	 $row=new DB;
	 $result = $row->query("select * from admin where id ='".$_SESSION['id']."'"); 
	 $show_result = mysql_fetch_array($result);
	 return $show_result;
   }






function forgot_password() {
  	    $row=new DB;
		
		

	 $chk_mail = $row->query("select * from admin where emailid  = '".$_POST['admin_email']."'");
	

	if($row->num_rows($chk_mail))
	{
		$chk_data = $row->next_record($chk_mail);
        $repassword = array("a", "b", "c", "d", "e", "f", "g", "h", "k", "m", "n", "p", "q", "r", "s", "t", "w", "x", "y", "z", "1", "2", "3", "4", "5", "6", "7", "8", "9");
		$length = 7;
		$index = 0;
        $password = "";
        while($index < $length){
           $password .= $repassword[array_rand($repassword)];
           $index++;
        }

		$message = "Hi " . $chk_data['fname'] . ",\n\n";
		$message .= "Username: " . $chk_data['username'] . ", \n";
		$message .= "Password: " . $password . "\n\n";
		$subject = 'Admin Password';
		
		if(mail($chk_data['emailid'], $subject, $message))
		{ 
			$row->query("update admin set password = '".md5($password)."'");
			return $msg = 'Your Password has been reset sucessfully. Please check your email for new password.';
		}

	}else
	{
		return $msg = 'Unable to send mail. Please Contact Administrator.';
	}

  	
   }
   
   
   
   function forgot_password_new($email='') {
  	    $row=new DB2;
		$resource_user = trim(filter_var($_GET['resource_user'], FILTER_SANITIZE_STRING));
		if($email!=''){
		 $chk_mail = $row->query("select * from resource_users where email  = '".$email."'");
		} else {
		

	 $chk_mail = $row->query("select * from resource_users where email  = '".$_POST['resource_email']."'");
	}

	if($row->num_rows($chk_mail))
	{
		$chk_data = $row->next_record($chk_mail);
        $repassword = array("a", "b", "c", "d", "e", "f", "g", "h", "k", "m", "n", "p", "q", "r", "s", "t", "w", "x", "y", "z", "1", "2", "3", "4", "5", "6", "7", "8", "9");
		$length = 7;
		$index = 0;
        $password = "";
        while($index < $length){
           $password .= $repassword[array_rand($repassword)];
           $index++;
        }

		$message = "Hi " . $chk_data['name'] . ",\n\n";
		$message .= "Username: " . $chk_data['username'] . ", \n";
		$message .= "Password: " . $password . "\n\n";
		$subject = 'Account Password';
		$row->query("update resource_users set password = '".$password."' where resource_user='".$resource_user."'");
		if(mail($chk_data['email'], $subject, $message))
		{ 
			$row->query("update resource_users set password = '".$password."' where resource_user='".$resource_user."'");
			return $msg = 'Your Password has been reset sucessfully. Please check your email for new password.';
		}

	}else
	{
		return $msg = 'Unable to send mail. Please Contact Administrator.';
	}

  	
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