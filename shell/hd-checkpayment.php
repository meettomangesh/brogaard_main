<?php
/*|:-> Load system configuration <-:|*/
require_once(dirname(__FILE__) . '/' . "auth.php"); 

if ( array_key_exists('txn_id', $_POST) ) { 

	foreach ($_POST as $key => $value) { $$key = addslashes(trim($value)); } 

	$emailcount = mysql_result(mysql_query("SELECT COUNT(id) FROM ".TBL_AUTHORIZE_NEW." WHERE email='".clean_mysql($payer_email)."'"),0);

	if ( $emailcount>0 ) { 
		// IF payment was using the same email registered on this site
		$pp_email = $payer_email;
	} else { 
		$pp_email = $_SESSION['email'];
	}

	$pp_txd_id = $txn_id;

	if ( $item_number == 1 ) { $set_exp = strtotime("+1 month"); }	// 1 month access
	if ( $item_number == 2 ) { $set_exp = strtotime("+3 months"); }	// 3 months access
	if ( $item_number == 3 ) { $set_exp = strtotime("+1 year"); }	// 1 year access

	$exp2db = date("Y-m-d", $set_exp);

	// Update database
	$sql_data_array = array('hdtxnid' => $txn_id, // PayPal Transaction ID
                            'hdaccess' => 1,
                            'hdexpired' => $exp2db);

	foreach ($sql_data_array as $key => $value) { $sets[]='`'.$key.'`=\''.$value.'\''; }

	$sqlquery='SET '.implode(', ',$sets);

	$sqlq = "UPDATE ".TBL_AUTHORIZE_NEW." $sqlquery WHERE id='".(int)$_SESSION['id']."'";
	$result = mysql_query($sqlq) or die ("Error in query: $sqlq. ".mysql_error());

	// Now update session
	$_SESSION['hdaccess'] = 1;
	$_SESSION['hdexpired'] = $exp2db;

	// Last, redirect to Din Konto
	//redirect_to(URL_USER.'edit_account.php');

	$yesAuthRedirected = URL_USER.'edit_account.php';

// THANK YOU PAGE and REDIRECT
echo '<html>
<head><title>Payment succeed...</title>
<meta name="robots" content="noindex, nofollow">
<noscript><meta http-equiv="refresh" content="10; URL='.$yesAuthRedirected.'"></noscript>
<script language="JavaScript" type="text/javascript"><!--
	var sTargetURL = "'.$yesAuthRedirected.'";
	function doRedirect()
	{
	    setTimeout( "timedRedirect()", 10*1000 );
	}
	// This one adds to the visitors page history.
	function timedRedirect()
	{
	    window.location.href = sTargetURL;
	}
//--></script>

<script language="JavaScript1.1" type="text/javascript"><!--
	function timedRedirect()
	{
	    window.location.replace( sTargetURL );
	}
//--></script>
</head>

<body onload="doRedirect()"><center>
<p>&nbsp;</p><h1 style="color:blue;">Thank You for your payment</h1><p>&nbsp;</p>
<p><b>Your transaction has been completed, and a receipt for your purchase has been emailed to you.<br />
<font color="green">You can now access the locked HD gallery.</font><br />
You may log into your account at <a href="http://www.paypal.com/" target="_blank">www.paypal.com</a> to view details of this transaction.</b></p>
<p><a href="'.$yesAuthRedirected.'">Clik Here</a> if you are not redirected automatically in 5 seconds...</p>
</center></body>
</html>';
exit;

}
else 
{ 

$noAuthRedirected = isset($_SESSION['maingallery'])?$_SESSION['maingallery']:CMS_URL;
	/*header("HTTP/1.1 403 Forbidden");
	header("Location: $noAuthRedirected");
	exit;*/

// WARNING for RESTRICTED AREA
echo '<html>
<head><title>Restricted Area</title>
<meta name="robots" content="noindex, nofollow">
<noscript><meta http-equiv="refresh" content="2; URL='.$noAuthRedirected.'"></noscript>
<script language="JavaScript" type="text/javascript"><!--
	var sTargetURL = "'.$noAuthRedirected.'";
	function doRedirect()
	{
	    setTimeout( "timedRedirect()", 2*1000 );
	}
	// This one adds to the visitors page history.
	function timedRedirect()
	{
	    window.location.href = sTargetURL;
	}
//--></script>

<script language="JavaScript1.1" type="text/javascript"><!--
	function timedRedirect()
	{
	    window.location.replace( sTargetURL );
	}
//--></script>
</head>

<body onload="doRedirect()"><center>
<p>&nbsp;</p><h1 style="color:red;">Restricted Area</h1><p>&nbsp;</p>
<p><a href="'.$noAuthRedirected.'">Clik Here</a> if you are not redirected automatically...</p>
</center></body>
</html>';
exit;

}

/* PayPal $_POST Callback after successful payment 
(
    [mc_gross] => 1110.00
    [protection_eligibility] => Eligible
    [address_status] => confirmed
    [payer_id] => 2J36HUVSS382C
    [tax] => 0.00
    [address_street] => 1 Main St
    [payment_date] => 17:46:34 Oct 10, 2011 PDT
    [payment_status] => Pending
    [charset] => windows-1252
    [address_zip] => 95131
    [first_name] => Test
    [address_country_code] => US
    [address_name] => Test User
    [notify_version] => 3.4
    [custom] => 
    [payer_status] => verified
    [business] => seller_1282940967_biz@gmail.com
    [address_country] => United States
    [address_city] => San Jose
    [quantity] => 1
    [payer_email] => buyer_1282939774_per@gmail.com
    [verify_sign] => AFcWxV21C7fd0v3bYYYRCpSSRl31Ag90gFhYobJNZVKTfBJYHDvxcC83
    [txn_id] => 02E39955DR9369923
    [payment_type] => instant
    [last_name] => User
    [address_state] => CA
    [receiver_email] => seller_1282940967_biz@gmail.com
    [receiver_id] => F7RXUX38JDPM6
    [pending_reason] => multi_currency
    [txn_type] => web_accept
    [item_name] => 1110 kr for et års adgang
    [mc_currency] => DKK
    [item_number] => 3
    [residence_country] => US
    [test_ipn] => 1
    [transaction_subject] => 1110 kr for et års adgang
    [handling_amount] => 0.00
    [payment_gross] => 
    [shipping] => 0.00
    [merchant_return_link] => click here
    [form_charset] => UTF-8
)
*/

/*
 * This copyright notice just for note to the programmer involved
 * Regards, 
 * medmed - at - scriptlance
 * #################################################################
 * Copyright (c) 2009 medyCMS. All rights reserved.
 */