<?php
//chart script: chart_current_all_inverters.php
require("../include/init.php");
include ("../header.php");
//check if session is valid for login
if(empty($_SESSION['user'])) {
	header("Location: ". $DOCUMENT_ROOT . "/index.php");
    die("Redirecting to ". $DOCUMENT_ROOT . "/index.php");
}

$getInverter = mysqli_query($connect, "select inverter_serial from inverters");
$CurrentYear = date("Y");
?>

<script>
function showInverter(str) {
	if (str == "") {
  	document.getElementById("inverter_result").innerHTML = "";
    return;
  }
	else {
    if (window.XMLHttpRequest) {
    	// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
    }
		else {
    	// code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {
      	document.getElementById("inverter_result").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","../charts/table_inverter_week.php?inv="+str,true);
    xmlhttp.send();
  }
}
</script>
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
    <!-- top tiles -->
    <?php include ("../top_tiles.php"); ?>
    <!-- /top tiles -->
	<div class="">
		<br />
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2><?php echo $LANG_PAGES_T_WEEK_TITLE.  $CurrentYear; ?></h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
							<li><a class="close-link"><i class="fa fa-close"></i></a></li>
						</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="pull-right">
						<form>
							<select id="inverter" onchange="showInverter(this.value)">
								<option value=""><?php echo $LANG_PAGES_T_WEEK_SELECT;?></option>
								<?php
								while($row1 = mysqli_fetch_assoc($getInverter)){
									echo "<option value = '" . $row1['inverter_serial'] . "'>" . $row1['inverter_serial'] .  "</option>";
								}?>
							</select>
						</form>
					</div>
					<br /><br />
					<div id="inverter_result"><b><?php echo $LANG_PAGES_T_WEEK_RESULT;?></b></div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- footer content -->
<?php include ("../footer.php"); ?>
