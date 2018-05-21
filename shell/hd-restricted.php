<?php
/*|:-> Load system configuration <-:|*/
require_once(dirname(__FILE__) . '/' . "auth.php"); 

/*|:-> COOKIES and SESSION check <-:|*/
// This should be placed on top of member area (restricted) page
checkSession();


// This page should be available for logged-in users ONLY
if ( $_SESSION['maingallery']=='' ) { 
	$noAuthRedirected = CMS_URL;
	header("HTTP/1.1 403 Forbidden");
	header("Location: $noAuthRedirected");
	exit;
}

// User that already has HD access no need to be here
if ( $_SESSION['hdaccess']==1 ) { 
	$noAuthRedirected2 = $_SESSION['maingallery'];
	header("HTTP/1.1 403 Forbidden");
	header("Location: $noAuthRedirected2");
	exit;
}

/*|:-> Load HEADER <-:|*/
@include DIR_USER."site-header.php";

/*|:-> Load MENU <-:|*/
@include DIR_USER."site-menu.php";

/*|:-> Load PayPal payment settings <-:|*/
@include DIR_USER."qipn_settings.php";

?>
<div id="page-container" class="page-container contact-container">
<div id="page">
<img src="<?php echo URL_USER; ?>pages-resources/images/pic_hd-locked.jpg" alt="" style="float:right; padding-right:20px;" />

<div id="page_content" class="about">
<?php
		// COUNTING Total PHOTOS in HD Herluf-intern
		$path_ac_1 = CMS_PATH.'clientarea/'.PAID_HD_DIR.'/HD/';

		$list_path_ac_1 = read_directory_contents( $path_ac_1 );

		foreach ($list_path_ac_1 as $list1) { 
			if ( !preg_match("/[^0-9\-]/", $list1) ) 
				$listDir1[] = $path_ac_1.$list1.'/thumbnails/'; // Look-up for /thumbnails/ inside each YYYY-MM-DD
		} 

		for ($j=0; $j<count($listDir1); $j++) { 
			$dirValidName_1 = $listDir1[$j]; 
			$list_path_ac_1 = read_directory_contents( $dirValidName_1 );
			$total_thumbs_in_each_thumbsDir[] = count($list_path_ac_1);
		}

		$totalThumbsALL = array_sum($total_thumbs_in_each_thumbsDir);
		$totalThumbsALLx = empty($totalThumbsALL)?'0':$totalThumbsALL;
?>
<!-- START middle content -->
<div id="stylishfont"><h2>Lav din egen USB-nøgle med billeder fra Herlufsholm</h2>
Køb abonnement og få adgang til billederne uden stempel - til fri privat benyttelse.<br />
Et abonnement giver adgang til download af alle <strong><?php echo $totalThumbsALLx; ?></strong> billeder fra Herlufsholm.<br />
Vælg din pakke og betal via <a href="https://www.paypal.com/" target="_blank" rel="nofollow"><strong>PayPal</strong></a>.
<br /><br />
<strong>110 kr</strong> for 1 måneds adgang<br />
<form name="_xclick" action="https://www.paypal.com/cgi-bin/webscr" method="post" style="padding-top:5px;">
<input type="hidden" name="charset" value="utf-8">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="<?php echo $paypal_email; ?>">
<input type="hidden" name="currency_code" value="<?php echo $currency; ?>">
<input type="hidden" name="item_name" value="<?php echo $products[1][0]; ?>">
<INPUT TYPE="hidden" NAME="item_number" VALUE="1">
<input type="hidden" name="no_shipping" value="1">
<input type="hidden" name="amount" value="<?php echo $products[1][1]; ?>">
<input type="hidden" name="return" value="<?php echo $script_thankyou; ?>">
<input type="hidden" name="cancel_return" value="http://www.brogaard.com/shell/hd-restricted.php">
<input type="hidden" name="notify_url" value="http://www.brogaard.com/shell/qipn_paypal.php">
<input type="image" src="<?php echo URL_USER; ?>pages-resources/images/button_buynow.png" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
</form>
<br />
<strong>310 kr</strong> for 3 måneders adgang<br />
<form name="_xclick" action="https://www.paypal.com/cgi-bin/webscr" method="post" style="padding-top:5px;">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="<?php echo $paypal_email; ?>">
<input type="hidden" name="currency_code" value="<?php echo $currency; ?>">
<input type="hidden" name="item_name" value="<?php echo $products[2][0]; ?>">
<INPUT TYPE="hidden" NAME="item_number" VALUE="2">
<input type="hidden" name="no_shipping" value="1">
<input type="hidden" name="amount" value="<?php echo $products[2][1]; ?>">
<input type="hidden" name="return" value="<?php echo $script_thankyou; ?>">
<input type="hidden" name="cancel_return" value="http://www.brogaard.com/shell/hd-restricted.php">
<input type="hidden" name="notify_url" value="http://www.brogaard.com/shell/qipn_paypal.php">
<input type="image" src="<?php echo URL_USER; ?>pages-resources/images/button_buynow.png" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
</form>
<br />
<strong>1110 kr</strong> for et års adgang<br />
<form name="_xclick" action="https://www.paypal.com/cgi-bin/webscr" method="post" style="padding-top:5px;">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="<?php echo $paypal_email; ?>">
<input type="hidden" name="currency_code" value="<?php echo $currency; ?>">
<input type="hidden" name="item_name" value="<?php echo $products[3][0]; ?>">
<INPUT TYPE="hidden" NAME="item_number" VALUE="3">
<input type="hidden" name="no_shipping" value="1">
<input type="hidden" name="amount" value="<?php echo $products[3][1]; ?>">
<input type="hidden" name="return" value="<?php echo $script_thankyou; ?>">
<input type="hidden" name="cancel_return" value="http://www.brogaard.com/shell/hd-restricted.php">
<input type="hidden" name="notify_url" value="http://www.brogaard.com/shell/qipn_paypal.php">
<input type="image" src="<?php echo URL_USER; ?>pages-resources/images/button_buynow.png" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
</form>
</div>
<!-- END Additional Details Shown -->

<?php 
// if ( $_SESSION['group1']!='Administrators' ) {
//} // END of NOT-'Administrators' privileges
?>

<div class="clear"></div>

	</div> <!-- /page_content home -->
</div>
</div> <!-- /page-container -->
				
<?php
/*|:-> Load FOOTER <-:|*/
@include DIR_USER."site-footer.php";
ob_end_flush();

/*
 * This copyright notice just for note to the programmer involved
 * Regards, 
 * medmed - at - scriptlance
 * #################################################################
 * Copyright (c) 2009 medyCMS. All rights reserved.
 */