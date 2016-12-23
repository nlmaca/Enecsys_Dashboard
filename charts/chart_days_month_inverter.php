<?php
	header("Content-type: text/json");
	require("../include/config.php");
	//check if session is valid for login
	if(empty($_SESSION['user'])) {
		header("Location: ". $DOCUMENT_ROOT . "/index.php");
		die("Redirecting to ". $DOCUMENT_ROOT . "/index.php");
	}
	$inverter = $_GET['id'];
	//$month = $_GET['month'];
	//$year = $_GET['year'];

	$getCurrentMonth = date("m");
	//echo $getCurrentMonth;

	$getCurrentYear = date("Y");

	$arr 	= array();
	$arr1	= array();
	$result = array();

	//get results based on year from GET
	$query = mysqli_query($connect,"select date_format(ts, '%d-%m') as day, sum(whtotal) as power from enecsys_report
		where date_format(ts, '%m') = $getCurrentMonth and year(ts) = $getCurrentYear and id = $inverter group by day(ts)");
	$j = 0;
	while($row = mysqli_fetch_assoc($query)){
		//highcharts needs name, but only once, so give a IF condition
		if($j == 0) {
			$arr['name'] = 'day';
			$arr1['name'] = 'power';
			$j++;
		}
		//data for month and whtotal
		$arr['data'][] = $row['day'];
		$arr1['data'][] = $row['power'];
	}

	//after get the data for month and kWh, push both of them to an another array called result
	array_push($result,$arr);
	array_push($result,$arr1);

	//now create the json result using "json_encode"
	print json_encode($result, JSON_NUMERIC_CHECK);

	mysqli_close($connect);
?>
