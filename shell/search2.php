<?php
/*|:-> Load system configuration <-:|*/
require_once(dirname(__FILE__) . '/' . "auth.php"); 

/*|:-> COOKIES and SESSION check <-:|*/
// This should be placed on top of member area (restricted) page
checkSession();


// This page should be available for logged-in users ONLY
if ( $_SESSION['maingallery']=='' ) { 
	$noAuthRedirected = CMS_URL;
	header("HTTP/1.1 403 Forbidden");
	header("Location: $noAuthRedirected");
	exit;
}


function get_imgThumb_url_by_id($id) { 
	$qs = "SELECT image_path FROM ".TBL_IMAGE_DATA." WHERE image_id=".(int)$id." ";
	$rs = mysql_query($qs) or die("Invalid query: " . mysql_error());
	// ex: clientarea/Lett/HD/2009-03-31/photos/_BRO3682.jpg
	list($content) = mysql_fetch_row($rs);
	mysql_free_result($rs);

	$res1 = str_replace('/photos/', '/thumbnails/', $content);
	$res2 = CMS_URL.$res1;

	return $res2;
}

function get_imgPhoto_DBdir_by_id($id) { 
	$qs = "SELECT image_path FROM ".TBL_IMAGE_DATA." WHERE image_id=".(int)$id." ";
	$rs = mysql_query($qs) or die("Invalid query: " . mysql_error());
	// ex: clientarea/Lett/HD/2009-03-31/photos/_BRO3682.jpg
	list($content) = mysql_fetch_row($rs);
	mysql_free_result($rs);

	$res = $content;

	return $res;
}

$search_word = ( !empty($_GET['s']) ? strtolower($_GET['s']) : '' );

// #################
// IF search exist

/*
echo "æ"; echo "<br />";//	%C3%A6
echo "Æ"; echo "<br />";//	%C3%86

echo "ø"; echo "<br />";//	%C3%B8
echo "Ø"; echo "<br />";//	%C3%98

echo "å"; echo "<br />";//	%C3%A5
echo "Å"; echo "<br />";//	%C3%85
*/




echo $url = urlencode($_GET['s']);
$DanishLtr = array("%C3%A6", "%C3%86", "%C3%B8", "%C3%98", "%C3%A5", "%C3%85");
if ( in_array(urlencode($_GET['s']),$DanishLtr) ){
	//echo "Match found";
  	$search_word = '';
}


// echo $search_word = ( in_array(urlencode($_GET['s']),$search_word) ? $search_word : '' );echo "<br />";


if ( !empty($search_word) )
{   //echo "inside";
	if ( empty($_SESSION['galleries']) ) { $herePath = str_replace(CMS_URL, '', $_SESSION['redirect']); } else { $herePath = $_SESSION['galleries']; }
echo "SELECT left(image_path, length(image_path)-locate('/',reverse(image_path))) as pathname, group_concat(image_id) FROM ".TBL_IMAGE_DATA." WHERE (image_description LIKE '%".clean_mysql($search_word)."%' OR image_keywords LIKE '%".clean_mysql($search_word)."%' OR image_name LIKE '%".clean_mysql($search_word)."%') $HDQuery AND image_path RLIKE '".$herePath."' GROUP BY left(image_path, length(image_path)-locate('/',reverse(image_path))) ORDER BY image_id ASC";
	$sql = "SELECT image_keywords, left(image_path, length(image_path)-locate('/',reverse(image_path))) as pathname, group_concat(image_id) FROM ".TBL_IMAGE_DATA." WHERE (image_description LIKE '%".clean_mysql($search_word)."%' OR image_keywords LIKE '%".clean_mysql($search_word)."%' OR image_name LIKE '%".clean_mysql($search_word)."%') $HDQuery AND image_path RLIKE '".$herePath."' GROUP BY left(image_path, length(image_path)-locate('/',reverse(image_path))) ORDER BY image_id ASC";

	$query0 = mysql_query($sql) or die("Invalid query: " . mysql_error());
	$query = mysql_query($sql) or die("Invalid query: " . mysql_error());
	//$found = mysql_num_rows($query);
}

?><!DOCTYPE html>
<html lang="en" dir="ltr" class="no-js">
<head>

	<title><?php echo lang('site_meta_title'); ?></title>

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

