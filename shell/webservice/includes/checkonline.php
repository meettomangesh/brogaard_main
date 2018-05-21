<?php
	@session_start();
	$online = $_SESSION['id'];
	if(!$online)
	{
		echo "<META HTTP-EQUIV=\"refresh\" content=\"0; URL=login.php\"> ";
		exit;
	}
?>