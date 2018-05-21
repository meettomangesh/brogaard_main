<?php
$menupath='contact';
require_once(dirname(__FILE__) . '/' . "auth.php");
checkSession();
	include("../includes/server_config.php"); 
	include("../database/connection.php");
?>
<!--<script type="text/javascript">
 
  function focus_textbox(){ setTimeout( function(){ try{ d = document.getElementById('name'); d.focus(); d.select(); } catch(e){} }, 200); } 
  focus_textbox();
</script>
-->
<?php

	include ("../includes/brogaard_home.php");
?>
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
            
 <style>
.contact-details p{margin-bottom:15px;}
.social{width:30px; z-index:99999; position:fixed; right:2px; top:35%;}
.social a {display:block; margin:12px 0;width:30px; padding:7px 0; border-radius:15px; background:#696969; text-align:center; vertical-align:middle;}
.social a i{/*width:22px; height:22px;*/ color:#fff; font-size:17px;}
.social a:hover{ background:#fff;}
.social a:hover i{color:#BF191F;}
 </style>          
</head>

<body>

<!--Header Start-->
<header>

			 <!-- new menu added -->
			 <div class="navbar navbar-custom navbar-fixed-top" style="opacity:0.9 !important;">
          		 <?php include("../includes/menu.php");?>
            </div>
			 <!-- new menu close -->	
   
    </header>
    <!--Header End-->
    
        	<div class="container1" style="height:100%;">
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
        
            
	</div>
<div class="social" >
<a href="http://www.facebook.com/brogaard" target="_blank"><i class="fa fa-facebook"></i></a>
<a href="http://twitter.com/brogaard" target="_blank"><i class="fa fa-twitter"></i></a>
<a href="http://dk.linkedin.com/pub/steen-brogaard/0/8a9/123" target="_blank"><i class="fa fa-linkedin"></i></a>
<a href="mailto: steen@brogaard.com" target="_blank"><i class="fa fa-envelope"></i></a>
<a href="http://www.brogaard.com/shell/news-rss.php" target="_blank"><i class="fa fa-rss"></i></a>
<a href="http://c.itunes.apple.com/dk/profile/id100602089?l=da" target="_blank"><i class="fa fa-music"></i></a>
</div>   

<script type="text/javascript" src="<?php echo $siteurl;?>js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<?php echo $siteurl;?>js/jquery-easing-1.3.js"></script>

<!--Flexy Menu Script-->
<script type="text/javascript" src="<?php echo $siteurl;?>js/flexy-menu.js"></script>


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
     <script src="<?php echo $siteurl;?>js/vendor/modernizr-2.6.2.min.js"></script>
 	<script type="text/javascript" src="<?php echo $siteurl;?>js/jquery.min.js"></script>
 	
   	<!-- /javascript Plugins-->
<?php include ("../includes/brogaard_footer.php"); ?>

   	
</body>
</html>