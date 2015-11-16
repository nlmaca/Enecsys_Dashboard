<?php
// page version: 2.0
require("../../inc/general_conf.inc.php");
if(empty($_SESSION['user'])) {
	header("Location: ". $DOCUMENT_ROOT . "/index.php");
    die("Redirecting to ". $DOCUMENT_ROOT . "/index.php"); 
}

include ("../../header.php");
include ('../../language/' . $language . '.inc.php'); 

$option = htmlspecialchars($_POST['selectOption']);
$startDate = htmlspecialchars($_POST['fromdate']);
$endDate = htmlspecialchars($_POST['todate']);
$inverter = htmlspecialchars($_POST['inverter']);

// Create connection
$connect = mysqli_connect($dbHost, $dbUserName, $dbUserPasswd, $dbName);
// Check connection
if (!$connect) {
	die("Connection failed: " . mysqli_connect_error());
}	

//check if inverter is selected
if ($inverter == '#') {
	echo "<div class='panel panel-default'>";
	echo "<div class='panel-heading'><a href='index.php'class='btn btn-info btn-xs'>". $LANG_BUTTON_BACK_OVERVIEW . "</a></div>";
	echo "<table class='table table-bordered table-hover'>";
	echo "<tr><td>". $LANG_NO_INV_SELECTED . "</tr>";
	echo "</table></div>";
}
// TOTAL WH
//get results by hour and for that day if start and en date are equal
else if ($option == 'totalWH' and $inverter != '#' and $startDate == $endDate ) {
	$output= mysqli_query($connect,"SELECT ts as datetime, 
	MAX(wh) AS last_wh, 
	MIN(wh) AS start_wh, 
	MAX(wh) - MIN(wh) AS total_wh,
	truncate(avg(temp),2) as avg_temp
	FROM enecsys_history
	WHERE DATE(ts) = '$startDate'
	AND id = $inverter	
	GROUP BY hour(ts) asc");
	
	echo "<div class='panel panel-default'>";
	echo "<div class='panel-heading'>" . $LANG_WH_DAY_HR . $startDate . " | " . $LANG_FROMDATE . $startDate . $LANG_TODATE . $endDate . 
		" | <a href='index.php'class='btn btn-info btn-xs'>". $LANG_BUTTON_BACK_OVERVIEW . "</a></div>";
	echo "<table class='table table-bordered table-hover'>";
	echo "<tr><td><b>". $LANG_INVERTER . "</b></td><td><b>" . $LANG_HOUR . "</b></td><td><b>". $LANG_END_VALUE . "</b></td><td><b>". $LANG_START_VALUE . "</b></td>
	<td><b>". $LANG_TOTAL_WH . "</b></td><td><b>". $LANG_AVG_TEMP . "</b></td></tr>";
	
	while($row=mysqli_fetch_array($output)){
		echo "<tr>";
        echo "<td>" . $inverter . "</td>";
		echo "<td>" . $row['datetime'] .  "</td>";
        echo "<td>" . $row['last_wh'] .  "</td>";
		echo "<td>" . $row['start_wh'] .  "</td>";
		echo "<td>" . $row['total_wh'] .  "</td>";
		echo "<td>" . $row['avg_temp'] .  "</td>";
		Echo "</tr>";
	}
	echo "</table></div>";
}


//option select = total_wh and inverter is selected
else if ($option == 'totalWH' and $inverter != '#' and $startDate != $endDate ) {
	$output= mysqli_query($connect,"select dayofyear(ts) as yearday, 
	DAY(ts) as day, 
	dayname(ts),
	MONTHNAME(ts) as month,
	YEAR(ts) as year,
	MAX(wh) as end_wh, 
	MIN(wh) as start_wh, 
	MAX(wh) - MIN(wh) as total_wh,
	truncate(avg(temp),2) as avg_temp
	FROM enecsys_history
	WHERE DATE(ts) 
	BETWEEN  '$startDate'
	AND  '$endDate'
	AND id = $inverter
	GROUP BY DAYOFYEAR(ts) asc");
	
	echo "<div class='panel panel-default'>";
	echo "<div class='panel-heading'>" . $LANG_WH_DAY . " | " . $LANG_FROM . $startDate . $LANG_TO . $endDate . 
		" | <a href='index.php'class='btn btn-info btn-xs'>". $LANG_BUTTON_BACK_OVERVIEW . "</a></div>";
	echo "<table class='table table-bordered table-hover'>";
	echo "<tr><td><b>". $LANG_INVERTER . "</b></td><td><b>". $LANG_YEARDAY . "</b></td><td><b>". $LANG_DAY . "</b></td><td><b>". $LANG_MONTH . "</b></td><td><b>". $LANG_YEAR . "</b></td>
	<td><b>". $LANG_START_VALUE . "</b></td><td><b>". $LANG_END_VALUE . "</b></td><td><b>". $LANG_TOTAL_WH . "</b></td><td><b>". $LANG_AVG_TEMP . "</b></td></tr>";
	
	while($row=mysqli_fetch_array($output)){
		echo "<tr>";
        echo "<td>" . $inverter . "</td>";
		echo "<td>" . $row['yearday'] .  "</td>";
        echo "<td>" . $row['day'] .  "</td>";
		echo "<td>" . $row['month'] .  "</td>";
		echo "<td>" . $row['year'] .  "</td>";
		echo "<td>" . $row['start_wh'] .  "</td>";
		echo "<td>" . $row['end_wh'] .  "</td>";
		echo "<td>" . $row['total_wh'] .  "</td>";
		echo "<td>" . $row['avg_temp'] .  "</td>";
		echo "</tr>";
	}
	echo "</table></div>";
}

//else if no data has been found
else {
	echo $LANG_ERROR_NDF;
}

mysqli_close($connect);
echo "</div>";
echo "<a href='index.php'class='btn btn-info btn-xs'>". $LANG_BUTTON_BACK_OVERVIEW . "</a><br><br>";

include ("../../footer.php");
?>