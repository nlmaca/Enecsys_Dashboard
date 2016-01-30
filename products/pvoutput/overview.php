<?php
// page version: 2.2
require("../../inc/general_conf.inc.php");
if(empty($_SESSION['user'])) {
    header("Location: ../../index.php");
    die("Redirecting to ../../index.php"); 
}
include ("../../header.php"); 
include '../../language/' . $language . '.inc.php'; 
//---------------------------------------------------------------
echo "PV output Team page<br>";
?>

	<div class="embed-responsive embed-responsive-16by9">
	  <iframe class="embed-responsive-item" src="http://www.pvoutput.org/ladder.jsp?tid=1018"></iframe>
	</div>


<?php
include("../../footer.php");
?>