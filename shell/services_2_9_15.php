<?php
$menupath='services';
require_once(dirname(__FILE__) . '/' . "auth.php");
checkSession();
include("../includes/server_config.php"); 
include("../database/connection.php");

@include DIR_USER."new-site-header.php";

if (array_key_exists('submitform', $_POST)) // process the script only if the form has been submitted -> OME
{ 
	foreach ($_POST as $key => $value) { $$key = addslashes(trim($value)); }

$todaydate = date('Y-m-d');
$modelbirth = "$modelday/$modelmonth/$modelyear";

$error = false;

if (strlen($firstname) < 2) {
$error = true;
$errormessage[] = 'Please enter your first name';
}

if (strlen($lastname) < 2) {
$error = true;
$errormessage[] = 'Please enter your last name';
}

if (strlen($email_address) < 5) {
$error = true;
$errormessage[] = 'Please enter your e-mail address.';
}

if (!preg_match("|^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$|i",$email_address)) {
$error = true;
$errormessage[] = 'Your email is not valid.';
}

$emailcount = mysql_result(mysql_query("SELECT COUNT(id) FROM authorize_new WHERE email='$email_address'"),0);
if ($emailcount > 0) {
$error = true;
$errormessage[] = 'E-mail address is in use.';
}

if ((strlen($password) < 6) && (strlen($password) > 10)) {
$error = true;
$errormessage[] = 'Your password should be between 6-10 characters';
}

if ($password != $repassword) {
$error = true;
$errormessage[] = 'Password and verify password doesn\'t match.';
}

if ($email_address != $reemail_address) {
$error = true;
$errormessage[] = 'E-mail addresses doesn\'t match.';
}

if (strlen($username) < 5) {
$error = true;
$errormessage[] = 'Please enter your username';
}

if ( !isset($registeras) ) {
$error = true;
$errormessage[] = 'Please specify what will you register yourself as';
}

if ( (isset($registeras) && $registeras=='model') && (strlen($modelcity) < 5) ) {
$error = true;
$errormessage[] = 'Please enter your city';
}

$usernamecount = mysql_result(mysql_query("SELECT COUNT(id) FROM ".TBL_AUTHORIZE_NEW." WHERE username='".clean_mysql($username)."'"),0);
if ($usernamecount > 0) {
$error = true;
$errormessage[] = 'Username is in use.';
}

if ((!is_numeric($phone))  && (strlen($phone) > 2) ){
$error = true;
$errormessage[] = 'Phone number should be numeric.';
} 

if ($error == false) {

//$adminemail = 'chandrakantb@optimindia.com';
$adminemail = 'steen@brogaard.com';
//$Nameedit = "optim.com";
$Nameedit = "brogaard.com";
$frommailedit = "noreply@brogaard.com";
$subjectedit = "New user registration";
$bodyedit = "Hello admin,\r\nYou have new user:\r\n\r\n";
$bodyedit .= "First Name: $firstname\r\n";
$bodyedit .= "Last Name: $lastname\r\n";
$bodyedit .= "Email: $email_address\r\n";
$bodyedit .= "Phone: $phone\r\n";
$bodyedit .= "Royal Access: $royalaccess\r\n";
$bodyedit .= "Newsletter: $sub_newsletter\r\n";
$bodyedit .= "Username: $username\r\n";
$bodyedit .= "Password: $password\r\n";

$activationkey =  generateCode();

      $sql_data_array = array('firstname' => $firstname,
                              'lastname' => $lastname,
                              'email' => $email_address,
                              'username' => $username,
                              'group1' => 'Users',
                              'usertype' => 'private',
                              'redirect' => '',
                              'date_created' => $todaydate,
                              'phone' => $phone,
                              'activationkey' => $activationkey);

$sql = sprintf('INSERT INTO %s (%s) VALUES ("%s")', TBL_AUTHORIZE_NEW, implode(', ', array_map('mysql_escape_string', array_keys($sql_data_array))), implode('", "',array_map('mysql_escape_string', $sql_data_array)));
$result = mysql_query($sql) or die ("Error in query: $sql. ".mysql_error());
$insertid = mysql_insert_id();

$sql2 = "UPDATE ".TBL_AUTHORIZE_NEW." SET password=password('$password') WHERE id='".(int)$insertid."'";
$result2 = mysql_query($sql2) or die ("Error in query: $sql2. ".mysql_error());


		if ($registeras == 'model') {
		
			$sqlu = "UPDATE ".TBL_AUTHORIZE_NEW." SET usertype='model' WHERE id='".(int)$insertid."'";
			$resultu = mysql_query($sqlu) or die ("Error in query: $sql2. ".mysql_error());

			$sqld_data_array['authorize_id'] = $insertid;
			$sqld_data_array['modelgender'] = $modelgender;
			$sqld_data_array['modelbirth'] = $modelbirth;
			$sqld_data_array['modelskincolor'] = $modelskincolor;
			$sqld_data_array['modeleyecolor'] = $modeleyecolor;
			$sqld_data_array['modelhaircolor'] = $modelhaircolor;
			$sqld_data_array['modelheight'] = $modelheight;
			$sqld_data_array['modeltype'] = $modeltype;
			$sqld_data_array['modeladdress'] = $modeladdress;
			$sqld_data_array['modelcity'] = $modelcity;
			$sqld_data_array['modelavailability'] = $modelavailability;
			$sqld_data_array['modelcomments'] = $modelcomments;
			
			$sqld = sprintf('INSERT INTO %s (%s) VALUES ("%s")', TBL_AUTHORIZE_DT, implode(', ', array_map('mysql_escape_string', array_keys($sqld_data_array))), implode('", "',array_map('mysql_escape_string', $sqld_data_array)));
			$resultd = mysql_query($sqld) or die ("Error in query: $sqld. ".mysql_error());
			$modelinsertid = mysql_insert_id();

$bodyedit .= "Gender: $modelgender\r\n";
$bodyedit .= "Birth: $modelbirth\r\n";
$bodyedit .= "Skin: $modelskincolor\r\n";
$bodyedit .= "Eye: $modeleyecolor\r\n";
$bodyedit .= "Hair: $modelhaircolor\r\n";
$bodyedit .= "Height: $modelheight\r\n";
$bodyedit .= "Type: $modeltype\r\n";
$bodyedit .= "Address: $modeladdress\r\n";
$bodyedit .= "City: $modelcity\r\n";
$bodyedit .= "Availability: $modelavailability\r\n";
$bodyedit .= "Comment: $modelcomments\r\n";
			

	if(!empty($_FILES[images][name][0]))
	{
		while(list($key,$value) = each($_FILES[images][name]))
		{
			if(!empty($value)) {
			$file_name = $value;
			$t = time();
			$extension = strtolower(substr(strrchr($file_name, "."), 1));
			$new_file_name = strtolower($file_name);
			$new_file_name = str_replace(' ', '-', $new_file_name);
			$new_file_name = substr($new_file_name, 0, -strlen($extension));
   			$new_file_name .= $extension;
			$NewImageName = $t."_model_".$new_file_name;
			$MyImages[] = $NewImageName;
			copy($_FILES[images][tmp_name][$key], "modelimages/".$NewImageName);
			}
		}

		if(!empty($MyImages))
		{
			$ImageStr = implode("|", $MyImages);
			$sql2 = "UPDATE ".TBL_AUTHORIZE_DT." SET modelimages='$ImageStr' WHERE authorize_details_id='$modelinsertid'";
			$result2 = mysql_query($sql2) or die ("Error in query: $sql2. ".mysql_error());
		}

	}

		} else if ($registeras == 'company') {
		
			$sqlu = "UPDATE ".TBL_AUTHORIZE_NEW." SET usertype='company' WHERE id='".(int)$insertid."'";
			$resultu = mysql_query($sqlu) or die ("Error in query: $sql2. ".mysql_error());
			
			$companytypes = implode(',', $_POST[companytype]);
			$sqld_data_array['authorize_id'] = $insertid;
			$sqld_data_array['companyname'] = $companyname;
			$sqld_data_array['companytype'] = $companytypes;
			$sqld_data_array['companycomments'] = $companycomments;

			$sqld = sprintf('INSERT INTO %s (%s) VALUES ("%s")', TBL_AUTHORIZE_DT, implode(', ', array_map('mysql_escape_string', array_keys($sqld_data_array))), implode('", "',array_map('mysql_escape_string', $sqld_data_array)));
			$resultd = mysql_query($sqld) or die ("Error in query: $sqld. ".mysql_error());
			
$bodyedit .= "Company name: $companyname\r\n";
$bodyedit .= "Company Type: $companytypes\r\n";
$bodyedit .= "Comments: $companycomments\r\n";
			}

$headeredit = "From: ". $Nameedit . " <" . $frommailedit . ">\r\n";
mail($adminemail, $subjectedit, $bodyedit, $headeredit);

$Name = "brogaard.com";
$email2 = "noreply@brogaard.com";
$subject = "Account activation on brogaard.com";
$body = "Hello $firstname,\r\nWelcome to our website!\r\n\r\nYou, or someone using your email address, has completed registration at brogaard.com. Your activation code : $activationkey\r\nhttp://www.brogaard.com/shell/activate.html\r\n\r\nIf this is an error, ignore this email.\r\n\r\nRegards";
$header = "From: ". $Name . " <" . $email2 . ">\r\n";
mail($email_address, $subject, $body, $header);
$errormsg = "Registration successful. We just sent you activation code. <strong><a href=\"activate.html\">Click here</a></strong> to activate your account."; 

} else {
$errormsg = "<ul><li style='color:#F00 !important;'>".implode("<li>",$errormessage)."</ul>"; 
}
					  
}

