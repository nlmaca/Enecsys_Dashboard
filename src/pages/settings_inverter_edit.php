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

$InfoInv = mysqli_query($connect,"select count(data_id) as count_inv, sum(Wpanel_1 + Wpanel_2) as Tpower from inverters");
if ($InfoInv->num_rows > 0) {
	while($row=mysqli_fetch_array($InfoInv)){
		$CountInv = $row['count_inv'];
		$TotalPow = $row['Tpower'];
	}
}
else {
	$CountInv = 0;
	$TotalPow = 0;
}

$output= mysqli_query($connect,"select data_id, inverter_serial, inverter_type, parts_nr, date_format(build_date,'%Y-%m-%d')as new_date,
	duo_single, Wpanel_1, Wpanel_2, inverter_alias from inverters order by data_id asc");

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

	$DataId = $connect->escape_string(htmlspecialchars($_POST['data_id']));

	$sql = "select data_id, inverter_serial, inverter_type, parts_nr, build_date, duo_single, Wpanel_1, Wpanel_2, inverter_alias from inverters where data_id = $DataId";
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
					<form class="form-horizontal form-label-left" action="settings_inverter_update.php" method='POST' novalidate>
						<span class="section"><?php echo $LANG_PAGES_INVERTERS_EDIT; ?></span>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="number"><?php echo $LANG_PAGES_INVERTER; ?> <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="number" id="inverter" name="inverter_serial" required="required" data-validate-minmax="9" class="form-control col-md-7 col-xs-12" value="<?php echo $row['inverter_serial']; ?>">
							</div>
						</div>
						<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $LANG_PAGES_INVERTER_TYPE;?> </label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<select class="form-control" name="inverter_type">
							<option value="<?php echo $row['inverter_type']; ?>"><?php echo $row['inverter_type']; ?></option>
							<option value="SMI-220">SMI-220</option>
							<option value="SMI-200-60">SMI-200-60</option>
							<option value="SMI-217-60">SMI-217-60</option>
							<option value="SMI-240-60">SMI-240-60</option>
							<option value="SMI-480-60">SMI-480-60</option>
							<option value="SMI-200-72">SMI-200-72</option>
							<option value="SMI-240-72">SMI-240-72</option>
							<option value="SMI-263-72">SMI-263-72</option>
							<option value="SMI-280-72">SMI-280-72</option>
							<option value="SMI-360-72">SMI-360-72</option>
							
						</select>
					</div>
				</div>
				<div class="item form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation"><?php echo $LANG_PAGES_INVERTER_PARTNR; ?> </label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input id="parts_nr" type="text" name="parts_nr" data-validate-length-range="0,20"
						class="form-control col-md-7 col-xs-12" value="<?php echo $row['parts_nr']; ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $LANG_PAGES_INVERTER_BUILD; ?> </label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input id="build_date" name="build_date"
						class="date-picker form-control col-md-7 col-xs-12" type="text" value="<?php echo $row['build_date']; ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $LANG_PAGES_INVERTER_DUOSINGLE; ?><span class="required">*</span> </label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<select class="form-control" name="duo_single" required>
							<option value="<?php echo $row['duo_single']; ?>"><?php echo $row['duo_single']; ?></option>
							<option>Duo</option>
							<option>Single</option>
						</select>
					</div>
				</div>
				<div class="item form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="number"><?php echo $LANG_PAGES_INVERTER_WPANEL1;?> <span class="required">*</span></label>
					<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="number" id="Wpanel_1" name="Wpanel_1" required="required" data-validate-minmax="0"
							class="form-control col-md-7 col-xs-12" value="<?php echo $row['Wpanel_1']; ?>">
					</div>
				</div>
				<div class="item form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="number"><?php echo $LANG_PAGES_INVERTER_WPANEL2;?> <span class="required">*</span></label>
					<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="number" id="Wpanel_2" name="Wpanel_2" required="required" data-validate-minmax="0"
							class="form-control col-md-7 col-xs-12" value="<?php echo $row['Wpanel_2']; ?>">
					</div>
				</div>
				<div class="item form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation"><?php echo $LANG_PAGES_INVERTER_ALIAS; ?> </label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input id="inverter_alias" type="text" name="inverter_alias" data-validate-length-range="0,100"
						class="form-control col-md-7 col-xs-12" value="<?php echo $row['inverter_alias']; ?>">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6 col-md-offset-3">
						<button id="send" type="submit" name="inverter_update" class="btn btn-success"><?php echo $LANG_BUTTON_SAVE;?></button>
						<a href='settings_inverter_overview.php'class='btn btn-info'><?php echo $LANG_BUTTON_CANCEL;?></a>
						<input type='hidden' name='data_id' value='<?php echo $row['data_id'];?>'>
					</div>
				</div>
			</form>
			<div align='right'>
				<form class="form-horizontal form-label-left" action="settings_inverter_delete.php" method='POST' novalidate>
					<input type='submit' name='inverter_delete' value='<?php echo $LANG_BUTTON_DELETE_INVERTER; ?>' class='btn btn-danger'>
					<input type='hidden' name='data_id' value='<?php echo $row['data_id'];?>'>
					<input type='hidden' name='inverter_serial' value='<?php echo $row['inverter_serial'];?>'>
  			</form>
			</div>

		</div>

	<?php
		}
	}
	else {
		echo $LANG_ERROR_NODATAFOUND;
	}

?>
<!-- footer content -->
<?php include ("../footer.php"); ?>
