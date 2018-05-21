<? session_start();
require_once("conn.php");
foreach ($_POST as $key => $value) {
$$key = addslashes(trim($value));
}

function generateCode($length = 10)
{
   $password="";
   $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
   srand((double)microtime()*1000000);
   for ($i=0; $i<$length; $i++)
   {
      $password .= substr ($chars, rand() % strlen($chars), 1);
   }
   return $password;
} 

if ($submitform == 1) {

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

if (!preg_match('/^[^\W][a-zA-Z0-9-._]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/',$email_address)) {
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

if ( ($registeras == 'model') && (strlen($modelcity) < 5) ) {
$error = true;
$errormessage[] = 'Please enter your city';
}

$usernamecount = mysql_result(mysql_query("SELECT COUNT(id) FROM authorize_new WHERE username='$username'"),0);
if ($usernamecount > 0) {
$error = true;
$errormessage[] = 'Username is in use.';
}

if ((!is_numeric($phone))  && (strlen($phone) > 2) ){
$error = true;
$errormessage[] = 'Phone number should be numeric.';
} 

if ($error == false) {

$adminemail = 'steen@brogaard.com';
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

$sql = sprintf('INSERT INTO %s (%s) VALUES ("%s")', 'authorize_new', implode(', ', array_map('mysql_escape_string', array_keys($sql_data_array))), implode('", "',array_map('mysql_escape_string', $sql_data_array)));
$result = mysql_query($sql) or die ("Error in query: $sql. ".mysql_error());
$insertid = mysql_insert_id();

$sql2 = "UPDATE authorize_new SET password = password('$password') WHERE id = '$insertid'";
$result2 = mysql_query($sql2) or die ("Error in query: $sql2. ".mysql_error());


		if ($registeras == 'model') {
		
			$sqlu = "UPDATE authorize_new SET usertype = 'model' WHERE id = '$insertid'";
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
			
			$sqld = sprintf('INSERT INTO %s (%s) VALUES ("%s")', 'authorize_details', implode(', ', array_map('mysql_escape_string', array_keys($sqld_data_array))), implode('", "',array_map('mysql_escape_string', $sqld_data_array)));
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
			$sql2 = "UPDATE authorize_details SET modelimages = '$ImageStr' WHERE authorize_details_id = '$modelinsertid'";
			$result2 = mysql_query($sql2) or die ("Error in query: $sql2. ".mysql_error());
		}

	}


		} else if ($registeras == 'company') {
		
			$sqlu = "UPDATE authorize_new SET usertype = 'company' WHERE id = '$insertid'";
			$resultu = mysql_query($sqlu) or die ("Error in query: $sql2. ".mysql_error());
			
			$companytypes = implode(',', $_POST[companytype]);
			$sqld_data_array['authorize_id'] = $insertid;
			$sqld_data_array['companyname'] = $companyname;
			$sqld_data_array['companytype'] = $companytypes;
			$sqld_data_array['companycomments'] = $companycomments;

			$sqld = sprintf('INSERT INTO %s (%s) VALUES ("%s")', 'authorize_details', implode(', ', array_map('mysql_escape_string', array_keys($sqld_data_array))), implode('", "',array_map('mysql_escape_string', $sqld_data_array)));
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
$errormsg = "<ul><li>".implode("<li>",$errormessage)."</ul>"; 
}
					  
}


$months = array (1 => '01', '02', '03', '04', '05', '06','07', '08', '09', '10', '11', '12');
$days = range (1, 31);
$years = range (1930, 2000);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="da" dir="ltr">

