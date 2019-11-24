<?php
	require("../include/init.php");
	include ("../header.php");
	//check if session is valid for login
	if(empty($_SESSION['user'])) {
		header("Location: ". $DOCUMENT_ROOT . "/index.php");
	    die("Redirecting to ". $DOCUMENT_ROOT . "/index.php");
	}

$Allowed = htmlspecialchars($_POST['reset_allowed']);

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
      <div class="page-title">
	      <div class="title_left">
	    	  <h3>System Status</h3>
	      </div>
    	</div>
      <div class="clearfix"></div>
			<div class="row">
			<!-- 2nd row -->
  			<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
	  					<h2><?php echo $LANG_RESTART_OVERVIEW; ?></h2>
							<ul class="nav navbar-right panel_toolbox">
		  					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
								<li><a class="close-link"><i class="fa fa-close"></i></a></li>
							</ul>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
						<?php
						//do the check if reboot is allowed
						  if ($Allowed == 1) {
                exec('sleep 5; sudo reboot');
						  }
						  //shutdown rpi
						  else if ($Allowed == 2) {
						    exec('sleep 5; sudo halt');
						  }
						  else {
						    echo $LANG_ERROR_NODATAFOUND;
						  }
						?>
					</div>
				</div>
			</div>
    </div>
<!-- footer content -->
<?php include ("../footer.php"); ?>
