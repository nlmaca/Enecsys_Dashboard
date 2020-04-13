#!/bin/bash

## Version  : 4.1.1
## date     : april 8, 2020
## changes  : credentials will be saved to file in the /home/pi directory

## version  : 4.0
## date     : 2017, december 12
## changes  : automatic creation of database and pre-generated database name and password

## version	: 3.0
## language	: english
## date		  : november 11, 2016
## Run as   : normal user
## This script will create a database based on the questions you answer. it will check first if the database exists or not

# Create database for syspass with all privileges for the user

#set Database name
ENECSYS_DBPREFIX="enecsys"
ENECYS_DB="$(openssl rand -hex 3)"
ENECSYS_DBNAME=$ENECSYS_DBPREFIX"_"$ENECYS_DB
ENECSYS_USERNAME=$ENECSYS_DBPREFIX"_"$ENECYS_DB
ENECSYS_DB_PASSWORD="$(openssl rand -hex 8)"

echo -n "Enter the MySQL root password:"
read MYSQL_ROOT_PASSWORD

echo "First check if the database exists or not"
RESULT=`mysql -u root -p$MYSQL_ROOT_PASSWORD --skip-column-names -e "SHOW DATABASES LIKE '$ENECSYS_DBNAME'"`
if [ "$RESULT" == "$ENECSYS_DBNAME" ]; then
    echo "Exit: Cannot Create given Database. It does already exists. Rerun script"
    exit 0
else
    echo "Database does not exist. A new one will be created"
fi

echo "The database, username and password will be created"
sleep 2

db="create database $ENECSYS_DBNAME;GRANT ALL PRIVILEGES ON $ENECSYS_DBNAME.* TO $ENECSYS_USERNAME@localhost IDENTIFIED BY '$ENECSYS_DB_PASSWORD';FLUSH PRIVILEGES;"
mysql -u root -p$MYSQL_ROOT_PASSWORD -e "$db"

if [ $? != "0" ]; then
 echo "[Error]: Database creation failed"
 exit 1

 # also echo the data to /home/pi/db_<name>_setup.log. If users forget to copy the credentials they can simply check this file.
else
 echo "------------------------------------------" >> /home/pi/db_setup_enecsys.log
 echo " Database has been created successfully ,save these credentials!! " >> /home/pi/db_setup_enecsys.log
 echo "------------------------------------------" >> /home/pi/db_setup_enecsys.log
 echo " Database Info: " >> /home/pi/db_setup_enecsys.log
 echo "" >> /home/pi/db_setup_enecsys.log
 echo " Mysql root user    : root" >> /home/pi/db_setup_enecsys.log
 echo " Mysql root Password: $MYSQL_ROOT_PASSWORD" >> /home/pi/db_setup_enecsys.log
 echo "" >> /home/pi/db_setup_enecsys.log
 echo " Database Name      : $ENECSYS_DBNAME" >> /home/pi/db_setup_enecsys.log
 echo " Database User      : $ENECSYS_USERNAME" >> /home/pi/db_setup_enecsys.log
 echo " Database Password  : $ENECSYS_DB_PASSWORD" >> /home/pi/db_setup_enecsys.log
 echo "" >> /home/pi/db_setup_enecsys.log
 echo "------------------------------------------" >> /home/pi/db_setup_enecsys.log

fi

sleep 2
echo "-------------------------------------------------------------"
echo "MySQL Installation Done!"
echo "The credentials are saved to /home/pi/db_setup.log"
echo "Save the database credentials on a safe place. You will need them in the install process"
echo "Start script No 4."
