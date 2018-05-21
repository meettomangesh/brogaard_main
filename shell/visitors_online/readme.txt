This is a simple script to display in your page the number of visitors you have online. It uses a .txt filr to write and store the visitors for a time period before updating itself. It uses nothing more than that .txt file so there's no need for coding knowledge, mysql databases whatsoever. Just use the following line in your scripts and CHMOD your visitors.txt file to 777 so we can read and write it. 

<?php
include('visitors_online/index.php'); //here we call the script,
                                      you can change the name of 
                                      your folder to whatever you 
                                      like but don't forget to change 
                                      it name here also.

?>