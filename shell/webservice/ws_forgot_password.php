<?php
	ob_start();
	$current_server = $_SERVER['HTTP_HOST'];
	if($current_server == "ocsr122.no-ip.biz:5060/")
	{
	$basehref = "http://ocsr122.no-ip.biz:5060/brogaard/webservice";
	}
	else
	{
	$basehref = "http://".$_SERVER['HTTP_HOST'];
	}
	include ("database/connection.php");
	include("includes/generalfunction.php");
	include("includes/morefunctions.php");
	
	$morefunctions = new morefunctions;
	
	$msg=filter_var($_REQUEST['msg'], FILTER_SANITIZE_STRING);
	
	

// array for JSON response
$response = array();

// check for required fields

if (isset($_GET['email'])) {
	$email = $_GET['email'];	
	
	$sql = "SELECT * FROM AUTHORIZE_NEW WHERE email='".$row->clean_mysql($email)."'";
	
	$sql_rs = mysql_query($sql);
	
	$num = mysql_num_rows($sql_rs);	
	
	if ($num == 0) {
		//echo "no";
		//exit;
		} else { 
		$result = mysql_fetch_array($sql_rs);
			$uname 		= $result['username'];
			$email 		= $result['email'];
			$firstname 	= $result['firstname'];	
		
			$newpass = rand(10000000,99999999);
			
			$sql1 = "UPDATE AUTHORIZE_NEW SET password=password('$newpass'), pchange='1' WHERE email='".$row->clean_mysql($email)."'";
			
			$sql_rs1 = mysql_query($sql1);
			
			$Name = "brogaard.com";
			$email2 = "noreply@brogaard.com";
			$subject = "Forgotten password on brogaard.com";
			$body = "Hello $firstname,\nYour username: $uname \nYour new password for login is : $newpass";
			$header = "From: ". $Name . " <" . $email2 . ">\r\n";
			mail($email, $subject, $body, $header);
	
			$adminemail = 'steen@brogaard.com';
			$subject2 = "Forgotten password request on brogaard.com";
			$body2 = "Hello admin,\nA user with the username of $uname has requested a username and password reminder.\n\n Username: $uname \n E-mail: $email \n New password: $newpass";
			$header2 = "From: ". $Name . " <" . $email2 . ">\r\n";
			mail($adminemail, $subject2, $body2, $header2);
	
			//echo "yes";
			//exit;
		
		}
    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
        $response["status"] = 1;
        $response["message"] = "Your password is being emailed to you.";

        // echoing JSON response
        echo json_encode($response);
    } else {
        // failed to insert row
        $response["status"] = 0;
        $response["message"] = "We cannot find your email in our database.";
        
        // echoing JSON response
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["status"] = 0;
    $response["message"] = "Required field(s) is missing";

    // echoing JSON response
    echo json_encode($response);
}
?>