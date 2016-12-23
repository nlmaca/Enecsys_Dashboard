<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Enecsys Solar Dashboard Installation</title>
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">
  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/bootstrap-form-helpers.min.css" rel="stylesheet" media="screen">
  <script src="js/jquery.min.js"></script>
  <!--[if lt IE 9]>
    <script src="../assets/js/ie8-responsive-file-warning.js"></script>
    <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body style="background:#F7F7F7;">
<div class="">
<!-- install form -->
<div class="x_content">
<?php
if (!is_writable('include/config.php')) {
	echo '<p>Make sure the file <b><code>include/config.php</code></b> is writable for our site to be installed!</p>';
}
?>
<span class="section">Dashboard Configuration</span>
<!-- page content -->
<?php
function tz_list() {
	$zones_array = array();
    $timestamp = time();
    foreach(timezone_identifiers_list() as $key => $zone) {
		date_default_timezone_set($zone);
        $zones_array[$key]['zone'] = $zone;
    }
    return $zones_array;
}
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

function step_1(){
  	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['agree'])){
        header('Location: install_process.php?step=2');
        exit;
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['agree'])){
     	echo "You must agree to the license.";
    }

	echo "<div class='right_col' role='main'><div class=''><div class='x_content'>";
	echo "<h3>Step 1:</h3>
		<p>Copyright (c) 2016 Jeroen van Marion jeroen@vanmarion.nl<br>
		Permission to use, copy, modify, and distribute this software for any purpose without fee is hereby granted.<br>
		just give me some credit when you talk about it :D<br><br>
		</p>
		<form action='install_process.php?step=1' method='post'>
		<p>I agree to this:<input type='checkbox' name='agree' /></p>
		<input type='submit' value='Continue' />
		</form>";
	echo "</div></div></div>";

}

function step_2(){
    if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['pre_error'] ==''){
      	header('Location: install_process.php?step=3');
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
    if (!is_writable('include/config.php')) {
    	$pre_error .= 'include/config.php needs to be writable for our site to be installed!';
    }
	echo "<div class='right_col' role='main'><div class=''><div class='x_content'>";
	echo "<h3>Step 2:</h3>";
	echo "<p>check if you match the requirements.<br></p>";
	echo "<table width='100%'>
		<tr><td><b>PHP version</b></td><td><b>Mysql available</b></td><td><b>Config writable</b></td></tr>
		<tr><td>";
	echo (phpversion() >= '5.3') ? 'Ok' : 'Not Ok';
	echo "</td><td>";
	echo extension_loaded('mysql') ? 'Ok' : 'Not Ok';
	echo "</td><td>";
	echo is_writable('include/config.php') ? '<font color="#00e600">Writable</font>' : '<font color="red">Unwritable - set 777 to include/config.php</font>';
	echo "</td></tr></table>
		<form action='install_process.php?step=2' method='post'>
		<input type='hidden' name='pre_error' id='pre_error' value='' />
		<input type='submit' name='continue' value='Continue' />
		</form>";
	echo "</div></div></div>";
}

