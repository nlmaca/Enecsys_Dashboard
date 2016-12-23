#!/bin/bash

## version	: 3.0
## language	: english
## date		: november 12, 2016
## Run as normal pi user with sudo (sudo ./addsudoers.sh)
## This script will add the apache user to allow it to reboot and shutdown the pi from the dashboard

# run file as normal user, but file needs to have root permission rights
# chmod +x addsudoers.sh will do the trick to skip the password
# run as: ./addsudoers.sh

if sudo cat /etc/sudoers | grep -xqFe "www-data ALL = NOPASSWD: /sbin/reboot, /sbin/halt"
then
  echo "This line already is present. Nothing will be updated"
  echo "Installation Done. Go to step No 5.:"

else
  echo "Line added to sudoers"
  echo "Installation Done. Go to step No 5."
  echo "www-data ALL = NOPASSWD: /sbin/reboot, /sbin/halt" >> /etc/sudoers;

fi
