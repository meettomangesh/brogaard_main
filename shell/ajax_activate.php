<?php
/*|:-> Load system configuration <-:|*/
require_once(dirname(__FILE__) . '/' . "auth.php");

foreach($_POST as $key=>$value) { $$key = addslashes(trim($value)); } 

if (!$activationkey) {
	echo "no";
	exit;
}

$sql = "SELECT * FROM ".TBL_AUTHORIZE_NEW." WHERE activationkey='".clean_mysql($activationkey)."'";
$result = @mysql_query($sql) or die(mysql_error());
$num = mysql_num_rows($result);

if ($num == 0) {
	echo "no";
	exit;
} else {
	$newpass = rand(10000000,99999999);
	$chng = "UPDATE ".TBL_AUTHORIZE_NEW." SET verified='1' WHERE activationkey='".clean_mysql($activationkey)."'";
	$result2 = @mysql_query($chng) or die(mysql_error());
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