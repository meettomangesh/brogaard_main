<?php
/*|:-> Load system configuration <-:|*/
require_once(dirname(__FILE__) . '/' . "auth.php");

//$_SESSION = array();

	setcookie(session_name(), '', time()-86400, '/', 'brogaard.com'); // erase it from client side
	unset($_COOKIE[session_name()]); // erase it from server side
	
	setcookie('usid64cook', '', time()-86400, '/', 'brogaard.com'); // erase it from client side
	unset($_COOKIE['usid64cook']); // erase it from server side
	
	setcookie('user64cook', '', time()-86400, '/', 'brogaard.com'); // erase it from client side
	unset($_COOKIE['user64cook']); // erase it from server side
	
	setcookie('hash64cook', '', time()-86400, '/', 'brogaard.com'); // erase it from client side
	unset($_COOKIE['hash64cook']); // erase it from server side
	
	//setcookie('users_resolution', '', time()-86400, '/', 'brogaard.com'); // erase it from client side
	//unset($_COOKIE['users_resolution']); // erase it from server side


// end session and redirect
@session_regenerate_id(TRUE);
session_unset();
session_destroy();
$_SESSION = array();
//unset($_SESSION);

redirect_to(CMS_URL.'index.php');

ob_end_flush();