<?php 
	$menupath ='portfolio';
	//require_once(dirname(__FILE__) . '/' . "auth.php");
	include("../shell/auth.php"); 
	checkSession();
	include("../includes/server_config.php"); 
	include("../database/connection.php");
	include("../includes/brogaard_portfolio.php");
	//Object is created
	$bp = new brogaard_portfolio;
	$b_gal = $bp->WS_GET_BROGAARD_GAL();
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

 
<!-- <script src="<?php echo $siteurl;?>js/vendor/modernizr-2.6.2.min.js"></script>
 <script type="text/javascript" src="<?php echo $siteurl;?>js/jquery.min.js"></script>-->
 
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
              .animated { 
				-webkit-animation-duration: 1s; 
				animation-duration: 1s; 
				-webkit-animation-fill-mode: both; 
				animation-fill-mode: both; 
			} 
			.slow{
				 -webkit-animation-duration: 1.5s; 
				animation-duration: 1.5s; 
				-webkit-animation-fill-mode: both; 
				animation-fill-mode: both; 
			}
			.slower{
				 -webkit-animation-duration: 2s; 
				animation-duration: 2s; 
				-webkit-animation-fill-mode: both; 
				animation-fill-mode: both; 
			}
			.slowest{
				 -webkit-animation-duration: 3s; 
				animation-duration: 3s; 
				-webkit-animation-fill-mode: both; 
				animation-fill-mode: both; 
			}
			
			.bounceInRight, .bounceInLeft, .bounceInUp, .bounceInDown{
				opacity:0;
				-webkit-transform: translateX(400px); 
				transform: translateX(400px); 
			}
			
			@-webkit-keyframes bounceInRight { 
				0% { 
					opacity: 0; 
					
					-webkit-transform: translateX(400px); 
				} 
				60% { 
					
					-webkit-transform: translateX(-30px); 
				} 
				80% { 
					-webkit-transform: translateX(10px); 
				} 
				100% {
				opacity: 1;
				 
					-webkit-transform: translateX(0); 
				} 
			} 
			
			@keyframes bounceInRight { 
				0% { 
					opacity: 0; 
					
					transform: translateX(400px); 
				} 
				60% { 
					
					transform: translateX(-30px); 
				} 
				80% { 
					transform: translateX(10px); 
				} 
				100% {
				opacity: 1;
				 
					transform: translateX(0); 
				} 
			}
			
			.bounceInRight.go { 
				-webkit-animation-name: bounceInRight; 
				animation-name: bounceInRight; 
			}
			.link-div{position: absolute;
  width: 229px;
  height: 50px;
  top: -46px;
  right: 36px;
			}
			
				a.submit-button {
 
  font-family: "Lucida Grande", "Helvetica Neue", "Helvetica", "Arial", "Verdana", "sans-serif","Myriad Set Pro";
  font-size: 14px;
  font-weight: 400;
  color: #ffffff;
  text-align: center;
  float: left;
  background-color: #BE181F;
 /* background-color: rgba(114,14,03,0.4);*/
  margin-top: 5px;
  border: none;
  border-radius: 5px!important;
  -webkit-border-radius: 5px!important;
  cursor: pointer;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-transition: background-color 0.2s ease-in-out;
  -moz-transition: background-color 0.2s ease-in-out;
  -ms-transition: background-color 0.2s ease-in-out;
  -o-transition: background-color 0.2s ease-in-out;
  transition: background-color 0.2s ease-in-out;
}
a.submit-button:hover{
	color:#CCC;
	background: rgba(235,30,41,1);
background: -moz-linear-gradient(top, rgba(235,30,41,1) 0%, rgba(163,10,17,1) 100%);
background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(235,30,41,1)), color-stop(100%, rgba(163,10,17,1)));
background: -webkit-linear-gradient(top, rgba(235,30,41,1) 0%, rgba(163,10,17,1) 100%);
background: -o-linear-gradient(top, rgba(235,30,41,1) 0%, rgba(163,10,17,1) 100%);
background: -ms-linear-gradient(top, rgba(235,30,41,1) 0%, rgba(163,10,17,1) 100%);
background: linear-gradient(to bottom, rgba(235,30,41,1) 0%, rgba(163,10,17,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#eb1e29', endColorstr='#a30a11', GradientType=0 );
	}
	.navbar{margin-bottom:0px!important;}
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
    
        	<div class="container1 background backimage2">
    	
        <!--All Content Start-->
        <div class="wrapper boxstyle">
        <div class="link-div" >
                 <div class="buttons-inline animated bounceInRight slower go" data-id="4"><a class="btn submit-button" href="http://www.brogaard.com/shell/galleryindex_pdf.php">Create Your Own Portfolio PDF</a></div>
                </div>
     
           <!--Blog Lists and Sidebar-->
            <section class="box-container" style="padding: 40px 35px 25px 35px;">
            <?php
				if((count($b_gal)%2) == 0)
				{
					$end = count($b_gal)/2;
					?>
                    <div class="port-cat1">
                    <?php
					for($i=0;$i<$end;$i++)
					{
						$b_gal_img = $bp->WS_GET_BROGAARD_GAL_IMG($b_gal[$i]['GAL_ID']);
						?>
                        <div class="port-cat-cont">
                        <a href="portraits.php?gal_id=<?=$b_gal[$i]['GAL_ID']?>">
                           <img src="/clientadmin/portfolio_galleries/<?php echo $b_gal[$i]['GAL_NAME'] ?>/portfolio_large/<?=$b_gal_img[0]['H_TITLE'];?>">
                        
                           <div>
                            <h3><?php echo $b_gal[$i]['GAL_NAME'] ?></h3>
                            <p><?php echo $b_gal[$i]['GAL_SUB_TITLE'] ?></p>
                           </div>
                        </a>
                        </div>
                        <?php	
					}
					?>
                    </div>
                    <div class="port-cat2">
                    <?php
					for($j=$end;$j<count($b_gal);$j++)
					{
						$b_gal_img1 = $bp->WS_GET_BROGAARD_GAL_IMG($b_gal[$j]['GAL_ID']);
						?>
                        <div class="port-cat-cont">
                        <a href="portraits.php?gal_id=<?=$b_gal[$j]['GAL_ID']?>">
                        <img src="/clientadmin/portfolio_galleries/<?php echo $b_gal[$j]['GAL_NAME'] ?>/portfolio_large/<?=$b_gal_img1[0]['H_TITLE'];?>">
                        
                           <div>
                            <h3><?php echo $b_gal[$j]['GAL_NAME'] ?></h3>
                            <p><?php echo $b_gal[$j]['GAL_SUB_TITLE'] ?></p>
                           </div>
                        </a>
                        </div>
                        <?php	
					}
					?>
                    </div>
                    <?php
				}
			?>
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
     <script src="<?php echo $siteurl;?>js/vendor/modernizr-2.6.2.min.js"></script>
 <script type="text/javascript" src="<?php echo $siteurl;?>js/jquery.min.js"></script>
    
	<!-- /javascript Plugins-->
   	<?php include ("../includes/brogaard_footer.php"); ?>
     <!--Google Translator -->
     <?php
	 if (isset($_SESSION['username']) && isset($_SESSION['password'])  ) {
	 ?>
     <style>
.goog-te-banner-frame {
  margin-top: 80px;
}
</style>
    <div style="margin-top:80px !important">
    <?php
	 }
	 else
	 {
		 ?>
         <style>
.goog-te-banner-frame {
  margin-top: 50px;
}
</style>
          <div style="margin-top:50px !important">
         <?php
	 }
	?>
    <?php include("../includes/google_translate.html");?>
    </div>
    <!--End Google Translator --> 
</body>
</html>
