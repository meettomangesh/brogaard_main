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


// #################
// IF form submitted
if (array_key_exists('submitform', $_POST)) // process the script only if the form has been submitted -> OME
{ 
	foreach ($_POST as $key => $value) { $$key = addslashes(trim($value)); }

$todaydate = date('Y-m-d');
$modelbirth = "$modelday/$modelmonth/$modelyear";

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

$emailcount = mysql_result(mysql_query("SELECT COUNT(id) FROM authorize_new WHERE email='$email_address'"),0);
if ($emailcount > 0) {
$error = true;
$errormessage[] = 'E-mail address is in use.';
}

if ((strlen($password) < 6) && (strlen($password) > 10)) {
$error = true;
$errormessage[] = 'Your password should be between 6-10 characters';
}

if ($password != $repassword) {
$error = true;
$errormessage[] = 'Password and verify password doesn\'t match.';
}

if ($email_address != $reemail_address) {
$error = true;
$errormessage[] = 'E-mail addresses doesn\'t match.';
}

if (strlen($username) < 5) {
$error = true;
$errormessage[] = 'Please enter your username';
}

if ( !isset($registeras) ) {
$error = true;
$errormessage[] = 'Please specify what will you register yourself as';
}

if ( (isset($registeras) && $registeras=='model') && (strlen($modelcity) < 5) ) {
$error = true;
$errormessage[] = 'Please enter your city';
}

$usernamecount = mysql_result(mysql_query("SELECT COUNT(id) FROM ".TBL_AUTHORIZE_NEW." WHERE username='".clean_mysql($username)."'"),0);
if ($usernamecount > 0) {
$error = true;
$errormessage[] = 'Username is in use.';
}

if ((!is_numeric($phone))  && (strlen($phone) > 2) ){
$error = true;
$errormessage[] = 'Phone number should be numeric.';
} 

if ($error == false) {

$adminemail = 'steen@brogaard.com';
$Nameedit = "brogaard.com";
$frommailedit = "noreply@brogaard.com";
$subjectedit = "New user registration";
$bodyedit = "Hello admin,\r\nYou have new user:\r\n\r\n";
$bodyedit .= "First Name: $firstname\r\n";
$bodyedit .= "Last Name: $lastname\r\n";
$bodyedit .= "Email: $email_address\r\n";
$bodyedit .= "Phone: $phone\r\n";
$bodyedit .= "Royal Access: $royalaccess\r\n";
$bodyedit .= "Newsletter: $sub_newsletter\r\n";
$bodyedit .= "Username: $username\r\n";
$bodyedit .= "Password: $password\r\n";

$activationkey =  generateCode();

      $sql_data_array = array('firstname' => $firstname,
                              'lastname' => $lastname,
                              'email' => $email_address,
                              'username' => $username,
                              'group1' => 'Users',
                              'usertype' => 'private',
                              'redirect' => '',
                              'date_created' => $todaydate,
                              'phone' => $phone,
                              'activationkey' => $activationkey);

$sql = sprintf('INSERT INTO %s (%s) VALUES ("%s")', TBL_AUTHORIZE_NEW, implode(', ', array_map('mysql_escape_string', array_keys($sql_data_array))), implode('", "',array_map('mysql_escape_string', $sql_data_array)));
$result = mysql_query($sql) or die ("Error in query: $sql. ".mysql_error());
$insertid = mysql_insert_id();

$sql2 = "UPDATE ".TBL_AUTHORIZE_NEW." SET password=password('$password') WHERE id='".(int)$insertid."'";
$result2 = mysql_query($sql2) or die ("Error in query: $sql2. ".mysql_error());


		if ($registeras == 'model') {
		
			$sqlu = "UPDATE ".TBL_AUTHORIZE_NEW." SET usertype='model' WHERE id='".(int)$insertid."'";
			$resultu = mysql_query($sqlu) or die ("Error in query: $sql2. ".mysql_error());

			$sqld_data_array['authorize_id'] = $insertid;
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
			
			$sqld = sprintf('INSERT INTO %s (%s) VALUES ("%s")', TBL_AUTHORIZE_DT, implode(', ', array_map('mysql_escape_string', array_keys($sqld_data_array))), implode('", "',array_map('mysql_escape_string', $sqld_data_array)));
			$resultd = mysql_query($sqld) or die ("Error in query: $sqld. ".mysql_error());
			$modelinsertid = mysql_insert_id();

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
			

	if(!empty($_FILES[images][name][0]))
	{
		while(list($key,$value) = each($_FILES[images][name]))
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
			copy($_FILES[images][tmp_name][$key], "modelimages/".$NewImageName);
			}
		}

		if(!empty($MyImages))
		{
			$ImageStr = implode("|", $MyImages);
			$sql2 = "UPDATE ".TBL_AUTHORIZE_DT." SET modelimages='$ImageStr' WHERE authorize_details_id='$modelinsertid'";
			$result2 = mysql_query($sql2) or die ("Error in query: $sql2. ".mysql_error());
		}

	}

		} else if ($registeras == 'company') {
		
			$sqlu = "UPDATE ".TBL_AUTHORIZE_NEW." SET usertype='company' WHERE id='".(int)$insertid."'";
			$resultu = mysql_query($sqlu) or die ("Error in query: $sql2. ".mysql_error());
			
			$companytypes = implode(',', $_POST[companytype]);
			$sqld_data_array['authorize_id'] = $insertid;
			$sqld_data_array['companyname'] = $companyname;
			$sqld_data_array['companytype'] = $companytypes;
			$sqld_data_array['companycomments'] = $companycomments;

			$sqld = sprintf('INSERT INTO %s (%s) VALUES ("%s")', TBL_AUTHORIZE_DT, implode(', ', array_map('mysql_escape_string', array_keys($sqld_data_array))), implode('", "',array_map('mysql_escape_string', $sqld_data_array)));
			$resultd = mysql_query($sqld) or die ("Error in query: $sqld. ".mysql_error());
			
$bodyedit .= "Company name: $companyname\r\n";
$bodyedit .= "Company Type: $companytypes\r\n";
$bodyedit .= "Comments: $companycomments\r\n";
			}

