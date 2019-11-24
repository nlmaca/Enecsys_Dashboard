<?php
	require("../include/init.php");
	include ("../header.php");
	//check if session is valid for login
	if(empty($_SESSION['user'])) {
		header("Location: ". $DOCUMENT_ROOT . "/index.php");
	    die("Redirecting to ". $DOCUMENT_ROOT . "/index.php");
	}
//zet values op 0 om waarde opnieuw te berekenen in de loop
$sumPower= 0;
$sumVDC = 0;
$sumAmps = 0;
$sumKwh = 0;

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
    <!-- top tiles -->
    <?php include ("../top_tiles.php"); ?>
    <!-- /top tiles -->
	<div class="row">
	<div class="col-md-12">
  	<div class="">
    <div class="x_content">
<?php


$Temperature= mysqli_query($connect,"SELECT temperature from system_settings");
if ($Temperature->num_rows > 0) {
	while($row=mysqli_fetch_assoc($Temperature)){
		$temp = $row['temperature'];
	}
}
// get inverter serial
$output= mysqli_query($connect,"SELECT inverter_serial, inverter_alias FROM inverters");
if ($output->num_rows > 0) {
	while($row=mysqli_fetch_array($output)){
		$inverter_alias = $row['inverter_alias'];

		// retreive every inverter from inverter table
		$inverter = $row['inverter_serial'];

		//loop
		$input = mysqli_query($connect,"SELECT ts, id, dcpower, state, temp FROM enecsys WHERE id = $inverter ORDER BY ts DESC LIMIT 1");
		if ($input->num_rows > 0) {
			while ($row = mysqli_fetch_array($input)) {
				//define inverter
				$inverter = $row['id'];
				$temperature = $row['temp'] . " &#8451;";
				//check if value is set to Celcius or Farenheit
				if ($temp == 'Celcius') {
					$temperature = number_format((float)$row['temp'], 1, '.', '') . " &#8451;";
				}
				else if ($temp = 'Farenheit'){
					$Convert = $row['temp'];
					$NewTemp = ($Convert * 9/5) + 32;
					$temperature = number_format((float)$NewTemp, 1, '.', '') . " &#8457;";
				}


				//retreive state for creating different backgrounds and icons
				$status = $row['state'];
				//define dcpwower
				$dcPowah = $row['dcpower'];
				//convert datetime format to readable format
				$lastValue = date('d M Y H:i:s', strtotime($row['ts']));
				//set new date time for retreiving info from table on date based
				$dtime = new DateTime();
				$new_date = $dtime->format('Y-m-d');

				$CurInvPower = mysqli_query($connect,"select max(wh) - min(wh) as totalday, max(wh) as end, min(wh) as start from enecsys where date(ts) = '$new_date' and id = $inverter");
				if ($CurInvPower->num_rows > 0 ) {
					while ($row = mysqli_fetch_array($CurInvPower)) {
						if ($row['end'] == '') {
							$valueCurrent = $row['end'] - $row['start'];
							$valueStart = $row['start'] /1000;
							$valueEnd = $row['end'] / 1000;
							$totalToday = $row['totalday'] . " W";
						}
						else {
							$valueCurrent = $row['end'] - $row['start'];
							$valueStart = $row['start'] /1000;
							$valueEnd = $row['end'] /1000;
							$totalToday = $row['totalday'] . " W";
						}
					}
				}

				if(strtotime($lastValue) < strtotime('-1 hour')){
						$lastUpdate = "<span class='count_bottom'>" . $LANG_PAGES_WIDGET_LASTDATA . " <i class='red'>" . $lastValue . "</i></span>";
				}
				else {
					$lastUpdate = "<span class='count_bottom'>" . $LANG_PAGES_WIDGET_LASTDATA . " <i class='green'>" . $lastValue . "</i></span>";
				}

				if ($status == 0) { //sunny
					echo "<div class='animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12'>
						<div class='tile-stats'>
				  		<div class='icon'>
						<i class='fa fa-smile-o fa-fw'></i>
						</div>
						<div class='count'>" . $dcPowah . " W</div>
						<h3>". $inverter . "</h3>
						<p>" . $LANG_PAGES_WIDGET_TODAY . $totalToday . "</p>
						<p>" . $LANG_PAGES_WIDGET_ALIAS . $inverter_alias . "</p>
						<p>" . $LANG_PAGES_WIDGET_TEMP . $temperature ." </p>
						<p>" . $lastUpdate ."</p>
						</div>
						</div>";
				}
				else if ($status == 1) { //moon
					echo "<div class='animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12'>
				    	<div class='tile-stats'>
				      	<div class='icon'>
						<i class='fa fa-moon-o fa-fw'></i>
				        </div>
				        <div class='count'>" . $dcPowah . " W</div>
				        <h3>". $inverter . "</h3>
						<p>" . $LANG_PAGES_WIDGET_TODAY . $totalToday . "</p>
						<p>" . $LANG_PAGES_WIDGET_ALIAS . $inverter_alias . "</p>
						<p>" . $LANG_PAGES_WIDGET_TEMP . $temperature ." </p>
						<p>" . $lastUpdate ."</p>
						</div>
						</div>";
				}
				else if ($status == 3) { //cloudy
					echo "<div class='animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12'>
						<div class='tile-stats'>
						<div class='icon'>
						<i class='fa fa-cloud fa-fw'></i>
						</div>
						<div class='count'>" . $dcPowah . " W</div>
						<h3>". $inverter . "</h3>
						<p>" . $LANG_PAGES_WIDGET_TODAY . $totalToday . "</p>
						<p>" . $LANG_PAGES_WIDGET_ALIAS . $inverter_alias . "</p>
						<p>" . $LANG_PAGES_WIDGET_TEMP . $temperature ." </p>
						<p>" . $lastUpdate ."</p>
						</div>
					</div>";
				}
				else { //sun other state
					echo "<div class='animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12'>
						<div class='tile-stats'>
						<div class='icon'>
						<i class='fa fa-sun-o fa-fw'></i>
						</div>
						<div class='count'>" . $dcPowah . " W</div>
						<h3>". $inverter . "</h3>
						<p>" . $LANG_PAGES_WIDGET_TODAY . $totalToday . "</p>
						<p>" . $LANG_PAGES_WIDGET_ALIAS . $inverter_alias . "</p>
						<p>" . $LANG_PAGES_WIDGET_TEMP . $temperature ." </p>
						<p>" . $lastUpdate ."</p>
						</div>
						</div>";
				}
			}
		}
		// no data found at all from datenow
		else {
			echo "<div class='animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12'>
				<div class='tile-stats'>
				<div class='icon'>
				<i class='fa fa-exclamation-triangle' style='color:red;'></i>
				</div>
				<div class='count'>" . $LANG_LIVE_ERROR_NODATA . "</div>
				<h3>". $inverter . "</h3>" . $LANG_PAGES_WIDGET_ERROR . "
				</div>
				</div>";
		}
	}
}
else {
	echo $LANG_LIVE_ERROR_INV_EMPTY;
}
?>
</div>
</div>
</div>
</div>

<?php include ("../footer.php"); ?>
