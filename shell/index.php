<?php
	include ("shell/auth.php");
	include("includes/server_config.php"); 
	include("database/connection.php");
	include("includes/brogaard_home.php");
	
	//Object is created
	$bh = new brogaard_home;
	
	
	?>
<!DOCTYPE html>
<html lang="en">
<!--<a href="#"-->
<!-- Mirrored from owwwlab.com/vida/corporate.html by HTTrack Website Copier/3.x [XR&CO2013], Tue, 16 Sep 2014 04:48:35 GMT -->
<head>
	<meta charset="UTF-8">
	<title>Steen Brogaard Photography</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7, IE=9" />
    
    <link rel="shortcut icon" type="image/ico" href="<?php echo $siteurl;?>assets/img/favicon.ico" />

	<!--CSS Styles-->	
	<link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>assets/css/vendors/idangerous.swiper.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>assets/css/vendors/font-awesome.min.css"> 
	<link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>assets/css/vendors/blue.monday/jplayer.blue.monday.css" />
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


	<!-- Google Fonts -->
	<!--<link href='http://fonts.googleapis.com/css?family=PT+Sans:100,200,300,400,700,400italic,700italic' rel='stylesheet' type='text/css'>

	<link href='http://fonts.googleapis.com/css?family=Exo+2:400,100,200,200italic,300,300italic,400italic,500,600,500italic,600italic,700,800,700italic,800italic,900,900italic' rel='stylesheet' type='text/css'>-->
	<!-- /Google Fonts -->

 <link rel="stylesheet" href="<?php echo $siteurl;?>css/grid-gallery.css" />
 
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
</head>


<body id="splash" style="width:100%; height:100%; overflow:hidden;">

<div class="spinner"></div>
 
 <div class="navbar navbar-custom navbar-fixed-top" role="navigation" style="background:rgb(105,105,105); !important;opacity:0.9 !important;">
 
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse" style="font-size:1.5em;">
                    <i class="fa fa-bars"></i>   
                </button>
               <?php 
			   $a='x';
			   if ($a=='x'){?>
                    <a class="navbar-brand" href="index.php">
                    <img src="<?php echo $siteurl;?>assets/img/logo.png">
                </a>
                
                <?php }?>
            </div>

           <?php include("includes/brogaard_menu.php");?>
            
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </div>

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
//echo "<a target='_blank' a HREF='".$f."'>".$f."</a><BR>";
//echo "<BR><b>There were ".$count." matches.</b><BR><BR>";
//echo $t."<BR><I><span style='color:green;background-color:#ddd'>".$f."</span></I>";
//echo "<br><br></td></tr></table>";

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
				
		/*$img = array("01.jpg","02.jpg","03.jpg","04.jpg","05.jpg","06.jpg","07.jpg","08.jpg","09.jpg","10.jpg","11.jpg","12.jpg","13.jpg","14.jpg","15.jpg","16.jpg","17.jpg","18.jpg","19.jpg","20.jpg","21.jpg","22.jpg","23.jpg","24.jpg","25.jpg","26.jpg","27.jpg","28.jpg","29.jpg","30.jpg","31.jpg","32.jpg","33.jpg","34.jpg","35.jpg","36.jpg","37.jpg","38.jpg","39.jpg","40.jpg","41.jpg","42.jpg","43.jpg","44.jpg","45.jpg","46.jpg","47.jpg","48.jpg","49.jpg","50.jpg");
		$random_img=array_rand($img,48);
		shuffle($random_img);*/
		/*print_r(array_rand($img,8));
		echo $img[$random_img[0]];
		exit;*/
		/*$img = array();
		$sql=mysql_query("SELECT * FROM home_slider order by rand()");
		while($r = mysql_fetch_assoc($sql))
		{
			extract($r);
			array_push($img,$H_TITLE);
		}*/
		/*$random_img=array_rand($img,5);
		shuffle($random_img);*/
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

	<!-- main js engine -->
	<script type="text/javascript" src="<?php echo $siteurl;?>assets/js/custom.js"></script>
    
    <script src="<?php echo $siteurl;?>js/classie.js"></script>
		<script src="<?php echo $siteurl;?>js/uisearch.js"></script>
		<script>
			new UISearch( document.getElementById( 'sb-search' ) );
		</script>

	<!-- /javascript Plugins-->
</body>

<!-- Mirrored from owwwlab.com/vida/corporate.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 16 Sep 2014 05:18:47 GMT -->
</html>