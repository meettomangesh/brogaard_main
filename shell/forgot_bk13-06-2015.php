<?php 

// localhost url
//$siteurl = "http://".$_SERVER['HTTP_HOST']."/brogaard_web/";
//server url
$siteurl = "http://".$_SERVER['HTTP_HOST']."/";
	global $siteurl;
	
	// Load system configuration 
	require_once(dirname(__FILE__) . '/' . "auth.php");
	
	//COOKIES and SESSION check 
	// This should be placed so system can recognize cookie
	checkSession();
	
	if ( isset($_SESSION['redirect']) ) { 
		redirect_to($_SESSION['redirect']);
	}
		
	@include DIR_USER."new-site-header.php";
?>
<script type="text/javascript">
  /* Set onLoad focus to id="email" */
  function focus_textbox(){ setTimeout( function(){ try{ d = document.getElementById('email'); d.focus(); d.select(); } catch(e){} }, 200); } 
  focus_textbox();
</script>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7, IE=9" />
    
<link rel="shortcut icon" type="image/ico" href="img/favicon.ico" />



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



<link rel="shortcut icon" type="image/ico" href="contact-us/assets/img/favicon.ico" />

	<!--CSS Styles-->	
	<link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>assets/css/vendors/font-awesome.min.css"> 
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
	.wrapper.boxstyle {
			  margin-top: 200px!important;
			}
 .comment-active .submit-button:hover {background: rgba(235,30,41,1);
background: -moz-linear-gradient(top, rgba(235,30,41,1) 0%, rgba(163,10,17,1) 100%);
background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(235,30,41,1)), color-stop(100%, rgba(163,10,17,1)));
background: -webkit-linear-gradient(top, rgba(235,30,41,1) 0%, rgba(163,10,17,1) 100%);
background: -o-linear-gradient(top, rgba(235,30,41,1) 0%, rgba(163,10,17,1) 100%);
background: -ms-linear-gradient(top, rgba(235,30,41,1) 0%, rgba(163,10,17,1) 100%);
background: linear-gradient(to bottom, rgba(235,30,41,1) 0%, rgba(163,10,17,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#eb1e29', endColorstr='#a30a11', GradientType=0 );}
 input[type='checkbox']{      
   background-image: url('../images/checkbox_sprite.png'); 
   background-repeat: no-repeat;
   background-position: 0px -17px;
   background-size:16px 32px;
   width: 16px;
   height: 16px;
   margin: 0;
   padding: 0;
   -moz-appearance: none; /* not working */
   -webkit-appearance: none;
   -ms-appearance: none; /*not working */
   -o-appearance: none;
   appearance: none;
}
/* not checked */

input[type='checkbox']:checked { background-position: 0 0; }
/*input[type='checkbox']:hover:checked, 
input[type='checkbox']:focus:checked { background-position: 0 -25px; }

/* focus *
input[type='checkbox']:hover,
input[type='checkbox']:focus { background-position: 0 -25px; }

/* active *
input[type='checkbox']:active { background-position: 0 -48px; }

input[type='checkbox']:active:checked { background-position: -16px -48px; }

/* disabled *
input[type='checkbox']:disabled { background-position: 0 -32px; }

input[type='checkbox']:disabled:checked { background-position: -16px -32px; }

input[type='checkbox']:hover:disabled,
input[type='checkbox']:focus:disabled { background-position: 0 -32px; }

input[type='checkbox']:hover:disabled:checked ,
input[type='checkbox']:focus:disabled:checked { background-position: -16px -32px; }*/


/*label{
 background:url(images/checkbox_sprite.png) top left no-repeat;
 
}*/ 
    input[type=text]:focus, input[type=password]:focus, textarea:focus {
	-webkit-box-shadow: 0 0 0!important;
	-moz-box-shadow: 0 0 0!important;
	box-shadow: 0 0 0!important;
	}
	input[type=password] {
   background-image: none!important;}
   .messageboxerror{padding: 5px!important;top: 9px!important;}
  .login-heading{  width: 32%;float: none; margin: 0 auto;}
  .login-heading span{ margin-left:30px; float:left; font-size:24px; color:#333; font-family: 'PT Sans', sans-serif; font-weight:bold; margin-top: -7px;}
  #lg{float:left;margin-top: -12px;}
  #lg-msg{width: 43.7%;float: none;margin: 0 auto ;background: rgba(0,0,0,0.5);padding-left: 31px; z-index:9999;}/*1% 29%*/
  .comment-fieldbox.l-c-w{color:#fff; margin-top:24px; }
  .mt-20{margin-top:20px;float: left;
  width: 100%;}
  .mt-20 a{float:left; color:#fff;display:inline; margin:2px 5px;}
  .mt-20 a.lb{left-border:1px solid #333;}
  .comment-fieldbox input{width: 100%!important; z-index:50; border-radius:0px!important;}
  .comment-active {
  margin-top: 10px;
  overflow: hidden;
  float: left;
  width: 100%;}
  #watermark{ z-index:1!important;top: 38%;left: 43%; opacity: 0.3;}
  .container.background.backimage1{height:100%!important;}
  @media screen and (max-width:956px){
	  #lg-msg{width: 58%!important;float: left; margin: 1% 21%; z-index:50;}
	  .login-heading{width:31%!important;}
	  }
@media screen and (max-width:768px) {
		.comment-fieldbox input{width: 92%!important;} 
		 #lg-msg{width: 60%!important;float: left; margin: 1% 22%;}
		 #watermark {
	  top: 40%!important;
	  left: 39%!important;
	} 
		  }
		  @media only screen and (max-width:719px){
			  #lg-msg{width: 100%!important;float: left; margin: 1% 0%!important;} .wrapper.boxstyle { margin-top: 77px!important;}
			  .container.background.backimage1{/*background: url(./images/login_bg_small.jpg) top center no-repeat;*/height:100%!important;}

}
		  @media screen and (max-width:600px) {
			  body{height:100%;}
		.comment-fieldbox input{width: 92%!important;font-size: 13px;} 
		 #lg-msg{width: 100%!important;float: left; margin: 1% 0%!important;}
		 .wrapper.boxstyle { margin-top: 55px;}
		 .l-c-w{font-size:14px;} 
		 #watermark {
			  top: 40%!important;
			  left: 35%!important;
			} 
		  }
		  @media screen and (max-width:640px) {#watermark {
			  top: 39%!important;
			  left: 35%!important;
			} }
		  @media screen and (max-width:568px) {.container.background.backimage1{height:550px!important;}#watermark {
  top: 37%!important;
  left: 34%!important;
}}
		  @media screen and (max-width:520px) { #lg-msg{width: 100%!important;float: left; margin: 1% 0%!important;} .box-container {padding: 10px!important;} }
		   @media screen and (max-width:480px) { 
		      #lg-msg{padding-left:18px!important;} .container.background.backimage1{height:500px!important;}#watermark {top: 36%!important;left: 30%!important;}
		  }
		  
		  @media screen and (max-width:360px){#watermark {top: 39%!important;left: 22%!important;}}
		  @media screen and (max-width: 320px){
           #lg-msg { width: 100%!important;float: left;margin: 1% 1%; z-index:50;}
		   .container.background.backimage1 {
			  min-height: 570px!important;}
			  .wrapper.boxstyle {
			  margin-top: 54px!important;
			}
			.box-container {
			  padding: 0px!important;
			}
			#watermark {
			  top: 35%!important;
			  left: 19%!important;
			}
         }
  </style>         
 <!-- <style>
  
  .login-heading{  width: 32%;float: none; margin: 0 auto;}
  .login-heading span{ margin-left:30px; float:left; font-size:24px; color:#333; font-family:"Lucida Grande", "Helvetica Neue", "Helvetica", "Arial", "Verdana", "sans-serif","Myriad Set Pro"; font-weight:bold; margin-top: -7px;}
  #lg{float:left;margin-top: -12px;}
  #lg-msg{width: 43.7%;float: none;margin: 0 auto ;background: rgba(0,0,0,0.5);padding-left: 31px;}/*1% 29%*/
  .l-c-w{color:#fff; margin-top:24px;}
  .mt-20{margin-top:20px;float: left;
  width: 100%;}
  .mt-20 a{float:left; color:#fff;display:inline; margin:2px 10px;}
  .mt-20 a.lb{left-border:1px solid #333;}
  .comment-fieldbox input{width: 100%!important;}
  @media screen and (max-width:956px){
	  #lg-msg{width: 58%!important;float: left; margin: 1% 21%;}
	  .login-heading{width:31%!important;}
	  }
@media screen and (max-width:768px) {
		.comment-fieldbox input{width: 92%!important;} 
		 #lg-msg{width: 60%!important;float: left; margin: 1% 22%;} 
		  }
		  @media screen and (max-width:600px) {
		.comment-fieldbox input{width: 92%!important;font-size: 13px;} 
		 #lg-msg{width: 60%!important;float: left; margin: 1% 22%;}
		 .wrapper.boxstyle { margin-top: 55px;}
		 .l-c-w{font-size:14px;} 
		  }
		   @media screen and (max-width:480px) {
		 
		 #lg-msg{padding-left:18px!important} 
		 
		  }
		  @media screen and (max-width: 320px){
           #lg-msg { width: 100%!important;float: left;margin: 1% 1%;}
}
  </style>  -->       
</head>


<body style="background:url(../images/68.jpg) 20% center no-repeat;">

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

           
              <?php include("../includes/brogaard_menu.php");?>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </div>

	
   
    </header>
    <!--Header End-->
    
        	<div class="container background  " style="height:100%;" ><!--backimage1-->
    	         
        <!--All Content Start-->
          <div id="watermark"><img src="<?php echo $siteurl;?>images/icon.png"></div>
        <div class="wrapper boxstyle" style="background:transperent;" >
                   
           <!--Blog Lists and Sidebar-->
            <section class="box-container" style="padding: 40px 35px 40px 35px;background: rgba(255,255,255,0.01); z-index:999;">
            
               <div class="contact-area">
             <!--  <div class="login-heading">
                 <img id="lg" src="contact-us/assets/img/logo.png"> <span>Be A Member </span>
               </div>-->
                
                	<!--Send Message Start-->
                    
                    <div id="lg-msg"> 
                     <div class="send-message" >
                    	<!--<h2>Be A Member</h2>-->
                        <div class="comment-fieldbox" style="margin-bottom:20px;">
                             <form method="post" action="" id="forgot-form">
                               
                                <input id="email" class="input-email" type="text" name="email" placeholder="Email Address" required />
                             
                                                               
                                <div class="comment-active" style="padding:0px 5px;">
                                  
                                    <input style="float:left;z-index:9999; width:100%; border-radius:5px!important;" id="email_submit" class="submit-button" type="submit" value="<?php echo lang('send'); ?>"/>
                                </div>
                               
                                
                                <!--<p>--><span id="msgbox" style="display:none"></span><!--</p>-->
                            </form>
                            <p class="mt-20">
                                <a style="color:#fff;font-weight:500;" href="<?php echo URL_USER; ?>login.php"> Click here to login <?php //echo lang('click_here_to_login'); ?> </a> 
                            </p>
                         </div>
                     </div>
                    </div>
                    
                    
                    <!--Send Message End-->
                    
                    <!--Contact Info Start-->
                   
              
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
<script type="text/javascript" src="<?php echo $siteurl;?>megafolio/fancybox/jquery.fancybox.pack62ba.js?v=2.1.3"></script>

<!-- Optionally add helpers - button, thumbnail and/or media ONLY FOR ADVANCED USAGE-->
<script type="text/javascript" src="<?php echo $siteurl;?>megafolio/fancybox/helpers/jquery.fancybox-media3447.js?v=1.0.5"></script>

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
