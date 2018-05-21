<? session_start();
require_once("conn.php");
foreach ($_POST as $key => $value) {
$$key = addslashes(trim($value));
}

$userid = $HTTP_GET_VARS['userid'];
if ($userid != $_SESSION[id]) {
header('Location: http://www.brogaard.com/');
exit;
}

if ($submitform == 1) {

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

if (!preg_match('/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/',$email_address)) {
$error = true;
$errormessage[] = 'Your email is not valid.';
}

if (strlen($password) > 0) {

if ((strlen($password) < 6) && (strlen($password) > 10)) {
$error = true;
$errormessage[] = 'Your password should be between 6-10 characters';
}

if ($password != $repassword) {
$error = true;
$errormessage[] = 'Password and verify password doesn\'t match.';
}

}


if ( ($phone != '') && (!is_numeric($phone)) ){
$error = true;
$errormessage[] = 'Phone number should be numeric.';
} 

if ($error == false) {

      $sql_data_array = array('firstname' => $firstname,
                              'lastname' => $lastname,
                              'email' => $email_address,
                              'phone' => $phone,
                              'royalaccess' => $royalaccess,
                              'getnewsletter' => $sub_newsletter);

foreach ($sql_data_array as $key => $value) {
    $sets[]='`'.$key.'`=\''.$value.'\'';
}
$sqlquery='SET '.implode(', ',$sets);

$sqlq = "UPDATE authorize_new $sqlquery WHERE id='$hiddenuserid'";
$result = mysql_query($sqlq) or die ("Error in query: $sqlq. ".mysql_error());

if (strlen($password) > 0) {
$sql2 = "UPDATE authorize_new SET password = password('$password') WHERE id = '$hiddenuserid'";
$result2 = mysql_query($sql2) or die ("Error in query: $sql2. ".mysql_error());
}

$adminemail = 'steen@brogaard.com';
$Nameedit = "brogaard.com";
$frommailedit = "noreply@brogaard.com";
$subjectedit = "User details updated";
$bodyedit = "Hello admin,\r\nAccount details updated:\r\n\r\n";
$bodyedit .= "First Name: $firstname\r\n";
$bodyedit .= "Last Name: $lastname\r\n";
$bodyedit .= "Email: $email_address\r\n";
$bodyedit .= "Phone: $phone\r\n";
$bodyedit .= "Royal Access: $royalaccess\r\n";
$bodyedit .= "Newsletter: $sub_newsletter\r\n";
$bodyedit .= "Company name: $companyname\r\n";
$bodyedit .= "Company Type: $companytypes\r\n";
$bodyedit .= "Comments: $companycomments\r\n";
$headeredit = "From: ". $Nameedit . " <" . $frommailedit . ">\r\n";
mail($adminemail, $subjectedit, $bodyedit, $headeredit);

//update company details
$companytypes = implode(',', $_POST[companytype]);
$sqld_data_array['companyname'] = $companyname;
$sqld_data_array['companytype'] = $companytypes;
$sqld_data_array['companycomments'] = $companycomments;

foreach ($sqld_data_array as $key => $value) {
    $setsd[]='`'.$key.'`=\''.$value.'\'';
}
$sqlqueryd='SET '.implode(', ',$setsd);


$sqlqd = "UPDATE authorize_details $sqlqueryd WHERE authorize_id ='$hiddenuserid'";
$resultd = mysql_query($sqlqd) or die ("Error in query: $sqlqd. ".mysql_error());

$_SESSION[royalaccess]= $royalaccess;
$_SESSION[first_name] 	= $firstname;

$errormsg = "Account details updated successfully. <strong><a href=\"gallery_select.php\">Click here</a></strong> to go back to main page."; 

} else {
$errormsg = "<ul><li>".implode("<li>",$errormessage)."</ul>"; 
}
					  
}


$userid = $HTTP_GET_VARS['userid'];
$sqluser = "SELECT * FROM authorize_new WHERE id = '$userid'";
$resultuser = @mysql_query($sqluser) or die(mysql_error());
$row = mysql_fetch_object($resultuser);

$firstname		= $row -> firstname;
$lastname		= $row -> lastname;
$username		= $row -> username;
$email_address		= $row -> email;
$phone		= $row -> phone;
$getnewsletter	= $row -> getnewsletter;
$royalaccess	= $row -> royalaccess;

if ($getnewsletter == 1) { $newsselected = 'checked="checked"'; }
if ($royalaccess == 1) { $royalselected = 'checked="checked"'; }

$sqluserd = "SELECT * FROM authorize_details WHERE authorize_id = '$userid'";
$resultuserd = @mysql_query($sqluserd) or die(mysql_error());
$rowd = mysql_fetch_object($resultuserd);

$companyname		= $rowd -> companyname;
$companytype		= $rowd -> companytype;
$companycomments		= $rowd -> companycomments;
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

	<p style="margin-left: 0px !important; margin-right: 0px !important;"><a href="about.html" id="metadata.menuItem1.value" class="menufirst">WHO IS</a>  <a href="galleryindex.php" id="metadata.menuItem2.value">PORTFOLIO</a>  <a href="royal.html" id="metadata.menuItem3.value">ROYAL</a>  <a href="interact.html"  id="metadata.menuItem4.value">INTERACT</a>  <a href="contact.html" id="metadata.menuItem5.value">CONTACT</a>  <a href="http://www.mosthigh.dk" target="_blank">MASTER PRINTS  <img src="resources/brogaard/arrowout.gif"  align="absbottom"  alt="Go to our art gallery - link opens in new window"  /></a><a href="login.html" id="metadata.contact.value" class="menulast">LOGIN</a></p>
	
	</div>
