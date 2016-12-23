<?php
	require("../include/config.php");
	/*
	delete all backup files older than 4 days
	*/
	//---------------------------------------------------------------
	//only allowed to run this script from commandline (cronjob)
	(PHP_SAPI !== 'cli' || isset($_SERVER['HTTP_USER_AGENT'])) && die('cli only - not possible to run from browser');
	$command = "sudo find /var/www/html" . $DOCUMENT_ROOT . "/backups/files/* -mtime +4 -exec rm {} \;";
	exec ($command);
	mysqli_close($connect);
?>
