#!/bin/bash
####### general info ########
    #author     : J. van Marion
    #date       : january 29, 2015
    #version    : 1.0
    #file name  : mysql_dump.sh
    # create mysql dump with predefined settings.
    #--single-transaction = produces a checkpoint that allows the dump to capture all data prior to the checkpoint while receiving incoming changes
    #--routines = dumps all stored procedures and stored functions
    #--triggers = dumps all triggers for each table that has them
#############################
#configuration
# 1. backup_location
# 2. database credentials (DBNAME, DBUSER, DBPASS)
# 3. dbtype (comment out)
#   MyISAM=lock-tables
#   InnoDB=single-transaction
# 4. cronjob create for every day as user root
#    00 00 * * * /path/to/script/mysql_dump.sh >> /path/to/log/mysqldump_cron.log 2>&1
#############################
#1. set backup location
backup_location=/home/pi/mysql_backup
#2. set database credentials
dbname=DATABASENAME
dbuser=DATABASEUSER
dbpass=DATABASEPASSWORD
#3. comment out which one is needed
dbtype=single-transaction
#dbtype=lock-tables

################# don't edit below #####################

echo "Starting dump & backup"
sleep 1
echo "Here we go"

today=$(date '+%d_%m_%Y_%H-%M-%S')

mysqldump -u "$dbuser" -p"$dbpass" --"$dbtype" --routines --triggers --opt "$dbname"| gzip > "$backup_location"/mysqldump_"$dbname"_"$today".sql.gz

echo "mysql dump success"
sleep 1

DATEVAR=`date +20\%y\%m\%d_\%H:\%M:\%S`

echo $DATEVAR  ": Backup success" >> /home/pi/mysql_backup/backup.log

echo "end of script"
