#!/bin/bash
##
## Clean all files including this one after install of dashboard
## this script needs to be started on terminal after installation of the dashboard (finish webinstaller first)
## run from terminal: sudo clean_install.sh WEBDIRECTORY
###########################################################################

#delete installation files
sudo rm -rf /var/www/html/$1/install_process.php

sudo rm -rf /var/www/html/$1/INSTALL
sudo rm -rf /var/www/html/$1/INSTALL_SCRIPTS

echo "Cleanup done. You can logout and manage the rest in the dashboard. Have fun:D"

#end of file
