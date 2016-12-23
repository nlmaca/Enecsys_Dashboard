<?php
//chart script: chart_current_all_inverters.php
	require("../include/init.php");
	include ("../header.php");
	//check if session is valid for login
	if(empty($_SESSION['user'])) {
		header("Location: ". $DOCUMENT_ROOT . "/index.php");
	    die("Redirecting to ". $DOCUMENT_ROOT . "/index.php");
	}
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

	<?php
	// define a variable to switch on/off error messages
    $mysqliDebug = true;

	//system update
		$SetId = $connect->escape_string(htmlspecialchars($_POST['set_id']));
		$GatewayIp = $connect->escape_string(htmlspecialchars($_POST['gateway_ip']));
		$Language = $connect->escape_string(htmlspecialchars($_POST['language']));
		$Location = $connect->escape_string(htmlspecialchars($_POST['location']));
		$Country = $connect->escape_string(htmlspecialchars($_POST['country']));
		$Timezone = $connect->escape_string(htmlspecialchars($_POST['timezone']));
		$Currency = $connect->escape_string(htmlspecialchars($_POST['currency']));
		$KwhPrice = $connect->escape_string(htmlspecialchars($_POST['kwh_price']));
		$Temperature = $connect->escape_string(htmlspecialchars($_POST['temperature']));
		$PvoutputId = $connect->escape_string(htmlspecialchars($_POST['pvoutput_id']));
		$PvoutputSystemId = $connect->escape_string(htmlspecialchars($_POST['pvoutput_sys_id']));
		$PvoutputTeamId = $connect->escape_string(htmlspecialchars($_POST['pvoutput_team_id']));
		$PvoutputTeamName = $connect->escape_string(htmlspecialchars($_POST['pvoutput_team_name']));


		$sql = "UPDATE system_settings SET
			lang = '". $Language . "',
			location = '". $Location . "',
			country = '". $Country. "',
			timezone = '". $Timezone . "',
			currency = '". $Currency . "',
			kwh_price = '". $KwhPrice . "',
			temperature = '". $Temperature . "',
			pvoutput_id = ". $PvoutputId . ",
			pvoutput_sys_id = ". $PvoutputSystemId . ",
			pvoutput_team_id = ". $PvoutputTeamId . ",
			pvoutput_team_name = '". $PvoutputTeamName . "',
			gateway_ip = '". $GatewayIp . "'
			where set_id = $SetId";

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
			<div class='title_left'><h3>System status</h3></div></div>
			<div class='clearfix'></div></div>
			<div class='x_content'>
			<div class='row'>
			<div class='col-md-12 col-sm-12 col-xs-12'>
			<div class='x_panel' style='height:600px;'>
			<div class='x_title'><h2>System Status</h2><div class='clearfix'></div></div>
			<!-- status -->
			" . $LANG_PAGES_SYSTEM_UPDATED . "<br />
      <a href='settings_system_overview.php'class='btn btn-success'>" . $LANG_BUTTON_OVERVIEW . "</a>
			<!-- /status -->
			</div></div></div></div>";
		}
		else {
			echo $LANG_ERROR_NODATAFOUND;
		}

 ?>
</div>
<!-- footer content -->
<?php include ("../footer.php"); ?>