$months = array (1 => '01', '02', '03', '04', '05', '06','07', '08', '09', '10', '11', '12');
$days = range (1, 31);
$years = range (1930, 2000);

?>
<style type="text/css" media="screen">
.hide{ visibility:hidden; display:none; } 
#hello { display: none; position: absolute; top: 500px; left: 500px; height: 200px; width: 400px; border: 1px solid black; background: #ffffff; } 
</style>

<!--<script type="text/javascript">
  /* Set onLoad focus to id="firstname" */
  function focus_textbox(){ setTimeout( function(){ try{ d = document.getElementById('firstname'); d.focus(); d.select(); } catch(e){} }, 200); } 
  focus_textbox();
</script>-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7, IE=9" />
 
<title>Steen Brogaard</title>

<!--Main Element CSS-->
<link href="<?php echo $siteurl;?>css/style.css" rel="stylesheet" type="text/css">
<link href="<?php echo $siteurl;?>css/hexagon.css" rel="stylesheet" type="text/css">
<link href="<?php echo $siteurl;?>css/form.css" rel="stylesheet" type="text/css">

<!--Responsive CSS-->
<link href="<?php echo $siteurl;?>css/responsive.css" rel="stylesheet" type="text/css">

<!--Multitransition Gallery Sliders CSS-->
<link href="<?php echo $siteurl;?>css/audioPlayer_tr.css" rel="stylesheet" type="text/css">
<link href="<?php echo $siteurl;?>css/flashblock.css" rel="stylesheet" type="text/css">
<link href="<?php echo $siteurl;?>css/playlistBottomInside.css" rel="stylesheet" type="text/css">
<link href="<?php echo $siteurl;?>css/videoPlayer.css" rel="stylesheet" type="text/css">

