<!DOCTYPE html>
<html>
<head>
<title>Installation Script</title>
</head>
<?php
// page version: 2.2
/**
 * Timezones list with GMT offset
 *
 * @return array
 * @link http://stackoverflow.com/a/9328760
 */
 /* function for getting Timezone in dropdown list */
function tz_list() {
  $zones_array = array();
  $timestamp = time();
  foreach(timezone_identifiers_list() as $key => $zone) {
    date_default_timezone_set($zone);
    $zones_array[$key]['zone'] = $zone;
  //  $zones_array[$key]['diff_from_GMT'] = 'UTC/GMT ' . date('P', $timestamp);
  }
  return $zones_array;
}
?>
<?php
//credits script: http://tutsforweb.blogspot.nl/2012/02/php-installation-script.html
//rebuild for mysqli by J. van Marion
// page version: 2.2

$step = (isset($_GET['step']) && $_GET['step'] != '') ? $_GET['step'] : '';
switch($step){
	case '1':
	step_1();
	break;
	case '2':
	step_2();
	break;
	case '3':
	step_3();
	break;
	case '4':
	step_4();
	break;
	default:
	step_1();
}
?>
<body>
<?php
function step_1(){ 
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['agree'])){
		header('Location: install.php?step=2');
		exit;
	}
	if($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['agree'])){
		echo "You must agree to the license.";
	}
?>
	<p>Copyright (c) 2015 Jeroen van Marion jeroen@vanmarion.nl
	Permission to use, copy, modify, and distribute this software for any purpose with or without fee is hereby granted, just give me some credit when you talk about it :D<br><br>
    
    This script will NOT overwrite your mysql tables if you already have installed this dashboard with an earlier version. It checks if the tables and default user are present. IF so, it will ignore the creation
    and insert of data in the database.<br><br>
    
    </p>
	<form action="install.php?step=1" method="post">
		<p>I agree to this:<input type="checkbox" name="agree" /></p>
		<input type="submit" value="Continue" />
	</form>
<?php 
}
function step_2(){
	if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['pre_error'] ==''){
		header('Location: install.php?step=3');
		exit;
	}
	if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['pre_error'] != '') {
		echo $_POST['pre_error'];
	}
	if (phpversion() < '5.3') {
		$pre_error = 'You need to use PHP5.3 or above for the dashboard!<br />';
	}
	if (!extension_loaded('mysql')) {
		$pre_error .= 'MySQL extension needs to be loaded for our site to work!<br />';
	}
	if (!is_writable('../inc/general_conf.inc.php')) {
		$pre_error .= 'general_conf.inc.php needs to be writable for our site to be installed!';
	}
?>
	<table width="100%">
		<tr>
			<td>PHP Version:</td>
			<td><?php echo phpversion(); ?></td>
			<td>5.3+</td>
			<td><?php echo (phpversion() >= '5.3') ? 'Ok' : 'Not Ok'; ?></td>
		</tr>
		<tr>
			<td>MySQL:</td>
			<td><?php echo extension_loaded('mysql') ? 'On' : 'Off'; ?></td>
			<td>On</td>
			<td><?php echo extension_loaded('mysql') ? 'Ok' : 'Not Ok'; ?></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td>general_conf.inc.php</td>
			<td><?php echo is_writable('../inc/general_conf.inc.php') ? 'Writable' : 'Unwritable'; ?></td>
			<td>Writable</td>
			<td><?php echo is_writable('../inc/general_conf.inc.php') ? 'Ok' : 'Not Ok'; ?></td>
		</tr>
	</table>
	<form action="install.php?step=2" method="post">
		<input type="hidden" name="pre_error" id="pre_error" value="<?php echo $pre_error;?>" />
		<input type="submit" name="continue" value="Continue" />
	</form>
