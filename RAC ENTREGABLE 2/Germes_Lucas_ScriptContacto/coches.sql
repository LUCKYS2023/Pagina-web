CREATE DATABASE  IF NOT EXISTS `usser`;
USE `usser`;
DROP TABLE IF EXISTS `usser`;
CREATE TABLE `usser` (
  `codigo` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(85) NOT NULL,
  `contrasena` varchar(85) NOT NULL,
  `email` varchar(85) NOT NULL,
  `mensaje` varchar(405) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
LOCK TABLES `usser` WRITE;
INSERT INTO `usser` VALUES (2,'lucas','6093','lucasby6093@gmail.com','pichas');
UNLOCK TABLES;

