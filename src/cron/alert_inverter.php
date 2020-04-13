<?php
	require("../include/config.php");

	//only allowed to run this script from commandline (cronjob)
	(PHP_SAPI !== 'cli' || isset($_SERVER['HTTP_USER_AGENT'])) && die('cli only - not possible to run from browser');

	// define a variable to switch on/off error messages
	$mysqliDebug = true;
	$checkDate = date("Y-m-d H:i:s");

	$InverterCheck = mysqli_query($connect,"SELECT inverter_serial FROM inverters WHERE NOT EXISTS
	(SELECT * FROM enecsys WHERE inverters.inverter_serial = enecsys.id and ts < DATE_SUB(NOW(), INTERVAL 12 HOUR))");

	if ($InverterCheck->num_rows == 0) {
	// no alerts. table can be cleaned of faulty inverters
		//echo "NO errors found: <br />";

		$InvAlertDelete = "DELETE from alerts where device = 'Inverter' ";

		$result = $connect->query($InvAlertDelete);
		if (!$result and $mysqliDebug) {
			// the query failed and debugging is enabled
			echo "<p>" . $LANG_ERROR_INQUERY . $InvAlertDelete . "</p>";
			echo $mysqli->error;
		}
		else if ($result) {
			//table should be cleaned
		}
	}

	elseif ($InverterCheck->num_rows > 0) {
		//first truncate old alerts
		$InvAlertClean = "DELETE from alerts where device = 'Inverter' ";
		$result = $connect->query($InvAlertClean);
		if (!$result and $mysqliDebug) {
			// the query failed and debugging is enabled
			echo "<p>" . $LANG_ERROR_INQUERY . $InvAlertClean . "</p>";
			echo $mysqli->error;
		}
		else if ($result) {
			//table should be cleaned
		}
		while($row=mysqli_fetch_array($InverterCheck)){
			echo "errors found: " . $row['inverter_serial'] . "<br />";
			$IdError = $row['inverter_serial'];
			$InvAlertInsert = "INSERT INTO alerts (device, note_short, img_url, status, last_check)
			VALUES ('Inverter', 'Inverter: $IdError has no data from the last 12 hours', '../img/img-inverter.png', 9, '". $checkDate . "' )";

			$result = $connect->query($InvAlertInsert);
			if (!$result and $mysqliDebug) {
				// the query failed and debugging is enabled
				echo "<p>" . $LANG_ERROR_INQUERY . $InvAlertInsert . "</p>";
				echo $mysqli->error;
			}
			else if ($result) {
			//table should be filled
			}
		}
	}
?>
