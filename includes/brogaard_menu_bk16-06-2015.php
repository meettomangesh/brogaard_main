<?php 
	include("search_functions.php"); 
	$sf = new search_functions;
	
	$search_result1 = $sf->WS_GET_SEARCH_RESULT1('1000000');
	$search_array = array();
	$count_result = (isset($search_result1)?count($search_result1):0);
	if($count_result > 0)
	{
		for($a=0;$a<$count_result;$a++)
		{
			if(isset($search_result1[$a]['GAL_ID']) && isset($search_result1[$a]['HS_ID']))
			{
					array_push($search_array,trim(mysql_real_escape_string(strip_tags($search_result1[$a]['H_IMAGE_NAME']))));
					
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
<div class="collapse navbar-collapse navbar-left navbar-main-collapse">
            <ul class="nav navbar-nav">
            	 
				 <li><a href="http://www.brogaard.com/shell/galleryindex.php">Portfolio</a></li>
				<li><a href="http://www.brogaard.com/shell/info.php">Royal</a></li>
				<li><a href="http://www.brogaard.com/shell/about.php">Scrapbook</a></li>
				<li><a href="http://www.brogaard.com/shell/services.php">Services</a></li>
                <li><a href="http://www.brogaard.com/shell/store_cs.php">Store</a></li>
				<li><a href="http://www.brogaard.com/shell/contact.php">Contact</a></li>
                
                <?php 
				


if ( isset($_SESSION['username']) && isset($_SESSION['password'])  ) { // shown for logged-in user
	$clientGalleryHome	 = $_SESSION['redirect'];
	$clientGalleryHomeHD = $_SESSION['redirect'].'/HD/';

?>
				<li><a href="http://www.brogaard.com/shell/logout.php">Logout</a></li>
        <?php } else {?>
        <li><a href="http://www.brogaard.com/shell/login.php">Login</a></li>
                
                <?php }?>
                <li id="sb-search" class="sb-search"> 
                	<form class='form-search' method='post' id='searchform' action='http://www.brogaard.com/pagination.php'>
                    <input class="sb-search-input" placeholder="Search..."  type="text" value="" name="search" id="search" onFocus="clearcontent()">
					<input class="sb-search-submit" type="submit" value="" style="cursor:pointer" />
					<span class="sb-icon-search"></span>
					</form>
                </li>
               
               <!--<li id="sb-search" class="sb-search"> 
               <form class='form-search' method='post' id='searchform' action='
               http://www.brogaard.com/pagination.php'>
               
                 <input class="sb-search-input" placeholder="Search..."  type="text" value="" name="search" id="search" onFocus="clearcontent()">
					<input class="sb-search-submit" type="submit" value="" style="cursor:pointer" />
					<span class="sb-icon-search"></span>
					</form>
                </li>-->
	       			
      		</ul>
            </div>