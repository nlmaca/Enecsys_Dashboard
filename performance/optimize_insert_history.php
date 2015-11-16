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
// step 2
// insert differences from main table into history table
$sql = mysqli_query($connect,"insert into enecsys_history (ts, id, wh, dcpower, dccurrent, efficiency, acfreq, acvolt, temp, state) 
	select ts, id, wh, dcpower, dccurrent, efficiency, acfreq, acvolt, temp, state 
	from enecsys 
	where ts not in (select ts from enecsys_history)");
	
echo "<br>" . $LANG_ROWS_INSERTED . mysqli_affected_rows($connect) . "";

mysqli_close($connect);
?>
