<?php
error_reporting(0);

/*|:-> Load system configuration <-:|*/
require_once( dirname(dirname(__FILE__)) . '/core-configs.php' ); 

// #############################################################
// Loads core (function) files
// #############################################################
load_core_functions();
// #############################################################
// Connect to MySQL Database
// #############################################################
database_connect();

// Bottom cell height for text: 9.17 (mm) = 26 px

function calculationPDF($imgWpx, $imgHpx) 
{ 
  $imgWmm = round( ($imgWpx * 25.4) / 72 );
  $imgHmm = round( ($imgHpx * 25.4) / 72 );

  $fixWmm = 361; // 361 (mm) equals to 1200 px
  $fixHmm = 270; // 270 (mm) equals to 800 px 260.83

  if ( $imgWmm>$fixWmm || $imgHmm>$fixHmm ) 
  {
	if ( $imgWmm>$fixWmm && $imgHmm>$fixHmm ) 
	{
		// IF W and H is bigger than expected (calculate based on HEIGHT only)
		$selisihHeight = ($imgHmm - $fixHmm);
		$HeightRatio = ($selisihHeight / $imgHmm) * 100;
		$WxR = ($imgWmm * $HeightRatio)/100; // Width x Ratio (%)
		$wReal = ($imgWmm - $WxR);
		$jarakDariKiri = round( ($fixWmm - $wReal)/2 ); 
		//echo 'Hidden WIDTH as (3) : '.$imgWmm.'<br />';
		//echo 'WRITE HEIGHT as (3) : '.$fixHmm.'<br />';
		//echo 'WRITE Position From Left : '.$jarakDariKiri.'<br />';
		$outputResult = array($fixHmm, $jarakDariKiri);
	}
	else if ( $imgWmm > $fixWmm ) 
	{
		// IF only W is bigger than expected (H should be resized though)
		$selisihWidth = ($imgWmm - $fixWmm);
		$WidthRatio = ($selisihWidth / $imgWmm) * 100;
		$HxR = ($imgHmm * $WidthRatio)/100; // Height x Ratio (%)
		$HReal = round($imgHmm - $HxR);
		$jarakDariKiri = 0; 
		//echo 'Hidden WIDTH as (2) : '.$fixWmm.'<br />';
		//echo 'WRITE HEIGHT as (2) : '.$HReal.'<br />'; 
		//echo 'WRITE Position From Left : '.$jarakDariKiri.'<br />';
		$outputResult = array($HReal, $jarakDariKiri);
	}
	else if ( $imgHmm > $fixHmm ) 
	{
		// IF only H is bigger than expected (W should be resized though)
		$selisihHeight = ($imgHmm - $fixHmm);
		$HeightRatio = ($selisihHeight / $imgHmm) * 100;
		$WxR = ($imgWmm * $HeightRatio)/100; // Width x Ratio (%)
		$wReal = ($imgWmm - $WxR);
		$jarakDariKiri = round( ($fixWmm - $wReal)/2 ); 
		//echo 'Hidden WIDTH as (3) : '.$imgWmm.'<br />';
		//echo 'WRITE HEIGHT as (3) : '.$fixHmm.'<br />';
		//echo 'WRITE Position From Left : '.$jarakDariKiri.'<br />';
		$outputResult = array($fixHmm, $jarakDariKiri);
	}
  } 
  else 
  {
	// Image do not need to be resized
	$jarakDariKiri = round( ($fixWmm - $imgWmm)/2 );
	//echo 'Hidden WIDTH as (4) : '.$imgWmm.'<br />';
	//echo 'Write HEIGHT as (4) : '.$imgHmm.'<br />';
	//echo 'WRITE Position From Left : '.$jarakDariKiri.'<br />'; 
	$outputResult = array($imgHmm, $jarakDariKiri);
  }

  return $outputResult;
} // END function calculationPDF

