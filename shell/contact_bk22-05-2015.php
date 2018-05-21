<!--<div id="google_translate_element"></div><script>
function googleTranslateElementInit() {
  new google.translate.TranslateElement({
    pageLanguage: 'da', 
    gaTrack: true,
    gaId: 'UA-11542948-1',
    layout: google.translate.TranslateElement.InlineLayout.SIMPLE
  }, 'google_translate_element');
}
</script><script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>-->
<?php
// localhost url
//$siteurl = "http://".$_SERVER['HTTP_HOST']."/brogaard_web/";
//server url
$siteurl = "http://".$_SERVER['HTTP_HOST']."/";
	global $siteurl;

require_once(dirname(__FILE__) . '/' . "auth.php");
checkSession();
?>
<script type="text/javascript">
 
  function focus_textbox(){ setTimeout( function(){ try{ d = document.getElementById('name'); d.focus(); d.select(); } catch(e){} }, 200); } 
  focus_textbox();
</script>

<?php

	// GET PHP MARKDOWN
	include_once 'pages-resources/php/markdown.php';

	// SETUP FRAGMENTS
	function includeFragment($fragmentName, $markdown=true) {

		$fullPath = 'fragments/'.$fragmentName.'.html';

		if (file_exists($fullPath)) {
			$contents = file_get_contents($fullPath);

			if ($markdown)
			$contents = Markdown($contents);

			echo $contents;
		}
	}

	// GET FRAGMENT
	includefragment('contact');
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7, IE=9" />
    
<link rel="shortcut icon" type="image/ico" href="<?php echo $siteurl;?>assets/img/favicon.ico" />



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
	<link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>assets/css/vendors/bootstrap.css" >
	<link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>assets/css/vendors/Pe-icon-7-stroke.css">
    <link href="<?php echo $siteurl;?>css/stylemenu.css" rel="stylesheet">
    
	<!--<link rel="stylesheet" type="text/css" href="<?php// echo $siteurl;?>css/default.css" />
	<link rel="stylesheet" type="text/css" href="<?php// echo $siteurl;?>css/component.css" />-->
	<!--/CSS Styles-->
	
	<!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
    <!-- /Mobile Specific Metas --> 


	<!-- Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=PT+Sans:100,200,300,400,700,400italic,700italic' rel='stylesheet' type='text/css'>

 
 <script src="<?php echo $siteurl;?>js/vendor/modernizr-2.6.2.min.js"></script>
 <script type="text/javascript" src="<?php echo $siteurl;?>js/jquery.min.js"></script>
 
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
            
 <style>
.contact-details p{margin-bottom:15px;}
 </style>          
</head>

<body>

<!--Header Start-->
<header>

 <div class="navbar navbar-custom navbar-fixed-top" role="navigation" style="background:rgb(105,105,105)!important; opacity:0.9 !important;">
 
        <div class="container1" style="background:rgb(105,105,105)!important;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse" style="font-size:1.5em;">
                    <i class="fa fa-bars"></i>   
                </button>
                <a class="navbar-brand" href="../index.php">
                
                
                    <img src="<?php echo $siteurl;?>assets/img/logo.png">
                </a>
            </div>

           
            <div class="collapse navbar-collapse navbar-left navbar-main-collapse">
            <ul class="nav navbar-nav">
            	 
				 <li><a href="http://www.brogaard.com/portfolio/index.php">Portfolio</a></li>
				<li><a href="http://www.brogaard.com/shell/info.php">Royal</a></li>
				<li><a href="http://www.brogaard.com/shell/about.php">Scrapbook</a></li>
				<li><a href="http://www.brogaard.com/shell/services.php">Services</a></li>
				<li><a href="http://www.brogaard.com/shell/contact.php">Contact</a></li>
				<li><a href="http://www.brogaard.com/shell/login.php">Login</a></li>
                
                
                <!--<li id="sb-search" class="sb-search">  
                	<form class='form-search' method='post' id='searchform' action='index.php'>
                    <input type='hidden' name='page'  value='http://www.brogaard.com/shell/galleryindex.php'>
					<input class="sb-search-input" placeholder="Search..."  type="text" value="" name="search" id="search" onFocus="clearcontent()">
					<input class="sb-search-submit" type="submit" value="" style="cursor:pointer" />
					<span class="sb-icon-search"></span>
					</form>
                </li>-->
	       			
      		</ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </div>

	
   
    </header>
    <!--Header End-->
    
        	<div class="container" style="height:100%;">
    	         <iframe id="bgmap" src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d4497.609012822338!2d12.6096715!3d55.692386500000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sRefshalevej+169+A%2C+1.+DK+-+1432+Cph.+K!5e0!3m2!1sen!2sin!4v1430109479005"  frameborder="0" ></iframe>
        <!--All Content Start-->
         <div id="watermark"><img src="<?php echo $siteurl;?>images/icon.png"></div>
        <div class="wrapper boxstyle map-holder" >
                   
           <!--Blog Lists and Sidebar-->
            <section class="box-container" style="padding: 0px 35px 5px 35px;background: rgba(83,83,83,0.8);">
            
               <div class="contact-area">
                
                	<!--Send Message Start-->
                	<div class="send-message">
                    	<h2>send a message</h2>
                        <div class="comment-fieldbox">
                        <!--./pages-resources/php/formtoeamil_new.php-->
                        	                                            
                            <form action="./pages-resources/php/contact_sub.php" method="post" data-toggle="validator" role="form">
                                <input id="name" class="input-name" type="text" name="name" placeholder="Your name " required />
                                <input id="email" class="input-email" type="email" name="email" placeholder="Your email" data-error="Bruh, that email address is invalid" required/>
                                <input id="telefon" class="input-phone" type="text" name="telefon" placeholder="Phone No *" required />
                                <textarea id="besked" class="input-textarea" name="besked" placeholder="Message" required></textarea>
                                <div class="comment-active">
                                    <!--<span>All fields are mandatory.</span>-->
                                    <input class="submit-button" type="submit" value="SEND MESSAGE" style="border-radius:5px; !important"/>
                                </div>
                                <div class="email_success">
                                    <div id="reply_message" class="email_loading" ></div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--Send Message End-->
                    
                    <!--Contact Info Start-->
                    <div class="contact-info">
                    	<h2>contact information</h2>
                        
                        <!--Contact Details-->
                        <div class="contact-details">
                        	<ul>
                            	<li><!--address:--> <p style="font-family:Verdana; font-size:13px;">STUDIOS: 

 