<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Steen Brogaard" />
	<meta name="description" content="Copenhagen based photographer" />
	<meta name="keywords" content="foto, photography, fotograf, fotografi, portræt, portrait, still, fashion, model, portfolio, royal, kongelig, landscape, nature, nude, fine art prints, corporate, visual identity" />
	<meta name="generator" content="Adobe Photoshop Lightroom, TTG LR Pages" />
	<title>Photographer Steen Brogaard - Copenhagen  Denmark - Photography | Portrait | Visual Identity | CRS | Commercial | Fine Art  | Corporate |  </title>

	<link rel="shortcut icon" type="image/ico" href="./resources/images/favicon.ico" />
	<link rel="stylesheet" type="text/css" media="screen" href="./resources/css/gallery.css" />

	<script type="text/javascript" src="./resources/js/swfobject.js"></script>
	<script type="text/javascript" src="./resources/js/livevalidation.js"></script>
	<script type="text/javascript" src="./resources/js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="./resources/js/jquery.jfade.1.0.min.js"></script>
	<script type="text/javascript" src="./resources/js/captify.tiny.js"></script>
	
		<script type="text/javascript" src="./resources/shadowbox/shadowbox.js"></script>
	<script type="text/javascript">
    
		var options = {
			overlayColor:  '#000000',
			overlayOpacity:  0.85,
			players: ['img','swf','flv','qt','wmp','iframe','html']		};

		Shadowbox.init(options);

	</script>

	<link rel="stylesheet" type="text/css" media="screen" href="./resources/shadowbox/shadowbox.css" />

	<style type="text/css">
		#sb-nav-close { background-image:url(./resources/images/sb_ffffff_icons.png) !important; background-position: -64px 0; }
		#sb-nav-next { background-image:url(./resources/images/sb_ffffff_icons.png) !important; background-position: -32px 0; }
		#sb-nav-previous { background-image:url(./resources/images/sb_ffffff_icons.png) !important; background-position: -48px 0; }
		#sb-nav-play { background-image:url(./resources/images/sb_ffffff_icons.png) !important; background-position: -16px 0; }
		#sb-nav-pause { background-image:url(./resources/images/sb_ffffff_icons.png) !important; background-position: 0 0; }
	</style>
	
	<script type="text/javascript">
		$(function(){
		
			$(".albumBox").jFade({
				trigger: "mouseover",
				property: 'background',
				start: 'FFFFFF',
				end: '000000',
				steps: 20,
				duration: 15
			}).jFade({
				trigger: "mouseout",
				property: 'background',
				start: '000000',
				end: 'FFFFFF',
				steps: 20,
				duration: 15
			});
		
		});
	</script>

		<script type="text/javascript">
		<!--
		
		function printViewportDimensions() {
			var viewportwidth = $(window).width();
			var viewportheight = window.innerHeight ? window.innerHeight : $(window).height();  
			$('#wrapper').css('min-height', (viewportheight-100) + 'px');
		}
		
		printViewportDimensions();
		
		$(function() {
			printViewportDimensions();
					
			$(window).resize(function() 
			{
			printViewportDimensions();
			});
		});
		
		//-->
	</script>
		
		<script type="text/javascript">
		<!--
		$(function(){
		$('img.captify').captify({
			speedOver: 'fast',
			speedOut: 'normal',
			hideDelay: 500,	
			animation: 'slide',		
			prefix: '',		
			opacity: '0.7',					
			className: 'caption-top',	
			position: 'top',
			spanWidth: '100%'
		});
		});
		//-->

	</script>
