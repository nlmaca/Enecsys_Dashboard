<?php
	//chart script: chart_current_single_converter.php
	require("../include/init.php");
	//check if session is valid for login
	if(empty($_SESSION['user'])) {
		header("Location: ". $DOCUMENT_ROOT . "/index.php");
		die("Redirecting to ". $DOCUMENT_ROOT . "/index.php");
	}

	$getCurrentYear = date("Y");
	$getYear = mysqli_query($connect,"select date_format(ts, '%Y')as year from enecsys_report group by year(ts)");
	$getMonth = mysqli_query($connect,"select date_format(ts, '%m') as month, date_format(ts, '%b')as month2 from enecsys_report where date_format(ts, '%Y') = $getCurrentYear group by month(ts) ");
	$getDay = mysqli_query($connect,"select date_format(ts, '%d')as day from enecsys_report group by day(ts)");
	$getInverter = mysqli_query($connect, "select inverter_serial from inverters");

	$allInverters= mysqli_query($connect,"select id, date_format(ts,'%H:%i:%s')as ts, wh, dcpower, max(wh) - min(wh) as until_now, dccurrent, efficiency, acfreq, acvolt, temp, state from enecsys where id <> 0 and date(ts) = curdate() group by id");

?>

<?php include ("../header.php"); ?>

<script type="text/javascript">
	$(document).ready(function() {
    //default
  	getAjaxData('110085482');
    $('#dynamic_data').change(function() {
    	var id = $('#dynamic_data').val();
      getAjaxData(id);
    });
      var options = {
        chart: {
          renderTo: 'container',
          type: 'area'
        },
        title: {
          text: '<?php echo $LANG_PAGES_CURRENT_JS_2;?>',
          x: -20 //center
        },
				subtitle: {
          text: '',
          x: -20
        },
        xAxis: {
	        categories: []
        },
        yAxis: {
          title: {
            text: '<?php echo $LANG_PAGES_CURRENT_JS_2;?>'
          },
          plotLines: [{
          	value: 0,
            width: 1,
            color: '#808080'
          }]
        },
        tooltip: {
          headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
          pointFormat: '<b>{point.y}</b> Watt<br/>'
        },
	      series: []
      };
      function getAjaxData(id) {
        $.getJSON("../charts/chart_current_single_converter.php", {id: id}, function(json) {
          options.xAxis.categories = json[0]['data']; //xAxis: {categories: []}
          options.series[0] = json[1];
          chart = new Highcharts.Chart(options);
        });
      }
    });
 </script>
 <script src="https://code.highcharts.com/highcharts.js"></script>
 <script src="https://code.highcharts.com/modules/exporting.js"></script>
<!-- /chart -->

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
				<div class="dashboard_graph x_panel">
					<div class="row x_title">
					  <div class="col-md-6">
						<h3><?php echo $LANG_PAGES_CURRENT_TITLE;?><small></small></h3>
					  </div>
					  <div class="col-md-6">
						<div  class="pull-right" style="background: #fff; cursor: pointer; padding: 0px 0px; border: 1px solid #ccc">
							<select id="dynamic_data">
								<option value=""><?php echo $LANG_PAGES_CURRENT_INV;?></option>
								<?php
								while($row1 = mysqli_fetch_assoc($getInverter)){
									echo "<option value = '" . $row1['inverter_serial'] . "'>" . $row1['inverter_serial'] .  "</option>";
								}?>
							</select>
						</div>
					  </div>
					</div>
					<div class="x_content">
						<div class="demo-container" style="height:400px">
							<div class="menu_top" ></div>
							<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto;"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2><?php echo $LANG_PAGES_CURRENT_T_TITLE;?></small></h2>
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
								<th class="column-title"><?php echo $LANG_PAGES_CURRENT_T_1;?></th>
								<th class="column-title"><?php echo $LANG_PAGES_CURRENT_T_2;?></th>
								<th class="column-title"><?php echo $LANG_PAGES_CURRENT_T_3;?></th>
								<th class="column-title"><?php echo $LANG_PAGES_CURRENT_T_4;?></th>
								<th class="column-title"><?php echo $LANG_PAGES_CURRENT_T_5;?></th>
								<th class="column-title"><?php echo $LANG_PAGES_CURRENT_T_6;?></th>
								<th class="column-title"><?php echo $LANG_PAGES_CURRENT_T_7;?></th>
								<th class="column-title"><?php echo $LANG_PAGES_CURRENT_T_8;?></th>
								<th class="column-title"><?php echo $LANG_PAGES_CURRENT_T_9;?></th>
								<th class="column-title"><?php echo $LANG_PAGES_CURRENT_T_10;?></th>
								<th class="column-title"><?php echo $LANG_PAGES_CURRENT_T_11;?></th>
								</tr>
							</thead>
							<tbody>
								<?php
								$Temperature= mysqli_query($connect,"SELECT temperature from system_settings");
								if ($Temperature->num_rows > 0) {
									while($row=mysqli_fetch_assoc($Temperature)){
										$temp = $row['temperature'];
									}
								}
									
								if ($allInverters->num_rows > 0) {
									while($row=mysqli_fetch_array($allInverters)){
										if ($temp == 'Celcius') {
											$temperature = number_format((float)$row['temp'], 1, '.', '') . " &#8451;";
										}
										else if ($temp = 'Farenheit'){
											$Convert = $row['temp'];
											$NewTemp = ($Convert * 9/5) + 32;
											$temperature = number_format((float)$NewTemp, 1, '.', '') . " &#8457;";
										}
										
										echo "<tr><td class=''>"
											. $row['id'] . "</td><td class=''>"
											. $row['ts'] . "</td><td class=''>"
											. $row['wh'] . "</td><td class=''>"
											. $row['until_now'] . "</td><td class=''>"
											. $row['dcpower'] . "</td><td class=''>"
											. $row['dccurrent'] . "</td><td class=''>"
											. $row['efficiency'] . "</td><td class=''>"
											. $row['acfreq'] . "</td><td class=''>"
											. $row['acvolt'] . "</td><td class=''>"
											. $temperature . "</td><td class=''>"
											. $row['state'] . "</td><tr>";
									}
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<?php  //}; ?>
		</div>
    </div>

<!-- footer content -->

<?php include ("../footer.php"); ?>
