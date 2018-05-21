<?php
/*|:-> Load system configuration <-:|*/
require_once(dirname(__FILE__) . '/' . "auth.php"); 

/*|:-> COOKIES and SESSION check <-:|*/
// This should be placed on top of member area (restricted) page
checkSession();


/*|:-> Load HEADER <-:|*/
@include DIR_USER."site-header.php";

/*|:-> Load MENU <-:|*/
@include DIR_USER."site-menu.php";

$userid = $_SESSION['id'];

if ( $_SESSION['maingallery']=='' ) {
	// $redirecttext = "<strong>Not registered</strong>";
	$noAuthRedirected = CMS_URL;
	header("HTTP/1.1 403 Forbidden");
	header("Location: $noAuthRedirected");
	exit;
} else {
	$redirecttext = '<a href="'.$_SESSION['maingallery'].'">'.$_SESSION['maingallery'].'</a>';
}

if ( $_SESSION['galleries']!='' ) {
	$galleryl = explode("|",$_SESSION['galleries']);
	$howmany  = sizeof($galleryl);
} else {
	$howmany  = 0;
}

// #################
// IF form submitted
if (array_key_exists('editaccount', $_POST)) // process the script only if the form has been submitted -> OME
{ 
	foreach ($_POST as $key => $value) { $$key = addslashes(trim($value)); }

$error = false;

if (strlen($firstname) < 2) {
$error = true;
$errormessage[] = 'Please enter your first name';
}

if (strlen($lastname) < 2) {
$error = true;
$errormessage[] = 'Please enter your last name';
}

if (strlen($email_address) < 5) {
$error = true;
$errormessage[] = 'Please enter your e-mail address.';
}

if (!preg_match("|^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$|i",$email_address)) {
$error = true;
$errormessage[] = 'Your email is not valid.';
}

if (strlen($password) > 0) {

if ((strlen($password) < 6) && (strlen($password) > 10)) {
$error = true;
$errormessage[] = 'Your password should be between 6-10 characters';
}

if ($password != $repassword) {
$error = true;
$errormessage[] = 'Password and verify password doesn\'t match.';
}

}

if ( ($phone != '') && (!is_numeric($phone)) ) {
$error = true;
$errormessage[] = 'Phone number should be numeric.';
} 

if ($error == false) {

      $sql_data_array = array('firstname' => $firstname,
                              'lastname' => $lastname,
                              'email' => $email_address,
                              'phone' => $phone,
                              'royalaccess' => $royalaccess,
                              'getnewsletter' => $sub_newsletter);

foreach ($sql_data_array as $key => $value) {
    $sets[]='`'.$key.'`=\''.$value.'\'';
}
$sqlquery='SET '.implode(', ',$sets);

$sqlq = "UPDATE ".TBL_AUTHORIZE_NEW." $sqlquery WHERE id='".(int)$userid."'";
$result = mysql_query($sqlq) or die ("Error in query: $sqlq. ".mysql_error());

$_SESSION['royalaccess'] = $royalaccess;
$_SESSION['firstname'] 	 = $firstname;

if (strlen($password) > 0) {
$sql2 = "UPDATE ".TBL_AUTHORIZE_NEW." SET password=password('$password') WHERE id='".(int)$userid."'";
$result2 = mysql_query($sql2) or die ("Error in query: $sql2. ".mysql_error());
}

/* GLOBAL mail parameters */
$adminemail = 'steen@brogaard.com';
$Nameedit = "brogaard.com";
$frommailedit = "noreply@brogaard.com";
$subjectedit = "User details updated";
$bodyedit = "Hello admin,\r\nAccount details updated:\r\n\r\n";
$bodyedit .= "First Name: $firstname\r\n";
$bodyedit .= "Last Name: $lastname\r\n";
$bodyedit .= "Email: $email_address\r\n";
$bodyedit .= "Phone: $phone\r\n";
$bodyedit .= "Royal Access: $royalaccess\r\n";
$bodyedit .= "Newsletter: $sub_newsletter\r\n";

if ( $_SESSION['usertype']=='company' ) { // Added parameters for COMPANY account
$bodyedit .= "Company name: $companyname\r\n";
$bodyedit .= "Company Type: $companytypes\r\n";
$bodyedit .= "Comments: $companycomments\r\n";
}

if ( $_SESSION['usertype']=='model' ) { // Added parameters for MODEL account
$bodyedit .= "Gender: $modelgender\r\n";
$bodyedit .= "Birth: $modelbirth\r\n";
$bodyedit .= "Skin: $modelskincolor\r\n";
$bodyedit .= "Eye: $modeleyecolor\r\n";
$bodyedit .= "Hair: $modelhaircolor\r\n";
$bodyedit .= "Height: $modelheight\r\n";
$bodyedit .= "Type: $modeltype\r\n";
$bodyedit .= "Address: $modeladdress\r\n";
$bodyedit .= "City: $modelcity\r\n";
$bodyedit .= "Availability: $modelavailability\r\n";
$bodyedit .= "Comment: $modelcomments\r\n";
}

$headeredit = "From: ". $Nameedit . " <" . $frommailedit . ">\r\n";
mail($adminemail, $subjectedit, $bodyedit, $headeredit);
/* /GLOBAL mail parameters */

#############################
/* Update COMPANY account */
if ( $_SESSION['usertype']=='company' ) { 
$companytypes = implode(',', $_POST['companytype']);
$sqld_data_array['companyname'] = $companyname;
$sqld_data_array['companytype'] = $companytypes;
$sqld_data_array['companycomments'] = $companycomments;

foreach ($sqld_data_array as $key => $value) { $setsd[]='`'.$key.'`=\''.$value.'\''; }
$sqlqueryd='SET '.implode(', ',$setsd);

$sqlqd = "UPDATE ".TBL_AUTHORIZE_DT." $sqlqueryd WHERE authorize_id='".(int)$userid."'";
$resultd = mysql_query($sqlqd) or die ("Error in query: $sqlqd. ".mysql_error());

$_SESSION['royalaccess'] = $royalaccess;
$_SESSION['firstname'] 	 = $firstname;
} // END Update COMPANY account

#############################
/* Update MODEL account */
if ( $_SESSION['usertype']=='model' ) { 
$sqld_data_array['modelgender'] = $modelgender;
$sqld_data_array['modelbirth'] = $modelbirth;
$sqld_data_array['modelskincolor'] = $modelskincolor;
$sqld_data_array['modeleyecolor'] = $modeleyecolor;
$sqld_data_array['modelhaircolor'] = $modelhaircolor;
$sqld_data_array['modelheight'] = $modelheight;
$sqld_data_array['modeltype'] = $modeltype;
$sqld_data_array['modeladdress'] = $modeladdress;
$sqld_data_array['modelcity'] = $modelcity;
$sqld_data_array['modelavailability'] = $modelavailability;
$sqld_data_array['modelcomments'] = $modelcomments;

foreach ($sqld_data_array as $key => $value) {  $setsd[]='`'.$key.'`=\''.$value.'\''; }
$sqlqueryd='SET '.implode(', ',$setsd);

$sqlqd = "UPDATE ".TBL_AUTHORIZE_DT." $sqlqueryd WHERE authorize_id='".(int)$userid."'";
$resultd = mysql_query($sqlqd) or die ("Error in query: $sqlqd. ".mysql_error());

$_SESSION['royalaccess'] = $royalaccess;
$_SESSION['firstname'] 	 = $firstname;

	if(!empty($_FILES['images']['name'][0]))
	{
		while(list($key,$value) = each($_FILES['images']['name']))
		{
			if(!empty($value)) {
			$file_name = $value;
			$t = time();
			$extension = strtolower(substr(strrchr($file_name, "."), 1));
			$new_file_name = strtolower($file_name);
			$new_file_name = str_replace(' ', '-', $new_file_name);
			$new_file_name = substr($new_file_name, 0, -strlen($extension));
   			$new_file_name .= $extension;
			$NewImageName = $t."_model_".$new_file_name;
			$MyImages[] = $NewImageName;
			copy($_FILES['images']['tmp_name'][$key], "modelimages/".$NewImageName);
			}
		}

		if(!empty($MyImages))
		{
			$ImageStr = implode("|", $MyImages);

			if(!empty($OldImages))
			{
				$ImageStr = $ImageStr."|".$OldImages;
			}
			$sql2 = "UPDATE ".TBL_AUTHORIZE_DT." SET modelimages='$ImageStr' WHERE authorize_id='".(int)$userid."'";
			$result2 = mysql_query($sql2) or die ("Error in query: $sql2. ".mysql_error());
		}
	}
} // END Update MODEL account

$errormsg = "<div style=\"margin-top:0px; margin-bottom:30px;\"><ul><li><font color='green'>Account details updated successfully.</font></li></ul></div>"; 

} else {

$errormsg = "<div style=\"margin-top:0px; margin-bottom:30px;\"><ul><li>".implode("<li>",$errormessage)."</ul></div>"; 

}
					  
}