function shrinkBigImage ($source_pic, $destination_pic) 
{ 
	$max_width = 1024;
	$max_height = 768;

	$src = imagecreatefromjpeg($source_pic);
	list($width,$height)=getimagesize($source_pic);

	$x_ratio = $max_width / $width;
	$y_ratio = $max_height / $height;

	if( ($width <= $max_width) && ($height <= $max_height) ){
		$tn_width = $width;
	    $tn_height = $height;
	}elseif (($x_ratio * $height) < $max_height){
        $tn_height = ceil($x_ratio * $height);
        $tn_width = $max_width;
    }else{
        $tn_width = ceil($y_ratio * $width);
        $tn_height = $max_height;
	}

	$tmp=imagecreatetruecolor($tn_width,$tn_height);
	imagecopyresampled($tmp,$src,0,0,0,0,$tn_width, $tn_height,$width,$height);

	imagejpeg($tmp,$destination_pic,100);
	imagedestroy($src);
	imagedestroy($tmp);
} // END function shrinkBigImage

function hasWord($word, $txt) {
    $patt = "/(?:^|[^a-zA-Z])" . preg_quote($word, '/') . "(?:$|[^a-zA-Z])/i";
    return preg_match($patt, $txt);
} // END function hasWord

    function readfile_chunked($filename, $type='array') {
      $chunk_array=array();
      $chunksize = 1*(1024*1024); // how many bytes per chunk
      $buffer = '';
      $handle = fopen($filename, 'rb');
      if ($handle === false) {
       return false;
      }
      while (!feof($handle)) {
          switch($type)
          {
              case'array':
              // Returns Lines Array like file()
              $lines[] = fgets($handle, $chunksize);
              break;
              case'string':
              // Returns Lines String like file_get_contents()
              $lines = fread($handle, $chunksize);
              break;
          }
      }
       fclose($handle);
       return $lines;
    } 


// GLOBAL Parameters
$max_pic_width = 1024; // in pixels
$max_pic_height = 768; // in pixels
$tmpPhoto = DIR_USER.time(); // temp name for shrinked photo
//$tmpPhoto = DIR_USER.'deleteme.jpg';


