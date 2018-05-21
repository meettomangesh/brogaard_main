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

<div class="copy contact-copy"></div>

<div class="contact-form-container" style="width:924px; text-align:justify;">
<!-- START Terms -->
<p class="lineTitle1">Terms of Use</p>
<p>&nbsp;</p>
<p><b>PLEASE READ THIS STATEMENT CAREFULLY. IF YOU DO NOT WISH TO BE BOUND BY THESE TERMS AND CONDITIONS THEN YOU SHOULD NOT ACCESS THIS SITE. ACCESS OF THIS SITE BY YOU SHALL BE DEEMED TO BE YOUR ACCEPTANCE OF THESE TERMS AND CONDITIONS.</b></p>
<p>&nbsp;</p>
<p><u><b>Copyright and Trade Marks</b></u></p>
<p>Unless otherwise stated, all rights in any information which appears on this site (including the photographs screen displays, the content, the text, graphics and look and feel of the site) belong to Steen Brogaard (&quot;we&quot; or &quot;us&quot;).</p>
<p>All trade marks, service marks, company names or logos are the property of their respective holders.</p>
<p>Any use by you of these photographs, images, marks, names and logos without express permission may constitute an infringement of the holders' rights.</p>
<p>&nbsp;</p>
<p><u><b>Use of the site</b></u></p>
<p>You may access this site for your own personal non-commercial use only. You may not download and keep or print any part of this site.</p>
<p>You may not access any part of this site prohibited by any notice or restriction, or where it is reasonably obvious that such part of the site is meant to be private (e.g. any administration area meant only for our employees).</p>
<p>You may only access this site using a normal desktop or mobile web browser or screen reader (or other device for accessibility purposes). You may not access this website for the purposes of 'scraping', aggregating or re-publishing its content or for any reason other than as a private visitor to the site.</p>
<p>Without affecting our right to take other action (including legal action), we may suspend or cancel your registration immediately if you do not comply with these terms and conditions.</p>
<p>We may take other methods to prevent you from accessing this site if you do not comply with these terms of use but, because of the nature of the internet, your successful ability to access this site should not be taken as our consent to do so other than on these terms and conditions.</p>
<p>&nbsp;</p>
<p><u><b>Residence</b></u></p>
<p>This site is  controlled by us from Denmark. We make no representation that any material contained on this site is appropriate for any other jurisdiction than the Danish. Should you choose to access this site from any location other than Denmark, you are responsible for compliance with all applicable local laws.</p>
<p>&nbsp;</p>
<p><u><b>Liability</b></u></p>
<p>By entering this site, you acknowledge and agree that the use of this site is at your own risk and to the extent permissible by applicable law, in no circumstances, including (but not limited to) negligence, shall we be liable for any direct, indirect, incidental, special, consequential, or punitive damages, losses, costs or expenses nor for any loss of profit that results from the use of, or inability to use this site or any material on any site linked to this site (including but not limited to any viruses or any other errors or defects or failures in computer transmissions or network communications) even if we have been advised of the possibility of such damage. In addition, no liability can be accepted by us in respect of any changes made to the content of this site by unauthorised third parties. All express or implied warranties or representations are excluded to the fullest extent permissible by law. We do not warrant that this site does not infringe any intellectual property rights of third parties.</p>
<p>Any software is downloaded at your own risk. If you are in any doubt as to the suitability of the software to be downloaded for your computer it is recommended that you obtain specialist advice before downloading it.</p>
<p>&nbsp;</p>
<p><u><b>Other Sites/Banners</b></u></p>
<p>We are not responsible for the content of any other websites that are linked to or from this site and we excludes all warranties and all liability for any loss or damage you incur as a result of your use of such sites. We will not be responsible for the content of any advertising or sponsorship that may appear on our site nor for compliance of the same with any laws or regulations.</p>
<p>&nbsp;</p>
<p><u><b>Site availability</b></u></p>
<p>To the extent permitted by applicable law, we do not warrant that this site will be available at any time.</p>
<p>&nbsp;</p>
<p><u><b>Accuracy</b></u></p>
<p>The information contained in this site is based on up to date information and while we make all reasonable efforts to ensure that material on this site is correct, current and complete at the date of publication, accuracy cannot be guaranteed. We make no warranties or representations (express or implied) as to its accuracy, currency or completeness. We may change the information at any time without notice. You should take appropriate steps to verify all information on this site before acting upon it.</p>
<p>&nbsp;</p>
<p><u><b>Amendments</b></u></p>
<p>We may update these terms and conditions from time to time and we will notify you of any changes using the e-mail address you gave to us on registration or by an announcement on the web site (at our sole discretion). The changes will apply to the use of the site after such notice. If you use the site after the date on which the changes come into effect, you will be deemed to have accepted the new terms and conditions.</p>
<p>&nbsp;</p>
<p><u><b>Severability</b></u></p>
<p>If any part of these terms and conditions is, at any time, found to be invalid by a court, tribunal or other forum of competent jurisdiction, or otherwise rendered unenforceable, that decision shall not invalidate or void the remainder of these terms and conditions. These terms and conditions shall be deemed amended by modifying or severing such part as necessary to render them valid, legal and enforceable while preserving their intent, or if that is not possible, by substituting another provision that is valid, legal and enforceable that gives equivalent effect to the parties' intent. Any such invalid or unenforceable part or parts shall be severable from these terms and conditions, or the validity of the part(s) in question in any other jurisdiction shall not be affected thereby.</p>
<p>&nbsp;</p>
<p><u><b>Assignment</b></u></p>
<p>You may not assign, sub-license or otherwise transfer any of your rights under these terms and conditions.</p>
<p>&nbsp;</p>
<p><u><b>Governing Law</b></u></p>
<p>These terms and conditions are governed by and shall be construed in accordance with the laws of Denmark. Non-contractual obligations (if any) arising out of or in connection with these terms and conditions (including their formation) shall also be governed by the laws of Denmark.</p>
<p>&nbsp;</p>
<p>You agree submit to the exclusive jurisdiction of the courts Denmark as regards any claim, dispute or matter (whether contractual or non-contractual) arising out of or in connection with these terms and conditions or any of the documents to be entered into pursuant to this these terms and conditions (including their formation).</p>
<p>&nbsp;</p>
<p align="center">&copy; Copyright Steen Brogaard 2010-<script type="text/javascript" src="<?php echo URL_USER; ?>pages-resources/js/copyright.js"></script>. All rights reserved.</p>
<!-- END Terms -->
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