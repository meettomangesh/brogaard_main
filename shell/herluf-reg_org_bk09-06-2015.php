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
if (array_key_exists('submit', $_POST)) // process the script only if the form has been submitted -> OME
{ 
	foreach ($_POST as $key => $value) { $$key = addslashes(trim($value)); }

	$todaydate = date('Y-m-d');
	$error = false;

	if (strlen($firstname) < 2) {
	$error = true;
	$errormessage[] = 'Please enter your first name';
	}

	if (strlen($lastname) < 2) {
	$error = true;
	$errormessage[] = 'Please enter your last name';
	}

	if (strlen($email_address) < 5) {
	$error = true;
	$errormessage[] = 'Please enter your e-mail address.';
	}

	if (!preg_match("|^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$|i", $email_address)) {
	$error = true;
	$errormessage[] = 'Your email is not valid.';
	}

	$emailcount = mysql_result(mysql_query("SELECT COUNT(id) FROM ".TBL_AUTHORIZE_NEW." WHERE email='".clean_mysql($email_address)."'"),0); 
	if ($emailcount > 0) {
	$error = true;
	$errormessage[] = 'E-mail address is in use.';
	}

	if ((strlen($password) < 6) && (strlen($password) > 10)) {
	$error = true;
	$errormessage[] = 'Your password should be between 6-10 characters';
	}

	if ($password != $repassword) {
	$error = true;
	$errormessage[] = 'Password and verify password doesn\'t match.';
	}

	if ($email_address != $reemail_address) {
	$error = true;
	$errormessage[] = 'E-mail addresses doesn\'t match.';
	}

	if (strlen($username) < 5) {
	$error = true;
	$errormessage[] = 'Please enter your username';
	}

	$usernamecount = mysql_result(mysql_query("SELECT COUNT(id) FROM ".TBL_AUTHORIZE_NEW." WHERE username='".clean_mysql($username)."'"),0);
	if ($usernamecount > 0) {
	$error = true;
	$errormessage[] = 'Username is in use.';
	}

	if ($error == false) {

	$adminemail = 'steen@brogaard.com';
	$Nameedit = "brogaard.com";
	$frommailedit = "noreply@brogaard.com";
	$subjectedit = "New user registration - Herluf";
	$bodyedit = "Hello admin,\r\nYou have new user:\r\n\r\n";
	$bodyedit .= "First Name: $firstname\r\n";
	$bodyedit .= "Last Name: $lastname\r\n";
	$bodyedit .= "Email: $email_address\r\n";
	$headeredit = "From: ". $Nameedit . " <" . $frommailedit . ">\r\n";
	mail($adminemail, $subjectedit, $bodyedit, $headeredit);

	$activationkey =  generateCode();

      $sql_data_array = array('firstname' => $firstname,
                              'lastname' => $lastname,
                              'email' => $email_address,
                              'username' => $username,
                              'group1' => 'Users',
                              'usertype' => 'private',
                              'redirect' => 'http://www.brogaard.com/clientarea/Herluf-intern',
                              'date_created' => $todaydate,
                              'royalaccess' => '0',
                              'activationkey' => $activationkey);

	$sql = sprintf('INSERT INTO %s (%s) VALUES ("%s")', TBL_AUTHORIZE_NEW, implode(', ', array_map('mysql_escape_string', array_keys($sql_data_array))), implode('", "',array_map('mysql_escape_string', $sql_data_array)));
	$result = mysql_query($sql) or die ("Error in query: $sql. ".mysql_error());
	$insertid = mysql_insert_id();

	$sql2 = "UPDATE ".TBL_AUTHORIZE_NEW." SET password = password('$password') WHERE id='".(int)$insertid."'";
	$result2 = mysql_query($sql2) or die ("Error in query: $sql2. ".mysql_error());

	$Name = "brogaard.com";
	$email2 = "noreply@brogaard.com";
	$subject = "Account activation on brogaard.com";
	$body = "Hello $firstname,\r\nWelcome to our website!\r\n\r\nYou, or someone using your email address, has completed registration at brogaard.com. \r\n\r\nYour username: $username\r\nYour password: $password\r\n\r\n Your activation code : $activationkey\r\n\r\n\r\nhttp://www.brogaard.com/shell/activate.html\r\n\r\nIf this is an error, ignore this email.\r\n\r\nRegards";
	$header = "From: ". $Name . " <" . $email2 . ">\r\n";
	mail($email_address, $subject, nl2br($body), $header);
	$errormsg = "Registration successful. We just sent you activation code. <strong><a href=\"activate.html\">Click here</a></strong> to activate your account."; 

} else {
$errormsg = "<ul><li>".implode("<li>",$errormessage)."</ul>"; 
}
					  
}
?><div id="page-container" class="page-container contact-container">
<div id="page">

<div id="page_content" class="about">

<div id="stylishfont">
<h2>EKSKLUSIV HERLUFSHOLM FOTO-BLOG</h2>

<p>For at få adgang til til HERLUFSHOLM FOTO-BLOG skal du først registrere dig som bruger.</p>
<p><br />
  Billederne er forbeholdt nuværende eller tidligere elever, ansatte eller famiie til elever på Herlufholm Skole og Gods.<br />
  Billeder fundet på disse sider kan frikøbes til privat brug.</p>
