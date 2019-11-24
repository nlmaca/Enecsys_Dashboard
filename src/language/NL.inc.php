<?php
	/*
	language file english (ENG)

	*/

	//System version: 3.0
	$LANG_DASHBOARD_TITLE = 'Enecsys Solar 4.1.0';

	//login
	$LANG_LOGIN = "Login";
	$LANG_LOGIN_USERNAME = "Gebruikersnaam";
	$LANG_LOGIN_PASSWORD = "Wachtwoord";
	$LANG_LOGIN_USER_WELCOME = "Welkom terug,";
	$LANG_LOGIN_FORM = "Inloggen";

	//SideBarMenu
	$LANG_SIDEBAR_TITLE = "Enecsys Solar";

	$LANG_SIDEBAR_LIVE = "Live Status";
	$LANG_SIDEBAR_LIVE_1 = "Opbrengst [Grafiek]";
	$LANG_SIDEBAR_LIVE_2 = "Opbrengst [Alle omvormers]";
	$LANG_SIDEBAR_LIVE_3 = "Opbrengst [Per omvormer]";

	$LANG_SIDEBAR_HISTORY = "Historie";
	$LANG_SIDEBAR_HISTORY_DAY = "Dag";
	$LANG_SIDEBAR_HISTORY_DAY_INV = "Dag omvormer [grafiek]";
	$LANG_SIDEBAR_HISTORY_DAY_INV_T = "Dag omvormer [tabel]";
	$LANG_SIDEBAR_HISTORY_WEEK_INV = "Wekelijks [omvormer]";
	$LANG_SIDEBAR_HISTORY_WEEK_INV_T = "Week omvormer [tabel]";
	$LANG_SIDEBAR_HISTORY_MONTH_INV_T = "Maand omvormer [tabel]";
	$LANG_SIDEBAR_HISTORY_MONTH = "Maand [grafiek]";
	$LANG_SIDEBAR_HISTORY_YEAR = "Jaar [grafiek]";

	$LANG_SIDEBAR_SETTINGS = "Instellingen";
	$LANG_SIDEBAR_SETTINGS_INVERTERS = "Omvormers";
	$LANG_SIDEBAR_SETTINGS_SYSTEM = "Algemeen";
	$LANG_SIDEBAR_SETTINGS_E2PV = "E2PV";
	$LANG_SIDEBAR_SETTINGS_USERS = "Gebruikers";

	$LANG_SIDEBAR_SYSTEM = "Systeem";
	$LANG_SIDEBAR_SYSTEM_USAGE = "Gebruik";
	$LANG_SIDEBAR_SYSTEM_BACKUP = "Backups";
	$LANG_SIDEBAR_SYSTEM_REBOOT = "Herstart / Uitzetten";

	$LANG_SIDEBAR_ALERTS = "Waarschuwingen";
	$LANG_SIDEBAR_ALERTS_1 = "Status omvormer";
	$LANG_SIDEBAR_ALERTS_2 = "Systeem Status";

	$LANG_SIDEBAR_PVOUTPUT = "PV Opbrengst";
	$LANG_SIDEBAR_PVOUTPUT_TEAM = "PV Opbrengst Team";
	$LANG_SIDEBAR_PVOUTPUT_PERSONAL = "PV Opbrengst Personal";

	$LANG_SIDEBAR_HELP = "Help";

	//TopTiles
	$LANG_TOPTILE_CURRENT = "Huidig";
	$LANG_TOPTILE_CURRENT_TT = "Totaal vandaag";
	$LANG_TOPTILE_CURRENT_TINV = "Totaal Omvormers";
	$LANG_TOPTILE_CURRENT_ET = "Verdiend vandaag";
	$LANG_TOPTILE_CURRENT_DOD = "Dagen van data";
	$LANG_TOPTILE_CURRENT_DATE = "Datum";
	$LANG_TOPTILE_LAST_PULSE = "Laatste Pulse: ";
	$LANG_TOPTILE_NO_INPUT = "[Geen Input Data!] ";
	$LANG_TOPTILE_OVERTIME = " / Langer dan 1 uur geleden";

	//TopNav
	$LANG_TOPNAV_LOGOUT = "Uitloggen";

	//Buttons
	$LANG_BUTTON_EDIT = "Wijzig";
	$LANG_BUTTON_EDIT_SETTINGS = "Wijzig instellingen";
	$LANG_BUTTON_ADD = "Voeg toe";
	$LANG_BUTTON_ADD_INVERTER = "Omvormer toevoegen";
	$LANG_BUTTON_SAVE = "Opslaan";
	$LANG_BUTTON_UPDATE = "Bijwerken";
	$LANG_BUTTON_DELETE = "Verwijder";
	$LANG_BUTTON_DELETE_INVERTER = "Verwijder omvormer";
	$LANG_BUTTON_CANCEL = "Annuleer";
	$LANG_BUTTON_IGNORE_INVERTER_ADD = "Toevoegen van Ignore Omvormer";
	$LANG_BUTTON_OVERVIEW = "Terug naar overzicht";
	$LANG_BUTTON_REBOOT = "Herstart RPI";
	$LANG_BUTTON_SHUTDOWN = "Uitzetten RPI";
	$LANG_BUTTON_BACK = "Terug";
	$LANG_BUTTON_OVERVIEW = "Overzicht";
	$LANG_BUTTON_CREATE_USER = "Aanmaken Gebruiker";
	$LANG_BUTTON_PASS_RESET = "Reset Wachtwoord";


	//Error notice
	$LANG_ERROR_NODATAFOUND = "Geen Data Gevonden";
	$LANG_ERROR_INQUERY = "Er zit een fout in de query: ";
	$LANG_LIVE_ERROR_NODATA = "Geen Data";

	//Pages
	$LANG_TEXT_ENG = "English";
	$LANG_TEXT_NL = "Nederlands";

	//pages - Backup system
	$LANG_PAGES_BACKUP_SYSTEMSTATUS = "Systeem Status";
	$LANG_PAGES_BACKUP_TITLE = "Backups";
	$LANG_PAGES_BACKUP_NOTE = "Backups worden elke nacht automatisch gemaakt. Elke backup ouder dan 4 dagen wordt automatisch verwijderd. Download de backups af en toe.";
	$LANG_PAGES_BACKUP_FILENAME = "Bestandsnaam";
	$LANG_PAGES_BACKUP_FILESIZE = "Bestandsgrootte";
	$LANG_PAGES_BACKUP_DOWNLOAD = "Download";

	//Pages page_current_single_inverter
	$LANG_PAGES_CURRENT_TITLE = "Live opbrengst per omvormer";
	$LANG_PAGES_CURRENT_INV = "Selecteer Omvormer";
	$LANG_PAGES_CURRENT_JS_1 = "Opbrengst Watt";
	$LANG_PAGES_CURRENT_JS_2 = "Live Opbrengst per omvormer";
	$LANG_PAGES_CURRENT_T_TITLE = "Live Opbrengst <small>Laatste data per omvormer</small>";
	$LANG_PAGES_CURRENT_T_1 = "Omvormer";
	$LANG_PAGES_CURRENT_T_2 = "Tijd";
	$LANG_PAGES_CURRENT_T_3 = "Wh";
	$LANG_PAGES_CURRENT_T_4 = "Tot nu toe (Wh)";
	$LANG_PAGES_CURRENT_T_5 = "dcpower";
	$LANG_PAGES_CURRENT_T_6 = "dccurrent";
	$LANG_PAGES_CURRENT_T_7 = "efficiency";
	$LANG_PAGES_CURRENT_T_8 = "acfreq";
	$LANG_PAGES_CURRENT_T_9 = "acvolt";
	$LANG_PAGES_CURRENT_T_10 = "temp";
	$LANG_PAGES_CURRENT_T_11 = "state";

	//Pages - page_days_month_inverter
	$LANG_PAGES_DAYS_MONTH_JS_1 = 'Dagelijkse Opbrengst per omvormer';
	$LANG_PAGES_DAYS_MONTH_JS_2 = 'Opbrengst';
	$LANG_PAGES_DAYS_MONTH_INV = "Selecteer omvormer";
	$LANG_PAGES_DAYS_MONTH_NOTE_1 = "Dagopbrengst per omvormer | Mnd: ";
	$LANG_PAGES_DAYS_MONTH_YEAR = " | Jaar: ";

	//Pages page_days_month_total
	$LANG_PAGES_MONTH_TOTAL_JS_1 = "Totale Dagopbrengst";
	$LANG_PAGES_MONTH_TOTAL_JS_2 = "Opbrengst Wh";
	$LANG_PAGES_MONTH_TITLE = "Dagopbrengst | Selecteer Maand: ";
	$LANG_PAGES_MONTH_SELECT = "Selecteer Maand";

	//Pages page_help

	//Pages page_live_total
	$LANG_PAGES_LIVE_TOTAL_JS_1 = "Live Huidige opbrengst";
	$LANG_PAGES_LIVE_TOTAL_JS_2 = "Opbrengst";
	$LANG_PAGES_LIVE_TITLE = "Live Opbrengst <small>Grafiek</small>";
	$LANG_PAGES_LIVE_TITLE_SUB = "Live Opbrengst <small>Laatste 20 resultaten</small";
	$LANG_PAGES_LIVE_T_1 = "Tijd";
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
	$LANG_PAGES_PVOUTPUT_P_SYSID = " | Systeem ID: ";

	//Pages page_pvoutput_t
	$LANG_PAGES_PVOUTPUT_T_TITLE = "PV Output <small>Team Naam: ";
	$LANG_PAGES_PVOUTPUT_T_TEAMID = " | Team ID: ";

	//Pages page_table_inverter
	$LANG_PAGES_T_INVERTER_TITLE = "Historie per Omvormer: <small>Laatste 31 dagen</small>";
	$LANG_PAGES_T_INVERTER_SELECT = "Selecteer Omvormer";
	$LANG_PAGES_T_INVERTER_RESULT = "Selecteer rechts Omvormer om resultaten te tonen";

	//Pages page_table_week_inverter
	$LANG_PAGES_T_WEEK_TITLE = "Historie per Omvormer: alle weken | Jaar: ";
	$LANG_PAGES_T_WEEK_SELECT = "Selecteer Omvormer ";
	$LANG_PAGES_T_WEEK_RESULT = "Selecteer rechts een omvormer om resultaten te tonen";

	//Pages page_table_month_inverter
	$LANG_PAGES_T_MONTH_TITLE = "Historie per Omvormer: alle maanden | Jaar: ";
	$LANG_PAGES_T_MONTH_SELECT = "Selecteer Omvormer ";
	$LANG_PAGES_T_MONTH_RESULT = "Selecteer rechts een omvormer om resultaten te tonen";

	//Pages page_total_month
	$LANG_PAGES_TOTAL_MONTH_JS_1 = "Totale Maandelijkse opbrengst";
	$LANG_PAGES_TOTAL_MONTH_JS_2 = "Opbrengst kWh";
	$LANG_PAGES_TOTAL_MONTH_TITLE = "Opbrengst per maand";
	$LANG_PAGES_TOTAL_YEAR = "Selecteer Jaar";

	//Pages page_total_week
	$LANG_PAGES_TOTAL_WEEK_TITLE = "Historie Totaal: <small> Alle weken | Jaar: ";
	$LANG_PAGES_TOTAL_WEEK_T_1 = "Week";
	$LANG_PAGES_TOTAL_WEEK_T_2 = "Omvormer";
	$LANG_PAGES_TOTAL_WEEK_T_3 = "Whtotal";
	$LANG_PAGES_TOTAL_WEEK_T_4 = "Avg temp";

	//Pages page_total_year
	$LANG_PAGES_TOTAL_YEAR_JS_1 = "Totale Opbrengst per jaar";
	$LANG_PAGES_TOTAL_YEAR_JS_2 = "Opbrengst kWh";
	$LANG_PAGES_TOTAL_YEAR_TITLE = "Opbrengst per jaar";

	//Pages reset_system
	$LANG_RESTART_OVERVIEW = "Herstart / Uitzetten RPI";
	$LANG_RESTART_NOTE_REBOOT = "Na het klikken op de button zal de RPI over 10 sec automatisch herstarten";
	$LANG_RESTART_NOTE_SHUTDOWN = "Als alleen de rode led nog brandt is het veilig om de stekker eruit te halen van de RPI. Hierna is het ook veilig om de micro(sd) kaart te verwijerden indien nodig";
	$LANG_RESTART_NOTE_NONE = "Niet mogelijk om te herstarten. Deze optie is alleen ingebouwd als het een RPI (Jessie) betreft.";
	$LANG_RESTART_OS = "Besturingssyteem van dit apparaat: ";
	$LANG_RESTART_ACTION = "Actie";
	$LANG_RESTART_DESCRIPTION = "Omschrijving";

	//Pages settings_e2pv
	$LANG_PAGES_E2PV_TOOLTIP_VERBOSE = "VERBOSE is voor foutopsporing. Dit wordt (nog) niet ondersteund";
	$LANG_PAGES_E2PV_TOOLTIP_IDCOUNT = "Geef het totale aantal omvormers op.";
	$LANG_PAGES_E2PV_TOOLTIP_MODE = "Dit Dashboard ondersteunt alleen AGGREGATE Mode";
	$LANG_PAGES_E2PV_TOOLTIP_LIFETIME = "Indien PVOutput verkeerde waardes laat zien zet dan LIFETIME op 0. Dit gebeurt voornamelijk in situaties waarbij de panelen tegen hun maximale capaciteit zitten. Dit speelt oornamelijk bij duo omvormers";
	$LANG_PAGES_E2PV_TOOLTIP_EXTENDED = "Het script stuurt elke 10 minuten data uit. Sturen van extra data wordt niet ondersteund, omdat dit alleen werkt via een donatie bij pvoutput";
	$LANG_PAGES_E2PV_TOOLTIP_AC = "Im sommige gevallen is de data een aantal percentages te hoog. Dit kan opgelost worden door AC op 1 te zetten";

	$LANG_PAGES_E2PV_GENERAL = "Algemene instellingen";
	$LANG_PAGES_E2PV_OVERVIEW = "E2PV Overzicht";
	$LANG_PAGES_E2PV_WARN = "Note**: Indien instellingen gewijzigd worden is een herstart van de RPI noodzakelijk!";
	$LANG_PAGES_E2PV_DESCRIPTION = "Omschrijving";
	$LANG_PAGES_E2PV_VALUE = "Waarde";
	$LANG_PAGES_E2PV_VERBOSE = "Verbose: ";
	$LANG_PAGES_E2PV_TOTALINVERTERS = "Totale omvormers: ";
	$LANG_PAGES_E2PV_PVOUTPUT_API = "PVOutput Apikey: ";
	$LANG_PAGES_E2PV_PVOUTPUT_SYSTEM = "PVOutput System ID: ";
	$LANG_PAGES_E2PV_LIFETIME = "Lifetime: ";
	$LANG_PAGES_E2PV_MODE = "Mode: ";
	$LANG_PAGES_E2PV_EXTENDED = "Extended: ";
	$LANG_PAGES_E2PV_AC = "AC: ";
	$LANG_PAGES_E2PV_IGNORE = "Negeer Omvormers";
	$LANG_PAGES_E2PV_INVERTER = "Omvormer";
	$LANG_PAGES_E2PV_NOTE = "Note";

	$LANG_PAGES_E2PV_EDITSETTINGS = "Wijzig e2pv Instellingen";
	$LANG_PAGES_E2PV_UPDATED = "Instellingen bijgewerkt";

	$LANG_PAGES_E2PV_IGNORE_EDIT = "Wijzig e2pv negeer instellingen";
	$LANG_PAGES_E2PV_IGNORE_ADD = "Voeg Omvormer toe";
	$LANG_PAGES_E2PV_IGNORE_UPDATED = "Omvormer toegevoegd";
	$LANG_PAGES_E2PV_IGNORE_DELETED = "Omvormer verwijderd van Negeer lijst";
	$LANG_PAGES_E2PV_IGNORE_ADDED = "Omvormer toegevoegd: ";
	$LANG_PAGES_E2PV_IGNORE_INVERTER = "Omvormer";
	$LANG_PAGES_E2PV_IGNORE_DESCR = "Omschrijving";
	$LANG_PAGES_E2PV_IGNORE_STATUS = "Omvormer status";
	$LANG_PAGES_E2PV_IGNORE_ERROR_INSERT1 = "Kan de omvormer niet toevoegen: ";
	$LANG_PAGES_E2PV_IGNORE_ERROR_INSERT2 = " Deze bestaat al.";

	$LANG_PAGES_E2PV_IGNORE_TOOLTIP_INV = "De omvormer bestaat uit 9 cijfers";
	$LANG_PAGES_E2PV_IGNORE_TOOLTIP_DESCR = "Voorbeeld: omvormer van de buren";

	//Pages settings_inverter
	$LANG_PAGES_INVERTERS_OVERVIEW = "Omvormers overzicht";
	$LANG_PAGES_INVERTERS_NR_INV = "Nr. Omvormers: ";
	$LANG_PAGES_INVERTERS_NR_TOTAL = " | Totaal: ";
	$LANG_PAGES_INVERTERS_ADD = "Omvormer toevoegen";
	$LANG_PAGES_INVERTERS_EDIT = "Wijzig Omvormer";
	$LANG_PAGES_INVERTERS_STATUS = "Omvormer Status";
	$LANG_PAGES_INVERTER = "Omvormer";
	$LANG_PAGES_INVERTER_ADDED = "Omvormer toegevoegd: ";
	$LANG_PAGES_INVERTER_UPDATED = "Omvormer bijgewerkt: ";
	$LANG_PAGES_INVERTER_DELETED = "Omvormer verwijderd: ";
	$LANG_PAGES_INVERTER_TYPE = "Omvormer Type";
	$LANG_PAGES_INVERTER_PARTNR = "Part nr";
	$LANG_PAGES_INVERTER_BUILD = "Bouw datum";
	$LANG_PAGES_INVERTER_DUOSINGLE = "Duo/Single";
	$LANG_PAGES_INVERTER_WPANEL1 = "Watt panel 1";
	$LANG_PAGES_INVERTER_WPANEL2 = "Watt panel 2";
	$LANG_PAGES_INVERTER_ALIAS = "Alias";
	$LANG_PAGES_INVERTERS_ERROR_INSERT1 = "Kan de omvormer niet toevoegen: ";
	$LANG_PAGES_INVERTERS_ERROR_INSERT2 = " Deze bestaat al.";

	//Pages settings_system
	$LANG_PAGES_SYSTEM_OVERVIEW = "Systeem Overzicht";
	$LANG_PAGES_SYSTEM_SETTINGS = "Systeem Instellingen";
	$LANG_PAGES_SYSTEM_DESCRIPTION = "Omschrijving";
	$LANG_PAGES_SYSTEM_VALUE = "Waarde";
	$LANG_PAGES_SYSTEM_IP = "Enecsys Gateway IP";
	$LANG_PAGES_SYSTEM_LANGUAGE = "Taal";
	$LANG_PAGES_SYSTEM_CITY = "Stad";
	$LANG_PAGES_SYSTEM_COUNTRY = "Land";
	$LANG_PAGES_SYSTEM_TIMEZONE = "Tijdzone";
	$LANG_PAGES_SYSTEM_CURRENCY = "Valuta";
	$LANG_PAGES_SYSTEM_KWHPRICE = "kWh Prijs";
	$LANG_PAGES_SYSTEM_TEMPERATURE = "Temperatuur";
	$LANG_PAGES_SYSTEM_PVOUTPUT_ID = "PV Output ID";
	$LANG_PAGES_SYSTEM_PVOUTPUT_SYSTEMID = "PV Output Systeem ID";
	$LANG_PAGES_SYSTEM_PVOUTPUT_TEAMID = "PV Output Team ID";
	$LANG_PAGES_SYSTEM_PVOUTPUT_TEAMNAME = "PV Output Team Naam";
	$LANG_PAGES_SYSTEM_TEMP_CELCIUS = "Celcius";
	$LANG_PAGES_SYSTEM_TEMP_FARENHEIT = "Farenheit";
	$LANG_PAGES_SYSTEM_EDITSETTINGS = "Wijzig Systeem instellingen";
	$LANG_PAGES_SYSTEM_UPDATED = "Systeem bijgewerkt";

	//Pages settings_user_overview
	$LANG_PAGES_USERS_OVERVIEW = "Gebruikers Overzicht";
	$LANG_PAGES_USERS_EDIT = "Bewerk Gebruiker";
	$LANG_PAGES_USERS_ADD = "Gebruiker toevoegen";
	$LANG_PAGES_USERS_UPDATE = "Bijwerken Gebruiker";
	$LANG_PAGES_USERS_UPDATED = "Gebruiker bijgewerkt";
	$LANG_PAGES_USERS_DELETE = "Verwijder Gebruiker";
	$LANG_PAGES_USERS_DELETED = "Gebruiker verwijderd";
	$LANG_PAGES_USERS_USERNAME = "Gebruikersnaam";
	$LANG_PAGES_USERS_ADDED = "Gebruiker toegevoegd";
	$LANG_PAGES_USERS_EMAIL = "Email Addres";
	$LANG_PAGES_USERS_PASSWORD = "Wachtwoord";
	$LANG_PAGES_USERS_PASSWORD_NEW = "Nieuw Wachtwoord";
	$LANG_PAGES_USERS_EXISTS = "Gebruikersnaam bestaat al. Kies een andere";
	$LANG_PAGES_USERS_PASSCHANGE = "Wijzig wachtwoord";
	$LANG_PAGES_USERS_PASSCHANGED = "Wachtwoord aangepast";
	$LANG_PAGES_USERS_LAST = "Je kan de laatste gebruiker niet verwijderen";

	//Pages usage_system
	$LANG_PAGES_USAGE_STATUS = "Systeem Status";
	$LANG_PAGES_USAGE_DISK = "Harde schijf Status";
	$LANG_PAGES_USAGE_TOTAL = "Totale ruimte";
	$LANG_PAGES_USAGE_FREE = "Vrije ruimte";
	$LANG_PAGES_USAGE_USED = "Gebruikte ruimte";
	$LANG_PAGES_USAGE_USEDP = "Gebruikt %";
	$LANG_PAGES_USAGE_DBSTATUS = "Database (MySQL) Status";
	$LANG_PAGES_USAGE_DBNAME = "Database Naam";
	$LANG_PAGES_USAGE_DBSIZE = "Database Grootte (MB)";

	//Pages widget_live_inverter
	$LANG_PAGES_WIDGET_LASTDATA = "Laatste Data: ";
	$LANG_PAGES_WIDGET_TODAY = "Vandaag: ";
	$LANG_PAGES_WIDGET_ALIAS = "Alias: ";
	$LANG_PAGES_WIDGET_TEMP = "Temp: ";
	$LANG_PAGES_WIDGET_ERROR = "<p>! Check de instellingen voor juiste omvormers</p><p>! Check de enecsys gateway (smiley)</p><p>! Herstart Enecsys Gateway</p><p>! Check help pagina</p>";
	$LANG_LIVE_ERROR_INV_EMPTY = "Geen omvormers gevonden. Check de instellingen of de omvormers ingevuld zijn";

	//Charts table_inverter_history
	$LANG_CHART_TABLE_INVERTER_T_1 = "Datum";
	$LANG_CHART_TABLE_INVERTER_T_2 = "Omvormer";
	$LANG_CHART_TABLE_INVERTER_T_3 = "Whstart";
	$LANG_CHART_TABLE_INVERTER_T_4 = "Whend";
	$LANG_CHART_TABLE_INVERTER_T_5 = "Whtotal";
	$LANG_CHART_TABLE_INVERTER_T_6 = "Gem temp";

	//Charts table_inverter_week
	$LANG_CHART_TABLE_INVERTER_W_T_1 = "Week";
	$LANG_CHART_TABLE_INVERTER_W_T_2 = "Omvormer";
	$LANG_CHART_TABLE_INVERTER_W_T_3 = "Whtotal";
	$LANG_CHART_TABLE_INVERTER_W_T_4 = "Gem temp";

	//Charts table_inverter_month
	$LANG_CHART_TABLE_INVERTER_M_T_1 = "Maand";
	$LANG_CHART_TABLE_INVERTER_M_T_2 = "Omvormer";
	$LANG_CHART_TABLE_INVERTER_M_T_3 = "Whtotal";
	$LANG_CHART_TABLE_INVERTER_M_T_4 = "Gem temp";
	//Footer
	$LANG_FOOTER_AUTHOR = "Auteur: J. van Marion";

	$LANG_PAGES_HELP_BLOCK_2_TITLE = "Instellingen E2PV";
	$LANG_PAGES_HELP_BLOCK_2_CONTENT_1 = "Instellingen E2PV";
?>
