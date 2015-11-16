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

echo "<div class='panel panel-default'>";
echo "<div class='panel-heading'>" . $LANG_APPLICATION_INFO . "</div>";
echo "<table class='table table-bordered'>";

$sql = mysqli_query($connect, "select inverter_serial, inverter_type, build_date, duo_single, parts_nr, 
panel_1, panel_2 from inverters where data_id= '$id'");

while($row = mysqli_fetch_array($sql)){
	echo "<form name='inverters_edit' action='inverters_update.php' method='POST'>";
	echo "<tr><td>" . $LANG_INVERTER . "</td><td><input type='text' name='inverterserial' value='". $row['inverter_serial']. "'></td></tr>";
	echo "<tr><td>" . $LANG_INVERTER_TYPE . "</td><td><input type='text' name='invertertype' value='". $row['inverter_type']. "'></td></tr>";
	echo "<tr><td>" . $LANG_INVERTER_DUO . "</td><td><input type='text' name='duosingle' value='". $row['duo_single']."'></td></tr>";
	echo "<tr><td>" . $LANG_INVERTER_PARTNR . "</td><td><input type='text' name='partsnr' value='". $row['parts_nr']."'></td></tr>";
	echo "<tr><td>" . $LANG_BUILD_DATE . "</td><td><input type='text' name='builddate' value='". $row['build_date']."'></td></tr>";
	echo "<tr><td>" . $LANG_LIVE_PANEL_1 . "</td><td><input type='text' name='panel1' value='". $row['panel_1']."'></td></tr>";
	echo "<tr><td>" . $LANG_LIVE_PANEL_2 . "</td><td><input type='text' name='panel2' value='". $row['panel_2']."'></td></tr>";
	echo "</table></div>";
	echo "<input type='submit' value='" . $LANG_BUTTON_SAVE . "' class='btn btn-success'>  
	<a href='inverters_overview.php'class='btn btn-info'>" . $LANG_BUTTON_CANCEL . "</a>";
	echo "<input type='hidden' name='id' value='$id'>";
	echo "</form>";
}	

mysqli_close($connect);

include ("../footer.php");
?>