<!--Google Fonts-->
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900|Oswald:400,300,700' rel='stylesheet' type='text/css'>



<link rel="shortcut icon" type="image/ico" href="<?php echo $siteurl;?>assets/img/favicon.ico" />

	<!--CSS Styles-->	
	<link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>assets/css/vendors/font-awesome.min.css"> 
    <link rel="stylesheet" href="<?php echo $siteurl;?>css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>assets/css/vendors/bootstrap.css" >
	<link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>assets/css/vendors/Pe-icon-7-stroke.css">
    <link href="<?php echo $siteurl;?>css/stylemenu.css" rel="stylesheet">
    
	<link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>css/default.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>css/component.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>css/demo.css" />
	<!--/CSS Styles-->
	
	<!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
    <!-- /Mobile Specific Metas --> 


	<!-- Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=PT+Sans:100,200,300,400,700,400italic,700italic' rel='stylesheet' type='text/css'>

 
 <!-- CLEAR CONTENT AFTER SEARCH -->
    <script>
	function clearcontent()
	{
		document.getElementById("search").value="";
	}
	document.getElementById("searchform").onload = function() {myFunction()};
	function myFunction()
	{
		document.getElementById("search").value="";
	}
	</script>
	<!-- END OF CLEAR CONTENT AFTER SEARCH -->
    <!-- SEARCH FUNCTIONALITY -->
    <script language="javascript">
	function convert(){
	w=document.formurl.search.value;
	encodeURIComponent(w);
	document.formurl.search.value=w;}
	</script>
<!-- END SEARCH FUNCTIONALITY -->
 



<!--[if lte IE 8]>
<meta HTTP-EQUIV="REFRESH" content="0; url=lte-ie8.html">
<![endif]-->
<!-- add scripts & css -->
<!-- Latest compiled and minified CSS -->
            <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">-->
            
   
      
      
    <script src="<?php echo $siteurl;?>js/vendor/modernizr-2.6.2.min.js"></script>
 <script type="text/javascript" src="<?php echo $siteurl;?>js/jquery.min.js"></script>
 <script type="text/javascript">
        $(document).ready(function() {
        $('input[type="radio"]').click(function(){
            if($(this).attr("value")=="company"){
                $(".box1").hide();
                $("#comp").show();
            }
            if($(this).attr("value")=="model"){
                $(".box1").hide();
                $("#model").show();
            }
			if($(this).attr("value")=="user"){
                $("#comp").hide();
                $("#model").hide();
            }
            
        });
    });
    </script>
 <style>
      .goog-te-gadget{
			      z-index: 99999;
				  position: relative;
				 }
	 </style>
   <style>
   .aboutus-content {
  margin-top: 0px!important; font-family:"Lucida Grande", "Helvetica Neue", "Helvetica", "Arial", "Verdana", "sans-serif","Myriad Set Pro";
}
.comment-fieldbox {
  margin-top: 0px;float:left; margin-bottom:15px;
}
.comment-fieldbox input{float: left;width: 47%; margin-right: 1%; margin-left:1%; border-radius:5px;font-family:"Lucida Grande", "Helvetica Neue", "Helvetica", "Arial", "Verdana", "sans-serif","Myriad Set Pro";}
h2 {
  font-size: 22px;
  font-weight: 400;
  text-transform: uppercase;
  line-height: 24px;
  color: #fff;
  font-family: "Lucida Grande", "Helvetica Neue", "Helvetica", "Arial", "Verdana", "sans-serif","Myriad Set Pro";
}
.pic{float: left;
  width: 40%;}