<script type="text/javascript">
$(document).ready(function(){
    $('input[name="registeras"]').click(function() {
        var selected = $(this).val();
        $(".shade").hide();
        $('#' + selected).show();
    });
});
</script>
	<style type="text/css">
	
		
	#page_content {
		-moz-border-radius: 3px;
		-webkit-border-radius: 3px;
	}
	
	.albumBox, .albumBoxContent {
		background-color: #FFFFFF;
		-moz-border-radius: 9px;
		-webkit-border-radius: 9px;
		}
	
	#inputfields {
		-moz-border-radius: 0px;
		-webkit-border-radius: 0px;
		}

		
	.caption-top, .caption-bottom {
		color: #FFFFFF;	
		padding: 0.5em;	
		font-weight: normal;
		font-size: 19px;	
		font-family: Frutiger, 'Frutiger Linotype', Univers, Calibri, 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', Myriad, 'DejaVu Sans Condensed', 'Liberation Sans', 'Nimbus Sans L', Tahoma, Geneva, 'Helvetica Neue', Helvetica, Arial, sans-serif;	
		border: 0px solid #000000;
		background: #000000;
		text-shadow: 1px 1px 0 #FFFFFF;
	}
	.caption-top {
		border-width: 0px 0px 0px 0px;
		}
	.caption-bottom {
		border-width: 0px 0px 0px 0px;
		}
	.caption a, .caption a {
		border: 0 none;
		text-decoration: none;
		background: #000000;
		padding: 0.3em;
		}
	.caption a:hover, .caption a:hover {
		background: #202020;
		}
	.albumBoxContent, img.captify {
		width: 164px;
		height: 164px;
		}
	.albumBoxContent {
		padding: 0 !important;
		}
	img.captify {
		opacity: 0; filter:alpha(opacity=0);
		}
	
		#footer {
	position: absolute;
	bottom: -5px;
	left: 17px;
}	
span.required {
  font-weight: bold;
  color: #ff0000;
}
	</style>

	<!-- compliance patch for microsoft browsers -->
	<!--[if lt IE 8]>
	<script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE8.js" type="text/javascript"></script>
	<![endif]-->
		
			  <style type="text/css">
#hello {
  display: none;
  position: absolute;
  top: 500px;
  left: 500px;
  height: 200px;
  width: 400px;
  border: 1px solid black;
  background: #fff;
}
</style>
</head>
    <body>
    <div id="wrapper">
      
      
 <div id="header_container">
<div id="header" style="width: 960px !important;">
	
	<h1 style="background-image: url(./resources/images/idplate.png); background-repeat: no-repeat; background-position: 2% 68%;"><a href="http://www.brogaard.com"><span>Photographer Steen Brogaard - Copenhagen  Denmark - Photography | Portrait | Visual Identity | CRS | Commercial | Fine Art  | Corporate |  </span></a></h1>
		
</div> <!-- /header -->
</div>
	
<div id="menu">
	<div id="menuContent"	 style="width: 960px !important; background-repeat: no-repeat; background-position: 2% 68%;">

	<p style="margin-left: 0px !important; margin-right: 0px !important;"><a href="about.html" id="metadata.menuItem1.value" class="menufirst">WHO IS</a>  <a href="galleryindex.php" id="metadata.menuItem2.value">PORTFOLIO</a>  <a href="royal.html" id="metadata.menuItem3.value">ROYAL</a>  <u>INTERACT</u>  <a href="contact.html" id="metadata.menuItem5.value">CONTACT</a>  <a href="http://www.mosthigh.dk" target="_blank">MASTER PRINTS  <img src="resources/brogaard/arrowout.gif"  align="absbottom"  alt="Go to our art gallery - link opens in new window"  /></a><a href="login.html" id="metadata.contact.value" class="menulast">LOGIN</a></p>
	
	</div>
</div> <!-- /menu -->

	
<div id="page">


	<div id="page_content" class="contact">
	<div class="copy" style="float:left; width: 512px; height: 1600px;">

	
	


	
	
	<p id="nonCSS.aboutParagraph3.value">
	  <style type="text/css">
<!--
.style2 {color: 262626; }
.style3 {font-size: 12px}
-->
      </style>
    <table width="960" border="0">
      <tr>
        <td>
          <div name="subcontent" id="subcontent2" style="position:absolute; ; border: 0 px solid grey; background-color: #ffffff; width: 600px; padding: 8px;">
            <table width="100%" border="0">
  <tr>
    <td align="right"><div id="google_translate_element"></div><script>
function googleTranslateElementInit() {
  new google.translate.TranslateElement({
    pageLanguage: 'da'
  }, 'google_translate_element');
}
</script><script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script></td>
  </tr>
</table>
                  <h2 align="left">DELTAG | JOIN</h2>