<!-- <link rel="image_src" href="./img_gallery_header.jpg" /> -->

	<link rel="shortcut icon" type="image/ico" href="<?php echo URL_USER; ?>pages-resources/images/favicon.ico" />
	<link rel="stylesheet" href="<?php echo URL_USER; ?>pages-resources/css/common-loggedin.css" />
	<link rel="stylesheet" href="<?php echo URL_USER; ?>pages-resources/css/ttg-autoindex-ce.css" />

	<script type="text/javascript" src="<?php echo URL_USER; ?>pages-resources/js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="<?php echo URL_USER; ?>pages-resources/js/viewport.js"></script>

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
	<script type="text/javascript" src="<?php echo URL_USER; ?>pages-resources/js/cart-settings.js"></script>
  	<script type="text/javascript">
		$(function() {
			jQuery.getScript(options['cart_url'] + 'resources/js/jquery.ttgcart.js', function() {
				$('body').ttgcart(options);
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



<style type="text/css">
#toTop {
		width:25px;
		height:25px;
        /* border:1px solid #ccc;*/
        /* background:#f7f7f7;*/
        /* text-align:center;*/
        /* padding:5px;*/
        position:fixed; /* this is the magic */
        bottom:10px; /* together with this to put the div at the bottom*/
        right:10px;
        /* cursor:pointer;*/
        /* display:none;*/
        /* color:#333;*/
        /* font-family:verdana;*/
        /* font-size:11px;*/
		z-index:1000;
		background:url(<?php echo URL_USER; ?>pages-resources/images/ui.png) no-repeat left top;
}
img.img-class{
		margin: -5px;
		margin-left:5px;
		position:relative;
}
</style>

	</head>

<body><a name="top"></a>
<script type="text/javascript">
$(function() {
	$(window).scroll(function() {
		if($(this).scrollTop() != 0) {
			$('#toTop').fadeIn();	
		} else {
			$('#toTop').fadeOut();
		}
	});
 
	$('#toTop').click(function() {
		$('body,html').animate({scrollTop:0},1800);
	});	
});
</script>
<div id="toTop"></div>

<!-- <div id="container"> -->

<?php include(DIR_USER.'google_translate.html'); ?>

<div id="container">

<header>

<div class="logo_container">
<h1 class="logo"><a href="http://www.brogaard.com/"><span class="logo_alt">Steen Brogaard - Tales Through Photography</span></a></h1>
</div>

<nav>
<?php include(DIR_USER.'site-menu-2.php'); ?>
</nav>
</header>

<div id="page-content">

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
<style type="text/css">
	div.desc-content1{
		position: relative; height:410px;
	}
	.last-div{
		position: absolute;bottom: 5px; color:#595959;
	} 
</style>
<div class="desc-container">
<div class="desc-content desc-content1">

<div id="desc-image-container"><img src="<?php echo URL_USER; ?>pages-resources/images/pic_pdf.png" alt="Image description" class="desc-image" /></div>
		<section>
			<hgroup>
			<h1 class="titles title">Lav et PDF-dokument af din billede-søgning...</h1>
			</hgroup>
<?php 

while ( $data0 = mysql_fetch_assoc($query0) )
{ 
		$listPath_ = $data0['pathname'];
			$pieces_ = explode("/", $listPath_);
			$dirValid_ = $pieces_[3]; // should be like YYYY-MM-DD

			if ( !preg_match("/[^0-9\-]/", $dirValid_) ) {
				$listPath2_ = $listPath_; // Looking for dir YYYY-MM-DD
				$list_IDs_ = $data0['group_concat(image_id)'];
			} else { 
				unset($data0['pathname']);
				unset($data0['group_concat(image_id)']);
			} 

		  if ( isset($listPath2_) ) {
		  $list_ID_ = explode(",",$list_IDs_);
		  $totalIDx[] = sizeof($list_ID_);
		}
}

$found = array_sum($totalIDx); // TOTAL valid images found

	echo '<p class="desc-paragraph">Vi har fundet <u>'.( !empty($found)?$found:'0' ).'</u> billede(r) fra din søgning på <u>'.( !empty($search_word)?clean_field($search_word):'' ).'</u> i <img src="'.URL_USER.'pages-resources/images/icon_gallery_HD.png" class="img-class" /></p>'; 
	echo '<p class="desc-paragraph">&nbsp;</p>';
	echo '<p class="desc-paragraph">'.( !empty($found) ? 'Alle resultater er vist herunder.<br />Lav en PDF, gå til billedernes originale galleri eller download dem direkte.' : '&nbsp;' ).'</p>'; 

?>

		<div class="desc-paragraph last-div" nowrap="nowrap" style=""><span style="font-size:70%;">Bruger du denne funktion har du samtidigt accepteret betingelserne i <a href="<?php echo URL_USER; ?>terms.php" title="Terms of Use" target="_self"><u>Terms of Use</u></a>. Alle billeder &copy; Steen Brogaard</span></div>
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
</style>

<?php if ( isset($query) ) { ?>
<!-- START Gallery PDF -->
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

function _if_exist($word, $txt) {
    $patt = "/(?:^|[^a-zA-Z])" . preg_quote($word, '/') . "(?:$|[^a-zA-Z])/i";
    return preg_match($patt, $txt);
}

while ( $data = mysql_fetch_assoc($query) )
	{ 
		$listPath = $data['pathname']; 
			$pieces = explode("/", $listPath);
			$dirValid = $pieces[3]; // should be like YYYY-MM-DD

			if ( !preg_match("/[^0-9\-]/", $dirValid) ) {
				$listPath2 = $listPath; // Looking for dir YYYY-MM-DD
				$list_IDs = $data['group_concat(image_id)'];
			} else { 
				unset($data['pathname']);
				unset($data['group_concat(image_id)']);
			} 


	  $path2exclude = PAID_HD_DIR.'/HD';


		if ( isset($listPath2) ) { // clientarea/nykunde2011/HD/2011-07-12/photos 

		$list_ID = explode(",",$list_IDs);
		$totalID = sizeof($list_ID); //echo '<font color="red">'.$listPath2.'</font>';

		  $thisPathToUse = removeFromEnd($listPath2, 'photos');
		  $fileXML = CMS_PATH.$thisPathToUse.'autoindex.xml';
		  $v = loadFile($fileXML);
		  preg_match_all('/<title>(.*?)<\/title>/si', $v, $r);
		  $gallName = $r[1][0]; // Gallery name retrieved from 'autoindex.xml'
		
			if (preg_match("/\/HD\//i", $thisPathToUse)) {
				$iconGallery = 'icon_gallery_HD.png';
				$stylGallery = 'padding-left:64px;';
			} else {
				$iconGallery = 'icon_gallery.png';
				$stylGallery = 'padding-left:30px;';
			}

		// START Group 
		echo $gallName,"--";
		echo '<div style="float:left; white-space:nowrap; padding: 10px 0px;"><a href="'.CMS_URL.$thisPathToUse.'" title="Click Here to View this Gallery"><img src="'.URL_USER.'pages-resources/images/'.$iconGallery.'" style="float:left;" /></a>'."\n"; 
		echo '<h2 style="'.$stylGallery.'"> '.$gallName.' ( '.$totalID.' ) </h2></div><div style="float:right; margin-top:14px;"><a href="#top">Til top <img src="'.URL_USER.'pages-resources/images/arrow-up-icon-tiny.png" /></a></div><div style="clear:both;"></div>'."\n"; 
		echo '<hr style="width:100%;" />'."\n"; 

	  if ( empty($_SESSION['hdaccess']) && $_SESSION['maingallery']==PAID_HD_URL && _if_exist($path2exclude, $listPath2) ) { 
		// Restricted Area for certain users
		echo '<div align="center">
			  <span><font color="red">Images result from this gallery is forbidden for your account access!</font><br />
			  <a href="'.PAID_HD_URL.'/HD/"><u>Click Here</u></a> to find out how to get full access.<br />&nbsp;
			  </span></div><div style="clear:both;"></div>'."\n";	
		
	  } else { 

		echo '<div style="float:left;">'."\n".'<ul class="thumb_ul">';
		for($i = 0; $i < $totalID; ++$i){ 
		  $pid = $list_ID[$i];
		  $photoID = get_imgPhoto_DBdir_by_id($pid);
			// ex: clientarea/Lett/HD/2009-03-31/photos/_BRO3682.jpg

			echo '<li><a href="./img_download.php?imghash='.base64safe_encode($pid).'" title="Click Here to Download this image"><img src="'.URL_USER.'pdf/img_download.png" style="position:absolute; top:6px; left:185px; z-index:auto; border:1px solid red;" /></a><img class="thumb" src="'.get_imgThumb_url_by_id($pid).'" id="'.base64safe_encode($pid).'" border="0"><img src="'.URL_USER.'pdf/img_checked.png" class="check"></li>'."\n";
		} // END for
		echo '</ul></div><div style="clear:both;"></div>'."\n";	

		// END Group

	  } // END of checking $_SESSION['hdaccess']

		} // END if
	}

?>
	</div>
	</div></div>
</div></div>
<!-- END Gallery PDF -->
<?php } ?>

</div>

</div></div>
<?php
	echo '<footer>';

	include_once DIR_USER."site-footer-2.php";

	echo '</footer>
		  </div><!-- /container -->';
	
	include_once "./inc_footer_scripts.html";
	include_once "./func_php_hooks_ttg_user_lastcall.php";

	echo '</body></html>';

/*
 * This copyright notice just for note to the programmer involved
 * Regards, 
 * medmed - at - scriptlance
 * #################################################################
 * Copyright (c) 2009 medyCMS. All rights reserved.
 */