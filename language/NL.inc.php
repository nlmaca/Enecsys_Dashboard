<?php 
/* 
language file dutch 
top page: <?php include ('../../language/' . $language . '.inc.php'); ?>
<?php echo $LANG_INVERTER; ?>
*/

//Intro
$LANG_INTRO = '';

$LANG_UPDATED = 'Aant rijen bijgewerkt: '; 

//index login page /index.php
$LANG_LOGINUSERNAME = 'Gebruikersnaam';
$LANG_LOGINPASSWORD = 'Wachtwoord';
$LANG_lOGINEMAIL = 'Email';
$LANG_SIGNIN = 'Inloggen';

//HEADER - /header.php
$LANG_HEADER_SHOW_MENU = 'Toon menu';
$LANG_HEADER_HISTORY = 'Geschiedenis';
$LANG_HEADER_OVERVIEW = 'Overzicht';
$LANG_HEADER_SETTINGS = 'Instellingen';
$LANG_HEADER_INVERTERS = 'Omvormers';
$LANG_HEADER_DB = 'DB Optimalisatie';
$LANG_HEADER_USERS = 'Gebruikers';
$LANG_HEADER_OVERVIEW_USERS = 'Gebruikers overzicht';
$LANG_HEADER_LOGOFF = 'Uitloggen';

//live page /products/solar/overview & overview_inverter.php
$LANG_LIVE_STATE = 'Status: ';
$LANG_LIVE_TODAY = 'Vandaag';
$LANG_LIVE_PANEL = 'Paneel: ';
$LANG_LIVE_LAST_UPDATE = 'Laatst bijgewerkt';
$LANG_LIVE_POWER = 'Power(wh)';
$LANG_LIVE_DC_CURRENT = 'DC Current(amp)';
$LANG_LIVE_AC_CURRENT = 'AC Current(amp)';
$LANG_LIVE_AC_FREQ = 'AC Freq';
$LANG_LIVE_DC_VOLT = 'DC Volt';
$LANG_LIVE_AC_VOLT = 'AC Volt';
$LANG_LIVE_TEMP = 'Temp';
$LANG_LIVE_EFF = 'Efficienty';
$LANG_LIVE_SOLAR_STATE = 'Paneel status';
$LANG_LIVE_KWH = 'Kwh';
$LANG_LIVE_START_VALUE = 'Start waarde';
$LANG_LIVE_END_VALUE = 'Eind waarde';
$LANG_LIVE_CURRENT = 'Current(Watt)';
$LANG_LIVE_PANEL_1 = 'Paneel 1';
$LANG_LIVE_PANEL_2 = 'Paneel 2';
$LANG_LIVE_SOFAR = 'Tot nu toe vandaag: ';
$LANG_INVERTER_INFO = 'Omvormer informatie: ';

//page: products/history/index.php
$LANG_FROMDATE = 'vanaf datum: ';
$LANG_TODATE = 'Tot datum: ';
$LANG_SELECT_INVERTER = 'Selecteer Omvormer: ';
$LANG_HISTORY_INFO = 'Zorg ervoor dat je de geschiedenis tabel hebt bijgewerkt (Instellingen->DB optimalisatie)<br> Datum instelling: jjjj-mm-dd';

//db performance and subpages /performance/optimize_database.php
$LANG_DB_GETDATA = 'Data wordt opgehaald, even geduld a.u.b';
$LANG_DB_INSDATA = 'Data wordt ingevoegd, even geduld a.u.b';
$LANG_DB_CHECKDATA = 'Data wordt gechecked, even geduld a.u.b';
$LANG_DB_DELDATA = 'Data wordt verwijderd, even gedult a.u.b';

//db step 1
$LANG_DB_STEP1_SUB1 = '[1] Vergelijk tabellen';
$LANG_DB_STEP1_SUB2 = 'Klik vergelijk om de resultaten te checken';
$LANG_DB_STEP1_RESULT = 'Upgraden geschiedenis nodig. Ga naar stap 2';
$LANG_DB_STEP1_RESULT2 = 'Geschiedenis is al up to date. Ga naar stap 3';

