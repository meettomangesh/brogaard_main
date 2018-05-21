<?php
/*|:-> Load system configuration <-:|*/
require_once(dirname(__FILE__) . '/' . "auth.php");

foreach($_POST as $key=>$value) { $$key = addslashes(trim($value)); } 

if ( (!$password) || (!$repassword) ) { 

	echo "emptyfields";
	exit;

} else if ( $password != $repassword ) { 

	echo "no";
	exit;

} else { 

	$sql = "UPDATE ".TBL_AUTHORIZE_NEW." SET pchange = '0', password = password('$password')  WHERE id = '$_SESSION[id]'";
	$result = @mysql_query($sql) or die(mysql_error());

	$sql2 = "SELECT * FROM ".TBL_AUTHORIZE_NEW." WHERE id = '$_SESSION[id]'";
	$result2 = @mysql_query($sql2) or die(mysql_error());
	$row2 = mysql_fetch_array($result2);

	// SET new session
	$_SESSION['id'] 		= $row2['id']; 
	$_SESSION['username'] 	= $row2['username'];
	$_SESSION['password'] 	= $row2['password'];

	echo "yes";
	exit;
}

ob_end_flush();

/*
 * This copyright notice just for note to the programmer involved
 * Regards, 
 * medmed - at - scriptlance
 * #################################################################
 * Copyright (c) 2009 medyCMS. All rights reserved.
 */