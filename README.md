
#Update
I completely rebuild version 2.3. This resulted in version 3.0. I'm pretty stoked about it. I hope you like it just as i like it:D 

#Intro
This dashboard is written in php and is depending on the output of the script from <a href="https://github.com/omoerbeek/e2pv">Omoerbeek</a>. The script is integrated
in the dashboard, so i tweaked it a bit:D. The previous version was a first setup. From this end i supported quite some users on this project, but it was hard to maintain for users. Thats why
i decided to build a new dashboard with the e2pv script integrated. I think it worked out pretty fine.

#What does it do?
If you have Gen1 Enecsys inverters, you are able to use this dashboard. It will give you an indication of your inverters, with long term history. Ad the same time it will
output the data to your pvoutput, which has a bit more detailed history overall. In my dashboard you can see more on an inverter level.

The reason i choose for a rpi as a platform, is so you don't have to depend on 3rd parties anymore. You control your data. Also the costs are low.

#Requirements hardware:
- Raspberry Pi B+ or Raspberry Pi 2 or  Raspberry Pi 3 with LAN access (not wireless)
- Operating System: Raspbian Jessie or Jessie (lite)
- Micro(sd) of 8 GB is enough. Don't go further then 32GB, it can cause issues on the rpi (raspberry)

#Installation:
Open <a href="https://github.com/nlmaca/Enecsys_Dashboard/blob/master/INSTALL/INSTALL_RPI.pdf">INSTALL_RPI.pdf</a> from the INSTALL directory
A video will be created. I will add that in the next update

#Support:
I only support clean RPI installations. if you have other stuff running on your rpi, you are on your own. 
The reason is the installer scripts are only made for an rpi environment. Other platforms can cause issues, that is beyond my scope. 
If you want to run it on your nas or other device, you are free to download the code, i don't give support on it though. Thats up to you.

* Note. if you are running V2.3 send me a message on jeroen@vanmarion.nl i do have upgrade scripts, but they won't work on a rpi, because it will run out of memory. 
I can help you to migrate to the new version, but have to do that manually. I would appreciate it if you would make a donation. 

#Demo
You can see a demo on my channel. it might not show all latest changes, but you will get the impression
https://www.youtube.com/watch?v=a_dRUsGVymg

#Tweakers community
https://gathering.tweakers.net/forum/list_messages/1627615/0