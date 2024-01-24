CREATE DATABASE  IF NOT EXISTS `rac`;
USE `rac`;
DROP TABLE IF EXISTS `rac`;
CREATE TABLE `rac` (
  `codigo` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(65) NOT NULL,
  `contrasena` varchar(85) NOT NULL,
  `comentario` varchar(405) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
LOCK TABLES `rac` WRITE;
INSERT INTO `rac` VALUES (2,'lucas','germes','porfa');
UNLOCK TABLES;

  