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
  `id_detallepedidoaud` int(11) NOT NULL AUTO_INCREMENT,
  `id_detallepedido` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL COMMENT 'id del pedido',
  `id_elemento` int(11) NOT NULL COMMENT 'id del elemento a pedir',
  `cantidad` int(11) NOT NULL COMMENT 'cantidad de elementos solicitados',
  `observacion` varchar(50) DEFAULT NULL COMMENT 'observacion sobre el elemento',
  `fecha` datetime NOT NULL COMMENT 'fecha de carga del elemento',
  `accion` varchar(50) NOT NULL,
  `fecha_accion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_detallepedidoaud`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `detallepedido_audit` */

insert  into `detallepedido_audit`(`id_detallepedidoaud`,`id_detallepedido`,`id_pedido`,`id_elemento`,`cantidad`,`observacion`,`fecha`,`accion`,`fecha_accion`) values 
(1,5,5,3,3,'editado','2019-02-14 15:24:30','EDITADO','2019-04-03 09:01:27'),
(2,6,6,3,1,'asd','2019-02-11 17:28:49','EDITADO','2019-04-03 09:01:29'),
(3,1,5,3,3,'editado','2019-02-14 15:24:30','EDITADO','2019-04-03 09:01:52'),
(4,2,6,3,1,'asd','2019-02-11 17:28:49','EDITADO','2019-04-03 09:01:58'),
(5,2,6,3,1,'asd','2019-04-11 17:28:49','EDITADO','2019-04-03 09:46:45');

/*Table structure for table `movimientopedido_audit` */

DROP TABLE IF EXISTS `movimientopedido_audit`;

