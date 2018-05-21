 <?php 
 if($module=='path')
 {
   include("includes/search_functions.php");
 }
 else
 {
	 include("../includes/search_functions.php");
 }
	$sf = new search_functions;
	
	$search_result1 = $sf->WS_GET_SEARCH_RESULT1('1000');
	$search_array = array();
	$count_result = (isset($search_result1)?count($search_result1):0);
	if($count_result > 0)
	{
		for($a=0;$a<$count_result;$a++)
		{
			if(isset($search_result1[$a]['GAL_ID']) && isset($search_result1[$a]['HS_ID']))
			{
					array_push($search_array,trim(mysql_real_escape_string(strip_tags($search_result1[$a]['H_IMAGE_NAME']))));
					/*array_push($search_array,utf8_encode(trim(mysql_real_escape_string(strip_tags($search_result1[$a]['H_TITLE'])))));*/
					array_push($search_array,trim(mysql_real_escape_string(strip_tags($search_result1[$a]['H_IMG_DESC']))));
			}
			if(!isset($search_result1[$a]['HS_ID']) && isset($search_result1[$a]['GAL_ID']))
			{
					array_push($search_array,trim(mysql_real_escape_string(strip_tags($search_result1[$a]['GAL_NAME']))));
					array_push($search_array,trim(mysql_real_escape_string(strip_tags($search_result1[$a]['GAL_SUB_TITLE']))));
			}
		}
	}
    ?>
    <style>
	/*
Code snippet by maridlcrmn for Bootsnipp.com
Follow me on Twitter @maridlcrmn
*/

.navbar-brand { position: relative; z-index: 2; }

.navbar-nav.navbar-right .btn { position: relative; z-index: 2; padding: 4px 20px; margin: 10px auto; transition: transform 0.3s; }

.navbar .navbar-collapse { position: relative; overflow: hidden !important; }
.navbar .navbar-collapse .navbar-right > li:last-child { padding-left: 22px; }

