<?php
	header("Content-type: text/json");
	require("../include/config.php");
	//check if session is valid for login
	if(empty($_SESSION['user'])) {
		header("Location: ". $DOCUMENT_ROOT . "/index.php");
		die("Redirecting to ". $DOCUMENT_ROOT . "/index.php");
	}
	$year = $_GET['day'];

	$arr 	= array();
	$arr1	= array();
	$result = array();

	//get results based on year from GET
	$query = mysqli_query($connect,"select id, whtotal from enecsys_report where ts like 'day' and id <> 0 group by id");
	$j = 0;
	while($row = mysqli_fetch_assoc($query)){
		//highcharts needs name, but only once, so give a IF condition
		if($j == 0) {
			$arr['name'] = 'id';
			$arr1['name'] = 'whtotal';
			$j++;
		}
		//data for id (inverter) and whtotal
		$arr['data'][] = $row['id'];
		$arr1['data'][] = $row['whtotal'];
	}

	//after get the data for month and whtotal, push both of them to an another array called result
	array_push($result,$arr);
	array_push($result,$arr1);

	//now create the json result using "json_encode"
	print json_encode($result, JSON_NUMERIC_CHECK);

	mysqli_close($connect);
?>
