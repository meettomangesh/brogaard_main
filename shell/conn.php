<?php 
// Look-up for MySQL parameters
@require_once( dirname(dirname(__FILE__)) . '/core-settings.php' ); 

mysql_connect(DB_HOST, DB_USER, DB_PASS) or die ("Cannot connect database");
mysql_select_db(DB_NAME) or die ("Cannot select database");

function make_safe($variable) {
  $variable = eregi_replace("[^[:alnum:]]", " ", $variable);
  $variable = htmlspecialchars(addslashes($variable));
  return $variable;
}

function strip_to_numbers_only($string) {
     $pattern = '/[^0-9]/';
     return preg_replace($pattern, '', $string);
}

/*
 * This copyright notice just for note to the programmer involved
 * Regards, 
 * medmed - at - scriptlance
 * #################################################################
 * Copyright (c) 2009 medyCMS. All rights reserved.
 */