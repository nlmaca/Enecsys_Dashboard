

# Enecsys_Dashboard - Version 2.0 - Intro
is based on the need for a Solar Dashboard to monitor on a local server. to monitor the enecsys inverters 
It needs to run on the same host where the the script of Omoerbeek is running.

Forum Topic on Tweakers: http://gathering.tweakers.net/forum/list_messages/1627615/0

a detailed installation is handled on the github wiki page. because its build for a rpi and in combination with the script from Omoerbeek
some adjustments have to be made.

Demo: not yet available (check screenshots in INSTALL directory)

#Requirements
- Apache 2.x
- PHP5.3+
- MySQL (+phpmyadmin)
- Script from Omoerbeek installed with output to database ( https://github.com/omoerbeek/e2pv)

#included

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

#cronjobs
- cronjobs (should be running already when you installed the php/mysql/apache setup: 
```
@reboot php /home/pi/enecsys_php/e2pv.php >> /home/pi/enecsys_php/e2pv.log
0 1 * * * sudo cp /dev/null /home/pi/enecsys_php/e2pv.log
```
#Optional - mysql backups
Change the credentials in te script mysql_dump.sh
```
Line 30: DATABASENAME 
Line 31: DATABASEUSER
Line 32: DATABASEPASSWORD
```

upload the script from 
```
/INSTALL/mysqldump/mysql_dump.sh to /home/pi/
```
give it executable rights
```
chmod +x /home/pi/mysql_dump.sh 
```
create a directory /home/pi/mysql_backup and create a log file
```
mkdir /home/pi/mysql_backup
touch /home/pi/mysql_backup/backup.log
```

Add cronjob: (as pi user: crontab -e)
This one is used for creating a daily (at midnight) backup of the entire database. You can download it afterwards through sftp (filezilla) in the /home/pi/mysql_backup directory
```
0 0 * * * sh /home/pi/mysqldump/mysql_dump.sh
```

You can also run this script manually from the commandline:
as pi user: 
```
sh /home/pi/mysql_dump.sh
```

#Setup Dashboard:
create new and extra tables in phpmyadmin
- see INSTALL->create_tables.sql

- Note: Panel_1 en panel_2, build_date are cosmetic values. i use them for a mapping page if you want to keep track to which panels the inverters are connected. i will use these later in future updates

#All files
Change the credentials in the file /Enecsys_Dashboard/inc/general_conf.inc.php to your settings

```
$dbHost = "localhost";
$dbUserName = "db_username";
$dbUserPasswd = "db_password";
$dbName = "db_name";

$DOCUMENT_ROOT = '/Enecsys_Dashboard'; // NO trailerslash!!!!

$TITLE = 'Enecsys Dashboard'; // use whatever you want
$language = 'ENG' // use ENG or NL 

```

Copy the complete directory (Enecsys_Dasbhoard) to your raspberry at /var/www/
with rpi might a bit tricky. sftp(Filezilla) to /home/pi and from there use sudo to copy all files to /var/www

```
sudo cp -R /home/pi/Enecsys_Dashboard /var/www
```
so it will look like this: /var/www/Enecys_Dashboard

After this you should be able to login into the dashboard.
http://IP_RASPBERRY/Enecsys_Dashboard

default login: admin
default email: admin@dashboard.lan 
default password: dashboard

#Raspberry pi.
if running on rpi (1 or 2) its best to optimize mysql
http://www.ducky-pond.com/posts/2014/Feb/how-to-install-and-optimize-mysql-on-raspberry-pi/


#Note:
This code is as is. 
If you are an experiend php programmer you might find some issues in the code. Don't blame me ;) 