$headeredit = "From: ". $Nameedit . " <" . $frommailedit . ">\r\n";
mail($adminemail, $subjectedit, $bodyedit, $headeredit);

$Name = "brogaard.com";
$email2 = "noreply@brogaard.com";
$subject = "Account activation on brogaard.com";
$body = "Hello $firstname,\r\nWelcome to our website!\r\n\r\nYou, or someone using your email address, has completed registration at brogaard.com. Your activation code : $activationkey\r\nhttp://www.brogaard.com/shell/activate.html\r\n\r\nIf this is an error, ignore this email.\r\n\r\nRegards";
$header = "From: ". $Name . " <" . $email2 . ">\r\n";
mail($email_address, $subject, $body, $header);
$errormsg = "Registration successful. We just sent you activation code. <strong><a href=\"activate.html\">Click here</a></strong> to activate your account."; 

} else {
$errormsg = "<ul><li>".implode("<li>",$errormessage)."</ul>"; 
}
					  
}

$months = array (1 => '01', '02', '03', '04', '05', '06','07', '08', '09', '10', '11', '12');
$days = range (1, 31);
$years = range (1930, 2000);

?><style type="text/css" media="screen">
.hide{ visibility:hidden; display:none; } 
#hello { display: none; position: absolute; top: 500px; left: 500px; height: 200px; width: 400px; border: 1px solid black; background: #ffffff; } 
</style>

<script type="text/javascript">
  /* Set onLoad focus to id="firstname" */
  function focus_textbox(){ setTimeout( function(){ try{ d = document.getElementById('firstname'); d.focus(); d.select(); } catch(e){} }, 200); } 
  focus_textbox();
</script>

<div id="page-container" class="page-container services-container">
	<div id="page-content" class="page-content services-content">
			
<!-- <div class="copy services-copy"><section> -->
<?php 
/*
	// GET PHP MARKDOWN
	include_once DIR_USER.'pages-resources/php/markdown.php';

	// SETUP FRAGMENTS
	function includeFragment($fragmentName, $markdown=true) {

		$fullPath = DIR_USER.'fragments/'.$fragmentName.'.html';

		if (file_exists($fullPath)) {
			$contents = file_get_contents($fullPath);

			if ($markdown)
			$contents = Markdown($contents);

			echo $contents;
		}
	}

	// GET FRAGMENT
	includefragment('services'); 
*/
?>
<!-- </section></div> -->

<div class="copy services-copy">
<h2>Firma-portrættet</h2>

