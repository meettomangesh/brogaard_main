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

if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email'])) {
	$id = $_POST['id'];		    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$phone = $_POST['phone'];
	$getnewsletter = $_POST['getnewsletter'];
			//include ("database/connection.php");
		
			
	$result = mysql_query("UPDATE authorize_new SET 
							firstname ='".$row->clean_mysql($firstname)."',
							lastname ='".$row->clean_mysql($lastname)."',
							email ='".$row->clean_mysql($email)."',
							username ='".$row->clean_mysql($username)."',
							password =PASSWORD('".$row->clean_mysql($username)."'),
							phone ='".$row->clean_mysql($phone)."',
							getnewsletter ='".$row->clean_mysql($getnewsletter)."'
							WHERE id = '".$id."'");
   
	 
    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
        $response["status"] = 1;
        $response["message"] = "Profile successfully update.";

        // echoing JSON response
        echo json_encode($response);
    } else {
        // failed to insert row
        $response["status"] = 0;
        $response["message"] = "update not Successful.";
        
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