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
<!-- start form submit -->


    <div class="right_col" role="main">
		<div class="">
      <div class="page-title">
				<div class="title_left">
          <h3><?php echo $LANG_PAGES_INVERTERS_OVERVIEW;?></h3>
        </div>
			</div>
      <div class="clearfix"></div>
			<!-- start row -->
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<h2><?php echo $LANG_PAGES_INVERTERS_NR_INV . $CountInv . $LANG_PAGES_INVERTERS_NR_TOTAL . $TotalPow . " kWh</h2>"; ?>
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
										<th class="column-ltitle">#</th>
										<th class="column-title"><?php echo $LANG_PAGES_INVERTER;?></th>
										<th class="column-title"><?php echo $LANG_PAGES_INVERTER_TYPE;?></th>
										<th class="column-title"><?php echo $LANG_PAGES_INVERTER_PARTNR;?></th>
										<th class="column-title"><?php echo $LANG_PAGES_INVERTER_BUILD;?></th>
										<th class="column-title"><?php echo $LANG_PAGES_INVERTER_DUOSINGLE;?></th>
										<th class="column-title"><?php echo $LANG_PAGES_INVERTER_WPANEL1;?></th>
										<th class="column-title"><?php echo $LANG_PAGES_INVERTER_WPANEL2;?></th>
										<th class="column-title"><?php echo $LANG_PAGES_INVERTER_ALIAS;?></th>
										<th class="column-title"></th>
									</tr>
								</thead>
							<tbody>
							<?php
							if ($output->num_rows > 0) {
								while($row=mysqli_fetch_array($output)){
									echo "<tr><td class=''>" . $row['data_id'] . "</td><td class=''>"
									. $row['inverter_serial'] . "</td><td class=''>"
									. $row['inverter_type'] . "</td><td class=''>"
									. $row['parts_nr'] . "</td><td class=''>"
									. $row['new_date'] . "</td><td class=''>"
									. $row['duo_single'] . "</td><td class=''>"
									. $row['Wpanel_1'] . " W</td><td class=''>"
									. $row['Wpanel_2'] . " W</td><td class=''>"
									. $row['inverter_alias'] . "</td>
									<td><form action='settings_inverter_edit.php' method='POST'>
									<input type='submit' name='inverter_edit' value='" . $LANG_BUTTON_EDIT . "' class='btn btn-info btn-xs'>
									<input type='hidden' name='data_id' value='" . $row['data_id'] . "'>
									</form></td></tr>";

								}
							}
							else {
								$LANG_ERROR_NODATAFOUND = "No Data found";
							}
							?>
							</tbody>
						</table>
						<?php
						echo "<form action='settings_inverter_create.php' method='POST'>
									<input type='submit' name='inverter_add' value='" . $LANG_BUTTON_ADD_INVERTER . "' class='btn btn-success'>
									</form>";
						?>
					</div>
				</div>
			</div>
		<!-- end row -->
		</div>

		<!-- footer content -->
		<?php include ("../footer.php"); ?>
