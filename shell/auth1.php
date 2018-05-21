<?php
/*
|---------------------------------------------------------------
| START UP THE USER BACK-END SYSTEM
|---------------------------------------------------------------
|
*/
// STARTING UP THE SYSTEM
// #############################################################
echo dirname(dirname(__FILE__)) . '/core-configs.php';
@require_once( dirname(dirname(__FILE__)) . '/core-configs.php' ); // sub-dir -> root dir
//@require_once(dirname(__FILE__) . '/' . "core-configs.php");

// #############################################################
// Start up critical functions
// #############################################################
set_error_reporting();
remove_magic_quotes();
unregister_globals();
// #############################################################
// Loads core (function) files
// #############################################################
load_core_functions();
// #############################################################
// Loads default language file
// #############################################################
@require(CMS_PATH.'core-language.php');
// #############################################################
// Connect to MySQL Database
// #############################################################
database_connect();
// #############################################################
// Refresh Header after loading core files
// #############################################################
anti_browser_caching_headers();
header("Content-Type: text/html; charset=utf-8"); 
// #############################################################
// Start session
// #############################################################

$cookTime = 2592000; // set 1 month cookie (60secs X 60mins x 24hours X 30days) 

ob_start();
session_start();

/*
|---------------------------------------------------------------
| USER LOGIN CHECK ENVIRONMENT
|---------------------------------------------------------------
|
*/

