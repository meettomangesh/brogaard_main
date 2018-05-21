<!--<div id="google_translate_element"></div>
<script>
function googleTranslateElementInit() {
  new google.translate.TranslateElement({
    pageLanguage: 'da', 
    gaTrack: true,
    gaId: 'UA-11542948-1',
    layout: google.translate.TranslateElement.InlineLayout.SIMPLE
  }, 'google_translate_element');
}
</script>
<script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>-->
<?php
// localhost url
//$siteurl = "http://".$_SERVER['HTTP_HOST']."/brogaard_web/";
// server url 
$siteurl = "http://".$_SERVER['HTTP_HOST']."/";
global $siteurl;
error_reporting(E_ALL ^ E_NOTICE);
$my_email = "steen@brogaard.com,ida@brogaard.com";
//$my_email = "chandrakant.bhamare78@gmail.com";
$bcc = "";
$subject = "Besked til Steen Brogaard";
$from_email = "";
$continue = "../../../index.php";
$auto_redirect = 0;
$redirect_url = "";
$thank_you_message_template = 0;
$thank_you_message_template_filename = "thank_you_message_template.php";
$pre_populate_form = 0;
$show_errors_on_form_page = 0;
$form_page_url = "";
$confirm_email_address = 0;
$required_fields_check = 0;
$required_fields = array('name','email','comments');
$show_ip = 1;
$banned_ips_check = 0;
$banned_ips = array();
$banned_ip_message = "Your IP address is banned.  The form was not sent.";
$require_cookie = 0;
$check_referrer = 1;
$word_block = 1;
$blocked_words = array('http://','https://','viagra');
$gibberish_check = 1;
$gibberish_threshold = 6;
$gobbledegook_check = 0;
$Securimage_CAPTCHA = 0;
$reCAPTCHA = 0;
$privatekey = "";
$identiPIC_photo_CAPTCHA = 0;
$identiPIC[1] = "Apple";
$identiPIC[2] = "Flower";
$identiPIC[3] = "Fork";
$email_template = 0;
$email_template_filename = "email_template.php";
$html_format = 1;
$table_cellpadding = "5";
$table_cellspacing = "1";
$table_background_color = "#000000";
$table_left_column_color = "#ececec";
$table_left_column_font = "arial";
$table_left_column_font_size = "2";
$table_left_column_font_color = "#000000";
$table_right_column_color = "#ffffff";
$table_right_column_font = "arial";
$table_right_column_font_size = "2";
$table_right_column_font_color = "#000000";

$autoresponder_font = "arial";
$autoresponder_font_size = "2";
$autoresponder_font_color = "#000000";
$character_set = "utf-8";
$encode_name_subject = 0;
$csv_attachment = 1;
$csv_file_on_server = 0;
$path_to_csv_file = dirname(__FILE__) . "/";
$csv_filename = "form_data.csv";
$show_date_and_time = 1;
$message_id = 0;
$autoresponder = 1;
$autoresponder_from = "";
$autoresponder_subject = "Kvittering fra brogaard.com";
$autoresponder_header_message = "Tak for din besked. Her kan du se, hvad du har skrevet/bestilt.";
$autoresponder_footer_message = "Med venlig hilsen Steen Brogaard";

$autoresponder_attachment = 0;
$autoresponder_attachment_file = "";
$autoresponder_attachment_path = "";
$autoresponder_attachment_content_type = "";
$autoresponse_email_template = 0;
$autoresponse_email_template_filename = "email_template_autoresponse.php";
$ignore_fields = 1;
$fields_to_ignore = array('Submit','submit','recaptcha_challenge_field','recaptcha_response_field','captcha_code');
$sort_fields = 0;
$field_order_keys = array('email','comments','name');
$line_spacing = 1;
$show_blank_fields = 0;
$block_file_types = 0;
$file_types_to_block = array('.com','.bat','.exe');
$allow_file_types = 0;
$file_types_to_allow = array('.doc','.pdf','.jpg');
$max_file_size = "";
$upload_files_to_server = 0;
$path_to_uploaded_file = dirname(__FILE__) . "/";
$uploaded_file_prefix = "";
$replace_spaces_in_filenames = 0;
$show_attachments_in_email_body = 1;
$errors = array();
$attachment_array = array();

// Remove $_COOKIE elements from $_REQUEST.

if(count($_COOKIE)){foreach(array_keys($_COOKIE) as $value){unset($_REQUEST[$value]);}}

// Put submitted values in session.

if($pre_populate_form)
{

session_start();

$_SESSION['submitted_form_values'] = $_REQUEST;

}

// Check Securimage CAPTCHA