<p>Et professionelt portræt på din hjemmeside, dine sociale netværk og på print personificerer din markedsføring. Det skaber en reel forbindelse til dine kunder. </p>
<p>Og det viser, at du står bag din virksomhed.</p>
<p>Lad mig hjælpe dig og din virksomhed med at gøre et godt første indtryk. Vi bruger gerne dit firmas lokaler som location eller skyder på vores studier på Refshaleøen eller på Sturlasgade. Vi bruger tid på at skabe en billedstil, der er skræddersyet til netop dit firma og passer til dig og /eller dine nøglepersoner, hvis billeder vil hjælpe med at personliggøre din hjemmeside, årsrapport, netværk, brochurer og anden markedsføring.</p>
<p>Alle billeder indexeres med navn og samles i vores online-data-base, hvor du kan bestille billeder og hente de klargjorte døgnet rundt, printe udvalgte fotos som PDF-præsentationer, bestille og betale prints direkte og  meget mere. Med tiden får du opbygget en billedbase, der altid er til rådighed.</p>
<p>Referencer bl.a.:  <a href="http://www.bruunhjejle.dk" target="_new">Bruun & Hjejle</a>,  <a href="https://om.coop.dk/om+coop/ledelsen+i+coop+danmark+koncernen.aspx" target="_new">Coop</a>, <a href="http://www.dsb.dk/om-dsb/virksomheden/organisationen/koncernledelsen/" target="_new">DSB</a>, <a href="http://www.dtu.dk/Om_DTU/Organisation/Direktionen.aspx" target="_new">DTU</a>,  Egmont, <a href="http://www.egmontfonden.dk/kontakt/" target="_new">Egmontfonden</a>, Erhvervsstyrelsen, <a href="http://www.ft.dk/Folketinget/findMedlem.aspx" target="_new">Folketinget</a>, Kongehuset, <a href="http://www.lett.dk/Page/Medarbejderne.aspx" target="_new">Lett Advokater</a>, <a href="http://www.nordiskfilm.dk/Om-Nordisk-Film/organisationen/Ledelsen/" target="_new">Nordisk Film</a>, Region Hovedstaden, Rigshospitalet</p>
<h2>&nbsp;</h2>
<h2>Det personlige portræt</h2>

<p>Mine personlige portrætter er ikke det typiske headshot. Vi arbejder med tid og rum, sensualitet og konfrontation. Vi leder efter et billede, der er intenst og spændende - også selvom man ikke kender dig. Billederne kan leveres på print og /eller digitalt - til direkte brug på din hjemmeside og på sociale medier og vil være tilgængelige døgnet rundt via et personligt login til vores hjemmeside.</p>
<p>Referencer bl.a.: Lars Brogaard, Michael Bojesen, <a href="http://sarablaedel.dk" target="_new">Sara Blædel</a>, <a href="http://www.frkholman.dk" target="_new">Susanne Holman</a>, Søs Fenger</p>
<h2>&nbsp;</h2>
<h2>Din virksomhed</h2>

<p>Vis mig din virksomhed - og lad mig vise dig den - set med mine øjne. Se din virksomhed fra utraditionelle vinkler, fotograferet bag facaderne, fotograferet closeup eller om natten, i modlys og medvind. Vis dine kunder skønheden i dit arbejde.</p>
<p>Tilbud: Få gennemfotograferet din virksomhed og opbygget en billeddatabase - betal kun for de billeder, du ender med at benytte.</p>
<p>Billederne i databasen er indexeret efter navne, motiver og genrer - du kan altså gennemsøge dine billeder på kryds og tværs, let bestille nye og døgnet rundt hente de allerede klargjorte billeder. I skrivende stunder er ialt over 40.000 billeder online tilgængelige for vores forskellige kunder.</p>
<p>Referencer bl.a.: Care, <a href="http://www.egmont.com/dk/" target="_new">Egmont</a>, <a href="http://herlufsholm.dk/Dansk/Pages/default.aspx" target="_new">Herlufsholm</a>, <a href="http://www.zirkus-nemo.dk" target="_new">Zirkus Nemo</a></p>
<p>&nbsp;</p>
<h2>Herlufsholm</h2>

<p>For adgang til <strong>Herlufsholm</strong> billed-blog klik <a href="http://www.brogaard.com/shell/herluf-reg.php">her</a>.</p>
<p>&nbsp;</p>
<h2>Interact</h2>

<p>Jeg sætter det lange, nære samarbejde højt. Brug formularen herunder til at registrere dig selv som kunde, leverandør, model eller bare som interesseret og få nyhedsbreve med særtilbud.</p>

