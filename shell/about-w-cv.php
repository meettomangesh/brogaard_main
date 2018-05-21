<?php 
$menupath='scrapbook';
/*require_once(dirname(__FILE__) . '/' . "auth.php");
checkSession();*/
	include ("../includes/server_config.php"); 
	include ("../database/connection.php");
	include ("../includes/brogaard_head.php");
	include ("../includes/brogaard_scrap.php");
	$br = new brogaard_scrap;
	$scrap = $br->WS_GET_BROGAARD_SCRAPBOOK_IMG();
?>
		<link rel="shortcut icon" type="image/ico" href="<?php echo $siteurl;?>assets/img/favicon.ico" />
		<link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>css/style_scrap.css" media="screen" />
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
         <!-- for CV panel -->
         <link rel="stylesheet" href="<?php echo $siteurl;?>css/slide.css" type="text/css" media="screen" />
         <script src="<?php echo $siteurl;?>js/jquery-1.3.2.min.js" type="text/javascript"></script>
	<!-- Sliding effect -->
	<script src="<?php echo $siteurl;?>js/slide.js" type="text/javascript"></script>
        <style>
		.goog-te-gadget{
			      z-index: 999;
				  position: relative;
				 }
		
		</style>
       
    <!-- for CV panel -->
	</head>
	<body >
    
    <!-- CV Panel -->
    
    <div class="ic_cv"><a style="color:#fff;" href="#" class="tooltip11" title="Selvlært fotograf siden 1984 for bl.a. Ugeavisen København og Greenpeace | Udlært pressefotograf på Billed Bladet i 1991 | Selvstændig på 5C siden 1991 Udvalgte kunder gennem årene: Agenzy, Alcon A/S, Bane Danmark, Bellevue Teatret, Bruun & Hjejle, Care, Coop, DR, DSB, DTU, Düsseldorfer Schauspielhaus, EG, Egmont, Egmontfonden, Erhvervsstyrelsen, Folketinget,  Forlæggerforeningen, Fullrate, Gads Forlag, Grevinde Alexandra, Grevinde Danner, Hello Magazine,  Herlufsholm, Holm Kommunikation, IBM, Kongehuset, Lett Advokater, LIFE Magazine, Logitech, Oracle, McDonalds, Månedsmagasinet IN, Nationalbanken, NCC, Netcompany, Nordea, Nordisk Film, Sjælsø, Søren Østergaard, Søs Fenger, Pointwork, Post Greenland, Psykologi, Region Hovedstaden, Rigshospitalet, Rockwool, Røde Kors, Salon Aqua, Scandinavian Branding, Slots og Ejendomsstyrelsen, Spencer & Stuart, TDC, TV2, Udenrigsministeriet, Unicef, Vandkunstens Forlag, WHO, Zirkus Nemo, Øresundskonsortiet, Ørkenens Sønner m.fl. | Udstillet på bl.a.  Frederiksborg Nationalhistoriske Museum, Den Sorte Diamant, Dansk Kulturinstitut i Edinburgh, Nationalteatret i Riga, Nationalbiblioteket i Tallin, Dansk Kulturinstitut i Ungarn og den danske ambassade i Chengdu, Kina"><span class="" title="&nbsp;">CV</span></a></div><!--blink_me_scrap-->
    
    <!-- CV panel end -->
    
    <!--style="overflow-x:hidden;"-->
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
        <script>
		$(".tooltip11").click(function () {
    var $title = $(this).find(".title");
    if (!$title.length) {
        $(this).append('<a class="title">' + $(this).attr("title") + '</span>');
    } else {
        $title.remove();
    }
});
		</script>
        
        <?php include ("../includes/brogaard_footer.php"); ?>
	</body>
</html>