.navbar .nav-collapse { position: absolute; z-index: 1; top: 0; left: 0; right: 0; bottom: 0; margin: 0; padding-right: 120px; padding-left: 80px; width: 100%; }
.navbar.navbar-default .nav-collapse { background-color: #f8f8f8; }
.navbar.navbar-inverse .nav-collapse { background-color: #222; }
.navbar .nav-collapse .navbar-form { border-width: 0; box-shadow: none; }
.nav-collapse>li { float: right; }

.btn.btn-circle { border-radius: 50px; }
.btn.btn-outline { background-color: transparent; }

.navbar-nav.navbar-right .btn:not(.collapsed) {
    background-color: rgb(111, 84, 153);
    border-color: rgb(111, 84, 153);
    color: rgb(255, 255, 255);
}

.navbar.navbar-default .nav-collapse,
.navbar.navbar-inverse .nav-collapse {
    height: auto !important;
    transition: transform 0.3s;
    transform: translate(0px,-50px);
}
.navbar.navbar-default .nav-collapse.in,
.navbar.navbar-inverse .nav-collapse.in {
    transform: translate(0px,0px);
}
/*.navbar-right div #m-menu{float: left;width: 94%;padding-left: 18px; display:none;}
.navbar-right .navbar-nav>li.d-none{display:none;}*/

@media screen and (max-width: 767px) {
    .navbar .navbar-collapse .navbar-right > li:last-child { padding-left: 15px;margin-left: 11px; /*padding-right: 15px;*/ } 
    
    .navbar .nav-collapse { margin: 7.5px auto; padding: 0; }
    .navbar .nav-collapse .navbar-form { margin: 0; }
    .nav-collapse>li { float: none; }
    
    .navbar.navbar-default .nav-collapse,
    .navbar.navbar-inverse .nav-collapse {
        transform: translate(-100%,0px);
    }
    .navbar.navbar-default .nav-collapse.in,
    .navbar.navbar-inverse .nav-collapse.in {
        transform: translate(0px,0px);
    }
    
    .navbar.navbar-default .nav-collapse.slide-down,
    .navbar.navbar-inverse .nav-collapse.slide-down {
        transform: translate(0px,-100%);
    }
    .navbar.navbar-default .nav-collapse.in.slide-down,
    .navbar.navbar-inverse .nav-collapse.in.slide-down {
        transform: translate(0px,0px);
    }
	/*.navbar-inverse .navbar-nav>div#m-menu,
	.navbar-inverse .navbar-nav>li.d-none{display:block;}*/
}
	</style>
    
    <!--<script>
	if ($(window).width() < 768) {
  document.getElementById(nv2).style.display="block";
  document.getElementsById(afl-menu).style.display="none";
}
</script>-->
  
  <div class="row container-fluid">
    <!-- Second navbar for search -->
    <nav class="navbar navbar-inverse">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-3">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://localhost/brogaard_new/index.php"> <img src="<?php echo $siteurl;?>assets/img/logo.png"></a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse-3">
        
          <ul class="nav navbar-nav navbar-right" style="padding-top:6px">
            <li><a href="http://www.brogaard.com/shell/galleryindex.php">Tales</a></li>
            <!--<li><a href="http://www.brogaard.com/shell/info.php">Royal</a></li>
            <li><a href="http://www.brogaard.com/shell/about.php">Scrapbook</a></li>-->
            <li><a href="http://www.brogaard.com/shell/services.php">Mission Statement</a></li>
            <li><a href="http://www.brogaard.com/shell/store_cs.php">Store</a></li>
            <li><a href="http://www.brogaard.com/shell/contact.php">Contact</a></li>
			<!--<li><a href="http://www.brogaard.com/shell/galleryindex.php">Portfolio</a></li>
            <li><a href="http://www.brogaard.com/shell/info.php">Royal</a></li>
            <li><a href="http://www.brogaard.com/shell/about.php">Scrapbook</a></li>
            <li><a href="http://www.brogaard.com/shell/services.php">Services</a></li>
            <li><a href="http://www.brogaard.com/shell/store_cs.php">Store</a></li>
            <li><a href="http://www.brogaard.com/shell/contact.php">Contact</a></li> -->
            <?php 
			/*$a='Yes';
if ($a=='Yes') {*/
if ( isset($_SESSION['username']) && isset($_SESSION['password'])  ) { // shown for logged-in user
	$clientGalleryHome	 = $_SESSION['redirect'];
	$clientGalleryHomeHD = $_SESSION['redirect'].'/HD/';
?>
			<li><a href="http://www.brogaard.com/shell/logout.php">Logout</a></li>
        	<?php } else {?>
        	<li><a href="http://www.brogaard.com/shell/login.php">Login</a></li>
            <?php }?>
            <li id="sb-search" class="sb-search" style="margin-top:-4px"> 
                	<form class='form-search' method='post' id='searchform' action='http://www.brogaard.com/pagination.php'>
                    <input class="sb-search-input" placeholder="Search..."  type="text" value="" name="search" id="search" onFocus="clearcontent()">
					<input class="sb-search-submit" type="submit" value="" style="cursor:pointer" />
					<span class="sb-icon-search"></span>
					</form>
             </li>
              <?php 
			/*  if ($a=='Yes') {*/
if ( isset($_SESSION['username']) && isset($_SESSION['password'])  ) { // shown for logged-in user
	$clientGalleryHome	 = $_SESSION['redirect'];
	$clientGalleryHomeHD = $_SESSION['redirect'].'/HD/';
?>
             <div id="nv2" style="display:none;">
                <li class="d-none"><a href="<?php echo URL_USER; ?>edit_account.php">Your Account</a></li>
                <li class="d-none"><a href="<?php echo $clientGalleryHome.'/pdf.php'; ?>">PDF</a></li>
				<li class="d-none"><a href="<?php echo $clientGalleryHomeHD; ?>">Downloads</a></li>
                <li class="d-none"><a class="l-1" href="<?php echo $clientGalleryHome; ?>">Committee</a></li>
               </div>
              <?php
}
	  ?>
            
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
      <?php 
	 // if ($a=='Yes') {
if (isset($_SESSION['username']) && isset($_SESSION['password'])  ) { // shown for logged-in user
	$clientGalleryHome	 = $_SESSION['redirect'];
	$clientGalleryHomeHD = $_SESSION['redirect'].'/HD/';
?>
      <div id="afl-menu" class="container-fluid" style="padding:0!important; display:block;">
         <ul id="nav2"  class="navbar-nav nav"><!--id="nav2"-->
            <div >
                <li><a href="<?php echo URL_USER; ?>edit_account.php">Your Account</a></li>
                <li><a href="<?php echo $clientGalleryHome.'/pdf.php'; ?>">PDF</a></li>
				<li><a href="<?php echo $clientGalleryHomeHD; ?>">Downloads</a></li>
                <li><a href="<?php echo $clientGalleryHome; ?>">Committee</a></li>
            <div>
         </ul>
      </div>
      <?php
}
	  ?>
    </nav><!-- /.navbar -->
</div><!-- /.container-fluid -->




<script src="<?php echo $siteurl;?>js/classie.js"></script>
<script src="<?php echo $siteurl;?>js/uisearch.js"></script>
<script>
	new UISearch( document.getElementById( 'sb-search' ) );
</script>
    