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
//inverter insert
	$InverterSerial = $connect->escape_string(htmlspecialchars($_POST['inverter_serial']));
	$InverterType = $connect->escape_string(htmlspecialchars($_POST['inverter_type']));
	$DuoSingle = $connect->escape_string(htmlspecialchars($_POST['duo_single']));
	$PartsNr = $connect->escape_string(htmlspecialchars($_POST['parts_nr']));
	$BuildDate = $connect->escape_string(htmlspecialchars($_POST['build_date']));
	$Wpanel_1 = $connect->escape_string(htmlspecialchars($_POST['Wpanel_1']));
	$Wpanel_2 = $connect->escape_string(htmlspecialchars($_POST['Wpanel_2']));
	$InverterAlias = $connect->escape_string(htmlspecialchars($_POST['inverter_alias']));

	//check if inverter already exists
	$sqlcheck = "select inverter_serial from inverters where inverter_serial = $InverterSerial";
		$resultcheck = $connect->query($sqlcheck);
	if ($resultcheck->num_rows > 0) {
		echo "<div class='right_col' role='main'>
		<div class=''>
		<div class='page-title'>
		<div class='title_left'><h3>" . $LANG_PAGES_INVERTERS_EDIT . "</h3></div>
		</div><div class='clearfix'></div></div>
		<div class='x_content'><div class='row'>
		<div class='col-md-12 col-sm-12 col-xs-12'>
		<div class='x_panel' style='height:600px;'>
		<div class='x_title'><h2>" . $LANG_PAGES_INVERTERS_STATUS . "</h2><div class='clearfix'></div></div>
		<!-- status -->" .
		$LANG_PAGES_INVERTERS_ERROR_INSERT1 . $InverterSerial . $LANG_PAGES_INVERTERS_ERROR_INSERT1 . "<br />
		<a href='javascript:history.back()' class='btn btn-info'>" . $LANG_BUTTON_BACK ."</a>
		<!-- /status -->
		</div></div></div></div>";
	}
	// if not exists insert into db
	else {
		$sql = "INSERT INTO inverters (`inverter_serial`, `inverter_type`, `inverter_alias`, `duo_single`, `parts_nr`, `build_date`, `Wpanel_1`, `Wpanel_2`)
    VALUES ('$InverterSerial', '$InverterType', '$InverterAlias', '$DuoSingle', '$PartsNr', '$BuildDate', $Wpanel_1, $Wpanel_2)";

		$result = $connect->query($sql);
		if (!$result and $mysqliDebug) {
	  	// the query failed and debugging is enabled
			echo "<p>" . $LANG_ERROR_INQUERY . $sql . "</p>";
			echo $mysqli->error;
	  }
		else if ($result) {
			echo "<div class='right_col' role='main'>
						<div class=''>
						<div class='page-title'>
						<div class='title_left'><h3>" . $LANG_PAGES_INVERTERS_EDIT . "</h3></div>
						</div>
						<div class='clearfix'></div>
						</div>
						<div class='x_content'>
						<div class='row'>
						<div class='col-md-12 col-sm-12 col-xs-12'>
						<div class='x_panel' style='height:600px;'>
						<div class='x_title'>
						<h2>" . $LANG_PAGES_INVERTERS_STATUS . "</h2>
						<div class='clearfix'></div>
						</div>
						<!-- status -->" .
						$LANG_PAGES_INVERTER_ADDED . $InverterSerial . "<br /><a href='settings_inverter_overview.php'class='btn btn-info'>" . $LANG_BUTTON_OVERVIEW . "</a>
						<!-- /status -->
						</div></div></div></div>";
		}
		else {
			echo $LANG_ERROR_NODATAFOUND;
		}
	}

?>
<!-- footer content -->
<?php include ("../footer.php"); ?>
