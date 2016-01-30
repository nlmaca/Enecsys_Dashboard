# Enecsys_Dashboard - Version 2.3
- fixed some typo's in the readme
- changed description in detailed overview (Power(Wh) to Power (W))
- fixed some php errors of missing language variables
- updated scripts for the raspberry images (works on Jessie and Wheezy)
	static_ip.sh
	create_database.sh
	reset_mysql_rootpass.sh
	e2pv_install.sh
- created 2 installers for the rpi's;
	install_dashboard_jessie.sh (installer/updater if you are running Debian Jessie)
	install_dashboard_wheezy.sh (installer/updater if you are running Debian Wheezy)
- updated the webinstaller (works for new installs and upgrades)
	fixed some errors in the installer
 
update from 2.0 to 2.3? 
- Make sure to check which version you run:
```
sudo /cat/etc-os-release
```
PRETTY_NAME="Raspbian GNU/Linux 8 (jessie)"  -> download Jessie installer
```
cd /home/pi
wget https://github.com/nlmaca/Enecsys_RPI_images/blob/master/scripts/install_dashboard_jessie.sh
```
PRETTY_NAME="Raspbian GNU/Linux 7 (wheezy)"  -> download Wheezy installer
```
cd /home/pi
wget https://github.com/nlmaca/Enecsys_RPI_images/blob/master/scripts/install_dashboard_wheezy.sh
```

- download the installer through ssh(putty or other ssh client) in your /home/pi directory and run the script with sudo)
- no changes are made in the database
- new install with existing database? you wont loose anything.

#Requirements
- Apache 2.x
- PHP5.3+
- MySQL (+phpmyadmin)
- e2pv Script from Omoerbeek installed with output to database see: https://github.com/omoerbeek/e2pv

#cronjobs
should be running. check with:
```
crontab -l
```
should give you this result:

```
@reboot php /home/pi/enecsys/e2pv.php >> /home/pi/enecsys/e2pv.log
0 1 * * * sudo cp /dev/null /home/pi/enecsys/e2pv.log
```

if you are running the e2pv script without mysql, its best to re-run the installer, see for info: https://github.com/nlmaca/Enecsys_RPI_images

#Setup Dashboard:
Create the database and user for the dashboard within phpmyadmin 
from here you're done. i created a webinstaller for the dashboard.

I assume you are using this on a raspberry
``` 
cd /home/pi
mkdir dash_temp
cd /home/pi/dash_temp
wget https://github.com/nlmaca/Enecsys_Dashboard/archive/master.zip

unzip master.zip
```

Create a  web directory on your /var/www
(where enecsys will be the directory for the dashboard files (name it to whatever you like))
```
sudo mkdir /var/www/html/enecsys 
```
Time to copy all the files to the new webdirectory and make the config file writable
```
cd /home/pi/dash_temp/Enecsys_Dashboard-master
sudo cp * -R /var/www/enecsys
sudo chmod 777 /var/www/html/enecsys/inc/general_conf.inc.php
``` 
Ok. time to run the webinstaller. Open your browser and go to the ipaddress of your raspberry and followed by /enecsys/INSTALL/install.php<br>
Just walk through the installer

you need to have:
- the database credentials from your just created or already present database
- your webdirectory where you copied the files to


After this you should be able to login into the dashboard. Your ipaddress followed by your webdirectory (Example: http://10.0.0.50/enecsys<br>
http://IP_RASPBERRY/enecsys

default login: admin
default email: admin@dashboard.lan 
default password: dashboard

#Raspberry pi.
if running on rpi (1 or 2) its best to optimize mysql
http://www.ducky-pond.com/posts/2014/Feb/how-to-install-and-optimize-mysql-on-raspberry-pi/


# Enecsys_Dashboard - Version 2.2
- minor fixes and some enhancements
- created web installer for new dashboard installations (database has to be created though, and cronjobs have to be set)<br>
- created this page with some default information<br>
- changed the readme with the cronjob. users got confused.
- removed the mysql dump script. its not really a part of the dashboard. i will release loose linux/enecsys scripts in another github repository
- created pvoutput page (see top navigation), where the team page will be displayed (around 56 members already :D) 
- updated version font-awesome to 4.5.0

# Enecsys_Dashboard - Version 2.1 - BugFixes
- added jquery datepicker to history selection (wasn't working in IE).
- added jquery datepicker to inverter page
- added some text information. to create history views, you need to update the history table first.
 
update from 2.0 to 2.1? 
- just upload all the files again (except the directory INSTALL and inc)

# Enecsys_Dashboard - Version 2.0 - Intro
is based on the need for a Solar Dashboard to monitor on a local server. to monitor the enecsys inverters 
It needs to run on the same host where the the script of Omoerbeek is running.

Forum Topic on Tweakers: http://gathering.tweakers.net/forum/list_messages/1627615/0

Demo: not yet available (check screenshots in INSTALL directory)



#Note:
/*
 * Copyright (c) 2015 Jeroen van Marion <jeroen@vanmarion.nl>
 *
 * Permission to use, copy, modify, and distribute this software for any
 * purpose without fee is hereby granted, provided that the above
 * copyright notice and this permission notice appear in all copies.
 *
 * THE SOFTWARE IS PROVIDED "AS IS" AND THE AUTHOR DISCLAIMS ALL WARRANTIES
 * WITH REGARD TO THIS SOFTWARE INCLUDING ALL IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR
 * ANY SPECIAL, DIRECT, INDIRECT, OR CONSEQUENTIAL DAMAGES OR ANY DAMAGES
 * WHATSOEVER RESULTING FROM LOSS OF USE, DATA OR PROFITS, WHETHER IN AN
 * ACTION OF CONTRACT, NEGLIGENCE OR OTHER TORTIOUS ACTION, ARISING OUT OF
 * OR IN CONNECTION WITH THE USE OR PERFORMANCE OF THIS SOFTWARE.
 */