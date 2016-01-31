<?php
// page version: 2.0
// Author: Michael Milstead / Mode87.com 
require("../inc/general_conf.inc.php");
include ('../language/' . $language . '.inc.php'); 
if(empty($_SESSION['user'])) {
	header("Location: ". $DOCUMENT_ROOT . "/index.php");
    die("Redirecting to ". $DOCUMENT_ROOT . "/index.php"); 
}
    if(!empty($_POST)) 
    { 
        // Ensure that the user fills out fields 
        if(empty($_POST['username'])) 
        { die("Please enter a username."); } 
        if(empty($_POST['password'])) 
        { die("Please enter a password."); } 
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
        { die("Invalid E-Mail Address"); } 
         
        // Check if the username is already taken
        $query = "SELECT 1 FROM users WHERE username = :username"; 
        $query_params = array( ':username' => $_POST['username'] ); 
        try { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); } 
        $row = $stmt->fetch(); 
        if($row){ die("This username is already in use"); } 
        $query = " SELECT 1 FROM users WHERE email = :email "; 
        $query_params = array( 
            ':email' => $_POST['email'] 
        ); 
        try { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage());} 
        $row = $stmt->fetch(); 
        if($row){ die("This email address is already registered"); } 
         
        // Add row to database 
        $query = "INSERT INTO users (username, password, salt, email ) VALUES (:username, :password, :salt, :email)"; 
         
        // Security measures
        $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
        $password = hash('sha256', $_POST['password'] . $salt); 
        for($round = 0; $round < 65536; $round++){ $password = hash('sha256', $password . $salt); } 
        $query_params = array( 
            ':username' => $_POST['username'], 
            ':password' => $password, 
            ':salt' => $salt, 
            ':email' => $_POST['email'] 
        ); 
        try {  
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); } 
        header("Location: user_overview.php"); 
        die("Redirecting to user_overview.php"); 
    } 

include ("../header.php");
?>
   
<body>
<div id="wrap">
 
<div class="col-xs-8 col-sm-4">
    <h1><?php echo $LANG_CREATE_USER; ?></h1> <br /><br />
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" autocomplete="off" method="post"> 
        <div class="form-group">
            <label for="username"><?php echo $LANG_LOGINUSERNAME; ?></label>
            <input type="text" class="form-control" id="username" name="username" placeholder="username" value="">
        </div>
        <div class="form-group">
            <label for="email"><?php echo $LANG_EMAIL; ?></label>
            <input type="text" class="form-control" id="email" name="email" placeholder="email adres" value="">
        </div>
        <div class="form-group">
            <label for="password"><?php echo $LANG_LOGINPASSWORD; ?></label>
            <input type="password" class="form-control" id="password" name="password" placeholder="password" value="">
        </div>
        <input type="submit" class="btn btn-success" value="<?php echo $LANG_BUTTON_CREATE; ?>" /> 
		<a href="user_overview.php" class="btn btn-info"><?php echo $LANG_BUTTON_CANCEL; ?></a>
     </form>
</div>

 </div> <!-- /.wrap -->
 <?php include ("../footer.php");?>
</body>
</html>