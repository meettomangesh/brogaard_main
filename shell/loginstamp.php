<?php
/*|:-> Load system configuration <-:|*/
require_once(dirname(__FILE__) . '/' . "auth.php");


$screenie_res = $HTTP_COOKIE_VARS["users_resolution"];


// Before logged-in first try to get screen resolution
if ( isset($_GET['screenie']) ) { 

	if ( isset($_SESSION['username']) && isset($_SESSION['password']) ) // session available; permitted to logins
	{
		// Update last login info to database
		update_user_last_login_time($_SESSION['username']);

		// Update logged-in logs to database
		logLoggedIn($_SESSION['username'], $_GET['screenie']);

		confirmUser($_SESSION['username'], $_SESSION['password']);

		if ( isset($_SESSION['goto']) ) { 
			redirect_to($_SESSION['goto']);
		} else { 
			redirect_to($_SESSION['redirect']);
		}
	}
	else
	{
		redirect_to(URL_USER.'index.php');
	}

} else {

?>
<html>
<head>
<title>Please wait a moment while the page loads...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" /> 
<meta http-equiv="Robots" content="noindex, nofollow" />
<meta name="MSSmartTagsPreventParsing" content="True" />
  <script type="text/javascript">
  // Disable Javascript Errors on silly browsers (IE)
	function noError(){ return true; }
	window.onerror = noError;
  </script>
</head>
<body>
<p>&nbsp;</p>
<div align="center">Please wait a moment while the page loads...</div>
  <script type="text/javascript">
	<!--
	writeCookie();
	function writeCookie()
	{
	var today = new Date();
	var the_date = new Date("December 31, 2023");
	var the_cookie_date = the_date.toGMTString();
	var the_cookie = "users_resolution="+ screen.width +"x"+ screen.height;
	var the_cookie = the_cookie + ";expires=" + the_cookie_date;
	document.cookie=the_cookie

	location = "./loginstamp.php?screenie=<?php echo $screenie_res; ?>";
	}
	//-->
 </script>
</body>
</html>
<?php 
}

ob_end_flush(); 

/*
 * This copyright notice just for note to the programmer involved
 * Regards, 
 * medmed - at - scriptlance
 * #################################################################
 * Copyright (c) 2009 medyCMS. All rights reserved.
 */