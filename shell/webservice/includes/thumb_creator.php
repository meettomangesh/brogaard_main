<?php
  class thumb_creator {

function create($nw, $nh, $source, $stype, $dest) {
	global $site_setting;
	
	require_once(dirname(__FILE__) .'/thumb_creator/Thumbnail.php');
	require_once(dirname(__FILE__) .'/thumb_creator/ImageManager.php');
	$config['root_url'] = $site_setting['site_url'];	
	$config['image_manipulation_prog'] = 'GD';
	$config['image_transform_lib_path'] = '/usr/bin/ImageMagick/';
	define('IMAGE_CLASS', $config["image_manipulation_prog"]);
	$IMConfig['base_dir'] = $config["image_uploads_path"];
	$IMConfig['base_url'] = $config["image_uploads_url"];	
	$IMConfig['thumbnail_prefix'] = '';
	$IMConfig['safe_mode'] = false;
	$IMConfig['thumbnail_dir'] = '';
	$config['image_uploads_path'] = str_replace('/'.basename($dest),'',$source);
	$config['image_uploads_url'] = str_replace('/'.basename($dest),'',$source); 
	$manager = new ImageManager($IMConfig);
	$curdatetime	= date('dmYhis');	
	$imgInfo = @getImageSize($source);
	$fullpath=$source;
	$thumnail_path = $dest;
	$thumbnail = $manager->getThumbName($thumnail_path);
	$height = $nh;
	$width =  $nw;
	$thumbnailer = new Thumbnail($width,$height);
	$thumbnailer->createThumbnail($fullpath, $thumbnail);


  }
}

?>

