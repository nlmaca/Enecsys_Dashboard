<?php
	require("../include/config.php");
	/*
	process will run nightly. it will process daily data to the reports table for history usage
	there is always an overlap of 2 days to avoid losing data
	*/

	//---------------------------------------------------------------
	//only allowed to run this script from commandline (cronjob)
	(PHP_SAPI !== 'cli' || isset($_SERVER['HTTP_USER_AGENT'])) && die('cli only - not possible to run from browser');

	//this query will collect data from everything OLDER then today.
	$output = mysqli_query($connect,"SELECT DATE_FORMAT( ts, '%Y-%m-%d' ) AS Date FROM enecsys WHERE ts < CURDATE() GROUP BY DATE ORDER BY `Date` DESC");
	//if data is available in main enecsys table
	if ($output->num_rows > 0) {
		while($row=mysqli_fetch_array($output)){
			// retreive every day from history table
			$NewDate = $row['Date'];
			//echo "date: " . $NewDate . "<br>";
			$input = "INSERT INTO enecsys_report (ts, id, whstart, whend, whtotal, avgtemp)
			SELECT * FROM
				(select date_format(ts, '%Y-%m-%d') as Date, id, max(wh), min(wh), max(wh) - min(wh) as total, round(avg(temp),1) as avgTemp
				from enecsys where ts like '%$NewDate%' group by id)
			AS tmp
			WHERE NOT EXISTS (SELECT ts, id FROM enecsys_report WHERE ts like '%$NewDate%')";

			$result = mysqli_query($connect, $input) or trigger_error ("Query failed. Error: " . mysqli_error($mysqli), E_USER_ERROR);
			$nrrows = mysqli_affected_rows($connect);
		}

		//only start deleting if above query inserted more than 0 rows. Cause, in normal situations there should always be data to insert.
		if ($nrrows > 0) {
			//after this delete old data from the main table to keep it clean.
			$output2 = "select ts from enecsys where ts < NOW() - INTERVAL 3 DAY";

			$result2 = mysqli_query($connect, $output2) or trigger_error ("Query failed. Error: " . mysqli_error($mysqli), E_USER_ERROR);
			//if there is data to be deleted start cleaning it
			if ($result2->num_rows > 0) {
				while($row=mysqli_fetch_array($result2)){
					$Clean = mysqli_query($connect,"DELETE FROM enecsys WHERE ts < NOW() - INTERVAL 3 DAY");
				}
			}
			else {
				echo "no data found to be deleted from main table";
				// no data found at all. do nothing. proces done
			}
		}
		else if ($nrrows == 0) {
		//no data to insert into reports table. stop process. there always should be data.
		//only when data is inserted into reports table old data will be deleted.
		}
	}

	else {
		// no data found at all from datenow
		echo "no data";
	}

	mysqli_close($connect);
?>
