<?php
// page version: 2.0
require("../inc/general_conf.inc.php");
if(empty($_SESSION['user'])) {
	header("Location: ". $DOCUMENT_ROOT . "/index.php");
    die("Redirecting to ". $DOCUMENT_ROOT . "/index.php"); 
}
include ("../header.php");
include ('../language/' . $language . '.inc.php'); 

//$id = htmlspecialchars($_POST['id']);
$inverter = htmlspecialchars($_POST['inverterserial']);
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
		
$sql2 = mysqli_query($connect, "INSERT IGNORE INTO `inverters` (inverter_serial, 
		inverter_type, duo_single, parts_nr, build_date, panel_1, panel_2) values 
		($inverter, '$invertertype', '$duosingle', '$partsnr', '$builddate', '$panel1', '$panel2')");
				
		echo $LANG_INVINS_SUCCESS;
		echo "</table></div>";
		echo "<a href='inverters_overview.php' class='btn btn-info'>". $LANG_BUTTON_BACK_OVERVIEW . "</a>";

mysqli_close($connect);

?>

<?php include ("../footer.php");?>
