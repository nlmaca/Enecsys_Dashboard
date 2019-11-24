<?php
require("include/config.php");
include ("language/" . $language . ".inc.php");
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

        $_SESSION['user'] = $row['username'];
        header("Location: pages/widget_live_inverters.php");
        die("Redirecting to: pages/widget_live_inverters.php");
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
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $LANG_DASHBOARD_TITLE; ?></title>
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">
  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/icheck/flat/green.css" rel="stylesheet">
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
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>
    <div id="wrapper">
      <div id="login" class="animate form">
        <section class="login_content">
          <form action="<?php htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
            <h1><?php echo $LANG_LOGIN_FORM; ?></h1>
            <div>
              <label for="inputUsername" class="sr-only"><?php echo $LANG_LOGIN_USERNAME; ?></label>
                <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $submitted_username; ?>" required autofocus>
                <label for="inputPassword" class="sr-only"><?php echo $LANG_LOGIN_PASSWORD; ?></label>
                <input type="password" name="password" value="" class="form-control" placeholder="Password" required id="secret">
                <button class="btn btn-default submit" type="submit"><?php echo $LANG_LOGIN; ?></button>
            </div>

            <div class="clearfix"></div>
            <div class="separator">
              <div class="clearfix"></div>
              <br />
              <div>
                <h1>
                  <i class="fa fa-th" style="font-size: 26px;"></i>
                  <a style="font-size: 26px;" href="pages/page_live_total.php"><u><?php echo $LANG_DASHBOARD_TITLE; ?></u></a>
                </h1>
                <p><?php echo $LANG_FOOTER_AUTHOR;?></p>
              </div>
            </div>
          </form>
          <!-- form -->
        </section>
        <!-- content -->
      </div>
    </div>
  </div>
</body>
</html>