<form action="" id="member_form" method="post" enctype="multipart/form-data">
<input name="submitform" type="hidden" value="1" />
<table border="0" cellspacing="2" cellpadding="2" width="500" align="center">
			  <tr>
				<td colspan="2"><p align="left">Registrér dig her for at få opdateringer om kommende udstillinger og deltage i fremtidige projekter</p>
				  <p align="left">&nbsp;</p>
				  <p align="left"><strong>Bare interesseret?</strong> </p>
				  <p align="left">Registrer dig som <em>Private</em>.</p>
				  <p align="left">&nbsp;</p>
				  <p align="left"><strong>Nuværende eller fremtidig kunde eller leverandør?</strong> </p>
				  <p align="left">Registrer dig som <em>Company</em>.</p>
				  <p align="left">&nbsp;</p>
				  <p align="left"><strong>Vil  medvirke som model på kommercielle og ikke-kommercielle optagelser?</strong></p>
				  <p align="left"> Registrer dig som <em>Model</em>. </p>
				  <p align="left">&nbsp;</p>
				  <p align="left">&nbsp;</p>
<p align="left">Vil du bestille billeder fra projektet Herlufsholm skal du registrere dig <a href="http://www.herlufsholm.dk/Dansk/om_herlufsholm/Billeder/Pages/default.aspx" target="_new"><u>her</u>.</a></p>
				  <p align="left">Billeder fra Københavns Drengekor vil blive tilgængelige via korets hjemmeside.</p>
				  <p align="left">&nbsp;</p>
<p align="left">Felter mærket med * SKAL udfyldes.</p></td>
			  </tr>

			  <tr>
				<td colspan="2" style="padding-left:80px;color:red;" align="left"><?=$errormsg?></td>
			  </tr>

              <tr>
                <td width="250" align="left">Fornavn: <span class="required">*</span></td>
                <td width="250" align="left"><input type="text" name="firstname" value="<?=$firstname?>"></td>
              </tr>
              <tr>
                <td align="left">Efternavn : <span class="required">*</span></td>
                <td align="left"><input type="text" name="lastname" value="<?=$lastname?>"></td>
              </tr>
              <tr>
                <td align="left">E-Mail:: <span class="required">*</span></td>
                <td align="left"><input type="text" name="email_address" value="<?=$email_address?>"></td>
              </tr>
              <tr>
                <td align="left">Gentag E-Mail: <span class="required">*</span></td>
                <td align="left"><input type="text" name="reemail_address" value="<?=$reemail_address?>"></td>
              </tr>
              <tr>
                <td align="left">Username: <span class="required">*</span></td>
                <td align="left"><input type="text" name="username" value="<?=$username?>"></td>
              </tr>
              <tr>
                <td align="left">Password: <span class="required">*</span></td>
                <td align="left"><input type="password" name="password"></td>
              </tr>
              <tr>
                <td align="left">Gentag password: <span class="required">*</span></td>
                <td align="left"><input type="password" name="repassword"></td>
              </tr>
			  <tr>
				<td width="200" align="left">Telefon:</td>
				<td width="300" align="left"><input type="text" name="phone" value="<?=$phone?>" maxlength="13"></td>
			  </tr>
              <tr>
                <td align="left">Registrer dig selv som</td>
                <td align="left"><input type="radio" name="registeras" class="user" value="user" onclick="document.getElementById('hello').style.display='none'" checked/>Private <input type="radio" name="registeras" class="company" value="company" onclick="document.getElementById('hello').style.display='none'"/>Company <input type="radio" name="registeras" class="model" value="model" onclick="document.getElementById('hello').style.display='block'"/>Model</td>
              </tr>
			  
			  <div id="hello">
			  <p align="center">WHAT WE LOOK FOR</p>
			  			<ul>
							<li>A serious interest in modelling/posing.</li>
							<li>Patience and humor.</li>
							<li>Interesting personal characteristica.</li>
							<li>You must have parental consent<br>if you are under 18 years of age.</li>
                            <li>Current: Models for non-commercial project <strong>DE-EVOLUTION</strong></li>
						</ul>		  <!--<p align="center"><a href="javascript:void(0)" onclick="document.getElementById('hello').style.display='none'">Close</a></p>-->
		  
			  </div>
              <tr id="company" class="shade" style="display:none;">
                <td colspan="2" align="left">
				<table border="0" cellspacing="2" cellpadding="2" width="100%">
					<tr>
						<td width="200" align="left">Firma-navn:</td>
						<td width="300" align="left"><input type="text" name="companyname" value="<?=$companyname?>"></td>
					</tr>
					<tr>
						<td align="left">Type:</td>
						<td align="left"><input type="checkbox" name="companytype[]" value="Client">
						Kunde |<em> Client </em>
					  <input type="checkbox" name="companytype[]" value="Supplier">
					  Leverandør | <em>Supplier</em></td>
					</tr>
					<tr>
						<td align="left">Kommentarer:</td>
						<td align="left"><textarea rows="4" cols="30" name="companycomments"><?=$companycomments?></textarea></td>
					</tr>
				</table></td>
			  </tr>
              <tr id="model" class="shade" style="display:none;">
                <td colspan="2" align="left">
				<table border="0" cellspacing="5" cellpadding="2" width="100%">
					<tr>
						<td align="left">Køn:</td>
						<td align="left"><input type="radio" name="modelgender" value="male" />Male <input type="radio" name="modelgender" value="female" />Female</td>
					</tr>
					<tr>
						<td align="left">Fødselsdag:</td>
						<td align="left">
											<?
