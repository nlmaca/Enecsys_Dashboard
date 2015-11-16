<?php
// page version: 2.0
require("../inc/general_conf.inc.php");
if(empty($_SESSION['user'])) {
	header("Location: ". $DOCUMENT_ROOT . "/index.php");
    die("Redirecting to ". $DOCUMENT_ROOT . "/index.php"); 
}
?>

<?php include ("../header.php");?>

<?php
$id = htmlspecialchars($_POST['id']);


// Create connection
$connect = mysqli_connect($dbHost, $dbUserName, $dbUserPasswd, $dbName);
// Check connection
if (!$connect) {
	die("Connection failed: " . mysqli_connect_error());
}	

echo "<div class='panel panel-default'>";
echo "<div class='panel-heading'>Application information</div>";
echo "<table class='table table-bordered'>";


$user = mysqli_query($connect, "select * from users where id = $id");
?>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" autocomplete="off" method="post"> 
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="username" value="">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="email adres" value="">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="password" value="">
        </div>
        <input type="submit" class="btn btn-info" value="Create" /> 
     </form>

<?php
while($row = mysqli_fetch_array($user)){
	echo "<form name='user_edit' action='user_update.php' autocomplete='off'' method='POST'>";
	echo "<tr><td>Username:</td><td><input type='text' name='username' value='". $row['server_name']. "'></td></tr>";
	echo "<tr><td>Url(no http): </td><td><input type='text' name='serverurl' value='". $row['server_url']. "'></td></tr>";
	echo "<tr><td>UserName: </td><td><input type='text' name='serverusername' value='". $row['server_username']."'></td></tr>";
	echo "<tr><td>ServerPass: </td><td><input type='password' id='secret' name='serverpassword' value='". $row['server_password']."'><br><br>
	 		<label><input type='radio' id='radio1' name='radio1' value='on' onchange='ShowHide();'>Show</label>
	  		<label><input type='radio' id='radio2' name='radio1' value='off' onchange='ShowHide();'>Hide</label>
		</td></tr>";
	echo "<tr><td>ServerPort: </td><td><input type='text' name='serverport' value='". $row['server_port']."'></td></tr>";
	echo "</table></div>";
	echo "<input type='submit' value='Save settings' class='btn btn-success  btn-xs'>  <a href='wowza_overview.php'class='btn btn-info'>Cancel</a>";
	echo "<input type='hidden' name='id' value='$id'>";
	echo "</form>";
}	


mysqli_close($connect);


?>
<?php include ("../footer.php");?>
