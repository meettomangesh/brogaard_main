<?php
/*|:-> Load system configuration <-:|*/
require_once( dirname(dirname(__FILE__)) . '/core-configs.php' ); 

// #############################################################
// Loads core (function) files
// #############################################################
load_core_functions();
// #############################################################
// Connect to MySQL Database
// #############################################################
database_connect();

function hasWord($word, $txt) {
    $patt = "/(?:^|[^a-zA-Z])" . preg_quote($word, '/') . "(?:$|[^a-zA-Z])/i";
    return preg_match($patt, $txt);
}

// Reverse hash from GET parameter to its actual id OR location
$imgid = base64safe_decode($_GET['imghash']);

if( ctype_digit($imgid) ) 
	{ 
		// DIGITS +> search location from database
		// Get Image Path from database
		$getImgPath = db_single_retrieve('image_path',TBL_IMAGE_DATA,'image_id',$imgid);

		// Assign the proper file location
		$fileLocation = CMS_PATH.$getImgPath;
	} else { 
		// LOCATION +> Check if it's in directory /clientarea/ or not
		$check = hasWord('clientarea', $imgid);

			if ( $check ) { 
				$dlPath = CMS_PATH; 
			} else { 
				$dlPath = DIR_USER; 
			} 

		// Assign the proper file location
		$fileLocation = $dlPath.$imgid;
	}

// Force image download
force_download( filesize($fileLocation), $fileLocation );


/*
 * This copyright notice just for note to the programmer involved
 * Regards, 
 * medmed - at - scriptlance
 * #################################################################
 * Copyright (c) 2009 medyCMS. All rights reserved.
 */