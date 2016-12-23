<?php
// system version: 3.0
// page version: 1.0
        require("../include/config.php");

/*
upgrade proces to dashboard V3.0
- create backup of your current database -> script: /upgrade/backupDB.php
- create new tables
import upgrade_tables.sql into your database
- merge enecsys_history into enecsys table -> script: /upgrade/merge_enecsys_history.php
will run once to merge enecsys_history with enecsys.
after merge table enecsys_history will be dropped. table is of no usage anymore

you can run the script from the cron directory manually or let it run automaticly and check back tomorrow
this script needs to run when you have version 2.x of the dashboard.

*/

//added august 1 , 2016 - get rid of timeout error
set_time_limit(0);

$count = mysqli_query($connect,"select * from enecsys_history");
$nrrows = mysqli_affected_rows($connect);
//echo "Aantal rijen: " . $nrrows;
if ($nrrows > 0) {
  while($row=mysqli_fetch_array($count)) {
	  $sql = mysqli_query($connect,"insert into enecsys select * from enecsys_history");
  		$nrrows2 = mysqli_affected_rows($connect);
      if ($nrrows == $nrrows2) {
      // if all rows are copied to main table its time to delete the history table
        $clean = mysqli_query($connect,"drop table enecsys_history");
        echo "Merge success. <br> ";
				echo "Nr rows total: " . $nrrows . " | Rows merged: " . $nrrows2 . "<br>";
				echo "Merge success. <br> Old enecsys_history table will be dropped: <br>";
	    }
      else {
				"Something went wrong";
        //insert not worked
      }
  }
}
else {
	echo "no data or table already cleaned";
  //do nothing. no data present to merge
}

mysqli_close($connect);
?>
