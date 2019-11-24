<?php
    require("include/config.php"); 
    unset($_SESSION['user']);
	header("Location: ". $DOCUMENT_ROOT . "/index.php");
    die("Redirecting to ". $DOCUMENT_ROOT . "/index.php");
?>
