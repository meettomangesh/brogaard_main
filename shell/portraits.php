<?php 
	$menupath ='portfolio';
	require_once(dirname(__FILE__) . '/' . "auth.php");
	checkSession();
	include("../includes/server_config.php"); 
	include("../database/connection.php");
	include("../includes/brogaard_portfolio.php");
	//Object is created
	$bp = new brogaard_portfolio;
	if(isset($_GET['gal_id']))
	{
		$gal_id = $_GET['gal_id'];
		$b_gal_images = $bp->WS_GET_BROGAARD_GAL_IMAGES($gal_id);
	}
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
    
	<link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?><?php echo $siteurl;?>css/default.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>css/component.css" />
        
    <link rel="stylesheet" href="/wss/fonts?family=Myriad+Set+Pro&amp;weights=200,400,600&amp;v=1" />
    
	<!--/CSS Styles-->
	
	<!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
    <!-- /Mobile Specific Metas --> 


	<!-- Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=PT+Sans:100,200,300,400,700,400italic,700italic' rel='stylesheet' type='text/css'>

 
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

<!--<script type="text/javascript">
if (screen.width >= 719) {
	document.getElementsByClassName("thumbHolder").style.display=none;
}
-->
</head>

<body style="background:#ccc;">

<!--Header Start-->
<header>

 <!-- new menu added -->
 <div class="navbar navbar-custom navbar-fixed-top" style="opacity:0.9 !important;">
           <?php include("../includes/menu.php");?>
            </div>
 <!-- new menu close -->

	
    </header>
    <!--Header End-->
    
         <!-- wrapper for the whole component -->
         <div id="componentWrapper">
         
          	  <div class="componentHolder" style="background:rgba(0,0,0,0.3)!important;">
         
                  <div class="mediaHolder1"></div>
                  <div class="mediaHolder2"></div>
                  
                      
                  <!-- playlist -->
                  <div class="componentPlaylist">
                      
                     <div class="menuHolder">
                         <div class="menuWrapper">
                         </div>
                     </div>
                     
                     <!--Playlist Image-->
                     <div class="thumbHolder">
                         <div class="thumbWrapper">
                 
                             <!--Category 3 Start-->
                             <div style="background:#000;" class="playlist" data-address='category_3_zoom' data-title='category 3' data-transitionType='zoom' data-imageFitMode='fit-inside' data-duration='4000' data-transitionTime='1000' data-transitionEase='easeOutSine' data-bgColor='rgba(0,0,0,0.9)' data-playlistSize='165'>
                                   <ul> 
                                      <?php
									  for($i=1;$i<count($b_gal_images);$i++)
									  {
									  ?>
                                      <li data-address='image<?=$i?>' class='playlistItem3' data-caption-id="#caption_<?=$i?>" data-imagePath='<?php $basehref; ?>/clientadmin/portfolio_galleries/<?=$b_gal_images[$i]['GAL_NAME']?>/portfolio_large/<?=$b_gal_images[$i]['H_TITLE']?>' data-link='#' data-target='_self'><a href='#'><img src='<?php $basehref; ?>/clientadmin/portfolio_galleries/<?=$b_gal_images[$i]['GAL_NAME']?>/portfolio_small/<?=$b_gal_images[$i]['H_TITLE']?>' width='120' height='100' alt='thumbnail'/></a></li>
                                      <?php
									  }
									  ?>
                                  </ul>  
                             </div>
                             <!--Category 3 End-->
                             
                            </div>
                     </div>  
                     
                      <!-- menu buttons -->
                     <div class="prevMenuBtn"><img src='media/data/gallery_icons/playlist_prev_h.png' width='12' height='18' alt=''/></div>   
                     <div class="nextMenuBtn"><img src='media/data/gallery_icons/playlist_next_h.png' width='12' height='18' alt=''/></div> 
                     
                     <!-- thumb buttons -->
                     <div class="prevThumbBtn"><img src='media/data/gallery_icons/playlist_prev_h.png' width='12' height='18' alt=''/></div>   
                     <div class="nextThumbBtn"><img src='media/data/gallery_icons/playlist_next_h.png' width='12' height='18' alt=''/></div>  
                     
                     <!-- playlist toggle -->
                     <div class="playlist_toggle"><img src='media/data/gallery_icons/plus.png' width='30' height='30' alt='playlist_toggle'/></div>
                  </div>
                  
              </div> 
              
              <!-- fullscreen btn (automatically removed if browser doesnt support fullscreen) -->
              <div class="gallery_fullscreen"><img src='media/data/gallery_icons/fullscreen_enter.png' width='30' height='30' alt=''/></div>
              
           
              <!-- slideshow controls - previous,pause/play,next -->
              <div class="slideshow_controls">
              	  <div class="controls_next"><img src='media/data/gallery_icons/next.png' width='30' height='30' alt='controls_next'/></div>
                  <div class="controls_toggle"><img src='media/data/gallery_icons/play.png' width='30' height='30' alt='controls_toggle'/></div>
                  <div class="controls_prev"><img src='media/data/gallery_icons/prev.png' width='30' height='30' alt='controls_prev'/></div>
              </div>
              
              <!-- data controls - link/description -->
              <div class="data_controls">
                  <div class="info_toggle"><img src='media/data/gallery_icons/info.png' width='30' height='30' alt='info_toggle'/></div>
                   <div id="link" class="link_toggle"><img src='media/data/gallery_icons/close.png' width='33' height='33' alt='link_toggle'/></div>
               </div>
               
              <!-- description holder -->
              <div class="info_holder"></div>
              
              <!-- preloader for images -->
              <div class="componentPreloader"></div>  
              
              <!-- video player -->
              <div class="videoPlayer">
             
             	             
             <!-- List of audio playlists -->
             <div id="playlist_list">
                         
                 <!-- local playlist -->
                
                 
                 <ul id='audio_playlist2'>
                     <li class= "playlistItem" data-type='local' data-mp3Path="media/audio/2/Nobody_-_You_are_the_one.mp3" 		 data-oggPath="media/audio/2/Nobody_-_You_are_the_one.ogg"><a class="playlistNonSelected" href='#'>Nobody - You are the one</a></li>
                    
                 </ul>
                 
                               
    
             </div>
             
        </div> 
      <script>
          $('#link').click(function () {
    window.location = 'http://www.brogaard.com/shell/galleryindex.php';
    return false;
});
</script>
   		