function step_3(){
    if (isset($_POST['submit']) && $_POST['submit']=="Install!") {
      	$database_host=isset($_POST['database_host'])?$_POST['database_host']:"";
      	$database_name=isset($_POST['database_name'])?$_POST['database_name']:"";
       	$database_username=isset($_POST['database_username'])?$_POST['database_username']:"";
       	$database_password=isset($_POST['database_password'])?$_POST['database_password']:"";
       	$directory=isset($_POST['directory'])?$_POST['directory']:"";

		if (empty($database_host) || empty($directory) || empty($database_username) || empty($database_name)) {
        	echo "All fields are required! Please re-enter.<br />";
        }
        else {
            // Create connection
          	$connect = mysqli_connect($database_host, $database_username, $database_password, $database_name);
          	// Check connection
           	if (!$connect) {
          		die("Connection failed: " . mysqli_connect_error());
           	}
           	$file ='INSTALL/create_tables.sql';
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
            $f=fopen("include/config.php","w");
			$database_inf='<?php
$MYSQLHOST = "'. $database_host .'";
$MYSQLUSER = "'. $database_username .'";
$MYSQLPASSWORD = "'. $database_password .'";
$MYSQLDB = "'. $database_name .'";
$MYSQLPORT = 3306;

$DOCUMENT_ROOT = "/'. $directory .'"; // NO trailerslash!!!!
//create database connection
$connect = mysqli_connect($MYSQLHOST, $MYSQLUSER, $MYSQLPASSWORD, $MYSQLDB);
if (!$connect) {
  die("Connection failed: " . mysqli_connect_error());
}
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    try { $db = new PDO("mysql:host={$MYSQLHOST};dbname={$MYSQLDB};charset=utf8", $MYSQLUSER, $MYSQLPASSWORD, $options); }
    catch(PDOException $ex){ die("Failed to connect to the database: " . $ex->getMessage());}
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    header("Content-Type: text/html; charset=utf-8");
    session_start();

//get language and timezone settings from DB
$settings = mysqli_query($connect,"select lang, timezone from system_settings");
if ($settings->num_rows > 0) {
	while($row=mysqli_fetch_array($settings)){
	  $language = $row["lang"];
	  $TimeZone = $row["timezone"];
  }
}

// if no values set yet set default settings
else {
	$language = "ENG";
	$TimeZone = "Europe/Amsterdam";
}
date_default_timezone_set($TimeZone);
?>';
			if (fwrite($f,$database_inf)>0){
				fclose($f);
			}
			header("Location: install_process.php?step=4");
		}
	}
	echo "<div class='right_col' role='main'><div class=''><div class='x_content'>";
}
?>
<form method='post' action='install_process.php?step=3' id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="database_host">Database Host <span class="required">*</span></label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" id="database_host" name="database_host" value="localhost" required="required" class="form-control col-md-7 col-xs-12">
      </div>
  </div>
	<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="database_name">Database Name <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="database_name" name="database_name" required="required" class="form-control col-md-7 col-xs-12">
    </div>
  </div>
	<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="database_username">Database UserName <span class="required">*</span></label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" id="database_username" name="database_username" required="required" class="form-control col-md-7 col-xs-12">
      </div>
  </div>
	<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="database_password">Database Password <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="database_password" name="database_password" required="required" class="form-control col-md-7 col-xs-12">
    </div>
  </div>
	<div>
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="directory">directory <span class="required">*</span></label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" id="directory" name="directory" required="required" value="<?php echo basename(__DIR__);?>" readonly class="form-control col-md-7 col-xs-12">
      </div>
  </div>
  <div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
      <button type="submit" name="submit" value="Install!" class="btn btn-success">Install!</button>
    </div>
  </div>
</form>
<?php
//end function

function step_4(){
	echo "<div class='right_col' role='main'><div class=''><div class='x_content'>";
	echo "<h3>Step 4: Finalize</h3>";
  echo "Deployment complete.<br><br />";
  echo "*NOTE: First login into your dashboard. If everything is ok, make sure to run the cleanup script from the command line. See the installation procedure for that";
	echo "Your dashboard URL: ";
	echo "http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "<br>";
  echo "Default login: <b>admin</b><br>Default password: <b>dashboard</b><br />";
	echo "<a href='" . dirname($_SERVER['REQUEST_URI']) . "' class='btn btn-info'><u></u><b>Go to your dashboard</b></u></a><br />";
	echo "</div></div></div>";
}

?>
<!-- /page content -->
    </div>
  </div>
  <script src="js/bootstrap.min.js"></script>
  <!-- form validation -->
  <script type="text/javascript">
    $(document).ready(function () {
      $.listen('parsley:field:validate', function () {
        validateFront();
      });
      $('#demo-form .btn').on('click', function () {
        $('#demo-form').parsley().validate();
        validateFront();
      });
      var validateFront = function () {
        if (true === $('#demo-form').parsley().isValid()) {
          $('.bs-callout-info').removeClass('hidden');
          $('.bs-callout-warning').addClass('hidden');
        }
        else {
          $('.bs-callout-info').addClass('hidden');
          $('.bs-callout-warning').removeClass('hidden');
        }
      };
    });
    $(document).ready(function () {
      $.listen('parsley:field:validate', function () {
        validateFront();
      });
      $('#demo-form2 .btn').on('click', function () {
        $('#demo-form2').parsley().validate();
        validateFront();
      });
      var validateFront = function () {
        if (true === $('#demo-form2').parsley().isValid()) {
          $('.bs-callout-info').removeClass('hidden');
          $('.bs-callout-warning').addClass('hidden');
        }
        else {
          $('.bs-callout-info').addClass('hidden');
          $('.bs-callout-warning').removeClass('hidden');
        }
      };
    });
    try {
      hljs.initHighlightingOnLoad();
    }
    catch (err) {}
  </script>
<!-- /form validation -->
</body>
</html>
