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

	$Temperature= mysqli_query($connect,"SELECT temperature from system_settings");
	if ($Temperature->num_rows > 0) {
		while($row=mysqli_fetch_assoc($Temperature)){
			$temp = $row['temperature'];
		}
	}

	//check if the starting row variable was passed in the URL or not
	if (!isset($_GET['startrow']) or !is_numeric($_GET['startrow'])) {
	  //we give the value of the starting row to 0 because nothing was found in URL
	  $startrow = 0;
	//otherwise we take the value from the URL
	} else {
	  $startrow = (int)$_GET['startrow'];
	}
	$mysqliDebug = true;

	$FetchInverter = "select * from enecsys_report where id = $Inverter order by ts desc LIMIT $startrow, 31";
	$result = $connect->query($FetchInverter);

	if (!$result and $mysqliDebug) {
	  // the query failed and debugging is enabled
	  echo "<p>" . $LANG_ERROR_INQUERY . $FetchInverter . "</p>";
	  echo $mysqli->error;
	}
	else if ($result) {
	  $num=mysqli_num_rows($result);
	  if($num>0) {
		echo "<table class='table table-striped responsive-utilities jambo_table bulk_action'>";
		echo "<thead><tr class='headings'>
			 <th class='column-title'>" . $LANG_CHART_TABLE_INVERTER_T_1 . "</th>
			 <th class='column-title'>" . $LANG_CHART_TABLE_INVERTER_T_2 . "</th>
			 <th class='column-title'>" . $LANG_CHART_TABLE_INVERTER_T_3 . "</th>
			 <th class='column-title'>" . $LANG_CHART_TABLE_INVERTER_T_4 . "</th>
			 <th class='column-title'>" . $LANG_CHART_TABLE_INVERTER_T_5 . "</th>
			 <th class='column-title'>" . $LANG_CHART_TABLE_INVERTER_T_6 . "</th>
			 </tr></thead>";
		for($i=0;$i<$num;$i++) {
			$row=mysqli_fetch_row($result);
			echo "<tbody><tr>";
			echo"<td class=''>$row[0]</td>";
			echo"<td class=''>$row[1]</td>";
			echo"<td class=''>$row[2]</td>";
			echo"<td class=''>$row[3]</td>";
			echo"<td class=''>$row[4]</td>";
			
			if ($temp == 'Celcius') {
				echo "<td class=''>" . number_format((float)$row[5], 1, '.', '') . " &#8451;</td>";	
			}
			else if ($temp = 'Farenheit'){
				$Convert = $row[5];
				$NewTemp = ($Convert * 9/5) + 32;
				$temperature = number_format((float)$NewTemp, 1, '.', '') . " &#8457;";
				echo "<td class=''>" . $temperature . " &#8451;</td>";	
			}
		
			echo"</tr></tbody>";
		}
		echo"</table>";
	  }
	}

?>
