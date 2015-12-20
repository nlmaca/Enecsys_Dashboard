<?php 
// page version: 2.0

// These variables define the connection information for your MySQL database 
    $dbUserName = "DATABASEUSER"; 
    $dbUserPasswd = "DATABASEPASSWORD"; 
    $dbHost = "localhost"; 
    $dbName = "DATABASENAME"; 

    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'); 
    try { $db = new PDO("mysql:host={$dbHost};dbname={$dbName};charset=utf8", $dbUserName, $dbUserPasswd, $options); } 
    catch(PDOException $ex){ die("Failed to connect to the database: " . $ex->getMessage());} 
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
    header('Content-Type: text/html; charset=utf-8'); 
    session_start(); 
    
//$DOCUMENT_ROOT = '/Enecsys_Dashboard'; // in this case will be in /var/www/Enecsys_Dashboard  | NO trailerslash!!!!

$DOCUMENT_ROOT = '/Enecsys_Dashboard'; // NO trailerslash!!!!
$TITLE = 'Enecsys Dashboard';
$language = 'ENG'; // use english or dutch (ENG, NL)

date_default_timezone_set('Europe/Amsterdam');

?>