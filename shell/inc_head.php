<?php
// Restrict direct access to this file
if(!defined('BROGAARD_AUTH'))
{ 
	//die('DIRECT ACCESS TO THIS FILE IS NOT ALLOWED!');
	header("Location: ./index.php");
	exit; 
} 

?>
<head>

	<title><?php echo lang('site_meta_title'); ?></title>

	<meta charset="utf-8" />
	<meta name="generator" content="Adobe Photoshop Lightroom, The Turning Gate, http://theturninggate.net" />

	<meta name="author" content="Steen Brogaard" />
	<meta name="description" content="<?php echo lang('site_meta_description'); ?>" />
	<meta name="keywords" content="<?php echo lang('site_meta_keywords'); ?>" />

    <meta property="og:title" content="PHOTOGRAPHER STEEN BROGAARD | PORTRAIT | REPORTAGE | ILLUSTRATIONS | CORPORATE PHOTOGRAPHY | IMAGE BANK"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="http://www.brogaard.com"/>
    <meta property="og:image" content="http://www.brogaard.comthumbnails/Depositphotos_4567971_M_edit.jpg" />
    <meta property="og:site_name" content="PHOTOGRAPHER STEEN BROGAARD | PORTRAIT | REPORTAGE | ILLUSTRATIONS | CORPORATE PHOTOGRAPHY | IMAGE BANK"/>
    <meta property="fb:admins" content="1219993359"/>
    <meta property="og:description" content="Copenhagen based photographer"/>

<!-- <link rel="image_src" href="thumbnails/icloud_icon_399x400.jpg" /> -->
	<link rel="alternate" type="application/rss+xml" title="brogaard.com RSS" href="<?php echo URL_USER; ?>news-rss.php" /> 

<?php
$add_mode = true;														// Assume add normal code
if ( function_exists('ttg_user_head') ) {								// If function exists and
	if ( !(ttg_user_head( TTG_COMP, TTG_ROOT )) ) {						//  returns false then
		$add_mode = false;												//   don't include normal head
	}
}
if ( $add_mode ) {														// begin normal head (code below)?>	

	<link rel="shortcut icon" type="image/ico" href="<?php echo URL_USER; ?>pages-resources/images/favicon.ico" />
	<link rel="stylesheet" href="<?php echo URL_USER; ?>pages-resources/css/common.css" />
	<link rel="stylesheet" href="<?php echo URL_USER; ?>pages-resources/css/ttg-pages-ce.css" />

	<script type="text/javascript" src="<?php echo URL_USER; ?>pages-resources/js/jquery-1.5.2.min.js"></script>
	<script type="text/javascript" src="<?php echo URL_USER; ?>pages-resources/js/ttg.init.js"></script>

	<script type="text/javascript" src="<?php echo URL_USER; ?>pages-resources/js/modernizr-1.7.min.js"></script>

	<script type="text/javascript" src="<?php echo URL_USER; ?>pages-resources/js/jquery.jfade.1.0.min.js"></script>
	<script type="text/javascript">
		$(function(){
			$(".album-container").jFade({
				trigger: "mouseover",
				property: 'background-color',
				start: '454444',
				end: 'AAAAAA',
				steps: 20,
				duration: 15
			}).jFade({
				trigger: "mouseout",
				property: 'background-color',
				start: 'AAAAAA',
				end: '454444',
				steps: 20,
				duration: 15
			});		
		});
	</script>
<?php
}																// -end- normal head (code above) ?>
<!--[if lt IE 9]>
<![endif]-->

<!--[if IE]>
<![endif]-->

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

<?php
if ( function_exists('ttg_user_endhead') ) {								// If ttg_user_endhead() exists
	$void = ttg_user_endhead( TTG_COMP, TTG_ROOT ); 						//  invoke it
}				 														//   ignoring return value
?>
</head>
<?php

/*
 * This copyright notice just for note to the programmer involved
 * Regards, 
 * medmed - at - scriptlance
 * #################################################################
 * Copyright (c) 2009 medyCMS. All rights reserved.
 */