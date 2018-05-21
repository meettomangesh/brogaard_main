<?php 
require_once(dirname(__FILE__) . '/' . "auth.php");
checkSession();
	include("../includes/server_config.php"); 
	include("../database/connection.php");
	include ("../includes/brogaard_head.php");
?>
		<link rel="shortcut icon" type="image/ico" href="<?php echo $siteurl;?>assets/img/favicon.ico" />
		<link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>css/style_scrap.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>assets/css/vendors/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>css/component.css" />
         <link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>assets/css/vendors/Pe-icon-7-stroke.css">
        <link rel="stylesheet" href="<?php echo $siteurl;?>css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>assets/css/vendors/bootstrap.css" >
        <link href="<?php echo $siteurl;?>css/stylemenu.css" rel="stylesheet">
		<script src="<?php echo $siteurl;?>js/modernizr.custom.63321.js"></script>
         <script type="text/javascript" src="<?php echo $siteurl;?>js/jquery.min.js"></script>
		<!--[if lte IE 7]><style>.support-note .note-ie{display:block;}</style><![endif]-->
         
	</head>
	<body ><!--style="overflow-x:hidden;"-->
     <div class="navbar navbar-custom navbar-fixed-top" style="opacity:0.9 !important;">
    <?php include("../includes/menu.php");?>
    </div>
    <div class="clearfix"></div>
		<div class="container">	

			<section class="main">

				<ul id="st-stack" class="st-stack-raw">
				<li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/1.jpg"/></a></div><div class="st-title"><h2>Graverobber</h2></div></li>
					<li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/2.jpg"/></a></div><div class="st-title"><h2>Hideous Snake Queen</h2></div></li>
					<li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/3.jpg"/></a></div><div class="st-title"><h2>Queen of Hearts</h2></div></li>
					<li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/4.jpg"/></a></div><div class="st-title"><h2>Dead Pirate vs Kraken</h2></div></li>
					<li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/5.jpg"/></a></div><div class="st-title"><h2>Mountain Lion</h2></div></li>
					<li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/6.jpg"/></a></div><div class="st-title"><h2>Flying Skull</h2></div></li>
					<li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/7.jpg"/></a></div><div class="st-title"><h2>The Fly &amp; Bureaucratic Elephant</h2></div></li>
					<li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/8.jpg"/></a></div><div class="st-title"><h2>Failsnake</h2></div></li>
					<li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/9.jpg"/></a></div><div class="st-title"><h2>Cultist</h2></div></li>
					<li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/10.jpg"/></a></div><div class="st-title"><h2>Crusader &amp; Viking</h2></div></li>
					<li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/11.jpg"/></a></div><div class="st-title"><h2>Crocodile</h2></div></li>
					<li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/12.jpg"/></a></div><div class="st-title"><h2>Captain Banana</h2></div></li>
					<li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/13.jpg"/></a></div><div class="st-title"><h2>Werewolf</h2></div></li>
					<li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/14.jpg"/></a></div><div class="st-title"><h2>Vegetables</h2></div></li>
                    <li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/15.jpg"/></a></div><div class="st-title"><h2>Graverobber</h2></div></li>
					<li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/16.jpg"/></a></div><div class="st-title"><h2>Hideous Snake Queen</h2></div></li>
					<li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/17.jpg"/></a></div><div class="st-title"><h2>Queen of Hearts</h2></div></li>
					<li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/18.jpg"/></a></div><div class="st-title"><h2>Dead Pirate vs Kraken</h2></div></li>
					<li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/5.jpg"/></a></div><div class="st-title"><h2>Mountain Lion</h2></div></li>
					<li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/19.jpg"/></a></div><div class="st-title"><h2>Flying Skull</h2></div></li>
					<li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/20.jpg"/></a></div><div class="st-title"><h2>The Fly &amp; Bureaucratic Elephant</h2></div></li>
					<li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/21.jpg"/></a></div><div class="st-title"><h2>Failsnake</h2></div></li>
					<li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/22.jpg"/></a></div><div class="st-title"><h2>Cultist</h2></div></li>
					<li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/23.jpg"/></a></div><div class="st-title"><h2>Crusader &amp; Viking</h2></div></li>
					<li><div class="st-item"><a href="http://drbl.in/ffiw"><img src="../clientadmin/scrapbook_images/24.jpg"/></a></div><div class="st-title"><h2>Crocodile</h2></div></li>
					<li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/25.jpg"/></a></div><div class="st-title"><h2>Captain Banana</h2></div></li>
					<li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/26.jpg"/></a></div><div class="st-title"><h2>Werewolf</h2></div></li>
					<li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/27.jpg"/></a></div><div class="st-title"><h2>Vegetables</h2></div></li>
                    <li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/28.jpg"/></a></div><div class="st-title"><h2>Graverobber</h2></div></li>
					<li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/29.jpg"/></a></div><div class="st-title"><h2>Hideous Snake Queen</h2></div></li>
					<li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/30.jpg"/></a></div><div class="st-title"><h2>Queen of Hearts</h2></div></li>
					<li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/31.jpg"/></a></div><div class="st-title"><h2>Dead Pirate vs Kraken</h2></div></li>
					<li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/32.jpg"/></a></div><div class="st-title"><h2>Mountain Lion</h2></div></li>
					<li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/33.jpg"/></a></div><div class="st-title"><h2>Flying Skull</h2></div></li>
					<li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/34.jpg"/></a></div><div class="st-title"><h2>The Fly &amp; Bureaucratic Elephant</h2></div></li>
					<li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/35.jpg"/></a></div><div class="st-title"><h2>Failsnake</h2></div></li>
					<li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/36.jpg"/></a></div><div class="st-title"><h2>Cultist</h2></div></li>
					<li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/37.jpg"/></a></div><div class="st-title"><h2>Crusader &amp; Viking</h2></div></li>
					<li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/38.jpg"/></a></div><div class="st-title"><h2>Crocodile</h2></div></li>
					<li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/39.jpg"/></a></div><div class="st-title"><h2>Captain Banana</h2></div></li>
					<li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/40.jpg"/></a></div><div class="st-title"><h2>Werewolf</h2></div></li>
					<li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/41.jpg"/></a></div><div class="st-title"><h2>Vegetables</h2></div></li>
                    <li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/42.jpg"/></a></div><div class="st-title"><h2>Graverobber</h2></div></li>
					<li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/43.jpg"/></a></div><div class="st-title"><h2>Hideous Snake Queen</h2></div></li>
					<li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/44.jpg"/></a></div><div class="st-title"><h2>Queen of Hearts</h2></div></li>
					<li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/45.jpg"/></a></div><div class="st-title"><h2>Dead Pirate vs Kraken</h2></div></li>
                	
				</ul>
				
			</section>

		</div><!-- /container -->
        
        <script>
//			$.noConflict();
//			// Code that uses other library's $ can follow here.
//		</script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo $siteurl;?>assets/js/vendors/bootstrap.min.js"></script>		
		<script type="text/javascript" src="<?php echo $siteurl;?>js/jquery.stackslider.js"></script>
		<script type="text/javascript">
			
			$( function() {
				
				$( '#st-stack' ).stackslider();

			});

		</script>
        <?php include ("../includes/brogaard_footer.php"); ?>
	</body>
</html>