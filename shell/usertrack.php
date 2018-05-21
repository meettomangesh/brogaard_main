<? session_start();
require_once "conn.php";

if ($_SESSION[logloginid] > 0) {

$timo = time();
$date = date("y-m-d");
$hour = date("G:i");
$referrer = $_SERVER['HTTP_REFERER'];
$arr = $_SERVER;
foreach ($arr as $key => $value) {
    $content .= "Key: $key; Value: $value \n";
}

$sql = "INSERT INTO
 log_logintrack
 (log_logintrack_logloginid, log_logintrack_timeunix, log_logintrack_date, log_logintrack_time, log_logintrack_page)
 VALUES
 ('$_SESSION[logloginid]','$timo','$date','$hour','$referrer')" ;

@mysql_query($sql) or die("XXXXXXXXXXXXXXX");
}

?>
