#!/bin/bash

## Copyright (c) 2015 Jeroen van Marion <jeroen@vanmarion.nl>
##
## LICENSE: MIT
##

## version  : 4.0
## language : english
## date     : 2017, december 12

## Changes : - Functionality change within Raspbian for setting Interfaces
##         : - LAN SCRIPT ONLY. Different script for WLAN and Wifi Settings is present
## Files changed: /etc/dhcpcd.conf

## Get current ipadress (with subnet) and Gateway address (dns will be the same)
IP_ADDRESS="$(hostname -I)"
IP_ADDRESS_SUBNET="$(ip addr show eth0 | grep "inet\b" | awk '{print $2}')"
GATEWAY="$(route -n | grep 'UG[ \t]' | awk '{print $2}')"


NETWORK_FILE=/etc/dhcpcd.conf

echo "Your current ip address:" $IP_ADDRESS "/ Gateway:" $GATEWAY

if grep -Fxq "###Added by NLMaca - RPI static ip installer###" $NETWORK_FILE
then
 echo ""
 echo "*NOTE* "
 echo "address already added. Need to change? fix it manually by opening the file: /etc/dhcpcd.conf"
else
 echo "###Added by NLMaca - RPI static ip installer###" >> $NETWORK_FILE
 echo "interface eth0" >> $NETWORK_FILE
 echo "static ip_address=$IP_ADDRESS_SUBNET" >> $NETWORK_FILE
 echo "static routers=$GATEWAY" >> $NETWORK_FILE
 echo "static domain_name_servers=$GATEWAY" >> $NETWORK_FILE
 echo "###END NLMaca - RPI static ip installer###" >> $NETWORK_FILE

 echo ""
 echo ""
 echo "*NOTE*: Settings are added. Reboot your rpi and check if you can connect again to IP:" $IP_ADDRESS "on ssh port: 22"
 echo "run command: sudo reboot"
fi
