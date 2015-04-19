# Enecsys_Dashboard
is based on the need for a Dashboard to monitor on a local server.

It needs the database of the script that Omoerkbeek generates: https://github.com/omoerbeek/e2pv

Forum Topic on Tweakers: http://gathering.tweakers.net/forum/list_messages/1627615/0

Page 1 has a tutorial on how to install the complete setup on a raspberry pi. 
a linux server can handle the same thing.

#Setup:
Create Table:
```
CREATE TABLE IF NOT EXISTS `inverters` (
  `data_id` int(11) NOT NULL AUTO_INCREMENT,
  `inverter_serial` varchar(30) NOT NULL,
  `inverter_type` varchar(30) NOT NULL,
  `duo_single` varchar(30) NOT NULL,
  `parts_nr` varchar(30) NOT NULL,
  `build_date` datetime NOT NULL,
  `panel_1` int(11) DEFAULT NULL,
  `panel_2` int(11) DEFAULT NULL,
  PRIMARY KEY (`data_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;
```
Insert the inverters you have (based on the number of inverters)
``` 
where xxxx is your serial of the converter,
type: is the type of the inverter
when having duo inverters they are connected to 2 inverters. you can input that here
panel_1, panel_2
```
this table might be updated later

-- insert into inverters
```
INSERT INTO `inverters` (`inverter_serial`, `inverter_type`, `duo_single`, `parts_nr`, `build_date`, `panel_1`, `panel_2`) VALUES
('xxxx', 'SMI-480-60', 'duo', 'xxxx', '2012-09-12 00:00:00', 0, 0),
('xxxx', 'SMI-480-60', 'duo', 'xxxx', '2013-04-13 00:00:00', 0, 0),
('xxxx', 'SMI-480-60', 'duo', 'xxxx', '2013-04-13 00:00:00', 0, 0),
('xxxx', 'SMI-480-60', 'duo', 'xxxx', '2013-04-13 00:00:00', 0, 0),
('xxxx', 'SMI-480-60', 'duo', 'xxxx', '2013-04-13 00:00:00', 0, 0),
```
#Config.php
Needed for general settings
Fill in your db credentials.
System_Name: is how you would like to call your system or your System as in pvoutput
Nr_Colums: when having more then 5 colums, the rest of the colums will show on a new row. Default is 5
```
<?php
/* mysql configuration */
$dbHost = "";
$dbUserName = "";
$dbUserPasswd = "";
$dbName = "";

//$dbHost = "localhost";
//$dbUserName = "db_username";
//$dbUserPasswd = "db_password";
//$dbName = "db_name";

$System_Name = "YOUR SYSTEM NAME";
$Nr_Colums = 5;
?>
```

#Note:
This code is as is. 
If you are an experiend php programmer you might find some issues in the code. Don't blame me ;) Im not a programmer.