<script type="text/javascript" src="<?php echo $siteurl;?>js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<?php echo $siteurl;?>js/jquery-easing-1.3.js"></script>

<!--Flexy Menu Script-->
<script type="text/javascript" src="<?php echo $siteurl;?>js/flexy-menu.js"></script>

<!--Multitransition Gallery Sliders Script-->
<script type="text/javascript" src="<?php echo $siteurl;?>js/jquery.address.js"></script>
<script type="text/javascript" src="<?php echo $siteurl;?>js/jquery.cj-swipe.js"></script>
<script type="text/javascript" src="<?php echo $siteurl;?>js/swfobject.js"></script>
<script type="text/javascript" src="<?php echo $siteurl;?>js/froogaloop.js"></script>
<!--<script type="text/javascript" src="http://www.youtube.com/player_api"></script>-->
<!--<script type="text/javascript" src="js/jquery.apYoutubePlayer.min.js"></script>-->
<!--<script type="text/javascript" src="js/jquery.apVimeoPlayer.min.js"></script>-->
<script type="text/javascript" src="<?php echo $siteurl;?>js/jquery.videoGallery.min.js"></script>
<script type="text/javascript" src="<?php echo $siteurl;?>js/soundmanager2-nodebug-jsmin.js" ></script>
<script type="text/javascript" src="<?php echo $siteurl;?>js/jquery.apPlaylistManager.min.js"></script>
<script type="text/javascript" src="<?php echo $siteurl;?>js/jquery.apTextScroller.min.js"></script>
<script type="text/javascript" src="<?php echo $siteurl;?>js/jquery.html5audio.min.js"></script>
<script type="text/javascript" src="<?php echo $siteurl;?>js/jquery.multiGallery.min.js"></script>

        <script type="text/javascript">

			// GALLERY INSTANCES
			var gallery1;  
			
			jQuery(document).ready(function($) {
				jsReady = true;
				gallery1 = $('#componentWrapper').multiGallery(kb_settings, ap_settings);
				kb_settings = null;
				ap_settings = null;
			
			// FLEXY MENU SETTING
			$(".flexy-menu").flexymenu({
                align: "right",
				indicator: true
            	});
			});

			/* GALLERY CALLBACKS */
			function multiGallerySetupDone(){
				/* called when component is ready to receive public function calls */
				//console.log('multiGallerySetupDone');
			}
			function beforeSlideChange(slideNum){
				//function called before slide change (plus slide number returned, counting starts from 0)
				//console.log('beforeSlideChange, slideNum = ', slideNum);
			}
			function afterSlideChange(slideNum){
				//function called after slide change (plus slide number returned, counting starts from 0)
				//console.log('afterSlideChange, slideNum = ', slideNum);
			}
			/* END GALLERY CALLBACKS */
		
			/* VIDEO PLAYER SETTINGS FLASH */
			//flash embed part
			var flashvars = {};
			var params = {};
			var attributes = {};
			attributes.id = "flashPreview";
			params.quality = "high";
			params.scale = "noscale";
			params.salign = "tl";
			params.wmode = "transparent";
			params.bgcolor = "#111";
			params.devicefont = "false";
			params.allowfullscreen = "true";
			params.allowscriptaccess = "always";
			swfobject.embedSWF("preview.html", "flashPreview", "100%", "100%", "9.0.0", "expressInstall.html", flashvars, params, attributes);
			
			//functions called from flash
			var jsReady = false;//for flash/js communication
			function flashVideoEnd() {jQuery.fn.videoGallery.flashVideoEnd();}
			function flashVideoStart() {jQuery.fn.videoGallery.flashVideoStart();}
			function dataUpdateFlash(bl,bt,t,d) {jQuery.fn.videoGallery.dataUpdateFlash(bl,bt,t,d);}
			function flashVideoPause() {jQuery.fn.videoGallery.flashVideoPause();}
			function flashVideoResume() {jQuery.fn.videoGallery.flashVideoResume();}
			function flashMainPreviewOff() {jQuery.fn.videoGallery.flashMainPreviewOff();}
			function flashResizeControls() {jQuery.fn.videoGallery.flashResizeControls();}
			function getSlideshowForcePause() {return jQuery.fn.multiGallery.getSlideshowForcePause();}
			function videoEnd() {jQuery.fn.multiGallery.videoEnd();}
			function isReady() {return jsReady;}
			/* END VIDEO PLAYER SETTINGS FLASH */
			
			/* AUDIO PLAYER SETTINGS */
			//sound manager settings (http://www.schillmania.com/projects/soundmanager2/)
			soundManager.setup({
				url: 'audio_swf/', // path to SoundManager2 SWF files
				allowScriptAccess: 'always', 
				debugMode: false,
				noSWFCache: true,
				useConsole: false,
				waitForWindowLoad: true,
			    flashVersion: 9,
				useFlashBlock: true,
			    preferFlash: false,
				useHTML5Audio: true
			});
			
			var audio = document.createElement('audio'), mp3Support, oggSupport;
			if (audio.canPlayType) {
			 	mp3Support = !!audio.canPlayType && "" != audio.canPlayType('audio/mpeg');//setting this will use html5 audio on all html5 audio capable browsers ('modern browsers'), flash on the rest ('older browsers')
                //mp3Support=true;//setting this will use html5 audio on modern browsers that support 'mp3', flash on the rest of modern browsers that support 'ogv' like firefox and opera, and of course flash on the rest ('older browsers') 
                oggSupport = !!audio.canPlayType && "" != audio.canPlayType('audio/ogg; codecs="vorbis"');
			}else{
				mp3Support = true;
				oggSupport = false;
			}
			//console.log('mp3Support = ', mp3Support, ' , oggSupport = ', oggSupport);
			
			/*
			FF - false, true
			OP - false, true
			
			IE9 - true, false 
			SF - true, false 
			
			CH - true, true
			*/
		
		    soundManager.audioFormats = {
			  'mp3': {
				'type': ['audio/mpeg; codecs="mp3"', 'audio/mpeg', 'audio/mp3', 'audio/MPA', 'audio/mpa-robust'],
				'required': mp3Support
			  },
			  'mp4': {
				'related': ['aac','m4a'],
				'type': ['audio/mp4; codecs="mp4a.40.2"', 'audio/aac', 'audio/x-m4a', 'audio/MP4A-LATM', 'audio/mpeg4-generic'],
				'required': false
			  },
			  'ogg': {
				'type': ['audio/ogg; codecs=vorbis'],
				'required': oggSupport
			  },
			  'wav': {
				'type': ['audio/wav; codecs="1"', 'audio/wav', 'audio/wave', 'audio/x-wav'],
				'required': false
			  }
			};
			
			var ap_settings = {
				/* playerHolder: dom elements which holds the whole player */
				playerHolder: '.audioPlayer',
				/* playlistHolder: dom elements which holds list of playlists */
				playlistHolder: '#playlist_list',
				/* activePlaylist: set active playlist that will be loaded on beginning. 
				Leave empty for none like this: activePlaylist: '' */
				activePlaylist: '#audio_playlist2',
				/* activeItem: active item to start with when playlist is loaded (0 = first, 1 = second, 2 = third... -1 = none) */
				activeItem: 0,
				/* sound_id: unique string for soundmanager sound id (if multiple player instances were used, then strings need to be different) */
				sound_id: 'sound_id1',
	
				/*defaultVolume: 0-1 (Irrelevant on ios mobile) */
				defaultVolume:0.5,
				/*autoPlay: true/false (false on mobile by default) */
				autoPlay:true,
				/*autoLoad: true/false (auto start sound load) */
				autoLoad:true,
				/*randomPlay: true/false */
				randomPlay:false,
				/*loopingOn: true/false (loop on the end of the playlist) */
				loopingOn:true,
				
				/* autoSetSongTitle: true/false. Auto set song title in 'player_mediaName'. */
				autoSetSongTitle: true,
				
				/* useSongNameScroll: true/false. Use song name scrolling. */
				useSongNameScroll: true,
				/* scrollSpeed: speed of the scroll (number higher than zero). */
				scrollSpeed: 1,
				/* scrollSeparator: String to append between scrolling song name. */
				scrollSeparator: '&nbsp;&#42;&#42;&#42;&nbsp;',
				
				/* buttonsUrl: url of the buttons for normal and rollover state */
				buttonsUrl: {prev: 'media/data/audio_icons/prev.png', prevOn: 'media/data/audio_icons/prev_on.png', 
							 next: 'media/data/audio_icons/next.png', nextOn: 'media/data/audio_icons/next_on.png', 
							 pause: 'media/data/audio_icons/pause.png', pauseOn: 'media/data/audio_icons/pause_on.png',
							 play: 'media/data/audio_icons/play.png', playOn: 'media/data/audio_icons/play_on.png',
							 volume: 'media/data/audio_icons/volume.png', volumeOn: 'media/data/audio_icons/volume_on.png', 
							 mute: 'media/data/audio_icons/mute.png', muteOn: 'media/data/audio_icons/mute_on.png'},
				/* useAlertMessaging: Alert error messages to user (true / false). */
				useAlertMessaging: true,
				/* autoOpenAudioPlayer: true / false */
				autoOpenAudioPlayer: false
			};
			
			/* END AUDIO PLAYER SETTINGS */
			
			/* GALLERY SETTINGS */
			var kb_settings = {
				/* GENERAL */
				/* componentHolder: dom element which holds the whole component */
				componentHolder: '#componentWrapper',
				/* componentFixedSize: true/false. Responsive = false, fixed = true */
				componentFixedSize: false,
				/* disableRightClick: true/false  */
				disableRightClick: true,
				/* forceImageFitMode: true/false. By default, only images bigger than component size will get proportionally resized to 'fit inside' or 'fit outside' mode. If this is true, all images will be forced into that mode. */
				forceImageFitMode: true,
				
				/* DEEPLINKING SETTINGS */
				/* useDeeplink: true/false */
				useDeeplink:true,
				/* startUrl: deeplink start url, enter 'div' data-address/'li' data-address (two levels). Or just 'div' data-address (single level). */
				startUrl: 'category_3_zoom/image1',
				
				/* NO DEEPLINKING SETTINGS */
				/* activeCategory: active category to start with (counting starts from zero, 0=first category, 1=second category, 2=third category... etc) */
				activeCategory:0,
				
				/* SLIDESHOW */
				/* slideshowOn; true, false */
				slideshowOn: true,
				/* useGlobalDelay; true, false (use same timer delay for all slides, if false you need to set individual delays for every slide -> data-duration attribute) */
				useGlobalDelay: true,
				/* slideshowAdvancesToNextCategory: true/false. On the end of current category, go to next one, instead of loop current one. */
				slideshowAdvancesToNextCategory: false,
				/* randomPlay; true, false (random image play in category) */
				randomPlay: false,
				
				/* DESCRIPTION */
				/* autoOpenDescription; true/false (automatically open description, if exist)  */
				autoOpenDescription: false,
				/* maxDescriptionWidth: max width of the description */
				maxDescriptionWidth: 250,
				
				/* PLAYLIST */
				/* autoAdjustPlaylist: true/false (auto adjust thumb playlist and playlist buttons) */
				autoAdjustPlaylist: true,
				/* playlistPosition: top, right, left, bottom  */
				playlistPosition: 'bottom',
				/* autoOpenPlaylist: true/false. Auto open playlist on beginning */
				autoOpenPlaylist: false,
				/* playlistHidden: true/false. (leave css display none on componentPlaylist) */
				playlistHidden: false,
				/* playlistIndex: inside/outside ('outside' opens above the image, while 'inside' sits outside of the image area and cannot be closed)  */
				playlistIndex: 'inside',
				
				/* MENU */
				/* menuOrientation: horizontal/vertical  */
				menuOrientation: 'horizontal',
				/* menuItemOffOpacity: opacity of menu item when inactive */
				menuItemOffOpacity:0.5,
				/* menuBtnSpace: space between menu buttons and the menu (enter 0 or more) */
				menuBtnSpace: 30,
				/* visibleMenuItems: visible menu items by default. Enter number (if they dont fit into provided area, the code will automatically reduce this number) or 'max' (maximum number that fits). */
				visibleMenuItems: 'max',
				/* fixMenu: true/false. false by default (menu centered). Can be true ONLY if 'visibleMenuItems' != 'max'. 
				Set this to true to fix it to one side. */
				fixMenu: false,
				/* fixMenuSettings: (if fixMenu = true), param1: side: -> left/right if menuOrientation = horizontal, top/bottom if menuOrientation = vertical, 
														 param2: value -> offset value in px from that side */
				fixMenuSettings: {side: 'top',value: 100},
				
				/* THUMBNAILS */
				/* thumbOrientation: horizontal/vertical  */
				thumbOrientation: 'horizontal',
				/* thumbOffOpacity: opacity of thumb when inactive */
				thumbOffOpacity:0.5,
				/* visibleThumbs: visible thumb items by default. Enter number (if they dont fit into provided area, the code will automatically reduce this number) or 'max' (maximum number that fits). */
				visibleThumbs: 'max',
				/* thumbBtnSpace:  space between thumb buttons and the thumbs (enter 0 or more) */
				thumbBtnSpace: 30,
				/* fixThumbs: true/false. false by default (thumbs centered). Can be true ONLY if 'visibleThumbs' != 'max'. 
				Set this to true to fix it to one side. */
				fixThumbs: false,
				/* fixThumbsSettings:  (if fixThumbs = true), param1: side -> left/right if thumbOrientation = horizontal, top/bottom if thumbOrientation = vertical,
															  param2: value -> offset value in px from that side */
				fixThumbsSettings: {side: 'top',value: 100},
				
				/* VIDEO SETTINGS */
				/* useVideo: true/false */
				useVideo: true,
				/* videoVolume: default volume for video (0-1) */
				videoVolume: 0.5,
				/* videoAutoPlay: true/false (Defaults to false on mobile) */
				videoAutoPlay: false,
				/* includeVideoInSlideshow: true/false (on video end resume slideshow, only if slideshow was playing before video request) */
				includeVideoInSlideshow: false,
				/* videoLoop: true/false (only if includeVideoInSlideshow = false) */
				videoLoop: false,
				/*playerBgOpacity: background opacity behind the video player when its opened (0-1) */
				playerBgOpacity:0.8,
				/*playerHolder: dom elements which holds the whole player */
				playerHolder:'#componentWrapper .videoPlayer',
				/*flashHolder: id of the flash movie */
				flashHolder:'#flashPreview',
				
				/* AUDIO SETTINGS */
				/* useAudio: true/false */
				useAudio: true
			};
			
			/* END GALLERY SETTINGS */

        </script>
        
    <!-- javascript Plugins-->    
    <script type="text/javascript" src="<?php echo $siteurl;?>assets/js/vendors/bootstrap.min.js"></script>
    
	<!-- /javascript Plugins-->
<?php include ("../includes/brogaard_footer2.php"); ?>
</body>
</html>
