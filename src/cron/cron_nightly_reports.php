<?php
	require("../include/config.php");
	/*
	process will run nightly. it will process daily data to the reports table for history usage
	there is always an overlap of 2 days to avoid losing data
	*/

	/* DEBUGGING
	See debug results? Change DEBUG variable
	$DEBUG = 0 / inactive
	$DEBUG = 1 / active
	
	*/
	//---------------------------------------------------------------
	//only allowed to run this script from commandline (cronjob)
	(PHP_SAPI !== 'cli' || isset($_SERVER['HTTP_USER_AGENT'])) && die('cli only - not possible to run from browser');

	//Want to see results on CLI? Set this variable to 1
	$DEBUG = 1;
		
	
	//this query will collect data from everything OLDER then today.
	$output = mysqli_query($connect,"SELECT DATE(ts) as CheckDate FROM enecsys WHERE ts < CURDATE() GROUP BY CheckDate ORDER BY CheckDate ASC");
	
	//if data is available in main enecsys table, loop through dates to insert data into history table
	if ($output->num_rows > 0) {
		
		while($row=mysqli_fetch_array($output)){
			// retreive every day from history table
			$NewDate = $row['CheckDate'];
			
			//echo "date: " . $NewDate . "<br>";
			$input = "INSERT INTO enecsys_report (ts, id, whstart, whend, whtotal, avgtemp)
			SELECT * FROM
				(select DATE(ts) as InsertDate, id, max(wh), min(wh), max(wh) - min(wh) as total, round(avg(temp),1) as avgTemp
				from enecsys where DATE(ts) = '$NewDate' group by id, DATE(ts)
			AS tmp
			WHERE NOT EXISTS (SELECT DATE(ts), id FROM enecsys_report WHERE DATE(ts) = '$NewDate')";

			$result = mysqli_query($connect, $input) or trigger_error ("Query failed. Error: " . mysqli_error($mysqli), E_USER_ERROR);
			$nrrows = mysqli_affected_rows($connect);

			if ($DEBUG == 1) {	
				if ($nrrows > 0 ) {
					echo "Date: " . $NewDate . " | " . $nrrows . " rows inserted into enecsys_report" . PHP_EOL;
				}
				else {
					echo "Date: " . $NewDate . " | Data present in enecsys_report" . PHP_EOL;
				}
			}
			else {
			 //show nothing
			}
		
		}
		
		//When while loop is finished and data is inserted into history table its time to cleanup the main table
		//First select dates that exists in report table. From there check if data is still available in main table. If yes, delete it.
		//only delete data that is older then 2 days, because if all data will be deleted, you will get an error in the dashboard about data is missing( older then 12 hours)
		$GetDate = mysqli_query($connect,"SELECT DATE(ts) AS DelDate FROM enecsys_report WHERE DATE(ts) < DATE_ADD((SELECT MAX(DATE(ts)) FROM enecsys_report), INTERVAL -2 DAY) GROUP BY DelDate DESC ");
		//$GetDate = mysqli_query($connect,"SELECT DATE(ts) as DelDate FROM enecsys_report GROUP BY DelDate ASC");
		if ($GetDate->num_rows > 0){
			while($row=mysqli_fetch_array($GetDate)){
				$DelDate = $row['DelDate'];
				//echo $DelDate;
				
				$DelQuery = "DELETE FROM enecsys where DATE(ts) = '$DelDate' ";

				$result2 = mysqli_query($connect, $DelQuery) or trigger_error ("Query failed. Error: " . mysqli_error($mysqli), E_USER_ERROR);
				$nrrows2 = mysqli_affected_rows($connect);
				
				if ($DEBUG == 1) {
					if ($nrrows2 > 0 ) {
						echo "Date: " . $DelDate . " | " . $nrrows2 . " deleted from table enecsys" . PHP_EOL;
					}
					else {
						//no echo
					}
				}
				else {
					//show nothing
				}
		
			}
		}
				
		else {
			echo PHP_EOL . "no data to be deleted" . PHP_EOL;
		}
		
		
		//extra delete check. Delete everything older then current day minus 5 days
		$DelQuery2 = "DELETE FROM enecsys where DATE(ts) < DATE_ADD((SELECT MAX(DATE(ts)) FROM enecsys_report), INTERVAL -5 DAY)";

		$result3 = mysqli_query($connect, $DelQuery2) or trigger_error ("Query failed. Error: " . mysqli_error($mysqli), E_USER_ERROR);
		$nrrows3 = mysqli_affected_rows($connect);
		
		if ($DEBUG == 1) {
			if ($nrrows3 > 0) {
				echo $nrrows3 . " records of Old data deleted from table enecsys" . PHP_EOL;
			}
			else {
				echo "Database is clean!" . PHP_EOL;
			}
		}
		else {
			//show nothing	
		}
	}

	else {
		// no data found at all from datenow
		echo PHP_EOL . "no data" . PHP_EOL;
	}

	mysqli_close($connect);
?>
