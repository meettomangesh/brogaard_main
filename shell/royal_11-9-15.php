<?php 
$menupath='royal';
	require_once(dirname(__FILE__) . '/' . "auth.php");
	checkSession();
	include("../includes/server_config.php"); 
	include("../database/connection.php");
	include ("../includes/brogaard_head.php");
	include ("../includes/royal_home.php");
	$RH = new royal_home;
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>Steen Brogaard Photography</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="Polaroid Photobar Gallery" />
        <meta name="keywords" content="polaroid, jquery, css3, rotation, image gallery"/>
		<link rel="shortcut icon" href="<?php echo $siteurl;?>assets/img/favicon.ico" type="image/x-icon"/>
        <link rel="stylesheet" href="<?php echo $siteurl;?>css/style-royal.css" type="text/css" media="screen"/>
        <!-- menu -->
        <link rel="stylesheet" href="<?php echo $siteurl;?>css/stylemenu.css" type="text/css" media="screen"/>
        <link rel="stylesheet" href="<?php echo $siteurl;?>css/bootstrap.min.css" type="text/css" media="screen"/>
        <link rel="stylesheet" href="<?php echo $siteurl;?>css/component.css" type="text/css" media="screen"/>
         <link rel="stylesheet" href="<?php echo $siteurl;?>assets/css/vendors/Pe-icon-7-stroke.css" type="text/css" media="screen"/>
         <link rel="stylesheet" href="<?php echo $siteurl;?>assets/css/vendors/bootstrap.css" type="text/css" media="screen"/>
         
        
        <!-- menu end -->
        <link href="<?php echo $siteurl;?>css/bannerscollection_zoominout.css" rel="stylesheet" type="text/css">
		<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>-->
       <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo $siteurl;?>js/jquery-1.10.1.min.js"></script>
        <script>
					$.noConflict();
					// Code that uses other library's $ can follow here.
				</script>
        <!--- default slider script-->
           <script src="<?php echo $siteurl;?>js/jquery-min-2.1.3.js"></script>
		
         <script type="text/javascript" src="<?php echo $siteurl;?>js/jquery.min.js"></script>
        <!-- popup -->
         
         <script type="text/javascript" src="<?php echo $siteurl;?>js/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>css/jquery.fancybox.css?v=2.1.5" media="screen" />
        <script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */
             
			$('.fancybox').fancybox();
			
			$('.fancybox1').fancybox();
			
			$('.fancybox2').fancybox();
			
			$('.fancybox3').fancybox();

			/*
			 *  Different effects
			 */

			// Change title type, overlay closing speed
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

			// Disable opening and closing animations, change title type
			$(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});

			// Remove padding, set opening and closing animations, close if clicked and disable overlay
			$(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,

				helpers : {
					overlay : null
				}
			});

			/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});


			/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

			$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : false,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});

			/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			*/
			$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});

		});
	</script>

        <!-- popup end-->
        <!-- slider start -->
        <script>
		jQuery(function() {
			jQuery('#bannerscollection_zoominout_generous').bannerscollection_zoominout({
				skin: 'generous',
				responsive:true,
				width: 1920,
				height: 1200,
				width100Proc:true,
				height100Proc:true,
				fadeSlides:1,
				showNavArrows:true,
				showBottomNav:true,
				thumbsOnMarginTop:11,
				thumbsWrapperMarginTop: -110,
				autoHideBottomNav:false,
				pauseOnMouseOver:false
			});		
			
		});
	</script>
        <!-- <script src="<?php echo $siteurl;?>js/prefixfree.min.js"></script>-->
        <!-- slider end --->
       <!-- <script>
		 function toggle_visibility(id) {
			 
       var e = document.getElementById(abc);
	   alert("Hello");
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
    }
		</script>-->
        <style>
        li{ list-style:none;}
        
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
  width: 137px;
  height: 50px;
  top: 46px;
  right: 36px;
  z-index:9999;
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
        </style>
        </head>

    <body style="background:#fff;" >
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
<div class="link-div" >
                 <div class="buttons-inline animated bounceInRight slower go" data-id="4"><a class="btn submit-button" href="http://www.brogaard.com/shell/royal_regi.php">Royal Registraion</a></div>
                </div>