.aboutus-content p{font-size:15px;font-family:"Lucida Grande", "Helvetica Neue", "Helvetica", "Arial", "Verdana", "sans-serif","Myriad Set Pro"; float:left; text-align:justify;}
.aboutus-content a{color:#e8e8e8; text-decoration:underline;}
.aboutus-content a:hover{color:#C00;}
.star_red{color:#C00;padding-right: 7px;padding-top: 3px;float: left;}
.m-t-b-40{margin: 40px auto;width: 100%; float:left;}
.checkbox input[type="checkbox"] {
  width: 16px!important;
  height: 16px!important;
}
 input[type="checkbox"] {
    display:none;
}
input[type="checkbox"] + label span {
    display:inline-block;
    width:16px;
    height:15px;
    margin:1px 4px 0 0;
    vertical-align:middle;
    background-image: url('../images/checkbox_sprite.png'); 
   background-repeat: no-repeat;
   background-position: 0px -18px;
    cursor:pointer;
	float:left;
	border-radius:4px;
}
input[type="checkbox"]:checked + label span {
	 background-image: url('../images/checkbox_sprite.png'); 
   background-repeat: no-repeat;
    background-position: 0 0;
}
input[type="radio"] {
    display:none;
}
input[type="radio"] + label span {
    display:inline-block;
    width:19px;
    height:18px;
    margin:0px 4px 0 0;
    vertical-align:middle;
    background-image: url('../images/radio_sprite.png');
	background-size:18px 36px; 
   background-repeat: no-repeat;
   background-position: 0px -18px;
    cursor:pointer;
	border:0;
}
input[type="radio"]:checked + label span {
	 background-image: url('../images/radio_sprite.png'); 
   background-repeat: no-repeat;
    background-position: 0 0;background-size:18px 36px; 
}
/* not checked */
#comp{width:100%; float:left; display:none;}
	input[type=password] {
   background-image: none!important;}
   .send-message{padding-right:0px!important}
   .rdio-group{width:100%; float:left; margin-top:13px;}
   .rdio-group span{float:left;margin: 8px 10px 0 10px; font-size:17px;}
   .rdio-group .radio{float:left; width:18%; margin-bottom:0!important;}
   .rdio-group .radio lable{font-size:17px; font-family:"Lucida Grande", "Helvetica Neue", "Helvetica", "Arial", "Verdana", "sans-serif";}
   .radio + .radio{margin-top: 10px; }
   .checkbox{float:left;margin-top:9px!important;margin-left: 8px; padding-left:10px;}
   .comment-active{width:100%; float:left;}
   .form-div{width:78%; float:left;}
   h3,h4{font-family:"Lucida Grande", "Helvetica Neue", "Helvetica", "Arial", "Verdana", "sans-serif";float: left;width: 100%;}
   .checkbox input[type="checkbox"]#custom, .checkbox input[type="checkbox"]#sply{
	   margin-top: -17px;
	   }
	input[type="text"]#Cname{width:36%;}
	select#dd, select#mm, select#yy{width: 100%;margin-top: 0px!important;}
	select#best{width: 15%;margin-top: 0px!important;margin: 0 10px;}
	.comment-fieldbox textarea.input-textarea{width:36%; margin-left:1%; float:left; margin-top:10px; }
	/*.box{display:none;}*/
	 input[type='file']{background-color:transparent; border:0;margin-top:0!important; color:#E8E8E8;margin: 12px 0!important;height: 22px;width: 52%;padding:0!important;}
	 .regi,.atract{float:left;width:80%;}
	 #g1,#g2{width:13%;}
	 #g3,#g4{width:19%;}
	 select{color: #9e9e9e; margin-left:1%;}
	 .w-100-mb-15{width:100%; margin-bottom:15px!important;}
	 #canbest{width: 36%;margin-bottom: 11px;}
	 select { appearance:none; -webkit-appearance:none; -moz-appearance:none; -ms-appearance:none;
}
     select::-ms-expand{display:none;}
	.demo select {
		border: 0 !important;  /*Removes border*/
		-webkit-appearance: none;  /*Removes default chrome and safari style*/
		-moz-appearance: none; /* Removes Default Firefox style*/
		-ms-appearance: none; /* Removes Default IE style*/
		appearance: none;
		background:url(../images/down-arrow.png) no-repeat 96% center #fff;
		width: 100px; /*Width of select dropdown to give space for arrow image*/
		text-indent: 0.01px; /* Removes default arrow from firefox*/
		text-overflow: "";  /*Removes default arrow from firefox*/ /*My custom style for fonts*/
		color: #9E9E9E;
		border-radius: 5px;
		padding: 5px;
		
	}
	.demo-in{width: 8%;float: left; margin:0 10px; height: 38px;}
	#wraper1{margin-top:60px!important;}
	@media screen and (max-width:1280px){.rdio-group .radio {float: left;width: 17%;}#g1, #g2 {width: 13%;}#g3, #g4 {width: 20%;}}
	@media screen and (max-width:1080px){.rdio-group .radio{width: 21%;}#g1, #g2 {width: 16%;}#g3, #g4{width: 25%;}}
	@media screen and (max-width:1050px){.rdio-group .radio{width: 21%;}#g1, #g2 {width: 15%;}#g3, #g4{width: 24%;}}
   @media screen and (max-width:1024px){.rdio-group .radio {float: left;width: 24%;}.regi, .atract {float: left;width: 74%;}#g1, #g2 {width: 16%;}#g3, #g4 {width: 26%;}.checkbox{padding-left: 9px;}#canbest {width: 36%!important;}.comment-fieldbox textarea.input-textarea{width:36%!important}}
   @media screen and (max-width: 900px){.rdio-group .radio {float: left;width: 25%;}#g1, #g2 { width: 17%;}.demo-in {width: 12%;}#g3, #g4 {width: 28%;}.demo-in {width: 11%!important;}input[type='file'] {width:100%;}.contact-info{border-top:0px;}}
   @media screen and (max-width: 800px){.rdio-group .radio {float: left;width: 28%;}#g1, #g2 { width: 18%;}.demo-in {width: 12%;}#g3, #g4 {width: 30%;}}
   @media screen and (max-width:768px){.form-div {width: 93%;}input[type="text"]#Cname {width: 40%;}.comment-fieldbox textarea.input-textarea {width: 41%;height:105px;}select#best {width: 21%;}.pic{float: left;width: 69%;} input[type='file'] {width: 52%;}.rdio-group .radio {float: left;width: 30%;}.regi, .atract {float: left;width: 71%;}.rdio-group #g1, .rdio-group #g2 { width: 19%!important;}#g3, #g4 {width: 31%;}.radio, .checkbox {padding-left: 16px;}.contact-info{border-top:0!important}.aboutus-content h2{margin-top:0;}.demo-in {width: 11%!important;}#canbest {width: 41%!important;}.comment-fieldbox textarea.input-textarea{width:41%!important}}
    @media screen and (max-width:667px){.regi, .atract {float: left; width: 76%;}.rdio-group .radio {float: left;width: 32%;}.rdio-group #g1, .rdio-group #g2 { width: 22%!important;}.demo-in { width: 15%!important;}#g3, #g4 {width: 37%;}}
   @media screen and (max-width:640px) {.rdio-group#g1, .rdio-group#g2 {width: 23%!important;}.demo-in {width: 16%!important;}#g3, #g4 {width: 38%!important;}.rdio-group .radio {float: left;width: 52%;}.form-div {width: 100%;}input[type="text"]#Cname {width: 50%;}.comment-fieldbox textarea.input-textarea { width: 52%!important;height: 85px;}select#dd, select#mm, select#yy {width: 100%;}select#best{width: 28%;}input[type='file']{width: 60%;}.regi{float: left;width: 58%;}.atract {float: left;width: 63%!important;}.rdio-group span{width:100%;}.radio{padding-left:9px;}.checkbox {padding-left: 0px;}#canbest {width: 50%!important;}
   @media screen and (max-width:600px){.rdio-group #g1, .rdio-group #g2 {width: 25%!important;} input[type='radio']{ {width: 16px!important;}.comment-fieldbox input{width:99%!important;}.comment-fieldbox textarea.input-textarea { width: 50%!important;height: 85px;}}
   @media screen and (max-width:568px){#g1, #g2 {width: 25%!important;}.demo-in {width: 16%!important;}#g3, #g4 { width: 44%!important;} input[type='radio']{ {width: 16px!important;}.comment-fieldbox input{width:99%!important;}.comment-fieldbox textarea.input-textarea { width: 52%!important;height: 85px;}#canbest {width: 50%;}#canbest {width: 50%!important; }}
    @media screen and (max-width:533px){.rdio-group #g1, .rdio-group #g2 {width: 23%!important;}.demo-in {width: 18%!important;}}
    @media screen and (max-width:480px){.comment-fieldbox input{width: 79%;}.regi {float: left;width: 52%;}.rdio-group .radio {float: left; width: 61%!important;} input[type='radio']{width:16px!important;}.rdio-group #g1,.rdio-group #g2{width:28%!important;}#g3, #g4 {width: 46%!important;}input[type="text"]#Cname {width: 79%!important;}select#best {width: 33%;}.bd{float: left;width: 58%;}select#dd, select#mm, select#yy {width: 100%;margin: 10px 0px;}.wrapper.boxstyle{width: 89% !important;}.box-container {padding: 0px 15px!important;}.pic {float: left;width: 90%;}.demo-in {width: 17%!important;}#canbest {width: 44%;margin-bottom: 11px;}.comment-fieldbox textarea.input-textarea{width:79%!important;}}   
  @media screen and (max-width: 375px){.regi {float: left;width: 55%!important;}.rdio-group #g1, .rdio-group #g2 { width: 34%!important;} .demo-in {width: 24%!important;}.rdio-group .radio {float: left;width: 70%!important;}#g3, #g4 {width: 59%!important;}#canbest {width: 58%; margin-bottom: 11px;}}
  @media screen and (max-width: 360px){.regi {float: left;width: 59%!important;}.rdio-group .radio {
float: left;width: 91%!important;}.rdio-group #g1, .rdio-group #g2 {width: 45%!important;}.box-container {padding: 0px 0px!important;}.demo-in {width: 25%!important;}#g3, #g4 {width: 66%!important;}input[type="text"]#Cname {width: 79%!important;}#canbest {width: 79%;margin-bottom: 11px;}.comment-fieldbox textarea.input-textarea {width: 79%!important;height: 85px;}}	
  @media screen and (max-width: 320px){.rdio-group .radio { float: left;width: 94%!important;}input[type="text"]#Cname {width: 85%!important;}.comment-fieldbox textarea.input-textarea {width: 87%!important;height: 77px;}.comment-fieldbox input { width: 95%;}select#best{width: 56%;}.demo-in {width: 62%!important;}#canbest {width: 86%!important;}#g3, #g4 {width: 77%!important;}.rdio-group span{width:100%;}.rdio-group #g1, .rdio-group #g2 { width: 48%!important;}}
  
  
   </style>
<header>

  <!-- new menu added -->
 <div class="navbar navbar-custom navbar-fixed-top" style="opacity:0.9 !important;">
           <?php include("../includes/menu.php");?>
            </div>
 <!-- new menu close -->
          
     <!--Google Translator -->
            <?php
	 if (isset($_SESSION['username']) && isset($_SESSION['password'])  ) {
	 ?>
     <style>
.goog-te-banner-frame {
  margin-top: 80px;
}
.goog-te-gadget{ margin-top: 2px;}
</style>
    <div style="margin-top:80px !important">
    <?php
	 }
	 else
	 {
		 ?>
         <style>
.goog-te-banner-frame {
  margin-top: 50px;
}
.goog-te-gadget{ margin-top: 0px;}
</style>
          <div style="margin-top:50px !important">
         <?php
	 }
	?>
            <?php include("../includes/google_translate.html");?>
            </div>
            <!--End Google Translator -->
    </header>
    <!--Header End-->
    
              
             
  
        	<div class="container1 background" style="background:#fff;">
            <!-- news ticker start -->
            <div id="wraper1" class="wrapper" >
               <?php include("../includes/newsticker.php");?>                          
              </div>
               <!-- news ticker end -->
                <!-- info start -->
              <div class="ic_cv">
                   <span class="tooltip11" title="Selvlært fotograf siden 1984 for bl.a. Ugeavisen København og Greenpeace | Udlært pressefotograf på Billed Bladet i 1991 | Selvstændig på 5C siden 1991 Udvalgte kunder gennem årene: Agenzy, Alcon A/S, Bane Danmark, Bellevue Teatret, Bruun & Hjejle, Care, Coop, DR, DSB, DTU, Düsseldorfer Schauspielhaus, EG, Egmont, Egmontfonden, Erhvervsstyrelsen, Folketinget,  Forlæggerforeningen, Fullrate, Gads Forlag, Grevinde Alexandra, Grevinde Danner, Hello Magazine,  Herlufsholm, Holm Kommunikation, IBM, Kongehuset, Lett Advokater, LIFE Magazine, Logitech, Oracle, McDonalds, Månedsmagasinet IN, Nationalbanken, NCC, Netcompany, Nordea, Nordisk Film, Sjælsø, Søren Østergaard, Søs Fenger, Pointwork, Post Greenland, Psykologi, Region Hovedstaden, Rigshospitalet, Rockwool, Røde Kors, Salon Aqua, Scandinavian Branding, Slots og Ejendomsstyrelsen, Spencer & Stuart, TDC, TV2, Udenrigsministeriet, Unicef, Vandkunstens Forlag, WHO, Zirkus Nemo, Øresundskonsortiet, Ørkenens Sønner m.fl. | Udstillet på bl.a.  Frederiksborg Nationalhistoriske Museum, Den Sorte Diamant, Dansk Kulturinstitut i Edinburgh, Nationalteatret i Riga, Nationalbiblioteket i Tallin, Dansk Kulturinstitut i Ungarn og den danske ambassade i Chengdu, Kina">CV</span>
          </div>
          <!-- info end -->
       <div class="wrapper boxstyle" style="background: rgba(0,0,0,0.4); border-radius:5px; margin-top:60px;">
          
            
          <!--Blog Lists and Sidebar-->
            <section class="box-container" style="background:none !important;">
            
               <div  class="aboutus-content">
               <!--<p class="lineTitle1">--> <h2>SERVICES</h2><!--</p>-->
                   <!-- <p>&nbsp;</p>-->
                  <div class="send-message" >
                   <h4> <span style="border-bottom:1px solid #e8e8e8;padding-bottom: 3px; margin-bottom:12px;">Company portrait</span></h4>
                    <p>A professional portrait on your website, your social networks and print personifies your marketing. It creates a real connection to your customers.And it shows that you stand behind your business.</p>
                    <p>Let me help you and your company to make a good first impression. We like to use your company's premises as a location or shoots at our studios at Refshaleøen or Sturlasgade. We take the time to create an image style that is tailored to your company and to suit you and / or your key people whose images will help personalize your website, annual reports, network, brochures and other marketing.</p>
                   <p>All images indexed by name and assembled in our online data base where you can order prints and download the prepared around the clock, print selected photos as PDF presentations, book and pay prints directly and more. With time you build an image base that is always available.</p>
                    <p>References include :<a href="http://www.bruunhjejle.dk" target="_new">Bruun &amp; Hjejle</a>, <a href="https://om.coop.dk/om+coop/ledelsen+i+coop+danmark+koncernen.aspx" target="_new">Coop</a> ,<a href="http://www.dsb.dk/om-dsb/virksomheden/organisationen/koncernledelsen/" target="_new">DSB</a>, <a href="http://www.dtu.dk/Om_DTU/Organisation/Direktionen.aspx" target="_new">DTU</a>, Egmont,<a href="http://www.egmontfonden.dk/kontakt/" target="_new">Egmont Foundation</a>, the Danish Business Authority, <a href="http://www.ft.dk/Folketinget/findMedlem.aspx" target="_new">parliament</a>, Royal Family, <a href="http://www.lett.dk/Page/Medarbejderne.aspx" target="_new">Lett Lawyers</a>, <a href="http://www.nordiskfilm.dk/Om-Nordisk-Film/organisationen/Ledelsen/" target="_new">Nordisk Film</a>, Capital Region, Rigshospitalet</p>
                    </div>
                    <!--<hr class="m-t-b-40">-->
                    
                    <div class="contact-info" style="border-left:0;">
                    <h4><span style="border-bottom:1px solid #e8e8e8;padding-bottom: 3px; margin-bottom:12px;">Your company</span></h4>
                        <p>Show me your company - and let me show you the - in my view. See your business from unconventional angles, photographed behind the facades, photographed closeup or night, backlit and tailwind. Show your customers the beauty of your work.</p>
                        
                        <p>Offers: Get photographed your business and built an image database - only pay for the pictures you end up using.</p>
                        
                        <p>The images in the database is indexed according to names, images and genres - you can then browse your pictures crisscross, easy reordering and round the clock pick up the already ready-made images. At this moments are a total of 40,000 images available online for our different customers.</p>
                        <p>References include .: Care, <a href="http://www.egmont.com/dk/" target="_new">Egmont</a>, <a href="http://herlufsholm.dk/Dansk/Pages/default.aspx" target="_new">Herlufsholm</a>, <a href="http://www.zirkus-nemo.dk" target="_new">Zirkus Nemo</a></p>
                  
                    </div>
                    
                     <div class="m-t-b-40"></div>
                     <div class="send-message">
                         <h4><span style="border-bottom:1px solid #e8e8e8;padding-bottom: 3px;margin-bottom:12px;">The personal portrait</span></h4>
                    
                    <p>My personal portraits are not the typical headshot. We work with space and time, sensuality and confrontation. We are looking for an image that is intense and exciting - even if you do not know you. The images are available in print and / or digital - for direct use on your website and on social media and will be available around the clock via a personal login to our website.</p>
                    <p>References include .: Lars Brogaard, Michael Bojesen, <a href="http://sarablaedel.dk" target="_new">Sara Blædel</a>, <a href="http://www.frkholman.dk" target="_new">Susanne Holman</a>, Fenger</p>
                        
                        </div>
                    
                     <!--<hr class="m-t-b-40">-->
                      <div class="contact-info" style="border-left:0;">
                    
                    <h4><span style="border-bottom:1px solid #e8e8e8;padding-bottom: 3px;margin-bottom:12px;">Herlufsholm</span></h4>
                    <p>For access to <strong>Herlufsholm</strong> image-blog click <a href="http://www.brogaard.com/shell/herluf-reg.php">here</a>.</p>
                    </div>
                    
                     <hr class="m-t-b-40">
                    
                    <h2>Interact</h2>
                    <p>
                      I put the long, close cooperation loud. Use the form below to register yourself as a customer, supplier, model or just as interested and get newsletters with special offers.</p>

                      <p>Just interested? Sign up as 'Private'.</p>

                       <p> Current or future customer or supplier? Sign up as 'Company'.</p>
                        
                       <p> Will contribute as a model? Sign up as a 'Model'.</p>
                    
                    
                    
                   <div class="contact-area">
                
                	<!--Send Message Start-->
                	                	
                        <div class="comment-fieldbox" >
                        <!--./pages-resources/php/formtoeamil_new.php-->
                        	                                            
                           <!-- <form action="./pages-resources/php/services.php" method="post" data-toggle="validator" role="form">-->
                          <span style='color:#F00 !important;'>  <?php echo ( isset($errormsg)?$errormsg:'' ); ?></span>
                           <form action="" id="member_form" method="post" enctype="multipart/form-data">
                            <div class="form-div">
                                <input id="firstname" class="input-email" type="text" name="firstname" value="<?php echo ( isset($firstname)?$firstname:'' ); ?>" placeholder="<?php echo lang('first_name'); ?> *" required>
                                <input id="lastname" class="input-phone" type="text" name="lastname" value="<?php echo ( isset($lastname)?$lastname:'' ); ?>" placeholder="<?php echo lang('last_name'); ?> *" >
                                 <input id="email_address" class="input-email" type="email" name="email_address" value="<?php echo ( isset($email_address)?$email_address:'' ); ?>" placeholder="<?php echo lang('email'); ?> *" data-error="Bruh, that email address is invalid" required>
                                  <input id="reemail_address" class="input-email" type="email" name="reemail_address" value="<?php echo ( isset($reemail_address)?$reemail_address:'' ); ?>" placeholder="<?php echo lang('email_repeat'); ?> *" data-error="Bruh, that email address is invalid" required>
                                 <input id="username" class="input-email" type="text" name="username" value="<?php echo ( isset($username)?$username:'' ); ?>" placeholder="<?php echo lang('username'); ?> *" required />
                             
                                <input id="password" class="input-email" type="password" name="password" placeholder="<?php echo lang('password'); ?> *" required />
                                
                                 <input id="repassword" class="input-phone" type="password" name="repassword" placeholder="<?php echo lang('password_repeat'); ?> *" required>
                                 
                                 <input id="phone" class="input-phone" type="text" name="phone" value="<?php echo ( isset($phone)?$phone:'' ); ?>" placeholder="<?php echo lang('telphone'); ?> " required>
                                 
                               </div>
                               
                             <div class="rdio-group">
                                <span> Register yourself as <?php echo lang('registeras'); ?>: *</span>
                                 <div class="regi">
                                  <div class="radio">                                 
                                    <input type="radio" value="user"  name="registeras" id="r1">
                                    <label for="r1"> <?php echo lang('private'); ?> <span></span></label>  
                                   </div>
                                   <div class="radio">
                                    <input  type="radio" value="company" name="registeras" id="r2">
                                    <label for="r2"> <?php echo lang('company'); ?><span></span>  </label>
                                   </div>
                                   <div class="radio">
                                   <input type="radio" value="model"  name="registeras" id="r3"> 
                                    <label for="r3"> <?php echo lang('model'); ?><span></span> </label>
                                   </div>
                                   </div>
                                </div>
                                
                                <div id="comp" class="box1" style="display:none;">
                                   <input id="Cname" class="input-email" type="text" name="companyname" placeholder="Company Name <?php echo ( isset($companyname)?$companyname:'' ); ?>" >
                                   <div class="rdio-group">
                                       <span> Attraction: </span>
                                      <div class="atract">
                                       <div class="checkbox">
                                       <input type="checkbox" value="Client" id="custom" name="companytype[]">  
                                        <label for="custom">Customer<span></span></label> 
                                       </div>
                                       <div class="checkbox">
                                         <input type="checkbox" value="Supplier" id="sply" name="companytype[]"><label for="sply">Supplier<span></span>  </label>
                                       </div>
                                       </div>                              
                                    </div>
                                    <textarea id="besked" class="input-textarea" name="companycomments" placeholder="Comment"><?php echo ( isset($companycomments)?$companycomments:'' ); ?></textarea>
                                     
                                </div>
                                
                                <div id="model" class="box1" style="display:none;">
                                  
                                   <div class="rdio-group">
                                       <span> Gender: </span>
                                       <div id="g1" class="radio">
                                        <input type="radio" value="male" id="male1" name="modelgender">  <label for="male1">Male <span></span></label>
                                                                              
                                       </div>
                                       <div id="g2" class="radio">
                                         <input type="radio" value="female" id="sply1" name="modelgender">  <label for="sply1">Female<span></span></label>
                                       </div>                                  
                                    </div>
                                    <div class="rdio-group">
                                <span> Birthdate:</span>
                                
                            <!-- <div class="bd">-->
                               
                                
                               <div class="demo demo-in">
                                <?php 
									echo "<select id='mm' name='modelmonth'>";
									foreach ($months as $value) {
										echo '<option value="'.$value.'">'.$value.'</option>\n';
									} echo "</select> &nbsp;";
									
								 ?>
                                 </div>
                                 <div class="demo demo-in">
                                  <?php									
									echo " <select id='dd' name='modelday'>";
									foreach ($days as $value) {
										echo '<option value="'.$value.'">'.$value.'</option>\n';
									} echo "</select> &nbsp;";
								   ?>
                                   </div>
                                   <div class="demo demo-in">
									<?php
									echo " <select id='yy' name='modelyear'>";
									foreach ($years as $value) {
										echo '<option value="'.$value.'">'.$value.'</option>\n';
									} echo "</select>";
									?>
                                    </div>
                               
                                </div>
                               <!-- </div>-->
                                
                                 <input id="Cname" class="input-email" type="text" name="modelskincolor" value="<?php echo ( isset($skincolor)?$skincolor:'' ); ?>" placeholder="Skin Color" >
                                 
                                 <input id="Cname" class="input-email" type="text" name="modeleyecolor" value="<?php echo ( isset($eyecolor)?$eyecolor:'' ); ?>" placeholder="Eye Color" >
                                 
                                 <input id="Cname" class="input-email" type="text" name="modelhaircolor" value="<?php echo ( isset($haircolor)?$haircolor:'' ); ?>" placeholder="Hair Color" >
                                 
                                 <input id="Cname" class="input-email" type="text" name="modelheight" value="<?php //echo ( isset($height)?$height:'' ); ?>" placeholder="Height(in cm)" >
                                 
                                 
                                 <div class="rdio-group">
                                       <span> Attraction: </span>
                                       <div id="g3" class="radio">
                                        <input type="radio" value="Only commercial jobs" id="custom2" name="modeltype">
                                         <label for="custom2">Only jobs with fee <span></span> </label>
                                       </div>
                                       <div id="g4" class="radio">
                                        <input type="radio" value="Commercial and non-cmmercial jobs" id="sply2" name="modeltype">   
                                        <label for="sply2">Also ubetale jobs<span></span></label>
                                       </div>                                  
                                    </div>
                                 
                                <input id="Cname"  class="input-email" type="text" name="modeladdress" placeholder="Address" value="<?php echo ( isset($modeladdress)?$modeladdress:'' ); ?>">
                                
                                   <input id="Cname"  class="input-email" value="<?php //echo ( isset($modelcity)?$modelcity:'' ); ?>" type="text" name="modelcity" placeholder="City*" >
                                   
                                    <div id="Cname" class="rdio-group">
                                <span class="w-100-mb-15">Can Best:</span>
                                  <div class="demo">
                                   <select id="canbest" name="modelavailability">
                                        <option value="Before noon">Before noon</option>
                                        <option value="After noon">After noon</option>
                                        <option value="Evening">Evening</option>
                                        <option value="Doesn’t matter" selected>Does not matter</option>
                                    </select>
                                    </div>  
                                   </div>
                                    <textarea id="besked" class="input-textarea" name="modelcomments" placeholder="Comment" ><?php echo ( isset($modelcomments)?$modelcomments:'' ); ?></textarea>
                                    <div class="rdio-group">
                                       <span style="margin-top:11px;"> Pictures: </span>
                                       <div class="pic">
                                        <input class="input-email" type="file" name="images[]" placeholder="" >
                                        <input class="input-email" type="file" name="images[]" placeholder="" >
                                        <input class="input-email" type="file" name="images[]" placeholder="" >
                                        <input class="input-email" type="file" name="images[]" placeholder="" >
                                       </div>
                                       </div>
                                </div>
                                                               
                                  <div class="checkbox" style="margin-top:3px;">
                                  <input type="checkbox" value="1" id="sub_newsletter" checked="checked" name="sub_newsletter">
                                    <label for="sub_newsletter"><span></span><?php echo lang('join_newsletter'); ?></label>
                                    
                                  </div>                                
                                  <div class="comment-active" style="margin-top:0 !important;">
                                    <!--<span>All fields are mandatory.</span>-->
                                    
                                    <input class="submit-button" type="submit" id="submitform" name="submitform" value="<?php echo lang('register'); ?>" style="border-radius:5px; !important">
                                </div>
                                
                            </form>
                        </div>
                   
                    <!--Send Message End-->
                   <p>By the use of and registration on this website, you accept the terms of our <a href="http://www.brogaard.com/shell/terms.php">Terms of Use</a> and <a href="#">Privacy Policy</a> .</p>
                   <p>Please make sure that you have read and understood these before registering. Note particularly that we save and use your information to send you our newsletter and to contact you with marketing information via e-mail unless you click 'Get newsletter' from. This setting can be changed later when you are logged in.</p>
                    
               <!-- </div>         
                    <p align="center"><span style="color:#C00">©</span> <b>Copyright Steen Brogaard 2010-2015.</b><span style="color:#C00"> All rights reserved.</span></p>
                </div>-->
              
            </section>
            <!--Blog Lists and Sidebar End-->

        </div>
        
       
    
	</div>
    

<!--<script type="text/javascript" src="<?php //echo $siteurl;?>js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<?php //echo $siteurl;?>js/jquery-easing-1.3.js"></script>
-->
<!--Flexy Menu Script-->
<!--<script type="text/javascript" src="<?php //echo $siteurl;?>js/flexy-menu.js"></script>-->

<!-- THE FANYCYBOX ASSETS -->
<!--<script type="text/javascript" src="megafolio/fancybox/jquery.fancybox.pack62ba.js?v=2.1.3"></script>-->

<!-- Optionally add helpers - button, thumbnail and/or media ONLY FOR ADVANCED USAGE-->
<!--<script type="text/javascript" src="megafolio/fancybox/helpers/jquery.fancybox-media3447.js?v=1.0.5"></script>-->

<!--<script type="text/javascript">
   jQuery(document).ready(function() {
	  "use strict"; 
	  
	  // THE FANCYBOX PLUGIN INITALISATION
      jQuery(".fancybox").fancybox();
 
      // FLEXY MENU SETTING
	  $(".flexy-menu").flexymenu({
            align: "right",
            indicator: true
         });
   });
</script>-->
        
    <!-- /javascript Plugins-->    
    <script type="text/javascript" src="<?php echo $siteurl;?>assets/js/vendors/bootstrap.min.js"></script>
    <!--<script src="<?php //echo $siteurl;?>js/classie.js"></script>
	<script src="<?php //echo $siteurl;?>js/uisearch.js"></script>
	<script>
		new UISearch( document.getElementById( 'sb-search' ) );
	</script>-->
    <script>
		$(".tooltip11").click(function () {
			var $title = $(this).find(".title");
			if (!$title.length) {
				$(this).append('<span class="title">' + $(this).attr("title") + '</span>');
			} else {
				$title.remove();
			}
		});
		</script>
	<!-- /javascript Plugins-->
   	 <?php include ("../includes/brogaard_footer.php"); ?>
    
</body>
</html>
