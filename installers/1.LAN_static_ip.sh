#!/bin/bash

## Copyright (c) 2015 Jeroen van Marion <jeroen@vanmarion.nl>
##
## LICENSE: MIT
##

## Version  : 4.1.1
## date     : april 8, 2020
## Changes  : first check for active adapter name. then use that name to retreive the ipadress of that adapter. 

## version  : 4.0.0
## language : english
## date     : 2017, december 12

## Changes : - Functionality change within Raspbian for setting Interfaces
##         : - LAN SCRIPT ONLY. Different script for WLAN and Wifi Settings is present
## Files changed: /etc/dhcpcd.conf

## Get current ipadress (with subnet) and Gateway address (dns will be the same)
IP_ADDRESS="$(hostname -I)"

# first get active (internet) network adapter name (could be eth0 but also ens160)
NAME_ADAPTER="$(ip addr show | awk '/inet.*brd/{print $NF}')"

IP_ADDRESS_SUBNET="$(ip addr show $NAME_ADAPTER | grep "inet\b" | awk '{print $2}')"

GATEWAY="$(route -n | grep 'UG[ \t]' | awk '{print $2}')"

# show single ip only without subnet
# IP_ADDRESS="$(ip addr show eth0 | grep "inet\b" | awk '{print $2}' | cut -d/ -f1)"

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