if($Securimage_CAPTCHA)
{

session_start();

include_once dirname(__FILE__) . '/securimage/securimage.php';

$securimage = new Securimage();

if(!isset($_REQUEST['captcha_code'])){exit;}else{if($securimage->check($_REQUEST['captcha_code']) == false){$errors[] = "Please enter the correct CAPTCHA code";}}

}

// Check reCAPTCHA

if($reCAPTCHA)
{
	
require_once('recaptchalib.php');
$resp = recaptcha_check_answer($privatekey,$_SERVER["REMOTE_ADDR"],$_REQUEST["recaptcha_challenge_field"],$_REQUEST["recaptcha_response_field"]);

if(!$resp->is_valid)
{

$errors[] = "The reCAPTCHA wasn't entered correctly. Go back and try it again (reCAPTCHA said: " . $resp->error . ")";

}

}

// Check identiPIC photo CAPTCHA.

if($identiPIC_photo_CAPTCHA)
{

if(!isset($_REQUEST['identiPIC_selected'])){$errors[] = "You have failed to identify the pictures correctly.  Please try again.";}else{if($_REQUEST['identiPIC_selected'] !== $identiPIC){$errors[] = "You have failed to identify the pictures correctly.  Please try again.";} unset($_REQUEST['identiPIC_selected']);}

}

// Validate email field.

if(isset($_REQUEST['email']) && !empty($_REQUEST['email']))
{

$_REQUEST['email'] = trim($_REQUEST['email']);

if(substr_count($_REQUEST['email'],"@") != 1 || stristr($_REQUEST['email']," ")){$errors[] = "Email address is invalid";}else{$exploded_email = explode("@",$_REQUEST['email']);if(empty($exploded_email[0]) || strlen($exploded_email[0]) > 64 || empty($exploded_email[1])){$errors[] = "Email address is invalid";}else{if(substr_count($exploded_email[1],".") == 0){$errors[] = "Email address is invalid";}else{$exploded_domain = explode(".",$exploded_email[1]);if(in_array("",$exploded_domain)){$errors[] = "Email address is invalid";}else{foreach($exploded_domain as $value){if(strlen($value) > 63 || !preg_match('/^[a-z0-9-]+$/i',$value)){$errors[] = "Email address is invalid"; break;}}}}}}

}

// Test for cookie.

if($require_cookie)
{

if(!isset($_COOKIE['formtoemailpro'])){$errors[] = "You must enable cookies to use the form";}

}

// Check referrer.