function confirmUser($username, $password) 
{ 
	$sql = "SELECT * FROM ".TBL_AUTHORIZE_NEW." WHERE username='".clean_mysql($username)."' and password='".clean_mysql($password)."' LIMIT 1";
	$result = @mysql_query($sql) or die(mysql_error());
	$num = mysql_num_rows($result);
	$row = mysql_fetch_array($result);

	if ($num == 0) { 
		return false; // Username & Password NOT found on database
		//redirect_to(URL_USER.'index.php');
	} else { 
		$_SESSION['id'] 			= $row['id']; // * used
		$_SESSION['firstname'] 		= $row['firstname']; // * used
		$_SESSION['lastname'] 		= $row['lastname'];
		$_SESSION['username'] 		= $row['username'];
		$_SESSION['password'] 		= $row['password'];
		$_SESSION['usertype']	 	= $row['usertype']; // * used
		$_SESSION['group1']	 		= $row['group1'];
		$_SESSION['group2']	 		= $row['group2'];
		$_SESSION['group3'] 		= $row['group3'];
		$_SESSION['pchange']		= $row['pchange'];
		$_SESSION['email'] 			= $row['email'];
		$_SESSION['verified']		= $row['verified'];
		$_SESSION['date_created']	= $row['date_created']; 
		$_SESSION['last_login']		= $row['last_login'];
		$_SESSION['editaccount']	= $row['editaccount'];
		$_SESSION['royalaccess']	= $row['royalaccess'];
		$_SESSION['tribeaccess']	= $row['tribeaccess'];
		$_SESSION['folderaccess']	= $row['folderaccess'];

		// Validating user access to HD-Locked and set proper session
		$curr_timestamp = time(); 
		$curr_hdaccess  = $row['hdaccess'];
		$curr_hdexpired = (empty($row['hdexpired']) || $row['hdexpired']=='0000-00-00') ? 0 : strtotime($row['hdexpired']);

			if ( !($curr_hdexpired) ) {
				if ( $curr_timestamp > $curr_hdexpired ) { 
					drop_user_hdaccess($_SESSION['username']);
					$_SESSION['hdaccess'] = 0;
					$_SESSION['hdexpired'] = 0;
				}
			} else {
				$_SESSION['hdaccess']  = 1;
				$_SESSION['hdexpired'] = $row['hdexpired'];
			}
		// END Validating user access to HD-Locked

		$_SESSION['timestamp']		= $curr_timestamp; 

		$galleries 					= $row['galleries'];

		if ($galleries != '') { 
			$_SESSION['galleries']	= $row['galleries'];
			$_SESSION['redirect']	= $row['redirect'];
			$_SESSION['maingallery']= $row['redirect'];
		} else { 
			$_SESSION['galleries']	= NULL;
			$_SESSION['redirect']	= $row['redirect'];
			$_SESSION['maingallery']= $row['redirect'];
		}

		// IF Administrators logged-in DO additional tasks :
		if ($_SESSION['group1']=='Administrators') { 
			// * Check Expiration for locked HD access and mail user if necessary

			$sqlTask = "SELECT * FROM ".TBL_AUTHORIZE_NEW." WHERE redirect='".PAID_HD_URL."' AND hdaccess='1' "; 
			$resTask = @mysql_query($sqlTask) or die(mysql_error());

			$iterator = 1;
			while ( $rowTask = mysql_fetch_assoc($resTask) ) { 
				$hdUserID	 = $rowTask['id'];
				$hdUsername	 = $rowTask['username'];
				$hdEmail	 = $rowTask['email'];

				$hdExpiredTime1= $rowTask['hdexpired'];
				$hdExpiredTime2= strtotime($hdExpiredTime1);
				$hdMinus7days  = strtotime("-10 days", $hdExpiredTime2);
				$hdExpiredNote = $rowTask['hdexpnotify'];

				$notifySender = 'brogaard.com <noreply@brogaard.com>';
				
				// Task: found users that should be notified for their almost expiring HD-access
				if ( ($_SESSION['timestamp'] > $hdMinus7days) && ($hdExpiredNote==0) ) { 

					// (1.a) Send email to user
					$notifySubj1 = "Automatic Email Reminder from Steen Brogaard";
					$notifyMail1 = "Dette er en automatisk påmindelse fra Steen Brogaard.".
								  "\n\nDit abonnement udløber d. ".$hdExpiredTime1.".".
								  "\nHvis du ønsker at fortsætte abonnementet kan du logge ind og fornye det - som gammel kunde får du en uge gratis lagt oven i den nye periode.".
								  "\n\nVi håber du har haft glæde af din tid som abonnent og ønsker dig velkommen tilbage til enhver tid.".
								  "\n\n--------------------------------------------------------------------------------".
								  "\n\nThis is an automatic reminder from Steen Brogaard.".
								  "\n\nYour subscription expires on ".$hdExpiredTime1.".".
								  "\nIf you wish to continue your subscription, you can log in and renew it - as an old customer, you get one week free of charge added to the new period.".
								  "\n\nWe hope you have enjoyed your time as a subscriber and wish you welcome back at any time.".
								  "\n\n--------------------------------------------------------------------------------".
								  "\n\nMed venlig hilsen,".
								  "\nSteen Brogaard"; 
					$notifyHeader1  = "From: ".$notifySender . "\r\n";
					$notifyHeader1 .= "MIME-Version: 1.0" . "\r\n";
					$notifyHeader1 .= "Content-Type: text/plain; charset=UTF-8" . "\r\n";
					$notifyHeader1 .= "Content-Transfer-Encoding: 8bit" . "\r\n";
					$notifyHeader1 .= "Cc: " . "\r\n";
					$notifyHeader1 .= "Bcc: " . "\r\n";
					$notifyHeader1 .= "X-Mailer: PHP/" . phpversion() . "\r\n";
					$sendNotifyMail_1 = mail($hdEmail, $notifySubj1, $notifyMail1, $notifyHeader1);

					// (1.b) Update 'hdexpnotify' on DB
					if ( $sendNotifyMail_1 ) { 
						$sqlTask_1 = "UPDATE ".TBL_AUTHORIZE_NEW." SET hdexpnotify='1' WHERE id = '$hdUserID'";
						$resTask_1 = mysql_query($sqlTask_1) or die ("Error in query: $sqlTask_1. ".mysql_error());
					}
				}
				
				// Task: found users that should be notified for their (currently) expiring HD-access
				if ( ($_SESSION['timestamp'] > $hdExpiredTime2) && ($hdExpiredNote=='1') ) { 

					// (2.a) Send email to user
					$notifySubj2 = "Automatic Email Reminder from Steen Brogaard";
					$notifyMail2 = "Dette er en automatisk påmindelse fra Steen Brogaard.".
								  "\n\nDit abonnement er nu udløbet.".
								  "\nHvis du ønsker at fortsætte abonnementet kan du logge ind og fornye det - som gammel kunde får du en uge gratis lagt oven i den nye periode.".
								  "\n\nVi håber du har haft glæde af din tid som abonnent og ønsker dig velkommen tilbage til enhver tid.".
								  "\n\n--------------------------------------------------------------------------------".
								  "\n\nThis is an automatic reminder from Steen Brogaard.".
								  "\n\nYour subscription has now expired.".
								  "\nIf you wish to continue your subscription, you can log in and renew it - as an old customer, you get one week free of charge added to the new period.".
								  "\n\nWe hope you have enjoyed your time as a subscriber and wish you welcome back at any time.".
								  "\n\n--------------------------------------------------------------------------------".
								  "\n\nMed venlig hilsen,".
								  "\nSteen Brogaard"; 
					$notifyHeader2  = "From: ".$notifySender . "\r\n";
					$notifyHeader2 .= "MIME-Version: 1.0" . "\r\n";
					$notifyHeader2 .= "Content-Type: text/plain; charset=UTF-8" . "\r\n";
					$notifyHeader2 .= "Content-Transfer-Encoding: 8bit" . "\r\n";
					$notifyHeader2 .= "Cc: " . "\r\n";
					$notifyHeader2 .= "Bcc: " . "\r\n";
					$notifyHeader2 .= "X-Mailer: PHP/" . phpversion() . "\r\n";
					$sendNotifyMail_2 = mail($hdEmail, $notifySubj2, $notifyMail2, $notifyHeader2); 

					// (2.b) Update 'hdaccess', 'hdexpired', 'hdexpnotify' on DB
					if ( $sendNotifyMail_2 ) { 
					$sqlTask_2 = "UPDATE ".TBL_AUTHORIZE_NEW." SET hdaccess='0', hdexpired='', hdexpnotify='0' WHERE id='$hdUserID'";
					$resTask_2 = mysql_query($sqlTask_2) or die ("Error in query: $sqlTask_2. ".mysql_error());
					}
				}

				$iterator++;
			} // END while
		} // END IF Administrators logged-in

		return true;
	}
}

