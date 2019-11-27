/*
SQLyog Ultimate v12.4.1 (32 bit)
MySQL - 10.1.37-MariaDB : Database - interno
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`interno` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `interno`;

/*Table structure for table `dependencia` */

DROP TABLE IF EXISTS `dependencia`;

CREATE TABLE `dependencia` (
  `id_dependencia` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL COMMENT 'descripcion de la dependencia',
  `activo` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_dependencia`)
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=latin1;

/*Data for the table `dependencia` */

insert  into `dependencia`(`id_dependencia`,`descripcion`,`activo`) values 
(1,'BOLSINES',1),
(2,'C.I.C. CLORINDA',1),
(3,'C.I.C. LA PRIMAVERA (Aborigen)',1),
(4,'C.I.C. VACA PERDIDA',1),
(5,'C.S. 7 DE MAYO',1),
(6,'C.S. 8 DE OCTUBRE',1),
(7,'C.S. ANTENOR GAUNA',1),
(8,'C.S. BARRIO OBRERO',1),
(9,'C.S. BARRIO TOBA \"MADRASSI\"',1),
(10,'C.S. BARTOLOME DE LAS CASAS',1),
(11,'C.S. BERNADINO RIVADAVIA',1),
(12,'C.S. BOCA RIACHO PILAGA',1),
(13,'C.S. COL. DALMAIA',1),
(14,'C.S. DA PRATTO ',1),
(15,'C.S. DR. LUIS M. CODDA',1),
(16,'C.S. DR. RAMON CARRILLO B° 1 DE MAYO',1),
(17,'C.S. EL CHURCAL',1),
(18,'C.S. EL PORTEÑO',1),
(19,'C.S. EL PUCU',1),
(20,'C.S. EL QUEBRACHO',1),
(21,'C.S. GUADALCAZAR',1),
(22,'C.S. GUADALUPE',1),
(23,'C.S. HERRADURA',1),
(24,'C.S. INDEPENDENCIA',1),
(25,'C.S. JUAN DOMINGO PERON(MARIA LUISA ESPINOZA)',1),
(26,'C.S. JUAN G. BAZAN',1),
(27,'C.S. JUAN PABLO II',1),
(28,'C.S. LA FLORESTA ',1),
(29,'C.S. LA NUEVA FORMOSA',1),
(30,'C.S. LA RINCONADA(S.Negro)',1),
(31,'C.S. LAMADRID',1),
(32,'C.S. LOTE 8',1),
(33,'C.S. LUCIO MANSILLA',1),
(34,'C.S. M. KRIMER',1),
(35,'C.S. MARIA CRISTINA',1),
(36,'C.S. MARIANO BOEDO',1),
(37,'C.S. MARIANO MORENO',1),
(38,'C.S. MOJON DE FIERRO',1),
(39,'C.S. NAM QOM',1),
(40,'C.S. NAZARENO-Comunidad Aborigen ',1),
(41,'C.S. PABLO VARGAS (VILLA LOUDES)',1),
(42,'C.S. POSTA CAMBIO ZALAZAR',1),
(43,'C.S. POZO DE MAZA',1),
(44,'C.S. PUENTE SAN HILARIO',1),
(45,'C.S. PUERTO PILCOMAYO',1),
(46,'C.S. REP. ARGENTINA',1),
(47,'C.S. RIACHO NEGRO',1),
(48,'C.S. SAN AGUSTIN',1),
(49,'C.S. SAN ANTONIO',1),
(50,'C.S. SAN FRANCISCO',1),
(51,'C.S. SAN HILARIO',1),
(52,'C.S. SAN JOSE OBRERO',1),
(53,'C.S. SIETE PALMAS',1),
(54,'C.S. TATANE',1),
(55,'C.S. VILLA DEL CARMEN',1),
(56,'C.S. VILLA HERMOSA',1),
(57,'C.S. VILLA LA PILAR',1),
(58,'C.S. VIRGEN DE ITATI',1),
(59,'DEPARTAMENTO CONTABLE',1),
(60,'DEPARTAMENTO DE DESPACHO',1),
(61,'DEPARTAMENTO DE ESTADÍSTICA',1),
(62,'DEPARTAMENTO DE RECUPERO DE GASTOS',1),
(63,'DEPARTAMENTO TESORERÍA',1),
(64,'DIRECCIÓN COORDIANCIÓN DE HOSPITALES DE COMPLEJIDA',1),
(65,'DIRECCIÓN DE COORDINACIÓN DE ESTABLECIMIENTO DE AT',1),
(66,'DIRECCIÓN DE GESTIÓN DE PERSONAL',1),
(67,'DIRECCIÓN DE INGENIERIA BIOMÉDICA',1),
(68,'DIRECCIÓN DE MATERNIDAD, INFANCIA Y ADOLECENCIA',1),
(69,'DIRECCIÓN DE MEDICINA PREVENTIVA Y PRESTACIONES ES',1),
(70,'DIRECCIÓN DE PLANIFICACIÓN',1),
(71,'DIRECCIÓN DE SALUD BUCODENTAL',1),
(72,'DIRECCIÓN GESTIÓN DE SERVICIOS ASISNTENCIALES',1),
(73,'DIRECCIÓN INFRAESTRUCTURA SANITARIA',1),
(74,'DIRECCIÓN LA JUNTA EVALUADORA DE DISCAPACIDAD',1),
(75,'DIRECCIÓN LABORATORIO PROVINCIAL DE REFERENCIA',1),
(76,'DIRECCIÓN LEGAL Y TÉCNICA',1),
(77,'DIRECCIÓN MEDICINA NUCLEAR Y BIOTECNOLOGIA',1),
(78,'DIRECCIÓN MÓVILES Y LOGÍSTICA',1),
(79,'DIRECCIÓN SALUD MENTAL Y NEUROCIENCIAS',1),
(80,'DIRECCIÓN SANEAMIENTO Y BROMATOLOGIA Y ZOONOSIS',1),
(81,'DIRECCIÓN SISTEMA INTEGRADO DE EMERGENCIAS Y CATAS',1),
(82,'DIRECCIÓN SUPERVISIÓN Y MONITOREO DE DITRITOS SANI',1),
(83,'HOSPITAL  SAN MARTIN II',1),
(84,'HOSPITAL C. Fortin Cabo 1° LUGONES ',1),
(85,'HOSPITAL CENTRAL',1),
(86,'HOSPITAL CLORINDA',1),
(87,'HOSPITAL DE  LAGUNA YEMA',1),
(88,'HOSPITAL DE  NAINECK',1),
(89,'HOSPITAL DE ALTA COMPLEJIDAD',1),
(90,'HOSPITAL DE EL ESPINILLO',1),
(91,'HOSPITAL DE ESTANISLAO DEL CAMPO',1),
(92,'HOSPITAL DE FONTANA',1),
(93,'HOSPITAL DE GENERAL BELGRANO',1),
(94,'HOSPITAL DE GRAN GUARDIA',1),
(95,'HOSPITAL DE IBARRETA',1),
(96,'HOSPITAL DE LA MADRE Y EL NIÑO',1),
(97,'HOSPITAL DE LAISHI',1),
(98,'HOSPITAL DE MISIÓN TACAAGLE',1),
(99,'HOSPITAL DE PALO SANTO',1),
(100,'HOSPITAL DE POZO DEL TIGRE',1),
(101,'HOSPITAL DE RIACHO HE-HE',1),
(102,'HOSPITAL DE SALUD MENTAL Y NEUROCIENCIAS',1),
(103,'HOSPITAL DE TRES LAGUNAS',1),
(104,'HOSPITAL DE VILLA DOS TRECE',1),
(105,'HOSPITAL DE VILLAFAÑE',1),
(106,'HOSPITAL DISTRITAL  8',1),
(107,'HOSPITAL DISTRITAL 2 DE ABRIL',1),
(108,'HOSPITAL DISTRITAL DE PIRANE',1),
(109,'HOSPITAL DISTRITAL EL COLORADO',1),
(110,'HOSPITAL DISTRITAL ING. JUAREZ Eva Perón',1),
(111,'HOSPITAL DISTRITAL LAGUNA BLANCA',1),
(112,'HOSPITAL DISTRITAL LAS LOMITAS',1),
(113,'HOSPITAL EL CHORRO(GRAL MOSCONI) ',1),
(114,'HOSPITAL EL POTRILLO',1),
(115,'HOSPITAL GENERAL GUEMES',1),
(116,'HOSPITAL LOS CHIRIGUANOS',1),
(117,'HOSPITAL ODONTOLÓGICO DE COMPLEJIDAD INTEGRADA',1),
(118,'HOSPITAL PASTORIL',1),
(119,'HOSPITAL SUBTENIENTE PERIN',1),
(120,'HOSPITAL VILLA ESCOLAR',1),
(121,'SUBSECRETARIA DE COORDINACIÓN Y CONTROL',1),
(122,'SUBSECRETARIA DE GESTIÓN DE ESTABLECIMIENTO ASISTE',1),
(123,'SUBSECRETARIA DE GESTIÓN DE ESTABLECIMINETOS ASIST',1),
(124,'SUBSECRETARIA DE MEDICINA SANITARIA',1),
(125,'SUBSECRETARIA DE TECNOLOGIA SANITARIA Y GESTIÓN TÉ',1),
(126,'MINISTERIO DE DESARROLLOS HUMANOS',1),
(127,'JULVER',1);

/*Table structure for table `detallepedido` */

DROP TABLE IF EXISTS `detallepedido`;

CREATE TABLE `detallepedido` (
  `id_detallepedido` int(11) NOT NULL AUTO_INCREMENT,
  `id_pedido` int(11) NOT NULL COMMENT 'id del pedido',
  `id_elementodetalle` int(11) NOT NULL COMMENT 'id del elemento a pedir',
  `activo` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_detallepedido`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Data for the table `detallepedido` */

insert  into `detallepedido`(`id_detallepedido`,`id_pedido`,`id_elementodetalle`,`activo`) values 
(1,21,3,0),
(2,21,3,0),
(3,21,3,0),
(4,21,1,1),
(5,21,3,0),
(6,21,2,1),
(7,21,3,0),
(8,10,1,1),
(9,15,2,1),
(10,16,3,0),
(11,17,4,1),
(12,18,5,1),
(13,19,6,1),
(14,20,7,1),
(15,2,8,1),
(16,2,9,1),
(17,21,10,1),
(18,16,11,0),
(19,16,12,0),
(20,16,13,0),
(21,16,14,0),
(22,16,15,0),
(23,16,16,0),
(24,16,17,0),
(25,16,18,0),
(26,16,19,0),
(27,21,20,1),
(28,21,21,1),
(29,25,22,1),
(30,26,23,1);

/*Table structure for table `elemento` */

DROP TABLE IF EXISTS `elemento`;

CREATE TABLE `elemento` (
  `id_elemento` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL COMMENT 'descripcion del elemento',
  `activo` int(11) NOT NULL DEFAULT '1' COMMENT 'estado',
  PRIMARY KEY (`id_elemento`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `elemento` */

insert  into `elemento`(`id_elemento`,`descripcion`,`activo`) values 
(1,'MONITOR',1),
(2,'TECLADO',1),
(3,'IMPRESORA TINTA',1),
(4,'IMPRESORA LASER',1),
(5,'PARLANTES',1);

/*Table structure for table `elementodetalle` */

DROP TABLE IF EXISTS `elementodetalle`;

CREATE TABLE `elementodetalle` (
  `id_elementodetalle` int(11) NOT NULL AUTO_INCREMENT,
  `id_elemento` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `numeroserie` varchar(50) DEFAULT NULL,
  `diagnosticocliente` varchar(50) DEFAULT NULL,
  `observacion` varchar(50) DEFAULT NULL,
  `aud_usuarioalta` varchar(50) DEFAULT NULL,
  `aud_fechaalta` timestamp NULL DEFAULT NULL,
  `aud_usuariomodi` varchar(50) DEFAULT NULL,
  `aud_fechamodi` timestamp NULL DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_elementodetalle`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `elementodetalle` */

insert  into `elementodetalle`(`id_elementodetalle`,`id_elemento`,`cantidad`,`marca`,`modelo`,`numeroserie`,`diagnosticocliente`,`observacion`,`aud_usuarioalta`,`aud_fechaalta`,`aud_usuariomodi`,`aud_fechamodi`,`activo`) values 
(1,1,2,'HP','JK-750','23',NULL,NULL,NULL,NULL,NULL,NULL,1),
(2,4,1,'Lenovi','dasdasads','12',NULL,'aadsads',NULL,'2019-11-13 13:30:26',NULL,NULL,1),
(3,5,1,'pedidoElementos','pedidoElementos','41',NULL,'pedidoElementos',NULL,'2019-11-20 11:58:03','admin','2019-11-21 12:58:49',0),
(4,4,1,'frutar','dasdasads','234',NULL,'aadsads',NULL,'2019-11-13 13:45:15',NULL,NULL,1),
(5,4,1,'marcar','dasdasads','5',NULL,'aadsads',NULL,'2019-11-13 13:45:33',NULL,NULL,1),
(6,4,1,'quaker','dasdasads','46',NULL,'aadsads',NULL,'2019-11-13 13:46:50',NULL,NULL,1),
(7,1,1,'hp','test','11444144',NULL,'observo',NULL,'2019-11-14 10:05:48',NULL,NULL,1),
(8,4,1,'dasdas','asdads','655',NULL,'asdads','admin','2019-11-20 12:29:58',NULL,NULL,1),
(9,4,1,'fuck','asdads','4645',NULL,'asdads','admin','2019-11-20 12:30:23',NULL,NULL,1),
(10,5,1,'marca2','mode2','12355',NULL,'pedidoElementos','admin','2019-11-20 12:44:40','admin','2019-11-20 13:04:59',1),
(11,1,1,'123','123','1663',NULL,'123','admin','2019-11-21 10:22:41','admin','2019-11-21 13:00:55',0),
(12,1,1,'123','123','6789',NULL,'123','admin','2019-11-21 10:22:41','admin','2019-11-21 12:59:50',0),
(13,1,1,'123','123','86754',NULL,'123','admin','2019-11-21 10:22:41','admin','2019-11-21 12:55:47',0),
(14,5,1,'borealEditado','mode2','9678',NULL,'observacion','admin','2019-11-21 13:04:11','admin','2019-11-21 13:04:23',0),
(15,3,1,'borealEditado','modelo','5679',NULL,'asdasd','admin','2019-11-21 13:05:54','admin','2019-11-21 13:14:05',0),
(16,1,1,'agregar','dqdqw','9567',NULL,'dasdasda','admin','2019-11-21 13:06:24','admin','2019-11-21 13:14:50',0),
(17,4,1,'123','dsadas','347',NULL,'sczx','admin','2019-11-21 13:06:24','admin','2019-11-21 13:12:13',0),
(18,3,1,'123','asdcxz','456',NULL,'cxzczxc','admin','2019-11-21 13:06:24','admin','2019-11-21 13:13:58',0),
(19,5,1,'13','asd','943',NULL,'asd','admin','2019-11-21 13:15:38','admin','2019-11-21 13:15:49',0),
(20,2,112,'Samsung','Vitrof 46','3547',NULL,'ZCX','admin','2019-11-21 13:15:38',NULL,NULL,1),
(21,1,13,'HP','Laser mhq21','897',NULL,'sdf','admin','2019-11-21 13:15:38',NULL,NULL,1),
(22,3,1,'dsa','asdads','81',NULL,'123','admin','2019-11-26 11:56:10',NULL,NULL,1),
(23,3,1,'Boreal','Laser h2115','16374586',NULL,'no anda nada','admin','2019-11-27 12:51:13',NULL,NULL,1);

/*Table structure for table `estadopedido` */

DROP TABLE IF EXISTS `estadopedido`;

CREATE TABLE `estadopedido` (
  `id_estadopedido` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id del estado',
  `descripcion` varchar(50) NOT NULL COMMENT 'descripcion del estado del pedido',
  `activo` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_estadopedido`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `estadopedido` */

insert  into `estadopedido`(`id_estadopedido`,`descripcion`,`activo`) values 
(1,'INGRESADO',1),
(2,'EN CURSO',1),
(3,'PAUSADO',1),
(4,'FINALIZADO',1);

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id_menu` int(12) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(32) NOT NULL,
  `nivel` int(12) NOT NULL,
  `orden` int(12) NOT NULL,
  `referencia` tinytext NOT NULL,
  `icono` varchar(32) NOT NULL,
  `hijode` int(32) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `menu` */

insert  into `menu`(`id_menu`,`descripcion`,`nivel`,`orden`,`referencia`,`icono`,`hijode`) values 
(1,'INICIO',1,1,'','icon-home',0),
(2,'PEDIDOS',1,1,'','icon-user',0),
(3,'Ver Pedido',2,1,'pedidos/C_pedidos/','',2),
(4,'LISTADO',1,1,'','',0),
(5,'Ver Listado',2,1,'listado/C_listado','',4),
(6,'Pedido Servicio Tecnico',2,2,'pedidos/C_pedidos/ServicioTecnico','',2),
(7,'Pedido Soporte Sigho',2,3,'pedidos/C_pedidos/CargarPedido','',2);

/*Table structure for table `menu_perfiles` */

DROP TABLE IF EXISTS `menu_perfiles`;

CREATE TABLE `menu_perfiles` (
  `menu` int(12) NOT NULL,
  `perfil` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `menu_perfiles` */

insert  into `menu_perfiles`(`menu`,`perfil`) values 
(1,1),
(2,1),
(3,1),
(4,1),
(5,1),
(1,3),
(4,3),
(5,3),
(1,2),
(2,2),
(3,2),
(4,2),
(5,2),
(6,1),
(6,2),
(6,3),
(7,1),
(7,2),
(7,3);

/*Table structure for table `movimientopedido` */

DROP TABLE IF EXISTS `movimientopedido`;

CREATE TABLE `movimientopedido` (
  `id_movimientopedido` int(11) NOT NULL AUTO_INCREMENT,
  `id_estadopedido` int(11) NOT NULL COMMENT 'rela estado pedido',
  `fechamovimiento` datetime NOT NULL COMMENT 'fecha en que se realiza el movimiento',
  `id_pedido` int(11) NOT NULL COMMENT 'rela del pedido',
  `id_tipomovimiento` int(11) NOT NULL COMMENT 'que tipo de movimento es',
  `dependenciadestino` int(11) NOT NULL COMMENT 'a donde se hace el movimiento',
  `activo` int(11) NOT NULL DEFAULT '1',
  `fechacarga` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `aud_fechaalta` timestamp NULL DEFAULT NULL,
  `aud_usuarioalta` varchar(50) DEFAULT NULL,
  `aud_fechamodi` timestamp NULL DEFAULT NULL,
  `aud_usuariomodi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_movimientopedido`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

/*Data for the table `movimientopedido` */

insert  into `movimientopedido`(`id_movimientopedido`,`id_estadopedido`,`fechamovimiento`,`id_pedido`,`id_tipomovimiento`,`dependenciadestino`,`activo`,`fechacarga`,`aud_fechaalta`,`aud_usuarioalta`,`aud_fechamodi`,`aud_usuariomodi`) values 
(1,1,'2019-01-30 10:55:23',1,1,16,1,'2019-02-07 10:47:01',NULL,NULL,NULL,NULL),
(3,2,'2019-02-21 18:05:55',3,1,100,1,'2019-02-07 10:47:01',NULL,NULL,NULL,NULL),
(4,2,'2019-02-28 00:00:00',3,3,11,1,'2019-02-07 12:25:39',NULL,NULL,NULL,NULL),
(5,4,'2019-02-07 17:41:23',1,4,126,1,'2019-02-07 13:41:23',NULL,NULL,NULL,NULL),
(18,4,'2019-02-07 17:57:40',3,4,126,1,'2019-02-07 13:57:40',NULL,NULL,NULL,NULL),
(19,1,'2019-02-08 14:26:14',4,1,126,1,'2019-02-08 10:26:14',NULL,NULL,NULL,NULL),
(20,1,'2019-02-08 14:26:55',5,1,126,1,'2019-02-08 10:26:55',NULL,NULL,NULL,NULL),
(21,1,'2019-02-11 17:28:48',6,1,126,1,'2019-02-11 13:28:48',NULL,NULL,NULL,NULL),
(22,1,'2019-03-06 13:26:15',7,1,126,1,'2019-03-06 09:26:15',NULL,NULL,NULL,NULL),
(23,2,'2019-03-07 00:00:00',7,3,11,1,'2019-03-06 09:27:55',NULL,NULL,NULL,NULL),
(24,3,'0000-00-00 00:00:00',1,4,126,1,'2019-03-18 09:56:14',NULL,NULL,NULL,NULL),
(25,1,'2019-11-08 17:31:16',8,1,126,1,'2019-11-08 13:31:16',NULL,NULL,NULL,NULL),
(26,1,'2019-11-11 14:46:02',9,1,126,1,'2019-11-11 10:46:02',NULL,NULL,NULL,NULL),
(27,2,'2019-11-12 00:00:00',3,3,125,1,'2019-11-11 10:49:14',NULL,NULL,NULL,NULL),
(28,1,'2019-11-11 14:51:49',10,1,126,1,'2019-11-11 10:51:49',NULL,NULL,NULL,NULL),
(29,2,'2019-11-01 00:00:00',8,4,1,1,'2019-11-11 10:53:13',NULL,NULL,NULL,NULL),
(30,1,'2019-11-13 13:28:10',11,1,126,1,'2019-11-13 09:28:10',NULL,NULL,NULL,NULL),
(31,1,'2019-11-13 13:28:53',12,1,126,1,'2019-11-13 09:28:53',NULL,NULL,NULL,NULL),
(32,1,'2019-11-13 13:29:09',13,1,126,1,'2019-11-13 09:29:09',NULL,NULL,NULL,NULL),
(33,1,'2019-11-13 13:30:10',14,1,126,1,'2019-11-13 09:30:10',NULL,NULL,NULL,NULL),
(34,1,'2019-11-13 13:30:26',15,1,126,1,'2019-11-13 09:30:26',NULL,NULL,NULL,NULL),
(35,1,'2019-11-13 13:31:26',16,1,126,1,'2019-11-13 09:31:26',NULL,NULL,NULL,NULL),
(36,1,'2019-11-13 13:45:15',17,1,126,1,'2019-11-13 09:45:15',NULL,NULL,NULL,NULL),
(37,1,'2019-11-13 13:45:33',18,1,126,1,'2019-11-13 09:45:33',NULL,NULL,NULL,NULL),
(38,1,'2019-11-13 13:46:50',19,1,126,1,'2019-11-13 09:46:50',NULL,NULL,NULL,NULL),
(39,1,'2019-11-14 10:05:48',20,1,126,1,'2019-11-14 10:05:48',NULL,NULL,NULL,NULL),
(40,1,'2019-11-20 00:00:00',16,3,19,1,'2019-11-14 10:54:24','2019-11-14 10:54:24','admin',NULL,NULL),
(41,1,'2019-11-14 12:02:17',21,1,126,1,'2019-11-14 12:02:17',NULL,NULL,NULL,NULL),
(42,1,'2019-11-25 10:33:32',22,1,126,1,'2019-11-25 10:33:32',NULL,NULL,NULL,NULL),
(43,4,'2019-11-26 00:00:00',16,4,126,1,'2019-11-26 10:57:39','2019-11-26 10:57:39','admin',NULL,NULL),
(44,1,'2019-11-26 11:56:10',25,1,126,1,'2019-11-26 11:56:10',NULL,NULL,NULL,NULL),
(45,1,'2019-11-27 12:51:13',26,1,126,1,'2019-11-27 12:51:13',NULL,NULL,NULL,NULL);

/*Table structure for table `pedido` */

DROP TABLE IF EXISTS `pedido`;

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id del pedido',
  `id_tipopedido` int(11) NOT NULL COMMENT 'rela de la tabla tipo pedido',
  `id_pedidotecnico` int(11) DEFAULT NULL,
  `solicita` varchar(50) DEFAULT NULL,
  `retira` varchar(50) DEFAULT NULL,
  `fechaalta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'fecha que se crea el pedido',
  `titulo` varchar(50) NOT NULL COMMENT 'titulo del pedido',
  `descripcion` text NOT NULL COMMENT 'Descripcion del pedido',
  `dependenciaorigen` int(11) NOT NULL COMMENT 'Id de la dependencia donde se origina el pedido',
  `numeroservicio` varchar(50) DEFAULT NULL,
  `fechaservicio` timestamp NULL DEFAULT NULL,
  `aud_fechaalta` timestamp NULL DEFAULT NULL,
  `aud_usuarioalta` varchar(50) DEFAULT NULL,
  `aud_fechamodi` timestamp NULL DEFAULT NULL,
  `aud_usuariomodi` varchar(50) DEFAULT NULL,
  `activo` int(11) NOT NULL DEFAULT '1',
  `barcode` text,
  PRIMARY KEY (`id_pedido`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `pedido` */

insert  into `pedido`(`id_pedido`,`id_tipopedido`,`id_pedidotecnico`,`solicita`,`retira`,`fechaalta`,`titulo`,`descripcion`,`dependenciaorigen`,`numeroservicio`,`fechaservicio`,`aud_fechaalta`,`aud_usuarioalta`,`aud_fechamodi`,`aud_usuariomodi`,`activo`,`barcode`) values 
(16,2,2,'roberto rojasEDITADO','Roberto Rojas','2019-11-13 09:31:26','asdasdEDITADO','edita3',9,'451262','2019-11-26 00:00:00','2019-11-13 13:31:26','admin','2019-11-26 10:57:39','admin',1,'16111319'),
(17,1,NULL,'roberto rojas','ismael perez','2019-11-13 09:45:15','asdasd','asdasdasdas',9,'service','2019-11-01 00:00:00','2019-11-13 13:45:15','admin',NULL,NULL,1,'17111319'),
(18,2,4,'roberto rojas','ismael perez','2019-11-13 09:45:33','asdasd','asdasdasdas',9,'service','2019-11-01 00:00:00','2019-11-13 13:45:33','admin',NULL,NULL,1,'18111319'),
(19,2,4,'roberto rojas','ismael perez','2019-11-13 09:46:50','asdasd','asdasdasdas',9,'service','2019-11-01 00:00:00','2019-11-13 13:46:50','admin',NULL,NULL,1,'19111319'),
(20,2,1,'solicitante martinez','retirador perez','2019-11-14 10:05:48','test 512','descripcion185',18,'153362254','2019-11-14 00:00:00','2019-11-14 10:05:48','admin',NULL,NULL,1,'20111419'),
(21,2,2,'test pedido soporte','ROLY REYNA','2019-11-14 12:02:17','soporte','pedido soporte',13,'','0000-00-00 00:00:00','2019-11-14 12:02:17','admin','2019-11-20 13:04:59','admin',1,'21111419'),
(22,1,NULL,'roberto rojas',NULL,'2019-11-25 10:33:32','Pedido Soporte tecnico','Pedido Soporte tecnicoPedido Soporte tecnicoPedido Soporte tecnicoPedido Soporte tecnicoPedido Soporte tecnicoPedido Soporte tecnico',18,NULL,NULL,'2019-11-25 10:33:32','admin',NULL,NULL,1,'22112519'),
(25,2,1,'barcode','barcode','2019-11-26 11:56:10','barcode tet','barcodetest',16,'','0000-00-00 00:00:00','2019-11-26 11:56:10','admin',NULL,NULL,1,'25112619'),
(26,2,1,'testboleta','','2019-11-27 12:51:13','titulo boleta','boletoide',117,'','0000-00-00 00:00:00','2019-11-27 12:51:13','admin',NULL,NULL,1,'26112719');

/*Table structure for table `pedidotecnico` */

DROP TABLE IF EXISTS `pedidotecnico`;

CREATE TABLE `pedidotecnico` (
  `id_pedidotecnico` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_pedidotecnico`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `pedidotecnico` */

insert  into `pedidotecnico`(`id_pedidotecnico`,`descripcion`,`activo`) values 
(1,'A Reparar',1),
(2,'Reparado/Listo',1),
(3,'Prestamo',1),
(4,'Baja',1);

/*Table structure for table `perfil` */

DROP TABLE IF EXISTS `perfil`;

CREATE TABLE `perfil` (
  `id_perfil` int(32) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(32) NOT NULL,
  `activo` int(11) DEFAULT '1',
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `perfil` */

insert  into `perfil`(`id_perfil`,`descripcion`,`activo`) values 
(1,'Administrador',1),
(2,'Mesa Entrada',1),
(3,'Soporte',1);

/*Table structure for table `sessions` */

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`),
  KEY `idx_address` (`ip_address`),
  KEY `idx_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sessions` */

insert  into `sessions`(`id`,`ip_address`,`timestamp`,`data`) values 
('r06hooofsu630ulbj7dt8bk5egbs5c9b','::1',1574255480,'__ci_last_regenerate|i:1574255479;id_usuario|s:1:\"1\";nombreUsuario|s:5:\"admin\";claveUsuario|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";activo|s:1:\"1\";id_perfil|s:1:\"1\";perfilUsuario|s:13:\"Administrador\";is_logged_in|b:1;'),
('5st4psvva65f10tjpodlubshtjgatgd7','::1',1574255481,'__ci_last_regenerate|i:1574255481;'),
('7s1bjkkhifj0bnuhooif3pej4alfk4nc','::1',1574255481,'__ci_last_regenerate|i:1574255481;'),
('h1g8itp0eipff5od4r2oodkd6sdf4kcj','::1',1574691594,'__ci_last_regenerate|i:1574691593;id_usuario|s:1:\"1\";nombreUsuario|s:5:\"admin\";claveUsuario|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";activo|s:1:\"1\";id_perfil|s:1:\"1\";perfilUsuario|s:13:\"Administrador\";is_logged_in|b:1;'),
('clrp37jn2f11g40iue4ql2jbvbshangh','::1',1574691597,''),
('e1c5kjcb7ro1dn0gafpamq5c60s2ueq3','::1',1574693660,'__ci_last_regenerate|i:1574693660;id_usuario|s:1:\"1\";nombreUsuario|s:5:\"admin\";claveUsuario|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";activo|s:1:\"1\";id_perfil|s:1:\"1\";perfilUsuario|s:13:\"Administrador\";is_logged_in|b:1;'),
('6qlm1cphh6mc6ofe73iockfdlu19cso1','::1',1574701729,'__ci_last_regenerate|i:1574701728;id_usuario|s:1:\"1\";nombreUsuario|s:5:\"admin\";claveUsuario|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";activo|s:1:\"1\";id_perfil|s:1:\"1\";perfilUsuario|s:13:\"Administrador\";is_logged_in|b:1;'),
('pikesqfk11pqd5kfhk4nsv6m8eujjems','::1',1574778391,'__ci_last_regenerate|i:1574778390;id_usuario|s:1:\"1\";nombreUsuario|s:5:\"admin\";claveUsuario|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";activo|s:1:\"1\";id_perfil|s:1:\"1\";perfilUsuario|s:13:\"Administrador\";is_logged_in|b:1;'),
('gor4uujgeeuhmves5fj0sp1nhob53h7r','::1',1574874254,'__ci_last_regenerate|i:1574874148;id_usuario|s:1:\"1\";nombreUsuario|s:5:\"admin\";claveUsuario|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";activo|s:1:\"1\";id_perfil|s:1:\"1\";perfilUsuario|s:13:\"Administrador\";is_logged_in|b:1;');

/*Table structure for table `tipomovimiento` */

DROP TABLE IF EXISTS `tipomovimiento`;

CREATE TABLE `tipomovimiento` (
  `id_tipomovimiento` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL COMMENT 'descripcion del tipo de movimiento.',
  `activo` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_tipomovimiento`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tipomovimiento` */

insert  into `tipomovimiento`(`id_tipomovimiento`,`descripcion`,`activo`) values 
(1,'NUEVO INGRESO',1),
(2,'ORDEN DE COMPRA',1),
(3,'TRASLADO DE AREA',1),
(4,'CICLO COMPLETADO',1);

/*Table structure for table `tipopedido` */

DROP TABLE IF EXISTS `tipopedido`;

CREATE TABLE `tipopedido` (
  `id_tipopedido` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id del tipo de pedido',
  `descripcion` varchar(50) NOT NULL COMMENT 'Nombre/desripcion del tipo de pedido',
  `activo` int(11) DEFAULT '1' COMMENT 'Si esta activo o no',
  PRIMARY KEY (`id_tipopedido`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tipopedido` */

insert  into `tipopedido`(`id_tipopedido`,`descripcion`,`activo`) values 
(1,'Soporte Sigho',1),
(2,'Soporte Tecnico',1);

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Llave primaria del usuario',
  `nombreusuario` varchar(50) NOT NULL COMMENT 'Nombre del usuario, no pueden existir iguales.',
  `claveusuario` varchar(500) NOT NULL COMMENT 'Clave del usuario',
  `email` varchar(50) NOT NULL COMMENT 'Email del usuario.',
  `id_persona` int(11) NOT NULL COMMENT 'La clave foránea de relacion con los datos de la tabla persona',
  `id_perfil` bigint(20) NOT NULL COMMENT 'La clave foránea de relacion con los datos de la tabla perfile',
  `activo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `UQ_Usuarios_id_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `usuario` */

insert  into `usuario`(`id_usuario`,`nombreusuario`,`claveusuario`,`email`,`id_persona`,`id_perfil`,`activo`) values 
(1,'admin','d033e22ae348aeb5660fc2140aec35850c4da997','Mail.google@algo.com',0,1,1),
(2,'mesa','f04cc316d72ba737f35309ed8e4cd7100a7660bd','ads',0,2,1),
(3,'soporte','d033e22ae348aeb5660fc2140aec35850c4da997','sopor',0,3,1);

/* Trigger structure for table `detallepedido` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `audit_detallepedidoDelete` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `audit_detallepedidoDelete` AFTER DELETE ON `detallepedido` FOR EACH ROW 
    BEGIN
	
	INSERT INTO internoaudit.detallepedido_audit (id_detallepedido , id_pedido, id_elemento,cantidad,observacion,fecha,accion)
	VALUES (OLD.id_detallepedido ,OLD.id_pedido ,OLD.id_elemento ,OLD.cantidad ,OLD.observacion ,OLD.fecha , "ELIMINADO");
	
    END */$$


DELIMITER ;

/* Trigger structure for table `movimientopedido` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `audit_movimientopedidoUpdate` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `audit_movimientopedidoUpdate` AFTER UPDATE ON `movimientopedido` FOR EACH ROW BEGIN
	INSERT INTO internoaudit.movimientopedido_audit (id_movimientopedido , id_estadopedido, fechamovimiento,id_pedido,id_tipomovimiento,dependenciadestino,fechacarga, accion)
	VALUES (OLD.id_movimientopedido ,OLD.id_estadopedido ,OLD.fechamovimiento ,OLD.id_pedido ,OLD.id_tipomovimiento ,OLD.dependenciadestino , OLD.fechacarga,"EDITADO");
    END */$$


DELIMITER ;

/* Trigger structure for table `movimientopedido` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `audit_movimientopedidoDelete` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `audit_movimientopedidoDelete` AFTER DELETE ON `movimientopedido` FOR EACH ROW BEGIN
	INSERT INTO internoaudit.movimientopedido_audit (id_movimientopedido , id_estadopedido, fechamovimiento,id_pedido,id_tipomovimiento,dependenciadestino,fechacarga, accion)
	VALUES (OLD.id_movimientopedido ,OLD.id_estadopedido ,OLD.fechamovimiento ,OLD.id_pedido ,OLD.id_tipomovimiento ,OLD.dependenciadestino , OLD.fechacarga,"ELIMINADO");
    END */$$


DELIMITER ;

/* Trigger structure for table `pedido` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `audit_pedidoUpdate` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `audit_pedidoUpdate` AFTER UPDATE ON `pedido` FOR EACH ROW BEGIN
	INSERT INTO internoaudit.pedido_audit (id_pedido , id_tipopedido, fechaalta,titulo,descripcion,dependenciaorigen,accion)
	VALUES (OLD.id_pedido ,OLD.id_tipopedido ,OLD.fechaalta ,OLD.titulo ,OLD.descripcion ,OLD.dependenciaorigen , "EDITADO");
    END */$$


DELIMITER ;

/* Trigger structure for table `pedido` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `audit_pedidoDelete` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `audit_pedidoDelete` AFTER DELETE ON `pedido` FOR EACH ROW BEGIN
	INSERT INTO internoaudit.pedido_audit (id_pedido , id_tipopedido, fechaalta,titulo,descripcion,dependenciaorigen,accion)
	VALUES (OLD.id_pedido ,OLD.id_tipopedido ,OLD.fechaalta ,OLD.titulo ,OLD.descripcion ,OLD.dependenciaorigen , "ELIMINADO");
    END */$$


DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
