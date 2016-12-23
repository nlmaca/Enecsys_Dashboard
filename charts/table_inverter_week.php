<?php
	header("Content-type: text/json");
	require("../include/init.php");
	//check if session is valid for login
	if(empty($_SESSION['user'])) {
		header("Location: ". $DOCUMENT_ROOT . "/index.php");
		die("Redirecting to ". $DOCUMENT_ROOT . "/index.php");
	}
	//get inverter from post
	$Inverter = intval($_GET['inv']);
	$CurrentYear = date("Y");

	$Temperature= mysqli_query($connect,"SELECT temperature from system_settings");
	if ($Temperature->num_rows > 0) {
		while($row=mysqli_fetch_assoc($Temperature)){
			$temp = $row['temperature'];
		}
	}

	echo "<table class='table table-striped responsive-utilities jambo_table bulk_action'>";
	echo "<thead><tr class='headings'>
		  <th class='column-title'>" . $LANG_CHART_TABLE_INVERTER_W_T_1 . "</th>
		  <th class='column-title'>" . $LANG_CHART_TABLE_INVERTER_W_T_2 . "</th>
		  <th class='column-title'>" . $LANG_CHART_TABLE_INVERTER_W_T_3 . "</th>
		  <th class='column-title'>" . $LANG_CHART_TABLE_INVERTER_W_T_4 . "</th>
		  </tr></thead>";

	// get week numbers
	$WeekNumber= mysqli_query($connect,"SELECT week(ts) AS week FROM enecsys_report WHERE year(ts) = $CurrentYear AND week(ts) <> 0 GROUP BY week(ts) desc");
	if ($WeekNumber->num_rows > 0) {
		while($row=mysqli_fetch_array($WeekNumber)){
			$week = $row['week'];

			//loop get all results
		$WeekHistory = mysqli_query($connect, "SELECT week(ts) as wk, id, sum(whtotal) as whtotal, AVG(avgtemp) as avgtemp FROM enecsys_report
					  WHERE id = $Inverter and year(ts) = $CurrentYear AND week(ts) = $week order by week(ts)");

		if ($WeekHistory->num_rows > 0) {
				while ($row = mysqli_fetch_array($WeekHistory)) {
			echo "<tbody><tr>";
			echo"<td class=''>" . $row['wk'] . "</td>";
			echo"<td class=''>" . $row['id'] . "</td>";
			echo"<td class=''>" . $row['whtotal'] . "</td>";

			if ($temp == 'Celcius') {
				$temperature = number_format((float)$row['avgtemp'], 1, '.', '') . " &#8451;";
			}
			else if ($temp = 'Farenheit'){
				$Convert = $row['avgtemp'];
				$NewTemp = ($Convert * 9/5) + 32;
				$temperature = number_format((float)$NewTemp, 1, '.', '') . " &#8457;";
			}

			echo "<td class=''>" . $temperature . "</td>";
			echo"</tr></tbody>";
		  }
		}
	  }
	}
	echo"</table>";
?>
