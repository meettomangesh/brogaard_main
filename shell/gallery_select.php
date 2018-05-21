<?php
session_start();

$host="localhost"; // Host name
$username = "brogaard_com";
$password = "markustimur";
$db_name ="brogaard_com";
$tbl_name="authorize_new"; // Table name

// Connect to server and select databse
mysql_connect("$host", "$username", "$password")or die("cannot connect to server");
mysql_select_db("$db_name")or die("cannot select DB");

$sql="SELECT galleries,redirect FROM $tbl_name WHERE username='$_SESSION[user_name]'";
$result=mysql_query($sql);

$count=mysql_num_rows($result);
$q = mysql_fetch_array($result);
$galleries = $q[galleries];
$redirect = $q[redirect];

if ($redirect == '') {
$redirecttext = "<strong>Not registered</strong>";
} else {
$redirecttext = "<a href=\"$redirect\">$redirect</a>";
}

/*
if ($galleries == '') {
header("Location: $redirect");
exit;
}
*/
if ($galleries != '') {
$galleryl = explode("|",$galleries);
$howmany = sizeof($galleryl);
} else {
$howmany = 0;
}

$usertype = $_SESSION[usertype];
switch ($usertype) {
    case "private":
		$editprofile = "http://www.brogaard.com/shell/edit_private.php?userid=$_SESSION[id]";
        break;
    case "company":
		$editprofile = "http://www.brogaard.com/shell/edit_company.php?userid=$_SESSION[id]";
        break;
    case "model":
		$editprofile = "http://www.brogaard.com/shell/edit_model.php?userid=$_SESSION[id]";
        break;
    default:
		$editprofile = "http://www.brogaard.com/shell/edit_private.php?userid=$_SESSION[id]";
}

$sqlc = "SELECT welcome_message  FROM configuration WHERE id = 1";
$resultc = @mysql_query($sqlc) or die(mysql_error());
$rowc = mysql_fetch_object($resultc);
$welcome_message = $rowc -> welcome_message;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="da" dir="ltr">

<head>

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
	
		#footer { position: absolute; bottom: 0; left: 0; }	</style>

	<!-- compliance patch for microsoft browsers -->
	<!--[if lt IE 8]>
	<script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE8.js" type="text/javascript"></script>
	<![endif]-->
		

	</head>

<body id="about">

<div id="wrapper">

	
<div id="header_container">
<div id="header" style="width: 960px !important;">
	
	<h1 style="background-image: url(./resources/images/idplate.png); background-repeat: no-repeat; background-position: 2% 68%;"><a href="http://www.brogaard.com"><span>Photographer Steen Brogaard - Copenhagen  Denmark - Photography | Portrait | Visual Identity | CRS | Commercial | Fine Art  | Corporate |  </span></a></h1>
		
</div> <!-- /header -->
</div>

<div id="menu">
	<div id="menuContent" style="width: 960px !important;">

	<p style="margin-left: 0px !important; margin-right: 0px !important;"><a href="about.html" id="metadata.menuItem1.value" class="menufirst">WHO IS</a>  <a href="galleryindex.php" id="metadata.menuItem2.value">PORTFOLIO</a>  <a href="royal.html" id="metadata.menuItem3.value">ROYAL</a>  <a href="interact.html"  id="metadata.menuItem4.value">INTERACT</a>  <a href="contact.html" id="metadata.menuItem5.value">CONTACT</a>  <a href="http://www.mosthigh.dk" target="_blank">MASTER PRINTS  <img src="resources/brogaard/arrowout.gif"  align="absbottom"  alt="Go to our art gallery - link opens in new window"  /></a><a href="logoutuser.php" id="metadata.contact.value" class="menulast">LOGOUT</a></p>
	
	</div>
</div> <!-- /menu -->

	
<div id="page">

<div id="page_content" class="about">






<table width="960" border="0">
    <tr>
      <td><table width="80%" border="0">
        <tr>
          <td align="right"><div id="google_translate_element"></div>
            <script>
function googleTranslateElementInit() {
  new google.translate.TranslateElement({
    pageLanguage: 'da'
  }, 'google_translate_element');
}
        </script>
            <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td align="left">
 	  <h3>Velkommen <?=$_SESSION[first_name]?>!</h3>
	<p><?=$welcome_message?></p>
	<h4>Vælg galleri:</h4>
	<p>Hoved-galleri: <strong><u><?=$redirecttext?></u></strong><br><br>

<?
if ( ($galleries != '') || ($_SESSION[royalaccess] == 1) ) {
?>
Du har også adgang til disse gallerier:<br>
<ul>
<?
for($i = 0; $i < $howmany; ++$i){
$galleryl[$i] = trim($galleryl[$i]);
    echo "<li><u><a href=\"http://www.brogaard.com/$galleryl[$i]\">http://www.brogaard.com/$galleryl[$i]</a></u></li>\n";
}

if ($_SESSION[royalaccess] == 1) {
    echo "<u><li><a href=\"http://www.brogaard.com/clientarea/royal\">http://www.brogaard.com/clientarea/royal</a></u></li>\n";
}
?>

<?
}
?>
</ul>
 </p>
 <?
if ($_SESSION[editaccount] == 1) {
?>
 	  
	<p><a href="<?=$editprofile?>"><h4><u>Rediger din konto</u></h4></a><br><br>
<?
}
?>
      </td>
    </tr>
  </table>
    </div>
</div> <!-- /gallery -->
				

<div id="footer">
<div id="footer_content">

<p class="footer_text footer_nav" style="margin-bottom: 1em !important;"><a href="about.html" id="metadata.menuItem1.value" style="padding-left: 0 !important;">WHO IS</a>  <a href="galleryindex.php" id="metadata.menuItem2.value">PORTFOLIO</a>  <a href="royal.html" id="metadata.menuItem3.value">ROYAL</a>  <a href="interact.html"  id="metadata.menuItem4.value">INTERACT</a>  <a href="contact.html" id="metadata.menuItem5.value">CONTACT</a>  <a href="http://www.mosthigh.dk" target="_blank">MASTER PRINTS  <img src="resources/brogaard/arrowout.gif"  align="absbottom"  alt="Go to our art gallery - link opens in new window"  /></a><a href="login.html" id="metadata.contact.value" style="padding-right: 0 !important;">LOGIN</a></p><p class="footer_text">STEEN BROGAARD  | CELLPH.: +45 4057 8090 | ALL RIGHTS RESERVED 1984-2010</p>

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