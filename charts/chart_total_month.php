<?php
	header("Content-type: text/json");
	require("../include/config.php");
	//check if session is valid for login
	if(empty($_SESSION['user'])) {
		header("Location: ". $DOCUMENT_ROOT . "/index.php");
		die("Redirecting to ". $DOCUMENT_ROOT . "/index.php");
	}
	$year = $_GET['year'];
	//$year = 2016;

	$arr 	= array();
	$arr1	= array();
	$result = array();

	//get results based on year from GET
	$query = mysqli_query($connect,"SELECT date_format(ts, '%b') as month, sum(whtotal) / 1000 as kWh from enecsys_report where id = 0 and year(ts) = $year group by DATE_FORMAT(ts, '%m-%Y')");
	$j = 0;
	while($row = mysqli_fetch_assoc($query)){
		//highcharts needs name, but only once, so give a IF condition
		if($j == 0) {
			$arr['name'] = 'month';
			$arr1['name'] = 'kWh';
			$j++;
		}
		//data for month and kWh
		$arr['data'][] = $row['month'];
		$arr1['data'][] = $row['kWh'];
	}

	//after get the data for month and kWh, push both of them to an another array called result
	array_push($result,$arr);
	array_push($result,$arr1);

	//now create the json result using "json_encode"
	print json_encode($result, JSON_NUMERIC_CHECK);

	mysqli_close($connect);
?>
