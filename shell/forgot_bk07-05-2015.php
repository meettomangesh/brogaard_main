<?php
/*|:-> Load system configuration <-:|*/
require_once(dirname(__FILE__) . '/' . "auth.php");

/*|:-> COOKIES and SESSION check <-:|*/
// This should be placed so system can recognize cookie
checkSession();

if ( isset($_SESSION['redirect']) ) { 
	redirect_to($_SESSION['redirect']);
}

/*|:-> Load HEADER <-:|*/
@include DIR_USER."site-header.php";

/*|:-> Load MENU <-:|*/
@include DIR_USER."site-menu.php";
?>
<script type="text/javascript">
  /* Set onLoad focus to id="email" */
  function focus_textbox(){ setTimeout( function(){ try{ d = document.getElementById('email'); d.focus(); d.select(); } catch(e){} }, 200); } 
  focus_textbox();
</script>

<div id="page-container" class="page-container contact-container">
	<div id="page-content" class="page-content contact-content">

			<img alt="" src="<?php echo URL_USER; ?>pages-resources/images/pic_login.png" />

		<div class="copy contact-copy"></div>

<div class="contact-form-container">
<div class="contact-form-content">
<form method="post" action="" id="forgot-form">

	<fieldset>
	<label for="email"><?php echo lang('email_address'); ?>:</label>
	<input id="email" name="email" type="text" size="30" tabindex="1" required />
	</fieldset>

	<fieldset>
	<label for="separator">&nbsp;</label>
	</fieldset>

	<fieldset>
	<input type="submit" id="submit" name="submit" value="<?php echo lang('send'); ?>" />
	</fieldset>

<p>&nbsp;</p>
<p style="padding:3px;"><a href="<?php echo URL_USER; ?>login.php"><?php echo lang('click_here_to_login'); ?></a></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
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