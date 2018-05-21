<?php
   class resizer {
      function upload($type,$source,$destination,$width='',$height='') {
         require_once(dirname(__FILE__) . '/thumb_creator.php');
		 $thumb_creator=new thumb_creator;
		 $thumb_creator->create($width,$height,$source,$type,$destination);
      }
   }

?>