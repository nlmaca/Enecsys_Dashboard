<?php 
// page version: 2.3
    require("inc/general_conf.inc.php"); 
    include 'language/' . $language . '.inc.php'; 
    
    $submitted_username = ''; 
    if(!empty($_POST)){ 
        $query = "SELECT id, username, password, salt, email FROM users WHERE username = :username"; 
        $query_params = array( 
            ':username' => $_POST['username'] 
        ); 
         
        try{ 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); } 
        $login_ok = false; 
        $row = $stmt->fetch(); 
        if($row){ 
            $check_password = hash('sha256', $_POST['password'] . $row['salt']); 
            for($round = 0; $round < 65536; $round++){
                $check_password = hash('sha256', $check_password . $row['salt']);
            } 
            if($check_password === $row['password']){
                $login_ok = true;
            } 
        } 

        if($login_ok){ 
            unset($row['salt']); 
            unset($row['password']); 
            $_SESSION['user'] = $row;  
            header("Location: index2.php"); 
            die("Redirecting to: index2.php"); 
        } 
        else{ 
            print("Login Failed."); 
            $submitted_username = htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8'); 
        } 
    } 
     
?> 

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $TITLE; ?></title>
		<meta name="description" content="<?php echo $DESCRIPTION; ?>">
		<meta name="author" content="J. van Marion">
		<link href="assets/css/sticky-footer.css" rel="stylesheet">
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="assets/css/style.min.css" rel="stylesheet">
		<link href="assets/font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="assets/css/signin.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container">
			<form class="form-signin" action="index.php" method="post"> 
				<h2 class="form-signin-heading"><img src="img/sun-128.png" height="40px" alt="Enecsys Dashboard" title="Enecsys Dashboard">&nbsp;&nbsp;Enecsys Live</h2>
				<label for="inputUsername" class="sr-only"><?php echo $LANG_LOGINUSERNAME; ?></label>
				<input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $submitted_username; ?>" required autofocus>
				<label for="inputPassword" class="sr-only"><?php echo $LANG_LOGINPASSWORD; ?></label>
				<input type="password" name="password" value="" class="form-control" placeholder="Password" required id="secret">
				<button class="btn btn-lg btn-primary btn-block" type="submit"><?php echo $LANG_SIGNIN; ?></button>                  
			</form>
		</div> <!-- /container -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!-- <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script> -->
	</body>
</html>
