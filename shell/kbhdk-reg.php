<? session_start();
require_once("conn.php");
include 'logout.php';

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

if (!preg_match("/^([a-zA-Z0-9])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]+)+/", $email_address)) {
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

$usernamecount = mysql_result(mysql_query("SELECT COUNT(id) FROM authorize_new WHERE username='$username'"),0);
if ($usernamecount > 0) {
$error = true;
$errormessage[] = 'Username is in use.';
}

if ($error == false) {

$adminemail = 'steen@brogaard.com';
$Nameedit = "brogaard.com";
$frommailedit = "noreply@brogaard.com";
$subjectedit = "New user registration - kbhdk";
$bodyedit = "Hello admin,\r\nYou have new user:\r\n\r\n";
$bodyedit .= "First Name: $firstname\r\n";
$bodyedit .= "Last Name: $lastname\r\n";
$bodyedit .= "Email: $email_address\r\n";
$headeredit = "From: ". $Nameedit . " <" . $frommailedit . ">\r\n";
mail($adminemail, $subjectedit, $bodyedit, $headeredit);

$activationkey =  generateCode();

      $sql_data_array = array('firstname' => $firstname,
                              'lastname' => $lastname,
                              'email' => $email_address,
                              'username' => $username,
                              'group1' => 'Users',
                              'usertype' => 'private',
                              'redirect' => 'http://www.brogaard.com/clientarea/kbhdk',
                              'date_created' => $todaydate,
                              'royalaccess' => '0',
                              'activationkey' => $activationkey);

$sql = sprintf('INSERT INTO %s (%s) VALUES ("%s")', 'authorize_new', implode(', ', array_map('mysql_escape_string', array_keys($sql_data_array))), implode('", "',array_map('mysql_escape_string', $sql_data_array)));
$result = mysql_query($sql) or die ("Error in query: $sql. ".mysql_error());
$insertid = mysql_insert_id();

$sql2 = "UPDATE authorize_new SET password = password('$password') WHERE id = '$insertid'";
$result2 = mysql_query($sql2) or die ("Error in query: $sql2. ".mysql_error());

$Name = "brogaard.com";
$email2 = "noreply@brogaard.com";
$subject = "Account activation on brogaard.com";
$body = "Hello $firstname,\r\nWelcome to our website!\r\n\r\nYou, or someone using your email address, has completed registration at brogaard.com. \r\n\r\nYour username: $username\r\nYour password: $password\r\n\r\n Your activation code : $activationkey\r\n\r\n\r\nhttp://www.brogaard.com/shell/activate.html\r\n\r\nIf this is an error, ignore this email.\r\n\r\nRegards";
$header = "From: ". $Name . " <" . $email2 . ">\r\n";
mail($email_address, $subject, nl2br($body), $header);
$errormsg = "Registration successful. We just sent you activation code. <strong><a href=\"activate.html\">Click here</a></strong> to activate your account."; 

} else {
$errormsg = "<ul><li>".implode("<li>",$errormessage)."</ul>"; 
}
					  
}
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
			animation: 'always-on',		
			prefix: '',		
			opacity: '0.7',					
			className: 'caption-bottom',	
			position: 'bottom',
			spanWidth: '100%'
		});
		});
		//-->
	</script>
	
	<style type="text/css">		
	#page_content {
		-moz-border-radius: 10px;
		-webkit-border-radius: 10px;
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
		color: #000000;	
		padding: 0.5em;	
		font-weight: normal;
		font-size: 14px;	
		font-family: Frutiger, 'Frutiger Linotype', Univers, Calibri, 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', Myriad, 'DejaVu Sans Condensed', 'Liberation Sans', 'Nimbus Sans L', Tahoma, Geneva, 'Helvetica Neue', Helvetica, Arial, sans-serif;	
		border: 0px solid #000000;
		background: #FFFFFF;
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
		width: 210px;
		height: 210px;
		}
	.albumBoxContent {
		padding: 0 !important;
		}
	img.captify {
		opacity: 0; filter:alpha(opacity=0);
		}
	
		#footer { position: absolute; bottom: 0; left: 0; }

		span.required {
  font-weight: bold;
  color: #ff0000;
}
</style>

	<!-- compliance patch for microsoft browsers -->
	<!--[if lt IE 8]>
	<script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE8.js" type="text/javascript"></script>
	<![endif]-->
		

	</head>
    <body>

<body id="about">


<div id="wrapper">

	
<div id="header_container">
<div id="header" style="width: 960px !important;">
	
	<h1 style="background-image: url(./resources/images/idplate.png); background-repeat: no-repeat; background-position: 2% 68%;"><a href="http://www.brogaard.com"><span>Photographer Steen Brogaard - Copenhagen  Denmark - Photography | Portrait | Visual Identity | CRS | Commercial | Fine Art  | Corporate |  </span></a></h1>
		
</div> <!-- /header -->
</div>

