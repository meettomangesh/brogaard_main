<?php
/*|:-> Load system configuration <-:|*/
require_once(dirname(__FILE__) . '/' . "auth.php");


if ( array_key_exists('goto', $_GET) ) { 
	$_SESSION['goto'] = CMS_URL.'clientarea/'.$_GET['goto'];
	redirect_to($_SERVER['PHP_SELF']);
} 

/*|:-> COOKIES and SESSION check <-:|*/
// This should be placed so system can recognize cookie
checkSession();

if ( isset($_SESSION['redirect']) ) 
{ 
	if ( isset($_SESSION['goto']) ) 
	{ 
		redirect_to($_SESSION['goto']); 
	} else { 
		redirect_to($_SESSION['redirect']);
	}
}


/*|:-> Load HEADER <-:|*/
@include DIR_USER."site-header.php";

/*|:-> Load MENU <-:|*/
@include DIR_USER."site-menu.php";
?>
<script type="text/javascript">
  /* Set onLoad focus to id="username" */
  function focus_textbox(){ setTimeout( function(){ try{ d = document.getElementById('username'); d.focus(); d.select(); } catch(e){} }, 200); } 
  focus_textbox();
</script>

<div id="page-container" class="page-container contact-container">
	<div id="page-content" class="page-content contact-content">

			<img alt="" src="<?php echo URL_USER; ?>pages-resources/images/pic_login.png" />

		<div class="copy contact-copy"></div>

<div class="contact-form-container">
<div class="contact-form-content">
<form method="post" action="" id="login-form">

	<fieldset>
	<label for="username"><?php echo lang('email'); ?>/<?php echo lang('username'); ?>:</label>
	<input id="username" name="username" type="text" size="30" tabindex="1" required />
	</fieldset>

	<fieldset>
	<label for="password"><?php echo lang('password'); ?>:</label>
	<input id="password" name="password" type="password" size="30" tabindex="2" required />
	</fieldset>

	<fieldset>
	<label for="rememberme"><?php echo lang('keepme_loggedin'); ?> <input type="checkbox" id="rememberme" name="rememberme" style="background-color:#FFFFFF; color: #141414; border: 1px solid #000000; font-family: verdana; font-size: 10px; padding: 1px" /></label>
	</fieldset>

	<fieldset>
	<input type="submit" id="submit" name="submit" value="<?php echo lang('login'); ?>" />
	</fieldset>

<p style="padding:3px;"><a href="<?php echo URL_USER; ?>services.php">Intet login?</a></p>
<p style="padding:3px;"><a href="<?php echo URL_USER; ?>forgot.php">Glemt login?</a></p>
<p style="padding:3px;">Login kræver at cookies er slået til.<p>&nbsp;</p>
<p><span id="msgbox" style="display:none"></span></p>
</form>
</div>
</div> <!-- /form-container -->

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