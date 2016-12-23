#!/bin/bash
# script name: sudo_install_webserver.sh
##
echo "Update system first"
sleep 1
apt-get update
sleep 1
echo "-------------------------------------------------------------"
echo "Install unzip"
sleep 1
apt-get -y install unzip

sleep 2

echo "-------------------------------------------------------------"
echo "Start install of apache, mysql, phpmyadmin"
sleep 1
echo "-------------------------------------------------------------"
echo "Here we go"
echo "Step 1: install php, apache, mysql"

sleep 1
apt-get -y install apache2 php5 php5-mcrypt php5-mysql php5-curl php5-gd php5-json mysql-server

sleep 2
echo "-------------------------------------------------------------"
echo "Step 2: enable php module mcrypt"

sleep 1
php5enmod mcrypt

sleep 2
echo "-------------------------------------------------------------"
echo "Step 3: restart apache2"
sleep 1
service apache2 restart

sleep 2
echo "-------------------------------------------------------------"
echo "Step 4: Install phpmyadmin"
sleep 1
apt-get -y install phpmyadmin
#press space to select apache2 followed by Tab and Enter to go on
#Configure database for phpmyadmin with dbconfig-common? no

sleep 2
echo "-------------------------------------------------------------"
echo "Step 5: echo add line to apache config ServerName 127.0.0.1"
sleep 1
/bin/echo "ServerName 127.0.0.1" >> /etc/apache2/apache2.conf

sleep 1
echo "-------------------------------------------------------------"
echo "Step 6: restart apache and mysql"
service apache2 restart
service mysql restart

sleep 2
echo "-------------------------------------------------------------"
echo "Installation Done! > Go to script No 3 "
