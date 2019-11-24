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

	//$SetId = htmlspecialchars($_POST['set_id']);

	$SetId = $connect->escape_string(htmlspecialchars($_POST['set_id']));

$sql = "select * from system_settings where set_id = $SetId";
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
				<form class="form-horizontal form-label-left" action="settings_system_update.php" method='POST' novalidate>
					<span class="section"><?php echo $LANG_PAGES_SYSTEM_EDITSETTINGS;?></span>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation"><?php echo $LANG_PAGES_SYSTEM_IP;?> <span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input id="location" type="text" name="gateway_ip" data-validate-length-range="0,15"
							class="optional form-control col-md-7 col-xs-12" value="<?php echo $row['gateway_ip']; ?>">
						</div>
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="number"><?php echo $LANG_PAGES_SYSTEM_LANGUAGE;?> <span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select class="form-control" name="language">
								<option value="<?php echo $row['lang']; ?>"><?php echo $row['lang']; ?></option>
								<option value="ENG"><?php echo $LANG_TEXT_ENG;?></option>
								<option value="NL"><?php echo $LANG_TEXT_NL;?></option>
							</select>
						</div>
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation"><?php echo $LANG_PAGES_SYSTEM_CITY;?> <span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input id="location" type="text" name="location" data-validate-length-range="0,20"
							class="optional form-control col-md-7 col-xs-12" value="<?php echo $row['location']; ?>">
						</div>
					</div>
  				<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="number"><?php echo $LANG_PAGES_SYSTEM_COUNTRY;?> <span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<!--bootstrap form helper with existing row from db -->
							<select class="form-control input-medium bfh-countries" data-country="<?php echo $row['country']; ?>" data-flags="true" name="country">
						</select>
						</div>
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="number"><?php echo $LANG_PAGES_SYSTEM_TIMEZONE;?> <span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 col-xs-12">

							<select class="form-control" name="timezone">
								<option value="<?php echo $row['timezone']; ?>"><?php echo $row['timezone']; ?></option>
								<?php foreach(tz_list() as $t) { ?>
									<option value="<?php print $t['zone'] ?>">
										<?php print $t['zone'] ?>
									</option>
								<?php } ?>
							</select>
						</div>
					</div>
				 <div class="item form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number"><?php echo $LANG_PAGES_SYSTEM_CURRENCY;?> <span class="required">*</span></label>
					 <div class="col-md-6 col-sm-6 col-xs-12">
						 <select class="form-control input-medium bfh-currencies" data-currency="<?php echo $row['currency']; ?>" name="currency"></select>
					 </div>
				 </div>
				 <div class="item form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation"><?php echo $LANG_PAGES_SYSTEM_KWHPRICE;?> <span class="required">*</span></label>
					 <div class="col-md-6 col-sm-6 col-xs-12">
						 <input id="location" type="text" name="kwh_price" data-validate-length-range="0,20"
						 class="optional form-control col-md-7 col-xs-12" value="<?php echo $row['kwh_price']; ?>">
					 </div>
				 </div>
				 <div class="form-group">
 					<label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $LANG_PAGES_SYSTEM_TEMPERATURE;?></label>
 					<div class="col-md-6 col-sm-6 col-xs-12">
 						<select class="form-control" name="temperature">
 							<option value="<?php echo $row['temperature']; ?>"><?php echo $row['temperature']; ?></option>
 							<option><?php echo $LANG_PAGES_SYSTEM_TEMP_CELCIUS;?></option>
 							<option><?php echo $LANG_PAGES_SYSTEM_TEMP_FARENHEIT;?></option>
 						</select>
 					</div>
 				</div>

				<div class="item form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation"><?php echo $LANG_PAGES_SYSTEM_PVOUTPUT_ID;?> <span class="required">*</span></label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input id="location" type="text" name="pvoutput_id" data-validate-length-range="0,20"
						class="optional form-control col-md-7 col-xs-12" value="<?php echo $row['pvoutput_id']; ?>">
					</div>
				</div>
				<div class="item form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation"><?php echo $LANG_PAGES_SYSTEM_PVOUTPUT_SYSTEMID;?> <span class="required">*</span></label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input id="location" type="text" name="pvoutput_sys_id" data-validate-length-range="0,20"
						class="optional form-control col-md-7 col-xs-12" value="<?php echo $row['pvoutput_sys_id']; ?>">
					</div>
				</div>
				<div class="item form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation"><?php echo $LANG_PAGES_SYSTEM_PVOUTPUT_TEAMID;?> <span class="required">*</span></label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input id="location" type="text" name="pvoutput_team_id" data-validate-length-range="0,20"
						class="optional form-control col-md-7 col-xs-12" value="<?php echo $row['pvoutput_team_id']; ?>">
					</div>
				</div>
				<div class="item form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation"><?php echo $LANG_PAGES_SYSTEM_PVOUTPUT_TEAMNAME;?> <span class="required">*</span></label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input id="location" type="text" name="pvoutput_team_name" data-validate-length-range="0,20"
						class="optional form-control col-md-7 col-xs-12" value="<?php echo $row['pvoutput_team_name']; ?>">
					</div>
				</div>
  			<div class="form-group">
						<div class="col-md-6 col-md-offset-3">
							<button id="send" type="submit" name="system_update" class="btn btn-success"><?php echo $LANG_BUTTON_SAVE;?></button>
							<a href='settings_system_overview.php'class='btn btn-info'><?php echo $LANG_BUTTON_CANCEL;?></a>
							<input type='hidden' name='set_id' value='<?php echo $row['set_id']; ?>'>
						</div>
					</div>
			</div>";
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
