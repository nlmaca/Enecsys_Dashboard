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

//password Edit
	$DataId = $connect->escape_string(htmlspecialchars($_POST['data_id']));

	$sql = "select * from users where id = $DataId";
	$result = $connect->query($sql);

	if (!$result and $mysqliDebug) {
		// the query failed and debugging is enabled
		echo "<p>" . $LANG_ERROR_INQUERY . $sql . "</p>";
		echo $mysqli->error;
	}
	else if ($result) {
		while($row = mysqli_fetch_array($result)) {

?>
<div class="right_col" role="main">
<div class="">
	<div class="x_content">
		<form class="form-horizontal form-label-left" action="settings_user_password_update.php" method='POST' novalidate>
			<span class="section"><?php echo $LANG_BUTTON_CREATE_USER; ?></span>
			<div class="item form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation"><?php echo $LANG_PAGES_USERS_PASSWORD_NEW;?> <span class="required">*</span></label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<input id="password" type="password" name="password" data-validate-length-range="0,20" class="optional form-control col-md-7 col-xs-12">
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-6 col-md-offset-3">
					<button id="send" type="submit" name="password_update" class="btn btn-success"><?php echo $LANG_BUTTON_ADD;?></button>
					<a href='settings_user_overview.php'class='btn btn-info'><?php echo $LANG_BUTTON_CANCEL;?></a>
					<input type='hidden' name='data_id' value='<?php echo $row['id'];?>'>
				</div>
			</div>
		</form>
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