// START Options to be downloaded as...
if ( isset($_POST['zips']) ) // http://www.phpclasses.org/package/6110-PHP-Create-archives-of-compressed-files-in-ZIP-format.html
{
// 1st option: download as a ZIP file
#####################################

require(DIR_USER."pdf/class.zip.php"); 

$fileTime = date("D, d M Y H:i:s T");

// Archive name
$archive_file_name = $_POST['zips'].'_BrogaardPortfolio.zip';
$zip = new Zip();
//$zip->setZipFile($archive_file_name); // create ZIP for backups

$zip->setComment("ZIP file created on www.Brogaard.com.\nCreated on " . date('l jS \of F Y h:i:s A'));

	// loop through $_SESSION['img2pdf'] array with foreach
	$ij = 1;
	foreach($_POST['img'] as $key=>$value)
    { 
		// Reverse hash from POST parameter to its actual id
		$imgid = base64safe_decode($value);

		if( ctype_digit($imgid) ) 
		{ 
			// DIGITS |+> search location from database
			// Get Image Path from database
			$getImgPath = db_single_retrieve('image_path',TBL_IMAGE_DATA,'image_id',$imgid);

			// Assign the proper file location
			$fileLocation = CMS_PATH.$getImgPath;
		} else { 
			// LOCATION |+> Check if it's in directory /clientarea/ or not
			$check = hasWord('clientarea', $imgid);

				if ( $check ) { 
					$dlPath = CMS_PATH; 
				} else { 
					$dlPath = DIR_USER; 
				} 

			// Assign the proper file location
			$fileLocation = $dlPath.$imgid;
		}

		// prepare image(a) to be ZIPped
		$zip->addFile(file_get_contents($fileLocation), basename($fileLocation));

		$ij++;
    } // END foreach

	$zip->finalize();
	$zip->sendZip($archive_file_name);

} 
else 
{
// 2nd option: generate PDF
###########################
define('FPDF_FONTPATH',DIR_USER.'pdf/font');
require(DIR_USER."pdf/fpdf.php"); 

// Instanciation of inherited class
$pdf = new FPDF('L','mm',array(361.24,270.93)); // 1024x768 pixels

// $pdf = new FPDF('L','mm',array(423.42,282.19));
// L: Landscape
// mm: milimeters
// Sets WIDTH [Landscape] equals to 16.67(in) X 11.11(in) equals to 1200(px) X 800(px)
// 
// LIMITED OUTPUT :
// W = 423mm = 1199px
// H = 282mm = 799px

$pdf->SetAuthor('Steen Brogaard');
$pdf->SetTitle('Copenhagen Based Photographer'); 
$pdf->SetCreator('Brogaard FPDF Engine 1.7');

//$pdf->AliasNbPages(); // Optional

$pdf->SetDisplayMode('fullwidth','continuous'); 
// fullwidth: uses maximum width of window 
// continuous: displays pages continuously 

$pdf->SetMargins(0,0,0);


$pdf->AddPage(); // Add LOGO on 1st Page
################
$is_img_LOGO = DIR_USER."pdf/pdf_logo.jpg";
//$img_size_LOGO = getimagesize($is_img_LOGO);
//$imgWpx_LOGO = $img_size_LOGO[0];
//$imgHpx_LOGO = $img_size_LOGO[1];
//$var_img_LOGO = calculationPDF($imgWpx_LOGO, $imgHpx_LOGO);
//$pdf->Image($is_img_LOGO,$var_img_LOGO[1],0,0,$var_img_LOGO[0],'',CMS_URL);
$pdf->Image($is_img_LOGO,0,0,0,270.93,'',CMS_URL); // LOGO is 1024x768px

	// loop through $_SESSION['img2pdf'] array with foreach
	$ij = 1;
	foreach($_POST['img'] as $key=>$value)
    { 
		// Reverse hash from POST parameter to its actual id
		$imgid = base64safe_decode($value);

		if( ctype_digit($imgid) ) 
		{ 
			// DIGITS |+> search location from database
			// Get Image Path from database
			$getImgPath = db_single_retrieve('image_path',TBL_IMAGE_DATA,'image_id',$imgid);

			// Assign the proper file location
			$fileLocation = CMS_PATH.$getImgPath;
		} else { 
			// LOCATION |+> Check if it's in directory /clientarea/ or not
			$check = hasWord('clientarea', $imgid);

				if ( $check ) { 
					$dlPath = CMS_PATH; 
				} else { 
					$dlPath = DIR_USER; 
				} 

			// Assign the proper file location
			$fileLocation = $dlPath.$imgid;
		}

		$pdf->AddPage();
		################
		$img_size = getimagesize($fileLocation);
		$imgWpx = $img_size[0];
		$imgHpx = $img_size[1];
		$tmpPho = $tmpPhoto.'-'.$ij.'.jpg';

		if ( $imgWpx > $max_pic_width || $imgHpx > $max_pic_height ) 
		{ 
			shrinkBigImage ($fileLocation, $tmpPho); 
			$img_sizeTmp = getimagesize($tmpPho);
			$imgWpxTmp = $img_sizeTmp[0];
			$imgHpxTmp = $img_sizeTmp[1];
			$var_imgTmp = calculationPDF($imgWpxTmp, $imgHpxTmp);
			$pdf->Image($tmpPho,$var_imgTmp[1],0,0,$var_imgTmp[0],'');
				// Set font for Image Name
				$pdf->SetFont('Courier','',12);
				// Background color
				$pdf->SetFillColor(255,255,255);
				// Title
				$pdf->Cell(0,6,basename($fileLocation),0,1,'C',true);
		} 
		else 
		{
			$var_img = calculationPDF($imgWpx, $imgHpx);
			$pdf->Image($fileLocation,$var_img[1],0,0,$var_img[0],'');
				// Set font for Image Name
				$pdf->SetFont('Courier','',12);
				// Background color
				$pdf->SetFillColor(255,255,255);
				// Title
				$pdf->Cell(0,6,basename($fileLocation),0,1,'C',true);
		}

			while(is_file($tmpPho) == TRUE)
			{
			    chmod($tmpPho, 0666);
			    unlink($tmpPho);
			}

		//$var_img = calculationPDF($imgWpx, $imgHpx);
		//$pdf->Image($fileLocation,$var_img[1],0,0,$var_img[0],'');
		$ij++;
    } // END foreach

$pdf->Output('BrogaardPortfolio.pdf','D');
// Sets Output File Name
// D: Force download

} // END Options to be downloaded as...

exit;

/*
 * This copyright notice just for note to the programmer involved
 * Regards, 
 * medmed - at - scriptlance
 * #################################################################
 * Copyright (c) 2009 medyCMS. All rights reserved.
 */