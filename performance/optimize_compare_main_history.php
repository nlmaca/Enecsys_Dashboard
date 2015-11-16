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
// step 1
// compare main table with history table for differences 
if ($sql = mysqli_query($connect,"select * from enecsys where ts NOT IN (select ts from enecsys_history)")) {
	$row_cnt = mysqli_num_rows($sql);
	if ($row_cnt > 0) {
		echo "<br>" . $LANG_ROWS_FOUND . $row_cnt . " " . $LANG_DB_STEP1_RESULT; 
	}
	else if ($row_cnt == 0) {
		echo "<br>" . $LANG_ROWS_FOUND . $row_cnt . " " . $LANG_DB_STEP1_RESULT2; 
	}
	else {
		echo "<br>" . $LANG_ERROR_RAG; 
	}
}
mysqli_close($connect);
?>
