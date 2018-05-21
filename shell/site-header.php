<?php
// Restrict direct access to this file
if(!defined('BROGAARD_AUTH'))
{ 
	//die('DIRECT ACCESS TO THIS FILE IS NOT ALLOWED!');
	header("Location: ./index.php");
	exit; 
} 

// Options to use different CSS for upper menuline and bottom menuline (common.css)
function cssUpperMenuLineCommon() 
{ 
	$thisFile = ( ($_SERVER["SCRIPT_FILENAME"]!='')?$_SERVER["SCRIPT_FILENAME"]:$_SERVER['PHP_SELF'] );
	if ( basename($thisFile)=='index.php' || 
		 basename($thisFile)=='forgot.php' || 
		 basename($thisFile)=='activate.php' || 
		 basename($thisFile)=='herluf-reg.php' || 
		 basename($thisFile)=='galleryindex.php' || 
		 basename($thisFile)=='info.php' || 
		 basename($thisFile)=='about.php' || 
		 basename($thisFile)=='services.php' || 
		 basename($thisFile)=='contact.php' || 
		 basename($thisFile)=='login.php' || 
		 basename($thisFile)=='terms.php' || 
		 basename($thisFile)=='policy.php' ) {
		print 'common-new.css';
	} else {
		print 'common-loggedin-new.css';
	}
} 

// Options to use different CSS for upper menuline and bottom menuline (ttg-pages-ce.css)
function cssUpperMenuLineTTGpages() 
{ 
	$thisFile = ( ($_SERVER["SCRIPT_FILENAME"]!='')?$_SERVER["SCRIPT_FILENAME"]:$_SERVER['PHP_SELF'] );
	if ( basename($thisFile)=='index.php' || 
		 basename($thisFile)=='forgot.php' || 
		 basename($thisFile)=='activate.php' || 
		 basename($thisFile)=='herluf-reg.php' || 
		 basename($thisFile)=='galleryindex.php' || 
		 basename($thisFile)=='info.php' || 
		 basename($thisFile)=='about.php' || 
		 basename($thisFile)=='services.php' || 
		 basename($thisFile)=='contact.php' || 
		 basename($thisFile)=='login.php' || 
		 basename($thisFile)=='terms.php' || 
		 basename($thisFile)=='policy.php' ) {
		print 'ttg-pages-ce.css';
	} else {
		print 'ttg-pages-ce-loggedin.css';
	}
} 

?>
<!DOCTYPE html>
<html lang="da" dir="ltr" class="no-js">
<head>

	<title><?php echo lang('site_meta_title'); ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="generator" content="Adobe Photoshop Lightroom, The Turning Gate, http://theturninggate.net" />

	<meta name="author" content="Steen Brogaard" />
	<meta name="description" content="<?php echo lang('site_meta_description'); ?>" />
	<meta name="keywords" content="<?php echo lang('site_meta_keywords'); ?>" />

	<!-- REFERS TO http://ogp.me/ FOR MORE DETAILS -->
    <meta property="og:title" content="PHOTOGRAPHER STEEN BROGAARD | PORTRAIT | REPORTAGE | ILLUSTRATIONS | CORPORATE PHOTOGRAPHY | IMAGE BANK"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="http://www.brogaard.com"/>
    <meta property="og:image" content="http://www.brogaard.comthumbnails/icloud_icon_399x400.jpg" />
    <meta property="og:site_name" content="PHOTOGRAPHER STEEN BROGAARD | PORTRAIT | REPORTAGE | ILLUSTRATIONS | CORPORATE PHOTOGRAPHY | IMAGE BANK"/>
    <meta property="fb:admins" content="2280647575229"/>
    <meta property="og:description" content="Copenhagen based photographer"/>

	<link rel="image_src" href="<?php echo URL_USER; ?>pages-images/thumbnails/icloud_icon_399x400.jpg" />
	<link rel="alternate" type="application/rss+xml" title="brogaard.com RSS" href="<?php echo URL_USER; ?>news-rss.php" /> 

	<link rel="shortcut icon" type="image/ico" href="<?php echo URL_USER; ?>pages-resources/images/favicon.ico" />
	<link rel="stylesheet" href="<?php echo URL_USER; ?>pages-resources/css/<?php cssUpperMenuLineCommon(); ?>" />
	<link rel="stylesheet" href="<?php echo URL_USER; ?>pages-resources/css/<?php cssUpperMenuLineTTGpages(); ?>" />
	<link rel="stylesheet" href="<?php echo URL_USER; ?>pages-resources/css/add.css" />

<script type="text/javascript">
// Disable Javascript Errors on silly browsers (IE)
// Create a function that always returns true, and then whenever an error occurs, call this function (returning true and suppressing the error)
function noError(){ return true; }
window.onerror = noError;
</script>

	<script type="text/javascript" src="<?php echo URL_USER; ?>pages-resources/js/modernizr-1.7.min.js"></script>

	<script type="text/javascript" src="<?php echo URL_USER; ?>pages-resources/js/jquery-1.5.2.min.js"></script>
