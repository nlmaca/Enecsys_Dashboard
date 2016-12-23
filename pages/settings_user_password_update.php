<?php
//chart script: chart_current_all_inverters.php
	require("../include/init.php");
	include ("../header.php");
	//check if session is valid for login
	if(empty($_SESSION['user'])) {
		header("Location: ". $DOCUMENT_ROOT . "/index.php");
	    die("Redirecting to ". $DOCUMENT_ROOT . "/index.php");
	}
?>
</head>
<body class="nav-md">
		<!-- sidebar menu -->
  	<?php include ('../sidebar_menu.php'); ?>
  	<!-- /sidebar menu -->
		</div>
  </div>
  <!-- top navigation -->
  <div class="top_nav">
		<div class="nav_menu">
			<?php include ("../top_nav.php"); ?>
    </div>
  </div>
  <!-- /top navigation -->
<?php
// define a variable to switch on/off error messages
$mysqliDebug = true;
$GetUsers= mysqli_query($connect,"select * from users order by id asc");

//password reset
	$DataId = $connect->escape_string(htmlspecialchars($_POST['data_id']));
	$UserPassword = $connect->escape_string(htmlspecialchars($_POST['password']));

  $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
  $pw = hash('sha256', $UserPassword . $salt);
	for($round = 0; $round < 65536; $round++){
		$pw = hash('sha256', $pw . $salt);
	}

	$sql = "UPDATE users SET
		password = '". $pw . "',
		salt = '". $salt . "'
		where id = $DataId";

	$result = $connect->query($sql);

	if (!$result and $mysqliDebug) {
		// the query failed and debugging is enabled
		echo "<p>" . $LANG_ERROR_INQUERY . $sql . "</p>";
		echo $mysqli->error;
	}
	else if ($result) {
		echo "<div class='right_col' role='main'>
					<div class=''>
					<div class='page-title'>
					<div class='title_left'><h3>" . $LANG_PAGES_USERS_EDIT . "</h3></div>
					</div>
					<div class='clearfix'></div>
					</div>
					<div class='x_content'>
					<div class='row'>
					<div class='col-md-12 col-sm-12 col-xs-12'>
					<div class='x_panel' style='height:600px;'>
					<div class='x_title'>
					<h2>" . $LANG_PAGES_USERS_PASSCHANGE . "</h2>
					<div class='clearfix'></div>
					</div>
					<!-- status -->" .
					$LANG_PAGES_USERS_PASSCHANGED . "<br /><a href='settings_user_overview.php'class='btn btn-info'>" . $LANG_BUTTON_OVERVIEW . "</a>
					<!-- /status -->
					</div></div></div></div>";
	}
	else {
		echo $LANG_ERROR_NODATAFOUND;
	}

?>
<!-- footer content -->
<?php include ("../footer.php"); ?>
