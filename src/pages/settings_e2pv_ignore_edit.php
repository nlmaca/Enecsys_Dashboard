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

	//e2pv ignore edit
		$IgnoreId = $connect->escape_string(htmlspecialchars($_POST['data_id']));

		$sql = "select * from e2pv_ignore where data_id = $IgnoreId";
		$result = $connect->query($sql);

		if (!$result and $mysqliDebug) {
					// the query failed and debugging is enabled
					echo "<p>" . $LANG_ERROR_INQUERY . $sql . "</p>";
					echo $mysqli->error;
		}
		else if ($result) {
			while($row = mysqli_fetch_array($result)) {
				?>
				<div class="right_col" role="main">
				<div class="">
					<div class="x_content">
						<form class="form-horizontal form-label-left" action="settings_e2pv_ignore_update.php" method='POST' novalidate>
							<span class="section"><?php echo $LANG_PAGES_E2PV_IGNORE_EDIT ;?></span>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="number"><?php echo $LANG_PAGES_E2PV_IGNORE_INVERTER;?>
									<span class="required">
										<a href='' data-toggle='tooltip' data-placement='top' title='<?php echo $LANG_PAGES_E2PV_IGNORE_TOOLTIP_INV;?>'>
											<i class='fa fa-info-circle'></i>
										</a>
									</span>
								</label>

								<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" id="e2pv_inverter" name="e2pv_inverter" maxlength="9" required="required" data-validate-minmax="9"
										class="form-control col-md-7 col-xs-12" value="<?php echo $row['e2pv_inverter']; ?>">
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation"><?php echo $LANG_PAGES_E2PV_IGNORE_DESCR;?>
									<span class="required">
										<a href='' data-toggle='tooltip' data-placement='top' title='<?php echo $LANG_PAGES_E2PV_IGNORE_TOOLTIP_DESCR;?>'>
												<i class='fa fa-info-circle'></i>
											</a>
										</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" id="e2pv_descr" name="e2pv_descr" required="required" data-validate-minmax="0"
										class="form-control col-md-7 col-xs-12" value="<?php echo $row['e2pv_descr']; ?>">
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-6 col-md-offset-3">
									<button id="send" type="submit" name="ignore_update" class="btn btn-success"><?php echo $LANG_BUTTON_SAVE;?></button>
									<a href='settings_e2pv_overview.php'class='btn btn-info'><?php echo $LANG_BUTTON_CANCEL;?></a>
									<input type='hidden' name='data_id' value='<?php echo $row['data_id'];?>'>
								</div>
							</div>
						</form>
						<div align='right'>
							<form class="form-horizontal form-label-left" action="settings_e2pv_ignore_delete.php" method='POST' novalidate>
								<input type='submit' name='ignore_delete' value='<?php echo $LANG_BUTTON_DELETE; ?>' class='btn btn-danger'>
								<input type='hidden' name='data_id' value='<?php echo $row['data_id'];?>'>
								<input type='hidden' name='e2pv_inverter' value='<?php echo $row['e2pv_inverter'];?>'>
			  			</form>
						</div>
					</div>
				</div>
		<?php
			}
		}
		else {
			echo $LANG_ERROR_NODATAFOUND;
		}
	 ?>
  </div>
  <!-- footer content -->
<?php include ("../footer.php"); ?>
