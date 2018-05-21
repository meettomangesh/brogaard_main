<?php

$show = trim($_SERVER["QUERY_STRING"]);
if ($show == 'phpinfo') phpinfo();

else
echo dirname($_SERVER["SCRIPT_FILENAME"]);

?>