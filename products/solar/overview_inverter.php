<?php
// page version: 2.0
require("../../inc/general_conf.inc.php");
if(empty($_SESSION['user'])) {
	header("Location: ../../index.php");
    die("Redirecting to ../../index.php"); 
}

include ("../../header.php"); 
include ('../../language/' . $language . '.inc.php'); 

//retrieve inverter from link
$inverter = htmlspecialchars($_GET['inv']);

$connect = mysqli_connect($dbHost, $dbUserName, $dbUserPasswd, $dbName);
if (!$connect) {
	die("Connection failed: " . mysqli_connect_error());
}

$inv = htmlspecialchars($_GET['inv']);
//set values to 0 for calculation within the loop
$sumPower= 0; 
$sumVDC = 0;	
$sumAmps = 0; 
$sumKwh = 0;

$output= mysqli_query($connect,"select i.panel_1, i.panel_2, e.ts, e.id, e.wh, e.dcpower, e.dccurrent, e.efficiency, e.acfreq, e.acvolt, e.temp, e.state 
	from inverters as i
	left join enecsys as e
	on i.inverter_serial = e.id
	where i.inverter_serial = $inv
	order by e.ts desc limit 1");

if ($output->num_rows > 0) {
	while($row=mysqli_fetch_array($output)){
		//$inverter = $row['inverter_serial'];
		$panel1 = $row['panel_1'];
		$panel2 = $row['panel_2']; 
		$lastUpdate = date('d M Y H:i:s', strtotime($row['ts']));
		$acfreq = $row['acfreq'];
		$acvolt = $row['acvolt'];
		$temperature = $row['temp'];
		$efficiency = $row['efficiency'];
		$status = $row['state'];
				
		//calculate DCVolt 
		$dcvolt = $row['dcpower'] / $row['dccurrent'];
		$accurrent = $row['dcpower'] / $row['acvolt'];
			
		/* SUM calculate for result for all inverters*/
		// calculate sum dc power (total)
		$sump_value = $row['dcpower'];
		$sumPower += $sump_value;  // echo $sumPower; voor total result per inverter from result
				
		$sumv_value = $row['dcpower'] / $row['dccurrent'];
		$sumVDC += $sumv_value;  // echo $sumVDC; voor total result per inverter from result
		//calculate sum dccurrent (total)
		$suma_value = $row['dccurrent'];
		$sumAmps += $suma_value;  // total Amps
				
		//calculate sum kWh (total)
		$sumk_value = $row['wh'] / 1000;
		$sumKwh += $sumk_value;  // echo $sumKwh; 
				
		// get date now to pull results from today
		
		// get current datetime and convert to only date
		$dtime = new DateTime();
		$new_date = $dtime->format('Y-m-d');
		
		//retreive information based on current date
		$CurInvPower = mysqli_query($connect,"select max(wh) as end, min(wh) as start from enecsys where ts like '%$new_date%' and id = $inv");
		//test query
		//$CurInvPower = mysqli_query($connect,"select max(wh) as end, min(wh) as start from enecsys where ts like '%2015-10-15%' and id = $inv");				
		if ($CurInvPower->num_rows > 0 ) {
			while ($row = mysqli_fetch_array($CurInvPower)) {
				if ($row['end'] == '') {
					$valueCurrent = $row['end'] - $row['start'];
					$valueStart = $row['start'] /1000;
					$valueEnd = $row['end'] / 1000; 
				}
				else {
					$valueCurrent = $row['end'] - $row['start'];
					$valueStart = $row['start'] /1000;
					$valueEnd = $row['end'] /1000; 
				}
			}
		}
		
	}
	echo "<div class='panel panel-default'>";
	echo "<div class='panel-heading'>" . $LANG_INVERTER_INFO . $inv . "</div>";
	echo "<table class='table table-bordered table-hover'>";
	echo "<tr><td>" . $LANG_INVERTER . "</td><td>" . $inv . "</td></tr>";
	echo "<tr><td>" . $LANG_LIVE_LAST_UPDATE . "</td><td>" . $lastUpdate . "</td></tr>";
	echo "<tr><td>" . $LANG_LIVE_POWER . "</td><td>" . $sump_value . "</td></tr>";
	echo "<tr><td>" . $LANG_LIVE_DC_CURRENT . "</td><td>" . $suma_value . "</td></tr>";
	echo "<tr><td>" . $LANG_LIVE_AC_CURRENT . "</td><td>" . number_format($sump_value,2) . "</td></tr>";
	echo "<tr><td>" . $LANG_LIVE_AC_FREQ . "</td><td>" . $acfreq . "</td></tr>";
	echo "<tr><td>" . $LANG_LIVE_DC_VOLT . "</td><td>" . number_format($dcvolt,2) . "</td></tr>";
	echo "<tr><td>" . $LANG_LIVE_AC_VOLT . "</td><td>" . $acvolt . "</td></tr>";
	echo "<tr><td>" . $LANG_LIVE_TEMP . "</td><td>" . $temperature . " &#8451;</td></tr>";
	echo "<tr><td>" . $LANG_LIVE_EFF . "</td><td>" . $efficiency . "</td></tr>";
	echo "<tr><td>" . $LANG_LIVE_SOLAR_STATE . "</td><td>" . $status . "</td></tr>";
	echo "<tr><td>" . $LANG_LIVE_KWH . "</td><td>" . $sumk_value . "</td></tr>";
	echo "<tr><td>" . $LANG_LIVE_START_VALUE . "</td><td>" . $valueStart . "</td></tr>";
	echo "<tr><td>" . $LANG_LIVE_END_VALUE ."</td><td>" . $valueEnd . "</td></tr>";
	echo "<tr><td>" . $LANG_LIVE_CURRENT . "</td><td>" . $valueCurrent . "</td></tr>";
	echo "<tr><td>" . $LANG_LIVE_PANEL_1 . "</td><td>" . $panel1 . "</td></tr>";
	echo "<tr><td>" . $LANG_LIVE_PANEL_1 . "</td><td>" . $panel2 . "</td></tr>";
	echo "</table></div>";
}
else {
	echo $LANG_ERROR_NDF;
}	

echo "<a href='overview.php'class='btn btn-info'>". $LANG_BUTTON_BACK_OVERVIEW . "</a>";
mysqli_close($connect);

include ("../../footer.php");
?>
