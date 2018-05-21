<?php

/*|:-> Load system configuration <-:|*/

require_once(dirname(__FILE__) . '/' . "auth.php");



/*|:-> COOKIES and SESSION check <-:|*/

// This should be placed so system can recognize cookie

checkSession();



/*

Some debug information can be obtained by typing this after the url:



      ?php        lots of information about your server's configuration of php

      ?array      the data obtained by this script after parsing the various xml files

	  ?debug	  used to define AUTOINDEX_DEBUG

*/



$reverseit = false;  // change to true if you'd like the album displayed in reverse order



// define page structure via functions

function write_top() {

	include "./pages-resources/php/php_hooks.php";

	echo '<!DOCTYPE html>

		  <html lang="en" dir="ltr" class="no-js">';



	include_once "./inc_head.php";



	echo '<body>';

	include(DIR_USER.'google_translate.html');

	echo '<div id="container">

		  <header>';



	//include_once "./inc_header.php";

	include "./site-menu.php";



	echo '</header>

		  <div id="page-content">';

		 

	echo '<div style="margin:0 auto; width:960px; background:transparent; text-align:right; margin-top:10px; margin-bottom:-15px;clear:both;"><a href="./galleryindex_pdf.php" class="s_button">'.lang('create_portfolio_pdf').'</a></div><div style="clear:both"></div>';



	//include_once "./inc_description.php";



	echo '<section id="thumbnail-grid">

		  <div class="thumbnail-grid">

		  <!-- Gallery Index Begins Here -->

		  <div id="gallery-index">';

}



function write_bottom() {

	echo '</div>

		  <!-- Gallery Index Ends Here -->

		  </div>

		  </section>';



	include_once "./func_php_hooks_ttg_user_body.php";



	echo '</div> <!-- /page-content -->

		  <footer>';



	include_once DIR_USER."site-footer-2.php";



	echo '</footer>

		  </div><!-- /container -->';

	

	//include_once "./inc_footer_scripts.html";

	include_once "./func_php_hooks_ttg_user_lastcall.php";



	echo '</body></html>';

}



// autoindex functions

include_once "./func_autoindex.php";



// output page

$show = trim($_SERVER["QUERY_STRING"]);

if ($show == 'php') {

	echo '<pre>';

	phpinfo();

	echo '</pre>';

}



// for debugging; displays $w in human-readable format

function debug($w) {

   echo '<div style="text-align: left"><pre>';

   if (is_string($w)) echo htmlentities($w);

     else print_r ($w);

   echo "</pre></div>";

   write_bottom();

   exit;

}



write_top();



if ($show == 'debug')

{

	define ('AUTOINDEX_DEBUG', true);			// enable statement to output debugging info from autoindex()

}



$albums = autoindex('./galleries/');



if ($reverseit) $albums = array_reverse($albums);

if ($show == 'array') debug($albums);



echo '<!-- start LAYOUT (loop) -->';

for($i=0; $i<count($albums); $i++)

{

?>

<div class="album-wrapper">

	<div class="album-container" onclick="location.href='<?php print $albums[$i]['url']?>';">

		<div class="album-content" style="background-image: url(<?php print $albums[$i]['thumbnail']?>);">

			<a href="<?php print $albums[$i]['url']?>"><img src="./img_blank.gif" class="captify" alt="<?php print $albums[$i]['title']?>" /></a>

		</div>

	</div>

	<div class="album-copy">

		<p class="album-title"><?php print $albums[$i]['title']?></p>

		<p class="album-description"><?php print $albums[$i]['description']?></p>

	</div>

</div>

<?php

} 

echo '<!-- end LAYOUT (loop) -->';



write_bottom();



/*

 * This copyright notice just for note to the programmer involved

 * Regards, 

 * medmed - at - scriptlance

 * #################################################################

 * Copyright (c) 2009 medyCMS. All rights reserved.

 */