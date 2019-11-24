<?php
	header("Content-type: text/json");
	require("../include/config.php");
	//check if session is valid for login
	if(empty($_SESSION['user'])) {
		header("Location: ". $DOCUMENT_ROOT . "/index.php");
		die("Redirecting to ". $DOCUMENT_ROOT . "/index.php");
	}
	$inverter = $_GET['id'];
	$arr 	= array();
	$arr1	= array();
	$result = array();

	$query = mysqli_query($connect, "select date_format(ts,'%H:%i')as ts, dcpower as power from enecsys where id = $inverter and date(ts) = curdate() order by ts asc");
	//test query:
	//$query = mysqli_query($connect, "select date_format(ts,'%H:%i:%s')as ts, dcpower from enecsys where id = 110064950 and date(ts) like '%2016-06-28%' order by ts asc");

	$j = 0;
	while($row = mysqli_fetch_assoc($query)){
		//highcharts needs name, but only once, so give a IF condition
		if($j == 0) {
			$arr['name'] = 'ts';
			$arr1['name'] = 'power';
			$j++;
		}
		//data for id (inverter) and whtotal
		$arr['data'][] = $row['ts'];
		$arr1['data'][] = $row['power'];
	}

	//after get the data for month and whtotal, push both of them to an another array called result
	array_push($result,$arr);
	array_push($result,$arr1);

	//now create the json result using "json_encode"
	print json_encode($result, JSON_NUMERIC_CHECK);

	mysqli_close($connect);
?>
