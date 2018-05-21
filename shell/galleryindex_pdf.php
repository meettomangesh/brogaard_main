<?php
$menupath='portfolio';
/*|:-> Load system configuration <-:|*/
require_once(dirname(__FILE__) . '/' . "auth.php"); 
checkSession();
include("../includes/server_config.php"); 
include("../database/connection.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr" class="no-js">
<head>


	<title><?php echo lang('site_meta_title'); ?></title>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
	<meta charset="utf-8" />
	<meta name="generator" content="Adobe Photoshop Lightroom, The Turning Gate, http://theturninggate.net" />

	<meta name="author" content="Steen Brogaard" />
	<meta name="description" content="<?php echo lang('site_meta_description'); ?>" />
	<meta name="keywords" content="<?php echo lang('site_meta_keywords'); ?>" />

    <meta property="og:title" content="PHOTOGRAPHER STEEN BROGAARD | PORTRAIT | REPORTAGE | ILLUSTRATIONS | CORPORATE PHOTOGRAPHY | IMAGE BANK"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="http://www.brogaard.com"/>
    <meta property="og:image" content="http://www.brogaard.comthumbnails/Depositphotos_4567971_M_edit.jpg" />
    <meta property="og:site_name" content="PHOTOGRAPHER STEEN BROGAARD | PORTRAIT | REPORTAGE | ILLUSTRATIONS | CORPORATE PHOTOGRAPHY | IMAGE BANK"/>
    <meta property="fb:admins" content="1219993359"/>
    <meta property="og:description" content="Copenhagen based photographer"/>
    
    
    <script type="text/javascript" src="<?php echo $siteurl;?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $siteurl;?>assets/js/vendors/bootstrap.min.js"></script>
  <script src="<?php echo $siteurl;?>js/vendor/modernizr-2.6.2.min.js"></script>
    
 <link rel="image_src" href="./img_gallery_header.jpg" /> 

	<link rel="shortcut icon" type="image/ico" href="<?php echo URL_USER; ?>pages-resources/images/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>assets/css/vendors/font-awesome.min.css"> 
    <link rel="stylesheet" href="<?php echo $siteurl;?>css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>assets/css/vendors/bootstrap.css" >
	<link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>assets/css/vendors/Pe-icon-7-stroke.css">
    <link href="<?php echo $siteurl;?>css/stylemenu.css" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>css/default.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>css/component.css" />
    
	<link rel="stylesheet" href="<?php echo URL_USER; ?>pages-resources/css/common-loggedin.css" />
	<link rel="stylesheet" href="<?php echo URL_USER; ?>pages-resources/css/ttg-autoindex-ce.css" />

	<script type="text/javascript" src="<?php echo URL_USER; ?>pages-resources/js/jquery-1.4.2.min.js"></script>
    
	<script type="text/javascript" src="<?php echo URL_USER; ?>pages-resources/js/viewport.js"></script>
    
    <!--<script src="<?php echo $siteurl;?>js/vendor/modernizr-2.6.2.min.js"></script>-->
  	

	<script type="text/javascript" src="<?php echo URL_USER; ?>pages-resources/js/modernizr-1.5.min.js"></script>

	<script type="text/javascript" src="<?php echo URL_USER; ?>pages-resources/js/jquery.jfade.1.0.min.js"></script>
  
	<script type="text/javascript">
		$(function(){ 
			$(".album-container").jFade({
				trigger: "mouseover",
				property: 'background-color',
				start: '454444',
				end: 'AAAAAA',
				steps: 20,
				duration: 15
			}).jFade({
				trigger: "mouseout",
				property: 'background-color',
				start: 'AAAAAA',
				end: '454444',
				steps: 20,
				duration: 15
			});
		});
	</script>

<!--[if lt IE 9]>
<![endif]-->

<!--[if IE]>
<![endif]-->

<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-11542948-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
 <style>
 @media screen and (max-width: 900px){.desc-container{width: 93%!important;}#pdf-left{width:21%!important;}#pdf-right{width:70%!important;}div#right li{width: 166px!important; height: 166px!important; margin:3px!important;}div.gallery hr{width: 98%!important;}.desc-content p{padding-left: 8px;}.dw-img{left: 144px!important;}#btn{width:853px!important}}
 @media screen and (max-width: 800px){.desc-container{width: 93%!important;}#pdf-left{width:81%!important;}#pdf-right{width:81%!important;}div#right li{width: 163px!important; height: 163px!important; margin:3px!important;}div.gallery hr{width: 98%!important;}.desc-content p{padding-left: 8px;}.dw-img {left: 139px!important;}#btn{width:770px!important}}
 @media screen and (max-width: 768px){.desc-container{width: 93%!important;}#pdf-left{width:78%!important;}#pdf-right{width:78%!important;}div#right li{width: 211px!important; height: 211px!important;}div.gallery hr{width: 97%!important;}.dw-img {left: 183px!important;}#btn{width:715px!important}}
 @media screen and (max-width: 736px){.desc-container{width: 93%!important;}#pdf-left{width:74.5%!important;}#pdf-right{width:74.5%!important;}div#right li{width: 200px!important; height: 200px!important;}div.gallery hr{width: 98%!important;}.dw-img {left: 178px!important;}#btn{width:704px!important}}
 @media screen and (max-width: 667px){.desc-container{width: 93%!important;}#pdf-left{width:67.5%!important;}#pdf-right{width:67.5%!important;}div#right li{width: 178px!important; height: 178px!important;}div.gallery hr{width: 98%!important;}.dw-img {left: 156px!important;}#btn{width:638px!important}}
 @media screen and (max-width: 640px){.desc-container{width: 93%!important;}#pdf-left{width:64.5%!important;}#pdf-right{width:64.5%!important;}div#right li{width: 170px!important; height: 170px!important;}div.gallery hr{width: 98%!important;}.dw-img {left: 148px!important;}#btn{width:603px!important}}
 @media screen and (max-width: 600px){.desc-container{width: 93%!important;}#pdf-left{width:61%!important;}#pdf-right{width:61%!important;}div#right li{width: 159px!important; height: 159px!important;}.dw-img {left: 137px!important;}#btn{width:562px!important}}
  @media screen and (max-width: 568px){.desc-container{width: 93%!important;}#pdf-left{width:58%!important;}#pdf-right{width:58%!important;}div#right li{width: 150px!important; height: 150px!important;}.dw-img {left: 128px!important;}#btn{width:536px!important}}
  @media screen and (max-width: 533px){.desc-container{width: 93%!important;}#pdf-left{width:54%!important;}#pdf-right{width:54%!important;}div#right li{width: 137px!important; height: 137px!important;}.dw-img {left: 115px!important;}#desc-image-container{width: 93%!important;}#btn{width:498px!important}}
  @media screen and (max-width: 480px){.desc-container{width: 93%!important;}#pdf-left{width:49%!important;}#pdf-right{width:49%!important; float:none!important;}div#right li{width: 187px!important; height: 187px!important;}.dw-img {left: 164px!important;}#btn{width:449px!important}}
 @media screen and (max-width: 414px){.desc-container{width: 93%!important;}#pdf-left{width:42%!important;}#pdf-right{width:42%!important; float:none!important;}div#right li{width: 155px!important; height: 155px!important;}.dw-img {left: 133px!important;}#btn{width:375px!important}}
 @media screen and (max-width: 384px){.desc-container{width: 93%!important;}#pdf-left {width: 39%!important;}#pdf-right {width: 39%!important;}div#right li { width: 200px!important; height: 200px!important; margin: 0 16% 2%!important;}.gallery hr {width: 96%!important;}.dw-img {left: 177px!important;}#btn{width:350px!important}}
 @media screen and (max-width: 375px){.desc-container{width: 93%!important;}#pdf-left {width: 38%!important;}#pdf-right {width: 38%!important;}div#right li { width: 200px!important; height: 200px!important; margin: 0 16% 2%!important;}.gallery hr {width: 96%!important;}.dw-img {left: 177px!important;}#btn{width:339px!important}}
 @media screen and (max-width: 360px){.desc-container{width: 93%!important;}#pdf-left {width: 37%!important;}#pdf-right {width: 37%!important;}div#right li { width: 200px!important; height: 200px!important; margin: 0 16% 2%!important;}.gallery hr {width: 96%!important;}.dw-img {left: 177px!important;}#btn{width:330px!important}}
 @media screen and (max-width: 320px){.desc-container{width: 93%!important;}#pdf-left {width: 33%!important;}#pdf-right {width: 32%!important;}div#right li { width: 202px!important; height: 202px!important; margin: 0 9% 2%!important;float: none!important;}.gallery hr {width: 91%!important;}.dw-img {left: 178px!important;}#btn{width:289px!important}}
 </style>

	</head>

<body><a name="top"></a>

<!-- <div id="container"> -->

<?php //include(DIR_USER.'google_translate.html'); ?>

<div class="container1">

<!--<header>

<div class="logo_container">
<h1 class="logo"><a href="http://www.brogaard.com/"><span class="logo_alt">Steen Brogaard - Tales Through Photography</span></a></h1>
</div>

<nav>
<?php //include(DIR_USER.'site-menu-2.php'); ?>
</nav>
</header>-->
<!-- new menu added -->
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
.goog-te-gadget{ margin-top: 2px;}
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
.goog-te-gadget{ margin-top: 0px;}
</style>
          <div style="margin-top:50px !important">
         <?php
	 }
	?>
            <?php include("../includes/google_translate.html");?>
            </div>
            <!--End Google Translator -->
 <!-- new menu close -->
<div id="page-content">

<div id="btn" style="margin:0 auto; width:960px; background:transparent; text-align:right; margin-top:10px;"><a href="./galleryindex.php" class="s_button"><?php echo lang('back_to_portfolio_page'); ?></a></div><div style="clear:both"></div>

<style type="text/css">
div#preload_images_download {
   position: absolute;
   overflow: hidden;
   left: -9999px; 
   top: -9999px;
   height: 1px;
   width: 1px;
}
</style>
<div id="preload_images_download">
<img src="<?php echo URL_USER; ?>pdf/img_checked.png" />
<img src="<?php echo URL_USER; ?>pdf/img_trash.png" />
<img src="<?php echo URL_USER; ?>pdf/img_download.png" />
<img src="<?php echo URL_USER; ?>pdf/img_downloadhover.gif" />
<img src="<?php echo URL_USER; ?>pdf/img_downloadhover_zip.gif" />
</div>

<div class="desc-container">
<div class="desc-content">

<div id="desc-image-container"><img src="<?php echo URL_USER; ?>pages-resources/images/pic_pdf.png" alt="Lav dit eget galleri" class="desc-image" /></div>
		<section>
			<hgroup>
			<h1 class="titles title">Lav dit eget galleri</h1>
			</hgroup>
		<p class="desc-paragraph">Har du brug for hurtigt at printe en samling billeder til layout eller et kundemøde?</p>
		<p class="desc-paragraph">Vælg dem herunder og download dem som et PDF-dokument.</p>
		<p class="desc-paragraph">&nbsp;</p>
		<p class="desc-paragraph">&nbsp;</p>
		<p class="desc-paragraph">&nbsp;</p>
		<p class="desc-paragraph">&nbsp;</p>
		<p class="desc-paragraph">&nbsp;</p>
		<p class="desc-paragraph">&nbsp;</p>
		<p class="desc-paragraph" nowrap="nowrap"><span style="font-size:70%;">Bruger du denne funktion accepterer du betingelserne i Terms of Use. Alle billeder © Steen Brogaard</span></p>
		</section>
</div>
</div>

<script type="text/javascript" src="<?php echo URL_USER; ?>pages-resources/js/jquery-ui.js"></script>

<script type="text/javascript">
(function($) {
    $.extend({
        doGet: function(url, params) {
            document.location = url + '?' + $.param(params);
        },
        doPost: function(url, params) {
            var $div = $("<div>").css("display", "none");
            var $form = $("<form method='POST'>").attr("action", url);
            $.each(params, function(name, value) {
                $("<input type='hidden'>")
                    .attr("name", name)
                    .attr("value", value)
                    .appendTo($form);
            });
            $form.appendTo($div);
            $div.appendTo("body");
            $form.submit();
        }
    });
})(jQuery);

  var imgs=[];
  function setOpacity(elem){
    var positionInArray = $.inArray(elem.id,imgs); 
    opac = (positionInArray > -1) ? 0.6 : 1.0;
    $(elem).css('opacity',opac);
    if (imgs.length>0){
      $("#downloadlink").removeClass("downloadoff downloadhover").addClass("downloadon");
      $("#downloadlinkzip").removeClass("zipsoff").addClass("zipson"); 
    } else {
      $("#downloadlink").removeClass("downloadon downloadhover").addClass("downloadoff");
      $("#downloadlinkzip").removeClass("zipson").addClass("zipsoff");
    }
  } 

  function toggleElem(elem){
    var elemId = elem.id;
    var inImgs = $.inArray(elemId,imgs);
    if (inImgs > -1){
      imgs.splice(inImgs,1);
      $("ul#portfolio_ul #portfolio_"+elemId).remove();
      $(elem).siblings("img.check").hide();
    } else {
      imgs.push(elemId);
      $("ul#portfolio_ul").append("<li id='portfolio_"+elemId+"' >" + 
		 "<img src='" + elem.src.replace('','') + "' width='108' /><a href='#' class='remove_from_portfolio'><img src='<?php echo URL_USER; ?>pdf/img_trash.png' /></a>" + 
         "<input type='hidden' name='img[]' value='" + elemId + "' />" + 
         "</li>");
      $(elem).siblings("img.check").show();
    }
    setOpacity(elem);
  }

  $(document).ready(function(){

    $("#portfolio_ul").sortable({
      placeholder: 'ui-state-highlight',
      handle: 'img',
      opacity: 0.7
    });

    $('#portfolio_ul li a.remove_from_portfolio').live('click', function(){
      var li = this.parentNode;
      var thumbId = li.id.substring(10);
      toggleElem($('#' + thumbId)[0]);
      return false;
    });

    $("ul.thumb_ul img.thumb").each(function(){
      $(this).
//      hover(
//        function(){
//          $(this).stop().animate({opacity: 1.0},100);
//        },
//        function(){
//          $(this).stop();
//          setOpacity(this);
//        }
//      )
      click(function(){
        toggleElem(this);
      });
    });

    $("a#downloadlink").hover(function(){
        if (imgs.length > 0){ 
          $("a#downloadlink").removeClass("downloadon downloadoff").addClass("downloadhover"); 
		  $("span#downloadlinkzip").removeClass("zipsoff").addClass("zipson");
			if ($('#zips:checked').val() !== undefined) {
			  $("a#downloadlink").removeClass("downloadhover").addClass("downloadhoverzip"); 
			} 
        } 
      },
      function() { 
        if (imgs.length > 0){
          $("a#downloadlink").removeClass("downloadhover").addClass("downloadon");  
		  $("span#downloadlinkzip").removeClass("zipsoff").addClass("zipson"); 
			if ($('#zips:checked').val() !== undefined) {
			  $("a#downloadlink").removeClass("downloadhoverzip").addClass("downloadon"); 
			} 
        } 
      } 

    ).click(function(evt){
      if (imgs.length>0){
        $("form#pdfform").submit();
      } 
      evt.preventDefault();
      return false; 
    });

  });
</script>

<style type="text/css">
div#left {
  position: absolute;
  margin-left: 0;
  margin-right: 0;
  margin-top: 0;
  top: 40px;
  left: 40px;
  width: 200px;
}
div#left h4{
  margin-bottom: 10px;
  line-height: 1.1em;
}
div#portfolio {
  //border: 1px solid black;
  width: 120px;
  margin-top: 20px;
}
div#portfolio ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}
div#portfolio li {
  margin-left 0;
  margin-top 10px;
  position: relative;;
}
div#portfolio li a.remove_from_portfolio{
  position: absolute;
  top: 0;
  right: 0;
  font-size: 11px;
  color: red;
  text-decoration: none
}
div#right {
  /*margin-left: 10px; 
  margin-right: 30px;
  margin-top: 40px;
  margin-bottom: 40px;*/
  padding: 0;
}
div#right ul {
  list-style-type: none;
  margin: 0;
  padding: 0 10px 10px 10px;
} 
div#right li {
  float: left;
  width: 210px;
  height: 210px;
  margin: 0;
  padding: 2;
  padding-left: 2px;
  padding-top: 2px;
  position: relative;
  overflow:hidden;
  text-align: center;
}
div#right li img.check{
  /*position: absolute;
  z-index: -10;
  display: none;
  left: 20px;
  top: 0;*/
  position: absolute; 
  top: -25px;
  left: -50px; 
  z-index: auto; 
  display: none;
}
div#right li img.thumb {
  cursor: pointer;
  /*opacity: 0.4;
  filter: alpha(opacity=40);*/
} 
.ui-state-highlight { 
  //height: 200px;
  //width: 300px;
  height: 80px; 
  width: 100px;
  background-color: #DDD;
}
div.gallery h5 {
  //color: #900;
  color: #797979;
  font-size: 13pt;
  font-weight: normal;
  text-transform: uppercase;
  padding: 3px;
  margin: 0 10px 0 5px;
  line-height: 1em;
}
div.gallery {
  margin: 10px;
  float: left;
}
div.gallery hr {
  margin-top: 0;
  margin-left: 8px; 
  margin-right: 30px;
  //color: #995555;
  //color: #db7c7c;
  color: #797979;
  //border: thin solid #db7c7c;
  border: 0 none;
  //border-top: thin solid #db7c7c;
  border-top: thin solid #797979;
  height: 1px;
}
div.gallery .galcontainer {
}
div#left a#logolink {
  color: inherit;
  text-decoration: none;
}
div#left a#logolink img {
  border: none;
}
div#left a#texthomepagelink {
  font-size: 16pt;
  color: #797979;
  text-decoration: none;
}
div#left a#texthomepagelink:visited, div#left a#texthomepagelink:hover {
  color: #797979;
  text-decoration: none;
} 
form#pdfform a#downloadlink {
  //font-weight: bold;
  margin-bottom: 10px;
  padding-left: 25px;
  font-size: 12pt;
  line-height: 22px;
  display: block;
  text-decoration: none;
}
.download_copyright {
  font-size: 9pt;
  line-height: 1.2em;
  margin-bottom: 10px;
}
.downloadon {
  color: #797979 ;
  background: transparent url(<?php echo URL_USER; ?>pdf/img_download.png) no-repeat left bottom;
}
.downloadoff {
  color: #EEEEEE;
  background: transparent url(<?php echo URL_USER; ?>pdf/img_downloadoff.gif) no-repeat left bottom;
}
.downloadhover {
  color: #FFCC00;
  background: transparent url(<?php echo URL_USER; ?>pdf/img_downloadhover.gif) no-repeat left bottom;
}
.downloadhoverzip {
  color: #FFCC00;
  background: transparent url(<?php echo URL_USER; ?>pdf/img_downloadhover_zip.gif) no-repeat left bottom;
}

