/*
SQLyog Ultimate v12.4.1 (32 bit)
MySQL - 10.1.37-MariaDB : Database - gestionesell
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

/*Table structure for table `fact_interescuota_tipopago` */

DROP TABLE IF EXISTS `fact_interescuota_tipopago`;

CREATE TABLE `fact_interescuota_tipopago` (
  `id_interesCuotaTipoPago` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del registro interesCuotaTipoPago',
  `interes` double NOT NULL COMMENT 'Porcentaje de einteres que se le va a aplicar',
  `id_tipoModoPago` int(11) NOT NULL COMMENT 'Identificador del Modo de Pago (Relacion)',
  `cant_cuotas` int(11) NOT NULL COMMENT 'Cantidad de cuota de la venta',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado del InteresCuota_tipoPago: 1 Activo y 0 no Activo',
  PRIMARY KEY (`id_interesCuotaTipoPago`),
  KEY `idx_tipoModoPago` (`id_tipoModoPago`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fact_interescuota_tipopago` */

/*Table structure for table `fact_tipocomprobante` */

DROP TABLE IF EXISTS `fact_tipocomprobante`;

CREATE TABLE `fact_tipocomprobante` (
  `id_tipoComprobante` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del Tipo de Comprobante',
  `descripcion` varchar(100) NOT NULL COMMENT 'Descripcion de Tipo Comprobante',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado del tipo comprobante: 1 Activo y 0 no Activo',
  PRIMARY KEY (`id_tipoComprobante`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Anteriormente llamado enan_fact_03_tipo_comprob';

/*Data for the table `fact_tipocomprobante` */

/*Table structure for table `fact_tipodescuento` */

DROP TABLE IF EXISTS `fact_tipodescuento`;

CREATE TABLE `fact_tipodescuento` (
  `id_tipoDescuento` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del tipo de descuento',
  `descripcion` varchar(250) NOT NULL COMMENT 'Descripcion del tipo de descuento',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado del tipo descuneto: 1 Activo y 0 no Activo',
  PRIMARY KEY (`id_tipoDescuento`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fact_tipodescuento` */

/*Table structure for table `fact_tipoestado` */

DROP TABLE IF EXISTS `fact_tipoestado`;

CREATE TABLE `fact_tipoestado` (
  `id_tipoEstado` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de tipo de estado',
  `descripcion` varchar(250) NOT NULL COMMENT 'Descripcion del tipo de estado',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado del tipo Estado: 1 Activo y 0 no Activo',
  PRIMARY KEY (`id_tipoEstado`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fact_tipoestado` */

/*Table structure for table `fact_tipofactura` */

DROP TABLE IF EXISTS `fact_tipofactura`;

CREATE TABLE `fact_tipofactura` (
  `id_tipoFactura` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del Tipo de FactFactura',
  `descripcion` varchar(100) NOT NULL COMMENT 'descripcion del tipo de Factura',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado del tipoFactura: 1 Activo y 0 no Activo',
  PRIMARY KEY (`id_tipoFactura`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Se remplazan las tablas enan_fact_05_tab_iva y enan_fact_13_tab_alicuota_iva';

/*Data for the table `fact_tipofactura` */

/*Table structure for table `fact_tipomodopago` */

DROP TABLE IF EXISTS `fact_tipomodopago`;

CREATE TABLE `fact_tipomodopago` (
  `id_tipoModoPago` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de Tipo de Modo de Pago',
  `descripcion` varchar(100) NOT NULL COMMENT 'Descripcion de Tipo de Modo de Pago',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado del Tipo de Modo de Pago: 1 Activo y 0 no Activo',
  PRIMARY KEY (`id_tipoModoPago`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Se remplaza a la tabla enan_fact_07_tab_modo_pago';

/*Data for the table `fact_tipomodopago` */

/*Table structure for table `fact_tiporegimengeneral` */

DROP TABLE IF EXISTS `fact_tiporegimengeneral`;

CREATE TABLE `fact_tiporegimengeneral` (
  `id_tipoRegimenGeneral` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de Tipo de Regimen General de la AFIP',
  `descripcion` varchar(100) NOT NULL COMMENT 'descripcion del tipo de regien',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado del Tipo Regimen General: 1 Activo y 0 no Activo',
  PRIMARY KEY (`id_tipoRegimenGeneral`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Se remplazan las tablas enan_fact_05_tab_iva y enan_fact_13_tab_alicuota_iva';

/*Data for the table `fact_tiporegimengeneral` */

/*Table structure for table `fact_tiporegimengeneral_tipofactura` */

DROP TABLE IF EXISTS `fact_tiporegimengeneral_tipofactura`;

CREATE TABLE `fact_tiporegimengeneral_tipofactura` (
  `id_tipoRegimenGeneralTipoFactura` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de tipoRegimen_TipoFactura',
  `id_tipoRegimenGeneral` int(11) NOT NULL COMMENT 'Identificador de TipoRegimen (Relación)',
  `id_tipoFactura` int(11) NOT NULL COMMENT 'Identificador de TipoFactura (Relación)',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado del tipoRegimen_TipoFactura: 1 Activo y 0 no Activo',
  PRIMARY KEY (`id_tipoRegimenGeneralTipoFactura`),
  KEY `idx_tipoRegimenGeneral` (`id_tipoRegimenGeneral`),
  KEY `idx_tipoFactura` (`id_tipoFactura`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fact_tiporegimengeneral_tipofactura` */

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

/*Table structure for table `pers_personascontactos` */

DROP TABLE IF EXISTS `pers_personascontactos`;

CREATE TABLE `pers_personascontactos` (
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

/*Data for the table `pers_personascontactos` */

insert  into `pers_personascontactos`(`id_personaContacto`,`id_persona`,`id_tipoPersona`,`id_tipoContacto`,`valorcontacto`,`activo`) values 
(1,1,1,1,'3704817999',1);

/*Table structure for table `pers_personasdocumento` */

DROP TABLE IF EXISTS `pers_personasdocumento`;

CREATE TABLE `pers_personasdocumento` (
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

/*Data for the table `pers_personasdocumento` */

insert  into `pers_personasdocumento`(`id_personadocumento`,`id_persona`,`id_tipoPersona`,`id_tipoDocumento`,`numeroDocumento`,`activo`) values 
(1,1,1,1,35678468,1),
(2,2,1,1,18296833,1),
(3,3,1,1,34216361,1),
(4,4,1,1,33467553,1),
(5,5,1,1,32746226,1);

/*Table structure for table `pers_personasdomicilio` */

DROP TABLE IF EXISTS `pers_personasdomicilio`;

CREATE TABLE `pers_personasdomicilio` (
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

/*Data for the table `pers_personasdomicilio` */

insert  into `pers_personasdomicilio`(`id_personadomicilio`,`id_persona`,`id_tipoPersona`,`id_domicilio`,`activo`) values 
(1,1,1,1,1);

/*Table structure for table `pers_personashumanas` */

DROP TABLE IF EXISTS `pers_personashumanas`;

CREATE TABLE `pers_personashumanas` (
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

/*Data for the table `pers_personashumanas` */

insert  into `pers_personashumanas`(`id_personaHumana`,`apellidos`,`nombres`,`id_tipoSexo`,`fecha_nacimiento`,`activo`) values 
(1,'Plazas','Ricardo Gastón',2,'1990-12-21',1),
(2,'DEL',' Carril Hugo Rolando',2,'2018-10-17',1),
(3,'GOMEZ','Monica Isabel',1,'1990-12-12',1),
(4,'GONZALEZ','Ruth Noemi',1,'1987-12-30',1),
(5,'ZARATE','Pamela Luisana',1,'1987-09-08',1);

/*Table structure for table `pers_personasjuridica` */

DROP TABLE IF EXISTS `pers_personasjuridica`;

CREATE TABLE `pers_personasjuridica` (
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

/*Data for the table `pers_personasjuridica` */

/*Table structure for table `pers_personasrol` */

DROP TABLE IF EXISTS `pers_personasrol`;

CREATE TABLE `pers_personasrol` (
  `id_personaRol` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de personas rol',
  `id_persona` int(11) NOT NULL COMMENT 'Identificador de la persona',
  `id_tipoRol` int(11) NOT NULL COMMENT 'Identificador del rol',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado del registro 1 = activo y 0 = no activo',
  PRIMARY KEY (`id_personaRol`),
  KEY `id_persona` (`id_persona`),
  KEY `id_rol` (`id_tipoRol`),
  KEY `activo` (`activo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `pers_personasrol` */

insert  into `pers_personasrol`(`id_personaRol`,`id_persona`,`id_tipoRol`,`activo`) values 
(1,1,2,1),
(2,1,4,1),
(3,2,4,1),
(4,3,4,1),
(5,4,4,1),
(6,5,4,1);

/*Table structure for table `pers_tipocontacto` */

DROP TABLE IF EXISTS `pers_tipocontacto`;

CREATE TABLE `pers_tipocontacto` (
  `id_tipoContacto` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del Tipo Contacto',
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Descripcion del tipo de contacto',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado del Registro 1 activo 0 no activo',
  PRIMARY KEY (`id_tipoContacto`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `pers_tipocontacto` */

insert  into `pers_tipocontacto`(`id_tipoContacto`,`descripcion`,`activo`) values 
(1,'Celular',1);

/*Table structure for table `pers_tipodocumento` */

DROP TABLE IF EXISTS `pers_tipodocumento`;

CREATE TABLE `pers_tipodocumento` (
  `id_tipoDocumento` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del tipo documento',
  `descripcion` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Descripcion del tipo de documento',
  `descripcioncorta` varchar(5) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Descripcion corta del tipo documento',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado del registro 1 activo 0 activo',
  PRIMARY KEY (`id_tipoDocumento`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `pers_tipodocumento` */

insert  into `pers_tipodocumento`(`id_tipoDocumento`,`descripcion`,`descripcioncorta`,`activo`) values 
(1,'Documento de Idenidad','DNI',1),
(2,'Cédula de Identidad','CI',1),
(3,'Libreta Cívica','LC',1),
(4,'Libreta de Enrolamiento','LE',1),
(5,'C.U.I.L.','CUIL',1),
(6,'C.U.I.T.','CUIT',1);

/*Table structure for table `pers_tipodomicilio` */

DROP TABLE IF EXISTS `pers_tipodomicilio`;

CREATE TABLE `pers_tipodomicilio` (
  `id_tipoDomicilio` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identificador tipo Domicilio',
  `descripcion` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Descripcion de tipo domicilio',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado del registro 1 activo 0 no activo',
  PRIMARY KEY (`id_tipoDomicilio`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `pers_tipodomicilio` */

insert  into `pers_tipodomicilio`(`id_tipoDomicilio`,`descripcion`,`activo`) values 
(1,'Real',1),
(2,'Legal',1);

/*Table structure for table `pers_tipopersona` */

DROP TABLE IF EXISTS `pers_tipopersona`;

CREATE TABLE `pers_tipopersona` (
  `id_tipoPersona` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del Tipo de Persona',
  `descripcion` varchar(50) NOT NULL COMMENT 'Descripcion del tipo de persona',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado del registro 1 activo 0 no activo',
  PRIMARY KEY (`id_tipoPersona`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `pers_tipopersona` */

insert  into `pers_tipopersona`(`id_tipoPersona`,`descripcion`,`activo`) values 
(1,'Humana',1),
(2,'Juridica',1);

/*Table structure for table `pers_tiporol` */

DROP TABLE IF EXISTS `pers_tiporol`;

CREATE TABLE `pers_tiporol` (
  `id_tipoRol` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificacion del rol',
  `descripcion` varchar(250) NOT NULL COMMENT 'Descripcion del tipo rol',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado del registro 1 = activo y 0 = no activo',
  PRIMARY KEY (`id_tipoRol`),
  KEY `activo` (`activo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `pers_tiporol` */

insert  into `pers_tiporol`(`id_tipoRol`,`descripcion`,`activo`) values 
(1,'Gerente',1),
(2,'Empleado',1),
(3,'Proveedor',1),
(4,'Cliente',1);

/*Table structure for table `pers_tiposexo` */

DROP TABLE IF EXISTS `pers_tiposexo`;

CREATE TABLE `pers_tiposexo` (
  `id_tipoSexo` int(5) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_tipoSexo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `pers_tiposexo` */

insert  into `pers_tiposexo`(`id_tipoSexo`,`descripcion`,`activo`) values 
(1,'Femenino',1),
(2,'Masculino',1);

/*Table structure for table `produc_productosservicios` */

DROP TABLE IF EXISTS `produc_productosservicios`;

CREATE TABLE `produc_productosservicios` (
  `id_productoservicio` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de Producto o Servicio',
  `id_tipocontenedor` int(11) NOT NULL COMMENT 'Identificador del contenedor Producto 1 Servicio 2(Relacion)',
  `descripcion` varchar(100) NOT NULL COMMENT 'Descripcion del producto o servicio',
  `cups` bigint(20) NOT NULL COMMENT 'Codigo Unico de Producto o Servicio',
  `preciocosto` double NOT NULL COMMENT 'Precio de costo del Producto o Servicio',
  `alicuota` double NOT NULL DEFAULT '21' COMMENT 'Hace referencia a cualquier porcenaje de alicuota como por el ejemplo el iva 21%',
  `ganancia` double NOT NULL COMMENT 'Hace referencia al porcentaje de ganancia que debe obtener por item',
  `precioventa` double NOT NULL COMMENT 'Precio de Venta del Producto o Servicio',
  `id_tipoproductoservicio` int(11) NOT NULL DEFAULT '0' COMMENT 'Hace referencia tipo de producto y o Servicio',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado de los Productos/Servicios: 1 Activo y 0 no Activo',
  PRIMARY KEY (`id_productoservicio`),
  KEY `idx_tipoContenedor` (`id_tipocontenedor`),
  KEY `idx_cups` (`cups`),
  KEY `idx_tipoProductoServicio` (`id_tipoproductoservicio`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `produc_productosservicios` */

insert  into `produc_productosservicios`(`id_productoservicio`,`id_tipocontenedor`,`descripcion`,`cups`,`preciocosto`,`alicuota`,`ganancia`,`precioventa`,`id_tipoproductoservicio`,`activo`) values 
(1,1,'intel i7 6700k',11883,3000,21,16,3480,6,1),
(2,1,'Asus Hero VII',1232,400,21,100,800,7,1),
(3,1,'A7 4.3Mhz',20154,3000,21,16,3480,6,1),
(4,1,'Strix',1562,400,21,100,800,7,1),
(5,1,'OTRO',2234,30,21,12,33.6,2,1),
(6,1,'Ejemplo',112,23,21,23,28.29,16,1),
(7,1,'a7',123,1234,21,12,1382.08,2,1),
(8,1,'Mesa',1874,115,21,12,128.8,2,1),
(9,1,'Silla',4451,115,21,12,128.8,2,1),
(10,1,'Sobre Mesada',1887,115,21,12,128.8,2,1),
(11,1,'Cuchillo cocina',123,12,21,1,12.12,16,1),
(12,1,'Cuchillo madera',123,12,21,1,12.12,16,1),
(13,1,'NIIDEa',123,12,21,1,12.12,16,1),
(14,1,'Disco 500gb',3345,1123,21,11,1246.53,5,1);

/*Table structure for table `produc_stock` */

DROP TABLE IF EXISTS `produc_stock`;

CREATE TABLE `produc_stock` (
  `id_stock` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificación de stock',
  `id_productoservicio` int(11) NOT NULL COMMENT 'Identificación del Producto o servicio',
  `cantidadactual` int(11) NOT NULL COMMENT 'Cabtidad actual del servicio o producto',
  `cantidadminima` int(11) NOT NULL COMMENT 'Cantidad minima del servicio o producto',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado del registro 1 activo 0 no activo',
  PRIMARY KEY (`id_stock`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `produc_stock` */

insert  into `produc_stock`(`id_stock`,`id_productoservicio`,`cantidadactual`,`cantidadminima`,`activo`) values 
(1,1,20,1,1),
(2,2,20,1,1),
(3,3,20,1,1),
(4,4,20,1,1),
(5,5,150,10,1),
(6,6,0,0,1),
(7,7,100,20,1),
(8,8,0,0,1),
(9,9,0,0,1),
(10,10,0,0,1),
(11,11,0,0,1),
(12,12,0,0,1),
(13,13,10,20,1),
(14,14,0,0,1);

/*Table structure for table `produc_tipoproductoservicio` */

DROP TABLE IF EXISTS `produc_tipoproductoservicio`;

CREATE TABLE `produc_tipoproductoservicio` (
  `id_tipoproductoservicio` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de tipo Producto Servicio',
  `id_tipoproductoserviciopadre` int(11) NOT NULL DEFAULT '0' COMMENT 'Identificador de tipo Producto Servicio Padre',
  `descripcion` varchar(200) NOT NULL COMMENT 'Descripcion del tipo de producto o servicio',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado del regisro 1 representa activo 0 no activo',
  PRIMARY KEY (`id_tipoproductoservicio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Hace referencia a las categorias del producto o servicio';

/*Data for the table `produc_tipoproductoservicio` */

insert  into `produc_tipoproductoservicio`(`id_tipoproductoservicio`,`id_tipoproductoserviciopadre`,`descripcion`,`activo`) values 
(1,0,'Electrodomesticos',1),
(2,1,'Cocina',1),
(3,0,'Utencilios',1),
(4,0,'Coomputacion',1),
(5,4,'Disco Rigido',1),
(6,4,'Microprocesador',1),
(7,4,'Placa Madre',1),
(15,0,'Articulos para el Hogar',1),
(16,3,'Cuchillo',1),
(17,0,'Muebles',1);

/*Table structure for table `reco_recordatorio` */

DROP TABLE IF EXISTS `reco_recordatorio`;

CREATE TABLE `reco_recordatorio` (
  `id_recordatorio` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de recordaorio',
  `id_persona` int(11) NOT NULL COMMENT 'IDentificador de la persona',
  `id_tiporecordatorio` int(11) NOT NULL COMMENT 'Relacion con el tipo recordatorio',
  `id_tipoestadorecordatorio` int(11) NOT NULL COMMENT 'Relacion con el estado del recordatorio',
  `titulo` varchar(250) NOT NULL COMMENT 'Titulo del Recordatorio',
  `cuerporecordatorio` varchar(250) NOT NULL COMMENT 'Descripcion del recordatorio',
  `fechacarga` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha en la que se carga el recordatorio',
  `fechainicio` datetime NOT NULL COMMENT 'Fecha de Inicio del recordatorio',
  `fechafin` datetime NOT NULL COMMENT 'Fecha Fin del recordatorio',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado del registro 1 activo 0 no activo',
  PRIMARY KEY (`id_recordatorio`),
  KEY `idx_persona` (`id_persona`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `reco_recordatorio` */

insert  into `reco_recordatorio`(`id_recordatorio`,`id_persona`,`id_tiporecordatorio`,`id_tipoestadorecordatorio`,`titulo`,`cuerporecordatorio`,`fechacarga`,`fechainicio`,`fechafin`,`activo`) values 
(1,1,1,1,'Pedido','2 bolsas de paco','2019-01-24 13:00:28','2018-12-05 11:35:58','2019-01-18 00:00:00',1),
(2,1,1,2,'Test','Cuerpo Test','2019-01-24 13:00:28','2018-12-05 11:35:58','2018-12-31 00:00:00',1),
(3,1,1,8,'Test3333','Teastea3','2019-01-24 13:00:28','2018-12-05 11:35:58','2019-01-30 00:00:00',1),
(4,0,3,1,'Deuda Luz','cuerpo del pago atr de la cosa loca','2019-01-24 13:00:28','2018-12-05 11:35:58','2019-01-30 00:00:00',1),
(5,1,4,1,'Instalacion','Instalar antena carlongues','2019-01-24 13:00:28','2019-01-15 00:00:00','2019-01-23 00:00:00',1);

/*Table structure for table `reco_tipoestadorecordatorio` */

DROP TABLE IF EXISTS `reco_tipoestadorecordatorio`;

CREATE TABLE `reco_tipoestadorecordatorio` (
  `id_tipoestadorecordatorio` int(11) NOT NULL AUTO_INCREMENT COMMENT 'IDentificador del tipo estado recordatorio',
  `descripcion` varchar(100) NOT NULL COMMENT 'Descripcion del tipo estado recordatorio',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado del registro 1 activo 0 es no activo',
  PRIMARY KEY (`id_tipoestadorecordatorio`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `reco_tipoestadorecordatorio` */

insert  into `reco_tipoestadorecordatorio`(`id_tipoestadorecordatorio`,`descripcion`,`activo`) values 
(1,'Iniciado',1),
(2,'Sin coordinar',1),
(3,'Coordinado',1),
(4,'En proceso',1),
(5,'Reprogramado',1),
(6,'Con problemas.',1),
(7,'Completado',1),
(8,'Finalizado',1);

/*Table structure for table `reco_tiporecordatorio` */

DROP TABLE IF EXISTS `reco_tiporecordatorio`;

CREATE TABLE `reco_tiporecordatorio` (
  `id_tiporecordatorio` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador tipo Recordatorio',
  `descripcion` varchar(100) NOT NULL COMMENT 'Descripcion tipo recordatorio',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado del registro 1 activo 0 no activo',
  PRIMARY KEY (`id_tiporecordatorio`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `reco_tiporecordatorio` */

insert  into `reco_tiporecordatorio`(`id_tiporecordatorio`,`descripcion`,`activo`) values 
(1,'Pedidos',1),
(2,'Pagos',1),
(3,'Deudas',1),
(4,'Instalaciones',1);

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
('8nko0pjeffbt50g6an4nfbhjih5tfgbg','::1',1547736595,'__ci_last_regenerate|i:1547736430;id_usuario|s:1:\"1\";nombreUsuario|s:5:\"admin\";contrasenia|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";activo|s:1:\"1\";id_perfil|s:1:\"2\";perfilUsuario|s:7:\"Gerente\";recordatorios|i:1;is_logged_in|b:1;'),
('3a17efhcifvrm4gqqqjgccheu3jo9fl0','::1',1547829348,'__ci_last_regenerate|i:1547829323;id_usuario|s:1:\"1\";nombreUsuario|s:5:\"admin\";contrasenia|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";activo|s:1:\"1\";id_perfil|s:1:\"2\";perfilUsuario|s:7:\"Gerente\";recordatorios|i:1;is_logged_in|b:1;'),
('3arm6fuvpsloj32j1mm57rob1lukl6nr','::1',1548166003,'__ci_last_regenerate|i:1548166002;'),
('n71nocs2avro6ejlgqgaur5uoiflke7t','::1',1548248730,'__ci_last_regenerate|i:1548248729;'),
('1kmcpobdb6eri3e70tcl4akehvt1la3c','::1',1548254271,'__ci_last_regenerate|i:1548254263;id_usuario|s:1:\"1\";nombreUsuario|s:5:\"admin\";contrasenia|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";activo|s:1:\"1\";id_perfil|s:1:\"2\";perfilUsuario|s:7:\"Gerente\";recordatorios|i:1;is_logged_in|b:1;'),
('clop6se9p5esvuup0j46rf7uj1r18hnm','::1',1548346517,'__ci_last_regenerate|i:1548346515;'),
('7el22rugkd261s4sa3pl2cnfgscot12j','::1',1548347180,'__ci_last_regenerate|i:1548347163;id_usuario|s:1:\"1\";nombreUsuario|s:5:\"admin\";contrasenia|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";activo|s:1:\"1\";id_perfil|s:1:\"2\";perfilUsuario|s:7:\"Gerente\";recordatorios|i:1;is_logged_in|b:1;');

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

/*Table structure for table `usu_controladoressistema` */

DROP TABLE IF EXISTS `usu_controladoressistema`;

CREATE TABLE `usu_controladoressistema` (
  `id_controladorSistema` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de controladorSistema',
  `descripcion` varchar(100) NOT NULL COMMENT 'Descripcion de los Controladores',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado del controladorSistema: 1 Activo y 0 no Activo',
  PRIMARY KEY (`id_controladorSistema`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `usu_controladoressistema` */

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

/*Table structure for table `usu_metodossistema` */

DROP TABLE IF EXISTS `usu_metodossistema`;

CREATE TABLE `usu_metodossistema` (
  `id_metodosSistema` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de metodoSistema',
  `descripcion` varchar(100) NOT NULL COMMENT 'Descripcion de los metodos',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado del metodoSistema: 1 Activo y 0 no Activo',
  PRIMARY KEY (`id_metodosSistema`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `usu_metodossistema` */

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

/*Table structure for table `usu_perfiles_controladormetodo` */

DROP TABLE IF EXISTS `usu_perfiles_controladormetodo`;

CREATE TABLE `usu_perfiles_controladormetodo` (
  `id_perfilControladorMetodo` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de perfilControladorMetodo',
  `id_perfil` int(5) NOT NULL COMMENT 'Identificador de perfil (Relacion)',
  `id_controladorMetodo` int(5) NOT NULL COMMENT 'Identificador de metodoSistema (Relacion)',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado del perfilesMetodo: 1 Activo y 0 no Activo',
  PRIMARY KEY (`id_perfilControladorMetodo`),
  KEY `idx_perfil` (`id_perfil`),
  KEY `idx_metodosSistema` (`id_controladorMetodo`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `usu_perfiles_controladormetodo` */

/*Table structure for table `usu_perfiles_elementopantalla` */

DROP TABLE IF EXISTS `usu_perfiles_elementopantalla`;

CREATE TABLE `usu_perfiles_elementopantalla` (
  `id_perfilelementoPantalla` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de perfilelementoPantalla',
  `id_perfil` int(11) NOT NULL COMMENT 'Identificador de perfil (Relacion)',
  `id_elementoPantalla` int(11) NOT NULL COMMENT 'Identificador de elementosPantalla (Relacion)',
  `activo` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'estado del perfilesPermisos: 1 Activo y 0 no Activo',
  PRIMARY KEY (`id_perfilelementoPantalla`),
  KEY `idx_perfil` (`id_perfil`),
  KEY `idx_elementoPantalla` (`id_elementoPantalla`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `usu_perfiles_elementopantalla` */

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

/*Table structure for table `usu_tipoelementopantalla` */

DROP TABLE IF EXISTS `usu_tipoelementopantalla`;

CREATE TABLE `usu_tipoelementopantalla` (
  `id_tipoElemento` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de tipoElemento',
  `descripcion` varchar(150) CHARACTER SET utf8 NOT NULL COMMENT 'Descripcion de los elementos',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado del tipoElementoPantalla: 1 Activo y 0 no Activo',
  PRIMARY KEY (`id_tipoElemento`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `usu_tipoelementopantalla` */

/*Table structure for table `usu_tipomenu` */

DROP TABLE IF EXISTS `usu_tipomenu`;

CREATE TABLE `usu_tipomenu` (
  `id_tipoMenu` tinyint(1) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de tipoMenus',
  `descripcion` varchar(40) NOT NULL COMMENT 'Descripcion de los tipoMenues',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado del tipoMenues: 1 Activo y 0 no Activo',
  PRIMARY KEY (`id_tipoMenu`),
  KEY `idx_activo` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `usu_tipomenu` */

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
(1,'admin','d033e22ae348aeb5660fc2140aec35850c4da997',1);

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

/*Table structure for table `view_categorias` */

DROP TABLE IF EXISTS `view_categorias`;

/*!50001 DROP VIEW IF EXISTS `view_categorias` */;
/*!50001 DROP TABLE IF EXISTS `view_categorias` */;

/*!50001 CREATE TABLE  `view_categorias`(
 `id_tipoProductoServicio` int(11) ,
 `categoria` varchar(200) ,
 `subCategoria` varchar(200) 
)*/;

/*Table structure for table `view_productos` */

DROP TABLE IF EXISTS `view_productos`;

/*!50001 DROP VIEW IF EXISTS `view_productos` */;
/*!50001 DROP TABLE IF EXISTS `view_productos` */;

/*!50001 CREATE TABLE  `view_productos`(
 `id_productoServicio` int(11) ,
 `id_tipocontenedor` int(11) ,
 `descripcion` varchar(100) ,
 `cups` bigint(20) ,
 `preciocosto` double ,
 `alicuota` double ,
 `ganancia` double ,
 `precioventa` double ,
 `categoria` varchar(200) ,
 `subcategoria` varchar(200) 
)*/;

/*View structure for view view_categorias */

/*!50001 DROP TABLE IF EXISTS `view_categorias` */;
/*!50001 DROP VIEW IF EXISTS `view_categorias` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_categorias` AS select `p`.`id_tipoproductoservicio` AS `id_tipoProductoServicio`,`p`.`descripcion` AS `categoria`,'' AS `subCategoria` from `produc_tipoproductoservicio` `p` where (`p`.`id_tipoproductoserviciopadre` = 0) union select `h`.`id_tipoproductoservicio` AS `id_tipoProductoServicio`,`p`.`descripcion` AS `categoria`,`h`.`descripcion` AS `subCategoria` from (`produc_tipoproductoservicio` `p` join `produc_tipoproductoservicio` `h` on((`p`.`id_tipoproductoservicio` = `h`.`id_tipoproductoserviciopadre`))) */;

/*View structure for view view_productos */

/*!50001 DROP TABLE IF EXISTS `view_productos` */;
/*!50001 DROP VIEW IF EXISTS `view_productos` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_productos` AS (select `p`.`id_productoservicio` AS `id_productoServicio`,`p`.`id_tipocontenedor` AS `id_tipocontenedor`,`p`.`descripcion` AS `descripcion`,`p`.`cups` AS `cups`,`p`.`preciocosto` AS `preciocosto`,`p`.`alicuota` AS `alicuota`,`p`.`ganancia` AS `ganancia`,`p`.`precioventa` AS `precioventa`,`cp`.`descripcion` AS `categoria`,`ch`.`descripcion` AS `subcategoria` from ((`produc_productosservicios` `p` join `produc_tipoproductoservicio` `ch` on((`ch`.`id_tipoproductoservicio` = `p`.`id_tipoproductoservicio`))) join `produc_tipoproductoservicio` `cp` on((`cp`.`id_tipoproductoservicio` = `ch`.`id_tipoproductoserviciopadre`)))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
