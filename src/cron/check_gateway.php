<?php
	require("../include/config.php");

	//only allowed to run this script from commandline (cronjob)
	(PHP_SAPI !== 'cli' || isset($_SERVER['HTTP_USER_AGENT'])) && die('cli only - not possible to run from browser');

	// define a variable to switch on/off error messages
	$mysqliDebug = true;
	$checkDate = date("Y-m-d H:i:s");

	$GatewayCheck = mysqli_query($connect,"select gateway_ip from system_settings");
	if ($GatewayCheck->num_rows > 0) {
		while($row=mysqli_fetch_array($GatewayCheck)){
			$GatewayHost = $row['gateway_ip'];
		}
	}
	//if default setting has not changed
	if ($GatewayHost == '0.0.0.0' || $GatewayHost == '127.0.0.1'){
		$sql = "UPDATE alerts SET
		status = 9,
		last_check = '". $checkDate . "'
		where alert_id = 3";

		$result = $connect->query($sql);
		if (!$result and $mysqliDebug) {
			// the query failed and debugging is enabled
			echo "<p>" . $LANG_ERROR_INQUERY . $sql . "</p>";
			echo $mysqli->error;
		}
	}
	//else update alert 3: ipadress ok
	else {
		$sql = "UPDATE alerts SET
		status = 0,
		last_check = '". $checkDate . "'
		where alert_id = 3";

		$result = $connect->query($sql);
		if (!$result and $mysqliDebug) {
			// the query failed and debugging is enabled
			echo "<p>" . $LANG_ERROR_INQUERY . $sql . "</p>";
			echo $mysqli->error;
		}
	}

	//go on in actually checking the state of the gateway
	//execute shell command. 4 tries of pinging ip adress
	exec("ping -c 4 " . $GatewayHost, $output, $return_value);

	if ($return_value == 0) {
		//echo "Ping successful!";
		//update alerts table. Set gateway notice on value 0: success state
		$sql = "UPDATE alerts SET
		status = 0,
		last_check = '". $checkDate . "'
		where alert_id = 2";

		$result = $connect->query($sql);
		if (!$result and $mysqliDebug) {
			// the query failed and debugging is enabled
			echo "<p>" . $LANG_ERROR_INQUERY . $sql . "</p>";
			echo $mysqli->error;
		}
	}
	else {
		//echo "Ping unsuccessful!";
		//update alerts table. Set gateway notice on value 9: alert state
		$sql = "UPDATE alerts SET
		status = 9,
		last_check = '". $checkDate . "'
		where alert_id = 2";

		$result = $connect->query($sql);
		if (!$result and $mysqliDebug) {
			// the query failed and debugging is enabled
			echo "<p>" . $LANG_ERROR_INQUERY . $sql . "</p>";
			echo $mysqli->error;
		}
	}
?>
