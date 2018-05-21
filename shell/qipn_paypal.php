<?php
/*******************************************************************************
 *								PHP QuickIPN
 *******************************************************************************
*/

/* Global defines */
$time = time();

include('qipn_settings.php');
include('qipn_email.php');

/**
 * @author Micah Carrick <email@micahcarrick.com> modified by OneMadEye
 */
 
 
class paypal_class {
    
   var $last_error;                 // holds the last error encountered
   
   var $ipn_log;                    // bool: log IPN results to text file?
   
   var $ipn_log_file;               // filename of the IPN log
   var $ipn_response;               // holds the IPN response from paypal   
   var $ipn_data = array();         // array contains the POST values for IPN
   
   var $fields = array();           // array holds the fields to submit to paypal

   
   function paypal_class() {
       
      // initialization constructor.  Called when class is created.
      
      $this->paypal_url = 'https://www.paypal.com/cgi-bin/webscr';
      
      $this->last_error = '';
      
      $this->ipn_log_file = 'qipn_debug.log';
      $this->ipn_response = '';
            
   }
   
   function validate_product()
	{
			
		// Check product ID , Amount , Currency , Recivers email , 
		
		global $products,$currency,$paypal_email;
		
   		$item_number = $this->ipn_data['item_number'];
   		
   		$this->debug_log('Validating prodcut '.$item_number,true);
   		
   		if(!isset ( $products[$item_number] ) )
   		{
   			$this->debug_log('Invalid Product ID : '.$item_number,false);
         	return false;
   		}
   		
   		if( $this->ipn_data['receiver_email'] != $paypal_email ) 
   		{
   			$this->debug_log('Invalid Reciver E-Mail : '.$this->ipn_data['reciver_email'],false);  
         	return false;
   		}
   		
   		if( $products[$item_number][1] != $this->ipn_data['mc_gross'] || $currency != $this->ipn_data['mc_currency'] )
   		{
   			$this->debug_log("Diffrence in product price and paid price. Product = ".$products[$item_number][1]." $currency | Paid = ".$this->ipn_data['mc_gross']." ".$this->ipn_data['mc_currency'],false);  
        	return false;
   		} 
		return true;
   	}
   
   function validate_ipn() {

      // parse the paypal URL
      $url_parsed=parse_url($this->paypal_url);        

      // generate the post string from the _POST vars aswell as load the
      // _POST vars into an arry so we can play with them from the calling
      // script.
      $post_string = '';    
      foreach ($_POST as $field=>$value) { 
         $this->ipn_data["$field"] = $value;           
         $post_string .= $field.'='.urlencode(stripslashes($value)).'&'; 
      }
    	
      $this->post_string = $post_string;
      
      $this->debug_log('Post string : '. $this->post_string,true);  
        
      if(!$this->validate_product())
      {
      	$this->debug_log('IPN prodcut validation failed.',false);  
      	return false;
      }  
      
      $post_string.="cmd=_notify-validate"; // append ipn command

      // open the connection to paypal
      $fp = fsockopen($url_parsed['host'],"80",$err_num,$err_str,30); 
      if(!$fp) {
          
         // could not open the connection.  If loggin is on, the error message
         // will be in the log.
         $this->debug_log('Connection to '.$url_parsed['host']." failed.fsockopen error no. $errnum: $errstr",false);  
         return false;
  
      } else { 
 
         // Post the data back to paypal
         fputs($fp, "POST $url_parsed[path] HTTP/1.1\r\n"); 
         fputs($fp, "Host: $url_parsed[host]\r\n"); 
         fputs($fp, "Content-type: application/x-www-form-urlencoded\r\n"); 
         fputs($fp, "Content-length: ".strlen($post_string)."\r\n"); 
         fputs($fp, "Connection: close\r\n\r\n"); 
         fputs($fp, $post_string . "\r\n\r\n");             
         
         // loop through the response from the server and append to variable
         while(!feof($fp)) { 
            $this->ipn_response .= fgets($fp, 1024); 
         } 

         fclose($fp); // close connection
         
         $this->debug_log('Connection to '.$url_parsed['host'].' successfuly completed.',true);  

      }
      
      if (eregi("VERIFIED",$this->ipn_response)) {
  
         // Valid IPN transaction.
         $this->debug_log('IPN successfully verified.',true);  
         return true;       
         
      } else {
  
         // Invalid IPN transaction.  Check the log for details.
         $this->debug_log('IPN validation failed.',false);  
         return false;
         
      }
      
   }
        
   function log_ipn_results($success) {
       
      if (!$this->ipn_log) return;  // is logging turned off?
      
      // Timestamp
      $text = '['.date('m/d/Y g:i A').'] - '; 
      
      // Success or failure being logged?
      if ($success) $text .= "SUCCESS!\n";
      else $text .= 'FAIL: '.$this->last_error."\n";
      
      // Log the POST variables
      $text .= "IPN POST Vars from Paypal:\n";
      foreach ($this->ipn_data as $key=>$value) {
         $text .= "$key=$value, ";
      }
 
      // Log the response from the paypal server
      $text .= "\nIPN Response from Paypal Server:\n ".$this->ipn_response;
      
      // Write to log
      $fp=fopen($this->ipn_log_file,'a');
      fwrite($fp, $text . "\n\n"); 

      fclose($fp);  // close file
   }
   
