<div class="container body">
	<div class="main_container">
		<div class="col-md-3 left_col">
			<div class="left_col scroll-view">
				<div class="navbar nav_title" style="border: 0;">
					<a href="<?php echo $DOCUMENT_ROOT;?>/index.php" class="site_title"><i class="fa fa-th"></i> <span><?php echo $LANG_SIDEBAR_TITLE; ?></span></a>
				</div>
				<div class="clearfix"></div>

				<!-- menu prile quick info -->
				<div class="profile">
					<div class="profile_pic">
						<img src="<?php echo $DOCUMENT_ROOT;?>/img/coffee.png" alt="..." class="img-circle profile_img">
					</div>
					<div class="profile_info">
						<span><?php echo $LANG_LOGIN_USER_WELCOME;?></span>
						<h2><?php echo $_SESSION['user'];?></h2>
					</div>
				</div>
				<!-- /menu prile quick info -->

				<!-- sidebar menu -->
				<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
					<div class="menu_section">
						<h3>General</h3>
						<ul class="nav side-menu">
							<li>
								<a><i class="fa fa-dashboard"></i> <?php echo $LANG_SIDEBAR_LIVE; ?><span class="fa fa-chevron-down"></span></a>
								<ul class="nav child_menu" style="display: none">
									<li><a href="<?php echo $DOCUMENT_ROOT;?>/pages/page_live_total.php"><?php echo $LANG_SIDEBAR_LIVE_1; ?></a></li>
									<li><a href="<?php echo $DOCUMENT_ROOT;?>/pages/widget_live_inverters.php"><?php echo $LANG_SIDEBAR_LIVE_2; ?></a></li>
									<li><a href="<?php echo $DOCUMENT_ROOT;?>/pages/page_current_single_converter.php"><?php echo $LANG_SIDEBAR_LIVE_3; ?></a></li>
								</ul>
							</li>
							<li><a><i class="fa fa-bar-chart-o"></i> <?php echo $LANG_SIDEBAR_HISTORY; ?> <span class="fa fa-chevron-down"></span></a>
								<ul class="nav child_menu" style="display: none">
									<li><a href="<?php echo $DOCUMENT_ROOT;?>/pages/page_days_month_total.php"><?php echo $LANG_SIDEBAR_HISTORY_DAY; ?></a></li>
									<li><a href="<?php echo $DOCUMENT_ROOT;?>/pages/page_days_month_inverter.php"><?php echo $LANG_SIDEBAR_HISTORY_DAY_INV; ?></a></li>
									<li><a href="<?php echo $DOCUMENT_ROOT;?>/pages/page_table_inverter.php"><?php echo $LANG_SIDEBAR_HISTORY_DAY_INV_T; ?></a></li>
									<li><a href="<?php echo $DOCUMENT_ROOT;?>/pages/page_table_week_inverter.php"><?php echo $LANG_SIDEBAR_HISTORY_WEEK_INV_T; ?></a></li>
									<li><a href="<?php echo $DOCUMENT_ROOT;?>/pages/page_table_month_inverter.php"><?php echo $LANG_SIDEBAR_HISTORY_MONTH_INV_T; ?></a></li>
									<li><a href="<?php echo $DOCUMENT_ROOT;?>/pages/page_total_week.php"><?php echo $LANG_SIDEBAR_HISTORY_WEEK_INV; ?></a></li>
									<li><a href="<?php echo $DOCUMENT_ROOT;?>/pages/page_total_month.php"><?php echo $LANG_SIDEBAR_HISTORY_MONTH; ?></a></li>
									<li><a href="<?php echo $DOCUMENT_ROOT;?>/pages/page_total_year.php"><?php echo $LANG_SIDEBAR_HISTORY_YEAR; ?></a></li>
								</ul>
							</li>
							<li><a><i class="fa fa-cogs"></i> <?php echo $LANG_SIDEBAR_SETTINGS; ?> <span class="fa fa-chevron-down"></span></a>
								<ul class="nav child_menu" style="display: none">
									<li><a href="<?php echo $DOCUMENT_ROOT;?>/pages/settings_inverter_overview.php"><?php echo $LANG_SIDEBAR_SETTINGS_INVERTERS; ?></a></li>
									<li><a href="<?php echo $DOCUMENT_ROOT;?>/pages/settings_system_overview.php"><?php echo $LANG_SIDEBAR_SETTINGS_SYSTEM; ?></a></li>
									<li><a href="<?php echo $DOCUMENT_ROOT;?>/pages/settings_e2pv_overview.php"><?php echo $LANG_SIDEBAR_SETTINGS_E2PV; ?></a></li>
									<li><a href="<?php echo $DOCUMENT_ROOT;?>/pages/settings_user_overview.php"><?php echo $LANG_SIDEBAR_SETTINGS_USERS; ?></a></li>
								</ul>
							</li>
							<li><a><i class="fa fa-server"></i> <?php echo $LANG_SIDEBAR_SYSTEM; ?> <span class="fa fa-chevron-down"></span></a>
								<ul class="nav child_menu" style="display: none">
									<li><a href="<?php echo $DOCUMENT_ROOT;?>/pages/usage_system.php"><?php echo $LANG_SIDEBAR_SYSTEM_USAGE; ?></a></li>
									<li><a href="<?php echo $DOCUMENT_ROOT;?>/pages/backup_system.php"><?php echo $LANG_SIDEBAR_SYSTEM_BACKUP; ?></a></li>
									<li><a href="<?php echo $DOCUMENT_ROOT;?>/pages/reset_system.php"><?php echo $LANG_SIDEBAR_SYSTEM_REBOOT; ?></a></li>
								</ul>
							</li>
							<li><a><i class="fa fa-windows"></i> <?php echo $LANG_SIDEBAR_PVOUTPUT; ?> <span class="fa fa-chevron-down"></span></a>
								<ul class="nav child_menu" style="display: none">
									<li><a href="<?php echo $DOCUMENT_ROOT;?>/pages/page_pvoutput_t.php"><?php echo $LANG_SIDEBAR_PVOUTPUT_TEAM; ?></a></li>
									<li><a href="<?php echo $DOCUMENT_ROOT;?>/pages/page_pvoutput_p.php"><?php echo $LANG_SIDEBAR_PVOUTPUT_PERSONAL; ?></a></li>
								</ul>
							</li>
							<li><a><i class="fa fa-question-circle-o "></i> <?php echo $LANG_SIDEBAR_HELP; ?> <span class="fa fa-chevron-down"></span></a>
								<ul class="nav child_menu" style="display: none">
									<li><a href="<?php echo $DOCUMENT_ROOT;?>/pages/page_help.php"><?php echo $LANG_SIDEBAR_HELP; ?></a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
<!-- /sidebar menu -->
<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
	<a href="https://github.com/nlmaca" target="_blank" data-toggle="tooltip" data-placement="top" title="Github">
		<span class="fa fa-github-alt" aria-hidden="true"></span>
	</a>
	<a href="#" target="_blank" data-toggle="tooltip" data-placement="top" title="Bite me :D">
		<span class="fa fa-linkedin" aria-hidden="true"></span>
	</a>
	<a href="https://paypal.me/nlmaca" target="_blank" data-toggle="tooltip" data-placement="top" title="Donate">
		<span class="fa fa-paypal" aria-hidden="true"></span>
	</a>
	<a href="https://www.vanmarion.nl" target="_blank" data-toggle="tooltip" data-placement="top" title="Website">
		<span class="fa fa-globe" aria-hidden="true"></span>
	</a>
</div>
<!-- /menu footer buttons -->
