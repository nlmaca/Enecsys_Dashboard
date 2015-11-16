<?php
// page version: 1.0
require("../inc/general_conf.inc.php");
if(empty($_SESSION['user'])) {
	header("Location: ". $DOCUMENT_ROOT . "/index.php");
    die("Redirecting to ". $DOCUMENT_ROOT . "/index.php"); 
}

include ("../header.php");
include ('../language/' . $language . '.inc.php'); 

echo "<div class='panel panel-default'>";
echo "<div class='panel-heading'>" . $LANG_APPLICATION_INFO . "</div>";
echo "<table class='table table-bordered table-hover'>";
echo "<tr> <td><b>#</b></td><td><b>" . $LANG_INVERTER . "</b></td><td><b>" . $LANG_INVERTER_TYPE . "</b></td>
<td><b>" . $LANG_BUTTON_EDIT . "</b></td><td><b>" . $LANG_BUTTON_DELETE . "</b></td></tr>";

// Create connection
$connect = mysqli_connect($dbHost, $dbUserName, $dbUserPasswd, $dbName);
// Check connection
if (!$connect) {
	die("Connection failed: " . mysqli_connect_error());
}	

$output= mysqli_query($connect,"select data_id, inverter_serial, inverter_type, duo_single, panel_1, panel_2 from inverters order by data_id asc");
while($row=mysqli_fetch_array($output)){ 
	if ($row['data_id'] > 0) {
		echo "<tr>";
		echo "<td>" . $row['data_id'] . "</td>";
		echo "<td>" . $row['inverter_serial'] . "</td>";
		echo "<td>" . $row['inverter_type'] . "</td>";
		echo "<td><form action='inverters_edit.php' method='POST'>";
		echo "<input type='submit' value='" . $LANG_BUTTON_EDIT . "' class='btn btn-info btn-xs'>";
		echo "<input type='hidden' name='id' value='" . $row['data_id'] . "'>";
		echo "</form></td>";
		echo "<td><form action='inverters_delete.php' method='POST'>";
		echo "<input type='submit' value='" . $LANG_BUTTON_DELETE . "' class='btn btn-danger btn-xs'></td>";
		echo "<input type='hidden' name='id' value='" . $row['data_id'] . "'>";
		echo "</form></td>";
		
		echo "</tr>";
	}
	else {
		echo $LANG_ERROR_NDF;
	}
}
echo "</table></div><br>";
echo "<a href='inverters_create.php'class='btn btn-info'>" . $LANG_BUTTON_ADD_INVERTER . "</a>";
mysqli_close($connect);

include ("../footer.php");
?>
