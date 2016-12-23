#!/bin/bash

## Copyright (c) 2015 Jeroen van Marion <jeroen@vanmarion.nl>
##
## LICENSE: MIT
##
## version	: 3.1
## language	: english
## date		: november 19, 2016
## Run with sudo

echo "This script is only for LAN setup, not Wifi"
echo "You can use these current ipadress / netmask / gateway if you want"

IPADDRESS="$(ifconfig eth0 2>/dev/null|awk '/inet addr:/ {print $2}'|sed 's/addr://')"
NETMASK="$(ifconfig eth0 | sed -rn '2s/ .*:(.*)$/\1/p')"
GATEWAY="$(route -n | grep 'UG[ \t]' | awk '{print $2}')"
echo ""
echo "ip:" $IPADDRESS / "mask:" $NETMASK / "Gateway:" $GATEWAY
echo ""

getinfo()
{
  read -p "Set the ip of your raspberry: " staticip
  read -p "Set the netmask: " netmask
  read -p "Set your router gateway: " routerip
}

writeinterfacefile()
{
cat << EOF > $1
# This file describes the network interfaces available on your system
# and how to activate them.
# The loopback network interface
auto lo
iface lo inet loopback

# The primary network interface
auto eth0
iface eth0 inet static
address $staticip
netmask $netmask
gateway $routerip

allow-hotplug wlan0
iface wlan0 inet manual
    wpa-conf /etc/wpa_supplicant/wpa_supplicant.conf

allow-hotplug wlan1
iface wlan1 inet manual
    wpa-conf /etc/wpa_supplicant/wpa_supplicant.conf

EOF

  echo ""
  echo "The new settings will be applyed on the primary network interface in '$1' "
  echo "After a reboot you can find your rpi on this ipaddress: $staticip"
  echo "For further dashboard installation start script No. 2"
  exit 0
}

file="/etc/network/interfaces"
if [ ! -f $file ]; then
  echo ""
  echo "The file '$file' doesnt exists. "
  echo ""
  exit 1
fi

echo "U can fill in the above findings, or use one you want"
echo ""

getinfo
echo ""
echo "Your new network settings:"
echo "Primary interface: eth0"
echo "Router gateway: $routerip"
echo "Netwerk mask: $netmask"
echo "Raspberry Ip address: $staticip"
echo ""

while true; do
  read -p "Is dit correct? [y/n]: " yn
  case $yn in
    [Yy]* ) writeinterfacefile $file;;
    [Nn]* ) getinfo;;
        * ) echo "Verify with y or n";;
  esac
done
