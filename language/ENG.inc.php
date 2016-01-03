<?php 
/* 
language file english 
top page: <?php include ('../../language/' . $language . '.inc.php'); ?>
<?php echo $LANG_INVERTER; ?>
*/
// page version: 2.2
//Intro
$LANG_UPDATED = 'No of rows updated: '; 

//index login page /index.php
$LANG_LOGINUSERNAME = 'Username';
$LANG_LOGINPASSWORD = 'Password';
$LANG_lOGINEMAIL = 'Email';
$LANG_SIGNIN = 'Sign in';

//HEADER - /header.php
$LANG_HEADER_SHOW_MENU = 'Show menu';
$LANG_HEADER_HISTORY = 'History';
$LANG_HEADER_OVERVIEW = 'Overview';
$LANG_HEADER_SETTINGS = 'Settings';
$LANG_HEADER_INVERTERS = 'Inverters';
$LANG_HEADER_DB = 'DB performance';
$LANG_HEADER_USERS = 'Users';
$LANG_HEADER_OVERVIEW_USERS = 'User overview';
$LANG_HEADER_LOGOFF = 'Logout';

//live page /products/solar/overview & overview_inverter.php
$LANG_LIVE_STATE = 'State: ';
$LANG_LIVE_TODAY = 'Today';
$LANG_LIVE_PANEL = 'Panel: ';
$LANG_LIVE_LAST_UPDATE = 'Last update';
$LANG_LIVE_POWER = 'Power(wh)';
$LANG_LIVE_DC_CURRENT = 'DC Current(amp)';
$LANG_LIVE_AC_CURRENT = 'AC Current(amp)';
$LANG_LIVE_AC_FREQ = 'AC Freq';
$LANG_LIVE_DC_VOLT = 'DC Volt';
$LANG_LIVE_AC_VOLT = 'AC Volt';
$LANG_LIVE_TEMP = 'Temp';
$LANG_LIVE_EFF = 'Efficiency';
$LANG_LIVE_SOLAR_STATE = 'Solar State';
$LANG_LIVE_KWH = 'Kwh';
$LANG_LIVE_START_VALUE = 'Start value';
$LANG_LIVE_END_VALUE = 'End value';
//$LANG_LIVE_CURRENT = 'Current(Watt)'; - changed in 2.2
$LANG_LIVE_PANEL_1 = 'Panel 1';
$LANG_LIVE_PANEL_2 = 'Panel 2';
$LANG_LIVE_SOFAR = 'So far Today';
$LANG_INVERTER_INFO = 'Inverter information';

//page: products/history/index.php
$LANG_FROMDATE = 'From Date: ';
$LANG_TODATE = 'Until Date: ';
$LANG_SELECT_INVERTER = 'Select Inverter: ';
$LANG_HISTORY_INFO = 'Make sure you have updated the history table (Settings->DB performance)<br> Date setting: yyyy-mm-dd';

//db performance and subpages /performance/optimize_database.php
$LANG_DB_GETDATA = 'Retreiving data, be patient';
$LANG_DB_INSDATA = 'Inserting data, be patient';
$LANG_DB_CHECKDATA = 'Checking data, be patient';
$LANG_DB_DELDATA = 'Deleting data, be patient';

//db step 1
$LANG_DB_STEP1_SUB1 = '[1] Compare tables';
$LANG_DB_STEP1_SUB2 = 'Click compare to check results';
$LANG_DB_STEP1_RESULT = 'Time to upgrade history table. Go to step 2';
$LANG_DB_STEP1_RESULT2 = 'History table is already up to date Go to step 3 ';

//db step 2
$LANG_DB_STEP2_SUB1 = '[2] Upgrade history';
$LANG_DB_STEP2_SUB2 = 'Click upgrade to update history';

//db step 3
$LANG_DB_STEP3_SUB1 = '[3] Select to be deleted';
$LANG_DB_STEP3_SUB2 = 'select data older then 2 days';
$LANG_DB_STEP3_RESULT = 'that can be deleted';
$LANG_DB_STEP3_RESULT2 = 'Table is up to date. Done';

//db step 4
$LANG_DB_STEP4_SUB1 = '[4] Purge master table';
$LANG_DB_STEP4_SUB2 = 'Click the button to do the job';

//general
$LANG_NR_ROWS = 'No of Rows';
$LANG_ROWS_INSERTED = 'Rows inserted: ';
$LANG_ROWS_FOUND = 'Rows found: ';
$LANG_ROWS_DELETED = 'Rows deleted: ';
$LANG_INVERTER = 'Inverter ';
$LANG_INVERTER_SHORT = 'Inv ';
$LANG_INVERTER_TYPE = 'Type ';
$LANG_INVERTER_DUO = 'Duo/Single ';
$LANG_INVERTER_PARTNR = 'Part no ';
$LANG_BUILD_DATE = 'Build date ';
$LANG_HOUR = 'Hour';
$LANG_DAY = 'Day';
$LANG_MONTH = 'Month';
$LANG_YEAR = 'Year';
$LANG_SELECT_OPTION = 'Option: ';
$LANG_TOTAL_WH = 'Total Wh';
$LANG_APPLICATION_INFO = 'Application Information';
$LANG_START_VALUE = 'Start value';
$LANG_END_VALUE = 'End value';
$LANG_AVG_TEMP = 'Avg temp';
$LANG_YEARDAY = 'Year day';
$LANG_FROM = 'From: ';
$LANG_TO = 'Until: ';
$LANG_USERNAME = 'Username';
$LANG_EMAIL = 'Email';
$LANG_USER_INFO = 'User Information';

//STRINGS
$LANG_NO_INV_SELECTED = 'No inverter selected';
$LANG_WH_DAY = 'Total wh by day ';
$LANG_WH_DAY_HR = 'Total wh by hour for day: ';
$LANG_INVDEL_SUCCESS = 'Succesfully removed inverter ';
$LANG_INVINS_SUCCESS = 'Succesfully inserted inverter ';
$LANG_UPD_SUCCESS = 'Succesfully updated settings';

//buttons
$LANG_BUTTON_BACK_OVERVIEW = 'Back to overview';
$LANG_BUTTON_GETDATA = 'Get Data';
$LANG_BUTTON_CREATE = 'Create';
$LANG_BUTTON_CREATE_USER = 'Create User';
$LANG_BUTTON_DELETE = 'Delete';
$LANG_BUTTON_EDIT = 'Edit';
$LANG_BUTTON_CANCEL = 'Cancel';
$LANG_BUTTON_SAVE = 'Save';
$LANG_BUTTON_ADD_INVERTER = 'Add inverter';

//ERRORS
$LANG_ERROR_RAG = 'There might be an error. Run it again';
$LANG_ERROR_NDF = 'No Data Found';
$LANG_LIVE_ERROR_NODATA = 'NO DATA';
$LANG_LIVE_ERROR_NODATA_1 = 'Check if enecsys gateway is running? Is this a valid inverter number? Possible reboot RPI';
$LANG_LIVE_ERROR_INV_EMPTY = 'Inverter table is empty';
?>