<?php 
/*|:-> Logged-in check <-:|*/
require_once(dirname(__FILE__) . '/' . "auth.php");

// CATCH SESSION - COOKIE - etc

echo 'REFERER: '.( isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'Unknown' );
echo '<br />';
echo 'REFERER FILENAME: '.( isset($_SERVER['HTTP_REFERER']) ? basename($_SERVER['HTTP_REFERER']) : 'Unknown' );
echo '<br />';
echo getenv('HTTP_REFERER');

echo '<pre>';

echo 'SESSION:<br />';
print_r($_SESSION);
echo '<br />';

echo 'COOKIE:<br />';
print_r($_COOKIE);
echo '<br />';

echo 'POST:<br />';
print_r($_POST);
echo '<br />';

echo 'GET:<br />';
print_r($_GET);
echo '<br />';

// [PHPSESSID] => bca0f1631aedd60992eb4dc847e285c4
//:-?  tp posisinya hrs bgmn brarti TA?