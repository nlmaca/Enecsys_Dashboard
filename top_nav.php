
<?php
$CountAlert =  mysqli_query($connect,"select * from alerts where status = 9");

$AllAlerts = mysqli_query($connect,"select device, note_short, img_url, last_check from alerts where status = 9");

?>
<nav class="" role="navigation">
	<div class="nav toggle">
		<a id="menu_toggle"><i class="fa fa-bars"></i></a>
	</div>
	<ul class="nav navbar-nav navbar-right">
		<li class="">
				<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<img src="<?php echo $DOCUMENT_ROOT;?>/img/coffee.png" alt=""><?php echo $_SESSION['user']; ?>
						<span class=" fa fa-angle-down"></span>
				</a>
				<ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
					<li>
						<a href="<?php echo $DOCUMENT_ROOT;?>/logout.php"><i class="fa fa-sign-out pull-right"></i> <?php echo $LANG_TOPNAV_LOGOUT;?></a>
					</li>
				</ul>
			</li>
			<li class="">
				<?php
				if ($CountAlert->num_rows > 0) {
						$CountBox = mysqli_num_rows($CountAlert);
					echo "<li role='presentation' class='dropdown'>
								<a href='javascript:;' class='dropdown-toggle info-number' data-toggle='dropdown' aria-expanded='false'>
								<i class='fa fa-envelope-o'></i>
								<span class='badge bg-red'>". $CountBox . "</span></a>
								<ul id='menu1' class='dropdown-menu list-unstyled msg_list animated fadeInDown' role='menu'>";
					if ($AllAlerts->num_rows > 0) {
						while($row=mysqli_fetch_array($AllAlerts)){
							echo "<li><a><span class='image'><img src='" . $row['img_url'] . "' alt='' /></span>
										<span><span>" . $row['last_check'] . "</span>
										<span class='time'>" . $row['device'] . "</span>
										</span><span class='message'>" . $row['note_short'] . "</span></a></li>";
						}
					}
					echo "</ul></li>";
				}

				elseif ($CountAlert->num_rows == 0) {
					echo "<li role='presentation' class='dropdown'>
								<a href='javascript:;' class='dropdown-toggle info-number' data-toggle='dropdown' aria-expanded='false'>
								<i class='fa fa-envelope-o'></i><span class='badge bg-green'>0</span></a></li>";
				}
				?>
			</li>
	</ul>
</nav>