echo "<select name='modelmonth'>";
foreach ($months as $value) {
	echo '<option value="'.$value.'">'.$value.'</option>\n';
} echo "</select> &nbsp;";

echo " <select name='modelday'>";
foreach ($days as $value) {
	echo '<option value="'.$value.'">'.$value.'</option>\n';
} echo "</select> &nbsp;";

echo " <select name='modelyear'>";
foreach ($years as $value) {
	echo '<option value="'.$value.'">'.$value.'</option>\n';
} echo "</select>";
					?>
						</td>
					</tr>					
					<tr>
						<td align="left">Hudfarve:</td>
						<td align="left"><input type="text" name="modelskincolor" value="<?=$skincolor?>"></td>
					</tr>
					<tr>
						<td align="left">Øjenfarve:</td>
						<td align="left"><input type="text" name="modeleyecolor" value="<?=$eyecolor?>"></td>
					</tr>
					<tr>
						<td align="left">Hårfarve:</td>
						<td align="left"><input type="text" name="modelhaircolor" value="<?=$haircolor?>"></td>
					</tr>
					<tr>
						<td align="left">Højde(cm):</td>
						<td align="left"><input type="text" name="modelheight" value="<?=$height?>"></td>
					</tr>
					<tr>
						<td align="left">Type:</td>
						<td align="left"><input type="radio" name="modeltype" value="Only commercial jobs" />
					  Kun jobs med honorar<br><input type="radio" name="modeltype" value="Commercial and non-cmmercial jobs" checked/>
					  Også ubetale jobs</td>
					</tr>
					<tr>
						<td align="left">Addresse:</td>
						<td align="left"><input type="text" name="modeladdress" value="<?=$modeladdress?>"></td>
					</tr>
					<tr>
						<td align="left">By: <span class="required">*</span></td>
						<td align="left"><input type="text" name="modelcity" value="<?=$modelcity?>"></td>
					</tr>
					<tr>
						<td align="left">Kan bedst:</td>
						<td align="left">
						<select name="modelavailability">
							<option value="Before noon">Before noon</option>
							<option value="After noon">After noon</option>
							<option value="Evening">Evening</option>
							<option value="Doesn’t matter" selected>Doesn’t matter</option>
						</select>
						</td>
					</tr>
					<tr>
						<td align="left">Kommentarer:</td>
						<td align="left"><textarea rows="4" cols="30" name="modelcomments"><?=$modelcomments?></textarea></td>
					</tr>
					<tr>
						<td width="200" align="left">Billeder</td>
						<td width="300" align="left">
								<input type=file name="images[]"><br>
								<input type=file name="images[]"><br>
								<input type=file name="images[]"><br>
								<input type=file name="images[]"><br>
						</td>
					</tr>
				</table></td>
			  </tr>
              <tr>
                <td align="left">Få nyhedsbrev:</td>
                <td align="left"><input checked="checked" id="sub_newsletter" name="sub_newsletter" type="checkbox" value="1" /></td>
              </tr>
			  <tr>
				<td colspan="2" align="center"><input class="button" type="submit" value="Register" /></td>
			  </tr>
               <tr>
			    <td colspan="2" align="center"><p  align="left">To use and register with this website you must agree to our <a class="option" href="terms.html" title="Terms of Use" rel="shadowbox"><u>Terms of Use</u></a> and <a class="option" href="policy.html" title="Privacy Policy" rel="shadowbox"><u>Privacy Policy</u></a>. Please make sure that you have read and understood these before registering. In particular, we will record and use your details to send you our newsletter and to contact you with marketing information by email unless you untick the 'Get the newsletter' box.</p></td>
	      </tr>
               <tr>
                 <td colspan="2" align="center	"><p style="text-align:left;">&nbsp;</p></td>
               </tr>
