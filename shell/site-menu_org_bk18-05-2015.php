<?php
// Restrict direct access to this file
if(!defined('BROGAARD_AUTH'))
{ 
	//die('DIRECT ACCESS TO THIS FILE IS NOT ALLOWED!');
	header("Location: ./index.php");
	exit; 
} 

// Define Menu Stylesheet
echo '<link rel="stylesheet" type="text/css" media="screen" href="'.URL_USER.'pages-resources/css/menu-new.css" />'."\n";

$currPageFile = basename( currPageURL() );

if ( isset($_SESSION['username']) && isset($_SESSION['password']) && $currPageFile!='changepass.php' ) { // shown for logged-in user
	$clientGalleryHome	 = $_SESSION['redirect'];
	$clientGalleryHomeHD = $_SESSION['redirect'].'/HD/';

?>
<style type="text/css">
div.sbox-container { float:right; padding-right:420px; height:40px; background: #5e5e5e url('<?php echo URL_USER; ?>pages-resources/images/search-bg.jpg') repeat-x; width: 233px;} 
div.sbox-wrap { width:235px; background: transparent url('<?php echo URL_USER; ?>pages-resources/images/search-box.png') 16px 8px no-repeat; padding: 7px; }
input.sbox { border:none; background:transparent; width:200px; color:#333333; padding:4px 0 0 35px; font-size:9pt; } 
</style>

	<header>
		<div class="logo_container">
		<h1 class="logo"><a href="<?php echo CMS_URL; ?>"><span class="logo_alt">Steen Brogaard - Tales Through Photography</span></a></h1>
		</div>

		<nav>
<div class="menu_container" style="margin-top:10px;"><p class="menuitems">
<a class="<?php active_menu('galleryindex.php'); ?> alpha" href="<?php echo URL_USER; ?>galleryindex.php"><?php echo lang('portfolio'); ?></a><a class="<?php active_menu('info.php'); ?>" href="<?php echo URL_USER; ?>info.php"><?php echo lang('royal'); ?></a><a class="<?php active_menu('about.php'); ?>" href="<?php echo URL_USER; ?>about.php"><?php echo lang('scrapbook'); ?></a><a class="<?php active_menu('services.php'); ?>" href="<?php echo URL_USER; ?>services.php"><?php echo lang('services'); ?></a><a class="<?php active_menu('contact.php'); ?>" href="<?php echo URL_USER; ?>contact.php"><?php echo lang('contact'); ?></a><a class="menuitem" href="http://www.mosthigh.dk" title="<?php echo lang('most_high_title'); ?>" target="_blank"><?php echo lang('most_high'); ?><img src="<?php echo URL_USER; ?>pages-resources/brogaard/arrowout.gif" alt="" align="absbottom" /></a><a class="menuitem omega" href="<?php echo URL_USER; ?>logout.php"><?php echo lang('logout'); ?></a>
</p></div>

<div class="menu_container">
<div class="sbox-container">
<div class="sbox-wrap">
<form method="get" id="searchform" action="<?php echo URL_USER; ?>search.php"><input class="sbox" type="text" name="s" onblur="this.value=(this.value=='') ? '<?php echo lang('search_box'); ?>' : this.value;" onfocus="this.value=(this.value=='<?php echo lang('search_box'); ?>') ? '' : this.value;" value="<?php echo lang('search_box'); ?>" /><input type="submit" name="submit" value="Search" style="display:none;" /></form>
</div>
</div>
</div>

<div class="menu_container" style="margin-top:-43px; margin-bottom:10px;"><p class="menuitems">
<a class="<?php active_menu('edit_account.php'); ?>" href="<?php echo URL_USER; ?>edit_account.php"><?php echo lang('your_account'); ?></a><a class="<?php active_menu('pdf.php'); ?>" href="<?php echo $clientGalleryHome.'/pdf.php'; ?>"><?php echo lang('pdf'); ?></a><a class="<?php active_menu('home_hd.php'); ?>" href="<?php echo $clientGalleryHomeHD; ?>"><?php echo lang('downloads'); ?></a><a class="<?php active_menu('home.php'); ?> omega" href="<?php echo $clientGalleryHome; ?>"><?php echo lang('member_homepage'); ?></a>
</p></div>
		</nav>

	</header>
<?php
} else { // shown for NOT logged-in user
?>
	<header>
		<div class="logo_container">
		<h1 class="logo"><a href="<?php echo CMS_URL; ?>"><span class="logo_alt">Steen Brogaard - Tales Through Photography</span></a></h1>
		</div>

		<nav>
<div class="menu_container"><p class="menuitems">
<a class="<?php active_menu('galleryindex.php'); ?> alpha" href="<?php echo URL_USER; ?>galleryindex.php"><?php echo lang('portfolio'); ?></a><a class="<?php active_menu('info.php'); ?>" href="<?php echo URL_USER; ?>info.php"><?php echo lang('royal'); ?></a><a class="<?php active_menu('about.php'); ?>" href="<?php echo URL_USER; ?>about.php"><?php echo lang('scrapbook'); ?></a><a class="<?php active_menu('services.php'); ?>" href="<?php echo URL_USER; ?>services.php"><?php echo lang('services'); ?></a><a class="<?php active_menu('contact.php'); ?>" href="<?php echo URL_USER; ?>contact.php"><?php echo lang('contact'); ?></a><a class="menuitem" href="http://www.mosthigh.dk" title="<?php echo lang('most_high_title'); ?>" target="_blank"><?php echo lang('most_high'); ?><img src="<?php echo URL_USER; ?>pages-resources/brogaard/arrowout.gif" alt="" align="absbottom" /></a><a class="<?php active_menu('login.php'); ?> omega" href="<?php echo URL_USER; ?>login.php"><?php echo lang('login'); ?></a>
</p></div>
		</nav>

	</header>
<?php
	}
/*
 * This copyright notice just for note to the programmer involved
 * Regards, 
 * medmed - at - scriptlance
 * #################################################################
 * Copyright (c) 2009 medyCMS. All rights reserved.
 */