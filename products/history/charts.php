<?php
// page version: 2.0
require("../../inc/general_conf.inc.php");
if(empty($_SESSION['user'])) {
	header("Location: ". $DOCUMENT_ROOT . "/index.php");
    die("Redirecting to ". $DOCUMENT_ROOT . "/index.php"); 
}

include ("../../header.php");
include ('../../language/' . $language . '.inc.php');
?>
<script>
  function ajax_select_request() {
    $('#results').html('<p> <i class="fa fa-spinner fa-spin fa-2x"></i> Retreiving data, be patient</p>');
 //   $('#results').load("select_history.php");
  }
</script>

<?php
// Create connection
$connect = mysqli_connect($dbHost, $dbUserName, $dbUserPasswd, $dbName);
// Check connection
if (!$connect) {
	die("Connection failed: " . mysqli_connect_error());
}

$inv = mysqli_query($connect,"SELECT inverter_serial from inverters");
?>
<div class='panel panel-default'>
	<div class='panel-heading'>Application information<br>
		<form method="POST" action="select_history.php" id="select-history">
			Select Inverter: 
			<select name="inverter"> 
				<option value="#">--</option>
				<?php
					while($row = mysqli_fetch_assoc($inv)){
				?>
				<option value = "<?php echo($row['inverter_serial'])?>" ><?php echo($row['inverter_serial']) ?></option>
				<?php
					}               
				?>
			</select>
			From date: <input type="date" id="fromdate" name="fromdate"> | 
			To date: <input type='date' id='todate' name='todate'>
			Option:
			<select name='selectOption'>
				<option value='avgTemp'>avg temperature</option>
				<option value='cumulative'>Cumulative</option>
				<option value='totalWH'>Total Wh (max per mnd)</option>
			</select>
		&nbsp;&nbsp;<button class='btn btn-info btn-xs' type='submit' onclick='ajax_select_request()'>Get data</button>
			
			
		</form>
	</div>
<div id="results"></div>
</div>



<?php include ("../../footer.php");?>

