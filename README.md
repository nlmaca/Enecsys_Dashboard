# Enecsys_Dashboard - Version 2.2
- minor fixes and some enhancements
- created web installer for new dashboard installations (database has to be created though, and cronjobs have to be set)<br>
- created this page with some default information<br>
- changed the readme with the cronjob. users got confused.
- removed the mysql dump script. its not really a part of the dashboard. i will release loose linux/enecsys scripts in another github repository
- created pvoutput page (see top navigation), where the team page will be displayed (around 56 members already :D) 
- updated version font-awesome to 4.5.0
 
update from 2.0 to 2.2? 
- just upload (overwrite) all the files again except the directories INSTALL/ and inc/
- no changes are made in the database
- new install with existing database? you wont loose your master table.

#Requirements
- Apache 2.x
- PHP5.3+
- MySQL (+phpmyadmin)
- Script from Omoerbeek installed with output to database see: https://github.com/omoerbeek/e2pv

#cronjobs
- cronjobs (should be running already when you installed the php/mysql/apache setup: 
- where enecsys is the directory where your e2pv script is located.
```
@reboot php /home/pi/enecsys/e2pv.php >> /home/pi/enecsys/e2pv.log
0 1 * * * sudo cp /dev/null /home/pi/enecsys/e2pv.log
```
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
sudo mkdir /var/www/enecsys 
```
Time to copy all the files to the new webdirectory and make the config file writable
```
cd /home/pi/dash_temp/Enecsys_Dashboard-master
sudo cp * -R /var/www/enecsys
sudo chmod 777 /var/www/enecsys/inc/general_conf.inc.php
``` 
Ok. time to run the webinstaller. Open your browser and go to the ipaddress of your raspberry and followed by /enecsys/INSTALL/install.php<br>
Just walk through the installer

you need to have:
- the database credentials from your just created or already present database
- your webdirectory where you copied the files to


After this you should be able to login into the dashboard. Your ipaddress followed by your webdirectory (Example: http://10.0.0.50/enecsys<br>
http://IP_RASPBERRY/Enecsys_Dashboard

default login: admin
default email: admin@dashboard.lan 
default password: dashboard

#Raspberry pi.
if running on rpi (1 or 2) its best to optimize mysql
http://www.ducky-pond.com/posts/2014/Feb/how-to-install-and-optimize-mysql-on-raspberry-pi/

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

a detailed installation is handled on the github wiki page. because its build for a rpi and in combination with the script from Omoerbeek
some adjustments have to be made.

Demo: not yet available (check screenshots in INSTALL directory)



#Note:
/*
 * Copyright (c) 2015 Jeroen van Marion <jeroen@vanmarion.nl>
 *
 * Permission to use, copy, modify, and distribute this software for any
 * purpose with or without fee is hereby granted, provided that the above
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