<p>Bare interesseret? Registrer dig som 'Privat'.</p>

<p>Nuværende eller fremtidig kunde eller leverandør? Registrer dig som 'Firma'.</p>

<p>Vil medvirke som model? Registrer dig som 'Model'.</p>
</div>

<section>
<p class="desc-paragraph" align="left"><i>Felter mærket med <span class="required">*</span> SKAL udfyldes.</i></p>
</section>

	<p id="nonCSS.aboutParagraph3.value">
<div class="contact-form-container">
<div class="contact-form-content">
<form action="" id="member_form" method="post" enctype="multipart/form-data">

<table border="0" cellspacing="2" cellpadding="2" width="800" align="center">
	<tr>
		<td colspan="2" style="padding-left:80px; color:red;" align="left"><?php echo ( isset($errormsg)?$errormsg:'' ); ?></td>
	</tr>
</table>

<p>&nbsp;</p>

<div id="stylishfont">
	<label for="first_name" style="float:left; width:134px; margin-top:4px;"><?php echo lang('first_name'); ?>: <span class="required">*</span></label>
	<input type="text" id="firstname" name="firstname" tabindex="1" value="<?php echo ( isset($firstname)?$firstname:'' ); ?>" style="width:340px;" />
</div><div style="clear:both; height:10px;"></div>

<div id="stylishfont">
	<label for="last_name" style="float:left; width:134px; margin-top:4px;"><?php echo lang('last_name'); ?>: <span class="required">*</span></label>
	<input type="text" id="lastname" name="lastname" tabindex="2" value="<?php echo ( isset($lastname)?$lastname:'' ); ?>" style="width:340px;" />
</div><div style="clear:both; height:10px;"></div>

<div id="stylishfont">
	<label for="email" style="float:left; width:134px; margin-top:4px;"><?php echo lang('email'); ?>: <span class="required">*</span></label>
	<input type="text" id="email_address" name="email_address" tabindex="3" value="<?php echo ( isset($email_address)?$email_address:'' ); ?>" style="width:340px;" />
</div><div style="clear:both; height:10px;"></div>

<div id="stylishfont">
	<label for="email_repeat" style="float:left; width:134px; margin-top:4px;"><?php echo lang('email_repeat'); ?>: <span class="required">*</span></label>
	<input type="text" id="reemail_address" name="reemail_address" tabindex="4" value="<?php echo ( isset($reemail_address)?$reemail_address:'' ); ?>" style="width:340px;" />
</div><div style="clear:both; height:10px;"></div>

<div id="stylishfont">
	<label for="username" style="float:left; width:134px; margin-top:0px;"><?php echo lang('username'); ?>: <span class="required">*</span></label>
	<input type="text" id="username" name="username" tabindex="5" value="<?php echo ( isset($username)?$username:'' ); ?>" style="width:340px;" />
</div><div style="clear:both; height:10px;"></div>

<div id="stylishfont">
	<label for="password" style="float:left; width:134px; margin-top:0px;"><?php echo lang('password'); ?>: <span class="required">*</span></label>
	<input type="password" id="password" name="password" tabindex="6" value="" style="width:340px;" />
</div><div style="clear:both; height:10px;"></div>

<div id="stylishfont">
	<label for="password_repeat" style="float:left; width:134px; margin-top:0px;"><?php echo lang('password_repeat'); ?>: <span class="required">*</span></label>
	<input type="password" id="repassword" name="repassword" tabindex="7" value="" style="width:340px;" />
</div><div style="clear:both; height:10px;"></div>

<div id="stylishfont">
	<label for="telphone" style="float:left; width:134px; margin-top:4px;"><?php echo lang('telphone'); ?>: </label>
	<input type="text" id="phone" name="phone" tabindex="8" value="<?php echo ( isset($phone)?$phone:'' ); ?>" style="width:340px;" maxlength="13" />
</div><div style="clear:both; height:10px;"></div>
<p>&nbsp;</p>
<div id='tabs'><!-- START tabs -->
  <div id='nav'><!-- STARt nav -->
	<fieldset>