</table>


</form>
<p style="text-align:center;"><a href="http://www.facebook.com/brogaard" rel="nofollow" target="_blank"><img src="/resources/images/facebook_16.png" border="0"></a>  <a href="http://twitter.com/brogaard" rel="nofollow" target="_blank"><img src="/resources/images/twitter_16.png" border="0"></a>  <a href="http://dk.linkedin.com/pub/steen-brogaard/0/8a9/123" rel="nofollow" target="_blank"><img src="../resources/images/linkedin_16.png" border="0"></a></p>
<div class="clear"></div>
	</div> <!-- /page_content home -->
				

<div id="footer">
<div id="footer_content">

<p class="footer_text footer_nav" style="margin-bottom: 1em !important;"><a href="about.html" id="metadata.menuItem1.value" style="padding-left: 0 !important;">WHO IS</a>  <a href="galleryindex.php" id="metadata.menuItem2.value">PORTFOLIO</a>  <a href="royal.html" id="metadata.menuItem3.value">ROYAL</a>  <a href="interact.html"  id="metadata.menuItem4.value">INTERACT</a>  <a href="contact.html" id="metadata.menuItem5.value">CONTACT</a>  <a href="http://www.mosthigh.dk" target="_blank">MASTER PRINTS  <img src="resources/brogaard/arrowout.gif"  align="absbottom"  alt="Go to our art gallery - link opens in new window"  /></a><a href="login.html" id="metadata.contact.value" style="padding-right: 0 !important;">LOGIN</a></p><p class="footer_text">STEEN BROGAARD  | CELLPH.: +45 4057 8090 | <a href="mailto:INFO@BROGAARD.COM">INFO@BROGAARD.COM</a> | ALL RIGHTS RESERVED 1984-2014
</p>

<!--<p style="text-align:center;"><a href="http://www.facebook.com/brogaard" rel="nofollow" target="_blank"><img src="/resources/images/rsz_facebookgrey.png" border="0"></a>  <a href="http://twitter.com/brogaard" rel="nofollow" target="_blank"><img src="/resources/images/rsz_1twittergrey.png" border="0"></a>  <a href="http://dk.linkedin.com/pub/steen-brogaard/0/8a9/123" rel="nofollow" target="_blank"><img src="/resources/images/linkedin_icon_grey.jpg" border="0"></a></p>
-->
</div>
</div><!-- /wrapper -->

    
<script src="http://www.brogaard.com/client_login/user_online.php" type="text/javascript"></script>

	
	
		<script type="text/javascript">
		var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
		document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
		</script>
		<script type="text/javascript">
		try {
		var pageTracker = _gat._getTracker("UA-11542948-1");
		pageTracker._trackPageview();
		} catch(err) {}
	</script>

<script src="http://www.brogaard.com/shell/usertrack.php" type="text/javascript"></script>

	</body>
</html>
