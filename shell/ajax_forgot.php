<?php
/*|:-> Load system configuration <-:|*/
require_once(dirname(__FILE__) . '/' . "auth.php");

foreach($_POST as $key=>$value) { $$key = addslashes(trim($value)); } 

if ( empty($email) ) { 
	echo "no";
	exit;
} 
else 
{ 
	$sql = "SELECT * FROM ".TBL_AUTHORIZE_NEW." WHERE email='".clean_mysql($email)."'";
	$result = @mysql_query($sql) or die(mysql_error());
	$num = mysql_num_rows($result);

	if ($num == 0) {
		echo "no";
		exit;
	} else { 
		$row = mysql_fetch_array($result);
		$uname 		= $row['username'];
		$email 		= $row['email'];
		$firstname 	= $row['firstname'];

		$newpass = rand(10000000,99999999);
		$chng = "UPDATE ".TBL_AUTHORIZE_NEW." SET password=password('$newpass'), pchange='1' WHERE email='".clean_mysql($email)."'";
		$result2 = @mysql_query($chng) or die(mysql_error());

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

		echo "yes";
		exit;
	} // END

} // END

ob_end_flush();

/*
 * This copyright notice just for note to the programmer involved
 * Regards, 
 * medmed - at - scriptlance
 * #################################################################
 * Copyright (c) 2009 medyCMS. All rights reserved.
 */