<p>Er du elev på Herlufsholm? Bemærk at din Herlufsholm-mail udløber, når du ikke længere er elev på skolen.<br /> 
Herefter kan du ikke modtage nyhedsbrev og din konto hos os vil blive slettet.<br />
 Hvis du vil sikre dig mod dette, skal du registrere dig med en anden e-mail adresse.</p>
<p>Du kan ændre din mail-adresse, adgangskode og andre oplysninger når du er logget ind - klik på &quot;Din konto&quot;.</p>
<p>&nbsp;</p>
<p><a href="<?php echo URL_USER; ?>login.php"><u>Er allerede oprettet som bruger? - klik her</u></a></p>
</div>

<p>&nbsp;</p>

<div class="contact-form-container">
<div class="contact-form-content">
<form method="post" action="">

<table border="0" cellspacing="4" cellpadding="4" width="900" align="center">
	<tr>
	<td colspan="2" style="padding-left:80px;color:red;" align="left"><?php echo ( isset($errormsg)?$errormsg:'' ); ?></td>
	</tr>
</table>

<p>&nbsp;</p>

<div id="stylishfont">
	<label for="first_name" style="float:left; width:124px; margin-top:4px;"><?php echo lang('first_name'); ?>: <span class="required">*</span></label>
	<input type="text" id="firstname" name="firstname" tabindex="1" value="<?php echo ( isset($firstname)?$firstname:'' ); ?>" style="width:340px;" />
</div><div style="clear:both; height:10px;"></div>

<div id="stylishfont">
	<label for="last_name" style="float:left; width:124px; margin-top:4px;"><?php echo lang('last_name'); ?>: <span class="required">*</span></label>
	<input type="text" id="lastname" name="lastname" tabindex="2" value="<?php echo ( isset($lastname)?$lastname:'' ); ?>" style="width:340px;" />
</div><div style="clear:both; height:10px;"></div>

<div id="stylishfont">
	<label for="email" style="float:left; width:124px; margin-top:4px;"><?php echo lang('email'); ?>: <span class="required">*</span></label>
	<input type="text" id="email_address" name="email_address" tabindex="3" value="<?php echo ( isset($email_address)?$email_address:'' ); ?>" style="width:340px;" />
</div><div style="clear:both; height:10px;"></div>

<div id="stylishfont">
	<label for="email_repeat" style="float:left; width:124px; margin-top:4px;"><?php echo lang('email_repeat'); ?>: <span class="required">*</span></label>
	<input type="text" id="reemail_address" name="reemail_address" tabindex="4" value="<?php echo ( isset($reemail_address)?$reemail_address:'' ); ?>" style="width:340px;" />
</div><div style="clear:both; height:10px;"></div>

<div id="stylishfont">
	<label for="username" style="float:left; width:124px; margin-top:4px;"><?php echo lang('username'); ?>: <span class="required">*</span></label>
	<input type="text" id="username" name="username" tabindex="5" value="<?php echo ( isset($username)?$username:'' ); ?>" style="width:340px;" />
</div><div style="clear:both; height:10px;"></div>

<div id="stylishfont">
	<label for="password" style="float:left; width:124px; margin-top:4px;"><?php echo lang('password'); ?>:</label>
	<input type="password" id="password" name="password" tabindex="6" value="" style="width:340px;" />
</div><div style="clear:both; height:10px;"></div>

<div id="stylishfont">
	<label for="password_repeat" style="float:left; width:124px; margin-top:4px;"><?php echo lang('password_repeat'); ?>:</label>
	<input type="password" id="repassword" name="repassword" tabindex="7" value="" style="width:340px;" />
</div><div style="clear:both; height:10px;"></div>

<p>&nbsp;</p>

<div id="stylishfont">
	<?php echo lang('join_newsletter'); ?>: <input checked="checked" type="checkbox" tabindex="8" id="newsletter" name="newsletter" value="Yes" style="background:#FFFFFF; color:#141414; border:1px solid #000000; font-family:verdana; font-size:10px; padding:1px" />
</div><div style="clear:both; height:10px;"></div>

<p>&nbsp;</p>

	<fieldset>
	<input type="submit" class="button" id="submit" name="submit" value="<?php echo lang('register'); ?>" />
	</fieldset>

<!-- <table border="0" cellspacing="4" cellpadding="4" width="900" align="center">
	<tr>
	<td colspan="2" align="left"><span id="msgbox" style="display:none"></span></td>
	</tr>
</table> -->

</form>

<p>&nbsp;</p>

<div id="stylishfont">
<p>Du modtager kun automatiske opdateringer om nye billeder i Herlufsholm-mappen, hvis Newsletter boxen er valgt. <br><br> <em>To use and register with this website you must agree to our <a class="option" href="<?php echo URL_USER; ?>terms.php" title="Terms of Use" rel="shadowbox" target="_self"><u>Terms of Use</u></a> and <a class="option" href="<?php echo URL_USER; ?>policy.php" title="Privacy Policy" rel="shadowbox" target="_blank"><u>Privacy Policy</u></a>.</p>

<p>Please make sure that you have read and understood these before registering.<br>In particular, we will record and use your details to send you our newsletter by email unless you untick the 'Get newsletter' box.</em></p>
</div>

</div>
</div>

<div class="clear"></div>

		</div><!-- /page_content -->

    </div><!-- /page -->
				
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