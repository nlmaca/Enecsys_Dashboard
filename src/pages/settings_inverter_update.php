<?php
require("../include/init.php");
include ("../header.php");
//check if session is valid for login
if(empty($_SESSION['user'])) {
	header("Location: ". $DOCUMENT_ROOT . "/index.php");
    die("Redirecting to ". $DOCUMENT_ROOT . "/index.php");
}
// define a variable to switch on/off error messages
    $mysqliDebug = true;

?>

</head>
<body class="nav-md">
			<!-- sidebar menu -->
			<?php include ('../sidebar_menu.php'); ?>
			<!-- /sidebar menu -->
		</div>
	</div>
	<!-- top navigation -->
	<div class="top_nav">
		<div class="nav_menu">
			<?php include ("../top_nav.php"); ?>
		</div>
	</div>
	<!-- /top navigation -->
	<!-- page content -->
<!-- start form submit -->

<?php

//inverter update
	$DataId = $connect->escape_string(htmlspecialchars($_POST['data_id']));
	$InverterSerial = $connect->escape_string(htmlspecialchars($_POST['inverter_serial']));
	$InverterType = $connect->escape_string(htmlspecialchars($_POST['inverter_type']));
	$DuoSingle = $connect->escape_string(htmlspecialchars($_POST['duo_single']));
	$PartsNr = $connect->escape_string(htmlspecialchars($_POST['parts_nr']));
	$BuildDate = $connect->escape_string(htmlspecialchars($_POST['build_date']));
	$Wpanel_1 = $connect->escape_string(htmlspecialchars($_POST['Wpanel_1']));
	$Wpanel_2 = $connect->escape_string(htmlspecialchars($_POST['Wpanel_2']));
	$InverterAlias = $connect->escape_string(htmlspecialchars($_POST['inverter_alias']));

	$sql = "UPDATE inverters SET
		inverter_serial = '". $InverterSerial . "',
		inverter_type = '". $InverterType . "',
		duo_single = '". $DuoSingle. "',
		parts_nr = '". $PartsNr . "',
		build_date = '". $BuildDate . "',
		Wpanel_1 = ". $Wpanel_1 . ",
		Wpanel_2 = ". $Wpanel_2 . ",
		inverter_alias = '". $InverterAlias . "'
		where data_id = $DataId";

	$result = $connect->query($sql);
	if (!$result and $mysqliDebug) {
  	// the query failed and debugging is enabled
		echo "<p>" . $LANG_ERROR_INQUERY . $sql . "</p>";
		echo $mysqli->error;
  }
	else if ($result) {
		// <!-- page content -->
		echo "<div class='right_col' role='main'>
		<div class=''>
    <div class='page-title'>
    <div class='title_left'><h3>" . $LANG_PAGES_INVERTERS_EDIT . "</h3></div></div>
    <div class='clearfix'></div></div>
		<div class='x_content'>
	  <div class='row'>
    <div class='col-md-12 col-sm-12 col-xs-12'>
    <div class='x_panel' style='height:600px;'>
    <div class='x_title'><h2>" . $LANG_PAGES_INVERTERS_STATUS . "</h2><div class='clearfix'></div></div>
		<!-- status -->" . $LANG_PAGES_INVERTER_UPDATED . $InverterSerial . "<br />
			<a href='settings_inverter_overview.php'class='btn btn-info'>" . $LANG_BUTTON_OVERVIEW . "</a>
		<!-- /status -->
		</div></div></div></div>";
	}
	else {
		$LANG_ERROR_NODATAFOUND = "No Data found";
	}

?>
<!-- footer content -->
<?php include ("../footer.php"); ?>
