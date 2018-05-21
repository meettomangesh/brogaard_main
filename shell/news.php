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
<div id="page-container" class="page-container contact-container">
	<div id="page-content" class="page-content contact-content">

	<!-- <img class="page-image contact-image" alt="Beskåret version" src="<?php echo URL_USER; ?>pages-images/photos/1000000057_406x310.jpg" /> -->

<div class="copy contact-copy" style="width:924px; background:transparent;">
<?php

$fileTXT = URL_USER.'news-content.txt';
$v = file_get_contents_curl_quick($fileTXT);

preg_match_all('/<!--TITLE-->(.*?)<!--\/TITLE-->/si', $v, $r);
preg_match_all('/<!--CONTENT-->(.*?)<!--\/CONTENT-->/si', $v, $s);
preg_match_all('/<!--DATE-->(.*?)<!--\/DATE-->/si', $v, $t);

$get['title']	= $r[1];
$get['content']	= $s[1];
$get['date']	= $t[1];

$total = count($get['title']);

foreach ( $get as $key=>$val ) { $$key = $val; } 

for ($i=0; $i<$total; $i++) { 
	$datetime = strtotime($date[$i]);
	echo '<h2>'.$title[$i].'</h2><a name="#'.$date[$i].'"></a>'."\n"; 
	echo '<p>'.$content[$i].'</p>'."\n"; 
}

?>
</div>

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