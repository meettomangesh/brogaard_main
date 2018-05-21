<?php
	$module="path";
	include ("shell/auth.php");
	include("includes/server_config.php"); 
	include("database/connection.php");
	include("includes/brogaard_home.php");
	
	//Object is created
	$bh = new brogaard_home;
	// meta tags and title added perpose of SEO
	include ("includes/brogaard_head.php");
?>
	<!--CSS Styles-->	
	<link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>assets/css/vendors/idangerous.swiper.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>assets/css/vendors/font-awesome.min.css"> 
	<link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>assets/css/vendors/blue.monday/jplayer.blue.monday.css" />
    <link rel="stylesheet" href="<?php echo $siteurl;?>css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>assets/css/vendors/bootstrap.css" >
	<link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>assets/css/vendors/blueimp-gallery.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>assets/css/vendors/perfect-scrollbar.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>assets/css/vendors/Pe-icon-7-stroke.css">
    <link href="<?php echo $siteurl;?>css/stylemenu.css" rel="stylesheet">
    
	<link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>css/default.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>css/component.css" />
        
        <link rel="stylesheet" href="/wss/fonts?family=Myriad+Set+Pro&amp;weights=200,400,600&amp;v=1" />
    
	<!--/CSS Styles-->
	
	<!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
    <!-- /Mobile Specific Metas --> 

 <link rel="stylesheet" href="<?php echo $siteurl;?>css/grid-gallery.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>css/jquery.auto-complete.css" />
 
 <script src="<?php echo $siteurl;?>js/jquery.auto-complete.js"></script>
 <script src="<?php echo $siteurl;?>js/vendor/modernizr-2.6.2.min.js"></script>
 <script type="text/javascript" src="<?php echo $siteurl;?>js/jquery.min.js"></script>
 <script src="<?php echo $siteurl;?>js/jquery.gridrotator.js"></script>
 
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
 
 <script>
 	jQuery(window).load(function() {		
			
					
					
//==========================splash menu hovers					
	jQueryx = jQuery(window).width();
	if(jQueryx >= 1100)
	{ 
	 $("#ri-grid").wrap("<div data-liffect='slideTop'></div>");
	
	}	
	
	if(jQueryx >= 768)
	{ 
		
	jQuery('.enter').hover(
	function(){
	jQuery(this).find("span").stop().animate({marginLeft:24},300,'easeOutBack')},  			
		 
	function(){
	jQuery(this).find("span").stop().animate({marginLeft:14},400,'easeOutQuart')}  	
	)
		
	
	jQuery('.enter').toggle(
	  function(){
     jQuery(this).stop().animate({left:'-300px'},400)},  			
		 
	 function(){
    jQuery(this).stop().animate({left:'238px'},400);})
		  
  
    jQuery('.enter').toggle(
	  function(){
		 jQuery('.splash-menu').stop().delay(200).animate({left:'238px'},500,'easeOutQuart')},  			
		 
	 function(){
		jQuery('.splash-menu').stop().delay(200).animate({left:'-400px'},400);})
		
		
 	  jQuery('.enter').toggle(
	  function(){
		 jQuery(this).parent().stop().animate({width:'238px'},500,'easeOutQuart')},  			
		 
	 function(){
		jQuery(this).parent().stop().animate({width:'422px'},400);})
		

    }	
	
		//==========================load pics    
	
       jQuery("div[data-liffect] ul li").each(function (i) {
        jQuery(this).attr("style", "-webkit-animation-delay:" + i * 100 + "ms;"
                + "-moz-animation-delay:" + i * 100 + "ms;"
                + "-o-animation-delay:" + i * 100 + "ms;"
                + "animation-delay:" + i * 100 + "ms;");
        if (i == jQuery("div[data-liffect] ul li").size() -1) {
            jQuery("div[data-liffect]").addClass("play")
        }			
    })	
		
		});	
		 
 </script>
  <script>document.cookie='resolution='+Math.max(screen.width,screen.height)+("devicePixelRatio" in window ? ","+devicePixelRatio : ",1")+'; path=/';</script>
 
 <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $siteurl;?>css/main.css" />

<script>

 	jQuery(window).load(function() {		
	//==========================gridrotator (splash gallery)
		
		jQuery('#ri-grid').gridrotator( {
					rows		: 6,
					columns		: 8,
					maxStep		: 2,
					interval	: 2000,
					w1024		: {
						rows	: 7,
						columns	: 6
					},
					w768		: {
						rows	: 7,
						columns	: 5
					},
					w480		: {
						rows	: 6,
						columns	: 4
					},
					w320		: {
						rows	: 7,
						columns	: 4
					},
					w240		: {
						rows	: 7,
						columns	: 3
					},
				});		
    });


</script> 
<script src="<?php echo $siteurl;?>js/main.js"></script>
<script type="text/javascript" src="<?php echo $siteurl;?>assets/js/vendors/bootstrap.min.js"></script>
	
