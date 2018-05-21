<?php
// Restrict direct access to this file
if(!defined('BROGAARD_AUTH'))
{ 
	//die('DIRECT ACCESS TO THIS FILE IS NOT ALLOWED!');
	header("Location: ./index.php");
	exit; 
} 

?>
	<footer>

<div class="footer_container">

<p class="footer_text">PHOTOGRAPHER STEEN BROGAARD  | INFO@BROGAARD.COM | CELLPH.: +45 4057 8090 | ALL RIGHTS RESERVED 1984-2014</p>

<p class="social_networking_icons">
<a href="http://www.facebook.com/brogaard" target="_blank"><img src="<?php echo URL_USER; ?>pages-resources/images/social_networking/facebook_16.png" /></a>
<a href="http://twitter.com/brogaard" target="_blank"><img src="<?php echo URL_USER; ?>pages-resources/images/social_networking/twitter_16.png" /></a>
<a href="http://dk.linkedin.com/pub/steen-brogaard/0/8a9/123" target="_blank"><img src="<?php echo URL_USER; ?>pages-resources/images/social_networking/linkedin_16.png" /></a>
<a href="mailto: steen@brogaard.com"><img src="<?php echo URL_USER; ?>pages-resources/images/social_networking/email_16.png" /></a>
<a href="<?php echo URL_USER; ?>news-rss.php" target="_blank"><img src="<?php echo URL_USER; ?>pages-resources/images/social_networking/rss_16.png" /></a>
<a href="http://c.itunes.apple.com/dk/profile/id100602089?l=da" target="_blank"><img src="<?php echo URL_USER; ?>pages-resources/images/social_networking/itunes_16.png" /></a>
</p>

</div>

	</footer>

</div> <!-- /container -->

<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-11542948-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</body>

</html>
<?php
/*
 * This copyright notice just for note to the programmer involved
 * Regards, 
 * medmed - at - scriptlance
 * #################################################################
 * Copyright (c) 2009 medyCMS. All rights reserved.
 */