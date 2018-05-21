<?php
// localhost url
//$siteurl = "http://".$_SERVER['HTTP_HOST']."/brogaard_web_letest/";
// server url 
$siteurl = "http://".$_SERVER['HTTP_HOST']."/";

global $siteurl;
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7, IE=9" />
 
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



<link rel="shortcut icon" type="image/ico" href="<?php echo $siteurl;?>assets/img/favicon.ico" />

	<!--CSS Styles-->	
	<link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>assets/css/vendors/font-awesome.min.css"> 
	<link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>assets/css/vendors/bootstrap.css" >
	<link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>assets/css/vendors/Pe-icon-7-stroke.css">
    <link href="<?php echo $siteurl;?>css/stylemenu.css" rel="stylesheet">
    <!-- serach functionality script-->
	<link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>css/default.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>css/component.css" />
	<!--/CSS Styles-->
	
	<!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
    <!-- /Mobile Specific Metas --> 


	<!-- Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=PT+Sans:100,200,300,400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<!--<script type="text/javascript" src="js/jquery.min.1.7.js"></script>
<script type="text/javascript" src="js/modernizr.2.5.3.min.js"></script>-->
 
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
   .aboutus-content {
  margin-top: 0px!important; font-family:"Lucida Grande", "Helvetica Neue", "Helvetica", "Arial", "Verdana", "sans-serif","Myriad Set Pro";
}

h2 {
  font-size: 22px;
  font-weight: 400;
  text-transform: uppercase;
  line-height: 24px;
  color: #fff;
  font-family: "Lucida Grande", "Helvetica Neue", "Helvetica", "Arial", "Verdana", "sans-serif","Myriad Set Pro";
}

