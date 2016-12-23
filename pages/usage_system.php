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

<?php
// set partition
$fs = "/";
$TotalDiskSpace = round(disk_total_space($fs) / (1024*1024)) . " MB";
$TotalFreeDiskSpace = round(disk_free_space($fs) / (1024*1024)) . " MB";
// calculate used space
$TotalUsedDiskSpace = round((disk_total_space($fs) - disk_free_space($fs)) / (1024*1024)) . "MB";
$TotalUsedDiskSpacePercentage = round((disk_total_space($fs) - disk_free_space($fs)) / disk_total_space($fs) * 100) . " %";

$DbSize = mysqli_query($connect,"SELECT table_schema as db_name, sum( data_length + index_length ) /1024/1024  as db_size
FROM information_schema.TABLES GROUP BY table_schema;");

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
	 <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3><?php echo $LANG_PAGES_USAGE_STATUS;?></h3>
        </div>
      </div>
      <div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<h2><?php echo $LANG_PAGES_USAGE_DISK;?></h2>
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
										<th class="column-ltitle"><?php echo $LANG_PAGES_USAGE_TOTAL;?></th>
										<th class="column-title"><?php echo $LANG_PAGES_USAGE_FREE;?></th>
										<th class="column-title"><?php echo $LANG_PAGES_USAGE_USED;?></th>
										<th class="column-title"><?php echo $LANG_PAGES_USAGE_USEDP;?></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><?php echo $TotalDiskSpace; ?> </td>
										<td><?php echo $TotalFreeDiskSpace; ?></td>
										<td><?php echo $TotalUsedDiskSpace; ?></td>
										<td><?php echo $TotalUsedDiskSpacePercentage; ?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- 2nd row -->
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<h2><?php echo $LANG_PAGES_USAGE_DBSTATUS;?></h2>
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
										<th class="column-ltitle"><?php echo $LANG_PAGES_USAGE_DBNAME;?></th>
										<th class="column-title"><?php echo $LANG_PAGES_USAGE_DBSIZE;?></th>
									</tr>
								</thead>
								<tbody>
									<?php
									if ($DbSize->num_rows > 0) {
										while($row=mysqli_fetch_array($DbSize)){
											echo "<tr><td>". $row['db_name'] . "</td><td>" . $row['db_size'] . "</td></tr>";
										}
									}
									else {
										echo $LANG_ERROR_NODATAFOUND;
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
      </div>
<!-- footer content -->
<?php include ("../footer.php"); ?>
