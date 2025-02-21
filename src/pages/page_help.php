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
    	<div class="row">
      	<div class="col-md-12 col-sm-12 col-xs-12">
        	<div class="dashboard_graph x_panel">
  	      	<div class="x_title">
				<h2><i class="fa fa-align-left"></i> Help / Troubleshooting <small>Enecsys Dashboard</small></h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<!-- start accordion -->
				<div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
					
  					<!-- next accordion -->
					<div class="panel">
					    <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							<h4 class="panel-title">Dashboard Settings</h4>
						</a>
						<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
							<div class="panel-body">
								There are some important settings in the dashboard that need to be correct in order to let it work.<br /><br />
								<b><a href="settings_inverter_overview.php">Settings > Inverters</b></a><br />
								<table class="table table-bordered">
									<thead>
										<tr>
										    <th>Field</th>
										    <th>Value</th>
										</tr>
									</thead>
									<tbody>
										<tr>
										    <td>Inverter</td>
										    <td>This is the inverter number. They will mostly start with a 1 and are about 9 characters long.</td>
										</tr>
										<tr>
											<td>Inverter type</td>
											<td>Select the type of your inverter</td>
										</tr>
										<tr>
											<td>Part No</td>
											<td>Optional field</td>
										</tr>
										<tr>
										    <td>Build date</td>
										    <td>Optional field</td>
										</tr>
										<tr>
										    <td>Duo/Single</td>
										    <td>Select the right one for that inverter</td>
										</tr>
										<tr>
										    <td>Watt Panel 1</td>
										    <td>If you have a single inverter only fill in <u>only</u> this field. the total Watt of the solar panel</td>
										</tr>
										<tr>
										    <td>Watt Panel 2</td>
										    <td>If you have a duo inverter fill in <u>both</u> fields. the total Watt of each solar panel</td>
										</tr>
									</tbody>
								</table>
								<!-- next one -->
								<b>Settings > General</b><br />
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>Field</th>
											<th>Value</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Enecsys Gateway IP</td>
											<td>Fill in the ipaddress of the Enecsys Gateway. A cronjob will check every 30 minutes if the gateway is online based on this ipaddress</td>
										</tr>
										<tr>
											<td>Language</td>
											<td>Dutch or English</td>
										</tr>
										<tr>
											<td>City</td>
											<td>Optional field</td>
										</tr>
										<tr>
											<td>Country</td>
											<td>Select your Country</td>
										</tr>
										<tr>
											<td>Timezone</td>
											<td>Select your timezone</td>
										</tr>
										<tr>
											<td>kWh Price</td>
											<td>Use a <u>dot(.)</u> when filling this field. It will use this field for calculation your earnings. Example 22 cent will be 0.22</td>
										</tr>
										<tr>
											<td>Temperature</td>
											<td>Select Celius or Farenheit. Will be used in history</td>
										</tr>
										<tr>
											<td>PV output ID</td>
											<td>Your Personal ID from PVOutput* (see pvo)</td>
										</tr>
										<tr>
											<td>PV Output System ID</td>
											<td>Your systemid from PVOutput</td>
										</tr>
										<tr>
											<td>PV Output Team ID</td>
											<td>I would appreciate it if you would join the team. Fill in the id. (should be 1018)</td>
										</tr>
										<tr>
											<td>PV Output Team Name</td>
											<td>Default set to Tweakser ;)</td>
										</tr>
									</tbody>
								</table>
								To find your PVOutput ID go to your pvoutput page. In the browser you can see the url which contains your personal id and systemid<br />
								Example: http://www.pvoutput.org/list.jsp?id=39831&sid=36423 where as 39831 is your personal id and 36423 is your system id<br /><br />
								<img class="img-responsive" src="../img/help/pvoutput_url_pid_sysid.png" alt="" title="" />
								The most important settings of them all. <br />
								<!-- next one -->
								<b>Settings > E2PV</b><br />
								make sure to fill in the right settings. If you don't the dashboard will not work! (total inverters, apikey, pvoutput system id). <br />
								Your PVOutput apikey en system id you can find in pvoutput (settings):<br />
								<img class="img-responsive" src="../img/help/pvoutput_api.png" alt="" title=""/>
								<br />
								Ignore inverters is used if for example your neighbor has the same inverters, but you don't want to see them in your dashboard and pvoutput
								<br /><br />
								<!-- next one -->
								<b>Settings > users</b><br />
								you can add and change users. Always 1 user stays present. Default user: admin / password: dashboard<br />
								Advice is to change the admin password. Emailadress is not used. It was part of the script i used.
							</div>
						</div>
					</div>
					<!-- next accordion -->
					<div class="panel">
						<a class="panel-heading collapsed" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							<h4 class="panel-title">Automatic cronjobs / Schedules</h4>
						</a>
						<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
							<div class="panel-body">
								<ul class="list-unstyled timeline">
									<li>
										<div class="block">
											<div class="tags">
												<a href="" class="tag"><span>@reboot</span></a>
											</div>
											<div class="block_content">
												<h2 class="title">The actual e2pv script for collecting data</h2>
												<div class="byline">
													<span>cron: @reboot</span>
												</div>
												<p class="excerpt">This script will collect all data coming from the enecsys gateway. It will insert all data into the database and will send every 10minutes data to pvoutput.
												</p>
											</div>
										</div>
									</li>
									<li>
										<div class="block">
											<div class="tags">
												<a href="" class="tag"><span>0:01 AM</span></a>
											</div>
											<div class="block_content">
												<h2 class="title">Generating reports</h2>
												<div class="byline">
													<span>cron: 0:01 AM every day</span>
												</div>
												<p class="excerpt">Will generate the daily reports and after that clean the main table (enecsys)
												</p>
											</div>
										</div>
									</li>
									<li>
										<div class="block">
											<div class="tags">
												<a href="" class="tag"><span>03:00 AM</span></a>
											</div>
											<div class="block_content">
												<h2 class="title">Backup of webdirectory</h2>
													<div class="byline">
														<span>cron: every night at 03:00 AM</span>
													</div>
													<p class="excerpt">This will backup your solar dashboard directory. You can download the copy from the dashboard.
													</p>
												</div>
											</div>
										</li>
										<li>
											<div class="block">
												<div class="tags">
													<a href="" class="tag"><span>04:00 AM</span></a>
												</div>
												<div class="block_content">
													<h2 class="title">Backup of database</h2>
													<div class="byline">
														<span>cron: every night at 04:00 AM</span>
													</div>
													<p class="excerpt">This will backup your solar dashboard database. You can download the copy from the dashboard. Backup rotation is 7 days
													</p>
												</div>
											</div>
										</li>
										<li>
											<div class="block">
												<div class="tags">
													<a href="" class="tag"><span>05:00 AM</span></a>
												</div>
												<div class="block_content">
													<h2 class="title">Cleanup of database- and file backups</h2>
														<div class="byline">
															<span>cron: every night at 04500 AM</span>
														</div>
														<p class="excerpt">This will delete old backups (older then 4 days). Backup rotation is 4 days
														</p>
												</div>
											</div>
										</li>
										<li>
											<div class="block">
												<div class="tags">
													<a href="" class="tag"><span>10 min</span></a>
												</div>
												<div class="block_content">
													<h2 class="title">Check log</h2>
													<div class="byline">
														<span>cron: Every 10 minutes</span>
													</div>
													<p class="excerpt">I had plans on building this process to check if the log file was being filled, but decided to skip this process. Maybe in a bugfix update i will delete this process.
													It is no harm to the system and doesn't do much.
													</p>
												</div>
											</div>
										</li>
										<li>
											<div class="block">
												<div class="tags">
													<a href="" class="tag"><span>30 min</span></a>
												</div>
												<div class="block_content">
													<h2 class="title">Will check if gateway is still online</h2>
													<div class="byline">
														<span>cron: every 30 minutes</span>
													</div>
													<p class="excerpt">Every 30minutes it will ping the ipadress that is set in the dashboard. its a known issue that the gateway has smilies, but it somehow becomes unreachable.
													You have to reboot the gateway if the notice occurs.
													</p>
												</div>
											</div>
										</li>
										<li>
											<div class="block">
												<div class="tags">
													<a href="" class="tag"><span>30 min</span></a>
												</div>
												<div class="block_content">
													<h2 class="title">Will check if data is coming in from an inverter</h2>
													<div class="byline">
														<span>cron: every 30 minutes</span>
													</div>
													<p class="excerpt">This will check if data is coming through from the inverters.
													If you get a notice, it could be possible your inverter is broken, or the inverter number is misconfigured in the settings. Make sure the settings are filled in correct.
													</p>
												</div>
											</div>
										</li>
									</ul>
							    </div>
							</div>
						</div>
						<!-- end of accordion -->
						<!-- start accordion -->
						<div class="panel">
							<a class="panel-heading collapsed" role="tab" id="headingFour" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
								<h4 class="panel-title">Status codes Inverters</h4>
							</a>
							<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
								<div class="panel-body">
									Live status > Output [All inverters]<br />
									On the widget dashboard will see some icons in the panels. <br />
									<table class="table table-bordered">
										<thead>
											<tr>
											    <th>Status</th>
											    <th>Description</th>
											</tr>
										</thead>
										<tbody>
											<tr>
											    <td><i class='fa fa-smile-o fa-fw'></i></td>
											    <td>State 0. Data is coming through. Smiley state</td>
											</tr>
											<tr>
											    <td><i class='fa fa-moon-o fa-fw'></i></td>
											    <td>State 1. Last know state is dark/moonlight</td>
											</tr>
											<tr>
											    <td><i class='fa fa-cloud fa-fw'></i></td>
											    <td>State 3. Data is coming through, but it is cloudy</td>
											</tr>
											<tr>
											    <td><i class='fa fa-sun-o fa-fw'></i></td>
											    <td>If any other state. Inverter is ok, but no data coming through. You won't see this one normally</td>
											</tr>
											<tr>
												<td><i class='fa fa-exclamation-triangle' style='color:red;'></i></td>
												<td>If the inverter is misconfigured or not sending data it will show a warning</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<!-- end of accordion -->
						<!-- start accordion -->
						<div class="panel">
							<a class="panel-heading collapsed" role="tab" id="headingFive" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
								<h4 class="panel-title">Alert Notices</h4>
							</a>
							<div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
								<div class="panel-body">
									There is mailbox icon on the top right screen. This will show info about your Enecsys Gateway and inverters<br />
									There are 2 cronjobs running every 30 minutes to check the gateway and inverter status<br />
									<h4>Gateway issues:</h4><br />
									<img class="img-responsive" src="../img/help/inbox_warning_gw.png" alt="" title="" /><br />
									If you get this notice it can be caused by several reasons:<br />
									<ul>
										<li>The ipadress of your Enecsys Gateway is not correct. Check Settings > General	</li>
										<li>When you have set your Enecsys Gateway on dhcp and you have rebooted your router, the ipaddress can change.	</li>
										<li>The RPI can't ping the Enecsys Gateway > Reboot the Enecsys Gateway. First check the previouse 2 possibilities</li>
									</ul>
									<hr />
									<h4>Inverter issues:</h4><br />
									<img class="img-responsive" src="../img/help/inbox_warning_inverter.png" alt="" title="" /><br />
									If you get this notice it can be caused by several reasons:<br />
									<ul>
										<li>The Inverter id(serial) is not correct > Settings -> Inverters. Make sure the Id's are correct </li>
										<li>one or more of the inverters haven't received any data the last 12 hours.</li>
										<li>One of your inverters might be broken.</li>
										<li>Per inverter there will be a message, if all your inverters are listed, your gateway might not be working properly. Reboot everything</li>
									</ul>
									<hr />
									<h4>Error notice - No Data Input</h4><br />
									<img class="img-responsive" src="../img/help/no-input-data.png" alt="" title="" /><br />
									If you get this notice it can be caused by several reasons:<br />
									<ul>
										<li>You haven't set inverters. settings > Inverters </li>
										<li>No data input. Did you change the Enecsys Gateway to send data to the ipadress of the rpi?</li>
										<li>Did you reboot after the installation? If not, do it.</li>
										<li>Even when your Enecsys gateway is showing smilies and you don't see data? Reboot the Enecsys Gateway.</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- end of accordion -->
						<!-- start accordion -->
						<div class="panel">
							<a class="panel-heading collapsed" role="tab" id="headingSix" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
								<h4 class="panel-title">Credits</h4>
							</a>
							<div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
								<div class="panel-body">
									I made use of several existing tools/projects. And i think they deserve the credits:<br />
									<ul>
										<li>E2PV script:<a href="https://github.com/omoerbeek/e2pv"><b>Link Github Omoerbeek</b></a> This is where the dashboard is depending on. Thx again omoerbeek</li>
										<li>Dashboard template: <a href="https://colorlib.com/polygon/gentelella/"><b>Link Colorlib Gentelella Theme</b></a></li>
										<li>Tweakers Community: <a href="https://gathering.tweakers.net/forum/list_messages/1627615"><b>Link Tweakers Community</b></a> Thx for some users who helped me beta testing the dashboard</li>
										<li>Highcharts: <a href="http://www.highcharts.com/"><b>Link Highcharts</b></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
			<!-- end row -->
		</div>
		<!-- footer content -->
		<?php include ("../footer.php"); ?>