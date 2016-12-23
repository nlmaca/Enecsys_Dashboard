<?php
	require("../include/config.php");
	/*
	Craete mysql dump from current database. Credentials are from config
	*/
	//---------------------------------------------------------------
	//only allowed to run this script from commandline (cronjob)
	(PHP_SAPI !== 'cli' || isset($_SERVER['HTTP_USER_AGENT'])) && die('cli only - not possible to run from browser');

	$dashboard_location = "/var/www/html" . $DOCUMENT_ROOT;
	$backup_file = "DATABASE_" . $MYSQLDB . "-" . date("Y-m-d-H-i-s") . '.gz';
	$command = "mysqldump --opt -h $MYSQLHOST -u $MYSQLUSER -p$MYSQLPASSWORD $MYSQLDB " . " | gzip > /var/www/html" . $DOCUMENT_ROOT . "/backups/files/$backup_file";
	system($command);
	mysqli_close($connect);
?>
