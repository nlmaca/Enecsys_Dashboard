<?php
//chart script: chart_total_year.php
	require("../include/init.php");
	//check if session is valid for login
	if(empty($_SESSION['user'])) {
		header("Location: ". $DOCUMENT_ROOT . "/index.php");
	  die("Redirecting to ". $DOCUMENT_ROOT . "/index.php");
	}

?>

<?php include ("../header.php"); ?>

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
	<?php
$CurrentYear = date("Y");
$WeekNumber= mysqli_query($connect,"SELECT week(ts) AS week FROM enecsys_report WHERE year(ts) = $CurrentYear AND week(ts) <> 0 GROUP BY week(ts) desc");

$Temperature= mysqli_query($connect,"SELECT temperature from system_settings");
if ($Temperature->num_rows > 0) {
	while($row=mysqli_fetch_assoc($Temperature)){
		$temp = $row['temperature'];
	}
}
?>
<div class="">
	<br />
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2><?php echo $LANG_PAGES_TOTAL_WEEK_TITLE . $CurrentYear;?></small></h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						<li><a class="close-link"><i class="fa fa-close"></i></a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<?php
					echo "<table class='table table-striped responsive-utilities jambo_table bulk_action'>";
				    echo "<thead><tr class='headings'>
				        <th class='column-ltitle'>" . $LANG_PAGES_TOTAL_WEEK_T_1 . "</th>
				        <th class='column-ltitle'>" . $LANG_PAGES_TOTAL_WEEK_T_2 . "</th>
				        <th class='column-ltitle'>" . $LANG_PAGES_TOTAL_WEEK_T_3 . "</th>
				        <th class='column-ltitle'>" . $LANG_PAGES_TOTAL_WEEK_T_4 . "</th>
				        </tr></thead>";

				    // get week numbers
					if ($WeekNumber->num_rows > 0) {
						while($row=mysqli_fetch_array($WeekNumber)){
							$week = $row['week'];
				      		//loop get all results
							$WeekHistory = mysqli_query($connect, "SELECT week(ts) as wk, id, sum(whtotal) as whtotal, AVG(avgtemp) as avgtemp FROM enecsys_report
				            WHERE id = 0 and year(ts) = $CurrentYear AND week(ts) = $week order by week(ts)");

				        	if ($WeekHistory->num_rows > 0) {
								while ($row = mysqli_fetch_array($WeekHistory)) {
									echo "<tbody><tr>";
									echo"<td class=''>" . $row['wk'] . "</td>";
									echo"<td class=''>All inverters</td>";
									echo"<td class=''>" . $row['whtotal'] . "</td>";
							 		
									if ($temp == 'Celcius') {
										$temperature = number_format((float)$row['avgtemp'], 1, '.', '') . " &#8451;";
									}
									else if ($temp = 'Farenheit'){
										$Convert = $row['avgtemp'];
										$NewTemp = ($Convert * 9/5) + 32;
										$temperature = number_format((float)$NewTemp, 1, '.', '') . " &#8457;";
									}
									echo"<td class=''>" . $temperature . "</td>";
									echo"</tr></tbody>";
								}
							}
						}
				    }
				    else {
				      // do nothing
				    }
				    echo"</table>";
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- footer content -->
<?php include ("../footer.php"); ?>