   function debug_log($message,$success,$end=false)
   {
       
   	  if (!$this->ipn_log) return;  // is logging turned off?
      
      // Timestamp
      $text = '['.date('m/d/Y g:i A').'] - '.(($success)?'SUCCESS :':'FAILURE :').$message. "\n"; 
      
      if ($end) {
      	$text .= "\n------------------------------------------------------------------\n\n";
      }
      
      // Write to log
      $fp=fopen($this->ipn_log_file,'a');
      fwrite($fp, $text ); 
      fclose($fp);  // close file  	
   }

   

}       

/**
 * Provides encryption service using RC4 encryption scheme.
 * 
 * RC4 encryption is reversible. See
 *
 * @author Xiang Wei Zhuo <weizhuo[at]gmail.com>
 * @version v1.0, last update on Sat Mar 12 15:19:50 EST 2005
 * @package prado.examples.petshop
 */
class RC4Crypt {

	/**
	 * Encrypt the data.
	 * @param string private key.
	 * @param string data to be encrypted.
	 * @return string encrypted string.
	 */
	function encrypt ($pwd, $data)
	{
		$key[] = '';
		$box[] = '';

		$pwd_length = strlen($pwd);
		$data_length = strlen($data);

		for ($i = 0; $i < 256; $i++)
		{
			$key[$i] = ord($pwd[$i % $pwd_length]);
			$box[$i] = $i;
		}

		for ($j = $i = 0; $i < 256; $i++)
		{
			$j = ($j + $box[$i] + $key[$i]) % 256;
			$tmp = $box[$i];
			$box[$i] = $box[$j];
			$box[$j] = $tmp;
		}
		
		$cipher = '';

		for ($a = $j = $i = 0; $i < $data_length; $i++)
		{
			$a = ($a + 1) % 256;
			$j = ($j + $box[$a]) % 256;

			$tmp = $box[$a];
			$box[$a] = $box[$j];
			$box[$j] = $tmp;

			$k = $box[(($box[$a] + $box[$j]) % 256)];
			$cipher .= chr(ord($data[$i]) ^ $k);

		}

		return ($cipher);

	}

	/**
	 * Decrypt the data.
	 * @param string private key.
	 * @param string cipher text (encrypted text).
	 * @return string plain text. 
	 */
	function decrypt ($pwd, $data)
	{		
		return RC4Crypt::encrypt($pwd, ($data));
	}
}

/**
 *  Start of the script execution 
 */


$p = new paypal_class();             // initiate an instance of the class


// testing system , comment on live version 

if ($debug) {
	$p->ipn_log = true; 
	$p->ipn_log_file = $debug_log;
}

if ($sandbox) {
	$p->paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
}


$p->debug_log('Paypal Class Intiated by '.$_SERVER['REMOTE_ADDR'],true);

// End of comment part

      
if ($p->validate_ipn()) {
            
	     $p->debug_log('Creating prodcut Information to send.',true);
	
		 // Client has successfully paid for the product 
		 
		 $product_id = $p->ipn_data['item_number'];
		 
		 $download = $product_id.'|'.$time;
		 
	     $download_link = $script_location.'qipn_download.php?file='.rawurlencode(base64_encode(RC4Crypt::encrypt($secret,$download)));
		 
		 
		 $tags = array("{first_name}","{last_name}","{payer_email}","{product_name}","{product_link}","{product_price}","{product_id}");
		 $vals = array($p->ipn_data['first_name'],$p->ipn_data['last_name'],$p->ipn_data['payer_email'],$products[$product_id][0],$download_link,$products[$product_id][1],$product_id);
		 
		 $subject = str_replace($tags,$vals,$email_subject);
		 $body    = str_replace($tags,$vals,$email_body);	

		 $headers = 'From: '.$download_email . "\r\n";
    
		 $attachment = false;
		 
		 if ($email_attachment) {
		 	$attachment = $products[$product_id][2];
		 }
    
		 // Send Email to the buyer 
		 
         if(@send_mail($p->ipn_data['payer_email'],$body,$subject,$download_email,$attachment))
         {
         	$p->debug_log('Product Email successfully sent to '.$p->ipn_data['payer_email'].'.',true);
         } 
         else 
         {
         	$p->debug_log('Error sending product Email to '.$p->ipn_data['payer_email'].'.',false);
         }
         
         // Do some house keeping notify seller ( also for logging )
         
               
		 $n_subject = str_replace($tags,$vals,$notify_subject);
		 $n_body    = str_replace($tags,$vals,$notify_body).
                  "\n\n-------User Email----------\n".
                  $body.
                  "\n\n-------Paypal Parameters---\n".
                  $p->post_string;	      
		 
         if(@send_mail($notify_email,$n_body,$n_subject,$download_email))
         {
         	$p->debug_log('Notify Email successfully sent to '.$notify_email.'.',true);
         } 
         else 
         {
         	$p->debug_log('Error sending notify Email to '.$notify_email.'.',false);
         }
         		 
		 // done		 
         
}

$p->debug_log('Paypal class finished.',true,true);


?>