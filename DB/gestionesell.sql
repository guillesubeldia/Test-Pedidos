/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 5.6.21 : Database - gestionesell
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`gestionesell` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `gestionesell`;

/*Table structure for table `fact_comprobantes` */

DROP TABLE IF EXISTS `fact_comprobantes`;

CREATE TABLE `fact_comprobantes` (
  `id_comprobante` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de comprobante',
  `id_tipoModoPago` int(11) NOT NULL COMMENT 'Identificador de tipo de modo de pago (Relacion)',
  `id_tipoRegimenGeneral` int(11) NOT NULL COMMENT 'Identificador de tipo regimen general (Relacion)',
  `id_tipoComprobante` int(11) NOT NULL COMMENT 'Identificador de tipo de comprobante (Relacion)',
  `cuc` bigint(20) NOT NULL COMMENT 'Codigo unico de comprobante (Id_cabeceraComprobante + Id_tipoModoPago + id_tipoRegimenGeneral + id_tipoComprobante + Cantidad de N° Aleatorio)',
  `fechaComprobante` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha automatica de ingreso de registro donde hace referencia al comprobante',
  `importe` double NOT NULL COMMENT 'El importe del comprobante',
  `id_cliente` int(11) NOT NULL COMMENT 'Identificador del Cliente (Relacion)',
  `observacion` varchar(250) NOT NULL COMMENT 'Descripcion del Comprobante',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado del comprobante: 1 Activo y 0 no Activo',
  PRIMARY KEY (`id_comprobante`),
  KEY `idx_tipoModoPago` (`id_tipoModoPago`),
  KEY `idx_tipoRegimenGeneral` (`id_tipoRegimenGeneral`),
  KEY `idx_tipoComprobante` (`id_tipoComprobante`),
  KEY `idx_cuc` (`cuc`),
  KEY `idx_cliente` (`id_cliente`),
  KEY `idx_acivo` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fact_comprobantes` */

/*Table structure for table `fact_comprobantes_descuento` */

DROP TABLE IF EXISTS `fact_comprobantes_descuento`;

CREATE TABLE `fact_comprobantes_descuento` (
  `id_comprobanteDescuento` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del comprobanteDescuento',
  `cuc` bigint(20) NOT NULL COMMENT 'Codigo Unico de Comprobante',
  `id_tipoDescuento` int(11) NOT NULL COMMENT 'Identificador del tipo de descuento (Relacion)',
  `valor_descuento` double NOT NULL COMMENT 'Valor en moneda',
  `descuento` double NOT NULL COMMENT 'Valor en porcentaje',
  `observacion` varchar(250) NOT NULL DEFAULT '',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado del comprobante descuneto: 1 Activo y 0 no Activo',
  PRIMARY KEY (`id_comprobanteDescuento`),
  KEY `idx_tipoDescuento` (`id_tipoDescuento`),
  KEY `idx_activo` (`activo`),
  KEY `idx_cuc` (`cuc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fact_comprobantes_descuento` */

/*Table structure for table `fact_comprobantes_detalle` */

DROP TABLE IF EXISTS `fact_comprobantes_detalle`;

CREATE TABLE `fact_comprobantes_detalle` (
  `id_comprobanteDetalle` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del Comprobante Detalle',
  `id_productoServicio` int(11) NOT NULL COMMENT 'Identificador de productoServicio (Relacion)',
  `cuc` bigint(20) NOT NULL COMMENT 'Codigo Unico de Comprobante',
  `cantidad` int(11) NOT NULL COMMENT 'Se identifica la catidad de producto o servicio solicitado',
  `subtotal` double NOT NULL COMMENT 'Se identifica el subtotal de cada item',
  `observacion` varchar(250) NOT NULL DEFAULT '',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado del comprobante detalle: 1 Activo y 0 no Activo',
  PRIMARY KEY (`id_comprobanteDetalle`),
  KEY `idx_productoServicio` (`id_productoServicio`),
  KEY `idx_cuc` (`cuc`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fact_comprobantes_detalle` */

/*Table structure for table `fact_comprobantes_estado` */

DROP TABLE IF EXISTS `fact_comprobantes_estado`;

CREATE TABLE `fact_comprobantes_estado` (
  `id_comprobanteEsados` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del ComprobanteEstado',
  `cuc` bigint(20) NOT NULL COMMENT 'Codigo Unico de Comprobante (Relacion)',
  `id_estado` int(11) NOT NULL COMMENT 'Identificador del estado del Comprobante',
  `fechaHora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha y hora del estado',
  `observacion` varchar(250) NOT NULL DEFAULT '',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado del Comprobante Estado: 1 Activo y 0 no Activo',
  PRIMARY KEY (`id_comprobanteEsados`),
  KEY `idx_cuc` (`cuc`),
  KEY `idx_estado` (`id_estado`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fact_comprobantes_estado` */

/*Table structure for table `fact_comprobantes_liquidacion` */

DROP TABLE IF EXISTS `fact_comprobantes_liquidacion`;

CREATE TABLE `fact_comprobantes_liquidacion` (
  `id_comprobanteLiquidacion` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del comprobanteLiquidacion',
  `cuc` bigint(20) NOT NULL COMMENT 'Codigo Unico Comprobante (Relacion)',
  `cantidadCuota` int(11) NOT NULL COMMENT 'Cantidad de cuotas del comprobante',
  `numeroCuota` int(11) NOT NULL COMMENT 'Numero de cuota a pagar',
  `importeCuota` double NOT NULL COMMENT 'Importe Cuota',
  `fechaVencimiento` datetime NOT NULL COMMENT 'Fecha de vencimiento de pago',
  `fechaPago` datetime NOT NULL COMMENT 'Fecha y Hora de Pago',
  `observacion` varchar(250) NOT NULL DEFAULT '',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado del comprobante liquidación: 1 Activo y 0 no Activo',
  PRIMARY KEY (`id_comprobanteLiquidacion`),
  KEY `idx_cuc` (`cuc`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fact_comprobantes_liquidacion` */

/*Table structure for table `fact_interesCuota_tipoPago` */

DROP TABLE IF EXISTS `fact_interesCuota_tipoPago`;

CREATE TABLE `fact_interesCuota_tipoPago` (
  `id_interesCuotaTipoPago` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del registro interesCuotaTipoPago',
  `interes` double NOT NULL COMMENT 'Porcentaje de einteres que se le va a aplicar',
  `id_tipoModoPago` int(11) NOT NULL COMMENT 'Identificador del Modo de Pago (Relacion)',
  `cant_cuotas` int(11) NOT NULL COMMENT 'Cantidad de cuota de la venta',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado del InteresCuota_tipoPago: 1 Activo y 0 no Activo',
  PRIMARY KEY (`id_interesCuotaTipoPago`),
  KEY `idx_tipoModoPago` (`id_tipoModoPago`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fact_interesCuota_tipoPago` */

/*Table structure for table `fact_tipoComprobante` */

DROP TABLE IF EXISTS `fact_tipoComprobante`;

CREATE TABLE `fact_tipoComprobante` (
  `id_tipoComprobante` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del Tipo de Comprobante',
  `descripcion` varchar(100) NOT NULL COMMENT 'Descripcion de Tipo Comprobante',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado del tipo comprobante: 1 Activo y 0 no Activo',
  PRIMARY KEY (`id_tipoComprobante`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Anteriormente llamado enan_fact_03_tipo_comprob';

/*Data for the table `fact_tipoComprobante` */

/*Table structure for table `fact_tipoDescuento` */

DROP TABLE IF EXISTS `fact_tipoDescuento`;

CREATE TABLE `fact_tipoDescuento` (
  `id_tipoDescuento` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del tipo de descuento',
  `descripcion` varchar(250) NOT NULL COMMENT 'Descripcion del tipo de descuento',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado del tipo descuneto: 1 Activo y 0 no Activo',
  PRIMARY KEY (`id_tipoDescuento`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fact_tipoDescuento` */

/*Table structure for table `fact_tipoEstado` */

DROP TABLE IF EXISTS `fact_tipoEstado`;

CREATE TABLE `fact_tipoEstado` (
  `id_tipoEstado` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de tipo de estado',
  `descripcion` varchar(250) NOT NULL COMMENT 'Descripcion del tipo de estado',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado del tipo Estado: 1 Activo y 0 no Activo',
  PRIMARY KEY (`id_tipoEstado`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fact_tipoEstado` */

/*Table structure for table `fact_tipoFactura` */

DROP TABLE IF EXISTS `fact_tipoFactura`;

CREATE TABLE `fact_tipoFactura` (
  `id_tipoFactura` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del Tipo de FactFactura',
  `descripcion` varchar(100) NOT NULL COMMENT 'descripcion del tipo de Factura',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado del tipoFactura: 1 Activo y 0 no Activo',
  PRIMARY KEY (`id_tipoFactura`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Se remplazan las tablas enan_fact_05_tab_iva y enan_fact_13_tab_alicuota_iva';

/*Data for the table `fact_tipoFactura` */

/*Table structure for table `fact_tipoModoPago` */

DROP TABLE IF EXISTS `fact_tipoModoPago`;

CREATE TABLE `fact_tipoModoPago` (
  `id_tipoModoPago` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de Tipo de Modo de Pago',
  `descripcion` varchar(100) NOT NULL COMMENT 'Descripcion de Tipo de Modo de Pago',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado del Tipo de Modo de Pago: 1 Activo y 0 no Activo',
  PRIMARY KEY (`id_tipoModoPago`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Se remplaza a la tabla enan_fact_07_tab_modo_pago';

/*Data for the table `fact_tipoModoPago` */

/*Table structure for table `fact_tipoRegimenGeneral` */

DROP TABLE IF EXISTS `fact_tipoRegimenGeneral`;

CREATE TABLE `fact_tipoRegimenGeneral` (
  `id_tipoRegimenGeneral` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de Tipo de Regimen General de la AFIP',
  `descripcion` varchar(100) NOT NULL COMMENT 'descripcion del tipo de regien',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado del Tipo Regimen General: 1 Activo y 0 no Activo',
  PRIMARY KEY (`id_tipoRegimenGeneral`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Se remplazan las tablas enan_fact_05_tab_iva y enan_fact_13_tab_alicuota_iva';

/*Data for the table `fact_tipoRegimenGeneral` */

/*Table structure for table `fact_tipoRegimenGeneral_tipoFactura` */

DROP TABLE IF EXISTS `fact_tipoRegimenGeneral_tipoFactura`;

CREATE TABLE `fact_tipoRegimenGeneral_tipoFactura` (
  `id_tipoRegimenGeneralTipoFactura` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de tipoRegimen_TipoFactura',
  `id_tipoRegimenGeneral` int(11) NOT NULL COMMENT 'Identificador de TipoRegimen (Relación)',
  `id_tipoFactura` int(11) NOT NULL COMMENT 'Identificador de TipoFactura (Relación)',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado del tipoRegimen_TipoFactura: 1 Activo y 0 no Activo',
  PRIMARY KEY (`id_tipoRegimenGeneralTipoFactura`),
  KEY `idx_tipoRegimenGeneral` (`id_tipoRegimenGeneral`),
  KEY `idx_tipoFactura` (`id_tipoFactura`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fact_tipoRegimenGeneral_tipoFactura` */

/*Table structure for table `pers_domicilio` */

DROP TABLE IF EXISTS `pers_domicilio`;

CREATE TABLE `pers_domicilio` (
  `id_domicilio` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identificador persona Domicilio',
  `id_persona` int(11) NOT NULL COMMENT 'Identificador de la persona',
  `id_tipoPersona` int(11) NOT NULL COMMENT '1 = PERSONA HUMANA; 2 = PERSONA JURIDICA; 3 = ORGANO; 4 = DEPENDENCIA; 5 = AREA',
  `Observacion` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'campo de observacion para guardar la dirección de la persona',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado del registro 1 activo 0 no activo',
  PRIMARY KEY (`id_domicilio`),
  KEY `idx_cup` (`id_persona`),
  KEY `idx_tipoPersona` (`id_tipoPersona`),
  KEY `idx_activo` (`activo`),
  FULLTEXT KEY `idx_domicilio` (`Observacion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `pers_domicilio` */

insert  into `pers_domicilio`(`id_domicilio`,`id_persona`,`id_tipoPersona`,`Observacion`,`activo`) values 
(1,1,1,'1',1);

/*Table structure for table `pers_personasContactos` */

DROP TABLE IF EXISTS `pers_personasContactos`;

CREATE TABLE `pers_personasContactos` (
  `id_personaContacto` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador Persona Contacto',
  `id_persona` int(11) NOT NULL COMMENT 'Identifica la persona (Relacion)',
  `id_tipoPersona` int(11) NOT NULL COMMENT 'Identifica al tipo de persona 1 Humana 2 Juridica',
  `id_tipoContacto` int(11) NOT NULL COMMENT 'Identifica el tipo de Contacto',
  `valorcontacto` varchar(100) NOT NULL COMMENT 'Valor del contacto',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado del registro 1 activo 0 no activo',
  PRIMARY KEY (`id_personaContacto`),
  KEY `idx_tipoPersona` (`id_tipoPersona`),
  KEY `idx_persona` (`id_persona`),
  KEY `idx_tipoContacto` (`id_tipoContacto`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Todo tipo de contacto que puede tener un Origen (Organo - Dependencia - Area ) por ejemplo: E-Mail, Telefono, Etc.';

/*Data for the table `pers_personasContactos` */

insert  into `pers_personasContactos`(`id_personaContacto`,`id_persona`,`id_tipoPersona`,`id_tipoContacto`,`valorcontacto`,`activo`) values 
(1,1,1,1,'3704817999',1);

/*Table structure for table `pers_personasDocumento` */

DROP TABLE IF EXISTS `pers_personasDocumento`;

CREATE TABLE `pers_personasDocumento` (
  `id_personadocumento` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Idenifica Persona Documento',
  `id_persona` int(11) NOT NULL COMMENT 'Idenifica a la Persona',
  `id_tipoPersona` int(11) NOT NULL COMMENT 'Identifica el Tipo de Persona 1 Humana 2 Juridica',
  `id_tipoDocumento` int(11) NOT NULL DEFAULT '1' COMMENT 'Identifica el Tipo de Documento',
  `numeroDocumento` bigint(15) NOT NULL COMMENT 'Numero de documento',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado del Registro 1 activo 0 no activo',
  PRIMARY KEY (`id_personadocumento`),
  KEY `idx_cupPersonasDocumento` (`id_persona`),
  KEY `idx_numeroDocumento` (`numeroDocumento`),
  KEY `idx_tipoDocumento` (`id_tipoDocumento`),
  KEY `idx_tipoPersona` (`id_tipoPersona`),
  KEY `idx_acivo` (`activo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Uno o mas documentos que puede tener una persona';

/*Data for the table `pers_personasDocumento` */

insert  into `pers_personasDocumento`(`id_personadocumento`,`id_persona`,`id_tipoPersona`,`id_tipoDocumento`,`numeroDocumento`,`activo`) values 
(1,1,1,1,35678468,1),
(2,2,1,1,18296833,1),
(3,3,1,1,34216361,1),
(4,4,1,1,33467553,1),
(5,5,1,1,32746226,1);

/*Table structure for table `pers_personasDomicilio` */

DROP TABLE IF EXISTS `pers_personasDomicilio`;

CREATE TABLE `pers_personasDomicilio` (
  `id_personadomicilio` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identificador persona Domicilio',
  `id_persona` int(11) NOT NULL COMMENT 'Identificador de la persona',
  `id_tipoPersona` int(11) NOT NULL COMMENT '1 = PERSONA HUMANA; 2 = PERSONA JURIDICA; 3 = ORGANO; 4 = DEPENDENCIA; 5 = AREA',
  `id_domicilio` int(5) NOT NULL COMMENT 'Identificador del Domicilio',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado del registro 1 activo 0 no activo',
  PRIMARY KEY (`id_personadomicilio`),
  KEY `idx_cup` (`id_persona`),
  KEY `idx_tipoPersona` (`id_tipoPersona`),
  KEY `idx_domicilio` (`id_domicilio`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `pers_personasDomicilio` */

insert  into `pers_personasDomicilio`(`id_personadomicilio`,`id_persona`,`id_tipoPersona`,`id_domicilio`,`activo`) values 
(1,1,1,1,1);

/*Table structure for table `pers_personasHumanas` */

DROP TABLE IF EXISTS `pers_personasHumanas`;

CREATE TABLE `pers_personasHumanas` (
  `id_personaHumana` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la Persona Humana',
  `apellidos` varchar(100) NOT NULL COMMENT 'Apellido Persona Humana',
  `nombres` varchar(100) NOT NULL COMMENT 'Nombre Persona Humana',
  `id_tipoSexo` int(11) NOT NULL COMMENT 'Identifica el tipo de Sexo de la Persona Humana',
  `fecha_nacimiento` date NOT NULL COMMENT 'Fecha de Nacimiento Persona Humana',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado del registro 1 activo 0 no activo',
  PRIMARY KEY (`id_personaHumana`),
  KEY `idx_activo` (`activo`),
  KEY `idx_tipoSexo` (`id_tipoSexo`),
  FULLTEXT KEY `idx_apellido` (`apellidos`),
  FULLTEXT KEY `idx_nombre` (`nombres`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='Datos referidos a la persona fisica';

/*Data for the table `pers_personasHumanas` */

insert  into `pers_personasHumanas`(`id_personaHumana`,`apellidos`,`nombres`,`id_tipoSexo`,`fecha_nacimiento`,`activo`) values 
(1,'Plazas','Ricardo Gastón',2,'1990-12-21',1),
(2,'DEL',' Carril Hugo Rolando',2,'2018-10-17',1),
(3,'GOMEZ','Monica Isabel',1,'1990-12-12',1),
(4,'GONZALEZ','Ruth Noemi',1,'1987-12-30',1),
(5,'ZARATE','Pamela Luisana',1,'1987-09-08',1);

/*Table structure for table `pers_personasJuridica` */

DROP TABLE IF EXISTS `pers_personasJuridica`;

CREATE TABLE `pers_personasJuridica` (
  `id_personajuridicas` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la Persona Juridica',
  `id_persona` int(11) DEFAULT NULL COMMENT 'Identificador Propietario/a',
  `razonsocial` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Razon social de la Empresa',
  `nombrefantasia` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de fantacia de la Empresa',
  `inicioActividad` date DEFAULT NULL COMMENT 'Fecha de Inicio de Actividad de la Empresa',
  `imagen` longblob COMMENT 'Imagen de la empresa',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado del registro 1 activo 0 no activo',
  PRIMARY KEY (`id_personajuridicas`),
  KEY `idx_persona` (`id_persona`),
  FULLTEXT KEY `idx_razonsocial` (`razonsocial`),
  FULLTEXT KEY `idx_nombrefantasia` (`nombrefantasia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `pers_personasJuridica` */

/*Table structure for table `pers_personasRol` */

DROP TABLE IF EXISTS `pers_personasRol`;

CREATE TABLE `pers_personasRol` (
  `id_personaRol` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de personas rol',
  `id_persona` int(11) NOT NULL COMMENT 'Identificador de la persona',
  `id_tipoRol` int(11) NOT NULL COMMENT 'Identificador del rol',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado del registro 1 = activo y 0 = no activo',
  PRIMARY KEY (`id_personaRol`),
  KEY `id_persona` (`id_persona`),
  KEY `id_rol` (`id_tipoRol`),
  KEY `activo` (`activo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `pers_personasRol` */

insert  into `pers_personasRol`(`id_personaRol`,`id_persona`,`id_tipoRol`,`activo`) values 
(1,1,2,1),
(2,1,4,1),
(3,2,4,1),
(4,3,4,1),
(5,4,4,1),
(6,5,4,1);

/*Table structure for table `pers_tipoContacto` */

DROP TABLE IF EXISTS `pers_tipoContacto`;

CREATE TABLE `pers_tipoContacto` (
  `id_tipoContacto` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del Tipo Contacto',
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Descripcion del tipo de contacto',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado del Registro 1 activo 0 no activo',
  PRIMARY KEY (`id_tipoContacto`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `pers_tipoContacto` */

insert  into `pers_tipoContacto`(`id_tipoContacto`,`descripcion`,`activo`) values 
(1,'Celular',1);

/*Table structure for table `pers_tipoDocumento` */

DROP TABLE IF EXISTS `pers_tipoDocumento`;

CREATE TABLE `pers_tipoDocumento` (
  `id_tipoDocumento` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del tipo documento',
  `descripcion` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Descripcion del tipo de documento',
  `descripcioncorta` varchar(5) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Descripcion corta del tipo documento',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado del registro 1 activo 0 activo',
  PRIMARY KEY (`id_tipoDocumento`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `pers_tipoDocumento` */

insert  into `pers_tipoDocumento`(`id_tipoDocumento`,`descripcion`,`descripcioncorta`,`activo`) values 
(1,'Documento de Idenidad','DNI',1),
(2,'Cédula de Identidad','CI',1),
(3,'Libreta Cívica','LC',1),
(4,'Libreta de Enrolamiento','LE',1),
(5,'C.U.I.L.','CUIL',1),
(6,'C.U.I.T.','CUIT',1);

/*Table structure for table `pers_tipoDomicilio` */

DROP TABLE IF EXISTS `pers_tipoDomicilio`;

CREATE TABLE `pers_tipoDomicilio` (
  `id_tipoDomicilio` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identificador tipo Domicilio',
  `descripcion` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Descripcion de tipo domicilio',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado del registro 1 activo 0 no activo',
  PRIMARY KEY (`id_tipoDomicilio`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `pers_tipoDomicilio` */

insert  into `pers_tipoDomicilio`(`id_tipoDomicilio`,`descripcion`,`activo`) values 
(1,'Real',1),
(2,'Legal',1);

/*Table structure for table `pers_tipoPersona` */

DROP TABLE IF EXISTS `pers_tipoPersona`;

CREATE TABLE `pers_tipoPersona` (
  `id_tipoPersona` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del Tipo de Persona',
  `descripcion` varchar(50) NOT NULL COMMENT 'Descripcion del tipo de persona',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado del registro 1 activo 0 no activo',
  PRIMARY KEY (`id_tipoPersona`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `pers_tipoPersona` */

insert  into `pers_tipoPersona`(`id_tipoPersona`,`descripcion`,`activo`) values 
(1,'Humana',1),
(2,'Juridica',1);

/*Table structure for table `pers_tipoRol` */

DROP TABLE IF EXISTS `pers_tipoRol`;

CREATE TABLE `pers_tipoRol` (
  `id_tipoRol` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificacion del rol',
  `descripcion` varchar(250) NOT NULL COMMENT 'Descripcion del tipo rol',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado del registro 1 = activo y 0 = no activo',
  PRIMARY KEY (`id_tipoRol`),
  KEY `activo` (`activo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `pers_tipoRol` */

insert  into `pers_tipoRol`(`id_tipoRol`,`descripcion`,`activo`) values 
(1,'Gerente',1),
(2,'Empleado',1),
(3,'Proveedor',1),
(4,'Cliente',1);

/*Table structure for table `pers_tipoSexo` */

DROP TABLE IF EXISTS `pers_tipoSexo`;

CREATE TABLE `pers_tipoSexo` (
  `id_tipoSexo` int(5) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_tipoSexo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `pers_tipoSexo` */

insert  into `pers_tipoSexo`(`id_tipoSexo`,`descripcion`,`activo`) values 
(1,'Femenino',1),
(2,'Masculino',1);

/*Table structure for table `produc_productosServicios` */

DROP TABLE IF EXISTS `produc_productosServicios`;

CREATE TABLE `produc_productosServicios` (
  `id_productoServicio` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de Producto o Servicio',
  `id_tipoContenedor` int(11) NOT NULL COMMENT 'Identificador del contenedor Producto 1 Servicio 2(Relacion)',
  `descripcion` varchar(100) NOT NULL COMMENT 'Descripcion del producto o servicio',
  `cups` bigint(20) NOT NULL COMMENT 'Codigo Unico de Producto o Servicio',
  `precioCosto` double NOT NULL COMMENT 'Precio de costo del Producto o Servicio',
  `alicuota` double NOT NULL DEFAULT '21' COMMENT 'Hace referencia a cualquier porcenaje de alicuota como por el ejemplo el iva 21%',
  `ganancia` double NOT NULL COMMENT 'Hace referencia al porcentaje de ganancia que debe obtener por item',
  `precioVenta` double NOT NULL COMMENT 'Precio de Venta del Producto o Servicio',
  `id_tipoProductoServicio` int(11) NOT NULL DEFAULT '0' COMMENT 'Hace referencia tipo de producto y o Servicio',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado de los Productos/Servicios: 1 Activo y 0 no Activo',
  PRIMARY KEY (`id_productoServicio`),
  KEY `idx_tipoContenedor` (`id_tipoContenedor`),
  KEY `idx_cups` (`cups`),
  KEY `idx_tipoProductoServicio` (`id_tipoProductoServicio`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `produc_productosServicios` */

/*Table structure for table `produc_stock` */

DROP TABLE IF EXISTS `produc_stock`;

CREATE TABLE `produc_stock` (
  `id_stock` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificación de stock',
  `id_productoServicio` int(11) NOT NULL COMMENT 'Identificación del Producto o servicio',
  `cantidadActual` int(11) NOT NULL COMMENT 'Cabtidad actual del servicio o producto',
  `cantidadMinima` int(11) NOT NULL COMMENT 'Cantidad minima del servicio o producto',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado del registro 1 activo 0 no activo',
  PRIMARY KEY (`id_stock`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `produc_stock` */

/*Table structure for table `produc_tipoProductoServicio` */

DROP TABLE IF EXISTS `produc_tipoProductoServicio`;

CREATE TABLE `produc_tipoProductoServicio` (
  `id_tipoProductoServicio` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de tipo Producto Servicio',
  `id_tipoProductoServicioPadre` int(11) NOT NULL DEFAULT '0' COMMENT 'Identificador de tipo Producto Servicio Padre',
  `descripcion` varchar(200) NOT NULL COMMENT 'Descripcion del tipo de producto o servicio',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado del regisro 1 representa activo 0 no activo',
  PRIMARY KEY (`id_tipoProductoServicio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Hace referencia a las categorias del producto o servicio';

/*Data for the table `produc_tipoProductoServicio` */

/*Table structure for table `reco_recordatorio` */

DROP TABLE IF EXISTS `reco_recordatorio`;

CREATE TABLE `reco_recordatorio` (
  `id_recordatorio` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de recordaorio',
  `id_persona` int(11) NOT NULL COMMENT 'IDentificador de la persona',
  `titulo` varchar(250) NOT NULL COMMENT 'Titulo del Recordatorio',
  `cuerpoRecordatorio` varchar(250) NOT NULL COMMENT 'Descripcion del recordatorio',
  `fechaInicio` datetime NOT NULL COMMENT 'Fecha de Inicio del recordatorio',
  `fechaFin` datetime NOT NULL COMMENT 'Fecha Fin del recordatorio',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado del registro 1 activo 0 no activo',
  PRIMARY KEY (`id_recordatorio`),
  KEY `idx_persona` (`id_persona`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `reco_recordatorio` */

/*Table structure for table `reco_tipoEstadoRecordatorio` */

DROP TABLE IF EXISTS `reco_tipoEstadoRecordatorio`;

CREATE TABLE `reco_tipoEstadoRecordatorio` (
  `id_tipoEstadoRecordatorio` int(11) NOT NULL AUTO_INCREMENT COMMENT 'IDentificador del tipo estado recordatorio',
  `descripcion` varchar(100) NOT NULL COMMENT 'Descripcion del tipo estado recordatorio',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado del registro 1 activo 0 es no activo',
  PRIMARY KEY (`id_tipoEstadoRecordatorio`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `reco_tipoEstadoRecordatorio` */

/*Table structure for table `reco_tipoRecordatorio` */

DROP TABLE IF EXISTS `reco_tipoRecordatorio`;

CREATE TABLE `reco_tipoRecordatorio` (
  `id_tipoRecordatorio` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador tipo Recordatorio',
  `descripcion` varchar(100) NOT NULL COMMENT 'Descripcion tipo recordatorio',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado del registro 1 activo 0 no activo',
  PRIMARY KEY (`id_tipoRecordatorio`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `reco_tipoRecordatorio` */

/*Table structure for table `usu_ci_sessions` */

DROP TABLE IF EXISTS `usu_ci_sessions`;

CREATE TABLE `usu_ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`),
  KEY `idx_address` (`ip_address`),
  KEY `idx_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `usu_ci_sessions` */

insert  into `usu_ci_sessions`(`id`,`ip_address`,`timestamp`,`data`) values 
('e5c7b9bb4ef50556030fe7d2922e96f9547f94ae','::1',1529353412,'__ci_last_regenerate|i:1529353412;'),
('a95624ab2323029897f3181cc90d6a151332cc7a','::1',1529353772,'__ci_last_regenerate|i:1529353772;'),
('1ef98c047ba93b0c7e4de06d89665aa2b7d162fc','::1',1529354285,'__ci_last_regenerate|i:1529354285;'),
('89bb51040be933a2730c775f1ac2583ba7dd1170','::1',1529354644,'__ci_last_regenerate|i:1529354643;'),
('f88d2e2240f853c0e5700ebb630cb6c17115651d','::1',1529354963,'__ci_last_regenerate|i:1529354963;'),
('edbb3bb0bde97e6dcc8839d14e7089356c480bc7','192.168.1.11',1529358987,'__ci_last_regenerate|i:1529358987;'),
('4e9121b6d4186874aef2b9eadde4a4f59bc9c3e4','::1',1529355395,'__ci_last_regenerate|i:1529355395;'),
('470e1ce59a4539060c82bf528031df3b7278f9ac','::1',1529355745,'__ci_last_regenerate|i:1529355744;'),
('4369170b529626fa8efc96cbdb81063053be8b9f','::1',1529356191,'__ci_last_regenerate|i:1529356189;'),
('c6175ce12598e3b1ba465928d30e1b62c9ccd857','::1',1529356566,'__ci_last_regenerate|i:1529356566;'),
('f7887fedb9b75e16e4fab75b8ae70ec3b024a12c','::1',1529356943,'__ci_last_regenerate|i:1529356943;'),
('1fbac49a77b1888dfa67723a9bc41cc0d24b7515','::1',1529357357,'__ci_last_regenerate|i:1529357357;'),
('29de87a1f5b61beb22ff5fb65df0b467564a8948','::1',1529357723,'__ci_last_regenerate|i:1529357723;'),
('f80d9c106c794ecec011995c16e8422607a163b0','::1',1529358084,'__ci_last_regenerate|i:1529358084;'),
('d73065671c36e4d7e27e568772080c1e56e5b2f3','::1',1529358403,'__ci_last_regenerate|i:1529358403;'),
('24aa50f800021a52f37ed43bd6108ccc07da5e7a','::1',1529358768,'__ci_last_regenerate|i:1529358768;'),
('ff7b3aa1e78aa2a122c648d6bb15c127b6e1ecaa','::1',1529359288,'__ci_last_regenerate|i:1529359288;'),
('99a2335e5262624dc17ee2ffe8d3c9c879c52749','::1',1529360256,'__ci_last_regenerate|i:1529360255;'),
('8bd0912123ddc212e3c1801f388bcf48716eb9c8','::1',1529360838,'__ci_last_regenerate|i:1529360838;'),
('f5ce346673205d94ffb49d26011c46bcac88c966','::1',1529361175,'__ci_last_regenerate|i:1529361175;'),
('2fba8e719a686b2d52f637414f7981fa011823e1','::1',1529361888,'__ci_last_regenerate|i:1529361888;'),
('cb59efac8b789040f0d00de9f5d651ea02d1b326','::1',1529362264,'__ci_last_regenerate|i:1529362264;'),
('31c66f45bfb11d7eef0aa73597e2dd6a872f9c78','::1',1529362671,'__ci_last_regenerate|i:1529362671;'),
('720dac6766a1bf66e9381c5e094babe1a42d4df4','::1',1529362998,'__ci_last_regenerate|i:1529362998;'),
('57a99bbf60da88a437d664954679964f45eda11a','192.168.1.11',1529363884,'__ci_last_regenerate|i:1529363884;'),
('07995efab32dc029362d4c00ef1dca5ac392139f','::1',1529363878,'__ci_last_regenerate|i:1529363878;'),
('8fa7d3f940ed92fdd152860adebc26a04e3758b4','192.168.1.11',1529364448,'__ci_last_regenerate|i:1529364448;'),
('295dc7bc7ddc15316b3d6a953616a262c964b5dd','::1',1529364183,'__ci_last_regenerate|i:1529364182;'),
('c97facad5e09a2d24dbdb12c454d1ca6db51b104','192.168.1.11',1529947421,'__ci_last_regenerate|i:1529947421;'),
('58e96d5ced75733356adf6937137271dcfd941bf','::1',1529364552,'__ci_last_regenerate|i:1529364552;'),
('4c877cfa176863d760f3f6e5a9eb22359108834d','::1',1529365333,'__ci_last_regenerate|i:1529365333;'),
('c83d8b2ce2036ecf7b966fce6349cbd1126223d3','::1',1529366104,'__ci_last_regenerate|i:1529366104;'),
('08deb44612d627e04c7c7f48ad75ee4e3f41ca69','::1',1529600813,'__ci_last_regenerate|i:1529600812;'),
('29a21950ae41dc8d7355a9b3d8180251649733f9','::1',1529601751,'__ci_last_regenerate|i:1529601750;'),
('2d3e3f762aa787f5a304308ea250c8fcf2284472','::1',1529602065,'__ci_last_regenerate|i:1529602065;'),
('39a9e6b55a2995d2995b7198064adf671a37a998','::1',1529603285,'__ci_last_regenerate|i:1529603284;'),
('f62e9d742136814b81247fedfd9ec8a7f0de5e7b','::1',1529604148,'__ci_last_regenerate|i:1529604147;'),
('46fce79114ad6fcb84035d1990df8f4e713d985a','::1',1529604627,'__ci_last_regenerate|i:1529604626;'),
('debc79c75c8d24b17c3acbe5219d5a5854c868b3','::1',1529604989,'__ci_last_regenerate|i:1529604988;'),
('e22abab42a81c3c2ae422acc5247340b1ad39935','::1',1529946717,'__ci_last_regenerate|i:1529946717;'),
('642455b9654006ba7c22b2ea510f2b439a564e63','192.168.1.14',1529948194,'__ci_last_regenerate|i:1529948194;'),
('dcfe50ebf4ea089564f4095da27db643c98434a3','::1',1529947563,'__ci_last_regenerate|i:1529947562;'),
('2113dfb8a5cef9ba04e44a8419d823f130c01511','192.168.1.14',1529948202,'__ci_last_regenerate|i:1529948199;'),
('db995b8554c618617fd6cd9cf339de491d4467a2','::1',1529948311,'__ci_last_regenerate|i:1529948311;'),
('f23cb6f18bcf3c3c277c06cde75c127e721e67c3','::1',1531483539,'__ci_last_regenerate|i:1531483538;'),
('c7539c135b3f1fb94681fc352e7fe5fb653c5bc2','::1',1531837195,'__ci_last_regenerate|i:1531837195;id_usuario|s:1:\"1\";nombreUsuario|s:7:\"plazasr\";contrasenia|s:40:\"e671c1570cb40e099fb209e8da51b9c93a6ef6fd\";activo|s:1:\"1\";id_perfil|s:1:\"2\";perfilUsuario|s:7:\"Gerente\";is_logged_in|b:1;'),
('ded75da0e928a3717a9c7f8f5b6f04eef556bf93','::1',1532613567,'__ci_last_regenerate|i:1532613567;id_usuario|s:1:\"1\";nombreUsuario|s:7:\"plazasr\";contrasenia|s:40:\"e671c1570cb40e099fb209e8da51b9c93a6ef6fd\";activo|s:1:\"1\";id_perfil|s:1:\"2\";perfilUsuario|s:7:\"Gerente\";is_logged_in|b:1;'),
('d79351f99f2a35058e5b138740cff5c78b107000','::1',1535742567,'__ci_last_regenerate|i:1535742567;id_usuario|s:1:\"1\";nombreUsuario|s:7:\"plazasr\";contrasenia|s:40:\"e671c1570cb40e099fb209e8da51b9c93a6ef6fd\";activo|s:1:\"1\";id_perfil|s:1:\"2\";perfilUsuario|s:7:\"Gerente\";is_logged_in|b:1;'),
('90b31acebd6eec87269419f455fd1673a4c92d99','::1',1540417200,'__ci_last_regenerate|i:1540417191;id_usuario|s:1:\"1\";nombreUsuario|s:7:\"plazasr\";contrasenia|s:40:\"e671c1570cb40e099fb209e8da51b9c93a6ef6fd\";activo|s:1:\"1\";id_perfil|s:1:\"2\";perfilUsuario|s:7:\"Gerente\";is_logged_in|b:1;');

/*Table structure for table `usu_controladoresSistema` */

DROP TABLE IF EXISTS `usu_controladoresSistema`;

CREATE TABLE `usu_controladoresSistema` (
  `id_controladorSistema` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de controladorSistema',
  `descripcion` varchar(100) NOT NULL COMMENT 'Descripcion de los Controladores',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado del controladorSistema: 1 Activo y 0 no Activo',
  PRIMARY KEY (`id_controladorSistema`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `usu_controladoresSistema` */

/*Table structure for table `usu_controladores_metodo` */

DROP TABLE IF EXISTS `usu_controladores_metodo`;

CREATE TABLE `usu_controladores_metodo` (
  `id_controladorMetodo` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de controladorMetodo',
  `id_controladorSistema` int(5) NOT NULL COMMENT 'Identificador de controladorSistema (Relacion)',
  `id_metodoSistema` int(5) NOT NULL COMMENT 'Identificador de controladorSistema (Relacion)',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado del controladorMetodo: 1 Activo y 0 no Activo',
  PRIMARY KEY (`id_controladorMetodo`),
  KEY `idx_controladorSistema` (`id_controladorSistema`),
  KEY `idx_metodoSistema` (`id_metodoSistema`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `usu_controladores_metodo` */

/*Table structure for table `usu_elementospantallas` */

DROP TABLE IF EXISTS `usu_elementospantallas`;

CREATE TABLE `usu_elementospantallas` (
  `id_elementoPantalla` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de ementoPantalla',
  `id_pantalla` int(11) NOT NULL COMMENT 'Identificador de Pantalla',
  `id_tipoElemento` int(11) NOT NULL COMMENT 'Identificador de Tipoelemento',
  `descripcion` varchar(250) CHARACTER SET utf8 NOT NULL COMMENT 'ID del elemento en la vista',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado del elementoPantalla: 1 Activo y 0 no Activo',
  PRIMARY KEY (`id_elementoPantalla`),
  KEY `idx_pantalla` (`id_pantalla`),
  KEY `idx_tipoElemento` (`id_tipoElemento`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `usu_elementospantallas` */

/*Table structure for table `usu_menues` */

DROP TABLE IF EXISTS `usu_menues`;

CREATE TABLE `usu_menues` (
  `id_menu` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de Menu',
  `nivel` int(11) NOT NULL COMMENT 'Nivel del Menu',
  `orden` int(11) NOT NULL COMMENT 'Orden del menu si es que varios menues tienen el mismo nivel',
  `referencia` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'Url de referencia',
  `icono` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'Icono que utilizara el menu',
  `referenciapadre` int(5) NOT NULL COMMENT 'Url de referencia donde se redireccionara padre',
  `id_tipoMenu` tinyint(1) NOT NULL COMMENT 'Identificador de tipoMenu (Relacion)',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado del menues: 1 Activo y 0 no Activo',
  PRIMARY KEY (`id_menu`),
  KEY `idx_lay` (`referencia`(200)),
  KEY `idx_referenciapadre` (`referenciapadre`),
  KEY `idx_nivel_orden` (`nivel`,`orden`),
  KEY `idx_tipoMenu` (`id_tipoMenu`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `usu_menues` */

/*Table structure for table `usu_metodosSistema` */

DROP TABLE IF EXISTS `usu_metodosSistema`;

CREATE TABLE `usu_metodosSistema` (
  `id_metodosSistema` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de metodoSistema',
  `descripcion` varchar(100) NOT NULL COMMENT 'Descripcion de los metodos',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado del metodoSistema: 1 Activo y 0 no Activo',
  PRIMARY KEY (`id_metodosSistema`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `usu_metodosSistema` */

/*Table structure for table `usu_pantallas` */

DROP TABLE IF EXISTS `usu_pantallas`;

CREATE TABLE `usu_pantallas` (
  `id_pantalla` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de Pantalla',
  `descripcion` varchar(250) CHARACTER SET utf8 NOT NULL COMMENT 'Descripcion de la Vista',
  `activo` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'estado del Pantalla: 1 Activo y 0 no Activo',
  PRIMARY KEY (`id_pantalla`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `usu_pantallas` */

/*Table structure for table `usu_perfiles` */

DROP TABLE IF EXISTS `usu_perfiles`;

CREATE TABLE `usu_perfiles` (
  `id_perfil` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de Tipo de Perfil',
  `descripcion` varchar(100) NOT NULL COMMENT 'Descripcion del Perfil',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado del Perfil: 1 Activo y 0 no Activo',
  PRIMARY KEY (`id_perfil`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `usu_perfiles` */

insert  into `usu_perfiles`(`id_perfil`,`descripcion`,`activo`) values 
(1,'Administrador',1),
(2,'Gerente',1),
(3,'Cajero',1),
(4,'Vendedor',1);

/*Table structure for table `usu_perfiles_controladorMetodo` */

DROP TABLE IF EXISTS `usu_perfiles_controladorMetodo`;

CREATE TABLE `usu_perfiles_controladorMetodo` (
  `id_perfilControladorMetodo` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de perfilControladorMetodo',
  `id_perfil` int(5) NOT NULL COMMENT 'Identificador de perfil (Relacion)',
  `id_controladorMetodo` int(5) NOT NULL COMMENT 'Identificador de metodoSistema (Relacion)',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado del perfilesMetodo: 1 Activo y 0 no Activo',
  PRIMARY KEY (`id_perfilControladorMetodo`),
  KEY `idx_perfil` (`id_perfil`),
  KEY `idx_metodosSistema` (`id_controladorMetodo`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `usu_perfiles_controladorMetodo` */

/*Table structure for table `usu_perfiles_elementoPantalla` */

DROP TABLE IF EXISTS `usu_perfiles_elementoPantalla`;

CREATE TABLE `usu_perfiles_elementoPantalla` (
  `id_perfilelementoPantalla` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de perfilelementoPantalla',
  `id_perfil` int(11) NOT NULL COMMENT 'Identificador de perfil (Relacion)',
  `id_elementoPantalla` int(11) NOT NULL COMMENT 'Identificador de elementosPantalla (Relacion)',
  `activo` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'estado del perfilesPermisos: 1 Activo y 0 no Activo',
  PRIMARY KEY (`id_perfilelementoPantalla`),
  KEY `idx_perfil` (`id_perfil`),
  KEY `idx_elementoPantalla` (`id_elementoPantalla`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `usu_perfiles_elementoPantalla` */

/*Table structure for table `usu_perfiles_menu` */

DROP TABLE IF EXISTS `usu_perfiles_menu`;

CREATE TABLE `usu_perfiles_menu` (
  `id_perfilMenu` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de perfilMenu',
  `id_perfil` int(5) NOT NULL COMMENT 'Identificador de perfil (Relacion)',
  `id_menu` int(5) NOT NULL COMMENT 'Identificador de menu (Relacion)',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado del perfilesMenu: 1 Activo y 0 no Activo',
  PRIMARY KEY (`id_perfilMenu`),
  KEY `idx_perfil` (`id_perfil`),
  KEY `idx_menu` (`id_menu`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Almacena las acciones segun el menues de una dependencia segun el perfil';

/*Data for the table `usu_perfiles_menu` */

/*Table structure for table `usu_tipoElementoPantalla` */

DROP TABLE IF EXISTS `usu_tipoElementoPantalla`;

CREATE TABLE `usu_tipoElementoPantalla` (
  `id_tipoElemento` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de tipoElemento',
  `descripcion` varchar(150) CHARACTER SET utf8 NOT NULL COMMENT 'Descripcion de los elementos',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado del tipoElementoPantalla: 1 Activo y 0 no Activo',
  PRIMARY KEY (`id_tipoElemento`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `usu_tipoElementoPantalla` */

/*Table structure for table `usu_tipoMenu` */

DROP TABLE IF EXISTS `usu_tipoMenu`;

CREATE TABLE `usu_tipoMenu` (
  `id_tipoMenu` tinyint(1) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de tipoMenus',
  `descripcion` varchar(40) NOT NULL COMMENT 'Descripcion de los tipoMenues',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado del tipoMenues: 1 Activo y 0 no Activo',
  PRIMARY KEY (`id_tipoMenu`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `usu_tipoMenu` */

/*Table structure for table `usu_usuarios` */

DROP TABLE IF EXISTS `usu_usuarios`;

CREATE TABLE `usu_usuarios` (
  `id_usuario` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del Usuario',
  `nombreUsuario` varchar(100) NOT NULL COMMENT 'Nombre de usuario que se le asignara al usuario (Es recomendable que sea alfabético y no el DNI por cuestiones de protección de datos personales)',
  `contrasenia` varchar(100) NOT NULL COMMENT 'Contraseña que generada por el Usuario',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado del usuario: 1 Activo y 0 no Activo',
  PRIMARY KEY (`id_usuario`),
  KEY `idx_nombreUsuario` (`nombreUsuario`),
  KEY `idx_contrasenia` (`contrasenia`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `usu_usuarios` */

insert  into `usu_usuarios`(`id_usuario`,`nombreUsuario`,`contrasenia`,`activo`) values 
(1,'plazasr','e671c1570cb40e099fb209e8da51b9c93a6ef6fd',1);

/*Table structure for table `usu_usuarios_perfil` */

DROP TABLE IF EXISTS `usu_usuarios_perfil`;

CREATE TABLE `usu_usuarios_perfil` (
  `id_usuarioPerfil` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de UsuarioPerfil',
  `id_usuario` int(5) NOT NULL COMMENT 'Identificador de Usuario (Relación)',
  `id_perfil` int(5) NOT NULL COMMENT 'Identificador de Perfil (Relación)',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado del usuarioPerfil: 1 Activo y 0 no Activo',
  PRIMARY KEY (`id_usuarioPerfil`),
  KEY `idx_usuario` (`id_usuario`),
  KEY `idx_perfil` (`id_perfil`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `usu_usuarios_perfil` */

insert  into `usu_usuarios_perfil`(`id_usuarioPerfil`,`id_usuario`,`id_perfil`,`activo`) values 
(1,1,2,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
