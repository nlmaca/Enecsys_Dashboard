<?php
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
?>