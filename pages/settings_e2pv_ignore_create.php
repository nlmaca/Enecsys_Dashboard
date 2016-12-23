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
		<div class="x_content">
	  	<form class="form-horizontal form-label-left" action="settings_e2pv_ignore_insert.php" method='POST' novalidate>
	    	<span class="section"><?php echo $LANG_PAGES_E2PV_IGNORE_ADD;?></span>
	      <div class="item form-group">
	      	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="number"><?php echo $LANG_PAGES_E2PV_IGNORE_INVERTER;?>
						<span class="required">
							<a href='' data-toggle='tooltip' data-placement='top' title='<?php echo $LANG_PAGES_E2PV_IGNORE_TOOLTIP_INV;?>'>
								<i class='fa fa-info-circle'></i>
							</a>
						</span>
					</label>
	        <div class="col-md-6 col-sm-6 col-xs-12">
	        	<input id="e2pv_inverter" type="number" maxlength="9" name="e2pv_inverter" required="required" data-validate-minmax="9" class="form-control col-md-7 col-xs-12">
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
	          <input id="e2pv_descr" type="text" name="e2pv_descr" data-validate-length-range="0,100" class="optional form-control col-md-7 col-xs-12">
	        </div>
	      </div>
	      <div class="form-group">
	        <div class="col-md-6 col-md-offset-3">
	          <button id="send" type="submit" name="ignore_insert" class="btn btn-success"><?php echo $LANG_BUTTON_ADD;?></button>
	      	    <a href='settings_e2pv_overview.php'class='btn btn-info'><?php echo $LANG_BUTTON_CANCEL;?></a>
	        </div>
	      </div>
	    </form>
	  </div>
  </div>
  <!-- footer content -->
<?php include ("../footer.php"); ?>
