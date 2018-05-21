<?php
$menupath='store';
require_once(dirname(__FILE__) . '/' . "auth.php");
checkSession();
include("../includes/server_config.php"); 
include("../database/connection.php");
include ("../includes/brogaard_head.php");
//global $siteurl;
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
     
   <style>
.aboutus-content p{font-size:15px; font-family: 'PT Sans', sans-serif;}
h2#cms{font-size: 52px;line-height: 1.08654;font-weight: 100; margin:265px 0;font-family: Lucida Grande,Helvetica Neue, Helvetica, Arial, Verdana, sans-serif,Myriad Set Pro; vertical-align:middle;; text-align:center; }
@media(max-width:768px){
	h2#cms{margin:290px 0!important;}
}
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
            
               <div align="center" class="aboutus-content" style= "text-align:center;  vertical-align:middle;">
               <h2 id="cms" >Opening 2015</h2>
                   <!-- <p>&nbsp;</p>-->
                        
                    
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

   
	<?php include ("../includes/brogaard_footer.php"); ?>
	<!-- /javascript Plugins-->
   	
</body>
</html>
