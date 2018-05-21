<?php
/*|:-> Load system configuration <-:|*/
require_once(dirname(__FILE__) . '/' . "auth.php");

header("Content-Type: application/rss+xml; charset=UTF-8");

$currDate = date('r', time());

echo '<?xml version="1.0" encoding="utf-8"?>'."\n";
echo '<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">'."\n";
echo '<channel>'."\n";
echo '<atom:link href="'.URL_USER.'news-rss.php" rel="self" type="application/rss+xml" />'."\n";
echo '<title>'.lang('site_meta_title').'</title>'."\n";
echo '<link>'.CMS_URL.'</link>'."\n";
echo '<description>'.lang('site_meta_description').'</description>'."\n";
echo '<language>da</language>'."\n";
echo '<copyright>Copyright '.date('Y', time()).' Steen Brogaard - For Personal Use Only</copyright>'."\n";
echo '<generator>www.brogaard.com</generator>'."\n";
echo '<lastBuildDate>'.$currDate.'</lastBuildDate>'."\n";
echo '<image>'."\n";
echo '<url>'.URL_USER.'pages-resources/images/identityplate-whitebg.png</url>'."\n";
echo '<title>'.lang('site_meta_title').'</title>'."\n";
echo '<link>'.CMS_URL.'</link>'."\n";
echo '<width>144</width>'."\n";
echo '<height>39</height>'."\n";
echo '<description>'.lang('site_meta_description').'</description>'."\n";
echo '</image>'."\n";

$fileTXT = URL_USER.'news-content.txt';
$v = file_get_contents_curl_quick($fileTXT);

preg_match_all('/<!--TITLE-->(.*?)<!--\/TITLE-->/si', $v, $r);
preg_match_all('/<!--CONTENT-->(.*?)<!--\/CONTENT-->/si', $v, $s);
preg_match_all('/<!--DATE-->(.*?)<!--\/DATE-->/si', $v, $t);

$get['title']	= $r[1];
$get['content']	= $s[1];
$get['date']	= $t[1];

$total = count($get['title']);

foreach ( $get as $key=>$val ) { $$key = $val; } 

for ($i=0; $i<$total; $i++) { 
	$datetime = strtotime($date[$i]);
	echo '<item>'."\n"; 
	echo '<title>'.$title[$i].'</title>'."\n"; 
	echo '<guid>'.URL_USER.'news.php#'.$date[$i].'</guid>'."\n"; 
	echo '<link>'.URL_USER.'news.php#'.$date[$i].'</link>'."\n"; 
	echo '<pubDate>'.date('r', $datetime).'</pubDate>'."\n"; 
	echo '<description>'.htmlspecialchars($content[$i], ENT_QUOTES).'</description>'."\n"; 
	echo '</item>'."\n";
}

echo '</channel>'."\n";
echo '</rss>';

/*
 * This copyright notice just for note to the programmer involved
 * Regards, 
 * medmed - at - scriptlance
 * #################################################################
 * Copyright (c) 2009 medyCMS. All rights reserved.
 */