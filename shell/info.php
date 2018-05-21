<?php
/*|:-> Load system configuration <-:|*/
require_once(dirname(__FILE__) . '/' . "auth.php"); 

/*|:-> COOKIES and SESSION check <-:|*/
// This should be placed so system can recognize cookie
checkSession();

/*|:-> Load HEADER <-:|*/
@include DIR_USER."site-header.php";

/*|:-> Load MENU <-:|*/
@include DIR_USER."site-menu.php";


// #################
// IF form submitted
if (array_key_exists('register', $_POST)) // process the script only if the form has been submitted -> OME
{ 
	foreach ($_POST as $key => $value) { $$key = addslashes(trim($value)); } 

	$hideFlash = TRUE;

	$todaydate = date('Y-m-d');
	$error = false;

	if (strlen($firstname) < 2) {
		$error = true;
		$errormessage[] = lang('err_missing_first_name');
	}

	if (strlen($lastname) < 2) {
		$error = true;
		$errormessage[] = lang('err_missing_last_name');
	}

	if (strlen($email_address) < 5) {
		$error = true;
		$errormessage[] = lang('err_missing_email');
	}

	if (!preg_match("|^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$|i", $email_address)) {
		$error = true;
		$errormessage[] = lang('err_invalid_email');
	}

	$emailcount = mysql_result(mysql_query("SELECT COUNT(id) FROM ".TBL_AUTHORIZE_NEW." WHERE email='".clean_mysql($email_address)."'"),0);

	if ( $email_address!='' && $emailcount>0 ) {
		$error = true;
		$errormessage[] = lang('err_email_in_use');
	}

	if ((strlen($password) < 6) && (strlen($password) > 10)) {
		$error = true;
		$errormessage[] = lang('err_pass_requirement');
	}

	if ($password != $repassword) {
		$error = true;
		$errormessage[] = lang('err_pass_not_match');
	}

	if (strlen($username) < 5) {
		$error = true;
		$errormessage[] = lang('err_missing_username');
	}

	$usernamecount = mysql_result(mysql_query("SELECT COUNT(id) FROM ".TBL_AUTHORIZE_NEW." WHERE username='".clean_mysql($username)."'"),0);

	if ( $username!='' && $usernamecount>0 ) {
		$error = true;
		$errormessage[] = lang('err_username_in_use');
	}

if ($error == false) {

$activationkey =  generateCode();

      $sql_data_array = array('firstname' => $firstname,
                              'lastname' => $lastname,
                              'email' => $email_address,
                              'username' => $username,
                              'group1' => 'Users',
                              'usertype' => 'private',
                              'redirect' => CMS_URL.'clientarea/royal',
                              'date_created' => $todaydate,
                              'royalaccess' => '1',
                              'activationkey' => $activationkey);

$sql = sprintf('INSERT INTO %s (%s) VALUES ("%s")', ''.TBL_AUTHORIZE_NEW.'', implode(', ', array_map('mysql_escape_string', array_keys($sql_data_array))), implode('", "',array_map('mysql_escape_string', $sql_data_array)));
$result = mysql_query($sql) or die ("Error in query: $sql. ".mysql_error());
$insertid = mysql_insert_id();

$sql2 = "UPDATE ".TBL_AUTHORIZE_NEW." SET password = password('$password') WHERE id='$insertid'";
$result2 = mysql_query($sql2) or die ("Error in query: $sql2. ".mysql_error());

$Name = "brogaard.com";
$email2 = "noreply@brogaard.com";
$subject = "Account activation on brogaard.com";

$body = "Hello $firstname,\r\nWelcome to our website!\r\n\r\nYou, or someone using your email address, has completed registration at brogaard.com. Your activation code : $activationkey\r\n".URL_USER."activate.php\r\n\r\nIf this is an error, please ignore this email.\r\n\r\nRegards";
$header = "From: ". $Name . " <" . $email2 . ">\r\n";

mail($email_address, $subject, $body, $header);
$errormsg = 'Registration successful. We just sent you activation code. <strong><a href="'.URL_USER.'activate.php">Click here</a></strong> to activate your account.'; 

} else {
$errormsg = "<ul><li>".implode("<li>",$errormessage)."</ul>"; 
}
					  
}
?>
<style type="text/css"> #about_frame { margin: 0 auto 2em !important; } </style>
<a name="slideshow"></a>
<?php 
if ( !empty($_SESSION['royalaccess']) ) { 
	echo '<style type="text/css">
	div.is_royalaccess a { background:#ffffff; color:#333333; }
	div.is_royalaccess a:hover { background:#333333; color:#ffffff; }
	</style>';
	echo '<div class="is_royalaccess" style="margin:0 auto; width:960px; background:transparent; text-align:right; margin-top:10px; margin-bottom:-5px;margin-right:147px; clear:both;"><a href="'.CMS_URL.'clientarea/royal/" class="s_button">Gå til kongelige gallerier</a></div><div style="clear:both"></div>';
}
?>
<div id="page-container" class="page-container contact-container">
<div id="page">

<div id="page_content" class="about">
<?php if ( !isset($hideFlash) ) { ?>
<?php if ( empty($_SESSION['royalaccess']) ) { ?>
<div style="margin-top:-16px; padding-bottom:10px; text-align:right; font-size:8pt;"><a href="#register" style="text-decoration:underline;"><?php echo lang('register_here_for_more_photos'); ?></a>&nbsp;&nbsp;<img src="<?php echo URL_USER; ?>pages-resources/images/arrow-down-icon-tiny.png" style="width:10px; float:right;" align="absmiddle" /></div><div style="clear:both;"></div><?php } ?>

<!-- Begin Monoslideshow 2 Embed -->
<div id="frame" class="stage-container info-stage">
<script type="text/javascript">
var flashvars = {
	showLogo: "false",
	showRegistration: "false"
};
var params = {
	allowScriptAccess: "sameDomain",
	allowfullscreen: "true",
	allowNetworking: "all",
	base: "info-monoslideshow/"
};
var attributes = {
	bgcolor: "#F6F6F6",
	id: "monoslideshow",
	name: "monoslideshow"
};
swfobject.embedSWF("<?php echo URL_USER; ?>info-monoslideshow/monoslideshow.swf", "flashcontent", "100%", "100%", "9.0.0", false, flashvars, params, attributes);
</script>

<div id="flashcontent" class="stage info-stage">
<img class="page-image info-image" alt="" src="<?php echo URL_USER; ?>pages-images/photos/Depositphotos_2256870_XS.jpg" />
</div>

</div>
<!-- End Monoslideshow 2 Embed -->
<div class="clear"></div>
<?php } // END $hideFlash ?>
<?php if ( empty($_SESSION['royalaccess']) ) { ?>
	<div class="copy" style="width: 934px;">
<a name="register"></a>

<div id="stylishfont">
<p>Siden 1992 har Steen Brogaard fungeret som først HKH Kronprins Frederiks og siden også som HKH Prins Joachims personlige fotograf ved både private og officielle lejligheder. Dette arbejde har gennem årene ført til mange rejser, udstillinger, bøger og ej at forglemme utallige opslag i danske og udenlandske magasiner.</p>

<h2>OFFICIELLE BEGIVENHEDER</h2>

<p>For at se billeder fra officielle begivenheder skal du registrere dig herunder</p>
</div>

<!-- <h2 id="metadata.aboutHeading1.value" class="first heading heading_about">Siden 1992 har Steen Brogaard fungeret som først HKH Kronprins Frederiks og siden også som HKH Prins Joachims personlige fotograf ved både private og officielle lejligheder. Dette arbejde har gennem årene ført til mange rejser, udstillinger, bøger og ej at forglemme utallige opslag i danske og udenlandske magasiner.</h2> -->

<!-- <h2 id="metadata.aboutHeading2.value" class="subsequent heading heading_about">OFFICIELLE BEGIVENHEDER</h2> -->

<!-- <p id="nonCSS.aboutParagraph2.value">For at se billeder fra officielle begivenheder skal du registrere dig herunder</p> -->

	<p id="nonCSS.aboutParagraph3.value">

<div class="contact-form-container">
<div class="contact-form-content">
<FORM METHOD="POST" ACTION="">
<table border="0" cellspacing="4" cellpadding="4" width="900" align="center">
	<tr>
	<td colspan="2" style="padding-left:80px;color:red;" align="left"><?php echo ( isset($errormsg)?$errormsg:'' ); ?></td>
	</tr>
</table>

<p>&nbsp;</p>

<div id="stylishfont">
	<label for="first_name" style="float:left; width:134px; margin-top:4px;"><?php echo lang('first_name'); ?>: <span class="required">*</span></label>
	<input type="text" id="firstname" name="firstname" tabindex="1" value="<?php echo ( isset($firstname)?$firstname:'' ); ?>" style="width:340px;" />
</div><div style="clear:both; height:10px;"></div>

<div id="stylishfont">
	<label for="last_name" style="float:left; width:134px; margin-top:4px;"><?php echo lang('last_name'); ?>: <span class="required">*</span></label>
	<input type="text" id="lastname" name="lastname" tabindex="2" value="<?php echo ( isset($lastname)?$lastname:'' ); ?>" style="width:340px;" />
</div><div style="clear:both; height:10px;"></div>

<div id="stylishfont">
	<label for="email" style="float:left; width:134px; margin-top:4px;"><?php echo lang('email'); ?>: <span class="required">*</span></label>
	<input type="text" id="email_address" name="email_address" tabindex="3" value="<?php echo ( isset($email_address)?$email_address:'' ); ?>" style="width:340px;" />
</div><div style="clear:both; height:10px;"></div>

<div id="stylishfont">
	<label for="username" style="float:left; width:134px; margin-top:0px;"><?php echo lang('username'); ?>: <span class="required">*</span></label>
	<input type="text" id="username" name="username" tabindex="4" value="<?php echo ( isset($username)?$username:'' ); ?>" style="width:340px;" />
</div><div style="clear:both; height:10px;"></div>

<div id="stylishfont">
	<label for="password" style="float:left; width:134px; margin-top:0px;"><?php echo lang('password'); ?>: <span class="required">*</span></label>
	<input type="password" id="password" name="password" tabindex="5" value="" style="width:340px;" />
</div><div style="clear:both; height:10px;"></div>

<div id="stylishfont">
	<label for="password_repeat" style="float:left; width:134px; margin-top:0px;"><?php echo lang('password_repeat'); ?>: <span class="required">*</span></label>
	<input type="password" id="repassword" name="repassword" tabindex="6" value="" style="width:340px;" />
</div><div style="clear:both; height:10px;"></div>

<div id="stylishfont">
	<?php echo lang('join_newsletter'); ?>: <input type="checkbox" tabindex="7" id="sub_newsletter" name="sub_newsletter" value="1" style="background:#FFFFFF; color:#141414; border:1px solid #000000; font-family:verdana; font-size:10px; padding:1px" checked="checked" />
</div><div style="clear:both; height:10px;"></div>

	<fieldset>
	<input type="submit" tabindex="8" id="register" name="register" value="<?php echo lang('register'); ?>" />
	</fieldset>
<p>&nbsp;</p>

</form>

<div id="stylishfont">
<p>Ved brugen af og registrering på denne website har du accepteret betingelserne i vores <a class="option" href="<?php echo URL_USER; ?>terms.php" title="Terms of Use" rel="shadowbox" target="_self"><u>Terms of Use</u></a> og <a class="option" href="<?php echo URL_USER; ?>policy.php" title="Privacy Policy" rel="shadowbox" target="_self"><u>Privacy Policy</u></a>.</p>

<p>Sørg venligst for at du har læst og forstået disse før du registrerer dig. Læg især mærke til, at vi gemmer og bruger dine informationer til at sende dig vores nyhedsbrev og til at kontakte dig med marketings-information via email, medmindre du klikker 'Få nyhedsbrev' fra. Denne indstilling kan senere ændres når du er logget ind.<p>

<?php if ( !isset($hideFlash) ) { ?>
<div style="float:right; font-size:8pt;"><a href="<?php echo $_SERVER['PHP_SELF']; ?>#slideshow" style="text-decoration:underline;"><?php echo lang('slideshow'); ?></a>&nbsp;&nbsp;<img src="<?php echo URL_USER; ?>pages-resources/images/arrow-up-icon-tiny.png" style="width:10px;" align="absmiddle" /></div><div style="clear:both;"></div><?php } ?>
</div>

</div>
</div>

</p>
	</div>
<?php } ?>
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