<?php
// page version: 2.0
require("../inc/general_conf.inc.php");
if(empty($_SESSION['user'])) {
	header("Location: ". $DOCUMENT_ROOT . "/index.php");
    die("Redirecting to ". $DOCUMENT_ROOT . "/index.php"); 
}

include ("../header.php");
include ('../language/' . $language . '.inc.php'); 

$id = htmlspecialchars($_POST['id']);

// Create connection
$connect = mysqli_connect($dbHost, $dbUserName, $dbUserPasswd, $dbName);
// Check connection
if (!$connect) {
	die("Connection failed: " . mysqli_connect_error());
}	

$sql = mysqli_query($connect, "DELETE FROM inverters where data_id = $id");
echo "<div class='panel panel-default'>";
echo "<div class='panel-heading'>" . $LANG_APPLICATION_INFO . "</div>";
echo "<table class='table table-bordered'>";
//echo ("Affected rows (DELETE): %d\n", $connect->affected_rows);
echo "<tr><td>" . $LANG_INVDEL_SUCCESS . "</td></tr>";
mysqli_close($connect);
echo "</table></div>";
echo "<a href='inverters_overview.php'class='btn btn-info'>". $LANG_BUTTON_BACK_OVERVIEW . "</a>";

include ("../footer.php");
?>
