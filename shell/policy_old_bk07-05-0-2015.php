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

?>
<div id="page-container" class="page-container contact-container">
	<div id="page-content" class="page-content contact-content">

<!-- <h2>Privacy Policy</h2> -->

<div class="contact-form-container" style="width:924px; text-align:justify;">
<!-- START Policy -->
<p class="lineTitle1">Privacy Policy</p>
<p>&nbsp;</p>
<p>By using this site, you are indicating your agreement to the terms of this policy. If you disagree with any of the terms, then please do not use our site. We reserve the right to alter the terms of this policy at any time. Changes will be notified to you using the email address you provide to us or by an announcement on this site. Your continued use of this site will indicate your agreement to such changes.</p>
<p>&nbsp;</p>
<p>Art Partner Productions Ltd and any successor operators of our business (&quot;We&quot; and &quot;us&quot; respectively) are conscious of our responsibilities as a &quot;data controller&quot; and will ensure that the information we obtain and use will always be processed and transferred in compliance with all applicable data protection laws and regulation.</p>
<p>&nbsp;</p>
<p>Our site allows you to provide your personal details to register with us as a user of the site. It also allows you to provide your contact details to enquire about the purchase of art prints. The types of personal information collected on these pages are name; address; e-mail address and phone number, and information on goods and services sold and purchased.</p>
<p>&nbsp;</p>
<p>Please be aware that we may use your information and share it with and transfer it to our suppliers and other reputable third parties for the following purposes:</p>
<p>&nbsp;</p>
<p>- to process and administer details of your registration and service your requests from time to time;<br />
- to keep you up to date with the development of our site or our business;<br />
- to pass your details to our suppliers when you request certain services (for example, art prints);<br />
- to conduct market research and to understand better how our service may be improved and made even more useful for you;<br />
- to provide you with information about our products, promotions, offers and services which may be of interest to you;<br />
- to monitor and record your correspondence and communications with and to us to ensure that we maintain consistently high standards in dealing with your queries and needs; or<br />
- to share it for direct marketing purposes with our group companies and reputable third parties whose products and services may be of interest to you.</p>
<p>&nbsp;</p>
<p>If you would rather we do not use your information in the ways set out above, please let us know by writing to us at the address given below.</p>
<p>&nbsp;</p>
<p>Our site is hosted in Denmark therefore we may transfer information to and from Denmark to offices in the European Economic Area, the USA or other countries for normal commercial purposes. We may use e-mail to transfer this information; E-mail is not a fully secure method of communication. We will endeavour to comply with the Data Protection Act in respect of such transfers however if you do not consent to such transfers please do not register with our site, contact us or order any art print through our site.</p>
<p>&nbsp;</p>
<p>We may wish to send you marketing information mentioned above by e-mail. If you do not wish to receive direct marketing by e-mail, please let us know by writing to us at the address give below. In addition, each time we send you marketing information by e-mail we will provide an opportunity for you to unsubscribe from receiving further information from us.</p>
<p>&nbsp;</p>
<p>Also, if we sell our company or part of it, we will share your information with the purchaser, who may then provide you with information on their products and services.</p>
<p>&nbsp;</p>
<p>We use &quot;Cookies&quot; in order to personalise your visit to our site and customise our pages for you. We may use the information provided by cookies to analyse trends, administer the site, or for research and marketing purposes to help us better serve you. If you like, you can set your browser to notify you before you receive a cookie so you have the chance to accept it and you can also set your browser to turn off all cookies. The site www.allaboutcookies.org (run by the Interactive Marketing Bureau) contains step-by-step guidance on how cookies can be switched off by users. Registering with our site requires the use of cookies in order to work effectively. If you do not wish these cookies to be used then please do not register with our site as they cannot be turned off for this purpose.</p>
<p>&nbsp;</p>
<p>Should there be any inaccuracies in the information of which you inform us, or of which we become aware, please let us know and it shall be promptly rectified by us.</p>
<p>&nbsp;</p>
<p>You have a right to access the personal data we hold about you. If you wish to obtain a copy of this information, please write to us at the details given below enclosing your postal details.</p>
<p>&nbsp;</p>
<p>Our site may contain links to other sites belonging to third parties. Please make sure when you leave our site that you have read that site's privacy policy. We are not responsible for the content or operation of sites belonging to third parties.</p>
<p>&nbsp;</p>
<p>If you have any questions regarding this policy, or you wish to update your details or remove your personal data from our records, please contact us at: <u>info@brogaard.com</u></p>
<p>&nbsp;</p>
<p align="center">&copy; Copyright Steen Brogaard 2010-<script type="text/javascript" src="<?php echo URL_USER; ?>pages-resources/js/copyright.js"></script>. All rights reserved.</p>
<!-- END Policy -->
</div> <!-- /form-container -->

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