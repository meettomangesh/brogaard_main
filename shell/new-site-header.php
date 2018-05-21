<link rel="stylesheet" href="<?php echo URL_USER; ?>pages-resources/css/add.css" />
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