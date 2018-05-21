<?php

/*

G_STYLE identifiers for TTG Pages CE; each page has a separate G_STYLE identity. To target all pages in a single function, see code examples below.

PAGES-HOME-CE
PAGES-GALLERYINDEX-CE
PAGES-SERVICES-CE
PAGES-INFO-CE
PAGES-ABOUT-CE
PAGES-CONTACT-CE

*/

// TARGET ALL PAGES IN TTG PAGES CE
function ttg_user_function( $style, $path ) { 
	
	if(preg_match('/^PAGES-(.*)-CE$/', G_STYLE)) {

	// FUNCTION HERE

	}

} // END


// TARGET SPECIFIC PAGE IN TTG PAGES CE
function ttg_user_function( $style, $path ) { 
	
	if (G_STYLE == 'PAGES-HOME-CE') {

	// FUNCTION HERE

	}

} // END

?>