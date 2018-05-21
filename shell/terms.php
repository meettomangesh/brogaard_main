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
            
               <div align="justify" class="aboutus-content" style='font-family: "Lucida Grande", "Helvetica Neue", "Helvetica", "Arial", "Verdana", "sans-serif","Myriad Set Pro" ;'>
               <p class="lineTitle1"> <h3>Terms of Use</h3></p>
                    <p><b>PLEASE READ THIS STATEMENT CAREFULLY. IF YOU DO NOT WISH TO BE BOUND BY THESE TERMS AND CONDITIONS THEN YOU SHOULD NOT ACCESS THIS SITE. ACCESS OF THIS SITE BY YOU SHALL BE DEEMED TO BE YOUR ACCEPTANCE OF THESE TERMS AND CONDITIONS.</b></p>
                    <p><u><b>Copyright and Trade Marks</b></u></p>
                    <p>Unless otherwise stated, all rights in any information which appears on this site (including the photographs screen displays, the content, the text, graphics and look and feel of the site) belong to Steen Brogaard (&quot;we&quot; or &quot;us&quot;).</p>
                    <p>All trade marks, service marks, company names or logos are the property of their respective holders.</p>
                    <p>Any use by you of these photographs, images, marks, names and logos without express permission may constitute an infringement of the holders' rights.</p>
                    <p><u><b>Use of the site</b></u></p>
                    <p>You may access this site for your own personal non-commercial use only. You may not download and keep or print any part of this site.</p>
                    <p>You may not access any part of this site prohibited by any notice or restriction, or where it is reasonably obvious that such part of the site is meant to be private (e.g. any administration area meant only for our employees).</p>
                    <p>You may only access this site using a normal desktop or mobile web browser or screen reader (or other device for accessibility purposes). You may not access this website for the purposes of 'scraping', aggregating or re-publishing its content or for any reason other than as a private visitor to the site.</p>
                    <p>Without affecting our right to take other action (including legal action), we may suspend or cancel your registration immediately if you do not comply with these terms and conditions.</p>
                    <p>We may take other methods to prevent you from accessing this site if you do not comply with these terms of use but, because of the nature of the internet, your successful ability to access this site should not be taken as our consent to do so other than on these terms and conditions.</p>
                    <p><u><b>Residence</b></u></p>
                    <p>This site is  controlled by us from Denmark. We make no representation that any material contained on this site is appropriate for any other jurisdiction than the Danish. Should you choose to access this site from any location other than Denmark, you are responsible for compliance with all applicable local laws.</p>
                    <p><u><b>Liability</b></u></p>
                    <p>By entering this site, you acknowledge and agree that the use of this site is at your own risk and to the extent permissible by applicable law, in no circumstances, including (but not limited to) negligence, shall we be liable for any direct, indirect, incidental, special, consequential, or punitive damages, losses, costs or expenses nor for any loss of profit that results from the use of, or inability to use this site or any material on any site linked to this site (including but not limited to any viruses or any other errors or defects or failures in computer transmissions or network communications) even if we have been advised of the possibility of such damage. In addition, no liability can be accepted by us in respect of any changes made to the content of this site by unauthorised third parties. All express or implied warranties or representations are excluded to the fullest extent permissible by law. We do not warrant that this site does not infringe any intellectual property rights of third parties.</p>
                    <p>Any software is downloaded at your own risk. If you are in any doubt as to the suitability of the software to be downloaded for your computer it is recommended that you obtain specialist advice before downloading it.</p>
                    <p><u><b>Other Sites/Banners</b></u></p>
                    <p>We are not responsible for the content of any other websites that are linked to or from this site and we excludes all warranties and all liability for any loss or damage you incur as a result of your use of such sites. We will not be responsible for the content of any advertising or sponsorship that may appear on our site nor for compliance of the same with any laws or regulations.</p>
                    <p><u><b>Site availability</b></u></p>
                    <p>To the extent permitted by applicable law, we do not warrant that this site will be available at any time.</p>
                    <p><u><b>Accuracy</b></u></p>
                    <p>The information contained in this site is based on up to date information and while we make all reasonable efforts to ensure that material on this site is correct, current and complete at the date of publication, accuracy cannot be guaranteed. We make no warranties or representations (express or implied) as to its accuracy, currency or completeness. We may change the information at any time without notice. You should take appropriate steps to verify all information on this site before acting upon it.</p>
                    <p><u><b>Amendments</b></u></p>
                    <p>We may update these terms and conditions from time to time and we will notify you of any changes using the e-mail address you gave to us on registration or by an announcement on the web site (at our sole discretion). The changes will apply to the use of the site after such notice. If you use the site after the date on which the changes come into effect, you will be deemed to have accepted the new terms and conditions.</p>
                    <p><u><b>Severability</b></u></p>
                    <p>If any part of these terms and conditions is, at any time, found to be invalid by a court, tribunal or other forum of competent jurisdiction, or otherwise rendered unenforceable, that decision shall not invalidate or void the remainder of these terms and conditions. These terms and conditions shall be deemed amended by modifying or severing such part as necessary to render them valid, legal and enforceable while preserving their intent, or if that is not possible, by substituting another provision that is valid, legal and enforceable that gives equivalent effect to the parties' intent. Any such invalid or unenforceable part or parts shall be severable from these terms and conditions, or the validity of the part(s) in question in any other jurisdiction shall not be affected thereby.</p>
                    <p><u><b>Assignment</b></u></p>
                    <p>You may not assign, sub-license or otherwise transfer any of your rights under these terms and conditions.</p>
                    <p><u><b>Governing Law</b></u></p>
                    <p>These terms and conditions are governed by and shall be construed in accordance with the laws of Denmark. Non-contractual obligations (if any) arising out of or in connection with these terms and conditions (including their formation) shall also be governed by the laws of Denmark.</p>
                    <p>You agree submit to the exclusive jurisdiction of the courts Denmark as regards any claim, dispute or matter (whether contractual or non-contractual) arising out of or in connection with these terms and conditions or any of the documents to be entered into pursuant to this these terms and conditions (including their formation).</p>
                    <p align="center"><span style="color:#C00">&copy;</span> <b>Copyright Steen Brogaard 2010-<?php echo date("Y"); ?>.</b><span style="color:#C00"> All rights reserved.</span></p>           
                                        
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
