/*
SQLyog Ultimate v12.4.1 (32 bit)
MySQL - 10.1.37-MariaDB : Database - internoaudit
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`internoaudit` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `internoaudit`;

/*Table structure for table `detallepedido_audit` */

DROP TABLE IF EXISTS `detallepedido_audit`;

CREATE TABLE `detallepedido_audit` (
  `id_detallepedido` int(11) NOT NULL AUTO_INCREMENT,
  `id_pedido` int(11) NOT NULL COMMENT 'id del pedido',
  `id_elemento` int(11) NOT NULL COMMENT 'id del elemento a pedir',
  `cantidad` int(11) NOT NULL COMMENT 'cantidad de elementos solicitados',
  `observacion` varchar(50) DEFAULT NULL COMMENT 'observacion sobre el elemento',
  `fecha` datetime NOT NULL COMMENT 'fecha de carga del elemento',
  `accion` varchar(50) NOT NULL,
  `fecha_accion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_detallepedido`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Table structure for table `movimientopedido_audit` */

DROP TABLE IF EXISTS `movimientopedido_audit`;

CREATE TABLE `movimientopedido_audit` (
  `id_movimientopedido` int(11) NOT NULL AUTO_INCREMENT,
  `id_estadopedido` int(11) NOT NULL COMMENT 'rela estado pedido',
  `fechamovimiento` datetime NOT NULL COMMENT 'fecha en que se realiza el movimiento',
  `id_pedido` int(11) NOT NULL COMMENT 'rela del pedido',
  `id_tipomovimiento` int(11) NOT NULL COMMENT 'que tipo de movimento es',
  `dependenciadestino` int(11) NOT NULL COMMENT 'a donde se hace el movimiento',
  `fechacarga` datetime NOT NULL,
  `accion` varchar(50) NOT NULL,
  `fecha_accion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_movimientopedido`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Table structure for table `pedido_audit` */

DROP TABLE IF EXISTS `pedido_audit`;

CREATE TABLE `pedido_audit` (
  `id_pedido` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id del pedido',
  `id_tipopedido` int(11) NOT NULL COMMENT 'rela de la tabla tipo pedido',
  `fechaalta` datetime NOT NULL COMMENT 'fecha que se crea el pedido',
  `titulo` varchar(50) NOT NULL COMMENT 'titulo del pedido',
  `descripcion` text NOT NULL COMMENT 'Descripcion del pedido',
  `dependenciaorigen` int(11) NOT NULL COMMENT 'Id de la dependencia donde se origina el pedido',
  `accion` varchar(50) NOT NULL,
  `fecha_accion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pedido`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
