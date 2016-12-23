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

  <div class="right_col" role="main">
  <div class="">
    <div class="x_content">
      <form class="form-horizontal form-label-left" action="settings_inverter_insert.php" method='POST' novalidate>
        <span class="section"><?php echo $LANG_PAGES_INVERTERS_ADD;?></span>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number"><?php echo $LANG_PAGES_INVERTER;?> <span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="number" id="inverter" name="inverter_serial" required="required" data-validate-minmax="9" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="select"><?php echo $LANG_PAGES_INVERTER_TYPE;?> </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <select required class="form-control" id="inverter_type" name="inverter_type">
				<option value="0">-- Select --</option>
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
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation"><?php echo $LANG_PAGES_INVERTER_PARTNR;?> </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="parts_nr" type="text" name="parts_nr" data-validate-length-range="0,20" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $LANG_PAGES_INVERTER_BUILD;?> </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="build_date" name="build_date" class="date-picker form-control col-md-7 col-xs-12" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="select"><?php echo $LANG_PAGES_INVERTER_DUOSINGLE;?><span class="required">*</span> </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <select required id="duo_single" class="form-control" name="duo_single">
              <option value="0">-- Select --</option>
              <option value="Duo">Duo</option>
              <option value="Single">Single</option>
            </select>
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number"><?php echo $LANG_PAGES_INVERTER_WPANEL1;?> <span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="number" id="Wpanel_1" name="Wpanel_1" required="required" data-validate-minmax="0" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number"><?php echo $LANG_PAGES_INVERTER_WPANEL2;?> <span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="number" id="Wpanel_2" name="Wpanel_2" required="required" data-validate-minmax="0" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
				<div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation"><?php echo $LANG_PAGES_INVERTER_ALIAS;?> </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="inverter_alias" type="text" name="inverter_alias" data-validate-length-range="0,100" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-6 col-md-offset-3">
            <button id="send" type="submit" name="inverter_insert" class="btn btn-success"><?php echo $LANG_BUTTON_ADD;?></button>
            <a href='settings_inverter_overview.php'class='btn btn-info'><?php echo $LANG_BUTTON_CANCEL;?></a>
          </div>
        </div>
      </form>
    </div>
	<!-- footer content -->
<?php include ("../footer.php"); ?>
