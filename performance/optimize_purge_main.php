<?php
// page version: 2.0
require("../inc/general_conf.inc.php");
if(empty($_SESSION['user'])) {
	header("Location: ". $DOCUMENT_ROOT . "/index.php");
    die("Redirecting to ". $DOCUMENT_ROOT . "/index.php"); 
}

include ('../language/' . $language . '.inc.php'); 

$connect = mysqli_connect($dbHost, $dbUserName, $dbUserPasswd, $dbName);
	if (!$connect) {
		die("Connection failed: " . mysqli_connect_error());
	}

//step 4
//purge data older then 2 days from master table
$sql = mysqli_query($connect,"DELETE FROM enecsys WHERE ts < NOW() - INTERVAL 2 DAY");
echo "<br>" . $LANG_ROWS_DELETED . mysqli_affected_rows($connect) . "";

mysqli_close($connect);
?>
