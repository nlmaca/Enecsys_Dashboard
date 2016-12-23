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
$GetUsers= mysqli_query($connect,"select * from users order by id asc");
 ?>
<!-- end form submit -->
    <div class="right_col" role="main">
		<div class="">
      <div class="page-title">
				<div class="title_left">
          <h3><?php echo $LANG_PAGES_USERS_OVERVIEW;?></h3>
        </div>
			</div>
      <div class="clearfix"></div>
			<!-- start row -->
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<h2></h2>
							<ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
								<li><a class="close-link"><i class="fa fa-close"></i></a></li>
							</ul>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<table class="table table-striped responsive-utilities jambo_table bulk_action">
								<thead>
									<tr class="headings">
										<th class="column-ltitle">#</th>
										<th class="column-title"><?php echo $LANG_PAGES_USERS_USERNAME;?></th>
										<th class="column-title"><?php echo $LANG_PAGES_USERS_EMAIL;?></th>
										<th class="column-title"></th>
										<th class="column-title"></th>
									</tr>
								</thead>
							<tbody>
							<?php
							if ($GetUsers->num_rows > 0) {
								while($row=mysqli_fetch_array($GetUsers)){
									echo "<tr><td class=''>" . $row['id'] . "</td><td class=''>"
									. $row['username'] . "</td><td class=''>"	. $row['email'] . "</td>";
									echo "<td><form action='settings_user_edit.php' method='POST'>
									<input type='submit' name='user_edit' value='" . $LANG_BUTTON_EDIT . "' class='btn btn-info btn-xs'>
									<input type='hidden' name='data_id' value='" . $row['id'] . "'>
									</form></td>";
									echo "<td><form action='settings_user_password_edit.php' method='POST'>
									<input type='submit' name='password_edit' value='" . $LANG_BUTTON_PASS_RESET . "' class='btn btn-warning btn-xs'>
									<input type='hidden' name='data_id' value='" . $row['id'] . "'>
									</form></td>";
									echo "</tr>";
								}
							}
							else {
								$LANG_ERROR_NODATAFOUND = "No Data found";
							}
							?>
							</tbody>
						</table>
						<?php
						echo "<form action='settings_user_create.php' method='POST'>
									<input type='submit' name='user_add' value='" . $LANG_BUTTON_CREATE_USER . "' class='btn btn-success'>
									</form>";
						?>
					</div>
				</div>
			</div>
		<!-- end row -->
		</div>
<!-- footer content -->
<?php include ("../footer.php"); ?>
