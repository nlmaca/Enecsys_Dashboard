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



