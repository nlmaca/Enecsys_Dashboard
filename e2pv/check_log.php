<?php
	$filename = 'e2pv.log';
	if (filesize($filename) == 0) {
	  echo "file is empty";
	  //TODO insert into mysql alert status gateway -> message in top nav bar
	  // mysql: if device not exists insert, else update
	  // device, descr_short, descr_long, status (0 = solved, 9 = error)
	}
	else {
	  echo "log is not empty";
	  // update alerts device = status 0
	}
?>