.aboutus-content p{font-size:15px;font-family:"Lucida Grande", "Helvetica Neue", "Helvetica", "Arial", "Verdana", "sans-serif","Myriad Set Pro"; color:#333;}
.aboutus-content a{color:#e8e8e8; text-decoration:underline;}
.aboutus-content a:hover{color:#C00;}
.sample {
		/*background-color:#BBB;
		width:80px;
		height:80px;
		border:5px solid #555;
		border-radius:15px;*/
		margin-top:-155px;
	}
	.bounce {
		position:absolute;
		/*top:500px;
		left:50%;*/
		margin-left:-40px;
		
		-moz-animation-name:bounce;
		-moz-animation-duration:1s;
		-moz-animation-fill-mode:backwards;
		-moz-animation-delay:0.5s;
		
		-webkit-animation-name:bounce;
		-webkit-animation-duration:1s;
		-webkit-animation-fill-mode:backwards;
		-webkit-animation-delay:0.5s;
		
		animation-name:bounce;
		animation-duration:1s;
		animation-fill-mode:backwards;
		animation-delay:0.5s;
	}
	
	@-webkit-keyframes bounce {
		0% 	{ top:-250px; -webkit-animation-timing-function:ease-in;  }
		37% 	{ top:15px; -webkit-animation-timing-function:ease-out; }
		55% 	{ top:10px; -webkit-animation-timing-function:ease-in;  }
		73% 	{ top:5px; -webkit-animation-timing-function:ease-out; }
		82% 	{ top:0px; -webkit-animation-timing-function:ease-in;  }
		91% 	{ top:5px; -webkit-animation-timing-function:ease-out; }
		96% 	{ top:-5px; -webkit-animation-timing-function:ease-in;  }
		100%	{ top:0px; }
	}
	@-moz-keyframes bounce {
		0% 	{ top:-250px; -moz-animation-timing-function:ease-in;  }
		37% 	{ top:15px; -moz-animation-timing-function:ease-out; }
		55% 	{ top:10px; -moz-animation-timing-function:ease-in;  }
		73% 	{ top:5px; -moz-animation-timing-function:ease-out; }
		82% 	{ top:0px; -moz-animation-timing-function:ease-in;  }
		91% 	{ top:5px; -moz-animation-timing-function:ease-out; }
		96% 	{ top:-5px; -moz-animation-timing-function:ease-in;  }
		100%	{ top:0px; }
	}
	@keyframes bounce {
		0% 	{ top:-250px; -moz-animation-timing-function:ease-in;  }
		37% 	{ top:15px; -moz-animation-timing-function:ease-out; }
		55% 	{ top:10px; -moz-animation-timing-function:ease-in;  }
		73% 	{ top:5px; -moz-animation-timing-function:ease-out; }
		82% 	{ top:0px; -moz-animation-timing-function:ease-in;  }
		91% 	{ top:5px; -moz-animation-timing-function:ease-out; }
		96% 	{ top:-5px; -moz-animation-timing-function:ease-in;  }
		100%	{ top:0px; }
	}
@media (width: 1366px){
.navbar-header {
  float: left;
  padding-left: 9.5%;
}
@media(width:1024px){
	.navbar-header {
  float: left;
  padding-left: 23px!important;
}
	.nav.navbar-nav{
		width:92%!important}
		.nav > li > a {
			padding-left: 20px!important;
  padding-right: 20px!important;
			}
	}
  
  
   </style> 
  <!-- store aditional css and js -->
 <link href="store-demo/css/default.css" rel="stylesheet" type="text/css">
   <!-- store popup css and js -->
   <link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>store-demo/popup/css/component1.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>store-demo/popup/css/default.css" />
    <!-- store flipbook -->
    <script type="text/javascript" src="<?php echo $siteurl;?>store-demo/extras/jquery.min.1.7.js"></script>
<script type="text/javascript" src="<?php echo $siteurl;?>store-demo/extras/modernizr.2.5.3.min.js"></script>
<script type="text/javascript" src="<?php echo $siteurl;?>store-demo/lib/turn.min.js"></script>
<script type="text/javascript" src="<?php echo $siteurl;?>store-demo/lib/turn.html4.min.js"></script>
<script type="text/javascript" src="<?php echo $siteurl;?>store-demo/lib/scissor.min.js"></script>
<link href="<?php echo $siteurl;?>store-demo/samples/double-page/css/double-page.css" type="text/css" rel="stylesheet">
         
</head>

<body>

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

           
            <div class="collapse navbar-collapse navbar-left navbar-main-collapse">
            <ul class="nav navbar-nav">
            	 
				 <li><a href="http://www.brogaard.com/shell/galleryindex.php">Portfolio</a></li>
				<li><a href="http://www.brogaard.com/shell/info.php">Royal</a></li>
				<li><a href="http://www.brogaard.com/shell/about.php">Scrapbook</a></li>
				<li><a href="http://www.brogaard.com/shell/services.php">Services</a></li>
                <li><a href="#">Store</a></li>
				<li><a href="http://www.brogaard.com/shell/contact.php">Contact</a></li>
				<li><a href="http://www.brogaard.com/shell/login.php">Login</a></li>
                <!--<li id="sb-search" class="sb-search">  
                	<form class='form-search' method='post' id='searchform' action='index.php'>
                    <input type='hidden' name='page'  value='http://www.brogaard.com/shell/galleryindex.php'>
					<input class="sb-search-input" placeholder="Search..."  type="text" value="" name="search" id="search" onFocus="clearcontent()">
					<input class="sb-search-submit" type="submit" value="" style="cursor:pointer" />
					<span class="sb-icon-search"></span>
					</form>
                </li>-->
	       			
      		</ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </div>

	
   
    </header>
    <!--Header End-->
    
        	<div class="container background" style="background:#f1f1f1;">
    	         
        <div class="wrapper boxstyle" style=" border-radius:5px;">
                   
           <!--Blog Lists and Sidebar-->
            <section class="box-container" style="background:#fff;">
            
               <div  class="aboutus-content">
                  <div class="splash">
                    <!--<div class="center">-->
                    <div class="details send-message">
                        
                        <h1>I et hav af lyseblå skjorter (Indbundet)</h1>
                        <h3 style="height:34px;">af Amanda Holman Brogaard, Susanne Holman, Steen Brogaard </h3>
                        <p>Skoleuniformer, sovesale, traditioner og Harry Potter-romantik
<br>
Herlufsholm Kostskole er en skole omgærdet af mange myter og mystik - men hvordan er det i virkeligheden at være kostelev på Herlufsholm, og hvilke tanker gør man sig som more, når ens datter bekendtgør, at hun vil på kostskole?<br>

- See more at: http://www.arnoldbusck.dk/boeger/biografier-erindringer/i-et-hav-af-lyseblaa-skjorter#sthash.ctUU7QUZ.dpuf</p>
                       
                        <button  class="md-close" style="text-align: center; font-size:14px;">Read More</button>
                    </div>
                
                    <div class="bookshelf contact-info" >
                        <div class="shelf">
                            <div class="row-1">
                                <div class="loc">
                                  <div>
                                    <div class="sample thumb1 bounce" sample="docs">
                                       <img class="md-trigger" data-modal="modal-1" style="border:2px solid #f1f1f1;" src="<?php echo $siteurl;?>store-demo/pics/book1.jpg">
                                    </div>
                                   </div>
                                    <div>
                                      <div class="sample thumb2 bounce" style="-webkit-animation-delay: 1s; animation-delay: 1s;" sample="html5">
                                        <img class="md-trigger" data-modal="modal-2" style="border:2px solid #f1f1f1;" src="<?php echo $siteurl;?>store-demo/pics/book2.jpg">
                                      </div> 
                                    </div>
                                   <!-- <div> <div class="sample thumb3 img-zoom" sample="docs"></div> </div>-->
                                </div>
                            </div>
                            <!--<div class="row-2">
                                <div class="loc">
                                    <div> <div class="sample thumb4" sample="magazine1"></div> </div>
                                    <div> <div class="sample thumb5" sample="magazine2"></div> </div>
                                    <div> <div class="sample thumb6" sample="magazine3"></div> </div>
                                </div>
                            </div>-->
                        </div>
                        
                        <div class="suggestion"></div>
                    <!--</div>-->
                    </div>
                
                       
                                </div>
                  
                  <div class="flipbook-viewport md-modal md-effect-1" id="modal-1">
                  <button  class="button-submit" style="text-align: center; font-size:12px; margin-left:210px; border-radius:5px; font-weight:normal; text-transform:normal;">Buy Now</button>
			<!--<div class="flipbook-viewport">-->
	<div id="flbook" class="container">
		<div class="flipbook">
			<div class="page" style="background:url(<?php echo $siteurl;?>store-demo/samples/double-page/pages/book1.jpg); background-size:100% 100%;"></div>
			<div class="double" style="background-image:url(<?php echo $siteurl;?>store-demo/samples/double-page/pages/2.jpg)"></div>
			<div class="double" style="background-image:url(<?php echo $siteurl;?>store-demo/samples/double-page/pages/3.jpg)"></div>
			<div class="double" style="background-image:url(<?php echo $siteurl;?>store-demo/samples/double-page/pages/4.jpg)"></div>
			<div class="double" style="background-image:url(<?php echo $siteurl;?>store-demo/samples/double-page/pages/5.jpg)"></div>
			<div class="double" style="background-image:url(<?php echo $siteurl;?>store-demo/samples/double-page/pages/6.jpg)"></div>
			<div class="page" style="background-image:url(<?php echo $siteurl;?>store-demo/samples/double-page/pages/7.jpg)"></div>
		</div>
	<!--</div>-->
       </div>
            <button style="padding: 5px 10px;border-radius: 25px;float: right;background-color: rgba(0,0,0,0.6);text-align: center; margin-right:210px; border-radius:5px;font-size:12px;font-weight:normal;" class="md-close">X</button>
		</div>
        <!---- end 1 ----->
        <div class="md-modal md-effect-1" id="modal-2">
        <div class="content">
              <img src="<?php echo $siteurl;?>store-demo/pics/book2.jpg"
              </div> 
              <button style="padding: 5px 10px;border-radius: 25px;float: right;background-color: rgba(0,0,0,0.6);text-align: center; margin-right:210px; border-radius:5px;font-size:12px;font-weight:normal;" class="md-close">X</button>   
	
       </div>
            
		</div>
        <div class="md-overlay"></div>
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
    <script src="<?php echo $siteurl;?>js/classie.js"></script>
	<script src="<?php echo $siteurl;?>js/uisearch.js"></script>
	<script>
		new UISearch( document.getElementById( 'sb-search' ) );
	</script>

	<!-- /javascript Plugins-->
    <!-- /store demo-->
   	<script src="<?php echo $siteurl;?>store-demo/popup/js/classie.js"></script>
<script src="<?php echo $siteurl;?>store-demo/popup/js/modalEffects.js"></script>
 <!-- /store demo double-->
<script type="text/javascript">

function loadApp() {

	var flipbook = $('.flipbook');

 	// Check if the CSS was already loaded
	
	if (flipbook.width()==0 || flipbook.height()==0) {
		setTimeout(loadApp, 10);
		return;
	}

	$('.flipbook .double').scissor();

	// Create the flipbook

	$('.flipbook').turn({
			// Elevation

			elevation: 50,
			
			// Enable gradients

			gradients: true,
			
			// Auto center this flipbook

			autoCenter: true

	});
}

// Load the HTML4 version if there's not CSS transform

yepnope({
	test : Modernizr.csstransforms,
	yep: ['lib/turn.min.js'],
	nope: ['lib/turn.html4.min.js'],
	both: ['lib/scissor.min.js', 'css/double-page.css'],
	complete: loadApp
});

</script>
</body>
</html>
