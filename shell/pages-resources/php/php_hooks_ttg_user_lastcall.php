<?php
if ( function_exists('ttg_user_lastcall') ) {								// If ttg_user_endhead() exists
	$void = ttg_user_lastcall( TTG_COMP, TTG_ROOT ); 						//  invoke it
}				 														//   ignoring return value
?>