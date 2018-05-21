<?php
include('includes/functions.php');

/*define('DB_NAME','brogaard_com');
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','optim');
*/


define('DB_NAME','brogaard_com');
define('DB_HOST','brogaard.com.mysql');
define('DB_USER','brogaard_com');
define('DB_PASS','markustimur');

include('database/db_functions.php');
$row= new DB;
$row->connect();

?>