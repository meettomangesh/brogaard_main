<?php
require_once(dirname(__FILE__) . '/' . "auth.php");
checkSession();
include("../includes/server_config.php"); 
include("../database/connection.php");
include ("../includes/brogaard_head.php");
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
.aboutus-content p{font-size:15px; font-family: 'PT Sans', sans-serif;}
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
    
        	<div class="container1 background" style="background:#fff;">
    	         
        <div class="wrapper boxstyle" style="background: rgba(0,0,0,0.5);">
                   
           <!--Blog Lists and Sidebar-->
            <section class="box-container" style="background:none !important;">
            
               <div align="justify" class="aboutus-content" style='font-family: "Lucida Grande", "Helvetica Neue", "Helvetica", "Arial", "Verdana", "sans-serif","Myriad Set Pro";'>
               <p class="lineTitle1"> <h3>Privacy Policy</h3></p>
                   <!-- <p>&nbsp;</p>-->
                    <p>By using this site, you are indicating your agreement to the terms of this policy. If you disagree with any of the terms, then please do not use our site. We reserve the right to alter the terms of this policy at any time. Changes will be notified to you using the email address you provide to us or by an announcement on this site. Your continued use of this site will indicate your agreement to such changes.</p>
                   <p>Art Partner Productions Ltd and any successor operators of our business (&quot;We&quot; and &quot;us&quot; respectively) are conscious of our responsibilities as a &quot;data controller&quot; and will ensure that the information we obtain and use will always be processed and transferred in compliance with all applicable data protection laws and regulation.</p>
                    <p>Our site allows you to provide your personal details to register with us as a user of the site. It also allows you to provide your contact details to enquire about the purchase of art prints. The types of personal information collected on these pages are name; address; e-mail address and phone number, and information on goods and services sold and purchased.</p>
                    <p>Please be aware that we may use your information and share it with and transfer it to our suppliers and other reputable third parties for the following purposes:</p>
                    <p>- to process and administer details of your registration and service your requests from time to time;<br />
                    - to keep you up to date with the development of our site or our business;<br />
                    - to pass your details to our suppliers when you request certain services (for example, art prints);<br />
                    - to conduct market research and to understand better how our service may be improved and made even more useful for you;<br />
                    - to provide you with information about our products, promotions, offers and services which may be of interest to you;<br />
                    - to monitor and record your correspondence and communications with and to us to ensure that we maintain consistently high standards in dealing with your queries and needs; or<br />
                    - to share it for direct marketing purposes with our group companies and reputable third parties whose products and services may be of interest to you.</p>
                   <p>If you would rather we do not use your information in the ways set out above, please let us know by writing to us at the address given below.</p>
                    <p>Our site is hosted in Denmark therefore we may transfer information to and from Denmark to offices in the European Economic Area, the USA or other countries for normal commercial purposes. We may use e-mail to transfer this information; E-mail is not a fully secure method of communication. We will endeavour to comply with the Data Protection Act in respect of such transfers however if you do not consent to such transfers please do not register with our site, contact us or order any art print through our site.</p>
                    <p>We may wish to send you marketing information mentioned above by e-mail. If you do not wish to receive direct marketing by e-mail, please let us know by writing to us at the address give below. In addition, each time we send you marketing information by e-mail we will provide an opportunity for you to unsubscribe from receiving further information from us.</p>
                    <p>Also, if we sell our company or part of it, we will share your information with the purchaser, who may then provide you with information on their products and services.</p>
                    <p>We use &quot;Cookies&quot; in order to personalise your visit to our site and customise our pages for you. We may use the information provided by cookies to analyse trends, administer the site, or for research and marketing purposes to help us better serve you. If you like, you can set your browser to notify you before you receive a cookie so you have the chance to accept it and you can also set your browser to turn off all cookies. The site www.allaboutcookies.org (run by the Interactive Marketing Bureau) contains step-by-step guidance on how cookies can be switched off by users. Registering with our site requires the use of cookies in order to work effectively. If you do not wish these cookies to be used then please do not register with our site as they cannot be turned off for this purpose.</p>
                    <p>Should there be any inaccuracies in the information of which you inform us, or of which we become aware, please let us know and it shall be promptly rectified by us.</p>
                    <p>You have a right to access the personal data we hold about you. If you wish to obtain a copy of this information, please write to us at the details given below enclosing your postal details.</p>
                    <p>Our site may contain links to other sites belonging to third parties. Please make sure when you leave our site that you have read that site's privacy policy. We are not responsible for the content or operation of sites belonging to third parties.</p>
                    <p>If you have any questions regarding this policy, or you wish to update your details or remove your personal data from our records, please contact us at: <u>info@brogaard.com</u></p>
                   <p align="center"><span style="color:#C00">&copy;</span> <b>Copyright Steen Brogaard 2010-<?php echo date("Y"); ?>.</b><span style="color:#C00"> All rights reserved.</span></p>            
                    
                </div>
              
            </section>
            <!--Blog Lists and Sidebar End-->

        </div>
        
          
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
