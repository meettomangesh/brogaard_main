<?
session_start();

function make_seo($variable) {
  $variable = eregi_replace("[^[:alnum:]]", " ", $variable);
  $variable = str_replace(" ", "-", trim($variable));
  $variable = ereg_replace("[-]+","-",$variable); 
  $variable = strtolower(addslashes($variable));
  return $variable;
}

require_once "conn.php";
foreach ($_POST as $key => $value) {
$$key = addslashes(trim($value));
}

$username = $firstname.$lastname;
$username = make_seo($username);

$sql ="SELECT * FROM authorize_new WHERE username= '$username'";
$result = @mysql_query($sql) or die(mysql_error());
$num = mysql_num_rows($result);
;/*
if ($num != 0){
$errormsg = 'Sorry, that username already exists.';
exit;
} else if (!$username){
$errormsg = 'All fields are required.';
exit;
} else {
*/

if ($newsletter!=1) {
$newsletter = 0;
}

$today = date("Y-m-d");

      $sql_data_array = array('firstname' => $firstname,
                              'lastname' => $lastname,
                              'email' => $email,
                              'username' => $username,
                              'group1' => 'Users',
                              'usertype' => 'private',
							  'pchange' => '0',
							  'verified' => '1',
							  'editaccount' => '0',
                              'redirect' => 'http://www.brogaard.com/clientarea/royal',
                              'date_created' => $today,
                              'password' => '*DF2A823058F8AC77B1EB1B2D805A22FD14FC53FD',
                              'getnewsletter' => $newsletter);

$sql = sprintf('INSERT INTO %s (%s) VALUES ("%s")', 'authorize_new', implode(', ', array_map('mysql_escape_string', array_keys($sql_data_array))), implode('", "',array_map('mysql_escape_string', $sql_data_array)));
$result = mysql_query($sql) or die ("Error in query: $sql. ".mysql_error());

//inform admin
$toemail = 'registration@brogaard.com';
$Name = "brogaard.com";
$email2 = "noreply@brogaard.com";
$subject = "New user registration on brogaard.com";
$body = "Hello ,\nYou have new user. Here is details:\n\nFirst Name: $firstname\nLast Name: $lastname\nUsername: $username\nPassword: royal";
$header = "MIME-Version: 1.0\n"; 
$header .= "Content-type: text/html; charset=iso-8859-1\r\n";
$header .= "Content-Transfer-Encoding: 8bit\n";
$header .= "From: ". $Name . " <" . $email2 . ">\r\n";
$header .= "X-Priority: 1\n"; 
$header .= "X-MSMail-Priority: High\n"; 
$header .= "X-Mailer: PHP/" . phpversion()."\n";
mail($toemail, $subject, $body, $header);

//inform user
$Name = "brogaard.com";
$email2 = "noreply@brogaard.com";
$headeruser = "MIME-Version: 1.0\n"; 
$headeruser .= "From: ". $Name . " <" . $email2 . ">\r\n";
$bodyuser = "Hello $firstname,\r\nYour account has been created.\r\n\r\nUsername: $username\r\nPassword: royal\r\nPlease login your account now by visiting this page:\r\nhttp://www.brogaard.com";
$subjectuser = "Your login details on www.brogaard.com ";
mail($email, $subjectuser, $bodyuser, $headeruser);
header('Location: regsuccess.html');

?>