<?php 
// Change for which JS file to be used
$currentPage = ( ($_SERVER["SCRIPT_FILENAME"]!='')?$_SERVER["SCRIPT_FILENAME"]:$_SERVER['PHP_SELF'] );
if ( basename($currentPage)=='login.php' ) echo '<script type="text/javascript" src="'.URL_USER.'ajax_login.js"></script>'."\n";
if ( basename($currentPage)=='forgot.php' ) echo '<script type="text/javascript" src="'.URL_USER.'ajax_forgot.js"></script>'."\n";
if ( basename($currentPage)=='activate.php' ) echo '<script type="text/javascript" src="'.URL_USER.'ajax_activate.js"></script>'."\n";
if ( basename($currentPage)=='changepass.php' ) echo '<script type="text/javascript" src="'.URL_USER.'ajax_changepass.js"></script>'."\n";
?>
	<script type="text/javascript" src="<?php echo URL_USER; ?>pages-resources/js/swfobject.js"></script>
	<script type="text/javascript" src="<?php echo URL_USER; ?>pages-resources/js/livevalidation.js"></script>

	<script type="text/javascript" src="<?php echo URL_USER; ?>pages-resources/js/jquery.jfade.1.0.min.js"></script>
	<script type="text/javascript" src="<?php echo URL_USER; ?>pages-resources/js/captify.tiny.js"></script>
	
<script type="text/javascript" src="<?php echo URL_USER; ?>pages-resources/shadowbox/shadowbox.js"></script>
<script type="text/javascript"><!-- var options = { overlayColor: '#000000', overlayOpacity: 0.85, players: ['img','swf','flv','qt','wmp','iframe','html'] };
									Shadowbox.init(options); //--></script>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo URL_USER; ?>pages-resources/shadowbox/shadowbox.css" />

<style type="text/css">
	#sb-nav-close { background-image:url(./resources/images/sb_ffffff_icons.png) !important; background-position: -64px 0; }
	#sb-nav-next { background-image:url(./resources/images/sb_ffffff_icons.png) !important; background-position: -32px 0; }
	#sb-nav-previous { background-image:url(./resources/images/sb_ffffff_icons.png) !important; background-position: -48px 0; }
	#sb-nav-play { background-image:url(./resources/images/sb_ffffff_icons.png) !important; background-position: -16px 0; }
	#sb-nav-pause { background-image:url(./resources/images/sb_ffffff_icons.png) !important; background-position: 0 0; }
</style>

<script type="text/javascript"><!-- 
	$(function(){
		$(".albumBox").jFade({ trigger: "mouseover", property: 'background', start: 'FFFFFF', end: '000000', steps: 20, duration: 15 })
					  .jFade({ trigger: "mouseout", property: 'background', start: '000000', end: 'FFFFFF', steps: 20, duration: 15 });
		}); //--></script>

<script type="text/javascript"><!-- 
		function printViewportDimensions() { var viewportwidth = $(window).width(); 
											 var viewportheight = window.innerHeight ? window.innerHeight : $(window).height();  
			$('#wrapper').css('min-height', (viewportheight-100) + 'px');
		}
		printViewportDimensions();
		
		$(function() { printViewportDimensions();
			$(window).resize(function() { printViewportDimensions(); });
		}); //--></script>

<script type="text/javascript"><!--
		$(function(){
			$('img.captify').captify({ speedOver: 'fast', speedOut: 'normal', hideDelay: 500, animation: 'always-on', prefix: '', 
									   opacity: '0.7', className: 'caption-bottom', position: 'bottom', spanWidth: '100%' });
		}); //--></script>

<style type="text/css">
	#page_content { padding:20px; }
	#page_content { -moz-border-radius:10px; -webkit-border-radius:10px; } 
	p.lineTitle1 { font-weight:bold; font-size:120%; color:#111111; }
	p.lineTitle2 { font-weight:bold; font-size:110%; color:#111111; }
	.albumBox, .albumBoxContent { background:#FFFFFF; -moz-border-radius:9px; -webkit-border-radius:9px; }
	#inputfields { -moz-border-radius:0px; -webkit-border-radius:0px; }
	.caption-top, .caption-bottom { background:#FFFFFF; color:#000000; padding:0.5em; border:0px solid #000000;	font-weight:normal; font-size:14px; font-family:Frutiger, 'Frutiger Linotype', Univers, Calibri, 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', Myriad, 'DejaVu Sans Condensed', 'Liberation Sans', 'Nimbus Sans L', Tahoma, Geneva, 'Helvetica Neue', Helvetica, Arial, sans-serif;	text-shadow:1px 1px 0 #FFFFFF; }
	.caption-top { border-width:0px 0px 0px 0px; }
	.caption-bottom { border-width:0px 0px 0px 0px; }
	.caption a, .caption a { border:0 none; text-decoration:none; background:#000000; padding:0.3em; }
	.caption a:hover, .caption a:hover { background:#202020; }
	.albumBoxContent, img.captify { width:210px; height:210px; }
	.albumBoxContent { padding:0 !important; }
	img.captify { opacity:0; filter:alpha(opacity=0); }
	#footer { position:absolute; bottom:0; left:0; }
	span.required { font-weight:bold; color:#ff0000; }
</style>

<!--[if lt IE 8]>
<script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE8.js" type="text/javascript"></script>
<![endif]-->

<!--[if lt IE 9]>
<![endif]-->

<!--[if IE]>
<![endif]-->

</head>

<body>
<?php 

@include(DIR_USER.'google_translate.html');

/*
 * This copyright notice just for note to the programmer involved
 * Regards, 
 * medmed - at - scriptlance
 * #################################################################
 * Copyright (c) 2009 medyCMS. All rights reserved.
 */