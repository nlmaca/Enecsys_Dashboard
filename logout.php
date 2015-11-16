<?php 
    require("inc/general_conf.inc.php"); 
    unset($_SESSION['user']);
	header("Location: ". $DOCUMENT_ROOT . "/index.php");
    die("Redirecting to ". $DOCUMENT_ROOT . "/index.php"); 
?>