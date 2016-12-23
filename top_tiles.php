<?php
include ('currency_symbols.php');
//	$getYear = mysqli_query($connect,"select date_format(ts, '%Y')as year from enecsys_report group by year(ts)");
	//$getMonth = mysqli_query($connect,"select date_format(ts, '%b')as month from enecsys_report group by month(ts)");
	//$getDay = mysqli_query($connect,"select date_format(ts, '%d')as day from enecsys_report group by day(ts)");


	//block 1 + 2
	//$currentNow = mysqli_query($connect, "select dcpower as current from enecsys where id = 0 order by ts desc limit 1");

	//block 3
	//get total inverters
	$invertersTotal = mysqli_query($connect, "SELECT count(*) as countinv from inverters");

		//block 4
	//calculate opbrengst
	$todayTotal = mysqli_query($connect, "SELECT max(wh) - min(wh) as whtotal from enecsys where id = 0 and date(ts) = curdate()");
	while($row = mysqli_fetch_array($todayTotal)){
		$whtotal = $row['whtotal'];
	}

	$PricekWh = mysqli_query($connect, "select lang, currency, kwh_price from system_settings limit 1");
	while($row = mysqli_fetch_array($PricekWh)){
		$PriceNew = $row['kwh_price'];
		$cur = $row['currency'];

		$currency = $currency_symbols[$cur];
	}



	$PriceSet = ($whtotal / 1000) * $PriceNew;
	$whtotal_All = $whtotal / 1000;
	if ($language == 'ENG') {
		$price_today = number_format($PriceSet, 2, '.', '');
		$earnings_today = number_format($whtotal_All, 2, '.', '');
	//	$currency = "&#80; ";
	}
	elseif ($language == 'NL'){
		$price_today = number_format($PriceSet, 2, ',', '');
		$earnings_today = number_format($whtotal_All, 2, ',', '');
	//	$currency = "&#75; ";
	}

	//block 5
	// calculate total days on data
	$totalUptime = mysqli_query($connect, "select datediff(max(ts), min(ts)) as uptime from enecsys_report");
	while($row = mysqli_fetch_array($totalUptime)){
		$uptime = $row['uptime'];

	}
	$totalDaysData = $uptime ;

	//block 6
	//current date
	$currentDate = date("Y-m-d");

	//next line below the blocks
	//calculate if latest pulse data (id=0) is older than 1 hour
	$latestPulse = mysqli_query($connect, "SELECT ts, dcpower FROM `enecsys` where id = 0 order by ts desc limit 0,1");
	if ($latestPulse->num_rows > 0) {
		while($row = mysqli_fetch_array($latestPulse)){
			$outputTime = $row['ts'];
			//$currentNow = $row['dcpower'];

			if(strtotime($outputTime) < strtotime('-1 hour')){
					$lastpulse = "<span class='count_bottom'>" . $LANG_TOPTILE_LAST_PULSE  .  "<i class='red'>" . $outputTime . "</i> / Longer than 1 hour ago</span>";
					$currentNow = 0;
			}
			else {
				$lastpulse = "<span class='count_bottom'>" . $LANG_TOPTILE_LAST_PULSE  .  "<i class='green'>" . $outputTime . "</i></span>";
				$currentNow = $row['dcpower'];
			}
		}
	}
	else {
		$outputTime = 0;
		$currentNow = 0;
		$lastpulse = "<span class='count_bottom'><b><i class='red'>" . $LANG_TOPTILE_NO_INPUT . $LANG_TOPTILE_LAST_PULSE . $outputTime . $LANG_TOPTILE_OVERTIME . "</i></b></span>";
	}

?>
<div class="row tile_count">
	<div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
  	<div class="left"></div>
    <div class="right">
      <span class="count_top"><i class="fa fa-plug"></i> <?php echo $LANG_TOPTILE_CURRENT; ?></span>
      <div class="count">
				<?php echo $currentNow . ' W'; ?>
			</div>
    </div>
  </div>
  <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
    <div class="left"></div>
    <div class="right">
      <span class="count_top"><i class="fa fa-bolt"></i> <?php echo $LANG_TOPTILE_CURRENT_TT; ?></span>
      <div class="count">
				<?php
					echo $earnings_today . " kWh";
				?>
			</div>
    </div>
  </div>
  <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
    <div class="left"></div>
    <div class="right">
      <span class="count_top"><i class="fa fa-wifi"></i> <?php echo $LANG_TOPTILE_CURRENT_TINV; ?></span>
      <div class="count">
				<?php
					while($row = mysqli_fetch_assoc($invertersTotal)){
						echo $row['countinv'];
					}
				?>
			</div>
    </div>
  </div>
  <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
    <div class="left"></div>
    <div class="right">
      <span class="count_top"><i class="fa fa-money"></i> <?php echo $LANG_TOPTILE_CURRENT_ET; ?></span>
      <div class="count">
				<?php
					echo $currency . " " .  $price_today;
				?>
			</div>
    </div>
  </div>
  <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
    <div class="left"></div>
    <div class="right">
      <span class="count_top"><i class="fa fa-clock-o"></i> <?php echo $LANG_TOPTILE_CURRENT_DOD; ?></span>
      <div class="count"><?php echo $totalDaysData; ?></div>
		</div>
  </div>
  <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
    <div class="left"></div>
    <div class="right">
      <span class="count_top"><i class="fa fa-calendar"></i> <?php echo $LANG_TOPTILE_CURRENT_DATE; ?></span>
      <div class="count"><?php echo $currentDate; ?></div>
		</div>
  </div>
</div>
<?php echo $lastpulse; ?> <br>
