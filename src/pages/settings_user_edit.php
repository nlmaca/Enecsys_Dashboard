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

//user Edit
	$DataId = $connect->escape_string(htmlspecialchars($_POST['data_id']));

	//get count of total users
	$sql1 = "select id from users";
	$UsersNr = $connect->query($sql1);
	$UserCount = $UsersNr->num_rows;

	if (!$UsersNr and $mysqliDebug) {
		// the query failed and debugging is enabled
		echo "<p>" . $LANG_ERROR_INQUERY . $sql1 . "</p>";
		echo $mysqli->error;
	}

	//get user info
	$sql2 = "select * from users where id = $DataId";
	$result2 = $connect->query($sql2);

	if (!$result2 and $mysqliDebug) {
		// the query failed and debugging is enabled
		echo "<p>" . $LANG_ERROR_INQUERY . $sql2 . "</p>";
		echo $mysqli->error;
	}
	else if ($result2) {
		while($row = mysqli_fetch_array($result2)) {

?>
	<div class="right_col" role="main">
	<div class="">
		<div class="x_content">
			<form class="form-horizontal form-label-left" action="settings_user_update.php" method='POST' novalidate>";
				<span class="section"><?php echo $LANG_PAGES_USERS_EDIT; ?></span>
				<div class="item form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation"><?php echo $LANG_PAGES_USERS_USERNAME; ?> <span class="required">*</span></label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input id="username" type="text" name="username" data-validate-length-range="0,20"
						class="optional form-control col-md-7 col-xs-12" value="<?php echo $row['username']; ?>">
					</div>
				</div>
				<div class="item form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email"><?php echo $LANG_PAGES_USERS_EMAIL; ?> <span class="required">*</span></label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input id="email" type="text" name="email" data-validate-length-range="0,255"
						class="optional form-control col-md-7 col-xs-12" value="<?php echo $row['email']; ?>">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6 col-md-offset-3">
						<button id="send" type="submit" name="user_update" class="btn btn-success"><?php echo $LANG_BUTTON_SAVE;?></button>
						<a href='settings_user_overview.php'class='btn btn-info'><?php echo $LANG_BUTTON_CANCEL;?></a>
						<input type='hidden' name='data_id' value='<?php echo $row['id'];?>'>
					</div>
				</div>
			</form>
			<?php
			if ($UserCount == 1) { ?>
			<div>
				<?php echo $LANG_PAGES_USERS_LAST; ?>
			</div>
			<?php
			} else  { ?>
				<div align='right'>
					<form class="form-horizontal form-label-left" action="settings_user_delete.php" method='POST' novalidate>
						<input type='submit' name='user_delete' value='<?php echo $LANG_PAGES_USERS_DELETE; ?>' class='btn btn-danger'>
						<input type='hidden' name='data_id' value='<?php echo $row['id'];?>'>
	  			</form>
				</div>
			<?php
			} ?>
		</div>

	<?php
		}
	}
	else {
		echo $LANG_ERROR_NODATAFOUND;
	}

?>
<!-- footer content -->
<?php include ("../footer.php"); ?>
