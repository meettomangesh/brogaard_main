<?php
// Restrict direct access to this file
if(!defined('BROGAARD_AUTH'))
{ 
	//die('DIRECT ACCESS TO THIS FILE IS NOT ALLOWED!');
	header("Location: ./index.php");
	exit; 
} 

?>
<style type="text/css">
<?php
	$thisFile = ( ($_SERVER["SCRIPT_FILENAME"]!='')?$_SERVER["SCRIPT_FILENAME"]:$_SERVER['PHP_SELF'] );
	if ( basename($thisFile) == 'about.php' ) { 
?>
#ajaxticker_brogaard{ 
clear:both;
margin: 0 auto;
margin-top:10px;
width: 958px;
/*height: 100px;*/
border: 1px solid #ffffff;
padding: 5px;
background: #f8f8f8;
background-color: rgb(248,248,248); /* Needed for IEs */
color: #7e7e7e;
font-family: monotype, Arial;
font-size: 9pt;
line-height: 12pt;
	-webkit-box-shadow: 0px 0px 2px #777677;
	-moz-box-shadow: 0px 0px 2px #777677;
	box-shadow: 0px 0px 2px #777677;
	border-radius: 8px; 
	-moz-border-radius: 8px;
margin-top:20px;
} 
<?php 
	} else { 
?>
#ajaxticker_brogaard{ 
clear:both;
margin: 0 auto;
margin-top:10px;
width: 958px;
/*height: 100px;*/
border: 1px solid #ffffff;
padding: 5px;
background: #ffffff;
background-color: rgb(255,255,255); /* Needed for IEs */
color: #7e7e7e;
font-family: monotype, Arial;
font-size: 9pt;
line-height: 12pt;
	-webkit-box-shadow: 0px 0px 2px #777677;
	-moz-box-shadow: 0px 0px 2px #777677;
	box-shadow: 0px 0px 2px #777677;
	border-radius: 8px; 
	-moz-border-radius: 8px;
margin-top:20px;
} 
<?php
	} 
?>
#ajaxticker_brogaard div{ 
/*IE6 bug fix when text is bold and fade effect (alpha filter) is enabled. Style inner DIV with same color as outer DIV*/
/*background-color: #f6f6f6;*/
}
.tickerstyle { text-align: left; }
.tickerstyle strong { color: #6d6d6d; font-weight: bold; }
.tickerstyle a { color: #6d6d6d; text-decoration: underline; }
.tickerhide { display: none; }
</style>

<script src="<?php echo URL_USER; ?>news-ticker.js" type="text/javascript">
/***********************************************
* Ajax Ticker script (txt file source)- © Dynamic Drive (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit http://www.dynamicdrive.com/ for this script and 100s more.
***********************************************/
</script>

<script type="text/javascript">

var xmlfile="<?php echo URL_USER; ?>news-content.txt" //path to ticker txt file on your server.

//ajax_ticker(xmlfile, divId, divClass, delay, optionalfadeornot)
new ajax_ticker(xmlfile, "ajaxticker_brogaard", "tickerstyle", [12000], "fade") //rotates every 3.5 seconds
//new ajax_ticker(xmlfile, "ajaxticker1", "someclass", [3500, 60000], "fade") //rotates every 3.5 seconds plus refetch xml file every minute

</script>
<?php
/*
 * This copyright notice just for note to the programmer involved
 * Regards, 
 * medmed - at - scriptlance
 * #################################################################
 * Copyright (c) 2009 medyCMS. All rights reserved.
 */