$sqluser = "SELECT * FROM ".TBL_AUTHORIZE_NEW." WHERE id='".(int)$userid."'";
$resultuser = @mysql_query($sqluser) or die(mysql_error());
$row = mysql_fetch_object($resultuser);

$firstname		= $row -> firstname;
$lastname		= $row -> lastname;
$username		= $row -> username;
$email_address	= $row -> email;
$phone			= $row -> phone;
$getnewsletter	= $row -> getnewsletter;
$royalaccess	= $row -> royalaccess; 
if ( $getnewsletter==1 ) { $newsselected = 'checked="checked"'; } else { $newsselected = ''; }
if ( $royalaccess==1 ) { $royalselected='checked="checked"'; } else { $royalselected = ( preg_match("/clientarea\/royal/i", $_SESSION['galleries'])?'checked="checked"':'' ); } 

#############################
/* Additional parameters for COMPANY account */
if ( $_SESSION['usertype']=='company' ) { 
	$sqluserd = "SELECT * FROM ".TBL_AUTHORIZE_DT." WHERE authorize_id='".(int)$userid."'";
	$resultuserd = @mysql_query($sqluserd) or die(mysql_error());
	$rowd = mysql_fetch_object($resultuserd);

	$companyname		= $rowd -> companyname;
	$companytype		= $rowd -> companytype;
	$companycomments	= $rowd -> companycomments;
} // END