<!-- 	<label for="registeras"><?php echo lang('registeras'); ?>: <span class="required">*</span></label> -->
<?php echo lang('registeras'); ?>: <span class="required">*</span>&nbsp;&nbsp;
<input type="radio" tabindex="9" name="registeras" class="div1" value="user" style="background:#FFFFFF; color:#141414; border:1px solid #000000; font-family:verdana; font-size:10px; padding:1px" /><?php echo lang('private'); ?>&nbsp;&nbsp;
<input type="radio" tabindex="10" name="registeras" class="div2" value="company" style="background:#FFFFFF; color:#141414; border:1px solid #000000; font-family:verdana; font-size:10px; padding:1px" /><?php echo lang('company'); ?>&nbsp;&nbsp;
<input type="radio" tabindex="11" name="registeras" class="div3" value="model" style="background:#FFFFFF; color:#141414; border:1px solid #000000; font-family:verdana; font-size:10px; padding:1px" /><?php echo lang('model'); ?>
	</fieldset>
  </div><!-- END nav -->
<p>&nbsp;</p>
<div id="div1" class="registeras">
	<div id="hello">
			  <p align="center">WHAT WE LOOK FOR</p>
			  			<ul>
							<li>A serious interest in modelling/posing.</li>
							<li>Patience and humor.</li>
							<li>Interesting personal characteristica.</li>
							<li>You must have parental consent<br>if you are under 18 years of age.</li>
                            <li>Current: Models for non-commercial project <strong>DE-EVOLUTION</strong></li>
						</ul><!--<p align="center"><a href="javascript:void(0)" onclick="document.getElementById('hello').style.display='none'">Close</a></p>-->
	</div>
</div>

<div id="div2" class="registeras">
				<table border="0" cellspacing="5" cellpadding="2" width="100%">
					<tr style="line-height:40px;">
						<td width="200" align="left" style="vertical-align:top;">Firma-navn:</td>
						<td width="300" align="left"><input type="text" name="companyname" value="<?php echo ( isset($companyname)?$companyname:'' ); ?>"></td>
					</tr>
					<tr style="line-height:40px;">
						<td align="left" style="vertical-align:top;">Type:</td>
						<td align="left"><input type="checkbox" name="companytype[]" value="Client">						  Kunde<em> </em> <input type="checkbox" name="companytype[]" value="Supplier">						  Leverandør </td>
					</tr>
					<tr>
						<td align="left" style="vertical-align:top;">Kommentarer:</td>
						<td align="left"><textarea rows="4" cols="30" name="companycomments"><?php echo ( isset($companycomments)?$companycomments:'' ); ?></textarea></td>
					</tr>
				</table>
</div>

<div id="div3" class="registeras">
				<table border="0" cellspacing="5" cellpadding="2" width="100%">
					<tr style="line-height:40px;">
						<td align="left" style="vertical-align:top;">Køn:</td>
						<td align="left"><input type="radio" name="modelgender" value="male" />Male <input type="radio" name="modelgender" value="female" />Female</td>
					</tr>
					<tr style="line-height:40px;">
						<td align="left" style="vertical-align:top;">Fødselsdag:</td>
						<td align="left">
<?php 
echo "<select name='modelmonth'>";
foreach ($months as $value) {
	echo '<option value="'.$value.'">'.$value.'</option>\n';
} echo "</select> &nbsp;";

echo " <select name='modelday'>";
foreach ($days as $value) {
	echo '<option value="'.$value.'">'.$value.'</option>\n';
} echo "</select> &nbsp;";