</div> <!-- /menu -->

	
<div id="page">


	<div id="page_content" class="contact">
	<div class="copy" style="float:left; width: 512px; height: 750px;">

	
	


	
	
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

		  			<p><a href="gallery_select.php">Click here to go back</a></p>

                  <h2 align="left">EDIT YOUR ACCOUNT DETAILS</h2>
<form action="" id="member_form" method="post" enctype="multipart/form-data">
<input name="submitform" type="hidden" value="1" />
<input type="hidden" name="hiddenuserid" value="<?=$userid?>">
<table border="0" cellspacing="2" cellpadding="2" width="500" align="center">
			  <tr>
				<td colspan="2" style="padding-bottom:20px;color:red;" align="left"><?=$errormsg?></td>
			  </tr>

              <tr>
                <td width="250" align="left">First Name: <span class="required">*</span></td>
                <td width="250" align="left"><input type="text" name="firstname" value="<?=$firstname?>"></td>
              </tr>
              <tr>
                <td align="left">Last Name: <span class="required">*</span></td>
                <td align="left"><input type="text" name="lastname" value="<?=$lastname?>"></td>
              </tr>
              <tr>
                <td align="left">E-Mail Address: <span class="required">*</span></td>
                <td align="left"><input type="text" name="email_address" value="<?=$email_address?>"></td>
              </tr>
              <tr>
                <td align="left">Username:</td>
                <td align="left"><?=$username?></td>
              </tr>
              <tr>
                <td align="left" colspan="2" style="padding-top:20px;"><small>Leave blank if you don't want to change your current password.</small></td>
              </tr>
              <tr>
                <td align="left">Password:</td>
                <td align="left"><input type="password" name="password"></td>
              </tr>
              <tr>
                <td align="left">Repeat the password:</td>
                <td align="left"><input type="password" name="repassword"></td>
              </tr>
			  <tr>
				<td width="200" align="left" style="padding-top:20px;">Phone:</td>
				<td width="300" align="left" style="padding-top:20px;"><input type="text" name="phone" value="<?=$phone?>" maxlength="13"></td>
			  </tr>
              <tr>
                <td align="left">Get the newsletter:</td>
                <td align="left"><input <?=$newsselected?> id="sub_newsletter" name="sub_newsletter" type="checkbox" value="1" /></td>
              </tr>
			  
              <tr>
                <td align="left">Company:</td>
                <td align="left"><input type="text" name="companyname" value="<?=$companyname?>"></td>
              </tr>
              <tr>
                <td align="left">Type:</td>
                <td align="left"><input type="checkbox" name="companytype[]" value="Client" <? if (preg_match("/Client/i", $companytype)) { echo 'checked'; } ?>> Client <input type="checkbox" name="companytype[]" value="Supplier" <? if (preg_match("/Supplier/i", $companytype)) { echo 'checked'; } ?>> Supplier</td>
              </tr>
				<tr>
					<td align="left">Comments:</td>
					<td align="left"><textarea rows="4" cols="30" name="companycomments" style="width: 250px ; height:150px;font-size:10px;"><?=$companycomments?></textarea></td>
				</tr>
              <tr>
                <td align="left">Access to royal folder:</td>
                <td align="left"><input <?=$royalselected?> id="royalaccess" name="royalaccess" type="checkbox" value="1" /></td>
              </tr>
			  <tr>
				<td colspan="2" align="center"><input class="button" type="submit" value="Submit changes" /></td>
			  </tr>
</table>

</form>
<div class="clear"></div>
	</div> <!-- /page_content home -->
				

<div id="footer">
<div id="footer_content">

<p class="footer_text footer_nav" style="margin-bottom: 1em !important;"><a href="about.html" id="metadata.menuItem1.value" style="padding-left: 0 !important;">WHO IS</a>  <a href="galleryindex.php" id="metadata.menuItem2.value">PORTFOLIO</a>  <a href="royal.html" id="metadata.menuItem3.value">ROYAL</a>  <a href="interact.html"  id="metadata.menuItem4.value">INTERACT</a>  <a href="contact.html" id="metadata.menuItem5.value">CONTACT</a>  <a href="http://www.mosthigh.dk" target="_blank">MASTER PRINTS  <img src="resources/brogaard/arrowout.gif"  align="absbottom"  alt="Go to our art gallery - link opens in new window"  /></a><a href="login.html" id="metadata.contact.value" style="padding-right: 0 !important;">LOGIN</a></p><p class="footer_text">STEEN BROGAARD  | CELLPH.: +45 4057 8090 | ALL RIGHTS RESERVED 1984-2010 </p>

<!--<p style="text-align:center;"><a href="http://www.facebook.com/brogaard" rel="nofollow" target="_blank"><img src="/resources/images/rsz_facebookgrey.png" border="0"></a>  <a href="http://twitter.com/brogaard" rel="nofollow" target="_blank"><img src="/resources/images/rsz_1twittergrey.png" border="0"></a>  <a href="http://dk.linkedin.com/pub/steen-brogaard/0/8a9/123" rel="nofollow" target="_blank"><img src="/resources/images/linkedin_icon_grey.jpg" border="0"></a></p>-->

</div>
</div><!-- /wrapper -->



	
	
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
    

<script src="http://www.brogaard.com/os14/shell/usertrack.php" type="text/javascript"></script>

	</body>
</html>
