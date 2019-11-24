<?php
//chart script: chart_days_month_total.php
	require("../include/init.php");

  //check if session is valid for login
  if(empty($_SESSION['user'])) {
  	header("Location: ". $DOCUMENT_ROOT . "/index.php");
      die("Redirecting to ". $DOCUMENT_ROOT . "/index.php");
  }
	$getCurrentYear = date("Y");
	$getYear = mysqli_query($connect,"select date_format(ts, '%Y')as year from enecsys_report group by year(ts)");
	//check how to select year and month. for now 2016
	$getMonth = mysqli_query($connect,"select date_format(ts, '%m') as month, date_format(ts, '%b')as month2 from enecsys_report where date_format(ts, '%Y') = $getCurrentYear group by month(ts) ");
	$getDay = mysqli_query($connect,"select date_format(ts, '%d')as day from enecsys_report group by day(ts)");

	$CurrentMonth = date("m");
	$CurrentMonthName = date("F, Y");

?>

<?php include ("../header.php"); ?>


<script type="text/javascript">
	$(document).ready(function() {
  	//default
  	getAjaxData(<?php echo $CurrentMonth; ?>);
    $('#dynamic_data').change(function() {
    	var id = $('#dynamic_data').val();
      getAjaxData(id);
    });
    var options = {
    	chart: {
        renderTo: 'container',
        type: 'column'
      },
      title: {
        text: '<?php echo $LANG_PAGES_MONTH_TOTAL_JS_1;?>',
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
	        text: '<?php echo $LANG_PAGES_MONTH_TOTAL_JS_2;?>'
        },
      plotLines: [{
        value: 0,
        width: 1,
        color: '#808080'
      }]
    },
    tooltip: {
  	  //headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
     // pointFormat: '<span style="color:{point.color}">{point.name}</span>:<b>{point.y}</b>'
	  pointFormat: '<span style="color:{point.color}"></span><b>{point.y} Wh</b>'
    },
    plotOptions: {
		series: {
			borderWidth: 0,
			dataLabels: {
				enabled: true,
				format: '{point.y}'
		    }
		}
	},
	credits: {
        enabled: true
    },
    series: []
  	};
  	function getAjaxData(month) {
  		$.getJSON("../charts/chart_days_month_total.php", {month: month}, function(json) {
    		options.xAxis.categories = json[0]['data']; //xAxis: {categories: []}
      	options.series[0] = json[1];
      	chart = new Highcharts.Chart(options);
    	});
  	}
	});
</script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
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
                <h3><?php echo $LANG_PAGES_MONTH_TITLE;?> | <?php echo $getCurrentYear; ?> </h3>
      	      </div>
              <div class="col-md-6">
	              <div  class="pull-right" style="background: #fff; cursor: pointer; padding: 0px 0px; border: 1px solid #ccc">
									<select id="dynamic_data">
										<option value=""><?php echo $LANG_PAGES_MONTH_SELECT;?></option>
											<?php
												while($row1 = mysqli_fetch_assoc($getMonth)){
													echo "<option value = '" . $row1['month'] . "'>" . $row1['month2'] .  "</option>";
												}
												?>
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


			<!-- footer content -->
			<?php include ("../footer.php"); ?>
