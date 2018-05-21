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
<div id="page-container" class="page-container home-container">
	<div id="page-content" class="page-content home-content">

<!-- Begin Monoslideshow 2 Embed -->
<div id="frame" class="stage-container home-stage">
<script type="text/javascript">
var flashvars = {
	showLogo: "false",
	showRegistration: "false"
};
var params = {
	allowScriptAccess: "sameDomain",
	allowfullscreen: "true",
	allowNetworking: "all",
	base: "home-monoslideshow/"
};
var attributes = {
	bgcolor: "#F4F4F4",
	id: "monoslideshow",
	name: "monoslideshow"
};
swfobject.embedSWF("<?php echo URL_USER; ?>home-monoslideshow/monoslideshow.swf", "flashcontent", "100%", "100%", "9.0.0", false, flashvars, params, attributes);
</script>

<div id="flashcontent" class="stage home-stage">
<img class="page-image home-image" alt="icloud" src="<?php echo URL_USER; ?>pages-images/photos/icloud_icon_399x400.jpg" />
</div>

</div>
<!-- End Monoslideshow 2 Embed -->

		<div class="copy home-copy"></div>

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