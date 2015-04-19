<?php
/*
 * Copyright (c) 2015 Jeroen van Marion <jeroen@vanmarion.nl>
 *
 * Permission to use, copy, modify, and distribute this software for any
 * purpose with or without fee is hereby granted, provided that the above
 * copyright notice and this permission notice appear in all copies.
 *
 * THE SOFTWARE IS PROVIDED "AS IS" AND THE AUTHOR DISCLAIMS ALL WARRANTIES
 * WITH REGARD TO THIS SOFTWARE INCLUDING ALL IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR
 * ANY SPECIAL, DIRECT, INDIRECT, OR CONSEQUENTIAL DAMAGES OR ANY DAMAGES
 * WHATSOEVER RESULTING FROM LOSS OF USE, DATA OR PROFITS, WHETHER IN AN
 * ACTION OF CONTRACT, NEGLIGENCE OR OTHER TORTIOUS ACTION, ARISING OUT OF
 * OR IN CONNECTION WITH THE USE OR PERFORMANCE OF THIS SOFTWARE.
 */
?>
<html>
	<head>
		<meta http-equiv="Content-Language" content="nl">
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
		<title>DeWilg Zonnepanelen</title>
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
	</head>
<body>
<?
require_once 'inc/conf.php';
header("Refresh:10");
echo "System name: " . $System_Name;
$conn = mysqli_connect($dbHost, $dbUserName, $dbUserPasswd, $dbName);
        if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
        }

echo "<table border='0'><tr>";

//set default to 0
$sumPower= 0;
$sumVDC = 0;
$sumAmps = 0;
$sumKwh = 0;

define('COLS', $Nr_Colums); // max number of colums can be set in conf.php
$col = 0; // number of the last column filled

$output= mysqli_query($conn,"SELECT * FROM enecsys WHERE id IN (SELECT inverter_serial FROM inverters) ORDER BY ts DESC LIMIT 0,10");
     while($row=mysqli_fetch_array($output)){
			$col++;
		//show total inverters (results) from table inverters
		$row_cnt = $output->num_rows;
		
			/* fout afhandeling todo indien geen inverters gevonden */
		
		//calculate DCVolt for every inverter.
		$dcvolt = $row['dcpower'] / $row['dccurrent'];
		
		/* SUM calculate for result for all inverters*/
		// calculate sum dc power (total)
		$sump_value = $row['dcpower'];
		$sumPower += $sump_value;  // echo $sumPower; voor total result per inverter from result
		
		$sumv_value = $row['dcpower'] / $row['dccurrent'];
		$sumVDC += $sumv_value;  // echo $sumVDC; voor total result per inverter from result

		//calculate sum dccurrent (total)
		$suma_value = $row['dccurrent'];
		$sumAmps += $suma_value;  // total Amps
		
		//calculate sum kWh (total)
		$sumk_value = $row['wh'] / 1000;
		$sumKwh += $sumk_value;  // echo $sumKwh; 
		
			
		
		/*Total SUM Calculation */
		//
		echo"<td bgcolor='#cccccc'><table>";
		echo "<tr><td>Inverter:</td><td>" .  $row['id']  . "</td></tr>" ;
		echo "<tr><td>Update:</td><td>" .  $row['ts']  . "</td></tr>" ;
		echo "<tr><td>DCPower:</td><td>" .  $row['dcpower']  . "</td></tr>" ;
		echo "<tr><td>DCCurrent:</td><td>" .  $row['dccurrent']  . "</td></tr>" ;
		echo "<tr><td>ACFreq:</td><td>" .  $row['acfreq']  . "</td></tr>" ;
		echo "<tr><td>DCVolt:</td><td>" .  number_format($dcvolt,2,',','.')  . "</td></tr>" ;
		echo "<tr><td>ACVolt:</td><td>" .  $row['acvolt']  . "</td></tr>" ;
		echo "<tr><td>Temp:</td><td>" .  $row['temp']  . "</td></tr>" ;
		echo "<tr><td>Efficiency:</td><td>" .  $row['efficiency']  . "</td></tr>" ;
		echo "<tr><td>State:</td><td>" .  $row['state']  . "</td></tr>" ;
		echo "<tr><td>Kwh:</td><td>" .  $row['wh'] / 1000 . "</td></tr>" ;
		echo "</table>";
		$col ;
		echo "</td><td width='10px'</td>";
		
		 if ($col == COLS) {
			$col = 0; 
			echo "</tr><tr><td height='10px'></td></tr><tr>"; // start a new one
		}
	}
echo "</tr></table>";
echo  "Totaal aantal inverters: " . $row_cnt . " | Total Power: " . $sumPower . "Watt / " . " | Total VDC: " .  number_format($sumVDC,2,',','.')  . " | Total Amps: "  . $sumAmps . " | Total Kwh: " . $sumKwh ;
echo "<br><br>PVOutput Enecsys Team page: <a href='http://www.pvoutput.org/ladder.jsp?tid=1018' target='_blank'>Enecsys by Tweakers</a>";
echo "<br><br>klopt nog niet. er worden niet altijd alle inverters getoond. hierdoor klopt het totaal ook niet. query moet aangepast worden, zodat alle inverters getoond worden";
mysqli_close($conn);
?>
</body>
</html>

