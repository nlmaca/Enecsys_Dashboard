<?php
// page version: 2.0
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 60; URL=$url1");

require("../../inc/general_conf.inc.php");
if(empty($_SESSION['user'])) {
	header("Location: ../../index.php");
    die("Redirecting to ../../index.php"); 
}
    
include ("../../header.php"); 
include ('../../language/' . $language . '.inc.php'); 

//---------------------------------------------------------------
$connect = mysqli_connect($dbHost, $dbUserName, $dbUserPasswd, $dbName);
	if (!$connect) {
		die("Connection failed: " . mysqli_connect_error());
	}

//zet values op 0 om waarde opnieuw te berekenen in de loop
$sumPower= 0; 
$sumVDC = 0;	
$sumAmps = 0; 
$sumKwh = 0;
	
$output= mysqli_query($connect,"SELECT inverter_serial, panel_1, panel_2 FROM inverters");
if ($output->num_rows > 0) {
	while($row=mysqli_fetch_array($output)){
		$panel1 = $row['panel_1'];
		$panel2 = $row['panel_2'];
		
		// retreive every inverter from inverter table
		$inverter = $row['inverter_serial']; 
		
		$input = mysqli_query($connect,"SELECT ts, id, dcpower, state FROM enecsys WHERE id = $inverter ORDER BY ts DESC LIMIT 1");
		if ($input->num_rows > 0) {
			while ($row = mysqli_fetch_array($input)) {
				
				//define inverter
				$inverter = $row['id'];
				
				//retreive state for creating different backgrounds and icons			
				$status = $row['state'];
				
				//define dcpwower
				$dcPowah = $row['dcpower'];
				
				//convert datetime format to readable format
				$lastUpdate = date('d M Y H:i:s', strtotime($row['ts']));
				
				//set new date time for retreiving info from table on date based
				$dtime = new DateTime();
				$new_date = $dtime->format('Y-m-d');
				
				$CurInvPower = mysqli_query($connect,"select max(wh) as end, min(wh) as start from enecsys where ts like '%$new_date%' and id = $inverter");
				//test query
				//$CurInvPower = mysqli_query($connect,"select max(wh) as end, min(wh) as start from enecsys where ts like '%2015-10-15%' and id = $inverter");				
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
				if ($status == 0) { //sun (fa-smile-o)
					echo "<div class='col-md-3 col-sm-6'>
			        		<form name='inverter_overview' action='inverter_overview.php' method='POST'>
							<div class='widget widget-stats bg-blue'>
			            	<div class='stats-icon stats-icon-lg'><i class='fa fa-smile-o fa-fw'></i></div>
			            	<div class='stats-title'>
							<a href='overview_inverter.php?inv=$inverter' onclick='document.forms['inverter_overview'].submit();'><b>[?]</b></a>
							" . $LANG_INVERTER_SHORT . $inverter . " | " . $lastUpdate ."</div>
			            	<div class='stats-number'>" . $dcPowah . " Wh | ". $LANG_LIVE_STATE . $status . "</div>
			            	<div class='stats-progress progress'>
                            <div class='progress-bar' style='width: 100%;'></div>
                       		</div>
                        	<div class='stats-desc'>" . $LANG_LIVE_PANEL . $panel1 . " | ". $LANG_LIVE_PANEL . $panel2 . "</div>
							<!--<div class='stats-desc'>Begin: " . $valueStart . " W | Eind: " . $valueEnd . " W</div>-->
			        		<div class='stats-desc'>" .$LANG_LIVE_SOFAR . $valueCurrent . " W</div>
							</div>
			    			</div>";
				}
				else if ($status == 1) { //moon (fa-moon-o)
					echo "<div class='col-md-3 col-sm-6'>
			        		<div class='widget widget-stats bg-black'>
			            	<div class='stats-icon stats-icon-lg'><i class='fa fa-moon-o fa-fw'></i></div>
			            	<div class='stats-title'>
							<a href='overview_inverter.php?inv=$inverter' onclick='document.forms['inverter_overview'].submit();'><b>[?]</b></a>
							" . $inverter . " | " . $lastUpdate ."</div>
			            	<div class='stats-number'>" . $dcPowah . " Wh | ". $LANG_LIVE_STATE . $status . "</div>
			            	<div class='stats-progress progress'>
                            <div class='progress-bar' style='width: 100%;'></div>
                       		</div>
							<div class='stats-desc'>" . $LANG_LIVE_PANEL . $panel1 . " | ". $LANG_LIVE_PANEL . $panel2 . "</div>
                        	<!--<div class='stats-desc'>Begin: " . $valueStart . " W | Eind: " . $valueEnd . " W</div>-->
			        		<div class='stats-desc'>" .$LANG_LIVE_SOFAR . $valueCurrent . " W</div>
							</div>
			    			</div>";
				}
				else if ($status == 3) { //cloud (fa-cloud)
					echo "<div class='col-md-3 col-sm-6'>
			        		<div class='widget widget-stats bg-black'>
			            	<div class='stats-icon stats-icon-lg'><i class='fa fa-cloud fa-fw'></i></div>
			            	<div class='stats-title'>
							<a href='overview_inverter.php?inv=$inverter' onclick='document.forms['inverter_overview'].submit();'><b>[?]</b></a>
							" . $inverter . " | " . $lastUpdate ."</div>
			            	<div class='stats-number'>" . $dcPowah . " Wh | ". $LANG_LIVE_STATE . $status . "</div>
			            	<div class='stats-progress progress'>
                            <div class='progress-bar' style='width: 100%;'></div>
                       		</div>
							<div class='stats-desc'>" . $LANG_LIVE_PANEL . $panel1 . " | ". $LANG_LIVE_PANEL . $panel2 . "</div>
                        	<!--<div class='stats-desc'>Begin: " . $valueStart . " W | Eind: " . $valueEnd . " W</div>-->
			        		<div class='stats-desc'>" .$LANG_LIVE_SOFAR . $valueCurrent . " W</div>
							</div>
			    			</div>";
				}
				else { //(fa-sun-o)
					echo "<div class='col-md-3 col-sm-6'>
			        		<div class='widget widget-stats bg-black'>
			            	<div class='stats-icon stats-icon-lg'><i class='fa fa-sun-o fa-fw'></i></div>
			            	<div class='stats-title'>
							<a href='overview_inverter.php?inv=$inverter' onclick='document.forms['inverter_overview'].submit();'><b>[?]</b></a>
							" . $inverter . " | " . $lastUpdate ."</div>
			            	<div class='stats-number'>" . $dcPowah . " Wh | ". $LANG_LIVE_STATE . $status . "</div>
			            	<div class='stats-progress progress'>
                            <div class='progress-bar' style='width: 100%;'></div>
                       		</div>
                        	<div class='stats-desc'>" . $LANG_LIVE_PANEL . $panel1 . " | ". $LANG_LIVE_PANEL . $panel2 . "</div>
							<div class='stats-desc'>" .$LANG_LIVE_SOFAR . $valueCurrent . " W</div>
							</div>
			    			</div>";
				}
			}
		}
		// no data found at all from datenow
		else {
			echo "<div class='col-md-3 col-sm-6'>
			        		<div class='widget widget-stats bg-red'>
			            	<div class='stats-icon stats-icon-lg'><i class='fa fa-arrow-circle-down fa-fw'></i></div>
			            	<div class='stats-title'>
							" . $inverter . " | " . $lastUpdate ."</div>
			            	<div class='stats-number'>" . $LANG_LIVE_ERROR_NODATA . "</div>
			            	<div class='stats-progress progress'>
                            <div class='progress-bar' style='width: 100%;'></div>
                       		</div>
                        	<div class='stats-desc'>" . $LANG_LIVE_ERROR_NODATA_1 . "</div>
			        		</div>
			    			</div>";
		}
	}
}
else {
	echo $LANG_LIVE_ERROR_INV_EMPTY;
}	

mysqli_close($connect);

include("../../footer.php");
?>