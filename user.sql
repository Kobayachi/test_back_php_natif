CREATE TABLE IF NOT EXISTS `user` (

  `id` int NOT NULL AUTO_INCREMENT,
  `age` int NOT NULL,
  `balance` float NULL,
  `firstname` char(50) NOT NULL,
  `lastname` char(50) NOT NULL,
  `cars` int,
  PRIMARY KEY(`id`),
  FOREIGN KEY (`cars`) REFERENCES car(`id`)

);
