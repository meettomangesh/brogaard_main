<?php
/*|:-> Load system configuration <-:|*/
require_once(dirname(__FILE__) . '/' . "auth.php");

/*if ( isset($_SESSION['id']) && $_SESSION['id'] < 1 ) { 
	redirect_to('./index.php');
}*/
if ( !isset($_SESSION['username']) && !isset($_SESSION['password']) ) { 
	redirect_to('./login.php');
}

/*|:-> Load HEADER <-:|*/
@include DIR_USER."site-header.php";

/*|:-> Load MENU <-:|*/
@include DIR_USER."site-menu.php";

?>
<script type="text/javascript">
  /* Set onLoad focus to id="password" */
  function focus_textbox(){ setTimeout( function(){ try{ d = document.getElementById('password'); d.focus(); d.select(); } catch(e){} }, 200); } 
  focus_textbox();
</script>

<div id="page-container" class="page-container contact-container">
	<div id="page-content" class="page-content contact-content">

			<img alt="" src="<?php echo URL_USER; ?>pages-resources/images/pic_login.png" />

		<div class="copy contact-copy"></div>

<div class="contact-form-container">
<div class="contact-form-content">
<p>&nbsp;</p>
<p>&nbsp;</p>

<form method="post" action="" id="changepass-form">

	<fieldset>
	<label for="password">Password:</label>
	<input id="password" name="password" type="password" size="30" tabindex="1" required />
	</fieldset>

	<fieldset>
	<label for="repassword">Repeat Password:</label>
	<input id="repassword" name="repassword" type="password" size="30" tabindex="2" required />
	</fieldset>

	<fieldset>
	<input type="submit" id="submit" name="submit" value="SUBMIT" tabindex="3" />
	</fieldset>

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