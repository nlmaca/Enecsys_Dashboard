#!/bin/bash

## version	: 3.0
## language	: english
## date		  : november 11, 2016
## Run as   : normal user
## This script will create a database based on the questions you answer. it will check first if the database exists or not

# Create database for syspass with all privileges for the user

echo -n "Enter Name for database:"
read dbname
echo -n "Enter Database Username:"
read dbuser
echo -n "Set a password for this database:"
read dbpw
echo ""
echo -n "Enter the MySQL root password:"
read rootpw

echo "First check if the database exists or not"
RESULT=`mysql -u root -p$rootpw --skip-column-names -e "SHOW DATABASES LIKE '$dbname'"`
if [ "$RESULT" == "$dbname" ]; then
    echo "Exit: Cannot Create given Database. It does already exists. Run again with new database name"
    exit 0
else
    echo "Database does not exist. A new one will be created with your given credentials"
fi

echo "The database will be created with the settings you gave"
sleep 2

db="create database $dbname;GRANT ALL PRIVILEGES ON $dbname.* TO $dbuser@localhost IDENTIFIED BY '$dbpw';FLUSH PRIVILEGES;"
mysql -u root -p$rootpw -e "$db"

if [ $? != "0" ]; then
 echo "[Error]: Database creation failed"
 exit 1
else
 echo "------------------------------------------"
 echo " Database has been created successfully ,save these credentials!! "
 echo "------------------------------------------"
 echo " Database Info: "
 echo ""
 echo " Database Name    : $dbname"
 echo " Database User    : $dbuser"
 echo " Database Password: $dbpw"
 echo ""
 echo "------------------------------------------"

fi

sleep 2
echo "-------------------------------------------------------------"
echo "MySQL Installation Done!"
echo "Note the database name, username and password on a safe place. You will also need them in the install process"
echo "Start script No 4."
