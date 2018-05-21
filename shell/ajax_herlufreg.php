<? session_start();
require_once "conn.php";
function last_login() {
	$date = gmdate("Y-m-d");
	return $date;
}

function make_seo($variable) {
  $variable = eregi_replace("[^[:alnum:]]", " ", $variable);
  $variable = str_replace(" ", "-", trim($variable));
  $variable = ereg_replace("[-]+","-",$variable); 
  $variable = strtolower(addslashes($variable));
  return $variable;
}

foreach ($_POST as $key => $value) {
$$key = addslashes(trim($value));
}


if ((!$firstname) || (!$lastname) || (!$email_address)) {
echo "emptyfields";
exit;
}

$newsletter1 = 1;

$username = $firstname.$lastname;
$username = make_seo($username);

$sql = "SELECT * FROM authorize_new WHERE username = '$username'";
$result = @mysql_query($sql) or die(mysql_error());
$num = mysql_num_rows($result);

if ($num >0) {
echo "no";
exit;
} else {
$today = date("Y-m-d");

      $sql_data_array = array('firstname' => $firstname,
                              'lastname' => $lastname,
                              'email' => $email_address,
                              'username' => $username,
                              'group1' => 'Users',
                              'usertype' => 'private',
							  'pchange' => '0',
							  'verified' => '1',
							  'editaccount' => '0',
                              'redirect' => 'http://www.brogaard.com/clientarea/Herluf-intern',
                              'date_created' => $today,
                              'password' => '*0DECB8359AD52815F18A3DBBE09D9D6BD8B39F0A',
                              'getnewsletter' => $newsletter1);

$sql = sprintf('INSERT INTO %s (%s) VALUES ("%s")', 'authorize_new', implode(', ', array_map('mysql_escape_string', array_keys($sql_data_array))), implode('", "',array_map('mysql_escape_string', $sql_data_array)));
$result = mysql_query($sql) or die ("Error in query: $sql. ".mysql_error());
//inform admin
$toemail = 'registration@brogaard.com';
$Name = "brogaard.com";
$email2 = "noreply@brogaard.com";
$subject = "New user registration on brogaard.com / Herluf-intern";
$body = "Hello ,\nYou have new user. Here is details:\n\nFirst Name: $firstname\nLast Name: $lastname\nUsername: $username\nPassword: herluf";
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
$headeruser .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headeruser .= "Content-Transfer-Encoding: 8bit\n";
$headeruser .= "From: ". $Name . " <" . $email2 . ">\r\n";
$headeruser .= "X-Priority: 1\n"; 
$headeruser .= "X-MSMail-Priority: High\n"; 
$headeruser .= "X-Mailer: PHP/" . phpversion()."\n";
$bodyuser = "Hello $firstname,\nYour account has been created.\n\nUsername: $username\nPassword: herluf\nPlease login your account now by visiting this page:\nhttp://www.brogaard.com";
$subjectuser = "Your login details on www.brogaard.com ";
mail($email_address, $subjectuser, $subjectuser, $headeruser);
echo "yes";
}
?>