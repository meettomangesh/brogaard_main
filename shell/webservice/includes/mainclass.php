<?php
class mainclass extends generalfunction{
	var $productdata=array();
	var $image="";
	
	var $tmp_name="";
	var $fashion_images_dest="projectimages";
	var $error="";
	var $image_type="";
	 
	 
    
	function __construct() 
	{
		
	}
	
	
	
	
	
	
	//upload_image this function used to send file in images dir 
	
	function upload_file($field,$directory,$filename='') {
		 global $resizer;
		 
         $_FILES[$field]['name']=$filename;
         if(move_uploaded_file($_FILES[$field]['tmp_name'],''.$directory.$_FILES[$field]['name'])) {
		 
		 	
		      //$this->createThumb(''.$directory.$_FILES[$field]['name'],''.$directory.$_FILES[$field]['name'],$width,$height);
				return $_FILES[$field]['name'];
			 
			 
	     }
		 return false;
     }
	 
	function upload_video_file($field,$directory,$filename='') {
		 global $resizer;
		 
         $_FILES[$field]['name']=$filename;
         if(move_uploaded_file($_FILES[$field]['tmp_name'],''.$directory.$_FILES[$field]['name'])) {
		 
		 	
		      //$this->createThumb(''.$directory.$_FILES[$field]['name'],''.$directory.$_FILES[$field]['name'],$width,$height);
				return $_FILES[$field]['name'];
			 
			 
	     }
		 return false;
     }
	
	
	
	function upload_image($field,$directory,$filename='',$width=215,$height=120) {
		 global $resizer;
		 
         $_FILES[$field]['name']=$filename;
         if(move_uploaded_file($_FILES[$field]['tmp_name'],''.$directory.$_FILES[$field]['name'])) {
		 
		 	
		      $this->createThumb(''.$directory.$_FILES[$field]['name'],''.$directory.$_FILES[$field]['name'],$width,$height);
				return $_FILES[$field]['name'];
			 
			 
	     }
		 return false;
     }
	 
	 
	function delete_image($imagename) {
	   if($imagename) {
	  
			 if(file_exists(''.$this->fashion_images_dest.'/'. $imagename))
			 {
				@unlink(''.$this->fashion_images_dest.'/'. $imagename);
		 	  }
        } 
     }	

	function getHeight($photo) 
	 {
		$sizes = getimagesize($photo);
		$height = $sizes[1];
		return $height;
     }
		  
	function getWidth($photo)
	  {
			$sizes = getimagesize($photo);
			$width = $sizes[0];
			return $width;
	  }
	

 	function createThumb($img,$distination,$maxwidth,$maxheight) { 
    
    list($width, $height, $type) = getimagesize($img);
    if ($maxwidth < $width && $width >= $height) { 
      $thumbwidth = $maxwidth;
      $thumbheight = ($thumbwidth / $width) * $height;
    }
    elseif ($maxheight < $height && $height >= $width) { 
      $thumbheight = $maxheight;
      $thumbwidth = ($thumbheight /$height) * $width;
    }
    else { 
      $thumbheight = $height;
      $thumbwidth = $width;
    }
    $imgbuffer = imagecreatetruecolor($thumbwidth, $thumbheight);
    switch($type) {
      case 1: $image = imagecreatefromgif($img); break;
      case 2: $image = imagecreatefromjpeg($img); break;
      case 3: $image = imagecreatefrompng($img); break;
      default: return "Tried to create thumbnail from $img: not a valid image";
    }
    if (!$image) return "Image creation from $img failed for an unknown reason. Probably not a valid image.";
    else {
      imagecopyresampled($imgbuffer, $image, 0, 0, 0, 0, $thumbwidth, $thumbheight, $width, $height);
      imageinterlace($imgbuffer);
      $output = imagejpeg($imgbuffer, $distination, 80);
      imagedestroy($imgbuffer);
      return $output;
    }
  }
	
  	
	//----------------------------------------------

######### Check Injection ################
	function no_injection($string){
	
	//$string = htmlspecialchars($string);
	//$string = trim($string);
	//$string = stripslashes($string);
	$string = mysql_real_escape_string($string);
	return $string;
	}
######### End of Check Injection ################
}
?>