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
$inverterserial = htmlspecialchars($_POST['inverterserial']);
$invertertype = htmlspecialchars($_POST['invertertype']);
$duosingle = htmlspecialchars($_POST['duosingle']);
$partsnr = htmlspecialchars($_POST['partsnr']);
$builddate = htmlspecialchars($_POST['builddate']);
$panel1 =  htmlspecialchars($_POST['panel1']);
$panel2 =  htmlspecialchars($_POST['panel2']);

// Create connection
$connect = mysqli_connect($dbHost, $dbUserName, $dbUserPasswd, $dbName);
// Check connection
if (!$connect) {
	die("Connection failed: " . mysqli_connect_error());
}	

echo "<div class='panel panel-default'>";
echo "<div class='panel-heading'>Application information</div>";
echo "<table class='table table-bordered'>";

$sql = mysqli_query($connect, "UPDATE `inverters` SET inverter_serial = '$inverterserial', 
inverter_type = '$invertertype',
duo_single = '$duosingle', 
parts_nr = '$partsnr', 
build_date = '$builddate', 
panel_1 = '$panel1', 
panel_2 = '$panel2'
where data_id = '$id'");
echo $LANG_INVERTER . $inverterserial . $LANG_UPDATED . mysqli_affected_rows($connect) . "<br>";
echo $LANG_UPD_SUCCESS;

mysqli_close($connect);
echo "</table></div>";
echo "<a href='inverters_overview.php' class='btn btn-info'>". $LANG_BUTTON_BACK_OVERVIEW . "</a>";
include ("../footer.php");
?>
