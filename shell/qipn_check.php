<?php
/*******************************************************************************
 *								PHP QuickIPN
 *******************************************************************************
*/

function check($bool)
{
	return '<strong>'.(($bool)?'<font color="#51AF30">Success</font>':'<font color="#FF0000">Failed</font>').'</strong>';
}

function can_write($file)
{
	$fp = fopen($file,"wa");
	if (!$fp) return false;
	fclose($fp);
	return true;
	
}

?>
<title>QuickIPN Checklist</title>

<p><strong>QuickIPN Checklist</strong></p>
<p> This page is checking for most common errors (if available).</p>
<p>Checking Settings file is accessible (qipn_settings.php) : <?=is_file('qipn_settings.php')?check(1):check(0);?></p>
<p>Checking Email file is accessible (qipn_email.php) : <?=is_file('qipn_email.php')?check(1):check(0);?></p>
<?php
// check settings 

include('qipn_settings.php');
include('qipn_email.php');

?>


<?php if ($sandbox) { ?> 
<p><strong><font color="#FF0000">SandBox is on </font>, All button codes will be for sandbox.</strong></p>
<?php } ?>

<?php if ($debug) { ?> 
<p><strong><font color="#FF0000">Debugging turned on </font>, All actions will be logged to log file.</strong></p>
<p>Debug file is writeable  : <?=can_write($debug_log)?check(1):check(0);?></p>
<?php } ?>


<p>Checking products : 
<?php

if (is_array($products)) {
	echo check(1).'</p>';
	
	foreach ($products as $var => $val)
	{
		echo "<p>Checking product ID [$var] is accessible :".(is_file($val[2])?check(1):check(0))."</p>";
		// button codes 
		?>
		Button Code for product ID - [<?=$var;?>]<br />
<textarea cols="100" rows="18">
<form action="<?=($sandbox?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr");?>" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="<?=$paypal_email;?>">
<input type="hidden" name="item_name" value="<?=$val[0];?>">
<input type="hidden" name="item_number" value="<?=$var;?>">
<input type="hidden" name="amount" value="<?=$val[1];?>">
<input type="hidden" name="no_shipping" value="1">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="currency_code" value="<?=$currency;?>">
<input type="hidden" name="lc" value="US">
<input type="hidden" name="rm" value="2">
<input type="hidden" name="return" value="<?=$script_thankyou;?>">
<input type="hidden" name="cancel_return" value="<?=$script_page;?>">
<input type="hidden" name="notify_url" value="<?=$script_location;?>qipn_paypal.php">
<input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but23.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form></textarea>
<?php	
	}
}
?>

<p>Checking Paypal connectivity : 
<?php
      $fp = fsockopen("www.paypal.com","80",$err_num,$err_str,30); 
      if(!$fp) {
        echo check(0)." [ $errnum: $errstr ]";     
      }
      else 
      {
      	echo check(1);
      }
?>
</p>

<p> Checking Email Sending functionality (dummy email will be sent to <?=$notify_email;?>): 
<form action="" method="POST">
<?php
	if (isset($_POST['email'])) {
		
		if(@send_mail($notify_email,"This is just a dummy test message to noticed that PHP Mail is working fine on your server.","Test email send from ".$script_location,$download_email))
		{
			// Success
			echo check(1);
		} 
		else 
		{
			// Failure 
			echo check(0);
		}
		
	} else {
		echo '<input type="submit" value="Send test email">';
	}
?>

<input type="hidden" name="email" value="true">
</form>
</p>