<?php

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
<!-- page content -->
<?php
// define a variable to switch on/off error messages
	$mysqliDebug = true;

	//ignore insert
		$e2pvInverter = $connect->escape_string(htmlspecialchars($_POST['e2pv_inverter']));
		$e2pvDescr = $connect->escape_string(htmlspecialchars($_POST['e2pv_descr']));

		//check if inverter already exists
		$sqlcheck = "select e2pv_inverter from e2pv_ignore where e2pv_inverter = $e2pvInverter";
		$resultcheck = $connect->query($sqlcheck);

		if ($resultcheck->num_rows > 0) {
			echo "<div class='right_col' role='main'>
			<div class=''>
			<div class='page-title'>
			<div class='title_left'><h3>" . $LANG_PAGES_E2PV_IGNORE_EDIT . "</h3></div>
			</div><div class='clearfix'></div></div>
			<div class='x_content'><div class='row'>
			<div class='col-md-12 col-sm-12 col-xs-12'>
			<div class='x_panel' style='height:600px;'>
			<div class='x_title'><h2>" . $LANG_PAGES_E2PV_IGNORE_STATUS . "</h2><div class='clearfix'></div></div>
			<!-- status -->" . $LANG_PAGES_E2PV_IGNORE_ERROR_INSERT1 . $e2pvInverter . $LANG_PAGES_E2PV_IGNORE_ERROR_INSERT2 . "<br />
			<a href='javascript:history.back()' class='btn btn-info'>" . $LANG_BUTTON_BACK . "</a>
			<!-- /status -->
			</div></div></div></div>";
		}
		// if not exists insert into db
		else {
			$sql = "INSERT INTO e2pv_ignore (`e2pv_inverter`, `e2pv_descr`)
	    VALUES ('$e2pvInverter', '$e2pvDescr')";

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
				<div class='title_left'><h3>" . $LANG_PAGES_E2PV_IGNORE_EDIT . "</h3></div>
				</div>
				<div class='clearfix'></div>
				</div>
				<div class='x_content'>
				<div class='row'>
				<div class='col-md-12 col-sm-12 col-xs-12'>
				<div class='x_panel' style='height:600px;'>
				<div class='x_title'>
				<h2>" . $LANG_PAGES_E2PV_IGNORE_STATUS . "</h2>
				<div class='clearfix'></div>
				</div>
				<!-- status -->" . $LANG_PAGES_E2PV_IGNORE_ADDED . $e2pvInverter . "<br />
				<!-- /status -->
				<a href='settings_e2pv_overview.php'class='btn btn-success'>" . $LANG_BUTTON_OVERVIEW . "</a>&nbsp;&nbsp;
				<a href='reset_system.php'class='btn btn-info'>" . $LANG_BUTTON_REBOOT . "</a>
				</div></div></div></div>";
			}
			else {
					echo $LANG_ERROR_NODATAFOUND;
			}
		}
?>
      </div>
      <!-- footer content -->
			<?php include ("../footer.php"); ?>
