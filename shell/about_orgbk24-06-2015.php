<?php
/*|:-> Load system configuration <-:|*/
require_once(dirname(__FILE__) . '/' . "auth.php");

/*|:-> COOKIES and SESSION check <-:|*/
// This should be placed so system can recognize cookie
checkSession();

/*|:-> Load HEADER <-:|*/
@include DIR_USER."site-header.php";

/*|:-> Load MENU <-:|*/
@include DIR_USER."site-menu.php";

@include DIR_USER."news-ticker.php"; // NEWS TICKER to be included to this page 

?>
<div id="page-container" class="page-container about-container">
	<div id="page-content" class="page-content about-content">

	<!-- Begin Polaroid Embed -->
<div id="frame" class="stage-container about-stage">
<script type="text/javascript">

var flashvars = {
	xmlURL: "photos.xml"
};

var params = {
	bgcolor: "#F4F4F4",
	base: "about-polaroid/"
};

var attributes = false;

swfobject.embedSWF("about-polaroid/polaroid.swf", "flashcontent", "100%", "100%", "9.0.0", false, flashvars, params, attributes);
</script>
<div id="flashcontent" class="stage about-stage">
			<img class="page-image about-image" alt="Scrapbook" src="pages-images/photos/scrapbook.jpg" />
</div>
<?php
if ( function_exists('ttg_user_stage') ) {								// If ttg_user_stage() exists
	$void = ttg_user_stage( TTG_COMP, TTG_ROOT ); 						//  invoke it
}				 														//   ignoring return value
?></div>
<!-- End Polaroid Embed -->

<div class="copy about-copy">
<p>Selvlært fotograf siden 1984 for bl.a. Ugeavisen København og Greenpeace | Udlært pressefotograf på Billed Bladet i 1991 | Selvstændig på 5C siden 1991 <br /> Udvalgte kunder gennem årene: Agenzy, Alcon A/S, Bane Danmark, Bellevue Teatret, Bruun & Hjejle, Care, Coop, DR, DSB, DTU, Düsseldorfer Schauspielhaus, EG, Egmont, Egmontfonden, Erhvervsstyrelsen, Folketinget,  Forlæggerforeningen, Fullrate, Gads Forlag, Grevinde Alexandra, Grevinde Danner, Hello Magazine,  Herlufsholm, Holm Kommunikation, IBM, Kongehuset, Lett Advokater, LIFE Magazine, Logitech, Oracle, McDonalds, Månedsmagasinet IN, Nationalbanken, NCC, Netcompany, Nordea, Nordisk Film, Sjælsø, Søren Østergaard, Søs Fenger, Pointwork, Post Greenland, Psykologi, Region Hovedstaden, Rigshospitalet, Rockwool, Røde Kors, Salon Aqua, Scandinavian Branding, Slots og Ejendomsstyrelsen, Spencer & Stuart, TDC, TV2, Udenrigsministeriet, Unicef, Vandkunstens Forlag, WHO, Zirkus Nemo, Øresundskonsortiet, Ørkenens Sønner m.fl. | Udstillet på bl.a.  Frederiksborg Nationalhistoriske Museum, Den Sorte Diamant, Dansk Kulturinstitut i Edinburgh, Nationalteatret i Riga, Nationalbiblioteket i Tallin, Dansk Kulturinstitut i Ungarn og den danske ambassade i Chengdu, Kina</p>
</div>

	</div>
</div> <!-- /page-container -->

<?php
/*|:-> Load FOOTER <-:|*/
@include DIR_USER."site-footer.php";
ob_end_flush();

/*
 * This copyright notice just for note to the programmer involved
 * Regards, 
 * medmed - at - scriptlance
 * #################################################################
 * Copyright (c) 2009 medyCMS. All rights reserved.
 */