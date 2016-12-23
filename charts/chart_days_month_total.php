<?php
	header("Content-type: text/json");
	require("../include/config.php");
	//check if session is valid for login
	if(empty($_SESSION['user'])) {
		header("Location: ". $DOCUMENT_ROOT . "/index.php");
		die("Redirecting to ". $DOCUMENT_ROOT . "/index.php");
	}
	$month = $_GET['month'];
	//$year = 2016;

	$arr 	= array();
	$arr1	= array();
	$result = array();

	//get results based on year from GET
	$query = mysqli_query($connect,"select date_format(ts, '%d-%m') as day, sum(whtotal) as kWh from enecsys_report where date_format(ts, '%m') = $month and year(ts) = 2016 and id = 0 group by day(ts)");
	$j = 0;
	while($row = mysqli_fetch_assoc($query)){
		//highcharts needs name, but only once, so give a IF condition
		if($j == 0) {
			$arr['name'] = 'day';
			$arr1['name'] = 'kWh';
			$j++;
		}
		//data for month and whtotal
		$arr['data'][] = $row['day'];
		$arr1['data'][] = $row['kWh'];
	}

	//after get the data for month and kWh, push both of them to an another array called result
	array_push($result,$arr);
	array_push($result,$arr1);

	//now create the json result using "json_encode"
	print json_encode($result, JSON_NUMERIC_CHECK);

	mysqli_close($connect);
?>