//db step 2
$LANG_DB_STEP2_SUB1 = '[2] Upgrade geschiedenis';
$LANG_DB_STEP2_SUB2 = 'Klik om de geschiedenis bij te werken';

//db step 3
$LANG_DB_STEP3_SUB1 = '[3] Seleer oude data';
$LANG_DB_STEP3_SUB2 = 'selecteer data ouder dan 2 dagen';
$LANG_DB_STEP3_RESULT = 'dat verwijderd kan worden';
$LANG_DB_STEP3_RESULT2 = 'tabel is up to date. Klaar';

//db step 4
$LANG_DB_STEP4_SUB1 = '[4] Opschonen master tabel';
$LANG_DB_STEP4_SUB2 = 'Klik op de button om op te schonen';

//general
$LANG_NR_ROWS = 'Aant rijen: ';
$LANG_ROWS_INSERTED = 'Rijen ingevoegd: ';
$LANG_ROWS_FOUND = 'Rijen gevonden: ';
$LANG_ROWS_DELETED = 'Rijen verwijderd: ';
$LANG_INVERTER = 'Omvormer ';
$LANG_INVERTER_SHORT = 'Omv ';
$LANG_INVERTER_TYPE = 'Type ';
$LANG_INVERTER_DUO = 'Duo/Enkel ';
$LANG_INVERTER_PARTNR = 'Part nr ';
$LANG_BUILD_DATE = 'Gemaakt op ';
$LANG_HOUR = 'Uur';
$LANG_DAY = 'Dag';
$LANG_MONTH = 'Maand';
$LANG_YEAR = 'Jaar';
$LANG_SELECT_OPTION = 'Optie: ';
$LANG_TOTAL_WH = 'Totaal Wh';
$LANG_APPLICATION_INFO = 'Applicatie Informatie';
$LANG_START_VALUE = 'Start waarde';
$LANG_END_VALUE = 'Eind waarde';
$LANG_AVG_TEMP = 'Gem temp';
$LANG_YEARDAY = 'Dag vh jaar';
$LANG_FROM = 'Van: ';
$LANG_TO = 'Tot: ';
$LANG_USERNAME = 'Gebruikersnaam';
$LANG_EMAIL = 'Email';
$LANG_USER_INFO = 'Gebruikers Informatie';

//STRINGS
$LANG_NO_INV_SELECTED = 'Geen omvormer geselecteerd';
$LANG_WH_DAY = 'Totaal wh per dag ';
$LANG_WH_DAY_HR = 'Total wh per uur van dag: ';
$LANG_INVDEL_SUCCESS = 'Omvormer verwijderd ';
$LANG_INVINS_SUCCESS = 'Omvormer ingevoerd ';
$LANG_UPD_SUCCESS = 'Configuratie bijgewerkt';

//buttons
$LANG_BUTTON_BACK_OVERVIEW = 'Terug naar Overzicht';
$LANG_BUTTON_GETDATA = 'Toon selectie';
$LANG_BUTTON_CREATE = 'Aanmaken';
$LANG_BUTTON_CREATE_USER = 'Toevoegen gebruiker';
$LANG_BUTTON_DELETE = 'Verwijderen';
$LANG_BUTTON_EDIT = 'Bewerken';
$LANG_BUTTON_CANCEL = 'Annuleren';
$LANG_BUTTON_SAVE = 'Opslaan';
$LANG_BUTTON_ADD_INVERTER = 'Omvormer toevoegen';

//ERRORS
$LANG_ERROR_RAG = 'Er is een fout. Probeer het nogmaals';
$LANG_ERROR_NDF = 'Geen data gevonden';
$LANG_LIVE_ERROR_NODATA = 'GEEN DATA';
$LANG_LIVE_ERROR_NODATA_1 = 'Is de gateway actief? Kloppen de serie nrs van de omvormers? Reboot de RPI';
$LANG_LIVE_ERROR_INV_EMPTY = 'Omvormer tabel is leeg';
?>
