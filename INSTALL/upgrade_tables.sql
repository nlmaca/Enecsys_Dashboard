/* page version: 2.3 */
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
) ENGINE=InnoDB;

ALTER TABLE inverters
add column Wpanel_1 INT NULL;

ALTER TABLE inverters
ADD Wpanel_2 INT NULL;

ALTER TABLE inverters
DROP COLUMN panel_1,
DROP COLUMN panel_2;

ALTER TABLE inverters
ADD inverter_alias VARCHAR(100) NULL AFTER inverter_type;

ALTER TABLE inverters
MODIFY parts_nr VARCHAR(30) NULL;

ALTER TABLE inverters
MODIFY build_date datetime NULL;

INSERT IGNORE INTO `alerts` (`alert_id`, `device`, `note_short`, `img_url`, `status`, `last_check`) VALUES
	(1, 'Inverter', 'Inverter Issues!. Check inverters ', '../img/img-inverter.png', 0, '2016-21-31 14:00:00'),
	(2, 'Gateway', 'No Data Input. Check Gateway IP or Reboot Enecsys Gateway', '../img/img-gateway.png', 0, '2016-12-31 15:00:00');


CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `salt` char(16) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS enecsys (
  ts TIMESTAMP NOT NULL,
  id INT NOT NULL,
  wh INT NOT NULL,
  dcpower INT NOT NULL,
  dccurrent FLOAT NOT NULL,
  efficiency FLOAT NOT NULL,
  acfreq INT NOT NULL,
  acvolt FLOAT NOT NULL,
  temp FLOAT NOT NULL,
  state INT NOT NULL,
  key (ts, id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS enecsys_report (
  ts TIMESTAMP NOT NULL,
  id INT NOT NULL,
  whstart INT NOT NULL,
  whend INT NOT NULL,
  whtotal FLOAT NOT NULL,
  avgtemp FLOAT NOT NULL,
  key (ts, id)
);

CREATE TABLE IF NOT EXISTS system_settings (
set_id INT(11) AUTO_INCREMENT NOT NULL,
lang VARCHAR(5) NOT NULL,
location VARCHAR(255) NOT NULL,
country VARCHAR(255) NOT NULL,
timezone VARCHAR(255) NOT NULL,
currency VARCHAR(100) NOT NULL,
kwh_price VARCHAR(10) NOT NULL,
temperature VARCHAR(100) NOT NULL,
pvoutput_id INT(10) null,
pvoutput_sys_id INT(10) null,
pvoutput_team_id INT NOT NULL,
pvoutput_team_name VARCHAR(100) NULL,
gateway_ip VARCHAR(15) NOT NULL,
PRIMARY KEY(set_id)
);

-- initial data !!!
insert into system_settings (lang, location, country, timezone, currency, kwh_price, temperature, pvoutput_id,
pvoutput_sys_id, pvoutput_team_id, pvoutput_team_name, gateway_ip) VALUES
('ENG', 'Emmen', 'NL', 'Europe/Amsterdam', 'EUR', '0.22', 'Celcius', 0, 0, 1018, 'Enecsys by Tweakers', '0.0.0.0');

CREATE TABLE IF NOT EXISTS e2pv_settings (
data_id INT(11) AUTO_INCREMENT NOT NULL,
e2pv_verbose INT NOT NULL,
e2pv_idcount INT NOT NULL,
e2pv_apikey VARCHAR(200) NOT NULL,
e2pv_systemid INT NOT NULL,
e2pv_lifetime INT NOT NULL,
e2pv_mode VARCHAR(20) NOT NULL,
e2pv_extended INT NOT NULL,
e2pv_ac INT NOT NULL,
PRIMARY KEY(data_id)
);

insert into e2pv_settings (e2pv_verbose, e2pv_idcount, e2pv_apikey, e2pv_systemid, e2pv_lifetime, e2pv_mode, e2pv_extended, e2pv_ac) values
(0, 0, 'apikey', 0, 0, 'AGGREGATE', 0, 0);

CREATE TABLE IF NOT EXISTS e2pv_ignore (
data_id INT(11) AUTO_INCREMENT NOT NULL,
e2pv_inverter INT NOT NULL,
e2pv_descr VARCHAR(100) NULL,
PRIMARY KEY(data_id)
);

CREATE TABLE alerts (
alert_id INT AUTO_INCREMENT NOT NULL,
device VARCHAR(100) NOT NULL,
note_short VARCHAR(100) NOT NULL,
img_url VARCHAR(100) NOT NULL,
status INT NOT NULL,
last_check datetime NOT NULL,
PRIMARY KEY(alert_id)
);

INSERT INTO `alerts` (`alert_id`, `device`, `note_short`, `img_url`, `status`, `last_check`) VALUES
(1, 'Inverter', 'Inverter Issues!. Check inverters ', '../img/img-inverter.png', 0, '2016-10-13 14:00:00'),
(2, 'Gateway', 'No Data Input. Check Gateway IP or Reboot Enecsys Gateway', '../img/img-gateway.png', 0, '2016-10-13 15:00:00');
