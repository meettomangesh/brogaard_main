<?php
// Restrict direct access to this file
if(!defined('BROGAARD_AUTH'))
{ 
	//die('DIRECT ACCESS TO THIS FILE IS NOT ALLOWED!');
	header("Location: ./index.php");
	exit; 
} 

$add_mode = true;														// Assume add normal code
if ( function_exists('ttg_user_header') ) {								// If function exists and
	if ( !(ttg_user_header( TTG_COMP, TTG_ROOT )) ) {					//  returns false then
		$add_mode = false;												//   don't include normal header
	}
}
if ( $add_mode ) {														// begin normal header (code below) ?>
		<div class="logo_container">
		<h1 class="logo"><a href="<?php echo CMS_URL; ?>"><span class="logo_alt">Steen Brogaard - Tales Through Photography</span></a></h1>
		</div>

<?php } 																// -end- normal header (code above) ?>

<nav>

<?php
$add_mode = true;														// Assume add normal code
if ( function_exists('ttg_user_menu') ) {								// If function exists and
	if ( !(ttg_user_menu( TTG_COMP, TTG_ROOT )) ) {					//  returns false then
		$add_mode = false;												//   don't include normal menu
	}
}

if ( $add_mode ) {														// begin normal menu (code below)

	//@require_once( DIR_USER.'site-menu-2.php' ); // NOT NEEDED

} 																// -end- normal menu (code above) ?>

</nav>
<?php 

/*
 * This copyright notice just for note to the programmer involved
 * Regards, 
 * medmed - at - scriptlance
 * #################################################################
 * Copyright (c) 2009 medyCMS. All rights reserved.
 */