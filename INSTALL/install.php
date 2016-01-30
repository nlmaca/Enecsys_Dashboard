<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Webinstaller</title>
    <meta name="description" content="Webinstaller">
    <meta name="author" content="J. van Marion">
     <link href="../assets/css/sticky-footer.css" rel="stylesheet">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../assets/css/style.min.css" rel="stylesheet">
    <link href="../assets/font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="icon" href="../img/favicon.ico?v=2" type="image/x-icon" />
    <script src="../assets/jquery-2.1.4.min.js"></script>
    <link rel="stylesheet" href="../assets/jquery/jquery-ui-1.11.4/jquery-ui.css">
    <script src="../assets/jquery/1.11.3/jyquery-1.11.3.js"></script>
    <script src="../assets/jquery/jquery-ui-1.11.4/jquery-ui.js"></script>
</head>
<!-- // page version: 2.3 -->
<body>
<div id="wrap">
    <nav class="navbar navbar-default bg-black">
        <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only"></span>
                    <i class="fa fa-bars fa-2x"></i>
                </button>
				<a class="navbar-brand" href="#">
                <img alt="Brand" src="../img/sun-32.png" alt="Enecsys Dashboard" title="Enecsys Dashboard">
                </a>
            </div>
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div id="navbar" class="navbar-collapse collapse">
               
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
<div class="container">
	<div class="container">
		<h2>Web Installer</h2>
<!-- end navigation -->

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
/*credits script: http://tutsforweb.blogspot.nl/2012/02/php-installation-script.html */
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
	<h3>Step 1:</h3>
	<p>Copyright (c) 2015 Jeroen van Marion jeroen@vanmarion.nl<br>
	Permission to use, copy, modify, and distribute this software for any purpose without fee is hereby granted.<br>
	just give me some credit when you talk about it :D<br><br>
    
    Upgrading? Don't worry, this script will NOT overwrite your existin mysql tables.<br>
	if you already have installed this dashboard with an earlier version, it will just upgrade it without problems<br>
    
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
	<h3>Step 2: check if you match requirements.</h3>
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
		<input type="hidden" name="pre_error" id="pre_error" value="" />
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
							$err = mysqli_error($connect);
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

		}
	}
?>
	<h3>Step 3:</h3>
	<form method="post" action="install.php?step=3">
		<p>
			<input type="text" name="database_host" value='localhost' size="30">
			<label for="database_host">Database Host</label>
		</p>
		<p>
			<input type="text" name="database_name" size="30" value="">
			<label for="database_name">Database Name</label>
		</p>
		<p>
			<input type="text" name="database_username" size="30" value="">
			<label for="database_username">Database Username</label>
		</p>
		<p>
			<input type="text" name="database_password" size="30" value="">
			<label for="database_password">Database Password</label>
		</p>
		<br/>
		<p>
			<input type="text" name="directory" size="30" value="">
			<label for="directory">
				Your Web Directory: 
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal">
				  Help?
				</button>
				<!-- Modal -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Setting webdirectory</h4>
					  </div>
					  <div class="modal-body">
						<img src="webdirectory.png"><br>
						<b>Webdirectory:</b><br> Set the same directory you have set in the installer you have run on your raspberry in the install_dashboard_jessie or wheezy installer.<br>
						You can also see it in the url in your addressbar (example url: http://192.168.10.82/enecsys/INSTALL/install.php?step=3 ) Then fill in:<br>
						enecsys <br>
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					  
					  </div>
					</div>
				  </div>
				</div>
			</label>
		</p>
		<p>
			<input type="text" name="title" size="30" value="">
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
	//echo "Check if tables are created:<br>";
	echo "<h3>Step 4: Finalize</h3>";
	echo "Remove: <b>INSTALL/install.php?step=4</b> from the URL to go to your dashboard<br>";
	echo "and login with:<br>username: admin<br>password: dashboard<br>";
	echo "Deployment complete.<br>";
	echo "";
}
?>
<!-- end content -->
</div></div>
</div> <!-- /.wrap -->
<div id="footer" class="bg-black">
      <div class="container">
            <p class="text-muted" align="center"><br>&copy; <?php echo date("Y"); ?> Developed by J. van Marion /
            <a href="https://github.com/nlmaca" target="_blank"><i class="fa fa-github-alt fa-lg">&nbsp;&nbsp;</i></a>
                   <a href="https://nl.linkedin.com/in/jeroenvanmarion" target="_blank"><i class="fa fa-linkedin-square fa-lg">&nbsp;&nbsp;</i></a>
            <br>Version 2.3</p>
      </div>
</div>


<script src="../assets/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
</body>
</html>