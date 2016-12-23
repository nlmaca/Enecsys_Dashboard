<?php
	/*
	language file english (ENG)

	*/

	//System version: 3.0
	$LANG_DASHBOARD_TITLE = 'Enecsys Solar 3.0';

	//login
	$LANG_LOGIN = "Login";
	$LANG_LOGIN_USERNAME = "Username";
	$LANG_LOGIN_PASSWORD = "Password";
	$LANG_LOGIN_USER_WELCOME = "Welcome back,";
	$LANG_LOGIN_FORM = "Login Form";

	//SideBarMenu
	$LANG_SIDEBAR_TITLE = "Enecsys Solar";

	$LANG_SIDEBAR_LIVE = "Live Status";
	$LANG_SIDEBAR_LIVE_1 = "Output [Chart]";
	$LANG_SIDEBAR_LIVE_2 = "Output [All inverters]";
	$LANG_SIDEBAR_LIVE_3 = "Output [Per inverter]";

	$LANG_SIDEBAR_HISTORY = "History Output";
	$LANG_SIDEBAR_HISTORY_DAY = "Day";
	$LANG_SIDEBAR_HISTORY_DAY_INV = "Day inverter [chart]";
	$LANG_SIDEBAR_HISTORY_DAY_INV_T = "Day inverter [table]";
	$LANG_SIDEBAR_HISTORY_WEEK_INV = "Weekly [inverter]";
	$LANG_SIDEBAR_HISTORY_WEEK_INV_T = "Week inverter [table]";
	$LANG_SIDEBAR_HISTORY_MONTH_INV_T = "Month inverter [table]";
	$LANG_SIDEBAR_HISTORY_MONTH = "Month [chart]";
	$LANG_SIDEBAR_HISTORY_YEAR = "Year [chart]";

	$LANG_SIDEBAR_SETTINGS = "Settings";
	$LANG_SIDEBAR_SETTINGS_INVERTERS = "Inverters";
	$LANG_SIDEBAR_SETTINGS_SYSTEM = "General";
	$LANG_SIDEBAR_SETTINGS_E2PV = "E2PV";
	$LANG_SIDEBAR_SETTINGS_USERS = "Users";

	$LANG_SIDEBAR_SYSTEM = "System";
	$LANG_SIDEBAR_SYSTEM_USAGE = "Usage";
	$LANG_SIDEBAR_SYSTEM_BACKUP = "Backups";
	$LANG_SIDEBAR_SYSTEM_REBOOT = "Reboot / Shutdown";

	$LANG_SIDEBAR_ALERTS = "Alerts";
	$LANG_SIDEBAR_ALERTS_1 = "Inverter Status";
	$LANG_SIDEBAR_ALERTS_2 = "System Status";

	$LANG_SIDEBAR_PVOUTPUT = "PV Output";
	$LANG_SIDEBAR_PVOUTPUT_TEAM = "PV Output Team";
	$LANG_SIDEBAR_PVOUTPUT_PERSONAL = "PV Output Personal";

	$LANG_SIDEBAR_HELP = "Help";

	//TopTiles
	$LANG_TOPTILE_CURRENT = "Current";
	$LANG_TOPTILE_CURRENT_TT = "Total Today";
	$LANG_TOPTILE_CURRENT_TINV = "Total Inverters";
	$LANG_TOPTILE_CURRENT_ET = "Earnings Today";
	$LANG_TOPTILE_CURRENT_DOD = "Days of Data";
	$LANG_TOPTILE_CURRENT_DATE = "Date";
	$LANG_TOPTILE_LAST_PULSE = "Last Pulse: ";
	$LANG_TOPTILE_NO_INPUT = "[No Input Data!] ";
	$LANG_TOPTILE_OVERTIME = " / Longer than 1 hour ago";

	//TopNav
	$LANG_TOPNAV_LOGOUT = "Log out";

	//Buttons
	$LANG_BUTTON_EDIT = "Edit";
	$LANG_BUTTON_EDIT_SETTINGS = "Edit Settings";
	$LANG_BUTTON_ADD = "Add";
	$LANG_BUTTON_ADD_INVERTER = "Add Inverter";
	$LANG_BUTTON_SAVE = "Save";
	$LANG_BUTTON_UPDATE = "Update";
	$LANG_BUTTON_DELETE = "Delete";
	$LANG_BUTTON_DELETE_INVERTER = "Delete Inverter";
	$LANG_BUTTON_CANCEL = "Cancel";
	$LANG_BUTTON_IGNORE_INVERTER_ADD = "Add Ignore Inverter";
	$LANG_BUTTON_OVERVIEW = "Back to overview";
	$LANG_BUTTON_REBOOT = "Reboot RPI";
	$LANG_BUTTON_SHUTDOWN = "Shutdown RPI";
	$LANG_BUTTON_BACK = "Back";
	$LANG_BUTTON_OVERVIEW = "Overview";
	$LANG_BUTTON_CREATE_USER = "Create User";
	$LANG_BUTTON_PASS_RESET = "Reset Password";


	//Error notice
	$LANG_ERROR_NODATAFOUND = "No Data found";
	$LANG_ERROR_INQUERY = "There was an error in query: ";
	$LANG_LIVE_ERROR_NODATA = "No Data";

	//Pages
	$LANG_TEXT_ENG = "English";
	$LANG_TEXT_NL = "Nederlands";

	//pages - Backup system
	$LANG_PAGES_BACKUP_SYSTEMSTATUS = "System Status";
	$LANG_PAGES_BACKUP_TITLE = "Backups";
	$LANG_PAGES_BACKUP_NOTE = "Backups will be created every night after midnight. Another cronjob will cleanup old backup files older than 4 days. Make sure to download them once in a while to your pc :D";
	$LANG_PAGES_BACKUP_FILENAME = "Filename";
	$LANG_PAGES_BACKUP_FILESIZE = "Filesize";
	$LANG_PAGES_BACKUP_DOWNLOAD = "Download";

	//Pages page_current_single_inverter
	$LANG_PAGES_CURRENT_TITLE = "Live output by inverter";
	$LANG_PAGES_CURRENT_INV = "Select inverter";
	$LANG_PAGES_CURRENT_JS_1 = "Output Watt";
	$LANG_PAGES_CURRENT_JS_2 = "Live output by inverter";
	$LANG_PAGES_CURRENT_T_TITLE = "Output Live <small>Latest data by inverter</small>";
	$LANG_PAGES_CURRENT_T_1 = "Inverter";
	$LANG_PAGES_CURRENT_T_2 = "Time";
	$LANG_PAGES_CURRENT_T_3 = "Wh";
	$LANG_PAGES_CURRENT_T_4 = "Until now (Wh)";
	$LANG_PAGES_CURRENT_T_5 = "dcpower";
	$LANG_PAGES_CURRENT_T_6 = "dccurrent";
	$LANG_PAGES_CURRENT_T_7 = "efficiency";
	$LANG_PAGES_CURRENT_T_8 = "acfreq";
	$LANG_PAGES_CURRENT_T_9 = "acvolt";
	$LANG_PAGES_CURRENT_T_10 = "temp";
	$LANG_PAGES_CURRENT_T_11 = "state";

	//Pages - page_days_month_inverter
	$LANG_PAGES_DAYS_MONTH_JS_1 = 'Daily output by inverter';
	$LANG_PAGES_DAYS_MONTH_JS_2 = 'Produced';
	$LANG_PAGES_DAYS_MONTH_INV = "Select inverter";
	$LANG_PAGES_DAYS_MONTH_NOTE_1 = "Daily output by inverter | Month: ";
	$LANG_PAGES_DAYS_MONTH_YEAR = " | Year: ";

	//Pages page_days_month_total
	$LANG_PAGES_MONTH_TOTAL_JS_1 = "Total Daily Output";
	$LANG_PAGES_MONTH_TOTAL_JS_2 = "Produced kWh";
	$LANG_PAGES_MONTH_TITLE = "Daily output | Select Month: ";
	$LANG_PAGES_MONTH_SELECT = "Select Month";

	//Pages page_help

	//Pages page_live_total
	$LANG_PAGES_LIVE_TOTAL_JS_1 = "Live Current Output";
	$LANG_PAGES_LIVE_TOTAL_JS_2 = "Produced";
	$LANG_PAGES_LIVE_TITLE = "Live Output <small>Chart</small>";
	$LANG_PAGES_LIVE_TITLE_SUB = "Live Output <small>Last 20 results</small";
	$LANG_PAGES_LIVE_T_1 = "Time";
	$LANG_PAGES_LIVE_T_2 = "Wh";
	$LANG_PAGES_LIVE_T_3 = "dcpower";
	$LANG_PAGES_LIVE_T_4 = "dccurrent";
	$LANG_PAGES_LIVE_T_5 = "efficiency";
	$LANG_PAGES_LIVE_T_6 = "acfreq";
	$LANG_PAGES_LIVE_T_7 = "acvolt";
	$LANG_PAGES_LIVE_T_8 = "temp";
	$LANG_PAGES_LIVE_T_9 = "state";

	//Pages page_pvoutput_p
	$LANG_PAGES_PVOUTPUT_P_TITLE = "PV Output <small>Personal ID: ";
	$LANG_PAGES_PVOUTPUT_P_SYSID = " | System ID: ";

	//Pages page_pvoutput_t
	$LANG_PAGES_PVOUTPUT_T_TITLE = "PV Output <small>Team Name: ";
	$LANG_PAGES_PVOUTPUT_T_TEAMID = " | Team ID: ";

	//Pages page_table_inverter
	$LANG_PAGES_T_INVERTER_TITLE = "History by Inverter: <small>Last 31 days</small>";
	$LANG_PAGES_T_INVERTER_SELECT = "Select Inverter";
	$LANG_PAGES_T_INVERTER_RESULT = "Select inverter on the right to show result";

	//Pages page_table_week_inverter
	$LANG_PAGES_T_WEEK_TITLE = "History by Inverter: all weeks | Year: ";
	$LANG_PAGES_T_WEEK_SELECT = "Select Inverter";
	$LANG_PAGES_T_WEEK_RESULT = "Select inverter on the right to show result";

	//Pages page_table_month_inverter
	$LANG_PAGES_T_MONTH_TITLE = "History by Inverter: all months | Year: ";
	$LANG_PAGES_T_MONTH_SELECT = "Select Inverter";
	$LANG_PAGES_T_MONTH_RESULT = "Select inverter on the right to show result";

	//Pages page_total_month
	$LANG_PAGES_TOTAL_MONTH_JS_1 = "Total monthly output";
	$LANG_PAGES_TOTAL_MONTH_JS_2 = "Produced kWh";
	$LANG_PAGES_TOTAL_MONTH_TITLE = "Output by month";
	$LANG_PAGES_TOTAL_YEAR = "Select Year";

	//Pages page_total_week
	$LANG_PAGES_TOTAL_WEEK_TITLE = "History Total: <small> All weeks | Year: ";
	$LANG_PAGES_TOTAL_WEEK_T_1 = "Week";
	$LANG_PAGES_TOTAL_WEEK_T_2 = "Inverter";
	$LANG_PAGES_TOTAL_WEEK_T_3 = "Whtotal";
	$LANG_PAGES_TOTAL_WEEK_T_4 = "Avg temp";

	//Pages page_total_year
	$LANG_PAGES_TOTAL_YEAR_JS_1 = "Total Output Year";
	$LANG_PAGES_TOTAL_YEAR_JS_2 = "Produced kWh";
	$LANG_PAGES_TOTAL_YEAR_TITLE = "Output by Year";

	//Pages reset_system
	$LANG_RESTART_OVERVIEW = "Restarting / Shutting down your RPI";
	$LANG_RESTART_NOTE_REBOOT = "If you press reboot your RPI will reboot 10 seconds after you have pressed this button";
	$LANG_RESTART_NOTE_SHUTDOWN = "If you need to safely shutdown your RPI to for example remove the (micro)SD. When only the red light on your rpi is burning, you can unplug the powercord.";
	$LANG_RESTART_NOTE_NONE = "Not possible to reboot. This option was only build for RPI systems (Jessie). If you run this on your nas or server, you have to manually reboot it";
	$LANG_RESTART_OS = "Operating System of this device: ";
	$LANG_RESTART_ACTION = "Action";
	$LANG_RESTART_DESCRIPTION = "Description";

	//Pages settings_e2pv
	$LANG_PAGES_E2PV_TOOLTIP_VERBOSE = "Set VERBOSE to 1 if you want the script to print details on what it is doing";
	$LANG_PAGES_E2PV_TOOLTIP_IDCOUNT = "Total Inverters needs to be set to the number of inverters you have.";
	$LANG_PAGES_E2PV_TOOLTIP_MODE = "This Dashboard only supports AGGREGATE Mode";
	$LANG_PAGES_E2PV_TOOLTIP_LIFETIME = "LIFETIME should be set to 0 if your lifetime kWh values produce wrong values. That seems to happen in some installations when panels are producing close to their maximum capacity. Especially duo-inverters seem to have this problem";
	$LANG_PAGES_E2PV_TOOLTIP_EXTENDED = "The script sends a single record to PVOutput every 10 minutes. Sending of extra data is not supported in this version";
	$LANG_PAGES_E2PV_TOOLTIP_AC = "In some cases, the reported data is e few percent too high. In those cases, define AC to 1";

	$LANG_PAGES_E2PV_GENERAL = "General Settings";
	$LANG_PAGES_E2PV_OVERVIEW = "E2PV Overview";
	$LANG_PAGES_E2PV_WARN = "Note**: When changing the settings on this page a reboot of your RPI or other device is necessary!";
	$LANG_PAGES_E2PV_DESCRIPTION = "Description";
	$LANG_PAGES_E2PV_VALUE = "Value";
	$LANG_PAGES_E2PV_VERBOSE = "Verbose: ";
	$LANG_PAGES_E2PV_TOTALINVERTERS = "Total Inverters: ";
	$LANG_PAGES_E2PV_PVOUTPUT_API = "PVOutput Apikey: ";
	$LANG_PAGES_E2PV_PVOUTPUT_SYSTEM = "PVOutput System ID: ";
	$LANG_PAGES_E2PV_LIFETIME = "Lifetime: ";
	$LANG_PAGES_E2PV_MODE = "Mode: ";
	$LANG_PAGES_E2PV_EXTENDED = "Extended: ";
	$LANG_PAGES_E2PV_AC = "AC: ";
	$LANG_PAGES_E2PV_IGNORE = "Ignore Inverters";
	$LANG_PAGES_E2PV_INVERTER = "Inverter";
	$LANG_PAGES_E2PV_NOTE = "Note";

	$LANG_PAGES_E2PV_EDITSETTINGS = "Edit e2pv Settings";
	$LANG_PAGES_E2PV_UPDATED = "Settings updated";

	$LANG_PAGES_E2PV_IGNORE_EDIT = "Edit e2pv Ignore Settings";
	$LANG_PAGES_E2PV_IGNORE_ADD = "Add Ignore Inverter";
	$LANG_PAGES_E2PV_IGNORE_UPDATED = "Ignore Inverter updated";
	$LANG_PAGES_E2PV_IGNORE_DELETED = "Inverter deleted from Ignore list";
	$LANG_PAGES_E2PV_IGNORE_ADDED = "Inverter Added: ";
	$LANG_PAGES_E2PV_IGNORE_INVERTER = "Inverter";
	$LANG_PAGES_E2PV_IGNORE_DESCR = "Description";
	$LANG_PAGES_E2PV_IGNORE_STATUS = "Inverter Ignore Status";
	$LANG_PAGES_E2PV_IGNORE_ERROR_INSERT1 = "Can't insert Inverter: ";
	$LANG_PAGES_E2PV_IGNORE_ERROR_INSERT2 = " It already exists.";

	$LANG_PAGES_E2PV_IGNORE_TOOLTIP_INV = "The inverter contains max 9 characters";
	$LANG_PAGES_E2PV_IGNORE_TOOLTIP_DESCR = "Example: inverter of your neighbour";

	//Pages settings_inverter
	$LANG_PAGES_INVERTERS_OVERVIEW = "Inverters overview";
	$LANG_PAGES_INVERTERS_NR_INV = "No. Inverters: ";
	$LANG_PAGES_INVERTERS_NR_TOTAL = " | Total: ";
	$LANG_PAGES_INVERTERS_ADD = "Add Inverter";
	$LANG_PAGES_INVERTERS_EDIT = "Edit Inverter";
	$LANG_PAGES_INVERTERS_STATUS = "Inverter Status";
	$LANG_PAGES_INVERTER = "Inverter";
	$LANG_PAGES_INVERTER_ADDED = "Inverter added: ";
	$LANG_PAGES_INVERTER_UPDATED = "Inverter updated: ";
	$LANG_PAGES_INVERTER_DELETED = "Inverter deleted: ";
	$LANG_PAGES_INVERTER_TYPE = "Inverter Type";
	$LANG_PAGES_INVERTER_PARTNR = "Part nr";
	$LANG_PAGES_INVERTER_BUILD = "Build date";
	$LANG_PAGES_INVERTER_DUOSINGLE = "Duo/Single";
	$LANG_PAGES_INVERTER_WPANEL1 = "Watt panel 1";
	$LANG_PAGES_INVERTER_WPANEL2 = "Watt panel 2";
	$LANG_PAGES_INVERTER_ALIAS = "Alias";
	$LANG_PAGES_INVERTERS_ERROR_INSERT1 = "Can't insert Inverter: ";
	$LANG_PAGES_INVERTERS_ERROR_INSERT2 = " It already exists.";

	//Pages settings_system
	$LANG_PAGES_SYSTEM_OVERVIEW = "System Overview";
	$LANG_PAGES_SYSTEM_SETTINGS = "System Settings";
	$LANG_PAGES_SYSTEM_DESCRIPTION = "Description";
	$LANG_PAGES_SYSTEM_VALUE = "Value";
	$LANG_PAGES_SYSTEM_IP = "Enecsys Gateway IP";
	$LANG_PAGES_SYSTEM_LANGUAGE = "Language";
	$LANG_PAGES_SYSTEM_CITY = "City";
	$LANG_PAGES_SYSTEM_COUNTRY = "Country";
	$LANG_PAGES_SYSTEM_TIMEZONE = "Timezone";
	$LANG_PAGES_SYSTEM_CURRENCY = "Currency";
	$LANG_PAGES_SYSTEM_KWHPRICE = "kWh Price";
	$LANG_PAGES_SYSTEM_TEMPERATURE = "Temperature";
	$LANG_PAGES_SYSTEM_PVOUTPUT_ID = "PV Output ID";
	$LANG_PAGES_SYSTEM_PVOUTPUT_SYSTEMID = "PV Output System ID";
	$LANG_PAGES_SYSTEM_PVOUTPUT_TEAMID = "PV Output Team ID";
	$LANG_PAGES_SYSTEM_PVOUTPUT_TEAMNAME = "PV Output Team Name";
	$LANG_PAGES_SYSTEM_TEMP_CELCIUS = "Celcius";
	$LANG_PAGES_SYSTEM_TEMP_FARENHEIT = "Farenheit";
	$LANG_PAGES_SYSTEM_EDITSETTINGS = "Edit System Settings";
	$LANG_PAGES_SYSTEM_UPDATED = "System updated";

	//Pages settings_user_overview
	$LANG_PAGES_USERS_OVERVIEW = "User overview";
	$LANG_PAGES_USERS_EDIT = "User edit";
	$LANG_PAGES_USERS_ADD = "Add User";
	$LANG_PAGES_USERS_UPDATE = "Update User";
	$LANG_PAGES_USERS_UPDATED = "User Updated";
	$LANG_PAGES_USERS_DELETE = "Delete User";
	$LANG_PAGES_USERS_DELETED = "User Deleted";
	$LANG_PAGES_USERS_USERNAME = "Username";
	$LANG_PAGES_USERS_ADDED = "User added";
	$LANG_PAGES_USERS_EMAIL = "Email Address";
	$LANG_PAGES_USERS_PASSWORD = "User Password";
	$LANG_PAGES_USERS_PASSWORD_NEW = "New User Password";
	$LANG_PAGES_USERS_EXISTS = "Username already exists. Choose another one";
	$LANG_PAGES_USERS_PASSCHANGE = "Change Password";
	$LANG_PAGES_USERS_PASSCHANGED = "Password Changed";
	$LANG_PAGES_USERS_LAST = "You can't delete the last user";

	//Pages usage_system
	$LANG_PAGES_USAGE_STATUS = "System Status";
	$LANG_PAGES_USAGE_DISK = "Disk Status";
	$LANG_PAGES_USAGE_TOTAL = "Total Space";
	$LANG_PAGES_USAGE_FREE = "Free Space";
	$LANG_PAGES_USAGE_USED = "Used Space";
	$LANG_PAGES_USAGE_USEDP = "Used %";
	$LANG_PAGES_USAGE_DBSTATUS = "Database (MySQL) Status";
	$LANG_PAGES_USAGE_DBNAME = "Database Name";
	$LANG_PAGES_USAGE_DBSIZE = "Database Size (MB)";

	//Pages widget_live_inverter
	$LANG_PAGES_WIDGET_LASTDATA = "Last Data: ";
	$LANG_PAGES_WIDGET_TODAY = "Today: ";
	$LANG_PAGES_WIDGET_ALIAS = "Alias: ";
	$LANG_PAGES_WIDGET_TEMP = "Temp: ";
	$LANG_PAGES_WIDGET_ERROR = "<p>! Check settings for correct inverter</p><p>! Check enecsys gateway for errors</p><p>! Restart Enecsys Gateway</p><p>! Check help page</p>";
	$LANG_LIVE_ERROR_INV_EMPTY = "No inverters found. Please make sure you have set your inverters in the settings";

	//Charts table_inverter_history
	$LANG_CHART_TABLE_INVERTER_T_1 = "Date";
	$LANG_CHART_TABLE_INVERTER_T_2 = "Inverter";
	$LANG_CHART_TABLE_INVERTER_T_3 = "Whstart";
	$LANG_CHART_TABLE_INVERTER_T_4 = "Whend";
	$LANG_CHART_TABLE_INVERTER_T_5 = "Whtotal";
	$LANG_CHART_TABLE_INVERTER_T_6 = "Avg temp";

	//Charts table_inverter_week
	$LANG_CHART_TABLE_INVERTER_W_T_1 = "Week";
	$LANG_CHART_TABLE_INVERTER_W_T_2 = "Inverter";
	$LANG_CHART_TABLE_INVERTER_W_T_3 = "Whtotal";
	$LANG_CHART_TABLE_INVERTER_W_T_4 = "Avg temp";

	//Charts table_inverter_month
	$LANG_CHART_TABLE_INVERTER_M_T_1 = "Month";
	$LANG_CHART_TABLE_INVERTER_M_T_2 = "Inverter";
	$LANG_CHART_TABLE_INVERTER_M_T_3 = "Whtotal";
	$LANG_CHART_TABLE_INVERTER_M_T_4 = "Avg temp";

	//Footer
	$LANG_FOOTER_COPY = "2016 Enecsys Solar 3.0";
	$LANG_FOOTER_AUTHOR = "Author: J. van Marion";

	$LANG_PAGES_HELP_BLOCK_2_TITLE = "Settings E2PV";
	$LANG_PAGES_HELP_BLOCK_2_CONTENT_1 = "Settings E2PV";
?>
