#!/bin/bash

## version	: 3.0
## date		: december 10 2016
## features	: download of dashboard and installation of cronjobs
## make sure to make the file executable, otherwise you might get an "(" Unexpected error
## chmod +x 3.sudo_install_dashboard_cron.sh
## run as normal pi user:  ./5.install_dashboard_cron.sh webdirectory
## example:  ./5.install_dashboard_cron.sh solar (will result in /var/www/html/solar)

###########################################################################
## // SET DOWNLOAD LINK + FILE ##
DOWNLOAD=https://github.com/nlmaca/Enecsys_Dashboard/archive/
ZIPFILE=develop.zip
ZIPNAME=Enecsys_Dashboard-develop

if [ -z "$1" ]
then
  echo "You forgot to set the webdirectory. Run again with the webdirectory where the dashboard is stored"
  echo "Example: ./5.install_dashboard_cron.sh enecsys_solar"
else

  #go the pi home directory first
  if [ -d "/var/www/html/$1" ]; then
    echo "/var/www/html/$1 already exists. Rerun this script with a non-existing directory"
    exit 0
  fi

  echo "Start in the home directory"
  echo ""

  if [ -d "/home/pi/dash_temp" ]; then
    echo "/home/pi/dash_temp directory exists. it will be removed"
    rm -R /home/pi/dash_temp
    cd /home/pi
    mkdir dash_temp
    cd /home/pi/dash_temp/

  else
    cd /home/pi
    mkdir dash_temp
    cd /home/pi/dash_temp/
  fi

  wget $DOWNLOAD/$ZIPFILE
  sleep 1

  unzip $ZIPFILE
  sleep 1

  sudo mkdir /var/www/html/$1
  cd $ZIPNAME
  sudo cp -R * /var/www/html/$1

  sleep 2

  sudo chmod 777 /var/www/html/$1/include/config.php

  #git doesnt create empty directories in version control. thats why the manual creation of it
  sudo mkdir /var/www/html/$1/backups/files/
  sudo chmod 777 /var/www/html/$1/backups/files

  echo "Checking if cronjobs exists for this installation and pi user. If old dashboard cronjobs exists they will be deleted."
  #check and set cronjobs
  ## check if old crontab records are present. if so, they will be deleted for the user pi
  crontab -u pi -l | grep -v 'e2pv.php' | crontab -u pi -
  crontab -u pi -l | grep -v 'cron_nightly_reports.php' | crontab -u pi -
  crontab -u pi -l | grep -v 'clean_log.php' | crontab -u pi -
  crontab -u pi -l | grep -v 'check_log.php' | crontab -u pi -
  crontab -u pi -l | grep -v 'check_gateway.php' | crontab -u pi -
  crontab -u pi -l | grep -v 'alert_inverter.php' | crontab -u pi -
  crontab -u pi -l | grep -v 'backupFiles.php' | crontab -u pi -
  crontab -u pi -l | grep -v 'backupDB.php' | crontab -u pi -
  crontab -u pi -l | grep -v 'cleanFiles.php' | crontab -u pi -

  #check if cronjob exists, otherwise create it

  CMD="sleep 60 && cd /var/www/html/$1/e2pv/; php /var/www/html/$1/e2pv/e2pv.php"
  JOB="@reboot $CMD"
  TMPC="mycron1"
  grep "$CMD" -q <(crontab -l) || (crontab -l>"$TMPC"; echo "$JOB">>"$TMPC"; crontab "$TMPC")
  rm mycron1

  #check if cronjob exists, otherwise create it
  CMD="cd /var/www/html/$1/cron/; php /var/www/html/$1/cron/cron_nightly_reports.php"
  JOB="1 0 * * * $CMD"
  TMPC="mycron2"
  grep "$CMD" -q <(crontab -l) || (crontab -l>"$TMPC"; echo "$JOB">>"$TMPC"; crontab "$TMPC")
  rm mycron2

  #check if cronjob exists, otherwise create it
  CMD="cd /var/www/html/$1/backups/; php /var/www/html/$1/backups/cleanFiles.php"
  JOB="0 5 * * * $CMD"
  TMPC="mycron3"
  grep "$CMD" -q <(crontab -l) || (crontab -l>"$TMPC"; echo "$JOB">>"$TMPC"; crontab "$TMPC")
  rm mycron3

  #check if cronjob exists, otherwise create it
  CMD="cd /var/www/html/$1/e2pv/; php /var/www/html/$1/e2pv/check_log.php"
  JOB="*/10 * * * * $CMD"
  TMPC="mycron4"
  grep "$CMD" -q <(crontab -l) || (crontab -l>"$TMPC"; echo "$JOB">>"$TMPC"; crontab "$TMPC")
  rm mycron4

  #check if cronjob exists, otherwise create it
  CMD="cd /var/www/html/$1/cron/; php /var/www/html/$1/cron/check_gateway.php"
  JOB="*/30 * * * * $CMD"
  TMPC="mycron5"
  grep "$CMD" -q <(crontab -l) || (crontab -l>"$TMPC"; echo "$JOB">>"$TMPC"; crontab "$TMPC")
  rm mycron5

  #check if cronjob exists, otherwise create it
  CMD="cd /var/www/html/$1/cron/; php /var/www/html/$1/cron/alert_inverter.php"
  JOB="*/30 * * * * $CMD"
  TMPC="mycron6"
  grep "$CMD" -q <(crontab -l) || (crontab -l>"$TMPC"; echo "$JOB">>"$TMPC"; crontab "$TMPC")
  rm mycron6

  #check if cronjob exists, otherwise create it
  CMD="cd /var/www/html/$1/backups/; php /var/www/html/$1/backups/backupFiles.php"
  JOB="0 3 * * * $CMD"
  TMPC="mycron7"
  grep "$CMD" -q <(crontab -l) || (crontab -l>"$TMPC"; echo "$JOB">>"$TMPC"; crontab "$TMPC")
  rm mycron7

  #check if cronjob exists, otherwise create it
  CMD="cd /var/www/html/$1/backups/; php /var/www/html/$1/backups/backupDB.php"
  JOB="0 4 * * * $CMD"
  TMPC="mycron8"
  grep "$CMD" -q <(crontab -l) || (crontab -l>"$TMPC"; echo "$JOB">>"$TMPC"; crontab "$TMPC")
  rm mycron8

  # temp zip will be deleted to keep things clean
  rm -rf /home/pi/dash_temp/

  echo "Installation Done."
  echo "Open your browser and go to:"
  IP_ADDRESS="$(ip addr show eth0 | grep "inet\b" | awk '{print $2}' | cut -d/ -f1)"
  directory=/$1/install_process.php
  result=http://$IP_ADDRESS$directory
  echo $result

fi
