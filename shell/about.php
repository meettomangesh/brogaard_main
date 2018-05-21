<?php 
	$menupath='scrapbook';
	require_once(dirname(__FILE__) . '/' . "auth.php");
	checkSession();
	include ("../includes/server_config.php"); 
	include ("../database/connection.php");
	include ("../includes/brogaard_head.php");
	include ("../includes/brogaard_scrap.php");
	$br = new brogaard_scrap;
	$scrap = $br->WS_GET_BROGAARD_SCRAPBOOK_IMG();
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
        <script>
		    window.onorientationchange = function()
			{
			   window.location.reload();
			}
		 </script>
         <style>.navbar{margin-bottom:0px!important;}</style>
	</head>
	<body ><!--style="overflow-x:hidden;"-->
     <div class="navbar navbar-custom navbar-fixed-top" style="opacity:0.9 !important;">
    <?php include("../includes/menu.php");?>
    </div>
     <!--Google Translator -->
            <?php
	 if (isset($_SESSION['username']) && isset($_SESSION['password'])  ) {
	 ?>
     <style>
.goog-te-banner-frame {
  margin-top: 80px;
}
.goog-te-gadget{ margin-top: 79px;}
</style>
    <div style="margin-top:79px !important">
    <?php
	 }
	 else
	 {
		 ?>
         <style>
.goog-te-banner-frame {
  margin-top: 50px;
}
.goog-te-gadget{ margin-top: 50px;}

</style>
          <div style="margin-top:50px !important">
         <?php
	 }
	?>
            <?php include("../includes/google_translate.html");?>
            </div>
            <!--End Google Translator -->
    <div class="clearfix"></div>
		<div class="container">	

			<section class="main">

				<ul id="st-stack" class="st-stack-raw">
          <?php
				 	
				 for($k=0;$k<count($scrap);$k++){ ?>
				<li><div class="st-item"><a href="#"><img src="../clientadmin/scrapbook_images/<?php echo $scrap[$k]['H_TITLE']; ?>"/></a></div><div class="st-title"><h2> <?php echo $string = html_entity_decode($scrap[$k]['H_IMAGE_NAME'], ENT_QUOTES, "utf-8"); ?></h2></div></li>
              <?php } ?>
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