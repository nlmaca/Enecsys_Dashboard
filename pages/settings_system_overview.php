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


 		<!-- page content -->
    <div class="right_col" role="main">
    	<div class="">
    		<div class="page-title">
	    		<div class="title_left">
	    			<h3><?php echo $LANG_PAGES_SYSTEM_OVERVIEW;?></h3>
	    		</div>
        </div>
        <div class="clearfix"></div>
					<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="x_panel">
							<div class="x_title">
								<h2><?php echo $LANG_PAGES_SYSTEM_SETTINGS;?></h2>
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
											<th class="column-ltitle"><?php echo $LANG_PAGES_SYSTEM_DESCRIPTION;?></th>
											<th class="column-title"><?php echo $LANG_PAGES_SYSTEM_VALUE;?></th>

										</tr>
									</thead>

									<tbody>
										<?php
											$output= mysqli_query($connect,
											"select set_id, lang, location, country, timezone, currency, kwh_price, temperature, pvoutput_id, pvoutput_sys_id,
											pvoutput_team_id, pvoutput_team_name, gateway_ip
											from system_settings");
											if ($output->num_rows > 0) {
												while($row=mysqli_fetch_array($output)){
													$SetId = $row['set_id'];
													echo "<tr><td class=''>" . $LANG_PAGES_SYSTEM_IP . ":</td><td class=''>" . $row['gateway_ip'] . "</td></tr>";
													echo "<tr>";
													if ($row['lang'] == 'ENG') {
														echo "<td class=''>" . $LANG_PAGES_SYSTEM_LANGUAGE . ":</td><td class=''>" . $LANG_TEXT_ENG . "</td></tr>";
													}
													else if ($row['lang'] == 'NL') {
														echo "<td class=''>" . $LANG_PAGES_SYSTEM_LANGUAGE . ":</td><td class=''>" . $LANG_TEXT_NL . "</td></tr>";
													}
													echo "
													<tr><td class=''>" . $LANG_PAGES_SYSTEM_CITY . ":</td><td class=''>" . $row['location'] . "</td></tr>
													<tr><td class=''>" . $LANG_PAGES_SYSTEM_COUNTRY . ":</td><td class=''><span class='bfh-countries' data-country='" . $row['country'] . "' data-flags='true'></span></td></tr>
													<tr><td class=''>" . $LANG_PAGES_SYSTEM_TIMEZONE . ":</td><td class=''>" . $row['timezone'] . "</td></tr>
													<tr><td class=''>" . $LANG_PAGES_SYSTEM_CURRENCY . ":</td><td class=''><span class='bfh-currencies' data-currency='" . $row['currency'] . "' data-flags='true'></span></td></tr>
													<tr><td class=''>" . $LANG_PAGES_SYSTEM_KWHPRICE . ":</td><td class=''>" . $row['kwh_price'] . "</td></tr>
													<tr><td class=''>" . $LANG_PAGES_SYSTEM_TEMPERATURE . ":</td><td class=''>" . $row['temperature'] . "</td></tr>
													<tr><td class=''>" . $LANG_PAGES_SYSTEM_PVOUTPUT_ID . ":</td><td class=''>" . $row['pvoutput_id'] . "</td></tr>
													<tr><td class=''>" . $LANG_PAGES_SYSTEM_PVOUTPUT_SYSTEMID . ":</td><td class=''>" . $row['pvoutput_sys_id'] . "</td></tr>
													<tr><td class=''>" . $LANG_PAGES_SYSTEM_PVOUTPUT_TEAMID . ":</td><td class=''>" . $row['pvoutput_team_id'] . "</td></tr>
													<tr><td class=''>" . $LANG_PAGES_SYSTEM_PVOUTPUT_TEAMNAME . ":</td><td class=''>" . $row['pvoutput_team_name'] . "</td></tr>";
												}
											}
											else {
												echo $LANG_ERROR_NODATAFOUND;
											}
										?>
									</tbody>
								</table>
								<?php
									echo "<form action='settings_system_edit.php' method='POST'>
									<input type='submit' name='system_edit' value='". $LANG_BUTTON_EDIT_SETTINGS . "' class='btn btn-info'>
									<input type='hidden' name='set_id' value='" . $SetId . "'>
									</form>";
								?>
							</div>
						</div>
					</div>

        </div>
      <!-- footer content -->
			<?php include ("../footer.php"); ?>
