<?php
	require("../include/config.php");
	/*
	Backup all files within html directory
	sudo needed, because on RPI files are placed under root user in /var/www
	*/
	//---------------------------------------------------------------
	//only allowed to run this script from commandline (cronjob)
	(PHP_SAPI !== 'cli' || isset($_SERVER['HTTP_USER_AGENT'])) && die('cli only - not possible to run from browser');
	$command = "sudo tar -pcvzf /var/www/html" . $DOCUMENT_ROOT . "/backups/files/FILES_" . date("Y-m-d-H-i-s") . ".tar.gz --exclude=*.tar.gz --exclude=/var/www/backups /var/www/html" . $DOCUMENT_ROOT . "";
	exec ($command);
	mysqli_close($connect);
?>