#############################
/* Additional parameters for MODEL account */
if ( $_SESSION['usertype']=='model' ) { 
	$sqluserd = "SELECT * FROM ".TBL_AUTHORIZE_DT." WHERE authorize_id='".(int)$userid."'";
	$resultuserd = @mysql_query($sqluserd) or die(mysql_error());
	$rowd = mysql_fetch_object($resultuserd);

	$modelgender = $rowd -> modelgender;
	$modelbirth = $rowd -> modelbirth;
	$modelskincolor = $rowd -> modelskincolor;
	$modeleyecolor = $rowd -> modeleyecolor;
	$modelhaircolor = $rowd -> modelhaircolor;
	$modelheight = $rowd -> modelheight;
	$modeltype = $rowd -> modeltype;
	$modeladdress = $rowd -> modeladdress;
	$modelcity = $rowd -> modelcity;
	$modelavailability = $rowd -> modelavailability;
	$modelcomments = $rowd -> modelcomments;
	$modelimages = $rowd -> modelimages;

	$images  = "<table width=270 cellspacing=0 cellpadding=0 align=left>\n";
	$images .= "<tr>\n";

	if(!empty($modelimages)) {
		$MyImages = explode("|", $modelimages);
		while(list(,$vi) = each($MyImages))	{
			$images .= "<td align=center style=\"padding-bottom:10px;padding-top:10px;\"><img src=\"".URL_USER."modelimages/$vi\" width=100 height=100></td>";
			$mi++;
		}
	}
	$images .= "</tr>\n";

	for($im2 = '1'; $im2 <= (4 - $mi); $im2++) {
		$images .= "<tr>\n\t<td colspan=3><input type=file name=\"images[]\"></td>\n</tr>\n";
	}

	$images .= "</table>";
} // END

?><script type="text/javascript">
  /* Set onLoad focus to id="firstname" */
  function focus_textbox(){ setTimeout( function(){ try{ d = document.getElementById('firstname'); d.focus(); d.select(); } catch(e){} }, 200); } 
  focus_textbox();
</script>

