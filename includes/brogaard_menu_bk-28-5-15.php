<div class="collapse navbar-collapse navbar-left navbar-main-collapse">
            <ul class="nav navbar-nav">
            	 
				 <li><a href="http://www.brogaard.com/portfolio/index.php">Portfolio</a></li>
				<li><a href="http://www.brogaard.com/shell/info.php">Royal</a></li>
				<li><a href="http://www.brogaard.com/shell/about.php">Scrapbook</a></li>
				<li><a href="http://www.brogaard.com/shell/services.php">Services</a></li>
                <li><a href="javascript:void(0);">Store</a></li>
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
               <form class='form-search' method='post' id='searchform' action='
               http://www.brogaard.com/pagination.php'>
               
                   <!-- <input type='hidden' name='page'  value='http://www.brogaard.com/shell/galleryindex.php'>-->
					<input class="sb-search-input" placeholder="Search..."  type="text" value="" name="search" id="search" onFocus="clearcontent()">
					<input class="sb-search-submit" type="submit" value="" style="cursor:pointer" />
					<span class="sb-icon-search"></span>
					</form>
                </li>
	       			
      		</ul>
            </div>