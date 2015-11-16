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
//step 3
//echo "<br>Clean up data older then 2 days";
// check how many rows can be deleted from main table
if ($sql = mysqli_query($connect, "SELECT * FROM enecsys WHERE ts < NOW() - INTERVAL 2 DAY")) {
	$row_cnt = mysqli_num_rows($sql);
	if ($row_cnt > 0) {
		echo "<br>" . $LANG_NR_ROWS . $row_cnt . " " . $LANG_DB_STEP3_RESULT .  "<br>"; 
	}
	else if ($row_cnt == 0) {
		echo "<br>" . $LANG_NR_ROWS .  $row_cnt . " " . $LANG_DB_STEP3_RESULT2 . "<br>"; 
	}
	else {
		echo "<br>" . $LANG_ERROR_RAG; 
	}
}

mysqli_close($connect);
?>
