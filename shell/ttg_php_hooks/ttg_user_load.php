<?php
/*
	TTG Core Elements User Hooks v1.1 - initialization mainline
	
	developed by john bishop images (http://johnbishopimages.com)
	for Matthew Campagna of the Turning Gate (http://theturninggate.net)
	
	*************************************************************************************
	*                                                                                   *
	* Warning! When using echo or print special care must be qiven to using quotes.     *
	*                                                                                   *
	* Strings inside single quotes must contain only double quotes 						*
	* or all single quotes must be escaped (ie \') or vice-versa                        *
	*                                                                                   *
	*************************************************************************************
	
	Eight user exits are defined in all web engines - all are optional 
		(i.e. ttg_user_load.php may be the only processing)
		
	Some web engines will have additional exits defined, specific to that gallery type
		
	Each is called with the same parameters:
		%1	-	TTG gallery-style gallery-release
				3 blank delimited values
				- %1.1	-	'TTG'
				- %1.2	-	string describing gallery type; no embedded blanks
				- %1.3	-	a series of two to three period delimited integers
							describing gallery release level; x.y or x.y.z
		%2	-	server filesystem file name and path of calling file
		

	Defined exits:
		ttg_user_load		-	return value ignored
							-	called immediately after this file returns
							-	called before any output is produced
							-	all header and response variables are accessible
							-	cookie and session processing can be initialized
							-	globals to be used by later hook calls can be defined 
		ttg_user_head		-	if return = false normal TTG head processing is skipped
							-	called just after meta tags and just before link and script tags
		ttg_user_endhead	-	return value ignored
							-	called just before end head tag
		ttg_user_header		-	if return = false normal TTG header processing is skipped
							-	called just after header tag
		ttg_user_menu		-	if return = false normal TTG menu processing is skipped
							-	called just after nav tag
		ttg_user_body		-	return value ignored
							-	called just before footer tag
		ttg_user_footer		-	if return = false normal TTG footer processing is skipped
							-	called just after footer tag
		ttg_user_lastcall	-	return value ignored
							-	called just before end body tag	
*/

function ttg_user_load( $style, $path ) {
	$g_tsvrl = explode( ' ', $style );								// Extract gallery type
	define ( 'G_STYLE', strtoupper($g_tsvrl[1]) );					//  and set global for later
	$g_path = str_ireplace('\\','/',$path);							// change \ to / 
	$chunks = explode('/',$g_path);									//  and put into array
	define ( 'G_PATH', strtoupper($chunks[count($chunks)-2]) ); 	// gallery folder name is second to last
}


// SET USER FUNCTIONS BELOW
// ****************************************

/*

Some example functions are included below. Feel free to delete or modify unwanted functions.

*/

/* DELETE THIS LINE
// SITE-WIDE "TRADITIONAL" NAVIGATION MENU
// This function establishes a site-wide navigation menu using pseudo-absolute URLs -- portable, domain agnostic, and without the location limitations of relative URLs
// Serves as an example of a function being applied globally
function ttg_user_menu( $style, $path ) { 
	echo '
		<div class="menu_container">
		<p class="menuitems"><a class="alpha" href="/">Home</a><a href="/galleryindex.php">Gallery Index</a><a href="/services.php">Services</a><a href="/info.php">Info</a><a href="/about.php">About</a><a class="omega" href="/contact.php">Contact</a></p>
		</div>
	';
	return false;		// Replaces normal menu
} // END
DELETE THIS LINE */


// PAGE CONTENT FOR TTG-PAGES-CE
// This function defines content to be displayed on pages created by TTG Pages CE and process that content using PHP Markdown. DO NOT DELETE.
function ttg_user_page_content( $style, $path ) { 

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

	// GET PHP MARKDOWN
	include_once "pages-resources/php/markdown.php";

	// HOME PAGE CONTENT
	if (G_STYLE == 'PAGES-HOME-CE') {
	includefragment('home');
	}
	// END HOME
	
	// SERVICES PAGE CONTENT
	if (G_STYLE == 'PAGES-GALLERYINDEX-CE') {
	includefragment('galleryindex');
	}
	// END SERVICES
	
	// SERVICES PAGE CONTENT
	if (G_STYLE == 'PAGES-SERVICES-CE') {
	includefragment('services');
	}
	// END SERVICES
	
	// INFO PAGE CONTENT
	if (G_STYLE == 'PAGES-INFO-CE') {
	includefragment('info');
	}
	// END INFO
	
	// ABOUT PAGE CONTENT
	if (G_STYLE == 'PAGES-ABOUT-CE') {
	includefragment('about');
	}
	// END ABOUT
	
	// CONTACT PAGE CONTENT
	if (G_STYLE == 'PAGES-CONTACT-CE') {
	includefragment('contact');
	}
	// END CONTACT

} // END


// ****************************************
// END USER FUNCTIONS

?>