.zipsoff {
  display: none;
}
.zipson {
}
#container
{
	min-height: 0px !important;
	padding: 0px !important; 
}
</style>

<!-- CHOOSEN PICS -->
<div class="desc-container">
<div class="desc-content">
<!-- <section> -->
<div style="width:922px; height:auto; margin-left:-25px; margin-top:-40px; background:transparent;">

<div id="pdf-left" style="width:222px; background:transparent; float:left;"><div style="padding:10px; ">
<p><small><b><i><?php echo lang('drag_pics_to_reorder'); ?></i></b></small></p>
	<form action="<?php echo URL_USER; ?>pdf_create.php" method="post" id="pdfform">
	<span id="downloadlinkzip" class="zipsoff"><input type="checkbox" id="zips" name="zips" value="<?php echo time(); ?>" />Download som zip</span>
	<a href="#" id="downloadlink" class="downloadoff">Download</a>
	<!--
	<input type="submit" value="create" disabled="disabled"></input>
	-->
	<div id="portfolio">
	<ul id="portfolio_ul">
	</ul>
	</div>
	</form>
</div></div>

<div id="pdf-right" style="width:700px; background:#ffffff; float:left;"><div style="padding:10px; ">
<p><small><b><i><?php echo lang('choose_pics_as_you_like'); ?></i></b></small></p>
	<div id="right">
	  <div class="gallery">
		<div class="galcontainer">
