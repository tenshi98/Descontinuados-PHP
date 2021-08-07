/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50620
Source Host           : localhost:3306
Source Database       : jootes

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2016-04-29 20:49:59
*/

SET FOREIGN_KEY_CHECKS=0;

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
  `Sexo` varchar(30) NOT NULL,
  `email` varchar(120) NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  `Edad` int(3) unsigned NOT NULL,
  `Rut` varchar(13) NOT NULL,
  `fNacimiento` date NOT NULL,
  `Fono1` varchar(15) NOT NULL,
  `Fono2` varchar(15) NOT NULL,
  `Departamento` varchar(180) NOT NULL,
  `Provincia` varchar(180) NOT NULL,
  `Distrito` varchar(180) NOT NULL,
  `Direccion` varchar(60) NOT NULL,
  `password` varchar(80) NOT NULL,
  `fcreacion` datetime NOT NULL,
  `factualizacion` datetime NOT NULL,
  `IMEI` varchar(120) NOT NULL,
  `GSM` varchar(500) NOT NULL,
  `Latitud` double NOT NULL,
  `Longitud` double NOT NULL,
  `dispositivo` varchar(120) NOT NULL,
  `Saldo` int(11) unsigned NOT NULL,
  `idUsuario` int(11) unsigned NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';

-- ----------------------------
-- Records of clientes_listado
-- ----------------------------
INSERT INTO `clientes_listado` VALUES ('1', '1', '1', '2', 'Masculino', 'tenshi98@gmail.com', 'Tenshi', '31', '123455', '0000-00-00', '98215180', '55555', 'Amazonas', 'Bagua', 'Aramango', 'fgg', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-13 19:10:29', '2016-02-03 00:00:00', '', 'cPQXkzpV52g:APA91bHD2T6xZCl-0qezm_XCB9ki74OShlKjCTrIH8jaaO0vAWDs_gAe5kiADkkhm0NIyJj7td2R7aR88e6D8r1yp25tDIRV2JTLP5C0VtbY8cfvnKFWGqsBpyRjXmxBoQaVehxeM1en', '0', '0', 'android', '0', '0', '1_Tenshi');
INSERT INTO `clientes_listado` VALUES ('2', '1', '1', '2', 'Masculino', 'tenshi98@hotmail.com', 'Marcelo', '33', '', '0000-00-00', '98215180', '', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-21 18:10:46', '2016-01-21 18:10:46', '', 'erxoGq0OpAI:APA91bHdJxHdDARFMNKprObCHQttpzM_UAqFbfJ0J8xggBR0ke2SB3wXAj9HI_pNIVYb9bGbpJ5zWRJ99rKNMlIdub-Sg9lzMofNqCVz5MYbsO0_KFvskt5m-ooRcqKDm-QUEWl8XKOK', '0', '0', 'android', '0', '0', '');
INSERT INTO `clientes_listado` VALUES ('3', '1', '1', '2', 'Masculino', 'carlos.valenzuela.silva@gmail.com', 'Carloco', '57', 'dghh', '0000-00-00', '93462365', '25563', 'Amazonas', 'Bongara', 'Chisquilla', 'hhh', 'dcd83eaa9662540adbce44e5348e6eb8', '2016-01-29 17:38:07', '2016-02-03 00:00:00', '', 'fTmAfUNDSZQ:APA91bFKHYZd2eRioJoIhFCHcTM4lIuZ_-RXHFEYqC44ft5lJG2aJC8gC_qfBph7b5mUs4PVzqCg1jkA542Lw_AObSNCixujAAmIt69J9VQXGbxzExXI1QA4qMWbVLyoAZ0Yv7uEZr3y', '0', '0', 'android', '0', '0', '');

-- ----------------------------
-- Table structure for clientes_notificaciones
-- ----------------------------
DROP TABLE IF EXISTS `clientes_notificaciones`;
CREATE TABLE `clientes_notificaciones` (
  `idNotificacion` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) unsigned NOT NULL,
  `idTipoNoti` int(11) unsigned NOT NULL,
  `mensaje` varchar(255) NOT NULL,
  `texto` text NOT NULL,
  `idEstado` int(11) unsigned NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `Web` varchar(150) NOT NULL,
  `room` varchar(120) NOT NULL,
  PRIMARY KEY (`idNotificacion`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clientes_notificaciones
-- ----------------------------
INSERT INTO `clientes_notificaciones` VALUES ('1', '2', '1', 'Tenshi te ha solicitado un chateo', '', '2', '2016-01-22', '20:13:36', '', 'room1');
INSERT INTO `clientes_notificaciones` VALUES ('2', '1', '1', 'Victor te ha solicitado un chateo', '', '2', '2016-01-22', '20:37:10', '', 'room2');
INSERT INTO `clientes_notificaciones` VALUES ('3', '2', '1', 'Tenshi te ha solicitado un chateo', '', '2', '2016-01-28', '19:16:57', '', 'room1');
INSERT INTO `clientes_notificaciones` VALUES ('4', '1', '1', 'Victor te ha solicitado un chateo', '', '2', '2016-01-28', '19:32:30', '', 'room2');
INSERT INTO `clientes_notificaciones` VALUES ('5', '2', '1', 'Tenshi te ha solicitado un chateo', '', '2', '2016-01-28', '19:47:24', '', 'room1');
INSERT INTO `clientes_notificaciones` VALUES ('6', '2', '1', 'Carloco te ha solicitado un chateo', '', '2', '2016-01-29', '17:39:35', '', 'room3');
INSERT INTO `clientes_notificaciones` VALUES ('7', '1', '1', 'Carloco te ha solicitado un chateo', '', '2', '2016-02-01', '15:36:04', '', 'room3');
INSERT INTO `clientes_notificaciones` VALUES ('8', '2', '1', 'Carloco te ha solicitado un chateo', '', '1', '2016-02-01', '21:26:30', '', 'room3');
INSERT INTO `clientes_notificaciones` VALUES ('9', '2', '1', 'Carloco te ha solicitado un chateo', '', '1', '2016-02-04', '15:11:18', '', 'room3');
INSERT INTO `clientes_notificaciones` VALUES ('10', '1', '1', 'Carloco te ha solicitado un chateo', '', '2', '2016-02-06', '01:06:37', '', 'room3');
INSERT INTO `clientes_notificaciones` VALUES ('11', '1', '1', 'Carloco te ha solicitado un chateo', '', '2', '2016-02-08', '23:06:03', '', 'room3');
INSERT INTO `clientes_notificaciones` VALUES ('12', '2', '1', 'Tenshi te ha solicitado un chateo', '', '1', '2016-02-09', '14:14:05', '', 'room1');
INSERT INTO `clientes_notificaciones` VALUES ('13', '2', '1', 'Tenshi te ha solicitado un chateo', '', '1', '2016-02-09', '14:17:29', '', 'room1');
INSERT INTO `clientes_notificaciones` VALUES ('14', '2', '1', 'Tenshi te ha solicitado un chateo', '', '1', '2016-02-09', '14:21:34', '', 'room1');
INSERT INTO `clientes_notificaciones` VALUES ('15', '2', '1', 'Tenshi te ha solicitado un chateo', '', '1', '2016-02-09', '18:23:25', '', 'room1');
INSERT INTO `clientes_notificaciones` VALUES ('16', '2', '1', 'Tenshi te ha solicitado un chateo', '', '1', '2016-02-09', '18:24:24', '', 'room1');
INSERT INTO `clientes_notificaciones` VALUES ('17', '2', '1', 'Tenshi te ha solicitado un chateo', '', '1', '2016-02-09', '18:34:22', '', 'room1');
INSERT INTO `clientes_notificaciones` VALUES ('18', '2', '1', 'Tenshi te ha solicitado un chateo', '', '1', '2016-02-09', '18:43:40', '', 'room1');
INSERT INTO `clientes_notificaciones` VALUES ('19', '2', '1', 'Tenshi te ha solicitado un chateo', '', '1', '2016-02-10', '20:42:47', '', 'room1');
INSERT INTO `clientes_notificaciones` VALUES ('20', '2', '1', 'Carloco te ha solicitado un chateo', '', '1', '2016-02-10', '20:43:51', '', 'room3');
INSERT INTO `clientes_notificaciones` VALUES ('21', '2', '1', 'Carloco te ha solicitado un chateo', '', '1', '2016-02-10', '20:44:17', '', 'room3');
INSERT INTO `clientes_notificaciones` VALUES ('22', '2', '1', 'Tenshi te ha solicitado un chateo', '', '1', '2016-02-11', '14:06:10', '', 'room1');
INSERT INTO `clientes_notificaciones` VALUES ('23', '2', '1', 'Carloco te ha solicitado un chateo', '', '1', '2016-02-11', '15:35:14', '', 'room3');
INSERT INTO `clientes_notificaciones` VALUES ('24', '2', '1', 'Carloco te ha solicitado un chateo', '', '1', '2016-02-11', '15:48:53', '', 'room3');
INSERT INTO `clientes_notificaciones` VALUES ('25', '1', '1', 'Carloco te ha solicitado un chateo', '', '1', '2016-02-11', '16:07:57', '', 'room3');
INSERT INTO `clientes_notificaciones` VALUES ('26', '1', '1', 'Carloco te ha solicitado un chateo', '', '1', '2016-02-11', '20:55:14', '', 'room3');
INSERT INTO `clientes_notificaciones` VALUES ('27', '1', '1', 'Carloco te ha solicitado un chateo', '', '1', '2016-02-11', '22:09:24', '', 'room3');
INSERT INTO `clientes_notificaciones` VALUES ('28', '1', '1', 'Carloco te ha solicitado un chateo', '', '1', '2016-02-12', '14:47:36', '', 'room3');
INSERT INTO `clientes_notificaciones` VALUES ('29', '2', '1', 'Carloco te ha solicitado un chateo', '', '1', '2016-02-12', '19:01:25', '', 'room3');
INSERT INTO `clientes_notificaciones` VALUES ('30', '1', '1', 'Carloco te ha solicitado un chateo', '', '1', '2016-02-12', '19:01:42', '', 'room3');
INSERT INTO `clientes_notificaciones` VALUES ('31', '2', '1', 'Carloco te ha solicitado un chateo', '', '1', '2016-02-12', '22:29:34', '', 'room3');
INSERT INTO `clientes_notificaciones` VALUES ('32', '2', '1', 'Carloco te ha solicitado un chateo', '', '1', '2016-02-13', '13:42:09', '', 'room3');
INSERT INTO `clientes_notificaciones` VALUES ('33', '1', '1', 'Carloco te ha solicitado un chateo', '', '1', '2016-02-16', '22:07:12', '', 'room3');
INSERT INTO `clientes_notificaciones` VALUES ('34', '1', '1', 'Carloco te ha solicitado un chateo', '', '1', '2016-02-17', '20:23:47', '', 'room3');
INSERT INTO `clientes_notificaciones` VALUES ('35', '1', '1', 'Carloco te ha solicitado un chateo', '', '1', '2016-02-18', '22:42:47', '', 'room3');
INSERT INTO `clientes_notificaciones` VALUES ('36', '2', '1', 'Carloco te ha solicitado un chateo', '', '1', '2016-02-21', '19:09:44', '', 'room3');

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
-- Table structure for clientes_notificaciones_tipo
-- ----------------------------
DROP TABLE IF EXISTS `clientes_notificaciones_tipo`;
CREATE TABLE `clientes_notificaciones_tipo` (
  `idTipoNoti` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idTipoNoti`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clientes_notificaciones_tipo
-- ----------------------------
INSERT INTO `clientes_notificaciones_tipo` VALUES ('1', 'Invitacion');
INSERT INTO `clientes_notificaciones_tipo` VALUES ('2', 'Noticia');

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
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';

-- ----------------------------
-- Records of clientes_observaciones
-- ----------------------------
INSERT INTO `clientes_observaciones` VALUES ('1', '1', '1', '2015-09-18', 'asd');
INSERT INTO `clientes_observaciones` VALUES ('2', '7', '2', '2015-12-16', 'Vendedor: Evelyn Paz');
INSERT INTO `clientes_observaciones` VALUES ('3', '14', '2', '2015-12-24', 'Se desanimo al momento de probar la descarga en su celular y no lo capto la base de datos.');
INSERT INTO `clientes_observaciones` VALUES ('4', '12', '2', '2015-12-29', 'Vendedor: Doris Valle');
INSERT INTO `clientes_observaciones` VALUES ('5', '13', '2', '2015-12-29', 'Vendedor: Doris Valle');
INSERT INTO `clientes_observaciones` VALUES ('14', '23', '2', '2015-12-29', 'VENTA: EVELYN PAZ');
INSERT INTO `clientes_observaciones` VALUES ('7', '8', '2', '2015-12-29', 'Vendedor: Evelyn Paz');
INSERT INTO `clientes_observaciones` VALUES ('8', '16', '2', '2015-12-29', 'Vendedor: Evelyn Paz');
INSERT INTO `clientes_observaciones` VALUES ('9', '17', '2', '2015-12-29', 'Venta: Evelyn Paz');
INSERT INTO `clientes_observaciones` VALUES ('10', '18', '2', '2015-12-29', 'VENTA: EVELYN PAZ');
INSERT INTO `clientes_observaciones` VALUES ('11', '19', '2', '2015-12-29', 'VENTA: EVELYN PAZ');
INSERT INTO `clientes_observaciones` VALUES ('12', '20', '2', '2015-12-29', 'VENTA: EVELYN PAZ');
INSERT INTO `clientes_observaciones` VALUES ('13', '21', '2', '2015-12-29', 'VENTA: EVELYN PAZ');
INSERT INTO `clientes_observaciones` VALUES ('15', '24', '2', '2015-12-29', 'VENTA: EVELYN PAZ');
INSERT INTO `clientes_observaciones` VALUES ('16', '25', '2', '2015-12-29', 'VENTA: EVELYN PAZ');
INSERT INTO `clientes_observaciones` VALUES ('17', '26', '2', '2015-12-29', 'Venta: Evelyn Paz');
INSERT INTO `clientes_observaciones` VALUES ('18', '27', '2', '2015-12-29', 'VENTA: EVELYN PAZ');
INSERT INTO `clientes_observaciones` VALUES ('19', '28', '2', '2015-12-30', 'VENTA: EVELYN PAZ');

-- ----------------------------
-- Table structure for clientes_recargas
-- ----------------------------
DROP TABLE IF EXISTS `clientes_recargas`;
CREATE TABLE `clientes_recargas` (
  `idRecarga` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) unsigned NOT NULL,
  `idUsuario` int(11) unsigned NOT NULL,
  `MontoReal` int(11) unsigned NOT NULL,
  `Monto` int(11) unsigned NOT NULL,
  `Fecha` date NOT NULL,
  `Ano` int(11) unsigned NOT NULL,
  `idMes` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idRecarga`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';

-- ----------------------------
-- Records of clientes_recargas
-- ----------------------------

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
-- Table structure for core_meses
-- ----------------------------
DROP TABLE IF EXISTS `core_meses`;
CREATE TABLE `core_meses` (
  `idMes` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(60) NOT NULL,
  PRIMARY KEY (`idMes`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of core_meses
-- ----------------------------
INSERT INTO `core_meses` VALUES ('1', 'Enero');
INSERT INTO `core_meses` VALUES ('2', 'Febrero');
INSERT INTO `core_meses` VALUES ('3', 'Marzo');
INSERT INTO `core_meses` VALUES ('4', 'Abril');
INSERT INTO `core_meses` VALUES ('5', 'Mayo');
INSERT INTO `core_meses` VALUES ('6', 'Junio');
INSERT INTO `core_meses` VALUES ('7', 'Julio');
INSERT INTO `core_meses` VALUES ('8', 'Agosto');
INSERT INTO `core_meses` VALUES ('9', 'Septiembre');
INSERT INTO `core_meses` VALUES ('10', 'Octubre');
INSERT INTO `core_meses` VALUES ('11', 'Noviembre');
INSERT INTO `core_meses` VALUES ('12', 'Diciembre');

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
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1 COMMENT='Administrador';

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
INSERT INTO `core_permisos` VALUES ('13', '2', 'admin_clientes_recarga.php?pagina=1', 'admin_clientes_recarga.php', 'Clientes - Recargas', '9998');

-- ----------------------------
-- Table structure for core_permisos_cat
-- ----------------------------
DROP TABLE IF EXISTS `core_permisos_cat`;
CREATE TABLE `core_permisos_cat` (
  `id_pmcat` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(60) NOT NULL,
  `idFont` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id_pmcat`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COMMENT='Administrador';

-- ----------------------------
-- Records of core_permisos_cat
-- ----------------------------
INSERT INTO `core_permisos_cat` VALUES ('1', 'Usuarios', '108');
INSERT INTO `core_permisos_cat` VALUES ('2', 'Clientes', '131');
INSERT INTO `core_permisos_cat` VALUES ('3', 'Mantenimiento', '128');

-- ----------------------------
-- Table structure for core_pines
-- ----------------------------
DROP TABLE IF EXISTS `core_pines`;
CREATE TABLE `core_pines` (
  `idPin` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(60) NOT NULL,
  `Valor` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idPin`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of core_pines
-- ----------------------------
INSERT INTO `core_pines` VALUES ('1', '5 Soles', '5');
INSERT INTO `core_pines` VALUES ('2', '10 Soles', '10');
INSERT INTO `core_pines` VALUES ('3', '20 Soles', '20');
INSERT INTO `core_pines` VALUES ('4', '5 Soles plus', '5');
INSERT INTO `core_pines` VALUES ('5', '10 Soles plus', '10');
INSERT INTO `core_pines` VALUES ('6', '20 Soles plus', '20');

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='Administrador';

-- ----------------------------
-- Records of core_sistemas
-- ----------------------------
INSERT INTO `core_sistemas` VALUES ('1', 'Easy Pago', '', '', '', '', '', '', '', '1', '', '', '', '', '', '', '0000-00-00', '0', '0', '0');

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
-- Table structure for ubicacion_departamento
-- ----------------------------
DROP TABLE IF EXISTS `ubicacion_departamento`;
CREATE TABLE `ubicacion_departamento` (
  `idDepartamento` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(80) NOT NULL,
  PRIMARY KEY (`idDepartamento`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ubicacion_departamento
-- ----------------------------
INSERT INTO `ubicacion_departamento` VALUES ('1', 'Amazonas');
INSERT INTO `ubicacion_departamento` VALUES ('2', 'Ancash');
INSERT INTO `ubicacion_departamento` VALUES ('3', 'Apurimac');
INSERT INTO `ubicacion_departamento` VALUES ('4', 'Arequipa');
INSERT INTO `ubicacion_departamento` VALUES ('5', 'Ayacucho');
INSERT INTO `ubicacion_departamento` VALUES ('6', 'Cajamarca');
INSERT INTO `ubicacion_departamento` VALUES ('7', 'Callao');
INSERT INTO `ubicacion_departamento` VALUES ('8', 'Cusco');
INSERT INTO `ubicacion_departamento` VALUES ('9', 'Huancavelica');
INSERT INTO `ubicacion_departamento` VALUES ('10', 'Huanuco');
INSERT INTO `ubicacion_departamento` VALUES ('11', 'Ica');
INSERT INTO `ubicacion_departamento` VALUES ('12', 'Junin');
INSERT INTO `ubicacion_departamento` VALUES ('13', 'La Libertad');
INSERT INTO `ubicacion_departamento` VALUES ('14', 'Lambayeque');
INSERT INTO `ubicacion_departamento` VALUES ('15', 'Lima');
INSERT INTO `ubicacion_departamento` VALUES ('16', 'Loreto');
INSERT INTO `ubicacion_departamento` VALUES ('17', 'Madre de Dios');
INSERT INTO `ubicacion_departamento` VALUES ('18', 'Moquegua');
INSERT INTO `ubicacion_departamento` VALUES ('19', 'Pasco');
INSERT INTO `ubicacion_departamento` VALUES ('20', 'Piura');
INSERT INTO `ubicacion_departamento` VALUES ('21', 'Puno');
INSERT INTO `ubicacion_departamento` VALUES ('22', 'San Martín');
INSERT INTO `ubicacion_departamento` VALUES ('23', 'Tacna');
INSERT INTO `ubicacion_departamento` VALUES ('24', 'Tumbes');
INSERT INTO `ubicacion_departamento` VALUES ('25', 'Ucayali');

-- ----------------------------
-- Table structure for ubicacion_distrito
-- ----------------------------
DROP TABLE IF EXISTS `ubicacion_distrito`;
CREATE TABLE `ubicacion_distrito` (
  `idDistrito` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idDepartamento` int(11) unsigned NOT NULL,
  `idProvincia` int(11) unsigned NOT NULL,
  `Nombre` varchar(80) NOT NULL,
  PRIMARY KEY (`idDistrito`)
) ENGINE=MyISAM AUTO_INCREMENT=1830 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ubicacion_distrito
-- ----------------------------
INSERT INTO `ubicacion_distrito` VALUES ('1', '1', '1', 'Chachapoyas');
INSERT INTO `ubicacion_distrito` VALUES ('2', '1', '1', 'Asuncion');
INSERT INTO `ubicacion_distrito` VALUES ('3', '1', '1', 'Balsas');
INSERT INTO `ubicacion_distrito` VALUES ('4', '1', '1', 'Cheto');
INSERT INTO `ubicacion_distrito` VALUES ('5', '1', '1', 'Chiliquin');
INSERT INTO `ubicacion_distrito` VALUES ('6', '1', '1', 'Chuquibamba');
INSERT INTO `ubicacion_distrito` VALUES ('7', '1', '1', 'Granada');
INSERT INTO `ubicacion_distrito` VALUES ('8', '1', '1', 'Huancas');
INSERT INTO `ubicacion_distrito` VALUES ('9', '1', '1', 'La Jalca');
INSERT INTO `ubicacion_distrito` VALUES ('10', '1', '1', 'Leimebamba');
INSERT INTO `ubicacion_distrito` VALUES ('11', '1', '1', 'Levanto');
INSERT INTO `ubicacion_distrito` VALUES ('12', '1', '1', 'Magdalena');
INSERT INTO `ubicacion_distrito` VALUES ('13', '1', '1', 'Mariscal Castilla');
INSERT INTO `ubicacion_distrito` VALUES ('14', '1', '1', 'Molinopampa');
INSERT INTO `ubicacion_distrito` VALUES ('15', '1', '1', 'Montevideo');
INSERT INTO `ubicacion_distrito` VALUES ('16', '1', '1', 'Olleros');
INSERT INTO `ubicacion_distrito` VALUES ('17', '1', '1', 'Quinjalca');
INSERT INTO `ubicacion_distrito` VALUES ('18', '1', '1', 'San Francisco De Daguas');
INSERT INTO `ubicacion_distrito` VALUES ('19', '1', '1', 'San Isidro De Maino');
INSERT INTO `ubicacion_distrito` VALUES ('20', '1', '1', 'Soloco');
INSERT INTO `ubicacion_distrito` VALUES ('21', '1', '1', 'Sonche');
INSERT INTO `ubicacion_distrito` VALUES ('22', '1', '2', 'La Peca');
INSERT INTO `ubicacion_distrito` VALUES ('23', '1', '2', 'Aramango');
INSERT INTO `ubicacion_distrito` VALUES ('24', '1', '2', 'Copallin');
INSERT INTO `ubicacion_distrito` VALUES ('25', '1', '2', 'El Parco');
INSERT INTO `ubicacion_distrito` VALUES ('26', '1', '2', 'Imaza');
INSERT INTO `ubicacion_distrito` VALUES ('27', '1', '3', 'Jumbilla');
INSERT INTO `ubicacion_distrito` VALUES ('28', '1', '3', 'Chisquilla');
INSERT INTO `ubicacion_distrito` VALUES ('29', '1', '3', 'Churuja');
INSERT INTO `ubicacion_distrito` VALUES ('30', '1', '3', 'Corosha');
INSERT INTO `ubicacion_distrito` VALUES ('31', '1', '3', 'Cuispes');
INSERT INTO `ubicacion_distrito` VALUES ('32', '1', '3', 'Florida');
INSERT INTO `ubicacion_distrito` VALUES ('33', '1', '3', 'Jazan');
INSERT INTO `ubicacion_distrito` VALUES ('34', '1', '3', 'Recta');
INSERT INTO `ubicacion_distrito` VALUES ('35', '1', '3', 'San Carlos');
INSERT INTO `ubicacion_distrito` VALUES ('36', '1', '3', 'Shipasbamba');
INSERT INTO `ubicacion_distrito` VALUES ('37', '1', '3', 'Valera');
INSERT INTO `ubicacion_distrito` VALUES ('38', '1', '3', 'Yambrasbamba');
INSERT INTO `ubicacion_distrito` VALUES ('39', '1', '4', 'Nieva');
INSERT INTO `ubicacion_distrito` VALUES ('40', '1', '4', 'El Cenepa');
INSERT INTO `ubicacion_distrito` VALUES ('41', '1', '4', 'Rio Santiago');
INSERT INTO `ubicacion_distrito` VALUES ('42', '1', '5', 'Lamud');
INSERT INTO `ubicacion_distrito` VALUES ('43', '1', '5', 'Camporredondo');
INSERT INTO `ubicacion_distrito` VALUES ('44', '1', '5', 'Cocabamba');
INSERT INTO `ubicacion_distrito` VALUES ('45', '1', '5', 'Colcamar');
INSERT INTO `ubicacion_distrito` VALUES ('46', '1', '5', 'Conila');
INSERT INTO `ubicacion_distrito` VALUES ('47', '1', '5', 'Inguilpata');
INSERT INTO `ubicacion_distrito` VALUES ('48', '1', '5', 'Longuita');
INSERT INTO `ubicacion_distrito` VALUES ('49', '1', '5', 'Lonya Chico');
INSERT INTO `ubicacion_distrito` VALUES ('50', '1', '5', 'Luya');
INSERT INTO `ubicacion_distrito` VALUES ('51', '1', '5', 'Luya Viejo');
INSERT INTO `ubicacion_distrito` VALUES ('52', '1', '5', 'Maria');
INSERT INTO `ubicacion_distrito` VALUES ('53', '1', '5', 'Ocalli');
INSERT INTO `ubicacion_distrito` VALUES ('54', '1', '5', 'Ocumal');
INSERT INTO `ubicacion_distrito` VALUES ('55', '1', '5', 'Pisuquia');
INSERT INTO `ubicacion_distrito` VALUES ('56', '1', '5', 'Providencia');
INSERT INTO `ubicacion_distrito` VALUES ('57', '1', '5', 'San Cristobal');
INSERT INTO `ubicacion_distrito` VALUES ('58', '1', '5', 'San Francisco Del Yeso');
INSERT INTO `ubicacion_distrito` VALUES ('59', '1', '5', 'San Jeronimo');
INSERT INTO `ubicacion_distrito` VALUES ('60', '1', '5', 'San Juan De Lopecancha');
INSERT INTO `ubicacion_distrito` VALUES ('61', '1', '5', 'Santa Catalina');
INSERT INTO `ubicacion_distrito` VALUES ('62', '1', '5', 'Santo Tomas');
INSERT INTO `ubicacion_distrito` VALUES ('63', '1', '5', 'Tingo');
INSERT INTO `ubicacion_distrito` VALUES ('64', '1', '5', 'Trita');
INSERT INTO `ubicacion_distrito` VALUES ('65', '1', '6', 'San Nicolas');
INSERT INTO `ubicacion_distrito` VALUES ('66', '1', '6', 'Chirimoto');
INSERT INTO `ubicacion_distrito` VALUES ('67', '1', '6', 'Cochamal');
INSERT INTO `ubicacion_distrito` VALUES ('68', '1', '6', 'Huambo');
INSERT INTO `ubicacion_distrito` VALUES ('69', '1', '6', 'Limabamba');
INSERT INTO `ubicacion_distrito` VALUES ('70', '1', '6', 'Longar');
INSERT INTO `ubicacion_distrito` VALUES ('71', '1', '6', 'Mariscal Benavides');
INSERT INTO `ubicacion_distrito` VALUES ('72', '1', '6', 'Milpuc');
INSERT INTO `ubicacion_distrito` VALUES ('73', '1', '6', 'Omia');
INSERT INTO `ubicacion_distrito` VALUES ('74', '1', '6', 'Santa Rosa');
INSERT INTO `ubicacion_distrito` VALUES ('75', '1', '6', 'Totora');
INSERT INTO `ubicacion_distrito` VALUES ('76', '1', '6', 'Vista Alegre');
INSERT INTO `ubicacion_distrito` VALUES ('77', '1', '7', 'Bagua Grande');
INSERT INTO `ubicacion_distrito` VALUES ('78', '1', '7', 'Cajaruro');
INSERT INTO `ubicacion_distrito` VALUES ('79', '1', '7', 'Cumba');
INSERT INTO `ubicacion_distrito` VALUES ('80', '1', '7', 'El Milagro');
INSERT INTO `ubicacion_distrito` VALUES ('81', '1', '7', 'Jamalca');
INSERT INTO `ubicacion_distrito` VALUES ('82', '1', '7', 'Lonya Grande');
INSERT INTO `ubicacion_distrito` VALUES ('83', '1', '7', 'Yamon');
INSERT INTO `ubicacion_distrito` VALUES ('84', '2', '8', 'Huaraz');
INSERT INTO `ubicacion_distrito` VALUES ('85', '2', '8', 'Cochabamba');
INSERT INTO `ubicacion_distrito` VALUES ('86', '2', '8', 'Colcabamba');
INSERT INTO `ubicacion_distrito` VALUES ('87', '2', '8', 'Huanchay');
INSERT INTO `ubicacion_distrito` VALUES ('88', '2', '8', 'Independencia');
INSERT INTO `ubicacion_distrito` VALUES ('89', '2', '8', 'Jangas');
INSERT INTO `ubicacion_distrito` VALUES ('90', '2', '8', 'La Libertad');
INSERT INTO `ubicacion_distrito` VALUES ('91', '2', '8', 'Olleros');
INSERT INTO `ubicacion_distrito` VALUES ('92', '2', '8', 'Pampas');
INSERT INTO `ubicacion_distrito` VALUES ('93', '2', '8', 'Pariacoto');
INSERT INTO `ubicacion_distrito` VALUES ('94', '2', '8', 'Pira');
INSERT INTO `ubicacion_distrito` VALUES ('95', '2', '8', 'Tarica');
INSERT INTO `ubicacion_distrito` VALUES ('96', '2', '9', 'Aija');
INSERT INTO `ubicacion_distrito` VALUES ('97', '2', '9', 'Coris');
INSERT INTO `ubicacion_distrito` VALUES ('98', '2', '9', 'Huacllan');
INSERT INTO `ubicacion_distrito` VALUES ('99', '2', '9', 'La Merced');
INSERT INTO `ubicacion_distrito` VALUES ('100', '2', '9', 'Succha');
INSERT INTO `ubicacion_distrito` VALUES ('101', '2', '10', 'Llamellin');
INSERT INTO `ubicacion_distrito` VALUES ('102', '2', '10', 'Aczo');
INSERT INTO `ubicacion_distrito` VALUES ('103', '2', '10', 'Chaccho');
INSERT INTO `ubicacion_distrito` VALUES ('104', '2', '10', 'Chingas');
INSERT INTO `ubicacion_distrito` VALUES ('105', '2', '10', 'Mirgas');
INSERT INTO `ubicacion_distrito` VALUES ('106', '2', '10', 'San Juan De Rontoy');
INSERT INTO `ubicacion_distrito` VALUES ('107', '2', '11', 'Chacas');
INSERT INTO `ubicacion_distrito` VALUES ('108', '2', '11', 'Acochaca');
INSERT INTO `ubicacion_distrito` VALUES ('109', '2', '12', 'Chiquian');
INSERT INTO `ubicacion_distrito` VALUES ('110', '2', '12', 'Abelardo Pardo Lezameta');
INSERT INTO `ubicacion_distrito` VALUES ('111', '2', '12', 'Antonio Raymondi');
INSERT INTO `ubicacion_distrito` VALUES ('112', '2', '12', 'Aquia');
INSERT INTO `ubicacion_distrito` VALUES ('113', '2', '12', 'Cajacay');
INSERT INTO `ubicacion_distrito` VALUES ('114', '2', '12', 'Canis');
INSERT INTO `ubicacion_distrito` VALUES ('115', '2', '12', 'Colquioc');
INSERT INTO `ubicacion_distrito` VALUES ('116', '2', '12', 'Huallanca');
INSERT INTO `ubicacion_distrito` VALUES ('117', '2', '12', 'Huasta');
INSERT INTO `ubicacion_distrito` VALUES ('118', '2', '12', 'Huayllacayan');
INSERT INTO `ubicacion_distrito` VALUES ('119', '2', '12', 'La Primavera');
INSERT INTO `ubicacion_distrito` VALUES ('120', '2', '12', 'Mangas');
INSERT INTO `ubicacion_distrito` VALUES ('121', '2', '12', 'Pacllon');
INSERT INTO `ubicacion_distrito` VALUES ('122', '2', '12', 'San Miguel De Corpanqui');
INSERT INTO `ubicacion_distrito` VALUES ('123', '2', '12', 'Ticllos');
INSERT INTO `ubicacion_distrito` VALUES ('124', '2', '13', 'Carhuaz');
INSERT INTO `ubicacion_distrito` VALUES ('125', '2', '13', 'Acopampa');
INSERT INTO `ubicacion_distrito` VALUES ('126', '2', '13', 'Amashca');
INSERT INTO `ubicacion_distrito` VALUES ('127', '2', '13', 'Anta');
INSERT INTO `ubicacion_distrito` VALUES ('128', '2', '13', 'Ataquero');
INSERT INTO `ubicacion_distrito` VALUES ('129', '2', '13', 'Marcara');
INSERT INTO `ubicacion_distrito` VALUES ('130', '2', '13', 'Pariahuanca');
INSERT INTO `ubicacion_distrito` VALUES ('131', '2', '13', 'San Miguel De Aco');
INSERT INTO `ubicacion_distrito` VALUES ('132', '2', '13', 'Shilla');
INSERT INTO `ubicacion_distrito` VALUES ('133', '2', '13', 'Tinco');
INSERT INTO `ubicacion_distrito` VALUES ('134', '2', '13', 'Yungar');
INSERT INTO `ubicacion_distrito` VALUES ('135', '2', '14', 'San Luis');
INSERT INTO `ubicacion_distrito` VALUES ('136', '2', '14', 'San Nicolas');
INSERT INTO `ubicacion_distrito` VALUES ('137', '2', '14', 'Yauya');
INSERT INTO `ubicacion_distrito` VALUES ('138', '2', '15', 'Casma');
INSERT INTO `ubicacion_distrito` VALUES ('139', '2', '15', 'Buena Vista Alta');
INSERT INTO `ubicacion_distrito` VALUES ('140', '2', '15', 'Comandante Noel');
INSERT INTO `ubicacion_distrito` VALUES ('141', '2', '15', 'Yautan');
INSERT INTO `ubicacion_distrito` VALUES ('142', '2', '16', 'Corongo');
INSERT INTO `ubicacion_distrito` VALUES ('143', '2', '16', 'Aco');
INSERT INTO `ubicacion_distrito` VALUES ('144', '2', '16', 'Bambas');
INSERT INTO `ubicacion_distrito` VALUES ('145', '2', '16', 'Cusca');
INSERT INTO `ubicacion_distrito` VALUES ('146', '2', '16', 'La Pampa');
INSERT INTO `ubicacion_distrito` VALUES ('147', '2', '16', 'Yanac');
INSERT INTO `ubicacion_distrito` VALUES ('148', '2', '16', 'Yupan');
INSERT INTO `ubicacion_distrito` VALUES ('149', '2', '17', 'Huari');
INSERT INTO `ubicacion_distrito` VALUES ('150', '2', '17', 'Anra');
INSERT INTO `ubicacion_distrito` VALUES ('151', '2', '17', 'Cajay');
INSERT INTO `ubicacion_distrito` VALUES ('152', '2', '17', 'Chavin De Huantar');
INSERT INTO `ubicacion_distrito` VALUES ('153', '2', '17', 'Huacachi');
INSERT INTO `ubicacion_distrito` VALUES ('154', '2', '17', 'Huacchis');
INSERT INTO `ubicacion_distrito` VALUES ('155', '2', '17', 'Huachis');
INSERT INTO `ubicacion_distrito` VALUES ('156', '2', '17', 'Huantar');
INSERT INTO `ubicacion_distrito` VALUES ('157', '2', '17', 'Masin');
INSERT INTO `ubicacion_distrito` VALUES ('158', '2', '17', 'Paucas');
INSERT INTO `ubicacion_distrito` VALUES ('159', '2', '17', 'Ponto');
INSERT INTO `ubicacion_distrito` VALUES ('160', '2', '17', 'Rahuapampa');
INSERT INTO `ubicacion_distrito` VALUES ('161', '2', '17', 'Rapayan');
INSERT INTO `ubicacion_distrito` VALUES ('162', '2', '17', 'San Marcos');
INSERT INTO `ubicacion_distrito` VALUES ('163', '2', '17', 'San Pedro De Chana');
INSERT INTO `ubicacion_distrito` VALUES ('164', '2', '17', 'Uco');
INSERT INTO `ubicacion_distrito` VALUES ('165', '2', '18', 'Huarmey');
INSERT INTO `ubicacion_distrito` VALUES ('166', '2', '18', 'Cochapeti');
INSERT INTO `ubicacion_distrito` VALUES ('167', '2', '18', 'Culebras');
INSERT INTO `ubicacion_distrito` VALUES ('168', '2', '18', 'Huayan');
INSERT INTO `ubicacion_distrito` VALUES ('169', '2', '18', 'Malvas');
INSERT INTO `ubicacion_distrito` VALUES ('170', '2', '19', 'Caraz');
INSERT INTO `ubicacion_distrito` VALUES ('171', '2', '19', 'Huallanca');
INSERT INTO `ubicacion_distrito` VALUES ('172', '2', '19', 'Huata');
INSERT INTO `ubicacion_distrito` VALUES ('173', '2', '19', 'Huaylas');
INSERT INTO `ubicacion_distrito` VALUES ('174', '2', '19', 'Mato');
INSERT INTO `ubicacion_distrito` VALUES ('175', '2', '19', 'Pamparomas');
INSERT INTO `ubicacion_distrito` VALUES ('176', '2', '19', 'Pueblo Libre');
INSERT INTO `ubicacion_distrito` VALUES ('177', '2', '19', 'Santa Cruz');
INSERT INTO `ubicacion_distrito` VALUES ('178', '2', '19', 'Santo Toribio');
INSERT INTO `ubicacion_distrito` VALUES ('179', '2', '19', 'Yuracmarca');
INSERT INTO `ubicacion_distrito` VALUES ('180', '2', '20', 'Piscobamba');
INSERT INTO `ubicacion_distrito` VALUES ('181', '2', '20', 'Casca');
INSERT INTO `ubicacion_distrito` VALUES ('182', '2', '20', 'Eleazar Guzman Barron');
INSERT INTO `ubicacion_distrito` VALUES ('183', '2', '20', 'Fidel Olivas Escudero');
INSERT INTO `ubicacion_distrito` VALUES ('184', '2', '20', 'Llama');
INSERT INTO `ubicacion_distrito` VALUES ('185', '2', '20', 'Llumpa');
INSERT INTO `ubicacion_distrito` VALUES ('186', '2', '20', 'Lucma');
INSERT INTO `ubicacion_distrito` VALUES ('187', '2', '20', 'Musga');
INSERT INTO `ubicacion_distrito` VALUES ('188', '2', '21', 'Ocros');
INSERT INTO `ubicacion_distrito` VALUES ('189', '2', '21', 'Acas');
INSERT INTO `ubicacion_distrito` VALUES ('190', '2', '21', 'Cajamarquilla');
INSERT INTO `ubicacion_distrito` VALUES ('191', '2', '21', 'Carhuapampa');
INSERT INTO `ubicacion_distrito` VALUES ('192', '2', '21', 'Cochas');
INSERT INTO `ubicacion_distrito` VALUES ('193', '2', '21', 'Congas');
INSERT INTO `ubicacion_distrito` VALUES ('194', '2', '21', 'Llipa');
INSERT INTO `ubicacion_distrito` VALUES ('195', '2', '21', 'San Cristobal De Rajan');
INSERT INTO `ubicacion_distrito` VALUES ('196', '2', '21', 'San Pedro');
INSERT INTO `ubicacion_distrito` VALUES ('197', '2', '21', 'Santiago De Chilcas');
INSERT INTO `ubicacion_distrito` VALUES ('198', '2', '22', 'Cabana');
INSERT INTO `ubicacion_distrito` VALUES ('199', '2', '22', 'Bolognesi');
INSERT INTO `ubicacion_distrito` VALUES ('200', '2', '22', 'Conchucos');
INSERT INTO `ubicacion_distrito` VALUES ('201', '2', '22', 'Huacaschuque');
INSERT INTO `ubicacion_distrito` VALUES ('202', '2', '22', 'Huandoval');
INSERT INTO `ubicacion_distrito` VALUES ('203', '2', '22', 'Lacabamba');
INSERT INTO `ubicacion_distrito` VALUES ('204', '2', '22', 'Llapo');
INSERT INTO `ubicacion_distrito` VALUES ('205', '2', '22', 'Pallasca');
INSERT INTO `ubicacion_distrito` VALUES ('206', '2', '22', 'Pampas');
INSERT INTO `ubicacion_distrito` VALUES ('207', '2', '22', 'Santa Rosa');
INSERT INTO `ubicacion_distrito` VALUES ('208', '2', '22', 'Tauca');
INSERT INTO `ubicacion_distrito` VALUES ('209', '2', '23', 'Pomabamba');
INSERT INTO `ubicacion_distrito` VALUES ('210', '2', '23', 'Huayllan');
INSERT INTO `ubicacion_distrito` VALUES ('211', '2', '23', 'Parobamba');
INSERT INTO `ubicacion_distrito` VALUES ('212', '2', '23', 'Quinuabamba');
INSERT INTO `ubicacion_distrito` VALUES ('213', '2', '24', 'Recuay');
INSERT INTO `ubicacion_distrito` VALUES ('214', '2', '24', 'Catac');
INSERT INTO `ubicacion_distrito` VALUES ('215', '2', '24', 'Cotaparaco');
INSERT INTO `ubicacion_distrito` VALUES ('216', '2', '24', 'Huayllapampa');
INSERT INTO `ubicacion_distrito` VALUES ('217', '2', '24', 'Llacllin');
INSERT INTO `ubicacion_distrito` VALUES ('218', '2', '24', 'Marca');
INSERT INTO `ubicacion_distrito` VALUES ('219', '2', '24', 'Pampas Chico');
INSERT INTO `ubicacion_distrito` VALUES ('220', '2', '24', 'Pararin');
INSERT INTO `ubicacion_distrito` VALUES ('221', '2', '24', 'Tapacocha');
INSERT INTO `ubicacion_distrito` VALUES ('222', '2', '24', 'Ticapampa');
INSERT INTO `ubicacion_distrito` VALUES ('223', '2', '25', 'Chimbote');
INSERT INTO `ubicacion_distrito` VALUES ('224', '2', '25', 'Caceres Del Peru');
INSERT INTO `ubicacion_distrito` VALUES ('225', '2', '25', 'Coishco');
INSERT INTO `ubicacion_distrito` VALUES ('226', '2', '25', 'Macate');
INSERT INTO `ubicacion_distrito` VALUES ('227', '2', '25', 'Moro');
INSERT INTO `ubicacion_distrito` VALUES ('228', '2', '25', 'Nepeña');
INSERT INTO `ubicacion_distrito` VALUES ('229', '2', '25', 'Samanco');
INSERT INTO `ubicacion_distrito` VALUES ('230', '2', '25', 'Santa');
INSERT INTO `ubicacion_distrito` VALUES ('231', '2', '25', 'Nuevo Chimbote');
INSERT INTO `ubicacion_distrito` VALUES ('232', '2', '26', 'Sihuas');
INSERT INTO `ubicacion_distrito` VALUES ('233', '2', '26', 'Acobamba');
INSERT INTO `ubicacion_distrito` VALUES ('234', '2', '26', 'Alfonso Ugarte');
INSERT INTO `ubicacion_distrito` VALUES ('235', '2', '26', 'Cashapampa');
INSERT INTO `ubicacion_distrito` VALUES ('236', '2', '26', 'Chingalpo');
INSERT INTO `ubicacion_distrito` VALUES ('237', '2', '26', 'Huayllabamba');
INSERT INTO `ubicacion_distrito` VALUES ('238', '2', '26', 'Quiches');
INSERT INTO `ubicacion_distrito` VALUES ('239', '2', '26', 'Ragash');
INSERT INTO `ubicacion_distrito` VALUES ('240', '2', '26', 'San Juan');
INSERT INTO `ubicacion_distrito` VALUES ('241', '2', '26', 'Sicsibamba');
INSERT INTO `ubicacion_distrito` VALUES ('242', '2', '27', 'Yungay');
INSERT INTO `ubicacion_distrito` VALUES ('243', '2', '27', 'Cascapara');
INSERT INTO `ubicacion_distrito` VALUES ('244', '2', '27', 'Mancos');
INSERT INTO `ubicacion_distrito` VALUES ('245', '2', '27', 'Matacoto');
INSERT INTO `ubicacion_distrito` VALUES ('246', '2', '27', 'Quillo');
INSERT INTO `ubicacion_distrito` VALUES ('247', '2', '27', 'Ranrahirca');
INSERT INTO `ubicacion_distrito` VALUES ('248', '2', '27', 'Shupluy');
INSERT INTO `ubicacion_distrito` VALUES ('249', '2', '27', 'Yanama');
INSERT INTO `ubicacion_distrito` VALUES ('250', '3', '28', 'Abancay');
INSERT INTO `ubicacion_distrito` VALUES ('251', '3', '28', 'Chacoche');
INSERT INTO `ubicacion_distrito` VALUES ('252', '3', '28', 'Circa');
INSERT INTO `ubicacion_distrito` VALUES ('253', '3', '28', 'Curahuasi');
INSERT INTO `ubicacion_distrito` VALUES ('254', '3', '28', 'Huanipaca');
INSERT INTO `ubicacion_distrito` VALUES ('255', '3', '28', 'Lambrama');
INSERT INTO `ubicacion_distrito` VALUES ('256', '3', '28', 'Pichirhua');
INSERT INTO `ubicacion_distrito` VALUES ('257', '3', '28', 'San Pedro De Cachora');
INSERT INTO `ubicacion_distrito` VALUES ('258', '3', '28', 'Tamburco');
INSERT INTO `ubicacion_distrito` VALUES ('259', '3', '29', 'Andahuaylas');
INSERT INTO `ubicacion_distrito` VALUES ('260', '3', '29', 'Andarapa');
INSERT INTO `ubicacion_distrito` VALUES ('261', '3', '29', 'Chiara');
INSERT INTO `ubicacion_distrito` VALUES ('262', '3', '29', 'Huancarama');
INSERT INTO `ubicacion_distrito` VALUES ('263', '3', '29', 'Huancaray');
INSERT INTO `ubicacion_distrito` VALUES ('264', '3', '29', 'Huayana');
INSERT INTO `ubicacion_distrito` VALUES ('265', '3', '29', 'Kishuara');
INSERT INTO `ubicacion_distrito` VALUES ('266', '3', '29', 'Pacobamba');
INSERT INTO `ubicacion_distrito` VALUES ('267', '3', '29', 'Pacucha');
INSERT INTO `ubicacion_distrito` VALUES ('268', '3', '29', 'Pampachiri');
INSERT INTO `ubicacion_distrito` VALUES ('269', '3', '29', 'Pomacocha');
INSERT INTO `ubicacion_distrito` VALUES ('270', '3', '29', 'San Antonio De Cachi');
INSERT INTO `ubicacion_distrito` VALUES ('271', '3', '29', 'San Jeronimo');
INSERT INTO `ubicacion_distrito` VALUES ('272', '3', '29', 'San Miguel De Chaccrampa');
INSERT INTO `ubicacion_distrito` VALUES ('273', '3', '29', 'Santa Maria De Chicmo');
INSERT INTO `ubicacion_distrito` VALUES ('274', '3', '29', 'Talavera');
INSERT INTO `ubicacion_distrito` VALUES ('275', '3', '29', 'Tumay Huaraca');
INSERT INTO `ubicacion_distrito` VALUES ('276', '3', '29', 'Turpo');
INSERT INTO `ubicacion_distrito` VALUES ('277', '3', '29', 'Kaquiabamba');
INSERT INTO `ubicacion_distrito` VALUES ('278', '3', '30', 'Antabamba');
INSERT INTO `ubicacion_distrito` VALUES ('279', '3', '30', 'El Oro');
INSERT INTO `ubicacion_distrito` VALUES ('280', '3', '30', 'Huaquirca');
INSERT INTO `ubicacion_distrito` VALUES ('281', '3', '30', 'Juan Espinoza Medrano');
INSERT INTO `ubicacion_distrito` VALUES ('282', '3', '30', 'Oropesa');
INSERT INTO `ubicacion_distrito` VALUES ('283', '3', '30', 'Pachaconas');
INSERT INTO `ubicacion_distrito` VALUES ('284', '3', '30', 'Sabaino');
INSERT INTO `ubicacion_distrito` VALUES ('285', '3', '31', 'Chalhuanca');
INSERT INTO `ubicacion_distrito` VALUES ('286', '3', '31', 'Capaya');
INSERT INTO `ubicacion_distrito` VALUES ('287', '3', '31', 'Caraybamba');
INSERT INTO `ubicacion_distrito` VALUES ('288', '3', '31', 'Chapimarca');
INSERT INTO `ubicacion_distrito` VALUES ('289', '3', '31', 'Colcabamba');
INSERT INTO `ubicacion_distrito` VALUES ('290', '3', '31', 'Cotaruse');
INSERT INTO `ubicacion_distrito` VALUES ('291', '3', '31', 'Huayllo');
INSERT INTO `ubicacion_distrito` VALUES ('292', '3', '31', 'Justo Apu Sahuaraura');
INSERT INTO `ubicacion_distrito` VALUES ('293', '3', '31', 'Lucre');
INSERT INTO `ubicacion_distrito` VALUES ('294', '3', '31', 'Pocohuanca');
INSERT INTO `ubicacion_distrito` VALUES ('295', '3', '31', 'San Juan De Chacña');
INSERT INTO `ubicacion_distrito` VALUES ('296', '3', '31', 'Sañayca');
INSERT INTO `ubicacion_distrito` VALUES ('297', '3', '31', 'Soraya');
INSERT INTO `ubicacion_distrito` VALUES ('298', '3', '31', 'Tapairihua');
INSERT INTO `ubicacion_distrito` VALUES ('299', '3', '31', 'Tintay');
INSERT INTO `ubicacion_distrito` VALUES ('300', '3', '31', 'Toraya');
INSERT INTO `ubicacion_distrito` VALUES ('301', '3', '31', 'Yanaca');
INSERT INTO `ubicacion_distrito` VALUES ('302', '3', '32', 'Tambobamba');
INSERT INTO `ubicacion_distrito` VALUES ('303', '3', '32', 'Cotabambas');
INSERT INTO `ubicacion_distrito` VALUES ('304', '3', '32', 'Coyllurqui');
INSERT INTO `ubicacion_distrito` VALUES ('305', '3', '32', 'Haquira');
INSERT INTO `ubicacion_distrito` VALUES ('306', '3', '32', 'Mara');
INSERT INTO `ubicacion_distrito` VALUES ('307', '3', '32', 'Challhuahuacho');
INSERT INTO `ubicacion_distrito` VALUES ('308', '3', '33', 'Chincheros');
INSERT INTO `ubicacion_distrito` VALUES ('309', '3', '33', 'Anco-Huallo');
INSERT INTO `ubicacion_distrito` VALUES ('310', '3', '33', 'Cocharcas');
INSERT INTO `ubicacion_distrito` VALUES ('311', '3', '33', 'Huaccana');
INSERT INTO `ubicacion_distrito` VALUES ('312', '3', '33', 'Ocobamba');
INSERT INTO `ubicacion_distrito` VALUES ('313', '3', '33', 'Ongoy');
INSERT INTO `ubicacion_distrito` VALUES ('314', '3', '33', 'Uranmarca');
INSERT INTO `ubicacion_distrito` VALUES ('315', '3', '33', 'Ranracancha');
INSERT INTO `ubicacion_distrito` VALUES ('316', '3', '34', 'Chuquibambilla');
INSERT INTO `ubicacion_distrito` VALUES ('317', '3', '34', 'Curpahuasi');
INSERT INTO `ubicacion_distrito` VALUES ('318', '3', '34', 'Gamarra');
INSERT INTO `ubicacion_distrito` VALUES ('319', '3', '34', 'Huayllati');
INSERT INTO `ubicacion_distrito` VALUES ('320', '3', '34', 'Mamara');
INSERT INTO `ubicacion_distrito` VALUES ('321', '3', '34', 'Micaela Bastidas');
INSERT INTO `ubicacion_distrito` VALUES ('322', '3', '34', 'Pataypampa');
INSERT INTO `ubicacion_distrito` VALUES ('323', '3', '34', 'Progreso');
INSERT INTO `ubicacion_distrito` VALUES ('324', '3', '34', 'San Antonio');
INSERT INTO `ubicacion_distrito` VALUES ('325', '3', '34', 'Santa Ros a');
INSERT INTO `ubicacion_distrito` VALUES ('326', '3', '34', 'Turpay');
INSERT INTO `ubicacion_distrito` VALUES ('327', '3', '34', 'Vilcabamba');
INSERT INTO `ubicacion_distrito` VALUES ('328', '3', '34', 'Virundo');
INSERT INTO `ubicacion_distrito` VALUES ('329', '3', '34', 'Curasco');
INSERT INTO `ubicacion_distrito` VALUES ('330', '4', '35', 'Arequipa');
INSERT INTO `ubicacion_distrito` VALUES ('331', '4', '35', 'Alto Selva Alegre');
INSERT INTO `ubicacion_distrito` VALUES ('332', '4', '35', 'Cayma');
INSERT INTO `ubicacion_distrito` VALUES ('333', '4', '35', 'Cerro Colorado');
INSERT INTO `ubicacion_distrito` VALUES ('334', '4', '35', 'Characato');
INSERT INTO `ubicacion_distrito` VALUES ('335', '4', '35', 'Chiguata');
INSERT INTO `ubicacion_distrito` VALUES ('336', '4', '35', 'Jacobo Hunter');
INSERT INTO `ubicacion_distrito` VALUES ('337', '4', '35', 'La Joya');
INSERT INTO `ubicacion_distrito` VALUES ('338', '4', '35', 'Mariano Melgar');
INSERT INTO `ubicacion_distrito` VALUES ('339', '4', '35', 'Miraflores');
INSERT INTO `ubicacion_distrito` VALUES ('340', '4', '35', 'Mollebaya');
INSERT INTO `ubicacion_distrito` VALUES ('341', '4', '35', 'Paucarpata');
INSERT INTO `ubicacion_distrito` VALUES ('342', '4', '35', 'Pocsi');
INSERT INTO `ubicacion_distrito` VALUES ('343', '4', '35', 'Polobaya');
INSERT INTO `ubicacion_distrito` VALUES ('344', '4', '35', 'Quequeña');
INSERT INTO `ubicacion_distrito` VALUES ('345', '4', '35', 'Sabandia');
INSERT INTO `ubicacion_distrito` VALUES ('346', '4', '35', 'Sachaca');
INSERT INTO `ubicacion_distrito` VALUES ('347', '4', '35', 'San Juan De Siguas');
INSERT INTO `ubicacion_distrito` VALUES ('348', '4', '35', 'San Juan De Tarucani');
INSERT INTO `ubicacion_distrito` VALUES ('349', '4', '35', 'Santa Isabel De Siguas');
INSERT INTO `ubicacion_distrito` VALUES ('350', '4', '35', 'Santa Rita De Siguas');
INSERT INTO `ubicacion_distrito` VALUES ('351', '4', '35', 'Socabaya');
INSERT INTO `ubicacion_distrito` VALUES ('352', '4', '35', 'Tiabaya');
INSERT INTO `ubicacion_distrito` VALUES ('353', '4', '35', 'Uchumayo');
INSERT INTO `ubicacion_distrito` VALUES ('354', '4', '35', 'Vitor');
INSERT INTO `ubicacion_distrito` VALUES ('355', '4', '35', 'Yanahuara');
INSERT INTO `ubicacion_distrito` VALUES ('356', '4', '35', 'Yarabamba');
INSERT INTO `ubicacion_distrito` VALUES ('357', '4', '35', 'Yura');
INSERT INTO `ubicacion_distrito` VALUES ('358', '4', '35', 'Jose Luis Bustamante Y Rive');
INSERT INTO `ubicacion_distrito` VALUES ('359', '4', '36', 'Camana');
INSERT INTO `ubicacion_distrito` VALUES ('360', '4', '36', 'Jose Maria Quimper');
INSERT INTO `ubicacion_distrito` VALUES ('361', '4', '36', 'Mariano Nicolas Valcarcel');
INSERT INTO `ubicacion_distrito` VALUES ('362', '4', '36', 'Mariscal Caceres');
INSERT INTO `ubicacion_distrito` VALUES ('363', '4', '36', 'Nicolas De Pierola');
INSERT INTO `ubicacion_distrito` VALUES ('364', '4', '36', 'Ocoña');
INSERT INTO `ubicacion_distrito` VALUES ('365', '4', '36', 'Quilca');
INSERT INTO `ubicacion_distrito` VALUES ('366', '4', '36', 'Samuel Pastor');
INSERT INTO `ubicacion_distrito` VALUES ('367', '4', '37', 'Caraveli');
INSERT INTO `ubicacion_distrito` VALUES ('368', '4', '37', 'Acari');
INSERT INTO `ubicacion_distrito` VALUES ('369', '4', '37', 'Atico');
INSERT INTO `ubicacion_distrito` VALUES ('370', '4', '37', 'Atiquipa');
INSERT INTO `ubicacion_distrito` VALUES ('371', '4', '37', 'Bella Union');
INSERT INTO `ubicacion_distrito` VALUES ('372', '4', '37', 'Cahuacho');
INSERT INTO `ubicacion_distrito` VALUES ('373', '4', '37', 'Chala');
INSERT INTO `ubicacion_distrito` VALUES ('374', '4', '37', 'Chaparra');
INSERT INTO `ubicacion_distrito` VALUES ('375', '4', '37', 'Huanuhuanu');
INSERT INTO `ubicacion_distrito` VALUES ('376', '4', '37', 'Jaqui');
INSERT INTO `ubicacion_distrito` VALUES ('377', '4', '37', 'Lomas');
INSERT INTO `ubicacion_distrito` VALUES ('378', '4', '37', 'Quicacha');
INSERT INTO `ubicacion_distrito` VALUES ('379', '4', '37', 'Yauca');
INSERT INTO `ubicacion_distrito` VALUES ('380', '4', '38', 'Aplao');
INSERT INTO `ubicacion_distrito` VALUES ('381', '4', '38', 'Andagua');
INSERT INTO `ubicacion_distrito` VALUES ('382', '4', '38', 'Ayo');
INSERT INTO `ubicacion_distrito` VALUES ('383', '4', '38', 'Chachas');
INSERT INTO `ubicacion_distrito` VALUES ('384', '4', '38', 'Chilcaymarca');
INSERT INTO `ubicacion_distrito` VALUES ('385', '4', '38', 'Choco');
INSERT INTO `ubicacion_distrito` VALUES ('386', '4', '38', 'Huancarqui');
INSERT INTO `ubicacion_distrito` VALUES ('387', '4', '38', 'Machaguay');
INSERT INTO `ubicacion_distrito` VALUES ('388', '4', '38', 'Orcopampa');
INSERT INTO `ubicacion_distrito` VALUES ('389', '4', '38', 'Pampacolca');
INSERT INTO `ubicacion_distrito` VALUES ('390', '4', '38', 'Tipan');
INSERT INTO `ubicacion_distrito` VALUES ('391', '4', '38', 'Uñon');
INSERT INTO `ubicacion_distrito` VALUES ('392', '4', '38', 'Uraca');
INSERT INTO `ubicacion_distrito` VALUES ('393', '4', '38', 'Viraco');
INSERT INTO `ubicacion_distrito` VALUES ('394', '4', '39', 'Chivay');
INSERT INTO `ubicacion_distrito` VALUES ('395', '4', '39', 'Achoma');
INSERT INTO `ubicacion_distrito` VALUES ('396', '4', '39', 'Cabanaconde');
INSERT INTO `ubicacion_distrito` VALUES ('397', '4', '39', 'Callalli');
INSERT INTO `ubicacion_distrito` VALUES ('398', '4', '39', 'Caylloma');
INSERT INTO `ubicacion_distrito` VALUES ('399', '4', '39', 'Coporaque');
INSERT INTO `ubicacion_distrito` VALUES ('400', '4', '39', 'Huambo');
INSERT INTO `ubicacion_distrito` VALUES ('401', '4', '39', 'Huanca');
INSERT INTO `ubicacion_distrito` VALUES ('402', '4', '39', 'Ichupampa');
INSERT INTO `ubicacion_distrito` VALUES ('403', '4', '39', 'Lari');
INSERT INTO `ubicacion_distrito` VALUES ('404', '4', '39', 'Lluta');
INSERT INTO `ubicacion_distrito` VALUES ('405', '4', '39', 'Maca');
INSERT INTO `ubicacion_distrito` VALUES ('406', '4', '39', 'Madrigal');
INSERT INTO `ubicacion_distrito` VALUES ('407', '4', '39', 'San Antonio De Chuca');
INSERT INTO `ubicacion_distrito` VALUES ('408', '4', '39', 'Sibayo');
INSERT INTO `ubicacion_distrito` VALUES ('409', '4', '39', 'Tapay');
INSERT INTO `ubicacion_distrito` VALUES ('410', '4', '39', 'Tisco');
INSERT INTO `ubicacion_distrito` VALUES ('411', '4', '39', 'Tuti');
INSERT INTO `ubicacion_distrito` VALUES ('412', '4', '39', 'Yanque');
INSERT INTO `ubicacion_distrito` VALUES ('413', '4', '39', 'Majes');
INSERT INTO `ubicacion_distrito` VALUES ('414', '4', '40', 'Chuquibamba');
INSERT INTO `ubicacion_distrito` VALUES ('415', '4', '40', 'Andaray');
INSERT INTO `ubicacion_distrito` VALUES ('416', '4', '40', 'Cayarani');
INSERT INTO `ubicacion_distrito` VALUES ('417', '4', '40', 'Chichas');
INSERT INTO `ubicacion_distrito` VALUES ('418', '4', '40', 'Iray');
INSERT INTO `ubicacion_distrito` VALUES ('419', '4', '40', 'Rio Grande');
INSERT INTO `ubicacion_distrito` VALUES ('420', '4', '40', 'Salamanca');
INSERT INTO `ubicacion_distrito` VALUES ('421', '4', '40', 'Yanaquihua');
INSERT INTO `ubicacion_distrito` VALUES ('422', '4', '41', 'Mollendo');
INSERT INTO `ubicacion_distrito` VALUES ('423', '4', '41', 'Cocachacra');
INSERT INTO `ubicacion_distrito` VALUES ('424', '4', '41', 'Dean Valdivia');
INSERT INTO `ubicacion_distrito` VALUES ('425', '4', '41', 'Islay');
INSERT INTO `ubicacion_distrito` VALUES ('426', '4', '41', 'Mejia');
INSERT INTO `ubicacion_distrito` VALUES ('427', '4', '41', 'Punta De Bombon');
INSERT INTO `ubicacion_distrito` VALUES ('428', '4', '42', 'Cotahuasi');
INSERT INTO `ubicacion_distrito` VALUES ('429', '4', '42', 'Alca');
INSERT INTO `ubicacion_distrito` VALUES ('430', '4', '42', 'Charcana');
INSERT INTO `ubicacion_distrito` VALUES ('431', '4', '42', 'Huaynacotas');
INSERT INTO `ubicacion_distrito` VALUES ('432', '4', '42', 'Pampamarca');
INSERT INTO `ubicacion_distrito` VALUES ('433', '4', '42', 'Puyca');
INSERT INTO `ubicacion_distrito` VALUES ('434', '4', '42', 'Quechualla');
INSERT INTO `ubicacion_distrito` VALUES ('435', '4', '42', 'Sayla');
INSERT INTO `ubicacion_distrito` VALUES ('436', '4', '42', 'Tauria');
INSERT INTO `ubicacion_distrito` VALUES ('437', '4', '42', 'Tomepampa');
INSERT INTO `ubicacion_distrito` VALUES ('438', '4', '42', 'Toro');
INSERT INTO `ubicacion_distrito` VALUES ('439', '5', '43', 'Ayacucho');
INSERT INTO `ubicacion_distrito` VALUES ('440', '5', '43', 'Acocro');
INSERT INTO `ubicacion_distrito` VALUES ('441', '5', '43', 'Acos Vinchos');
INSERT INTO `ubicacion_distrito` VALUES ('442', '5', '43', 'Carmen Alto');
INSERT INTO `ubicacion_distrito` VALUES ('443', '5', '43', 'Chiara');
INSERT INTO `ubicacion_distrito` VALUES ('444', '5', '43', 'Ocros');
INSERT INTO `ubicacion_distrito` VALUES ('445', '5', '43', 'Pacaycasa');
INSERT INTO `ubicacion_distrito` VALUES ('446', '5', '43', 'Quinua');
INSERT INTO `ubicacion_distrito` VALUES ('447', '5', '43', 'San Jose De Ticllas');
INSERT INTO `ubicacion_distrito` VALUES ('448', '5', '43', 'San Juan Bautista');
INSERT INTO `ubicacion_distrito` VALUES ('449', '5', '43', 'Santiago De Pischa');
INSERT INTO `ubicacion_distrito` VALUES ('450', '5', '43', 'Socos');
INSERT INTO `ubicacion_distrito` VALUES ('451', '5', '43', 'Tambillo');
INSERT INTO `ubicacion_distrito` VALUES ('452', '5', '43', 'Vinchos');
INSERT INTO `ubicacion_distrito` VALUES ('453', '5', '43', 'Jesus Nazareno');
INSERT INTO `ubicacion_distrito` VALUES ('454', '5', '44', 'Cangallo');
INSERT INTO `ubicacion_distrito` VALUES ('455', '5', '44', 'Chuschi');
INSERT INTO `ubicacion_distrito` VALUES ('456', '5', '44', 'Los Morochucos');
INSERT INTO `ubicacion_distrito` VALUES ('457', '5', '44', 'Maria Parado De Bellido');
INSERT INTO `ubicacion_distrito` VALUES ('458', '5', '44', 'Paras');
INSERT INTO `ubicacion_distrito` VALUES ('459', '5', '44', 'Totos');
INSERT INTO `ubicacion_distrito` VALUES ('460', '5', '45', 'Sancos');
INSERT INTO `ubicacion_distrito` VALUES ('461', '5', '45', 'Carapo');
INSERT INTO `ubicacion_distrito` VALUES ('462', '5', '45', 'Sacsamarca');
INSERT INTO `ubicacion_distrito` VALUES ('463', '5', '45', 'Santiago De Lucanamarca');
INSERT INTO `ubicacion_distrito` VALUES ('464', '5', '46', 'Huanta');
INSERT INTO `ubicacion_distrito` VALUES ('465', '5', '46', 'Ayahuanco');
INSERT INTO `ubicacion_distrito` VALUES ('466', '5', '46', 'Huamanguilla');
INSERT INTO `ubicacion_distrito` VALUES ('467', '5', '46', 'Iguain');
INSERT INTO `ubicacion_distrito` VALUES ('468', '5', '46', 'Luricocha');
INSERT INTO `ubicacion_distrito` VALUES ('469', '5', '46', 'Santillana');
INSERT INTO `ubicacion_distrito` VALUES ('470', '5', '46', 'Sivia');
INSERT INTO `ubicacion_distrito` VALUES ('471', '5', '46', 'Llochegua');
INSERT INTO `ubicacion_distrito` VALUES ('472', '5', '47', 'San Miguel');
INSERT INTO `ubicacion_distrito` VALUES ('473', '5', '47', 'Anco');
INSERT INTO `ubicacion_distrito` VALUES ('474', '5', '47', 'Ayna');
INSERT INTO `ubicacion_distrito` VALUES ('475', '5', '47', 'Chilcas');
INSERT INTO `ubicacion_distrito` VALUES ('476', '5', '47', 'Chungui');
INSERT INTO `ubicacion_distrito` VALUES ('477', '5', '47', 'Luis Carranza');
INSERT INTO `ubicacion_distrito` VALUES ('478', '5', '47', 'Santa Rosa');
INSERT INTO `ubicacion_distrito` VALUES ('479', '5', '47', 'Tambo');
INSERT INTO `ubicacion_distrito` VALUES ('480', '5', '48', 'Puquio');
INSERT INTO `ubicacion_distrito` VALUES ('481', '5', '48', 'Aucara');
INSERT INTO `ubicacion_distrito` VALUES ('482', '5', '48', 'Cabana');
INSERT INTO `ubicacion_distrito` VALUES ('483', '5', '48', 'Carmen Salcedo');
INSERT INTO `ubicacion_distrito` VALUES ('484', '5', '48', 'Chaviña');
INSERT INTO `ubicacion_distrito` VALUES ('485', '5', '48', 'Chipao');
INSERT INTO `ubicacion_distrito` VALUES ('486', '5', '48', 'Huac-Huas');
INSERT INTO `ubicacion_distrito` VALUES ('487', '5', '48', 'Laramate');
INSERT INTO `ubicacion_distrito` VALUES ('488', '5', '48', 'Leoncio Prado');
INSERT INTO `ubicacion_distrito` VALUES ('489', '5', '48', 'Llauta');
INSERT INTO `ubicacion_distrito` VALUES ('490', '5', '48', 'Lucanas');
INSERT INTO `ubicacion_distrito` VALUES ('491', '5', '48', 'Ocaña');
INSERT INTO `ubicacion_distrito` VALUES ('492', '5', '48', 'Otoca');
INSERT INTO `ubicacion_distrito` VALUES ('493', '5', '48', 'Saisa');
INSERT INTO `ubicacion_distrito` VALUES ('494', '5', '48', 'San Cristobal');
INSERT INTO `ubicacion_distrito` VALUES ('495', '5', '48', 'San Juan');
INSERT INTO `ubicacion_distrito` VALUES ('496', '5', '48', 'San Pedro');
INSERT INTO `ubicacion_distrito` VALUES ('497', '5', '48', 'San Pedro De Palco');
INSERT INTO `ubicacion_distrito` VALUES ('498', '5', '48', 'Sancos');
INSERT INTO `ubicacion_distrito` VALUES ('499', '5', '48', 'Santa Ana De Huaycahuacho');
INSERT INTO `ubicacion_distrito` VALUES ('500', '5', '48', 'Santa Lucia');
INSERT INTO `ubicacion_distrito` VALUES ('501', '5', '49', 'Coracora');
INSERT INTO `ubicacion_distrito` VALUES ('502', '5', '49', 'Chumpi');
INSERT INTO `ubicacion_distrito` VALUES ('503', '5', '49', 'Coronel Castaðeda');
INSERT INTO `ubicacion_distrito` VALUES ('504', '5', '49', 'Pacapausa');
INSERT INTO `ubicacion_distrito` VALUES ('505', '5', '49', 'Pullo');
INSERT INTO `ubicacion_distrito` VALUES ('506', '5', '49', 'Puyusca');
INSERT INTO `ubicacion_distrito` VALUES ('507', '5', '49', 'San Francisco De Ravacayco');
INSERT INTO `ubicacion_distrito` VALUES ('508', '5', '49', 'Upahuacho');
INSERT INTO `ubicacion_distrito` VALUES ('509', '5', '50', 'Pausa');
INSERT INTO `ubicacion_distrito` VALUES ('510', '5', '50', 'Colta');
INSERT INTO `ubicacion_distrito` VALUES ('511', '5', '50', 'Corculla');
INSERT INTO `ubicacion_distrito` VALUES ('512', '5', '50', 'Lampa');
INSERT INTO `ubicacion_distrito` VALUES ('513', '5', '50', 'Marcabamba');
INSERT INTO `ubicacion_distrito` VALUES ('514', '5', '50', 'Oyolo');
INSERT INTO `ubicacion_distrito` VALUES ('515', '5', '50', 'Pararca');
INSERT INTO `ubicacion_distrito` VALUES ('516', '5', '50', 'San Javier De Alpabamba');
INSERT INTO `ubicacion_distrito` VALUES ('517', '5', '50', 'San Jose De Ushua');
INSERT INTO `ubicacion_distrito` VALUES ('518', '5', '50', 'Sara Sara');
INSERT INTO `ubicacion_distrito` VALUES ('519', '5', '51', 'Querobamba');
INSERT INTO `ubicacion_distrito` VALUES ('520', '5', '51', 'Belen');
INSERT INTO `ubicacion_distrito` VALUES ('521', '5', '51', 'Chalcos');
INSERT INTO `ubicacion_distrito` VALUES ('522', '5', '51', 'Chilcayoc');
INSERT INTO `ubicacion_distrito` VALUES ('523', '5', '51', 'Huacaña');
INSERT INTO `ubicacion_distrito` VALUES ('524', '5', '51', 'Morcolla');
INSERT INTO `ubicacion_distrito` VALUES ('525', '5', '51', 'Paico');
INSERT INTO `ubicacion_distrito` VALUES ('526', '5', '51', 'San Pedro De Larcay');
INSERT INTO `ubicacion_distrito` VALUES ('527', '5', '51', 'San Salvador De Quije');
INSERT INTO `ubicacion_distrito` VALUES ('528', '5', '51', 'Santiago De Paucaray');
INSERT INTO `ubicacion_distrito` VALUES ('529', '5', '51', 'Soras');
INSERT INTO `ubicacion_distrito` VALUES ('530', '5', '52', 'Huancapi');
INSERT INTO `ubicacion_distrito` VALUES ('531', '5', '52', 'Alcamenca');
INSERT INTO `ubicacion_distrito` VALUES ('532', '5', '52', 'Apongo');
INSERT INTO `ubicacion_distrito` VALUES ('533', '5', '52', 'Asquipata');
INSERT INTO `ubicacion_distrito` VALUES ('534', '5', '52', 'Canaria');
INSERT INTO `ubicacion_distrito` VALUES ('535', '5', '52', 'Cayara');
INSERT INTO `ubicacion_distrito` VALUES ('536', '5', '52', 'Colca');
INSERT INTO `ubicacion_distrito` VALUES ('537', '5', '52', 'Huamanquiquia');
INSERT INTO `ubicacion_distrito` VALUES ('538', '5', '52', 'Huancaraylla');
INSERT INTO `ubicacion_distrito` VALUES ('539', '5', '52', 'Huaya');
INSERT INTO `ubicacion_distrito` VALUES ('540', '5', '52', 'Sarhua');
INSERT INTO `ubicacion_distrito` VALUES ('541', '5', '52', 'Vilcanchos');
INSERT INTO `ubicacion_distrito` VALUES ('542', '5', '53', 'Vilcas Huaman');
INSERT INTO `ubicacion_distrito` VALUES ('543', '5', '53', 'Accomarca');
INSERT INTO `ubicacion_distrito` VALUES ('544', '5', '53', 'Carhuanca');
INSERT INTO `ubicacion_distrito` VALUES ('545', '5', '53', 'Concepcion');
INSERT INTO `ubicacion_distrito` VALUES ('546', '5', '53', 'Huambalpa');
INSERT INTO `ubicacion_distrito` VALUES ('547', '5', '53', 'Independencia');
INSERT INTO `ubicacion_distrito` VALUES ('548', '5', '53', 'Saurama');
INSERT INTO `ubicacion_distrito` VALUES ('549', '5', '53', 'Vischongo');
INSERT INTO `ubicacion_distrito` VALUES ('550', '6', '54', 'Cajamarca');
INSERT INTO `ubicacion_distrito` VALUES ('551', '6', '54', 'Asuncion');
INSERT INTO `ubicacion_distrito` VALUES ('552', '6', '54', 'Chetilla');
INSERT INTO `ubicacion_distrito` VALUES ('553', '6', '54', 'Cospan');
INSERT INTO `ubicacion_distrito` VALUES ('554', '6', '54', 'Encañada');
INSERT INTO `ubicacion_distrito` VALUES ('555', '6', '54', 'Jesus');
INSERT INTO `ubicacion_distrito` VALUES ('556', '6', '54', 'Llacanora');
INSERT INTO `ubicacion_distrito` VALUES ('557', '6', '54', 'Los Baños Del Inca');
INSERT INTO `ubicacion_distrito` VALUES ('558', '6', '54', 'Magdalena');
INSERT INTO `ubicacion_distrito` VALUES ('559', '6', '54', 'Matara');
INSERT INTO `ubicacion_distrito` VALUES ('560', '6', '54', 'Namora');
INSERT INTO `ubicacion_distrito` VALUES ('561', '6', '54', 'San Juan');
INSERT INTO `ubicacion_distrito` VALUES ('562', '6', '55', 'Cajabamba');
INSERT INTO `ubicacion_distrito` VALUES ('563', '6', '55', 'Cachachi');
INSERT INTO `ubicacion_distrito` VALUES ('564', '6', '55', 'Condebamba');
INSERT INTO `ubicacion_distrito` VALUES ('565', '6', '55', 'Sitacocha');
INSERT INTO `ubicacion_distrito` VALUES ('566', '6', '56', 'Celendin');
INSERT INTO `ubicacion_distrito` VALUES ('567', '6', '56', 'Chumuch');
INSERT INTO `ubicacion_distrito` VALUES ('568', '6', '56', 'Cortegana');
INSERT INTO `ubicacion_distrito` VALUES ('569', '6', '56', 'Huasmin');
INSERT INTO `ubicacion_distrito` VALUES ('570', '6', '56', 'Jorge Chavez');
INSERT INTO `ubicacion_distrito` VALUES ('571', '6', '56', 'Jose Galvez');
INSERT INTO `ubicacion_distrito` VALUES ('572', '6', '56', 'Miguel Iglesias');
INSERT INTO `ubicacion_distrito` VALUES ('573', '6', '56', 'Oxamarca');
INSERT INTO `ubicacion_distrito` VALUES ('574', '6', '56', 'Sorochuco');
INSERT INTO `ubicacion_distrito` VALUES ('575', '6', '56', 'Sucre');
INSERT INTO `ubicacion_distrito` VALUES ('576', '6', '56', 'Utco');
INSERT INTO `ubicacion_distrito` VALUES ('577', '6', '56', 'La Libertad De Pallan');
INSERT INTO `ubicacion_distrito` VALUES ('578', '6', '57', 'Chota');
INSERT INTO `ubicacion_distrito` VALUES ('579', '6', '57', 'Anguia');
INSERT INTO `ubicacion_distrito` VALUES ('580', '6', '57', 'Chadin');
INSERT INTO `ubicacion_distrito` VALUES ('581', '6', '57', 'Chiguirip');
INSERT INTO `ubicacion_distrito` VALUES ('582', '6', '57', 'Chimban');
INSERT INTO `ubicacion_distrito` VALUES ('583', '6', '57', 'Choropampa');
INSERT INTO `ubicacion_distrito` VALUES ('584', '6', '57', 'Cochabamba');
INSERT INTO `ubicacion_distrito` VALUES ('585', '6', '57', 'Conchan');
INSERT INTO `ubicacion_distrito` VALUES ('586', '6', '57', 'Huambos');
INSERT INTO `ubicacion_distrito` VALUES ('587', '6', '57', 'Lajas');
INSERT INTO `ubicacion_distrito` VALUES ('588', '6', '57', 'Llama');
INSERT INTO `ubicacion_distrito` VALUES ('589', '6', '57', 'Miracosta');
INSERT INTO `ubicacion_distrito` VALUES ('590', '6', '57', 'Paccha');
INSERT INTO `ubicacion_distrito` VALUES ('591', '6', '57', 'Pion');
INSERT INTO `ubicacion_distrito` VALUES ('592', '6', '57', 'Querocoto');
INSERT INTO `ubicacion_distrito` VALUES ('593', '6', '57', 'San Juan De Licupis');
INSERT INTO `ubicacion_distrito` VALUES ('594', '6', '57', 'Tacabamba');
INSERT INTO `ubicacion_distrito` VALUES ('595', '6', '57', 'Tocmoche');
INSERT INTO `ubicacion_distrito` VALUES ('596', '6', '57', 'Chalamarca');
INSERT INTO `ubicacion_distrito` VALUES ('597', '6', '58', 'Contumaza');
INSERT INTO `ubicacion_distrito` VALUES ('598', '6', '58', 'Chilete');
INSERT INTO `ubicacion_distrito` VALUES ('599', '6', '58', 'Cupisnique');
INSERT INTO `ubicacion_distrito` VALUES ('600', '6', '58', 'Guzmango');
INSERT INTO `ubicacion_distrito` VALUES ('601', '6', '58', 'San Benito');
INSERT INTO `ubicacion_distrito` VALUES ('602', '6', '58', 'Santa Cruz De Toled');
INSERT INTO `ubicacion_distrito` VALUES ('603', '6', '58', 'Tantarica');
INSERT INTO `ubicacion_distrito` VALUES ('604', '6', '58', 'Yonan');
INSERT INTO `ubicacion_distrito` VALUES ('605', '6', '59', 'Cutervo');
INSERT INTO `ubicacion_distrito` VALUES ('606', '6', '59', 'Callayuc');
INSERT INTO `ubicacion_distrito` VALUES ('607', '6', '59', 'Choros');
INSERT INTO `ubicacion_distrito` VALUES ('608', '6', '59', 'Cujillo');
INSERT INTO `ubicacion_distrito` VALUES ('609', '6', '59', 'La Ramada');
INSERT INTO `ubicacion_distrito` VALUES ('610', '6', '59', 'Pimpingos');
INSERT INTO `ubicacion_distrito` VALUES ('611', '6', '59', 'Querocotillo');
INSERT INTO `ubicacion_distrito` VALUES ('612', '6', '59', 'San Andres De Cutervo');
INSERT INTO `ubicacion_distrito` VALUES ('613', '6', '59', 'San Juan De Cutervo');
INSERT INTO `ubicacion_distrito` VALUES ('614', '6', '59', 'San Luis De Lucma');
INSERT INTO `ubicacion_distrito` VALUES ('615', '6', '59', 'Santa Cruz');
INSERT INTO `ubicacion_distrito` VALUES ('616', '6', '59', 'Santo Domingo De La Capilla');
INSERT INTO `ubicacion_distrito` VALUES ('617', '6', '59', 'Santo Tomas');
INSERT INTO `ubicacion_distrito` VALUES ('618', '6', '59', 'Socota');
INSERT INTO `ubicacion_distrito` VALUES ('619', '6', '59', 'Toribio Casanova');
INSERT INTO `ubicacion_distrito` VALUES ('620', '6', '60', 'Bambamarca');
INSERT INTO `ubicacion_distrito` VALUES ('621', '6', '60', 'Chugur');
INSERT INTO `ubicacion_distrito` VALUES ('622', '6', '60', 'Hualgayoc');
INSERT INTO `ubicacion_distrito` VALUES ('623', '6', '61', 'Jaen');
INSERT INTO `ubicacion_distrito` VALUES ('624', '6', '61', 'Bellavista');
INSERT INTO `ubicacion_distrito` VALUES ('625', '6', '61', 'Chontali');
INSERT INTO `ubicacion_distrito` VALUES ('626', '6', '61', 'Colasay');
INSERT INTO `ubicacion_distrito` VALUES ('627', '6', '61', 'Huabal');
INSERT INTO `ubicacion_distrito` VALUES ('628', '6', '61', 'Las Pirias');
INSERT INTO `ubicacion_distrito` VALUES ('629', '6', '61', 'Pomahuaca');
INSERT INTO `ubicacion_distrito` VALUES ('630', '6', '61', 'Pucara');
INSERT INTO `ubicacion_distrito` VALUES ('631', '6', '61', 'Sallique');
INSERT INTO `ubicacion_distrito` VALUES ('632', '6', '61', 'San Felipe');
INSERT INTO `ubicacion_distrito` VALUES ('633', '6', '61', 'San Jose Del Alto');
INSERT INTO `ubicacion_distrito` VALUES ('634', '6', '61', 'Santa Rosa');
INSERT INTO `ubicacion_distrito` VALUES ('635', '6', '62', 'San Ignacio');
INSERT INTO `ubicacion_distrito` VALUES ('636', '6', '62', 'Chirinos');
INSERT INTO `ubicacion_distrito` VALUES ('637', '6', '62', 'Huarango');
INSERT INTO `ubicacion_distrito` VALUES ('638', '6', '62', 'La Coipa');
INSERT INTO `ubicacion_distrito` VALUES ('639', '6', '62', 'Namballe');
INSERT INTO `ubicacion_distrito` VALUES ('640', '6', '62', 'San Jose De Lourdes');
INSERT INTO `ubicacion_distrito` VALUES ('641', '6', '62', 'Tabaconas');
INSERT INTO `ubicacion_distrito` VALUES ('642', '6', '63', 'Pedro Galvez');
INSERT INTO `ubicacion_distrito` VALUES ('643', '6', '63', 'Chancay');
INSERT INTO `ubicacion_distrito` VALUES ('644', '6', '63', 'Eduardo Villanueva');
INSERT INTO `ubicacion_distrito` VALUES ('645', '6', '63', 'Gregorio Pita');
INSERT INTO `ubicacion_distrito` VALUES ('646', '6', '63', 'Ichocan');
INSERT INTO `ubicacion_distrito` VALUES ('647', '6', '63', 'Jose Manuel Quiroz');
INSERT INTO `ubicacion_distrito` VALUES ('648', '6', '63', 'Jose Sabogal');
INSERT INTO `ubicacion_distrito` VALUES ('649', '6', '64', 'San Miguel');
INSERT INTO `ubicacion_distrito` VALUES ('650', '6', '64', 'Bolivar');
INSERT INTO `ubicacion_distrito` VALUES ('651', '6', '64', 'Calquis');
INSERT INTO `ubicacion_distrito` VALUES ('652', '6', '64', 'Catilluc');
INSERT INTO `ubicacion_distrito` VALUES ('653', '6', '64', 'El Prado');
INSERT INTO `ubicacion_distrito` VALUES ('654', '6', '64', 'La Florida');
INSERT INTO `ubicacion_distrito` VALUES ('655', '6', '64', 'Llapa');
INSERT INTO `ubicacion_distrito` VALUES ('656', '6', '64', 'Nanchoc');
INSERT INTO `ubicacion_distrito` VALUES ('657', '6', '64', 'Niepos');
INSERT INTO `ubicacion_distrito` VALUES ('658', '6', '64', 'San Gregorio');
INSERT INTO `ubicacion_distrito` VALUES ('659', '6', '64', 'San Silvestre De Cochan');
INSERT INTO `ubicacion_distrito` VALUES ('660', '6', '64', 'Tongod');
INSERT INTO `ubicacion_distrito` VALUES ('661', '6', '64', 'Union Agua Blanca');
INSERT INTO `ubicacion_distrito` VALUES ('662', '6', '65', 'San Pablo');
INSERT INTO `ubicacion_distrito` VALUES ('663', '6', '65', 'San Bernardino');
INSERT INTO `ubicacion_distrito` VALUES ('664', '6', '65', 'San Luis');
INSERT INTO `ubicacion_distrito` VALUES ('665', '6', '65', 'Tumbaden');
INSERT INTO `ubicacion_distrito` VALUES ('666', '6', '66', 'Santa Cruz');
INSERT INTO `ubicacion_distrito` VALUES ('667', '6', '66', 'Andabamba');
INSERT INTO `ubicacion_distrito` VALUES ('668', '6', '66', 'Catache');
INSERT INTO `ubicacion_distrito` VALUES ('669', '6', '66', 'Chancaybaños');
INSERT INTO `ubicacion_distrito` VALUES ('670', '6', '66', 'La Esperanza');
INSERT INTO `ubicacion_distrito` VALUES ('671', '6', '66', 'Ninabamba');
INSERT INTO `ubicacion_distrito` VALUES ('672', '6', '66', 'Pulan');
INSERT INTO `ubicacion_distrito` VALUES ('673', '6', '66', 'Saucepampa');
INSERT INTO `ubicacion_distrito` VALUES ('674', '6', '66', 'Sexi');
INSERT INTO `ubicacion_distrito` VALUES ('675', '6', '66', 'Uticyacu');
INSERT INTO `ubicacion_distrito` VALUES ('676', '6', '66', 'Yauyucan');
INSERT INTO `ubicacion_distrito` VALUES ('677', '7', '67', 'Callao');
INSERT INTO `ubicacion_distrito` VALUES ('678', '7', '67', 'Bellavista');
INSERT INTO `ubicacion_distrito` VALUES ('679', '7', '67', 'Carmen De La Legua Reynoso');
INSERT INTO `ubicacion_distrito` VALUES ('680', '7', '67', 'La Perla');
INSERT INTO `ubicacion_distrito` VALUES ('681', '7', '67', 'La Punta');
INSERT INTO `ubicacion_distrito` VALUES ('682', '7', '67', 'Ventanilla');
INSERT INTO `ubicacion_distrito` VALUES ('683', '8', '68', 'Cusco');
INSERT INTO `ubicacion_distrito` VALUES ('684', '8', '68', 'Ccorca');
INSERT INTO `ubicacion_distrito` VALUES ('685', '8', '68', 'Poroy');
INSERT INTO `ubicacion_distrito` VALUES ('686', '8', '68', 'San Jeronimo');
INSERT INTO `ubicacion_distrito` VALUES ('687', '8', '68', 'San Sebastian');
INSERT INTO `ubicacion_distrito` VALUES ('688', '8', '68', 'Santiago');
INSERT INTO `ubicacion_distrito` VALUES ('689', '8', '68', 'Saylla');
INSERT INTO `ubicacion_distrito` VALUES ('690', '8', '68', 'Wanchaq');
INSERT INTO `ubicacion_distrito` VALUES ('691', '8', '69', 'Acomayo');
INSERT INTO `ubicacion_distrito` VALUES ('692', '8', '69', 'Acopia');
INSERT INTO `ubicacion_distrito` VALUES ('693', '8', '69', 'Acos');
INSERT INTO `ubicacion_distrito` VALUES ('694', '8', '69', 'Mosoc Llacta');
INSERT INTO `ubicacion_distrito` VALUES ('695', '8', '69', 'Pomacanchi');
INSERT INTO `ubicacion_distrito` VALUES ('696', '8', '69', 'Rondocan');
INSERT INTO `ubicacion_distrito` VALUES ('697', '8', '69', 'Sangarara');
INSERT INTO `ubicacion_distrito` VALUES ('698', '8', '70', 'Anta');
INSERT INTO `ubicacion_distrito` VALUES ('699', '8', '70', 'Ancahuasi');
INSERT INTO `ubicacion_distrito` VALUES ('700', '8', '70', 'Cachimayo');
INSERT INTO `ubicacion_distrito` VALUES ('701', '8', '70', 'Chinchaypujio');
INSERT INTO `ubicacion_distrito` VALUES ('702', '8', '70', 'Huarocondo');
INSERT INTO `ubicacion_distrito` VALUES ('703', '8', '70', 'Limatambo');
INSERT INTO `ubicacion_distrito` VALUES ('704', '8', '70', 'Mollepata');
INSERT INTO `ubicacion_distrito` VALUES ('705', '8', '70', 'Pucyura');
INSERT INTO `ubicacion_distrito` VALUES ('706', '8', '70', 'Zurite');
INSERT INTO `ubicacion_distrito` VALUES ('707', '8', '71', 'Calca');
INSERT INTO `ubicacion_distrito` VALUES ('708', '8', '71', 'Coya');
INSERT INTO `ubicacion_distrito` VALUES ('709', '8', '71', 'Lamay');
INSERT INTO `ubicacion_distrito` VALUES ('710', '8', '71', 'Lares');
INSERT INTO `ubicacion_distrito` VALUES ('711', '8', '71', 'Pisac');
INSERT INTO `ubicacion_distrito` VALUES ('712', '8', '71', 'San Salvador');
INSERT INTO `ubicacion_distrito` VALUES ('713', '8', '71', 'Taray');
INSERT INTO `ubicacion_distrito` VALUES ('714', '8', '71', 'Yanatile');
INSERT INTO `ubicacion_distrito` VALUES ('715', '8', '72', 'Yanaoca');
INSERT INTO `ubicacion_distrito` VALUES ('716', '8', '72', 'Checca');
INSERT INTO `ubicacion_distrito` VALUES ('717', '8', '72', 'Kunturkanki');
INSERT INTO `ubicacion_distrito` VALUES ('718', '8', '72', 'Langui');
INSERT INTO `ubicacion_distrito` VALUES ('719', '8', '72', 'Layo');
INSERT INTO `ubicacion_distrito` VALUES ('720', '8', '72', 'Pampamarca');
INSERT INTO `ubicacion_distrito` VALUES ('721', '8', '72', 'Quehue');
INSERT INTO `ubicacion_distrito` VALUES ('722', '8', '72', 'Tupac Amaru');
INSERT INTO `ubicacion_distrito` VALUES ('723', '8', '73', 'Sicuani');
INSERT INTO `ubicacion_distrito` VALUES ('724', '8', '73', 'Checacupe');
INSERT INTO `ubicacion_distrito` VALUES ('725', '8', '73', 'Combapata');
INSERT INTO `ubicacion_distrito` VALUES ('726', '8', '73', 'Marangani');
INSERT INTO `ubicacion_distrito` VALUES ('727', '8', '73', 'Pitumarca');
INSERT INTO `ubicacion_distrito` VALUES ('728', '8', '73', 'San Pablo');
INSERT INTO `ubicacion_distrito` VALUES ('729', '8', '73', 'San Pedro');
INSERT INTO `ubicacion_distrito` VALUES ('730', '8', '73', 'Tinta');
INSERT INTO `ubicacion_distrito` VALUES ('731', '8', '74', 'Santo Tomas');
INSERT INTO `ubicacion_distrito` VALUES ('732', '8', '74', 'Capacmarca');
INSERT INTO `ubicacion_distrito` VALUES ('733', '8', '74', 'Chamaca');
INSERT INTO `ubicacion_distrito` VALUES ('734', '8', '74', 'Colquemarca');
INSERT INTO `ubicacion_distrito` VALUES ('735', '8', '74', 'Livitaca');
INSERT INTO `ubicacion_distrito` VALUES ('736', '8', '74', 'Llusco');
INSERT INTO `ubicacion_distrito` VALUES ('737', '8', '74', 'Quiñota');
INSERT INTO `ubicacion_distrito` VALUES ('738', '8', '74', 'Velille');
INSERT INTO `ubicacion_distrito` VALUES ('739', '8', '75', 'Espinar');
INSERT INTO `ubicacion_distrito` VALUES ('740', '8', '75', 'Condoroma');
INSERT INTO `ubicacion_distrito` VALUES ('741', '8', '75', 'Coporaque');
INSERT INTO `ubicacion_distrito` VALUES ('742', '8', '75', 'Ocoruro');
INSERT INTO `ubicacion_distrito` VALUES ('743', '8', '75', 'Pallpata');
INSERT INTO `ubicacion_distrito` VALUES ('744', '8', '75', 'Pichigua');
INSERT INTO `ubicacion_distrito` VALUES ('745', '8', '75', 'Suyckutambo');
INSERT INTO `ubicacion_distrito` VALUES ('746', '8', '75', 'Alto Pichigua');
INSERT INTO `ubicacion_distrito` VALUES ('747', '8', '76', 'Santa Ana');
INSERT INTO `ubicacion_distrito` VALUES ('748', '8', '76', 'Echarate');
INSERT INTO `ubicacion_distrito` VALUES ('749', '8', '76', 'Huayopata');
INSERT INTO `ubicacion_distrito` VALUES ('750', '8', '76', 'Maranura');
INSERT INTO `ubicacion_distrito` VALUES ('751', '8', '76', 'Ocobamba');
INSERT INTO `ubicacion_distrito` VALUES ('752', '8', '76', 'Quellouno');
INSERT INTO `ubicacion_distrito` VALUES ('753', '8', '76', 'Kimbiri');
INSERT INTO `ubicacion_distrito` VALUES ('754', '8', '76', 'Santa Teresa');
INSERT INTO `ubicacion_distrito` VALUES ('755', '8', '76', 'Vilcabamba');
INSERT INTO `ubicacion_distrito` VALUES ('756', '8', '76', 'Pichari');
INSERT INTO `ubicacion_distrito` VALUES ('757', '8', '77', 'Paruro');
INSERT INTO `ubicacion_distrito` VALUES ('758', '8', '77', 'Accha');
INSERT INTO `ubicacion_distrito` VALUES ('759', '8', '77', 'Ccapi');
INSERT INTO `ubicacion_distrito` VALUES ('760', '8', '77', 'Colcha');
INSERT INTO `ubicacion_distrito` VALUES ('761', '8', '77', 'Huanoquite');
INSERT INTO `ubicacion_distrito` VALUES ('762', '8', '77', 'Omacha');
INSERT INTO `ubicacion_distrito` VALUES ('763', '8', '77', 'Paccaritambo');
INSERT INTO `ubicacion_distrito` VALUES ('764', '8', '77', 'Pillpinto');
INSERT INTO `ubicacion_distrito` VALUES ('765', '8', '77', 'Yaurisque');
INSERT INTO `ubicacion_distrito` VALUES ('766', '8', '78', 'Paucartambo');
INSERT INTO `ubicacion_distrito` VALUES ('767', '8', '78', 'Caicay');
INSERT INTO `ubicacion_distrito` VALUES ('768', '8', '78', 'Challabamba');
INSERT INTO `ubicacion_distrito` VALUES ('769', '8', '78', 'Colquepata');
INSERT INTO `ubicacion_distrito` VALUES ('770', '8', '78', 'Huancarani');
INSERT INTO `ubicacion_distrito` VALUES ('771', '8', '78', 'Kosñipata');
INSERT INTO `ubicacion_distrito` VALUES ('772', '8', '79', 'Urcos');
INSERT INTO `ubicacion_distrito` VALUES ('773', '8', '79', 'Andahuaylillas');
INSERT INTO `ubicacion_distrito` VALUES ('774', '8', '79', 'Camanti');
INSERT INTO `ubicacion_distrito` VALUES ('775', '8', '79', 'Ccarhuayo');
INSERT INTO `ubicacion_distrito` VALUES ('776', '8', '79', 'Ccatca');
INSERT INTO `ubicacion_distrito` VALUES ('777', '8', '79', 'Cusipata');
INSERT INTO `ubicacion_distrito` VALUES ('778', '8', '79', 'Huaro');
INSERT INTO `ubicacion_distrito` VALUES ('779', '8', '79', 'Lucre');
INSERT INTO `ubicacion_distrito` VALUES ('780', '8', '79', 'Marcapata');
INSERT INTO `ubicacion_distrito` VALUES ('781', '8', '79', 'Ocongate');
INSERT INTO `ubicacion_distrito` VALUES ('782', '8', '79', 'Oropesa');
INSERT INTO `ubicacion_distrito` VALUES ('783', '8', '79', 'Quiquijana');
INSERT INTO `ubicacion_distrito` VALUES ('784', '8', '80', 'Urubamba');
INSERT INTO `ubicacion_distrito` VALUES ('785', '8', '80', 'Chinchero');
INSERT INTO `ubicacion_distrito` VALUES ('786', '8', '80', 'Huayllabamba');
INSERT INTO `ubicacion_distrito` VALUES ('787', '8', '80', 'Machupicchu');
INSERT INTO `ubicacion_distrito` VALUES ('788', '8', '80', 'Maras');
INSERT INTO `ubicacion_distrito` VALUES ('789', '8', '80', 'Ollantaytambo');
INSERT INTO `ubicacion_distrito` VALUES ('790', '8', '80', 'Yucay');
INSERT INTO `ubicacion_distrito` VALUES ('791', '9', '81', 'Huancavelica');
INSERT INTO `ubicacion_distrito` VALUES ('792', '9', '81', 'Acobambilla');
INSERT INTO `ubicacion_distrito` VALUES ('793', '9', '81', 'Acoria');
INSERT INTO `ubicacion_distrito` VALUES ('794', '9', '81', 'Conayca');
INSERT INTO `ubicacion_distrito` VALUES ('795', '9', '81', 'Cuenca');
INSERT INTO `ubicacion_distrito` VALUES ('796', '9', '81', 'Huachocolpa');
INSERT INTO `ubicacion_distrito` VALUES ('797', '9', '81', 'Huayllahuara');
INSERT INTO `ubicacion_distrito` VALUES ('798', '9', '81', 'Izcuchaca');
INSERT INTO `ubicacion_distrito` VALUES ('799', '9', '81', 'Laria');
INSERT INTO `ubicacion_distrito` VALUES ('800', '9', '81', 'Manta');
INSERT INTO `ubicacion_distrito` VALUES ('801', '9', '81', 'Mariscal Caceres');
INSERT INTO `ubicacion_distrito` VALUES ('802', '9', '81', 'Moya');
INSERT INTO `ubicacion_distrito` VALUES ('803', '9', '81', 'Nuevo Occoro');
INSERT INTO `ubicacion_distrito` VALUES ('804', '9', '81', 'Palca');
INSERT INTO `ubicacion_distrito` VALUES ('805', '9', '81', 'Pilchaca');
INSERT INTO `ubicacion_distrito` VALUES ('806', '9', '81', 'Vilca');
INSERT INTO `ubicacion_distrito` VALUES ('807', '9', '81', 'Yauli');
INSERT INTO `ubicacion_distrito` VALUES ('808', '9', '81', 'Ascension');
INSERT INTO `ubicacion_distrito` VALUES ('809', '9', '82', 'Acobamba');
INSERT INTO `ubicacion_distrito` VALUES ('810', '9', '82', 'Andabamba');
INSERT INTO `ubicacion_distrito` VALUES ('811', '9', '82', 'Anta');
INSERT INTO `ubicacion_distrito` VALUES ('812', '9', '82', 'Caja');
INSERT INTO `ubicacion_distrito` VALUES ('813', '9', '82', 'Marcas');
INSERT INTO `ubicacion_distrito` VALUES ('814', '9', '82', 'Paucara');
INSERT INTO `ubicacion_distrito` VALUES ('815', '9', '82', 'Pomacocha');
INSERT INTO `ubicacion_distrito` VALUES ('816', '9', '82', 'Rosario');
INSERT INTO `ubicacion_distrito` VALUES ('817', '9', '83', 'Lircay');
INSERT INTO `ubicacion_distrito` VALUES ('818', '9', '83', 'Anchonga');
INSERT INTO `ubicacion_distrito` VALUES ('819', '9', '83', 'Callanmarca');
INSERT INTO `ubicacion_distrito` VALUES ('820', '9', '83', 'Ccochaccasa');
INSERT INTO `ubicacion_distrito` VALUES ('821', '9', '83', 'Chincho');
INSERT INTO `ubicacion_distrito` VALUES ('822', '9', '83', 'Congalla');
INSERT INTO `ubicacion_distrito` VALUES ('823', '9', '83', 'Huanca-Huanca');
INSERT INTO `ubicacion_distrito` VALUES ('824', '9', '83', 'Huayllay Grande');
INSERT INTO `ubicacion_distrito` VALUES ('825', '9', '83', 'Julcamarca');
INSERT INTO `ubicacion_distrito` VALUES ('826', '9', '83', 'San Antonio De Antaparco');
INSERT INTO `ubicacion_distrito` VALUES ('827', '9', '83', 'Santo Tomas De Pata');
INSERT INTO `ubicacion_distrito` VALUES ('828', '9', '83', 'Secclla');
INSERT INTO `ubicacion_distrito` VALUES ('829', '9', '84', 'Castrovirreyna');
INSERT INTO `ubicacion_distrito` VALUES ('830', '9', '84', 'Arma');
INSERT INTO `ubicacion_distrito` VALUES ('831', '9', '84', 'Aurahua');
INSERT INTO `ubicacion_distrito` VALUES ('832', '9', '84', 'Capillas');
INSERT INTO `ubicacion_distrito` VALUES ('833', '9', '84', 'Chupamarca');
INSERT INTO `ubicacion_distrito` VALUES ('834', '9', '84', 'Cocas');
INSERT INTO `ubicacion_distrito` VALUES ('835', '9', '84', 'Huachos');
INSERT INTO `ubicacion_distrito` VALUES ('836', '9', '84', 'Huamatambo');
INSERT INTO `ubicacion_distrito` VALUES ('837', '9', '84', 'Mollepampa');
INSERT INTO `ubicacion_distrito` VALUES ('838', '9', '84', 'San Juan');
INSERT INTO `ubicacion_distrito` VALUES ('839', '9', '84', 'Santa Ana');
INSERT INTO `ubicacion_distrito` VALUES ('840', '9', '84', 'Tantara');
INSERT INTO `ubicacion_distrito` VALUES ('841', '9', '84', 'Ticrapo');
INSERT INTO `ubicacion_distrito` VALUES ('842', '9', '85', 'Churcampa');
INSERT INTO `ubicacion_distrito` VALUES ('843', '9', '85', 'Anco');
INSERT INTO `ubicacion_distrito` VALUES ('844', '9', '85', 'Chinchihuasi');
INSERT INTO `ubicacion_distrito` VALUES ('845', '9', '85', 'El Carmen');
INSERT INTO `ubicacion_distrito` VALUES ('846', '9', '85', 'La Merced');
INSERT INTO `ubicacion_distrito` VALUES ('847', '9', '85', 'Locroja');
INSERT INTO `ubicacion_distrito` VALUES ('848', '9', '85', 'Paucarbamba');
INSERT INTO `ubicacion_distrito` VALUES ('849', '9', '85', 'San Miguel De Mayocc');
INSERT INTO `ubicacion_distrito` VALUES ('850', '9', '85', 'San Pedro De Coris');
INSERT INTO `ubicacion_distrito` VALUES ('851', '9', '85', 'Pachamarca');
INSERT INTO `ubicacion_distrito` VALUES ('852', '9', '86', 'Huaytara');
INSERT INTO `ubicacion_distrito` VALUES ('853', '9', '86', 'Ayavi');
INSERT INTO `ubicacion_distrito` VALUES ('854', '9', '86', 'Cordova');
INSERT INTO `ubicacion_distrito` VALUES ('855', '9', '86', 'Huayacundo Arma');
INSERT INTO `ubicacion_distrito` VALUES ('856', '9', '86', 'Laramarca');
INSERT INTO `ubicacion_distrito` VALUES ('857', '9', '86', 'Ocoyo');
INSERT INTO `ubicacion_distrito` VALUES ('858', '9', '86', 'Pilpichaca');
INSERT INTO `ubicacion_distrito` VALUES ('859', '9', '86', 'Querco');
INSERT INTO `ubicacion_distrito` VALUES ('860', '9', '86', 'Quito-Arma');
INSERT INTO `ubicacion_distrito` VALUES ('861', '9', '86', 'San Antonio De Cusicancha');
INSERT INTO `ubicacion_distrito` VALUES ('862', '9', '86', 'San Francisco De Sangayaico');
INSERT INTO `ubicacion_distrito` VALUES ('863', '9', '86', 'San Isidro');
INSERT INTO `ubicacion_distrito` VALUES ('864', '9', '86', 'Santiago De Chocorvos');
INSERT INTO `ubicacion_distrito` VALUES ('865', '9', '86', 'Santiago De Quirahuara');
INSERT INTO `ubicacion_distrito` VALUES ('866', '9', '86', 'Santo Domingo De Capillas');
INSERT INTO `ubicacion_distrito` VALUES ('867', '9', '86', 'Tambo');
INSERT INTO `ubicacion_distrito` VALUES ('868', '9', '87', 'Pampas');
INSERT INTO `ubicacion_distrito` VALUES ('869', '9', '87', 'Acostambo');
INSERT INTO `ubicacion_distrito` VALUES ('870', '9', '87', 'Acraquia');
INSERT INTO `ubicacion_distrito` VALUES ('871', '9', '87', 'Ahuaycha');
INSERT INTO `ubicacion_distrito` VALUES ('872', '9', '87', 'Colcabamba');
INSERT INTO `ubicacion_distrito` VALUES ('873', '9', '87', 'Daniel Hernandez');
INSERT INTO `ubicacion_distrito` VALUES ('874', '9', '87', 'Huachocolpa');
INSERT INTO `ubicacion_distrito` VALUES ('875', '9', '87', 'Huando');
INSERT INTO `ubicacion_distrito` VALUES ('876', '9', '87', 'Huaribamba');
INSERT INTO `ubicacion_distrito` VALUES ('877', '9', '87', 'Ñahuimpuquio');
INSERT INTO `ubicacion_distrito` VALUES ('878', '9', '87', 'Pazos');
INSERT INTO `ubicacion_distrito` VALUES ('879', '9', '87', 'Quishuar');
INSERT INTO `ubicacion_distrito` VALUES ('880', '9', '87', 'Salcabamba');
INSERT INTO `ubicacion_distrito` VALUES ('881', '9', '87', 'Salcahuasi');
INSERT INTO `ubicacion_distrito` VALUES ('882', '9', '87', 'San Marcos De Rocchac');
INSERT INTO `ubicacion_distrito` VALUES ('883', '9', '87', 'Surcubamba');
INSERT INTO `ubicacion_distrito` VALUES ('884', '9', '87', 'Tintay Puncu');
INSERT INTO `ubicacion_distrito` VALUES ('885', '10', '88', 'Huanuco');
INSERT INTO `ubicacion_distrito` VALUES ('886', '10', '88', 'Amarilis');
INSERT INTO `ubicacion_distrito` VALUES ('887', '10', '88', 'Chinchao');
INSERT INTO `ubicacion_distrito` VALUES ('888', '10', '88', 'Churubamba');
INSERT INTO `ubicacion_distrito` VALUES ('889', '10', '88', 'Margos');
INSERT INTO `ubicacion_distrito` VALUES ('890', '10', '88', 'Quisqui');
INSERT INTO `ubicacion_distrito` VALUES ('891', '10', '88', 'San Francisco De Cayran');
INSERT INTO `ubicacion_distrito` VALUES ('892', '10', '88', 'San Pedro De Chaulan');
INSERT INTO `ubicacion_distrito` VALUES ('893', '10', '88', 'Santa Maria Del Valle');
INSERT INTO `ubicacion_distrito` VALUES ('894', '10', '88', 'Yarumayo');
INSERT INTO `ubicacion_distrito` VALUES ('895', '10', '88', 'Pillco Marca');
INSERT INTO `ubicacion_distrito` VALUES ('896', '10', '89', 'Ambo');
INSERT INTO `ubicacion_distrito` VALUES ('897', '10', '89', 'Cayna');
INSERT INTO `ubicacion_distrito` VALUES ('898', '10', '89', 'Colpas');
INSERT INTO `ubicacion_distrito` VALUES ('899', '10', '89', 'Conchamarca');
INSERT INTO `ubicacion_distrito` VALUES ('900', '10', '89', 'Huacar');
INSERT INTO `ubicacion_distrito` VALUES ('901', '10', '89', 'San Francisco');
INSERT INTO `ubicacion_distrito` VALUES ('902', '10', '89', 'San Rafael');
INSERT INTO `ubicacion_distrito` VALUES ('903', '10', '89', 'Tomay Kichwa');
INSERT INTO `ubicacion_distrito` VALUES ('904', '10', '90', 'La Union');
INSERT INTO `ubicacion_distrito` VALUES ('905', '10', '90', 'Chuquis');
INSERT INTO `ubicacion_distrito` VALUES ('906', '10', '90', 'Marias');
INSERT INTO `ubicacion_distrito` VALUES ('907', '10', '90', 'Pachas');
INSERT INTO `ubicacion_distrito` VALUES ('908', '10', '90', 'Quivilla');
INSERT INTO `ubicacion_distrito` VALUES ('909', '10', '90', 'Ripan');
INSERT INTO `ubicacion_distrito` VALUES ('910', '10', '90', 'Shunqui');
INSERT INTO `ubicacion_distrito` VALUES ('911', '10', '90', 'Sillapata');
INSERT INTO `ubicacion_distrito` VALUES ('912', '10', '90', 'Yanas');
INSERT INTO `ubicacion_distrito` VALUES ('913', '10', '91', 'Huacaybamba');
INSERT INTO `ubicacion_distrito` VALUES ('914', '10', '91', 'Canchabamba');
INSERT INTO `ubicacion_distrito` VALUES ('915', '10', '91', 'Cochabamba');
INSERT INTO `ubicacion_distrito` VALUES ('916', '10', '91', 'Pinra');
INSERT INTO `ubicacion_distrito` VALUES ('917', '10', '92', 'Llata');
INSERT INTO `ubicacion_distrito` VALUES ('918', '10', '92', 'Arancay');
INSERT INTO `ubicacion_distrito` VALUES ('919', '10', '92', 'Chavin De Pariarca');
INSERT INTO `ubicacion_distrito` VALUES ('920', '10', '92', 'Jacas Grande');
INSERT INTO `ubicacion_distrito` VALUES ('921', '10', '92', 'Jircan');
INSERT INTO `ubicacion_distrito` VALUES ('922', '10', '92', 'Miraflores');
INSERT INTO `ubicacion_distrito` VALUES ('923', '10', '92', 'Monzon');
INSERT INTO `ubicacion_distrito` VALUES ('924', '10', '92', 'Punchao');
INSERT INTO `ubicacion_distrito` VALUES ('925', '10', '92', 'Puños');
INSERT INTO `ubicacion_distrito` VALUES ('926', '10', '92', 'Singa');
INSERT INTO `ubicacion_distrito` VALUES ('927', '10', '92', 'Tantamayo');
INSERT INTO `ubicacion_distrito` VALUES ('928', '10', '93', 'Rupa-Rupa');
INSERT INTO `ubicacion_distrito` VALUES ('929', '10', '93', 'Daniel Alomia Robles');
INSERT INTO `ubicacion_distrito` VALUES ('930', '10', '93', 'Hermilio Valdizan');
INSERT INTO `ubicacion_distrito` VALUES ('931', '10', '93', 'Jose Crespo Y Castillo');
INSERT INTO `ubicacion_distrito` VALUES ('932', '10', '93', 'Luyando');
INSERT INTO `ubicacion_distrito` VALUES ('933', '10', '93', 'Mariano Damaso Beraun');
INSERT INTO `ubicacion_distrito` VALUES ('934', '10', '94', 'Huacrachuco');
INSERT INTO `ubicacion_distrito` VALUES ('935', '10', '94', 'Cholon');
INSERT INTO `ubicacion_distrito` VALUES ('936', '10', '94', 'San Buenaventura');
INSERT INTO `ubicacion_distrito` VALUES ('937', '10', '95', 'Panao');
INSERT INTO `ubicacion_distrito` VALUES ('938', '10', '95', 'Chaglla');
INSERT INTO `ubicacion_distrito` VALUES ('939', '10', '95', 'Molino');
INSERT INTO `ubicacion_distrito` VALUES ('940', '10', '95', 'Umari');
INSERT INTO `ubicacion_distrito` VALUES ('941', '10', '96', 'Puerto Inca');
INSERT INTO `ubicacion_distrito` VALUES ('942', '10', '96', 'Codo Del Pozuzo');
INSERT INTO `ubicacion_distrito` VALUES ('943', '10', '96', 'Honoria');
INSERT INTO `ubicacion_distrito` VALUES ('944', '10', '96', 'Tournavista');
INSERT INTO `ubicacion_distrito` VALUES ('945', '10', '96', 'Yuyapichis');
INSERT INTO `ubicacion_distrito` VALUES ('946', '10', '97', 'Jesus');
INSERT INTO `ubicacion_distrito` VALUES ('947', '10', '97', 'Baños');
INSERT INTO `ubicacion_distrito` VALUES ('948', '10', '97', 'Jivia');
INSERT INTO `ubicacion_distrito` VALUES ('949', '10', '97', 'Queropalca');
INSERT INTO `ubicacion_distrito` VALUES ('950', '10', '97', 'Rondos');
INSERT INTO `ubicacion_distrito` VALUES ('951', '10', '97', 'San Francisco De Asis');
INSERT INTO `ubicacion_distrito` VALUES ('952', '10', '97', 'San Miguel De Cauri');
INSERT INTO `ubicacion_distrito` VALUES ('953', '10', '98', 'Chavinillo');
INSERT INTO `ubicacion_distrito` VALUES ('954', '10', '98', 'Cahuac');
INSERT INTO `ubicacion_distrito` VALUES ('955', '10', '98', 'Chacabamba');
INSERT INTO `ubicacion_distrito` VALUES ('956', '10', '98', 'Aparicio Pomares');
INSERT INTO `ubicacion_distrito` VALUES ('957', '10', '98', 'Jacas Chico');
INSERT INTO `ubicacion_distrito` VALUES ('958', '10', '98', 'Obas');
INSERT INTO `ubicacion_distrito` VALUES ('959', '10', '98', 'Pampamarca');
INSERT INTO `ubicacion_distrito` VALUES ('960', '10', '98', 'Choras');
INSERT INTO `ubicacion_distrito` VALUES ('961', '11', '99', 'Ica');
INSERT INTO `ubicacion_distrito` VALUES ('962', '11', '99', 'La Tinguiða');
INSERT INTO `ubicacion_distrito` VALUES ('963', '11', '99', 'Los Aquijes');
INSERT INTO `ubicacion_distrito` VALUES ('964', '11', '99', 'Ocucaje');
INSERT INTO `ubicacion_distrito` VALUES ('965', '11', '99', 'Pachacutec');
INSERT INTO `ubicacion_distrito` VALUES ('966', '11', '99', 'Parcona');
INSERT INTO `ubicacion_distrito` VALUES ('967', '11', '99', 'Pueblo Nuevo');
INSERT INTO `ubicacion_distrito` VALUES ('968', '11', '99', 'Salas');
INSERT INTO `ubicacion_distrito` VALUES ('969', '11', '99', 'San Jose De Los Molinos');
INSERT INTO `ubicacion_distrito` VALUES ('970', '11', '99', 'San Juan Bautista');
INSERT INTO `ubicacion_distrito` VALUES ('971', '11', '99', 'Santiago');
INSERT INTO `ubicacion_distrito` VALUES ('972', '11', '99', 'Subtanjalla');
INSERT INTO `ubicacion_distrito` VALUES ('973', '11', '99', 'Tate');
INSERT INTO `ubicacion_distrito` VALUES ('974', '11', '99', 'Yauca Del Rosario');
INSERT INTO `ubicacion_distrito` VALUES ('975', '11', '100', 'Chincha Alta');
INSERT INTO `ubicacion_distrito` VALUES ('976', '11', '100', 'Alto Laran');
INSERT INTO `ubicacion_distrito` VALUES ('977', '11', '100', 'Chavin');
INSERT INTO `ubicacion_distrito` VALUES ('978', '11', '100', 'Chincha Baja');
INSERT INTO `ubicacion_distrito` VALUES ('979', '11', '100', 'El Carmen');
INSERT INTO `ubicacion_distrito` VALUES ('980', '11', '100', 'Grocio Prado');
INSERT INTO `ubicacion_distrito` VALUES ('981', '11', '100', 'Pueblo Nuevo');
INSERT INTO `ubicacion_distrito` VALUES ('982', '11', '100', 'San Juan De Yanac');
INSERT INTO `ubicacion_distrito` VALUES ('983', '11', '100', 'San Pedro De Huacarpana');
INSERT INTO `ubicacion_distrito` VALUES ('984', '11', '100', 'Sunampe');
INSERT INTO `ubicacion_distrito` VALUES ('985', '11', '100', 'Tambo De Mora');
INSERT INTO `ubicacion_distrito` VALUES ('986', '11', '101', 'Nazca');
INSERT INTO `ubicacion_distrito` VALUES ('987', '11', '101', 'Changuillo');
INSERT INTO `ubicacion_distrito` VALUES ('988', '11', '101', 'El Ingenio');
INSERT INTO `ubicacion_distrito` VALUES ('989', '11', '101', 'Marcona');
INSERT INTO `ubicacion_distrito` VALUES ('990', '11', '101', 'Vista Alegre');
INSERT INTO `ubicacion_distrito` VALUES ('991', '11', '102', 'Palpa');
INSERT INTO `ubicacion_distrito` VALUES ('992', '11', '102', 'Llipata');
INSERT INTO `ubicacion_distrito` VALUES ('993', '11', '102', 'Rio Grande');
INSERT INTO `ubicacion_distrito` VALUES ('994', '11', '102', 'Santa Cruz');
INSERT INTO `ubicacion_distrito` VALUES ('995', '11', '102', 'Tibillo');
INSERT INTO `ubicacion_distrito` VALUES ('996', '11', '103', 'Pisco');
INSERT INTO `ubicacion_distrito` VALUES ('997', '11', '103', 'Huancano');
INSERT INTO `ubicacion_distrito` VALUES ('998', '11', '103', 'Humay');
INSERT INTO `ubicacion_distrito` VALUES ('999', '11', '103', 'Independencia');
INSERT INTO `ubicacion_distrito` VALUES ('1000', '11', '103', 'Paracas');
INSERT INTO `ubicacion_distrito` VALUES ('1001', '11', '103', 'San Andres');
INSERT INTO `ubicacion_distrito` VALUES ('1002', '11', '103', 'San Clemente');
INSERT INTO `ubicacion_distrito` VALUES ('1003', '11', '103', 'Tupac Amaru Inca');
INSERT INTO `ubicacion_distrito` VALUES ('1004', '12', '104', 'Huancayo');
INSERT INTO `ubicacion_distrito` VALUES ('1005', '12', '104', 'Carhuacallanga');
INSERT INTO `ubicacion_distrito` VALUES ('1006', '12', '104', 'Chacapampa');
INSERT INTO `ubicacion_distrito` VALUES ('1007', '12', '104', 'Chicche');
INSERT INTO `ubicacion_distrito` VALUES ('1008', '12', '104', 'Chilca');
INSERT INTO `ubicacion_distrito` VALUES ('1009', '12', '104', 'Chongos Alto');
INSERT INTO `ubicacion_distrito` VALUES ('1010', '12', '104', 'Chupuro');
INSERT INTO `ubicacion_distrito` VALUES ('1011', '12', '104', 'Colca');
INSERT INTO `ubicacion_distrito` VALUES ('1012', '12', '104', 'Cullhuas');
INSERT INTO `ubicacion_distrito` VALUES ('1013', '12', '104', 'El Tambo');
INSERT INTO `ubicacion_distrito` VALUES ('1014', '12', '104', 'Huacrapuquio');
INSERT INTO `ubicacion_distrito` VALUES ('1015', '12', '104', 'Hualhuas');
INSERT INTO `ubicacion_distrito` VALUES ('1016', '12', '104', 'Huancan');
INSERT INTO `ubicacion_distrito` VALUES ('1017', '12', '104', 'Huasicancha');
INSERT INTO `ubicacion_distrito` VALUES ('1018', '12', '104', 'Huayucachi');
INSERT INTO `ubicacion_distrito` VALUES ('1019', '12', '104', 'Ingenio');
INSERT INTO `ubicacion_distrito` VALUES ('1020', '12', '104', 'Pariahuanca');
INSERT INTO `ubicacion_distrito` VALUES ('1021', '12', '104', 'Pilcomayo');
INSERT INTO `ubicacion_distrito` VALUES ('1022', '12', '104', 'Pucara');
INSERT INTO `ubicacion_distrito` VALUES ('1023', '12', '104', 'Quichuay');
INSERT INTO `ubicacion_distrito` VALUES ('1024', '12', '104', 'Quilcas');
INSERT INTO `ubicacion_distrito` VALUES ('1025', '12', '104', 'San Agustin');
INSERT INTO `ubicacion_distrito` VALUES ('1026', '12', '104', 'San Jeronimo De Tunan');
INSERT INTO `ubicacion_distrito` VALUES ('1027', '12', '104', 'Saño');
INSERT INTO `ubicacion_distrito` VALUES ('1028', '12', '104', 'Sapallanga');
INSERT INTO `ubicacion_distrito` VALUES ('1029', '12', '104', 'Sicaya');
INSERT INTO `ubicacion_distrito` VALUES ('1030', '12', '104', 'Santo Domingo De Acobamba');
INSERT INTO `ubicacion_distrito` VALUES ('1031', '12', '104', 'Viques');
INSERT INTO `ubicacion_distrito` VALUES ('1032', '12', '105', 'Concepcion');
INSERT INTO `ubicacion_distrito` VALUES ('1033', '12', '105', 'Aco');
INSERT INTO `ubicacion_distrito` VALUES ('1034', '12', '105', 'Andamarca');
INSERT INTO `ubicacion_distrito` VALUES ('1035', '12', '105', 'Chambara');
INSERT INTO `ubicacion_distrito` VALUES ('1036', '12', '105', 'Cochas');
INSERT INTO `ubicacion_distrito` VALUES ('1037', '12', '105', 'Comas');
INSERT INTO `ubicacion_distrito` VALUES ('1038', '12', '105', 'Heroinas Toledo');
INSERT INTO `ubicacion_distrito` VALUES ('1039', '12', '105', 'Manzanares');
INSERT INTO `ubicacion_distrito` VALUES ('1040', '12', '105', 'Mariscal Castilla');
INSERT INTO `ubicacion_distrito` VALUES ('1041', '12', '105', 'Matahuasi');
INSERT INTO `ubicacion_distrito` VALUES ('1042', '12', '105', 'Mito');
INSERT INTO `ubicacion_distrito` VALUES ('1043', '12', '105', 'Nueve De Julio');
INSERT INTO `ubicacion_distrito` VALUES ('1044', '12', '105', 'Orcotuna');
INSERT INTO `ubicacion_distrito` VALUES ('1045', '12', '105', 'San Jose De Quero');
INSERT INTO `ubicacion_distrito` VALUES ('1046', '12', '105', 'Santa Rosa De Ocopa');
INSERT INTO `ubicacion_distrito` VALUES ('1047', '12', '106', 'Chanchamayo');
INSERT INTO `ubicacion_distrito` VALUES ('1048', '12', '106', 'Perene');
INSERT INTO `ubicacion_distrito` VALUES ('1049', '12', '106', 'Pichanaqui');
INSERT INTO `ubicacion_distrito` VALUES ('1050', '12', '106', 'San Luis De Shuaro');
INSERT INTO `ubicacion_distrito` VALUES ('1051', '12', '106', 'San Ramon');
INSERT INTO `ubicacion_distrito` VALUES ('1052', '12', '106', 'Vitoc');
INSERT INTO `ubicacion_distrito` VALUES ('1053', '12', '107', 'Jauja');
INSERT INTO `ubicacion_distrito` VALUES ('1054', '12', '107', 'Acolla');
INSERT INTO `ubicacion_distrito` VALUES ('1055', '12', '107', 'Apata');
INSERT INTO `ubicacion_distrito` VALUES ('1056', '12', '107', 'Ataura');
INSERT INTO `ubicacion_distrito` VALUES ('1057', '12', '107', 'Canchayllo');
INSERT INTO `ubicacion_distrito` VALUES ('1058', '12', '107', 'Curicaca');
INSERT INTO `ubicacion_distrito` VALUES ('1059', '12', '107', 'El Mantaro');
INSERT INTO `ubicacion_distrito` VALUES ('1060', '12', '107', 'Huamali');
INSERT INTO `ubicacion_distrito` VALUES ('1061', '12', '107', 'Huaripampa');
INSERT INTO `ubicacion_distrito` VALUES ('1062', '12', '107', 'Huertas');
INSERT INTO `ubicacion_distrito` VALUES ('1063', '12', '107', 'Janjaillo');
INSERT INTO `ubicacion_distrito` VALUES ('1064', '12', '107', 'Julcan');
INSERT INTO `ubicacion_distrito` VALUES ('1065', '12', '107', 'Leonor Ordoñez');
INSERT INTO `ubicacion_distrito` VALUES ('1066', '12', '107', 'Llocllapampa');
INSERT INTO `ubicacion_distrito` VALUES ('1067', '12', '107', 'Marco');
INSERT INTO `ubicacion_distrito` VALUES ('1068', '12', '107', 'Masma');
INSERT INTO `ubicacion_distrito` VALUES ('1069', '12', '107', 'Masma Chicche');
INSERT INTO `ubicacion_distrito` VALUES ('1070', '12', '107', 'Molinos');
INSERT INTO `ubicacion_distrito` VALUES ('1071', '12', '107', 'Monobamba');
INSERT INTO `ubicacion_distrito` VALUES ('1072', '12', '107', 'Muqui');
INSERT INTO `ubicacion_distrito` VALUES ('1073', '12', '107', 'Muquiyauyo');
INSERT INTO `ubicacion_distrito` VALUES ('1074', '12', '107', 'Paca');
INSERT INTO `ubicacion_distrito` VALUES ('1075', '12', '107', 'Paccha');
INSERT INTO `ubicacion_distrito` VALUES ('1076', '12', '107', 'Pancan');
INSERT INTO `ubicacion_distrito` VALUES ('1077', '12', '107', 'Parco');
INSERT INTO `ubicacion_distrito` VALUES ('1078', '12', '107', 'Pomacancha');
INSERT INTO `ubicacion_distrito` VALUES ('1079', '12', '107', 'Ricran');
INSERT INTO `ubicacion_distrito` VALUES ('1080', '12', '107', 'San Lorenzo');
INSERT INTO `ubicacion_distrito` VALUES ('1081', '12', '107', 'San Pedro De Chunan');
INSERT INTO `ubicacion_distrito` VALUES ('1082', '12', '107', 'Sausa');
INSERT INTO `ubicacion_distrito` VALUES ('1083', '12', '107', 'Sincos');
INSERT INTO `ubicacion_distrito` VALUES ('1084', '12', '107', 'Tunan Marca');
INSERT INTO `ubicacion_distrito` VALUES ('1085', '12', '107', 'Yauli');
INSERT INTO `ubicacion_distrito` VALUES ('1086', '12', '107', 'Yauyos');
INSERT INTO `ubicacion_distrito` VALUES ('1087', '12', '108', 'Junin');
INSERT INTO `ubicacion_distrito` VALUES ('1088', '12', '108', 'Carhuamayo');
INSERT INTO `ubicacion_distrito` VALUES ('1089', '12', '108', 'Ondores');
INSERT INTO `ubicacion_distrito` VALUES ('1090', '12', '108', 'Ulcumayo');
INSERT INTO `ubicacion_distrito` VALUES ('1091', '12', '109', 'Satipo');
INSERT INTO `ubicacion_distrito` VALUES ('1092', '12', '109', 'Coviriali');
INSERT INTO `ubicacion_distrito` VALUES ('1093', '12', '109', 'Llaylla');
INSERT INTO `ubicacion_distrito` VALUES ('1094', '12', '109', 'Mazamari');
INSERT INTO `ubicacion_distrito` VALUES ('1095', '12', '109', 'Pampa Hermosa');
INSERT INTO `ubicacion_distrito` VALUES ('1096', '12', '109', 'Pangoa');
INSERT INTO `ubicacion_distrito` VALUES ('1097', '12', '109', 'Rio Negro');
INSERT INTO `ubicacion_distrito` VALUES ('1098', '12', '109', 'Rio Tambo');
INSERT INTO `ubicacion_distrito` VALUES ('1099', '12', '110', 'Tarma');
INSERT INTO `ubicacion_distrito` VALUES ('1100', '12', '110', 'Acobamba');
INSERT INTO `ubicacion_distrito` VALUES ('1101', '12', '110', 'Huaricolca');
INSERT INTO `ubicacion_distrito` VALUES ('1102', '12', '110', 'Huasahuasi');
INSERT INTO `ubicacion_distrito` VALUES ('1103', '12', '110', 'La Union');
INSERT INTO `ubicacion_distrito` VALUES ('1104', '12', '110', 'Palca');
INSERT INTO `ubicacion_distrito` VALUES ('1105', '12', '110', 'Palcamayo');
INSERT INTO `ubicacion_distrito` VALUES ('1106', '12', '110', 'San Pedro De Cajas');
INSERT INTO `ubicacion_distrito` VALUES ('1107', '12', '110', 'Tapo');
INSERT INTO `ubicacion_distrito` VALUES ('1108', '12', '111', 'La Oroya');
INSERT INTO `ubicacion_distrito` VALUES ('1109', '12', '111', 'Chacapalpa');
INSERT INTO `ubicacion_distrito` VALUES ('1110', '12', '111', 'Huay-Huay');
INSERT INTO `ubicacion_distrito` VALUES ('1111', '12', '111', 'Marcapomacocha');
INSERT INTO `ubicacion_distrito` VALUES ('1112', '12', '111', 'Morococha');
INSERT INTO `ubicacion_distrito` VALUES ('1113', '12', '111', 'Paccha');
INSERT INTO `ubicacion_distrito` VALUES ('1114', '12', '111', 'Santa Barbara De Carhuacaya');
INSERT INTO `ubicacion_distrito` VALUES ('1115', '12', '111', 'Santa Rosa De Sacco');
INSERT INTO `ubicacion_distrito` VALUES ('1116', '12', '111', 'Suitucancha');
INSERT INTO `ubicacion_distrito` VALUES ('1117', '12', '111', 'Yauli');
INSERT INTO `ubicacion_distrito` VALUES ('1118', '12', '112', 'Chupaca');
INSERT INTO `ubicacion_distrito` VALUES ('1119', '12', '112', 'Ahuac');
INSERT INTO `ubicacion_distrito` VALUES ('1120', '12', '112', 'Chongos Bajo');
INSERT INTO `ubicacion_distrito` VALUES ('1121', '12', '112', 'Huachac');
INSERT INTO `ubicacion_distrito` VALUES ('1122', '12', '112', 'Huamancaca Chico');
INSERT INTO `ubicacion_distrito` VALUES ('1123', '12', '112', 'San Juan De Iscos');
INSERT INTO `ubicacion_distrito` VALUES ('1124', '12', '112', 'San Juan De Jarpa');
INSERT INTO `ubicacion_distrito` VALUES ('1125', '12', '112', 'Tres De Diciembre');
INSERT INTO `ubicacion_distrito` VALUES ('1126', '12', '112', 'Yanacancha');
INSERT INTO `ubicacion_distrito` VALUES ('1127', '13', '113', 'Trujillo');
INSERT INTO `ubicacion_distrito` VALUES ('1128', '13', '113', 'El Porvenir');
INSERT INTO `ubicacion_distrito` VALUES ('1129', '13', '113', 'Florencia De Mora');
INSERT INTO `ubicacion_distrito` VALUES ('1130', '13', '113', 'Huanchaco');
INSERT INTO `ubicacion_distrito` VALUES ('1131', '13', '113', 'La Esperanza');
INSERT INTO `ubicacion_distrito` VALUES ('1132', '13', '113', 'Laredo');
INSERT INTO `ubicacion_distrito` VALUES ('1133', '13', '113', 'Moche');
INSERT INTO `ubicacion_distrito` VALUES ('1134', '13', '113', 'Poroto');
INSERT INTO `ubicacion_distrito` VALUES ('1135', '13', '113', 'Salaverry');
INSERT INTO `ubicacion_distrito` VALUES ('1136', '13', '113', 'Simbal');
INSERT INTO `ubicacion_distrito` VALUES ('1137', '13', '113', 'Victor Larco Herrera');
INSERT INTO `ubicacion_distrito` VALUES ('1138', '13', '114', 'Ascope');
INSERT INTO `ubicacion_distrito` VALUES ('1139', '13', '114', 'Chicama');
INSERT INTO `ubicacion_distrito` VALUES ('1140', '13', '114', 'Chocope');
INSERT INTO `ubicacion_distrito` VALUES ('1141', '13', '114', 'Magdalena De Cao');
INSERT INTO `ubicacion_distrito` VALUES ('1142', '13', '114', 'Paijan');
INSERT INTO `ubicacion_distrito` VALUES ('1143', '13', '114', 'Razuri');
INSERT INTO `ubicacion_distrito` VALUES ('1144', '13', '114', 'Santiago De Cao');
INSERT INTO `ubicacion_distrito` VALUES ('1145', '13', '114', 'Casa Grande');
INSERT INTO `ubicacion_distrito` VALUES ('1146', '13', '115', 'Bolivar');
INSERT INTO `ubicacion_distrito` VALUES ('1147', '13', '115', 'Bambamarca');
INSERT INTO `ubicacion_distrito` VALUES ('1148', '13', '115', 'Condormarca');
INSERT INTO `ubicacion_distrito` VALUES ('1149', '13', '115', 'Longotea');
INSERT INTO `ubicacion_distrito` VALUES ('1150', '13', '115', 'Uchumarca');
INSERT INTO `ubicacion_distrito` VALUES ('1151', '13', '115', 'Ucuncha');
INSERT INTO `ubicacion_distrito` VALUES ('1152', '13', '116', 'Chepen');
INSERT INTO `ubicacion_distrito` VALUES ('1153', '13', '116', 'Pacanga');
INSERT INTO `ubicacion_distrito` VALUES ('1154', '13', '116', 'Pueblo Nuevo');
INSERT INTO `ubicacion_distrito` VALUES ('1155', '13', '117', 'Julcan');
INSERT INTO `ubicacion_distrito` VALUES ('1156', '13', '117', 'Calamarca');
INSERT INTO `ubicacion_distrito` VALUES ('1157', '13', '117', 'Carabamba');
INSERT INTO `ubicacion_distrito` VALUES ('1158', '13', '117', 'Huaso');
INSERT INTO `ubicacion_distrito` VALUES ('1159', '13', '118', 'Otuzco');
INSERT INTO `ubicacion_distrito` VALUES ('1160', '13', '118', 'Agallpampa');
INSERT INTO `ubicacion_distrito` VALUES ('1161', '13', '118', 'Charat');
INSERT INTO `ubicacion_distrito` VALUES ('1162', '13', '118', 'Huaranchal');
INSERT INTO `ubicacion_distrito` VALUES ('1163', '13', '118', 'La Cuesta');
INSERT INTO `ubicacion_distrito` VALUES ('1164', '13', '118', 'Mache');
INSERT INTO `ubicacion_distrito` VALUES ('1165', '13', '118', 'Paranday');
INSERT INTO `ubicacion_distrito` VALUES ('1166', '13', '118', 'Salpo');
INSERT INTO `ubicacion_distrito` VALUES ('1167', '13', '118', 'Sinsicap');
INSERT INTO `ubicacion_distrito` VALUES ('1168', '13', '118', 'Usquil');
INSERT INTO `ubicacion_distrito` VALUES ('1169', '13', '119', 'San Pedro De Lloc');
INSERT INTO `ubicacion_distrito` VALUES ('1170', '13', '119', 'Guadalupe');
INSERT INTO `ubicacion_distrito` VALUES ('1171', '13', '119', 'Jequetepeque');
INSERT INTO `ubicacion_distrito` VALUES ('1172', '13', '119', 'Pacasmayo');
INSERT INTO `ubicacion_distrito` VALUES ('1173', '13', '119', 'San Jose');
INSERT INTO `ubicacion_distrito` VALUES ('1174', '13', '120', 'Tayabamba');
INSERT INTO `ubicacion_distrito` VALUES ('1175', '13', '120', 'Buldibuyo');
INSERT INTO `ubicacion_distrito` VALUES ('1176', '13', '120', 'Chillia');
INSERT INTO `ubicacion_distrito` VALUES ('1177', '13', '120', 'Huancaspata');
INSERT INTO `ubicacion_distrito` VALUES ('1178', '13', '120', 'Huaylillas');
INSERT INTO `ubicacion_distrito` VALUES ('1179', '13', '120', 'Huayo');
INSERT INTO `ubicacion_distrito` VALUES ('1180', '13', '120', 'Ongon');
INSERT INTO `ubicacion_distrito` VALUES ('1181', '13', '120', 'Parcoy');
INSERT INTO `ubicacion_distrito` VALUES ('1182', '13', '120', 'Pataz');
INSERT INTO `ubicacion_distrito` VALUES ('1183', '13', '120', 'Pias');
INSERT INTO `ubicacion_distrito` VALUES ('1184', '13', '120', 'Santiago De Challas');
INSERT INTO `ubicacion_distrito` VALUES ('1185', '13', '120', 'Taurija');
INSERT INTO `ubicacion_distrito` VALUES ('1186', '13', '120', 'Urpay');
INSERT INTO `ubicacion_distrito` VALUES ('1187', '13', '121', 'Huamachuco');
INSERT INTO `ubicacion_distrito` VALUES ('1188', '13', '121', 'Chugay');
INSERT INTO `ubicacion_distrito` VALUES ('1189', '13', '121', 'Cochorco');
INSERT INTO `ubicacion_distrito` VALUES ('1190', '13', '121', 'Curgos');
INSERT INTO `ubicacion_distrito` VALUES ('1191', '13', '121', 'Marcabal');
INSERT INTO `ubicacion_distrito` VALUES ('1192', '13', '121', 'Sanagoran');
INSERT INTO `ubicacion_distrito` VALUES ('1193', '13', '121', 'Sarin');
INSERT INTO `ubicacion_distrito` VALUES ('1194', '13', '121', 'Sartimbamba');
INSERT INTO `ubicacion_distrito` VALUES ('1195', '13', '122', 'Santiago De Chuco');
INSERT INTO `ubicacion_distrito` VALUES ('1196', '13', '122', 'Angasmarca');
INSERT INTO `ubicacion_distrito` VALUES ('1197', '13', '122', 'Cachicadan');
INSERT INTO `ubicacion_distrito` VALUES ('1198', '13', '122', 'Mollebamba');
INSERT INTO `ubicacion_distrito` VALUES ('1199', '13', '122', 'Mollepata');
INSERT INTO `ubicacion_distrito` VALUES ('1200', '13', '122', 'Quiruvilca');
INSERT INTO `ubicacion_distrito` VALUES ('1201', '13', '122', 'Santa Cruz De Chuca');
INSERT INTO `ubicacion_distrito` VALUES ('1202', '13', '122', 'Sitabamba');
INSERT INTO `ubicacion_distrito` VALUES ('1203', '13', '123', 'Cascas');
INSERT INTO `ubicacion_distrito` VALUES ('1204', '13', '123', 'Lucma');
INSERT INTO `ubicacion_distrito` VALUES ('1205', '13', '123', 'Marmot');
INSERT INTO `ubicacion_distrito` VALUES ('1206', '13', '123', 'Sayapullo');
INSERT INTO `ubicacion_distrito` VALUES ('1207', '13', '124', 'Viru');
INSERT INTO `ubicacion_distrito` VALUES ('1208', '13', '124', 'Chao');
INSERT INTO `ubicacion_distrito` VALUES ('1209', '13', '124', 'Guadalupito');
INSERT INTO `ubicacion_distrito` VALUES ('1210', '14', '125', 'Chiclayo');
INSERT INTO `ubicacion_distrito` VALUES ('1211', '14', '125', 'Chongoyape');
INSERT INTO `ubicacion_distrito` VALUES ('1212', '14', '125', 'Eten');
INSERT INTO `ubicacion_distrito` VALUES ('1213', '14', '125', 'Eten Puerto');
INSERT INTO `ubicacion_distrito` VALUES ('1214', '14', '125', 'Jose Leonardo Ortiz');
INSERT INTO `ubicacion_distrito` VALUES ('1215', '14', '125', 'La Victoria');
INSERT INTO `ubicacion_distrito` VALUES ('1216', '14', '125', 'Lagunas');
INSERT INTO `ubicacion_distrito` VALUES ('1217', '14', '125', 'Monsefu');
INSERT INTO `ubicacion_distrito` VALUES ('1218', '14', '125', 'Nueva Arica');
INSERT INTO `ubicacion_distrito` VALUES ('1219', '14', '125', 'Oyotun');
INSERT INTO `ubicacion_distrito` VALUES ('1220', '14', '125', 'Picsi');
INSERT INTO `ubicacion_distrito` VALUES ('1221', '14', '125', 'Pimentel');
INSERT INTO `ubicacion_distrito` VALUES ('1222', '14', '125', 'Reque');
INSERT INTO `ubicacion_distrito` VALUES ('1223', '14', '125', 'Santa Rosa');
INSERT INTO `ubicacion_distrito` VALUES ('1224', '14', '125', 'Saña');
INSERT INTO `ubicacion_distrito` VALUES ('1225', '14', '125', 'Cayalti');
INSERT INTO `ubicacion_distrito` VALUES ('1226', '14', '125', 'Patapo');
INSERT INTO `ubicacion_distrito` VALUES ('1227', '14', '125', 'Pomalca');
INSERT INTO `ubicacion_distrito` VALUES ('1228', '14', '125', 'Pucala');
INSERT INTO `ubicacion_distrito` VALUES ('1229', '14', '125', 'Tuman');
INSERT INTO `ubicacion_distrito` VALUES ('1230', '14', '126', 'Ferreñafe');
INSERT INTO `ubicacion_distrito` VALUES ('1231', '14', '126', 'Cañaris');
INSERT INTO `ubicacion_distrito` VALUES ('1232', '14', '126', 'Incahuasi');
INSERT INTO `ubicacion_distrito` VALUES ('1233', '14', '126', 'Manuel Antonio Mesones');
INSERT INTO `ubicacion_distrito` VALUES ('1234', '14', '126', 'o');
INSERT INTO `ubicacion_distrito` VALUES ('1235', '14', '126', 'Pitipo');
INSERT INTO `ubicacion_distrito` VALUES ('1236', '14', '126', 'Pueblo Nuevo');
INSERT INTO `ubicacion_distrito` VALUES ('1237', '14', '127', 'Lambayeque');
INSERT INTO `ubicacion_distrito` VALUES ('1238', '14', '127', 'Chochope');
INSERT INTO `ubicacion_distrito` VALUES ('1239', '14', '127', 'Illimo');
INSERT INTO `ubicacion_distrito` VALUES ('1240', '14', '127', 'Jayanca');
INSERT INTO `ubicacion_distrito` VALUES ('1241', '14', '127', 'Mochumi');
INSERT INTO `ubicacion_distrito` VALUES ('1242', '14', '127', 'Morrope');
INSERT INTO `ubicacion_distrito` VALUES ('1243', '14', '127', 'Motupe');
INSERT INTO `ubicacion_distrito` VALUES ('1244', '14', '127', 'Olmos');
INSERT INTO `ubicacion_distrito` VALUES ('1245', '14', '127', 'Pacora');
INSERT INTO `ubicacion_distrito` VALUES ('1246', '14', '127', 'Salas');
INSERT INTO `ubicacion_distrito` VALUES ('1247', '14', '127', 'San Jose');
INSERT INTO `ubicacion_distrito` VALUES ('1248', '14', '127', 'Tucume');
INSERT INTO `ubicacion_distrito` VALUES ('1249', '15', '128', 'Lima');
INSERT INTO `ubicacion_distrito` VALUES ('1250', '15', '128', 'Ancon');
INSERT INTO `ubicacion_distrito` VALUES ('1251', '15', '128', 'Ate');
INSERT INTO `ubicacion_distrito` VALUES ('1252', '15', '128', 'Barranco');
INSERT INTO `ubicacion_distrito` VALUES ('1253', '15', '128', 'Breña');
INSERT INTO `ubicacion_distrito` VALUES ('1254', '15', '128', 'Carabayllo');
INSERT INTO `ubicacion_distrito` VALUES ('1255', '15', '128', 'Chaclacayo');
INSERT INTO `ubicacion_distrito` VALUES ('1256', '15', '128', 'Chorrillos');
INSERT INTO `ubicacion_distrito` VALUES ('1257', '15', '128', 'Cieneguilla');
INSERT INTO `ubicacion_distrito` VALUES ('1258', '15', '128', 'Comas');
INSERT INTO `ubicacion_distrito` VALUES ('1259', '15', '128', 'El Agustino');
INSERT INTO `ubicacion_distrito` VALUES ('1260', '15', '128', 'Independencia');
INSERT INTO `ubicacion_distrito` VALUES ('1261', '15', '128', 'Jesus Maria');
INSERT INTO `ubicacion_distrito` VALUES ('1262', '15', '128', 'La Molina');
INSERT INTO `ubicacion_distrito` VALUES ('1263', '15', '128', 'La Victoria');
INSERT INTO `ubicacion_distrito` VALUES ('1264', '15', '128', 'Lince');
INSERT INTO `ubicacion_distrito` VALUES ('1265', '15', '128', 'Los Olivos');
INSERT INTO `ubicacion_distrito` VALUES ('1266', '15', '128', 'Lurigancho');
INSERT INTO `ubicacion_distrito` VALUES ('1267', '15', '128', 'Lurin');
INSERT INTO `ubicacion_distrito` VALUES ('1268', '15', '128', 'Magdalena Del Mar');
INSERT INTO `ubicacion_distrito` VALUES ('1269', '15', '128', 'Pueblo Libre');
INSERT INTO `ubicacion_distrito` VALUES ('1270', '15', '128', 'Miraflores');
INSERT INTO `ubicacion_distrito` VALUES ('1271', '15', '128', 'Pachacamac');
INSERT INTO `ubicacion_distrito` VALUES ('1272', '15', '128', 'Pucusana');
INSERT INTO `ubicacion_distrito` VALUES ('1273', '15', '128', 'Puente Piedra');
INSERT INTO `ubicacion_distrito` VALUES ('1274', '15', '128', 'Punta Hermosa');
INSERT INTO `ubicacion_distrito` VALUES ('1275', '15', '128', 'Punta Negra');
INSERT INTO `ubicacion_distrito` VALUES ('1276', '15', '128', 'Rimac');
INSERT INTO `ubicacion_distrito` VALUES ('1277', '15', '128', 'San Bartolo');
INSERT INTO `ubicacion_distrito` VALUES ('1278', '15', '128', 'San Borja');
INSERT INTO `ubicacion_distrito` VALUES ('1279', '15', '128', 'San Isidro');
INSERT INTO `ubicacion_distrito` VALUES ('1280', '15', '128', 'San Juan De Lurigancho');
INSERT INTO `ubicacion_distrito` VALUES ('1281', '15', '128', 'San Juan De Miraflores');
INSERT INTO `ubicacion_distrito` VALUES ('1282', '15', '128', 'San Luis');
INSERT INTO `ubicacion_distrito` VALUES ('1283', '15', '128', 'San Martin De Porres');
INSERT INTO `ubicacion_distrito` VALUES ('1284', '15', '128', 'San Miguel');
INSERT INTO `ubicacion_distrito` VALUES ('1285', '15', '128', 'Santa Anita');
INSERT INTO `ubicacion_distrito` VALUES ('1286', '15', '128', 'Santa Maria Del Mar');
INSERT INTO `ubicacion_distrito` VALUES ('1287', '15', '128', 'Santa Rosa');
INSERT INTO `ubicacion_distrito` VALUES ('1288', '15', '128', 'Santiago De Surco');
INSERT INTO `ubicacion_distrito` VALUES ('1289', '15', '128', 'Surquillo');
INSERT INTO `ubicacion_distrito` VALUES ('1290', '15', '128', 'Villa El Salvador');
INSERT INTO `ubicacion_distrito` VALUES ('1291', '15', '128', 'Villa Maria Del Triunfo');
INSERT INTO `ubicacion_distrito` VALUES ('1292', '15', '129', 'Barranca');
INSERT INTO `ubicacion_distrito` VALUES ('1293', '15', '129', 'Paramonga');
INSERT INTO `ubicacion_distrito` VALUES ('1294', '15', '129', 'Pativilca');
INSERT INTO `ubicacion_distrito` VALUES ('1295', '15', '129', 'Supe');
INSERT INTO `ubicacion_distrito` VALUES ('1296', '15', '129', 'Supe Puerto');
INSERT INTO `ubicacion_distrito` VALUES ('1297', '15', '130', 'Cajatambo');
INSERT INTO `ubicacion_distrito` VALUES ('1298', '15', '130', 'Copa');
INSERT INTO `ubicacion_distrito` VALUES ('1299', '15', '130', 'Gorgor');
INSERT INTO `ubicacion_distrito` VALUES ('1300', '15', '130', 'Huancapon');
INSERT INTO `ubicacion_distrito` VALUES ('1301', '15', '130', 'Manas');
INSERT INTO `ubicacion_distrito` VALUES ('1302', '15', '131', 'Canta');
INSERT INTO `ubicacion_distrito` VALUES ('1303', '15', '131', 'Arahuay');
INSERT INTO `ubicacion_distrito` VALUES ('1304', '15', '131', 'Huamantanga');
INSERT INTO `ubicacion_distrito` VALUES ('1305', '15', '131', 'Huaros');
INSERT INTO `ubicacion_distrito` VALUES ('1306', '15', '131', 'Lachaqui');
INSERT INTO `ubicacion_distrito` VALUES ('1307', '15', '131', 'San Buenaventura');
INSERT INTO `ubicacion_distrito` VALUES ('1308', '15', '131', 'Santa Rosa De Quives');
INSERT INTO `ubicacion_distrito` VALUES ('1309', '15', '132', 'San Vicente De Cañete');
INSERT INTO `ubicacion_distrito` VALUES ('1310', '15', '132', 'Asia');
INSERT INTO `ubicacion_distrito` VALUES ('1311', '15', '132', 'Calango');
INSERT INTO `ubicacion_distrito` VALUES ('1312', '15', '132', 'Cerro Azul');
INSERT INTO `ubicacion_distrito` VALUES ('1313', '15', '132', 'Chilca');
INSERT INTO `ubicacion_distrito` VALUES ('1314', '15', '132', 'Coayllo');
INSERT INTO `ubicacion_distrito` VALUES ('1315', '15', '132', 'Imperial');
INSERT INTO `ubicacion_distrito` VALUES ('1316', '15', '132', 'Lunahuana');
INSERT INTO `ubicacion_distrito` VALUES ('1317', '15', '132', 'Mala');
INSERT INTO `ubicacion_distrito` VALUES ('1318', '15', '132', 'Nuevo Imperial');
INSERT INTO `ubicacion_distrito` VALUES ('1319', '15', '132', 'Pacaran');
INSERT INTO `ubicacion_distrito` VALUES ('1320', '15', '132', 'Quilmana');
INSERT INTO `ubicacion_distrito` VALUES ('1321', '15', '132', 'San Antonio');
INSERT INTO `ubicacion_distrito` VALUES ('1322', '15', '132', 'San Luis');
INSERT INTO `ubicacion_distrito` VALUES ('1323', '15', '132', 'Santa Cruz De Flores');
INSERT INTO `ubicacion_distrito` VALUES ('1324', '15', '132', 'Zuñiga');
INSERT INTO `ubicacion_distrito` VALUES ('1325', '15', '133', 'Huaral');
INSERT INTO `ubicacion_distrito` VALUES ('1326', '15', '133', 'Atavillos Alto');
INSERT INTO `ubicacion_distrito` VALUES ('1327', '15', '133', 'Atavillos Bajo');
INSERT INTO `ubicacion_distrito` VALUES ('1328', '15', '133', 'Aucallama');
INSERT INTO `ubicacion_distrito` VALUES ('1329', '15', '133', 'Chancay');
INSERT INTO `ubicacion_distrito` VALUES ('1330', '15', '133', 'Ihuari');
INSERT INTO `ubicacion_distrito` VALUES ('1331', '15', '133', 'Lampian');
INSERT INTO `ubicacion_distrito` VALUES ('1332', '15', '133', 'Pacaraos');
INSERT INTO `ubicacion_distrito` VALUES ('1333', '15', '133', 'San Miguel De Acos');
INSERT INTO `ubicacion_distrito` VALUES ('1334', '15', '133', 'Santa Cruz De Andamarca');
INSERT INTO `ubicacion_distrito` VALUES ('1335', '15', '133', 'Sumbilca');
INSERT INTO `ubicacion_distrito` VALUES ('1336', '15', '133', 'Veintisiete De Noviembre');
INSERT INTO `ubicacion_distrito` VALUES ('1337', '15', '134', 'Matucana');
INSERT INTO `ubicacion_distrito` VALUES ('1338', '15', '134', 'Antioquia');
INSERT INTO `ubicacion_distrito` VALUES ('1339', '15', '134', 'Callahuanca');
INSERT INTO `ubicacion_distrito` VALUES ('1340', '15', '134', 'Carampoma');
INSERT INTO `ubicacion_distrito` VALUES ('1341', '15', '134', 'Chicla');
INSERT INTO `ubicacion_distrito` VALUES ('1342', '15', '134', 'Cuenca');
INSERT INTO `ubicacion_distrito` VALUES ('1343', '15', '134', 'Huachupampa');
INSERT INTO `ubicacion_distrito` VALUES ('1344', '15', '134', 'Huanza');
INSERT INTO `ubicacion_distrito` VALUES ('1345', '15', '134', 'Huarochiri');
INSERT INTO `ubicacion_distrito` VALUES ('1346', '15', '134', 'Lahuaytambo');
INSERT INTO `ubicacion_distrito` VALUES ('1347', '15', '134', 'Langa');
INSERT INTO `ubicacion_distrito` VALUES ('1348', '15', '134', 'Laraos');
INSERT INTO `ubicacion_distrito` VALUES ('1349', '15', '134', 'Mariatana');
INSERT INTO `ubicacion_distrito` VALUES ('1350', '15', '134', 'Ricardo Palma');
INSERT INTO `ubicacion_distrito` VALUES ('1351', '15', '134', 'San Andres De Tupicocha');
INSERT INTO `ubicacion_distrito` VALUES ('1352', '15', '134', 'San Antonio');
INSERT INTO `ubicacion_distrito` VALUES ('1353', '15', '134', 'San Bartolome');
INSERT INTO `ubicacion_distrito` VALUES ('1354', '15', '134', 'San Damian');
INSERT INTO `ubicacion_distrito` VALUES ('1355', '15', '134', 'San Juan De Iris');
INSERT INTO `ubicacion_distrito` VALUES ('1356', '15', '134', 'San Juan De Tantaranche');
INSERT INTO `ubicacion_distrito` VALUES ('1357', '15', '134', 'San Lorenzo De Quinti');
INSERT INTO `ubicacion_distrito` VALUES ('1358', '15', '134', 'San Mateo');
INSERT INTO `ubicacion_distrito` VALUES ('1359', '15', '134', 'San Mateo De Otao');
INSERT INTO `ubicacion_distrito` VALUES ('1360', '15', '134', 'San Pedro De Casta');
INSERT INTO `ubicacion_distrito` VALUES ('1361', '15', '134', 'San Pedro De Huancayre');
INSERT INTO `ubicacion_distrito` VALUES ('1362', '15', '134', 'Sangallaya');
INSERT INTO `ubicacion_distrito` VALUES ('1363', '15', '134', 'Santa Cruz De Cocachacra');
INSERT INTO `ubicacion_distrito` VALUES ('1364', '15', '134', 'Santa Eulalia');
INSERT INTO `ubicacion_distrito` VALUES ('1365', '15', '134', 'Santiago De Anchucaya');
INSERT INTO `ubicacion_distrito` VALUES ('1366', '15', '134', 'Santiago De Tuna');
INSERT INTO `ubicacion_distrito` VALUES ('1367', '15', '134', 'Santo Domingo De Los Ollero');
INSERT INTO `ubicacion_distrito` VALUES ('1368', '15', '134', 'Surco');
INSERT INTO `ubicacion_distrito` VALUES ('1369', '15', '135', 'Huacho');
INSERT INTO `ubicacion_distrito` VALUES ('1370', '15', '135', 'Ambar');
INSERT INTO `ubicacion_distrito` VALUES ('1371', '15', '135', 'Caleta De Carquin');
INSERT INTO `ubicacion_distrito` VALUES ('1372', '15', '135', 'Checras');
INSERT INTO `ubicacion_distrito` VALUES ('1373', '15', '135', 'Hualmay');
INSERT INTO `ubicacion_distrito` VALUES ('1374', '15', '135', 'Huaura');
INSERT INTO `ubicacion_distrito` VALUES ('1375', '15', '135', 'Leoncio Prado');
INSERT INTO `ubicacion_distrito` VALUES ('1376', '15', '135', 'Paccho');
INSERT INTO `ubicacion_distrito` VALUES ('1377', '15', '135', 'Santa Leonor');
INSERT INTO `ubicacion_distrito` VALUES ('1378', '15', '135', 'Santa Maria');
INSERT INTO `ubicacion_distrito` VALUES ('1379', '15', '135', 'Sayan');
INSERT INTO `ubicacion_distrito` VALUES ('1380', '15', '135', 'Vegueta');
INSERT INTO `ubicacion_distrito` VALUES ('1381', '15', '136', 'Oyon');
INSERT INTO `ubicacion_distrito` VALUES ('1382', '15', '136', 'Andajes');
INSERT INTO `ubicacion_distrito` VALUES ('1383', '15', '136', 'Caujul');
INSERT INTO `ubicacion_distrito` VALUES ('1384', '15', '136', 'Cochamarca');
INSERT INTO `ubicacion_distrito` VALUES ('1385', '15', '136', 'Navan');
INSERT INTO `ubicacion_distrito` VALUES ('1386', '15', '136', 'Pachangara');
INSERT INTO `ubicacion_distrito` VALUES ('1387', '15', '137', 'Yauyos');
INSERT INTO `ubicacion_distrito` VALUES ('1388', '15', '137', 'Alis');
INSERT INTO `ubicacion_distrito` VALUES ('1389', '15', '137', 'Ayauca');
INSERT INTO `ubicacion_distrito` VALUES ('1390', '15', '137', 'Ayaviri');
INSERT INTO `ubicacion_distrito` VALUES ('1391', '15', '137', 'Azangaro');
INSERT INTO `ubicacion_distrito` VALUES ('1392', '15', '137', 'Cacra');
INSERT INTO `ubicacion_distrito` VALUES ('1393', '15', '137', 'Carania');
INSERT INTO `ubicacion_distrito` VALUES ('1394', '15', '137', 'Catahuasi');
INSERT INTO `ubicacion_distrito` VALUES ('1395', '15', '137', 'Chocos');
INSERT INTO `ubicacion_distrito` VALUES ('1396', '15', '137', 'Cochas');
INSERT INTO `ubicacion_distrito` VALUES ('1397', '15', '137', 'Colonia');
INSERT INTO `ubicacion_distrito` VALUES ('1398', '15', '137', 'Hongos');
INSERT INTO `ubicacion_distrito` VALUES ('1399', '15', '137', 'Huampara');
INSERT INTO `ubicacion_distrito` VALUES ('1400', '15', '137', 'Huancaya');
INSERT INTO `ubicacion_distrito` VALUES ('1401', '15', '137', 'Huangascar');
INSERT INTO `ubicacion_distrito` VALUES ('1402', '15', '137', 'Huantan');
INSERT INTO `ubicacion_distrito` VALUES ('1403', '15', '137', 'Huaðec');
INSERT INTO `ubicacion_distrito` VALUES ('1404', '15', '137', 'Laraos');
INSERT INTO `ubicacion_distrito` VALUES ('1405', '15', '137', 'Lincha');
INSERT INTO `ubicacion_distrito` VALUES ('1406', '15', '137', 'Madean');
INSERT INTO `ubicacion_distrito` VALUES ('1407', '15', '137', 'Miraflores');
INSERT INTO `ubicacion_distrito` VALUES ('1408', '15', '137', 'Omas');
INSERT INTO `ubicacion_distrito` VALUES ('1409', '15', '137', 'Putinza');
INSERT INTO `ubicacion_distrito` VALUES ('1410', '15', '137', 'Quinches');
INSERT INTO `ubicacion_distrito` VALUES ('1411', '15', '137', 'Quinocay');
INSERT INTO `ubicacion_distrito` VALUES ('1412', '15', '137', 'San Joaquin');
INSERT INTO `ubicacion_distrito` VALUES ('1413', '15', '137', 'San Pedro De Pilas');
INSERT INTO `ubicacion_distrito` VALUES ('1414', '15', '137', 'Tanta');
INSERT INTO `ubicacion_distrito` VALUES ('1415', '15', '137', 'Tauripampa');
INSERT INTO `ubicacion_distrito` VALUES ('1416', '15', '137', 'Tomas');
INSERT INTO `ubicacion_distrito` VALUES ('1417', '15', '137', 'Tupe');
INSERT INTO `ubicacion_distrito` VALUES ('1418', '15', '137', 'Viñac');
INSERT INTO `ubicacion_distrito` VALUES ('1419', '15', '137', 'Vitis');
INSERT INTO `ubicacion_distrito` VALUES ('1420', '16', '138', 'Iquitos');
INSERT INTO `ubicacion_distrito` VALUES ('1421', '16', '138', 'Alto Nanay');
INSERT INTO `ubicacion_distrito` VALUES ('1422', '16', '138', 'Fernando Lores');
INSERT INTO `ubicacion_distrito` VALUES ('1423', '16', '138', 'Indiana');
INSERT INTO `ubicacion_distrito` VALUES ('1424', '16', '138', 'Las Amazonas');
INSERT INTO `ubicacion_distrito` VALUES ('1425', '16', '138', 'Mazan');
INSERT INTO `ubicacion_distrito` VALUES ('1426', '16', '138', 'Napo');
INSERT INTO `ubicacion_distrito` VALUES ('1427', '16', '138', 'Punchana');
INSERT INTO `ubicacion_distrito` VALUES ('1428', '16', '138', 'Putumayo');
INSERT INTO `ubicacion_distrito` VALUES ('1429', '16', '138', 'Torres Causana');
INSERT INTO `ubicacion_distrito` VALUES ('1430', '16', '138', 'Belen');
INSERT INTO `ubicacion_distrito` VALUES ('1431', '16', '138', 'San Juan Bautista');
INSERT INTO `ubicacion_distrito` VALUES ('1432', '16', '139', 'Yurimaguas');
INSERT INTO `ubicacion_distrito` VALUES ('1433', '16', '139', 'Balsapuerto');
INSERT INTO `ubicacion_distrito` VALUES ('1434', '16', '139', 'Barranca');
INSERT INTO `ubicacion_distrito` VALUES ('1435', '16', '139', 'Cahuapanas');
INSERT INTO `ubicacion_distrito` VALUES ('1436', '16', '139', 'Jeberos');
INSERT INTO `ubicacion_distrito` VALUES ('1437', '16', '139', 'Lagunas');
INSERT INTO `ubicacion_distrito` VALUES ('1438', '16', '139', 'Manseriche');
INSERT INTO `ubicacion_distrito` VALUES ('1439', '16', '139', 'Morona');
INSERT INTO `ubicacion_distrito` VALUES ('1440', '16', '139', 'Pastaza');
INSERT INTO `ubicacion_distrito` VALUES ('1441', '16', '139', 'Santa Cruz');
INSERT INTO `ubicacion_distrito` VALUES ('1442', '16', '139', 'Teniente Cesar Lopez Rojas');
INSERT INTO `ubicacion_distrito` VALUES ('1443', '16', '140', 'Nauta');
INSERT INTO `ubicacion_distrito` VALUES ('1444', '16', '140', 'Parinari');
INSERT INTO `ubicacion_distrito` VALUES ('1445', '16', '140', 'Tigre');
INSERT INTO `ubicacion_distrito` VALUES ('1446', '16', '140', 'Trompeteros');
INSERT INTO `ubicacion_distrito` VALUES ('1447', '16', '140', 'Urarinas');
INSERT INTO `ubicacion_distrito` VALUES ('1448', '16', '141', 'Ramon Castilla');
INSERT INTO `ubicacion_distrito` VALUES ('1449', '16', '141', 'Pebas');
INSERT INTO `ubicacion_distrito` VALUES ('1450', '16', '141', 'Yavari');
INSERT INTO `ubicacion_distrito` VALUES ('1451', '16', '141', 'San Pablo');
INSERT INTO `ubicacion_distrito` VALUES ('1452', '16', '142', 'Requena');
INSERT INTO `ubicacion_distrito` VALUES ('1453', '16', '142', 'Alto Tapiche');
INSERT INTO `ubicacion_distrito` VALUES ('1454', '16', '142', 'Capelo');
INSERT INTO `ubicacion_distrito` VALUES ('1455', '16', '142', 'Emilio San Martin');
INSERT INTO `ubicacion_distrito` VALUES ('1456', '16', '142', 'Maquia');
INSERT INTO `ubicacion_distrito` VALUES ('1457', '16', '142', 'Puinahua');
INSERT INTO `ubicacion_distrito` VALUES ('1458', '16', '142', 'Saquena');
INSERT INTO `ubicacion_distrito` VALUES ('1459', '16', '142', 'Soplin');
INSERT INTO `ubicacion_distrito` VALUES ('1460', '16', '142', 'Tapiche');
INSERT INTO `ubicacion_distrito` VALUES ('1461', '16', '142', 'Jenaro Herrera');
INSERT INTO `ubicacion_distrito` VALUES ('1462', '16', '142', 'Yaquerana');
INSERT INTO `ubicacion_distrito` VALUES ('1463', '16', '143', 'Contamana');
INSERT INTO `ubicacion_distrito` VALUES ('1464', '16', '143', 'Inahuaya');
INSERT INTO `ubicacion_distrito` VALUES ('1465', '16', '143', 'Padre Marquez');
INSERT INTO `ubicacion_distrito` VALUES ('1466', '16', '143', 'Pampa Hermosa');
INSERT INTO `ubicacion_distrito` VALUES ('1467', '16', '143', 'Sarayacu');
INSERT INTO `ubicacion_distrito` VALUES ('1468', '16', '143', 'Vargas Guerra');
INSERT INTO `ubicacion_distrito` VALUES ('1469', '17', '144', 'Tambopata');
INSERT INTO `ubicacion_distrito` VALUES ('1470', '17', '144', 'Inambari');
INSERT INTO `ubicacion_distrito` VALUES ('1471', '17', '144', 'Las Piedras');
INSERT INTO `ubicacion_distrito` VALUES ('1472', '17', '144', 'Laberinto');
INSERT INTO `ubicacion_distrito` VALUES ('1473', '17', '145', 'Manu');
INSERT INTO `ubicacion_distrito` VALUES ('1474', '17', '145', 'Fitzcarrald');
INSERT INTO `ubicacion_distrito` VALUES ('1475', '17', '145', 'Madre De Dios');
INSERT INTO `ubicacion_distrito` VALUES ('1476', '17', '145', 'Huepetuhe');
INSERT INTO `ubicacion_distrito` VALUES ('1477', '17', '146', 'Iñapari');
INSERT INTO `ubicacion_distrito` VALUES ('1478', '17', '146', 'Iberia');
INSERT INTO `ubicacion_distrito` VALUES ('1479', '17', '146', 'Tahuamanu');
INSERT INTO `ubicacion_distrito` VALUES ('1480', '18', '147', 'Moquegua');
INSERT INTO `ubicacion_distrito` VALUES ('1481', '18', '147', 'Carumas');
INSERT INTO `ubicacion_distrito` VALUES ('1482', '18', '147', 'Cuchumbaya');
INSERT INTO `ubicacion_distrito` VALUES ('1483', '18', '147', 'Samegua');
INSERT INTO `ubicacion_distrito` VALUES ('1484', '18', '147', 'San Cristobal');
INSERT INTO `ubicacion_distrito` VALUES ('1485', '18', '147', 'Torata');
INSERT INTO `ubicacion_distrito` VALUES ('1486', '18', '148', 'Omate');
INSERT INTO `ubicacion_distrito` VALUES ('1487', '18', '148', 'Chojata');
INSERT INTO `ubicacion_distrito` VALUES ('1488', '18', '148', 'Coalaque');
INSERT INTO `ubicacion_distrito` VALUES ('1489', '18', '148', 'Ichuña');
INSERT INTO `ubicacion_distrito` VALUES ('1490', '18', '148', 'La Capilla');
INSERT INTO `ubicacion_distrito` VALUES ('1491', '18', '148', 'Lloque');
INSERT INTO `ubicacion_distrito` VALUES ('1492', '18', '148', 'Matalaque');
INSERT INTO `ubicacion_distrito` VALUES ('1493', '18', '148', 'Puquina');
INSERT INTO `ubicacion_distrito` VALUES ('1494', '18', '148', 'Quinistaquillas');
INSERT INTO `ubicacion_distrito` VALUES ('1495', '18', '148', 'Ubinas');
INSERT INTO `ubicacion_distrito` VALUES ('1496', '18', '148', 'Yunga');
INSERT INTO `ubicacion_distrito` VALUES ('1497', '18', '149', 'Ilo');
INSERT INTO `ubicacion_distrito` VALUES ('1498', '18', '149', 'El Algarrobal');
INSERT INTO `ubicacion_distrito` VALUES ('1499', '18', '149', 'Pacocha');
INSERT INTO `ubicacion_distrito` VALUES ('1500', '19', '150', 'Chaupimarca');
INSERT INTO `ubicacion_distrito` VALUES ('1501', '19', '150', 'Huachon');
INSERT INTO `ubicacion_distrito` VALUES ('1502', '19', '150', 'Huariaca');
INSERT INTO `ubicacion_distrito` VALUES ('1503', '19', '150', 'Huayllay');
INSERT INTO `ubicacion_distrito` VALUES ('1504', '19', '150', 'Ninacaca');
INSERT INTO `ubicacion_distrito` VALUES ('1505', '19', '150', 'Pallanchacra');
INSERT INTO `ubicacion_distrito` VALUES ('1506', '19', '150', 'Paucartambo');
INSERT INTO `ubicacion_distrito` VALUES ('1507', '19', '150', 'San Fco.De As is De Yarusyac');
INSERT INTO `ubicacion_distrito` VALUES ('1508', '19', '150', 'Simon Bolivar');
INSERT INTO `ubicacion_distrito` VALUES ('1509', '19', '150', 'Ticlacayan');
INSERT INTO `ubicacion_distrito` VALUES ('1510', '19', '150', 'Tinyahuarco');
INSERT INTO `ubicacion_distrito` VALUES ('1511', '19', '150', 'Vicco');
INSERT INTO `ubicacion_distrito` VALUES ('1512', '19', '150', 'Yanacancha');
INSERT INTO `ubicacion_distrito` VALUES ('1513', '19', '151', 'Yanahuanca');
INSERT INTO `ubicacion_distrito` VALUES ('1514', '19', '151', 'Chacayan');
INSERT INTO `ubicacion_distrito` VALUES ('1515', '19', '151', 'Goyllarisquizga');
INSERT INTO `ubicacion_distrito` VALUES ('1516', '19', '151', 'Paucar');
INSERT INTO `ubicacion_distrito` VALUES ('1517', '19', '151', 'San Pedro De Pillao');
INSERT INTO `ubicacion_distrito` VALUES ('1518', '19', '151', 'Santa Ana De Tusi');
INSERT INTO `ubicacion_distrito` VALUES ('1519', '19', '151', 'Tapuc');
INSERT INTO `ubicacion_distrito` VALUES ('1520', '19', '151', 'Vilcabamba');
INSERT INTO `ubicacion_distrito` VALUES ('1521', '19', '152', 'Oxapampa');
INSERT INTO `ubicacion_distrito` VALUES ('1522', '19', '152', 'Chontabamba');
INSERT INTO `ubicacion_distrito` VALUES ('1523', '19', '152', 'Huancabamba');
INSERT INTO `ubicacion_distrito` VALUES ('1524', '19', '152', 'Palcazu');
INSERT INTO `ubicacion_distrito` VALUES ('1525', '19', '152', 'Pozuzo');
INSERT INTO `ubicacion_distrito` VALUES ('1526', '19', '152', 'Puerto Bermudez');
INSERT INTO `ubicacion_distrito` VALUES ('1527', '19', '152', 'Villa Rica');
INSERT INTO `ubicacion_distrito` VALUES ('1528', '20', '153', 'Piura');
INSERT INTO `ubicacion_distrito` VALUES ('1529', '20', '153', 'Castilla');
INSERT INTO `ubicacion_distrito` VALUES ('1530', '20', '153', 'Catacaos');
INSERT INTO `ubicacion_distrito` VALUES ('1531', '20', '153', 'Cura Mori');
INSERT INTO `ubicacion_distrito` VALUES ('1532', '20', '153', 'El Tallan');
INSERT INTO `ubicacion_distrito` VALUES ('1533', '20', '153', 'La Arena');
INSERT INTO `ubicacion_distrito` VALUES ('1534', '20', '153', 'La Union');
INSERT INTO `ubicacion_distrito` VALUES ('1535', '20', '153', 'Las Lomas');
INSERT INTO `ubicacion_distrito` VALUES ('1536', '20', '153', 'Tambo Grande');
INSERT INTO `ubicacion_distrito` VALUES ('1537', '20', '154', 'Ayabaca');
INSERT INTO `ubicacion_distrito` VALUES ('1538', '20', '154', 'Frias');
INSERT INTO `ubicacion_distrito` VALUES ('1539', '20', '154', 'Jilili');
INSERT INTO `ubicacion_distrito` VALUES ('1540', '20', '154', 'Lagunas');
INSERT INTO `ubicacion_distrito` VALUES ('1541', '20', '154', 'Montero');
INSERT INTO `ubicacion_distrito` VALUES ('1542', '20', '154', 'Pacaipampa');
INSERT INTO `ubicacion_distrito` VALUES ('1543', '20', '154', 'Paimas');
INSERT INTO `ubicacion_distrito` VALUES ('1544', '20', '154', 'Sapillica');
INSERT INTO `ubicacion_distrito` VALUES ('1545', '20', '154', 'Sicchez');
INSERT INTO `ubicacion_distrito` VALUES ('1546', '20', '154', 'Suyo');
INSERT INTO `ubicacion_distrito` VALUES ('1547', '20', '155', 'Huancabamba');
INSERT INTO `ubicacion_distrito` VALUES ('1548', '20', '155', 'Canchaque');
INSERT INTO `ubicacion_distrito` VALUES ('1549', '20', '155', 'El Carmen De La Frontera');
INSERT INTO `ubicacion_distrito` VALUES ('1550', '20', '155', 'Huarmaca');
INSERT INTO `ubicacion_distrito` VALUES ('1551', '20', '155', 'Lalaquiz');
INSERT INTO `ubicacion_distrito` VALUES ('1552', '20', '155', 'San Miguel De El Faique');
INSERT INTO `ubicacion_distrito` VALUES ('1553', '20', '155', 'Sondor');
INSERT INTO `ubicacion_distrito` VALUES ('1554', '20', '155', 'Sondorillo');
INSERT INTO `ubicacion_distrito` VALUES ('1555', '20', '156', 'Chulucanas');
INSERT INTO `ubicacion_distrito` VALUES ('1556', '20', '156', 'Buenos Aires');
INSERT INTO `ubicacion_distrito` VALUES ('1557', '20', '156', 'Chalaco');
INSERT INTO `ubicacion_distrito` VALUES ('1558', '20', '156', 'La Matanza');
INSERT INTO `ubicacion_distrito` VALUES ('1559', '20', '156', 'Morropon');
INSERT INTO `ubicacion_distrito` VALUES ('1560', '20', '156', 'Salitral');
INSERT INTO `ubicacion_distrito` VALUES ('1561', '20', '156', 'San Juan De Bigote');
INSERT INTO `ubicacion_distrito` VALUES ('1562', '20', '156', 'Santa Catalina De Mossa');
INSERT INTO `ubicacion_distrito` VALUES ('1563', '20', '156', 'Santo Domingo');
INSERT INTO `ubicacion_distrito` VALUES ('1564', '20', '156', 'Yamango');
INSERT INTO `ubicacion_distrito` VALUES ('1565', '20', '157', 'Paita');
INSERT INTO `ubicacion_distrito` VALUES ('1566', '20', '157', 'Amotape');
INSERT INTO `ubicacion_distrito` VALUES ('1567', '20', '157', 'Arenal');
INSERT INTO `ubicacion_distrito` VALUES ('1568', '20', '157', 'Colan');
INSERT INTO `ubicacion_distrito` VALUES ('1569', '20', '157', 'La Huaca');
INSERT INTO `ubicacion_distrito` VALUES ('1570', '20', '157', 'Tamarindo');
INSERT INTO `ubicacion_distrito` VALUES ('1571', '20', '157', 'Vichayal');
INSERT INTO `ubicacion_distrito` VALUES ('1572', '20', '158', 'Sullana');
INSERT INTO `ubicacion_distrito` VALUES ('1573', '20', '158', 'Bellavista');
INSERT INTO `ubicacion_distrito` VALUES ('1574', '20', '158', 'Ignacio Escudero');
INSERT INTO `ubicacion_distrito` VALUES ('1575', '20', '158', 'Lancones');
INSERT INTO `ubicacion_distrito` VALUES ('1576', '20', '158', 'Marcavelica');
INSERT INTO `ubicacion_distrito` VALUES ('1577', '20', '158', 'Miguel Checa');
INSERT INTO `ubicacion_distrito` VALUES ('1578', '20', '158', 'Querecotillo');
INSERT INTO `ubicacion_distrito` VALUES ('1579', '20', '158', 'Salitral');
INSERT INTO `ubicacion_distrito` VALUES ('1580', '20', '159', 'Pariñas');
INSERT INTO `ubicacion_distrito` VALUES ('1581', '20', '159', 'El Alto');
INSERT INTO `ubicacion_distrito` VALUES ('1582', '20', '159', 'La Brea');
INSERT INTO `ubicacion_distrito` VALUES ('1583', '20', '159', 'Lobitos');
INSERT INTO `ubicacion_distrito` VALUES ('1584', '20', '159', 'Los Organos');
INSERT INTO `ubicacion_distrito` VALUES ('1585', '20', '159', 'Mancora');
INSERT INTO `ubicacion_distrito` VALUES ('1586', '20', '160', 'Sechura');
INSERT INTO `ubicacion_distrito` VALUES ('1587', '20', '160', 'Bellavista De La Union');
INSERT INTO `ubicacion_distrito` VALUES ('1588', '20', '160', 'Bernal');
INSERT INTO `ubicacion_distrito` VALUES ('1589', '20', '160', 'Cristo Nos Valga');
INSERT INTO `ubicacion_distrito` VALUES ('1590', '20', '160', 'Vice');
INSERT INTO `ubicacion_distrito` VALUES ('1591', '20', '160', 'Rinconada Llicuar');
INSERT INTO `ubicacion_distrito` VALUES ('1592', '21', '161', 'Puno');
INSERT INTO `ubicacion_distrito` VALUES ('1593', '21', '161', 'Acora');
INSERT INTO `ubicacion_distrito` VALUES ('1594', '21', '161', 'Amantani');
INSERT INTO `ubicacion_distrito` VALUES ('1595', '21', '161', 'Atuncolla');
INSERT INTO `ubicacion_distrito` VALUES ('1596', '21', '161', 'Capachica');
INSERT INTO `ubicacion_distrito` VALUES ('1597', '21', '161', 'Chucuito');
INSERT INTO `ubicacion_distrito` VALUES ('1598', '21', '161', 'Coata');
INSERT INTO `ubicacion_distrito` VALUES ('1599', '21', '161', 'Huata');
INSERT INTO `ubicacion_distrito` VALUES ('1600', '21', '161', 'Mañazo');
INSERT INTO `ubicacion_distrito` VALUES ('1601', '21', '161', 'Paucarcolla');
INSERT INTO `ubicacion_distrito` VALUES ('1602', '21', '161', 'Pichacani');
INSERT INTO `ubicacion_distrito` VALUES ('1603', '21', '161', 'Plateria');
INSERT INTO `ubicacion_distrito` VALUES ('1604', '21', '161', 'San Antonio');
INSERT INTO `ubicacion_distrito` VALUES ('1605', '21', '161', 'Tiquillaca');
INSERT INTO `ubicacion_distrito` VALUES ('1606', '21', '161', 'Vilque');
INSERT INTO `ubicacion_distrito` VALUES ('1607', '21', '162', 'Azangaro');
INSERT INTO `ubicacion_distrito` VALUES ('1608', '21', '162', 'Achaya');
INSERT INTO `ubicacion_distrito` VALUES ('1609', '21', '162', 'Arapa');
INSERT INTO `ubicacion_distrito` VALUES ('1610', '21', '162', 'Asillo');
INSERT INTO `ubicacion_distrito` VALUES ('1611', '21', '162', 'Caminaca');
INSERT INTO `ubicacion_distrito` VALUES ('1612', '21', '162', 'Chupa');
INSERT INTO `ubicacion_distrito` VALUES ('1613', '21', '162', 'Jose Domingo Choquehuanca');
INSERT INTO `ubicacion_distrito` VALUES ('1614', '21', '162', 'Muñani');
INSERT INTO `ubicacion_distrito` VALUES ('1615', '21', '162', 'Potoni');
INSERT INTO `ubicacion_distrito` VALUES ('1616', '21', '162', 'Saman');
INSERT INTO `ubicacion_distrito` VALUES ('1617', '21', '162', 'San Anton');
INSERT INTO `ubicacion_distrito` VALUES ('1618', '21', '162', 'San Jose');
INSERT INTO `ubicacion_distrito` VALUES ('1619', '21', '162', 'San Juan De Salinas');
INSERT INTO `ubicacion_distrito` VALUES ('1620', '21', '162', 'Santiago De Pupuja');
INSERT INTO `ubicacion_distrito` VALUES ('1621', '21', '162', 'Tirapata');
INSERT INTO `ubicacion_distrito` VALUES ('1622', '21', '163', 'Macusani');
INSERT INTO `ubicacion_distrito` VALUES ('1623', '21', '163', 'Ajoyani');
INSERT INTO `ubicacion_distrito` VALUES ('1624', '21', '163', 'Ayapata');
INSERT INTO `ubicacion_distrito` VALUES ('1625', '21', '163', 'Coasa');
INSERT INTO `ubicacion_distrito` VALUES ('1626', '21', '163', 'Corani');
INSERT INTO `ubicacion_distrito` VALUES ('1627', '21', '163', 'Crucero');
INSERT INTO `ubicacion_distrito` VALUES ('1628', '21', '163', 'Ituata');
INSERT INTO `ubicacion_distrito` VALUES ('1629', '21', '163', 'Ollachea');
INSERT INTO `ubicacion_distrito` VALUES ('1630', '21', '163', 'San Gaban');
INSERT INTO `ubicacion_distrito` VALUES ('1631', '21', '163', 'Usicayos');
INSERT INTO `ubicacion_distrito` VALUES ('1632', '21', '164', 'Juli');
INSERT INTO `ubicacion_distrito` VALUES ('1633', '21', '164', 'Desaguadero');
INSERT INTO `ubicacion_distrito` VALUES ('1634', '21', '164', 'Huacullani');
INSERT INTO `ubicacion_distrito` VALUES ('1635', '21', '164', 'Kelluyo');
INSERT INTO `ubicacion_distrito` VALUES ('1636', '21', '164', 'Pisacoma');
INSERT INTO `ubicacion_distrito` VALUES ('1637', '21', '164', 'Pomata');
INSERT INTO `ubicacion_distrito` VALUES ('1638', '21', '164', 'Zepita');
INSERT INTO `ubicacion_distrito` VALUES ('1639', '21', '165', 'Ilave');
INSERT INTO `ubicacion_distrito` VALUES ('1640', '21', '165', 'Capazo');
INSERT INTO `ubicacion_distrito` VALUES ('1641', '21', '165', 'Pilcuyo');
INSERT INTO `ubicacion_distrito` VALUES ('1642', '21', '165', 'Santa Rosa');
INSERT INTO `ubicacion_distrito` VALUES ('1643', '21', '165', 'Conduriri');
INSERT INTO `ubicacion_distrito` VALUES ('1644', '21', '166', 'Huancane');
INSERT INTO `ubicacion_distrito` VALUES ('1645', '21', '166', 'Cojata');
INSERT INTO `ubicacion_distrito` VALUES ('1646', '21', '166', 'Huatasani');
INSERT INTO `ubicacion_distrito` VALUES ('1647', '21', '166', 'Inchupalla');
INSERT INTO `ubicacion_distrito` VALUES ('1648', '21', '166', 'Pusi');
INSERT INTO `ubicacion_distrito` VALUES ('1649', '21', '166', 'Rosaspata');
INSERT INTO `ubicacion_distrito` VALUES ('1650', '21', '166', 'Taraco');
INSERT INTO `ubicacion_distrito` VALUES ('1651', '21', '166', 'Vilque Chico');
INSERT INTO `ubicacion_distrito` VALUES ('1652', '21', '167', 'Lampa');
INSERT INTO `ubicacion_distrito` VALUES ('1653', '21', '167', 'Cabanilla');
INSERT INTO `ubicacion_distrito` VALUES ('1654', '21', '167', 'Calapuja');
INSERT INTO `ubicacion_distrito` VALUES ('1655', '21', '167', 'Nicasio');
INSERT INTO `ubicacion_distrito` VALUES ('1656', '21', '167', 'Ocuviri');
INSERT INTO `ubicacion_distrito` VALUES ('1657', '21', '167', 'Palca');
INSERT INTO `ubicacion_distrito` VALUES ('1658', '21', '167', 'Paratia');
INSERT INTO `ubicacion_distrito` VALUES ('1659', '21', '167', 'Pucara');
INSERT INTO `ubicacion_distrito` VALUES ('1660', '21', '167', 'Santa Lucia');
INSERT INTO `ubicacion_distrito` VALUES ('1661', '21', '167', 'Vilavila');
INSERT INTO `ubicacion_distrito` VALUES ('1662', '21', '168', 'Ayaviri');
INSERT INTO `ubicacion_distrito` VALUES ('1663', '21', '168', 'Antauta');
INSERT INTO `ubicacion_distrito` VALUES ('1664', '21', '168', 'Cupi');
INSERT INTO `ubicacion_distrito` VALUES ('1665', '21', '168', 'Llalli');
INSERT INTO `ubicacion_distrito` VALUES ('1666', '21', '168', 'Macari');
INSERT INTO `ubicacion_distrito` VALUES ('1667', '21', '168', 'Nuñoa');
INSERT INTO `ubicacion_distrito` VALUES ('1668', '21', '168', 'Orurillo');
INSERT INTO `ubicacion_distrito` VALUES ('1669', '21', '168', 'Santa Rosa');
INSERT INTO `ubicacion_distrito` VALUES ('1670', '21', '168', 'Umachiri');
INSERT INTO `ubicacion_distrito` VALUES ('1671', '21', '169', 'Moho');
INSERT INTO `ubicacion_distrito` VALUES ('1672', '21', '169', 'Conima');
INSERT INTO `ubicacion_distrito` VALUES ('1673', '21', '169', 'Huayrapata');
INSERT INTO `ubicacion_distrito` VALUES ('1674', '21', '169', 'Tilali');
INSERT INTO `ubicacion_distrito` VALUES ('1675', '21', '170', 'Putina');
INSERT INTO `ubicacion_distrito` VALUES ('1676', '21', '170', 'Ananea');
INSERT INTO `ubicacion_distrito` VALUES ('1677', '21', '170', 'Pedro Vilca Apaza');
INSERT INTO `ubicacion_distrito` VALUES ('1678', '21', '170', 'Quilcapuncu');
INSERT INTO `ubicacion_distrito` VALUES ('1679', '21', '170', 'Sina');
INSERT INTO `ubicacion_distrito` VALUES ('1680', '21', '171', 'Juliaca');
INSERT INTO `ubicacion_distrito` VALUES ('1681', '21', '171', 'Cabana');
INSERT INTO `ubicacion_distrito` VALUES ('1682', '21', '171', 'Cabanillas');
INSERT INTO `ubicacion_distrito` VALUES ('1683', '21', '171', 'Caracoto');
INSERT INTO `ubicacion_distrito` VALUES ('1684', '21', '172', 'Sandia');
INSERT INTO `ubicacion_distrito` VALUES ('1685', '21', '172', 'Cuyocuyo');
INSERT INTO `ubicacion_distrito` VALUES ('1686', '21', '172', 'Limbani');
INSERT INTO `ubicacion_distrito` VALUES ('1687', '21', '172', 'Patambuco');
INSERT INTO `ubicacion_distrito` VALUES ('1688', '21', '172', 'Phara');
INSERT INTO `ubicacion_distrito` VALUES ('1689', '21', '172', 'Quiaca');
INSERT INTO `ubicacion_distrito` VALUES ('1690', '21', '172', 'San Juan Del Oro');
INSERT INTO `ubicacion_distrito` VALUES ('1691', '21', '172', 'Yanahuaya');
INSERT INTO `ubicacion_distrito` VALUES ('1692', '21', '172', 'Alto Inambari');
INSERT INTO `ubicacion_distrito` VALUES ('1693', '21', '173', 'Yunguyo');
INSERT INTO `ubicacion_distrito` VALUES ('1694', '21', '173', 'Anapia');
INSERT INTO `ubicacion_distrito` VALUES ('1695', '21', '173', 'Copani');
INSERT INTO `ubicacion_distrito` VALUES ('1696', '21', '173', 'Cuturapi');
INSERT INTO `ubicacion_distrito` VALUES ('1697', '21', '173', 'Ollaraya');
INSERT INTO `ubicacion_distrito` VALUES ('1698', '21', '173', 'Tinicachi');
INSERT INTO `ubicacion_distrito` VALUES ('1699', '21', '173', 'Unicachi');
INSERT INTO `ubicacion_distrito` VALUES ('1700', '22', '174', 'Moyobamba');
INSERT INTO `ubicacion_distrito` VALUES ('1701', '22', '174', 'Calzada');
INSERT INTO `ubicacion_distrito` VALUES ('1702', '22', '174', 'Habana');
INSERT INTO `ubicacion_distrito` VALUES ('1703', '22', '174', 'Jepelacio');
INSERT INTO `ubicacion_distrito` VALUES ('1704', '22', '174', 'Soritor');
INSERT INTO `ubicacion_distrito` VALUES ('1705', '22', '174', 'Yantalo');
INSERT INTO `ubicacion_distrito` VALUES ('1706', '22', '175', 'Bellavista');
INSERT INTO `ubicacion_distrito` VALUES ('1707', '22', '175', 'Alto Biavo');
INSERT INTO `ubicacion_distrito` VALUES ('1708', '22', '175', 'Bajo Biavo');
INSERT INTO `ubicacion_distrito` VALUES ('1709', '22', '175', 'Huallaga');
INSERT INTO `ubicacion_distrito` VALUES ('1710', '22', '175', 'San Pablo');
INSERT INTO `ubicacion_distrito` VALUES ('1711', '22', '175', 'San Rafael');
INSERT INTO `ubicacion_distrito` VALUES ('1712', '22', '176', 'San Jose De Sisa');
INSERT INTO `ubicacion_distrito` VALUES ('1713', '22', '176', 'Agua Blanca');
INSERT INTO `ubicacion_distrito` VALUES ('1714', '22', '176', 'San Martin');
INSERT INTO `ubicacion_distrito` VALUES ('1715', '22', '176', 'Santa Rosa');
INSERT INTO `ubicacion_distrito` VALUES ('1716', '22', '176', 'Shatoja');
INSERT INTO `ubicacion_distrito` VALUES ('1717', '22', '177', 'Saposoa');
INSERT INTO `ubicacion_distrito` VALUES ('1718', '22', '177', 'Alto Saposoa');
INSERT INTO `ubicacion_distrito` VALUES ('1719', '22', '177', 'El Eslabon');
INSERT INTO `ubicacion_distrito` VALUES ('1720', '22', '177', 'Piscoyacu');
INSERT INTO `ubicacion_distrito` VALUES ('1721', '22', '177', 'Sacanche');
INSERT INTO `ubicacion_distrito` VALUES ('1722', '22', '177', 'Tingo De Saposoa');
INSERT INTO `ubicacion_distrito` VALUES ('1723', '22', '178', 'Lamas');
INSERT INTO `ubicacion_distrito` VALUES ('1724', '22', '178', 'Alonso De Alvarado');
INSERT INTO `ubicacion_distrito` VALUES ('1725', '22', '178', 'Barranquita');
INSERT INTO `ubicacion_distrito` VALUES ('1726', '22', '178', 'Caynarachi 1/');
INSERT INTO `ubicacion_distrito` VALUES ('1727', '22', '178', 'Cuñumbuqui');
INSERT INTO `ubicacion_distrito` VALUES ('1728', '22', '178', 'Pinto Recodo');
INSERT INTO `ubicacion_distrito` VALUES ('1729', '22', '178', 'Rumisapa');
INSERT INTO `ubicacion_distrito` VALUES ('1730', '22', '178', 'San Roque De Cumbaza');
INSERT INTO `ubicacion_distrito` VALUES ('1731', '22', '178', 'Shanao');
INSERT INTO `ubicacion_distrito` VALUES ('1732', '22', '178', 'Tabalosos');
INSERT INTO `ubicacion_distrito` VALUES ('1733', '22', '178', 'Zapatero');
INSERT INTO `ubicacion_distrito` VALUES ('1734', '22', '179', 'Juanjui');
INSERT INTO `ubicacion_distrito` VALUES ('1735', '22', '179', 'Campanilla');
INSERT INTO `ubicacion_distrito` VALUES ('1736', '22', '179', 'Huicungo');
INSERT INTO `ubicacion_distrito` VALUES ('1737', '22', '179', 'Pachiza');
INSERT INTO `ubicacion_distrito` VALUES ('1738', '22', '179', 'Pajarillo');
INSERT INTO `ubicacion_distrito` VALUES ('1739', '22', '180', 'Picota');
INSERT INTO `ubicacion_distrito` VALUES ('1740', '22', '180', 'Buenos Aires');
INSERT INTO `ubicacion_distrito` VALUES ('1741', '22', '180', 'Caspisapa');
INSERT INTO `ubicacion_distrito` VALUES ('1742', '22', '180', 'Pilluana');
INSERT INTO `ubicacion_distrito` VALUES ('1743', '22', '180', 'Pucacaca');
INSERT INTO `ubicacion_distrito` VALUES ('1744', '22', '180', 'San Cristobal');
INSERT INTO `ubicacion_distrito` VALUES ('1745', '22', '180', 'San Hilarion');
INSERT INTO `ubicacion_distrito` VALUES ('1746', '22', '180', 'Shamboyacu');
INSERT INTO `ubicacion_distrito` VALUES ('1747', '22', '180', 'Tingo De Ponasa');
INSERT INTO `ubicacion_distrito` VALUES ('1748', '22', '180', 'Tres Unidos');
INSERT INTO `ubicacion_distrito` VALUES ('1749', '22', '181', 'Rioja');
INSERT INTO `ubicacion_distrito` VALUES ('1750', '22', '181', 'Awajun');
INSERT INTO `ubicacion_distrito` VALUES ('1751', '22', '181', 'Elias Soplin Vargas');
INSERT INTO `ubicacion_distrito` VALUES ('1752', '22', '181', 'Nueva Cajamarca');
INSERT INTO `ubicacion_distrito` VALUES ('1753', '22', '181', 'Pardo Miguel');
INSERT INTO `ubicacion_distrito` VALUES ('1754', '22', '181', 'Posic');
INSERT INTO `ubicacion_distrito` VALUES ('1755', '22', '181', 'San Fernando');
INSERT INTO `ubicacion_distrito` VALUES ('1756', '22', '181', 'Yorongos');
INSERT INTO `ubicacion_distrito` VALUES ('1757', '22', '181', 'Yuracyacu');
INSERT INTO `ubicacion_distrito` VALUES ('1758', '22', '182', 'Tarapoto');
INSERT INTO `ubicacion_distrito` VALUES ('1759', '22', '182', 'Alberto Leveau');
INSERT INTO `ubicacion_distrito` VALUES ('1760', '22', '182', 'Cacatachi');
INSERT INTO `ubicacion_distrito` VALUES ('1761', '22', '182', 'Chazuta');
INSERT INTO `ubicacion_distrito` VALUES ('1762', '22', '182', 'Chipurana');
INSERT INTO `ubicacion_distrito` VALUES ('1763', '22', '182', 'El Porvenir');
INSERT INTO `ubicacion_distrito` VALUES ('1764', '22', '182', 'Huimbayoc');
INSERT INTO `ubicacion_distrito` VALUES ('1765', '22', '182', 'Juan Guerra');
INSERT INTO `ubicacion_distrito` VALUES ('1766', '22', '182', 'La Banda De Shilcayo');
INSERT INTO `ubicacion_distrito` VALUES ('1767', '22', '182', 'Morales');
INSERT INTO `ubicacion_distrito` VALUES ('1768', '22', '182', 'Papaplaya');
INSERT INTO `ubicacion_distrito` VALUES ('1769', '22', '182', 'San Antonio');
INSERT INTO `ubicacion_distrito` VALUES ('1770', '22', '182', 'Sauce');
INSERT INTO `ubicacion_distrito` VALUES ('1771', '22', '182', 'Shapaja');
INSERT INTO `ubicacion_distrito` VALUES ('1772', '22', '183', 'Tocache');
INSERT INTO `ubicacion_distrito` VALUES ('1773', '22', '183', 'Nuevo Progreso');
INSERT INTO `ubicacion_distrito` VALUES ('1774', '22', '183', 'Polvora');
INSERT INTO `ubicacion_distrito` VALUES ('1775', '22', '183', 'Shunte');
INSERT INTO `ubicacion_distrito` VALUES ('1776', '22', '183', 'Uchiza');
INSERT INTO `ubicacion_distrito` VALUES ('1777', '23', '184', 'Tacna');
INSERT INTO `ubicacion_distrito` VALUES ('1778', '23', '184', 'Alto De La Alianza');
INSERT INTO `ubicacion_distrito` VALUES ('1779', '23', '184', 'Calana');
INSERT INTO `ubicacion_distrito` VALUES ('1780', '23', '184', 'Ciudad Nueva');
INSERT INTO `ubicacion_distrito` VALUES ('1781', '23', '184', 'Inclan');
INSERT INTO `ubicacion_distrito` VALUES ('1782', '23', '184', 'Pachia');
INSERT INTO `ubicacion_distrito` VALUES ('1783', '23', '184', 'Palca');
INSERT INTO `ubicacion_distrito` VALUES ('1784', '23', '184', 'Pocollay');
INSERT INTO `ubicacion_distrito` VALUES ('1785', '23', '184', 'Sama');
INSERT INTO `ubicacion_distrito` VALUES ('1786', '23', '184', 'Coronel Gregorio Albarracín Lanchipa');
INSERT INTO `ubicacion_distrito` VALUES ('1787', '23', '185', 'Candarave');
INSERT INTO `ubicacion_distrito` VALUES ('1788', '23', '185', 'Cairani');
INSERT INTO `ubicacion_distrito` VALUES ('1789', '23', '185', 'Camilaca');
INSERT INTO `ubicacion_distrito` VALUES ('1790', '23', '185', 'Curibaya');
INSERT INTO `ubicacion_distrito` VALUES ('1791', '23', '185', 'Huanuara');
INSERT INTO `ubicacion_distrito` VALUES ('1792', '23', '185', 'Quilahuani');
INSERT INTO `ubicacion_distrito` VALUES ('1793', '23', '186', 'Locumba');
INSERT INTO `ubicacion_distrito` VALUES ('1794', '23', '186', 'Ilabaya');
INSERT INTO `ubicacion_distrito` VALUES ('1795', '23', '186', 'Ite');
INSERT INTO `ubicacion_distrito` VALUES ('1796', '23', '187', 'Tarata');
INSERT INTO `ubicacion_distrito` VALUES ('1797', '23', '187', 'Chucatamani');
INSERT INTO `ubicacion_distrito` VALUES ('1798', '23', '187', 'Estique');
INSERT INTO `ubicacion_distrito` VALUES ('1799', '23', '187', 'Estique-Pampa');
INSERT INTO `ubicacion_distrito` VALUES ('1800', '23', '187', 'Sitajara');
INSERT INTO `ubicacion_distrito` VALUES ('1801', '23', '187', 'Susapaya');
INSERT INTO `ubicacion_distrito` VALUES ('1802', '23', '187', 'Tarucachi');
INSERT INTO `ubicacion_distrito` VALUES ('1803', '23', '187', 'Ticaco');
INSERT INTO `ubicacion_distrito` VALUES ('1804', '24', '188', 'Tumbes');
INSERT INTO `ubicacion_distrito` VALUES ('1805', '24', '188', 'Corrales');
INSERT INTO `ubicacion_distrito` VALUES ('1806', '24', '188', 'La Cruz');
INSERT INTO `ubicacion_distrito` VALUES ('1807', '24', '188', 'Pampas De Hospital');
INSERT INTO `ubicacion_distrito` VALUES ('1808', '24', '188', 'San Jacinto');
INSERT INTO `ubicacion_distrito` VALUES ('1809', '24', '188', 'San Juan De La Virgen');
INSERT INTO `ubicacion_distrito` VALUES ('1810', '24', '189', 'Zorritos');
INSERT INTO `ubicacion_distrito` VALUES ('1811', '24', '189', 'Casitas');
INSERT INTO `ubicacion_distrito` VALUES ('1812', '24', '190', 'Zarumilla');
INSERT INTO `ubicacion_distrito` VALUES ('1813', '24', '190', 'Aguas Verdes');
INSERT INTO `ubicacion_distrito` VALUES ('1814', '24', '190', 'Matapalo');
INSERT INTO `ubicacion_distrito` VALUES ('1815', '24', '190', 'Papayal');
INSERT INTO `ubicacion_distrito` VALUES ('1816', '25', '191', 'Calleria');
INSERT INTO `ubicacion_distrito` VALUES ('1817', '25', '191', 'Campoverde');
INSERT INTO `ubicacion_distrito` VALUES ('1818', '25', '191', 'Iparia');
INSERT INTO `ubicacion_distrito` VALUES ('1819', '25', '191', 'Masisea');
INSERT INTO `ubicacion_distrito` VALUES ('1820', '25', '191', 'Yarinacocha');
INSERT INTO `ubicacion_distrito` VALUES ('1821', '25', '191', 'Nueva Requena');
INSERT INTO `ubicacion_distrito` VALUES ('1822', '25', '192', 'Raymondi');
INSERT INTO `ubicacion_distrito` VALUES ('1823', '25', '192', 'Sepahua');
INSERT INTO `ubicacion_distrito` VALUES ('1824', '25', '192', 'Tahuania');
INSERT INTO `ubicacion_distrito` VALUES ('1825', '25', '192', 'Yurua');
INSERT INTO `ubicacion_distrito` VALUES ('1826', '25', '193', 'Padre Abad');
INSERT INTO `ubicacion_distrito` VALUES ('1827', '25', '193', 'Irazola');
INSERT INTO `ubicacion_distrito` VALUES ('1828', '25', '193', 'Curimana');
INSERT INTO `ubicacion_distrito` VALUES ('1829', '25', '194', 'Puru');

-- ----------------------------
-- Table structure for ubicacion_provincia
-- ----------------------------
DROP TABLE IF EXISTS `ubicacion_provincia`;
CREATE TABLE `ubicacion_provincia` (
  `idProvincia` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idDepartamento` int(11) unsigned NOT NULL,
  `Nombre` varchar(80) NOT NULL,
  PRIMARY KEY (`idProvincia`)
) ENGINE=MyISAM AUTO_INCREMENT=195 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ubicacion_provincia
-- ----------------------------
INSERT INTO `ubicacion_provincia` VALUES ('1', '1', 'Chachapoyas');
INSERT INTO `ubicacion_provincia` VALUES ('2', '1', 'Bagua');
INSERT INTO `ubicacion_provincia` VALUES ('3', '1', 'Bongara');
INSERT INTO `ubicacion_provincia` VALUES ('4', '1', 'Condorcanqui');
INSERT INTO `ubicacion_provincia` VALUES ('5', '1', 'Luya');
INSERT INTO `ubicacion_provincia` VALUES ('6', '1', 'Rodriguez De Mendo');
INSERT INTO `ubicacion_provincia` VALUES ('7', '1', 'Utcubamba');
INSERT INTO `ubicacion_provincia` VALUES ('8', '2', 'Huaraz');
INSERT INTO `ubicacion_provincia` VALUES ('9', '2', 'Aija');
INSERT INTO `ubicacion_provincia` VALUES ('10', '2', 'Antonio Raymondi');
INSERT INTO `ubicacion_provincia` VALUES ('11', '2', 'Asuncion');
INSERT INTO `ubicacion_provincia` VALUES ('12', '2', 'Bolognesi');
INSERT INTO `ubicacion_provincia` VALUES ('13', '2', 'Carhuaz');
INSERT INTO `ubicacion_provincia` VALUES ('14', '2', 'Carlos F. Fitzcarrald');
INSERT INTO `ubicacion_provincia` VALUES ('15', '2', 'Casma');
INSERT INTO `ubicacion_provincia` VALUES ('16', '2', 'Corongo');
INSERT INTO `ubicacion_provincia` VALUES ('17', '2', 'Huari');
INSERT INTO `ubicacion_provincia` VALUES ('18', '2', 'Huarmey');
INSERT INTO `ubicacion_provincia` VALUES ('19', '2', 'Huaylas');
INSERT INTO `ubicacion_provincia` VALUES ('20', '2', 'Mariscal Luzuriaga');
INSERT INTO `ubicacion_provincia` VALUES ('21', '2', 'Ocros');
INSERT INTO `ubicacion_provincia` VALUES ('22', '2', 'Pallasca');
INSERT INTO `ubicacion_provincia` VALUES ('23', '2', 'Pomabamba');
INSERT INTO `ubicacion_provincia` VALUES ('24', '2', 'Recuay');
INSERT INTO `ubicacion_provincia` VALUES ('25', '2', 'Santa');
INSERT INTO `ubicacion_provincia` VALUES ('26', '2', 'Sihuas');
INSERT INTO `ubicacion_provincia` VALUES ('27', '2', 'Yungay');
INSERT INTO `ubicacion_provincia` VALUES ('28', '3', 'Abancay');
INSERT INTO `ubicacion_provincia` VALUES ('29', '3', 'Andahuaylas');
INSERT INTO `ubicacion_provincia` VALUES ('30', '3', 'Antabamba');
INSERT INTO `ubicacion_provincia` VALUES ('31', '3', 'Aymaraes');
INSERT INTO `ubicacion_provincia` VALUES ('32', '3', 'Cotabambas');
INSERT INTO `ubicacion_provincia` VALUES ('33', '3', 'Chincheros');
INSERT INTO `ubicacion_provincia` VALUES ('34', '3', 'Grau');
INSERT INTO `ubicacion_provincia` VALUES ('35', '4', 'Arequipa');
INSERT INTO `ubicacion_provincia` VALUES ('36', '4', 'Camana');
INSERT INTO `ubicacion_provincia` VALUES ('37', '4', 'Caraveli');
INSERT INTO `ubicacion_provincia` VALUES ('38', '4', 'Castilla');
INSERT INTO `ubicacion_provincia` VALUES ('39', '4', 'Caylloma');
INSERT INTO `ubicacion_provincia` VALUES ('40', '4', 'Condesuyos');
INSERT INTO `ubicacion_provincia` VALUES ('41', '4', 'Islay');
INSERT INTO `ubicacion_provincia` VALUES ('42', '4', 'La Union');
INSERT INTO `ubicacion_provincia` VALUES ('43', '5', 'Huamanga');
INSERT INTO `ubicacion_provincia` VALUES ('44', '5', 'Cangallo');
INSERT INTO `ubicacion_provincia` VALUES ('45', '5', 'Huanca Sancos');
INSERT INTO `ubicacion_provincia` VALUES ('46', '5', 'Huanta');
INSERT INTO `ubicacion_provincia` VALUES ('47', '5', 'La Mar');
INSERT INTO `ubicacion_provincia` VALUES ('48', '5', 'Lucanas');
INSERT INTO `ubicacion_provincia` VALUES ('49', '5', 'Parinacochas');
INSERT INTO `ubicacion_provincia` VALUES ('50', '5', 'Paucar Del Sara Sara');
INSERT INTO `ubicacion_provincia` VALUES ('51', '5', 'Sucre');
INSERT INTO `ubicacion_provincia` VALUES ('52', '5', 'Victor Fajardo');
INSERT INTO `ubicacion_provincia` VALUES ('53', '5', 'Vilcas Huaman');
INSERT INTO `ubicacion_provincia` VALUES ('54', '6', 'Cajamarca');
INSERT INTO `ubicacion_provincia` VALUES ('55', '6', 'Cajabamba');
INSERT INTO `ubicacion_provincia` VALUES ('56', '6', 'Celendin');
INSERT INTO `ubicacion_provincia` VALUES ('57', '6', 'Chota');
INSERT INTO `ubicacion_provincia` VALUES ('58', '6', 'Contumaza');
INSERT INTO `ubicacion_provincia` VALUES ('59', '6', 'Cutervo');
INSERT INTO `ubicacion_provincia` VALUES ('60', '6', 'Hualgayoc');
INSERT INTO `ubicacion_provincia` VALUES ('61', '6', 'Jaen');
INSERT INTO `ubicacion_provincia` VALUES ('62', '6', 'San Ignacio');
INSERT INTO `ubicacion_provincia` VALUES ('63', '6', 'San Marcos');
INSERT INTO `ubicacion_provincia` VALUES ('64', '6', 'San Miguel');
INSERT INTO `ubicacion_provincia` VALUES ('65', '6', 'San Pablo');
INSERT INTO `ubicacion_provincia` VALUES ('66', '6', 'Santa Cruz');
INSERT INTO `ubicacion_provincia` VALUES ('67', '7', 'Callao');
INSERT INTO `ubicacion_provincia` VALUES ('68', '8', 'Cusco');
INSERT INTO `ubicacion_provincia` VALUES ('69', '8', 'Acomayo');
INSERT INTO `ubicacion_provincia` VALUES ('70', '8', 'Anta');
INSERT INTO `ubicacion_provincia` VALUES ('71', '8', 'Calca');
INSERT INTO `ubicacion_provincia` VALUES ('72', '8', 'Canas');
INSERT INTO `ubicacion_provincia` VALUES ('73', '8', 'Canchis');
INSERT INTO `ubicacion_provincia` VALUES ('74', '8', 'Chumbivilcas');
INSERT INTO `ubicacion_provincia` VALUES ('75', '8', 'Espinar');
INSERT INTO `ubicacion_provincia` VALUES ('76', '8', 'La Convencion');
INSERT INTO `ubicacion_provincia` VALUES ('77', '8', 'Paruro');
INSERT INTO `ubicacion_provincia` VALUES ('78', '8', 'Paucartambo');
INSERT INTO `ubicacion_provincia` VALUES ('79', '8', 'Quispicanchi');
INSERT INTO `ubicacion_provincia` VALUES ('80', '8', 'Urubamba');
INSERT INTO `ubicacion_provincia` VALUES ('81', '9', 'Huancavelica');
INSERT INTO `ubicacion_provincia` VALUES ('82', '9', 'Acobamba');
INSERT INTO `ubicacion_provincia` VALUES ('83', '9', 'Angaraes');
INSERT INTO `ubicacion_provincia` VALUES ('84', '9', 'Castrovirreyna');
INSERT INTO `ubicacion_provincia` VALUES ('85', '9', 'Churcampa');
INSERT INTO `ubicacion_provincia` VALUES ('86', '9', 'Huaytara');
INSERT INTO `ubicacion_provincia` VALUES ('87', '9', 'Tayacaja');
INSERT INTO `ubicacion_provincia` VALUES ('88', '10', 'Huanuco');
INSERT INTO `ubicacion_provincia` VALUES ('89', '10', 'Ambo');
INSERT INTO `ubicacion_provincia` VALUES ('90', '10', 'Dos De Mayo');
INSERT INTO `ubicacion_provincia` VALUES ('91', '10', 'Huacaybamba');
INSERT INTO `ubicacion_provincia` VALUES ('92', '10', 'Huamalies');
INSERT INTO `ubicacion_provincia` VALUES ('93', '10', 'Leoncio Prado');
INSERT INTO `ubicacion_provincia` VALUES ('94', '10', 'Marañon');
INSERT INTO `ubicacion_provincia` VALUES ('95', '10', 'Pachitea');
INSERT INTO `ubicacion_provincia` VALUES ('96', '10', 'Puerto Inca');
INSERT INTO `ubicacion_provincia` VALUES ('97', '10', 'Lauricocha');
INSERT INTO `ubicacion_provincia` VALUES ('98', '10', 'Yarowilca');
INSERT INTO `ubicacion_provincia` VALUES ('99', '11', 'Ica');
INSERT INTO `ubicacion_provincia` VALUES ('100', '11', 'Chincha');
INSERT INTO `ubicacion_provincia` VALUES ('101', '11', 'Nazca');
INSERT INTO `ubicacion_provincia` VALUES ('102', '11', 'Palpa');
INSERT INTO `ubicacion_provincia` VALUES ('103', '11', 'Pisco');
INSERT INTO `ubicacion_provincia` VALUES ('104', '12', 'Huancayo');
INSERT INTO `ubicacion_provincia` VALUES ('105', '12', 'Concepcion');
INSERT INTO `ubicacion_provincia` VALUES ('106', '12', 'Chanchamayo');
INSERT INTO `ubicacion_provincia` VALUES ('107', '12', 'Jauja');
INSERT INTO `ubicacion_provincia` VALUES ('108', '12', 'Junin');
INSERT INTO `ubicacion_provincia` VALUES ('109', '12', 'Satipo');
INSERT INTO `ubicacion_provincia` VALUES ('110', '12', 'Tarma');
INSERT INTO `ubicacion_provincia` VALUES ('111', '12', 'Yauli');
INSERT INTO `ubicacion_provincia` VALUES ('112', '12', 'Chupaca');
INSERT INTO `ubicacion_provincia` VALUES ('113', '13', 'Trujillo');
INSERT INTO `ubicacion_provincia` VALUES ('114', '13', 'Ascope');
INSERT INTO `ubicacion_provincia` VALUES ('115', '13', 'Bolivar');
INSERT INTO `ubicacion_provincia` VALUES ('116', '13', 'Chepen');
INSERT INTO `ubicacion_provincia` VALUES ('117', '13', 'Julcan');
INSERT INTO `ubicacion_provincia` VALUES ('118', '13', 'Otuzco');
INSERT INTO `ubicacion_provincia` VALUES ('119', '13', 'Pacasmayo');
INSERT INTO `ubicacion_provincia` VALUES ('120', '13', 'Pataz');
INSERT INTO `ubicacion_provincia` VALUES ('121', '13', 'Sanchez Carrion');
INSERT INTO `ubicacion_provincia` VALUES ('122', '13', 'Santiago De Chuco');
INSERT INTO `ubicacion_provincia` VALUES ('123', '13', 'Gran Chimu');
INSERT INTO `ubicacion_provincia` VALUES ('124', '13', 'Viru');
INSERT INTO `ubicacion_provincia` VALUES ('125', '14', 'Chiclayo');
INSERT INTO `ubicacion_provincia` VALUES ('126', '14', 'Ferreñafe');
INSERT INTO `ubicacion_provincia` VALUES ('127', '14', 'Lambayeque');
INSERT INTO `ubicacion_provincia` VALUES ('128', '15', 'Lima');
INSERT INTO `ubicacion_provincia` VALUES ('129', '15', 'Barranca');
INSERT INTO `ubicacion_provincia` VALUES ('130', '15', 'Cajatambo');
INSERT INTO `ubicacion_provincia` VALUES ('131', '15', 'Canta');
INSERT INTO `ubicacion_provincia` VALUES ('132', '15', 'Cañete');
INSERT INTO `ubicacion_provincia` VALUES ('133', '15', 'Huaral');
INSERT INTO `ubicacion_provincia` VALUES ('134', '15', 'Huarochiri');
INSERT INTO `ubicacion_provincia` VALUES ('135', '15', 'Huaura');
INSERT INTO `ubicacion_provincia` VALUES ('136', '15', 'Oyon');
INSERT INTO `ubicacion_provincia` VALUES ('137', '15', 'Yauyos');
INSERT INTO `ubicacion_provincia` VALUES ('138', '16', 'Maynas');
INSERT INTO `ubicacion_provincia` VALUES ('139', '16', 'Alto Amazonas');
INSERT INTO `ubicacion_provincia` VALUES ('140', '16', 'Loreto');
INSERT INTO `ubicacion_provincia` VALUES ('141', '16', 'Mariscal Ramon Castilla');
INSERT INTO `ubicacion_provincia` VALUES ('142', '16', 'Requena');
INSERT INTO `ubicacion_provincia` VALUES ('143', '16', 'Ucayali');
INSERT INTO `ubicacion_provincia` VALUES ('144', '17', 'Tambopata');
INSERT INTO `ubicacion_provincia` VALUES ('145', '17', 'Manu');
INSERT INTO `ubicacion_provincia` VALUES ('146', '17', 'Tahuamanu');
INSERT INTO `ubicacion_provincia` VALUES ('147', '18', 'Mariscal Nieto');
INSERT INTO `ubicacion_provincia` VALUES ('148', '18', 'General Sanchez Cerro');
INSERT INTO `ubicacion_provincia` VALUES ('149', '18', 'Ilo');
INSERT INTO `ubicacion_provincia` VALUES ('150', '19', 'Pasco');
INSERT INTO `ubicacion_provincia` VALUES ('151', '19', 'Daniel Alcides Carrion');
INSERT INTO `ubicacion_provincia` VALUES ('152', '19', 'Oxapampa');
INSERT INTO `ubicacion_provincia` VALUES ('153', '20', 'Piura');
INSERT INTO `ubicacion_provincia` VALUES ('154', '20', 'Ayabaca');
INSERT INTO `ubicacion_provincia` VALUES ('155', '20', 'Huancabamba');
INSERT INTO `ubicacion_provincia` VALUES ('156', '20', 'Morropon');
INSERT INTO `ubicacion_provincia` VALUES ('157', '20', 'Paita');
INSERT INTO `ubicacion_provincia` VALUES ('158', '20', 'Sullana');
INSERT INTO `ubicacion_provincia` VALUES ('159', '20', 'Talara');
INSERT INTO `ubicacion_provincia` VALUES ('160', '20', 'Sechura');
INSERT INTO `ubicacion_provincia` VALUES ('161', '21', 'Puno');
INSERT INTO `ubicacion_provincia` VALUES ('162', '21', 'Azangaro');
INSERT INTO `ubicacion_provincia` VALUES ('163', '21', 'Carabaya');
INSERT INTO `ubicacion_provincia` VALUES ('164', '21', 'Chucuito');
INSERT INTO `ubicacion_provincia` VALUES ('165', '21', 'El Collao');
INSERT INTO `ubicacion_provincia` VALUES ('166', '21', 'Huancane');
INSERT INTO `ubicacion_provincia` VALUES ('167', '21', 'Lampa');
INSERT INTO `ubicacion_provincia` VALUES ('168', '21', 'Melgar');
INSERT INTO `ubicacion_provincia` VALUES ('169', '21', 'Moho');
INSERT INTO `ubicacion_provincia` VALUES ('170', '21', 'San Antonio De Putina');
INSERT INTO `ubicacion_provincia` VALUES ('171', '21', 'San Roman');
INSERT INTO `ubicacion_provincia` VALUES ('172', '21', 'Sandia');
INSERT INTO `ubicacion_provincia` VALUES ('173', '21', 'Yunguyo');
INSERT INTO `ubicacion_provincia` VALUES ('174', '22', 'Moyobamba');
INSERT INTO `ubicacion_provincia` VALUES ('175', '22', 'Bellavista');
INSERT INTO `ubicacion_provincia` VALUES ('176', '22', 'El Dorado');
INSERT INTO `ubicacion_provincia` VALUES ('177', '22', 'Huallaga');
INSERT INTO `ubicacion_provincia` VALUES ('178', '22', 'Lamas');
INSERT INTO `ubicacion_provincia` VALUES ('179', '22', 'Mariscal Caceres');
INSERT INTO `ubicacion_provincia` VALUES ('180', '22', 'Picota');
INSERT INTO `ubicacion_provincia` VALUES ('181', '22', 'Rioja');
INSERT INTO `ubicacion_provincia` VALUES ('182', '22', 'San Martin');
INSERT INTO `ubicacion_provincia` VALUES ('183', '22', 'Tocache');
INSERT INTO `ubicacion_provincia` VALUES ('184', '23', 'Tacna');
INSERT INTO `ubicacion_provincia` VALUES ('185', '23', 'Candarave');
INSERT INTO `ubicacion_provincia` VALUES ('186', '23', 'Jorge Basadre');
INSERT INTO `ubicacion_provincia` VALUES ('187', '23', 'Tarata');
INSERT INTO `ubicacion_provincia` VALUES ('188', '24', 'Tumbes');
INSERT INTO `ubicacion_provincia` VALUES ('189', '24', 'Contralmirante Villar');
INSERT INTO `ubicacion_provincia` VALUES ('190', '24', 'Zarumilla');
INSERT INTO `ubicacion_provincia` VALUES ('191', '25', 'Coronel Portillo');
INSERT INTO `ubicacion_provincia` VALUES ('192', '25', 'Atalaya');
INSERT INTO `ubicacion_provincia` VALUES ('193', '25', 'Padre Abad');
INSERT INTO `ubicacion_provincia` VALUES ('194', '25', 'Purus');

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
) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';

-- ----------------------------
-- Records of usuarios_accesos
-- ----------------------------
INSERT INTO `usuarios_accesos` VALUES ('1', '1', '2015-09-29', '13:25:24');
INSERT INTO `usuarios_accesos` VALUES ('2', '1', '2015-10-15', '14:32:34');
INSERT INTO `usuarios_accesos` VALUES ('3', '1', '2015-11-09', '12:21:32');
INSERT INTO `usuarios_accesos` VALUES ('4', '1', '2015-11-09', '14:51:31');
INSERT INTO `usuarios_accesos` VALUES ('5', '1', '2015-11-09', '16:42:19');
INSERT INTO `usuarios_accesos` VALUES ('6', '1', '2015-11-09', '17:10:19');
INSERT INTO `usuarios_accesos` VALUES ('7', '1', '2015-11-24', '10:58:55');
INSERT INTO `usuarios_accesos` VALUES ('8', '1', '2015-11-24', '14:09:07');
INSERT INTO `usuarios_accesos` VALUES ('9', '1', '2015-11-24', '14:56:18');
INSERT INTO `usuarios_accesos` VALUES ('10', '1', '2015-11-24', '17:48:54');
INSERT INTO `usuarios_accesos` VALUES ('11', '1', '2015-11-25', '10:59:22');
INSERT INTO `usuarios_accesos` VALUES ('12', '1', '2015-11-25', '15:03:18');
INSERT INTO `usuarios_accesos` VALUES ('13', '1', '2015-11-26', '14:57:46');
INSERT INTO `usuarios_accesos` VALUES ('14', '1', '2015-11-30', '11:58:22');
INSERT INTO `usuarios_accesos` VALUES ('15', '1', '2015-12-02', '16:18:44');
INSERT INTO `usuarios_accesos` VALUES ('16', '1', '2015-12-03', '13:20:18');
INSERT INTO `usuarios_accesos` VALUES ('17', '1', '2015-12-09', '17:17:01');
INSERT INTO `usuarios_accesos` VALUES ('18', '1', '2015-12-14', '10:25:20');
INSERT INTO `usuarios_accesos` VALUES ('19', '1', '2015-12-14', '12:12:13');
INSERT INTO `usuarios_accesos` VALUES ('20', '1', '2015-12-14', '16:15:51');
INSERT INTO `usuarios_accesos` VALUES ('21', '2', '2015-12-14', '16:17:59');
INSERT INTO `usuarios_accesos` VALUES ('22', '2', '2015-12-14', '16:18:06');
INSERT INTO `usuarios_accesos` VALUES ('23', '1', '2015-12-14', '16:19:24');
INSERT INTO `usuarios_accesos` VALUES ('24', '1', '2015-12-14', '16:19:29');
INSERT INTO `usuarios_accesos` VALUES ('25', '2', '2015-12-14', '16:20:26');
INSERT INTO `usuarios_accesos` VALUES ('26', '2', '2015-12-14', '16:20:29');
INSERT INTO `usuarios_accesos` VALUES ('27', '1', '2015-12-15', '15:18:09');
INSERT INTO `usuarios_accesos` VALUES ('28', '1', '2015-12-15', '21:40:44');
INSERT INTO `usuarios_accesos` VALUES ('29', '1', '2015-12-15', '21:51:54');
INSERT INTO `usuarios_accesos` VALUES ('30', '1', '2015-12-16', '09:44:13');
INSERT INTO `usuarios_accesos` VALUES ('31', '1', '2015-12-16', '12:21:40');
INSERT INTO `usuarios_accesos` VALUES ('32', '2', '2015-12-16', '12:21:54');
INSERT INTO `usuarios_accesos` VALUES ('33', '2', '2015-12-16', '12:21:58');
INSERT INTO `usuarios_accesos` VALUES ('34', '2', '2015-12-16', '12:25:49');
INSERT INTO `usuarios_accesos` VALUES ('35', '2', '2015-12-16', '12:25:53');
INSERT INTO `usuarios_accesos` VALUES ('36', '2', '2015-12-16', '14:38:58');
INSERT INTO `usuarios_accesos` VALUES ('37', '2', '2015-12-16', '19:12:53');
INSERT INTO `usuarios_accesos` VALUES ('38', '2', '2015-12-16', '19:25:35');
INSERT INTO `usuarios_accesos` VALUES ('39', '2', '2015-12-16', '19:27:18');
INSERT INTO `usuarios_accesos` VALUES ('40', '2', '2015-12-16', '20:47:26');
INSERT INTO `usuarios_accesos` VALUES ('41', '2', '2015-12-17', '11:56:08');
INSERT INTO `usuarios_accesos` VALUES ('42', '2', '2015-12-17', '12:35:52');
INSERT INTO `usuarios_accesos` VALUES ('43', '1', '2015-12-17', '12:36:36');
INSERT INTO `usuarios_accesos` VALUES ('44', '1', '2015-12-17', '12:36:42');
INSERT INTO `usuarios_accesos` VALUES ('45', '2', '2015-12-17', '13:01:30');
INSERT INTO `usuarios_accesos` VALUES ('46', '2', '2015-12-17', '20:19:37');
INSERT INTO `usuarios_accesos` VALUES ('47', '2', '2015-12-17', '22:36:34');
INSERT INTO `usuarios_accesos` VALUES ('48', '2', '2015-12-18', '16:29:52');
INSERT INTO `usuarios_accesos` VALUES ('49', '2', '2015-12-19', '00:19:12');
INSERT INTO `usuarios_accesos` VALUES ('50', '2', '2015-12-19', '12:03:39');
INSERT INTO `usuarios_accesos` VALUES ('51', '2', '2015-12-19', '12:33:59');
INSERT INTO `usuarios_accesos` VALUES ('52', '2', '2015-12-19', '12:47:03');
INSERT INTO `usuarios_accesos` VALUES ('53', '2', '2015-12-19', '12:47:54');
INSERT INTO `usuarios_accesos` VALUES ('54', '2', '2015-12-19', '17:26:30');
INSERT INTO `usuarios_accesos` VALUES ('55', '2', '2015-12-19', '17:46:15');
INSERT INTO `usuarios_accesos` VALUES ('56', '1', '2015-12-21', '09:49:33');
INSERT INTO `usuarios_accesos` VALUES ('57', '2', '2015-12-21', '18:04:03');
INSERT INTO `usuarios_accesos` VALUES ('58', '2', '2015-12-21', '20:00:33');
INSERT INTO `usuarios_accesos` VALUES ('59', '1', '2015-12-22', '17:31:16');
INSERT INTO `usuarios_accesos` VALUES ('60', '1', '2015-12-23', '15:42:08');
INSERT INTO `usuarios_accesos` VALUES ('61', '2', '2015-12-24', '00:15:46');
INSERT INTO `usuarios_accesos` VALUES ('62', '2', '2015-12-24', '10:58:13');
INSERT INTO `usuarios_accesos` VALUES ('63', '2', '2015-12-24', '12:26:18');
INSERT INTO `usuarios_accesos` VALUES ('64', '1', '2015-12-24', '13:12:57');
INSERT INTO `usuarios_accesos` VALUES ('65', '2', '2015-12-25', '14:10:45');
INSERT INTO `usuarios_accesos` VALUES ('66', '2', '2015-12-28', '13:22:24');
INSERT INTO `usuarios_accesos` VALUES ('67', '2', '2015-12-29', '11:54:35');
INSERT INTO `usuarios_accesos` VALUES ('68', '2', '2015-12-29', '15:26:44');
INSERT INTO `usuarios_accesos` VALUES ('69', '2', '2015-12-29', '19:34:45');
INSERT INTO `usuarios_accesos` VALUES ('70', '2', '2015-12-29', '19:42:57');
INSERT INTO `usuarios_accesos` VALUES ('71', '2', '2015-12-29', '22:12:36');
INSERT INTO `usuarios_accesos` VALUES ('72', '2', '2015-12-30', '12:01:11');
INSERT INTO `usuarios_accesos` VALUES ('73', '2', '2015-12-30', '13:46:16');
INSERT INTO `usuarios_accesos` VALUES ('74', '2', '2015-12-30', '15:07:07');
INSERT INTO `usuarios_accesos` VALUES ('75', '2', '2015-12-30', '15:33:35');
INSERT INTO `usuarios_accesos` VALUES ('76', '2', '2016-01-02', '13:14:00');
INSERT INTO `usuarios_accesos` VALUES ('77', '3', '2016-01-04', '18:01:00');
INSERT INTO `usuarios_accesos` VALUES ('78', '4', '2016-01-04', '18:01:14');
INSERT INTO `usuarios_accesos` VALUES ('79', '1', '2016-01-12', '13:33:07');
INSERT INTO `usuarios_accesos` VALUES ('80', '1', '2016-02-23', '10:50:29');

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
  `tipo` varchar(15) NOT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COMMENT='Cuidado';

-- ----------------------------
-- Records of usuarios_listado
-- ----------------------------
INSERT INTO `usuarios_listado` VALUES ('1', 'tenshi98', 'b9ad227539cc03cd8199e23aa9078065', 'SuperAdmin', '1', 'asd@bla1.cl', 'Victor Reyes', '16029464-7', '2014-05-14', 'Los Lirios 0936', '8512517', 'Santiago', 'Puente Alto', 'usr_img_img_6626.jpg', '2016-02-23', '0');
INSERT INTO `usuarios_listado` VALUES ('2', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'Administrador', '1', '', 'Administrador', '', '0000-00-00', '', '', '', '', '', '2016-01-02', '1');
INSERT INTO `usuarios_listado` VALUES ('3', 'esoto', '81dc9bdb52d04dc20036dbd8313ed055', 'Supervisor', '1', 'admin1@admin1.cl', 'Evelyn Soto', '', '0000-00-00', 'asd', '', '', '', '', '2016-01-04', '1');
INSERT INTO `usuarios_listado` VALUES ('4', 'ejecutivo1', '81dc9bdb52d04dc20036dbd8313ed055', 'Vendedor', '1', 'ejecutivo1@eje.cl', 'Evelyn Soto', '', '0000-00-00', 'asd', '', '', '', '', '2016-01-04', '1');
INSERT INTO `usuarios_listado` VALUES ('5', 'cmelendez', '81dc9bdb52d04dc20036dbd8313ed055', 'Supervisor', '1', 'cmelendez.1805@gmail.com', 'Carlos Melendez', '', '0000-00-00', 'asd', '', '', '', '', '2016-01-04', '1');
INSERT INTO `usuarios_listado` VALUES ('6', 'ejecutivo2', '81dc9bdb52d04dc20036dbd8313ed055', 'Vendedor', '1', 'asd@asd.cl', 'Ejecutivo 2', '', '0000-00-00', 'asd', '', '', '', '', '0000-00-00', '1');
INSERT INTO `usuarios_listado` VALUES ('7', 'doris', '81dc9bdb52d04dc20036dbd8313ed055', 'Supervisor', '1', 'doris@gmail.com', 'Doris', '', '0000-00-00', 'camino real', '', '', '', '', '0000-00-00', '1');
INSERT INTO `usuarios_listado` VALUES ('8', 'ejecutivo3', '81dc9bdb52d04dc20036dbd8313ed055', 'Vendedor', '1', 'doris@gmail.com', 'Doris', '', '0000-00-00', '', '', '', '', '', '0000-00-00', '1');
INSERT INTO `usuarios_listado` VALUES ('9', 'gventas1', '81dc9bdb52d04dc20036dbd8313ed055', 'Gerente Ventas', '1', 'admin1@admin1.cl', 'Evelyn Soto', '', '0000-00-00', '', '', '', '', '', '0000-00-00', '1');
INSERT INTO `usuarios_listado` VALUES ('10', 'gventas2', '81dc9bdb52d04dc20036dbd8313ed055', 'Gerente Ventas', '1', 'admin1@admin1.cl', 'Carlos Melendez', '', '0000-00-00', '', '', '', '', '', '0000-00-00', '1');

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
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';

-- ----------------------------
-- Records of usuarios_permisos
-- ----------------------------
INSERT INTO `usuarios_permisos` VALUES ('1', '2', '2', '4');
INSERT INTO `usuarios_permisos` VALUES ('2', '2', '1', '4');
INSERT INTO `usuarios_permisos` VALUES ('3', '2', '13', '4');
INSERT INTO `usuarios_permisos` VALUES ('5', '2', '3', '4');
INSERT INTO `usuarios_permisos` VALUES ('6', '2', '8', '4');
INSERT INTO `usuarios_permisos` VALUES ('7', '2', '6', '4');
INSERT INTO `usuarios_permisos` VALUES ('8', '2', '5', '4');
INSERT INTO `usuarios_permisos` VALUES ('9', '2', '4', '4');
INSERT INTO `usuarios_permisos` VALUES ('10', '2', '7', '4');
INSERT INTO `usuarios_permisos` VALUES ('11', '3', '17', '4');
INSERT INTO `usuarios_permisos` VALUES ('12', '3', '18', '4');
INSERT INTO `usuarios_permisos` VALUES ('13', '3', '19', '4');
INSERT INTO `usuarios_permisos` VALUES ('17', '4', '1', '4');
INSERT INTO `usuarios_permisos` VALUES ('18', '4', '2', '4');
INSERT INTO `usuarios_permisos` VALUES ('19', '4', '13', '4');
INSERT INTO `usuarios_permisos` VALUES ('20', '5', '17', '4');
INSERT INTO `usuarios_permisos` VALUES ('21', '5', '18', '4');
INSERT INTO `usuarios_permisos` VALUES ('22', '5', '19', '4');
INSERT INTO `usuarios_permisos` VALUES ('32', '6', '22', '4');
INSERT INTO `usuarios_permisos` VALUES ('31', '3', '21', '4');
INSERT INTO `usuarios_permisos` VALUES ('26', '6', '1', '4');
INSERT INTO `usuarios_permisos` VALUES ('27', '6', '2', '4');
INSERT INTO `usuarios_permisos` VALUES ('28', '6', '13', '4');
INSERT INTO `usuarios_permisos` VALUES ('29', '5', '21', '1');
INSERT INTO `usuarios_permisos` VALUES ('30', '4', '22', '1');
INSERT INTO `usuarios_permisos` VALUES ('33', '7', '1', '4');
INSERT INTO `usuarios_permisos` VALUES ('34', '7', '2', '4');
INSERT INTO `usuarios_permisos` VALUES ('35', '7', '13', '4');
INSERT INTO `usuarios_permisos` VALUES ('36', '7', '22', '4');

-- ----------------------------
-- Table structure for usuarios_tipos
-- ----------------------------
DROP TABLE IF EXISTS `usuarios_tipos`;
CREATE TABLE `usuarios_tipos` (
  `idTipoUsr` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idTipoUsr`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='Fija';

-- ----------------------------
-- Records of usuarios_tipos
-- ----------------------------
INSERT INTO `usuarios_tipos` VALUES ('1', 'Administrador');
INSERT INTO `usuarios_tipos` VALUES ('2', 'Vendedor');
INSERT INTO `usuarios_tipos` VALUES ('3', 'Supervisor');
INSERT INTO `usuarios_tipos` VALUES ('4', 'Gerente Ventas');