<div id="menu">
	<div id="menuContent" style="width: 960px !important;">

	<p style="margin-left: 0px !important; margin-right: 0px !important;"><a href="about.html" id="metadata.menuItem1.value" class="menufirst">WHO IS</a>  <a href="galleryindex.php" id="metadata.menuItem2.value">PORTFOLIO</a>  <a href="royal.html" id="metadata.menuItem3.value">ROYAL</a>  <a href="interact.html"  id="metadata.menuItem4.value">INTERACT</a>  <a href="contact.html" id="metadata.menuItem5.value">CONTACT</a>  <a href="http://www.mosthigh.dk" target="_blank">MASTER PRINTS  <img src="resources/brogaard/arrowout.gif"  align="absbottom"  alt="Go to our art gallery - link opens in new window"  /></a><a href="login.html" id="metadata.contact.value" class="menulast">LOGIN</a></p>
	
	</div>
</div> <!-- /menu -->

	
<div id="page">

<div id="page_content" class="about">

                  <h2 align="left">EKSKLUSIV KDK FOTO-BLOG</h2>
                  <div align="left"><BR />
                 For at få adgang til til KØBENHANVS DRENGEKORS FOTO-BLOG skal du først registrere dig som bruger.<br />
                 Billederne er forbeholdt nuværende eller tidligere medlemmer, ansatte eller famlie til medlemmer af koret.
                 <br />
                 Billeder fundet på disse sider kan købes til privat brug.<br /><br />
                 <p  align="left"> <u><a href="login.html"><strong>Er allerede oprettet som bruger? - klik her</strong></a></u></p>

                  </div>
      <table width="960" border="0">
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>
          <div name="subcontent" id="subcontent"   border: 1px solid grey; background-color: #FFFFFF; width: 600px; padding: 8px;">
	<FORM METHOD="POST" ACTION="" name="Form1">
<input name="submitform" type="hidden" value="1" />
		  <table width="600" border="0" bordercolor="#000000">
			  <tr>
				<td colspan="2" style="padding-left:80px;color:red;" align="left"><?=$errormsg?></td>
			  </tr>

              <tr>
                <td width="250" align="left">Fornavn: <span class="required">*</span></td>
                <td width="250" align="left"><input type="text" name="firstname" value="<?=$firstname?>"></td>
              </tr>
              <tr>
                <td align="left">Efternavn: <span class="required">*</span></td>
                <td align="left"><input type="text" name="lastname" value="<?=$lastname?>"></td>
              </tr>
              <tr>
                <td align="left">E-Mail: <span class="required">*</span></td>
                <td align="left"><input type="text" name="email_address" value="<?=$email_address?>"></td>
              </tr>
              <tr>
                <td align="left">Gentag e-mail: <span class="required">*</span></td>
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
                <td align="left"><span class="style3">Modtag automatisk nyhedsbrev:</span></td>
                <td align="left"><input checked="checked" type="checkbox" name="newsletter" value="Yes" normal="normal" style="background-color:#FFFFFF; color: #141414; border: 1px solid #000000; font-family: verdana; font-size: 10px; padding: 1px" /></td>
              </tr>
                <tr>
                <td align="left"></td>
                <td align="left"><input type="submit" name="submit" size="25" value="REGISTER" style="font-family: Verdana" /></td>
              </tr>
			  <tr>
                <td colspan="2" align="left"><span id="msgbox" style="display:none"></span></td>
              </tr>
            </table></form>
           
			<p  align="left">Du modtager kun automatiske opdateringer om nye billeder i KDK-mappen, hvis Nyhedsbrevs-boxen er valgt. <br><br> <em>To use and register with this website you must agree to our <a class="option" href="terms.html" title="Terms of Use" rel="shadowbox"><u>Terms of Use</u></a> and <a class="option" href="policy.html" title="Privacy Policy" rel="shadowbox"><u>Privacy Policy</u></a>.<br> Please make sure that you have read and understood these before registering.<br>
			In particular, we will record and use your details to send you our newsletter by email unless you untick the 'Motag automatisk nyhedsbrev' box.</em></p>

          </div>
       
    
      </td>
    </tr>
  </table>
    </div>
</div> <!-- /gallery -->
				

<div id="footer">
<div id="footer_content">

<p class="footer_text footer_nav" style="margin-bottom: 1em !important;"><a href="about.html" id="metadata.menuItem1.value" style="padding-left: 0 !important;">WHO IS</a>  <a href="galleryindex.php" id="metadata.menuItem2.value">PORTFOLIO</a>  <a href="royal.html" id="metadata.menuItem3.value">ROYAL</a>  <a href="interact.html"  id="metadata.menuItem4.value">INTERACT</a>  <a href="contact.html" id="metadata.menuItem5.value">CONTACT</a>  <a href="http://www.mosthigh.dk" target="_blank">MASTER PRINTS  <img src="resources/brogaard/arrowout.gif"  align="absbottom"  alt="Go to our art gallery - link opens in new window"  /></a><a href="login.html" id="metadata.contact.value" style="padding-right: 0 !important;">LOGIN</a></p><p class="footer_text">STEEN BROGAARD  | CELLPH.: +45 4057 8090 | <a href="mailto:INFO@BROGAARD.COM">INFO@BROGAARD.COM</a> | ALL RIGHTS RESERVED 1984-2010</p>

</div>
</div>


</div> <!-- /wrapper -->


	
	
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
	


	</body>
</html>
