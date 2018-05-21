
//----Include-Function----
function include(url){ 
  document.write('<script type="text/javascript" src="js/'+ url + '"></script>'); 
  return false ;
}


include('jquery.easing.1.3.js')	
include('jquery.cookie.js')


//==========================menu-mobile	

jQuery(window).load(function() {	
	
	
	var MSIE8 = (jQuery.browser.msie) && (jQuery.browser.version <= 8);
   if(!MSIE8){
	var bgColors = '.preview,header h1 a,.btn-soc span:hover,a.jp-play:hover, a.jp-pause:hover,.soc a:hover,.btn-soc:hover span,.btn-back:hover,#tray-button:hover  span,.button:hover,#search .submit_button:hover,#search .submit_button:hover,#menu-icon:hover span,#menu-icon.active span,.menu-mobile li a.hover:hover,.flex-direction-nav li a:hover ';
    var colors = '.splash-menu a:hover,#hexVal,.top_menu a:hover,.top_menu >ul > li > a:hover, .active > a, .sfHover>a, .menu-portfolio >li> a:hover, .menu-main >li> a:hover,.blog_title:hover,.date,.blog_locat a:hover, .blog_locat a.active_blog,.comments_count:hover,.sidebar h4,.category_list li a:hover, .tweet_list li a:hover,.follow_link:hover,.btn-reply:hover,.name-author:hover,.controll-post a:hover,.comment:hover';  

    var defColor = '#a63343';
	

   // drawing active image
    var image = new Image();
    image.onload = function () {
   
    }


jQuery('head style').remove();
	
 }

 //==========================spinner animate
	 					
 jQuery('.spinner').animate({'opacity':0},1000,'easeOutCubic',function (){jQuery(this).css('display','none')});		
	 
	  //==========================splash animate
	  
 jQuery('header').fadeIn(1000);

						
    jQueryx = jQuery(window).width();
	if(jQueryx > 480)
	{ 
		 	    
		  	
			jQuery('#splash header').stop().delay(2400).animate({top:(jQuery(window).height()/2)-31,opacity:1},1000,'easeOutBack'			     );
			jQuery('#splash-1 header').stop().delay(1000).animate({top:(jQuery(window).height()/2)-31,opacity:1},1000,'easeOutBack');
	 
	 		jQuery(window).resize(function(){
			jQuery('#splash header').stop().animate({top:(jQuery(window).height()/2)-31},500);
			jQuery('#splash-1 header').stop().animate({top:(jQuery(window).height()/2)-31},500);
         	})
	/*  Changing images as per mouse pointer */
		}
	
		
		 
})