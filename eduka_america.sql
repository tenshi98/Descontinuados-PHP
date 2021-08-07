/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50620
Source Host           : localhost:3306
Source Database       : eduka_america

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2016-04-29 20:49:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for carro_meses
-- ----------------------------
DROP TABLE IF EXISTS `carro_meses`;
CREATE TABLE `carro_meses` (
  `idMes` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`idMes`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of carro_meses
-- ----------------------------
INSERT INTO `carro_meses` VALUES ('1', 'Enero');
INSERT INTO `carro_meses` VALUES ('2', 'Febrero');
INSERT INTO `carro_meses` VALUES ('3', 'Marzo');
INSERT INTO `carro_meses` VALUES ('4', 'Abril');
INSERT INTO `carro_meses` VALUES ('5', 'Mayo');
INSERT INTO `carro_meses` VALUES ('6', 'Junio');
INSERT INTO `carro_meses` VALUES ('7', 'Julio');
INSERT INTO `carro_meses` VALUES ('8', 'Agosto');
INSERT INTO `carro_meses` VALUES ('9', 'Septiembre');
INSERT INTO `carro_meses` VALUES ('10', 'Octubre');
INSERT INTO `carro_meses` VALUES ('11', 'Noviembre');
INSERT INTO `carro_meses` VALUES ('12', 'Diciembre');

-- ----------------------------
-- Table structure for carro_ventas
-- ----------------------------
DROP TABLE IF EXISTS `carro_ventas`;
CREATE TABLE `carro_ventas` (
  `idVenta` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Token` varchar(255) NOT NULL,
  `TotalVenta` int(11) unsigned NOT NULL,
  `Nproductos` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idVenta`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of carro_ventas
-- ----------------------------
INSERT INTO `carro_ventas` VALUES ('1', '2', '2015-06-22', 'EC-1FV02885RV8078018', '120000', '1');

-- ----------------------------
-- Table structure for clientes_cupones
-- ----------------------------
DROP TABLE IF EXISTS `clientes_cupones`;
CREATE TABLE `clientes_cupones` (
  `idCupones` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) unsigned NOT NULL,
  `Codigo` varchar(120) NOT NULL,
  `Descuento` int(8) unsigned NOT NULL,
  `idEstado` int(11) unsigned NOT NULL,
  `Fecha` date NOT NULL,
  `idVenta` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`idCupones`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clientes_cupones
-- ----------------------------
INSERT INTO `clientes_cupones` VALUES ('1', '4', 'asd', '10', '1', '0000-00-00', '0');
INSERT INTO `clientes_cupones` VALUES ('2', '4', 'qwe', '20', '1', '0000-00-00', '0');

-- ----------------------------
-- Table structure for clientes_cursos_capitulos_vistos
-- ----------------------------
DROP TABLE IF EXISTS `clientes_cursos_capitulos_vistos`;
CREATE TABLE `clientes_cursos_capitulos_vistos` (
  `idComprados` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) unsigned NOT NULL,
  `idProducto` int(11) unsigned NOT NULL,
  `idCapitulo` int(11) unsigned NOT NULL,
  `estado` smallint(1) unsigned NOT NULL,
  PRIMARY KEY (`idComprados`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clientes_cursos_capitulos_vistos
-- ----------------------------
INSERT INTO `clientes_cursos_capitulos_vistos` VALUES ('1', '2', '1', '1', '1');
INSERT INTO `clientes_cursos_capitulos_vistos` VALUES ('2', '2', '1', '2', '1');
INSERT INTO `clientes_cursos_capitulos_vistos` VALUES ('3', '2', '1', '9', '1');
INSERT INTO `clientes_cursos_capitulos_vistos` VALUES ('4', '2', '1', '3', '1');
INSERT INTO `clientes_cursos_capitulos_vistos` VALUES ('5', '2', '1', '4', '1');
INSERT INTO `clientes_cursos_capitulos_vistos` VALUES ('6', '2', '1', '5', '1');
INSERT INTO `clientes_cursos_capitulos_vistos` VALUES ('7', '2', '1', '6', '1');
INSERT INTO `clientes_cursos_capitulos_vistos` VALUES ('8', '2', '1', '7', '1');
INSERT INTO `clientes_cursos_capitulos_vistos` VALUES ('9', '2', '1', '8', '1');

-- ----------------------------
-- Table structure for clientes_cursos_comprados
-- ----------------------------
DROP TABLE IF EXISTS `clientes_cursos_comprados`;
CREATE TABLE `clientes_cursos_comprados` (
  `idComprados` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idVenta` bigint(20) unsigned NOT NULL,
  `idCliente` int(11) unsigned NOT NULL,
  `idProducto` int(11) unsigned NOT NULL,
  `Mes` smallint(3) unsigned NOT NULL,
  `Ano` int(4) unsigned NOT NULL,
  `ValorActual` int(11) unsigned NOT NULL,
  `descuento` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idComprados`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clientes_cursos_comprados
-- ----------------------------
INSERT INTO `clientes_cursos_comprados` VALUES ('1', '1', '2', '1', '6', '2015', '120000', '0');

-- ----------------------------
-- Table structure for clientes_listado
-- ----------------------------
DROP TABLE IF EXISTS `clientes_listado`;
CREATE TABLE `clientes_listado` (
  `idCliente` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fcreacion` date NOT NULL,
  `usuario` varchar(120) NOT NULL,
  `password` char(32) NOT NULL,
  `idTipoCliente` int(11) unsigned NOT NULL,
  `Estado` int(11) unsigned NOT NULL,
  `email` varchar(120) NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  `Apellido_Paterno` varchar(120) NOT NULL,
  `Apellido_Materno` varchar(120) NOT NULL,
  `Rut` varchar(13) NOT NULL,
  `Sexo` char(1) NOT NULL,
  `fNacimiento` date NOT NULL,
  `Direccion` varchar(60) NOT NULL,
  `Fono1` varchar(15) NOT NULL,
  `Fono2` varchar(15) NOT NULL,
  `Url_imagen` varchar(255) NOT NULL,
  `idPais` varchar(120) NOT NULL,
  `idCiudad` int(11) unsigned NOT NULL,
  `idComuna` int(11) unsigned NOT NULL,
  `Obs` text NOT NULL,
  `social_Facebook` varchar(255) NOT NULL,
  `social_Twitter` varchar(255) NOT NULL,
  `social_Googleplus` varchar(255) NOT NULL,
  `social_Linked` varchar(255) NOT NULL,
  `social_Pinterest` varchar(255) NOT NULL,
  `social_Flickr` varchar(255) NOT NULL,
  `social_Tumblr` varchar(255) NOT NULL,
  `social_Skype` varchar(255) NOT NULL,
  `social_Instagram` varchar(255) NOT NULL,
  `social_Dribble` varchar(255) NOT NULL,
  `social_Youtube` varchar(255) NOT NULL,
  `social_Vimeo` varchar(255) NOT NULL,
  `CtaCte` varchar(120) NOT NULL,
  `idTipoCuenta` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clientes_listado
-- ----------------------------
INSERT INTO `clientes_listado` VALUES ('1', '0000-00-00', 'instructor', '1234', '2', '0', 'tenshi98@gmail.com', 'Victor', 'Reyes', 'Galvez', '16029464-7', 'M', '2014-07-02', '', '8512517', '72489062', '1_hablaocalla.jpg', '1', '13', '100', 'Instructor experto en programacion', 'http://www.google.com', 'http://www.google.com', 'http://www.google.com', 'http://www.google.com', 'http://www.google.com', 'http://www.google.com', 'http://www.google.com', 'http://www.google.com', 'http://www.google.com', 'http://www.google.com', 'http://www.google.com', 'http://www.google.com', '16029464', '3');
INSERT INTO `clientes_listado` VALUES ('2', '0000-00-00', 'comprador', '1234', '0', '0', 'test@test.com', 'test', 'test', '', '', '', '0000-00-00', '', '', '', '', '', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clientes_observaciones
-- ----------------------------

-- ----------------------------
-- Table structure for clientes_sexo
-- ----------------------------
DROP TABLE IF EXISTS `clientes_sexo`;
CREATE TABLE `clientes_sexo` (
  `idSexo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  `Inicial` char(2) NOT NULL,
  PRIMARY KEY (`idSexo`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clientes_sexo
-- ----------------------------
INSERT INTO `clientes_sexo` VALUES ('1', 'Masculino', 'M');
INSERT INTO `clientes_sexo` VALUES ('2', 'Femenino', 'F');

-- ----------------------------
-- Table structure for clientes_streaming
-- ----------------------------
DROP TABLE IF EXISTS `clientes_streaming`;
CREATE TABLE `clientes_streaming` (
  `idStreaming` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) unsigned NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `Tema` varchar(120) NOT NULL,
  PRIMARY KEY (`idStreaming`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clientes_streaming
-- ----------------------------
INSERT INTO `clientes_streaming` VALUES ('1', '1', '2015-07-25', '02:00:00', 'qwe');
INSERT INTO `clientes_streaming` VALUES ('2', '1', '2015-07-27', '03:00:00', 'asd');
INSERT INTO `clientes_streaming` VALUES ('3', '1', '2015-07-29', '03:00:00', 'aszxc');

-- ----------------------------
-- Table structure for clientes_tipos
-- ----------------------------
DROP TABLE IF EXISTS `clientes_tipos`;
CREATE TABLE `clientes_tipos` (
  `idTipoCliente` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`idTipoCliente`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clientes_tipos
-- ----------------------------
INSERT INTO `clientes_tipos` VALUES ('1', 'Normal');
INSERT INTO `clientes_tipos` VALUES ('2', 'Instructor');

-- ----------------------------
-- Table structure for clientes_tipo_cuentas
-- ----------------------------
DROP TABLE IF EXISTS `clientes_tipo_cuentas`;
CREATE TABLE `clientes_tipo_cuentas` (
  `idTipoCuenta` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`idTipoCuenta`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clientes_tipo_cuentas
-- ----------------------------
INSERT INTO `clientes_tipo_cuentas` VALUES ('1', 'Paypal');
INSERT INTO `clientes_tipo_cuentas` VALUES ('2', 'Cta Corriente');
INSERT INTO `clientes_tipo_cuentas` VALUES ('3', 'Cta Rut');

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
-- Table structure for core_permisos
-- ----------------------------
DROP TABLE IF EXISTS `core_permisos`;
CREATE TABLE `core_permisos` (
  `idAdmpm` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_pmcat` int(11) unsigned NOT NULL,
  `Direccionbase` varchar(50) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `visualizacion` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idAdmpm`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of core_permisos
-- ----------------------------
INSERT INTO `core_permisos` VALUES ('1', '1', 'admin_usr.php', 'Usuarios - Listado', '9998');
INSERT INTO `core_permisos` VALUES ('2', '1', 'admin_usr_activation.php', 'Usuarios - Estado', '9998');
INSERT INTO `core_permisos` VALUES ('3', '1', 'admin_usr_password.php', 'Usuarios - Contraseña', '9998');
INSERT INTO `core_permisos` VALUES ('4', '1', 'admin_usr_permisos.php', 'Usuarios - Permisos', '9998');
INSERT INTO `core_permisos` VALUES ('5', '2', 'admin_clientes_tipo_cuenta.php', 'Tipos de Cuenta', '9998');
INSERT INTO `core_permisos` VALUES ('6', '2', 'mnt_ciudad.php', 'Ubicacion - Ciudad', '9998');
INSERT INTO `core_permisos` VALUES ('7', '2', 'mnt_pais.php', 'Ubicacion - Pais', '9998');
INSERT INTO `core_permisos` VALUES ('8', '2', 'mnt_productos_cat.php', 'Productos - Categorias', '9998');
INSERT INTO `core_permisos` VALUES ('9', '2', 'mnt_idiomas.php', 'Idiomas', '9998');
INSERT INTO `core_permisos` VALUES ('10', '2', 'mnt_comuna.php', 'Ubicacion - Comuna', '9998');
INSERT INTO `core_permisos` VALUES ('11', '2', 'mnt_productos_subcat.php', 'Productos - Subcategoria', '9998');
INSERT INTO `core_permisos` VALUES ('12', '3', 'admin_clientes.php', 'Clientes - Listado', '9998');
INSERT INTO `core_permisos` VALUES ('13', '3', 'admin_clientes_cursos.php', 'Clientes - Aprobar cursos', '9998');
INSERT INTO `core_permisos` VALUES ('14', '4', 'ventas.php', 'Ventas', '9998');

-- ----------------------------
-- Table structure for core_permisos_cat
-- ----------------------------
DROP TABLE IF EXISTS `core_permisos_cat`;
CREATE TABLE `core_permisos_cat` (
  `id_pmcat` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(60) NOT NULL,
  PRIMARY KEY (`id_pmcat`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of core_permisos_cat
-- ----------------------------
INSERT INTO `core_permisos_cat` VALUES ('1', 'Usuarios');
INSERT INTO `core_permisos_cat` VALUES ('2', 'Mantenimiento');
INSERT INTO `core_permisos_cat` VALUES ('3', 'Clientes');
INSERT INTO `core_permisos_cat` VALUES ('4', 'Ventas');

-- ----------------------------
-- Table structure for core_sistemas
-- ----------------------------
DROP TABLE IF EXISTS `core_sistemas`;
CREATE TABLE `core_sistemas` (
  `idSistema` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  `imgLogo` varchar(250) NOT NULL,
  `email_principal` varchar(60) NOT NULL,
  `RazonSocial` varchar(60) NOT NULL,
  `Rut` varchar(13) NOT NULL,
  `Direccion` varchar(60) NOT NULL,
  `Fono` varchar(15) NOT NULL,
  `Ciudad` varchar(60) NOT NULL,
  `Comuna` varchar(60) NOT NULL,
  `web_curso` varchar(120) NOT NULL,
  PRIMARY KEY (`idSistema`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of core_sistemas
-- ----------------------------
INSERT INTO `core_sistemas` VALUES ('1', 'Eduka', '', 'clubamerica@americatv.cl', 'Club America', '16029464-7', 'Club America', '123', 'asd', 'asd', 'http://localhost/yii/eduka/productos/preview?prod=');

-- ----------------------------
-- Table structure for core_theme_colors
-- ----------------------------
DROP TABLE IF EXISTS `core_theme_colors`;
CREATE TABLE `core_theme_colors` (
  `idTheme` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idTheme`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of core_theme_colors
-- ----------------------------
INSERT INTO `core_theme_colors` VALUES ('1', 'Por defecto');
INSERT INTO `core_theme_colors` VALUES ('2', 'Azul');

-- ----------------------------
-- Table structure for detalle_general
-- ----------------------------
DROP TABLE IF EXISTS `detalle_general`;
CREATE TABLE `detalle_general` (
  `id_Detalle` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Tipo` smallint(5) NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`id_Detalle`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of detalle_general
-- ----------------------------
INSERT INTO `detalle_general` VALUES ('1', '1', 'Activo');
INSERT INTO `detalle_general` VALUES ('2', '1', 'Inactivo');

-- ----------------------------
-- Table structure for mnt_ubicacion_ciudad
-- ----------------------------
DROP TABLE IF EXISTS `mnt_ubicacion_ciudad`;
CREATE TABLE `mnt_ubicacion_ciudad` (
  `idCiudad` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idCiudad`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=347 DEFAULT CHARSET=latin1;

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
-- Table structure for mnt_ubicacion_pais
-- ----------------------------
DROP TABLE IF EXISTS `mnt_ubicacion_pais`;
CREATE TABLE `mnt_ubicacion_pais` (
  `idPais` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idPais`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mnt_ubicacion_pais
-- ----------------------------
INSERT INTO `mnt_ubicacion_pais` VALUES ('1', 'Chile');
INSERT INTO `mnt_ubicacion_pais` VALUES ('2', 'Peru');
INSERT INTO `mnt_ubicacion_pais` VALUES ('3', 'Argentina');
INSERT INTO `mnt_ubicacion_pais` VALUES ('4', 'Colombia');

-- ----------------------------
-- Table structure for productos_categorias
-- ----------------------------
DROP TABLE IF EXISTS `productos_categorias`;
CREATE TABLE `productos_categorias` (
  `idCategoria` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of productos_categorias
-- ----------------------------
INSERT INTO `productos_categorias` VALUES ('1', 'Programación');
INSERT INTO `productos_categorias` VALUES ('2', 'Negocios');
INSERT INTO `productos_categorias` VALUES ('3', 'IT y Software');
INSERT INTO `productos_categorias` VALUES ('4', 'Productividad de Oficina');
INSERT INTO `productos_categorias` VALUES ('5', 'Desarrollo Personal');
INSERT INTO `productos_categorias` VALUES ('6', 'Diseño');
INSERT INTO `productos_categorias` VALUES ('7', 'Márketing');
INSERT INTO `productos_categorias` VALUES ('8', 'Estilo de vida');
INSERT INTO `productos_categorias` VALUES ('9', 'Fotografía');

-- ----------------------------
-- Table structure for productos_estado
-- ----------------------------
DROP TABLE IF EXISTS `productos_estado`;
CREATE TABLE `productos_estado` (
  `idEstado` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of productos_estado
-- ----------------------------
INSERT INTO `productos_estado` VALUES ('1', 'En espera de aprobacion');
INSERT INTO `productos_estado` VALUES ('2', 'Aprobado');
INSERT INTO `productos_estado` VALUES ('3', 'Rechazado');

-- ----------------------------
-- Table structure for productos_idiomas
-- ----------------------------
DROP TABLE IF EXISTS `productos_idiomas`;
CREATE TABLE `productos_idiomas` (
  `idIdioma` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`idIdioma`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of productos_idiomas
-- ----------------------------
INSERT INTO `productos_idiomas` VALUES ('1', 'Español');
INSERT INTO `productos_idiomas` VALUES ('2', 'Ingles');
INSERT INTO `productos_idiomas` VALUES ('3', 'Frances');
INSERT INTO `productos_idiomas` VALUES ('4', 'Aleman');

-- ----------------------------
-- Table structure for productos_listado
-- ----------------------------
DROP TABLE IF EXISTS `productos_listado`;
CREATE TABLE `productos_listado` (
  `idProducto` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idCategoria` int(11) unsigned NOT NULL,
  `idSubcategoria` int(11) unsigned NOT NULL,
  `idCliente` int(11) unsigned NOT NULL,
  `Titulo` varchar(120) NOT NULL,
  `DescCorta` text NOT NULL,
  `DescLarga` text NOT NULL,
  `Url_imagen` varchar(255) NOT NULL,
  `Url_video` varchar(255) NOT NULL,
  `idNivel` int(11) NOT NULL,
  `NClases` int(11) unsigned NOT NULL,
  `Duracion` time NOT NULL,
  `idIdioma` int(11) unsigned NOT NULL,
  `Votos_5` int(11) unsigned NOT NULL,
  `Votos_4` int(11) unsigned NOT NULL,
  `Votos_3` int(11) unsigned NOT NULL,
  `Votos_2` int(11) unsigned NOT NULL,
  `Votos_1` int(11) unsigned NOT NULL,
  `ValorAntiguo` int(11) unsigned NOT NULL,
  `ValorActual` int(11) unsigned NOT NULL,
  `idEstado` int(11) unsigned NOT NULL,
  `Observaciones` text NOT NULL,
  PRIMARY KEY (`idProducto`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of productos_listado
-- ----------------------------
INSERT INTO `productos_listado` VALUES ('1', '1', '1', '1', 'Html5 basico', 'En este curso aprenderemos a realizar la estructura de las páginas web con HTML5. ', 'En este curso aprenderemos a realizar la estructura de las páginas web con HTML5. Realizaremos páginas de una, dos y tres columnas. También haermos páginas responsivas, es decir, páginas que se vean bien en monitores de computadora, asi como en tabletas y teléfonos inteligentes. Espero que  te sea de mucha utilidad.', '1_cursoId=1_0102-paginaenhtml5_page_01.jpg', '1_cursoId=1_Clase 1 - Introduccion.mp4', '1', '10', '01:33:00', '1', '8', '2', '1', '1', '0', '0', '120000', '2', '');
INSERT INTO `productos_listado` VALUES ('2', '1', '1', '1', 'Brackets & Edge Code - Fundamentos', 'Conoce las características y funciones de los editores de código gratuitos de Adobe para que trabajes profesionalmente ', ' Conoces lenguajes como HTML o CSS o los estás aprendiendo pero quieres trabajar con un editor de código liviano, flexible y gratuito? Adobe te da 2 opciones: Brackets y Edge Code.<br>\r\n\r\nEn este curso conocerás las características y funcionalidades de estos 2 editores de código. Te diré desde dónde descargarlos para instalar hasta cuales son las diferencias entre ellos y cómo puedes sacarles el mayor provecho.<br>\r\n\r\nInicia ya este curso y aprende a usar herramientas web para profesionales. ', '1_cursoId=2_115778_ad87_6.jpg', '1_cursoId=2_Clase 1 - Bienvenida.mp4', '1', '17', '01:03:00', '1', '5', '7', '4', '1', '0', '0', '80000', '2', '');
INSERT INTO `productos_listado` VALUES ('3', '1', '1', '1', 'Cómo Programar para Emprendedores - HTML y CSS', 'Ahorra dinero y dolores de cabeza aprendiendo lo básico de programación con nuestros cursos para emprendedores. ', '¿Eres un emprendedor y sufres de alguno de los siguientes síntomas?<br/><br/>\r\n\r\n    Gastas demasiado en desarrollo y ni siquiera entiendes lo que el desarrollador dice.<br/>\r\n    Cada vez que quieres arreglar algo sencillo en tu sitio web (como cambiar un enlace o una imagen) debes pagar de más y esperar semanas a que se concrete.<br/>\r\n    No puedes avanzar con tu idea de negocio porque no sabes programar ni siquiera un prototipo.<br/><br/>\r\n\r\nSi es así déjame decirte que no estás sólo. Trabajo con muchos emprendedores y los problemas mencionados los escucho cada semana. Las razones son las siguientes:<br/><br/>\r\n\r\n    Todas las PYMES y emprendedores necesitan desarrollo en algún grado. Esto puede ir desde una simple página web con una descripción de la empresa, hasta cosas más avanzadas aplicaciones móviles y sistemas informáticos.<br/>\r\n    Los desarrolladores son caros y escasos, y por ende representan un alto costo para el emprendedor.<br/>\r\n    Dice el dicho \"Programming is the new Math\", la programación es clave en el mundo actual y lamentablemente no te lo enseñaron en el colegio.<br/><br/>\r\n\r\nPara hacernos cargo de este problema en ZENVA hemos creado los cursos de la serie Cómo Programar para Emprendedores, donde queremos dotar a emprendedores como nosotros los conocimientos y herramientas básicas de desarrollo web para que puedan tener mayores probabilidades de éxito con sus proyectos.<br/><br/>\r\n\r\nEn Cómo Programar para Emprendedores - HTML y CSS veremos lo básico de desarrollo web, cómo crear la estructura de un sitio web y su contenido con HTML, y cómo darle una buena apariencia con CSS.<br/>\r\n\r\nEn el curso desarrollaremos un proyecto desde cero, sin asumir ningún conocimiento previo. El proyecto se trata de una página de inicio estilo \"Metro\" que se adapta al tamaño de la pantalla. Esta página podría fácilmente tratarse de un APP móvil también. <br/>', '1_cursoId=3_81372_0fe9_5.jpg', '1_cursoId=3_Como Programar para Emprendedores - HTML y CSS 1.mp4', '1', '25', '01:31:00', '1', '1', '2', '9', '0', '0', '0', '180000', '2', '');
INSERT INTO `productos_listado` VALUES ('4', '1', '1', '1', 'Como Crear Una Pagina Web o Blog con WordPress en 2 horas. ', 'Aprenda cómo crear un blog o pagina web profesional en su propio dominio en menos de dos horas sin codigo con WordPress. ', ' Esta es la primera de tres lecciones que yo le mostraré la finalización completa de la página web Como Crear Una Pagina Web o Blog TODO EN MENOS DE UNA HORA!<br/>\r\n\r\n\r\nLas lecciones que se aprenden aquí le permitirán hacer una página web profesional de cualquier tipo.<br/>\r\n\r\nEn este vídeo aprenderá cómo comprar un dominio, comprar una cuenta de hospedaje, conectar las dos cuentas, e instalar WordPress.<br/>\r\n\r\nCÓMO CREAR UNA PÁGINA WEB O BLOG: con WordPress, sin Código, en su propio dominio, en menos de 2 horas!<br/>\r\n\r\nAsociado con: Make Money from Home LIONS CLUB y Como Crear una Pagina Web o Blog.<br/>\r\n\r\nNO SE REQUIERE EXPERIENCIA PREVIA. TODAS LAS INSTRUCCIONES SON COMPLETAMENTE DETALLADAS Y HECHAS PASO A PASO PARA QUE CUALQUIER PERSONA PUEDA SEGUIR CON FACILIDAD.<br/>\r\n\r\nAprenda cómo crear una página web profesional o blog profesional en su propio dominio en menos de dos horas, y aprenda a hacerlo todo a través del sistema de gestión de contenidos más popular en la red: WordPress.<br/>\r\n\r\nNo se requiere conocimientos de codificación para utilizar WordPress ... si puede utilizar Microsoft Word, puede crear una página web profesional con WordPress (WordPress es un software que es totalmente gratuito).<br/>\r\n\r\nTodas las lecciones se enseñan paso a paso en este libro (con enlaces a videos que muestran las lecciones para mayor claridad - las lecciones de video le muestran la actualización completa de comocrearunapaginaweb desde principio a fin).<br/>\r\n\r\nCon las lecciones que se enseñan en mi libro, usted será capaz de crear cualquier tipo de página web que desee, como blogs personales, páginas web de negocios, o páginas web de comercio electrónico.<br/>\r\n\r\nAdemás, se incluye un capítulo extra: una introducción a cómo crear páginas web de ingresos pasivos y cómo hacer dinero en la red, realmente funciona!<br/>', '1_cursoId=4_82004_7feb_4.jpg', '1_cursoId=4_Clase 1 - Como comprar un dominio  hospedaje, conectar las cuentas, e instalar WordPress..mp4', '1', '3', '01:26:00', '1', '1', '1', '3', '5', '0', '0', '50000', '3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum');
INSERT INTO `productos_listado` VALUES ('5', '1', '1', '1', 'Dominando WordPress sin programación', 'Completa guía para la creación y gestión de sitios web dinámicos con WordPress y sin programación.', 'Con un sitio web autoadministrable no necesitarás contactar a otra persona cada vez que quieras editar algo en tu sitio web, eso ya es cosa del pasado. Ahora tendrás en tus manos el control de todo cuanto se publica, podrás controlar cómo se posiciona tu imagen en internet y podrás interactuar con tu audiencia.<br/>\r\n\r\nAprende a crear un sitio web completamente dinámico para tu negocio o para tus clientes de manera fácil y didáctica. Paso a paso.<br/>\r\n\r\nEn este curso te enseñaremos en profundidad a utilizar WordPress, desde su instalación hasta la gestión de características más avanzadas como galerías de imágenes, formularios de contacto y tiendas con carrito de compras. Todo esto sin tocar una sola línea de código.<br/>\r\n', '1_cursoId=5_115234_b2d9_10.jpg', '1_cursoId=5_Clase 2 - Instalacion en cPanel (Parte 1).mp4', '2', '34', '03:07:00', '1', '0', '0', '0', '0', '0', '0', '170000', '2', '');
INSERT INTO `productos_listado` VALUES ('6', '1', '5', '1', 'Aprende MySQL sin dolor ', 'En este curso aprenderás a manejar esta base de datos, con más de 6 millones de instalaciones en el mundo. ', 'MySQL es la base de datos más utilizada en Internet, sin duda alguna. Se estima en más de 6 millones de instalaciones al rededor del mundo. En este curso aprenderás a utilizarla desde las instrucciones más básicas, hasta hacer querys complejos.<br/>\r\n\r\nEsta base de datos es la más usada para hacer aplicaciones Web conectándola con lenguajes como PHP.\r\n', '1_cursoId=6_150082_eace_3.jpg', '1_cursoId=6_Clase 1 - Introducción al curso.mp4', '2', '12', '01:13:00', '1', '0', '0', '0', '0', '0', '0', '90000', '2', '');
INSERT INTO `productos_listado` VALUES ('7', '1', '3', '1', 'symfony', 'Aprenda como utilizar symfony', 'Symfony es un completo framework diseñado para optimizar el desarrollo de las aplicaciones web basado en el patrón Modelo Vista Controlador. Para empezar, separa la lógica de negocio, la lógica de servidor y la presentación de la aplicación web.', '1_cursoId=7_165688_80c5_3.jpg', '1_cursoId=7_Clase 1 - Introduccion (Windows).mp4', '1', '12', '01:03:00', '1', '0', '0', '0', '0', '0', '0', '30000', '2', '');
INSERT INTO `productos_listado` VALUES ('8', '6', '56', '1', 'Cómo utilizar Photoshop desde cero', 'Desde las herramientas básicas hasta edición de fotografía y corrección de color con este gran curso. ', 'Este curso de llevará de cero a tener un excelente manejo de Photoshop en poco tiempo. ', '1_cursoId=8_109676_5b18_6.jpg', '1_cursoId=8_Como utilizar Photoshop desde cero 1.mp4', '1', '10', '01:00:00', '1', '0', '0', '0', '0', '0', '0', '110000', '2', '');
INSERT INTO `productos_listado` VALUES ('9', '6', '56', '1', 'Adobe Photoshop CS6 - Fundamentos', 'Aprende los aspectos fundamentales de Photoshop para edición de imágenes digitales de una forma práctica y clara. ', 'Este curso dictado por un Adobe Certified Instructor con 13 años de experiencia pedagógica te muestra los conceptos fundamentales de Photoshop de una forma clara lo cual te permitirá entender el proceso de gestión y retoque de imágenes digitales para convertirte en un verdadero profesional de éste programa. La metodología usada está basada en ejemplos prácticos que te permiten entender su uso en la vida real y que podrás replicar con el material de descarga. ', '1_cursoId=9_22870_9fde_5.jpg', '1_cursoId=9_Clase 1 - Imagen digital y pixeles.mp4', '2', '4', '03:06:00', '1', '0', '0', '0', '0', '0', '0', '95000', '2', '');
INSERT INTO `productos_listado` VALUES ('10', '6', '57', '1', 'Presentaciones con Prezi ', 'Prezi paso a paso: crea fácilmente presentaciones dinámicas con Prezi. ', ' Aprende cómo diseñar presentaciones dinámicas, multi-dimensionales y atractivas que conecten con tus ideas de la manera más efectiva y asombren a tu público.\r\n\r\nEsta es tu oportunidad para conseguir que tu próxima presentación no sea gris y aburrida. Con Prezi puedes crear una presentación de alto nivel, moderna y dinámica en unos pocos clics.\r\n\r\nEste curso te va a convertir en especialista de Prezi con sólo un par de semanas de dedicación a mirar las lecciones que están diseñadas pedagógicamente para que sean fáciles de comprender y sencillas en su aplicación.\r\n\r\nNo tienes excusas, ¡es rápido, es divertido, es práctico y es eficaz! ', '1_cursoId=10_203834_464d_2.jpg', '1_cursoId=10_Crea presentaciones de impacto con Prezi 1.mp4', '1', '5', '02:07:00', '1', '0', '0', '0', '0', '0', '0', '130000', '2', '');
INSERT INTO `productos_listado` VALUES ('11', '0', '0', '1', 'Titulo del curso', '', '', '', '', '0', '0', '00:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '1', '');

-- ----------------------------
-- Table structure for productos_listado_comentarios
-- ----------------------------
DROP TABLE IF EXISTS `productos_listado_comentarios`;
CREATE TABLE `productos_listado_comentarios` (
  `idComentario` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idProducto` int(11) unsigned NOT NULL,
  `idCliente` int(11) unsigned NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `Comentario` text NOT NULL,
  PRIMARY KEY (`idComentario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of productos_listado_comentarios
-- ----------------------------

-- ----------------------------
-- Table structure for productos_listado_recursos
-- ----------------------------
DROP TABLE IF EXISTS `productos_listado_recursos`;
CREATE TABLE `productos_listado_recursos` (
  `idRecurso` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idCapitulo` int(11) unsigned NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Archivo` varchar(255) NOT NULL,
  `idProducto` int(11) unsigned NOT NULL,
  `idSesion` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idRecurso`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of productos_listado_recursos
-- ----------------------------
INSERT INTO `productos_listado_recursos` VALUES ('1', '9', 'html5-basico', '1_cursoId=1_recurso_Clase 10 - html5-basico.zip', '1', '4');
INSERT INTO `productos_listado_recursos` VALUES ('2', '28', 'Archivos Base', '1_cursoId=3_recurso_pfe-html-css-es.zip', '3', '8');
INSERT INTO `productos_listado_recursos` VALUES ('3', '69', 'Framework', '1_cursoId=7_recurso_symfony_intro-ES.zip', '7', '18');
INSERT INTO `productos_listado_recursos` VALUES ('4', '69', 'Guia', '1_cursoId=7_recurso_symfony-2-en-windows.pdf', '7', '18');

-- ----------------------------
-- Table structure for productos_listado_sesion
-- ----------------------------
DROP TABLE IF EXISTS `productos_listado_sesion`;
CREATE TABLE `productos_listado_sesion` (
  `idSesion` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idProducto` int(11) unsigned NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idSesion`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of productos_listado_sesion
-- ----------------------------
INSERT INTO `productos_listado_sesion` VALUES ('1', '1', 'Introduccion');
INSERT INTO `productos_listado_sesion` VALUES ('2', '1', 'Historia');
INSERT INTO `productos_listado_sesion` VALUES ('3', '1', 'Instrucciones Basicas');
INSERT INTO `productos_listado_sesion` VALUES ('4', '1', 'Paginas Responsives');
INSERT INTO `productos_listado_sesion` VALUES ('5', '2', 'Introduccion');
INSERT INTO `productos_listado_sesion` VALUES ('6', '2', 'Brackets');
INSERT INTO `productos_listado_sesion` VALUES ('7', '2', 'Edge Code');
INSERT INTO `productos_listado_sesion` VALUES ('8', '3', 'Introducción');
INSERT INTO `productos_listado_sesion` VALUES ('9', '3', 'HTML');
INSERT INTO `productos_listado_sesion` VALUES ('10', '3', 'CSS');
INSERT INTO `productos_listado_sesion` VALUES ('11', '4', 'Como Crear Una Pagina Web o Blog con WordPress, sin codigo');
INSERT INTO `productos_listado_sesion` VALUES ('12', '5', 'Introducción e instalación');
INSERT INTO `productos_listado_sesion` VALUES ('13', '5', 'Publicando contenido');
INSERT INTO `productos_listado_sesion` VALUES ('14', '5', 'Configuraciones');
INSERT INTO `productos_listado_sesion` VALUES ('15', '6', ' Introducción a MySQL');
INSERT INTO `productos_listado_sesion` VALUES ('16', '6', ' SQL en MySQL');
INSERT INTO `productos_listado_sesion` VALUES ('17', '6', 'Consulta de los datos: la sentencia SELECT');
INSERT INTO `productos_listado_sesion` VALUES ('18', '7', 'Windows');
INSERT INTO `productos_listado_sesion` VALUES ('19', '8', 'Curso');
INSERT INTO `productos_listado_sesion` VALUES ('20', '9', ' Conceptos de imagen digital');
INSERT INTO `productos_listado_sesion` VALUES ('21', '9', 'Gestión de imágenes');
INSERT INTO `productos_listado_sesion` VALUES ('22', '10', 'Curso');
INSERT INTO `productos_listado_sesion` VALUES ('23', '11', 'test');
INSERT INTO `productos_listado_sesion` VALUES ('24', '11', 'test2');
INSERT INTO `productos_listado_sesion` VALUES ('25', '11', 'aa');

-- ----------------------------
-- Table structure for productos_listado_sesion_capitulo
-- ----------------------------
DROP TABLE IF EXISTS `productos_listado_sesion_capitulo`;
CREATE TABLE `productos_listado_sesion_capitulo` (
  `idCapitulo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idSesion` int(11) unsigned NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  `Duracion` time NOT NULL,
  `Url_imagen` varchar(255) NOT NULL,
  `Url_video` varchar(255) NOT NULL,
  `Descripcion` text NOT NULL,
  `idProducto` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idCapitulo`)
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of productos_listado_sesion_capitulo
-- ----------------------------
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('1', '1', 'Introduccion', '00:05:00', '1_cursoId=1_cap_0102-paginaenhtml5_page_02.jpg', '1_cursoId=1_cap_Clase 1 - Introduccion.mp4', 'sadasdasd', '1');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('2', '2', 'Breve historia del HTML5', '00:04:00', '1_cursoId=1_cap_0102-paginaenhtml5_page_01.jpg', '1_cursoId=1_cap_Clase 2 - Breve historia del HTML5.mp4', 'asdasd', '1');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('3', '3', 'HTML Pagina Basica', '00:09:00', '1_cursoId=1_cap_0102-paginaenhtml5_page_01.jpg', '1_cursoId=1_cap_Clase 3 - HTML Pagina Basica.mp4', 'dd', '1');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('4', '3', 'HTML etiquetas estructurales', '00:15:00', '1_cursoId=1_cap_0102-paginaenhtml5_page_01.jpg', '1_cursoId=1_cap_Clase 4 - HTML etiquetas estructurales.mp4', 'd', '1');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('5', '3', 'Desarrollar una pagina web de una columna con HTML5', '00:18:00', '1_cursoId=1_cap_0102-paginaenhtml5_page_01.jpg', '1_cursoId=1_cap_Clase 5 - desarrollar una pagina web de una columna con HTML5.mp4', 'A', '1');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('6', '3', 'Manejo de contenidos dentro de una pagina con HTML5', '00:22:00', '1_cursoId=1_cap_0102-paginaenhtml5_page_01.jpg', '1_cursoId=1_cap_Clase 6 - Manejo de contenidos dentro de una pagina con HTML5.mp4', '', '1');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('7', '3', 'Formato de una pagina con dos columnas con HTML5', '00:27:00', '1_cursoId=1_cap_0102-paginaenhtml5_page_02.jpg', '1_cursoId=1_cap_Clase 7 - Formato de una pagina con dos columnas con HTML5.mp4', '', '1');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('8', '3', 'Pagina con HTML5 de tres columnas', '00:15:00', '1_cursoId=1_cap_0102-paginaenhtml5_page_02.jpg', '1_cursoId=1_cap_Clase 8 - Pagina con HTML5 de tres columnas.mp4', '', '1');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('9', '4', 'Paginas responsives', '00:26:00', '1_cursoId=1_cap_0102-paginaenhtml5_page_02.jpg', '1_cursoId=1_cap_Clase 9 - Paginas responsives.mp4', '', '1');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('10', '5', 'Bienvenida', '00:01:00', '1_cursoId=2_cap_115778_ad87_6.jpg', '1_cursoId=2_cap_Clase 1 - Bienvenida.mp4', '', '2');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('11', '5', 'Uso de archivos', '00:01:00', '', '', '', '2');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('14', '6', 'Gestión de archivos', '00:06:00', '1_cursoId=2_cap_115778_ad87_6.jpg', '1_cursoId=2_cap_Clase 5 - Gestión de archivos.mp4', '', '2');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('12', '6', 'Características de Brackets', '00:05:00', '1_cursoId=2_cap_115778_ad87_6.jpg', '1_cursoId=2_cap_Clase 3 - Características de Brackets.mp4', '', '2');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('13', '6', 'Interfaz', '00:03:00', '1_cursoId=2_cap_115778_ad87_6.jpg', '1_cursoId=2_cap_Clase 4 - Interfaz.mp4', '', '2');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('15', '6', 'Live Development', '00:05:00', '1_cursoId=2_cap_115778_ad87_6.jpg', '1_cursoId=2_cap_Clase 6 - Live Development.mp4', '', '2');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('16', '6', 'Quick Edit', '00:06:00', '1_cursoId=2_cap_115778_ad87_6.jpg', '1_cursoId=2_cap_Clase 7 - Quick Edit.mp4', '', '2');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('17', '6', 'Quick Edit en transiciones CSS', '00:06:00', '1_cursoId=2_cap_115778_ad87_6.jpg', '1_cursoId=2_cap_Clase 8 - Quick Edit en transiciones CSS.mp4', '', '2');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('18', '6', 'Quick View', '00:03:00', '1_cursoId=2_cap_115778_ad87_6.jpg', '1_cursoId=2_cap_Clase 9 - Quick View.mp4', '', '2');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('19', '6', 'Live Highlight - Find Definition', '00:05:00', '1_cursoId=2_cap_115778_ad87_6.jpg', '1_cursoId=2_cap_Clase 10 - Live Highlight - Find Definition.mp4', '', '2');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('20', '6', 'Quick Docs', '00:03:00', '1_cursoId=2_cap_115778_ad87_6.jpg', '1_cursoId=2_cap_Clase 11 - Quick Docs.mp4', '', '2');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('21', '6', 'Instalar extensiones', '00:05:00', '1_cursoId=2_cap_115778_ad87_6.jpg', '1_cursoId=2_cap_Clase 12 - Instalar extensiones.mp4', '', '2');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('22', '6', 'Usar extensiones', '00:04:00', '1_cursoId=2_cap_115778_ad87_6.jpg', '1_cursoId=2_cap_Clase 13 - Usar extensiones.mp4', '', '2');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('23', '7', 'Edge Code', '00:02:00', '_cursoId=2_cap_115778_ad87_6.jpg', '_cursoId=2_cap_Clase 14 - Edge Code.mp4', '', '2');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('24', '7', 'Interfaz y uso de fuentes web', '00:05:00', '_cursoId=2_cap_115778_ad87_6.jpg', '_cursoId=2_cap_Clase 15 - Interfaz y uso de fuentes web.mp4', '', '2');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('25', '7', 'Edge Inspect', '00:03:00', '_cursoId=2_cap_115778_ad87_6.jpg', '_cursoId=2_cap_Clase 16 - Edge Inspect.mp4', '', '2');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('26', '7', 'Adobe Kuler', '00:04:00', '_cursoId=2_cap_115778_ad87_6.jpg', '_cursoId=2_cap_Clase 17 - Adobe Kuler.mp4', '', '2');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('27', '8', 'Introducción al Curso ', '00:10:00', '', '1_cursoId=3_cap_Como Programar para Emprendedores - HTML y CSS 1.mp4', '', '3');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('28', '8', 'Conceptos Básicos de Desarrollo Web', '00:09:00', '1_cursoId=3_cap_81372_0fe9_5.jpg', '1_cursoId=3_cap_Como Programar para Emprendedores - HTML y CSS 2.mp4', '', '3');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('29', '8', 'Otros Cursos en Español de Zenva', '00:05:00', '1_cursoId=3_cap_81372_0fe9_5.jpg', '1_cursoId=3_cap_Como Programar para Emprendedores - HTML y CSS 3.mp4', '', '3');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('30', '9', 'Títulos y Párrafos', '00:03:00', '1_cursoId=3_cap_81372_0fe9_5.jpg', '1_cursoId=3_cap_Como Programar para Emprendedores - HTML y CSS 4.mp4', '', '3');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('31', '9', 'Links ', '00:04:00', '1_cursoId=3_cap_81372_0fe9_5.jpg', '1_cursoId=3_cap_Como Programar para Emprendedores - HTML y CSS 5.mp4', '', '3');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('32', '9', 'Imágenes ', '00:03:00', '1_cursoId=3_cap_81372_0fe9_5.jpg', '1_cursoId=3_cap_Como Programar para Emprendedores - HTML y CSS 6.mp4', '', '3');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('33', '9', 'Listas ', '00:05:00', '1_cursoId=3_cap_81372_0fe9_5.jpg', '1_cursoId=3_cap_Como Programar para Emprendedores - HTML y CSS 7.mp4', '', '3');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('34', '9', 'Tablas ', '00:03:00', '1_cursoId=3_cap_81372_0fe9_5.jpg', '1_cursoId=3_cap_Como Programar para Emprendedores - HTML y CSS 8.mp4', '', '3');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('35', '9', 'Formularios ', '00:03:00', '1_cursoId=3_cap_81372_0fe9_5.jpg', '1_cursoId=3_cap_Como Programar para Emprendedores - HTML y CSS 9.mp4', '', '3');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('36', '9', 'Tipos de Inputs ', '00:02:00', '1_cursoId=3_cap_81372_0fe9_5.jpg', '1_cursoId=3_cap_Como Programar para Emprendedores - HTML y CSS 10.mp4', '', '3');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('37', '9', 'Área de Texto ', '00:03:00', '1_cursoId=3_cap_81372_0fe9_5.jpg', '1_cursoId=3_cap_Como Programar para Emprendedores - HTML y CSS 11.mp4', '', '3');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('38', '9', 'Listas de Selección ', '00:03:00', '1_cursoId=3_cap_81372_0fe9_5.jpg', '1_cursoId=3_cap_Como Programar para Emprendedores - HTML y CSS 12.mp4', '', '3');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('39', '9', 'Estructura de un Documento HTML ', '00:07:00', '1_cursoId=3_cap_81372_0fe9_5.jpg', '1_cursoId=3_cap_Como Programar para Emprendedores - HTML y CSS 13.mp4', '', '3');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('40', '9', 'Estructura del Proyecto ', '00:06:00', '1_cursoId=3_cap_81372_0fe9_5.jpg', '1_cursoId=3_cap_Como Programar para Emprendedores - HTML y CSS 14.mp4', '', '3');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('41', '10', ' 	 Incluyendo el CSS', '00:05:00', '1_cursoId=3_cap_81372_0fe9_5.jpg', '1_cursoId=3_cap_Como Programar para Emprendedores - HTML y CSS 15.mp4', '', '3');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('42', '10', 'Selecciones ', '00:03:00', '1_cursoId=3_cap_81372_0fe9_5.jpg', '1_cursoId=3_cap_Como Programar para Emprendedores - HTML y CSS 16.mp4', '', '3');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('43', '10', 'reset.css ', '00:05:00', '1_cursoId=3_cap_81372_0fe9_5.jpg', '1_cursoId=3_cap_Como Programar para Emprendedores - HTML y CSS 17.mp4', '', '3');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('44', '11', 'Como comprar un dominio / hospedaje, conectar las cuentas, e instalar WordPress. ', '00:18:00', '1_cursoId=4_cap_82004_7feb_4.jpg', '1_cursoId=4_cap_Clase 1.mp4', '', '4');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('45', '11', 'Como añadir paginas, posts, widgets, una barra lateral, y temas a tu pagina web. ', '00:32:00', '1_cursoId=4_cap_82004_7feb_4.jpg', '1_cursoId=4_cap_Clase 2.mp4', '', '4');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('46', '11', 'Cómo agregar Facebook, Google Maps, botones de PayPal, y mas. ', '00:37:00', '1_cursoId=4_cap_82004_7feb_4.jpg', '1_cursoId=4_cap_Clase 3.mp4', '', '4');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('47', '12', 'Instalación en cPanel (Parte 1) ', '00:09:00', '1_cursoId=5_cap_115234_b2d9_10.jpg', '1_cursoId=5_cap_Clase 2 - Instalacion en cPanel (Parte 1).mp4', '', '5');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('48', '12', 'Instalación en cPanel (Parte 2) ', '00:10:00', '1_cursoId=5_cap_115234_b2d9_10.jpg', '1_cursoId=5_cap_Clase 3 - Instalacion en cPanel (Parte 2).mp4', '', '5');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('49', '12', 'Instalación en MAMP ', '00:08:00', '1_cursoId=5_cap_115234_b2d9_10.jpg', '1_cursoId=5_cap_Clase 4 - Instalacion en MAMP.mp4', '', '5');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('50', '12', 'El escritorio de WordPress ', '00:08:00', '1_cursoId=5_cap_115234_b2d9_10.jpg', '1_cursoId=5_cap_Clase 5 - El escritorio de WordPress.mp4', '', '5');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('51', '12', 'Actualizando desde el escritorio ', '00:05:00', '1_cursoId=5_cap_115234_b2d9_10.jpg', '1_cursoId=5_cap_Clase 6 - Actualizando desde el escritorio.mp4', '', '5');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('52', '13', 'Diferencia entre Entradas y Páginas ', '00:02:00', '1_cursoId=5_cap_115234_b2d9_10.jpg', '1_cursoId=5_cap_Clase 7 - Diferencia entre Entradas y Páginas.mp4', '', '5');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('53', '13', 'Publicando una entrada (Parte 1) ', '00:09:00', '1_cursoId=5_cap_115234_b2d9_10.jpg', '1_cursoId=5_cap_Clase 8 - Publicando una entrada (Parte 1).mp4', '', '5');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('54', '13', 'Publicando una entrada (Parte 2) ', '00:07:00', '1_cursoId=5_cap_115234_b2d9_10.jpg', '1_cursoId=5_cap_Clase 9 - Publicando una entrada (Parte 2).mp4', '', '5');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('55', '13', 'Insertando una imagen ', '00:06:00', '1_cursoId=5_cap_115234_b2d9_10.jpg', '1_cursoId=5_cap_Clase 10 - Insertando una imagen.mp4', '', '5');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('56', '13', 'Crear galerías de imágenes ', '00:08:00', '1_cursoId=5_cap_115234_b2d9_10.jpg', '1_cursoId=5_cap_Clase 11 - Crear galerias de imagenes.mp4', '', '5');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('57', '14', 'Ajustando la página de inicio ', '00:16:00', '1_cursoId=5_cap_115234_b2d9_10.jpg', '1_cursoId=5_cap_Clase 20 - Ajustando la pagina de inicio.mp4', '', '5');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('58', '14', 'Gestionando los comentarios ', '00:04:00', '1_cursoId=5_cap_115234_b2d9_10.jpg', '1_cursoId=5_cap_Clase 21 - Gestionando los comentarios.mp4', '', '5');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('59', '14', 'Ajustes generales, escritura y lectura ', '00:02:00', '1_cursoId=5_cap_115234_b2d9_10.jpg', '1_cursoId=5_cap_Clase 22 - Ajustes generales, escritura y lectura.mp4', '', '5');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('60', '15', 'Introducción a MySQL ', '00:05:00', '1_cursoId=6_cap_150082_eace_3.jpg', '1_cursoId=6_cap_Clase 2 - Introduccion a MySQL.mp4', '', '6');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('61', '15', 'Términos básicos sobre bases de datos ', '00:11:00', '1_cursoId=6_cap_150082_eace_3.jpg', '1_cursoId=6_cap_Clase 3 - Terminos basicos sobre bases de datos.mp4', '', '6');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('62', '15', 'Conceptos generales sobre diseño de bases de datos ', '00:08:00', '1_cursoId=6_cap_150082_eace_3.jpg', '1_cursoId=6_cap_Clase 4 - Conceptos generales sobre diseño de bases de datos.mp4', '', '6');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('63', '15', 'Tipos de datos en MySQL ', '00:02:00', '1_cursoId=6_cap_150082_eace_3.jpg', '1_cursoId=6_cap_Clase 5 - Tipos de datos en MySQL.mp4', '', '6');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('64', '16', 'El lenguaje estructurado de MySQL ', '00:05:00', '1_cursoId=6_cap_150082_eace_3.jpg', '1_cursoId=6_cap_Clase 13 - El lenguaje estructurado de MySQL.mp4', '', '6');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('65', '16', 'Crear una base de datos en MySQL ', '00:06:00', '1_cursoId=6_cap_150082_eace_3.jpg', '1_cursoId=6_cap_Clase 14 - Crear una base de datos en MySQL.mp4', '', '6');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('66', '16', 'Crear una tabla con SQL ', '00:05:00', '1_cursoId=6_cap_150082_eace_3.jpg', '1_cursoId=6_cap_Clase 15 - Crear una tabla con SQL.mp4', '', '6');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('67', '17', 'La sentencia SELECT ', '00:04:00', '1_cursoId=6_cap_150082_eace_3.jpg', '1_cursoId=6_cap_Clase 23 - La sentencia SELECT.mp4', '', '6');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('68', '17', 'Hacer una selección condicional con WHERE', '00:03:00', '1_cursoId=6_cap_150082_eace_3.jpg', '1_cursoId=6_cap_Clase 24 - Hacer una seleccion condicional con WHERE.mp4', '', '6');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('69', '18', 'Introduccion', '00:05:00', '1_cursoId=7_cap_165688_80c5_3.jpg', '1_cursoId=7_cap_Clase 1 - Introduccion (Windows).mp4', '', '7');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('70', '18', 'Instalacion de PHP', '00:07:00', '1_cursoId=7_cap_165688_80c5_3.jpg', '1_cursoId=7_cap_Clase 2 - Instalacion de PHP (Windows).mp4', '', '7');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('71', '18', 'Estandares de desarrollo (Windows)', '00:03:00', '1_cursoId=7_cap_165688_80c5_3.jpg', '1_cursoId=7_cap_Clase 3 - Estandares de desarrollo (Windows).mp4', '', '7');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('72', '18', 'Instalacion de Composer', '00:13:00', '1_cursoId=7_cap_165688_80c5_3.jpg', '1_cursoId=7_cap_Clase 4 - Instalacion de Composer (Windows).mp4', '', '7');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('73', '18', 'Creacion de un proyecto', '00:05:00', '1_cursoId=7_cap_165688_80c5_3.jpg', '1_cursoId=7_cap_Clase 5 - Creacion de un proyecto (Windows).mp4', '', '7');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('74', '18', 'Configuracion de PhpStorm', '00:03:00', '1_cursoId=7_cap_165688_80c5_3.jpg', '1_cursoId=7_cap_Clase 6 - Configuracion de PhpStorm (Windows).mp4', '', '7');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('75', '18', 'Iniciando el servidor web', '00:02:00', '1_cursoId=7_cap_165688_80c5_3.jpg', '1_cursoId=7_cap_Clase 7 - Iniciando el servidor web (Windows).mp4', '', '7');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('76', '19', 'Capitulo 1', '00:06:00', '1_cursoId=8_cap_109676_5b18_6.jpg', '1_cursoId=8_cap_Como utilizar Photoshop desde cero 1.mp4', '', '8');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('77', '19', 'Capitulo 2', '00:04:00', '1_cursoId=8_cap_109676_5b18_6.jpg', '1_cursoId=8_cap_Como utilizar Photoshop desde cero 2.mp4', '', '8');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('78', '19', 'Capitulo 3', '00:05:00', '1_cursoId=8_cap_109676_5b18_6.jpg', '1_cursoId=8_cap_Como utilizar Photoshop desde cero 3.mp4', '', '8');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('79', '20', 'Imagen digital y pixeles ', '00:03:00', '1_cursoId=9_cap_22870_9fde_5.jpg', '1_cursoId=9_cap_Clase 1 - Imagen digital y pixeles.mp4', '', '9');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('80', '20', 'Resolución ', '00:06:00', '1_cursoId=9_cap_22870_9fde_5.jpg', '1_cursoId=9_cap_Clase 2 - Resolucion.mp4', '', '9');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('81', '20', 'Formatos de imagen ', '00:18:00', '1_cursoId=9_cap_22870_9fde_5.jpg', '1_cursoId=9_cap_Clase 3 - Formatos de imagen.mp4', '', '9');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('82', '21', 'Abrir una imagen desde Photoshop ', '00:08:00', '1_cursoId=9_cap_22870_9fde_5.jpg', '1_cursoId=9_cap_Clase 8 - Abrir una imagen desde Photoshop.mp4', '', '9');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('83', '21', 'Abrir una imagen con Bridge ', '00:07:00', '1_cursoId=9_cap_22870_9fde_5.jpg', '1_cursoId=9_cap_Clase 9 - Abrir una imagen con Bridge.mp4', '', '9');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('84', '21', 'Interfaz de Bridge ', '00:11:00', '1_cursoId=9_cap_22870_9fde_5.jpg', '1_cursoId=9_cap_Clase 10 - Interfaz de Bridge.mp4', '', '9');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('85', '21', 'Configurar miniaturas en Bridge ', '00:08:00', '1_cursoId=9_cap_22870_9fde_5.jpg', '1_cursoId=9_cap_Clase 11 - Configurar miniaturas en Bridge.mp4', '', '9');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('86', '22', 'Capitulo 1', '01:00:00', '1_cursoId=10_cap_203834_464d_2.jpg', '1_cursoId=10_cap_Crea presentaciones de impacto con Prezi 1.mp4', '', '10');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('87', '22', 'Capitulo 2', '00:18:00', '1_cursoId=10_cap_203834_464d_2.jpg', '1_cursoId=10_cap_Crea presentaciones de impacto con Prezi 2.mp4', '', '10');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('88', '22', 'Capitulo 3', '00:09:00', '1_cursoId=10_cap_203834_464d_2.jpg', '1_cursoId=10_cap_Crea presentaciones de impacto con Prezi 3.mp4', '', '10');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('89', '22', 'Capitulo 4', '00:09:00', '1_cursoId=10_cap_203834_464d_2.jpg', '1_cursoId=10_cap_Crea presentaciones de impacto con Prezi 4.mp4', '', '10');
INSERT INTO `productos_listado_sesion_capitulo` VALUES ('90', '22', 'Capitulo 5', '00:14:00', '1_cursoId=10_cap_203834_464d_2.jpg', '1_cursoId=10_cap_Crea presentaciones de impacto con Prezi 5.mp4', '', '10');

-- ----------------------------
-- Table structure for productos_nivel
-- ----------------------------
DROP TABLE IF EXISTS `productos_nivel`;
CREATE TABLE `productos_nivel` (
  `idNivel` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`idNivel`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of productos_nivel
-- ----------------------------
INSERT INTO `productos_nivel` VALUES ('1', 'Basico');
INSERT INTO `productos_nivel` VALUES ('2', 'Medio');
INSERT INTO `productos_nivel` VALUES ('3', 'Avanzado');

-- ----------------------------
-- Table structure for productos_subcategorias
-- ----------------------------
DROP TABLE IF EXISTS `productos_subcategorias`;
CREATE TABLE `productos_subcategorias` (
  `idSubcategoria` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idCategoria` int(11) unsigned NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`idSubcategoria`)
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of productos_subcategorias
-- ----------------------------
INSERT INTO `productos_subcategorias` VALUES ('1', '1', 'Desarrollo Web');
INSERT INTO `productos_subcategorias` VALUES ('2', '1', 'Aplicaciones Móviles');
INSERT INTO `productos_subcategorias` VALUES ('3', '1', 'Lenguajes de Programación');
INSERT INTO `productos_subcategorias` VALUES ('4', '1', 'Desarrollo de Videojuegos');
INSERT INTO `productos_subcategorias` VALUES ('5', '1', 'Bases de Datos');
INSERT INTO `productos_subcategorias` VALUES ('6', '1', 'Testeo de Software');
INSERT INTO `productos_subcategorias` VALUES ('7', '1', 'Ingeniería de Software');
INSERT INTO `productos_subcategorias` VALUES ('8', '1', 'Herramientas de Desarrollo');
INSERT INTO `productos_subcategorias` VALUES ('9', '1', 'Comercio Electrónico');
INSERT INTO `productos_subcategorias` VALUES ('10', '2', 'Finanzas');
INSERT INTO `productos_subcategorias` VALUES ('11', '2', 'Emprendimiento');
INSERT INTO `productos_subcategorias` VALUES ('12', '2', 'Comunicación');
INSERT INTO `productos_subcategorias` VALUES ('13', '2', 'Gestión Empresarial');
INSERT INTO `productos_subcategorias` VALUES ('14', '2', 'Ventas');
INSERT INTO `productos_subcategorias` VALUES ('15', '2', 'Estrategia');
INSERT INTO `productos_subcategorias` VALUES ('16', '2', 'Operaciones');
INSERT INTO `productos_subcategorias` VALUES ('17', '2', 'Gestión de Proyectos');
INSERT INTO `productos_subcategorias` VALUES ('18', '2', 'Derecho de Negocios');
INSERT INTO `productos_subcategorias` VALUES ('19', '2', 'Datos y Análisis');
INSERT INTO `productos_subcategorias` VALUES ('20', '2', 'Negocios en Casa');
INSERT INTO `productos_subcategorias` VALUES ('21', '2', 'Recursos Humanos');
INSERT INTO `productos_subcategorias` VALUES ('22', '2', 'Industria');
INSERT INTO `productos_subcategorias` VALUES ('23', '2', 'Medios');
INSERT INTO `productos_subcategorias` VALUES ('24', '2', 'Inmobiliaria');
INSERT INTO `productos_subcategorias` VALUES ('25', '2', 'Otro');
INSERT INTO `productos_subcategorias` VALUES ('26', '3', 'Certificaciones IT');
INSERT INTO `productos_subcategorias` VALUES ('27', '3', 'Redes y Seguridad');
INSERT INTO `productos_subcategorias` VALUES ('28', '3', 'Hardware');
INSERT INTO `productos_subcategorias` VALUES ('29', '3', 'Sistemas Operativos');
INSERT INTO `productos_subcategorias` VALUES ('30', '3', 'Otro');
INSERT INTO `productos_subcategorias` VALUES ('31', '4', 'Microsoft');
INSERT INTO `productos_subcategorias` VALUES ('32', '4', 'Apple');
INSERT INTO `productos_subcategorias` VALUES ('33', '4', 'Google');
INSERT INTO `productos_subcategorias` VALUES ('34', '4', 'SAP');
INSERT INTO `productos_subcategorias` VALUES ('35', '4', 'Intuit');
INSERT INTO `productos_subcategorias` VALUES ('36', '4', 'Departamento de Ventas');
INSERT INTO `productos_subcategorias` VALUES ('37', '4', 'Oracle');
INSERT INTO `productos_subcategorias` VALUES ('38', '4', 'Otro');
INSERT INTO `productos_subcategorias` VALUES ('39', '5', 'Transformación Personal');
INSERT INTO `productos_subcategorias` VALUES ('40', '5', 'Productividad');
INSERT INTO `productos_subcategorias` VALUES ('41', '5', 'Liderazgo');
INSERT INTO `productos_subcategorias` VALUES ('42', '5', 'Finanzas Personales');
INSERT INTO `productos_subcategorias` VALUES ('43', '5', 'Desarrollo Profesional');
INSERT INTO `productos_subcategorias` VALUES ('44', '5', 'Parenting y Relaciones');
INSERT INTO `productos_subcategorias` VALUES ('45', '5', 'Felicidad');
INSERT INTO `productos_subcategorias` VALUES ('46', '5', 'Religion y Espiritualidad');
INSERT INTO `productos_subcategorias` VALUES ('47', '5', 'Construir tu Marca Personal');
INSERT INTO `productos_subcategorias` VALUES ('48', '5', 'Creatividad');
INSERT INTO `productos_subcategorias` VALUES ('49', '5', 'Influencia');
INSERT INTO `productos_subcategorias` VALUES ('50', '5', 'Autoestima');
INSERT INTO `productos_subcategorias` VALUES ('51', '5', 'Gestión del Estrés');
INSERT INTO `productos_subcategorias` VALUES ('52', '5', 'Memoria y destrezas de estudio');
INSERT INTO `productos_subcategorias` VALUES ('53', '5', 'Motivación');
INSERT INTO `productos_subcategorias` VALUES ('54', '5', 'Otro');
INSERT INTO `productos_subcategorias` VALUES ('55', '6', 'Diseño Web');
INSERT INTO `productos_subcategorias` VALUES ('56', '6', 'Diseño Gráfico');
INSERT INTO `productos_subcategorias` VALUES ('57', '6', 'Herramientas de Diseño');
INSERT INTO `productos_subcategorias` VALUES ('58', '6', 'Experiencia de Usuario');
INSERT INTO `productos_subcategorias` VALUES ('59', '6', 'Diseño de Juegos');
INSERT INTO `productos_subcategorias` VALUES ('60', '6', '3D y Animación');
INSERT INTO `productos_subcategorias` VALUES ('61', '6', 'Moda');
INSERT INTO `productos_subcategorias` VALUES ('62', '6', 'Diseño Arquitectónico');
INSERT INTO `productos_subcategorias` VALUES ('63', '6', 'Diseño de Interiores');
INSERT INTO `productos_subcategorias` VALUES ('64', '6', 'Otro');
INSERT INTO `productos_subcategorias` VALUES ('65', '7', 'Marketing Digital');
INSERT INTO `productos_subcategorias` VALUES ('66', '7', 'Branding');
INSERT INTO `productos_subcategorias` VALUES ('67', '7', 'Fundamentos de Marketing');
INSERT INTO `productos_subcategorias` VALUES ('68', '7', 'Promoción');
INSERT INTO `productos_subcategorias` VALUES ('69', '7', 'Growth Hacking');
INSERT INTO `productos_subcategorias` VALUES ('70', '7', 'Marketing de Producto');
INSERT INTO `productos_subcategorias` VALUES ('71', '7', 'Otro');
INSERT INTO `productos_subcategorias` VALUES ('72', '8', 'Artes y Manualidades');
INSERT INTO `productos_subcategorias` VALUES ('73', '8', 'Comida y Bebida');
INSERT INTO `productos_subcategorias` VALUES ('74', '8', 'Belleza y Maquillaje');
INSERT INTO `productos_subcategorias` VALUES ('75', '8', 'Viaje');
INSERT INTO `productos_subcategorias` VALUES ('76', '8', 'Juegos');
INSERT INTO `productos_subcategorias` VALUES ('77', '8', 'Bricolaje');
INSERT INTO `productos_subcategorias` VALUES ('78', '8', 'Otro');
INSERT INTO `productos_subcategorias` VALUES ('79', '9', 'Fotografía Digital');
INSERT INTO `productos_subcategorias` VALUES ('80', '9', 'Fundamentos de Fotografía');
INSERT INTO `productos_subcategorias` VALUES ('81', '9', 'Retratos');
INSERT INTO `productos_subcategorias` VALUES ('82', '9', 'Paisajes');
INSERT INTO `productos_subcategorias` VALUES ('83', '9', 'Blanco y Negro');
INSERT INTO `productos_subcategorias` VALUES ('84', '9', 'Herramientas de Fotografía');
INSERT INTO `productos_subcategorias` VALUES ('85', '9', 'Fotografía móvil');

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuarios_accesos
-- ----------------------------
INSERT INTO `usuarios_accesos` VALUES ('1', '1', '2015-06-30', '10:14:37');
INSERT INTO `usuarios_accesos` VALUES ('2', '1', '2015-06-30', '17:12:58');
INSERT INTO `usuarios_accesos` VALUES ('3', '1', '2015-07-01', '15:54:17');

-- ----------------------------
-- Table structure for usuarios_estados
-- ----------------------------
DROP TABLE IF EXISTS `usuarios_estados`;
CREATE TABLE `usuarios_estados` (
  `idEstado` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuarios_estados
-- ----------------------------
INSERT INTO `usuarios_estados` VALUES ('1', 'Activo');
INSERT INTO `usuarios_estados` VALUES ('2', 'Inactivo');

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
  `idTheme` tinyint(3) unsigned NOT NULL,
  `idSistema` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuarios_listado
-- ----------------------------
INSERT INTO `usuarios_listado` VALUES ('1', 'tenshi98', 'b9ad227539cc03cd8199e23aa9078065', 'SuperAdmin', '1', 'asd@bla1.cl', 'Victor Reyes', '16029464-7', '2014-05-14', 'Los Lirios 0936', '8512517', 'Santiago', 'Puente Alto', '', '2015-07-01', '1', '1');
INSERT INTO `usuarios_listado` VALUES ('2', 'clubamerica', '6c2cb9b34882139123bfec7f55dc2ee2', 'Administrador', '1', 'clubamerica@clubamerica.pe', 'clubamerica', '16029464-7', '2015-04-08', '', '', '', '', '', '2015-04-22', '0', '1');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `level_ver` tinyint(1) unsigned NOT NULL,
  `level_editar` tinyint(1) unsigned NOT NULL,
  `level_crear` tinyint(1) unsigned NOT NULL,
  `level_borrar` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`idPermisos`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuarios_permisos
-- ----------------------------
INSERT INTO `usuarios_permisos` VALUES ('1', '2', '4', '1', '1', '1', '1');
INSERT INTO `usuarios_permisos` VALUES ('2', '2', '5', '1', '1', '1', '1');
INSERT INTO `usuarios_permisos` VALUES ('3', '2', '11', '1', '1', '1', '1');
INSERT INTO `usuarios_permisos` VALUES ('4', '2', '12', '1', '1', '1', '1');
INSERT INTO `usuarios_permisos` VALUES ('5', '2', '6', '1', '1', '1', '1');
INSERT INTO `usuarios_permisos` VALUES ('6', '2', '7', '1', '1', '1', '1');
INSERT INTO `usuarios_permisos` VALUES ('7', '2', '10', '1', '1', '1', '1');
INSERT INTO `usuarios_permisos` VALUES ('8', '2', '1', '1', '1', '1', '1');
INSERT INTO `usuarios_permisos` VALUES ('9', '2', '2', '1', '1', '1', '1');
INSERT INTO `usuarios_permisos` VALUES ('10', '2', '3', '1', '1', '1', '1');
INSERT INTO `usuarios_permisos` VALUES ('11', '2', '13', '1', '1', '1', '1');
INSERT INTO `usuarios_permisos` VALUES ('12', '2', '14', '1', '1', '1', '1');
INSERT INTO `usuarios_permisos` VALUES ('13', '2', '8', '1', '1', '1', '1');
INSERT INTO `usuarios_permisos` VALUES ('14', '2', '9', '1', '1', '1', '1');