CREATE TABLE `movimientopedido_audit` (
  `id_movimientopedidoaud` int(11) NOT NULL AUTO_INCREMENT,
  `id_movimientopedido` int(11) NOT NULL,
  `id_estadopedido` int(11) NOT NULL COMMENT 'rela estado pedido',
  `fechamovimiento` datetime NOT NULL COMMENT 'fecha en que se realiza el movimiento',
  `id_pedido` int(11) NOT NULL COMMENT 'rela del pedido',
  `id_tipomovimiento` int(11) NOT NULL COMMENT 'que tipo de movimento es',
  `dependenciadestino` int(11) NOT NULL COMMENT 'a donde se hace el movimiento',
  `fechacarga` datetime NOT NULL,
  `accion` varchar(50) NOT NULL,
  `fecha_accion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_movimientopedidoaud`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `movimientopedido_audit` */

insert  into `movimientopedido_audit`(`id_movimientopedidoaud`,`id_movimientopedido`,`id_estadopedido`,`fechamovimiento`,`id_pedido`,`id_tipomovimiento`,`dependenciadestino`,`fechacarga`,`accion`,`fecha_accion`) values 
(1,2,1,'2019-02-01 18:05:55',3,1,126,'2019-02-07 10:47:01','ELIMINADO','2019-03-06 11:07:49');

/*Table structure for table `pedido_audit` */

DROP TABLE IF EXISTS `pedido_audit`;

CREATE TABLE `pedido_audit` (
  `id_pedidoaud` int(11) NOT NULL AUTO_INCREMENT,
  `id_pedido` int(11) NOT NULL COMMENT 'id del pedido',
  `id_tipopedido` int(11) NOT NULL COMMENT 'rela de la tabla tipo pedido',
  `fechaalta` datetime NOT NULL COMMENT 'fecha que se crea el pedido',
  `titulo` varchar(50) NOT NULL COMMENT 'titulo del pedido',
  `descripcion` text NOT NULL COMMENT 'Descripcion del pedido',
  `dependenciaorigen` int(11) NOT NULL COMMENT 'Id de la dependencia donde se origina el pedido',
  `accion` varchar(50) NOT NULL,
  `fecha_accion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pedidoaud`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;

/*Data for the table `pedido_audit` */

insert  into `pedido_audit`(`id_pedidoaud`,`id_pedido`,`id_tipopedido`,`fechaalta`,`titulo`,`descripcion`,`dependenciaorigen`,`accion`,`fecha_accion`) values 
(1,6,3,'2019-02-11 13:28:48','123123','dsfsdffdfdsdsf',114,'EDITADO','2019-04-09 09:54:41'),
(2,4,3,'2019-02-08 10:26:14','Equipos','Pedido de equipos',6,'EDITADO','2019-04-09 09:54:46'),
(3,1,1,'2019-01-30 10:54:43','PEDIDO TEST','TEXTO DE PRUEBA PARA EL PEDIDO MORTAL DE PRUEBA QUE VOY A HACER AHORA MISMO ATR',12,'EDITADO','2019-04-09 09:55:05'),
(4,1,1,'2019-04-30 10:54:43','PEDIDO TEST','TEXTO DE PRUEBA PARA EL PEDIDO MORTAL DE PRUEBA QUE VOY A HACER AHORA MISMO ATR',12,'ELIMINADO','2019-11-13 09:31:18'),
(5,3,1,'2019-02-01 14:05:55','Soporte sigho','',17,'ELIMINADO','2019-11-13 09:31:18'),
(6,4,3,'2019-04-19 10:26:14','Equipos','Pedido de equipos',6,'ELIMINADO','2019-11-13 09:31:18'),
(7,5,3,'2019-02-08 10:26:55','edita3','',6,'ELIMINADO','2019-11-13 09:31:19'),
(8,6,3,'2019-04-11 13:28:48','123123','dsfsdffdfdsdsf',114,'ELIMINADO','2019-11-13 09:31:19'),
(9,7,1,'2019-03-06 09:26:14','Titulo','Descripcion del pedido',4,'ELIMINADO','2019-11-13 09:31:19'),
(10,8,3,'2019-11-08 13:31:16','','',112,'ELIMINADO','2019-11-13 09:31:19'),
(11,9,3,'2019-11-11 10:46:02','Pedido','Pedido de ejemplo',120,'ELIMINADO','2019-11-13 09:31:19'),
(12,10,3,'2019-11-11 10:51:49','asdasd','asdasdasd',16,'ELIMINADO','2019-11-13 09:31:19'),
(13,11,4,'2019-11-13 09:28:10','asdasd','asdasdasdas',9,'ELIMINADO','2019-11-13 09:31:19'),
(14,12,4,'2019-11-13 09:28:53','asdasd','asdasdasdas',9,'ELIMINADO','2019-11-13 09:31:19'),
(15,13,4,'2019-11-13 09:29:09','asdasd','asdasdasdas',9,'ELIMINADO','2019-11-13 09:31:19'),
(16,14,4,'2019-11-13 09:30:10','asdasd','asdasdasdas',9,'ELIMINADO','2019-11-13 09:31:19'),
(17,15,4,'2019-11-13 09:30:26','asdasd','asdasdasdas',9,'ELIMINADO','2019-11-13 09:31:19'),
(18,16,4,'2019-11-13 09:31:26','asdasd','asdasdasdas',9,'EDITADO','2019-11-13 09:45:23'),
(19,16,2,'2019-11-13 09:31:26','asdasd','asdasdasdas',9,'EDITADO','2019-11-20 10:12:21'),
(20,16,0,'2019-11-13 09:31:26','asdasdEDITADO','EDITADO',9,'EDITADO','2019-11-20 10:30:28'),
(21,16,1,'2019-11-13 09:31:26','asdasdEDITADO','EDITADO',9,'EDITADO','2019-11-20 10:55:33'),
(22,16,0,'2019-11-13 09:31:26','asdasdEDITADO','SE EDITO ?',9,'EDITADO','2019-11-20 10:56:19'),
(23,16,0,'2019-11-13 09:31:26','asdasdEDITADO','SE EDITO ?',9,'EDITADO','2019-11-20 11:03:05'),
(24,16,1,'2019-11-13 09:31:26','asdasdEDITADO','SE EDITO ?',9,'EDITADO','2019-11-20 11:26:54'),
(25,16,0,'2019-11-13 09:31:26','asdasdEDITADO','',9,'EDITADO','2019-11-20 11:27:13'),
(26,16,1,'2019-11-13 09:31:26','asdasdEDITADO','',9,'EDITADO','2019-11-20 11:27:45'),
(27,16,0,'2019-11-13 09:31:26','asdasdEDITADO','',9,'EDITADO','2019-11-20 11:28:06'),
(28,16,1,'2019-11-13 09:31:26','asdasdEDITADO','',9,'EDITADO','2019-11-20 11:35:40'),
(29,16,1,'2019-11-13 09:31:26','asdasdEDITADO','edita3',9,'EDITADO','2019-11-20 11:40:45'),
(30,16,1,'2019-11-13 09:31:26','asdasdEDITADO','edita3',9,'EDITADO','2019-11-20 11:48:33'),
(31,16,1,'2019-11-13 09:31:26','asdasdEDITADO','edita3',9,'EDITADO','2019-11-20 11:50:20'),
(32,16,1,'2019-11-13 09:31:26','asdasdEDITADO','edita3',9,'EDITADO','2019-11-20 11:50:30'),
(33,16,1,'2019-11-13 09:31:26','asdasdEDITADO','edita3',9,'EDITADO','2019-11-20 11:51:40'),
(34,16,1,'2019-11-13 09:31:26','asdasdEDITADO','edita3',9,'EDITADO','2019-11-20 11:52:33'),
(35,16,2,'2019-11-13 09:31:26','asdasdEDITADO','edita3',9,'EDITADO','2019-11-20 11:52:54'),
(36,16,2,'2019-11-13 09:31:26','asdasdEDITADO','edita3',9,'EDITADO','2019-11-20 11:53:20'),
(37,16,2,'2019-11-13 09:31:26','asdasdEDITADO','edita3',9,'EDITADO','2019-11-20 11:53:37'),
(38,16,2,'2019-11-13 09:31:26','asdasdEDITADO','edita3',9,'EDITADO','2019-11-20 11:53:46'),
(39,16,2,'2019-11-13 09:31:26','asdasdEDITADO','edita3',9,'EDITADO','2019-11-20 11:54:41'),
(40,16,2,'2019-11-13 09:31:26','asdasdEDITADO','edita3',9,'EDITADO','2019-11-20 11:55:05'),
(41,16,2,'2019-11-13 09:31:26','asdasdEDITADO','edita3',9,'EDITADO','2019-11-20 11:56:26'),
(42,16,2,'2019-11-13 09:31:26','asdasdEDITADO','edita3',9,'EDITADO','2019-11-20 11:57:05'),
(43,16,2,'2019-11-13 09:31:26','asdasdEDITADO','edita3',9,'EDITADO','2019-11-20 11:57:43'),
(44,16,2,'2019-11-13 09:31:26','asdasdEDITADO','edita3',9,'EDITADO','2019-11-20 11:58:03'),
(45,16,2,'2019-11-13 09:31:26','asdasdEDITADO','edita3',9,'EDITADO','2019-11-20 12:06:02'),
(46,16,2,'2019-11-13 09:31:26','asdasdEDITADO','edita3',9,'EDITADO','2019-11-20 12:06:25'),
(47,16,2,'2019-11-13 09:31:26','asdasdEDITADO','edita3',9,'EDITADO','2019-11-20 12:06:34'),
(48,16,2,'2019-11-13 09:31:26','asdasdEDITADO','edita3',9,'EDITADO','2019-11-20 12:07:43'),
(49,16,2,'2019-11-13 09:31:26','asdasdEDITADO','edita3',9,'EDITADO','2019-11-20 12:07:53'),
(50,16,2,'2019-11-13 09:31:26','asdasdEDITADO','edita3',9,'EDITADO','2019-11-20 12:08:21'),
(51,16,2,'2019-11-13 09:31:26','asdasdEDITADO','edita3',9,'EDITADO','2019-11-20 12:21:29'),
(52,21,1,'2019-11-14 12:02:17','soporte','pedido soporte',13,'EDITADO','2019-11-20 12:21:54'),
(53,17,4,'2019-11-13 09:45:15','asdasd','asdasdasdas',9,'EDITADO','2019-11-20 12:21:55'),
(54,21,2,'2019-11-14 12:02:17','soporte','pedido soporte',13,'EDITADO','2019-11-20 12:22:12'),
(55,21,2,'2019-11-14 12:02:17','soporte','pedido soporte',13,'EDITADO','2019-11-20 12:44:40'),
(56,21,2,'2019-11-14 12:02:17','soporte','pedido soporte',13,'EDITADO','2019-11-20 12:54:17'),
(57,21,2,'2019-11-14 12:02:17','soporte','pedido soporte',13,'EDITADO','2019-11-20 12:54:48'),
(58,21,2,'2019-11-14 12:02:17','soporte','pedido soporte',13,'EDITADO','2019-11-20 13:04:59'),
(59,16,2,'2019-11-13 09:31:26','asdasdEDITADO','edita3',9,'EDITADO','2019-11-20 13:09:48'),
(60,16,2,'2019-11-13 09:31:26','asdasdEDITADO','edita3',9,'EDITADO','2019-11-20 13:10:10'),
(61,16,2,'2019-11-13 09:31:26','asdasdEDITADO','edita3',9,'EDITADO','2019-11-20 13:11:36'),
(62,16,2,'2019-11-13 09:31:26','asdasdEDITADO','edita3',9,'EDITADO','2019-11-21 09:48:41'),
(63,16,2,'2019-11-13 09:31:26','asdasdEDITADO','edita3',9,'EDITADO','2019-11-21 10:03:57'),
(64,16,2,'2019-11-13 09:31:26','asdasdEDITADO','edita3',9,'EDITADO','2019-11-21 10:06:33'),
(65,16,2,'2019-11-13 09:31:26','asdasdEDITADO','edita3',9,'EDITADO','2019-11-21 10:11:02'),
(66,16,2,'2019-11-13 09:31:26','asdasdEDITADO','edita3',9,'EDITADO','2019-11-21 10:13:11'),
(67,16,2,'2019-11-13 09:31:26','asdasdEDITADO','edita3',9,'EDITADO','2019-11-21 10:13:30'),
(68,16,2,'2019-11-13 09:31:26','asdasdEDITADO','edita3',9,'EDITADO','2019-11-21 10:13:52'),
(69,16,2,'2019-11-13 09:31:26','asdasdEDITADO','edita3',9,'EDITADO','2019-11-21 10:14:15'),
(70,16,2,'2019-11-13 09:31:26','asdasdEDITADO','edita3',9,'EDITADO','2019-11-21 10:14:54'),
(71,16,2,'2019-11-13 09:31:26','asdasdEDITADO','edita3',9,'EDITADO','2019-11-21 10:15:24'),
(72,16,2,'2019-11-13 09:31:26','asdasdEDITADO','edita3',9,'EDITADO','2019-11-21 10:22:41'),
(73,16,2,'2019-11-13 09:31:26','asdasdEDITADO','edita3',9,'EDITADO','2019-11-21 13:04:11'),
(74,16,2,'2019-11-13 09:31:26','asdasdEDITADO','edita3',9,'EDITADO','2019-11-21 13:05:54'),
(75,16,2,'2019-11-13 09:31:26','asdasdEDITADO','edita3',9,'EDITADO','2019-11-21 13:06:24'),
(76,16,2,'2019-11-13 09:31:26','asdasdEDITADO','edita3',9,'EDITADO','2019-11-21 13:15:38');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
