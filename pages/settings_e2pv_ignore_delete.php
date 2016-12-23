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

 //ignore delete

		$DataId = $connect->escape_string(htmlspecialchars($_POST['data_id']));
		$e2pvInverter = $connect->escape_string(htmlspecialchars($_POST['e2pv_inverter']));

		$sql = "DELETE FROM e2pv_ignore	where data_id = $DataId";

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
	    <div class='title_left'><h3></h3></div></div>
	    <div class='clearfix'></div></div>
			<div class='x_content'>
		  <div class='row'>
	    <div class='col-md-12 col-sm-12 col-xs-12'>
	    <div class='x_panel' style='height:600px;'>
	    <div class='x_title'><h2>" . $LANG_PAGES_E2PV_IGNORE_EDIT . "</h2><div class='clearfix'></div></div>
			<!-- status -->" . $e2pvInverter . " " . $LANG_PAGES_E2PV_IGNORE_DELETED . "<br />" . $LANG_PAGES_E2PV_WARN . "<br />
			<!-- /status -->
			<a href='reset_system.php'class='btn btn-info'>" . $LANG_BUTTON_REBOOT . "</a> &nbsp;&nbsp;
			<a href='settings_e2pv_overview.php'class='btn btn-success'>" . $LANG_BUTTON_OVERVIEW . "</a>
			</div></div></div></div>";
	}
	else {
		echo $LANG_ERROR_NODATAFOUND;
	}
 ?>
</div>
<!-- footer content -->
<?php include ("../footer.php"); ?>
