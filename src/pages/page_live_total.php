<?php
//chart script: chart_current_all_inverters.php
	require("../include/init.php");
  //check if session is valid for login
  if(empty($_SESSION['user'])) {
  	header("Location: ". $DOCUMENT_ROOT . "/index.php");
      die("Redirecting to ". $DOCUMENT_ROOT . "/index.php");
  }
?>
<?php include ("../header.php"); ?>
	<script type="text/javascript">
  	$(document).ready(function() {
    	//default
      getAjaxData();
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
        	text: '<?php echo $LANG_PAGES_LIVE_TOTAL_JS_1;?>',
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
            text: '<?php echo $LANG_PAGES_LIVE_TOTAL_JS_2;?>'
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
		
		plotOptions: {
			area: {
			// pointStart: 1940,
				marker: {
					enabled: false,
					symbol: 'circle',
					radius: 5,
					states: {
						hover: {
							enabled: true
						}
					}
				}
			}
		},
		series: []
      };
      function getAjaxData(year) {
      	$.getJSON("../charts/chart_current_all_inverters.php", {year: year}, function(json) {
          options.xAxis.categories = json[0]['data']; //xAxis: {categories: []}
          options.series[0] = json[1];
          chart = new Highcharts.Chart(options);
        });
      }
    });
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
					<div class="dashboard_graph x_panel">
						<div class="x_title">
							<h2><?php echo $LANG_PAGES_LIVE_TITLE;?></h2>
							<ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
								<li><a class="close-link"><i class="fa fa-close"></i></a></li>
							</ul>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<div class="demo-container" style="height:400px">
								<div class="menu_top"></div>
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
						<h2><?php echo $LANG_PAGES_LIVE_TITLE_SUB;?></small></h2>
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
										<th class="column-title"><?php echo $LANG_PAGES_LIVE_T_1;?></th>
										<th class="column-title"><?php echo $LANG_PAGES_LIVE_T_2;?></th>
										<th class="column-title"><?php echo $LANG_PAGES_LIVE_T_3;?></th>
										<th class="column-title"><?php echo $LANG_PAGES_LIVE_T_4;?></th>
										<th class="column-title"><?php echo $LANG_PAGES_LIVE_T_5;?></th>
										<th class="column-title"><?php echo $LANG_PAGES_LIVE_T_6;?></th>
										<th class="column-title"><?php echo $LANG_PAGES_LIVE_T_7;?></th>
										<th class="column-title"><?php echo $LANG_PAGES_LIVE_T_8;?></th>
										<th class="column-title"><?php echo $LANG_PAGES_LIVE_T_9;?></th>
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
																		
									
									$output= mysqli_query($connect,"select date_format(ts,'%H:%i:%s')as ts, wh, dcpower, dccurrent, efficiency, acfreq, acvolt, temp, state from enecsys where id = 0 and date(ts) = curdate() order by ts desc limit 20");
									if ($output->num_rows > 0) {
										while($row=mysqli_fetch_array($output)){
											//check if value is set to Celcius or Farenheit
											if ($temp == 'Celcius') {
												$temperature = number_format((float)$row['temp'], 1, '.', '') . " &#8451;";
											}
											else if ($temp = 'Farenheit'){
												$Convert = $row['temp'];
												$NewTemp = ($Convert * 9/5) + 32;
												$temperature = number_format((float)$NewTemp, 1, '.', '') . " &#8457;";
											}
											echo "<tr><td class=''>" . 
												$row['ts'] . "</td><td class=''>" .
												$row['wh'] . "</td><td class=''>" . 
												$row['dcpower'] . "</td><td class=''>" .
												$row['dccurrent'] . "</td><td class=''>" .
												$row['efficiency'] . "</td><td class=''>" .
												$row['acfreq'] . "</td><td class=''>" .
												$row['acvolt'] . "</td><td class=''>" .
												$temperature . "</td><td class=''>" .
												$row['state'] . "</td><tr>";
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
