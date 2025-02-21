#!/bin/bash

# run as: sudo

if sudo cat /etc/sudoers | grep -xqFe "www-data ALL = NOPASSWD: /sbin/reboot, /sbin/halt"
then
  echo "This line already is present. Nothing will be updated"
  echo "Installation Done. Go to step No 5.:"

else
  echo "Line added to sudoers"
  echo "Installation Done. Go to step No 5."
  echo "www-data ALL = NOPASSWD: /sbin/reboot, /sbin/halt" >> /etc/sudoers;

fi
