<?php
// Restrict direct access to this file
if(!defined('BROGAARD_AUTH'))
{ 
	//die('DIRECT ACCESS TO THIS FILE IS NOT ALLOWED!');
	header("Location: ./index.php");
	exit; 
} 

$add_mode = true;														// Assume add normal code
if ( function_exists('ttg_user_footer') ) {								// If function exists and
	if ( !(ttg_user_footer( TTG_COMP, TTG_ROOT )) ) {					// returns false then
		$add_mode = false;												// don't include normal footer
	}
}
if ( $add_mode ) {														// begin normal footer (code below) ?>
<div class="footer_container">

<p class="footer_text">PHOTOGRAPHER STEEN BROGAARD  | INFO@BROGAARD.COM | CELLPH.: +45 4057 8090 | ALL RIGHTS RESERVED 1984-2011</p>

<p class="social_networking_icons">
<a href="http://www.facebook.com/brogaard" target="_blank"><img src="<?php echo URL_USER; ?>pages-resources/images/social_networking/facebook_16.png" /></a>
<a href="http://twitter.com/brogaard" target="_blank"><img src="<?php echo URL_USER; ?>pages-resources/images/social_networking/twitter_16.png" /></a>
<a href="http://dk.linkedin.com/pub/steen-brogaard/0/8a9/123" target="_blank"><img src="<?php echo URL_USER; ?>pages-resources/images/social_networking/linkedin_16.png" /></a>
<a href="mailto: steen@brogaard.com"><img src="<?php echo URL_USER; ?>pages-resources/images/social_networking/email_16.png" /></a>
<a href="<?php echo URL_USER; ?>news-rss.php" target="_blank"><img src="<?php echo URL_USER; ?>pages-resources/images/social_networking/rss_16.png" /></a>
<a href="http://c.itunes.apple.com/dk/profile/id100602089?l=da" target="_blank"><img src="<?php echo URL_USER; ?>pages-resources/images/social_networking/itunes_16.png" /></a>
</p>

</div>
<?php } 																// -end- normal footer (code above) 

/*
 * This copyright notice just for note to the programmer involved
 * Regards, 
 * medmed - at - scriptlance
 * #################################################################
 * Copyright (c) 2009 medyCMS. All rights reserved.
 */