function checkCookie() 
{
   /* Check if user has been remembered */
   if ( isset($_COOKIE['user64cook']) && isset($_COOKIE['hash64cook']) && isset($_COOKIE['usid64cook']) ) { 
      $_SESSION['id']		= base64_decode($_COOKIE['usid64cook']);
      $_SESSION['username'] = base64_decode($_COOKIE['user64cook']);
      $_SESSION['password'] = base64_decode($_COOKIE['hash64cook']);
   }
}

function checkSession() 
{
	checkCookie(); 

	/* Check if user has been remembered */
	if ( isset($_SESSION['username']) && isset($_SESSION['password']) && isset($_SESSION['id']) && !isset($_SESSION['maingallery']) ) { 

		// At this step, looks like user has returned by cookies
		// So update last login info to database
		update_user_last_login_time($_SESSION['username']);

		confirmUser($_SESSION['username'], $_SESSION['password']);
	} 

  $uo_keepquiet = TRUE;
  include( dirname(__FILE__) . '/visitors_online/index.php' );
}

function logLoggedIn($username, $screenie) 
{
	//$screen_resolution = "unknown";
	//if(isset($HTTP_COOKIE_VARS["users_resolution"])) { $screen_resolution = $HTTP_COOKIE_VARS["users_resolution"]; }
	$screen_resolution = ( !empty($screenie) ? $screenie : 'unknown' );

	// sets date and time variables
	$last = gmdate("Y-m-d");
	$time = gmdate("H:i", time() + $zone);

	$viewer = $_SERVER["HTTP_USER_AGENT"];

	// checks to see if the browser the user is using is determinable
	$browser = "unknown";
	if (preg_match("/Netscape/", $viewer)) { $browser = "Netscape"; }
	else if (preg_match("/Opera/", $viewer)) { $browser = "Opera"; } 
	else if (preg_match("/Firefox/", $viewer)) { $browser = "Firefox"; } 
	else if (preg_match("/MSIE/", $viewer)) { $browser = "Internet Explorer"; } 
	else if (preg_match("/Safari/", $viewer)) { $browser = "Safari"; } 
	else if (preg_match('/Chrome/',$viewer)) { $browser = "Chrome"; }

	// checks to see if the OS the user is using is determinable
	$platform = "unknown";
	if (preg_match("/Windows NT/", $viewer)) { $platform = "Windows"; }
	else if (preg_match("/Windows CE/", $viewer)) { $platform = "Windows PPC"; }
	else if (preg_match("/Linux/", $viewer)) { $platform = "Linux"; }
	else if (preg_match("/Mac/", $viewer)) { $platform = "MAC"; }

	// build and issue the query
	$ipo = $_SERVER["REMOTE_ADDR"];
	$sql = "INSERT INTO ".TBL_LOG_LOGIN." VALUES
	   ('','$username', '$last', '$time', '$ipo', '$platform', '$browser','$screen_resolution')";
	$result = @mysql_query($sql) or die(mysql_error());
	$logloginid = mysql_insert_id();

	$_SESSION['logloginid'] = $logloginid;
}


/*
 * This copyright notice just for note to the programmer involved
 * Regards, 
 * medmed - at - scriptlance
 * #################################################################
 * Copyright (c) 2009 medyCMS. All rights reserved.
 */