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

//e2pv update
	 $DataId = $connect->escape_string(htmlspecialchars($_POST['data_id']));
	 $e2pvIdCount = $connect->escape_string(htmlspecialchars($_POST['e2pv_idcount']));
	 $e2pvApiKey = $connect->escape_string(htmlspecialchars($_POST['e2pv_apikey']));
	 $e2pvSystemId = $connect->escape_string(htmlspecialchars($_POST['e2pv_systemid']));
	 $e2pvLifetime = $connect->escape_string(htmlspecialchars($_POST['e2pv_lifetime']));
	 $e2pvAC = $connect->escape_string(htmlspecialchars($_POST['e2pv_ac']));

	 $sql = "UPDATE e2pv_settings SET
		 e2pv_verbose = 0,
		 e2pv_mode = 'AGGREGATE',
		 e2pv_extended = 0,
		 e2pv_idcount = $e2pvIdCount,
		 e2pv_apikey = '". $e2pvApiKey . "',
		 e2pv_systemid = $e2pvSystemId,
		 e2pv_lifetime = $e2pvLifetime,
		 e2pv_ac= $e2pvAC
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
		 <div class='title_left'><h3></h3></div></div>
		 <div class='clearfix'></div></div>
		 <div class='x_content'>
		 <div class='row'>
		 <div class='col-md-12 col-sm-12 col-xs-12'>
		 <div class='x_panel' style='height:600px;'>
		 <div class='x_title'><h2>" . $LANG_PAGES_E2PV_EDITSETTINGS . "</h2><div class='clearfix'></div></div>
		 <!-- status -->" . $LANG_PAGES_E2PV_UPDATED . "<br />" . $LANG_PAGES_E2PV_WARN . "<br />
		 <a href='reset_system.php'class='btn btn-info'>" . $LANG_BUTTON_REBOOT . "</a>&nbsp;&nbsp;
		 <a href='settings_e2pv_overview.php'class='btn btn-success'>" . $LANG_BUTTON_OVERVIEW . "</a>
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
