<?php
// page version: 2.0
require("../inc/general_conf.inc.php");
if(empty($_SESSION['user'])) {
	header("Location: ". $DOCUMENT_ROOT . "/index.php");
    die("Redirecting to ". $DOCUMENT_ROOT . "/index.php"); 
}

include ("../header.php");
include ('../language/' . $language . '.inc.php'); 

/* check OUTPUT */
echo "<div class='panel panel-default'>";
echo "<div class='panel-heading'>" . $LANG_USER_INFO . "</div>";
echo "<table class='table'>";
echo "<tr><td><b>#</b></td><td><b>" . $LANG_USERNAME . "</b></td><td><b>" . $LANG_EMAIL . "</b></td><td><b>" . $LANG_BUTTON_DELETE . "</b></td></tr>";

// Create connection
$connect = mysqli_connect($dbHost, $dbUserName, $dbUserPasswd, $dbName);
// Check connection
if (!$connect) {
	die("Connection failed: " . mysqli_connect_error());
}	

$output= mysqli_query($connect,"select id, username, email from users");
while($row=mysqli_fetch_array($output)){ 
	$row_cnt = mysqli_num_rows($output);
	
	if ($row_cnt == 1) {
		echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['username'] .  "</td>";
		echo "<td>" . $row['email'] .  "</td>";
		
		//delete user
		echo "<td><input type='submit' value='Delete' class='btn btn-info btn-xs disabled'></td>";
		echo "</td>";
		echo "</tr>";
	}
	else if ($row_cnt > 1) {
		echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['username'] .  "</td>";
		echo "<td>" . $row['email'] .  "</td>";
		
		//delete user
		echo "<td><form action='user_delete.php' method='POST'>";
		echo "<input type='submit' value='" . $LANG_BUTTON_DELETE . "' class='btn btn-danger btn-xs'>";
		echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
		echo "</form></td>";

		echo "</tr>";
	}
	else {
		echo "No users found";
	}
}

mysqli_close($connect);
echo "</table></div>";
echo "<a href='user_create.php' class='btn btn-info'>" . $LANG_BUTTON_CREATE_USER . "</a>";
?>
<?php include ("../footer.php");?>