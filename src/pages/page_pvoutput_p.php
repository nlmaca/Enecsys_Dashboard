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

<?php
$PVoutput = mysqli_query($connect,"select pvoutput_id, pvoutput_sys_id from system_settings");
if ($PVoutput->num_rows > 0) {
	while($row=mysqli_fetch_array($PVoutput)){
		$PvId = $row['pvoutput_id'];
		$PvSystemId = $row['pvoutput_sys_id'];
	}
}
else {
	$PvId = 0;
	$PvSystemId = 0;
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
  <div class="right_col" role="main">
    <!-- top tiles -->
    <?php include ("../top_tiles.php"); ?>
    <!-- /top tiles -->
		<div class="">
			<br />
			<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="x_panel">
							<div class="x_title">
								<h2><?php echo $LANG_PAGES_PVOUTPUT_P_TITLE . $PvId . $LANG_PAGES_PVOUTPUT_P_SYSID . $PvSystemId; ?> </small></h2>
								<ul class="nav navbar-right panel_toolbox">
									<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
									<li><a class="close-link"><i class="fa fa-close"></i></a></li>
								</ul>
								<div class="clearfix"></div>
							</div>
							<div class="x_content">
                <div class="embed-responsive embed-responsive-16by9">
	                <iframe class="embed-responsive-item" src="https://www.pvoutput.org/list.jsp?id=<?php echo $PvId; ?>&sid=<?php echo $PvSystemId; ?>"></iframe>
	              </div>
							</div>
						</div>
					</div>
				</div>
			</div>
      <!-- footer content -->
			<?php include ("../footer.php"); ?>
