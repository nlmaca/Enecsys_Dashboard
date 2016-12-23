<?php
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
	<!-- page content -->
	<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h3><?php echo $LANG_PAGES_BACKUP_SYSTEMSTATUS;?></h3>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="row">
				<!-- 2nd row -->
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<h2><?php echo $LANG_PAGES_BACKUP_TITLE;?></h2>
							<ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
								<li><a class="close-link"><i class="fa fa-close"></i></a></li>
							</ul>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<?php echo $LANG_PAGES_BACKUP_NOTE;?><br /><br />
							<table class='table table-striped responsive-utilities jambo_table bulk_action'>
								<thead>
									<tr class='headings'>
										<th class='column-ltitle'><?php echo $LANG_PAGES_BACKUP_FILENAME;?></th>
										<th class='column-title'><?php echo $LANG_PAGES_BACKUP_FILESIZE;?></th>
										<th class='column-title'><?php echo $LANG_PAGES_BACKUP_DOWNLOAD;?></th>
									</tr>
								</thead>
								<tbody>
								<?php
									function human_filesize($bytes, $decimals = 2) {
										$size = array('B','kB','MB','GB','TB','PB','EB','ZB','YB');
										$factor = floor((strlen($bytes) - 1) / 3);
										return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
									}
									$dir = "/var/www/html/". $DOCUMENT_ROOT . "/backups/files/";
									chdir($dir);
									array_multisort(array_map('filemtime', ($files = glob("*.*"))), SORT_DESC, $files);
									foreach($files as $filename)
									{
									echo "<tr><td>" . $filename . "</td>
										<td>" . human_filesize(filesize($filename)) . "</td>
										<td><a href='" . $DOCUMENT_ROOT . "/backups/files/$filename' class='btn btn-info btn-xs'>Download backup</a></td>
										</tr>";
									}
								?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
  <!-- footer content -->
	<?php include ("../../footer.php"); ?>
