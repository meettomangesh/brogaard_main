<?php
require_once(dirname(__FILE__) . '/' . "auth.php");
checkSession();
include("../includes/server_config.php"); 
include("../database/connection.php");

@include DIR_USER."new-site-header.php";

// #################
// IF form submitted
if (array_key_exists('submit', $_POST)) // process the script only if the form has been submitted -> OME
{ 
	foreach ($_POST as $key => $value) { $$key = addslashes(trim($value)); }

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

	if (!preg_match("|^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$|i", $email_address)) {
	$error = true;
	$errormessage[] = 'Your email is not valid.';
	}

	$emailcount = mysql_result(mysql_query("SELECT COUNT(id) FROM ".TBL_AUTHORIZE_NEW." WHERE email='".clean_mysql($email_address)."'"),0); 
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

	$usernamecount = mysql_result(mysql_query("SELECT COUNT(id) FROM ".TBL_AUTHORIZE_NEW." WHERE username='".clean_mysql($username)."'"),0);
	if ($usernamecount > 0) {
	$error = true;
	$errormessage[] = 'Username is in use.';
	}

	if ($error == false) {

	$adminemail = 'steen@brogaard.com';
	$Nameedit = "brogaard.com";
	$frommailedit = "noreply@brogaard.com";
	$subjectedit = "New user registration - Herluf";
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
                              'redirect' => 'http://www.brogaard.com/clientarea/Herluf-intern',
                              'date_created' => $todaydate,
                              'royalaccess' => '0',
                              'activationkey' => $activationkey);

	$sql = sprintf('INSERT INTO %s (%s) VALUES ("%s")', TBL_AUTHORIZE_NEW, implode(', ', array_map('mysql_escape_string', array_keys($sql_data_array))), implode('", "',array_map('mysql_escape_string', $sql_data_array)));
	$result = mysql_query($sql) or die ("Error in query: $sql. ".mysql_error());
	$insertid = mysql_insert_id();

	$sql2 = "UPDATE ".TBL_AUTHORIZE_NEW." SET password = password('$password') WHERE id='".(int)$insertid."'";
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
.aboutus-content p{font-size:15px;font-family:"Lucida Grande", "Helvetica Neue", "Helvetica", "Arial", "Verdana", "sans-serif","Myriad Set Pro";}
.aboutus-content a{color:#e8e8e8; text-decoration:underline;}
.aboutus-content a:hover{color:#C00;}
.star_red{color:#C00;padding-right: 7px;padding-top: 3px;float: left;}
.m-t-b-40{margin: 40px auto;width: 100%;}
.checkbox input[type="checkbox"] {
  width: 16px!important;
  height: 16px!important;
}
 input[type='checkbox']{      
   background-image: url('../images/checkbox_sprite.png'); 
   background-repeat: no-repeat;
   background-position: 0px -18px;
   /*background-size:16px 32px;*/
   width: 16px;
   height: 16px;
   margin: 0;
   padding: 0;
   -moz-appearance: none; /* not working */
   -webkit-appearance: none;
   -ms-appearance: none; /*not working */
   -o-appearance: none;
   appearance: none;
   background-color:transparent;
   border:0;
}
/* not checked */

input[type='checkbox']:checked { background-position: 0 0; }
 input[type='radio']{      
   background-image: url('../images/radio_sprite.png'); 
   background-repeat: no-repeat;
   background-position: 0px -17px;
   background-size:16px 33px;
   width: 16px;
   height: 16px;
   margin: 0;
   padding: 0;
   background-color:transparent;
   border:0;
   -moz-appearance: none; /* not working */
   -webkit-appearance: none;
   -ms-appearance: none; /*not working */
   -o-appearance: none;
   appearance: none;
}
/* not checked */
#comp{width:100%; float:left; display:none;}
input[type='radio']:checked { background-position: 0 0; }
 input[type=text]:focus, input[type=password]:focus, textarea:focus {
	-webkit-box-shadow: 0 0 0!important;
	-moz-box-shadow: 0 0 0!important;
	box-shadow: 0 0 0!important;
	}
	input[type=password] {
   background-image: none!important;}
   .send-message{padding-right:0px!important}
   .rdio-group{width:100%; float:left; margin-top:15px;}
   .rdio-group span{float:left;margin: 10px 10px 0 10px; font-size:17px;}
   .rdio-group .radio{float:left; width:12%;}
   .rdio-group .radio lable{font-size:17px; font-family:"Lucida Grande", "Helvetica Neue", "Helvetica", "Arial", "Verdana", "sans-serif","Myriad Set Pro";}
   .radio + .radio{margin-top: 10px; }
   .checkbox{float:left;margin-top:15px!important;/*margin-left: 8px;*/ width:100%;padding-left: 10px!important;}
   .comment-active{width:100%; float:left; margin-top:-3px !important;}
   .form-div{width:78%; float:left;}
   h3,h4{font-family:"Lucida Grande", "Helvetica Neue", "Helvetica", "Arial", "Verdana", "sans-serif","Myriad Set Pro";}
   .checkbox input[type="checkbox"]#custom, .checkbox input[type="checkbox"]#sply{
	   margin-top: -17px;
	   }
	input[type="text"]#Cname{width:36%;}
	select#dd, select#mm, select#yy{width: 8%;margin-top: 0px!important;margin: 0 10px;}
	select#best{width: 15%;margin-top: 0px!important;margin: 0 10px;}
	.comment-fieldbox textarea.input-textarea{width:36%; }
	.box{display:none;}
	 input[type='file']{background-color:transparent; border:0;margin-top:0!important; color:#E8E8E8;margin: 12px 0!important;height: 22px;width: 52%;padding:0!important;}
	 .regi,.atract{float:left;width:80%;}
   @media screen and (max-width:1024px){.rdio-group .radio {float: left;width: 16%;}.regi, .atract {float: left;width: 74%;}}
   @media screen and (max-width:768px){.form-div {width: 93%;}input[type="text"]#Cname {width: 40%;}.comment-fieldbox textarea.input-textarea {width: 41%;height:105px;}select#best {width: 21%;}.pic{float: left;width: 69%;} input[type='file'] {width: 52%;}.rdio-group .radio {float: left;width: 19%;}.regi, .atract {float: left;width: 71%;}}
   @media screen and (max-width:640px) {.rdio-group .radio {float: left;width: 33%;}.form-div {width: 100%;}input[type="text"]#Cname {width: 50%;}.comment-fieldbox textarea.input-textarea { width: 52%!important;height: 85px;}select#dd, select#mm, select#yy {width: 14%;}select#best{width: 28%;}input[type='file']{width: 60%;}.regi{float: left;width: 58%;}.atract {float: left;width: 63%!important;}}
   @media screen and (max-width:600px){ input[type='radio']{ {width: 16px!important;}.comment-fieldbox input{width:99%!important;}.comment-fieldbox textarea.input-textarea { width: 52%!important;height: 85px;}}
    @media screen and (max-width:480px){.comment-fieldbox input{width: 79%;}.regi {float: left;width: 52%;}.rdio-group .radio {float: left; width: 52%!important;} input[type='radio']{width:16px!important;}.rdio-group #g1,.rdio-group #g2{width:19%!important;}input[type="text"]#Cname {
  width: 59%!important;}select#best {width: 33%;}.bd{float: left;width: 58%;}select#dd, select#mm, select#yy {width: 55%;margin: 10px 0px;}}
  @media screen and (max-width: 320px){.rdio-group .radio { float: left;width: 76%!important;}input[type="text"]#Cname {width: 85%!important;}.comment-fieldbox textarea.input-textarea {width: 87%!important;height: 77px;}.comment-fieldbox input { width: 95%;}.rdio-group #g1, .rdio-group #g2 {width: 32%!important;}}
  
  
   </style> 
  rdio-group
     <script type="text/javascript">
        $(document).ready(function() {
        $('input[type="radio"]').click(function(){
            if($(this).attr("value")=="company"){
                $(".box").hide();
                $("#comp").show();
            }
            if($(this).attr("value")=="mod"){
                $(".box").hide();
                $("#model").show();
            }
			if($(this).attr("value")=="private"){
                $("#comp").hide();
                $("#model").hide();
            }
            
        });
    });
    </script>
         
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
    	         
        <div class="wrapper boxstyle" style="background: rgba(0,0,0,0.4); border-radius:5px;">
                   
           <!--Blog Lists and Sidebar-->
            <section class="box-container" style="background:none !important;">
            
               <div  class="aboutus-content">
               <!--<p class="lineTitle1">--> <h2>EXCLUSIVE HERLUFSHOLM PHOTO BLOG</h2><!--</p>-->
                   <!-- <p>&nbsp;</p>-->
                  
                    <p>To access Herlufsholm PHOTO BLOG you must first register as a user.</p>
                    <p>The pictures are reserved for current or former students, employees or famiie to students at Herlufholm School and goods.<br> 
Photos found on these pages frikøbes for private use.</p>
                   <p>Are you a student at Herlufsholm? Please note that your Herlufsholm-mail expire when you are no longer a student at the school.<br> 
Then you do not receive the newsletter and your account with us will be deleted.<br> 
To guard against this, you should register with another email address.</p>
                    <p>You can change your email address, password and other information when you are logged - click on "Your Account".</p>
                   
                        
                       <p> <a href="<?php echo URL_USER; ?>login.php">Already have an account? - Click here</a></p>
                    
                    
                    
                   <div class="contact-area">
                
                	<!--Send Message Start-->
                	                	
                        <div class="comment-fieldbox" >
                        <!--./pages-resources/php/formtoeamil_new.php-->
                        	                          <span style='color:#F00 !important;'> <?php echo ( isset($errormsg)?$errormsg:'' ); ?>     </span>            
                            <!--<form action="./pages-resources/php/services.php" method="post" data-toggle="validator" role="form">-->
                            <form method="post" action="">
                            <div class="form-div">
                                <input id="name" class="input-email" type="text" name="firstname" placeholder="<?php echo lang('first_name'); ?> * " value="<?php echo ( isset($firstname)?$firstname:'' ); ?>" required>
                                <input class="input-phone" type="text" name="lastname" id="lastname" value="<?php echo ( isset($lastname)?$lastname:'' ); ?>" placeholder="<?php echo lang('last_name'); ?> *" >
                                 <input id="email_address" class="input-email" type="email" name="email_address" value="<?php echo ( isset($email_address)?$email_address:'' ); ?>" placeholder=" <?php echo lang('email'); ?> *" data-error="Bruh, that email address is invalid" required>
                                  <input id="reemail_address" class="input-email" type="email" name="reemail_address" value="<?php echo ( isset($reemail_address)?$reemail_address:'' ); ?>" placeholder=" <?php echo lang('email_repeat'); ?>  *" data-error="Bruh, that email address is invalid" required>
                                 <input id="username" class="input-email" type="text" name="username" value="<?php echo ( isset($username)?$username:'' ); ?>" placeholder="<?php echo lang('username'); ?> *" required />
                             
                                <input id="password" class="input-email" type="password" name="password" value="" placeholder=" <?php echo lang('password'); ?> *" required />
                                
                                 <input id="repassword" class="input-phone" type="password" name="repassword" placeholder="<?php echo lang('password_repeat'); ?> *" required>
                                 
                                 
                                 
                               </div>
                                                            
                                 <div class="checkbox">
                                   <label> <input type="checkbox" id="newsletter" checked="checked" name="newsletter" value="Yes"><?php echo lang('join_newsletter'); ?></label>
                                  </div>                                
                                  <div class="comment-active">
                                    <!--<span>All fields are mandatory.</span>-->
                                    <input class="submit-button" type="submit" name="submit" id="submit" value="<?php echo lang('register'); ?>" style="border-radius:5px; !important">
                                </div>
                                
                            </form>
                        </div>
                   
                    <!--Send Message End-->
                   <p>You only receive automatic updates on new images in Herlufsholm folder if Newsletter box is selected. To use and register with this website you must agree to our<a href="http://www.brogaard.com/shell/term.php"> Terms of Use</a> and <a href="http://www.brogaard.com/shell/policy.php">Privacy Policy</a> .</p>
                   <p>Please make surethat you to have read and UNDERSTOOD disse before registering. <br>In particular, we vil record and use your details to send you our newsletter by email UNLESS you untick the 'Get newsletter' box.</p>
                    
                </div>         
                    
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
    <script src="<?php echo $siteurl;?>js/vendor/modernizr-2.6.2.min.js"></script>
 	<script type="text/javascript" src="<?php echo $siteurl;?>js/jquery.min.js"></script>
  
	<!-- /javascript Plugins-->
   	<?php include ("../includes/brogaard_footer.php"); ?>
</body>
</html>
