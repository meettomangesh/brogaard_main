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
?>
<script type="text/javascript">
  /* Set onLoad focus to id="name" */
  function focus_textbox(){ setTimeout( function(){ try{ d = document.getElementById('name'); d.focus(); d.select(); } catch(e){} }, 200); } 
  focus_textbox();
</script>

<div id="page-container" class="page-container contact-container">
	<div id="page-content" class="page-content contact-content">

			<img class="page-image contact-image" alt="Beskåret version" src="<?php echo URL_USER; ?>pages-images/photos/1000000057_406x310.jpg" />

		<div class="copy contact-copy">
<?php

	// GET PHP MARKDOWN
	include_once 'pages-resources/php/markdown.php';

	// SETUP FRAGMENTS
	function includeFragment($fragmentName, $markdown=true) {

		$fullPath = 'fragments/'.$fragmentName.'.html';

		if (file_exists($fullPath)) {
			$contents = file_get_contents($fullPath);

			if ($markdown)
			$contents = Markdown($contents);

			echo $contents;
		}
	}

	// GET FRAGMENT
	includefragment('contact');

?>
		</div>
<div class="contact-form-container">
<div class="contact-form-content">
<form action="./pages-resources/php/FormToEmail.php" method="post" id="contact-form">
	 

	<fieldset>
	<label for="name">Navn</label>
	<input id="name" name="name" type="text" size="30" tabindex="1" required />
	</fieldset>

	<fieldset>
	<label for="email">Email</label>
	<input id="email" name="email" type="text" size="30" tabindex="2" required />
	</fieldset>

	<fieldset>
	<label for="telefon">Telefon*</label>
	<input id="telefon" name="telefon" type="text" size="30" tabindex="3" required />
	</fieldset>


	<fieldset>
	<label for="contactmessage">Besked</label>
	<textarea id="contactmessage" name="besked" rows="7" cols="30" tabindex="5"></textarea>
	</fieldset>

	<fieldset>
	<input type="submit" value="Send" />
	</fieldset>

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