echo " <select name='modelyear'>";
foreach ($years as $value) {
	echo '<option value="'.$value.'">'.$value.'</option>\n';
} echo "</select>";
?>
						</td>
					</tr>					
					<tr style="line-height:40px;">
						<td align="left" style="vertical-align:top;">Hudfarve:</td>
						<td align="left"><input type="text" name="modelskincolor" value="<?php echo ( isset($skincolor)?$skincolor:'' ); ?>"></td>
					</tr>
					<tr style="line-height:40px;">
						<td align="left" style="vertical-align:top;">Øjenfarve:</td>
						<td align="left"><input type="text" name="modeleyecolor" value="<?php echo ( isset($eyecolor)?$eyecolor:'' ); ?>"></td>
					</tr>
					<tr style="line-height:40px;">
						<td align="left" style="vertical-align:top;">Hårfarve:</td>
						<td align="left"><input type="text" name="modelhaircolor" value="<?php echo ( isset($haircolor)?$haircolor:'' ); ?>"></td>
					</tr>
					<tr style="line-height:40px;">
						<td align="left" style="vertical-align:top;">Højde(cm):</td>
						<td align="left"><input type="text" name="modelheight" value="<?php echo ( isset($height)?$height:'' ); ?>"></td>
					</tr>
					<tr style="line-height:40px;">
						<td align="left" style="vertical-align:top;">Type:</td>
						<td align="left"><input type="radio" name="modeltype" value="Only commercial jobs" />
					  Kun jobs med honorar<br><input type="radio" name="modeltype" value="Commercial and non-cmmercial jobs" checked/>
					  Også ubetale jobs</td>
					</tr>
					<tr style="line-height:40px;">
						<td align="left" style="vertical-align:top;">Addresse:</td>
						<td align="left"><input type="text" name="modeladdress" value="<?php echo ( isset($modeladdress)?$modeladdress:'' ); ?>"></td>
					</tr>
					<tr style="line-height:40px;">
						<td align="left" style="vertical-align:top;">By: <span class="required">*</span></td>
						<td align="left"><input type="text" name="modelcity" value="<?php echo ( isset($modelcity)?$modelcity:'' ); ?>"></td>
					</tr>
					<tr style="line-height:40px;">
						<td align="left" style="vertical-align:top;">Kan bedst:</td>
						<td align="left">
						<select name="modelavailability">
							<option value="Before noon">Before noon</option>
							<option value="After noon">After noon</option>
							<option value="Evening">Evening</option>
							<option value="Doesn’t matter" selected>Doesn’t matter</option>
						</select>
						</td>
					</tr>
					<tr>
						<td align="left" style="vertical-align:top;">Kommentarer:</td>
						<td align="left"><textarea rows="4" cols="30" name="modelcomments"><?php echo ( isset($modelcomments)?$modelcomments:'' ); ?></textarea></td>
					</tr>
					<tr>
						<td align="left" style="vertical-align:top;">Billeder</td>
						<td align="left">
								<input type=file name="images[]"><br>
								<input type=file name="images[]"><br>
								<input type=file name="images[]"><br>
								<input type=file name="images[]"><br>
						</td>
					</tr>
				</table>
</div>

</div><!-- END tabs -->
 
<script type="text/javascript">
  ( function () {
    var tabs = document.getElementById( 'tabs' );
    var nav  = tabs.getElementsByTagName( 'input' );
    /* Hide all tabs */
    function hideTabs(){
      var div = tabs.getElementsByTagName( 'div' );
      for ( var i = 0; i < div.length; i++ ) {
        if ( div[ i ].className == 'registeras' ) {
          div[ i ].className = div[ i ].className + ' hide';
        }
      }
    }
    /* Show the clicked tab */
    function showTab( tab ) {
      document.getElementById( tab ).className = 'registeras';
    }
    hideTabs(); /* hide tabs on load */
 
    /* Add click events */
    for( var i = 0; i < nav.length; i++ ) {
      if ( document.getElementById( nav[ i ].className ) ) {
        nav[ i ].onclick = function() {
          hideTabs();
          showTab( this.className );
        }
      }
    }
  })();
</script>

<div id="stylishfont">
	<?php echo lang('join_newsletter'); ?>: <input type="checkbox" id="sub_newsletter" name="sub_newsletter" value="1" style="background:#FFFFFF; color:#141414; border:1px solid #000000; font-family:verdana; font-size:10px; padding:1px" checked="checked" />
</div><div style="clear:both; height:10px;"></div>

	<fieldset>
	<input type="submit" id="submitform" name="submitform" value="<?php echo lang('register'); ?>" />
	</fieldset>

</form>

<p>&nbsp;</p>

<div id="stylishfont">
<p>Ved brugen af og registrering på denne website har du accepteret betingelserne i vores <a class="option" href="<?php echo URL_USER; ?>terms.php" title="Terms of Use" rel="shadowbox" target="_self"><u>Terms of Use</u></a> og <a class="option" href="<?php echo URL_USER; ?>policy.php" title="Privacy Policy" rel="shadowbox" target="_self"><u>Privacy Policy</u></a>.</p>

<p>Sørg venligst for at du har læst og forstået disse før du registrerer dig. Læg især mærke til, at vi gemmer og bruger dine informationer til at sende dig vores nyhedsbrev og til at kontakte dig med marketings-information via email, medmindre du klikker 'Få nyhedsbrev' fra. Denne indstilling kan senere ændres når du er logget ind.<p>
</div>

</div>
</div>
	</p>

	</div><!-- /page-content -->

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