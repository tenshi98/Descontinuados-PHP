/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50620
Source Host           : localhost:3306
Source Database       : app_seguridad

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2016-04-29 20:48:02
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for alertas_listado
-- ----------------------------
DROP TABLE IF EXISTS `alertas_listado`;
CREATE TABLE `alertas_listado` (
  `idAlerta` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) unsigned NOT NULL,
  `idTipoAlerta` int(11) unsigned NOT NULL,
  `idSubTipoAlerta` int(11) unsigned NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `Longitud` double NOT NULL,
  `Latitud` double NOT NULL,
  PRIMARY KEY (`idAlerta`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of alertas_listado
-- ----------------------------
INSERT INTO `alertas_listado` VALUES ('1', '1', '1', '1', '2015-10-22', '20:23:28', '-77.05217', '-12.103168');
INSERT INTO `alertas_listado` VALUES ('2', '1', '1', '1', '2015-10-22', '20:31:33', '-77.05217', '-12.103168');
INSERT INTO `alertas_listado` VALUES ('3', '1', '1', '1', '2015-10-22', '21:23:46', '-77.05217', '-12.103168');
INSERT INTO `alertas_listado` VALUES ('4', '1', '1', '2', '2015-10-22', '21:23:53', '-77.05217', '-12.103168');
INSERT INTO `alertas_listado` VALUES ('5', '1', '1', '3', '2015-10-22', '21:23:59', '-77.05217', '-12.103168');
INSERT INTO `alertas_listado` VALUES ('6', '1', '1', '4', '2015-10-22', '21:24:04', '-77.05217', '-12.103168');
INSERT INTO `alertas_listado` VALUES ('7', '1', '1', '5', '2015-10-22', '21:24:08', '-77.05217', '-12.103168');
INSERT INTO `alertas_listado` VALUES ('8', '1', '1', '1', '2015-10-22', '21:25:59', '-77.05217', '-12.103168');
INSERT INTO `alertas_listado` VALUES ('9', '1', '1', '2', '2015-10-22', '21:26:11', '-77.05217', '-12.103168');
INSERT INTO `alertas_listado` VALUES ('10', '1', '1', '1', '2015-10-26', '13:47:42', '-77.05217', '-12.103168');
INSERT INTO `alertas_listado` VALUES ('11', '1', '1', '2', '2015-10-26', '13:47:55', '-77.05217', '-12.103168');
INSERT INTO `alertas_listado` VALUES ('12', '1', '1', '3', '2015-10-26', '13:48:02', '-77.05217', '-12.103168');
INSERT INTO `alertas_listado` VALUES ('13', '1', '1', '4', '2015-10-26', '13:48:08', '-77.05217', '-12.103168');
INSERT INTO `alertas_listado` VALUES ('14', '1', '1', '5', '2015-10-26', '13:48:15', '-77.05217', '-12.103168');
INSERT INTO `alertas_listado` VALUES ('15', '1', '1', '1', '2015-10-26', '14:57:12', '-77.05217', '-12.103168');
INSERT INTO `alertas_listado` VALUES ('16', '1', '1', '1', '2015-10-26', '14:57:25', '0', '0');
INSERT INTO `alertas_listado` VALUES ('17', '1', '1', '1', '2015-10-28', '20:52:27', '-77.05217', '-12.103168');
INSERT INTO `alertas_listado` VALUES ('18', '1', '1', '2', '2015-10-28', '20:54:16', '-77.05217', '-12.103168');
INSERT INTO `alertas_listado` VALUES ('19', '1', '1', '1', '2015-10-29', '15:12:34', '-77.05217', '-12.103168');
INSERT INTO `alertas_listado` VALUES ('20', '1', '1', '1', '2015-10-30', '17:57:12', '-77.05217', '-12.103168');
INSERT INTO `alertas_listado` VALUES ('21', '1', '1', '1', '2015-10-30', '17:57:21', '-77.05217', '-12.103168');
INSERT INTO `alertas_listado` VALUES ('22', '1', '1', '1', '2015-10-30', '17:57:29', '-77.05217', '-12.103168');
INSERT INTO `alertas_listado` VALUES ('23', '1', '1', '1', '2015-10-30', '17:57:44', '-77.05217', '-12.103168');
INSERT INTO `alertas_listado` VALUES ('24', '1', '1', '1', '2015-10-30', '17:58:00', '-77.05217', '-12.103168');
INSERT INTO `alertas_listado` VALUES ('25', '1', '1', '1', '2015-10-30', '17:58:40', '-77.05217', '-12.103168');
INSERT INTO `alertas_listado` VALUES ('26', '1', '1', '1', '2015-10-30', '17:58:57', '-77.05217', '-12.103168');
INSERT INTO `alertas_listado` VALUES ('27', '1', '1', '1', '2015-10-30', '17:59:21', '-77.05217', '-12.103168');
INSERT INTO `alertas_listado` VALUES ('28', '1', '1', '1', '2015-10-30', '17:59:47', '-77.05217', '-12.103168');
INSERT INTO `alertas_listado` VALUES ('29', '1', '1', '2', '2015-10-30', '18:00:11', '-77.05217', '-12.103168');
INSERT INTO `alertas_listado` VALUES ('30', '1', '1', '2', '2015-10-30', '18:00:39', '-77.05217', '-12.103168');
INSERT INTO `alertas_listado` VALUES ('31', '1', '1', '2', '2015-10-30', '18:01:55', '-77.05217', '-12.103168');
INSERT INTO `alertas_listado` VALUES ('32', '1', '3', '7', '2015-10-30', '19:57:50', '0', '0');
INSERT INTO `alertas_listado` VALUES ('33', '1', '3', '7', '2015-10-30', '19:58:41', '0', '0');
INSERT INTO `alertas_listado` VALUES ('34', '1', '3', '7', '2015-10-30', '19:58:44', '0', '0');
INSERT INTO `alertas_listado` VALUES ('35', '1', '3', '7', '2015-10-30', '19:58:46', '0', '0');
INSERT INTO `alertas_listado` VALUES ('36', '1', '3', '7', '2015-10-30', '19:58:46', '0', '0');
INSERT INTO `alertas_listado` VALUES ('37', '1', '3', '7', '2015-10-30', '19:58:47', '0', '0');
INSERT INTO `alertas_listado` VALUES ('38', '1', '3', '7', '2015-10-30', '19:58:47', '0', '0');
INSERT INTO `alertas_listado` VALUES ('39', '1', '3', '7', '2015-10-30', '19:58:47', '0', '0');
INSERT INTO `alertas_listado` VALUES ('40', '1', '3', '7', '2015-10-30', '19:58:47', '0', '0');
INSERT INTO `alertas_listado` VALUES ('41', '1', '3', '7', '2015-10-30', '19:58:48', '0', '0');
INSERT INTO `alertas_listado` VALUES ('42', '1', '3', '7', '2015-10-30', '19:58:48', '0', '0');
INSERT INTO `alertas_listado` VALUES ('43', '1', '3', '7', '2015-10-30', '19:58:48', '0', '0');
INSERT INTO `alertas_listado` VALUES ('44', '1', '3', '7', '2015-10-30', '19:58:48', '0', '0');
INSERT INTO `alertas_listado` VALUES ('45', '1', '3', '7', '2015-10-30', '19:58:49', '0', '0');
INSERT INTO `alertas_listado` VALUES ('46', '1', '3', '7', '2015-10-30', '19:58:49', '0', '0');
INSERT INTO `alertas_listado` VALUES ('47', '1', '3', '7', '2015-10-30', '19:58:49', '0', '0');
INSERT INTO `alertas_listado` VALUES ('48', '1', '3', '7', '2015-10-30', '19:58:49', '0', '0');
INSERT INTO `alertas_listado` VALUES ('49', '1', '3', '7', '2015-10-30', '20:03:23', '0', '0');
INSERT INTO `alertas_listado` VALUES ('50', '1', '3', '7', '2015-10-30', '20:08:36', '0', '0');
INSERT INTO `alertas_listado` VALUES ('51', '1', '3', '7', '2015-10-30', '20:11:35', '0', '0');
INSERT INTO `alertas_listado` VALUES ('52', '1', '3', '7', '2015-10-30', '20:14:16', '0', '0');
INSERT INTO `alertas_listado` VALUES ('53', '1', '3', '7', '2015-10-30', '20:14:23', '0', '0');
INSERT INTO `alertas_listado` VALUES ('54', '1', '3', '7', '2015-10-30', '20:14:30', '0', '0');
INSERT INTO `alertas_listado` VALUES ('55', '1', '3', '7', '2015-10-30', '20:14:38', '0', '0');
INSERT INTO `alertas_listado` VALUES ('56', '1', '3', '7', '2015-10-30', '20:18:26', '0', '0');
INSERT INTO `alertas_listado` VALUES ('57', '1', '3', '7', '2015-10-30', '20:18:33', '0', '0');
INSERT INTO `alertas_listado` VALUES ('58', '3', '2', '6', '2015-11-09', '15:22:19', '-77.0391162171535', '-12.1051440832437');
INSERT INTO `alertas_listado` VALUES ('59', '1', '1', '1', '2015-11-11', '17:45:35', '-77.053367', '-12.097397');
INSERT INTO `alertas_listado` VALUES ('60', '1', '2', '6', '2015-11-11', '18:39:04', '-77.053367', '-12.097397');
INSERT INTO `alertas_listado` VALUES ('61', '1', '3', '7', '2015-11-11', '18:52:24', '0', '0');
INSERT INTO `alertas_listado` VALUES ('62', '1', '1', '2', '2015-11-11', '18:52:55', '-77.053367', '-12.097397');
INSERT INTO `alertas_listado` VALUES ('63', '1', '1', '3', '2015-11-11', '18:53:02', '-77.053367', '-12.097397');
INSERT INTO `alertas_listado` VALUES ('64', '1', '1', '1', '2015-11-12', '20:01:20', '-77.053367', '-12.097397');
INSERT INTO `alertas_listado` VALUES ('65', '1', '1', '1', '2015-11-12', '20:08:29', '-77.053367', '-12.097397');
INSERT INTO `alertas_listado` VALUES ('66', '1', '3', '7', '2015-11-12', '20:12:57', '0', '0');
INSERT INTO `alertas_listado` VALUES ('67', '1', '3', '7', '2015-11-12', '20:27:29', '0', '0');
INSERT INTO `alertas_listado` VALUES ('68', '1', '3', '7', '2015-11-12', '20:28:49', '0', '0');
INSERT INTO `alertas_listado` VALUES ('69', '1', '3', '7', '2015-11-12', '20:33:41', '0', '0');
INSERT INTO `alertas_listado` VALUES ('70', '1', '2', '8', '2015-11-13', '16:25:34', '-77.053367', '-12.097397');
INSERT INTO `alertas_listado` VALUES ('71', '1', '2', '8', '2015-11-13', '16:29:06', '-77.053367', '-12.097397');
INSERT INTO `alertas_listado` VALUES ('72', '1', '2', '8', '2015-11-13', '16:30:24', '-77.053367', '-12.097397');
INSERT INTO `alertas_listado` VALUES ('73', '3', '1', '1', '2015-12-22', '18:14:52', '-70.5987814921343', '-33.4169772541836');

-- ----------------------------
-- Table structure for alertas_subtipo
-- ----------------------------
DROP TABLE IF EXISTS `alertas_subtipo`;
CREATE TABLE `alertas_subtipo` (
  `idSubTipoAlerta` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idTipoAlerta` int(11) unsigned NOT NULL,
  `Nombre` varchar(80) NOT NULL,
  `Mensaje` varchar(120) NOT NULL,
  PRIMARY KEY (`idSubTipoAlerta`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of alertas_subtipo
-- ----------------------------
INSERT INTO `alertas_subtipo` VALUES ('1', '1', 'Alarma', 'ha generado una alarma');
INSERT INTO `alertas_subtipo` VALUES ('2', '1', 'SosJoven Ubicacion', 'ha solicitado enviado su ubicacion');
INSERT INTO `alertas_subtipo` VALUES ('3', '1', 'SosJoven Destino', 'ha indicado que llego a su destino');
INSERT INTO `alertas_subtipo` VALUES ('4', '1', 'SosJoven Sin Auto', 'ha indicado que no tiene auto');
INSERT INTO `alertas_subtipo` VALUES ('5', '1', 'SosJoven Llamame', 'ha solicitado que lo llamen');
INSERT INTO `alertas_subtipo` VALUES ('6', '2', 'Bienestar', 'ha indicado que esta bien');
INSERT INTO `alertas_subtipo` VALUES ('7', '3', 'Pedir Mapa', 'ha solicitado tu ubicacion');
INSERT INTO `alertas_subtipo` VALUES ('8', '2', 'Envio Mapa', 'ha enviado su ubicacion');

-- ----------------------------
-- Table structure for alertas_tipos
-- ----------------------------
DROP TABLE IF EXISTS `alertas_tipos`;
CREATE TABLE `alertas_tipos` (
  `idTipoAlerta` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(80) NOT NULL,
  PRIMARY KEY (`idTipoAlerta`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of alertas_tipos
-- ----------------------------
INSERT INTO `alertas_tipos` VALUES ('1', 'Alertas');
INSERT INTO `alertas_tipos` VALUES ('2', 'Notificaciones');
INSERT INTO `alertas_tipos` VALUES ('3', 'Solicitudes');
INSERT INTO `alertas_tipos` VALUES ('4', 'Mensajes');

-- ----------------------------
-- Table structure for clientes_contactos
-- ----------------------------
DROP TABLE IF EXISTS `clientes_contactos`;
CREATE TABLE `clientes_contactos` (
  `idContacto` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) unsigned NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  `Fono` varchar(30) NOT NULL,
  `Estado` varchar(25) NOT NULL,
  `fcreacion` datetime NOT NULL,
  `GSM` varchar(500) NOT NULL,
  `idClienteMain` int(11) unsigned NOT NULL,
  `TipoContacto` varchar(30) NOT NULL,
  PRIMARY KEY (`idContacto`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';

-- ----------------------------
-- Records of clientes_contactos
-- ----------------------------
INSERT INTO `clientes_contactos` VALUES ('20', '1', 'Curimil', '85313156', 'No Registrado', '2015-11-11 17:44:35', '', '0', 'Familiar');
INSERT INTO `clientes_contactos` VALUES ('15', '3', 'Marcelo Lopez1', '998215180', 'No Registrado', '2015-11-07 19:44:30', '', '0', 'Familiar');
INSERT INTO `clientes_contactos` VALUES ('19', '1', 'Carlos Valenzuela', '93462365', 'Registrado', '2015-11-11 17:44:20', 'ebw4S-klcf4:APA91bEkdF-CbhKIWTX6FO-MvYfr8Fld6W71eZyRGbU1b0nat5KSoAJeTIHNNILpqshZ4NyaVxh6NvxRK0bE2WoHas3eDP792ZVzIWSKsQ5zLpK0oesUa0KNvFx7u0vS8CiAyTJBXYvA', '3', 'Familiar');
INSERT INTO `clientes_contactos` VALUES ('17', '3', 'Carlos Melendes1', '51990002027', 'No Registrado', '2015-11-09 15:23:52', '', '0', 'Familiar');
INSERT INTO `clientes_contactos` VALUES ('21', '3', 'Victor Reyes Nuevo', '56955391914', 'No Registrado', '2015-11-15 22:22:50', '', '0', '');
INSERT INTO `clientes_contactos` VALUES ('22', '3', 'Raul Ernst', '593995970639', 'No Registrado', '2015-11-18 22:32:32', '', '0', '');
INSERT INTO `clientes_contactos` VALUES ('23', '3', 'Luis Cartagena Real', '56972112500', 'No Registrado', '2015-11-23 21:18:50', '', '0', '');
INSERT INTO `clientes_contactos` VALUES ('24', '3', 'Catalina Neut', '56962180669', 'No Registrado', '2015-11-27 19:28:16', '', '0', '');
INSERT INTO `clientes_contactos` VALUES ('25', '3', 'Marcelo Lopez1', '56998215180', 'No Registrado', '2015-12-07 16:11:45', '', '0', 'Seleccionar tipo de contacto');

-- ----------------------------
-- Table structure for clientes_estado
-- ----------------------------
DROP TABLE IF EXISTS `clientes_estado`;
CREATE TABLE `clientes_estado` (
  `idEstado` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Fija';

-- ----------------------------
-- Records of clientes_estado
-- ----------------------------
INSERT INTO `clientes_estado` VALUES ('1', 'Activo');
INSERT INTO `clientes_estado` VALUES ('2', 'Inactivo');

-- ----------------------------
-- Table structure for clientes_listado
-- ----------------------------
DROP TABLE IF EXISTS `clientes_listado`;
CREATE TABLE `clientes_listado` (
  `idCliente` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idSistema` int(11) unsigned NOT NULL,
  `idEstado` int(11) unsigned NOT NULL,
  `idTipo` int(11) unsigned NOT NULL,
  `email` varchar(120) NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  `Rut` varchar(13) NOT NULL,
  `fNacimiento` date NOT NULL,
  `Direccion` varchar(60) NOT NULL,
  `Fono1` varchar(15) NOT NULL,
  `Fono2` varchar(15) NOT NULL,
  `Departamento` varchar(180) NOT NULL,
  `Provincia` varchar(180) NOT NULL,
  `Distrito` varchar(180) NOT NULL,
  `unique_id` varchar(23) NOT NULL,
  `password` varchar(80) NOT NULL,
  `fcreacion` datetime NOT NULL,
  `factualizacion` datetime NOT NULL,
  `IMEI` varchar(120) NOT NULL,
  `GSM` varchar(500) NOT NULL,
  `Latitud` double NOT NULL,
  `Longitud` double NOT NULL,
  `dispositivo` varchar(120) NOT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';

-- ----------------------------
-- Records of clientes_listado
-- ----------------------------
INSERT INTO `clientes_listado` VALUES ('1', '1', '1', '2', 'tenshi98@gmail.com', 'Victor', '16029464-7', '0000-00-00', 'ghgg3', '1', '', 'Ancash', 'Huaraz', 'Huaraz', '560d46f8d975c4.04940934', '81dc9bdb52d04dc20036dbd8313ed055', '2015-10-01 14:45:12', '2016-03-15 00:00:00', '', 'dDDeQ1gOaD4:APA91bFEWSI_BPKlRuUhdqO38hHkAI9UcpL1OfzimAz2Xcb5p0rwtwvNRKLphpIotLOK4UNMJcAaFE-knaVzz5U-FSHexHYTS2GQ1lM7UB7ktTfSbgktPncsIUgEA0Ggh2-N78f_vEIJ', '-12.0805608632947', '-77.0112420835567', 'android');
INSERT INTO `clientes_listado` VALUES ('2', '1', '1', '2', 'tenshi98@hotmail.com', 'Segundo', '16029464—7', '0000-00-00', 'ahhh', '2133', '', '0', '0', '', '5617f77bcfd885.44247165', '81dc9bdb52d04dc20036dbd8313ed055', '2015-10-09 17:20:59', '2015-10-09 17:20:59', '', '', '-12.1031', '-77.052', 'android');
INSERT INTO `clientes_listado` VALUES ('3', '1', '1', '2', 'carlos.valenzuela.silva@gmail.com', 'Carlos Valenzuela', '8247656-3', '1958-07-04', 'vive y 308', '93462365', '229556120', '0', '0', '', '561ec44eef3231.06040047', 'dcd83eaa9662540adbce44e5348e6eb8', '2015-10-14 21:08:30', '2015-12-22 00:00:00', '', 'fjfsNxgqXhY:APA91bH4v09EkSwIC6hyoHiGlaLhfamiy8UEMHC3CTKUXjwMNoF9uVL82WcWU67vn3ACWanw0xgRDo4SE3UhNigRJpUBWLMLvlh5kuICod_wqTjnPXi2fBnPJbSQN0SMMiXhPEU1wPc9', '-33.4169772541836', '-70.5987814921343', 'android');
INSERT INTO `clientes_listado` VALUES ('4', '1', '1', '2', 'cmelendez.1805@gmail.com', 'carlos melendez', '10123456-4', '1975-05-18', 'camino real 1121', '990002027', '4220351', '0', '0', '', '561fe3fa33c8a1.26440650', 'a31f9a75f223e9a1c912e5c4e0c5cf14', '2015-10-15 17:35:54', '2015-10-15 17:35:54', '', 'fdt4mWBKnYM:APA91bFlgW6jy-OqxVA1aUYz_ZO6rxhei-niYuKL_Z49tJPZIuxieUfAfzGbGgaWrmMS_EBT6gmX-G81owVC5sOK63GNlAOQXpJc2Fsi0ZYkxilEJSYW21v2QoGoShv1225c5-14lzbQ', '-12.1031', '-77.052', 'android');
INSERT INTO `clientes_listado` VALUES ('5', '1', '1', '2', 'mlopez@gmail.com', 'Marcelo', '', '0000-00-00', '', '', '', '0', '0', '', '56265b5cee2de4.49163201', '81dc9bdb52d04dc20036dbd8313ed055', '2015-10-20 15:18:52', '2015-10-20 15:18:52', '', '', '-12.1031', '-77.052', '');
INSERT INTO `clientes_listado` VALUES ('6', '1', '1', '2', 'amandapazp@gmail.com', 'Amanda Paz', '', '0000-00-00', '', '', '', '0', '0', '', '5637a3ce197ba2.25068513', '8a4ce0d349c3c06caa0c8d8b2f3d4aa1', '2015-11-02 17:56:30', '2015-11-02 17:56:30', '', '', '0', '0', 'android');

-- ----------------------------
-- Table structure for clientes_notificaciones
-- ----------------------------
DROP TABLE IF EXISTS `clientes_notificaciones`;
CREATE TABLE `clientes_notificaciones` (
  `idNotificacion` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idAlerta` bigint(20) unsigned NOT NULL,
  `idCliente` int(11) unsigned NOT NULL,
  `mensaje` varchar(255) NOT NULL,
  `idEstado` int(11) unsigned NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `idTipoAlerta` int(11) unsigned NOT NULL,
  `idSubTipoAlerta` int(11) unsigned NOT NULL,
  `Fono` varchar(15) NOT NULL,
  `Texto` text NOT NULL,
  `Web` varchar(150) NOT NULL,
  PRIMARY KEY (`idNotificacion`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clientes_notificaciones
-- ----------------------------
INSERT INTO `clientes_notificaciones` VALUES ('2', '1', '1', 'JOAQUIN ALBERTO VASQUEZ ha informado un accidente cerca', '2', '2015-01-12', '00:00:00', '1', '2', '123', '', 'www.google.cl');
INSERT INTO `clientes_notificaciones` VALUES ('3', '2', '1', 'JOAQUIN ALBERTO VASQUEZ ha informado un accidente cerca', '2', '2015-01-12', '00:00:00', '1', '3', '6566', 'JOAQUIN ALBERTO VASQUEZ ha informado un accidente cerca', '');
INSERT INTO `clientes_notificaciones` VALUES ('4', '3', '1', 'JOAQUIN ALBERTO VASQUEZ ha informado del robo de su vehiculo', '2', '2015-01-12', '00:00:00', '1', '4', '88825', 'JOAQUIN ALBERTO VASQUEZ ha informado del robo de su vehiculo', '');
INSERT INTO `clientes_notificaciones` VALUES ('5', '4', '1', 'Ha indicado que esta bien', '2', '0000-00-00', '00:00:00', '2', '6', '', 'Ha indicado que esta bien', 'www.google.cl');
INSERT INTO `clientes_notificaciones` VALUES ('6', '31', '2', 'Victor ', '1', '2015-10-30', '18:01:55', '1', '2', '', 'Victor ', '');
INSERT INTO `clientes_notificaciones` VALUES ('7', '31', '0', 'Victor ', '1', '2015-10-30', '18:01:55', '1', '2', '', 'Victor ', '');
INSERT INTO `clientes_notificaciones` VALUES ('8', '31', '0', 'Victor ', '1', '2015-10-30', '18:01:55', '1', '2', '', 'Victor ', '');
INSERT INTO `clientes_notificaciones` VALUES ('9', '32', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '19:57:50', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('10', '33', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '19:58:41', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('11', '34', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '19:58:44', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('12', '35', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '19:58:46', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('13', '36', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '19:58:46', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('14', '37', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '19:58:47', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('15', '38', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '19:58:47', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('16', '39', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '19:58:47', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('17', '40', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '19:58:47', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('18', '41', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '19:58:48', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('19', '42', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '19:58:48', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('20', '43', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '19:58:48', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('21', '44', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '19:58:48', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('22', '45', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '19:58:49', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('23', '46', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '19:58:49', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('24', '47', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '19:58:49', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('25', '48', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '19:58:49', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('26', '49', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '20:03:23', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('27', '50', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '20:08:36', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('28', '51', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '20:11:37', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('29', '52', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '20:14:17', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('30', '53', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '20:14:25', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('31', '54', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '20:14:31', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('32', '55', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '20:14:39', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('33', '56', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '20:18:27', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('34', '57', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '20:18:35', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('35', '59', '1', 'Victor ha generado una alarma', '2', '2015-11-11', '17:45:35', '1', '1', '', 'Victor ha generado una alarma', '');
INSERT INTO `clientes_notificaciones` VALUES ('36', '60', '1', 'Victor ha indicado que esta bien', '2', '2015-11-11', '18:39:04', '2', '6', '', 'Victor ha indicado que esta bien', '');
INSERT INTO `clientes_notificaciones` VALUES ('37', '61', '1', 'Victorte ha solicitado tu ubicacion', '2', '2015-11-11', '18:52:25', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('38', '62', '1', 'Victor ha solicitado tu ubicacion', '2', '2015-11-11', '18:52:55', '1', '2', '', 'Victor ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('39', '63', '1', 'Victor ha indicado que llego a su destino', '2', '2015-11-11', '18:53:02', '1', '3', '', 'Victor ha indicado que llego a su destino', '');
INSERT INTO `clientes_notificaciones` VALUES ('40', '64', '1', 'Victor ha generado una alarma', '2', '2015-11-12', '20:01:20', '1', '1', '', 'Victor ha generado una alarma', '');
INSERT INTO `clientes_notificaciones` VALUES ('41', '65', '1', 'Victor ha generado una alarma', '2', '2015-11-12', '20:08:29', '1', '1', '1', 'Victor ha generado una alarma', '');
INSERT INTO `clientes_notificaciones` VALUES ('42', '66', '1', 'Victorte ha solicitado tu ubicacion', '2', '2015-11-12', '20:12:57', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('46', '70', '1', 'Victor ha enviado su ubicacion', '2', '2015-11-13', '16:25:34', '2', '8', '1', 'Victor ha enviado su ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('45', '69', '1', 'Victorte ha solicitado tu ubicacion', '2', '2015-11-12', '20:33:41', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('47', '71', '1', 'Victor ha enviado su ubicacion', '2', '2015-11-13', '16:29:06', '2', '8', '1', 'Victor ha enviado su ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('48', '72', '1', 'Victor ha enviado su ubicacion', '2', '2015-11-13', '16:30:24', '2', '8', '1', 'Victor ha enviado su ubicacion', '');

-- ----------------------------
-- Table structure for clientes_notificaciones_estado
-- ----------------------------
DROP TABLE IF EXISTS `clientes_notificaciones_estado`;
CREATE TABLE `clientes_notificaciones_estado` (
  `idEstado` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clientes_notificaciones_estado
-- ----------------------------
INSERT INTO `clientes_notificaciones_estado` VALUES ('1', 'No Leida');
INSERT INTO `clientes_notificaciones_estado` VALUES ('2', 'Leida');

-- ----------------------------
-- Table structure for clientes_observaciones
-- ----------------------------
DROP TABLE IF EXISTS `clientes_observaciones`;
CREATE TABLE `clientes_observaciones` (
  `idObservacion` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) unsigned NOT NULL,
  `idUsuario` int(11) unsigned NOT NULL,
  `Fecha` date NOT NULL,
  `Observacion` text NOT NULL,
  PRIMARY KEY (`idObservacion`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';

-- ----------------------------
-- Records of clientes_observaciones
-- ----------------------------
INSERT INTO `clientes_observaciones` VALUES ('1', '1', '1', '2015-09-18', 'asd');

-- ----------------------------
-- Table structure for clientes_tipos
-- ----------------------------
DROP TABLE IF EXISTS `clientes_tipos`;
CREATE TABLE `clientes_tipos` (
  `idTipo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idTipo`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Fija';

-- ----------------------------
-- Records of clientes_tipos
-- ----------------------------
INSERT INTO `clientes_tipos` VALUES ('1', 'Empresa');
INSERT INTO `clientes_tipos` VALUES ('2', 'Particular(Persona)');

-- ----------------------------
-- Table structure for core_datos
-- ----------------------------
DROP TABLE IF EXISTS `core_datos`;
CREATE TABLE `core_datos` (
  `id_Datos` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email_principal` varchar(60) NOT NULL,
  `Nombre` varchar(60) NOT NULL,
  `Rut` varchar(13) NOT NULL,
  `Direccion` varchar(60) NOT NULL,
  `Fono` varchar(15) NOT NULL,
  `Ciudad` varchar(60) NOT NULL,
  `Comuna` varchar(60) NOT NULL,
  `UrlApp` varchar(200) NOT NULL,
  `tareasServer` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id_Datos`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of core_datos
-- ----------------------------
INSERT INTO `core_datos` VALUES ('1', 'asd@bla21.cl', 'Corporacion Test', '16029464-7', 'Los Lirios 0936', '85125171', 'Santiago', 'Puente Alto', 'http://190.98.210.36/sostaxi/app/', '2');

-- ----------------------------
-- Table structure for core_datos_opciones
-- ----------------------------
DROP TABLE IF EXISTS `core_datos_opciones`;
CREATE TABLE `core_datos_opciones` (
  `idOpciones` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(80) NOT NULL,
  PRIMARY KEY (`idOpciones`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Fija';

-- ----------------------------
-- Records of core_datos_opciones
-- ----------------------------
INSERT INTO `core_datos_opciones` VALUES ('1', 'Si');
INSERT INTO `core_datos_opciones` VALUES ('2', 'No');

-- ----------------------------
-- Table structure for core_permisos
-- ----------------------------
DROP TABLE IF EXISTS `core_permisos`;
CREATE TABLE `core_permisos` (
  `idAdmpm` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_pmcat` int(11) unsigned NOT NULL,
  `Direccionweb` varchar(50) NOT NULL,
  `Direccionbase` varchar(50) NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  `visualizacion` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idAdmpm`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COMMENT='Administrador';

-- ----------------------------
-- Records of core_permisos
-- ----------------------------
INSERT INTO `core_permisos` VALUES ('1', '2', 'admin_clientes.php?pagina=1', 'admin_clientes.php', 'Clientes - Listado', '9998');
INSERT INTO `core_permisos` VALUES ('2', '2', 'admin_clientes_activation.php?pagina=1', 'admin_clientes_activation.php', 'Clientes - Estado', '9998');
INSERT INTO `core_permisos` VALUES ('3', '3', 'admin_datos.php', 'admin_datos.php', 'Datos de la Empresa', '9998');
INSERT INTO `core_permisos` VALUES ('4', '1', 'admin_usr.php?pagina=1', 'admin_usr.php', 'Usuarios - Listado', '9998');
INSERT INTO `core_permisos` VALUES ('5', '1', 'admin_usr_activation.php?pagina=1', 'admin_usr_activation.php', 'Usuarios - Estado', '9998');
INSERT INTO `core_permisos` VALUES ('6', '1', 'admin_usr_password.php?pagina=1', 'admin_usr_password.php', 'Usuarios - Contraseña', '9998');
INSERT INTO `core_permisos` VALUES ('7', '1', 'admin_usr_permisos.php?pagina=1', 'admin_usr_permisos.php', 'Usuarios - Permisos', '9998');
INSERT INTO `core_permisos` VALUES ('8', '1', 'admin_usr_type.php?pagina=1', 'admin_usr_type.php', 'Usuarios - Cambiar Tipo', '9998');
INSERT INTO `core_permisos` VALUES ('9', '3', 'mnt_ubicacion_comunas.php?pagina=1', 'mnt_ubicacion_comunas.php', 'Ubicacion - Comunas', '9998');
INSERT INTO `core_permisos` VALUES ('10', '3', 'mnt_ubicacion_region.php?pagina=1', 'mnt_ubicacion_region.php', 'Ubicacion - Region', '9998');
INSERT INTO `core_permisos` VALUES ('11', '4', 'seguridad_zonas.php', 'seguridad_zonas.php', 'Zonas - Listado', '9998');
INSERT INTO `core_permisos` VALUES ('12', '5', 'alertas_listado.php', 'alertas_listado.php', 'Alertas', '9998');

-- ----------------------------
-- Table structure for core_permisos_cat
-- ----------------------------
DROP TABLE IF EXISTS `core_permisos_cat`;
CREATE TABLE `core_permisos_cat` (
  `id_pmcat` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(60) NOT NULL,
  `idFont` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id_pmcat`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='Administrador';

-- ----------------------------
-- Records of core_permisos_cat
-- ----------------------------
INSERT INTO `core_permisos_cat` VALUES ('1', 'Usuarios', '108');
INSERT INTO `core_permisos_cat` VALUES ('2', 'Clientes', '131');
INSERT INTO `core_permisos_cat` VALUES ('3', 'Mantenimiento', '128');
INSERT INTO `core_permisos_cat` VALUES ('4', 'Seguridad', '99');
INSERT INTO `core_permisos_cat` VALUES ('5', 'Alertas', '98');

-- ----------------------------
-- Table structure for core_sistemas
-- ----------------------------
DROP TABLE IF EXISTS `core_sistemas`;
CREATE TABLE `core_sistemas` (
  `idSistema` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  `imgLogo` varchar(250) NOT NULL,
  `email_principal` varchar(60) NOT NULL,
  `Rut` varchar(13) NOT NULL,
  `Direccion` varchar(60) NOT NULL,
  `Fono` varchar(15) NOT NULL,
  `Ciudad` varchar(60) NOT NULL,
  `Comuna` varchar(60) NOT NULL,
  `idTheme` int(11) unsigned NOT NULL,
  `Fax` varchar(15) NOT NULL,
  `Web` varchar(120) NOT NULL,
  `Rubro` varchar(120) NOT NULL,
  `Contacto` varchar(120) NOT NULL,
  `NombreContrato` varchar(120) NOT NULL,
  `NContrato` varchar(30) NOT NULL,
  `FContrato` date NOT NULL,
  `DContrato` int(11) unsigned NOT NULL,
  `Bodega_OT` int(11) unsigned NOT NULL,
  `idRubro` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idSistema`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='Administrador';

-- ----------------------------
-- Records of core_sistemas
-- ----------------------------
INSERT INTO `core_sistemas` VALUES ('1', 'Seguridad', '', '', '', '', '', '', '', '1', '', '', '', '', '', '', '0000-00-00', '0', '0', '0');
INSERT INTO `core_sistemas` VALUES ('2', 'asd', '', '', '', '', '', '', '', '1', '', '', '', '', '', '', '0000-00-00', '0', '0', '0');
INSERT INTO `core_sistemas` VALUES ('3', 'qwe', '', '', '', '', '', '', '', '1', '', '', '', '', '', '', '2013-10-01', '0', '0', '0');

-- ----------------------------
-- Table structure for core_sistemas_rubro
-- ----------------------------
DROP TABLE IF EXISTS `core_sistemas_rubro`;
CREATE TABLE `core_sistemas_rubro` (
  `idRubro` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idRubro`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='Administrador';

-- ----------------------------
-- Records of core_sistemas_rubro
-- ----------------------------
INSERT INTO `core_sistemas_rubro` VALUES ('1', 'Todos');
INSERT INTO `core_sistemas_rubro` VALUES ('2', 'Lubricacion');
INSERT INTO `core_sistemas_rubro` VALUES ('3', 'Agua');
INSERT INTO `core_sistemas_rubro` VALUES ('4', 'Servicios');
INSERT INTO `core_sistemas_rubro` VALUES ('5', 'Otro2');

-- ----------------------------
-- Table structure for core_theme_colors
-- ----------------------------
DROP TABLE IF EXISTS `core_theme_colors`;
CREATE TABLE `core_theme_colors` (
  `idTheme` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idTheme`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='Fija';

-- ----------------------------
-- Records of core_theme_colors
-- ----------------------------
INSERT INTO `core_theme_colors` VALUES ('1', 'Por defecto');
INSERT INTO `core_theme_colors` VALUES ('2', 'Silver');
INSERT INTO `core_theme_colors` VALUES ('3', 'Silver - Blue');
INSERT INTO `core_theme_colors` VALUES ('4', 'Silver - Red');
INSERT INTO `core_theme_colors` VALUES ('5', 'Silver - Green');
INSERT INTO `core_theme_colors` VALUES ('6', 'Silver - Black');
INSERT INTO `core_theme_colors` VALUES ('7', 'Silver - Yelow');
INSERT INTO `core_theme_colors` VALUES ('8', 'Silver - Clear');
INSERT INTO `core_theme_colors` VALUES ('9', 'Silver - Clear Blue');
INSERT INTO `core_theme_colors` VALUES ('10', 'Silver - Clear Red');
INSERT INTO `core_theme_colors` VALUES ('11', 'Silver - Clear Green');
INSERT INTO `core_theme_colors` VALUES ('12', 'Silver - Clear Black');
INSERT INTO `core_theme_colors` VALUES ('13', 'Silver - Clear Yelow');
INSERT INTO `core_theme_colors` VALUES ('14', '');
INSERT INTO `core_theme_colors` VALUES ('15', '');

-- ----------------------------
-- Table structure for eventos_listado
-- ----------------------------
DROP TABLE IF EXISTS `eventos_listado`;
CREATE TABLE `eventos_listado` (
  `idEvento` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) unsigned NOT NULL,
  `idTipoEvento` int(11) unsigned NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `Latitud` double NOT NULL,
  `Longitud` double NOT NULL,
  PRIMARY KEY (`idEvento`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of eventos_listado
-- ----------------------------
INSERT INTO `eventos_listado` VALUES ('1', '6', '1', '2015-11-17', '20:20:41', '-12.1011402664421', '-77.054939456284');
INSERT INTO `eventos_listado` VALUES ('2', '1', '1', '2015-11-17', '15:45:51', '-12.1008678429157', '-77.0536536723375');
INSERT INTO `eventos_listado` VALUES ('3', '3', '1', '2015-11-05', '16:18:04', '-33.398593217952', '-70.5779186636209');
INSERT INTO `eventos_listado` VALUES ('4', '1', '1', '2015-11-17', '20:30:54', '-12.0969581577234', '-77.0520064607263');
INSERT INTO `eventos_listado` VALUES ('5', '1', '2', '2015-11-17', '20:31:46', '-12.0974974393508', '-77.0516899600625');
INSERT INTO `eventos_listado` VALUES ('6', '3', '2', '2015-11-07', '00:53:18', '-33.3340849633797', '-70.5057729408145');
INSERT INTO `eventos_listado` VALUES ('7', '3', '1', '2015-11-07', '00:53:37', '-33.3340233376838', '-70.5058389902115');
INSERT INTO `eventos_listado` VALUES ('8', '3', '3', '2015-11-07', '01:13:24', '-33.3344020549076', '-70.5059912055731');
INSERT INTO `eventos_listado` VALUES ('9', '3', '1', '2015-11-07', '04:04:16', '-33.3342563946318', '-70.5059100687504');
INSERT INTO `eventos_listado` VALUES ('10', '3', '2', '2015-11-07', '04:04:29', '-33.3344692826451', '-70.5058460310102');
INSERT INTO `eventos_listado` VALUES ('11', '3', '1', '2015-11-07', '04:04:41', '-33.3337661899913', '-70.5053575336933');
INSERT INTO `eventos_listado` VALUES ('12', '3', '1', '2015-11-07', '15:08:24', '-33.4450387074618', '-70.6343530118465');
INSERT INTO `eventos_listado` VALUES ('13', '3', '1', '2015-11-07', '17:12:44', '-33.3338558276173', '-70.5059576779604');
INSERT INTO `eventos_listado` VALUES ('14', '3', '1', '2015-11-07', '17:58:09', '-33.3376025978783', '-70.5046055093408');
INSERT INTO `eventos_listado` VALUES ('15', '3', '1', '2015-11-07', '19:35:42', '-33.3345709644994', '-70.5056867748499');
INSERT INTO `eventos_listado` VALUES ('16', '1', '1', '2015-11-18', '15:04:11', '-12.0976652884865', '-77.0511974394321');
INSERT INTO `eventos_listado` VALUES ('17', '3', '1', '2015-11-18', '15:19:38', '-12.1079648604876', '-77.0364359021187');
INSERT INTO `eventos_listado` VALUES ('18', '3', '1', '2015-11-18', '17:37:53', '-12.0766767730599', '-77.0328581705689');
INSERT INTO `eventos_listado` VALUES ('19', '3', '1', '2015-11-18', '18:29:45', '-12.0947066041977', '-77.0375325903296');
INSERT INTO `eventos_listado` VALUES ('20', '1', '1', '2015-11-18', '18:05:27', '-12.0990280753205', '-77.0543151721358');
INSERT INTO `eventos_listado` VALUES ('21', '3', '2', '2015-11-18', '17:33:35', '-12.0914610292073', '-77.0357472449541');
INSERT INTO `eventos_listado` VALUES ('22', '3', '1', '2015-11-18', '21:09:40', '-12.0968096501905', '-77.0363701879978');
INSERT INTO `eventos_listado` VALUES ('23', '3', '1', '2015-11-18', '22:20:18', '-12.1132800422136', '-77.0414787903428');
INSERT INTO `eventos_listado` VALUES ('24', '3', '1', '2015-11-18', '20:44:37', '-12.1165128954899', '-77.0429114252329');
INSERT INTO `eventos_listado` VALUES ('25', '1', '2', '2015-11-18', '18:35:34', '-12.0988497365196', '-77.0538008585572');
INSERT INTO `eventos_listado` VALUES ('26', '3', '4', '2015-11-18', '22:30:24', '-77.0332377031446', '-12.0760918773919');
INSERT INTO `eventos_listado` VALUES ('27', '3', '1', '2015-11-20', '17:38:56', '-77.0331696420908', '-12.0767764412526');
INSERT INTO `eventos_listado` VALUES ('28', '3', '1', '2015-11-21', '16:36:15', '-77.0516698434949', '-12.085346783486');
INSERT INTO `eventos_listado` VALUES ('29', '3', '1', '2015-11-23', '21:16:45', '-70.5771076306701', '-33.400978290572');
INSERT INTO `eventos_listado` VALUES ('30', '4', '4', '2015-11-26', '05:29:57', '-76.996503174305', '-12.1351208725269');
INSERT INTO `eventos_listado` VALUES ('31', '3', '1', '2015-11-27', '19:25:01', '-70.7529512420297', '-33.5113688903664');
INSERT INTO `eventos_listado` VALUES ('32', '3', '1', '2015-12-07', '15:07:09', '-12.0468625168876', '-77.0311355218291');
INSERT INTO `eventos_listado` VALUES ('33', '3', '1', '2015-12-07', '16:07:44', '-33.3929080783903', '-70.50447139889');
INSERT INTO `eventos_listado` VALUES ('34', '3', '2', '2015-12-07', '18:35:09', '-33.4022912981505', '-70.5765648186207');
INSERT INTO `eventos_listado` VALUES ('35', '3', '1', '2015-12-09', '22:07:03', '-33.402305013111', '-70.5763160437346');
INSERT INTO `eventos_listado` VALUES ('36', '3', '1', '2015-12-14', '15:19:29', '-12.2299217792845', '-76.9697300344706');
INSERT INTO `eventos_listado` VALUES ('37', '3', '1', '2015-12-17', '15:13:17', '-12.0987045083273', '-77.0365730300546');
INSERT INTO `eventos_listado` VALUES ('38', '3', '2', '2015-12-18', '14:12:18', '-12.1202846174186', '-77.0270511880517');
INSERT INTO `eventos_listado` VALUES ('39', '3', '4', '2015-12-22', '16:10:53', '-33.4021289576361', '-70.5762919038534');
INSERT INTO `eventos_listado` VALUES ('40', '3', '2', '2015-12-22', '18:13:25', '-33.4181667348986', '-70.5971034988761');
INSERT INTO `eventos_listado` VALUES ('41', '4', '6', '2015-12-30', '19:13:39', '-77.0402218401432', '-11.827844915829');
INSERT INTO `eventos_listado` VALUES ('42', '3', '1', '2016-01-07', '14:00:10', '-33.4462111711477', '-70.6480708345771');
INSERT INTO `eventos_listado` VALUES ('43', '3', '1', '2016-01-11', '22:14:53', '-12.1293832755158', '-76.9869907200336');
INSERT INTO `eventos_listado` VALUES ('44', '3', '2', '2016-01-20', '14:07:33', '-33.446177600468', '-70.6483574956656');
INSERT INTO `eventos_listado` VALUES ('45', '3', '2', '2016-02-04', '12:00:35', '-33.4423946611586', '-70.6524740159512');
INSERT INTO `eventos_listado` VALUES ('46', '3', '1', '2016-02-04', '16:50:41', '-33.4424735556757', '-70.6579108536243');
INSERT INTO `eventos_listado` VALUES ('47', '3', '3', '2016-02-12', '14:39:05', '-33.4418569455529', '-70.6520291045308');
INSERT INTO `eventos_listado` VALUES ('48', '3', '1', '2016-02-17', '19:56:22', '-33.3993444907009', '-70.57578060776');
INSERT INTO `eventos_listado` VALUES ('49', '3', '1', '2016-02-23', '13:42:58', '-33.4021656242271', '-70.5763408541679');
INSERT INTO `eventos_listado` VALUES ('50', '4', '3', '2016-02-24', '22:57:52', '-77.0683367550373', '-12.0982786581619');
INSERT INTO `eventos_listado` VALUES ('51', '3', '2', '2016-02-26', '14:56:53', '-33.3859040126518', '-70.5356668308377');
INSERT INTO `eventos_listado` VALUES ('52', '3', '3', '2016-03-06', '22:16:22', '-12.089427443312', '-76.923787817359');
INSERT INTO `eventos_listado` VALUES ('53', '3', '1', '2016-03-08', '20:01:22', '-12.077820987909', '-77.0318851992488');
INSERT INTO `eventos_listado` VALUES ('54', '3', '1', '2016-03-09', '17:18:29', '-12.1127089947047', '-77.0419076085091');
INSERT INTO `eventos_listado` VALUES ('55', '3', '3', '2016-03-10', '20:36:27', '-2.18328980883266', '-79.8819082975388');
INSERT INTO `eventos_listado` VALUES ('56', '3', '1', '2016-03-14', '15:26:45', '-12.0982986557599', '-77.0458165928721');
INSERT INTO `eventos_listado` VALUES ('57', '3', '1', '2016-03-15', '14:54:47', '-12.0809854213946', '-77.0123791694641');

-- ----------------------------
-- Table structure for eventos_tipos
-- ----------------------------
DROP TABLE IF EXISTS `eventos_tipos`;
CREATE TABLE `eventos_tipos` (
  `idTipoEvento` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(80) NOT NULL,
  PRIMARY KEY (`idTipoEvento`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of eventos_tipos
-- ----------------------------
INSERT INTO `eventos_tipos` VALUES ('1', 'Robo');
INSERT INTO `eventos_tipos` VALUES ('2', 'Microtrafico');
INSERT INTO `eventos_tipos` VALUES ('3', 'Asalto');
INSERT INTO `eventos_tipos` VALUES ('4', 'Homicidio');
INSERT INTO `eventos_tipos` VALUES ('5', 'Derrumbe');
INSERT INTO `eventos_tipos` VALUES ('6', 'Pandillas');

-- ----------------------------
-- Table structure for font_awesome
-- ----------------------------
DROP TABLE IF EXISTS `font_awesome`;
CREATE TABLE `font_awesome` (
  `idFont` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  `Codigo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idFont`)
) ENGINE=MyISAM AUTO_INCREMENT=134 DEFAULT CHARSET=latin1 COMMENT='Fija';

-- ----------------------------
-- Records of font_awesome
-- ----------------------------
INSERT INTO `font_awesome` VALUES ('1', 'Manos - piedra', 'fa fa-hand-rock-o');
INSERT INTO `font_awesome` VALUES ('2', 'Manos - lizard', 'fa fa-hand-lizard-o');
INSERT INTO `font_awesome` VALUES ('3', 'Manos - apuntando abajo', 'fa fa-hand-o-down');
INSERT INTO `font_awesome` VALUES ('4', 'Manos - apuntando izquierda', 'fa fa-hand-o-left');
INSERT INTO `font_awesome` VALUES ('5', 'Manos - apuntando derecha', 'fa fa-hand-o-right');
INSERT INTO `font_awesome` VALUES ('6', 'Manos - apuntando arriba', 'fa fa-hand-o-up');
INSERT INTO `font_awesome` VALUES ('7', 'Manos - papel', 'fa fa-hand-paper-o');
INSERT INTO `font_awesome` VALUES ('8', 'Manos - paz', 'fa fa-hand-peace-o');
INSERT INTO `font_awesome` VALUES ('9', 'Manos - apuntar', 'fa fa-hand-pointer-o');
INSERT INTO `font_awesome` VALUES ('10', 'Varios - Calculadora', 'fa fa-calculator');
INSERT INTO `font_awesome` VALUES ('11', 'Manos - tijeras', 'fa fa-hand-scissors-o');
INSERT INTO `font_awesome` VALUES ('12', 'Manos - saludo spock', 'fa fa-hand-spock-o');
INSERT INTO `font_awesome` VALUES ('13', 'Manos - desaprobar ver 1', 'fa fa-thumbs-down');
INSERT INTO `font_awesome` VALUES ('14', 'Manos - desaprobar ver 2', 'fa fa-thumbs-o-down');
INSERT INTO `font_awesome` VALUES ('15', 'Manos - aprobar ver 1', 'fa fa-thumbs-o-up');
INSERT INTO `font_awesome` VALUES ('16', 'Manos - aprobar ver 2', 'fa fa-thumbs-up');
INSERT INTO `font_awesome` VALUES ('17', 'Transporte - Ambulancia', 'fa fa-ambulance');
INSERT INTO `font_awesome` VALUES ('18', 'Transporte - Bicicleta', 'fa fa-bicycle');
INSERT INTO `font_awesome` VALUES ('19', 'Transporte - Bus', 'fa fa-bus');
INSERT INTO `font_awesome` VALUES ('20', 'Transporte - Auto', 'fa fa-car');
INSERT INTO `font_awesome` VALUES ('21', 'Transporte - Motocicleta', 'fa fa-motorcycle');
INSERT INTO `font_awesome` VALUES ('22', 'Transporte - Avion', 'fa fa-plane');
INSERT INTO `font_awesome` VALUES ('23', 'Transporte - Barco', 'fa fa-ship');
INSERT INTO `font_awesome` VALUES ('24', 'Transporte - Metro', 'fa fa-subway');
INSERT INTO `font_awesome` VALUES ('25', 'Transporte - Taxi', 'fa fa-taxi');
INSERT INTO `font_awesome` VALUES ('26', 'Transporte - Tren', 'fa fa-train');
INSERT INTO `font_awesome` VALUES ('27', 'Transporte - Camion', 'fa fa-truck');
INSERT INTO `font_awesome` VALUES ('28', 'Transporte - Silla de ruedas', 'fa fa-wheelchair');
INSERT INTO `font_awesome` VALUES ('29', 'Archivos - Archivo', 'fa fa-file');
INSERT INTO `font_awesome` VALUES ('30', 'Archivos - Comprimido', 'fa fa-file-archive-o');
INSERT INTO `font_awesome` VALUES ('31', 'Archivos - Audio', 'fa fa-file-audio-o');
INSERT INTO `font_awesome` VALUES ('32', 'Archivos - Codigo', 'fa fa-file-code-o');
INSERT INTO `font_awesome` VALUES ('33', 'Archivos - Excel', 'fa fa-file-excel-o');
INSERT INTO `font_awesome` VALUES ('34', 'Archivos - Imagen', 'fa fa-file-image-o');
INSERT INTO `font_awesome` VALUES ('35', 'Archivos - Archivo version 2', 'fa fa-file-o');
INSERT INTO `font_awesome` VALUES ('36', 'Archivos - PDF', 'fa fa-file-pdf-o');
INSERT INTO `font_awesome` VALUES ('37', 'Archivos - Power Point', 'fa fa-file-powerpoint-o');
INSERT INTO `font_awesome` VALUES ('38', 'Archivos - Texto', 'fa fa-file-text');
INSERT INTO `font_awesome` VALUES ('39', 'Archivos - Texto version 2', 'fa fa-file-text-o');
INSERT INTO `font_awesome` VALUES ('40', 'Archivos - Video', 'fa fa-file-video-o');
INSERT INTO `font_awesome` VALUES ('41', 'Archivos - Word', 'fa fa-file-word-o');
INSERT INTO `font_awesome` VALUES ('42', 'Formularios - check-square', 'fa fa-check-square');
INSERT INTO `font_awesome` VALUES ('43', 'Formularios - check-square 2', 'fa fa-check-square-o');
INSERT INTO `font_awesome` VALUES ('44', 'Formularios - circle', 'fa fa-circle');
INSERT INTO `font_awesome` VALUES ('45', 'Formularios - circle 2', 'fa fa-circle-o');
INSERT INTO `font_awesome` VALUES ('46', 'Formularios - dot-circle', 'fa fa-dot-circle-o');
INSERT INTO `font_awesome` VALUES ('47', 'Formularios - minus-square', 'fa fa-minus-square');
INSERT INTO `font_awesome` VALUES ('48', 'Formularios - minus-square 2', 'fa fa-minus-square-o');
INSERT INTO `font_awesome` VALUES ('49', 'Formularios - plus-square', 'fa fa-plus-square');
INSERT INTO `font_awesome` VALUES ('50', 'Formularios - plus-square2', 'fa fa-plus-square-o');
INSERT INTO `font_awesome` VALUES ('51', 'Formularios - square', 'fa fa-square');
INSERT INTO `font_awesome` VALUES ('52', 'Graficos - Linea', 'fa fa-line-chart');
INSERT INTO `font_awesome` VALUES ('53', 'Graficos - Torta', 'fa fa-pie-chart');
INSERT INTO `font_awesome` VALUES ('54', 'Graficos - Area', 'fa fa-area-chart');
INSERT INTO `font_awesome` VALUES ('55', 'Graficos - Barras', 'fa fa-bar-chart');
INSERT INTO `font_awesome` VALUES ('56', 'Dinero - Dolar', 'fa fa-usd');
INSERT INTO `font_awesome` VALUES ('57', 'Dinero - Euro', 'fa fa-eur');
INSERT INTO `font_awesome` VALUES ('58', 'Dinero - Yen', 'fa fa-jpy');
INSERT INTO `font_awesome` VALUES ('59', 'Editor Texto - Alineamiento Centro', 'fa fa-align-center');
INSERT INTO `font_awesome` VALUES ('60', 'Editor Texto - Alineamiento Justificado', 'fa fa-align-justify');
INSERT INTO `font_awesome` VALUES ('61', 'Editor Texto - Alineamiento Izquierda', 'fa fa-align-left');
INSERT INTO `font_awesome` VALUES ('62', 'Editor Texto - Alineamiento Derecha', 'fa fa-align-right');
INSERT INTO `font_awesome` VALUES ('63', 'Editor Texto - Negrita', 'fa fa-bold');
INSERT INTO `font_awesome` VALUES ('64', 'Editor Texto - Enlace', 'fa fa-link');
INSERT INTO `font_awesome` VALUES ('65', 'Editor Texto - Enlace Roto', 'fa fa-chain-broken');
INSERT INTO `font_awesome` VALUES ('66', 'Editor Texto - Columnas', 'fa fa-columns');
INSERT INTO `font_awesome` VALUES ('67', 'Editor Texto - Italica', 'fa fa-italic');
INSERT INTO `font_awesome` VALUES ('68', 'Editor Texto - Cortar', 'fa fa-scissors');
INSERT INTO `font_awesome` VALUES ('69', 'Editor Texto - Lista', 'fa fa-list');
INSERT INTO `font_awesome` VALUES ('70', 'Editor Texto - Lista Alternativa', 'fa fa-list-alt');
INSERT INTO `font_awesome` VALUES ('71', 'Editor Texto - Lista 2', 'fa fa-list-ol');
INSERT INTO `font_awesome` VALUES ('72', 'Editor Texto - Repetir', 'fa fa-repeat');
INSERT INTO `font_awesome` VALUES ('73', 'Editor Texto - Deshacer', 'fa fa-undo');
INSERT INTO `font_awesome` VALUES ('74', 'Editor Texto - Guardar', 'fa fa-floppy-o');
INSERT INTO `font_awesome` VALUES ('75', 'Editor Texto - Tabla', 'fa fa-table');
INSERT INTO `font_awesome` VALUES ('76', 'Internet - Nube', 'fa fa-cloud');
INSERT INTO `font_awesome` VALUES ('77', 'Internet - Nube descargar', 'fa fa-cloud-download');
INSERT INTO `font_awesome` VALUES ('78', 'Internet - Nube subir', 'fa fa-cloud-upload');
INSERT INTO `font_awesome` VALUES ('79', 'Internet - Internet Explorer', 'fa fa-internet-explorer');
INSERT INTO `font_awesome` VALUES ('80', 'Internet - Firefox', 'fa fa-firefox');
INSERT INTO `font_awesome` VALUES ('81', 'Internet - Facebook', 'fa fa-facebook');
INSERT INTO `font_awesome` VALUES ('82', 'Internet - Youtube', 'fa fa-youtube');
INSERT INTO `font_awesome` VALUES ('83', 'Internet - Whatsapp', 'fa fa-whatsapp');
INSERT INTO `font_awesome` VALUES ('84', 'Calendario - Normal', 'fa fa-calendar');
INSERT INTO `font_awesome` VALUES ('85', 'Calendario - Check', 'fa fa-calendar-check-o');
INSERT INTO `font_awesome` VALUES ('86', 'Calendario - Menos', 'fa fa-calendar-minus-o');
INSERT INTO `font_awesome` VALUES ('87', 'Calendario - Vacio', 'fa fa-calendar-o');
INSERT INTO `font_awesome` VALUES ('88', 'Calendario - Mas', 'fa fa-calendar-plus-o');
INSERT INTO `font_awesome` VALUES ('89', 'Calendario - Cancelado', 'fa fa-calendar-times-o');
INSERT INTO `font_awesome` VALUES ('90', 'Varios - Camara', 'fa fa-camera');
INSERT INTO `font_awesome` VALUES ('91', 'Varios - Correo', 'fa fa-envelope');
INSERT INTO `font_awesome` VALUES ('92', 'Varios - Correo 2', 'fa fa-envelope-o');
INSERT INTO `font_awesome` VALUES ('93', 'Varios - Descargar', 'fa fa-download');
INSERT INTO `font_awesome` VALUES ('94', 'Varios - Base de Datos', 'fa fa-database');
INSERT INTO `font_awesome` VALUES ('95', 'Varios - Cafe', 'fa fa-coffee');
INSERT INTO `font_awesome` VALUES ('96', 'Varios - Engranaje', 'fa fa-cog');
INSERT INTO `font_awesome` VALUES ('97', 'Varios - Engranajes', 'fa fa-cogs');
INSERT INTO `font_awesome` VALUES ('98', 'Varios - Fax', 'fa fa-fax');
INSERT INTO `font_awesome` VALUES ('99', 'Varios - Ojo', 'fa fa-eye');
INSERT INTO `font_awesome` VALUES ('100', 'Varios - RSS', 'fa fa-rss');
INSERT INTO `font_awesome` VALUES ('101', 'Varios - Mujer', 'fa fa-female');
INSERT INTO `font_awesome` VALUES ('102', 'Varios - Hombre', 'fa fa-male');
INSERT INTO `font_awesome` VALUES ('103', 'Varios - Fuego', 'fa fa-fire');
INSERT INTO `font_awesome` VALUES ('104', 'Varios - Estintor de fuego', 'fa fa-fire-extinguisher');
INSERT INTO `font_awesome` VALUES ('105', 'Varios - Bandera', 'fa fa-flag');
INSERT INTO `font_awesome` VALUES ('106', 'Varios - Mundo', 'fa fa-globe');
INSERT INTO `font_awesome` VALUES ('107', 'Varios - Graduacion', 'fa fa-graduation-cap');
INSERT INTO `font_awesome` VALUES ('108', 'Varios - Usuarios', 'fa fa-users');
INSERT INTO `font_awesome` VALUES ('109', 'Varios - Informacion', 'fa fa-info');
INSERT INTO `font_awesome` VALUES ('110', 'Varios - Universidad', 'fa fa-university');
INSERT INTO `font_awesome` VALUES ('111', 'Varios - Llave', 'fa fa-key');
INSERT INTO `font_awesome` VALUES ('112', 'Varios - Portatil', 'fa fa-laptop');
INSERT INTO `font_awesome` VALUES ('113', 'Varios - Mapa', 'fa fa-map');
INSERT INTO `font_awesome` VALUES ('114', 'Varios - Marcador mapa', 'fa fa-map-marker');
INSERT INTO `font_awesome` VALUES ('115', 'Varios - Mapa 2', 'fa fa-map-o');
INSERT INTO `font_awesome` VALUES ('116', 'Varios - Musica', 'fa fa-music');
INSERT INTO `font_awesome` VALUES ('117', 'Varios - Diario', 'fa fa-newspaper-o');
INSERT INTO `font_awesome` VALUES ('118', 'Varios - Telefono', 'fa fa-phone');
INSERT INTO `font_awesome` VALUES ('119', 'Varios - Impresora', 'fa fa-print');
INSERT INTO `font_awesome` VALUES ('120', 'Varios - Apagar', 'fa fa-power-off');
INSERT INTO `font_awesome` VALUES ('121', 'Varios - Carro de Compras', 'fa fa-shopping-cart');
INSERT INTO `font_awesome` VALUES ('122', 'Varios - Mapa del sitio', 'fa fa-sitemap');
INSERT INTO `font_awesome` VALUES ('123', 'Varios - Abrir', 'fa fa-unlock-alt');
INSERT INTO `font_awesome` VALUES ('124', 'Varios - Cerrar', 'fa fa-lock');
INSERT INTO `font_awesome` VALUES ('125', 'Varios - Usuario', 'fa fa-user');
INSERT INTO `font_awesome` VALUES ('126', 'Varios - Agregar usuario', 'fa fa-user-plus');
INSERT INTO `font_awesome` VALUES ('127', 'Varios - Eliminar usuario', 'fa fa-user-times');
INSERT INTO `font_awesome` VALUES ('128', 'Varios - Herramienta', 'fa fa-wrench');
INSERT INTO `font_awesome` VALUES ('129', 'Varios - Lupa', 'fa fa-search');
INSERT INTO `font_awesome` VALUES ('130', 'Varios - Cajas', 'fa fa-cubes');
INSERT INTO `font_awesome` VALUES ('131', 'Varios - Persona', 'fa fa-user-secret');
INSERT INTO `font_awesome` VALUES ('132', 'Varios - Intercambio', 'fa fa-exchange');
INSERT INTO `font_awesome` VALUES ('133', 'Varios - Caja', 'fa fa-cube');

-- ----------------------------
-- Table structure for mnt_ubicacion_ciudad
-- ----------------------------
DROP TABLE IF EXISTS `mnt_ubicacion_ciudad`;
CREATE TABLE `mnt_ubicacion_ciudad` (
  `idCiudad` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idCiudad`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COMMENT='Fija';

-- ----------------------------
-- Records of mnt_ubicacion_ciudad
-- ----------------------------
INSERT INTO `mnt_ubicacion_ciudad` VALUES ('14', 'Región de Los Ríos');
INSERT INTO `mnt_ubicacion_ciudad` VALUES ('13', 'Región Metropolitana');
INSERT INTO `mnt_ubicacion_ciudad` VALUES ('12', 'Región de Magallanes y la Antártica Chilena');
INSERT INTO `mnt_ubicacion_ciudad` VALUES ('11', 'Región de Aysén del General Carlos Ibáñez del Campo');
INSERT INTO `mnt_ubicacion_ciudad` VALUES ('10', 'Región de Los Lagos');
INSERT INTO `mnt_ubicacion_ciudad` VALUES ('9', 'Región de la Araucanía');
INSERT INTO `mnt_ubicacion_ciudad` VALUES ('8', 'Región del Bío-Bío');
INSERT INTO `mnt_ubicacion_ciudad` VALUES ('7', 'Región del Maule');
INSERT INTO `mnt_ubicacion_ciudad` VALUES ('6', 'Región del Libertador General Bernardo O Higgins');
INSERT INTO `mnt_ubicacion_ciudad` VALUES ('5', 'Región de Valparaiso');
INSERT INTO `mnt_ubicacion_ciudad` VALUES ('4', 'Región de Coquimbo');
INSERT INTO `mnt_ubicacion_ciudad` VALUES ('3', 'Región de Atacama');
INSERT INTO `mnt_ubicacion_ciudad` VALUES ('2', 'Región de Antofagasta');
INSERT INTO `mnt_ubicacion_ciudad` VALUES ('1', 'Región de Tarapacá');
INSERT INTO `mnt_ubicacion_ciudad` VALUES ('15', 'Región de Arica y Parinacota');

-- ----------------------------
-- Table structure for mnt_ubicacion_comunas
-- ----------------------------
DROP TABLE IF EXISTS `mnt_ubicacion_comunas`;
CREATE TABLE `mnt_ubicacion_comunas` (
  `idComuna` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idCiudad` int(11) unsigned NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idComuna`)
) ENGINE=MyISAM AUTO_INCREMENT=347 DEFAULT CHARSET=latin1 COMMENT='Fija';

-- ----------------------------
-- Records of mnt_ubicacion_comunas
-- ----------------------------
INSERT INTO `mnt_ubicacion_comunas` VALUES ('346', '1', 'ALTO HOSPICIO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('296', '1', 'CAMINA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('297', '1', 'COLCHANE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('3', '1', 'HUARA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('2', '1', 'IQUIQUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('4', '1', 'PICA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('5', '1', 'POZO ALMONTE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('7', '2', 'ANTOFAGASTA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('10', '2', 'CALAMA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('298', '2', 'MARIA ELENA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('8', '2', 'MEJILLONES');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('300', '2', 'OLLAGÜE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('301', '2', 'SAN PEDRO DE ATACAMA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('299', '2', 'SIERRA GORDA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('9', '2', 'TALTAL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('6', '2', 'TOCOPILLA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('302', '3', 'ALTO DEL CARMEN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('14', '3', 'CALDERA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('11', '3', 'CHAÑARAL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('13', '3', 'COPIAPO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('12', '3', 'DIEGO DE ALMAGRO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('17', '3', 'FREIRINA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('18', '3', 'HUASCO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('15', '3', 'TIERRA AMARILLA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('16', '3', 'VALLENAR');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('22', '4', 'ANDACOLLO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('31', '4', 'CANELA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('29', '4', 'COMBARBALA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('21', '4', 'COQUIMBO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('30', '4', 'ILLAPEL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('20', '4', 'LA HIGUERA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('19', '4', 'LA SERENA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('33', '4', 'LOS VILOS');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('26', '4', 'MONTE PATRIA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('25', '4', 'OVALLE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('24', '4', 'PAIHUANO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('27', '4', 'PUNITAQUI');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('28', '4', 'RIO HURTADO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('32', '4', 'SALAMANCA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('23', '4', 'VICUÑA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('44', '5', 'ALGARROBO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('56', '5', 'CABILDO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('67', '5', 'CALLE LARGA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('46', '5', 'CARTAGENA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('40', '5', 'CASABLANCA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('63', '5', 'CATEMU');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('340', '5', 'CONCON');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('45', '5', 'EL QUISCO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('47', '5', 'EL TABO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('51', '5', 'HIJUELAS');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('41', '5', 'ISLA DE PASCUA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('321', '5', 'JUAN FERNANDEZ');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('50', '5', 'LA CALERA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('49', '5', 'LA CRUZ');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('59', '5', 'LA LIGUA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('53', '5', 'LIMACHE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('65', '5', 'LLAY LLAY');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('66', '5', 'LOS ANDES');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('52', '5', 'NOGALES');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('54', '5', 'OLMUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('62', '5', 'PANQUEHUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('57', '5', 'PAPUDO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('55', '5', 'PETORCA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('36', '5', 'PUCHUNCAVI');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('61', '5', 'PUTAENDO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('48', '5', 'QUILLOTA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('38', '5', 'QUILPUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('35', '5', 'QUINTERO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('68', '5', 'RINCONADA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('42', '5', 'SAN ANTONIO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('69', '5', 'SAN ESTEBAN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('60', '5', 'SAN FELIPE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('64', '5', 'SANTA MARIA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('43', '5', 'SANTO DOMINGO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('34', '5', 'VALPARAISO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('39', '5', 'VILLA ALEMANA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('37', '5', 'VIÑA DEL MAR');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('58', '5', 'ZAPALLAR');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('132', '6', 'CHEPICA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('125', '6', 'CHIMBARONGO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('110', '6', 'CODEGUA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('114', '6', 'COINCO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('113', '6', 'COLTAUCO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('112', '6', 'DOÑIHUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('107', '6', 'GRANEROS');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('139', '6', 'LA ESTRELLA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('116', '6', 'LAS CABRAS');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('136', '6', 'LITUECHE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('129', '6', 'LOLOL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('106', '6', 'MACHALI');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('122', '6', 'MALLOA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('134', '6', 'MARCHIGUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('126', '6', 'NANCAGUA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('138', '6', 'NAVIDAD');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('120', '6', 'OLIVAR');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('130', '6', 'PALMILLA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('133', '6', 'PAREDONES');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('131', '6', 'PERALILLO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('115', '6', 'PEUMO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('118', '6', 'PICHIDEGUA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('137', '6', 'PICHILEMU');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('127', '6', 'PLACILLA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('135', '6', 'PUMANQUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('123', '6', 'QUINTA DE TILCOCO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('105', '6', 'RANCAGUA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('121', '6', 'RENGO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('119', '6', 'REQUINOA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('124', '6', 'SAN FERNANDO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('111', '6', 'SAN FRANCISCO DE MOSTAZAL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('117', '6', 'SAN VICENTE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('128', '6', 'SANTA CRUZ');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('166', '7', 'CAUQUENES');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('167', '7', 'CHANCO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('161', '7', 'COLBUN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('157', '7', 'CONSTITUCION');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('155', '7', 'CUREPTO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('140', '7', 'CURICO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('158', '7', 'EMPEDRADO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('144', '7', 'HUALAÑE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('145', '7', 'LICANTEN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('159', '7', 'LINARES');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('162', '7', 'LONGAVI');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('154', '7', 'MAULE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('147', '7', 'MOLINA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('164', '7', 'PARRAL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('152', '7', 'PELARCO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('320', '7', 'PELLUHUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('153', '7', 'PENCAHUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('143', '7', 'RAUCO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('165', '7', 'RETIRO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('149', '7', 'RIO CLARO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('141', '7', 'ROMERAL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('148', '7', 'SAGRADA FAMILIA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('151', '7', 'SAN CLEMENTE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('156', '7', 'SAN JAVIER');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('341', '7', 'SAN RAFAEL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('150', '7', 'TALCA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('142', '7', 'TENO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('146', '7', 'VICHUQUEN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('163', '7', 'VILLA ALEGRE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('160', '7', 'YERBAS BUENAS');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('303', '8', 'ANTUCO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('198', '8', 'ARAUCO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('180', '8', 'BULNES');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('208', '8', 'CABRERO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('201', '8', 'CAÑETE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('344', '8', 'CHIGUAYANTE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('168', '8', 'CHILLAN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('342', '8', 'CHILLAN VIEJO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('175', '8', 'COBQUECURA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('186', '8', 'COELEMU');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('170', '8', 'COIHUECO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('188', '8', 'CONCEPCION');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('202', '8', 'CONTULMO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('194', '8', 'CORONEL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('197', '8', 'CURANILAHUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('185', '8', 'EL CARMEN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('193', '8', 'FLORIDA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('192', '8', 'HUALQUI');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('210', '8', 'LAJA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('199', '8', 'LEBU');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('200', '8', 'LOS ALAMOS');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('204', '8', 'LOS ANGELES');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('195', '8', 'LOTA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('214', '8', 'MULCHEN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('212', '8', 'NACIMIENTO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('213', '8', 'NEGRETE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('174', '8', 'NINHUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('184', '8', 'PEMUCO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('191', '8', 'PENCO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('169', '8', 'PINTO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('171', '8', 'PORTEZUELO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('215', '8', 'QUILACO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('206', '8', 'QUILLECO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('182', '8', 'QUILLON');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('172', '8', 'QUIRIHUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('187', '8', 'RANQUIL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('176', '8', 'SAN CARLOS');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('178', '8', 'SAN FABIAN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('177', '8', 'SAN GREGORIO DE ÑIQUEN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('181', '8', 'SAN IGNACIO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('179', '8', 'SAN NICOLAS');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('343', '8', 'SAN PEDRO DE LA PAZ');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('211', '8', 'SAN ROSENDO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('205', '8', 'SANTA BARBARA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('196', '8', 'SANTA JUANA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('189', '8', 'TALCAHUANO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('203', '8', 'TIRUA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('190', '8', 'TOME');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('173', '8', 'TREHUACO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('209', '8', 'TUCAPEL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('207', '8', 'YUMBEL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('183', '8', 'YUNGAY');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('216', '9', 'ANGOL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('235', '9', 'CARAHUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('220', '9', 'COLLIPULLI');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('230', '9', 'CUNCO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('225', '9', 'CURACAUTIN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('305', '9', 'CURARREHUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('221', '9', 'ERCILLA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('229', '9', 'FREIRE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('232', '9', 'GALVARINO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('238', '9', 'GORBEA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('231', '9', 'LAUTARO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('240', '9', 'LONCOCHE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('226', '9', 'LONQUIMAY');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('218', '9', 'LOS SAUCES');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('223', '9', 'LUMACO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('304', '9', 'MELIPEUCO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('234', '9', 'NUEVA IMPERIAL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('345', '9', 'PADRE LAS CASAS');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('233', '9', 'PERQUENCO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('237', '9', 'PITRUFQUEN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('242', '9', 'PUCON');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('236', '9', 'PUERTO SAAVEDRA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('217', '9', 'PUREN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('219', '9', 'RENAICO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('227', '9', 'TEMUCO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('306', '9', 'TEODORO SCHMIDT');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('239', '9', 'TOLTEN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('222', '9', 'TRAIGUEN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('224', '9', 'VICTORIA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('228', '9', 'VILCUN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('241', '9', 'VILLARRICA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('277', '10', 'ANCUD');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('265', '10', 'CALBUCO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('270', '10', 'CASTRO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('280', '10', 'CHAITEN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('271', '10', 'CHONCHI');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('262', '10', 'COCHAMO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('276', '10', 'CURACO DE VELEZ');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('279', '10', 'DALCAHUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('268', '10', 'FRESIA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('269', '10', 'FRUTILLAR');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('281', '10', 'FUTALEUFU');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('308', '10', 'HUALAIHUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('267', '10', 'LLANQUIHUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('264', '10', 'LOS MUERMOS');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('263', '10', 'MAULLIN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('255', '10', 'OSORNO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('282', '10', 'PALENA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('261', '10', 'PUERTO MONTT');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('258', '10', 'PUERTO OCTAY');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('266', '10', 'PUERTO VARAS');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('274', '10', 'PUQUELDON');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('260', '10', 'PURRANQUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('256', '10', 'PUYEHUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('272', '10', 'QUEILEN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('273', '10', 'QUELLON');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('278', '10', 'QUEMCHI');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('275', '10', 'QUINCHAO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('259', '10', 'RIO NEGRO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('307', '10', 'SAN JUAN DE LA COSTA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('257', '10', 'SAN PABLO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('285', '11', 'AYSEN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('287', '11', 'CHILE CHICO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('286', '11', 'CISNES');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('289', '11', 'COCHRANE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('284', '11', 'COYHAIQUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('309', '11', 'GUAITECAS');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('312', '11', 'LAGO VERDE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('310', '11', 'O´HIGGINS');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('288', '11', 'RIO IBAÑEZ');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('311', '11', 'TORTEL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('316', '12', 'LAGUNA BLANCA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('319', '12', 'NAVARINO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('292', '12', 'PORVENIR');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('317', '12', 'PRIMAVERA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('291', '12', 'PUERTO NATALES');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('290', '12', 'PUNTA ARENAS');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('314', '12', 'RIO VERDE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('315', '12', 'SAN GREGORIO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('318', '12', 'TIMAUKEL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('313', '12', 'TORRES DEL PAINE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('109', '13', 'ALHUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('103', '13', 'BUIN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('99', '13', 'CALERA DE TANGO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('333', '13', 'CERRILLOS');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('324', '13', 'CERRO NAVIA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('76', '13', 'COLINA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('75', '13', 'CONCHALI');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('83', '13', 'CURACAVI');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('338', '13', 'EL BOSQUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('89', '13', 'EL MONTE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('328', '13', 'ESTACION CENTRAL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('334', '13', 'HUECHURABA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('330', '13', 'INDEPENDENCIA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('87', '13', 'ISLA DE MAIPO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('96', '13', 'LA CISTERNA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('93', '13', 'LA FLORIDA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('97', '13', 'LA GRANJA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('327', '13', 'LA PINTANA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('92', '13', 'LA REINA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('78', '13', 'LAMPA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('71', '13', 'LAS CONDES');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('332', '13', 'LO BARNECHEA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('337', '13', 'LO ESPEJO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('325', '13', 'LO PRADO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('323', '13', 'MACUL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('94', '13', 'MAIPU');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('90', '13', 'MARIA PINTO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('88', '13', 'MELIPILLA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('91', '13', 'ÑUÑOA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('339', '13', 'PADRE HURTADO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('104', '13', 'PAINE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('336', '13', 'PEDRO AGUIRRE CERDA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('85', '13', 'PEÑAFLOR');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('322', '13', 'PEÑALOLEN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('101', '13', 'PIRQUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('72', '13', 'PROVIDENCIA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('82', '13', 'PUDAHUEL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('100', '13', 'PUENTE ALTO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('79', '13', 'QUILICURA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('81', '13', 'QUINTA NORMAL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('329', '13', 'RECOLETA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('77', '13', 'RENCA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('98', '13', 'SAN BERNARDO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('335', '13', 'SAN JOAQUIN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('102', '13', 'SAN JOSE DE MAIPO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('95', '13', 'SAN MIGUEL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('108', '13', 'SAN PEDRO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('326', '13', 'SAN RAMON');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('70', '13', 'SANTIAGO CENTRO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('73', '13', 'SANTIAGO OESTE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('84', '13', 'SANTIAGO SUR');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('86', '13', 'TALAGANTE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('80', '13', 'TIL-TIL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('331', '13', 'VITACURA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('244', '14', 'CORRAL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('248', '14', 'FUTRONO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('251', '14', 'LA UNION');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('254', '14', 'LAGO RANCO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('249', '14', 'LANCO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('247', '14', 'LOS LAGOS');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('246', '14', 'MAFIL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('245', '14', 'MARIQUINA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('243', '14', 'VALDIVIA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('250', '14', 'PANGUIPULLI');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('252', '14', 'PAILLACO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('253', '14', 'RIO BUENO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('1', '15', 'ARICA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('295', '15', 'CAMARONES');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('293', '15', 'GENERAL LAGOS');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('294', '15', 'PUTRE');

-- ----------------------------
-- Table structure for seguridad_zonas_listado
-- ----------------------------
DROP TABLE IF EXISTS `seguridad_zonas_listado`;
CREATE TABLE `seguridad_zonas_listado` (
  `idZona` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idSistema` int(11) unsigned NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  `ColorCode` varchar(30) NOT NULL,
  `Nivel_peligrosidad` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idZona`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='Fija';

-- ----------------------------
-- Records of seguridad_zonas_listado
-- ----------------------------
INSERT INTO `seguridad_zonas_listado` VALUES ('1', '1', 'Central', '#ff0000', '1');
INSERT INTO `seguridad_zonas_listado` VALUES ('2', '1', 'izquierda', '#0000ff', '2');
INSERT INTO `seguridad_zonas_listado` VALUES ('3', '1', 'Lima', '#008080', '1');

-- ----------------------------
-- Table structure for seguridad_zonas_listado_puntos
-- ----------------------------
DROP TABLE IF EXISTS `seguridad_zonas_listado_puntos`;
CREATE TABLE `seguridad_zonas_listado_puntos` (
  `idPuntos` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idZona` int(11) unsigned NOT NULL,
  `Latitud` double NOT NULL,
  `Longitud` double NOT NULL,
  `Direccion` varchar(250) NOT NULL,
  `Orden` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idPuntos`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COMMENT='Fija';

-- ----------------------------
-- Records of seguridad_zonas_listado_puntos
-- ----------------------------
INSERT INTO `seguridad_zonas_listado_puntos` VALUES ('1', '1', '-33.4765560758362', '-70.6540633927613', 'San Ignacio 2590, San Miguel, San Miguel, Región Metropolitana, Chile', '1');
INSERT INTO `seguridad_zonas_listado_puntos` VALUES ('2', '1', '-33.4817463673344', '-70.6535054932862', 'José Joaquín Vallejos 1473, San Miguel, San Miguel, Región Metropolitana, Chile', '2');
INSERT INTO `seguridad_zonas_listado_puntos` VALUES ('3', '1', '-33.4826054200707', '-70.6492997895508', 'Gran Avenida Jose Miguel Carrera 3052, San Miguel, San Miguel, Región Metropolitana, Chile', '3');
INSERT INTO `seguridad_zonas_listado_puntos` VALUES ('4', '1', '-33.4795629032855', '-70.6484843980103', 'Av Carlos Valdovinos 1206, San Miguel, San Miguel, Región Metropolitana, Chile', '4');
INSERT INTO `seguridad_zonas_listado_puntos` VALUES ('5', '1', '-33.4765918720148', '-70.648613144043', 'San Diego 2381, Santiago, Santiago, Región Metropolitana, Chile', '5');
INSERT INTO `seguridad_zonas_listado_puntos` VALUES ('6', '1', '-33.4745872632358', '-70.65131681073', 'Bío Bío 1430, Santiago, Santiago, Región Metropolitana, Chile', '6');
INSERT INTO `seguridad_zonas_listado_puntos` VALUES ('7', '2', '-33.4795986982218', '-70.6482269059449', 'Gran Avenida Jose Miguel Carrera 2676-2710, San Miguel, San Miguel, Región Metropolitana, Chile', '1');
INSERT INTO `seguridad_zonas_listado_puntos` VALUES ('8', '2', '-33.4824980389446', '-70.6490852128296', 'Gran Avenida Jose Miguel Carrera 3012, San Miguel, San Miguel, Región Metropolitana, Chile', '2');
INSERT INTO `seguridad_zonas_listado_puntos` VALUES ('9', '2', '-33.4840371556993', '-70.6414891968994', 'Av. Sta. Rosa 3095, San Miguel, San Joaquín, Región Metropolitana, Chile', '3');
INSERT INTO `seguridad_zonas_listado_puntos` VALUES ('10', '2', '-33.4809588948421', '-70.6417896043091', 'Av. Sta. Rosa 2668, San Joaquín, San Joaquín, Región Metropolitana, Chile', '4');
INSERT INTO `seguridad_zonas_listado_puntos` VALUES ('11', '3', '-12.0669780662749', '-77.0448447953491', 'Av Arnaldo Marquez 650, Jesús María 15072, Perú', '1');
INSERT INTO `seguridad_zonas_listado_puntos` VALUES ('12', '3', '-12.0739025453204', '-77.0493938218383', 'Av República Dominicana 356, Lima 15072, Perú', '2');
INSERT INTO `seguridad_zonas_listado_puntos` VALUES ('13', '3', '-12.0890098781353', '-77.0436431657104', 'Jirón Sinchi Roca, Lince 15073, Perú', '3');
INSERT INTO `seguridad_zonas_listado_puntos` VALUES ('14', '3', '-12.0904786011166', '-77.0294381867675', 'Calle los Geranios 123, Lima 15046, Perú', '4');
INSERT INTO `seguridad_zonas_listado_puntos` VALUES ('15', '3', '-12.0799455807564', '-77.0206834565429', 'Nicolas De La Barra 327, Lima 15034, Perú', '5');
INSERT INTO `seguridad_zonas_listado_puntos` VALUES ('16', '3', '-12.0683629763997', '-77.0295669328002', 'Jirón Saenz Peña, Lima 15033, Perú', '6');

-- ----------------------------
-- Table structure for usuarios_accesos
-- ----------------------------
DROP TABLE IF EXISTS `usuarios_accesos`;
CREATE TABLE `usuarios_accesos` (
  `idAcceso` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) unsigned NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL DEFAULT '00:00:00',
  PRIMARY KEY (`idAcceso`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';

-- ----------------------------
-- Records of usuarios_accesos
-- ----------------------------
INSERT INTO `usuarios_accesos` VALUES ('1', '1', '2015-09-29', '13:25:24');
INSERT INTO `usuarios_accesos` VALUES ('2', '1', '2015-10-15', '14:32:34');
INSERT INTO `usuarios_accesos` VALUES ('3', '1', '2015-11-09', '12:21:32');
INSERT INTO `usuarios_accesos` VALUES ('4', '1', '2015-11-09', '14:51:31');
INSERT INTO `usuarios_accesos` VALUES ('5', '1', '2015-11-09', '16:42:19');
INSERT INTO `usuarios_accesos` VALUES ('6', '1', '2015-11-09', '17:10:19');

-- ----------------------------
-- Table structure for usuarios_estado
-- ----------------------------
DROP TABLE IF EXISTS `usuarios_estado`;
CREATE TABLE `usuarios_estado` (
  `idEstado` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Fija';

-- ----------------------------
-- Records of usuarios_estado
-- ----------------------------
INSERT INTO `usuarios_estado` VALUES ('1', 'Activo');
INSERT INTO `usuarios_estado` VALUES ('2', 'Inactivo');

-- ----------------------------
-- Table structure for usuarios_listado
-- ----------------------------
DROP TABLE IF EXISTS `usuarios_listado`;
CREATE TABLE `usuarios_listado` (
  `idUsuario` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `tipo` varchar(13) NOT NULL,
  `idEstado` int(11) unsigned NOT NULL,
  `email` varchar(60) NOT NULL,
  `Nombre` varchar(60) NOT NULL,
  `Rut` varchar(13) NOT NULL,
  `fNacimiento` date NOT NULL,
  `Direccion` varchar(60) NOT NULL,
  `Fono` varchar(15) NOT NULL,
  `Ciudad` varchar(60) NOT NULL,
  `Comuna` varchar(60) NOT NULL,
  `Direccion_img` varchar(120) NOT NULL,
  `Ultimo_acceso` date NOT NULL,
  `idSistema` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='Cuidado';

-- ----------------------------
-- Records of usuarios_listado
-- ----------------------------
INSERT INTO `usuarios_listado` VALUES ('1', 'tenshi98', 'b9ad227539cc03cd8199e23aa9078065', 'SuperAdmin', '1', 'asd@bla1.cl', 'Victor Reyes', '16029464-7', '2014-05-14', 'Los Lirios 0936', '8512517', 'Santiago', 'Puente Alto', 'usr_img_img_6626.jpg', '2015-11-09', '0');
INSERT INTO `usuarios_listado` VALUES ('2', 'admin_acrus', '81dc9bdb52d04dc20036dbd8313ed055', 'Administrador', '1', 'jolmos@simyl.cl', 'Juan Carlos Olmos', '14.681.976-1', '1956-11-12', 'Santa Corina 0473', '225234462', 'Santiago', 'La Cisterna', 'usr_img_Imagen1 curriculum.jpg', '2015-09-19', '3');
INSERT INTO `usuarios_listado` VALUES ('3', 'lubricador', '81dc9bdb52d04dc20036dbd8313ed055', 'Normal', '1', 'jpenailillo@gmail.com', 'Juan Peñailillo', '11.234.567-1', '1970-09-23', 'La Estrella 1345 ', '24563789', 'Santiago', 'Maipu', '', '0000-00-00', '3');

-- ----------------------------
-- Table structure for usuarios_observaciones
-- ----------------------------
DROP TABLE IF EXISTS `usuarios_observaciones`;
CREATE TABLE `usuarios_observaciones` (
  `idObservacion` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idUsuario_observado` int(11) unsigned NOT NULL,
  `idUsuario` int(11) unsigned NOT NULL,
  `Fecha` date NOT NULL,
  `Observacion` text NOT NULL,
  PRIMARY KEY (`idObservacion`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';

-- ----------------------------
-- Records of usuarios_observaciones
-- ----------------------------

-- ----------------------------
-- Table structure for usuarios_permisos
-- ----------------------------
DROP TABLE IF EXISTS `usuarios_permisos`;
CREATE TABLE `usuarios_permisos` (
  `idPermisos` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) unsigned NOT NULL,
  `idAdmpm` int(11) unsigned NOT NULL,
  `level` char(1) NOT NULL,
  PRIMARY KEY (`idPermisos`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';

-- ----------------------------
-- Records of usuarios_permisos
-- ----------------------------

-- ----------------------------
-- Table structure for usuarios_tipos
-- ----------------------------
DROP TABLE IF EXISTS `usuarios_tipos`;
CREATE TABLE `usuarios_tipos` (
  `idTipoUsr` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idTipoUsr`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='Fija';

-- ----------------------------
-- Records of usuarios_tipos
-- ----------------------------
INSERT INTO `usuarios_tipos` VALUES ('1', 'Administrador');
INSERT INTO `usuarios_tipos` VALUES ('2', 'Normal');