<?php
}
function step_3(){
	if (isset($_POST['submit']) && $_POST['submit']=="Install!") {
		$database_host=isset($_POST['database_host'])?$_POST['database_host']:"";
		$database_name=isset($_POST['database_name'])?$_POST['database_name']:"";
		$database_username=isset($_POST['database_username'])?$_POST['database_username']:"";
		$database_password=isset($_POST['database_password'])?$_POST['database_password']:"";
		$directory=isset($_POST['directory'])?$_POST['directory']:"";
		$title=isset($_POST['title'])?$_POST['title']:"";
		$language=isset($_POST['language'])?$_POST['language']:"";
		$timezone=isset($_POST['timezone'])?$_POST['timezone']:"";
	
		if (empty($database_host) || empty($directory) || empty($title) || empty($language) || empty($timezone) || empty($database_username) || empty($database_name)) {
			echo "All fields are required! Please re-enter.<br />";
		} else {
			// Create connection
			$connect = mysqli_connect($database_host, $database_username, $database_password, $database_name);
			// Check connection
			if (!$connect) {
				die("Connection failed: " . mysqli_connect_error());
			}	  
			$file ='create_tables.sql';
			if ($sql = file($file)) {
				$query = '';
				foreach($sql as $line) {
					$tsl = trim($line);
					if (($sql != '') && (substr($tsl, 0, 2) != "--") && (substr($tsl, 0, 1) != '#')) {
						$query .= $line;
						if (preg_match('/;\s*$/', $line)) {
							mysqli_query($connect, $query);
							$err = mysqli_error();
							if (!empty($err))
							break;
							$query = '';
						}
					}
				}
			}
			$f=fopen("../inc/general_conf.inc.php","w");
			$database_inf='<?php
			$dbUserName = "'. $database_username .'"; 
			$dbUserPasswd = "'. $database_password .'"; 
			$dbHost = "'. $database_host .'"; 
			$dbName = "'. $database_name .'"; 

			$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"); 
			try { $db = new PDO("mysql:host={$dbHost};dbname={$dbName};charse1t=utf8", $dbUserName, $dbUserPasswd, $options); } 
			catch(PDOException $ex){ die("Failed to connect to the database: " . $ex->getMessage());} 
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
			$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
			header("Content-Type: text/html; charset=utf-8"); 
			session_start(); 
			
			$DOCUMENT_ROOT = "/'. $directory .'"; // NO trailerslash!!!!
			$TITLE = "'. $title .'";
			$language = "'. $language .'"; // use english or dutch (ENG, NL)
			date_default_timezone_set("'. $timezone .'");
			?>';
			if (fwrite($f,$database_inf)>0){
				fclose($f);
			}
			header("Location: install.php?step=4");
			//header("Location: http://" . $_SERVER['SERVER_ADDR'] . "/" . $directory);
			//  echo "Succesfully deployed: Go to your dashboard:<br>"
			//  echo "http://" . $_SERVER['SERVER_ADDR'] . "/" . $directory; 
		}
	}
?>
	<form method="post" action="install.php?step=3">
		<p>
			<input type="text" name="database_host" value='localhost' size="30">
			<label for="database_host">Database Host</label>
		</p>
		<p>
			<input type="text" name="database_name" size="30" value="<?php echo $database_name; ?>">
			<label for="database_name">Database Name</label>
		</p>
		<p>
			<input type="text" name="database_username" size="30" value="<?php echo $database_username; ?>">
			<label for="database_username">Database Username</label>
		</p>
		<p>
			<input type="text" name="database_password" size="30" value="<?php echo $database_password; ?>">
			<label for="database_password">Database Password</label>
		</p>
		<br/>
		<p>
			<input type="text" name="directory" size="30" value="<?php echo $directory; ?>">
			<label for="directory">Directory (example /var/www/enecsys = enecsys)</label>
		</p>
		<p>
			<input type="text" name="title" size="30" value="<?php echo $title; ?>">
			<label for="title">Title for you Dashboard</label>
		</p>
		<p>
			<select name="language">
				<option value="ENG">English</option>
				<option value="NL">Dutch</option>
			</select>
            <label for="language">Language for you Dashboard</label>
		</p>
		<p>
            <select name="timezone"> 
                <option value="0">Please, select timezone</option>
                    <?php foreach(tz_list() as $t) { ?>
                    <option value="<?php print $t['zone'] ?>">
                    <?php print $t['zone'] ?>
                </option>
                    <?php } ?>
            </select>  
            <label for="timezone">Select your timezone</label> 
        </p>
        
		<p>
			<input type="submit" name="submit" value="Install!">
		</p>
	</form>
<?php
}
function step_4(){
	echo "Check if tables are created:<br>";

	$check_1 = mysqli_query($connect, "select 1 from `inverters` LIMIT 1");
	$check_2 = mysqli_query($connect, "select 1 from `enecsys_history` LIMIT 1");
	$check_3 = mysqli_query($connect, "select 1 from `users` LIMIT 1");
	$check_4 = mysqli_query($connect, "select 1 from `enecsys` LIMIT 1");
/*
	if ($check_1 == ''){
		echo "Ok. table <b>inverters</b> is created or existed already<br>"
	}
	else {
		echo "cant find the table <b>inverters</b>. Please check your log files or run the script manually ";
	}


	else if ($check_2 !== FALSE){
		echo "Ok. table <b>enecsys_history</b> is created or existed already<br>"
	}
	else {
		echo "cant find the table <b>enecsys_history</b>. Please check your log files or run the script manually ";
	}
	
	else if ($check_3 !== FALSE){
		echo "Ok. table <b>users</b> is created or existed already<br>"
	}
	else {
		echo "cant find the table <b>users</b>. Please check your log files or run the script manually ";
	}
	
	else if ($check_4 !== FALSE){
		echo "Ok. table <b>enecsys</b> is created or existed already<br>"
	}
	else {
		echo "cant find the table <b>enecsys</b>. Please check your log files or run the script manually ";
	}
*/
    $Dashb_IP = $_SERVER['SERVER_ADDR'];
	echo "Deployment complete. Before going to your dashboard, make sure to delete the INSTALL directory.<br>";
	echo "<a href='http://$Dashb_IP/yourwebdirectory'>Go to your dashboard</a>";
 
}
mysqli_close($connect); 
?>