<p style="font-size:12px !important; font-weight:600;">Refshalevej 169A, 1.<br/>

DK- 1432 Cph. K<!--<br/><br/>--></p>

 
<p style="font-size:12px !important">
Sturlasgade 10 B, 1.<br/>

DK - 2300 Cph. S</p>   <!--<span>Refshalevej 169 A, 1. DK - 1432 Cph. K</span> <br><span>Sturlasgade 10 B, 1.
DK - 2300 Cph. S</span>--></li>
                                <li>phone: <span>+45 4057 8090</span></li>
                                <li>email: <span><a style="color:#fff;" href="mailto:INFO@BROGAARD.COM">INFO@BROGAARD.COM</a> </span></li>
                            </ul>
                        </div>
                        
                        <!--Text Area-->
                        <div class="contact-textarea">
                            <figure>
                            	<img src="<?php echo $siteurl;?>images/steen-contact.jpg" alt="contact info" />
                            </figure>
                            <p style="font-family:Verdana; font-size:13;"> Vi fotograferer både på Refshaleøen og på Bryggen - alt efter opgavens karakter og pres på studierne. Gode parkeringsmuligheder begge steder - men sjovest  er det at tage havnebussen
                            <!--STUDIOS: <br/><br/>

 

<b style="font-size:12px !important">Refshalevej 169A, 1.<br/>

DK- 1432 Cph. K<br/><br/></b>

 
<span style="font-size:12 !important">
Sturlasgade 10 B, 1.<br/>

DK - 2300 Cph. S</span>--></p>                      
                        </div>
                        
                    </div>
                    <!--Contact Info End-->
                    
                </div>
              
            </section>
            <!--Blog Lists and Sidebar End-->

        </div>
        
        <!--All Content End-->
           
        <!--Footer Start--
        <footer>
            
            <!--Footer Bottom--
            <section class="footer-bottom">
            	<div class="wrapper">
                	<div class="copyright">
                        Copyright © All Rights Reserved. <a href="#">yourdomain.com</a>
                    </div>
                    <nav>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><a href="about-us.html">About Us</a></li>
                            <li><a href="portfolio-fullwidth.html">Portfolio</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                        </ul>
                    </nav>
                </div>
            </section>
            <!--Footer Bottom End--
            
        </footer>
        <!--Footer End-->
    
	</div>
    

<script type="text/javascript" src="<?php echo $siteurl;?>js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<?php echo $siteurl;?>js/jquery-easing-1.3.js"></script>

<!--Flexy Menu Script-->
<script type="text/javascript" src="<?php echo $siteurl;?>js/flexy-menu.js"></script>

<!-- THE FANYCYBOX ASSETS -->
<!--<script type="text/javascript" src="megafolio/fancybox/jquery.fancybox.pack62ba.js?v=2.1.3"></script>-->

<!-- Optionally add helpers - button, thumbnail and/or media ONLY FOR ADVANCED USAGE-->
<!--<script type="text/javascript" src="megafolio/fancybox/helpers/jquery.fancybox-media3447.js?v=1.0.5"></script>-->

<script type="text/javascript">
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
</script>
        
    <!-- /javascript Plugins-->    
    <script type="text/javascript" src="<?php echo $siteurl;?>assets/js/vendors/bootstrap.min.js"></script>
    <script src="<?php echo $siteurl;?>js/classie.js"></script>
	<script src="<?php echo $siteurl;?>js/uisearch.js"></script>
	<script>
		new UISearch( document.getElementById( 'sb-search' ) );
	</script>

	<!-- /javascript Plugins-->


   	
</body>
</html>