<?php
/*
	TTG Core Elements - User Hook interface
	designed by john bishop images (http://johnbishopimages.com)
	for Matthew Campagna of The Turning Gate (http://theturninggate.net)
*/
// Begin hook processing
define( 'TTG_ROOT', __FILE__ );											// Set calling filesystem file name and path
																		//  - gives hook access to data in the calling folder (usually root or a gallery)
define( 'TTG_HOOK', '/customers/brogaard.com/brogaard.com/httpd.www/ttg_php_hooks' );								// Define user hook filesystem path - '/resources/hooks' as default

define( 'TTG_COMP', 'TTG Pages-GalleryIndex-CE 3.0' );								// TTG Component - 'TTG' 				- constant
																		//				 - 'gallery-style-name'	- gallery style name; no embedded blanks
																		//				 - 'gallery-release'	- gallery release; minimum x.y; maximum x.y.z

if (file_exists( TTG_HOOK . '/ttg_user_load.php')) {					// If ttg_user_load defined
	require_once TTG_HOOK . '/ttg_user_load.php';						//  run the code
}

if (function_exists('ttg_user_load')) {									// If ttg_user_load() exists
	$void = ttg_user_load( TTG_COMP, TTG_ROOT );						//  invoke it passing the CE component name & version plus this files pathname
}																		//   and ignore return value

?>