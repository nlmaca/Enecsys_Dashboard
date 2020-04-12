#!/bin/bash
#installer.sh
#added base url, better to maintain url links

cd /home/pi

BASEURL=https://raw.githubusercontent.com/nlmaca/Enecsys_Dashboard/master/installers

wget $BASEURL/1.LAN_static_ip.sh
wget $BASEURL/2.sudo_install_webserver.sh
wget $BASEURL/3.sudo_create_database.sh
wget $BASEURL/4.sudo_addsudoers.sh
wget $BASEURL/5.install_dashboard_cron.sh
wget $BASEURL/6.sudo_clean_install.sh

#set files executable
chmod +x *.sh

## end of file
