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

CREATE TABLE enecsys_history (
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


/* default user: user: admin / email: admin@dashboard.lan / password: dashboard */
INSERT INTO `users` (`id`, `username`, `password`, `salt`, `email`) VALUES
(1, 'admin', 'd7d3814a18eb8695e5db382e5be61bb5ac920fa44c11c707f548ef3601935217', '1a00eed160382dc3', 'admin@dashboard.lan');