<style type="text/css"><!-- .style2 {color:#262626; } .style3 {font-size:12px} --></style>

<div id="page-container" class="page-container contact-container" style="clear:both;">
<div id="page">
<!-- START Float Right Section -->
<div style="position:relative;"><!-- position:absolute; top:200px; right:-400px; -->
<div id="stylishfont" style="position:absolute; top:40px; left:580px;">
<img src="<?php echo URL_USER; ?>pages-resources/images/pic_konto.png" />

<p style="padding-left:50px;"><span style="font-size:130%;"><?php echo lang('registration_date'); ?>:</span> <?php echo $_SESSION['date_created']; ?></p>
<p style="padding-left:50px;"><span style="font-size:130%;"><?php echo lang('last_login'); ?>:</span> <?php echo $_SESSION['last_login']; ?></p>
<?php include( dirname(__FILE__) . '/visitors_online/index.php' ); ?>
<?php if ( !empty($_SESSION['galleries']) ) { 
  // LOOKUP Latest Uploaded Gallery for user WITH Gallery access
    $lookOnRoyal = ( !empty($_SESSION['royalaccess']) ? '|clientarea/royal' : '' );
	$sql_dt = "SELECT image_id,image_path FROM ".TBL_IMAGE_DATA." WHERE image_path RLIKE '".clean_mysql($_SESSION['galleries'].$lookOnRoyal)."' AND image_path NOT LIKE '%/img_%' ORDER BY image_id DESC LIMIT 1";
	$que_dt = mysql_query($sql_dt) or die("Invalid query: " . mysql_error()); 
	list($image_id_dt, $image_path_dt) = mysql_fetch_row($que_dt);

  echo '<p style="padding-left:50px;"><span style="font-size:130%;">Sidst tilføjede galleri:</span><br />';

	$path_dt = pathinfo($image_path_dt, PATHINFO_DIRNAME); 
	$toBeRemoved = substr(strrchr($path_dt, "/"), 1); // photos OR galleries 
	$path2_dt = CMS_PATH.removeFromEnd($path_dt, $toBeRemoved);
	$link_dt = CMS_URL.removeFromEnd($path_dt, $toBeRemoved);

	$fileXML = $path2_dt.'autoindex.xml';
	$v = loadFile($fileXML);
	preg_match_all('/<title>(.*?)<\/title>/si', $v, $r);
	$gallName = $r[1][0]; // Gallery name retrieved from 'autoindex.xml'

  echo '<a href="'.$link_dt.'">'.$gallName.'</a>'; 
  echo '</p>'; 
} else { 
  // LOOKUP Latest Uploaded Gallery for user WITHOUT Gallery access
    $lookOnRoyal = ( !empty($_SESSION['royalaccess']) ? '|clientarea/royal' : '' );
	$oneGalleryAccess = str_replace(CMS_URL, '', $_SESSION['maingallery']);
	$sql_dt = "SELECT image_id,image_path FROM ".TBL_IMAGE_DATA." WHERE image_path RLIKE '".clean_mysql($oneGalleryAccess.$lookOnRoyal)."' AND image_path NOT LIKE '%/img_%' ORDER BY image_id DESC LIMIT 1";
	$que_dt = mysql_query($sql_dt) or die("Invalid query: " . mysql_error()); 
	list($image_id_dt, $image_path_dt) = mysql_fetch_row($que_dt);

  echo '<p style="padding-left:50px;"><span style="font-size:130%;">Sidst tilføjede galleri:</span><br />';

	$path_dt = pathinfo($image_path_dt, PATHINFO_DIRNAME); 
	$toBeRemoved = substr(strrchr($path_dt, "/"), 1); // photos OR galleries 
	$path2_dt = CMS_PATH.removeFromEnd($path_dt, $toBeRemoved);
	$link_dt = CMS_URL.removeFromEnd($path_dt, $toBeRemoved);

	$fileXML = $path2_dt.'autoindex.xml';
	$v = loadFile($fileXML);
	preg_match_all('/<title>(.*?)<\/title>/si', $v, $r);
	$gallName = $r[1][0]; // Gallery name retrieved from 'autoindex.xml'

  echo '<a href="'.$link_dt.'">'.$gallName.'</a>'; 
  echo '</p>'; 
} 

if ( basename($_SESSION['maingallery']) == PAID_HD_DIR ) { // User (might) have access to Paid Gallery directory
	echo '<p style="padding-left:50px;"><span style="font-size:130%;">';
	if ( $_SESSION['hdaccess'] == 1 ) { 
		echo '<em>Your <a href="'.$_SESSION['maingallery'].'/HD/">active subsciption</a><br />will be expired on:</em><br /><strong>'.$_SESSION['hdexpired'].'</strong>';
	} else { 
		echo '<em>Currently you dont have any<br /><a href="'.$_SESSION['maingallery'].'/HD/">active subsciption</a></em>';
	}
	echo '</p>';
}

?>
</div></div>
<div style="clear:both;"></div>
<!-- END Float Right Section -->

<div id="page_content" class="about">

<!-- START Additional Details Shown -->
<div id="stylishfont">
<?php
$sqluserAdd = "SELECT welcome_message FROM configuration WHERE id = 1";
$resultuserAdd = @mysql_query($sqluserAdd) or die(mysql_error());
$rowAdd = mysql_fetch_object($resultuserAdd);
$welcome_message_add = $rowAdd -> welcome_message;

echo '<span style="color:#111111; font-style:italic;">'.$welcome_message_add.'</span>';
?>
<h2 style="padding-top:20px;">Dine gallerier:</h2>

<ul style="list-style-type:disc; padding:10px 0px 0px 16px;">
<li style="height:30px;"><u><?php echo $redirecttext.'</u>&nbsp;&raquo;&nbsp;<font color="#000000">'.lang('main_gallery').'</font>'; ?></li>
<?php 

// CHECKING $_SESSION['galleries']
if ( !empty($_SESSION['galleries']) ) { 

for($i = 0; $i < $howmany; ++$i){
	$galleryl[$i] = trim($galleryl[$i]); 
	$link_ac = CMS_URL.$galleryl[$i];
	$path_ac = CMS_PATH.$galleryl[$i];
		$path_ac_1 = CMS_PATH.$galleryl[$i].'/galleries/';
		$path_ac_2 = CMS_PATH.$galleryl[$i].'/HD/';

		// COUNTING Total Thumbnails in all sub-directories under /galleries/
		$list_path_ac_1[$i] = read_directory_contents( $path_ac_1 );

		foreach ($list_path_ac_1[$i] as $list1) { 
			if ( !preg_match("/[^0-9\-]/", $list1) ) 
				$listDir1[$i][] = $path_ac_1.$list1.'/thumbnails/'; // Looking for /thumbnails/ inside each /galleries/YYYY-MM-DD
		} 

		for ($j=0; $j<count($listDir1[$i]); $j++) { 
			$dirValidName_1[$i] = $listDir1[$i][$j]; 
			$list_path_ac_1[$i] = read_directory_contents( $dirValidName_1[$i] );
			$total_thumbs_in_each_thumbsDir[$i][] = count($list_path_ac_1[$i]);
		}

		// COUNTING Total Thumbnails in all sub-directories under /HD/
		$list_path_ac_2[$i] = read_directory_contents( $path_ac_2 );

		foreach ($list_path_ac_2[$i] as $list2) { 
			if ( !preg_match("/[^0-9\-]/", $list2) ) 
				$listDir2[$i][] = $path_ac_2.$list2.'/thumbnails/'; // Looking for /thumbnails/ inside each /HD/YYYY-MM-DD
		} 

		for ($k=0; $k<count($listDir2[$i]); $k++) { 
			$dirValidName_2[$i] = $listDir2[$i][$k]; 
			$list_path_ac_2[$i] = read_directory_contents( $dirValidName_2[$i] );
			$total_thumbs_in_each_HDDir[$i][] = count($list_path_ac_2[$i]);
		}

	$totalThumbsGalleries = array_sum($total_thumbs_in_each_thumbsDir[$i]);
	$totalThumbsHD	      = array_sum($total_thumbs_in_each_HDDir[$i]);
	//$totalThumbsALL		  = ($totalThumbsGalleries + $totalThumbsHD);

	echo '<li style="height:30px;"><u><a href="'.$link_ac.'">'.$link_ac.'</a></u>&nbsp;&raquo;&nbsp;<img src="'.URL_USER.'pages-resources/images/icon_gallery.png" height="16" /> ('.( !empty($totalThumbsGalleries)?$totalThumbsGalleries:'0' ).') <img src="'.URL_USER.'pages-resources/images/icon_gallery_HD.png" height="16" /> ('.( !empty($totalThumbsHD)?$totalThumbsHD:'0' ).')</li>';

	} // END for

} // end IF

// CHECKING $_SESSION['royalaccess']
if ( !empty($_SESSION['royalaccess']) ) { 

	$link_ac = CMS_URL.'clientarea/royal';
	$path_ac = CMS_PATH.'clientarea/royal';
		$path_ac_1 = $path_ac.'/galleries/';
		$path_ac_2 = $path_ac.'/HD/';

		// COUNTING Total Thumbnails in all sub-directories under royal/galleries/
		$list_path_ac_1 = read_directory_contents( $path_ac_1 );

		foreach ($list_path_ac_1 as $list1) { 
			if ( !preg_match("/[^0-9\-]/", $list1) ) 
				$listDir1[] = $path_ac_1.$list1.'/thumbnails/'; // Looking for /thumbnails/ inside each royal/galleries/YYYY-MM-DD
		} 

		for ($j=0; $j<count($listDir1); $j++) { 
			$dirValidName_1 = $listDir1[$j]; 
			$list_path_ac_1 = read_directory_contents( $dirValidName_1 );
			$total_thumbs_in_each_royal_thumbsDir[] = count($list_path_ac_1);
		}

		// COUNTING Total Thumbnails in all sub-directories under royal/HD/
		$list_path_ac_2 = read_directory_contents( $path_ac_2 );

		foreach ($list_path_ac_2 as $list2) { 
			if ( !preg_match("/[^0-9\-]/", $list2) ) 
				$listDir2[] = $path_ac_2.$list2.'/thumbnails/'; // Looking for /thumbnails/ inside each royal/HD/YYYY-MM-DD
		} 

		for ($k=0; $k<count($listDir2); $k++) { 
			$dirValidName_2 = $listDir2[$k]; 
			$list_path_ac_2 = read_directory_contents( $dirValidName_2 );
			$total_thumbs_in_each_royal_HDDir[] = count($list_path_ac_2);
		}

	$totalRoyalThumbsGalleries = array_sum($total_thumbs_in_each_royal_thumbsDir);
	$totalRoyalThumbsHD	       = array_sum($total_thumbs_in_each_royal_HDDir);
	//$totalThumbsALL		   = ($totalRoyalThumbsGalleries + $totalRoyalThumbsHD);

	echo '<li style="height:30px;"><u><a href="'.$link_ac.'">'.$link_ac.'</a></u>&nbsp;&raquo;&nbsp;<img src="'.URL_USER.'pages-resources/images/icon_gallery.png" height="16" /> ('.( !empty($totalRoyalThumbsGalleries)?$totalRoyalThumbsGalleries:'0' ).') <img src="'.URL_USER.'pages-resources/images/icon_gallery_HD.png" height="16" /> ('.( !empty($totalRoyalThumbsHD)?$totalRoyalThumbsHD:'0' ).')</li>';

} // end IF
?>
</ul>
</div>
<!-- END Additional Details Shown -->

<?php if ( $_SESSION['group1']!='Administrators' ) { ?>
<?php if ( !empty($_SESSION['editaccount']) ) { ?>
<p>&nbsp;</p>
<hr align="left" style="width:480px;" />
<p>&nbsp;</p>

	<p id="nonCSS.aboutParagraph3.value">

<div class="contact-form-container">
<div class="contact-form-content">
	<div id="stylishfont">
	<h2>Rediger dine oplysninger</h2>
	</div>
<p>&nbsp;</p>
<form method="post" action="" enctype="multipart/form-data">
<table border="0" cellspacing="4" cellpadding="4" width="900" align="center">
	<tr>
	<td colspan="2" style="padding-left:80px;color:red;" align="left"><?php echo ( isset($errormsg)?$errormsg:'' ); ?></td>
	</tr>
</table>

<div id="stylishfont">
	<label for="first_name" style="float:left; width:124px; margin-top:4px;"><?php echo lang('first_name'); ?>: <span class="required">*</span></label>
	<input type="text" id="firstname" name="firstname" tabindex="1" value="<?php echo $firstname; ?>" style="width:340px;" />
</div><div style="clear:both; height:10px;"></div>

<div id="stylishfont">
	<label for="last_name" style="float:left; width:124px; margin-top:4px;"><?php echo lang('last_name'); ?>: <span class="required">*</span></label>
	<input type="text" id="lastname" name="lastname" tabindex="2" value="<?php echo $lastname; ?>" style="width:340px;" />
</div><div style="clear:both; height:10px;"></div>

<div id="stylishfont">
	<label for="email" style="float:left; width:124px; margin-top:4px;"><?php echo lang('email'); ?>: <span class="required">*</span></label>
	<input type="text" id="email_address" name="email_address" tabindex="3" value="<?php echo $email_address; ?>" style="width:340px;" />
</div><div style="clear:both; height:10px;"></div>

<div id="stylishfont">
	<label for="username" style="float:left; width:124px; margin-top:0px;"><?php echo lang('username'); ?>:</label>
	<span style="color:#111111;"><?php echo $username; ?></span>
</div><div style="clear:both; height:10px;"></div>

<p>&nbsp;</p>

<div id="stylishfont">
	<span style="color:#111111; font-style:italic;"><?php echo lang('leave_blank_to_keep_password'); ?></span>
</div><div style="clear:both; height:10px;"></div>

<div id="stylishfont">
	<label for="new_password" style="float:left; width:124px; margin-top:4px;"><?php echo lang('new_password'); ?>:</label>
	<input type="password" id="password" name="password" tabindex="4" value="" style="width:340px;" />
</div><div style="clear:both; height:10px;"></div>

<div id="stylishfont">
	<label for="password_repeat" style="float:left; width:124px; margin-top:4px;"><?php echo lang('password_repeat'); ?>:</label>
	<input type="password" id="repassword" name="repassword" tabindex="5" value="" style="width:340px;" />
</div><div style="clear:both; height:10px;"></div>

<p>&nbsp;</p>

<div id="stylishfont">
	<label for="telphone" style="float:left; width:124px; margin-top:4px;"><?php echo lang('telphone'); ?>:</label>
	<input type="text" id="phone" name="phone" tabindex="6" value="<?php echo $phone; ?>" style="width:340px;" maxlength="13" />
</div><div style="clear:both; height:10px;"></div>

<p>&nbsp;</p>

<div id="stylishfont">
	<?php echo lang('join_newsletter'); ?>: <input <?php echo $newsselected; ?> type="checkbox" tabindex="7" id="sub_newsletter" name="sub_newsletter"  value="1" style="background:#FFFFFF; color:#141414; border:1px solid #000000; font-family:verdana; font-size:10px; padding:1px" />
</div><div style="clear:both; height:10px;"></div>

<p>&nbsp;</p>

<?php
#############################
/* Additional Fields for COMPANY account */
if ( $_SESSION['usertype']=='company' ) { ?>

<div id="stylishfont">
	<label for="company" style="float:left; width:124px; margin-top:4px;"><?php echo lang('company'); ?>:</label>
	<input type="text" id="companyname" name="companyname" tabindex="8" value="<?php echo $companyname; ?>" style="width:340px;" />
</div><div style="clear:both; height:10px;"></div>

<div id="stylishfont">
	<label for="type" style="float:left; width:124px; margin-top:4px;"><?php echo lang('type'); ?>:</label>
	<input type="checkbox" name="companytype[]" tabindex="9" value="Client" <? if (preg_match("/Client/i", $companytype)) { echo 'checked'; } ?>> Client 
	&nbsp;
	<input type="checkbox" name="companytype[]" tabindex="10" value="Supplier" <? if (preg_match("/Supplier/i", $companytype)) { echo 'checked'; } ?>>Supplier
</div><div style="clear:both; height:10px;"></div>

<div id="stylishfont">
	<label for="comments" style="float:left; width:124px; margin-top:4px;"><?php echo lang('comments'); ?>:</label>
	<textarea id="companycomments" name="companycomments" tabindex="11" style="width:340px ; height:150px; font-size:10px;"><?php echo $companycomments; ?></textarea>
</div><div style="clear:both; height:10px;"></div>

<?php } ?>
<?php
#############################
/* Additional Fields for MODEL account */
if ( $_SESSION['usertype']=='model' ) { ?>

<div id="stylishfont">
	<label for="gender" style="float:left; width:124px; margin-top:4px;"><?php echo lang('gender'); ?>:</label>
	<input type="radio" name="modelgender" value="male" tabindex="8" <?php echo $modelgender=='male'?'checked':''; ?>/>Male 
	&nbsp;
	<input type="radio" name="modelgender" value="female" tabindex="9" <?php echo $modelgender=='female'?'checked':''; ?>/>Female
</div><div style="clear:both; height:10px;"></div>

<div id="stylishfont">
	<label for="d_o_b" style="float:left; width:124px; margin-top:4px;"><?php echo lang('d_o_b'); ?>:</label>
	<input type="text" id="modelbirth" name="modelbirth" tabindex="10" value="<?php echo $modelbirth; ?>" style="width:340px;" />
</div><div style="clear:both; height:10px;"></div>

<div id="stylishfont">
	<label for="skin_color" style="float:left; width:124px; margin-top:4px;"><?php echo lang('skin_color'); ?>:</label>
	<input type="text" id="modelskincolor" name="modelskincolor" tabindex="11" value="<?php echo $modelskincolor; ?>" style="width:340px;" />
</div><div style="clear:both; height:10px;"></div>

<div id="stylishfont">
	<label for="eye_color" style="float:left; width:124px; margin-top:4px;"><?php echo lang('eye_color'); ?>:</label>
	<input type="text" id="modeleyecolor" name="modeleyecolor" tabindex="12" value="<?php echo $modeleyecolor; ?>" style="width:340px;" />
</div><div style="clear:both; height:10px;"></div>

<div id="stylishfont">
	<label for="hair_color" style="float:left; width:124px; margin-top:4px;"><?php echo lang('hair_color'); ?>:</label>
	<input type="text" id="modelhaircolor" name="modelhaircolor" tabindex="13" value="<?php echo $modelhaircolor; ?>" style="width:340px;" />
</div><div style="clear:both; height:10px;"></div>

<div id="stylishfont">
	<label for="height_cm" style="float:left; width:124px; margin-top:4px;"><?php echo lang('height_cm'); ?>:</label>
	<input type="text" id="modelheight" name="modelheight" tabindex="14" value="<?php echo $modelheight; ?>" style="width:340px;" />
</div><div style="clear:both; height:10px;"></div>

<div id="stylishfont">
	<label for="type" style="float:left; width:124px; margin-top:4px;"><?php echo lang('type'); ?>:</label>
	<input type="radio" name="modeltype" value="Only commercial jobs" tabindex="15" <?php echo $modeltype=='Only commercial jobs'?'checked':''; ?>/> Only commercial jobs 
	&nbsp;
	<input type="radio" name="modeltype" value="Commercial and non-cmmercial jobs" tabindex="16" <?php echo $modeltype=='Commercial and non-cmmercial jobs'?'checked':''; ?>/>Commercial and non-commercial jobs 
</div><div style="clear:both; height:10px;"></div>

<div id="stylishfont">
	<label for="address" style="float:left; width:124px; margin-top:4px;"><?php echo lang('address'); ?>:</label>
	<input type="text" id="modeladdress" name="modeladdress" tabindex="17" value="<?php echo $modeladdress; ?>" style="width:340px;" />
</div><div style="clear:both; height:10px;"></div>

<div id="stylishfont">
	<label for="city" style="float:left; width:124px; margin-top:4px;"><?php echo lang('city'); ?>: <span class="required">*</span></label>
	<input type="text" id="modelcity" name="modelcity" tabindex="18" value="<?php echo $modelcity; ?>" style="width:340px;" />
</div><div style="clear:both; height:10px;"></div>

<div id="stylishfont">
	<label for="availability" style="float:left; width:124px; margin-top:4px;"><?php echo lang('availability'); ?>:</label>
	<select name="modelavailability" tabindex="19>
		<option value=""></option>
		<option value="Before noon" <?php echo $modelavailability=='Before noon'?'selected':''; ?>>Before noon</option>
		<option value="After noon" <?php echo $modelavailability=='After noon'?'selected':''; ?>>After noon</option>
		<option value="Evening" <?php echo $modelavailability=='Evening'?'selected':''; ?>>Evening</option>
		<option value="Doesn't matter" <?php echo $modelavailability=='Doesn\'t matter'?'selected':''; ?>>Doesn't matter</option>
	</select>
</div><div style="clear:both; height:10px;"></div>

<div id="stylishfont">
	<label for="comments" style="float:left; width:124px; margin-top:4px;"><?php echo lang('comments'); ?>:</label>
	<textarea id="modelcomments" name="modelcomments" tabindex="20" style="width:340px ; height:150px; font-size:10px;"><?php echo $modelcomments; ?></textarea>
</div><div style="clear:both; height:10px;"></div>

<div id="stylishfont">
	<label for="photos" style="float:left; width:124px; margin-top:4px;"><?php echo lang('photos'); ?>:</label>
	<?php echo $images; ?>
</div><div style="clear:both; height:10px;"></div>

<?php } ?>

<div id="stylishfont">
	<?php echo lang('royalaccess'); ?>: <input <?php echo $royalselected; ?> type="checkbox" id="royalaccess" name="royalaccess"  value="1" style="background:#FFFFFF; color:#141414; border:1px solid #000000; font-family:verdana; font-size:10px; padding:1px" />
</div>

<p>&nbsp;</p>
	<fieldset>
	<input type="submit" class="button" id="editaccount" name="editaccount" value="<?php echo lang('submit_changes'); ?>" />
	</fieldset>
<p>&nbsp;</p>

<div id="stylishfont">
	<span style="color:#111111; font-style:italic;"><?php echo lang('notes_if_unchecked_newsletter'); ?></span>
</div>

</form>

</div>
</div>
</p>
<?php 
	} else { // END editaccount check
		echo '<div style="height:400px;">&nbsp;</div>'; 
	} 

} else { // START Administrators Access to ALL galleries
#### ALL /clientarea/ #########################################################
	echo '<p>&nbsp;</p>'."\n";
	echo '<hr align="left" style="width:480px;" />'."\n";
	echo '<p>&nbsp;</p>'."\n";

	echo '<div class="contact-form-container">'."\n";
	echo '<div class="contact-form-content">'."\n";
	echo '<div id="stylishfont">'."\n";
	echo '<h2 style="padding-top:20px;">Existing Galleries integrated with HOOKS:</h2>'."\n";

function hasTheWord($word, $txt) {
    $patt = "/(?:^|[^a-zA-Z])" . preg_quote($word, '/') . "(?:$|[^a-zA-Z])/i";
    return preg_match($patt, $txt);
}

$sql ="SELECT DISTINCT redirect FROM ".TBL_AUTHORIZE_NEW." ORDER BY redirect";
$result = @mysql_query($sql) or die(mysql_error());
	while ($sql = mysql_fetch_object($result)) 
	{ 
	    $redir = $sql -> redirect;
	    $redirs = str_replace(CMS_URL, '', $redir); 

		if ( preg_match('/clientarea\/(.*?)/', $redirs) && $redirs!='clientarea/' ) { $redirectALL[] = trim(str_replace('clientarea/', '', $redirs));  }
	}

	//echo count($redirtotal).' TOTALS';
	$adminAcc_1 = join("|", $redirectALL);
	//echo '<br /><br />';

$sql ="SELECT DISTINCT galleries FROM ".TBL_AUTHORIZE_NEW." ORDER BY galleries";
$result = @mysql_query($sql) or die(mysql_error());
	while ($sql = mysql_fetch_object($result)) 
	{ 
	    $galls = $sql -> galleries; 
	    $gallss = str_replace(CMS_URL, '', $galls); 

		if ( preg_match('/clientarea\/(.*?)/', $gallss) ) { $galleriesALL[] = trim(str_replace('clientarea/', '', $gallss)); }
	}

	$adminAcc_2 = join("|", $galleriesALL);
	//echo '<br /><br />';

	$adminAcc = $adminAcc_1.'|'.$adminAcc_2;
	$adminAcc = str_replace('/|', '|', $adminAcc);

	$adminAccStripped = explode("|",$adminAcc);

	$arr_clientareas = array_values(array_unique($adminAccStripped));
	sort($arr_clientareas);


echo '<ul style="list-style-type:disc; padding:10px 0px 0px 16px;">'."\n";
foreach ($arr_clientareas as $key => $val) { 
    //echo $val."\n"; 
	if ( is_dir(CMS_PATH.'clientarea/'.$val) ) { 
		if ( file_exists(CMS_PATH.'clientarea/'.$val.'/pdf.php') ) { 
			echo '<li style="height:30px;"><u><a href="'.CMS_URL.'clientarea/'.$val.'">'.CMS_URL.'clientarea/'.$val.'</a></u></li>'."\n"; 
		}
	}
}
echo '</ul>'."\n";
echo '<p>&nbsp;</p>'."\n";

	echo '</div></div></div>'."\n";
#### ALL /clientarea/ #########################################################
}
?>

<div class="clear"></div>

	</div> <!-- /page_content home -->
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