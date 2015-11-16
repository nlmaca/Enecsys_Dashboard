<?php
// page version: 2.0
require("inc/general_conf.inc.php");
if(empty($_SESSION['user'])) {
    header("Location: index.php");
    die("Redirecting to index.php"); 
}
include ("header.php"); 
include 'language/' . $language . '.inc.php'; 
//---------------------------------------------------------------
echo "Page after login<br>";
echo $LANG_INTRO;

include("footer.php");
?>