<?php 

### GALLERIES #################################################################
###############################################################################
$dirGalleries = DIR_USER.'galleries/';
$urlGalleries = URL_USER.'galleries/';

$list_dir_contents = read_directory_contents( $dirGalleries, 'index.html' );

foreach ($list_dir_contents as $list) { 
	$listDir[] = $list; // Listing dirs inside /galleries/
}

for ($i=0; $i<count($listDir); $i++) { 
	$dirName = $listDir[$i];
	$dirThumbs = read_directory_contents($dirGalleries.$dirName.'/thumbnails/'); // THUMBNAILS // Big photos has a same name on dir /photos_max/

	$fileXML = $dirGalleries.$dirName.'/autoindex.xml';
	$v = loadFile($fileXML);
	preg_match_all('/<title>(.*?)<\/title>/si', $v, $r);
	$gallName = $r[1][0]; // Gallery name retrieved from 'autoindex.xml'

	// START Group 
	echo '<div style="float:left; white-space:nowrap; padding: 10px 0px;"><a href="'.$urlGalleries.$dirName.'/" title="Click Here to View this Gallery"><img src="'.URL_USER.'pages-resources/images/icon_gallery.png" style="float:left;" /></a><h2 style="padding-left:30px;"> '.$gallName.' ('.count($dirThumbs).') </h2></div><div style="float:right; margin-top:14px;"><a href="#top">Til top <img src="'.URL_USER.'pages-resources/images/arrow-up-icon-tiny.png" /></a></div><div style="clear:both;"></div>'; 
	echo '<hr style="width:100%;" /><div style="float:left;">'."\n".'<ul class="thumb_ul">'."\n"; 

	for ($j=0; $j<count($dirThumbs); $j++) { 
		$photoID = 'galleries/'.$dirName.'/photos_max/'.$dirThumbs[$j]; 
		$phThumb = $urlGalleries.$dirName.'/thumbnails/'.$dirThumbs[$j]; 
		echo '<li><a href="'.URL_USER.'img_download.php?imghash='.base64safe_encode($photoID).'" title="Click Here to Download this image"><img src="'.URL_USER.'pdf/img_download.png" class="dw-img" style="position:absolute; top:6px; left:185px; z-index:auto; border:1px solid red;" /></a><img class="thumb" src="'.$phThumb.'" id="'.base64safe_encode($photoID).'" border="0"><img src="'.URL_USER.'pdf/img_checked.png" class="check"></li>'."\n";
	}

	echo '</ul></div><div style="clear:both;"></div>'."\n";	
	// END Group
}

?>
	</div>
	</div></div>
</div></div>
<!-- END Gallery PDF -->

</div>

</div></div>
<?php 
	/*echo '<footer>';

	include_once DIR_USER."site-footer-2.php";

	echo '</footer>
		  </div><!-- /container -->';
	
	include_once "./inc_footer_scripts.html";
	include_once "./func_php_hooks_ttg_user_lastcall.php";

	echo '</body></html>';*/

/*
 * This copyright notice just for note to the programmer involved
 * Regards, 
 * medmed - at - scriptlance
 * #################################################################
 * Copyright (c) 2009 medyCMS. All rights reserved.
 */
 ?> 
 <?php include ("../includes/brogaard_footer.php");
 ?>