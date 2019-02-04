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
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=latin1;

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
(126,'MINISTERIO DE DESARROLLOS HUMANOS',1);

/*Table structure for table `detallepedido` */

DROP TABLE IF EXISTS `detallepedido`;

CREATE TABLE `detallepedido` (
  `id_detallepedido` int(11) NOT NULL AUTO_INCREMENT,
  `id_pedido` int(11) NOT NULL COMMENT 'id del pedido',
  `id_elemento` int(11) NOT NULL COMMENT 'id del elemento a pedir',
  `cantidad` int(11) NOT NULL COMMENT 'cantidad de elementos solicitados',
  `observacion` varchar(50) DEFAULT NULL COMMENT 'observacion sobre el elemento',
  `fecha` datetime NOT NULL COMMENT 'fecha de carga del elemento',
  `activo` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_detallepedido`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `detallepedido` */

/*Table structure for table `elemento` */

DROP TABLE IF EXISTS `elemento`;

CREATE TABLE `elemento` (
  `id_elemento` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL COMMENT 'descripcion del elemento',
  `activo` int(11) NOT NULL DEFAULT '1' COMMENT 'estado',
  PRIMARY KEY (`id_elemento`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `elemento` */

insert  into `elemento`(`id_elemento`,`descripcion`,`activo`) values 
(1,'IMPRESORA',1),
(2,'TECLADO',1),
(3,'MONITOR',1);

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

/*Table structure for table `menues` */

DROP TABLE IF EXISTS `menues`;

CREATE TABLE `menues` (
  `id_menu` int(12) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(32) NOT NULL,
  `nivel` int(12) NOT NULL,
  `orden` int(12) NOT NULL,
  `referencia` tinytext NOT NULL,
  `icono` varchar(32) NOT NULL,
  `hijode` int(32) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `menues` */

insert  into `menues`(`id_menu`,`descripcion`,`nivel`,`orden`,`referencia`,`icono`,`hijode`) values 
(1,'INICIO',1,1,'','icon-home',0),
(2,'USUARIOS',1,1,'','icon-user',0),
(3,'MENU',1,2,'','icon-list',0),
(4,'Alta Menu',2,1,'Menu/c_Menu','',3),
(5,'Modificar Menu',2,1,'Menu/c_Menu/Modificar\r\n','',3),
(6,'Alta Usuario',2,1,'Usuarios/c_Usuarios/AltaUsuario','',2),
(7,'Lista Usuarios',2,2,'Usuarios/c_Usuarios/BuscarUsuario\r\n','',2),
(10,'Jugadores',1,3,'','icon-users',0),
(11,'Buscar Jugador',2,1,'Jugador/c_jugador','ICON-USER-FOLLOW',10),
(12,'ALUMNOS',1,4,'','icon-user-follow',0),
(14,'Alta Alumnos',2,1,'Alumnos/c_Alumnos/','',12),
(15,'Ver Alumnos',2,1,'Alumnos/c_Alumnos/TablasAlumnos','',12),
(16,'PROVEEDORES',1,5,'','icon-basket-loaded',0),
(17,'Alta Proveedor',2,1,'Proveedores/c_Proveedores/','',16),
(18,'Alta Padres',2,1,'Alumnos/c_Alumnos/AltaPadres','',12),
(19,'Ver Proveedores',2,1,'Proveedores/c_Proveedores/TablaProveedores','',16);

/*Table structure for table `menues_perfiles` */

DROP TABLE IF EXISTS `menues_perfiles`;

CREATE TABLE `menues_perfiles` (
  `menu` int(12) NOT NULL,
  `perfil` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `menues_perfiles` */

insert  into `menues_perfiles`(`menu`,`perfil`) values 
(1,1),
(2,1),
(3,1),
(4,1),
(5,1),
(6,1),
(7,1),
(8,1),
(10,1),
(11,1),
(1,2),
(1,3),
(10,2),
(10,3),
(11,2),
(11,3),
(1,1),
(2,1),
(3,1),
(4,1),
(5,1),
(6,1),
(7,1),
(8,1),
(10,1),
(11,1),
(1,2),
(1,3),
(10,2),
(10,3),
(11,2),
(11,3),
(1,1),
(2,1),
(3,1),
(4,1),
(5,1),
(6,1),
(7,1),
(8,1),
(10,1),
(11,1),
(1,2),
(1,3),
(10,2),
(10,3),
(11,2),
(11,3),
(12,1),
(12,1),
(12,1),
(14,1),
(15,1),
(16,1),
(17,1),
(18,1),
(19,1);

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
  PRIMARY KEY (`id_movimientopedido`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `movimientopedido` */

insert  into `movimientopedido`(`id_movimientopedido`,`id_estadopedido`,`fechamovimiento`,`id_pedido`,`id_tipomovimiento`,`dependenciadestino`,`activo`) values 
(1,1,'2019-01-30 10:55:23',1,1,16,1),
(2,1,'2019-02-01 18:05:55',3,1,126,1),
(3,1,'2019-02-01 18:05:55',3,1,100,1);

/*Table structure for table `pedido` */

DROP TABLE IF EXISTS `pedido`;

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id del pedido',
  `id_tipopedido` int(11) NOT NULL COMMENT 'rela de la tabla tipo pedido',
  `fechaalta` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'fecha que se crea el pedido',
  `titulo` varchar(50) NOT NULL COMMENT 'titulo del pedido',
  `descripcion` text NOT NULL COMMENT 'Descripcion del pedido',
  `dependenciaorigen` int(11) NOT NULL COMMENT 'Id de la dependencia donde se origina el pedido',
  `activo` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_pedido`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `pedido` */

insert  into `pedido`(`id_pedido`,`id_tipopedido`,`fechaalta`,`titulo`,`descripcion`,`dependenciaorigen`,`activo`) values 
(1,1,'2019-01-30 10:54:43','PEDIDO TEST','TEXTO DE PRUEBA PARA EL PEDIDO MORTAL DE PRUEBA QUE VOY A HACER AHORA MISMO ATR',12,1),
(3,1,'2019-02-01 14:05:55','Soporte sigho','Test',14,1);

/*Table structure for table `perfil` */

DROP TABLE IF EXISTS `perfil`;

CREATE TABLE `perfil` (
  `id_perfil` int(32) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(32) NOT NULL,
  `activo` int(11) DEFAULT '1',
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `perfil` */

insert  into `perfil`(`id_perfil`,`descripcion`,`activo`) values 
(1,'Administrador',1),
(2,'Propietario',1),
(3,'Trabajador',1),
(4,'Profesor',1);

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
('clop6se9p5esvuup0j46rf7uj1r18hnm','::1',1548346517,'__ci_last_regenerate|i:1548346515;'),
('7el22rugkd261s4sa3pl2cnfgscot12j','::1',1548347180,'__ci_last_regenerate|i:1548347163;id_usuario|s:1:\"1\";nombreUsuario|s:5:\"admin\";contrasenia|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";activo|s:1:\"1\";id_perfil|s:1:\"2\";perfilUsuario|s:7:\"Gerente\";recordatorios|i:1;is_logged_in|b:1;'),
('5euo3jcsnbf7b454h1kiaceuibfiua6d','::1',1548775471,'__ci_last_regenerate|i:1548775470;'),
('pr9g5d5neuj03i986fre6pjrjt0kq8ca','::1',1548775535,'__ci_last_regenerate|i:1548775534;'),
('47rlrur851ptk3dks2c5rbfb410utgsg','::1',1548775829,'__ci_last_regenerate|i:1548775829;'),
('53g71cr81d03g69t7359r58uutp1q5uo','::1',1548778788,'__ci_last_regenerate|i:1548778563;|N;id_usuario|s:1:\"1\";nombreUsuario|s:5:\"admin\";claveUsuario|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";activo|s:1:\"1\";id_perfil|s:1:\"1\";perfilUsuario|s:13:\"Administrador\";is_logged_in|b:1;'),
('5sc2bqs0ommdmmv9cr43d0cl2d59s1u6','::1',1548866489,'__ci_last_regenerate|i:1548866454;id_usuario|s:1:\"1\";nombreUsuario|s:5:\"admin\";claveUsuario|s:40:\"bc5832de4d1698bcf6f07c366072a262892b4c25\";activo|s:1:\"1\";id_perfil|s:1:\"1\";perfilUsuario|s:13:\"Administrador\";is_logged_in|b:1;'),
('si006bsjb781rukeao5jbqe1i6cc4r6k','::1',1549286151,'__ci_last_regenerate|i:1549286079;id_usuario|s:1:\"1\";nombreUsuario|s:5:\"admin\";claveUsuario|s:40:\"bc5832de4d1698bcf6f07c366072a262892b4c25\";activo|s:1:\"1\";id_perfil|s:1:\"1\";perfilUsuario|s:13:\"Administrador\";is_logged_in|b:1;'),
('h7n8ihnupdppbh6q2nc4ks9kbkf2pc6d','::1',1549296338,'__ci_last_regenerate|i:1549296336;');

/*Table structure for table `tipomovimiento` */

DROP TABLE IF EXISTS `tipomovimiento`;

CREATE TABLE `tipomovimiento` (
  `id_tipomovimiento` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL COMMENT 'descripcion del tipo de movimiento.',
  `activo` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_tipomovimiento`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tipomovimiento` */

insert  into `tipomovimiento`(`id_tipomovimiento`,`descripcion`,`activo`) values 
(1,'NUEVO INGRESO',1),
(2,'ORDEN DE COMPRA',1);

/*Table structure for table `tipopedido` */

DROP TABLE IF EXISTS `tipopedido`;

CREATE TABLE `tipopedido` (
  `id_tipopedido` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id del tipo de pedido',
  `descripcion` varchar(50) NOT NULL COMMENT 'Nombre/desripcion del tipo de pedido',
  `activo` int(11) DEFAULT '1' COMMENT 'Si esta activo o no',
  PRIMARY KEY (`id_tipopedido`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tipopedido` */

insert  into `tipopedido`(`id_tipopedido`,`descripcion`,`activo`) values 
(1,'Soporte Sigho',1),
(2,'Soporte Tecnico',1),
(3,'Solicitud Equipamiento',1);

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Llave primaria del usuario',
  `nombreUsuario` varchar(50) NOT NULL COMMENT 'Nombre del usuario, no pueden existir iguales.',
  `claveUsuario` varchar(500) NOT NULL COMMENT 'Clave del usuario',
  `email` varchar(50) NOT NULL COMMENT 'Email del usuario.',
  `id_persona` int(11) NOT NULL COMMENT 'La clave foránea de relacion con los datos de la tabla persona',
  `id_perfil` bigint(20) NOT NULL COMMENT 'La clave foránea de relacion con los datos de la tabla perfile',
  `activo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `UQ_Usuarios_id_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `usuario` */

insert  into `usuario`(`id_usuario`,`nombreUsuario`,`claveUsuario`,`email`,`id_persona`,`id_perfil`,`activo`) values 
(1,'admin','bc5832de4d1698bcf6f07c366072a262892b4c25','Mail.google@algo.com',0,1,1),
(2,'jose','7c4a8d09ca3762af61e59520943dc26494f8941b','ads',0,1,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