<div id="bannerscollection_zoominout_generous">
            	<div class="myloader"></div>
                <!-- CONTENT -->
                <ul class="bannerscollection_zoominout_list">
                
                <?php
				$royal_dir = $RH->WS_GET_BROGAARD_ROYAL_ALL_IMG();
				 for($i=0;$i<count($royal_dir);$i++){ 
					
				$image_thumb = $siteurl.'clientadmin/royal_galleries/'.$royal_dir[$i]['GAL_NAME'].'/thumb/'.$royal_dir[$i]['H_TITLE'];
				$image_org = $siteurl.'clientadmin/royal_galleries/'.$royal_dir[$i]['GAL_NAME'].'/org/'.$royal_dir[$i]['H_TITLE'];
				?>
               		<li data-initialZoom="1" data-finalZoom="0.78" data-horizontalPosition="center" data-verticalPosition="top" data-text-id="#bannerscollection_zoominout_photoText1" data-bottom-thumb="<?php echo $image_thumb;?>" ><img src="<?php echo $image_org;?>" alt="" width="<?php echo $royal_dir[$i]['H_IMG_W'];?>" height="<?php echo $royal_dir[$i]['H_IMG_H'];?>" /></li>
                    
                    <?php }?>
                    
                </ul>    
                                           
           </div>
    
		<div id="pp_gallery" class="pp_gallery">
			
			<div id="pp_loading" class="pp_loading"></div>
			<div id="pp_next" class="pp_next"></div>
			<div id="pp_prev" class="pp_prev"></div>
			<div id="pp_thumbContainer">
			<?php $royal_all = $RH->WS_ROYAL_GALLERIES();
			
			for($j=0;$j<count($royal_all);$j++){?>
				<div  class="album demo clearfix">
                <ul>
                <?PHP $royal_all_thumb = $RH->WS_ROYAL_GALLERIES_IMAGES($royal_all[$j]['GAL_ID']); 
				
				for($k=0;$k<count($royal_all_thumb);$k++){
					
				$image_thumb1 = $siteurl.'clientadmin/royal_galleries/'.$royal_all[$j]['GAL_NAME'].'/thumb/'.$royal_all_thumb[$k]['H_TITLE'];
				
				$image_org1 = $siteurl.'clientadmin/royal_galleries/'.$royal_all[$j]['GAL_NAME'].'/org/'.$royal_all_thumb[$k]['H_TITLE'];
				?>
                   <li>
					<div class="content">
                    <a class="fancybox" href="<?php echo $image_org1;?>" data-fancybox-group="gallery"   title="<?php echo $royal_all_thumb[$k]['H_IMAGE_NAME'];?>"><img src="<?php echo $image_thumb1;?>"/></a>
					</div>
                    </li>
                    <?php }?>
                 </ul>
					<div class="descr">
						<?php echo $royal_all[$j]['GAL_NAME']; ?>
					</div>
                    
				</div><!-- 1 st cate end -->
             <?php }?>       

				<div id="pp_back" class="pp_back">Albums</div>
			</div>
		</div>
        <div>
            
		</div>

        <!-- The JavaScript -->
		<script src="<?php echo $siteurl;?>js/jquery.transform-0.8.0.min.js"></script>
       <script type="text/javascript">
            $(function() {
				var ie 			= false;
				if ($.browser.msie) {
					ie = true;
				}
				//current album/image displayed 
				var enableshow  = true;
				var current		= -1;
				var album		= -1;
				//windows width
				var w_width 	= $(window).width();
				//caching
				var $albums 	= $('#pp_thumbContainer div.album');
				var $loader		= $('#pp_loading');
				var $next		= $('#pp_next');
				var $prev		= $('#pp_prev');
				var $images		= $('#pp_thumbContainer div.content img');
				var $back		= $('#pp_back');
				
				//we wnat to spread the albums through the page equally
				//number of spaces to divide with:number of albums plus 1
				var nmb_albums	= $albums.length;
				var spaces 		= w_width/(nmb_albums+1);
				var cnt			= 0;
				//preload all the images (thumbs)
				var nmb_images	= $images.length;
				var loaded  	= 0;
				$images.each(function(i){
					var $image = $(this);
					$('<img />').load(function(){
						++loaded;
						if(loaded == nmb_images){
							//let's spread the albums equally on the bottom of the page
							$albums.each(function(){
								var $this 	= $(this);
								++cnt;
								var left	= spaces*cnt - $this.width()/2;
								$this.css('left',left+'px');
								$this.stop().animate({'bottom':'0px'},500);
							}).unbind('click').bind('click',spreadPictures);
							//also rotate each picture of an album with a random number of degrees
							$images.each(function(){
								var $this 	= $(this);
								var r 		= Math.floor(Math.random()*41)-20;
								$this.transform({'rotate'	: r + 'deg'});
							});
						}
					}).attr('src', $image.attr('src'));
				});
				
				function spreadPictures(){
					var $album 	= $(this);
					//track which album is opened
					album		= $album.index();
					//hide all the other albums
					$albums.not($album).stop().animate({'bottom':'-90px'},300);
					$album.unbind('click');
					//hide default slider
					document.getElementById("contentHolderVisibleWrapper").style.display="none";
					document.getElementById("bannerControls").style.display="none";
					//now move the current album to the left 
					//and at the same time spread its images through 
					//the window, rotating them randomly. Also hide the description of the album
					
					//store the current left for the reverse operation
					$album.data('left',$album.css('left'))
						  .stop()
						  .animate({'left':'0px'},500).find('.descr').stop().animate({'bottom':'-30px'},200);
					var total_pic 	= $album.find('.content').length;
					var cnt			= 0;
					//each picture
					$album.find('.content')
						  .each(function(){
						var $content = $(this);
						++cnt;
						//window width
						var w_width 	= $(window).width();
						var spaces 		= w_width/(total_pic+1);
						var left		= (spaces*cnt) - (140/2);
						var r 			= Math.floor(Math.random()*41)-20;
						//var r = Math.floor(Math.random()*81)-40;
						$content.stop().animate({'left':left+'px'},500,function(){
							$(this).unbind('click')
								   .bind('click',showImage)
								   .unbind('mouseenter')
								   .bind('mouseenter',upImage)
								   .unbind('mouseleave')
								   .bind('mouseleave',downImage);
						}).find('img')
						  .stop()
						  .animate({'rotate': r+'deg'},300);
						$back.stop().animate({'left':'0px'},300);
					});
				}
				
				//back to albums
				//the current album gets its innitial left position
				//all the other albums slide up
				//the current image slides out
				$back.bind('click',function(){
					$back.stop().animate({'left':'-100px'},300);
					hideNavigation();
					//there's a picture being displayed
					//lets slide the current one up
					if(current != -1){
						hideCurrentPicture();
					}
					
					var $current_album = $('#pp_thumbContainer div.album:nth-child('+parseInt(album+1)+')');
					$current_album.stop()
								  .animate({'left':$current_album.data('left')},500)
								  .find('.descr')
								  .stop()
								  .animate({'bottom':'0px'},500);
					
					$current_album.unbind('click')
								  .bind('click',spreadPictures);
					
					$current_album.find('.content')
							  .each(function(){
								var $content = $(this);
								$content.unbind('mouseenter mouseleave click');
								$content.stop().animate({'left':'0px'},500);
								});
								
					$albums.not($current_album).stop().animate({'bottom':'0px'},500);
					document.getElementById("contentHolderVisibleWrapper").style.display="block";
					document.getElementById("bannerControls").style.display="block";
				});
				
				//displays an image (clicked thumb) in the center of the page
				//if nav is passed, then displays the next / previous one of the 
				//current album
				function showImage(nav){
					if(!enableshow) return;
					enableshow = false;
					if(nav == 1){
						//reached the first one
						if(current==0){
							enableshow = true;
							return;
						}
						var $content 			= $('#pp_thumbContainer div.album:nth-child('+parseInt(album+1)+')')
												  .find('.content:nth-child('+parseInt(current)+')');
						//reached the last one
						if($content.length==0){
							enableshow = true;
							current-=2;
							return;
						}	
					}
					else
						var $content 			= $(this);
					
					//show ajax loading image
					$loader.show();
					
					//there's a picture being displayed
					//lets slide the current one up
					if(current != -1){
						hideCurrentPicture();
					}
					
					current 				= $content.index();
					var $thumb				= $content.find('img');
					var imgL_source 	 	= $thumb.attr('alt');
					var imgL_description 	= $thumb.next().html();
					//preload the large image to show
					$('<img style=""/>').load(function(){
						var $imgL 	= $(this);
						//resize the image based on the windows size
						resize($imgL);
						//create an element to include the large image
						//and its description
						var $preview = $('<div />',{
							'id'		: 'pp_preview',
							'className'	: 'pp_preview',
							'html'     	: '<div class="pp_descr"><span>'+imgL_description+'</span></div>',
							'style'		: 'visibility:hidden;'
						});
						$preview.prepend($imgL);
						$('#pp_gallery').prepend($preview);
						
						var largeW 				= $imgL.width()+20;
						var largeH 				= $imgL.height()+10+45;
						//change the properties of the wrapping div 
						//to fit the large image sizes
						$preview.css({
							'width'			:largeW+'px',
							'height'		:largeH+'px',
							'marginTop'		:-largeH/2-20+'px',
							'marginLeft'	:-largeW/2+'px',
							'visibility'	:'visible'
						});
						Cufon.replace('.pp_descr');
						//show navigation
						showNavigation();
						
						//hide the ajax image loading
						$loader.hide();
						
						//slide up (also rotating) the large image
						var r 			= Math.floor(Math.random()*41)-20;
						if(ie)
							var param = {
								'top':'50%'
							};
						else
							var param = {
								'top':'50%',
								'rotate': r+'deg'
							};
						$preview.stop().animate(param,500,function(){
							enableshow = true;
						});
					}).error(function(){
						//error loading image. Maybe show a message : 'no preview available'?
					}).attr('src',imgL_source);	
				}
				
				//click next image
				$next.bind('click',function(){
					current+=2;
					showImage(1);
				});
				
				//click previous image
				$prev.bind('click',function(){
					showImage(1);
				});
				
				//slides up the current picture
				function hideCurrentPicture(){
					current = -1;
					var r 	= Math.floor(Math.random()*41)-20;
					if(ie)
						var param = {
							'top':'-150%'
						};
					else
						var param = {
							'top':'-150%',
							'rotate': r+'deg'
						};
					$('#pp_preview').stop()
									.animate(param,500,function(){
										$(this).remove();
									});
				}
				
				//shows the navigation buttons
				function showNavigation(){
					$next.stop().animate({'right':'0px'},100);
					$prev.stop().animate({'left':'0px'},100);
				}
				
				//hides the navigation buttons
				function hideNavigation(){
					$next.stop().animate({'right':'-40px'},300);
					$prev.stop().animate({'left':'-40px'},300);
				}
				
				//mouseenter event on each thumb
				function upImage(){
					var $content 	= $(this);
					$content.stop().animate({
						'marginTop'		: '-70px'
					},400).find('img')
						  .stop()
						  .animate({'rotate': '0deg'},400);
				}
				
				//mouseleave event on each thumb
				function downImage(){
					var $content 	= $(this);
					var r 			= Math.floor(Math.random()*41)-20;
					$content.stop().animate({
						'marginTop'		: '0px'
					},400).find('img').stop().animate({'rotate': r + 'deg'},400);
				}
				
				//resize function based on windows size
				function resize($image){
					var widthMargin		= 50
					var heightMargin 	= 200;
					
					var windowH      = $(window).height()-heightMargin;
					var windowW      = $(window).width()-widthMargin;
					var theImage     = new Image();
					theImage.src     = $image.attr("src");
					var imgwidth     = theImage.width;
					var imgheight    = theImage.height;

					if((imgwidth > windowW)||(imgheight > windowH)){
						if(imgwidth > imgheight){
							var newwidth = windowW;
							var ratio = imgwidth / windowW;
							var newheight = imgheight / ratio;
							theImage.height = newheight;
							theImage.width= newwidth;
							if(newheight>windowH){
								var newnewheight = windowH;
								var newratio = newheight/windowH;
								var newnewwidth =newwidth/newratio;
								theImage.width = newnewwidth;
								theImage.height= newnewheight;
							}
						}
						else{
							var newheight = windowH;
							var ratio = imgheight / windowH;
							var newwidth = imgwidth / ratio;
							theImage.height = newheight;
							theImage.width= newwidth;
							if(newwidth>windowW){
								var newnewwidth = windowW;
								var newratio = newwidth/windowW;
								var newnewheight =newheight/newratio;
								theImage.height = newnewheight;
								theImage.width= newnewwidth;
							}
						}
					}
					$image.css({'width':theImage.width+'px','height':theImage.height+'px'});
				}
            });
        </script>
        
				<!--<script>
					$.noConflict();
					// Code that uses other library's $ can follow here.
				</script>
        <!--- default slider script--
           <script src="slider/js/jquery-min-2.1.3.js"></script>-->
        <!-- default script end --->
        
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
        <script src="<?php echo $siteurl;?>js/jquery.ui.touch-punch.min.js" type="text/javascript"></script>
<script src="<?php echo $siteurl;?>js/bannerscollection_zoominout.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo $siteurl;?>assets/js/vendors/bootstrap.min.js"></script>
    </body>
    <?php include ("../includes/brogaard_footer.php"); ?>
</html>