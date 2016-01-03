<?php
// page version: 2.2
require("inc/general_conf.inc.php");
if(empty($_SESSION['user'])) {
    header("Location: index.php");
    die("Redirecting to index.php"); 
}
include ("header.php"); 
include 'language/' . $language . '.inc.php'; 
//---------------------------------------------------------------
echo "Page after login<br>";
?>
<div class="container">
  <h2>Version: 2.1.1</h2>
  <div class="panel panel-default">
    <div class="panel-body">
           - created web installer for new installation (database has to be created though)<br>
           - created this page with some default information<br>
           - created pvoutput page, where the team page will be displayed (around 56 members already :D)<br>
           - updated version font-awesome to 4.5.0
        
    </div>
  </div>
</div>

<div class="container">
  <h2>Version: 2.1</h2>
  <div class="panel panel-default">
    <div class="panel-body">Bugfixing:<br>
        - added jquery datepicker to history selection (wasn't working in IE).<br>
        - added jquery datepicker to inverter page<br>
        - added some text information. to create history views, you need to update the history table first.<br>
    
    </div>
  </div>
</div>

<div class="container">
  <h2>Version: 2.0 - Stable release</h2>
  <div class="panel panel-default">
    <div class="panel-body">
      - First release of the rebuild dashboard<br>
    </div>
  </div>
</div>


<?php 
/*
MENU:users:
- show all users that are present. password cant be edited in this version yet (create new user and delete the old one).
- users can only be deleted when there is more then 1 present. this will prevent that all users will be accidently deleted

MENU:settings:
: Inverters
- inverters can be created and edited and deleted. when edited more info will be visable
- edit inverter build date is handled by jquery
- inverter is not checked yet if it exists or not (next version)
: DB Performance
- created scripts for checking current table, update to history table, clean master table 

MENU:history;
:  Overview (table results)
- will be used for showing history data
- startdate == end date = will show information on the hour for that day
- startdate != end date = will show information by day within that date range
- more to come

- Charts (chart results) will be done in next version

MENU: LIVE:
- page will refresh every 60 seconds
- will give a live overview of the inverters that are set in the settings->inverters page
- by clicking on the [?] you will see detailed information
- it will show different icons for the inverters based on the inverter status
- 0 = normal to grid - light. should give this state when there are no problems. will give smiley icon
- 1 = not enough light (mostly when dark) -> will show moon icon
- 3 = other reason for no light. will give a cloud icon in the background
- else = should not give this state, but had to build in something ;) will give sun icon 

Logout:
- speaks for it self
*/
?>
<?php
include("footer.php");
?>