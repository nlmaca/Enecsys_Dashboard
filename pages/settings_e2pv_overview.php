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
?>

	<div class="right_col" role="main">
		<div class="">
			<h2><?php echo $LANG_PAGES_E2PV_WARN;?></h2>
	      <div class="page-title">
	        <div class="title_left">
	          <h3><?php echo $LANG_PAGES_E2PV_OVERVIEW;?></h3>
	        </div>
	      </div>
	      <div class="clearfix"></div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="x_panel">
							<div class="x_title">
								<h2><?php echo $LANG_PAGES_E2PV_GENERAL;?></h2>
								<ul class="nav navbar-right panel_toolbox">
									<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
									<li><a class="close-link"><i class="fa fa-close"></i></a></li>
								</ul>
								<div class="clearfix"></div>
							</div>
							<div class="x_content">
								<table class="table table-striped responsive-utilities jambo_table bulk_action">
									<thead>
										<tr class="headings">
											<th class="column-ltitle"><?php echo $LANG_PAGES_E2PV_DESCRIPTION;?></th>
											<th class="column-title"><?php echo $LANG_PAGES_E2PV_VALUE;?></th>
										</tr>
									</thead>
									<tbody>
										<?php
											$output=mysqli_query($connect, "select data_id, e2pv_verbose, e2pv_idcount, e2pv_apikey, e2pv_systemid, e2pv_lifetime,
											e2pv_mode, e2pv_extended, e2pv_ac from e2pv_settings");
											if ($output->num_rows > 0) {
												while($row=mysqli_fetch_array($output)){
													$e2pv_id = $row['data_id'];
													echo "<tr><td class=''>" . $LANG_PAGES_E2PV_VERBOSE . "<a href='' data-toggle='tooltip' data-placement='top' title='" . $LANG_PAGES_E2PV_TOOLTIP_VERBOSE . "'><i class='fa fa-info-circle'></i></a></td><td class=''>" . $row['e2pv_verbose'] . "</td></tr>
													<tr><td class=''>" . $LANG_PAGES_E2PV_TOTALINVERTERS . "<a href='' data-toggle='tooltip' data-placement='top' title='" . $LANG_PAGES_E2PV_TOOLTIP_IDCOUNT . "'><i class='fa fa-info-circle'></i></a></td><td class=''>" . $row['e2pv_idcount'] . "</td></tr>
													<tr><td class=''>" . $LANG_PAGES_E2PV_PVOUTPUT_API . "</td><td class=''>" . $row['e2pv_apikey'] . "</td></tr>
													<tr><td class=''>" . $LANG_PAGES_E2PV_PVOUTPUT_SYSTEM . "</td><td class=''>" . $row['e2pv_systemid'] . "</td></tr>
													<tr><td class=''>" . $LANG_PAGES_E2PV_LIFETIME . "<a href='' data-toggle='tooltip' data-placement='top' title='" . $LANG_PAGES_E2PV_TOOLTIP_LIFETIME . "'><i class='fa fa-info-circle'></i></a>
													</td><td class=''>" . $row['e2pv_lifetime'] . "</td></tr>
													<tr><td class=''>" . $LANG_PAGES_E2PV_MODE . "<a href='' data-toggle='tooltip' data-placement='top' title='" . $LANG_PAGES_E2PV_TOOLTIP_MODE . "'><i class='fa fa-info-circle'></i></a>
													</td><td class=''>" . $row['e2pv_mode'] . "</td></tr>
													<tr><td class=''>" . $LANG_PAGES_E2PV_EXTENDED . "<a href='' data-toggle='tooltip' data-placement='top' title='" . $LANG_PAGES_E2PV_TOOLTIP_EXTENDED . "'><i class='fa fa-info-circle'></i></a></td><td class=''>" . $row['e2pv_extended'] . "</td></tr>
													<tr><td class=''>" . $LANG_PAGES_E2PV_AC . "<a href='' data-toggle='tooltip' data-placement='top' title='" . $LANG_PAGES_E2PV_TOOLTIP_AC . "'><i class='fa fa-info-circle'></i></a></td><td class=''>" . $row['e2pv_ac'] . "</td></tr>";
												}
											}
											else {
												echo $LANG_ERROR_NODATAFOUND;
											}
										?>
									</tbody>
								</table>
								<?php
									echo "<form action='settings_e2pv_edit.php' method='POST'>
									<input type='submit' name='e2pv_edit' value='Edit e2pv Settings' class='btn btn-info btn-xs'>
									<input type='hidden' name='data_id' value='" . $e2pv_id . "'>
									</form>";
								?>
							</div>
						</div>
					</div>
					<!-- 2nd tab/row -->
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="x_panel">
							<div class="x_title">
								<h2><?php echo $LANG_PAGES_E2PV_IGNORE; ?></h2>
								<ul class="nav navbar-right panel_toolbox">
									<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
									<li><a class="close-link"><i class="fa fa-close"></i></a></li>
								</ul>
								<div class="clearfix"></div>
							</div>
							<div class="x_content">
								<table class="table table-striped responsive-utilities jambo_table bulk_action">
									<thead>
										<tr class="headings">
											<th class="column-ltitle"># </th>
											<th class="column-title"><?php echo $LANG_PAGES_E2PV_INVERTER; ?></th>
											<th class="column-title"><?php echo $LANG_PAGES_E2PV_NOTE; ?></th>
											<th class="column-title"></th>
										</tr>
									</thead>
									<tbody>
										<?php

											$output2= mysqli_query($connect,"select data_id, e2pv_inverter, e2pv_descr from e2pv_ignore");
											if ($output2->num_rows > 0) {
												while($row=mysqli_fetch_array($output2)){
													//$ignoredInverter = $row['e2pv_inverter'] . ",<br />";
													//  $ignoredInverter = array($row['e2pv_inverter']);
													//echo $ignoredInverter;
													echo "<tr><td class=''>" . $row['data_id'] . "</td>
													<td class=''>" . $row['e2pv_inverter'] . "</td>
													<td class=''>" . $row['e2pv_descr'] . "</td>
													<td><form action='settings_e2pv_ignore_edit.php' method='POST'>
													<input type='submit' name='ignore_edit' value='" . $LANG_BUTTON_EDIT . "' class='btn btn-info btn-xs'>
													<input type='hidden' name='data_id' value='" . $row['data_id'] . "'>
													</form></td></tr>";
												}
											}
											else {
												echo $LANG_ERROR_NODATAFOUND;
											}
										?>
									</tbody>
								</table>
								<?php
									echo "<form action='settings_e2pv_ignore_create.php' method='POST'>
									<input type='submit' name='ignore_add' value='" . $LANG_BUTTON_IGNORE_INVERTER_ADD . "' class='btn btn-success btn-xs'>
									<input type='hidden' name='data_id' value='" . $e2pv_id . "'>
									</form>";
								?>
							</div>
						</div>
					</div>

      </div>
      <!-- footer content -->
			<?php include ("../footer.php"); ?>
