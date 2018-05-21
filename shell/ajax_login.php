<?php
/*|:-> Load system configuration <-:|*/
require_once(dirname(__FILE__) . '/' . "auth.php");

foreach($_POST as $key=>$value) { $$key = addslashes(trim($value)); } 

if ( empty($username) || empty($password) ) { 
	echo "emptyfields";
	exit;
} 
else 
{
	$sql = "SELECT * FROM ".TBL_AUTHORIZE_NEW." WHERE (username='".clean_mysql($username)."' or email='".clean_mysql($username)."') and password = password('$password')";
	$result = @mysql_query($sql) or die(mysql_error());
	$num = mysql_num_rows($result);
	$row = mysql_fetch_array($result);

	if ($num == 0) {
		echo "no";
		exit;
	} else if ($row['verified'] == 0) {
		echo "noverified";
		exit;
	} else if ($row['pchange'] == 1) { 

		// Set SESSION for username - password
		$_SESSION['id']		  = $row['id'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['password'] = $row['password'];

		$usr64id = base64_encode($_SESSION['id']);
		$u64cook = base64_encode($_SESSION['username']);
		$h64cook = base64_encode($_SESSION['password']);

		if( $rememberme ) { // IF user wants to be remembered do following action
			// Set COOKIE for username - password based on previous session sets
			setcookie('usid64cook', $usr64id, time()+$cookTime, '/', 'brogaard.com'); // id cookie
			setcookie('user64cook', $u64cook, time()+$cookTime, '/', 'brogaard.com'); // username cookie
			setcookie('hash64cook', $h64cook, time()+$cookTime, '/', 'brogaard.com'); // password cookie
		} 

		echo "pchange";
		exit;

	} else { 

		// Set SESSION for username - password
		$_SESSION['id']		  = $row['id'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['password'] = $row['password'];

		$usr64id = base64_encode($_SESSION['id']);
		$u64cook = base64_encode($_SESSION['username']);
		$h64cook = base64_encode($_SESSION['password']);

		if( $rememberme ) { // IF user wants to be remembered do following action
			// Set COOKIE for username - password based on previous session sets
			setcookie('usid64cook', $usr64id, time()+$cookTime, '/', 'brogaard.com'); // id cookie
			setcookie('user64cook', $u64cook, time()+$cookTime, '/', 'brogaard.com'); // username cookie
			setcookie('hash64cook', $h64cook, time()+$cookTime, '/', 'brogaard.com'); // password cookie
		} 

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