if($check_referrer)
{

if(!(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']) && stristr($_SERVER['HTTP_REFERER'],$_SERVER['HTTP_HOST']))){$errors[] = "You must enable referrer logging to use the form";}

}

// Check for required fields.  If none, don't allow blank form to be sent.

if($required_fields_check)
{

foreach($required_fields as $value){if((!isset($_REQUEST[$value]) || empty($_REQUEST[$value])) && (!isset($_FILES[$value]['name']) || empty($_FILES[$value]['name']))){$errors[] = "Please complete the $value field";}}

}else{

// Check for a blank form.

function recursive_array_check_blank($element_value)
{

global $set;

if(!is_array($element_value)){if(!empty($element_value)){$set = 1;}}
else
{

foreach($element_value as $value){if($set){break;} recursive_array_check_blank($value);}

}

}

recursive_array_check_blank($_REQUEST);

// Check for a file input.  If present, allow the form to be sent.

if(count($_FILES))
{

foreach(array_keys($_FILES) as $value){if(!empty($_FILES[$value]['name'])){$set = 1;}}

}

if(!$set){$errors[] = "You cannot send a blank form";}

unset($set);

}

// Confirm email address.

if($confirm_email_address)
{

if(isset($_REQUEST['email']) || isset($_REQUEST['email2']))
{

if($_REQUEST['email'] != $_REQUEST['email2']){$errors[] = "Please correctly confirm your email address";}else{unset($_REQUEST['email2']);}

}

}

// Check for banned IPs.

if($banned_ips_check)
{

foreach($banned_ips as $value)
{

if($value == substr($_SERVER["REMOTE_ADDR"], 0, strlen($value))){$errors[] = $banned_ip_message; break;}

}

}

// Check for gibberish.

if($gibberish_check)
{

$vowels = array('a','e','i','o','u');

$consonants = array('b','c','d','f','g','h','j','k','l','m','n','p','q','r','s','t','v','w','x','y','z');

function recursive_array_gibberish_check($element_value)
{

global $set;
global $vowels;
global $consonants;
global $return_value;
global $gibberish_threshold;

if(!is_array($element_value))
{

$exploded_value = explode(" ",$element_value);

foreach($exploded_value as $word_to_check)
{

$consecutive_consonant_count = 0;
$consecutive_vowel_count = 0;

if((strlen($word_to_check) >= $gibberish_threshold) && (!is_numeric($word_to_check)))
{

// in_array() is case sensitive.  Convert input to lower case.

$word_to_check = strtolower($word_to_check);

for($i = 0; $i < strlen($word_to_check); $i++)
{

if(in_array($word_to_check[$i],$vowels)){$consecutive_consonant_count = 0; $consecutive_vowel_count++; if($consecutive_vowel_count == $gibberish_threshold){$set = 1; $return_value = $word_to_check; break;}}elseif(in_array($word_to_check[$i],$consonants)){$consecutive_vowel_count = 0; $consecutive_consonant_count++; if($consecutive_consonant_count == $gibberish_threshold){$set = 1; $return_value = $word_to_check; break;}}else{if($word_to_check[$i] == "@" || $word_to_check[$i] == "-" || $word_to_check[$i] == "." || $word_to_check[$i] == ":"){$consecutive_consonant_count = 0; $consecutive_vowel_count = 0;}}

}

}

if($set){break;}

}

}
else
{

foreach($element_value as $value){if($set){break;} recursive_array_gibberish_check($value);}

}

}

recursive_array_gibberish_check($_REQUEST);

if($set){$errors[] = "You have submitted a gibberish word: \"{$return_value}\"";}

unset($set);
unset($return_value);

}

// Check all fields for gobbledegook.

if($gobbledegook_check)
{

$gobbledegook_alphabet = array('¡','¢','¤','¦','§','¨','ª','«','¬','®','¯','°','±','²','³','µ','¶','·','¸','¹','º','»','¼','½','¾','¿','À','Á','Â','Ã','Ä','Å','Æ','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ð','Ñ','Ò','Ó','Ô','Õ','Ö','×','Ø','Ù','Ú','Û','Ü','Ý','Þ','ß','à','á','â','ã','ä','å','æ','ç','è','é','ê','ë','ì','í','î','ï','ð','ñ','ó','õ','ö','÷','ø','ú','û','ü','ý','þ');

function recursive_array_check_gobbledegook($element_value,$inkey = "")
{

global $set;
global $gobbledegook_alphabet;
global $return_value;
global $return_key;

if(!is_array($element_value))
{

foreach($gobbledegook_alphabet as $value){if(stristr($element_value,$value)){$set = 1; $return_value = $value; $return_key = $inkey; break;}}

}else{

foreach($element_value as $key => $value){if($set){break;} recursive_array_check_gobbledegook($value,$key);}

}

}

recursive_array_check_gobbledegook($_REQUEST);

if($set){if(is_numeric($return_key)){$errors[] = "You have entered an invalid character ($return_value)";}else{$errors[] = "You have entered an invalid character ($return_value) in the \"$return_key\" field";}}

unset($set);
unset($return_value);
unset($return_key);

}

// Check for blocked words/web addresses.

if($word_block)
{

function recursive_array_check_word_block($element_value,$inkey = "")
{

global $set;
global $blocked_words;
global $return_value;
global $return_key;

if(!is_array($element_value))
{

foreach($blocked_words as $value){if(stristr($element_value,$value)){$set = 1; $return_value = $value; $return_key = $inkey; break;}}

}else{

foreach($element_value as $key => $value){if($set){break;} recursive_array_check_word_block($value,$key);}

}

}

recursive_array_check_word_block($_REQUEST);

if($set){if(is_numeric($return_key)){$errors[] = "You have entered an invalid string ($return_value)";}else{$errors[] = "You have entered an invalid string ($return_value) in the \"$return_key\" field";}}

unset($set);
unset($return_value);
unset($return_key);

}

// Check for blocked/allowed file types and check file size.

if(count($_FILES))
{
	
if($block_file_types)
{

foreach(array_keys($_FILES) as $value)
{
	
if(!empty($_FILES[$value]['name']))
{
	

if(in_array(strtolower(strrchr($_FILES[$value]['name'],".")),$file_types_to_block))
{

$disallowed_filetype = strrchr($_FILES[$value]['name'],"."); $errors[] = "{$disallowed_filetype} file types are not permitted.  The file \"{$_FILES[$value]['name']}\" cannot be uploaded.";

}

}

}

}

if($allow_file_types)
{

foreach(array_keys($_FILES) as $value)
{
	
if(!empty($_FILES[$value]['name']))
{

if(!in_array(strtolower(strrchr($_FILES[$value]['name'],".")),$file_types_to_allow))
{

$disallowed_filetype = strrchr($_FILES[$value]['name'],"."); $errors[] = "{$disallowed_filetype} file types are not permitted.  The file \"{$_FILES[$value]['name']}\" cannot be uploaded.";

}
	
}

}

}

if($max_file_size)
{

foreach(array_keys($_FILES) as $value)
{
	
if(!empty($_FILES[$value]['size'])){if($_FILES[$value]['size'] > $max_file_size){$errors[] = "File \"{$_FILES[$value]['name']}\" exceeds the maximum file size of {$max_file_size} bytes.";}}

}

}

}

// Remove ignored fields from $_REQUEST.

if($ignore_fields)
{
	
foreach($fields_to_ignore as $value){if(isset($_REQUEST[$value])){unset($_REQUEST[$value]);}}

}

// Display any errors and exit if errors exist.

if(count($errors) && $show_errors_on_form_page == 0){foreach($errors as $value){print stripslashes(htmlspecialchars($value)) . "<br>";} exit;}

// Redirect to form page to display errors if enabled.

if(count($errors) && $show_errors_on_form_page)
{

session_start();

$_SESSION['formtoemail_form_errors'] = $errors;

header("location: $form_page_url"); exit;

}

if(!defined("PHP_EOL")){define("PHP_EOL", strtoupper(substr(PHP_OS,0,3) == "WIN") ? "\r\n" : "\n");}

if($line_spacing){$line_space = PHP_EOL.PHP_EOL;}else{$line_space = PHP_EOL;}

// HTML format the output.

if($html_format)
{

// Allow posted HTML code to be displayed (and not executed).  Convenient time to do nl2br.

function recursive_array_check_HTML(&$element_value)
{

if(!is_array($element_value)){$element_value = nl2br(htmlspecialchars($element_value));}
else
{

foreach($element_value as $key => $value){$element_value[$key] = recursive_array_check_HTML($value);}

}

return $element_value;

}

recursive_array_check_HTML($_REQUEST);

$html_open = "<html><head><title>$subject</title></head><body><table cellpadding=\"".$table_cellpadding."\" cellspacing=\"".$table_cellspacing."\" bgcolor=\"".$table_background_color."\">"; $html_close = "</table></body></html>"; $content_type = "html";}else{$html_open = ""; $colon_sep = ": "; $html_close = ""; $content_type = "plain";}

function build_message($request_input)
{

global $colon_sep;
global $html_format;
global $table_left_column_color;
global $table_left_column_font;
global $table_left_column_font_size;
global $table_left_column_font_color;
global $table_right_column_color;
global $table_right_column_font;
global $table_right_column_font_size;
global $table_right_column_font_color;
global $line_space;
global $show_blank_fields;

if(!isset($message_output)){$message_output = "";}if(!is_array($request_input)){$message_output = $request_input;}else{foreach($request_input as $key => $value){if(!empty($value) || $show_blank_fields){if($html_format){if(!is_numeric($key)){$message_output .= "<tr><td valign=\"top\" bgcolor=\"".$table_left_column_color."\" nowrap><font face=\"".$table_left_column_font."\" size=\"".$table_left_column_font_size."\" color=\"".$table_left_column_font_color."\"><b>".str_replace("_"," ",ucfirst($key))."</b></font></td><td bgcolor=\"".$table_right_column_color."\"><font face=\"".$table_right_column_font."\" size=\"".$table_right_column_font_size."\" color=\"".$table_right_column_font_color."\">".build_message($value)."</font></td></tr>".PHP_EOL;}else{$message_output .= "<table><tr><td><font face=\"".$table_right_column_font."\" size=\"".$table_right_column_font_size."\" color=\"".$table_right_column_font_color."\">".build_message($value)."</font></td></tr></table>";}}else{if(!is_numeric($key)){$message_output .= str_replace("_"," ",ucfirst($key)).$colon_sep.build_message($value).$line_space;}else{$message_output .= build_message($value).", ";}}}}}return rtrim($message_output,", ");

}

if($sort_fields)
{

$ordered_request = array();

foreach($field_order_keys as $value){$ordered_request[$value] = $_REQUEST[$value];}

$_REQUEST = $ordered_request;

}

// Show ATTACHMENTS in body of email.

if($show_attachments_in_email_body && count($_FILES) && !$upload_files_to_server)
{

foreach(array_keys($_FILES) as $value){if(!empty($_FILES[$value]['tmp_name'])){$_REQUEST[$value] = $_FILES[$value]['name'];}}

}

// Show FILE UPLOADS in body of email.

if(count($_FILES) && $upload_files_to_server)
{

if($replace_spaces_in_filenames)
{

// Replace spaces in filenames with a hyphen.

foreach(array_keys($_FILES) as $value){if(!empty($_FILES[$value]['tmp_name'])){$_FILES[$value]['name'] = str_replace(" ","-",$_FILES[$value]['name']);}}

$uploaded_file_prefix = str_replace(" ","-",$uploaded_file_prefix);

}
	
if(substr_count($path_to_uploaded_file,$_SERVER['DOCUMENT_ROOT']))
{
	
$web_location = str_replace($_SERVER['DOCUMENT_ROOT'],"",$path_to_uploaded_file);
	
if($html_format)
{
	
foreach(array_keys($_FILES) as $value){if(!empty($_FILES[$value]['tmp_name'])){$_REQUEST[$value] = "<a href=\"http://".$_SERVER['HTTP_HOST'].$web_location.$uploaded_file_prefix.$_FILES[$value]['name']."\">{$uploaded_file_prefix}{$_FILES[$value]['name']}</a>";}}

}
else
{
	
foreach(array_keys($_FILES) as $value){if(!empty($_FILES[$value]['tmp_name'])){$_REQUEST[$value] = "http://".$_SERVER['HTTP_HOST'].$web_location.$uploaded_file_prefix.$_FILES[$value]['name'];}}

}

}
else
{

foreach(array_keys($_FILES) as $value){if(!empty($_FILES[$value]['tmp_name'])){$_REQUEST[$value] = $uploaded_file_prefix.$_FILES[$value]['name'];}}
	
}

}

// Show sender's IP address.

if($show_ip){$_REQUEST["Sender's IP address"] = $_SERVER["REMOTE_ADDR"];}

// Show date and time submitted.

if($show_date_and_time){$_REQUEST["Date submitted"] = date("F jS, Y.  h:i a");}

// Create a message ID.

if($message_id){$_REQUEST["Message ID"] = mt_rand(10000000,99999999);}

if($email_template)
{

$message = file_get_contents($email_template_filename);

preg_match_all("/ff<[^>]*>/",$message,$matches);

$unique_matches = array_unique($matches[0]);

foreach($unique_matches as $value)
{

$key = rtrim(str_replace("ff<","",$value),">");

if(is_array($_REQUEST[$key]))
{

$array_content = "";

foreach($_REQUEST[$key] as $value2){$array_content .= $value2 . ", ";}

$array_content = rtrim($array_content,", ");

$message = str_replace($value,$array_content,$message);

}else{$message = str_replace($value,$_REQUEST[$key],$message);}

}

}else{

$message = $html_open;

$message .= build_message($_REQUEST);

$message .= $html_close;

}

// Strip slashes.

$message = stripslashes($message);

if($from_email)
{

$headers = "From: " . $from_email;
$headers .= PHP_EOL;
$headers .= "Reply-To: " . $_REQUEST['email'];
$headers .= PHP_EOL;
$headers .= "MIME-Version: 1.0";

}
else
{

$from_name = "";

if(isset($_REQUEST['name']) && !empty($_REQUEST['name'])){$from_name = stripslashes($_REQUEST['name']); if($encode_name_subject){$from_name = "=?{$character_set}?B?".base64_encode($_REQUEST['name'])."?=";}}

$headers = "From: {$from_name} <{$_REQUEST['email']}>";
$headers .= PHP_EOL;
$headers .= "MIME-Version: 1.0";

}

if($csv_attachment || $csv_file_on_server)
{

function build_file_data($data_input)
{

if(!isset($file_data)){$file_data = "";}if(!is_array($data_input)){if(stristr($data_input,'"')){$data_input = str_replace('"','""',$data_input);} if(stristr($data_input,'"') || stristr($data_input,",") || stristr($data_input,"\n") || stristr($data_input,"\r\n")){$file_data = "\"$data_input\"";}else{$file_data = $data_input;}}else{foreach($data_input as $key => $value){if(!is_numeric($key)){$file_data .= build_file_data($value).",";}else{$file_data .= build_file_data($value)." :: ";}}}return rtrim(rtrim($file_data,",")," :: ");

}

}

if(count($_FILES) || $csv_attachment)
{

if(count($_FILES))
{
	
if($upload_files_to_server)
{
	
foreach(array_keys($_FILES) as $value){if(!empty($_FILES[$value]['tmp_name'])){move_uploaded_file($_FILES[$value]['tmp_name'], $path_to_uploaded_file.$uploaded_file_prefix.$_FILES[$value]['name']);}}

}
else
{

foreach(array_keys($_FILES) as $value)
{

if(is_uploaded_file($_FILES[$value]['tmp_name']))
{

$file = fopen($_FILES[$value]['tmp_name'],'rb');
$data = fread($file,filesize($_FILES[$value]['tmp_name']));
fclose($file);
$data = chunk_split(base64_encode($data));

$attachment_array[] = "--boundary_sdfsfsdfs345345sfsgs".PHP_EOL."Content-Type: ".$_FILES[$value]['type'].";".PHP_EOL." name=\"".$_FILES[$value]['name']."\"".PHP_EOL."Content-Disposition: attachment;".PHP_EOL." filename=\"".$_FILES[$value]['name']."\"".PHP_EOL."Content-Transfer-Encoding: base64".PHP_EOL.PHP_EOL.$data.PHP_EOL.PHP_EOL;

}

}

}

}

if(count($attachment_array) || $csv_attachment)
{

$headers .= PHP_EOL;
$headers .= "Content-Type: multipart/mixed;".PHP_EOL;
$headers .= " boundary=\"boundary_sdfsfsdfs345345sfsgs\"";

$body = "";

$body .= "--boundary_sdfsfsdfs345345sfsgs".PHP_EOL;
$body .= "Content-Type: text/".$content_type."; charset=\"{$character_set}\"".PHP_EOL.PHP_EOL;
$body .= $message.PHP_EOL.PHP_EOL;

if(count($attachment_array)){foreach($attachment_array as $value){$body .= $value;}}

if($csv_attachment)
{

// Comma separate the keys (doesn't need to be recursive).

$data = "";

foreach(array_keys($_REQUEST) as $value){$data .= "$value,";}

// Remove trailing comma.

$data = rtrim($data,",");

$data .= PHP_EOL;

$data .= stripslashes(build_file_data($_REQUEST));

$body .= "--boundary_sdfsfsdfs345345sfsgs".PHP_EOL."Content-Type: text/plain; charset=\"{$character_set}\"".PHP_EOL." name=\"$csv_filename\"".PHP_EOL."Content-Disposition: attachment;".PHP_EOL." filename=\"$csv_filename\"".PHP_EOL.PHP_EOL.$data.PHP_EOL.PHP_EOL;

}

$body .= "--boundary_sdfsfsdfs345345sfsgs--";

$message = $body;

}

}

if(!count($attachment_array) && !$csv_attachment)
{

$headers .= PHP_EOL;
$headers .= "Content-Type: text/{$content_type}; charset=\"{$character_set}\"";

}

if($bcc)
{

$headers .= PHP_EOL;
$headers .= "Bcc: " . $bcc;

}

$subject = stripslashes($subject);

if($encode_name_subject){$subject = "=?{$character_set}?B?".base64_encode($subject)."?=";}

// Send email.

mail($my_email,$subject,$message,$headers);

// Write to CSV file.

if($csv_file_on_server)
{

// If file does not exist, create it and write header row.

if(!file_exists($path_to_csv_file.$csv_filename))
{

$data = "";

foreach(array_keys($_REQUEST) as $value){$data .= "$value,";}

// Remove trailing comma.

$data = rtrim($data,",");

$data .= "\r\n";

$handle = fopen($path_to_csv_file.$csv_filename, "a");

fwrite($handle,$data);

fclose($handle);

}

// Write data row.

$data = "";

$data .= stripslashes(build_file_data($_REQUEST));

$data .= "\r\n";

$handle = fopen($path_to_csv_file.$csv_filename, "a");

fwrite($handle,$data);

fclose($handle);

}

// Send autoresponse.

if($autoresponder && isset($_REQUEST['email']) && !empty($_REQUEST['email']))
{

// Remove visitor's IP address if present.

if(isset($_REQUEST["Sender's IP address"])){unset($_REQUEST["Sender's IP address"]);}
	
if($autoresponder_from){$my_email = $autoresponder_from;}
	
$headers = "From: " . $my_email;
$headers .= PHP_EOL;
$headers .= "MIME-Version: 1.0".PHP_EOL;
$headers .= "Content-Type: text/{$content_type}; charset=\"{$character_set}\"";

if($autoresponse_email_template)
{

$message = file_get_contents($autoresponse_email_template_filename);

preg_match_all("/ff<[^>]*>/",$message,$matches);

$unique_matches = array_unique($matches[0]);

foreach($unique_matches as $value)
{

$key = rtrim(str_replace("ff<","",$value),">");

if(is_array($_REQUEST[$key]))
{

$array_content = "";

foreach($_REQUEST[$key] as $value2){$array_content .= $value2 . ", ";}

$array_content = rtrim($array_content,", ");

$message = str_replace($value,$array_content,$message);

}else{$message = str_replace($value,$_REQUEST[$key],$message);}

}

}
else
{

if($html_format)
{

$html_open = "<html><head><title>$autoresponder_subject</title></head><body><p><font face=\"".$autoresponder_font."\" size=\"".$autoresponder_font_size."\" color=\"".$autoresponder_font_color."\">$autoresponder_header_message</font></p><table cellpadding=\"".$table_cellpadding."\" cellspacing=\"".$table_cellspacing."\" bgcolor=\"".$table_background_color."\">"; $html_close = "</table><p><font face=\"".$autoresponder_font."\" size=\"".$autoresponder_font_size."\" color=\"".$autoresponder_font_color."\">$autoresponder_footer_message</font></p></body></html>";

$message = $html_open;

$message .= build_message($_REQUEST);

$message .= $html_close;

}else{$message = $autoresponder_header_message . PHP_EOL.PHP_EOL . build_message($_REQUEST) . $autoresponder_footer_message;}

}

$message = stripslashes($message);

if($autoresponder_attachment)
{

$data = "";
	
$file = fopen($autoresponder_attachment_path.$autoresponder_attachment_file,'rb');
$data = fread($file,filesize($autoresponder_attachment_path.$autoresponder_attachment_file));
fclose($file);
$data = chunk_split(base64_encode($data));

$headers = "From: " . $my_email;
$headers .= PHP_EOL;
$headers .= "MIME-Version: 1.0".PHP_EOL;
$headers .= "Content-Type: multipart/mixed;".PHP_EOL;
$headers .= " boundary=\"boundary_sdfsfsdfs345345sfsgs\"";

$body = "";

$body .= "--boundary_sdfsfsdfs345345sfsgs".PHP_EOL;
$body .= "Content-Type: text/".$content_type."; charset=\"{$character_set}\"".PHP_EOL.PHP_EOL;
$body .= $message.PHP_EOL.PHP_EOL;
$body .= "--boundary_sdfsfsdfs345345sfsgs".PHP_EOL."Content-Type: ".$autoresponder_attachment_content_type.";".PHP_EOL." name=\"".$autoresponder_attachment_file."\"".PHP_EOL."Content-Disposition: attachment;".PHP_EOL." filename=\"".$autoresponder_attachment_file."\"".PHP_EOL."Content-Transfer-Encoding: base64".PHP_EOL.PHP_EOL.$data.PHP_EOL.PHP_EOL;

$body .= "--boundary_sdfsfsdfs345345sfsgs--";

$message = $body;

}

$autoresponder_subject = stripslashes($autoresponder_subject);

mail($_REQUEST['email'],$autoresponder_subject,$message,$headers);

}

// Redirect.

if($auto_redirect){header("location: $redirect_url"); exit;}

// Print "thank you" message from template.

if($thank_you_message_template)
{

$matches = "";

$html_output = file_get_contents($thank_you_message_template_filename);

preg_match_all("/ff<[^>]*>/",$html_output,$matches);

$unique_matches = array_unique($matches[0]);

foreach($unique_matches as $value)
{

$key = rtrim(str_replace("ff<","",$value),">");

if(is_array($_REQUEST[$key]))
{

$array_content = "";

foreach($_REQUEST[$key] as $value2){$array_content .= $value2 . ", ";}

$array_content = rtrim($array_content,", ");

$html_output = str_replace($value,$array_content,$html_output);

}else{$html_output = str_replace($value,$_REQUEST[$key],$html_output);}

}

print $html_output;

exit;

}
/*include("../../../includes/server_config.php"); 
include("../../../database/connection.php");*/
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7, IE=9" />
 
<title>Steen Brogaard</title>

<!--Main Element CSS-->
<link href="<?php echo $siteurl;?>css/style.css" rel="stylesheet" type="text/css">
<link href="<?php echo $siteurl;?>css/hexagon.css" rel="stylesheet" type="text/css">
<link href="<?php echo $siteurl;?>css/form.css" rel="stylesheet" type="text/css">

<!--Responsive CSS-->
<link href="<?php echo $siteurl;?>css/responsive.css" rel="stylesheet" type="text/css">

<!--Multitransition Gallery Sliders CSS-->
<link href="<?php echo $siteurl;?>css/audioPlayer_tr.css" rel="stylesheet" type="text/css">
<link href="<?php echo $siteurl;?>css/flashblock.css" rel="stylesheet" type="text/css">
<link href="<?php echo $siteurl;?>css/playlistBottomInside.css" rel="stylesheet" type="text/css">
<link href="<?php echo $siteurl;?>css/videoPlayer.css" rel="stylesheet" type="text/css">

<!--Google Fonts-->
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900|Oswald:400,300,700' rel='stylesheet' type='text/css'>



<link rel="shortcut icon" type="image/ico" href="<?php echo $siteurl;?>assets/img/favicon.ico" />

	<!--CSS Styles-->	
	<link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>assets/css/vendors/font-awesome.min.css"> 
    <link rel="stylesheet" href="<?php echo $siteurl;?>css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>assets/css/vendors/bootstrap.css" >
	<link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>assets/css/vendors/Pe-icon-7-stroke.css">
    <link href="<?php echo $siteurl;?>css/stylemenu.css" rel="stylesheet">
    
	<link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>css/default.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>css/component.css" />
        
        <link rel="stylesheet" href="/wss/fonts?family=Myriad+Set+Pro&amp;weights=200,400,600&amp;v=1" />
	<!--/CSS Styles-->
	
	<!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
    <!-- /Mobile Specific Metas --> 


	<!-- Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=PT+Sans:100,200,300,400,700,400italic,700italic' rel='stylesheet' type='text/css'>

 
 <script src="<?php echo $siteurl;?>js/vendor/modernizr-2.6.2.min.js"></script>
 <script type="text/javascript" src="<?php echo $siteurl;?>js/jquery.min.js"></script>
 
 <!-- CLEAR CONTENT AFTER SEARCH -->
    <script>
	function clearcontent()
	{
		document.getElementById("search").value="";
	}
	document.getElementById("searchform").onload = function() {myFunction()};
	function myFunction()
	{
		document.getElementById("search").value="";
	}
	</script>
	<!-- END OF CLEAR CONTENT AFTER SEARCH -->
    <!-- SEARCH FUNCTIONALITY -->
    <script language="javascript">
	function convert(){
	w=document.formurl.search.value;
	encodeURIComponent(w);
	document.formurl.search.value=w;}
	</script>
<!-- END SEARCH FUNCTIONALITY -->
 



<!--[if lte IE 8]>
<meta HTTP-EQUIV="REFRESH" content="0; url=lte-ie8.html">
<![endif]-->
<!-- add scripts & css -->
<!-- Latest compiled and minified CSS -->
            <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">-->
            
   <style>
.aboutus-content p{font-size:15px; font-family: 'PT Sans', sans-serif;}
body
{
	background-color:#FFFFFF !important;
}
   </style>        
</head>

<body>

<!--Header Start-->
<header>
	<div class="navbar navbar-custom navbar-fixed-top" style="opacity:0.9 !important;">
           <?php include("../../../includes/menu1.php");?>
            </div>
    </header>
    <!--Header End-->
    
        	<div class="container1 background" style="background:#fff;">
    	         
        <div class="wrapper boxstyle" style="background: rgba(0,0,0,0.5);">
                   
           <!--Blog Lists and Sidebar-->
            <section class="box-container" style="background:none !important;">
            
               <div class="aboutus-content">
                <h3>Dear <?php if(isset($_REQUEST['name'])){print stripslashes(htmlspecialchars($_REQUEST['name']));} ?> </h3>
               
				<p>
				Your message has been sent.
                <br/><br/>
                
                You will shortly receive a receipt at the email address you provided. 
                If you receive no receipt, you should first check your spam folder - or else contact us directly at + 45 4057 8090th
                <br/><br/>
                Thanks for your interest.
                <br/><br/>
                Your message har be late and in short time you vil recieve a receipt.
                <br/> 
                Should this fail do not hesitate two call us at + 45 4057 8090th.
                
                <br/><br/><br/></p>                
                    
                </div>
              
            </section>
            <!--Blog Lists and Sidebar End-->

        </div>
        
        <!--All Content End-->
           
        <!--Footer Start--
        <footer>
            
            <!--Footer Bottom--
            <section class="footer-bottom">
            	<div class="wrapper">
                	<div class="copyright">
                        Copyright © All Rights Reserved. <a href="#">yourdomain.com</a>
                    </div>
                    <nav>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><a href="about-us.html">About Us</a></li>
                            <li><a href="portfolio-fullwidth.html">Portfolio</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                        </ul>
                    </nav>
                </div>
            </section>
            <!--Footer Bottom End--
            
        </footer>
        <!--Footer End-->
    
	</div>
    

<script type="text/javascript" src="<?php echo $siteurl;?>js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<?php echo $siteurl;?>js/jquery-easing-1.3.js"></script>

<!--Flexy Menu Script-->
<script type="text/javascript" src="<?php echo $siteurl;?>js/flexy-menu.js"></script>

<!-- THE FANYCYBOX ASSETS -->
<!--<script type="text/javascript" src="megafolio/fancybox/jquery.fancybox.pack62ba.js?v=2.1.3"></script>-->

<!-- Optionally add helpers - button, thumbnail and/or media ONLY FOR ADVANCED USAGE-->
<!--<script type="text/javascript" src="megafolio/fancybox/helpers/jquery.fancybox-media3447.js?v=1.0.5"></script>-->

<script type="text/javascript">
   jQuery(document).ready(function() {
	  "use strict"; 
	  
	  // THE FANCYBOX PLUGIN INITALISATION
      jQuery(".fancybox").fancybox();
 
      // FLEXY MENU SETTING
	  $(".flexy-menu").flexymenu({
            align: "right",
            indicator: true
         });
   });
</script>
        
    <!-- /javascript Plugins-->    
    <script type="text/javascript" src="<?php echo $siteurl;?>assets/js/vendors/bootstrap.min.js"></script>
    <script src="<?php echo $siteurl;?>js/classie.js"></script>
	<script src="<?php echo $siteurl;?>js/uisearch.js"></script>
	<script>
		new UISearch( document.getElementById( 'sb-search' ) );
	</script>

	<!-- /javascript Plugins-->
   	
</body>
</html>
