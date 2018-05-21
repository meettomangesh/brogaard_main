<?php
/*******************************************************************************
 *								PHP QuickIPN
 *******************************************************************************
*/

// URL of directory where script is stored ( include trailing slash )
$script_location = 'http://www.brogaard.com/shell/'; 

// URL of page from where script is called 
$script_page     = 'http://www.brogaard.com/shell/'; 

// URL of page Thank you page ( once payment is made , payee is sent to this page )
$script_thankyou = 'http://www.brogaard.com/shell/hd-checkpayment.php'; 

// Anything random key
$secret = '4975@472784e#9f7418$295QIPNcad1b0';

// Various Email values
$paypal_email = 'paypal@brogaard.com';	// Your Paypal Email // DEBUG TO: seller_1282940967_biz@gmail.com
$notify_email = 'hdsubscription@brogaard.com';	// Email which will recive notification // DEBUG TO: tobece@gmail.com
$download_email = 'brogaard.com <noreply@brogaard.com>'; // Email from which the mail wil be sent 						

$currency = 'DKK';

// How long will download link remain valid (in hours)
$download_life = ''; 

// Send File as attachment 
$email_attachment = false;

// Success Email Messages 
$email_subject = "Thank you for buying {product_name}";
$email_body = "Tillykke! Du kan nu downloade tusinder af billeder fra din Herlufsholm-konto hos Steen Brogaard.".
			  "\n\nDu kan bruge billederne til alle private formål, men må ikke offentliggøre dem eller på anden måde videre-distribuere/sælge billederne til trediepart.".
			  "\nDine login-data er personlige og må kun bruges af dig.".
			  "\nEnhver misbrug af dine login-data vil føre føre til afbrydelse af dit abonnement.".
			  "\nVi håber du får glæde af billederne - du vil modtage en besked om abonnements udløb en uge før udløbsdatoen.".
			  "\n\n--------------------------------------------------------------------------------".
			  "\n\nCongratulations! You can now download thousands of pictures from your Herlufsholm account at Steen Brogaard.".
			  "\n\nYou can use the images for any private purposes, but may not divulge or otherwise distribute/sell the images to third parties.".
			  "\nYour login data are personal and may only be used by you.".
			  "\nAny misuse of your login information would lead to interruption of your subscription.".
			  "\nWe hope you enjoy the pictures - you will receive a reminder a  week before the expiration date".
			  "\n\n--------------------------------------------------------------------------------".
			  "\n\nMed venlig hilsen,".
			  "\nSteen Brogaard"; 

// Notification Email Message			  
$notify_subject = "Product Sale Notification for {product_name}";
$notify_body =  "Hello Sir".
				"\n\nThis mail is to notify you about the sale of {product_name}.".
				"\nThe sale was made to {first_name} {last_name} ({payer_email}) at ".date('r',$time);
				"\n\nSent by Automatic Mailer";

// product[number] = array('Product Name' ,'Product Price' , 'Product Download Link'); 
$products[1] = array('110 kr for 1 måneds adgang','110.00','');
$products[2] = array('310 kr for 3 måneders adgang','310.00','');
$products[3] = array('1110 kr for et års adgang','1110.00','');


/**
 * No need to modify these unless you know what ur doing 
 */


$debug     = true; // Enable if you want debug log 
$debug_log = "qipn_debug.log";

$sandbox   = false; // Enable sandbox testing

// Simple PHP Mail 

$email_config['protocol'] = 'mail'; // Default
// $email_config['protocol'] = 'sendmail'; // Use this for some host
// Email Sending still not working then try to edit SMTP info on 'qipn_email.php'

?>