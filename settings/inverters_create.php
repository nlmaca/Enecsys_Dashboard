<?php
// page version: 2.1
require("../inc/general_conf.inc.php");
if(empty($_SESSION['user'])) {
	header("Location: ". $DOCUMENT_ROOT . "/index.php");
    die("Redirecting to ". $DOCUMENT_ROOT . "/index.php"); 
}

include ("../header.php");
include ('../language/' . $language . '.inc.php'); 

?>
<script type="text/javascript">
	$(function() {
    	$("#datepicker").datepicker({ dateFormat: "yy-mm-dd" }).val()
    });
</script>
<?php
	echo "<div class='panel panel-default'>";
	echo "<div class='panel-heading'>" . $LANG_APPLICATION_INFO . "</div>";

	echo "<table class='table table-bordered'>";
	echo "<form name='inverters_create' action='inverters_insert.php' method='POST'>";
	echo "<tr><td>" . $LANG_INVERTER . "</td><td><input type='text' name='inverterserial' value=''></td></tr>";
	echo "<tr><td>" . $LANG_INVERTER_TYPE . "</td><td><input type='text' name='invertertype' value='SMI-480-60'></td></tr>";
	echo "<tr><td>" . $LANG_INVERTER_DUO . "</td><td><input type='text' name='duosingle' value='Duo'></td></tr>";
	echo "<tr><td>" . $LANG_INVERTER_PARTNR . "</td><td><input type='text' name='partsnr' value='1-B1-CA-AA-1'></td></tr>";
	echo "<tr><td>" . $LANG_BUILD_DATE . "</td><td><input type='text' id='datepicker' name='builddate' value='yyyy-mm-dd hr:min:sec'></td></tr>";
	echo "<tr><td>" . $LANG_LIVE_PANEL_1 . "</td><td><input type='text' name='panel1' value=''></td></tr>";
	echo "<tr><td>" . $LANG_LIVE_PANEL_2 . "</td><td><input type='text' name='panel2' value=''></td></tr>";
	echo "</table></div>";

	echo "<input type='submit' value='" . $LANG_BUTTON_ADD_INVERTER . "' class='btn btn-success'> <a href='inverters_overview.php'class='btn btn-info'>" . $LANG_BUTTON_CANCEL . "</a>";
	echo "</form>";
?>
<?php include ("../footer.php");?>