<script type="text/javascript" src="<?php echo $siteurl;?>assets/js/vendors/idangerous.swiper-2.4.min.js"></script>
	<script type="text/javascript" src="<?php echo $siteurl;?>assets/js/vendors/idangerous.swiper.hashnav-1.0.js"></script>

	<!-- greensock animation framework -->
	<script type="text/javascript" src="<?php echo $siteurl;?>assets/js/vendors/TweenMax.min.js"></script>
	
    <!-- Up-stream fullscreen gallery -->
	<script type="text/javascript" src="<?php echo $siteurl;?>assets/js/vendors/blueimp-gallery.min.js"></script>
	

	<!-- lazy load for images -->
	<script type="text/javascript" src="<?php echo $siteurl;?>assets/js/vendors/jquery.lazyload.min.js"></script>

	<!-- scrollbar -->
	<script type="text/javascript" src="<?php echo $siteurl;?>assets/js/vendors/perfect-scrollbar.js"></script>

    	<!-- scrollTo plugin -->
	<script type="text/javascript" src="<?php echo $siteurl;?>assets/js/vendors/jquery.scrollTo.min.js"></script>

	<!-- Place holder -->
	<script type="text/javascript" src="<?php echo $siteurl;?>assets/js/vendors/jquery.placeholder.js"></script>

</head>


<body id="splash" style="width:100%; height:100%; overflow:hidden;">

<div class="spinner"></div>
 <!-- new menu added -->
 <div class="navbar navbar-custom navbar-fixed-top" style="opacity:0.9 !important;">
           <?php include("includes/menu.php");?>
            </div>
 <!-- new menu close -->
 <!--==============================header=================================-->
<header class="splash">
  
    <h3><img src="<?php echo $siteurl;?>assets/img/1_5.png"><br> <span style="font-size:20px"><a href="mailto:INFO@BROGAARD.COM" style="text-decoration:none;" title="INFO@BROGAARD.COM"> <i class="fa fa-envelope"></i>  </a></span> &nbsp; &nbsp; &nbsp; <span style="font-size:20px">
<a href="tel:+4540578090" target="_blank" title="+45 40 57 80 90"> <span class="fa fa-phone"></span> 
              </a></span></h3>
 
 </header>
 <!--==============================content=================================-->

<div id="wrapper">
    <!-- Main Wrapper-->
	
		<div id="container">
       
			<?php
error_reporting(E_ERROR);
$search = $_POST['search'];
$f=$_POST['page'];
$S=rawurldecode($_POST['search']);
if (!isset($f))
{
}else{
$f=strip_tags($f);
$f = str_replace(" ", "%20", $f); $f=trim($f);

$t = file_get_contents($f);

echo "<div class='textbox'>";
echo '<table width="772" border="1">';

if (strlen($S)<3 || $S=="the" || $S=="The" || $S=="THE") {echo '<script language="javascript">alert("Enter longer search terms.");window.location="index.php"; </script>';

}else{

$S=stripslashes($S);
$R = str_ireplace("<", "&lt;", $S);
$R = str_ireplace(">", "&gt;", $R);
$t=stripslashes($t);
$t = str_ireplace($S, '<span style="background-color:lightblue;">'.$R.'</span>', $t, $count);
$z='<span style="background-color:lightblue;">'.$R.'</span>';
$x=htmlentities($z, ENT_QUOTES);
$t=htmlentities($t, ENT_QUOTES);
$t = str_ireplace($x, $z, $t);
$t = str_ireplace("\n", "<BR>", $t);

if ($count){
	?>
    <script>
	window.location.href="http://www.brogaard.com/shell/galleryindex.php";
	</script>
    <?php

}else{
echo '<script language="javascript">alert("Login to see more results");window.location="index.php";</script>';
}
}}
?>		
			<!-- Upstream -->
			<div id="upstream">	
			</div>
            
            <div class="inner-wrapper scrollbar">
			<div id="gal1" class="masonryGrid fullscreen-enable col-5">
			<div id="ri-grid" class="ri-grid ri-grid-size-3" >
       		  <div style="background:#141414; height:0px !important;">
        </div>
        <ul class="list-img">
      <?php
		$b_img = $bh->WS_GET_BROGAARD_IMG();
				
		for($i=0;$i<count($b_img);$i++)
		{
		?>
        	<li><a href="clientadmin/home/large/<?php echo $b_img[$i]['H_TITLE']; ?>" title="<?php echo $b_img[$i]['H_IMAGE_NAME']; ?>">
			<img class="img-responsive" src="clientadmin/home/thumb/<?php if($b_img[$i]['H_TITLE']!=''){echo $b_img[$i]['H_TITLE'];} else {$b_img[$i]['H_IMG_DESC'];}?>" alt="img" /></a>
			</li>
            <?php
		}
			?>
          
            </ul>
            </div>
            </div>
	</div>
				<!-- /Swiper Pages -->
</div>
	</div>
	<!-- /Main Wrapper-->

	<!-- bootstrap js file -->
	

	<!-- main js engine -->
	<script type="text/javascript" src="<?php echo $siteurl;?>assets/js/custom.js"></script>
    
         
        <?php include ("includes/brogaard_footer2.php"); ?>

	<!-- /javascript Plugins-->
    
</body>

<!-- Mirrored from owwwlab.com/vida/corporate.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 16 Sep 2014 05:18:47 GMT -->
</html>